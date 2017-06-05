<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Option to disable versioning
if (!function_exists('ironstrap_remove_ver')) {
    function ironstrap_remove_ver($src)
    {
        if (get_field('disable_versioning', 'option')) {
            if (strpos($src, '?ver=')) {
                $src = remove_query_arg('ver', $src);
            }
            if (strpos($src, '?rev=')) {
                $src = remove_query_arg('rev', $src);
            }
            if (strpos($src, '?ver=')) {
                $src = remove_query_arg('ver', $src);
            }
        }
        return $src;
    }
    add_filter('style_loader_src', 'ironstrap_remove_ver', 10, 2);
    add_filter('script_loader_src', 'ironstrap_remove_ver', 10, 2);
}

// Option to defer JS
if (!is_admin()) {
    add_filter('clean_url', function ($url) {
        if (get_field('defer_javascript', 'option')) {
            if (false === strpos($url, '.js') || strpos($url, 'jquery.js')) {
                return $url;
            }

            // Must be a ', not "!
            return "$url' defer='defer";
        }
        return $url;
    }, 11, 1);
}

// Option to require authentication for the WordPress REST API
add_filter('rest_authentication_errors', function ($access) {
    if (get_field('disable_wordpress_rest_api', 'option')) {
        if (!is_user_logged_in()) {
            return new WP_Error('rest_cannot_access', __('Only authenticated users can access the REST API.', 'disable-json-api'), array( 'status' => rest_authorization_required_code()));
        }
    }
    return $access;
});

// Option to hide author usernames
add_action('template_redirect', function () {
    if (get_field('hide_author_usernames', 'option')) {
        if (is_author()) {
            wp_redirect(home_url());
            exit;
        }
    }
});

// Option to hide head metadata
if (get_field('remove_meta_from_head', 'option')) {
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'index_rel_link'); // index link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
    remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
}

// Option to disable XMLRPC
if (get_field('disable_xmlrpc', 'option')) {
    add_filter('xmlrpc_enabled', '__return_false');
}

// Option to expose ACF fields to WP REST API for specific post types.
if (!function_exists('ironstrap_get_post_custom_fields')) {
    function ironstrap_get_post_custom_fields($object, $field_name, $request)
    {
        $cfs = get_fields($object['id']);
        $return = array();

        foreach ($cfs as $k => $v) {
            $return[$k] = $v;
        }
        return $return;
    }
}

if (get_field('expose_acf_fields', 'option')) {
    add_action('rest_api_init', function () {
        $post_types = get_field('expose_acf_fields', 'option');
        foreach ($post_types as $key => $value) {
            register_rest_field(
                $value,
                'acf_custom_fields',
                array(
                    'get_callback'    => 'ironstrap_get_post_custom_fields',
                    'update_callback' => null,
                    'schema'          => null,
                )
            );
        }
    });
}

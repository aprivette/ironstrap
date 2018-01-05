<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Set up redirects defined in IronStrap Options
add_action('template_redirect', function ()
{
    if (get_field('redirects', 'option') && !is_home()) {
        $redirects = get_field('redirects', 'option');
        global $post;

        foreach ($redirects as $redirect) {
            $uri = '/' . get_page_uri($post->ID);
            $uri_slash = $uri . '/';
            if ($redirect['path'] == $uri || $redirect['path'] == $uri_slash) {
                wp_redirect($redirect['redirect_url'], $redirect['redirect_type']);
            }
        }
    }
});

// CSV import to IronStrap Redirects
add_filter('acf/save_post', function ($post_id)
{
    $field_obj = get_field_object('redirect_import', 'option');
    $key = $field_obj['key'];
    
    if(empty($_POST['acf'][$key])) {
        return;
    }
    
    $field = $_POST['acf'][$key];
    delete_field('redirect_import' , 'option');
    $handle = fopen(get_attached_file($field), 'r');
    
    while(($data = fgetcsv($handle)) !== false) {
        if(in_array(null, $data)) {
            continue;
        }
        $row = [
            'path' => $data[0],
            'redirect_type' => $data[1],
            'redirect_url' => $data[2]
        ];
        add_row('redirects', $row, $post_id);
    }
    
    return $post_id;
}, 10, 1);

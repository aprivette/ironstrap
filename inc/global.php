<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Add title tag support to the theme
add_action('after_setup_theme', function ()
{
    add_theme_support('title-tag');
});

// IronStrap Options styles
add_action('admin_enqueue_scripts', function ()
{
    wp_enqueue_style('admin', get_template_directory_uri().'/admin/style.css');
});

// Register menu locations
register_nav_menus(array( 
    'main-menu' => 'Main Menu',
));

// Proxy ACF's the_field to return null or accept a default parameter. Allows us to avoid manually checking for existence of the acf class.
function ironstrap_the_field($field, $post = null, $default = null)
{
    if(class_exists('acf')) {
        if(get_field($field, $post)) {
            the_field($field, $post);
        } else {
            echo $default;
        }
    }
    return true;
}

// Proxy ACF's get_field. Allows us to avoid manually checking for existence of the acf class.
function ironstrap_get_field($field, $post = null, $default = null)
{
    if(class_exists('acf')) {
        if(get_field($field, $post)) {
            return get_field($field, $post);
        } else {
            return $default;
        }
    } else {
        return false;
    }
}

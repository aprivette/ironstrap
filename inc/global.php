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
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

// IronStrap Options styles
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin', get_template_directory_uri().'/admin/style.css');
});

// Globally disable related videos in YouTube embeds
function ironstrap_remove_youtube_rel($code){
    if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
        $return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&rel=0", $code);
        return $return;
    }
    return $code;
}
add_filter('embed_handler_html', 'ironstrap_remove_youtube_rel');
add_filter('embed_oembed_html', 'ironstrap_remove_youtube_rel');

// Register menu locations
register_nav_menus(array( 
    'main-menu' => 'Main Menu',
));
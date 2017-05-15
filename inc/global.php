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
add_action('after_setup_theme', function() {
   add_theme_support('title-tag');
});

add_action('admin_enqueue_scripts', function() {
	wp_enqueue_style('admin', get_template_directory_uri().'/admin/style.css');
});
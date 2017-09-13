<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Register IronStrap Options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'IronStrap Options',
        'menu_title' => 'IronStrap Options',
        'menu_slug' => 'ironstrap-options',
        'redirect' => false
    ));
    add_filter('acf/settings/load_json', function($paths) {
        $paths[] = get_template_directory() . '/acf-json';
        return $paths;
    });
    add_filter('acf/settings/save_json', function($path) {
        $paths = get_template_directory() . '/acf-json';
        return $path;
    });
}

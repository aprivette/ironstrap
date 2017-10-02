<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

if(function_exists('acf_add_options_page'))
{
    // Register IronStrap Options page
    acf_add_options_page(array(
        'page_title' => 'IronStrap Options',
        'menu_title' => 'IronStrap Options',
        'menu_slug' => 'ironstrap-options',
        'redirect' => false
    ));
    // Tells ACF to load default fields
    add_filter('acf/settings/load_json', function($paths)
    {
        $paths[] = get_template_directory() . '/acf-json';
        return $paths;
    });
    // Tells ACF where to save new fields
    add_filter('acf/settings/save_json', function($path)
    {
        $paths = get_template_directory() . '/acf-json';
        return $path;
    });
}

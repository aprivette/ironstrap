<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

if (class_exists('acf')) {
    require 'inc/acf.php';
    require 'inc/acf_global.php';
    require 'inc/acf_sidebar.php';
    require 'inc/acf_js.php';
    require 'inc/acf_editor.php';
    require 'inc/acf_redirects.php';
    require 'inc/acf_sidebar_init.php';
    require 'inc/acf_favicon.php';
    require 'inc/acf_robots.php';
    require 'inc/acf_field_post_type.php';
    require 'inc/acf_structured_data.php';
}
require 'inc/assets.php';
require 'inc/global.php';
require 'inc/shortcodes.php';
require 'inc/vc_map.php';

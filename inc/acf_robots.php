<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Appends WordPress robots.txt
if (get_field('robotstxt', 'option')) {
    add_filter('robots_txt', function ($content, $is_public) {
        $content .= get_field('robotstxt', 'option');
        return $content;
    }, 10, 2);
}

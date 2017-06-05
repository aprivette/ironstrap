<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Defines sidebars based on ACF options and loops through the registration process
class IronStrap_Sidebars
{
    function __construct()
    {
        $sidebars = [];

        // Top header sidebars
        if (get_field('top_header_sidebars', 'option') == 2 || get_field('top_header_sidebars', 'option') == 3) {
            $sidebars[] = [
                'name' => 'Header Left',
                'id' => 'header_left',
            ];

            $sidebars[] = [
                'name' => 'Header Right',
                'id' => 'header_right',
            ];
        }

        // Top header sidebars
        if (get_field('top_header_sidebars', 'option') == 3) {
            $sidebars[] = [
                'name' => 'Header Center',
                'id' => 'header_center',
            ];
        }

        // Top header sidebars
        if (get_field('top_header_sidebars', 'option') == 1) {
            $sidebars[] = [
                'name' => 'Header',
                'id' => 'header_sidebar',
            ];
        }

        // Top footer sidebars
        if (get_field('top_footer_sidebars', 'option') == 2 || get_field('top_footer_sidebars', 'option') == 3 || get_field('top_footer_sidebars', 'option') == 4) {
            $sidebars[] = [
                'name' => 'Top Footer Left',
                'id' => 'top_footer_left',
            ];

            $sidebars[] = [
                'name' => 'Top Footer Right',
                'id' => 'top_footer_right',
            ];
        }

        // Top footer sidebars
        if (get_field('top_footer_sidebars', 'option') == 4) {
            $sidebars[] = [
                'name' => 'Top Footer Inner Left',
                'id' => 'top_footer_inner_left',
            ];

            $sidebars[] = [
                'name' => 'Top Footer Inner Right',
                'id' => 'top_footer_inner_right',
            ];
        }

        // Top footer sidebars
        if (get_field('top_footer_sidebars', 'option') == 3) {
            $sidebars[] = [
                'name' => 'Top Footer Center',
                'id' => 'top_footer_center',
            ];
        }

        // Top footer sidebars
        if (get_field('top_footer_sidebars', 'option') == 1) {
            $sidebars[] = [
                'name' => 'Top Footer',
                'id' => 'top_footer_sidebar',
            ];
        }

        // Bottom footer sidebars
        if (get_field('bottom_footer_sidebars', 'option') == 2 || get_field('bottom_footer_sidebars', 'option') == 3) {
            $sidebars[] = [
                'name' => 'Footer Bottom Left',
                'id' => 'bottom_footer_left',
            ];

            $sidebars[] = [
                'name' => 'Footer Bottom Right',
                'id' => 'bottom_footer_right',
            ];
        }

        // Bottom footer sidebars
        if (get_field('bottom_footer_sidebars', 'option') == 3) {
            $sidebars[] = [
                'name' => 'Footer Bottom Center',
                'id' => 'bottom_footer_center',
            ];
        }

        // Bottom footer sidebars
        if (get_field('bottom_footer_sidebars', 'option') == 1) {
            $sidebars[] = [
                'name' => 'Footer Bottom',
                'id' => 'bottom_footer_sidebar',
            ];
        }

        // Sidebars defined in IronStrap Options
        if (get_field('create_sidebars', 'option')) {
            $acf_sidebars = get_field('create_sidebars', 'option');

            foreach ($acf_sidebars as $key => $value) {
                $sidebars[] = [
                    'name' => $value['sidebar_name'],
                    'id' => $value['sidebar_slug'],
                ];
            }
        }

        $this->args = $sidebars;
    }

    // Loop through $sidebars and register each sidebar
    public function register_acf_sidebars()
    {
        add_action('widgets_init', function () {
            foreach ($this->args as $sidebar) {
                register_sidebar(array(
                    'name'          => $sidebar['name'],
                    'id'            => $sidebar['id'],
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<p>',
                    'after_title'   => '</p>',
                ));
            }
        });
    }
}

// Instantiate class and register sidebars
$sidebar = new IronStrap_Sidebars();
$sidebar->register_acf_sidebars();

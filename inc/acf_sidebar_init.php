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
        $header_and_footer = [
            [
                'count' => get_field('top_header_sidebars', 'option'),
                'name' => 'Header Top',
                'id_prefix' => 'top_header',
            ],
            [
                'count' => get_field('top_footer_sidebars', 'option'),
                'name' => 'Footer Top',
                'id_prefix' => 'top_footer',
            ],
            [
                'count' => get_field('bottom_footer_sidebars', 'option'),
                'name' => 'Footer Bottom',
                'id_prefix' => 'bottom_footer',
            ],
        ];

        foreach($header_and_footer as $sidebar_type) {
            for ($i = 1; $i <= $sidebar_type['count']; $i++) {
                $sidebars[] = [
                    'name' => "{$sidebar_type['name']} {$i}",
                    'id' => "{$sidebar_type['id_prefix']}_{$i}",
                ];
            }
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
        add_action('widgets_init', function ()
        {
            foreach ($this->args as $sidebar) {
                register_sidebar(array(
                    'name'          => $sidebar['name'],
                    'id'            => $sidebar['id'],
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

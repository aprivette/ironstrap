<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

/**
 * Creates a sidebar taxonomy in ACF Options page
 * This function was created to solve the problem that ACF cannot query sidebars.
 * Since we only need or even want to query sidebars registered in IronStrap Options, we can simply store the create_sidebars field values in a taxonomy of the IronStrap Options page.
 */
add_action('init', function ()
{
    if (get_field('create_sidebars', 'option')) {
        register_taxonomy(
            'acf-sidebars',
            'acf-field-group',
            array(
                'label' => __('Sidebars'),
                'rewrite' => array( 'slug' => 'acf-sidebars' )
            )
        );

        register_taxonomy_for_object_type('acf-sidebars', 'acf-field-group');

        $iron_sidebars = get_field('create_sidebars', 'option');

        $sidebars = [];
        foreach ($iron_sidebars as $key => $value) :
            $sidebars[] = $value['sidebar_name'];
        endforeach;

        wp_set_object_terms('acf-field-group', $sidebars, 'acf-sidebars');
    }
});

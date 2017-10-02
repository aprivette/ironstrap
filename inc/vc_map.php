<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

add_action('vc_before_init', function ()
{
    vc_map(array(
        'name' => __('IronStrap Retina Image'),
        'base' => 'ironstrap_retina_image',
        "icon" => get_template_directory_uri() . "/admin/images/ironistic-vc.png",
        'category' => __('Content'),
        'params' => array(
            array(
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Image Width'),
                'param_name' => 'width',
                'description' => __('The width of the image in pixels.')
            ),
            array(
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Image Height'),
                'param_name' => 'height',
                'description' => __('The height of the image in pixels.')
            ),
            array(
                'type' => 'attach_image',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Standard Resolution Image'),
                'param_name' => 'standard_image',
                'description' => __('Should be the same resolution as defined above.')
            ),
            array(
                'type' => 'attach_image',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Retina Resolution Image'),
                'param_name' => 'retina_image',
                'description' => __('Should be exactly double the resolution of the standard resolution image.')
            )
        )
    ));
});

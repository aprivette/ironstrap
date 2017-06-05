<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$prefix = 'ironstrap_';

// Retina image shortcode - maps to VC
add_shortcode($prefix.'retina_image', function ($atts) {
    extract(shortcode_atts(array(
        'width' => null,
        'height' => null,
        'retina_image' => null,
        'standard_image' => null,
    ), $atts));

    $standard = wp_get_attachment_image_src($standard_image, 'full');
    $retina = wp_get_attachment_image_src($retina_image, 'full');

    $output = '<div class="retina-image" data-retina-image="' . $retina[0] . '" style="background-size: ' . $width . 'px ' . $height . 'px; background-image: url(' . $standard[0] . '); width: ' . $width . 'px; height: ' . $height . 'px;"></div>';

    return $output;
});

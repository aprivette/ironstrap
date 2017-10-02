<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */
?>
 
<a href="<?php echo get_home_url(); ?>">
    <?php
    if(ironstrap_get_field('logo', 'option')) {
        echo do_shortcode('[ironstrap_retina_image width="' . get_field('logo_width', 'option') . '" height="' . get_field('logo_height', 'option') . '" retina_image="' . get_field('retina_logo', 'option') . '" standard_image="' . get_field('logo', 'option') . '"]');
    }
    ?>
</a>

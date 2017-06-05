<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<head>
    
    <meta charset="utf-8">
    
    <meta charset="<?php bloginfo('charset'); ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
    
    <?php if (class_exists('acf')) {
        if (get_field('top_header_sidebars', 'option')) {
            get_template_part('template-parts/header/header', 'widgets');
        }
    } ?>
    
    <header id="site-header-wrapper">
        
        <div class="container cf">
            
            <?php get_template_part('template-parts/header/header', 'logo'); ?>
            
            <?php get_template_part('template-parts/navigation/navigation', 'header'); ?>
            
        </div><!-- .container -->
        
    </header>

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
    
    <header id="site-header-wrapper">
        
        <?php if (ironstrap_get_field('top_header_sidebars', 'option')) {
            get_template_part('template-parts/header/header', 'sidebars');
        } ?>
        
        <div class="container">
            
            <div class="row align-items-center">
            
                <div class="col-8 col-md-4 col-lg-3">
                
                    <?php get_template_part('template-parts/header/header', 'logo'); ?>
                    
                </div>
                
                <div class="col-4 col-md-8 col-lg-9">
                    
                    <?php get_template_part('template-parts/navigation/navigation', 'header'); ?>
                    
                </div>
                
            </div><!-- .row -->
            
        </div><!-- .container -->
        
    </header><!-- #site-header-wrapper -->

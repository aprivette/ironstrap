<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

 get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div id="content">
    
        <main class="site-main" id="main">
            
            <div class="container">
            
                <?php
                if (class_exists('acf')) {
                    if (get_field('404', 'option')) {
                        the_field('404', 'option');
                    }
                }
                ?>
                
            </div><!-- .container -->

        </main><!-- #main -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>

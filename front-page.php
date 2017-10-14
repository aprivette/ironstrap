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
                
                <div class="row">
                    
                    <div class="col">
                    
                        <?php while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/page/content', 'front-page');
                        } ?>
                    
                    </div><!-- .col -->
                    
                </div><!-- .row -->
                
            </div><!-- .container -->
    
        </main><!-- #main -->
    
    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>

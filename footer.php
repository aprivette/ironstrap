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

<footer id="site-wrapper-footer">
    
    <div class="container">
        
        <div class="row">
        
            <div class="col">
        
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => false, 'depth' => 1, 'menu_class' => 'footer-menu')); ?><!-- footer menu end -->
    
            </div><!-- .col -->
            
        </div><!-- .row -->
    
    </div><!-- .container -->
    
    <?php if (ironstrap_get_field('top_footer_sidebars', 'option')) {
        get_template_part('template-parts/footer/footer', 'widgets-top');
    } ?><!-- top footer sidebars end -->
    
    <?php if (ironstrap_get_field('bottom_footer_sidebars', 'option')) {
        get_template_part('template-parts/footer/footer', 'widgets-bottom');
     } ?><!-- bottom footer sidebars end -->

</footer><!-- #site-wrapper-footer -->

<?php wp_footer(); ?>

</body>

</html>

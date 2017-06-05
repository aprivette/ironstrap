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

<footer class="wrapper" id="site-wrapper-footer">

    <div class="container">

        <div class="site-footer">
            
            <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => false, 'depth' => 1, 'menu_class' => 'footer-menu cf')); ?><!-- footer men end -->
            
            <?php if (class_exists('acf')) : if (get_field('top_footer_sidebars', 'option')) :
                
                get_template_part('template-parts/footer/footer', 'widgets-top');
                
            endif; endif; ?><!-- top footer sidebars end -->
            
            <?php if (class_exists('acf')) : if (get_field('bottom_footer_sidebars', 'option')) : 
                
                get_template_part('template-parts/footer/footer', 'widgets-bottom');
                
             endif; endif; ?><!-- bottom footer sidebars end -->

        </footer>

    </div><!-- .container -->

</footer><!-- #site-wrapper-footer -->

<?php wp_footer(); ?>

</body>

</html>

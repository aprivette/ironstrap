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

<div class="wrapper" id="wrapper-footer">

    <div class="container">

        <footer class="site-footer">
			
			<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => false, 'depth' => 1, 'menu_class' => 'footer-menu cf')); ?><!-- footer men end -->
			
			<?php if (class_exists('acf')) : if (get_field('top_footer_sidebars', 'option')) :
				
				get_template_part('template-parts/footer/footer', 'widgets-top');
				
			endif; endif; ?><!-- top footer sidebars end -->
			
			<?php if (class_exists('acf')) : if (get_field('bottom_footer_sidebars', 'option')) : 
				
				get_template_part('template-parts/footer/footer', 'widgets-bottom');
				
			 endif; endif; ?><!-- bottom footer sidebars end -->

        </footer>

    </div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

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
					if(class_exists('acf')) :
						if(get_field('404', 'option')) :
							the_field('404', 'option');
						endif;
					endif;
				?>
				
			</div><!--container -->

		</main><!-- #main -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

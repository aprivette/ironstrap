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
	
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'template-parts/page/content', 'front-page' ); ?>
		
				<?php endwhile; // end of the loop. ?>
				
			</div>
	
		</main><!-- #main -->
	
	</div><!-- #content -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

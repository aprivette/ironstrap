<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 * Credit: https://github.com/Automattic/theme-components/blob/master/search.php
 */

 get_header(); ?>

    <section id="site-main-wrapper" class="row" role="main">
        
        <?php if ( have_posts() ) : ?>
            
        <div class="container cf">
            
            <h1>Search Results for: <?php echo '<span>' . esc_html( get_search_query() ) . '</span>'; ?></h1>

        <?php
        // Start the loop.  
        while ( have_posts() ) : the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/search/content', 'search' );

        // End the loop.
        endwhile;

        // Previous/next page navigation.
        the_posts_pagination( array(
            'prev_text'          => __( 'Previous' ),
            'next_text'          => __( 'Next' ),
        ) );
    
        // If no content, include the "No posts found" template.
        else :
            
    
        endif;
        ?>

        </div>
    </section><!-- .content-area -->
    
<?php get_footer(); ?>
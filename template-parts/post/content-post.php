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

<div class="container">
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="entry-content">
            
            <?php the_content(); ?>
            
        </div><!-- .entry-content -->
        
    </article><!-- #post-## -->
    
</div><!-- .container -->

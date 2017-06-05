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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title">&bull;&nbsp;&nbsp;<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </div><!-- .entry-header -->
</article><!-- #post-## -->

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
        
        <?php
        if (ironstrap_get_field('sidebar_column_breakpoint', 'option')) {
            $breakpoint = get_field('sidebar_column_breakpoint', 'option');
        } else {
            $breakpoint = 'md';
        }
        if (ironstrap_get_field('sidebar')) {
            if (get_field('sidebar_orientation') == 'left') {
                $sidebar_width = intval(get_field('left_sidebar_width', 'option'));
            } else {
                $sidebar_width = intval(get_field('right_sidebar_width', 'option'));
            }
            if (get_field('reverse_column_wrap', 'option')) {
                $reverse_column_wrap = "flex-column-reverse flex-{$breakpoint}-row";
            }
        }
        if (!isset($sidebar_width)) {
            $sidebar_width = 0;
        }
        $content_width = 12 - $sidebar_width;
        ?>
        
        <main class="site-main" id="main">
            
            <div class="container">
                
                <div class="row <?php echo (isset($reverse_column_wrap) ? $reverse_column_wrap : null); ?>">
                
                    <?php get_template_part('template-parts/sidebars/sidebar', 'left'); ?>
                    
                    <div class="<?php echo "col-{$breakpoint}-{$content_width}"; ?>">
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            
                            <div class="entry-content">
                                
                                <?php while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/page/content', 'page');
                                } ?>
                                
                            </div><!-- .entry-content -->
                            
                        </article>
                            
                    </div><!-- .col -->
                
                    <?php get_template_part('template-parts/sidebars/sidebar', 'right'); ?>
                
                </div><!-- .row -->
                    
            </div><!-- .container -->
    
        </main><!-- #main -->
    
    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>

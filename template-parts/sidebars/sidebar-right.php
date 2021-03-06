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
    
<?php if(ironstrap_get_field('sidebar')) : ?>
    
    <?php if (get_field('sidebar_orientation') == 'right') : ?>

        <div class="col-<?php the_field('sidebar_column_breakpoint', 'option'); ?>-<?php the_field('right_sidebar_width', 'option'); ?>">
            
            <ul class="right-sidebar">
                
                <?php dynamic_sidebar(get_field('sidebar_type')->name); ?>
                
            </ul><!-- right sidebar -->
        
        </div><!-- .col -->
    
    <?php endif; ?>

<?php elseif (ironstrap_get_field('force_child_sidebars', $post->post_parent) && ironstrap_get_field('sidebar_orientation', $post->post_parent) == 'right') : ?>

    <div class="col-<?php the_field('sidebar_column_breakpoint', 'option'); ?>-<?php the_field('right_sidebar_width', 'option'); ?>">
        
        <ul class="right-sidebar">
            
            <?php dynamic_sidebar(get_field('sidebar_type', $post->post_parent)->name); ?>
            
        </ul><!-- right sidebar -->
    
    </div><!-- .col -->
    
<?php endif; ?>

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
 
<?php if(class_exists('acf')) : ?>
    
    <?php if(get_field('sidebar')) : ?>
        
        <?php if (get_field('sidebar_orientation') == 'right') : ?>

            <div class="col-md-<?php the_field('right_sidebar_width', 'option'); ?>">
                
                <aside class="right-sidebar">
                    
                    <?php dynamic_sidebar(get_field('sidebar_type')->name); ?>
                    
                </aside><!-- right sidebar -->
            
            </div><!-- .col -->
        
        <?php endif; ?>

    <?php elseif (get_field('force_child_sidebars', $post->post_parent) && get_field('sidebar_orientation', $post->post_parent) == 'right') : ?>
    
        <div class="col-md-<?php the_field('right_sidebar_width', 'option'); ?>">
            
            <aside class="right-sidebar">
                
                <?php dynamic_sidebar(get_field('sidebar_type', $post->post_parent)->name); ?>
                
            </aside><!-- right sidebar -->
        
        </div><!-- .col -->
        
    <?php endif; ?>

<?php endif; ?>

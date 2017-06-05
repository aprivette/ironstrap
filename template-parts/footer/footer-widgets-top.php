<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$top_footer_sidebars = get_field('top_footer_sidebars', 'option'); ?>

<div class="top-footer-sidebars">

    <div class="row no-gutters">
        
        <?php if ($top_footer_sidebars == 1) : ?>

            <div class="col-md-12" id="top-footer-sidebar">
                
                <?php if (is_active_sidebar('top_footer_sidebar')) { dynamic_sidebar('top_footer_sidebar'); } ?>
                
            </div><!-- top footer sidebar end -->
    
        <?php endif; ?>
        
        <?php if ($top_footer_sidebars == 2 || $top_footer_sidebars == 3 || $top_footer_sidebars == 4) : ?>

            <div class="<?php if($top_footer_sidebars == 2) { echo esc_html('col-md-6'); } elseif($top_footer_sidebars == 3) { echo esc_html('col-md-4'); } else { echo esc_html('col-md-3'); } ?>" id="top-footer-sidebar-left">
                
                <?php if (is_active_sidebar('top_footer_left')) { dynamic_sidebar('top_footer_left'); } ?>
                
            </div><!-- top footer sidebar left end -->
            
            <?php if ($top_footer_sidebars == 4) : ?>

                <div class="col-md-3" id="top-footer-sidebar-inner-left">
                    
                    <?php if (is_active_sidebar('top_footer_inner_left')) { dynamic_sidebar('top_footer_inner_left'); } ?>
                    
                </div><!-- top footer sidebar inner left end -->
        
            <?php endif; ?>
            
            <?php if ($top_footer_sidebars == 3) : ?>

                <div class="col-md-4" id="top-footer-sidebar-center">
                    
                    <?php if (is_active_sidebar('top_footer_center')) { dynamic_sidebar('top_footer_center'); } ?>
                    
                </div><!-- top footer sidebar inner left end -->
        
            <?php endif; ?>
            
            <?php if ($top_footer_sidebars == 4) : ?>

                <div class="col-md-3" id="top-footer-sidebar-inner-right">
                    
                    <?php if (is_active_sidebar('top_footer_inner_right')) { dynamic_sidebar('top_footer_inner_right'); } ?>
                    
                </div><!-- top footer sidebar inner right end -->
        
            <?php endif; ?>
            
            <div class="<?php if($top_footer_sidebars == 2) { echo esc_html('col-md-6'); } elseif($top_footer_sidebars == 3) { echo esc_html('col-md-4'); } else { echo esc_html('col-md-3'); } ?>" id="top-footer-sidebar-right">
                
                <?php if (is_active_sidebar('top_footer_right')) { dynamic_sidebar('top_footer_right'); } ?>
                
            </div><!-- top footer sidebar right end -->
    
        <?php endif; ?>
        
    </div><!-- .row -->
    
</div><!-- top footer sidebars end -->
<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$bottom_footer_sidebars = get_field('bottom_footer_sidebars', 'option'); ?>

<div class="bottom-footer-sidebars">
    
    <div class="row no-gutters">
        
        <?php if ($bottom_footer_sidebars == 1) : ?>
        
            <div class="col-md-12" id="bottom-footer-sidebar">
                
                <?php if (is_active_sidebar('bottom_footer_sidebar')) { dynamic_sidebar('bottom_footer_sidebar'); } ?>
                
            </div><!-- bottom footer sidebar end -->
    
        <?php endif; ?>
        
        <?php if ($bottom_footer_sidebars == 2 || $bottom_footer_sidebars == 3) : ?>
        
            <div class="<?php if($bottom_footer_sidebars == 2) { echo esc_html('col-md-6'); } else { echo esc_html('col-md-4'); } ?>" id="bottom-footer-left-sidebar">
                
                <?php if (is_active_sidebar('bottom_footer_left')) { dynamic_sidebar('bottom_footer_left'); } ?>
                
            </div><!-- bottom footer left sidebar end -->
            
            <?php if ($bottom_footer_sidebars == 3) : ?>
        
                <div class="col-md-4" id="footer-center-sidebar">
                    
                    <?php if (is_active_sidebar('bottom_footer_center')) { dynamic_sidebar('bottom_footer_center'); } ?>
                    
                </div><!-- bottom footer center sidebar end -->
                
            <?php endif; ?>
        
            <div class="<?php if($bottom_footer_sidebars == 2) { echo esc_html('col-md-6'); } else { echo esc_html('col-md-4'); } ?>" id="bottom-footer-right-sidebar">
                
                <?php if (is_active_sidebar('bottom_footer_right')) { dynamic_sidebar('bottom_footer_right'); } ?>
                
            </div><!-- bottom footer right sidebar end -->
            
        <?php endif; ?>
    
    </div><!-- .row -->
    
</div><!-- bottom footer end -->
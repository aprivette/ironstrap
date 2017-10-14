<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$top_header_sidebars = get_field('top_header_sidebars', 'option'); ?>

<div class="header-top">
            
    <div class="container">
        
        <div class="row">
            
            <?php if ($top_header_sidebars == 1) : ?>
            
                <div class="col-md-12" id="header-sidebar">
                    
                    <?php if (is_active_sidebar('header_sidebar')) { dynamic_sidebar('header_sidebar'); } ?>
                    
                </div><!-- header sidebar end -->
        
            <?php endif; ?>
            
            <?php if ($top_header_sidebars == 2 || $top_header_sidebars == 3) : ?>
            
                <div class="<?php if($top_header_sidebars == 2) { echo esc_html('col-md-6'); } else { echo esc_html('col-md-4'); } ?>" id="header-left-sidebar">
                    
                    <?php if (is_active_sidebar('header_left')) { dynamic_sidebar('header_left'); } ?>
                    
                </div><!-- header left sidebar end -->
                    
                <?php if ($top_header_sidebars == 3) : ?>
        
                    <div class="col-md-4" id="header-center-sidebar">
                        
                        <?php if (is_active_sidebar('header_center')) { dynamic_sidebar('header_center'); } ?>
                        
                    </div><!-- header center end -->
                    
                <?php endif; ?> 
            
                <div class="<?php if($top_header_sidebars == 2) { echo esc_html('col-md-6'); } else { echo esc_html('col-md-4'); } ?>" id="header-right-sidebar">
                    
                    <?php if (is_active_sidebar('header_right')) { dynamic_sidebar('header_right'); } ?>
                    
                </div><!-- header right sidebar end -->
                
            <?php endif; ?> 
            
        </div><!-- .row -->
    
    </div><!-- .container -->
    
</div><!-- .header-top -->
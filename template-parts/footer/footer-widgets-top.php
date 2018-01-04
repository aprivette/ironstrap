<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$top_footer_sidebars = get_field('top_footer_sidebars', 'option');

if (get_field('bottom_footer_sidebars_breakpoint', 'option')) {
    $breakpoint = get_field('bottom_footer_sidebars_breakpoint', 'option');
} else {
    $breakpoint = 'md';
} ?>

<div class="top-footer-sidebars">
    
    <div class="container">
        
        <div class="row">
                
            <?php for ($i = 1; $i <= $top_footer_sidebars; $i++) : ?>
    
                <div class="col-<?php echo $breakpoint; ?> top-footer-sidebar-<?php echo $i; ?>">
                    
                    <?php if (is_active_sidebar("top_footer_{$i}")) { dynamic_sidebar("top_footer_{$i}"); } ?>
                    
                </div><!-- top footer sidebar end -->
        
            <?php endfor; ?>
            
        </div><!-- .row -->
        
    </div><!-- .container -->
    
</div><!-- top footer sidebars end -->
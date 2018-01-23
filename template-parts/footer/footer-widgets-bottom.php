<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$bottom_footer_sidebars = get_field('bottom_footer_sidebars', 'option');

if (get_field('top_footer_sidebars_breakpoint', 'option')) {
    $breakpoint = get_field('top_footer_sidebars_breakpoint', 'option');
} else {
    $breakpoint = 'md';
} ?>

<div class="bottom-footer-sidebars">

    <div class="container">
        
        <div class="row">
            
            <?php for ($i = 1; $i <= $bottom_footer_sidebars; $i++) : ?>
            
                <div class="col-<?php echo $breakpoint; ?> bottom-footer-sidebar-<?php echo $i; ?>">
                    
                    <ul>
                    
                        <?php if (is_active_sidebar("bottom_footer_{$i}")) { dynamic_sidebar("bottom_footer_{$i}"); } ?>
                    
                    </ul>
                    
                </div><!-- bottom footer sidebar end -->
            
            <?php endfor; ?>
        
        </div><!-- .row -->
    
    </div><!-- .container -->

</div><!-- bottom footer end -->
<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

$top_header_sidebars = get_field('top_header_sidebars', 'option');

if (get_field('top_header_sidebars_breakpoint', 'option')) {
    $breakpoint = get_field('top_header_sidebars_breakpoint', 'option');
} else {
    $breakpoint = 'md';
} ?>

<div class="header-top-sidebars">
            
    <div class="container">
        
        <div class="row">
            
            <?php for ($i = 1; $i <= $top_header_sidebars; $i++) : ?>
            
                <div class="col-<?php echo $breakpoint; ?> header-top-sidebar-<?php echo $i; ?>">

                    <ul>
                    
                        <?php if (is_active_sidebar("top_header_{$i}")) { dynamic_sidebar("top_header_{$i}"); } ?>
                        
                    </ul>
                    
                </div><!-- top header sidebar end -->
        
            <?php endfor; ?>
            
        </div><!-- .row -->
    
    </div><!-- .container -->
    
</div><!-- top header sidebars end -->
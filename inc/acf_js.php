<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Adds custom javascript to the head
add_action('wp_head', function() {
	if(get_field('header_javascript', 'option')) {
		$js = get_field('header_javascript', 'option');
		$output = '';
		$output .= '<script type="text/javascript">';
		
		foreach($js as $script) :
			$output .= $script['javascript'];
	    endforeach;
	    
	    $output .= '</script>';
	    
	    echo $output;
	}
});

// Adds custom javascript to the footer
add_action('wp_footer', function() {
	if(get_field('header_javascript', 'option')) {
		$js = get_field('footer_javascript', 'option');		
		$output = '';
		$output .= '<script type="text/javascript">';
		
		foreach($js as $script) :
			$output .= $script['javascript'];
	    endforeach;
	    
	    $output .= '</script>';
	    
	    echo $output;
	}
});

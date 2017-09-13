<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */
 
// Enable hidden styles dropdown menu in TinyMCE
add_filter( 'mce_buttons_2', function( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
});

// Add new TinyMCE options
add_filter('tiny_mce_before_init', function($settings) {
	if(get_field('editor_styles', 'option')) {
		$elements = get_field('editor_styles', 'option');
	
	    $style_formats = array();
	    
	    $els = [
	    	'div' => 'block',
	    	'a' => 'selector',
	    	'span' => 'inline',
	    	'p' => 'selector',
	    	'h1' => 'selector',
	    	'h2' => 'selector',
	    	'h3' => 'selector',
			'h4' => 'selector',
			'h5' => 'selector',
			'h6' => 'selector',
	    ];
	    
	    foreach($elements as $key => $value) {
		    if($value['css_selector'] == 'div')
				$wrapper = true;
			else
				$wrapper = false;
				
			$selector = $value['css_selector'];
				
		    $style_formats[] = array(
	            'title' => $value['title'],
	            $els[$selector] => $value['css_selector'],
	            'classes' => $value['css_class'],
	            'wrapper' => $wrapper
	        );
	    }
	    
	    $settings['style_formats'] = json_encode( $style_formats );
	
	    return $settings;
	}
});

// Sneakily remove the color picker to save PM's from themselves
add_filter('mce_buttons_2', function($buttons) {
      $remove = 'forecolor';
      
      if (($key = array_search($remove, $buttons)) !== false)
		unset($buttons[$key]);

      return $buttons;
});

<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Set up redirects defined in IronStrap Options
add_action('template_redirect', function() {
	if(get_field('redirects', 'option') && !is_home()) {
		$redirects = get_field('redirects', 'option');
		global $post;
		
		foreach($redirects as $redirect) {
			if($redirect['page'] == $post->ID) {
				if($redirect['external'])
					wp_redirect($redirect['redirect_url'], $redirect['redirect_type']);
				else
					wp_redirect(get_permalink($redirect['redirect_page']), $redirect['redirect_type']);
			}
		}
	}
});

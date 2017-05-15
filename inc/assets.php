<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */ 

class IronStrap_Assets
{
	function __construct($init_args)
	{
        $this->args = $init_args;
    }

	// Load CSS files
	public function load_css()
	{
		add_action( 'wp_enqueue_scripts', function() {
			foreach($this->args as $arg) {
				// Register style
				wp_register_style( $arg['name'], get_stylesheet_directory_uri() . $arg['path'], array(), '1.0', $arg['media'] );
				// Load style
				wp_enqueue_style( $arg['name'] );
			}
		});
	}
	
	// Load JS files
	public function load_js()
	{
		add_action( 'wp_enqueue_scripts', function() {
			foreach($this->args as $arg) {
				// Register script
				wp_register_script( $arg['name'], get_stylesheet_directory_uri() . $arg['path'], $arg['dep'], '1.0', $arg['footer'] );
				// Load script
				wp_enqueue_script( $arg['name'] );
			}
		});
	}
}

// Define styles
$styles = [
	[
		"name" => "site",
		"path" => "/css/min/site.min.css",
		"media" => "screen"
	],
	[
		"name" => "style",
		"path" => "/style.css",
		"media" => "screen"
	],
];

// Define scripts
$scripts = [
	[
		"name" => "site",
		"path" => "/js/min/site.min.js",
		"dep" => ["jquery"],
		"footer" => true
	]
];

// Instantiate class and execute load functions
$iron_styles = new IronStrap_Assets($styles);
$iron_styles->load_css();
$iron_scripts = new IronStrap_Assets($scripts);
$iron_scripts->load_js();

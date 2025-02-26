<?php
/*
Plugin Name: Awesome Color Palettes
Plugin URI: https://halgatewood.com/freebies/awesome-color-palettes/
Description: A cool way to display color palettes on your WordPress site.
Author: Hal Gatewood
Author URI: http://www.halgatewood.com
Text Domain: awesome_color_palettes
Domain Path: /languages
Version: 1.0

*/

// SETUP
add_action( 'plugins_loaded', 'awesome_color_palettes_setup' );
function awesome_color_palettes_setup() 
{
	add_action( 'init', 'awesome_color_palettes_init' );
	add_action( 'wp_enqueue_scripts', 'awesome_color_palettes_enqueue_scripts' );
}

// INIT
function awesome_color_palettes_init()
{
	// LOAD TEXT DOMAIN
	load_plugin_textdomain( 'awesome_color_palettes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
	// SHORTCODE
	add_shortcode( 'awe_palette', 'awesome_color_palettes_shortcode' );
}

// CSS
function awesome_color_palettes_enqueue_scripts()
{
	wp_enqueue_style( 'awesome-color-palettes-style', plugins_url('/awesome-color-palettes.css', __FILE__) );
}


// SHORTCODE HELPER
function awesome_color_palettes_shortcode( $args )
{
	ob_start();
	if( isset($args['colors']) )
	{
		awesome_color_palettes( explode( ",", $args['colors'] ) );
	}
	elseif( isset($args['color']) ) // FOR TYPOS
	{
		awesome_color_palettes( explode( ",", $args['color'] ) );
	}
	else
	{
		echo '';
	}
	
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function awesome_color_palettes( $colors )
{
	$palette = array();
	foreach( $colors as $color )
	{
		$color = trim( str_replace("#", "", $color)  );
		
		if( !$color ) continue;
		if( strlen( $color ) != 6 AND  strlen( $color ) != 3) continue;

		$palette[] = $color; // SANATIZE, WE'LL ADD BACK LATER
	}
	
	// USE awesome-color-palette.php, CREATE YOUR OWN AND PUT IN YOUR THEME
	$template = locate_template( array( "awesome-color-palette.php" ) );
			
	// NO CUSTOM, LOOK IN PLUGIN
	if( !$template )
	{
		$template = dirname(__FILE__) . "/awesome-color-palette.php";
	}
	
	// LOAD TEMPLATE
	if( $template )
	{
		include( $template );
	}
}


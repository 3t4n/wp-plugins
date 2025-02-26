<?php
/*
	Plugin Name: Ads For Old Posts
	Plugin URI: https://vegasgeek.com/
	Description:  Ads For Old Posts inserts ads into posts older than a certain amount of days.
	Author: John Hawkins
	Author URI: https://vegasgeek.com/
	Version: 2.1.1
*/

define( 'AFOP_VERSION', '2.1.1' );

add_action( 'admin_init', 'afop_options_init' );

function afop_options_init() {
	register_setting( 'afop_options_group', 'afop_option' );
}

/**
 * Grabs all the options and returns the ad block to display on a page or post
 * @return string
 */
function build_afop_block( ) {
	global $post;
	// grab our variables
	$options = get_option( 'afop_option' );
	$show_float = '';
	$show_border = '';
	$ad_layout = '';

	// see if post is older than set age
	if( strtotime( '-' . $options['afop_age'] . ' days' ) > strtotime( $post->post_date ) ) {
		// deal with float option
		switch ( esc_attr( $options['afop_float'] ) ) {
			case "left":
				$show_float = "float:left;";
			break;
			
			case "right":
				$show_float = "float:right;";
			break;
		}
		
		// deal with border
		if ( $options['afop_border'] != 'none' ) {
			// deal with border color
			if ( $options['afop_border_color'] ) {
				$show_border_color = ' #' . esc_attr( $options['afop_border_color'] );
			}
			
			if ( $options['afop_border'] == 'all' ) {
				$show_border = ' border: ' . esc_attr( $options['afop_border_weight'] ) . ' ' . esc_attr( $options['afop_border_style'] ) . ' ' . $show_border_color .'; ';
			} else {					
				$show_border = 'border-' . $options['afop_border'] . ': ' . esc_attr( $options['afop_border_weight'] ) . ' ' . esc_attr( $options['afop_border_style'] ) . $show_border_color . '; ';
			}
		}
		
		// deal with margin
		if ($options['afop_margin'] != 'none' ) {
			if ( $do_margin == 'all' ) {
				$show_margin = 'margin: ' . esc_attr( $options['afop_margin_amount'] ) . 'px;';
			} else {
				$show_margin = 'margin-' . $options['afop_margin'] . ': ' . esc_attr( $options['afop_margin_amount'] ) . 'px;';
			}
		} else {
			$show_margin = '';
		}
		
		// deal with background color
		if ( esc_attr( $options['afop_background'] ) ) {
			$show_background = 'background-color: ' . esc_attr( $options['afop_background'] ) . '; ';
		} else {
			$show_background = '';
		}
		
		// deal with width
		if ( esc_attr( $options['afop_width'] ) ) {
			$show_width = 'width: ' . esc_attr( $options['afop_width'] ) . esc_attr( $options['afop_width_type'] ) . '; ';
		} else {
			$show_width = '';
		}

		// deal with text alignment
		if ( esc_attr( $options['afop_text_align'] ) ) {
			$show_textalign = 'text-align: ' . esc_attr( $options['afop_text_align'] ) . '; ';
		}
		
		// switch to using divs
		if ( esc_attr( $options['afop_spandiv'] ) == 'div' ) {
			$ad_layout = '<div align="' . esc_attr( $options['afop_align'] ) . '" style="display: block; ' . $show_background . $show_float . $show_border . $show_margin . $show_width . $show_textalign . '" display: inline;">' . $options['afop_ad'] . '</div>';
		} else {
			// layout the ad
			$ad_layout = '<span align="' . esc_attr( $options['afop_align'] ) . '" style="display: block; ' . $show_background . $show_float . $show_border . $show_margin . $show_width . $show_textalign . '" display: inline;">' . $options['afop_ad'] . '</span>';
		}
	}

	// pass the block back
	return $ad_layout;
}

function ads_for_old_posts( $the_content ) {

	// only continue if on a single page
	if( is_single() ) {

		$options = get_option( 'afop_option' );
		$ad_layout = build_afop_block();
	
		// append our ad block to the content block
		if ( $options['afop_loc'] == 'end' ) {
			$the_content = $the_content . $ad_layout;
		} elseif ( $options['afop_loc'] == 'start' ) {
			$the_content = $ad_layout . $the_content;
		}
	}

	// pass the data back to WordPress
	return $the_content;

}

// Add our content to the_content
add_filter( 'the_content', 'ads_for_old_posts' );

// add a shortcode
add_shortcode( 'afop', 'ads_for_old_posts_shortcode' );

function ads_for_old_posts_shortcode() {
	return build_afop_block();
}

// admin setup stuff
add_action( 'admin_menu', 'afop_add_options_page' );

function afop_add_options_page() {
	add_options_page( 'Ads For Old Posts', 'Ads for Old Posts', 'manage_options', __FILE__, 'afop_options' );
}

// Admin options page
function afop_options() {
    include ( 'options_ads_for_old_posts.php' );
}

// Upgrade process
register_activation_hook( __FILE__, 'afop_activation' );

function afop_activation() {
	$options = get_option( 'afop_option' );

	if( !isset( $options['afop_version'] ) ) {
		// 1.5 or older
		// Update old settings to new format
		
		$options['afop_ad'] = get_option( 'afop_ad' );
		$options['afop_age'] = get_option( 'afop_age' );
		$options['afop_align'] = get_option( 'afop_align' );
		$options['afop_loc'] = get_option( 'afop_loc' );
		$options['afop_float'] = get_option( 'afop_float' );
		$options['afop_margin'] = get_option( 'afop_margin' );
		$options['afop_margin_amount'] = get_option( 'afop_margin_amount' );
		$options['afop_border'] = get_option( 'afop_border' );
		$options['afop_border_weight'] = get_option( 'afop_border_weight' );
		$options['afop_border_style'] = get_option( 'afop_border_style' );
		$options['afop_border_color'] = get_option( 'afop_border_color' );
		$options['afop_background'] = get_option( 'afop_background' );
		$options['afop_text_align'] = get_option( 'afop_text_align' );
		$options['afop_width'] = get_option( 'afop_width' );
		$options['afop_width_type'] = get_option( 'afop_width_type' );
		$options['afop_spandiv'] = get_option( 'afop_spandiv' );
		
		// update version
		$options['afop_version'] = AFOP_VERSION;

		update_option( 'afop_option', $options );
	} else {
		// at least version 2
		// Do any version specific updates		
		
		if( $options['afop_version'] < AFOP_VERSION ) {
		
			// update version
			$options['afop_version'] = AFOP_VERSION;
			update_option( 'afop_option', $options );

		}
	}
}

/**
 * Add color picker
 */
function mw_enqueue_color_picker( $hook_suffix ) {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'afop-color', plugins_url('afop-color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );

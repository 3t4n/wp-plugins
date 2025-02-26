<?php
/*
Plugin Name: Avadanta Companion
Plugin URI:
Description: Avadanta Companion plugin adds Extra sections and functionality to the Avadnata theme. This plugin for only Avadnata theme. Avadanta Companion is a plugin build for enhance the functionality of Avadanta WordPress Theme.
Version: 1.0.2
Author: avadantathemes
Author URI: https://www.avadantathemes.com/
Text Domain: avadanta-companion
*/
define( 'AVATA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AVATA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
function avata_activate() {
	$theme = wp_get_theme();
	

	if ( 'Avadanta' == $theme->name ){
		
		require_once('library/avadanta/customizer-sections/customizer-slider-section.php');
		require_once('library/avadanta/customizer-sections/customizer-about-section.php');	
		require_once('library/avadanta/customizer-sections/customizer-service-section.php');
		require_once('library/avadanta/customizer-sections/customizer-portfolio-section.php');
		require_once('library/avadanta/customizer-sections/customizer-team-section.php');
		require_once('library/avadanta/customizer-sections/customizer-testimonial-section.php');
		require_once('library/avadanta/customizer-sections/customizer-callout-section.php');
		require_once('library/avadanta/customizer-sections/customizer-news-section.php');
		require_once('library/avadanta/customizer-sections/customizer-clients-section.php');
		require_once('library/avadanta/home-sections/avadanta-slider-section.php');

		$section_order = get_theme_mod( 'avadanta_homepage_section_order_list' );

		if( empty( $section_order ) ) {

		    $avadanta_home_section_order = array(


		                           	'0'  => 'aboutus',
		                            '1'  => 'features',
		                            '2'  => 'gallery',
		                            '3'  => 'ourteam',
		                            '4'  => 'testimonial',                                    
		                            '5'  => 'cta',
		                            '6'  => 'ourblog',
		                            '7'  => 'courses',
		                        );
		} else {
		    $save_section_order = explode( ',' , $section_order);

		    $section_order_pop = array_pop( $save_section_order );

		    $avadanta_home_section_order = $save_section_order;
		}

		foreach ( $avadanta_home_section_order  as $key => $value ) {  
			if( $value == 'aboutus' ) {
			require_once('library/avadanta/home-sections/avadanta-about-section.php');
			}
			if( $value == 'features' ) {
			require_once('library/avadanta/home-sections/avadanta-service-section.php');
			}
			if( $value == 'gallery' ) {	
			require_once('library/avadanta/home-sections/avadanta-portfolio-section.php');
			}
			if( $value == 'ourteam' ) {
			require_once('library/avadanta/home-sections/avadanta-team-section.php');
			}
			if( $value == 'testimonial' ) {
			require_once('library/avadanta/home-sections/avadanta-testimonial-section.php');
			}
			if( $value == 'cta' ) {
			require_once('library/avadanta/home-sections/avadanta-callout-section.php');
			}
			if( $value == 'ourblog' ) {
			require_once('library/avadanta/home-sections/avadanta-news-section.php');
			}
			if( $value == 'courses' ) {
			require_once('library/avadanta/home-sections/avadanta-clients-section.php');
			}

		}

		require_once('library/avadanta/customizer.php');
		require_once('library/avadanta/default-data.php');
	}
}
add_action( 'init', 'avata_activate' );
$theme = wp_get_theme();
function avata_avadanta_home_page_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}


function avadanta_comapanion_sanitize_select( $input, $setting ){
         
    $input = sanitize_key($input);
 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                             
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                         
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
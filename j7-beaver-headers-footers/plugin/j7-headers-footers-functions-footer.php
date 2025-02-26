<?php

//If it's the customizer then hook into the previewer, otherwise just run the func as normal

global $wp_customize;
if ( isset( $wp_customize ) ) {
	add_action('customize_preview_init', 'j7hft_insert_custom_footer_locator');
} else{
	j7hft_insert_custom_footer_locator();
}


// Function to determine which location to insert it into based on user settings.

function j7hft_insert_custom_footer_locator(){
	global $element_footer;
	$element_footer = 'footer';
	$settings =  FLCustomizer::get_mods();

	if ( true == isset($settings['bbp_hftcustom_footer_location'])){
		$location = $settings['bbp_hftcustom_footer_location'];
	} else {
		$location = "0";
	}

	if ($location == false OR $location == "0" || $location == "footer_none"){

		return false;

	} elseif ($location == "footer_above_default"){
		$element_footer = 'footer';
		$location = 'fl_after_content';
		add_action( $location , 'j7hft_insert_custom_footer_template' );

	} elseif ($location == "footer_below_default"){
		$element_footer = 'footer';
		$location = 'fl_page_close';
		add_action( $location , 'j7hft_insert_custom_footer_template' );

	} elseif ($location == "footer_below_page"){
		$element_footer = 'footer';
		$location = 'fl_body_close';
		add_action( $location , 'j7hft_insert_custom_footer_template' );
	}

}


// This function checks the page is suitable and then inserts it into where specified.

function j7hft_insert_custom_footer_template() {

	if (get_page_template_slug() !== 'tpl-no-header-footer.php' ){

		$settings =  FLCustomizer::get_mods();
		$template = $settings['bbp_hftcustom_footer_template'];
		global $element_footer;

		if ($template !== '' ){
			echo '<'.$element_footer.' id="djcustom-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" >' . do_shortcode('[fl_builder_insert_layout id="'.$template.'"]') . '</' . $element_footer . '>';
		}
	}
}
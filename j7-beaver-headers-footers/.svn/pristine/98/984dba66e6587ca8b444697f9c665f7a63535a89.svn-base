<?php


// ##############################
// CONTENT ##################
// ##############################



//If it's the customizer then hook into the previewer, otherwise just run the func as normal

global $wp_customize;
if ( isset( $wp_customize ) ) {
	add_action('customize_preview_init', 'j7hft_insert_custom_content_locator');
} else{
	j7hft_insert_custom_content_locator();
}


// Function to determine which location to insert it into based on user settings.

function j7hft_insert_custom_content_locator(){
	global $element_div;
	$element_div = 'div';
	$settings =  FLCustomizer::get_mods();

	if ( true == isset($settings['bbp_hftcustom_content_location'])){
		$location = $settings['bbp_hftcustom_content_location'];
	} else {
		$location = "0";
	}

	if ($location == false || $location == "0" || $location == "content_none"){

		return false;

	} elseif ($location == "fl_before_page"){
		$element_div = 'div';
		$location = 'fl_before_page';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}	elseif ($location == "fl_before_top_bar"){
		$element_div = 'div';
		$location = 'fl_before_top_bar';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_before_header"){
		$element_div = 'div';
		$location = 'fl_before_header';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_header_content_open"){
		$element_div = 'div';
		$location = 'fl_header_content_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_header_content_close"){
		$element_div = 'div';
		$location = 'fl_header_content_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_content_open"){
		$element_div = "div";
		$location = 'fl_content_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_post_top_meta_open"){
		$element_div = 'div';
		$location = 'fl_post_top_meta_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_post_top_meta_close"){
		$element_div = 'div';
		$location = 'fl_post_top_meta_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_post_bottom_meta_open"){
		$element_div = "div";
		$location = 'fl_post_bottom_meta_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_post_bottom_meta_close"){
		$element_div = "div";
		$location = 'fl_post_bottom_meta_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_comments_open"){
		$element_div = "div";
		$location = 'fl_comments_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_comments_close"){
		$element_div = 'div';
		$location = 'fl_comments_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_sidebar_open"){
		$element_div = 'div';
		$location = 'fl_sidebar_open';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_sidebar_close"){
		$element_div = "div";
		$location = 'fl_sidebar_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_after_content"){
		$element_div = "div";
		$location = 'fl_after_content';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_before_footer_widgets"){
		$element_div = "div";
		$location = 'fl_before_footer_widgets';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_after_footer_widgets"){
		$element_div = "div";
		$location = 'fl_after_footer_widgets';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_before_footer"){
		$element_div = 'div';
		$location = 'fl_before_footer';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	} elseif ($location == "fl_after_footer"){
		$element_div = 'div';
		$location = 'fl_after_footer';
		add_action( $location , 'j7hft_insert_custom_content_template' );

	}  elseif ($location == "fl_page_close"){
		$element_div = "div";
		$location = 'fl_page_close';
		add_action( $location , 'j7hft_insert_custom_content_template' );
	}

}


// This function checks the page is suitable and then inserts it into where specified.

function j7hft_insert_custom_content_template() {

	if (get_page_template_slug() !== 'tpl-no-header-footer.php' ){

		$settings =  FLCustomizer::get_mods();
		$template = $settings['bbp_hftcustom_content_template'];
		global $element_div;

		if ($template !== '' ){
			echo '<'.$element_div.' id="djcustom-content" >' . do_shortcode('[fl_builder_insert_layout id="'.$template.'"]') . '</' . $element_div . '>';
		}
	}
}

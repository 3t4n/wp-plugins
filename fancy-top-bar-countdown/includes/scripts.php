<?php

add_action( 'wp_enqueue_scripts', 'nncd_print_custom_css' );

function nncd_print_custom_css() {
	wp_enqueue_style( 'nncd-custom-style', NN_COUNT_DOWN_ASSETS_URI . '/css/custom-css.css' );

	$tb_bg_color					= nncd_get_option( 'nncd_bg_color' );
	$tb_bg_image					= nncd_get_option( 'nncd_bg_image' );
	$tb_button_color 				= nncd_get_option( 'nncd_bg_button_color' );
	$tb_button_text_color 			= nncd_get_option( 'nncd_bg_button_text_color' );
	$tb_button_hover_color 			= nncd_get_option( 'nncd_bg_button_hover_color' );
	$tb_button_text_hover_color 	= nncd_get_option( 'nncd_bg_button_text_hover_color' );
	$tb_message_color 				= nncd_get_option( 'nncd_bg_message_text_color' );
	$tb_cd_color 					= nncd_get_option( 'nncd_text_color' );
	$page_bg						= nncd_get_option( 'nncd_page_bg_style' );
	$page_message_color 			= nncd_get_option( 'nncd_bg_page_message_text_color' );
	$page_cd_color 					= nncd_get_option( 'nncd_bg_page_cd_text_color' );
	$page_button_color 				= nncd_get_option( 'nncd_bg_page_button_color' );
	$page_button_text_color 		= nncd_get_option( 'nncd_bg_page_button_text_color' );
	$page_button_hover_color 		= nncd_get_option( 'nncd_bg_page_button_hover_color' );
	$page_button_text_hover_color 	= nncd_get_option( 'nncd_bg_page_button_text_hover_color' );
	$page_bg_color 					= 'transparent';
	$page_bg_image 					= 'none';

	if ( $page_bg != 'video' ) {
		$page_bg_color 				= nncd_get_option( 'nncd_page_bg_color' );
		$page_bg_image 				= nncd_get_option( 'nncd_page_bg_image' );
	}



	$custom_css = "
		#nn-count-down {
			background-color: {$tb_bg_color};
			background-image: url('$tb_bg_image');
		}

		#nn-count-down .button a{
			background-color: {$tb_button_color};
			color: {$tb_button_text_color};
		}

		#nn-count-down .button:hover a:hover{
			background-color: {$tb_button_hover_color};
			color: {$tb_button_text_hover_color};
		}
   
		#nn-count-down .data span.message{
			color: {$tb_message_color};
		}

		#countdown_time{
			color: {$tb_cd_color};
		}

		#nn-cooming-soon-page-count-down{
			background-color: {$page_bg_color};
			background-image: url('$page_bg_image');
		}

		#nn-cooming-soon-page-count-down span.message{
			color: {$page_message_color};
		}

		#countdown_page_time{
			color: {$page_cd_color};
		}

		#nn-cooming-soon-page-count-down .button a{
			background-color: {$page_button_color};
			color: {$page_button_text_color};
		}

		#nn-cooming-soon-page-count-down .button:hover a:hover{
			background-color: {$page_button_hover_color};
			color: {$page_button_text_hover_color};
		}
	";

	wp_add_inline_style( 'nncd-custom-style', $custom_css );
}
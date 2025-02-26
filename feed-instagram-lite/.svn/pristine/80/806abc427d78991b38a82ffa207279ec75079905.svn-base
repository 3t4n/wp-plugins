<?php

if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

/*-------------------------------------------------------------------------------*/
/*  Create Preview ( AJAX ) - Review Page
/*-------------------------------------------------------------------------------*/
function gifeed_generate_preview() {

	$nonce = $_REQUEST['security'];
	
	if ( ! wp_verify_nonce( $nonce, 'gifeed_preview-nonce' ) ) {
		die( __( 'Security check', 'instagram-feed-pro' ) ); 
	}
	
	if ( !isset( $_POST['post_ID'] ) && !isset( $_GET['feed_id'] )) {
		echo 'Failed to generate Preview! Please try again.';
		die;
		}
		
		$theval = array();
		$allval = array();
		
		// From Editor Page	
		if ( isset( $_POST['post_ID'] ) ) {
			
			$thepost = intval( $_POST['post_ID'] );
			
			$_POST['gifeed_meta'] = gifeed_sanitize_text_or_array_field( $_POST['gifeed_meta'] );
			
			 foreach ((array) $_POST['gifeed_meta'] as $k => $v){
				 $allval[$k] = $v;	
				 }

					gifeed_preview_markup_generator( $thepost, $allval );
					
				}
				
			// From Overview Page	
			elseif ( isset( $_GET['feed_id'] ) && gifeed_post_exists( intval( $_GET['feed_id'] ) ) ) {
								
				$thepost = intval( $_GET['feed_id'] );

				foreach ( get_post_meta( $_GET['feed_id'] ) as $k => $v){
					$theval[$k] = $v;
					
					foreach ( $theval as $k => $v){
						$tmp = get_post_meta( $_GET['feed_id'], $k, true );
						$allval[$k] = $tmp;
						}
					}

					gifeed_preview_markup_generator( $thepost, $allval );

				} else {
					die('Ooops!');
					}

		die('');
		
}
add_action( 'wp_ajax_gifeed_generate_preview', 'gifeed_generate_preview' );
add_action( 'wp_ajax_nopriv_gifeed_generate_preview', 'gifeed_generate_preview' );

/*-------------------------------------------------------------------------------*/
/*  Create Preview ( AJAX ) - Post Edit
/*-------------------------------------------------------------------------------*/
function gifeed_preview_markup_generator ( $id, $val ){

	$gifeed_allowedtags = array(
		'html' => array(), 'head' => array(), 'title' => array(),
		'body' => array( 'class' => array() ),
		'input' => array( 'type' => array(), 'class' => array(), 'value' => array() ),
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array(), 'style' => array() ),
        'img' => array( 'src' => array(), 'class' => array(), 'id' => array(), 'alt' => array(), 'style' => array(), 'width' => array(), 'height' => array() ),
		'div' => array( 'id' => array(), 'class' => array(), 'style' => array(), 'data-localize' => array() ),
        'ul' => array( 'id' => array(), 'style' => array(), 'class' => array() ),
		'li' => array( 'id' => array(), 'style' => array(), 'class' => array() ),
		'span' => array( 'aria-hidden' => array(), 'title' => array(), 'class' => array(), 'id' => array(), 'style' => array() ),
		'style' => array( 'id' => array() ),
		'script' => array( 'id' => array(), 'src' => array() ),
		'link' => array( 'rel' => array(), 'href' => array(), 'media' => array(), 'id' => array() ),
		);
	
	ob_start(); 
	
		echo '<!DOCTYPE html>';
		echo '<html><head><title>'.IFLITE_ITEM_NAME.' ( Preview Mode )</title>';
		
	wp_enqueue_scripts();
	wp_print_styles();
	print_admin_styles();
	wp_print_head_scripts();

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'gifeed_frontend_main_style' );
	wp_enqueue_style( 'gifeed_lightcase_style' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wp-color-picker', admin_url('js/color-picker.min.js'), array(), false );
	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'gifeed_frontend_main_script' );
	wp_enqueue_script( 'gifeed_lightcase_script' );
	
	$css_inline = 'body { background-color: #E6E6E6 !important;}.box { max-width: 80%; margin: 0 auto; padding: 30px;background: #fff;border-right: solid 1px #ccc;border-left: solid 1px #ccc;}.cnt {margin-top: 50px;}.iris-picker {z-index:99999;}';
	
	if ( is_rtl() ) $css_inline = $css_inline.' .gifeed-header-container a, .gifeed-followers, .gifeed-totalposts { float:right;} .media_type {margin: 3px 0 0 5px;}';
	
	wp_add_inline_style( 'gifeed_frontend_main_style', $css_inline );
	wp_add_inline_script( 'wp-color-picker', 'jQuery(document).ready(function($) {
(function ($) {
  $(function () {
    $(".my-input-class").wpColorPicker({
	    change: function(event, ui) {
        $(".box").css("background", ui.color.toString());
    }
	
	});
	$(".wp-color-result").attr("title","Set Background Color");
  });
}(jQuery));
	});' );
		
		echo '</head><body class="prevbody"><div class="box"><div style="display:inline-block; float:right;"><input type="text" class="my-input-class" value="#e9e9e9"></div><div class="cnt">';
				
				
				// START GENERATE FEEDS
				$feed_unique_id = gifeed_RandomString(8);
				require_once IFLITE_PLUGIN_DIR .'/inc/frontend/gifeed-template.php';
				gifeed_markup_generator( $id, $feed_unique_id, 'preview', $val );
				

			wp_print_footer_scripts();
		
		echo '</div></div></body></html>'; 
		$prevw = ob_get_clean();
		
		echo wp_kses( $prevw, $gifeed_allowedtags );
		
}


function gifeed_post_exists( $id ) {
	return is_string( get_post_status( $id ) );
}
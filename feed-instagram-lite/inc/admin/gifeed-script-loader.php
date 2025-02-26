<?php

if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}


// For Global ( still inside our custom post )
function gifeed_global_script() {
	
	$is_rtl = ( is_rtl() ? '-rtl' : '' );
	
	wp_enqueue_style( 'gifeed_admin_styles', plugins_url( 'css/gifeed-global.css', __FILE__ ), array(), IFLITE_VERSION );
	
	if ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] == 'ghozylab-instagram-comparison' ){
		wp_enqueue_style( 'gifeed_compare_styles', plugins_url( 'css/pricing'.$is_rtl.'.css', __FILE__ ), array(), IFLITE_VERSION );
	}

}

function gifeed_global_script_loader() {
	
	global $current_screen;
	
	if( 'ginstagramfeed' == $current_screen->post_type ) {
		
		add_action( 'admin_enqueue_scripts', 'gifeed_global_script' );
	
	}

}


// For Settings Page
function gifeed_settings_script_loader() {
	
	add_action( 'admin_enqueue_scripts', 'gifeed_settings_script' );

}

function gifeed_settings_script() {
	
	$is_rtl = ( is_rtl() ? '-rtl' : '' );

	$data = array(
			'token_gen_link' => gifeed_get_oauth_link(),
			'client_redirect_uri' => admin_url( "edit.php?post_type=ginstagramfeed&page=ghozylab-instagram-settings" ),
			'insta_nonce' => wp_create_nonce( 'fil_instagram_at_nonce' ),
			'i18n' => array(
					'fb_acc_not_owned' => __( 'You are not the owner of this access token, please switch your Facebook Account using the appropriate one', 'feed-instagram-lite' ),
					'fb_acc_exist' => __( 'This facebook account is already in use, please use another account and try again', 'feed-instagram-lite' ),
					'ajax_failed' => __( 'Ajax request failed, please refresh your browser window', 'feed-instagram-lite' ),
					'gfont_stype' => __( 'Please make sure you fill Google Fonts API Key and select the Short type!', 'feed-instagram-lite' ),
					'fb_acc_connected' => __( 'This plugin now compatible with Instagram Graph API', 'feed-instagram-lite' )
					
				),
			);
	
	wp_enqueue_media();
	wp_enqueue_script( 'jquery-effects-core' );
	wp_enqueue_script( 'jquery-effects-highlight' );
	wp_enqueue_script( 'jquery-effects-pulsate' );
	wp_enqueue_style( 'jquery-ui-pepper-grinder', plugins_url( 'css/jquery/ui/jquery-ui.min.css', __FILE__ ), array(), IFLITE_VERSION );
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_style( 'gifeed_settings_styles', plugins_url( 'css/gifeed-settings'.$is_rtl.'.css', __FILE__ ), array(), IFLITE_VERSION );
	wp_enqueue_script( 'gifeed_metabox_notify', plugins_url( 'js/notify.min.js', __FILE__ ), array(), IFLITE_VERSION );
	wp_enqueue_script( 'gifeed_admin_settings_script', plugins_url( 'js/settings.js', __FILE__ ), array(), IFLITE_VERSION );
	wp_localize_script( 'gifeed_admin_settings_script', 'gifeed_settings_script_opt', $data );

}


// For Metabox / Feed Editor
function gifeed_metabox_script_loader() {
	
	global $current_screen;
	
	if( 'ginstagramfeed' == $current_screen->post_type ) {
		
		add_action( 'admin_enqueue_scripts', 'gifeed_metabox_script' );
	
	}

}

function gifeed_only_for_custompost() {

	// Dedicated to Metabox / Feed Builder
    global $post_type;
	if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {
		
		if ( 'ginstagramfeed' === $post_type ) {
			
			$all_token = gifeed_opt( 'users' );
			
			if ( empty( $all_token ) ) {
				
				wp_redirect( admin_url(  'edit.php?post_type=ginstagramfeed&page=ghozylab-instagram-settings&gifed_info=missing_token' ) );
			
			}
			
			// JS
			wp_enqueue_script( 'jquery-ui-core' );	
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'gifeed_metabox_core', plugins_url( 'js/metabox.js', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_script( 'gifeed_metabox_ibutton_js', plugins_url( 'js/jquery.ibutton.js', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_script( 'gifeed_metabox_notify', plugins_url( 'js/notify.min.js', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_script( 'gifeed_metabox_colorpic_js', plugins_url( 'js/colorpicker/colorpicker.js', __FILE__ ), array(), IFLITE_VERSION );

			$gifeed_settings['codeEditor'] = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
			wp_localize_script( 'jquery', 'gifeed_settings', $gifeed_settings );

			wp_enqueue_script('wp-theme-plugin-editor');
			wp_enqueue_script( 'wp-codemirror' );
			
			$mtbox = array(
				'upgrade_link' => admin_url( 'edit.php?post_type=ginstagramfeed&page=ghozylab-instagram-comparison' ),
				'default_template' => '<div class="gifeed-card radius shadowDepth1">
  <div class="card__image border-tlr-radius"> <a id="{{id}}" data-w="{{vidw}}" data-h="{{vidh}}" data-rel="lightcase:myCollection" href="{{source}}"> <span class="fa {{typeicon}} media_type" aria-hidden="true"></span> <img id="{{id}}-img" src="{{image}}" alt="{{mediaalt}}" title="{{mediattl}}" class="border-tlr-radius gifeed-item-image"> </a> </div>
  <div class="card__content card__padding">
    <div class="card__share">
      <div class="card__social"> <a target="_blank" class="share-icon facebook" href="{{facebookshare}}"> <span class="fa fa-facebook"></span> </a> <a target="_blank" class="share-icon twitter" href="{{twittersts}}"> <span class="fa fa-twitter"></span> </a> <a target="_blank" class="share-icon googleplus" href="{{googlepshare}}"> <span class="fa fa-google-plus"></span> </a> </div>
      <a id="{{id}}-share" class="share-toggle share-icon" href="#"></a> </div>
    <div class="card__meta"> <span class="meta_tems_holder"> <span class="fa fa-thumbs-up"></span> <span class="insta-data">{{likes}}</span> </span> <span class="meta_tems_holder"> <span class="fa fa-comment"></span> <span class="insta-data recountered">{{comments}}</span> </span> <span class="meta_tems_holder"> <span class="fa fa-calendar"></span> <span class="insta-data">{{timestamp}}</span> </span> </div>
    <div class="card__article"> <a class="feed_title" target="_blank" href="{{link}}">{{caption}}</a> </div>
  </div>
  <div class="card__action">
    <div class="card__author"> <img src="{{model.user.profile_picture}}" alt="user">
      <div class="card__author-content"> <a href="{{link}}" target="_blank">{{model.user.full_name}}</a> </div>
    </div>
  </div>
</div>'
				);
				
			if ( ! empty( $all_token ) ) {
				
				$def_token = array_keys( $all_token );
				$mtbox['token'] = $def_token[0];
				$mtbox['nonce'] = wp_create_nonce( 'gifeed_preview-nonce' );
				
			}
	
			wp_localize_script( 'gifeed_metabox_core', 'gifeed_metabox_opt', $mtbox );							

			$is_rtl = ( is_rtl() ? '-rtl' : '' );
			
			// CSS
			wp_enqueue_style( 'gifeed_metabox_codemirror_def', plugins_url( 'css/codemirror/codemirror.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_codemirror_theme', plugins_url( 'css/codemirror/themes/mbo.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_styles', plugins_url( 'css/metabox'.$is_rtl.'.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_tab', plugins_url( 'css/tabulous.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_slider_css', plugins_url( 'css/slider.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_ibutton_css', plugins_url( 'css/ibutton.css', __FILE__ ), array(), IFLITE_VERSION );
			wp_enqueue_style( 'gifeed_metabox_colorpic_css', plugins_url( 'css/colorpicker.css', __FILE__ ), array(), IFLITE_VERSION );
			
		}
		
	}
	
	
	// Dedicated to Feeds Overview / Feed List
	if ( 'ginstagramfeed' === $post_type ) {
		
		gifeed_global_script();
		
	}
		
}
add_action( 'admin_enqueue_scripts', 'gifeed_only_for_custompost', 10, 1 );


// Admin Notice
function gifeed_notice() {

    $current_screen = get_current_screen();
	
	if ( $current_screen->id == 'edit-ginstagramfeed' ) {
		
		add_action( 'admin_notices', 'gifeed_admin_notice__rate' );

    }
    
}

add_action( 'current_screen', 'gifeed_notice' );


function gifeed_admin_notice__rate() {
    ?>
    <div class="notice notice-info is-dismissible">
        <p>If you use <strong>Instagram Feed Lite</strong> and found it useful then please consider rating it and leaving your positive feedback <a href="https://wordpress.org/support/plugin/feed-instagram-lite/reviews/?filter=5" target="_blank" style="color: #06F !important;">here</a></p>
    </div>
    <?php
}
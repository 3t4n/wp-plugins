<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class SMUZSFTW_Public {

	function __construct() {



	}

	public function init() {


		$this->hooks();

		$this->filters();


		$this->register_shortcode();

	}

	function hooks() {

		add_action( 'init', array( $this, 'assets' ) );

		add_action( 'wp_ajax_SMUZSFTW_fb_token', array( $this, 'fb_access_token' ) );
		add_action( 'wp_ajax_nopriv_SMUZSFTW_fb_token', array( $this, 'fb_access_token' ) );
	}

	function filters() {


	}

	function register_shortcode() {


		add_shortcode( SMUZSFTW_SHORTCODE, array( $this, 'process_shortcode' ) );

	}

	function assets() {

		if ( is_admin() ) return;

		wp_enqueue_style( 'SMUZSFTW-facebook', SMUZSFTW_PLUGIN_URL . '/public/css/font-awesome.min.css' );

		wp_enqueue_script( 'SMUZSFTW-facebook', SMUZSFTW_PLUGIN_URL . '/public/scripts/facebook.js', array( 'jquery' )  );

	}

	function process_shortcode( $atts ) {

		extract( shortcode_atts( array(
				'id' => null
			), $atts ) );

		if ( ! $id )
			return FALSE;

		if ( get_post_status( $id ) !== 'publish' )
			return FALSE;

		$theme = SMUZSFTW_get_option( $id, 'wssf_select_layout' );

		
		$template_path = SMUZSFTW_view_public_path( 'templates/default/template.php' );

		if ( $theme !== 'layout' ) {

			$template_path = 'templates/'.$theme.'/template.php';

			$template_path = SMUZSFTW_view_public_path( $template_path );

		}

        $template_path = apply_filters( 'SMUZSFTW_template_path', $template_path, $id  );

        $template_var = $this->setup_template_variables( $id );

		ob_start();
		
		include ( $template_path ); 

		$content = ob_get_contents();
		ob_end_clean();

		return $content;

	}

	function setup_template_variables( $feed_id ) {

		$vars = array();

		$nonce = wp_create_nonce( 'SMUZSFTW_token'  );

		$ajax_url = admin_url( 'admin-ajax.php?action=SMUZSFTW_fb_token' );

		$ajax_url = add_query_arg( array(
				
				'feed_id' => intval( $feed_id ),
				'nonce' => $nonce

			) , $ajax_url );

		$vars['ajax_link'] = $ajax_url;

		$vars['width'] = SMUZSFTW_get_option( $feed_id, 'wssf_feed_width' );

		$vars['facebook_profile'] = '@' . SMUZSFTW_get_option( $feed_id, 'wssf_fb_profile_id' );

		$vars['fblimit'] = SMUZSFTW_get_option( $feed_id, 'wssf_results_per_feed_fb' );
		$vars['twlimit'] = SMUZSFTW_get_option( $feed_id, 'wssf_results_per_feed_tw' );
		$vars['instalimit'] = SMUZSFTW_get_option( $feed_id, 'wssf_results_per_feed_insta' );

		$vars['bgcolor'] = SMUZSFTW_get_option( $feed_id, 'wssf_bg_color' );

		$vars['txtcolor'] = SMUZSFTW_get_option( $feed_id, 'wssf_text_color' );

		$vars['isOnDate'] = SMUZSFTW_get_option( $feed_id, 'wssf_enable_post_date' );

		$vars['isSocialIcon'] = SMUZSFTW_get_option( $feed_id, 'wssf_enable_social_icon' );

		$vars['isDisplayPicture'] = SMUZSFTW_get_option( $feed_id, 'wssf_enable_display_picture' );

		$vars['isHideTextContent'] = SMUZSFTW_get_option( $feed_id, 'wssf_hide_text_content' );

		$vars['isPostLinkEnabled'] = SMUZSFTW_get_option( $feed_id, 'wssf_enable_links_to_post' );

		$vars['twitter'] = '@' . SMUZSFTW_get_option( $feed_id, 'wssf_tw_username' );

		$vars['twitter_id'] = '';

		$vars['twitter_secret'] = '';

		$vars['isfb'] = SMUZSFTW_get_option( $feed_id, 'wssf_social_fb_enable' );

		$vars['istw'] = SMUZSFTW_get_option( $feed_id, 'wssf_social_tw_enable' );

		$vars['isinsta'] = SMUZSFTW_get_option( $feed_id, 'wssf_social_insta_enable' );

		$vars['instagram'] = '';

		$vars['fb_token'] = false;

		$vars['twitter_id'] = false;

		$vars['twitter_secret'] = false;

		$vars['gfont'] = SMUZSFTW_get_option( $feed_id, 'wssf_select_gfont' );

		$vars['layout'] = SMUZSFTW_get_option( $feed_id, 'wssf_select_layout' );

		$vars['instagram_token'] = '';
		
		if ( $vars['isfb'] === '1' ) {

			$vars['fb_token'] = $this->fb_access_token( $feed_id );

		}

		if ( $vars['istw'] === '1' ) {

			$vars['twitter_id'] = SMUZSFTW_get_option( $feed_id, 'wssf_tw_consumer_key' );

			$vars['twitter_secret'] = SMUZSFTW_get_option( $feed_id, 'wssf_tw_consumer_secret' );	
			
		}

		if ( $vars['isinsta'] === '1' ) {

			$vars['instagram'] = '@' . SMUZSFTW_get_option( $feed_id, 'wssf_insta_username' );

			$vars['instagram_token'] = SMUZSFTW_get_option( $feed_id, 'wssf_instagram_token' );

		}

		return $vars;

	}

	function fb_access_token( $feed_id ) {

		/*$feed_id = intval($_GET['feed_id']);

		$nonce = esc_attr( $_GET['nonce'] );

		if ( get_post_status( $feed_id ) !== 'publish' )
			exit('-1');

		if ( ! wp_verify_nonce( $nonce, 'SMUZSFTW_token' ) )
			exit('-2');*/

		$app_id = SMUZSFTW_get_option( $feed_id, 'wssf_fb_app_id' );

		$app_secret = SMUZSFTW_get_option( $feed_id, 'wssf_fb_app_secret' );;

		$url = sprintf( 'https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id=%s&client_secret=%s', $app_id, $app_secret );

		$response = wp_remote_get( $url );

		if ( ! is_array( $response ) )
			return false;

		$response['body'] = str_replace( 'access_token=', '', $response['body']);

		return $response['body'];

	}

}
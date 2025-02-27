<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Html5vp_Admin {

	function __construct() {

		// Action to add admin menu
		add_action( 'admin_menu', array( $this, 'html5vp_register_menu' ), 12 );

		// Action to add metabox
		add_action( 'add_meta_boxes', array( $this, 'sp_html5video_metabox' ));

		// Action to save metabox
		add_action( 'save_post', array( $this,'sp_html5video_metabox_value' ));

		// Admin Prior Processes
		add_action( 'admin_init', array( $this, 'html5vp_admin_init_process' ));

		// Filter to add row data
		add_filter( 'post_row_actions', array( $this, 'html5vp_add_post_row_data' ), 10, 2 );

		// Filter Custom Coluum 
		add_filter("manage_video-category_custom_column", array( $this, 'html5vp_video_category_columns' ), 10, 3);
		add_filter("manage_edit-video-category_columns", array( $this, 'html5vp_video_category_manage_columns' ));
	}
	
	/**
	 * Function to add menu
	 * 
	 * @since 1.0.0
	 */
	function html5vp_register_menu() {

		// How It Work Page
		add_submenu_page( 'edit.php?post_type='.WP_HTML5VP_POST_TYPE, __('How it works, our plugins and offers', 'html5-videogallery-plus-player'), __('How It Works', 'html5-videogallery-plus-player'), 'manage_options', 'vgap-designs', array($this, 'vgap_designs_page') );

		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.WP_HTML5VP_POST_TYPE, __('Upgrade To Premium  - Video gallery and Player', 'html5-videogallery-plus-player'), '<span style="color:#2ECC71">'.__('Upgrade To PRO', 'html5-videogallery-plus-player').'</span>', 'manage_options', 'html5vp-premium', array($this, 'html5vp_premium_page') );
	}

	/**
	 * How It Work Page HTML
	 * 
	 * @since 1.0.0
	 */
	function vgap_designs_page() {
		include_once( WP_HTML5VP_DIR . '/includes/admin/wp-html5vp-how-it-work.php' );
	}

	/**
	 * Premium Feature Page HTML
	 * 
	 * @since 1.0.0
	 */
	function html5vp_premium_page() {
		include_once( WP_HTML5VP_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * video Post Settings Metabox
	 * 
	 * @since 1.1
	 */
	function sp_html5video_metabox() {
		add_meta_box( 'html5video-post-sett', __( 'Video Files/Links', 'html5-videogallery-plus-player' ), array($this, 'sp_html5video_sett_mb_content'), 'sp_html5video', 'normal', 'high' );

		add_meta_box( 'html5video-post-metabox-pro', __( 'More Premium - Settings', 'html5-videogallery-plus-player' ), array( $this, 'html5video_post_sett_box_callback_pro' ), 'sp_html5video', 'normal', 'default' );

	}

	/**
	 * video add Metabox
	 * 
	 * @since 1.1
	 */
	function sp_html5video_sett_mb_content() {
		include_once( WP_HTML5VP_DIR . '/includes/admin/metabox/class-admin-metabox.php' );
	}

	/**
	 * video add Metabox
	 * 
	 * @since 1.1
	 */
	function html5video_post_sett_box_callback_pro() {
		include_once( WP_HTML5VP_DIR .'/includes/admin/metabox/html5video-post-setting-metabox-pro.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @since 1.0.0
	 */
	function sp_html5video_metabox_value( $post_id ) {

		global $post_type;

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )	// Check Revision
		|| ( $post_type !=  'sp_html5video' ) )		// Check if current post type is supported.
		{
			return $post_id;
		}

		$prefix = '_wpvideo_'; // Taking metabox prefix

		// Taking variables
		$video_mp4 	= isset( $_POST[$prefix.'video_mp4'] )	? wp_html5vp_clean_url( $_POST[$prefix.'video_mp4'] )	: '';
		$video_wbbm = isset( $_POST[$prefix.'video_wbbm'] )	? wp_html5vp_clean_url( $_POST[$prefix.'video_wbbm'] )	: '';
		$video_ogg 	= isset( $_POST[$prefix.'video_ogg'] )	? wp_html5vp_clean_url( $_POST[$prefix.'video_ogg'] )	: '';
		$video_yt 	= isset( $_POST[$prefix.'video_yt'] )	? wp_html5vp_clean_url( $_POST[$prefix.'video_yt'] )	: '';
		$video_vm 	= isset( $_POST[$prefix.'video_vm'] )	? wp_html5vp_clean_url( $_POST[$prefix.'video_vm'] )	: '';

		update_post_meta( $post_id, $prefix.'video_mp4', $video_mp4 );
		update_post_meta( $post_id, $prefix.'video_wbbm', $video_wbbm );
		update_post_meta( $post_id, $prefix.'video_ogg', $video_ogg );
		update_post_meta( $post_id, $prefix.'video_yt', $video_yt );
		update_post_meta( $post_id, $prefix.'video_vm', $video_vm );
	}

	/**
	 * Admin Prior Process
	 * 
	 * @since 2.2.3
	 */
	function html5vp_admin_init_process() {
		// If plugin notice is dismissed
		if( isset($_GET['message']) && $_GET['message'] == 'wp-html5vp-plugin-notice' ) {
		set_transient( 'wp_html5vp_install_notice', true, 604800 );
		}
	}

	/**
	 * Function to add custom quick links at post listing page
	 *
	 * @since 2.5
	 */
	function html5vp_add_post_row_data( $actions, $post ) {

		if( $post->post_type == WP_HTML5VP_POST_TYPE ) {
			return array_merge( array( 'wpos_id' => esc_html__('ID:', 'html5-videogallery-plus-player') .' '. esc_attr( $post->ID ) ), $actions );
		}

		return $actions;
	}

	/**
	 * function for category columns manage
	 *
	 * @since 2.5
	 */
	function html5vp_video_category_manage_columns($columns) {

		$new_columns['video_shortcode'] = esc_html__( 'Category Shortcode', 'html5-videogallery-plus-player' );

		$columns = wp_html5vp_add_array( $columns, $new_columns, 2 );

		return $columns;
	}

	/**
	 * function for category columns
	 * 
	 * @since 2.5
	 */
	function html5vp_video_category_columns($out, $column_name, $theme_id) {

		switch ($column_name) {
			case 'video_shortcode':
				echo '[sp_html5video category="' . esc_attr($theme_id). '"]';
				break;
		}
		return $out;
	}
}

$html5vp_admin = new Html5vp_Admin();
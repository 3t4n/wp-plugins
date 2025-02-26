<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wpfp_Admin {

	function __construct() {

		// Action to add metabox
		add_action( 'add_meta_boxes', array( $this, 'wpfp_blog_metabox' ));

		// Action to save metabox
		add_action( 'save_post', array( $this,'wpfp_save_metabox_value' ));

		// Action to register admin menu
		add_action( 'admin_menu', array( $this, 'wpfp_register_menu' ), 9);

		// Action to register plugin settings
		add_action ( 'admin_init', array( $this,'wpfp_register_settings' ));

		// Filter to add row action in category table
		add_filter( WPFP_CAT.'_row_actions', array( $this, 'wpfp_add_tax_row_data' ), 10, 2 );

		// Action to add custom column to post listing
		add_filter( 'manage_'.WPFP_POST_TYPE.'_posts_columns', array( $this, 'wpfp_posts_columns' ));

		// Action to add custom column data to post listing
		add_action('manage_'.WPFP_POST_TYPE.'_posts_custom_column', array( $this, 'wpfp_post_columns_data' ), 10, 2);

		// Ajax call to update featured post
		add_action( 'wp_ajax_wpfp_update_featured_post', array( $this, 'wpfp_update_featured_post' ));

		// Filter to add plugin links
		add_filter( 'plugin_row_meta', array( $this, 'wpfp_plugin_row_meta' ), 10, 2 );
	}

	/**
	 * Featured Post Settings Metabox
	 * 
	 * @since 1.0.0
	 */
	function wpfp_blog_metabox() {
		add_meta_box( 'wpfp-post-sett', __( 'Featured Post Settings', 'featured-post-creative' ), array( $this, 'wpfp_sett_mb_content' ), WPFP_POST_TYPE, 'side', 'default' );
	}

	/**
	 * Featured Post Settings Metabox HTML
	 * 
	 * @since 1.0.0
	 */
	function wpfp_sett_mb_content() {
		include_once( WPFP_DIR .'/includes/admin/metabox/wpfp-post-sett-metabox.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @since 1.0.0
	 */
	function wpfp_save_metabox_value( $post_id ) {

		global $post_type;

		if( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )					// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )	// Check Revision
		|| ( $post_type !=  WPFP_POST_TYPE ) )									// Check if current post type is supported.
		{
			return $post_id;
		}

		$prefix = WPFP_META_PREFIX; // Taking metabox prefix

		// Taking variables
		$featured_box = ! empty( $_POST[$prefix.'featured_post'] )	? 1	: 0;

		update_post_meta( $post_id, $prefix.'featured_post', $featured_box );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @since 1.0.0
	 */
	function wpfp_register_menu() {

		// How it work page
		add_menu_page( __( 'Featured Post', 'featured-post-creative' ), __( 'Featured Post', 'featured-post-creative' ), 'manage_options', 'wpfp-about', array( $this, 'wpfp_getting_started_page' ), 'dashicons-sticky', 6 );

		// Register plugin premium page
		add_submenu_page( 'wpfp-about', __( 'Settings - Featured Post', 'featured-post-creative' ), __( 'Settings', 'featured-post-creative' ), 'manage_options', 'wpfp-setting', array( $this, 'wpfp_settings_page' ));

		// Register plugin premium page
		add_submenu_page( 'wpfp-about', __( 'Upgrade To Premium - Featured Post', 'featured-post-creative' ), '<span style="color:#2ECC71">'.__( 'Upgrade To PRO', 'featured-post-creative' ).'</span>', 'manage_options', 'wpfp-premium', array( $this, 'wpfp_premium_page' ));
	}

	/**
	 * Function register setings
	 * 
	 * @since 1.0.0
	 */
	function wpfp_register_settings() {

		// If plugin notice is dismissed
		if( isset( $_GET['message'] ) && 'wpfp-plugin-notice' == $_GET['message'] ) {
			set_transient( 'wpfp_install_notice', true, 604800 );
		}

		register_setting( 'wpfp_plugin_options', 'wpfp_options', array( $this, 'wpfp_validate_options' ) );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @since 1.0.0
	 */
	function wpfp_validate_options( $input ) {
		$input['custom_css'] = isset( $input['custom_css'] )	? sanitize_textarea_field( $input['custom_css'] ) : '';

		return $input;
	}

	/**
	 * Getting Started Page
	 * 
	 * @since 1.0.0
	 */
	function wpfp_getting_started_page() {
		include_once( WPFP_DIR . '/includes/admin/wpfp-how-it-work.php' );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @since 1.0.0
	 */
	function wpfp_settings_page() {
		include_once( WPFP_DIR . '/includes/admin/settings/wpfp-settings.php' );
	}

	/**
	 * Premium Page Html
	 * 
	 * @since 1.0
	 */
	function wpfp_premium_page() {
		include_once( WPFP_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Function to add category row action
	 * 
	 * @since 1.0
	 */
	function wpfp_add_tax_row_data( $actions, $tag ) {
		return array_merge( array( 'wpos_id' => esc_attr__( 'ID:', 'featured-post-creative' ) .' '. esc_attr( $tag->term_id ) ), $actions );
	}

	/**
	 * Add custom column to Post listing page for Featured Post  
	 * 
	 * @since 1.0.0
	 */
	function wpfp_posts_columns( $columns ){

		$new_columns['wpfp_featured'] = __( 'Featured Post', 'featured-post-creative' );

		$columns = wpfp_add_array( $columns, $new_columns, 4 );

		return $columns;
	}

	/**
	 * Add custom column data to post listing page for Featured Post
	 * 
	 * @since 1.0.0
	 */
	function wpfp_post_columns_data( $column, $post_id ) {

		if( $column == 'wpfp_featured' ){

			$prefix			= WPFP_META_PREFIX; // Metabox prefix
			$featured_box	= get_post_meta( $post_id, $prefix.'featured_post', true );
			$featured_box	= ( ! empty( $featured_box )) ? 'dashicons-star-filled' : 'dashicons-star-empty' ;

			echo '<div class="wpfp-select-featured dashicons '.esc_attr( $featured_box ).'" data-post-id='.esc_attr( $post_id ).' style="cursor: pointer;" data-nonce="'.esc_attr( wp_create_nonce( "wpfp-featured-data-nonce" )).'" ></div>';
		}
	}

	/**
	 * Update Featured post
	 * 
	 * @since 1.0.0
	 */
	function wpfp_update_featured_post() {

		$prefix = WPFP_META_PREFIX; // Taking metabox prefix

		$result				= array();
		$result['success']	= 0;
		$nonce				= ! empty( $_POST['nonce'] ) ? esc_attr( $_POST['nonce'] )	: '';

		if( ! empty( $_POST['feat_id'] ) && wp_verify_nonce( $nonce, 'wpfp-featured-data-nonce' )) {

			update_post_meta( $_POST['feat_id'], $prefix.'featured_post', $_POST['is_feat'] );

			$result['success']	= 1;
		}
		wp_send_json( $result );
	}
	

	/**
	 * Function to unique number value
	 * 
	 * @since 1.0.0
	 */
	function wpfp_plugin_row_meta( $links, $file ) {

		if ( $file == WPFP_PLUGIN_BASENAME ) {

			$row_meta = array(
				'docs'		=> '<a href="' . esc_url( 'https://docs.essentialplugin.com/featured-post-creative/' ) . '" title="' . esc_attr__( 'View Documentation', 'featured-post-creative' ) . '" target="_blank">' . esc_attr__( 'Docs', 'featured-post-creative' ) . '</a>',
				'support'	=> '<a href="' . esc_url( WPFP_SITE_LINK . '/pricing/' ) . '" title="' . esc_attr__( 'go-premium', 'featured-post-creative' ) . '" target="_blank">' . esc_attr__( 'Go Premium', 'featured-post-creative' ) . '</a>',
			);
			return array_merge( $links, $row_meta );
		}
		return (array) $links;
	}
}

$wpbaw_pro_admin = new Wpfp_Admin();
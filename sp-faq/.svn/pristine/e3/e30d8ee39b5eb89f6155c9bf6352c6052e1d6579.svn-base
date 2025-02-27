<?php
/**
 * Admin Class
 *
 * Handles the admin functionality of plugin
 *
 * @package WP FAQ
 * @since 3.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wp_Faq_Admin {

	function __construct() {

		// Action to add admin menu
		add_action( 'admin_menu', array($this, 'wp_faq_register_menu') );

		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'wp_faq_register_metabox') );

		// Admin Init Processes
		add_action( 'admin_init', array($this, 'wp_faq_admin_init_process') );

		// Manage Category Shortcode Columns
		add_filter("manage_faq_cat_custom_column", array($this, 'sp_faq_cat_columns'), 10, 3);
		add_filter("manage_edit-faq_cat_columns", array($this, 'sp_faq_cat_manage_columns') );
	}

	/**
	 * Function to add menu
	 * 
	 * @since 3.2.5
	 */
	function wp_faq_register_menu() {

		// How it work Page
		add_submenu_page( 'edit.php?post_type='.WP_FAQ_POST_TYPE, __('How it works, our plugins and offers', 'sp-faq'), __('How It Works', 'sp-faq'), 'manage_options', 'wp-faq-designs', array($this, 'wp_faq_how_it_work_page') );

		// Setting page
		add_submenu_page( 'edit.php?post_type='.WP_FAQ_POST_TYPE, __('Overview - FAQ', 'sp-faq'), __('Overview', 'sp-faq'), 'manage_options', 'sp-faq-solutions-features', array($this, 'wp_faq_solutions_features_page') );

		// Premium Feature Page
		add_submenu_page( 'edit.php?post_type='.WP_FAQ_POST_TYPE, __('Upgrade to PRO - WP FAQ', 'sp-faq'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'sp-faq').'</span>', 'edit_posts', 'wpfcas-premium', array($this, 'wp_faq_premium_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @since 3.2.6
	 */
	function wp_faq_how_it_work_page() {
		include_once( WP_FAQ_DIR . '/includes/admin/settings/how-it-work.php' );
	}

	/**
	 * Premium Page Html
	 * 
	 * @since 3.2.6
	 */
	function wp_faq_premium_page() {
		//include_once( WP_FAQ_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Solutions features Page Html
	 * 
	 * @since 3.2.6
	 */
	function wp_faq_solutions_features_page() {
		include_once( WP_FAQ_DIR . '/includes/admin/settings/solution-features/solutions-features.php' );
	}

	/**
	 * Post Settings Metabox
	 * 
	 * @since 3.5.1
	 */
	function wp_faq_register_metabox() {
		add_meta_box( 'wp-faq-post-metabox-pro', esc_html__('More Premium - Settings', 'sp-faq'), array($this, 'sp_faq_post_sett_box_callback_pro'), WP_FAQ_POST_TYPE, 'normal', 'high' );
	}

	/**
	 * Function to handle 'premium ' metabox HTML
	 * 
	 * @since 3.5.1
	 */
	function sp_faq_post_sett_box_callback_pro( $post ) {		
		include_once( WP_FAQ_DIR .'/includes/admin/metabox/post-sett-metabox-pro.php');
	}

	/**
	 * Function to notification transient
	 * 
	 * @since 3.2.5
	 */
	function wp_faq_admin_init_process() {

		global $typenow;

		$current_page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';

		// If plugin notice is dismissed
		if( isset( $_GET['message'] ) && 'sp-faq-plugin-notice' == $_GET['message'] ) {
			set_transient( 'sp_faq_install_notice', true, 604800 );
		}

		// Redirect to external page for upgrade to menu
		if( $typenow == WP_FAQ_POST_TYPE ) {

			if( $current_page == 'wpfcas-premium' ) {

				$tab_url		= add_query_arg( array( 'post_type' => WP_FAQ_POST_TYPE, 'page' => 'sp-faq-solutions-features', 'tab' => 'wp_faq_basic_tabs' ), admin_url('edit.php') );

				wp_redirect( $tab_url );
				exit;
			}
		}

	}

	/**
	 * Function to add category column
	 * 
	 * @since 1.0.0
	 */
	function sp_faq_cat_manage_columns($theme_columns) {
	    $new_columns = array(
						'cb'						=> '<input type="checkbox" />',
						'name'						=> __('Name'),
						'faq_category_shortcode'	=> __( 'FAQ Category Shortcode', 'sp-faq' ),
						'slug'						=> __('Slug'),
						'posts'						=> __('Posts')
					);
	    return $new_columns;
	}

	/**
	 * Function to add category column data
	 * 
	 * @since 1.0.0
	 */
	function sp_faq_cat_columns($out, $column_name, $cat_id) {
	    $theme = get_term( $cat_id, 'faq_cat' );
	    switch ( $column_name ) {

	        case 'title':
	            echo get_the_title();
	        break;

	        case 'faq_category_shortcode':
	             echo '[sp_faq category="' .esc_attr( $cat_id ). '"]';
	        break;

	        default:
	            break;
	    }
	    return $out;
	}
}

$wp_faq_admin = new Wp_Faq_Admin();
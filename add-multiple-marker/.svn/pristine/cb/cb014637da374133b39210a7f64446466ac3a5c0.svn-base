<?php
/**
 * @package addmultiplemarker
 */

if ( ! class_exists( 'Addmultiplemarker' ) ) {
  /**
   * Create a class for adding all the functionality.
   */
	class Addmultiplemarker {
    /**
     * Calling class __construct.
     */
		function __construct() {
			// Enqueue scripts.
		      add_action( 'admin_enqueue_scripts', array( $this, 'addmultiplemarker_admin_scripts' ) );
		      add_action( 'wp_enqueue_scripts', array( $this, 'addmultiplemarker_scripts' ) );

		      // Include admin menu.
		      add_action( 'admin_menu', array( $this, 'addmultiplemarker_admin_menu' ) ); 

		      // // Included google api url on backend and frontend.
		      // $map_api_details = $this->get_data_from_db( 'map_integration' );
		      // $map_api = ( $map_api_details && $map_api_details['api'] != '' ) ? $map_api_details['api'] : '';
		      // if ( $map_api != '' ) {
		      // 	wp_enqueue_script( 'amm-map-script', 'https://maps.googleapis.com/maps/api/js?key=' . $map_api . '&libraries=drawing,places', array( 'jquery' ), false, true );
		      // }

		      // Adding shortcode for displaying related posts on frontside.
		      add_shortcode( 'addmultiplemarker', array( $this, 'display_multiple_marker_map' ) );
		      // Load text domain.
		      add_action( 'plugins_loaded', array( $this, 'addmultiplemarker_load_textdomain' ) );
		      // Display notices when key is not API valid.
		      add_action( 'admin_notices', array( $this, 'addmultiplemarker_admin_notice' ));
		}

		/**
		 * Include admin style and scripts.
		 */
		function addmultiplemarker_admin_scripts() {
			wp_enqueue_style( 'amm-admin-css', ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/css/amm-style.css' );
			wp_enqueue_style( 'amm-font-css', ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/fonts/sanasansalt.css' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'amm-jquery-blockui', ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/js/jquery.blockUI.js', array( 'jquery' ), false, true );
			// Include scripts.
			wp_enqueue_script( 'wp-color-picker' );
			// Included google api url.
			$map_api_details = $this->get_data_from_db( 'map_integration' );
			$map_api = ( $map_api_details && $map_api_details['api'] != '' ) ? $map_api_details['api'] : '';
			if ( $map_api != '' && isset( $_GET['page'] ) && $_GET['page'] == 'addmultiplemarker' ) {
				wp_enqueue_script( 'amm-map-script', 'https://maps.googleapis.com/maps/api/js?key=' . $map_api . '&libraries=drawing,places', array( 'jquery' ), false, true );
				wp_enqueue_script( 'amm-admin-script', ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/js/amm-scripts.js', array( ), false, true );
			}		
      		wp_enqueue_script( 'amm-admin-custom-script', ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/js/amm-custom-settings.js', array( ), false, true );
			wp_localize_script( 'amm-admin-script', 'amm_plugin_obj',
				array(
					'plugin_path' => ADDMULTIPLEMARKER_PLUGIN_URL,
					'amm_save_option' => $this->get_data_from_db( 'marker_settings' ),
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'map_settings' => $this->get_data_from_db( 'map_integration' ),
				)
			);
			wp_localize_script( 'amm-admin-custom-script', 'amm_plugin_custom_obj',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
				)
			);
		}

		/**
		 * Include frontend style and scripts.
		 */
		function addmultiplemarker_scripts() {
			wp_enqueue_style( 'amm-frontend-styles', ADDMULTIPLEMARKER_PLUGIN_URL . 'public/css/amm-frontend-style.css' );

		    // Include scripts.
		  //   wp_enqueue_script('amm-frontend-scripts', ADDMULTIPLEMARKER_PLUGIN_URL . 'public/js/frontendscript.js', array( 'jquery' ), '', true);
		  //   wp_localize_script( 'amm-frontend-scripts', 'amm_frontend_obj',
				// 	array(
				// 		'amm_save_marker_option' => $this->get_data_from_db( 'marker_settings' ),
				// 		'map_settings' => $this->get_data_from_db( 'map_integration' ),
				// 	)
				// );
		}

		/**
		 * Get data from database.
		 */
		function get_data_from_db( $option_name ) {
			if ( $option_name == 'map_integration' ) {
				$map_details = get_option( 'amm_map_setting' );
			} elseif ( $option_name == 'marker_settings' ) {
				$map_details = get_option( 'amm_maps_marker' );
			}
			return $map_details;
		}

		/**
		 * Register admin menu.
		 */
		function addmultiplemarker_admin_menu() {
			add_menu_page(
        __( 'Add Multiple Marker', 'addmultiplemarker' ),
        'Add Multiple Marker',
        'manage_options',
        'addmultiplemarker',
        array( $this, 'addmultiplemarker_global_settings_page' ),
        ADDMULTIPLEMARKER_PLUGIN_URL . 'admin/images/dash-icon.png'
	    );
	    add_submenu_page(
        'addmultiplemarker',
        __( 'AMM Map integration', 'addmultiplemarker' ),
        __( 'Map integration', 'addmultiplemarker' ),
        'manage_options',
        'amm-map-integration',
        array( $this, 'addmultiplemarker_map_integration_callback' )
	    );
		}

		/**
		 * Displaying admin notice.
		 */
		function addmultiplemarker_admin_notice() {
		 	if ( isset( $_REQUEST['page'] ) && ( $_REQUEST['page'] == 'addmultiplemarker' ||  $_REQUEST['page'] == 'amm-map-integration') ) {
		 		$map_details = $this->get_data_from_db( 'map_integration' );
				if ( !$map_details || $map_details['api'] == "" ) {
		 			 '<div id="message" class="error notice"><p>' . __( 'Please enter valid Google Map API for displaying map.', 'addmultiplemarker') . '</p></div>';
		 		}
		  	}
		}

		/**
		 * Load Text domain.
		 */
		function addmultiplemarker_load_textdomain() {
			load_plugin_textdomain( 'addmultiplemarker', false, basename( dirname( __FILE__ ) ) . '/languages' );
		}

		/*
		* Display map frontside via shortcode.
		*/
		function display_multiple_marker_map() {
			$map_details = $this->get_data_from_db( 'map_integration' );
			if ( $map_details['api'] != "" ) {
				if ( !wp_script_is( 'amm-map-script' ) ){
					wp_enqueue_script( 'amm-map-script', 'https://maps.googleapis.com/maps/api/js?key=' . $map_details['api'] . '&libraries=drawing,places', array( 'jquery' ), false, true );
				}
				if ( !wp_script_is( 'amm-frontend-scripts' )  ){
				 	wp_enqueue_script('amm-frontend-scripts', ADDMULTIPLEMARKER_PLUGIN_URL . 'public/js/frontendscript.js', array( 'jquery' ), '', true);
				    wp_localize_script( 'amm-frontend-scripts', 'amm_frontend_obj',
							array(
								'amm_save_marker_option' => $this->get_data_from_db( 'marker_settings' ),
								'map_settings' => $this->get_data_from_db( 'map_integration' ),
							)
						);
				}
				$map_height = isset( $map_details['map_height'] ) && $map_details['map_height'] != "" ? $map_details['map_height'] : '500px';
				$map_width = isset( $map_details['map_width'] ) && $map_details['map_width'] != "" ? $map_details['map_width'] : '100%' ;
				return '<div class="amm-map-integrate" id="frontmap" style="height:' . $map_height . ';width:' . $map_width . ';"></div>';
			} else {
				return __( 'Please Enter Valid Google Map API Key', 'addmultiplemarker' );
			}
		}

		/**
		 * Map API configuration.
		 */
		function addmultiplemarker_global_settings_page() {
			// Include file.
			require_once( ADDMULTIPLEMARKER_PLUGIN_DIR . 'admin/admin-options.php' );
		}

		/**
		 * Setting configuration.
		 */
		function addmultiplemarker_map_integration_callback() {
			// Include file.
			require_once( ADDMULTIPLEMARKER_PLUGIN_DIR . 'admin/map-integration.php' );
		}
	}

}

// Admin ajax to submit all the markers detail into the database.
add_action( 'wp_ajax_addmultiplemarker_save_maps_data', 'addmultiplemarker_save_maps_data' );
add_action( 'wp_ajax_nopriv_addmultiplemarker_save_maps_data', 'addmultiplemarker_save_maps_data' );
function addmultiplemarker_save_maps_data() {
	if ( isset( $_POST['form'] ) ) {
    $unserialize_formdata = array();
    parse_str( $_POST['form'], $unserialize_formdata );
    if ( wp_verify_nonce( $unserialize_formdata['_wpnonce'] ) ) {
      $removeKeys = array( '_wpnonce', '_wp_http_referer', 'amm_search_area' );
      foreach ( $removeKeys as $key ) {
        unset( $unserialize_formdata[$key] );
      }
      $save_db = update_option( 'amm_maps_marker', $unserialize_formdata );
      if ( $save_db ) {
        $msg = array( 'result' => '1', 'message' => __( 'Your changes saved successfully.','addmultiplemarker' ) );
      }else{
      	$msg = array( 'result' => '0', 'message' => __( 'You have not done any changes.','addmultiplemarker' ) );
      }
    } else {
      $msg = array( 'result' => '0', 'message' => __( 'Security check', 'addmultiplemarker' ) );
    }
  } else {
    $msg = array( 'result' => '0', 'message' => __( 'Unauthorize Access', 'addmultiplemarker' ) );
  }
  echo json_encode( $msg );
  wp_die();
}

add_action( 'wp_ajax_addmultiplemarker_reset_map', 'addmultiplemarker_reset_map' );
add_action( 'wp_ajax_nopriv_addmultiplemarker_reset_map', 'addmultiplemarker_reset_map' );
function addmultiplemarker_reset_map() {
	$option_deleted = delete_option('amm_maps_marker');
	return $option_deleted;
}


add_action( 'wp_ajax_amm_save_map_api', 'amm_save_map_api' );
add_action( 'wp_ajax_nopriv_amm_save_map_api', 'amm_save_map_api' );
function amm_save_map_api(){
	if ( isset( $_POST['apiKeyValue'] ) && $_POST['apiKeyValue'] != '' ){
		$existing_map_setting = get_option('amm_map_setting');
		$map_settings = array(
			'api'              => sanitize_text_field( $_POST['apiKeyValue'] ),
		);

		if ( $existing_map_setting ){
			unset( $existing_map_setting['api'] );
			$map_settings = array_merge( $map_settings, $existing_map_setting );
		}

	    // Store value into option table.
		$setting_saved = update_option( 'amm_map_setting', $map_settings );
		if ($setting_saved){
			$msg = array( 'result' => '1', 'message' => __( 'Your changes saved successfully','addmultiplemarker' ) );
		}
	}else{
		$msg = array('result' => '0', 'message'=> __('Please Enter Valid Google Map Api Key','addmultiplemarker') );
	}
	echo wp_json_encode( $msg );
	wp_die();
}
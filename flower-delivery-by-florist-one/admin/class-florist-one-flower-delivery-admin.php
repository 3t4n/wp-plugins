<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-admin.min.css', array( 'wp-color-picker' ), $this->version, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-admin.min.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php'), 'flower_base_url' => get_permalink() ) );

	}

	public function add_plugin_admin_menu() {

      add_menu_page( __( 'Flower Delivery Configuration', 'flower-delivery-by-florist-one'), __( 'Flower Delivery', 'flower-delivery-by-florist-one'), 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), 'dashicons-store', 65  );

			//set option defaults on install
			$options = array(
			  'choose_colors' => 0,
				'navigation_color' => '#8db6d9',
				'navigation_hover_color' => '#18477d',
				'navigation_text_color' => '#FFF',
				'navigation_hover_text_color' => '#000',
				'button_color' => '#8db6d9',
				'button_hover_color' => '#8db6d9',
				'button_text_color' => '#FFF',
				'button_hover_text_color' => '#000',
				'link_color' => '#18477d',
				'heading_color' => '#000',
				'text_color' => '#000',
				'products_per_page' => 12,
				'address_institution' => '',
				'address_1' => '',
				'address_city' => '',
				'address_state' => '',
				'address_zipcode' => '',
				'address_country' => '',
				'currency' => 'u',
				'affiliate_id' => '0',
				'flower_storefront_id' => 0,
				'products' => 0,
        		'show_trees' => 0,
				'products_cm' => 0,
				'products_ea' => 0,
				'products_md' => 0,
				'products_tg' => 0,
				'products_vd' => 0,
				'products_fb' => 0,
				'rotation' => 0,
				'florists_of_choice' => array(),
				'facility_id' => 0,
				'florist_selection' => 0,
				'locations' => array()
			);
			add_option('florist-one-flower-delivery', $options);

	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
	    include_once( 'partials/florist-one-flower-delivery-admin-display.php' );
	}

	public function options_update() {
    	register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 	}

	public function validate($input) {
	    // All checkboxes inputs
	    $valid = array();

	    //Cleanup
			$valid['products'] = sanitize_textarea_field($input['products']);
			$valid['navigation_color'] = !empty($input['navigation_color']) ? sanitize_hex_color($input['navigation_color']) : "#8db6d9";
			$valid['navigation_hover_color'] = !empty($input['navigation_hover_color']) ? sanitize_hex_color($input['navigation_hover_color']) : "#18477d" ;
			$valid['navigation_text_color'] = !empty($input['navigation_text_color']) ? sanitize_hex_color($input['navigation_text_color']) : "#FFF";
			$valid['navigation_hover_text_color'] = !empty($input['navigation_hover_text_color']) ? sanitize_hex_color($input['navigation_hover_text_color']) : "#000";
      		$valid['button_color'] = !empty($input['button_color']) ?  sanitize_hex_color($input['button_color']) : "#8db6d9";
			$valid['button_hover_color'] = !empty($input['button_hover_color']) ? sanitize_hex_color($input['button_hover_color']) : "#8db6d9";
			$valid['button_text_color'] = !empty($input['button_text_color']) ? sanitize_hex_color($input['button_text_color']) : "#FFF";
			$valid['button_hover_text_color'] = !empty($input['button_hover_text_color']) ? sanitize_hex_color($input['button_hover_text_color']) : "#000";
			$valid['link_color'] = !empty($input['link_color']) ? sanitize_hex_color($input['link_color']) : "#18477d";
			$valid['heading_color'] = !empty($input['heading_color']) ? sanitize_hex_color($input['heading_color']) : "#000";
			$valid['text_color'] = !empty($input['text_color']) ? sanitize_hex_color($input['text_color']) : "#000";
			$valid['products_per_page'] = sanitize_text_field($input['products_per_page']);
			$valid['address_institution'] = sanitize_text_field($input['address_institution']);
			$valid['address_1'] = sanitize_text_field($input['address_1']);
			$valid['address_city'] = sanitize_text_field($input['address_city']);
			$valid['address_state'] = sanitize_text_field($input['address_state']);
			$valid['address_country'] = sanitize_text_field($input['address_country']);
			$valid['address_zipcode'] = sanitize_text_field($input['address_zipcode']);
			$valid['address_phone'] = sanitize_text_field($input['address_phone']);
			$valid['flower_storefront_id'] = sanitize_text_field($input['flower_storefront_id']);

			$valid['products_cm'] = ( isset($input['products_cm']) && !empty($input['products_cm']) ) ? 1 : 0;
			$valid['products_ea'] = ( isset($input['products_ea']) && !empty($input['products_ea']) ) ? 1 : 0;
			$valid['products_md'] = ( isset($input['products_md']) && !empty($input['products_md']) ) ? 1 : 0;
			$valid['products_tg'] = ( isset($input['products_tg']) && !empty($input['products_tg']) ) ? 1 : 0;
			$valid['products_vd'] = ( isset($input['products_vd']) && !empty($input['products_vd']) ) ? 1 : 0;
			$valid['products_fb'] = ( isset($input['products_fb']) && !empty($input['products_fb']) ) ? 1 : 0;
			$valid['show_trees'] = ( isset($input['show_trees']) && !empty($input['show_trees']) ) ? 1 : 0;
			$valid['choose_colors'] = ( isset($input['choose_colors']) && !empty($input['choose_colors']) ) ? 1 : 0;

			$valid['rotation'] = ( isset($input['rotation']) && !empty($input['rotation']) ) ? 1 : 0;

			$affiliateid = sanitize_text_field($input['affiliate_id']);

			// loop through locations, process facility ids
			$valid['locations'] = array();
			for ($i=0; $i<sizeof(json_decode($input['locations']));$i++){
				array_push($valid['locations'], $this->create_or_update_facility_id(json_decode($input['locations'])[$i], $affiliateid));
			}
			if (isset($input['locations']) && count((array)$input['locations']) > 0){
			  $valid['facility_id'] = $valid['locations'][0]->facility_id;
			}
	    
      $url = FD_FONE_API . '/wordpress/flowershop-getcurrency?affiliate_id=' . $affiliateid;      
      $headers = array(
        'Authorization: Basic '.base64_encode(FD_FONE_API_KEY . ':' . FD_FONE_API_VAL)
      );

      $api_response_body = json_decode(fdFoneApiCall(array(
          "URL" => FD_FONE_API . '/wordpress/flowershop-getcurrency?affiliate_id=' . $affiliateid,
          "METHOD" => "GET"
        )), true );

			$valid['affiliate_id'] = (!array_key_exists('errors', $api_response_body)) ? trim($input['affiliate_id']) : '0';
			$valid['currency'] = (array_key_exists('CURRENCY', $api_response_body)) ? $api_response_body['CURRENCY'] : 'u';

        
			//update analytics table in case affiliate_id is changed
 		 	$flower_storefront_id = $input['flower_storefront_id'];
 		 	
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_URL => FD_FONE_API . '/wordpress/flowershop-analytics-new?flower_storefront_id=' . $flower_storefront_id . '&affiliate_id=' . sanitize_text_field($valid['affiliate_id']) .'&version=' . $this->version . '&last_update_action=options updated',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS => '',
          CURLOPT_HTTPHEADER => $headers,
          CURLOPT_SSL_VERIFYPEER => true
      ));
      $api_response = curl_exec($curl);
      curl_close($curl);

	  	return $valid;
	 }

	 private function create_or_update_facility_id($location, $affiliateid) {

     $facility_id = $location->facility_id;
     $florists = $location->florists;
     $rotation = $location->rotation;
		 
		 // only create / update facility id if florists array has members
		 if (sizeof($florists) > 0) {

        // facility id already exists, update
        if ( ( $facility_id != "0" && $facility_id != 0 && $facility_id != null ) ) {

          $floristsUrl = $location->florists;
          $floristsUrl[0]->name = str_replace( ' ', '%20', $floristsUrl[0]->name);

          $api_response_body = json_decode(fdFoneApiCall(array(
            "URL" => FD_FONE_API . '/flowershop/chooseflorists?facilityid=' . $facility_id . '&florists=' . json_encode($floristsUrl) . '&rotation=' . ( $rotation == 0 ? 'false' : 'true' ),
            "METHOD" => "PUT"
          )), true );


        } else {
         // facility id does not yet exist, create new one

          $api_response_body = json_decode(fdFoneApiCall(array(
            "URL" => FD_FONE_API . '/flowershop/chooseflorists',
            "METHOD" => "POST",
            "DATA" => array(
              'facilityname' => $location->address_institution . ' - wp aff=' . $affiliateid,
              'florists' => json_encode($florists),
              'city' => $location->address_city,
              'state' => $location->address_state,
              'rotation' => ( $location->rotation == 0 ? false : true )
            ) 
          )), true );

          $location->facility_id = $api_response_body["FACILITYID"];

        }

		 } else {
		   //set facility id to 0 for rare case when someone removes florist choices
			 $location->facility_id = $api_response_body["FACILITYID"];
		 }
		 return $location;
	}

}

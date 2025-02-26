<?php
/**
 * Plugin Name: Canada Post Rates & Labels
 * Plugin URI: https://wordpress.org/plugins/a2z-canada-post-automated-shipping/#developers
 * Description: Realtime Shipping Rates, Shipping label, commercial invoice automation included.
 * Version: 3.0.1
 * Author: Shipi
 * Author URI: https://myshipi.com/
 * Developer: aarsiv
 * Developer URI: https://myshipi.com/
 * Text Domain: hit_cp_auto
 * Domain Path: /i18n/languages/
 *
 * WC requires at least: 2.6
 * WC tested up to: 6.4
 *
 *
 * @package WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'HIT_CANADAPOST_AUTO_PLUGIN_FILE' ) ) {
	define( 'HIT_CANADAPOST_AUTO_PLUGIN_FILE', __FILE__ );
}

// set HPOS feature compatible by plugin
add_action(
    'before_woocommerce_init',
    function () {
        if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
        }
    }
);

function hit_woo_cp_plugin_activation( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        $setting_value = version_compare(WC()->version, '2.1', '>=') ? "wc-settings" : "woocommerce_settings";
    	// Don't forget to exit() because wp_redirect doesn't exit automatically
    	exit( wp_redirect( admin_url( 'admin.php?page=' . $setting_value  . '&tab=shipping&section=hit_cp_auto' ) ) );
    }
}
add_action( 'activated_plugin', 'hit_woo_cp_plugin_activation' );

// Include the main WooCommerce class.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	if( !class_exists('hit_cp_auto_parent') ){
		Class hit_cp_auto_parent
		{
			private $errror = '';
			public $hpos_enabled = false;
			public $new_prod_editor_enabled = false;
			public function __construct() {
				if (get_option("woocommerce_custom_orders_table_enabled") === "yes") {
					$this->hpos_enabled = true;
				}
				if (get_option("woocommerce_feature_product_block_editor_enabled") === "yes") {
					$this->new_prod_editor_enabled = true;
				}
				add_action( 'woocommerce_shipping_init', array($this,'hit_cp_init') );
				add_action( 'init', array($this,'hit_order_status_update') );
				add_filter( 'woocommerce_shipping_methods', array($this,'hit_cp_method') );
				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'hit_cp_plugin_action_links' ) );
				add_action( 'add_meta_boxes', array($this, 'create_cp_shipping_meta_box' ));
				if ($this->hpos_enabled) {
					add_action( 'woocommerce_process_shop_order_meta', array($this, 'hit_create_cp_shipping'), 10, 1 );
				} else {
					add_action( 'save_post', array($this, 'hit_create_cp_shipping'), 10, 1 );
				}
				// add_action( 'woocommerce_checkout_order_processed', array( $this, 'hit_wc_checkout_order_processed' ) );
				add_action( 'admin_menu', array($this, 'hit_cp_menu_page' ));
				add_action( 'woocommerce_order_status_processing', array( $this, 'hit_wc_checkout_order_processed' ) );
				// add_action( 'woocommerce_thankyou', array( $this, 'hit_wc_checkout_order_processed' ) );
			
				$general_settings = get_option('hit_cp_auto_main_settings');
				$general_settings = empty($general_settings) ? array() : $general_settings;
			
			}

			function hit_cp_menu_page() {
				$general_settings = get_option('hit_cp_auto_main_settings');
				if (isset($general_settings['hit_cp_auto_integration_key']) && !empty($general_settings['hit_cp_auto_integration_key'])) {
					add_menu_page(__( 'Canada Post Labels', 'hit_cp_auto' ), 'Canada Post Labels', 'manage_options', 'hit-cp-labels', array($this,'my_label_page_contents'), '', 6);
				}
				
				add_submenu_page( 'options-general.php', 'Canada Post Config', 'Canada Post Config', 'manage_options', 'hit-cp-configuration', array($this, 'my_admin_page_contents') ); 

			}
			function my_label_page_contents(){
				$general_settings = get_option('hit_cp_auto_main_settings');
				$url = site_url();
				if (isset($general_settings['hit_cp_auto_integration_key']) && !empty($general_settings['hit_cp_auto_integration_key'])) {
					echo "<iframe style='width: 100%;height: 100vh;' src='https://app.myshipi.com/embed/label.php?shop=".$url."&key=".$general_settings['hit_cp_auto_integration_key']."&show=ship'></iframe>";
				}
            }
			function my_admin_page_contents(){
				include_once('controllors/views/hit_canadapost_auto_settings_view.php');
			}

			public function hit_cp_init()
			{
				include_once("controllors/hit_canadapost_auto_init.php");
			}
			public function hit_order_status_update(){
				global $woocommerce;
				if(isset($_GET['shipi_key'])){
					$shipi_key = sanitize_text_field($_GET['shipi_key']);
					if($shipi_key == 'fetch' && get_transient('hit_canadapost_auto_nonce_temp')){
						echo json_encode(array(get_transient('hit_canadapost_auto_nonce_temp')));
						die();
					}
				}

				if(isset($_GET['hitshipo_integration_key']) && isset($_GET['hitshipo_action'])){
					$integration_key = sanitize_text_field($_GET['hitshipo_integration_key']);
					$hitshipo_action = sanitize_text_field($_GET['hitshipo_action']);
					$general_settings = get_option('hit_cp_auto_main_settings');
					$general_settings = empty($general_settings) ? array() : $general_settings;
					if(isset($general_settings['hit_cp_auto_integration_key']) && $integration_key == $general_settings['hit_cp_auto_integration_key']){
						if($hitshipo_action == 'stop_working'){
							update_option('hit_cp_auto_working_status', 'stop_working');
						}else if ($hitshipo_action = 'start_working'){
							update_option('hit_cp_auto_working_status', 'start_working');
						}
					}
					
				}

				
				if(isset($_GET['h1t_updat3_0rd3r']) && isset($_GET['key']) && isset($_GET['action'])){
					$order_id = $_GET['h1t_updat3_0rd3r'];
					$key = $_GET['key'];
					$action = $_GET['action'];
					$order_ids = explode(",",$order_id);
					$general_settings = get_option('hit_cp_auto_main_settings',array());
					
					if(isset($general_settings['hit_cp_auto_integration_key']) && $general_settings['hit_cp_auto_integration_key'] == $key){
						if($action == 'processing'){
							foreach ($order_ids as $order_id) {
								$order = wc_get_order( $order_id );
								$order->update_status( 'processing' );
							}
						}else if($action == 'completed'){
							foreach ($order_ids as $order_id) {
								  $order = wc_get_order( $order_id );
								  $order->update_status( 'completed' );
								  	
							}
						}
					}
					die();
				}

				if(isset($_GET['h1t_updat3_sh1pp1ng']) && isset($_GET['key']) && isset($_GET['user_id']) && isset($_GET['carrier']) && isset($_GET['track']) && isset($_GET['pin']) && isset($_GET['service'])){
					$track_group = explode(',',rtrim($_GET['track_group'],','));
					$order_id = $_GET['h1t_updat3_sh1pp1ng'];
					$key = $_GET['key'];
					$general_settings = get_option('hit_cp_auto_main_settings',array());
					$user_id = $_GET['user_id'];
					$carrier = $_GET['carrier'];
					$track = $_GET['track'];
					$pin = $_GET['pin'];
					$service = $_GET['service'];
					$output['temp_link'] = $_GET['temp_link'];
					$output['track_group'] = $_GET['track_group'];
					$output['selected_service'] = $service;
					$output['status'] = 'success';
					$output['ShipmentID'] = isset($_GET['ship_id']) ? $_GET['ship_id'] : $track;
					$output['tracking_num'] = $track;
					$output['tracking_pin'] = $pin;
					$output['label'] = "https://app.myshipi.com/api/shipping_labels/".$user_id."/".$carrier."/order_".$order_id."_track_".$track."_label.pdf";
					$output['invoice'] ="https://app.myshipi.com/api/shipping_labels/".$user_id."/".$carrier."/order_".$order_id."_track_".$track."_commercial_invoice.pdf";
					$output['manifest'] = "https://app.myshipi.com/api/shipping_labels/".$user_id."/".$carrier."/order_".$order_id."_track_".$track."_manifest.pdf";
					if(isset($general_settings['hit_cp_auto_integration_key']) && $general_settings['hit_cp_auto_integration_key'] == $key){
						update_option('hit_cp_auto_values_'.$order_id, json_encode($output));
					}
					die();
				}
			}
			public function hit_cp_method( $methods )
			{
				$methods['hit_cp_auto'] = 'hit_cp_auto'; 
				return $methods;
			}
			
			public function hit_cp_plugin_action_links($links)
			{
				$setting_value = version_compare(WC()->version, '2.1', '>=') ? "wc-settings" : "woocommerce_settings";
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=' . $setting_value  . '&tab=shipping&section=hit_cp_auto' ) . '" style="color:green;">' . __( 'Configure', 'hit_cp_auto' ) . '</a>',
					'<a href="#" target="_blank" >' . __('Support', 'hit_cp_auto') . '</a>'
					);
				return array_merge( $plugin_links, $links );
			}
			public function create_cp_shipping_meta_box() {
				$meta_scrn = $this->hpos_enabled ? wc_get_page_screen_id( 'shop-order' ) : 'shop_order';
	       		add_meta_box( 'hit_create_cp_shipping', __('Canada Post Shipping Label','hit_cp_auto'), array($this, 'create_cp_shipping_label_genetation'), $meta_scrn, 'side', 'core' );
		    }
		    public function create_cp_shipping_label_genetation($post){
		    	// print_r('expression');
		    	// die();		    	
		        if(!$this->hpos_enabled && $post->post_type !='shop_order' ){
		    		return;
		    	}
		    	$order = (!$this->hpos_enabled) ? wc_get_order( $post->ID ) : $post;
				$order_id = $order->get_id();
				
		        $_cp_carriers = array(
					//"Public carrier name" => "technical name",
					'DOM.RP'                    => 'Regular Parcel',
					'DOM.EP'                    => 'Expedited Parcel',
					'DOM.XP'                    => 'Xpresspost',
					'DOM.XP.CERT'                    => 'Xpresspost Certified',
					'DOM.PC'                    => 'Priority',
					'DOM.LIB'                    => 'Library Materials',
					'USA.EP'                    => 'Expedited Parcel USA',
					'USA.PW.ENV'                    => 'Priority Worldwide Envelope USA',
					'USA.PW.PAK'                    => 'Priority Worldwide pak USA',
					'USA.PW.PARCEL'                    => 'Priority Worldwide Parcel USA',
					'USA.SP.AIR'                    => 'Small Packet USA Air',
					'USA.TP'                    => 'Tracked Packet – USA',
					'USA.XP'                    => 'Xpresspost USA',
					'INT.XP'                    => 'Xpresspost International',
					'INT.IP.AIR'                    => 'International Parcel Air',
					'INT.IP.SURF'                    => 'International Parcel Surface',
					'INT.PW.ENV'                    => 'Priority Worldwide Envelope Int’l',
					'INT.PW.PAK'                    => 'Priority Worldwide pak Int’l',
					'INT.PW.PARCEL'                    => 'Priority Worldwide parcel Int’l',
					'INT.SP.AIR'                    => 'Small Packet International Air',
					'INT.SP.SURF'                    => 'Small Packet International Surface',
					'INT.TP'                    => 'Tracked Packet – International'
				);

						

		        $general_settings = get_option('hit_cp_auto_main_settings',array());
		       	
		       	$json_data = get_option('hit_cp_auto_values_'.$order_id);

		       	if(empty($json_data)){

			        echo '<b>Choose Service to Ship</b>';
			        echo '<br/><select name="hit_cp_auto_service_code">';
			        if(!empty($general_settings['hit_cp_auto_carrier'])){
			        	foreach ($general_settings['hit_cp_auto_carrier'] as $key => $value) {
			        		echo "<option value='".$key."'>".$key .' - ' .$_cp_carriers[$key]."</option>";
			        	}
			        }
					echo '</select>';
					
					// echo '<br/><b>Pack Type</b>';
			        // echo '<br/><select name="hit_cp_auto_pack_type">';
			        
			        // 	foreach ($_packing_types_ser as $key => $value) {
			        // 		echo "<option value='".$key."'>".$key .' - ' .$_packing_types_ser[$key]."</option>";
			        // 	}
			        
			        // echo '</select>';
			        
			        echo '<br/><b>Shipment Content</b>';
			        
			        echo '<br/><input type="text" style="width:250px;margin-bottom:10px;"  name="hit_cp_auto_shipment_content" placeholder="Shipment content" value="' . (($general_settings['hit_cp_auto_ship_content']) ? $general_settings['hit_cp_auto_ship_content'] : "") . '" >';
			        $notice = get_option('hit_cp_auto_status_'.$order_id, null);
					
			        if($notice && $notice != 'success'){
						// print_r($notice);
						if(is_array($notice)){
							echo "<p style='color:red'>".$notice['status']."</p>";
						}else{
						echo "<p style='color:red'>".$notice."</p>";
						}
			        	delete_option('hit_cp_auto_status_'.$order_id);
			        }
			        echo '<button name="hit_cp_auto_create_label" style="background:#af0000; color: #f0f0f0;border-color: #af0000;box-shadow: 0px 1px 0px #af0000;text-shadow: 0px 1px 0px #f0f0f0;" class="button button-primary">Create Shipment</button>';

		       	} else{
					// echo "<pre>";  
					// print_r(json_decode( $json_data, true ));
					// die();
					   $array_data = json_decode( $json_data, true );
					
					
					$tracking_group = (isset($array_data['track_group']) && !empty($array_data['track_group'])) ? explode(',',rtrim($array_data['track_group'],','),) : '';
					   echo '<b>ShipmentID :</b>'.(!empty($tracking_group) ? implode(', ', $tracking_group) : $array_data['ShipmentID']).'</br>';
					   // echo '<b>Tracking Pin :</b>'.$array_data['tracking_pin'].'</br>';
					   echo '<b>Selected Service :</b>'.$array_data['selected_service'].'</br>';
// 					echo "<pre>";
// 					print_r($array_data);
// 					die();
					   if(!empty($tracking_group) && !empty($array_data['track_group'])){
						foreach($tracking_group as $count=>$shipment_id){
							$invoice = $this->get_link_from_temp('commercial_invoice',$shipment_id,$array_data['temp_link'],$count);
							$label = $this->get_link_from_temp('label',$shipment_id,$array_data['temp_link'],$count);
							$manifest = $this->get_link_from_temp('manifest',$shipment_id,$array_data['temp_link'],$count);
						echo '<a href="'.$label.'" target="_blank" style="background:#af0000; margin-top:8px; color: #f0f0f0;border-color: #af0000;box-shadow: 0px 1px 0px #af0000;text-shadow: 0px 1px 0px #D40511;" class="button button-primary"> Shipping Label </a> ';
						echo '<a href="'.$invoice.'" target="_blank" style="margin-top:8px; margin-left:0px" class="button button-primary"> Invoice </a>';
							
						if(isset($array_data['manifest'])){
						echo '<a href="'.$manifest.'" target="_blank" style="margin-top:8px; margin-left:4px" class="button button-primary"> Manifest </a> </br>';
						}
						}
						echo '<button style="margin-top:4px" name="hit_cp_auto_reset" class="button button-secondary"> Reset </button>';
					}else{
					$invoice = $this->get_link_from_temp('commercial_invoice',$array_data['ShipmentID'],$array_data['temp_link'],0);
						   $label = $this->get_link_from_temp('label',$array_data['ShipmentID'],$array_data['temp_link'],0);
						   $manifest = $this->get_link_from_temp('manifest',$array_data['ShipmentID'],$array_data['temp_link'],0);
						echo '<a href="'.$label.'" target="_blank" style="background:#af0000; margin-top:8px; color: #f0f0f0;border-color: #af0000;box-shadow: 0px 1px 0px #af0000;text-shadow: 0px 1px 0px #D40511;" class="button button-primary"> Shipping Label </a> ';
						echo '<a href="'.$invoice.'" target="_blank" style="margin-top:8px; margin-left:0px" class="button button-primary"> Invoice </a>';
						if(isset($array_data['manifest'])){
							echo '<a href="'.$manifest.'" target="_blank" style="margin-top:8px; margin-left:4px" class="button button-primary"> Manifest </a> </br>';
						} 
						
						
						echo '<button style="margin-top:4px" name="hit_cp_auto_reset" class="button button-secondary"> Reset </button>';
					}
		       		  
		       	}

			}
			public function get_link_from_temp($type,$ship_id,$link,$count){
				$link = str_replace('type',$type,$link );
				$link = str_replace('ship_id',$ship_id,$link );
				$link = str_replace('count',$count,$link );
				return $link;
			}
		    public function hit_wc_checkout_order_processed($order_id){
				$general_settings = get_option('hit_cp_auto_main_settings',array());
				if(!isset($general_settings['hit_cp_auto_label_automation']) || (isset($general_settings['hit_cp_auto_label_automation']) && $general_settings['hit_cp_auto_label_automation'] != 'yes')){
					return;
				}
				$_cp_carriers = array(
					//"Public carrier name" => "technical name",
					'DOM.RP'                         => 'Regular Parcel',
					'DOM.EP'                         => 'Expedited Parcel',
					'DOM.XP'                         => 'Xpresspost',
					'DOM.XP.CERT'                    => 'Xpresspost Certified',
					'DOM.PC'                         => 'Priority',
					'DOM.LIB'                        => 'Library Materials',
					'USA.EP'                         => 'Expedited Parcel USA',
					'USA.PW.ENV'                     => 'Priority Worldwide Envelope USA',
					'USA.PW.PAK'                     => 'Priority Worldwide pak USA',
					'USA.PW.PARCEL'                  => 'Priority Worldwide Parcel USA',
					'USA.SP.AIR'                     => 'Small Packet USA Air',
					'USA.TP'                         => 'Tracked Packet – USA',
					'USA.XP'                         => 'Xpresspost USA',
					'INT.XP'                         => 'Xpresspost International',
					'INT.IP.AIR'                     => 'International Parcel Air',
					'INT.IP.SURF'                    => 'International Parcel Surface',
					'INT.PW.ENV'                     => 'Priority Worldwide Envelope Int’l',
					'INT.PW.PAK'                     => 'Priority Worldwide pak Int’l',
					'INT.PW.PARCEL'                  => 'Priority Worldwide parcel Int’l',
					'INT.SP.AIR'                     => 'Small Packet International Air',
					'INT.SP.SURF'                    => 'Small Packet International Surface',
					'INT.TP'                         => 'Tracked Packet – International'
				);
		    	//print_r($order);
		    	// die();
		    	if ($this->hpos_enabled) {
	 		        if ('shop_order' !== Automattic\WooCommerce\Utilities\OrderUtil::get_order_type($order_id)) {
	 		            return;
	 		        }
	 		    } else {
			    	$post = get_post($order_id);
			    	if($post->post_type !='shop_order' ){
			    		return;
			    	}
			    }
				
		    	$ship_content = !empty($_POST['hit_cp_auto_shipment_content']) ? $_POST['hit_cp_auto_shipment_content'] : 'Shipment Content';
				   $order = wc_get_order( $order_id );
				  //print_r($order);
		        $service_code ='';
		        foreach( $order->get_shipping_methods() as $item_id => $item ){
					$service_nme = $item->get_name();
					//print_r($service_nme);
					$select_code = array_search($service_nme, $_cp_carriers);
					$service_code = str_replace("cp_","",$select_code);
					//  print_r($service_code);
					
					// $service_code = $item->get_meta('hit_cp_auto_service');
				// print_r($item);
				}
				
				// if(empty($service_code)){
				// 	return;
				// }
				
		    	$order_data = $order->get_data();
				//print_r($order_data);
	       		$order_id = $order_data['id'];
	       		$order_currency = $order_data['currency'];

	       		// $order_shipping_first_name = $order_data['shipping']['first_name'];
				// $order_shipping_last_name = $order_data['shipping']['last_name'];
				// $order_shipping_company = empty($order_data['shipping']['company']) ? $order_data['shipping']['first_name'] :  $order_data['shipping']['company'];
				// $order_shipping_address_1 = $order_data['shipping']['address_1'];
				// $order_shipping_address_2 = $order_data['shipping']['address_2'];
				// $order_shipping_city = $order_data['shipping']['city'];
				// $order_shipping_state = $order_data['shipping']['state'];
				// $order_shipping_postcode = $order_data['shipping']['postcode'];
				// $order_shipping_country = $order_data['shipping']['country'];
				// $order_shipping_phone = $order_data['billing']['phone'];
				// $order_shipping_email = $order_data['billing']['email'];

				$shipping_arr = (isset($order_data['shipping']['first_name']) && $order_data['shipping']['first_name'] != "") ? $order_data['shipping'] : $order_data['billing'];
                $order_shipping_first_name = $shipping_arr['first_name'];
                $order_shipping_last_name = $shipping_arr['last_name'];
                $order_shipping_company = empty($shipping_arr['company']) ? $shipping_arr['first_name'] :  $shipping_arr['company'];
                $order_shipping_address_1 = $shipping_arr['address_1'];
                $order_shipping_address_2 = $shipping_arr['address_2'];
                $order_shipping_city = $shipping_arr['city'];
                $order_shipping_state = $shipping_arr['state'];
                $order_shipping_postcode = $shipping_arr['postcode'];
                $order_shipping_country = $shipping_arr['country'];
                $order_shipping_phone = $order_data['billing']['phone'];
                $order_shipping_email = $order_data['billing']['email'];

				$items = $order->get_items();
				$pack_products = array();
				

				foreach ( $items as $item ) {
					$product_data = $item->get_data();
				    $product = array();
				    $product['product_name'] = $product_data['name'];
				    $product['product_quantity'] = $product_data['quantity'];
					$product['product_id'] = $product_data['product_id'];
				    $product_variation_id = $item->get_variation_id();
				    if(empty($product_variation_id)){
				    	$getproduct = wc_get_product( $product_data['product_id'] );
				    }else{
				    	$getproduct = wc_get_product( $product_variation_id );
				    }

					
					$woo_weight_unit = get_option('woocommerce_weight_unit');
					$woo_dimension_unit = get_option('woocommerce_dimension_unit');
					
					$cp_mod_weight_unit = $cp_mod_dim_unit = '';

					if(!empty($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'KG_CM')
					{
						$cp_mod_weight_unit = 'kg';
						$cp_mod_dim_unit = 'cm';
					}elseif(!empty($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'LB_IN')
					{
						$cp_mod_weight_unit = 'lbs';
						$cp_mod_dim_unit = 'in';
					}
					else
					{
						$cp_mod_weight_unit = 'kg';
						$cp_mod_dim_unit = 'cm';
					}
					if ($woo_dimension_unit != $cp_mod_dim_unit) {
						$prod_width = $getproduct->get_width();
						$prod_height = $getproduct->get_height();
						$prod_depth = $getproduct->get_length();

						//wc_get_dimension( $dimension, $to_unit, $from_unit );
						$product['width'] = (!empty($prod_width) && $prod_width > 0) ? round(wc_get_dimension( $prod_width, $cp_mod_dim_unit, $woo_dimension_unit ), 2) : 0.1 ;
						$product['height'] = (!empty($prod_height) && $prod_height > 0) ?  round(wc_get_dimension( $prod_height, $cp_mod_dim_unit, $woo_dimension_unit ), 2) : 0.1 ;
						$product['depth'] = (!empty($prod_depth) && $prod_depth > 0) ? round(wc_get_dimension( $prod_depth, $cp_mod_dim_unit, $woo_dimension_unit ), 2) : 0.1 ;
						}else {
							$product['width'] = $getproduct->get_width();
							$product['height'] = $getproduct->get_height();
							$product['depth'] = $getproduct->get_length();
						}
						
						if ($woo_weight_unit != $cp_mod_weight_unit) {
							$prod_weight = $getproduct->get_weight();
							$product['weight'] = (!empty($prod_weight) && $prod_weight > 0) ? round(wc_get_weight( $prod_weight, $cp_mod_weight_unit, $woo_weight_unit ), 2) : 0.1 ;
						}else{
							$product['weight'] = $getproduct->get_weight();
						}


				    $product['price'] = $getproduct->get_price();
					// $product['width'] = $getproduct->get_width();
					// //print_r($product['price']);
					// $product['height'] = $getproduct->get_height();
					// //print_r($product['height']);
				    // $product['depth'] = $getproduct->get_length();
				    // $product['weight'] = $getproduct->get_weight();
				    $pack_products[] = $product;
				    
				}
				
				$desination_country = (isset($order_data['shipping']['country']) && $order_data['shipping']['country'] != '') ? $order_data['shipping']['country'] : $order_data['billing']['country'];
				if(empty($service_code)){
					if( !isset($general_settings['hit_cp_auto_international_service']) && !isset($general_settings['hit_cp_auto_Domestic_service'])){
						return;
					}
					if (isset($general_settings['hit_cp_auto_country']) && $general_settings["hit_cp_auto_country"] == $desination_country && $general_settings['hit_cp_auto_Domestic_service'] != 'null'){
						$service_code = $general_settings['hit_cp_auto_Domestic_service'];
					} elseif (isset($general_settings['hit_cp_auto_country']) && $general_settings["hit_cp_auto_country"] != $desination_country && $general_settings['hit_cp_auto_international_service'] != 'null'){
						$service_code = $general_settings['hit_cp_auto_international_service'];
					} else {
						return;
					}
					
				}

				if(!empty($general_settings) && isset($general_settings['hit_cp_auto_integration_key'])){
					$mode = 'live';
					if(isset($general_settings['hit_cp_auto_test']) && $general_settings['hit_cp_auto_test']== 'yes'){
						$mode = 'test';
					}
					$execution = 'manual';
					if(isset($general_settings['hit_cp_auto_label_automation']) && $general_settings['hit_cp_auto_label_automation']== 'yes'){
						$execution = 'auto';
					}
					$pack_type = isset($_POST['hit_cp_auto_pack_type'])?$_POST['hit_cp_auto_pack_type']:'02';
							$shipping_total = $order->get_shipping_total();

					$data = array();
					$data['integrated_key'] = $general_settings['hit_cp_auto_integration_key'];
					$data['order_id'] = $order_id;
					$data['exec_type'] = $execution;
					$data['mode'] = $mode;
					$data['carrier_type'] = 'cp';
					$data['meta'] = array(
						"site_id" => $general_settings['hit_cp_auto_site_id'],
						"password"  => $general_settings['hit_cp_auto_site_pwd'],
						"accountnum" => $general_settings['hit_cp_auto_acc_no'],
						"contractId" => $general_settings['hit_cp_auto_access_key'],
						"t_company" => $order_shipping_company,
						"t_address1" => $order_shipping_address_1,
						"t_address2" => $order_shipping_address_2,
						"t_city" => $order_shipping_city,
						"t_state" => $order_shipping_state,
						"t_postal" => $order_shipping_postcode,
						"t_country" => $order_shipping_country,
						"t_name" => $order_shipping_first_name . ' '. $order_shipping_last_name,
						"t_phone" => $order_shipping_phone,
						"t_email" => $order_shipping_email,
						"dutiable" => $general_settings['hit_cp_auto_duty_payment'],
						"insurance" => $general_settings['hit_cp_auto_insure'],
						"pack_this" => "Y",
						"residential" => 'false',
						"packing_type" => $pack_type,
						"shipping_charge" => $shipping_total,
						"NDH"  =>$general_settings['hit_cp_auto_ndh'],
						"products" => $pack_products,
						"pack_algorithm" => $general_settings['hit_cp_auto_packing_type'],
						"max_weight" => $general_settings['hit_cp_auto_max_weight'],
						"plt" => ($general_settings['hit_cp_auto_ppt'] == 'yes') ? "Y" : "N",
						"airway_bill" => ($general_settings['hit_cp_auto_aabill'] == 'yes') ? "Y" : "N",
						"sd" => ($general_settings['hit_cp_auto_sat'] == 'yes') ? "Y" : "N",
						"cod" => ($general_settings['hit_cp_auto_cod'] == 'yes') ? $this->checkCod($general_settings['hit_cp_auto_country'], $order_shipping_country) : "N",
						"service_code" => $service_code,
						"shipment_content" => $ship_content,
						"s_company" => $general_settings['hit_cp_auto_company'],
						"s_address1" => $general_settings['hit_cp_auto_address1'],
						"s_address2" => $general_settings['hit_cp_auto_address2'],
						"s_city" => $general_settings['hit_cp_auto_city'],
						"s_state" => $general_settings['hit_cp_auto_state'],
						"s_postal" => $general_settings['hit_cp_auto_zip'],
						"s_country" => $general_settings['hit_cp_auto_country'],
						"gstin" => $general_settings['hit_cp_auto_gstin'],
						"s_name" => $general_settings['hit_cp_auto_shipper_name'],
						"s_phone" => $general_settings['hit_cp_auto_mob_num'],
						"s_email" => $general_settings['hit_cp_auto_email'],
						"sig_req" => ($general_settings['hit_cp_auto_sig_req'] == 'yes') ? "Y" : "N",			
						"label_format" => "PDF",
						"label_size" => $general_settings['hit_cp_auto_print_size'],
						"sent_email_to" => $general_settings['hit_cp_auto_label_email'],
						"conversion_rate" => $general_settings['hit_cp_auto_con_rate'],
						"label" => "default",
						
					);
					
					// echo "<pre>";print_r(json_encode($data));die();
					//auto
					$auto_ship_url = "https://app.myshipi.com/label_api/create_shipment.php";
						wp_remote_post( $auto_ship_url , array(
							'method'      => 'POST',
							'timeout'     => 45,
							'redirection' => 5,
							'httpversion' => '1.0',
							'blocking'    => false,
							'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
							'body'        => json_encode($data),
							'sslverify'   => FALSE
							)
						);
					// if($output && isset($output['sttaus'])){
						
					// }
				}	
		    }
		    // Save the data of the Meta field
			public function hit_create_cp_shipping( $order_id ) {
				$general_settings = get_option('hit_cp_auto_main_settings',array());
				if ($this->hpos_enabled) {
	 		        if ('shop_order' !== Automattic\WooCommerce\Utilities\OrderUtil::get_order_type($order_id)) {
	 		            return;
	 		        }
	 		    } else {
			    	$post = get_post($order_id);
			    	if($post->post_type !='shop_order' ){
			    		return;
			    	}
			    }
		    	
		    	if (  isset( $_POST[ 'hit_cp_auto_reset' ] ) ) {
		    		delete_option('hit_cp_auto_values_'.$order_id);
		    	}

		    	if (  isset( $_POST[ 'hit_cp_auto_service_code' ] ) && isset($_POST['hit_cp_auto_create_label']) ) {
		           $service_code = str_replace("cp_","",$_POST['hit_cp_auto_service_code']);
		           $ship_content = !empty($_POST['hit_cp_auto_shipment_content']) ? $_POST['hit_cp_auto_shipment_content'] : 'Shipment Content';
		           $order = wc_get_order( $order_id );
			       if($order){
			       		$order_data = $order->get_data();
			       		$order_id = $order_data['id'];
			       		$order_currency = $order_data['currency'];

			       		// $order_shipping_first_name = $order_data['shipping']['first_name'];
						// $order_shipping_last_name = $order_data['shipping']['last_name'];
						// $order_shipping_company = empty($order_data['shipping']['company']) ? $order_data['shipping']['first_name'] :  $order_data['shipping']['company'];
						// $order_shipping_address_1 = $order_data['shipping']['address_1'];
						// $order_shipping_address_2 = $order_data['shipping']['address_2'];
						// $order_shipping_city = $order_data['shipping']['city'];
						// $order_shipping_state = $order_data['shipping']['state'];
						// $order_shipping_postcode = $order_data['shipping']['postcode'];
						// $order_shipping_country = $order_data['shipping']['country'];
						// $order_shipping_phone = $order_data['billing']['phone'];
						// $order_shipping_email = $order_data['billing']['email'];

						$shipping_arr = (isset($order_data['shipping']['first_name']) && $order_data['shipping']['first_name'] != "") ? $order_data['shipping'] : $order_data['billing'];
						$order_shipping_first_name = $shipping_arr['first_name'];
						$order_shipping_last_name = $shipping_arr['last_name'];
						$order_shipping_company = empty($shipping_arr['company']) ? $shipping_arr['first_name'] :  $shipping_arr['company'];
						$order_shipping_address_1 = $shipping_arr['address_1'];
						$order_shipping_address_2 = $shipping_arr['address_2'];
						$order_shipping_city = $shipping_arr['city'];
						$order_shipping_state = $shipping_arr['state'];
						$order_shipping_postcode = $shipping_arr['postcode'];
						$order_shipping_country = $shipping_arr['country'];
						$order_shipping_phone = $order_data['billing']['phone'];
						$order_shipping_email = $order_data['billing']['email'];

						$items = $order->get_items();
						$pack_products = array();
						
						foreach ( $items as $item ) {
							$product_data = $item->get_data();
						    $product = array();
						    $product['product_name'] = $product_data['name'];
						    $product['product_quantity'] = $product_data['quantity'];
							$product['product_id'] = $product_data['product_id'];
						    $product_variation_id = $item->get_variation_id();
						    if(empty($product_variation_id)){
						    	$getproduct = wc_get_product( $product_data['product_id'] );
						    }else{
						    	$getproduct = wc_get_product( $product_variation_id );
						    }
							
					$woo_weight_unit = get_option('woocommerce_weight_unit');
					$woo_dimension_unit = get_option('woocommerce_dimension_unit');
					
					$cp_mod_weight_unit = $cp_mod_dim_unit = '';

					if(!empty($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'KG_CM')
					{
						$cp_mod_weight_unit = 'kg';
						$cp_mod_dim_unit = 'cm';
					}elseif(!empty($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'LB_IN')
					{
						$cp_mod_weight_unit = 'lbs';
						$cp_mod_dim_unit = 'in';
					}
					else
					{
						$cp_mod_weight_unit = 'kg';
						$cp_mod_dim_unit = 'cm';
					}
					if ($woo_dimension_unit != $cp_mod_dim_unit) {
						$prod_width = $getproduct->get_width();
						$prod_height = $getproduct->get_height();
						$prod_depth = $getproduct->get_length();

						//wc_get_dimension( $dimension, $to_unit, $from_unit );
						$product['width'] = (!empty($prod_width) && $prod_width > 0) ? round(wc_get_dimension( $prod_width, $cp_mod_dim_unit, $woo_dimension_unit ), 2): 0.1 ;
						$product['height'] = (!empty($prod_height) && $prod_height > 0) ? round(wc_get_dimension( $prod_height, $cp_mod_dim_unit, $woo_dimension_unit ), 2): 0.1 ;
						$product['depth'] = (!empty($prod_depth) && $prod_depth > 0) ? round(wc_get_dimension( $prod_depth, $cp_mod_dim_unit, $woo_dimension_unit ), 2): 0.1 ;

						}else {
							$product['width'] = $getproduct->get_width();
							$product['height'] = $getproduct->get_height();
							$product['depth'] = $getproduct->get_length();
						}
						
						if ($woo_weight_unit != $cp_mod_weight_unit) {
							$prod_weight = $getproduct->get_weight();
							$product['weight'] = (!empty($prod_weight) && $prod_weight > 0) ? round(wc_get_weight( $prod_weight, $cp_mod_weight_unit, $woo_weight_unit ), 2): 0.1 ;
						}else{
							$product['weight'] = $getproduct->get_weight();
						}
						    
						    $product['price'] = $getproduct->get_price();
						    // $product['width'] = $getproduct->get_width();
						    // $product['height'] = $getproduct->get_height();
						    // $product['depth'] = $getproduct->get_length();
						    // $product['weight'] = $getproduct->get_weight();
						    $pack_products[] = $product;
						    
						}
						
						if(!empty($general_settings) && isset($general_settings['hit_cp_auto_integration_key'])){
							$mode = 'live';
							if(isset($general_settings['hit_cp_auto_test']) && $general_settings['hit_cp_auto_test']== 'yes'){
								$mode = 'test';
							}

							$execution = 'manual';
							// if(isset($general_settings['hit_cp_auto_label_automation']) && $general_settings['hit_cp_auto_label_automation']== 'yes'){
							// 	$execution = 'auto';
							// }
							$pack_type = isset($_POST['hit_cp_auto_pack_type'])?$_POST['hit_cp_auto_pack_type']:'02';
							$shipping_total = $order->get_shipping_total();
							//print_r($shipping_total);
							$data = array();
							$data['integrated_key'] = $general_settings['hit_cp_auto_integration_key'];
							$data['order_id'] = $order_id;
							$data['exec_type'] = $execution;
							$data['mode'] = $mode;
							$data['carrier_type'] = 'cp';
							$data['meta'] = array(
								"site_id" => $general_settings['hit_cp_auto_site_id'],
								"password"  => $general_settings['hit_cp_auto_site_pwd'],
								"accountnum" => $general_settings['hit_cp_auto_acc_no'],
								"contractId" => $general_settings['hit_cp_auto_access_key'],
								"t_company" => $order_shipping_company,
								"t_address1" => $order_shipping_address_1,
								"t_address2" => $order_shipping_address_2,
								"t_city" => $order_shipping_city,
								"t_state" => $order_shipping_state,
								"t_postal" => $order_shipping_postcode,
								"t_country" => $order_shipping_country,
								"t_name" => $order_shipping_first_name . ' '. $order_shipping_last_name,
								"t_phone" => $order_shipping_phone,
								"t_email" => $order_shipping_email,
								"dutiable" => $general_settings['hit_cp_auto_duty_payment'],
								"insurance" => $general_settings['hit_cp_auto_insure'],
								"pack_this" => "Y",
								"residential" => 'false',
								"drop_off_type" => "REGULAR_PICKUP",
								"packing_type" => $pack_type,
								"shipping_charge" => $shipping_total,
								"NDH"  =>$general_settings['hit_cp_auto_ndh'],
								"products" => $pack_products,
								"pack_algorithm" => $general_settings['hit_cp_auto_packing_type'],
								"max_weight" => $general_settings['hit_cp_auto_max_weight'],
								"plt" => ($general_settings['hit_cp_auto_ppt'] == 'yes') ? "Y" : "N",
								"airway_bill" => ($general_settings['hit_cp_auto_aabill'] == 'yes') ? "Y" : "N",
								"sd" => ($general_settings['hit_cp_auto_sat'] == 'yes') ? "Y" : "N",
								"cod" => ($general_settings['hit_cp_auto_cod'] == 'yes') ? $this->checkCod($general_settings['hit_cp_auto_country'], $order_shipping_country) : "N",
								"service_code" => $service_code,
								"shipment_content" => $ship_content,
								"s_company" => $general_settings['hit_cp_auto_company'],
								"s_address1" => $general_settings['hit_cp_auto_address1'],
								"s_address2" => $general_settings['hit_cp_auto_address2'],
								"s_city" => $general_settings['hit_cp_auto_city'],
								"s_state" => $general_settings['hit_cp_auto_state'],
								"s_postal" => $general_settings['hit_cp_auto_zip'],
								"s_country" => $general_settings['hit_cp_auto_country'],
								"gstin" => $general_settings['hit_cp_auto_gstin'],
								"s_name" => $general_settings['hit_cp_auto_shipper_name'],
								"s_phone" => $general_settings['hit_cp_auto_mob_num'],
								"s_email" => $general_settings['hit_cp_auto_email'],
								"label_format" => "PDF",
								"sig_req" => ($general_settings['hit_cp_auto_sig_req'] == 'yes') ? "Y" : "N",
								"label_size" => $general_settings['hit_cp_auto_print_size'],
								"sent_email_to" => $general_settings['hit_cp_auto_label_email'],
								"conversion_rate" => $general_settings['hit_cp_auto_con_rate'],
								"label" => "default",
							);
							//manual 
							$manual_ship_url = "https://app.myshipi.com/label_api/create_shipment.php";
							$response = wp_remote_post( $manual_ship_url , array(
								'method'      => 'POST',
								'timeout'     => 45,
								'redirection' => 5,
								'httpversion' => '1.0',
								'blocking'    => true,
								'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
								'body'        => json_encode($data),
								'sslverify'   => FALSE
								)
							);

							$output = (is_array($response) && isset($response['body'])) ? json_decode($response['body'],true) : [];

								if($output){
									if(isset($output['status'])){

										if(isset($output['status']) && $output['status'] != 'success'){
					
											   update_option('hit_cp_auto_status_'.$order_id, $output['status']);

										}else if(isset($output['status']) == 'success'){

											update_option('hit_cp_auto_values_'.$order_id, json_encode($output));											
										}
										else{
											update_option('hit_cp_auto_status_'.$order_id, 'Unhandled Response Found');
										}
									}else{
										update_option('hit_cp_auto_status_'.$order_id, 'Site not Connected with Shipi. Contact Shipi Team.');
									}
								}else{
									update_option('hit_cp_auto_status_'.$order_id, 'Site not Connected with Shipi. Contact Shipi Team.');
								}
						}	
			       }
		        }
		    }
		    public function checkCod($s_con = "", $r_con = ""){
		    	$cod = "Y";
		    	if ($s_con != $r_con) {
		    		$cod = "N";
		    	}
		    	return $cod;
		    }
		}
		
	}
	new hit_cp_auto_parent();
}

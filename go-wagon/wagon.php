<?php
/**
 * Plugin Name: Go Wagon
 * Plugin URI: https://go-wagon.com/
 * Description: Go Wagon is a shipping service for ecommerce companies.
 * Version: 1.2
 * Author: Mubarak Alsultan
 * Author URI: https://profiles.wordpress.org/mubarakalsultan/
 * Text Domain: wagon
 * Requires PHP: 7.0
 *
 */

/**
 * Check if woocommerce plugin is active.
 */
add_action("admin_notices", "wagon_admin_errors");
function wagon_admin_errors(){
	if( !is_plugin_active( 'woocommerce/woocommerce.php' ) ){
		?>
			<div class="notice notice-error" >
	            <p>Go Wagon Shipping Needs WooCommerce To Run. Please Install/Activate Woocommerce Plugin.</p>
	        </div>
		<?php
	}
}

/**
 * Register and enqueue a go wagon admin css.
 */
add_action( 'admin_enqueue_scripts', 'wagon_admin_css' );
function wagon_admin_css() {
	wp_enqueue_style('go_wagon_select2_css', plugin_dir_url( __FILE__ ) . 'assets/css/select2.css');
    wp_enqueue_script('go_wagon_select2_js', plugin_dir_url( __FILE__ ) . 'assets/js/select2.min.js');
    wp_enqueue_style( 'go_wagon_admin_css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css');
    wp_enqueue_script( 'go_wagon_admin_js', plugin_dir_url( __FILE__ ) . 'assets/js/wagon-admin.js'); 
}

/**
 * Check and create table for kuwait areas on plugin activation.
 */

register_activation_hook( __FILE__, 'wagon_check_and_create_areas_table' );
function wagon_check_and_create_areas_table(){

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;

	$tablename = "kuwait_areas";
	$main_sql_create = " CREATE TABLE ". $wpdb->prefix . $tablename . "( id INTEGER  NOT NULL PRIMARY KEY ,lat  NUMERIC(9,6) NOT NULL ,longi NUMERIC(9,6) NOT NULL ,area VARCHAR(52) NOT NULL )";    
	
	if(maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create )){

		wagon_insert_kuwait_areas(); // insert all areas record
	}
	
}

/**
 * Delete table for kuwait areas on plugin deactivation.
 */

register_deactivation_hook( __FILE__, 'wagon_delete_areas_table' );
function wagon_delete_areas_table(){

	$tablename = "kuwait_areas";

	global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . $tablename ); // delete table on plugin deactivation
}

/**
 * Register admin menu and page for GO Wagon.
 */
add_action( 'admin_menu', 'wagon_admin_menu' );
function wagon_admin_menu() {
	add_menu_page(
		'Go Wagon',
		'Go Wagon',
		'manage_options',
		'go-wagon',
		'wagon_admin_page_contents',
		'dashicons-admin-tools',
		100
	);
}

/**
 * GO Wagon admin page call back function.
 */
function wagon_admin_page_contents() {

	if(!empty($_POST['wagon_api_email']) && !empty($_POST['wagon_api_password']) && !empty($_POST['wagon_api_key']) ){

		$settings_array = array(
	       'wagon_api_email' 		=> sanitize_text_field( $_POST['wagon_api_email'] ),
	       'wagon_api_password' 	=> sanitize_text_field( $_POST['wagon_api_password'] ),
	       'wagon_api_key' 			=> sanitize_text_field( $_POST['wagon_api_key'] ),
	       'wagon_pickup_area'		=> sanitize_text_field( $_POST['wagon_pickup_area'] ),
	       'wagon_pickup_street'	=> sanitize_text_field( $_POST['wagon_pickup_street'] ),
	       'wagon_pickup_address'	=> sanitize_text_field( $_POST['wagon_pickup_address']),
	       'wagon_pickup_details'	=> sanitize_text_field( $_POST['wagon_pickup_details'] ),

		);
		  
		update_option('go_wagon_settings', $settings_array);
		?>
			<div class="notice notice-success" >
	            <p>Settings Saved Successfully!</p>
	        </div>
        <?php
	}

	global $wpdb;
    
    $areas_list = $wpdb->get_results( "SELECT * FROM ". $wpdb->prefix ."kuwait_areas");
	$go_wagon_settings = get_option("go_wagon_settings");
	
	$wagon_api_email 		= isset($go_wagon_settings['wagon_api_email']) ? $go_wagon_settings['wagon_api_email'] : '';
	$wagon_api_password 	= isset($go_wagon_settings['wagon_api_password']) ? $go_wagon_settings['wagon_api_password'] : '';
	$wagon_api_key 			= isset($go_wagon_settings['wagon_api_key']) ? $go_wagon_settings['wagon_api_key'] : '';
	$wagon_pickup_area 		= isset($go_wagon_settings['wagon_pickup_area']) ? $go_wagon_settings['wagon_pickup_area'] : '';
	$wagon_pickup_street 	= isset($go_wagon_settings['wagon_pickup_street']) ? $go_wagon_settings['wagon_pickup_street'] : '';
	$wagon_pickup_address 	= isset($go_wagon_settings['wagon_pickup_address']) ? $go_wagon_settings['wagon_pickup_address'] : '';
	$wagon_pickup_details 	= isset($go_wagon_settings['wagon_pickup_details']) ? $go_wagon_settings['wagon_pickup_details'] : '';

	?>
		<div class="wagon-card-background">
			<form method="post">
				<h1>Go Wagon API Configuration</h1>
				<input type="email" name="wagon_api_email" required="" value="<?php echo $wagon_api_email ?>" placeholder="your email">
				<input type="password" name="wagon_api_password" value="<?php echo $wagon_api_password ?>" required="" placeholder="your password">
				<input type="text" name="wagon_api_key" required="" value="<?php echo $wagon_api_key ?>" placeholder="secret key">
				
				<h1>Pickup Details</h1>
				<select name="wagon_pickup_area" id="wagon_pickup_area_select" required="">
				<?php
				echo "<option selected='' value=''>Please Select Area</option>"; 
					foreach ($areas_list as  $value) {
						if($value->id == $wagon_pickup_area){
							
							echo "<option selected='' value='" . $value->id . "'>" . $value->area . "</option>";
						}else{
						
							echo "<option value='" . $value->id . "'>" . $value->area . "</option>";
						}
					}
				?>
				</select>
				<input type="text" name="wagon_pickup_street" required="" value="<?php echo $wagon_pickup_street ?>" placeholder="pikcup street">
				<input type="text" name="wagon_pickup_address" required="" value="<?php echo $wagon_pickup_address ?>" placeholder="pikcup address">
				<input type="text" name="wagon_pickup_details" value="<?php echo $wagon_pickup_details ?>" placeholder="pickup additional details (optional)">
				<input type="submit" class="wagon-submit-btn" value="Save">
			</form>
		</div>
	<?php
}

/**
 * Customize woocommerce checkout.
 */
add_filter( 'woocommerce_checkout_fields' , 'wagon_customize_woocommerce_checkout', 1000);
function wagon_customize_woocommerce_checkout( $fields ) {

	global $wpdb;

	$areas_list = $wpdb->get_results( "SELECT * FROM ". $wpdb->prefix ."kuwait_areas");

	foreach ($areas_list as $value) {
		$areas[$value->id] = $value->area;
	}
	
	
	// add billing area dropdown
	$fields['billing']['billing_area'] = array(
		  'type'		=> 'select',
		  'label'     	=> __('Select Your Drop Area', 'woocommerce'),
		  'required'  	=> true,
		  'class'     	=> array('billing-drop-area', 'wagon-hidden'),
		  'clear'     	=> true,
		  'options'		=> $areas,
	);
	$fields['billing']['billing_area']['priority'] = 40;

	// add billing street
	// $fields['billing']['billing_street'] = array(
	// 	  'type'		=> 'text',
	// 	  'label'     	=> __('Street No#', 'woocommerce'),
	// 	  'required'  	=> true,
	// 	  'class'     	=> array('street'),
	// 	  'clear'     	=> true,
	// 	  'options'		=> $areas,
	// );
	// $fields['billing']['billing_street']['priority'] = 45;

	// add shipping area dropdown
	$fields['shipping']['shipping_area'] = array(
		  'type'		=> 'select',
		  'label'     	=> __('Select Your Drop Area', 'woocommerce'),
		  'required'  	=> true,
		  'class'     	=> array('shipping-drop-area', 'wagon-hidden'),
		  'clear'     	=> true,
		  'options'		=> $areas,
	);
	$fields['shipping']['shipping_area']['priority'] = 40;
	
	// add shipping street 
	// $fields['shipping']['shipping_street'] = array(
	// 	  'type'		=> 'text',
	// 	  'label'     	=> __('Street No#', 'woocommerce'),
	// 	  'required'  	=> true,
	// 	  'class'     	=> array('street'),
	// 	  'clear'     	=> true,
	// 	  'options'		=> $areas,
	// );
	// $fields['shipping']['shipping_street']['priority'] = 45;
	
	return $fields;
}

/**
 * Save woocommerce checkout fields.
 */
add_action( 'woocommerce_checkout_update_order_meta', 'wagon_save_woocommerce_checkout_fields');
function wagon_save_woocommerce_checkout_fields( $order_id ) {

    update_post_meta( $order_id, 'billing_area', sanitize_text_field( $_POST['billing_area'] ) );
    //update_post_meta( $order_id, 'billing_street', sanitize_text_field( $_POST['billing_street'] ) );

    if( $_POST['ship_to_different_address'] ){
    	if( isset($_POST['shipping_area']) && !empty($_POST['shipping_area']) ){

	    	update_post_meta($order_id, "shipping_area", sanitize_text_field( $_POST['shipping_area'] ));
	    }

	    // if( isset($_POST['shipping_street']) && !empty($_POST['shipping_street']) ){
	    	
	    // 	update_post_meta($order_id, "shipping_street", sanitize_text_field( $_POST['shipping_street'] ));
	    // }
    }
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'wagon_display_order_custom_data_on_admin_screen', 10, 1 );
function wagon_display_order_custom_data_on_admin_screen($order){
	
	global $wpdb;
	$wagon_shipping_data = get_post_meta($order->get_id(), "wagon_shipping_data", true );

    if( !empty(get_post_meta($order->get_id(), "shipping_area", true)) ){

    	$drop_area_id = get_post_meta($order->get_id(), "shipping_area", true);
    	//$street_no 	  = get_post_meta($order->get_id(), "shipping_street", true);
    }else{

    	$drop_area_id = get_post_meta($order->get_id(), "billing_area", true);
    	//$street_no 	  = get_post_meta($order->get_id(), "billing_street", true);
    }
    if(!empty($drop_area_id)){

		$row = $wpdb->get_results("SELECT * FROM " .$wpdb->prefix. "kuwait_areas WHERE id=".$drop_area_id);
    	$drop_area_data = $row[0]->area;
    }else{
    	$drop_area_data = "N/A";
    }

    echo '<p><strong>'.__('Drop Area & Block').':</strong> ' . $drop_area_data . '</p>';
    // echo '<p><strong>'.__('Street No#').':</strong> ' . $street_no . '</p>';

    if(!empty($wagon_shipping_data) && isset($wagon_shipping_data->status)){

    	if($wagon_shipping_data->status == 0){

			echo '<p><strong>'.__('Shipment Creation Status').':</strong> <span style="background-color: red; color: #fff; padding: 1px 20px; font-weight: 500;">Failed</span> </p>';
			echo '<p><strong>'.__('Reason').':</strong> ' . $wagon_shipping_data->message . '</p>'; 		
    	}else{
    		echo '<p><strong>'.__('Shipment Creation Status').':</strong> <span style="background-color: green; color: #fff; padding: 1px 20px; font-weight: 500;">Successfull</span> </p>';
			echo '<p><strong>'.__('Shipment ID#').':</strong> ' . $wagon_shipping_data->data->shipment_id . '</p>';

			//Mail Barcode to admin
			$go_wagon_settings = get_option("go_wagon_settings");
			$url = "http://test.go-wagon.com/thirdparty/api/get_shipment_details"; // Test URL
			$api_array = array(
			    'method' => 'POST',
			    'timeout'     => 60,
			    'body'	 => array(
						'email' 					=> $go_wagon_settings['wagon_api_email'],
						'password' 					=> $go_wagon_settings['wagon_api_password'],
						'secret_key' 				=> $go_wagon_settings['wagon_api_key'],
						'id' 						=> $wagon_shipping_data->data->shipment_id,
				),
			);
			$go_wagon_get_shipment_details = wp_remote_get( $url, $api_array );
			
			if ( is_wp_error( $go_wagon_get_shipment_details ) ) {
				$error_message = $go_wagon_get_shipment_details->get_error_message();
				$response = "Something went wrong:" . $error_message;

			} else {
				$body = wp_remote_retrieve_body( $go_wagon_get_shipment_details );
				$data = json_decode($body);
				echo '<img src="'.$data->data->qr_code.'"></img>';
				update_post_meta($order->get_id(), "wagon_qr_Code", $data->data->qr_code);
			}
    	}
    
    }else{
    	print_r($wagon_shipping_data);
    }
}
/**Add Barcode field in order email */
add_filter( 'woocommerce_email_order_meta_fields', 'custom_woocommerce_email_order_meta_fields', 10, 3 );
function custom_woocommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
	global $wpdb;
	$wagon_barcode_data = get_post_meta($order->get_id(), "wagon_qr_Code", true );
	if($wagon_barcode_data)
		echo '<img src="'.$wagon_barcode_data.'" alt="barcode"></img>';
}

/**
 * Display create shipment button on admin edit order page .
 */
// Adding Meta container admin shop_order pages
add_action( 'add_meta_boxes', 'wagon_admin_order_create_shipment' );
function wagon_admin_order_create_shipment() {
	global $post;

    $wagon_shipping_data = get_post_meta($post->ID, "wagon_shipping_data", true );

    if( empty($wagon_shipping_data) ){
	    add_meta_box( 
	    	'wagon_create_shippiment', 
	    	__('Wagon Book Shipment','woocommerce'),
	    	'wagon_admin_order_create_shipment_callback',
	    	'shop_order',
	    	'side',
	    	'core' 
	    );
	}
}
// Adding Meta field in the meta container admin shop_order pages
function wagon_admin_order_create_shipment_callback() { ?>

	<p style="border-bottom:solid 1px #eee; padding-bottom: 13px;">
		<input type="date" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" style="width: 100%;" name="wagon_booking_date">
		<input type="time" value="<?php echo date('h:i') ?>" name="wagon_booking_time" style="width: 100%; margin-top: 10px;">
    </p>
    <p style="text-align: right;">
		<input type="submit" class="button button-primary" value="Create Shipment">
    </p>
    
    <?php
}

// Save the data of the Meta field
add_action( 'save_post', 'wagon_admin_order_save_shipment_creation', 10, 1 );
function wagon_admin_order_save_shipment_creation( $post_id ) {

    if ( get_post_type($post_id) == "shop_order" ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            
            return $post_id;
        
        } else {

        	if( (isset($_POST['wagon_booking_date']) && !empty($_POST['wagon_booking_date'])) && (isset($_POST['wagon_booking_time']) && !empty($_POST['wagon_booking_time'])) ){

        		global $post;
			    $wagon_shipping_data = get_post_meta($post->ID, "wagon_shipping_data", true );

			    if( empty($wagon_shipping_data) ){
		    		wagon_create_new_shippiment($post_id, $_POST['wagon_booking_date'], $_POST['wagon_booking_time']);
		    	}
		    }
        }
    }
}


/**
 * Insert jquery in wp footer for checkout select menu.
 */
 
add_action("wp_footer", "wagon_add_searchbox_in_select_menu");
function wagon_add_searchbox_in_select_menu(){ ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
		    jQuery('#billing_area').select2();
		    jQuery('#shipping_area').select2();
		});
	</script>
<?php
}


/**
 * Display Shipment Creation Status On Admin Orders Table.
 */

add_filter( 'manage_edit-shop_order_columns', 'wagon_admin_orders_table_header', 20 );
function wagon_admin_orders_table_header( $columns ) {

    $new_columns = array();

    foreach ( $columns as $column_name => $column_info ) {

        $new_columns[ $column_name ] = $column_info;

        if ( 'order_total' === $column_name ) {
            $new_columns['order_profit'] = "Shipment Status";
        }
    }

    return $new_columns;
}

add_action( 'manage_shop_order_posts_custom_column', 'wagon_admin_order_table_content' );
function wagon_admin_order_table_content( $column ) {
    global $post;
    
    if ( 'order_profit' === $column ) {

		$wagon_shipping_data = get_post_meta($post->ID, "wagon_shipping_data", true );

	    if(!empty($wagon_shipping_data) && isset($wagon_shipping_data->status)){

	    	if($wagon_shipping_data->status == 0){

				echo '<span style="background-color: red; color: #fff; padding: 1px 20px; font-weight: 500;">Failed</span>';
				// echo '<p><strong>'.__('Reason').':</strong> ' . $wagon_shipping_data->message . '</p>'; 		
	    	}else{
	    		echo '<span style="background-color: green; color: #fff; padding: 1px 20px; font-weight: 500;">Successfull</span>';
				// echo '<p><strong>'.__('Shipment ID#').':</strong> ' . $wagon_shipping_data->data->shipment_id . '</p>';
	    	}

	    }else{
	    	print_r($wagon_shipping_data);
	    }
    }
}


/**
 * Create shipment on new order placed.
 */
function wagon_create_new_shippiment($order_id, $shipment_date='', $shipment_time=''){
	
	if(! $order_id){
		return false;
	}

	if( !get_post_meta( $order_id, '_thankyou_action_done', true ) ){

		global $wpdb;

		// get go wagon api settings from wp admin.
		$go_wagon_settings = get_option("go_wagon_settings");

		$pickup_area = $wpdb->get_results("SELECT * FROM ". $wpdb->prefix ."kuwait_areas WHERE id=". $go_wagon_settings['wagon_pickup_area']);
		$pickup_area_arr = explode(",", $pickup_area[0]->area);

		$order = wc_get_order( $order_id );

		$billing_first_name = $order->get_billing_first_name();
		$billing_last_name  = $order->get_billing_last_name();
		$billing_company    = $order->get_billing_company();
		$billing_address_1  = $order->get_billing_address_1();
		$billing_address_2  = $order->get_billing_address_2();
		$billing_city       = $order->get_billing_city();
		$billing_state      = $order->get_billing_state();
		$billing_postcode   = $order->get_billing_postcode();
		$billing_country    = $order->get_billing_country();
		$billing_phone 		= $order->get_billing_phone();

		// Customer shipping information details
		$shipping_first_name = $order->get_shipping_first_name();
		$shipping_last_name  = $order->get_shipping_last_name();
		$shipping_company    = $order->get_shipping_company();
		$shipping_address_1  = $order->get_shipping_address_1();
		$shipping_address_2  = $order->get_shipping_address_2();
		$shipping_city       = $order->get_shipping_city();
		$shipping_state      = $order->get_shipping_state();
		$shipping_postcode   = $order->get_shipping_postcode();
		$shipping_country    = $order->get_shipping_country();
		
		$order_total 		= $order->get_total();
		$customer_message 	= $order->get_customer_note();

		// Get and Loop Over Order Items
		foreach ( $order->get_items() as $item_id => $item ) {
		   
		   $products_name[] = $item->get_name();
		}

		$product_name = $item->get_name();

		if( !empty($shipping_drop_area_id = get_post_meta($order_id, "shipping_area", true)) ){
		
			$drop_area_id = $shipping_drop_area_id;
			//$drop_street = get_post_meta($order_id, "shipping_street", true);
		
		}else{
			$drop_area_id = get_post_meta($order_id, "billing_area", true);
			//$drop_street = get_post_meta($order_id, "billing_street", true);
		}

		$drop_area_array = $wpdb->get_results("SELECT * FROM ". $wpdb->prefix ."kuwait_areas WHERE id=". $drop_area_id );
		
		$drop_area_data = explode(",", $drop_area_array[0]->area);
		
		//$url = "https://urwagon.com/wagon_backendV2/public/thirdparty/api/create_shipment"; // Live URL
		$url = "http://test.go-wagon.com/thirdparty/api/create_shipment"; // Test URL
		$api_array = array(
			    'method' => 'POST',
			    'timeout'     => 60,
			    'body'	 => array(
			        'email' 					=> $go_wagon_settings['wagon_api_email'],
			        'password' 					=> $go_wagon_settings['wagon_api_password'],
			        'secret_key' 				=> $go_wagon_settings['wagon_api_key'],
			        'pickup_area' 				=> $pickup_area_arr[0]. ", ". $pickup_area_arr[1],
			        'pickup_block'				=> $pickup_area_arr[2],
			        'pickup_street' 			=> $go_wagon_settings['wagon_pickup_street'],
			        'pickup_address' 			=> $go_wagon_settings['wagon_pickup_address'],
			        'pickup_latitude'			=> $pickup_area[0]->lat,
			        'pickup_longitude'			=> $pickup_area[0]->longi,
			        'pickup_additional_details' => $go_wagon_settings['wagon_pickup_details'],
			        'drop_area'					=> $drop_area_data[0]. ", ". $drop_area_data[1],
			        'drop_block'				=> $drop_area_data[2],
			        'drop_street'				=> "44",
			        'drop_address'				=> $shipping_address_1. ", ". $shipping_address_2,
			        'drop_latitude'				=> $drop_area_array[0]->lat,
			        'drop_longitude'			=> $drop_area_array[0]->longi,
			        'drop_additional_details'	=> $customer_message,
			        'receiver_name'				=> $shipping_first_name. " ". $shipping_last_name,
			        'receiver_phone'			=> $billing_phone,
			        'shipment_package_name'		=> implode(", ", $products_name),
			        'shipment_package_value'	=> $order_total,
			        'invoice_no'				=> $order_id,
			        'scheduled_date'			=> $shipment_date,
			        'scheduled_time'			=> $shipment_time,
			    ),
			);
		$go_wagon_create_shipment = wp_remote_post( $url, $api_array );

		if ( is_wp_error( $go_wagon_create_shipment ) ) {
		
		    $error_message = $go_wagon_create_shipment->get_error_message();
			$response = "Something went wrong:" . $error_message;
			print_r($response);

		} else {
		    
			$response = json_decode($go_wagon_create_shipment['body']);
			print_r($response);
			//print_r($response['data']['shipment_id']);
		}
		
	    update_post_meta($order_id, "wagon_shipping_data", $response);
	    // update_post_meta($order_id, "_thankyou_action_done", true);
	}

}

/**
 * Frontend CSS.
 */
add_action("wp_head", "wagon_frontend_css");
function wagon_frontend_css(){
	?>
		<style type="text/css">
			.wagon-hidden{
				display: none !important;
			}
			.billing-drop-area .select2,
			.shipping-drop-area .select2{
				width: 100% !important;
			}
		</style>
	<?php 
}

/**
 * Frontend JS.
 */
add_action("wp_footer", "wagon_frontend_js");
function wagon_frontend_js(){
	?>
		<script type="text/javascript">
			jQuery(document).ready(function(e){

				if(jQuery("#billing_country").val() == "KW"){
					jQuery(".billing-drop-area").removeClass("wagon-hidden");
				}
				if(jQuery("#shipping_country").val() == "KW"){
					jQuery(".shipping-drop-area").removeClass("wagon-hidden");
				}
				jQuery("#billing_country").on("change", function(e){
					
					if(jQuery(this).val() == "KW"){
						jQuery(".billing-drop-area").removeClass("wagon-hidden");
					}else{
						jQuery(".billing-drop-area").addClass("wagon-hidden");
					}
				});
				jQuery("#shipping_country").on("change", function(e){
					
					if(jQuery(this).val() == "KW"){
						jQuery(".shipping-drop-area").removeClass("wagon-hidden");
					}else{
						jQuery(".shipping-drop-area").addClass("wagon-hidden");
					}
				});
			});
		</script>
	<?php
}


/**
 * MYSQL query of all kuwait areas "keep it in last".
 */
function wagon_insert_kuwait_areas(){

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;

	$tablename = "kuwait_areas";

	$sql = "INSERT INTO `" . $wpdb->prefix . $tablename . "` (`id`, `lat`, `longi`, `area`) VALUES
		('11', '29.12488', '48.12478', 'Ahmadi, Abu Halifa, Block 1'),
		('12', '29.13349', '48.12227', 'Ahmadi, Abu Halifa, Block 2'),
		('13', '29.12723', '48.13399', 'Ahmadi, Abu Halifa, Block 3'),
		('14', '28.84756', '47.89653', 'Ahmadi, Ahmadi Governorate Desert, Block 1'),
		('15', '29.18247', '47.85861', 'Ahmadi, Al shadadyia Industrial, Block 1'),
		('16', '29.18172', '48.11572', 'Ahmadi, Al-Fintas, Block 1'),
		('17', '29.17467', '48.11794', 'Ahmadi, Al-Fintas, Block 2'),
		('18', '29.16791', '48.11820', 'Ahmadi, Al-Fintas, Block 3'),
		('19', '29.16331', '48.11578', 'Ahmadi, Al-Fintas, Block 4'),
		('20', '29.17057', '48.12337', 'Ahmadi, Al-Fintas, Block 5'),
		('21', '28.57268', '48.37733', 'Ahmadi, Al-Nuwaiseeb, Block 1'),
		('22', '28.95243', '48.14547', 'Ahmadi, Ali Subah Al-Salem, Block 1'),
		('23', '28.94611', '48.14900', 'Ahmadi, Ali Subah Al-Salem, Block 2'),
		('24', '28.95927', '48.14214', 'Ahmadi, Ali Subah Al-Salem, Block 3'),
		('25', '28.95021', '48.15923', 'Ahmadi, Ali Subah Al-Salem, Block 4'),
		('26', '28.95793', '48.16491', 'Ahmadi, Ali Subah Al-Salem, Block 5'),
		('27', '28.95437', '48.15534', 'Ahmadi, Ali Subah Al-Salem, Block 6'),
		('28', '28.96011', '48.15256', 'Ahmadi, Ali Subah Al-Salem, Block 7'),
		('29', '28.96608', '48.14772', 'Ahmadi, Ali Subah Al-Salem, Block 8'),
		('30', '28.96678', '48.15763', 'Ahmadi, Ali Subah Al-Salem, Block 9'),
		('31', '29.17130', '48.06614', 'Ahmadi, Dhaher, Block 1'),
		('32', '29.16511', '48.07005', 'Ahmadi, Dhaher, Block 2'),
		('33', '29.15781', '48.07361', 'Ahmadi, Dhaher, Block 3'),
		('34', '29.15752', '48.06729', 'Ahmadi, Dhaher, Block 4'),
		('35', '29.16340', '48.06252', 'Ahmadi, Dhaher, Block 5'),
		('36', '29.16961', '48.05877', 'Ahmadi, Dhaher, Block 6'),
		('37', '29.08357', '48.07743', 'Ahmadi, East Ahmadi, Block 1'),
		('38', '29.08989', '48.09344', 'Ahmadi, East Ahmadi, Block 10'),
		('39', '29.07693', '48.07570', 'Ahmadi, East Ahmadi, Block 2'),
		('40', '29.07589', '48.07959', 'Ahmadi, East Ahmadi, Block 3'),
		('41', '29.06979', '48.09132', 'Ahmadi, East Ahmadi, Block 5'),
		('42', '29.07606', '48.09057', 'Ahmadi, East Ahmadi, Block 6'),
		('43', '29.08170', '48.09344', 'Ahmadi, East Ahmadi, Block 7'),
		('44', '29.08162', '48.08419', 'Ahmadi, East Ahmadi, Block 8'),
		('45', '29.08594', '48.08467', 'Ahmadi, East Ahmadi, Block 9'),
		('46', '29.17983', '48.1069', 'Ahmadi, Egaila, Block 1'),
		('47', '29.17415', '48.10678', 'Ahmadi, Egaila, Block 2'),
		('48', '29.16580', '48.10647', 'Ahmadi, Egaila, Block 3'),
		('49', '29.17792', '48.09609', 'Ahmadi, Egaila, Block 4'),
		('50', '29.17138', '48.09645', 'Ahmadi, Egaila, Block 5'),
		('51', '29.16293', '48.09745', 'Ahmadi, Egaila, Block 6'),
		('52', '29.13146', '48.10940', 'Ahmadi, Fahad Al-Ahmad, Block 1'),
		('53', '29.13054', '48.09885', 'Ahmadi, Fahad Al-Ahmad, Block 2'),
		('54', '29.12380', '48.11081', 'Ahmadi, Fahad Al-Ahmad, Block 3'),
		('55', '29.12522', '48.09851', 'Ahmadi, Fahad Al-Ahmad, Block 4'),
		('56', '29.08730', '48.11828', 'Ahmadi, Fahaheel, Block 1'),
		('57', '29.08813', '48.13438', 'Ahmadi, Fahaheel, Block 10'),
		('58', '29.08171', '48.13703', 'Ahmadi, Fahaheel, Block 11'),
		('59', '29.07654', '48.13878', 'Ahmadi, Fahaheel, Block 12'),
		('60', '29.07210', '48.14271', 'Ahmadi, Fahaheel, Block 13'),
		('61', '29.08507', '48.14026', 'Ahmadi, Fahaheel, Block 14'),
		('62', '29.08211', '48.12077', 'Ahmadi, Fahaheel, Block 2'),
		('63', '29.07583', '48.12109', 'Ahmadi, Fahaheel, Block 3'),
		('64', '29.07819', '48.11550', 'Ahmadi, Fahaheel, Block 4'),
		('65', '29.07228', '48.11890', 'Ahmadi, Fahaheel, Block 5'),
		('66', '29.07350', '48.13161', 'Ahmadi, Fahaheel, Block 6'),
		('67', '29.07800', '48.13001', 'Ahmadi, Fahaheel, Block 7'),
		('68', '29.08212', '48.12751', 'Ahmadi, Fahaheel, Block 8'),
		('69', '29.08792', '48.12638', 'Ahmadi, Fahaheel, Block 9'),
		('70', '29.15393', '48.09121', 'Ahmadi, Hadiya, Block 1'),
		('71', '29.15241', '48.08376', 'Ahmadi, Hadiya, Block 2'),
		('72', '29.14706', '48.09465', 'Ahmadi, Hadiya, Block 3'),
		('73', '29.14615', '48.08746', 'Ahmadi, Hadiya, Block 4'),
		('74', '29.13801', '48.09489', 'Ahmadi, Hadiya, Block 5'),
		('75', '29.17770', '48.08753', 'Ahmadi, Jaber Al-Ali, Block 1'),
		('76', '29.17563', '48.07643', 'Ahmadi, Jaber Al-Ali, Block 2'),
		('77', '29.16636', '48.07653', 'Ahmadi, Jaber Al-Ali, Block 3'),
		('78', '29.16304', '48.08185', 'Ahmadi, Jaber Al-Ali, Block 4'),
		('79', '29.15776', '48.08181', 'Ahmadi, Jaber Al-Ali, Block 5'),
		('80', '29.16176', '48.08924', 'Ahmadi, Jaber Al-Ali, Block 6'),
		('81', '29.17057', '48.08885', 'Ahmadi, Jaber Al-Ali, Block 7'),
		('82', '29.17050', '48.08201', 'Ahmadi, Jaber Al-Ali, Block 8'),
		('83', '28.70303', '47.92663', 'Ahmadi, Janobyia Aljawakheer, Block 1'),
		('84', '28.70273', '47.93938', 'Ahmadi, Janobyia Aljawakheer, Block 2'),
		('85', '28.714', '47.93971', 'Ahmadi, Janobyia Aljawakheer, Block 3'),
		('86', '28.71431', '47.92695', 'Ahmadi, Janobyia Aljawakheer, Block 4'),
		('87', '29.05784', '47.79917', 'Ahmadi, kabd Agricultural, Block 1'),
		('88', '28.66806', '48.28535', 'Ahmadi, Khiran City, Block 2'),
		('89', '28.65898', '48.27831', 'Ahmadi, Khiran City, Block 3'),
		('90', '28.66601', '48.27892', 'Ahmadi, Khiran City, Block 7'),
		('91', '29.14329', '48.04573', 'Ahmadi, Magwa, Block 1'),
		('92', '29.14790', '48.11577', 'Ahmadi, Mahboula, Block 1'),
		('93', '29.15244', '48.12121', 'Ahmadi, Mahboula, Block 2'),
		('94', '29.14165', '48.12503', 'Ahmadi, Mahboula, Block 3'),
		('95', '29.14674', '48.12880', 'Ahmadi, Mahboula, Block 4'),
		('96', '29.11366', '48.12899', 'Ahmadi, Mangaf, Block 1'),
		('97', '29.11265', '48.12038', 'Ahmadi, Mangaf, Block 2'),
		('98', '29.09747', '48.12207', 'Ahmadi, Mangaf, Block 3'),
		('99', '29.10069', '48.13170', 'Ahmadi, Mangaf, Block 4'),
		('100', '29.10888', '48.13694', 'Ahmadi, Mangaf, Block 5'),
		('101', '29.08989', '48.06816', 'Ahmadi, Middle of Ahmadi, Block 10'),
		('102', '29.09322', '48.06754', 'Ahmadi, Middle of Ahmadi, Block 11'),
		('103', '29.09073', '48.08137', 'Ahmadi, Middle of Ahmadi, Block 12'),
		('104', '29.09205', '48.05330', 'Ahmadi, Middle of Ahmadi, Block 9'),
		('105', '28.97768', '48.09198', 'Ahmadi, Mina Abdulla, Block 1'),
		('106', '29.00540', '48.14921', 'Ahmadi, Mina Abdullah Refinery, Block 1'),
		('107', '29.05500', '48.12248', 'Ahmadi, Mina Al-Ahmadi Refinery, Block 1'),
		('108', '28.61086', '48.00753', 'Ahmadi, New Wafra, Block 1'),
		('109', '28.61389', '48.01477', 'Ahmadi, New Wafra, Block 2'),
		('110', '28.60643', '48.01766', 'Ahmadi, New Wafra, Block 3'),
		('111', '28.60339', '48.01046', 'Ahmadi, New Wafra, Block 4'),
		('112', '28.61485', '48.02736', 'Ahmadi, New Wafra, Block 5'),
		('113', '28.60205', '48.03302', 'Ahmadi, New Wafra, Block 6'),
		('114', '28.59534', '48.01990', 'Ahmadi, New Wafra, Block 7'),
		('115', '28.60622', '48.01965', 'Ahmadi, New Wafra, Block 8'),
		('116', '29.10068', '48.05486', 'Ahmadi, North Ahmadi, Block 13'),
		('117', '29.09695', '48.06428', 'Ahmadi, North Ahmadi, Block 14'),
		('118', '29.10171', '48.07253', 'Ahmadi, North Ahmadi, Block 15'),
		('119', '29.10595', '48.06523', 'Ahmadi, North Ahmadi, Block 16'),
		('120', '29.10764', '48.06789', 'Ahmadi, North Ahmadi, Block 17'),
		('121', '29.17208', '47.83950', 'Ahmadi, Rajim Khashman, Block 1'),
		('122', '29.1829', '47.81472', 'Ahmadi, Rajim Khashman, Block 1'),
		('123', '29.13545', '47.80613', 'Ahmadi, Rajim Khashman, Block 2'),
		('124', '29.14548', '47.81844', 'Ahmadi, Rajim Khashman, Block 3'),
		('125', '29.13539', '47.81821', 'Ahmadi, Rajim Khashman, Block 4'),
		('126', '29.14098', '47.82498', 'Ahmadi, Rajim Khashman, Block 5'),
		('127', '29.15572', '48.10759', 'Ahmadi, Riqqa, Block 1'),
		('128', '29.15461', '48.09990', 'Ahmadi, Riqqa, Block 2'),
		('129', '29.14787', '48.10934', 'Ahmadi, Riqqa, Block 3'),
		('130', '29.14673', '48.10405', 'Ahmadi, Riqqa, Block 4'),
		('131', '29.14675', '48.10032', 'Ahmadi, Riqqa, Block 5'),
		('132', '29.14019', '48.11087', 'Ahmadi, Riqqa, Block 6'),
		('133', '29.1389', '48.10486', 'Ahmadi, Riqqa, Block 7'),
		('134', '28.80392', '48.05207', 'Ahmadi, Sabah Al-Ahmad 1, Block 1'),
		('135', '28.80935', '48.05580', 'Ahmadi, Sabah Al-Ahmad 1, Block 2'),
		('136', '28.80302', '48.06920', 'Ahmadi, Sabah Al-Ahmad 1, Block 3'),
		('137', '28.79737', '48.07569', 'Ahmadi, Sabah Al-Ahmad 1, Block 4'),
		('138', '28.79427', '48.06791', 'Ahmadi, Sabah Al-Ahmad 1, Block 5'),
		('139', '28.80050', '48.06405', 'Ahmadi, Sabah Al-Ahmad 1, Block 6'),
		('140', '28.79907', '48.04872', 'Ahmadi, Sabah Al-Ahmad 2, Block 1'),
		('141', '28.79394', '48.05971', 'Ahmadi, Sabah Al-Ahmad 2, Block 2'),
		('142', '28.78784', '48.06116', 'Ahmadi, Sabah Al-Ahmad 2, Block 3'),
		('143', '28.78741', '48.05177', 'Ahmadi, Sabah Al-Ahmad 2, Block 4'),
		('144', '28.79414', '48.04262', 'Ahmadi, Sabah Al-Ahmad 2, Block 5'),
		('145', '28.79181', '48.05111', 'Ahmadi, Sabah Al-Ahmad 2, Block 6'),
		('146', '28.78487', '48.03676', 'Ahmadi, Sabah Al-Ahmad 3, Block 1'),
		('147', '28.78245', '48.04533', 'Ahmadi, Sabah Al-Ahmad 3, Block 2'),
		('148', '28.77114', '48.03776', 'Ahmadi, Sabah Al-Ahmad 3, Block 3'),
		('149', '28.774', '48.03140', 'Ahmadi, Sabah Al-Ahmad 3, Block 4'),
		('150', '28.78212', '48.04069', 'Ahmadi, Sabah Al-Ahmad 3, Block 5'),
		('151', '28.76683', '48.07840', 'Ahmadi, Sabah Al-Ahmad 4, Block 1'),
		('152', '28.76110', '48.07312', 'Ahmadi, Sabah Al-Ahmad 4, Block 2'),
		('153', '28.76629', '48.06100', 'Ahmadi, Sabah Al-Ahmad 4, Block 3'),
		('154', '28.77351', '48.05844', 'Ahmadi, Sabah Al-Ahmad 4, Block 4'),
		('155', '28.77438', '48.06763', 'Ahmadi, Sabah Al-Ahmad 4, Block 5'),
		('156', '28.76877', '48.06925', 'Ahmadi, Sabah Al-Ahmad 4, Block 6'),
		('157', '28.77882', '48.07585', 'Ahmadi, Sabah Al-Ahmad 5, Block 1'),
		('158', '28.79104', '48.08636', 'Ahmadi, Sabah Al-Ahmad 5, Block 2'),
		('159', '28.78818', '48.09217', 'Ahmadi, Sabah Al-Ahmad 5, Block 3'),
		('160', '28.77511', '48.08470', 'Ahmadi, Sabah Al-Ahmad 5, Block 4'),
		('161', '28.77852', '48.08129', 'Ahmadi, Sabah Al-Ahmad 5, Block 5'),
		('162', '28.76353', '48.05958', 'Ahmadi, Sabah Al-Ahmad 6, Block 1'),
		('163', '28.76076', '48.05853', 'Ahmadi, Sabah Al-Ahmad 6, Block 2'),
		('164', '28.75779', '48.05836', 'Ahmadi, Sabah Al-Ahmad 6, Block 3'),
		('165', '28.65946', '48.36955', 'Ahmadi, Sabah Al-Ahmad Al-marine, Block 1'),
		('166', '28.68562', '48.36924', 'Ahmadi, Sabah Al-Ahmad Al-marine, Block 2'),
		('167', '28.65321', '48.33972', 'Ahmadi, Sabah Al-Ahmad Al-marine, Block 3'),
		('168', '28.66614', '48.32094', 'Ahmadi, Sabah Al-Ahmad Al-marine, Block 3'),
		('169', '28.62295', '48.35361', 'Ahmadi, Sabah Al-Ahmad Al-marine, Block 4'),
		('170', '28.75675', '48.04498', 'Ahmadi, Sabah Al-Ahmad Investment, Block 1'),
		('171', '28.75215', '48.05649', 'Ahmadi, Sabah Al-Ahmad Investment, Block 2'),
		('172', '28.74731', '48.06862', 'Ahmadi, Sabah Al-Ahmad Investment, Block 3'),
		('173', '28.80854', '48.07483', 'Ahmadi, Sabah Al-Ahmad Services, Block 1'),
		('174', '28.75816', '48.03721', 'Ahmadi, Sabah Al-Ahmad Services, Block 10'),
		('175', '28.76339', '48.02868', 'Ahmadi, Sabah Al-Ahmad Services, Block 11'),
		('176', '28.80521', '48.09526', 'Ahmadi, Sabah Al-Ahmad Services, Block 2'),
		('177', '28.79993', '48.08444', 'Ahmadi, Sabah Al-Ahmad Services, Block 3'),
		('178', '28.79561', '48.08217', 'Ahmadi, Sabah Al-Ahmad Services, Block 4'),
		('179', '28.78855', '48.07782', 'Ahmadi, Sabah Al-Ahmad Services, Block 5'),
		('180', '28.78256', '48.06466', 'Ahmadi, Sabah Al-Ahmad Services, Block 6'),
		('181', '28.77716', '48.04947', 'Ahmadi, Sabah Al-Ahmad Services, Block 7'),
		('182', '28.77026', '48.04352', 'Ahmadi, Sabah Al-Ahmad Services, Block 8'),
		('183', '28.76454', '48.04055', 'Ahmadi, Sabah Al-Ahmad Services, Block 9'),
		('184', '29.09860', '48.11209', 'Ahmadi, Sabahiya, Block 1'),
		('185', '29.0991', '48.10138', 'Ahmadi, Sabahiya, Block 2'),
		('186', '29.11383', '48.09988', 'Ahmadi, Sabahiya, Block 3'),
		('187', '29.11348', '48.11232', 'Ahmadi, Sabahiya, Block 4'),
		('188', '29.10683', '48.10679', 'Ahmadi, Sabahiya, Block 5'),
		('189', '28.62946', '48.38388', 'Ahmadi, Shalehat Al-Khiran, Block 1'),
		('190', '28.56162', '48.40891', 'Ahmadi, Shalehat Al-Nuwaiseeb, Block 1'),
		('191', '28.81697', '48.27589', 'Ahmadi, Shalehat Bneder, Block 1'),
		('192', '28.92119', '48.20723', 'Ahmadi, Shalehat Dba\'ayeh, Block 1'),
		('193', '28.88362', '48.26306', 'Ahmadi, Shalehat Jlea\'a, Block 1'),
		('194', '28.96768', '48.17260', 'Ahmadi, Shalehat Mina Abdullah, Block 1'),
		('195', '28.67429', '48.38426', 'Ahmadi, Shalehat Zoor, Block 1'),
		('196', '29.04168', '48.12153', 'Ahmadi, Shuaiba Industrial esterly, Block 1'),
		('197', '29.03857', '48.15301', 'Ahmadi, Shuaiba Industrial esterly, Block 10'),
		('198', '29.04506', '48.15572', 'Ahmadi, Shuaiba Industrial esterly, Block 11'),
		('199', '29.03293', '48.12384', 'Ahmadi, Shuaiba Industrial esterly, Block 2'),
		('200', '29.02263', '48.13742', 'Ahmadi, Shuaiba Industrial esterly, Block 3'),
		('201', '29.02765', '48.13897', 'Ahmadi, Shuaiba Industrial esterly, Block 4'),
		('202', '29.03377', '48.13881', 'Ahmadi, Shuaiba Industrial esterly, Block 5'),
		('203', '29.04143', '48.13460', 'Ahmadi, Shuaiba Industrial esterly, Block 6'),
		('204', '29.04156', '48.14594', 'Ahmadi, Shuaiba Industrial esterly, Block 7'),
		('205', '29.02204', '48.15450', 'Ahmadi, Shuaiba Industrial esterly, Block 8'),
		('206', '29.03091', '48.15375', 'Ahmadi, Shuaiba Industrial esterly, Block 9'),
		('207', '29.00380', '48.13147', 'Ahmadi, Shuaiba Industrial Western, Block 1'),
		('208', '28.97141', '48.11962', 'Ahmadi, Shuaiba Industrial Western, Block 10'),
		('209', '29.01923', '48.10245', 'Ahmadi, Shuaiba Industrial Western, Block 11'),
		('210', '28.99956', '48.10525', 'Ahmadi, Shuaiba Industrial Western, Block 12'),
		('211', '28.99003', '48.10866', 'Ahmadi, Shuaiba Industrial Western, Block 13'),
		('212', '28.99763', '48.13424', 'Ahmadi, Shuaiba Industrial Western, Block 2'),
		('213', '28.99310', '48.13298', 'Ahmadi, Shuaiba Industrial Western, Block 3'),
		('214', '28.98893', '48.13130', 'Ahmadi, Shuaiba Industrial Western, Block 4'),
		('215', '28.98091', '48.12885', 'Ahmadi, Shuaiba Industrial Western, Block 5'),
		('216', '29.02006', '48.11866', 'Ahmadi, Shuaiba Industrial Western, Block 6'),
		('217', '29.00012', '48.11966', 'Ahmadi, Shuaiba Industrial Western, Block 7'),
		('218', '28.99107', '48.11946', 'Ahmadi, Shuaiba Industrial Western, Block 8'),
		('219', '28.98270', '48.11615', 'Ahmadi, Shuaiba Industrial Western, Block 9'),
		('220', '29.21903', '47.89315', 'Ahmadi, South Abdullah Al-Mubarak, Block 1'),
		('221', '29.21630', '47.89879', 'Ahmadi, South Abdullah Al-Mubarak, Block 2'),
		('222', '29.21090', '47.90232', 'Ahmadi, South Abdullah Al-Mubarak, Block 3'),
		('223', '29.20826', '47.89657', 'Ahmadi, South Abdullah Al-Mubarak, Block 4'),
		('224', '29.20587', '47.88996', 'Ahmadi, South Abdullah Al-Mubarak, Block 5'),
		('225', '29.19935', '47.89105', 'Ahmadi, South Abdullah Al-Mubarak, Block 6'),
		('226', '29.08324', '48.06379', 'Ahmadi, South Ahmadi, Block 1'),
		('227', '29.07930', '48.06841', 'Ahmadi, South Ahmadi, Block 4'),
		('228', '29.08538', '48.07101', 'Ahmadi, South Ahmadi, Block 6'),
		('229', '29.08679', '48.06376', 'Ahmadi, South Ahmadi, Block 7'),
		('230', '29.07519', '48.05978', 'Ahmadi, South Ahmadi, Block 8'),
		('231', '29.07840', '48.10597', 'Ahmadi, South-Sabahiya, Block 1'),
		('232', '29.20915', '47.82989', 'Ahmadi, Sulaibyia Industrial 3, Block 1'),
		('233', '28.60248', '47.89740', 'Ahmadi, Wafra, Block 1'),
		('234', '28.58780', '47.99195', 'Ahmadi, Wafra Farms, Block 1'),
		('235', '28.61199', '48.08549', 'Ahmadi, Wafra Farms, Block 10'),
		('236', '28.59135', '48.08852', 'Ahmadi, Wafra Farms, Block 10'),
		('237', '28.59254', '48.08183', 'Ahmadi, Wafra Farms, Block 10'),
		('238', '28.61160', '48.05004', 'Ahmadi, Wafra Farms, Block 11'),
		('239', '28.66275', '48.16302', 'Ahmadi, Wafra Farms, Block 12'),
		('240', '28.63287', '48.18995', 'Ahmadi, Wafra Farms, Block 13'),
		('241', '28.57156', '48.05902', 'Ahmadi, Wafra Farms, Block 2'),
		('242', '28.55390', '48.06281', 'Ahmadi, Wafra Farms, Block 3'),
		('243', '28.53853', '48.04838', 'Ahmadi, Wafra Farms, Block 4'),
		('244', '28.54552', '48.16709', 'Ahmadi, Wafra Farms, Block 5'),
		('245', '28.56070', '48.27086', 'Ahmadi, Wafra Farms, Block 6'),
		('246', '28.60283', '48.24331', 'Ahmadi, Wafra Farms, Block 7'),
		('247', '28.60772', '48.15943', 'Ahmadi, Wafra Farms, Block 8'),
		('248', '28.60924', '48.12366', 'Ahmadi, Wafra Farms, Block 9'),
		('249', '28.71633', '48.33462', 'Ahmadi, Zoor, Block 1'),
		('250', '29.35675', '47.98143', 'Asma, Abdulla Al-Salem, Block 1'),
		('251', '29.35199', '47.98932', 'Asma, Abdulla Al-Salem, Block 2'),
		('252', '29.34957', '47.98290', 'Asma, Abdulla Al-Salem, Block 3'),
		('253', '29.34873', '47.97602', 'Asma, Abdulla Al-Salem, Block 4'),
		('254', '29.32895', '47.97636', 'Asma, Adailiya, Block 1'),
		('255', '29.32229', '47.97819', 'Asma, Adailiya, Block 2'),
		('256', '29.32352', '47.98724', 'Asma, Adailiya, Block 3'),
		('257', '29.33044', '47.98483', 'Asma, Adailiya, Block 4'),
		('258', '29.36009', '47.96987', 'Asma, Al Sour Gardens, Block 1'),
		('259', '29.36069', '47.98018', 'Asma, Al Sour Gardens, Block 2'),
		('260', '29.36385', '47.98880', 'Asma, Al Sour Gardens, Block 3'),
		('261', '29.36992', '47.99383', 'Asma, Al Sour Gardens, Block 4'),
		('262', '29.37789', '48.43996', 'Asma, Auha Island, Block 1'),
		('263', '29.37048', '48.00687', 'Asma, Bnaid Al-Qar, Block 1'),
		('264', '29.37531', '48.00073', 'Asma, Bnaid Al-Qar, Block 2'),
		('265', '29.37967', '48.00012', 'Asma, Bnaid Al-Qar, Block 3'),
		('266', '29.35604', '48.00770', 'Asma, Daiya, Block 1'),
		('267', '29.36103', '48.01032', 'Asma, Daiya, Block 2'),
		('268', '29.35366', '48.01309', 'Asma, Daiya, Block 3'),
		('269', '29.35887', '48.01583', 'Asma, Daiya, Block 4'),
		('270', '29.36388', '48.01827', 'Asma, Daiya, Block 5'),
		('271', '29.36636', '47.99627', 'Asma, Dasma, Block 1'),
		('272', '29.37073', '47.99784', 'Asma, Dasma, Block 2'),
		('273', '29.36276', '47.99874', 'Asma, Dasma, Block 3'),
		('274', '29.36779', '48.00269', 'Asma, Dasma, Block 4'),
		('275', '29.36038', '48.00365', 'Asma, Dasma, Block 5'),
		('276', '29.36456', '48.00608', 'Asma, Dasma, Block 6'),
		('277', '29.38943', '47.99632', 'Asma, Dasman, Block 1'),
		('278', '29.38590', '47.99839', 'Asma, Dasman, Block 2'),
		('279', '29.38411', '48.00072', 'Asma, Dasman, Block 3'),
		('280', '29.31757', '47.82665', 'Asma, Doha, Block 1'),
		('281', '29.31554', '47.8214', 'Asma, Doha, Block 2'),
		('282', '29.31562', '47.81499', 'Asma, Doha, Block 3'),
		('283', '29.32011', '47.79679', 'Asma, Doha, Block 4'),
		('284', '29.31565', '47.81816', 'Asma, Doha, Block 5'),
		('285', '29.34192', '47.97408', 'Asma, Faiha, Block 1'),
		('286', '29.34258', '47.97788', 'Asma, Faiha, Block 2'),
		('287', '29.34348', '47.98182', 'Asma, Faiha, Block 3'),
		('288', '29.33799', '47.97416', 'Asma, Faiha, Block 4'),
		('289', '29.33872', '47.97866', 'Asma, Faiha, Block 5'),
		('290', '29.33976', '47.98302', 'Asma, Faiha, Block 6'),
		('291', '29.33402', '47.97421', 'Asma, Faiha, Block 7'),
		('292', '29.33481', '47.97943', 'Asma, Faiha, Block 8'),
		('293', '29.33592', '47.98427', 'Asma, Faiha, Block 9'),
		('294', '29.43444', '48.33380', 'Asma, Failaka Island, Block 1'),
		('295', '29.31298', '47.88093', 'Asma, Ghornata, Block 1'),
		('296', '29.31233', '47.87508', 'Asma, Ghornata, Block 2'),
		('297', '29.31338', '47.86685', 'Asma, Ghornata, Block 3'),
		('298', '29.32334', '47.89506', 'Asma, Health Area, Block 1'),
		('299', '29.33132', '47.77782', 'Asma, Jaber Al-Ahmad, Block 1'),
		('300', '29.33737', '47.76585', 'Asma, Jaber Al-Ahmad, Block 2'),
		('301', '29.34384', '47.77330', 'Asma, Jaber Al-Ahmad, Block 3'),
		('302', '29.33904', '47.75194', 'Asma, Jaber Al-Ahmad, Block 4'),
		('303', '29.34823', '47.74350', 'Asma, Jaber Al-Ahmad, Block 5'),
		('304', '29.35388', '47.75784', 'Asma, Jaber Al-Ahmad, Block 6'),
		('305', '29.35400', '47.77316', 'Asma, Jaber Al-Ahmad, Block 7'),
		('306', '29.32926', '47.95823', 'Asma, Khaldiya, Block 1'),
		('307', '29.32942', '47.96681', 'Asma, Khaldiya, Block 2'),
		('308', '29.32243', '47.96878', 'Asma, Khaldiya, Block 3'),
		('309', '29.32085', '47.96222', 'Asma, Khaldiya, Block 4'),
		('310', '29.33947', '47.96841', 'Asma, Kifan, Block 1'),
		('311', '29.34186', '47.96444', 'Asma, Kifan, Block 2'),
		('312', '29.34496', '47.95787', 'Asma, Kifan, Block 3'),
		('313', '29.33432', '47.96674', 'Asma, Kifan, Block 4'),
		('314', '29.34117', '47.95573', 'Asma, Kifan, Block 5'),
		('315', '29.33805', '47.95186', 'Asma, Kifan, Block 6'),
		('316', '29.33572', '47.95981', 'Asma, Kifan, Block 7'),
		('317', '29.07161', '48.49231', 'Asma, Kubbar Island, Block 1'),
		('318', '29.36085', '47.99171', 'Asma, Mansouriya, Block 1'),
		('319', '29.35607', '47.99631', 'Asma, Mansouriya, Block 2'),
		('320', '29.35976', '47.80366', 'Asma, Mina Doha, Block 1'),
		('321', '29.36485', '47.97900', 'Asma, Mirqab, Block 1'),
		('322', '29.36763', '47.98462', 'Asma, Mirqab, Block 2'),
		('323', '29.37161', '47.98917', 'Asma, Mirqab, Block 3'),
		('324', '29.48575', '48.25160', 'Asma, Mischan Island, Block 1'),
		('325', '29.31503', '47.90891', 'Asma, Mubarakiya Camps, Block 1'),
		('326', '29.32373', '47.80888', 'Asma, Northwest Sulaibikhat, Block 1'),
		('327', '29.33129', '47.80606', 'Asma, Northwest Sulaibikhat, Block 2'),
		('328', '29.32783', '47.81809', 'Asma, Northwest Sulaibikhat, Block 3'),
		('329', '29.34561', '47.99330', 'Asma, Nuzha, Block 1'),
		('330', '29.34290', '47.98757', 'Asma, Nuzha, Block 2'),
		('331', '29.33916', '47.99324', 'Asma, Nuzha, Block 3'),
		('332', '29.34964', '47.99664', 'Asma, Qadsiya, Block 1'),
		('333', '29.35188', '47.99989', 'Asma, Qadsiya, Block 2'),
		('334', '29.35443', '48.00334', 'Asma, Qadsiya, Block 3'),
		('335', '29.34650', '47.99901', 'Asma, Qadsiya, Block 4'),
		('336', '29.34897', '48.00252', 'Asma, Qadsiya, Block 5'),
		('337', '29.35181', '48.00633', 'Asma, Qadsiya, Block 6'),
		('338', '29.34326', '48.00148', 'Asma, Qadsiya, Block 7'),
		('339', '29.34590', '48.00533', 'Asma, Qadsiya, Block 8'),
		('340', '29.34905', '48.00956', 'Asma, Qadsiya, Block 9'),
		('341', '28.81462', '48.75895', 'Asma, Qaruh Island, Block 1'),
		('342', '29.37656', '47.97014', 'Asma, Qibla, Block 1'),
		('343', '29.36988', '47.97596', 'Asma, Qibla, Block 10'),
		('344', '29.36847', '47.97209', 'Asma, Qibla, Block 11'),
		('345', '29.36687', '47.96869', 'Asma, Qibla, Block 12'),
		('346', '29.36353', '47.96974', 'Asma, Qibla, Block 13'),
		('347', '29.36426', '47.96255', 'Asma, Qibla, Block 14'),
		('348', '29.37092', '47.96645', 'Asma, Qibla, Block 15'),
		('349', '29.37808', '47.97276', 'Asma, Qibla, Block 2'),
		('350', '29.37420', '47.97082', 'Asma, Qibla, Block 3'),
		('351', '29.37514', '47.97295', 'Asma, Qibla, Block 4'),
		('352', '29.37662', '47.97469', 'Asma, Qibla, Block 5'),
		('353', '29.37138', '47.97126', 'Asma, Qibla, Block 6'),
		('354', '29.37316', '47.97359', 'Asma, Qibla, Block 7'),
		('355', '29.37468', '47.97565', 'Asma, Qibla, Block 8'),
		('356', '29.37261', '47.97865', 'Asma, Qibla, Block 9'),
		('357', '29.31729', '47.98894', 'Asma, Qortuba, Block 1'),
		('358', '29.30968', '47.99336', 'Asma, Qortuba, Block 2'),
		('359', '29.30714', '47.98367', 'Asma, Qortuba, Block 3'),
		('360', '29.31448', '47.97984', 'Asma, Qortuba, Block 4'),
		('361', '29.31226', '47.98634', 'Asma, Qortuba, Block 5'),
		('362', '29.32534', '47.99466', 'Asma, Rawda, Block 1'),
		('363', '29.32566', '48.00001', 'Asma, Rawda, Block 2'),
		('364', '29.32604', '48.00606', 'Asma, Rawda, Block 3'),
		('365', '29.33467', '48.00052', 'Asma, Rawda, Block 4'),
		('366', '29.33283', '47.99307', 'Asma, Rawda, Block 5'),
		('367', '29.37100', '47.76144', 'Asma, Shalehat Doha, Block 1'),
		('368', '29.35757', '47.96440', 'Asma, Shamiya, Block 1'),
		('369', '29.35712', '47.96725', 'Asma, Shamiya, Block 10'),
		('370', '29.35725', '47.97145', 'Asma, Shamiya, Block 2'),
		('371', '29.35328', '47.96273', 'Asma, Shamiya, Block 3'),
		('372', '29.35353', '47.96705', 'Asma, Shamiya, Block 4'),
		('373', '29.35233', '47.97069', 'Asma, Shamiya, Block 5'),
		('374', '29.35060', '47.96610', 'Asma, Shamiya, Block 6'),
		('375', '29.34905', '47.96009', 'Asma, Shamiya, Block 7'),
		('376', '29.34699', '47.96514', 'Asma, Shamiya, Block 8'),
		('377', '29.34641', '47.97029', 'Asma, Shamiya, Block 9'),
		('378', '29.38066', '47.97815', 'Asma, Sharq, Block 1'),
		('379', '29.38450', '47.98443', 'Asma, Sharq, Block 2'),
		('380', '29.38754', '47.99075', 'Asma, Sharq, Block 3'),
		('381', '29.38274', '47.99221', 'Asma, Sharq, Block 4'),
		('382', '29.37951', '47.98755', 'Asma, Sharq, Block 5'),
		('383', '29.37609', '47.98216', 'Asma, Sharq, Block 6'),
		('384', '29.37636', '47.99079', 'Asma, Sharq, Block 7'),
		('385', '29.37935', '47.99512', 'Asma, Sharq, Block 8'),
		('386', '29.35780', '47.96074', 'Asma, Shuwaikh, Block 1'),
		('387', '29.35461', '47.95907', 'Asma, Shuwaikh, Block 2'),
		('388', '29.35668', '47.95689', 'Asma, Shuwaikh, Block 3'),
		('389', '29.35181', '47.95628', 'Asma, Shuwaikh, Block 4'),
		('390', '29.35451', '47.95370', 'Asma, Shuwaikh, Block 5'),
		('391', '29.34822', '47.94807', 'Asma, Shuwaikh, Block 6'),
		('392', '29.35549', '47.94752', 'Asma, Shuwaikh, Block 7'),
		('393', '29.36058', '47.95687', 'Asma, Shuwaikh, Block 8'),
		('394', '29.33708', '47.92723', 'Asma, Shuwaikh Industrial-1, Block 1'),
		('395', '29.32276', '47.94895', 'Asma, Shuwaikh Industrial-2, Block 1'),
		('396', '29.32643', '47.93082', 'Asma, Shuwaikh Industrial-3, Block'),
		('397', '29.31658', '47.92967', 'Asma, Shuwaikh Industrial-3, Block'),
		('398', '29.31837', '47.93639', 'Asma, Shuwaikh Industrial-3, Block ج'),
		('399', '29.32385', '47.92560', 'Asma, Shuwaikh Industrial-3, Block د'),
		('400', '29.35205', '47.91894', 'Asma, Shuwaikh Port, Block 1'),
		('401', '29.31553', '47.85925', 'Asma, Sulaibikhat, Block 1'),
		('402', '29.31515', '47.85217', 'Asma, Sulaibikhat, Block 2'),
		('403', '29.31599', '47.84068', 'Asma, Sulaibikhat, Block 3'),
		('404', '29.31719', '47.83285', 'Asma, Sulaibikhat, Block 4'),
		('405', '29.31524', '47.84663', 'Asma, Sulaibikhat, Block 5'),
		('406', '29.30391', '47.83111', 'Asma, Sulaibikhat Cemetery, Block 1'),
		('407', '29.31949', '48.01025', 'Asma, Surra, Block 1'),
		('408', '29.31225', '48.01633', 'Asma, Surra, Block 2'),
		('409', '29.31022', '48.01085', 'Asma, Surra, Block 3'),
		('410', '29.30898', '48.00341', 'Asma, Surra, Block 4'),
		('411', '29.31636', '47.99881', 'Asma, Surra, Block 5'),
		('412', '29.31757', '48.00485', 'Asma, Surra, Block 6'),
		('413', '29.38008', '47.99019', 'Asma, The Sea Front, Block 1'),
		('414', '28.68047', '48.65113', 'Asma, Umm Al-Maradim Island, Block 1'),
		('415', '29.38162', '47.86465', 'Asma, Umm Al-Namel Island, Block 1'),
		('416', '29.31424', '47.97232', 'Asma, Yarmouk, Block 1'),
		('417', '29.30698', '47.97465', 'Asma, Yarmouk, Block 2'),
		('418', '29.30690', '47.96700', 'Asma, Yarmouk, Block 3'),
		('419', '29.31395', '47.96509', 'Asma, Yarmouk, Block 4'),
		('420', '29.24390', '47.92036', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 1'),
		('421', '29.23818', '47.91423', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 2'),
		('422', '29.24396', '47.90933', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 3'),
		('423', '29.23565', '47.90746', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 4'),
		('424', '29.24371', '47.89900', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 5'),
		('425', '29.23547', '47.90114', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 6'),
		('426', '29.23842', '47.89487', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 7'),
		('427', '29.24549', '47.88884', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 8'),
		('428', '29.25083', '47.88206', 'Farwaniya, Abdullah Mubarak Al-Sabah, Block 9'),
		('429', '29.30842', '47.87880', 'Farwaniya, Andalus, Block 1'),
		('430', '29.30016', '47.89092', 'Farwaniya, Andalus, Block 10'),
		('431', '29.30028', '47.89922', 'Farwaniya, Andalus, Block 11'),
		('432', '29.30482', '47.89689', 'Farwaniya, Andalus, Block 12'),
		('433', '29.29917', '47.86716', 'Farwaniya, Andalus, Block 13'),
		('434', '29.30673', '47.88635', 'Farwaniya, Andalus, Block 2'),
		('435', '29.30177', '47.88374', 'Farwaniya, Andalus, Block 3'),
		('436', '29.29869', '47.88326', 'Farwaniya, Andalus, Block 4'),
		('437', '29.29789', '47.87391', 'Farwaniya, Andalus, Block 5'),
		('438', '29.30131', '47.87432', 'Farwaniya, Andalus, Block 6'),
		('439', '29.30631', '47.86698', 'Farwaniya, Andalus, Block 7'),
		('440', '29.30681', '47.87093', 'Farwaniya, Andalus, Block 8'),
		('441', '29.30504', '47.87832', 'Farwaniya, Andalus, Block 9'),
		('442', '29.29358', '47.90398', 'Farwaniya, Ardhiya, Block 1'),
		('443', '29.28531', '47.88865', 'Farwaniya, Ardhiya, Block 10'),
		('444', '29.27895', '47.89139', 'Farwaniya, Ardhiya, Block 11'),
		('445', '29.29330', '47.89935', 'Farwaniya, Ardhiya, Block 2'),
		('446', '29.2946', '47.88904', 'Farwaniya, Ardhiya, Block 3'),
		('447', '29.29081', '47.89098', 'Farwaniya, Ardhiya, Block 4'),
		('448', '29.29185', '47.88129', 'Farwaniya, Ardhiya, Block 5'),
		('449', '29.28617', '47.90205', 'Farwaniya, Ardhiya, Block 6'),
		('450', '29.28128', '47.90348', 'Farwaniya, Ardhiya, Block 7'),
		('451', '29.28634', '47.89523', 'Farwaniya, Ardhiya, Block 8'),
		('452', '29.28000', '47.89749', 'Farwaniya, Ardhiya, Block 9'),
		('453', '29.28416', '47.91672', 'Farwaniya, Ardhiya 4, Block 1'),
		('454', '29.27707', '47.9172', 'Farwaniya, Ardhiya 4, Block 2'),
		('455', '29.27094', '47.91706', 'Farwaniya, Ardhiya 4, Block 3'),
		('456', '29.29681', '47.92192', 'Farwaniya, Ardhiya 6, Block 1'),
		('457', '29.29105', '47.92224', 'Farwaniya, Ardhiya 6, Block 2'),
		('458', '29.29558', '47.91105', 'Farwaniya, Ardhiya Herafiya, Block 1'),
		('459', '29.29773', '47.91337', 'Farwaniya, Ardhiya Herafiya, Block 2'),
		('460', '29.29594', '47.90781', 'Farwaniya, Ardhiya Herafiya, Block 3'),
		('461', '29.29434', '47.91384', 'Farwaniya, Ardhiya Herafiya, Block 4'),
		('462', '29.29112', '47.91095', 'Farwaniya, Ardhiya Herafiya, Block 5'),
		('463', '29.27256', '47.94699', 'Farwaniya, Ashbeliah, Block 1'),
		('464', '29.27428', '47.94142', 'Farwaniya, Ashbeliah, Block 2'),
		('465', '29.27433', '47.93670', 'Farwaniya, Ashbeliah, Block 3'),
		('466', '29.27260', '47.93089', 'Farwaniya, Ashbeliah, Block 4'),
		('467', '29.26200', '47.96221', 'Farwaniya, Dajeej, Block 1'),
		('468', '29.28599', '47.96055', 'Farwaniya, Farwaniya, Block 1'),
		('469', '29.28376', '47.95224', 'Farwaniya, Farwaniya, Block 2'),
		('470', '29.27828', '47.96540', 'Farwaniya, Farwaniya, Block 3'),
		('471', '29.27592', '47.95929', 'Farwaniya, Farwaniya, Block 4'),
		('472', '29.27134', '47.95443', 'Farwaniya, Farwaniya, Block 5'),
		('473', '29.26895', '47.96477', 'Farwaniya, Farwaniya, Block 6'),
		('474', '29.29220', '47.86812', 'Farwaniya, Ferdous, Block 1'),
		('475', '29.28629', '47.86828', 'Farwaniya, Ferdous, Block 2'),
		('476', '29.28161', '47.86859', 'Farwaniya, Ferdous, Block 3'),
		('477', '29.27752', '47.87037', 'Farwaniya, Ferdous, Block 4'),
		('478', '29.27786', '47.87760', 'Farwaniya, Ferdous, Block 5'),
		('479', '29.28328', '47.88107', 'Farwaniya, Ferdous, Block 6'),
		('480', '29.28752', '47.87599', 'Farwaniya, Ferdous, Block 7'),
		('481', '29.29328', '47.87492', 'Farwaniya, Ferdous, Block 8'),
		('482', '29.27732', '47.88459', 'Farwaniya, Ferdous, Block 9'),
		('483', '29.21558', '47.97125', 'Farwaniya, International Airport, Block 1'),
		('484', '29.26292', '47.94301', 'Farwaniya, Jleeb Al-Shiyoukh, Block 1'),
		('485', '29.26079', '47.92708', 'Farwaniya, Jleeb Al-Shiyoukh, Block 2'),
		('486', '29.26312', '47.91713', 'Farwaniya, Jleeb Al-Shiyoukh, Block 3'),
		('487', '29.25019', '47.93601', 'Farwaniya, Jleeb Al-Shiyoukh, Block 4'),
		('488', '29.25630', '47.94775', 'Farwaniya, Jleeb Al-Shiyoukh, Block 5'),
		('489', '29.27225', '47.98347', 'Farwaniya, Khaitan, Block 1'),
		('490', '29.30040', '47.97202', 'Farwaniya, Khaitan, Block 10'),
		('491', '29.27075', '47.97507', 'Farwaniya, Khaitan, Block 2'),
		('492', '29.28053', '47.98158', 'Farwaniya, Khaitan, Block 3'),
		('493', '29.27925', '47.97266', 'Farwaniya, Khaitan, Block 4'),
		('494', '29.28985', '47.98107', 'Farwaniya, Khaitan, Block 5'),
		('495', '29.29033', '47.97658', 'Farwaniya, Khaitan, Block 6'),
		('496', '29.28745', '47.97241', 'Farwaniya, Khaitan, Block 7'),
		('497', '29.28759', '47.96825', 'Farwaniya, Khaitan, Block 8'),
		('498', '29.29475', '47.96982', 'Farwaniya, Khaitan, Block 9'),
		('499', '29.30029', '47.95834', 'Farwaniya, Omariya, Block 1'),
		('500', '29.29942', '47.94944', 'Farwaniya, Omariya, Block 2'),
		('501', '29.29603', '47.95925', 'Farwaniya, Omariya, Block 3'),
		('502', '29.29316', '47.95065', 'Farwaniya, Omariya, Block 4'),
		('503', '29.29189', '47.96019', 'Farwaniya, Omariya, Block 5'),
		('504', '29.29296', '47.93614', 'Farwaniya, Rabiya, Block 1'),
		('505', '29.29273', '47.93064', 'Farwaniya, Rabiya, Block 2'),
		('506', '29.28961', '47.93392', 'Farwaniya, Rabiya, Block 3'),
		('507', '29.29803', '47.93331', 'Farwaniya, Rabiya, Block 4'),
		('508', '29.29507', '47.94290', 'Farwaniya, Rabiya, Block 5'),
		('509', '29.30838', '47.94493', 'Farwaniya, Rai, Block 1'),
		('510', '29.28375', '47.94442', 'Farwaniya, Rehab, Block 1'),
		('511', '29.28500', '47.93674', 'Farwaniya, Rehab, Block 2'),
		('512', '29.28421', '47.93014', 'Farwaniya, Rehab, Block 3'),
		('513', '29.30588', '47.92113', 'Farwaniya, Riggai, Block 1'),
		('514', '29.30386', '47.91037', 'Farwaniya, Riggai, Block 2'),
		('515', '29.27219', '47.87626', 'Farwaniya, Sabah Al-Nasser, Block 1'),
		('516', '29.27026', '47.86701', 'Farwaniya, Sabah Al-Nasser, Block 2'),
		('517', '29.26852', '47.87566', 'Farwaniya, Sabah Al-Nasser, Block 3'),
		('518', '29.27287', '47.88915', 'Farwaniya, Sabah Al-Nasser, Block 4'),
		('519', '29.26897', '47.88662', 'Farwaniya, Sabah Al-Nasser, Block 5'),
		('520', '29.27015', '47.90041', 'Farwaniya, Sabah Al-Nasser, Block 6'),
		('521', '29.27555', '47.90084', 'Farwaniya, Sabah Al-Nasser, Block 7'),
		('522', '29.25707', '47.89788', 'Farwaniya, Sabah Al-Salem University City, Block 1'),
		('523', '29.23703', '47.82934', 'Farwaniya, West Abdullah Al-Mubarak, Block 1'),
		('524', '29.24592', '47.83755', 'Farwaniya, West Abdullah Al-Mubarak, Block 2'),
		('525', '29.23971', '47.84204', 'Farwaniya, West Abdullah Al-Mubarak, Block 3'),
		('526', '29.23100', '47.84476', 'Farwaniya, West Abdullah Al-Mubarak, Block 4'),
		('527', '29.23182', '47.85906', 'Farwaniya, West Abdullah Al-Mubarak, Block 5'),
		('528', '29.24213', '47.85745', 'Farwaniya, West Abdullah Al-Mubarak, Block 6'),
		('529', '29.24866', '47.85916', 'Farwaniya, West Abdullah Al-Mubarak, Block 7'),
		('530', '29.31574', '48.08881', 'Hawalli, Al Bida\'a, Block 13'),
		('531', '29.30161', '47.99115', 'Hawalli, Al-Siddiq, Block 1'),
		('532', '29.29687', '47.98838', 'Hawalli, Al-Siddiq, Block 2'),
		('533', '29.29402', '48.00021', 'Hawalli, Al-Siddiq, Block 3'),
		('534', '29.29362', '47.99502', 'Hawalli, Al-Siddiq, Block 4'),
		('535', '29.29161', '47.98765', 'Hawalli, Al-Siddiq, Block 5'),
		('536', '29.28800', '47.99805', 'Hawalli, Al-Siddiq, Block 6'),
		('537', '29.28692', '47.98910', 'Hawalli, Al-Siddiq, Block 7'),
		('538', '29.29404', '48.08734', 'Hawalli, Anjafa, Block 13'),
		('539', '29.30999', '48.05153', 'Hawalli, Bayan, Block 1'),
		('540', '29.29418', '48.06511', 'Hawalli, Bayan, Block 10'),
		('541', '29.29100', '48.05995', 'Hawalli, Bayan, Block 11'),
		('542', '29.28853', '48.05403', 'Hawalli, Bayan, Block 12'),
		('543', '29.28877', '48.04751', 'Hawalli, Bayan, Block 13'),
		('544', '29.29812', '48.03351', 'Hawalli, Bayan, Block 14'),
		('545', '29.30778', '48.04378', 'Hawalli, Bayan, Block 2'),
		('546', '29.30320', '48.04147', 'Hawalli, Bayan, Block 3'),
		('547', '29.30518', '48.05649', 'Hawalli, Bayan, Block 4'),
		('548', '29.30273', '48.05087', 'Hawalli, Bayan, Block 5'),
		('549', '29.29747', '48.04593', 'Hawalli, Bayan, Block 6'),
		('550', '29.29962', '48.06087', 'Hawalli, Bayan, Block 7'),
		('551', '29.29688', '48.05594', 'Hawalli, Bayan, Block 8'),
		('552', '29.29393', '48.05206', 'Hawalli, Bayan, Block 9'),
		('553', '29.33760', '48.00710', 'Hawalli, Hawalli, Block 1'),
		('554', '29.33070', '48.01749', 'Hawalli, Hawalli, Block 10'),
		('555', '29.32881', '48.01444', 'Hawalli, Hawalli, Block 11'),
		('556', '29.32745', '48.01087', 'Hawalli, Hawalli, Block 12'),
		('557', '29.34075', '48.01208', 'Hawalli, Hawalli, Block 2'),
		('558', '29.34088', '48.01702', 'Hawalli, Hawalli, Block 3'),
		('559', '29.34406', '48.01891', 'Hawalli, Hawalli, Block 4'),
		('560', '29.34397', '48.02493', 'Hawalli, Hawalli, Block 5'),
		('561', '29.33711', '48.03320', 'Hawalli, Hawalli, Block 6'),
		('562', '29.33362', '48.02953', 'Hawalli, Hawalli, Block 7'),
		('563', '29.33228', '48.02529', 'Hawalli, Hawalli, Block 8'),
		('564', '29.33111', '48.02143', 'Hawalli, Hawalli, Block 9'),
		('565', '29.28631', '48.02534', 'Hawalli, Hitteen, Block 1'),
		('566', '29.28630', '48.01092', 'Hawalli, Hitteen, Block 2'),
		('567', '29.28073', '48.02765', 'Hawalli, Hitteen, Block 3'),
		('568', '29.28117', '48.01651', 'Hawalli, Hitteen, Block 4'),
		('569', '29.31290', '48.03646', 'Hawalli, Jabriya, Block 10'),
		('570', '29.31450', '48.04260', 'Hawalli, Jabriya, Block 11'),
		('571', '29.31618', '48.04776', 'Hawalli, Jabriya, Block 12'),
		('572', '29.32322', '48.01813', 'Hawalli, Jabriya, Block 1'),
		('573', '29.31939', '48.0168', 'Hawalli, Jabriya, Block 1'),
		('574', '29.32080', '48.02153', 'Hawalli, Jabriya, Block 2'),
		('575', '29.32524', '48.02677', 'Hawalli, Jabriya, Block 3'),
		('576', '29.32218', '48.02812', 'Hawalli, Jabriya, Block 3'),
		('577', '29.32749', '48.03547', 'Hawalli, Jabriya, Block 4'),
		('578', '29.31581', '48.02275', 'Hawalli, Jabriya, Block 5'),
		('579', '29.31800', '48.02994', 'Hawalli, Jabriya, Block 6'),
		('580', '29.32075', '48.03575', 'Hawalli, Jabriya, Block 7'),
		('581', '29.32277', '48.04202', 'Hawalli, Jabriya, Block 8'),
		('582', '29.31088', '48.02707', 'Hawalli, Jabriya, Block 9'),
		('583', '29.27121', '48.01735', 'Hawalli, Ministries Area, Block 1'),
		('584', '29.28671', '48.07053', 'Hawalli, Mishrif, Block 1'),
		('585', '29.28480', '48.06410', 'Hawalli, Mishrif, Block 2'),
		('586', '29.27816', '48.07544', 'Hawalli, Mishrif, Block 3'),
		('587', '29.27677', '48.06770', 'Hawalli, Mishrif, Block 4'),
		('588', '29.27010', '48.07461', 'Hawalli, Mishrif, Block 5'),
		('589', '29.28183', '48.05676', 'Hawalli, Mishrif, Block 6'),
		('590', '29.27535', '48.05908', 'Hawalli, Mishrif, Block 7'),
		('591', '29.26843', '48.06128', 'Hawalli, Mishrif, Block 7'),
		('592', '29.28033', '48.04961', 'Hawalli, Mubarak Al-Abdullah, Block 1'),
		('593', '29.28045', '48.04424', 'Hawalli, Mubarak Al-Abdullah, Block 2'),
		('594', '29.27697', '48.04005', 'Hawalli, Mubarak Al-Abdullah, Block 3'),
		('595', '29.2764', '48.04600', 'Hawalli, Mubarak Al-Abdullah, Block 4'),
		('596', '29.27424', '48.05185', 'Hawalli, Mubarak Al-Abdullah, Block 5'),
		('597', '29.26919', '48.04634', 'Hawalli, Mubarak Al-Abdullah, Block 6'),
		('598', '29.26846', '48.05429', 'Hawalli, Mubarak Al-Abdullah, Block 7'),
		('599', '29.28462', '48.03892', 'Hawalli, Mubarakyia, Block 1'),
		('600', '29.30844', '48.06163', 'Hawalli, Rumaithiya, Block 1'),
		('601', '29.31892', '48.06576', 'Hawalli, Rumaithiya, Block 10'),
		('602', '29.31651', '48.06153', 'Hawalli, Rumaithiya, Block 11'),
		('603', '29.31353', '48.05722', 'Hawalli, Rumaithiya, Block 12'),
		('604', '29.31149', '48.06677', 'Hawalli, Rumaithiya, Block 2'),
		('605', '29.31303', '48.07207', 'Hawalli, Rumaithiya, Block 3'),
		('606', '29.31269', '48.07770', 'Hawalli, Rumaithiya, Block 4'),
		('607', '29.31195', '48.08360', 'Hawalli, Rumaithiya, Block 5'),
		('608', '29.31974', '48.08493', 'Hawalli, Rumaithiya, Block 6'),
		('609', '29.32072', '48.07967', 'Hawalli, Rumaithiya, Block 7'),
		('610', '29.32151', '48.07480', 'Hawalli, Rumaithiya, Block 8'),
		('611', '29.32072', '48.07013', 'Hawalli, Rumaithiya, Block 9'),
		('612', '29.30321', '48.01020', 'Hawalli, Salam, Block 1'),
		('613', '29.29891', '48.02197', 'Hawalli, Salam, Block 2'),
		('614', '29.29858', '48.01477', 'Hawalli, Salam, Block 3'),
		('615', '29.2954', '48.01223', 'Hawalli, Salam, Block 4'),
		('616', '29.29160', '48.02316', 'Hawalli, Salam, Block 5'),
		('617', '29.29092', '48.01325', 'Hawalli, Salam, Block 6'),
		('618', '29.29373', '48.00578', 'Hawalli, Salam, Block 7'),
		('619', '29.34855', '48.09714', 'Hawalli, Salmiya, Block 1'),
		('620', '29.32772', '48.06495', 'Hawalli, Salmiya, Block 10'),
		('621', '29.33857', '48.04451', 'Hawalli, Salmiya, Block 11'),
		('622', '29.32475', '48.05130', 'Hawalli, Salmiya, Block 12'),
		('623', '29.34595', '48.08772', 'Hawalli, Salmiya, Block 2'),
		('624', '29.33975', '48.09185', 'Hawalli, Salmiya, Block 3'),
		('625', '29.34140', '48.07583', 'Hawalli, Salmiya, Block 4'),
		('626', '29.33596', '48.07982', 'Hawalli, Salmiya, Block 5'),
		('627', '29.32994', '48.08806', 'Hawalli, Salmiya, Block 6'),
		('628', '29.33913', '48.06671', 'Hawalli, Salmiya, Block 7'),
		('629', '29.32969', '48.07718', 'Hawalli, Salmiya, Block 8'),
		('630', '29.33574', '48.05940', 'Hawalli, Salmiya, Block 9'),
		('631', '29.30380', '48.06627', 'Hawalli, Salwa, Block 1'),
		('632', '29.28723', '48.08010', 'Hawalli, Salwa, Block 10'),
		('633', '29.28200', '48.08264', 'Hawalli, Salwa, Block 11'),
		('634', '29.27501', '48.08516', 'Hawalli, Salwa, Block 12'),
		('635', '29.30614', '48.07327', 'Hawalli, Salwa, Block 2'),
		('636', '29.30667', '48.08126', 'Hawalli, Salwa, Block 3'),
		('637', '29.30099', '48.08310', 'Hawalli, Salwa, Block 4'),
		('638', '29.29997', '48.07737', 'Hawalli, Salwa, Block 5'),
		('639', '29.29806', '48.07012', 'Hawalli, Salwa, Block 6'),
		('640', '29.29196', '48.07430', 'Hawalli, Salwa, Block 7'),
		('641', '29.29341', '48.08024', 'Hawalli, Salwa, Block 8'),
		('642', '29.29415', '48.08417', 'Hawalli, Salwa, Block 9'),
		('643', '29.34646', '48.02894', 'Hawalli, Shaab, Block 1'),
		('644', '29.35155', '48.02558', 'Hawalli, Shaab, Block 2'),
		('645', '29.34989', '48.02333', 'Hawalli, Shaab, Block 3'),
		('646', '29.34775', '48.02211', 'Hawalli, Shaab, Block 4'),
		('647', '29.35545', '48.02146', 'Hawalli, Shaab, Block 5'),
		('648', '29.35286', '48.01855', 'Hawalli, Shaab, Block 6'),
		('649', '29.34990', '48.01629', 'Hawalli, Shaab, Block 7'),
		('650', '29.35067', '48.03126', 'Hawalli, Shaab, Block 8'),
		('651', '29.27619', '48.03002', 'Hawalli, Shuhada, Block 1'),
		('652', '29.26897', '48.03710', 'Hawalli, Shuhada, Block 2'),
		('653', '29.26628', '48.02750', 'Hawalli, Shuhada, Block 3'),
		('654', '29.26955', '48.02837', 'Hawalli, Shuhada, Block 4'),
		('655', '29.27284', '48.02778', 'Hawalli, Shuhada, Block 5'),
		('656', '29.27669', '48.01011', 'Hawalli, Zahra, Block 1'),
		('657', '29.28269', '48.00109', 'Hawalli, Zahra, Block 2'),
		('658', '29.28217', '47.99022', 'Hawalli, Zahra, Block 3'),
		('659', '29.27572', '48.00441', 'Hawalli, Zahra, Block 4'),
		('660', '29.27645', '47.99880', 'Hawalli, Zahra, Block 5'),
		('661', '29.27717', '47.99103', 'Hawalli, Zahra, Block 6'),
		('662', '29.26798', '48.00202', 'Hawalli, Zahra, Block 7'),
		('663', '29.27166', '47.99383', 'Hawalli, Zahra, Block 8'),
		('664', '30.05587', '47.74711', 'Jahra, Abdally, Block 1'),
		('665', '30.01640', '47.68723', 'Jahra, Abdally, Block 2'),
		('666', '29.97188', '47.72478', 'Jahra, Abdally, Block 3'),
		('667', '30.01684', '47.82314', 'Jahra, Abdally, Block 4'),
		('668', '29.97523', '47.85809', 'Jahra, Abdally, Block 5'),
		('669', '29.92511', '47.84822', 'Jahra, Abdally, Block 6'),
		('670', '29.49047', '47.53507', 'Jahra, Al Mutlaa, Block 1'),
		('671', '29.22457', '47.31475', 'Jahra, Al Naayem, Block 1'),
		('672', '29.24872', '47.28640', 'Jahra, Al Naayem, Block 2'),
		('673', '29.23654', '47.23927', 'Jahra, Al Naayem, Block 3'),
		('674', '29.20626', '47.27534', 'Jahra, Al Naayem, Block 4'),
		('675', '29.19421', '47.25187', 'Jahra, Al Naayem, Block 5'),
		('676', '29.21651', '47.25466', 'Jahra, Al Naayem, Block 6'),
		('677', '29.19889', '47.13903', 'Jahra, Al Sheqaya, Block 1'),
		('678', '29.31051', '47.74010', 'Jahra, Amghara Industrial, Block 1'),
		('679', '29.30814', '47.74663', 'Jahra, Amghara Industrial, Block 2'),
		('680', '29.29751', '47.74815', 'Jahra, Amghara Industrial, Block 3'),
		('681', '29.30107', '47.76891', 'Jahra, Amghara Industrial, Block 4'),
		('682', '29.62454', '47.37259', 'Jahra, Bar Al-Jahra Governorate, Block 1'),
		('683', '29.95344', '47.96082', 'Jahra, Bhaith, Block 1'),
		('684', '29.78577', '48.21173', 'Jahra, Bubyan Island, Block 1'),
		('685', '29.35409', '47.68037', 'Jahra, Jahra, Block 1'),
		('686', '29.35229', '47.67507', 'Jahra, Jahra, Block 2'),
		('687', '29.35100', '47.66936', 'Jahra, Jahra, Block 3'),
		('688', '29.34127', '47.67209', 'Jahra, Jahra, Block 4'),
		('689', '29.34822', '47.66478', 'Jahra, Jahra, Block 5'),
		('690', '29.35268', '47.70903', 'Jahra, Jahra Camps, Block 1'),
		('691', '29.32100', '47.65324', 'Jahra, Jahra Industrial Herafiya 1, Block 1'),
		('692', '29.30461', '47.66318', 'Jahra, Jawakher Al Jahra, Block 1'),
		('693', '29.30737', '47.65758', 'Jahra, Jawakher Al Jahra, Block 2'),
		('694', '29.09315', '47.71581', 'Jahra, Kabd, Block 1'),
		('695', '29.08215', '47.75056', 'Jahra, Kabd, Block 10'),
		('696', '29.10242', '47.76920', 'Jahra, Kabd, Block 11'),
		('697', '29.09210', '47.76924', 'Jahra, Kabd, Block 12'),
		('698', '29.08179', '47.76896', 'Jahra, Kabd, Block 13'),
		('699', '29.10357', '47.73211', 'Jahra, Kabd, Block 2'),
		('700', '29.10392', '47.71611', 'Jahra, Kabd, Block 3'),
		('701', '29.09282', '47.73186', 'Jahra, Kabd, Block 4'),
		('702', '29.11475', '47.71639', 'Jahra, Kabd, Block 5'),
		('703', '29.08251', '47.73163', 'Jahra, Kabd, Block 6'),
		('704', '29.12552', '47.71666', 'Jahra, Kabd, Block 7'),
		('705', '29.10320', '47.75104', 'Jahra, Kabd, Block 8'),
		('706', '29.09246', '47.75078', 'Jahra, Kabd, Block 9'),
		('707', '29.29965', '47.80863', 'Jahra, Kaerawan, Block 1'),
		('708', '29.30300', '47.79840', 'Jahra, Kaerawan, Block 2'),
		('709', '29.30579', '47.79093', 'Jahra, Kaerawan, Block 3'),
		('710', '29.51166', '47.76907', 'Jahra, Kazima, Block 1'),
		('711', '29.33216', '47.70101', 'Jahra, Naeem, Block 1'),
		('712', '29.32870', '47.6986', 'Jahra, Naeem, Block 2'),
		('713', '29.33687', '47.69189', 'Jahra, Naeem, Block 3'),
		('714', '29.33376', '47.69016', 'Jahra, Naeem, Block 4'),
		('715', '29.30092', '47.86129', 'Jahra, Nahda, Block 1'),
		('716', '29.30212', '47.85604', 'Jahra, Nahda, Block 2'),
		('717', '29.30800', '47.85815', 'Jahra, Nahda, Block 3'),
		('718', '29.32012', '47.67358', 'Jahra, Nasseem, Block 1'),
		('719', '29.32272', '47.66491', 'Jahra, Nasseem, Block 2'),
		('720', '29.32068', '47.68464', 'Jahra, Nasseem, Block 3'),
		('721', '29.31538', '47.68639', 'Jahra, Nasseem, Block 4'),
		('722', '29.35479', '47.64968', 'Jahra, North West Jahra, Block 1'),
		('723', '29.33247', '47.6594', 'Jahra, Oyoun, Block 1'),
		('724', '29.32457', '47.65809', 'Jahra, Oyoun, Block 2'),
		('725', '29.33404', '47.65201', 'Jahra, Oyoun, Block 3'),
		('726', '29.32684', '47.65103', 'Jahra, Oyoun, Block 4'),
		('727', '29.34706', '47.68411', 'Jahra, Qasr, Block 1'),
		('728', '29.34213', '47.68626', 'Jahra, Qasr, Block 2'),
		('729', '29.34171', '47.69777', 'Jahra, Qasr, Block 3'),
		('730', '29.33982', '47.70717', 'Jahra, Qasr, Block 4'),
		('731', '29.33517', '47.70392', 'Jahra, Qasr, Block 4'),
		('732', '29.79562', '47.86346', 'Jahra, Rawdatain, Block 1'),
		('733', '29.30967', '47.71967', 'Jahra, Saad Al-Abdulla City, Block 1'),
		('734', '29.31507', '47.73387', 'Jahra, Saad Al-Abdulla City, Block 10'),
		('735', '29.32392', '47.73923', 'Jahra, Saad Al-Abdulla City, Block 11'),
		('736', '29.31061', '47.71102', 'Jahra, Saad Al-Abdulla City, Block 2'),
		('737', '29.30306', '47.70878', 'Jahra, Saad Al-Abdulla City, Block 3'),
		('738', '29.30225', '47.71862', 'Jahra, Saad Al-Abdulla City, Block 4'),
		('739', '29.31014', '47.69564', 'Jahra, Saad Al-Abdulla City, Block 5'),
		('740', '29.30588', '47.68537', 'Jahra, Saad Al-Abdulla City, Block 6'),
		('741', '29.30402', '47.69962', 'Jahra, Saad Al-Abdulla City, Block 7'),
		('742', '29.31935', '47.72133', 'Jahra, Saad Al-Abdulla City, Block 8'),
		('743', '29.30437', '47.72824', 'Jahra, Saad Al-Abdulla City, Block 9'),
		('744', '29.17562', '46.76791', 'Jahra, Salmy, Block 1'),
		('745', '29.48831', '47.83802', 'Jahra, Shalehat Kazima, Block 1'),
		('746', '29.66251', '48.12588', 'Jahra, Shalehat Subiya, Block 1'),
		('747', '29.48226', '47.62273', 'Jahra, South Al Mutlaa, Block 1'),
		('748', '29.53051', '47.63235', 'Jahra, South Al Mutlaa 1, Block 1'),
		('749', '29.53065', '47.62030', 'Jahra, South Al Mutlaa 1, Block 2'),
		('750', '29.52176', '47.61976', 'Jahra, South Al Mutlaa 1, Block 3'),
		('751', '29.52111', '47.63178', 'Jahra, South Al Mutlaa 1, Block 4'),
		('752', '29.52634', '47.62669', 'Jahra, South Al Mutlaa 1, Block 5'),
		('753', '29.44005', '47.56500', 'Jahra, South Al Mutlaa 10, Block 1'),
		('754', '29.44939', '47.56495', 'Jahra, South Al Mutlaa 10, Block 2'),
		('755', '29.44941', '47.55408', 'Jahra, South Al Mutlaa 10, Block 3'),
		('756', '29.44031', '47.55408', 'Jahra, South Al Mutlaa 10, Block 4'),
		('757', '29.44466', '47.55996', 'Jahra, South Al Mutlaa 10, Block 5'),
		('758', '29.44944', '47.57433', 'Jahra, South Al Mutlaa 11, Block 1'),
		('759', '29.43972', '47.57337', 'Jahra, South Al Mutlaa 11, Block 2'),
		('760', '29.43870', '47.58430', 'Jahra, South Al Mutlaa 11, Block 3'),
		('761', '29.44928', '47.58507', 'Jahra, South Al Mutlaa 11, Block 4'),
		('762', '29.44423', '47.57964', 'Jahra, South Al Mutlaa 11, Block 5'),
		('763', '29.42671', '47.58805', 'Jahra, South Al Mutlaa 12, Block 1'),
		('764', '29.43042', '47.58013', 'Jahra, South Al Mutlaa 12, Block 2'),
		('765', '29.41827', '47.58095', 'Jahra, South Al Mutlaa 12, Block 3'),
		('766', '29.41598', '47.59020', 'Jahra, South Al Mutlaa 12, Block 4'),
		('767', '29.42257', '47.58438', 'Jahra, South Al Mutlaa 12, Block 5'),
		('768', '29.51295', '47.63107', 'Jahra, South Al Mutlaa 2, Block 1'),
		('769', '29.51318', '47.62090', 'Jahra, South Al Mutlaa 2, Block 2'),
		('770', '29.50352', '47.62118', 'Jahra, South Al Mutlaa 2, Block 3'),
		('771', '29.50235', '47.63062', 'Jahra, South Al Mutlaa 2, Block 4'),
		('772', '29.50807', '47.62632', 'Jahra, South Al Mutlaa 2, Block 5'),
		('773', '29.49147', '47.62986', 'Jahra, South Al Mutlaa 3, Block 1'),
		('774', '29.49496', '47.62048', 'Jahra, South Al Mutlaa 3, Block 2'),
		('775', '29.48363', '47.62202', 'Jahra, South Al Mutlaa 3, Block 3'),
		('776', '29.47978', '47.63015', 'Jahra, South Al Mutlaa 3, Block 4'),
		('777', '29.48731', '47.62581', 'Jahra, South Al Mutlaa 3, Block 5'),
		('778', '29.49706', '47.61125', 'Jahra, South Al Mutlaa 4, Block 1'),
		('779', '29.50124', '47.60203', 'Jahra, South Al Mutlaa 4, Block 2'),
		('780', '29.49210', '47.59988', 'Jahra, South Al Mutlaa 4, Block 3'),
		('781', '29.48673', '47.61233', 'Jahra, South Al Mutlaa 4, Block 4'),
		('782', '29.49461', '47.60615', 'Jahra, South Al Mutlaa 4, Block 5'),
		('783', '29.48098', '47.60485', 'Jahra, South Al Mutlaa 5, Block 1'),
		('784', '29.48383', '47.59487', 'Jahra, South Al Mutlaa 5, Block 2'),
		('785', '29.47474', '47.59499', 'Jahra, South Al Mutlaa 5, Block 3'),
		('786', '29.47119', '47.60402', 'Jahra, South Al Mutlaa 5, Block 4'),
		('787', '29.47862', '47.59998', 'Jahra, South Al Mutlaa 5, Block 5'),
		('788', '29.47546', '47.58505', 'Jahra, South Al Mutlaa 6, Block 1'),
		('789', '29.48515', '47.58598', 'Jahra, South Al Mutlaa 6, Block 2'),
		('790', '29.48528', '47.57439', 'Jahra, South Al Mutlaa 6, Block 3'),
		('791', '29.47509', '47.57423', 'Jahra, South Al Mutlaa 6, Block 4'),
		('792', '29.48070', '47.57956', 'Jahra, South Al Mutlaa 6, Block 5'),
		('793', '29.47553', '47.56493', 'Jahra, South Al Mutlaa 7, Block 1'),
		('794', '29.48516', '47.56505', 'Jahra, South Al Mutlaa 7, Block 2'),
		('795', '29.48537', '47.55475', 'Jahra, South Al Mutlaa 7, Block 3'),
		('796', '29.47617', '47.55454', 'Jahra, South Al Mutlaa 7, Block 4'),
		('797', '29.48071', '47.55976', 'Jahra, South Al Mutlaa 7, Block 5'),
		('798', '29.45793', '47.56500', 'Jahra, South Al Mutlaa 8, Block 1'),
		('799', '29.46713', '47.56544', 'Jahra, South Al Mutlaa 8, Block 2'),
		('800', '29.46778', '47.55398', 'Jahra, South Al Mutlaa 8, Block 3'),
		('801', '29.45782', '47.55375', 'Jahra, South Al Mutlaa 8, Block 4'),
		('802', '29.46299', '47.55902', 'Jahra, South Al Mutlaa 8, Block 5'),
		('803', '29.45779', '47.58537', 'Jahra, South Al Mutlaa 9, Block 1'),
		('804', '29.46706', '47.58566', 'Jahra, South Al Mutlaa 9, Block 2'),
		('805', '29.46698', '47.5751', 'Jahra, South Al Mutlaa 9, Block 3'),
		('806', '29.45792', '47.57496', 'Jahra, South Al Mutlaa 9, Block 4'),
		('807', '29.46272', '47.58017', 'Jahra, South Al Mutlaa 9, Block 5'),
		('808', '29.28548', '47.71040', 'Jahra, South Amghara, Block 1'),
		('809', '29.67948', '48.04558', 'Jahra, Subiya, Block 1'),
		('810', '29.29338', '47.81016', 'Jahra, Sulaibiya, Block 1'),
		('811', '29.28710', '47.81833', 'Jahra, Sulaibiya, Block 10'),
		('812', '29.29279', '47.81885', 'Jahra, Sulaibiya, Block 2'),
		('813', '29.29270', '47.82714', 'Jahra, Sulaibiya, Block 3'),
		('814', '29.28737', '47.82706', 'Jahra, Sulaibiya, Block 4'),
		('815', '29.28251', '47.83072', 'Jahra, Sulaibiya, Block 5'),
		('816', '29.27757', '47.83681', 'Jahra, Sulaibiya, Block 6'),
		('817', '29.27287', '47.83491', 'Jahra, Sulaibiya, Block 7'),
		('818', '29.27737', '47.82869', 'Jahra, Sulaibiya, Block 8'),
		('819', '29.28159', '47.82394', 'Jahra, Sulaibiya, Block 9'),
		('820', '29.24824', '47.77245', 'Jahra, Sulaibiya Agricultural, Block 1'),
		('821', '29.28854', '47.84031', 'Jahra, Sulaibiya Industrial 1, Block 1'),
		('822', '29.27829', '47.85335', 'Jahra, Sulaibiya Industrial 2, Block 1'),
		('823', '29.33339', '47.67014', 'Jahra, Taima, Block 1'),
		('824', '29.33257', '47.67845', 'Jahra, Taima, Block 2'),
		('825', '29.33078', '47.68567', 'Jahra, Taima, Block 3'),
		('826', '29.32847', '47.69159', 'Jahra, Taima, Block 4'),
		('827', '29.32434', '47.69030', 'Jahra, Taima, Block 5'),
		('828', '29.32576', '47.6842', 'Jahra, Taima, Block 6'),
		('829', '29.32754', '47.67680', 'Jahra, Taima, Block 7'),
		('830', '29.32929', '47.66824', 'Jahra, Taima, Block 8'),
		('831', '29.32348', '47.69620', 'Jahra, Taima, Block 9'),
		('832', '29.68276', '47.75949', 'Jahra, Umm Al-Aish, Block 1'),
		('833', '29.34476', '47.65995', 'Jahra, Waha, Block 1'),
		('834', '29.33969', '47.66319', 'Jahra, Waha, Block 2'),
		('835', '29.33985', '47.65422', 'Jahra, Waha, Block 3'),
		('836', '29.34623', '47.65500', 'Jahra, Waha, Block 4'),
		('837', '29.99319', '48.07382', 'Jahra, Warba Island, Block 1'),
		('838', '29.20616', '48.09574', 'Mubarak Al Kabeer, Abu Ftaira, Block 1'),
		('839', '29.19802', '48.09762', 'Mubarak Al Kabeer, Abu Ftaira, Block 2'),
		('840', '29.20608', '48.10295', 'Mubarak Al Kabeer, Abu Ftaira, Block 3'),
		('841', '29.20297', '48.10190', 'Mubarak Al Kabeer, Abu Ftaira, Block 4'),
		('842', '29.19311', '48.10684', 'Mubarak Al Kabeer, Abu Ftaira, Block 5'),
		('843', '29.19044', '48.10376', 'Mubarak Al Kabeer, Abu Ftaira, Block 6'),
		('844', '29.18928', '48.10063', 'Mubarak Al Kabeer, Abu Ftaira, Block 7'),
		('845', '29.18456', '48.10674', 'Mubarak Al Kabeer, Abu Ftaira, Block 8'),
		('846', '29.19083', '48.11282', 'Mubarak Al Kabeer, Abu Hassaniah, Block 10'),
		('847', '29.20404', '48.10857', 'Mubarak Al Kabeer, Abu Hassaniah, Block 11'),
		('848', '29.24512', '48.08772', 'Mubarak Al Kabeer, Al Masayel, Block 1'),
		('849', '29.24108', '48.08874', 'Mubarak Al Kabeer, Al Masayel, Block 2'),
		('850', '29.23759', '48.09387', 'Mubarak Al Kabeer, Al Masayel, Block 3'),
		('851', '29.23452', '48.09076', 'Mubarak Al Kabeer, Al Masayel, Block 4'),
		('852', '29.23377', '48.08622', 'Mubarak Al Kabeer, Al Masayel, Block 5'),
		('853', '29.23923', '48.06660', 'Mubarak Al Kabeer, Al-Adan, Block 1'),
		('854', '29.23161', '48.05694', 'Mubarak Al Kabeer, Al-Adan, Block 2'),
		('855', '29.23208', '48.06800', 'Mubarak Al Kabeer, Al-Adan, Block 3'),
		('856', '29.22568', '48.06329', 'Mubarak Al Kabeer, Al-Adan, Block 4'),
		('857', '29.22488', '48.07324', 'Mubarak Al Kabeer, Al-Adan, Block 5'),
		('858', '29.23227', '48.07699', 'Mubarak Al Kabeer, Al-Adan, Block 6'),
		('859', '29.23556', '48.08103', 'Mubarak Al Kabeer, Al-Adan, Block 7'),
		('860', '29.24121', '48.07613', 'Mubarak Al Kabeer, Al-Adan, Block 8'),
		('861', '29.22922', '48.09395', 'Mubarak Al Kabeer, Al-Fnaitees, Block 1'),
		('862', '29.22601', '48.08589', 'Mubarak Al Kabeer, Al-Fnaitees, Block 2'),
		('863', '29.21840', '48.09911', 'Mubarak Al Kabeer, Al-Fnaitees, Block 3'),
		('864', '29.22360', '48.09411', 'Mubarak Al Kabeer, Al-Fnaitees, Block 4'),
		('865', '29.22268', '48.09027', 'Mubarak Al Kabeer, Al-Fnaitees, Block 5'),
		('866', '29.21774', '48.09632', 'Mubarak Al Kabeer, Al-Fnaitees, Block 6'),
		('867', '29.21655', '48.09329', 'Mubarak Al Kabeer, Al-Fnaitees, Block 7'),
		('868', '29.21554', '48.09083', 'Mubarak Al Kabeer, Al-Fnaitees, Block 8'),
		('869', '29.21869', '48.10340', 'Mubarak Al Kabeer, Al-Fnaitees, Block 9'),
		('870', '29.20424', '48.08720', 'Mubarak Al Kabeer, Al-Qurain, Block 1'),
		('871', '29.20584', '48.07423', 'Mubarak Al Kabeer, Al-Qurain, Block 2'),
		('872', '29.20082', '48.06523', 'Mubarak Al Kabeer, Al-Qurain, Block 3'),
		('873', '29.19923', '48.07309', 'Mubarak Al Kabeer, Al-Qurain, Block 4'),
		('874', '29.20146', '48.08255', 'Mubarak Al Kabeer, Al-Qurain, Block 5'),
		('875', '29.21558', '48.08444', 'Mubarak Al Kabeer, Al-Qusour, Block 1'),
		('876', '29.21772', '48.07943', 'Mubarak Al Kabeer, Al-Qusour, Block 2'),
		('877', '29.21937', '48.06897', 'Mubarak Al Kabeer, Al-Qusour, Block 3'),
		('878', '29.21618', '48.06831', 'Mubarak Al Kabeer, Al-Qusour, Block 4'),
		('879', '29.21404', '48.07417', 'Mubarak Al Kabeer, Al-Qusour, Block 5'),
		('880', '29.21088', '48.07288', 'Mubarak Al Kabeer, Al-Qusour, Block 6'),
		('881', '29.21302', '48.06171', 'Mubarak Al Kabeer, Al-Qusour, Block 7'),
		('882', '29.23859', '48.09764', 'Mubarak Al Kabeer, Messila, Block 6'),
		('883', '29.26076', '48.09010', 'Mubarak Al Kabeer, Messila, Block 7'),
		('884', '29.19498', '48.08611', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 1'),
		('885', '29.19323', '48.07619', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 2'),
		('886', '29.18410', '48.07136', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 3'),
		('887', '29.18714', '48.07557', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 4'),
		('888', '29.18960', '48.08313', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 5'),
		('889', '29.18421', '48.08656', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 6'),
		('890', '29.18427', '48.09517', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 7'),
		('891', '29.19121', '48.09443', 'Mubarak Al Kabeer, Mubarak Al-Kabeer, Block 8'),
		('892', '29.26212', '48.08230', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 1'),
		('893', '29.2529', '48.05029', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 10'),
		('894', '29.24659', '48.07475', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 11'),
		('895', '29.24456', '48.06581', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 12'),
		('896', '29.24375', '48.05356', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 13'),
		('897', '29.25099', '48.08637', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 2'),
		('898', '29.25385', '48.08186', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 3'),
		('899', '29.26095', '48.07155', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 4'),
		('900', '29.25994', '48.06005', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 5'),
		('901', '29.26084', '48.04977', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 6'),
		('902', '29.25329', '48.07488', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 7'),
		('903', '29.25373', '48.06725', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 8'),
		('904', '29.24983', '48.05990', 'Mubarak Al Kabeer, Sabah Al-Salem, Block 9'),
		('905', '29.23223', '48.00056', 'Mubarak Al Kabeer, Subhan Industrial, Block 1'),
		('906', '29.23654', '48.00051', 'Mubarak Al Kabeer, Subhan Industrial, Block 10'),
		('907', '29.24191', '48.00041', 'Mubarak Al Kabeer, Subhan Industrial, Block 11'),
		('908', '29.22131', '48.00658', 'Mubarak Al Kabeer, Subhan Industrial, Block 13'),
		('909', '29.23190', '48.00762', 'Mubarak Al Kabeer, Subhan Industrial, Block 2'),
		('910', '29.23164', '48.01429', 'Mubarak Al Kabeer, Subhan Industrial, Block 3'),
		('911', '29.22897', '47.99782', 'Mubarak Al Kabeer, Subhan Industrial, Block 4'),
		('912', '29.22881', '48.00748', 'Mubarak Al Kabeer, Subhan Industrial, Block 5'),
		('913', '29.22855', '48.01415', 'Mubarak Al Kabeer, Subhan Industrial, Block 6'),
		('914', '29.22597', '48.00146', 'Mubarak Al Kabeer, Subhan Industrial, Block 7'),
		('915', '29.22571', '48.00732', 'Mubarak Al Kabeer, Subhan Industrial, Block 8'),
		('916', '29.22546', '48.01398', 'Mubarak Al Kabeer, Subhan Industrial, Block 9'),
		('917', '29.19817', '48.05072', 'Mubarak Al Kabeer, West Abu Ftirah Hirafyia, Block 1'),
		('918', '29.21910', '48.02887', 'Mubarak Al Kabeer, Wista, Block 1')";

	$wpdb->query($sql);
}

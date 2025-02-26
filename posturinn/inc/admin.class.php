<?php
/**
 * Postis Admin Manager Class
**/

/*
**========== Direct access not allowed =========== 
*/ 
if( ! defined('ABSPATH') ) die('Not Allowed');

class POSTIS_Admin {
    
	private static $ins;

    /*
	 * this var use to get API requests
	*/	
    var $api;
    var $log;

	function __construct() {

	    $this->api = new POSTIS_API();
	    $this->log = new WC_Logger();

	    add_filter( 'manage_edit-shop_order_columns', array($this, 'create_order_column'), 20);
        add_filter( 'manage_shop_order_posts_custom_column', array($this, 'create_order_column_data') , 20, 2 );
        
        add_action( 'admin_enqueue_scripts', array($this, 'load_scripts') );
        
        add_action('wp_ajax_postis_create_shipment_action', array($this, 'create_shipment') );
        
        add_action('wp_ajax_postis_show_shipment', array($this, 'display_shipment') );
        
        add_action( 'admin_post_postis_delete_shipment', array($this, 'delete_shipment') );
        
        add_action('wp_ajax_postis_shipment_options', array($this, 'shipment_options') );
        
        add_action( 'admin_post_postis_pdf_action', array($this, 'get_shipment_pdf') );
        
        add_action( 'admin_init', array($this, 'create_metabox') );
        
        add_filter( 'bulk_actions-edit-shop_order', array($this, 'order_bulk_action_option'), 20, 1 );
        add_filter( 'handle_bulk_actions-edit-shop_order', array($this, 'order_bulk_action_process'), 10, 3 );
        
        add_action( 'woocommerce_product_options_shipping', array($this, 'create_product_fields') );
        
        add_action('woocommerce_process_product_meta', array($this, 'save_product_fields') );
        
        if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {

    	    add_action( 'restrict_manage_posts', array($this, 'create_order_filter_dropdown') );
        
            add_filter( 'request', array($this, 'order_filter_query') );	
        }
        
        // Add admin notice
        add_action( 'admin_notices', array($this, 'admin_notice_bar') );

        // automatically create the pdf on status.
        add_action('woocommerce_order_status_changed', array($this, 'generate_shipment_pdf_on_status_change'), 10, 4);

        // bulk
        add_action('admin_notices', array($this, 'bulk_admin_notices'));
        add_action('admin_post_postis_bulk_pdf', array($this, 'handle_bulk_pdf_download'));

	}
	
	function admin_notice_bar() {
	    
	    $action = isset($_GET['bulk_action']) ? sanitize_text_field($_GET['bulk_action']) : '';
	    
	    $message    = '';
	    $class      = 'notice-success';
	    switch($action){
	        
	        case 'mark_printed':
	            $printed_marked = isset($_GET['printed_marked']) ? intval($_GET['printed_marked']) : "";
	            $message = sprintf(_n('%d Order marked as printed successfully', '%d Orders marked as printed successfully', $printed_marked, 'postis'), $printed_marked);
	        break;
	        
	        case 'mark_nonprinted':
	            $nonprinted_marked = isset($_GET['nonprinted_marked']) ? intval($_GET['nonprinted_marked']) : "";
	            $message = sprintf(_n('%d Order marked as non-printed successfully', '%d Orders marked as non-printed successfully', $nonprinted_marked, 'postis'), $nonprinted_marked);
	        break;
	    }
	    
	    if( $message ) {
            echo '<div class="notice ' . esc_attr($class) . ' is-dismissible">';
            echo '<p>' . esc_html($message) . '</p>';
            echo '</div>';
	    }
    }
	
	
	/*
    **========== WC Order Columns =========== 
    */
	function create_order_column($columns) {
	
        $columns['shipment_column'] = __( 'Shipment', 'postis' );
        $columns['pdf_column']      = __( 'PDF', 'postis' );
        // $columns['printed_column']  = __( 'Printed', 'postis' );
    
        return $columns;
    }
    
    
    /*
    **========== Add WC Order Columns Data  =========== 
    */
    function create_order_column_data( $column, $order_id ) {

    	$admin_url = admin_url('admin-post.php');
    	$pdf_url   = add_query_arg( array('action'   => 'postis_pdf_action',
    	                                  'order_id' => $order_id
    	                                ),$admin_url );
    	
    	$shipmentId  = postis_get_shipment_data($order_id, 'shipmentId');
        $sender_meta = postis_get_shipment_data($order_id, 'recipient');
    	$shipment_status   = is_shipment_ready($order_id);
    	
        //postis_pa($sender_meta);
        $country_code = isset($sender_meta['countryCode']) ? $sender_meta['countryCode'] : '';
        
        // check if shipment is international
        $is_shipment_international = postis_is_shipment_international($country_code);
        
        // PDF Settings
        $open_pdf_newtab         = postis_get_settings( 'open_pdf_newtab' );
        $open_pdf_status = '_self';
        if ($open_pdf_newtab == 'yes') {
            $open_pdf_status = '_blank';
        }
        
        switch ( $column ) {
    
            case 'shipment_column' :
                
                if ($shipment_status == true) {
                    
                    if ($shipmentId != '') {
                        echo '<a class="postis-view-shipment-js button button-primary" href="#" data-order-id="'.esc_attr($order_id).'">'.__("View Shipment", "postis"). '</a>';
                    }else{
                        echo '<a class="button button-primary postis-shipment-options-js" href="#" data-order-id="'.esc_attr($order_id).'">'. __("Create Shipment", "postis").'</a>';
                    }
                }else{
                    echo '--';
                }
            break;
    
            case 'pdf_column' :
                
                if ($shipment_status == true && $shipmentId != '') {
                    
                    $print_status = get_post_meta( $order_id, 'postis_shipment_pdf_printed', true );
                    
                    if ($print_status == 'printed') {
                        $tooltip = __('Shipment Printed', 'postis');
                        $icon    = '<span data-tip="'.esc_attr($tooltip).'" class="tips dashicons dashicons-yes" style="color:#00ff00;margin-top: 4px;"></span>';
                    }else{
                        $icon = '';
                    }
                    
                    echo '<a class="button button-primary" href="'.esc_url($pdf_url).'" target="'.esc_attr($open_pdf_status).'">'. __("Get PDF", "postis"). $icon .'</a>';
                }else{
                    echo '--';
                }
            break;
            
        
        }
    }
    
    
    /*
    **========== Load Admin Scripts  =========== 
    */
    function load_scripts($hook) {
    
        global $post;
        
        if ( isset($post->post_type) && $post->post_type == 'shop_order' ) {
            $localize_vars = array( 'ajaxurl' => admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http') ), 
                                    'loader'  => POSTIS_URL.'/images/loader.gif', 
                            );
            add_thickbox();
            
            wp_enqueue_style('postis-admin-css', POSTIS_URL."/css/postis-admin-order.css");
            wp_enqueue_script('postis-admin-js', POSTIS_URL."/js/postis-admin-order.js", array('jquery'), 1.2, true);
            
            wp_localize_script( 'postis-admin-js', 'postis_order_vars', $localize_vars);
        }
        
        if (isset($_GET['page']) && $_GET['page'] == "wc-settings") {
            wp_enqueue_script( 'postis-wc-sortable', POSTIS_URL.'/js/postis-admin-wc.js', array('jquery','jquery-ui-core', 'jquery-ui-sortable'),  1.2, true);
            $css = '
                <style>
                    .postis-hidden-option {
                        display: none;
                    }
                </style>
            ';
            echo $css;
        }
    }
    
    
    /*
    **========== Create Shipment =========== 
    */
    function create_shipment() {
    
        $order_id   = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
        $selected_delivery_service_id = isset($_REQUEST['selected_delivery_service_id']) ? sanitize_text_field($_REQUEST['selected_delivery_service_id']) : '';
        $selected_postbox = isset($_REQUEST['postis_dpo_postbox']) ? sanitize_text_field($_REQUEST['postis_dpo_postbox']) : '';
        $selected_phonenr = isset($_REQUEST['phonenumber']) ? sanitize_text_field($_REQUEST['phonenumber']) : '';

        //$this->log->add('postis', "create_shipment initiated for order: " . $order_id);

        if (!empty($selected_delivery_service_id)) {
            if ( ! add_post_meta( $order_id, 'postis_shipping_method', $selected_delivery_service_id, true ) ) { 
               update_post_meta ( $order_id, 'postis_shipping_method', $selected_delivery_service_id );
            }
        }

        if (!empty($selected_postbox)) {
            if ( ! add_post_meta( $order_id, 'postis_dpo_postbox', $selected_postbox, true ) ) { 
               update_post_meta ( $order_id, 'postis_dpo_postbox', $selected_postbox );
            }
        }

        if (!empty($selected_phonenr)) {
            if ( ! add_post_meta( $order_id, 'postis_dpo_phonenumber', $selected_phonenr, true ) ) { 
               update_post_meta ( $order_id, 'postis_dpo_phonenumber', $selected_phonenr );
            }
        }

        $response = $this ->api->create_shipment_api_request($order_id, false, $_REQUEST);
        
        // quick fix for cURL timeouts.
        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();
            $ajax_response = array('status' => 'error', 'type' => 'other', 'message' => $error_message);
            wp_send_json($ajax_response);
            return;
        }
        
        $get_shipment_meta = json_decode($response['body'], true);
        
        // postis_pa($get_shipment_meta);

        if(  $response['response']['code'] != 400 && $response['response']['code'] != 401 ) {
            
            update_post_meta( $order_id, 'postis_shipment_meta', $get_shipment_meta );
            
            //$this->log->add('postis', "Shipment created successfully for order: " . $order_id);

            $ajax_response = array('status' => 'success', 'message' => __('Shipment Created Successfully', 'postis'));
            
        }else{
            
            $resp_message  = sprintf( __("Shipment Not Created.\nServer Response: %s", "postis"), $get_shipment_meta['message'] );
            
            if (strpos($get_shipment_meta['message'], 'Ekki var hægt að skrá sendingu (Addressee.Gsm') !== false) {
                $ajax_response = array('status' => 'error', 'type' => 'phonenumber', 'message' => $resp_message );
            } else {
                $ajax_response = array('status' => 'error', 'type' => 'other', 'message' => $resp_message );
            }
        }
        
        wp_send_json( $ajax_response );
    }
    
    
    /*
    **========== Display Shipments  =========== 
    */
    function display_shipment(){
	
    	$shipmentId =  postis_get_shipment_data(intval( $_REQUEST['order_id'] ), 'shipmentId');
        
        $resp = $this ->api->tracking_shipment_api_request($shipmentId);
        
        $tracking_info = json_decode( $resp['body'], true );

    	$template_vars = array( 'order_id' => intval( $_REQUEST['order_id'] ),
    	                        'tracking' => $tracking_info 
    	                    );
    
    	postis_load_template( 'shipment-view.php', $template_vars);
    	
    	die(0);
    }
    
    
    /*
    **========== Delete Shipment  =========== 
    */
    function delete_shipment(){
	
    	$order_id = isset( $_REQUEST['order_id'] ) ? intval( $_REQUEST['order_id'] ) : 0;

    	update_post_meta( $order_id, 'postis_shipment_meta', array() );
    	
    	update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'not_printed' );
    	
        //$this->log->add('postis', "Shipment deleted for order: " . $order_id);

    	$shop_order_url = admin_url('edit.php?post_type=shop_order');
    	wp_redirect($shop_order_url);
    	
    	die(0);
    }
    
    
    /*
    **========== Display Shipment Options =========== 
    */
    function shipment_options() {
        $order_id = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
        $selected_delivery_service_id = isset($_REQUEST['deliveryServiceId']) ? sanitize_text_field($_REQUEST['deliveryServiceId']) : '';
        
        // Get saved shipping method and postbox
        $saved_shipping_method = get_post_meta($order_id, 'postis_shipping_method', true);
        $saved_postbox = str_replace('DPO', '', get_post_meta($order_id, 'postis_dpo_postbox', true));
        $saved_postbox = str_replace('DNO', '', $saved_postbox);
        $saved_phone = get_post_meta($order_id, 'postis_dpo_phonenumber', true);

        // If no delivery service is selected, use the saved one
        if (empty($selected_delivery_service_id) && !empty($saved_shipping_method)) {
            $selected_delivery_service_id = $saved_shipping_method;
        }
        
        $wc_order = wc_get_order($order_id);
        $shipping_country = $wc_order->get_shipping_country();
        $shipping_postcode = $wc_order->get_shipping_postcode();
        
        $params = array(
            'postCode' => $shipping_postcode,
            'countryCode' => $shipping_country
        );
        
        $resp = $this->api->calculate_shipping_api_request($params);
        $shipping_options = json_decode($resp['body'], true);

        // Find the specific DPO service ID that matches the saved postbox
        $matched_service_id = '';
        if (!empty($saved_postbox) && !empty($shipping_options['deliveryServicesAndPrices'])) {
            foreach ($shipping_options['deliveryServicesAndPrices'] as $service) {
                if (strpos($saved_shipping_method, 'DPO') === 0 || strpos($saved_shipping_method, 'DNO') === 0) {
                    // Extract postbox ID from service name or use a different matching logic
                    $postbox_id = substr($service['deliveryServiceId'], 3); // Remove 'DPO' prefix
                    if ($postbox_id === $saved_postbox) {
                        $matched_service_id = $service['deliveryServiceId'];
                        break;
                    }
                }
            }
        }

        // If we found a matching DPO service, use it instead of the base DPO
        if (!empty($matched_service_id)) {
            $selected_delivery_service_id = $matched_service_id;
        }

        $template_vars = array(
            'order_id' => $order_id,
            'shipping_options' => $shipping_options,
            'selected_delivery_service_id' => $selected_delivery_service_id,
            'saved_shipping_method' => $saved_shipping_method,
            'saved_postbox' => $saved_postbox,
            'saved_phone' => $saved_phone
        );

        postis_load_template('shipment-options.php', $template_vars);
        wp_die();
    }
    
    
    /*
    **========== Create Shipment PDF =========== 
    */
    function get_shipment_pdf() {
    
        $order_id   = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
        
        $this->pdf_shipment_init($order_id, $allow_printing = true);
    }
    
    
    /*
    **========== Create Metabox =========== 
    */
    function create_metabox() {
    
        add_meta_box( 'postis_order_shipment', 
                    __('Postis Shipment', 'postis'),
                    array($this, 'display_order_shipment_metabox'),
                    'shop_order', 
                    'side', 
                    'default'
                );
    }
    
    
    /*
    **========== Display Content On Shipment Metabox =========== 
    */
    function display_order_shipment_metabox($order){
        
        // Get order ID
        $order_id = $order->ID;
        
        $admin_url = admin_url('admin-post.php');
    	$pdf_url   = add_query_arg(array('action'=>'postis_pdf_action','order_id'=> $order_id), $admin_url);
    	
        // Getting Shipment Detail
    	$get_shipment_meta = postis_get_shipment_data($order_id, 'shipmentId');
    	$shipment_status   = is_shipment_ready($order_id);
        $sender_meta       = postis_get_shipment_data($order_id, 'recipient');
        $country_code      = isset($sender_meta['countryCode']) ? $sender_meta['countryCode'] : '';
        
        // Check if shipment is international
        $is_shipment_international = postis_is_shipment_international($country_code);
        
        $open_pdf_newtab = postis_get_settings( 'open_pdf_newtab' );
        $open_pdf_status = '_self';
        if ($open_pdf_newtab == 'yes') {
            $open_pdf_status = '_blank';
        }
    
        // Check Shipment Ready and Create or View
        if ($shipment_status == true) {
            
            if ($get_shipment_meta != '') {
                echo '<a class="postis-view-shipment-js button button-primary" href="#" data-order-id="'.esc_attr($order_id).'">'.__("View Shipment", "postis"). '</a>';
            }else{
                echo '<a class="button button-primary postis-shipment-options-js" href="#" data-order-id="'.esc_attr($order_id).'">'. __("Create Shipment", "postis").'</a>';
            }
        }else{
            echo __("Shipment Available After Order Completed", "postis");
        }
                
        // Get Created Shipment PDF
        if ($shipment_status == true && $get_shipment_meta != '') {
            
            $print_status = get_post_meta( $order_id, 'postis_shipment_pdf_printed', true );
                    
            if ($print_status == 'printed') {
                $tooltip = __('Shipment Printed', 'postis');
                $icon    = '<span data-tip="'.esc_attr($tooltip).'" class="tips dashicons dashicons-yes" style="color:#00ff00;margin-top: 4px;"></span>';
            }else{
                $icon = '';
            }
            
            echo '<br><br><a class="button button-primary" href="'.esc_url($pdf_url).'" target="'.esc_attr($open_pdf_status).'">'. __("Get PDF", "postis"). $icon .'</a>';
        }
    }
    
    
    /*
    **========== Display Bulk Action Option =========== 
    */
    function order_bulk_action_option( $actions ) {
        $actions['create_shipment']     = __( 'Pósturinn - Create Shipments', 'postis' );
        $actions['print_pdf_shipment']  = __( 'Pósturinn - Print Shipment PDF', 'postis' );
        $actions['mark_as_printed']     = __( 'Pósturinn - Mark as printed', 'postis' );
        $actions['mark_as_not_printed'] = __( 'Pósturinn - Mark as not printed', 'postis' );
        
        return $actions;
    }
    
    
    /*
    **========== Process Order Bulk Action =========== 
    */
    function order_bulk_action_process($redirect_to, $action, $order_ids) {

        $this->log->add('postis', "Bulk action initiated");

        $result = array(
            'existing' => array(),
            'success' => array(),
            'not_postis' => array(),
            'failed' => array(),
            'print_failed' => array() // New array for tracking print failures
        );

        switch($action) {
            case 'create_shipment':
                $automatic_printing = postis_get_settings('pdf_print') === 'yes';

                foreach ($order_ids as $order_id) {
  
                    $shipment_ready = is_shipment_ready($order_id);
                    $existing_shipment = postis_get_shipment_data($order_id, 'shipmentId');
                    
                    if (!$shipment_ready) {
                        $result['not_postis'][] = $order_id;
                        continue;
                    }
                    
                    if ($existing_shipment) {
                        $result['existing'][] = $order_id;
                        continue;
                    }

                    $response = $this->api->create_shipment_api_request($order_id, true, array());
                    $get_shipment_meta = json_decode($response['body'], true);
                    
                    if ($response['response']['code'] != 400 && $response['response']['code'] != 401) {

                        $this->log->add('postis', "Bulk successfully created shipment for order: " . $order_id);

                        update_post_meta($order_id, 'postis_shipment_meta', $get_shipment_meta);
                        $result['success'][] = $order_id;

                        // Handle automatic cloud printing right after successful creation
                        if ($automatic_printing) {
                            $shipmentId = $get_shipment_meta['shipmentId'];
                            $print_resp = $this->api->print_shipment_api_request($shipmentId);
                            $print_resp_code = wp_remote_retrieve_response_code($print_resp);
                            
                            if ($print_resp_code === 200) {
                                $this->log->add('postis', "Cloud printing successful for order: " . $order_id);
                                update_post_meta($order_id, 'postis_shipment_pdf_printed', 'printed');
                            } else {
                                $this->log->add('postis', "Cloud printing failed for order: " . $order_id);
                                $result['print_failed'][] = $order_id;
                            }
                        }
                    } else {
                        $this->log->add('postis', "Bulk FAILED at creating shipment for order: " . $order_id);
                        $result['failed'][] = $order_id;
                    }
                }

                $redirect_to = add_query_arg(
                    array(
                        'bulk_action' => 'create_shipment',
                        'existing' => implode(',', $result['existing']),
                        'success' => implode(',', $result['success']),
                        'not_postis' => implode(',', $result['not_postis']),
                        'failed' => implode(',', $result['failed']),
                        'print_failed' => implode(',', $result['print_failed'])
                    ),
                    $redirect_to
                );
            break;

            case 'print_pdf_shipment':
                // This is now only for manual PDF generation
                $pdf_files = array();
                foreach ($order_ids as $order_id) {
                    if (postis_get_shipment_data($order_id, 'shipmentId')) {
                        $pdf_files[] = $this->bulk_pdf_shipment_init($order_id, false);
                        $result['success'][] = $order_id;
                    }
                }

                if (!empty($result['success'])) {
                    $pdf_path = postis_files_setup_get_directory().'/postis_pdf.pdf';
                    postis_merge_pdf_files($pdf_files, $pdf_path);
                    
                    $redirect_to = add_query_arg(
                        array(
                            'bulk_action' => 'print_pdf_shipment',
                            'success' => implode(',', $result['success'])
                        ),
                        $redirect_to
                    );
                }
            break;

            case 'mark_as_printed':
            
                foreach ( $order_ids as $order_id ) {
                    
                    update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'printed' );
                    
                    $processed_ids[] = $order_id;
                    $postis_changed++;
                }
                
                $bulk_resp = array( 'bulk_action' => 'mark_as_printed',
                                    'changed'     => count( $processed_ids ),
                                    'success'     => implode('+', $processed_ids),
                                );
            break;
            
            case 'mark_as_not_printed':
            
                foreach ( $order_ids as $order_id ) {
                    
                    update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'not_printed' );
                    
                    $processed_ids[] = $order_id;
                    $postis_changed++;
                }
                
                $bulk_resp = array( 'bulk_action' => 'mark_as_not_printed',
                                    'changed'     => count( $processed_ids ),
                                    'success'     => implode('+', $processed_ids),
                                );
            break;

        }

        return esc_url_raw($redirect_to);
    }
    

    function bulk_admin_notices() {
        global $post_type, $pagenow;

        if ('edit.php' !== $pagenow || 'shop_order' !== $post_type || !isset($_REQUEST['bulk_action'])) {
            return;
        }

        $action = $_REQUEST['bulk_action'];
        
        if ('create_shipment' === $action) {
            $existing = array_filter(array_map('intval', explode(',', $_REQUEST['existing'] ?? '')));
            $success = array_filter(array_map('intval', explode(',', $_REQUEST['success'] ?? '')));
            $not_postis = array_filter(array_map('intval', explode(',', $_REQUEST['not_postis'] ?? '')));
            $failed = array_filter(array_map('intval', explode(',', $_REQUEST['failed'] ?? '')));
            $print_failed = array_filter(array_map('intval', explode(',', $_REQUEST['print_failed'] ?? '')));

            if (!empty($existing)) {
                echo '<div class="notice notice-info"><p>' . 
                     esc_html__('Orders already created: ', 'postis') . 
                     esc_html(implode(', ', $existing)) . '</p></div>';
            }
            if (!empty($success)) {
                echo '<div class="updated"><p>' . 
                     esc_html__('Orders created successfully: ', 'postis') . 
                     esc_html(implode(', ', $success)) . '</p></div>';
            }
            if (!empty($not_postis)) {
                echo '<div class="notice notice-warning"><p>' . 
                     esc_html__('Orders not using Posturinn shipping: ', 'postis') . 
                     esc_html(implode(', ', $not_postis)) . '</p></div>';
            }
            if (!empty($failed)) {
                echo '<div class="error"><p>' . 
                     esc_html__('Failed to create orders: ', 'postis') . 
                     esc_html(implode(', ', $failed)) . '</p></div>';
            }
            if (!empty($print_failed)) {
                echo '<div class="notice notice-warning"><p>' . 
                     esc_html__('Cloud printing failed for orders: ', 'postis') . 
                     esc_html(implode(', ', $print_failed)) . '</p></div>';
            }
        }
        
        if ('print_pdf_shipment' === $action) {
            $success = array_filter(array_map('intval', explode(',', $_REQUEST['success'] ?? '')));
            if (!empty($success)) {
                $nonce = wp_create_nonce('postis_bulk_pdf');
                $pdf_url = admin_url(sprintf(
                    'admin-post.php?action=postis_bulk_pdf&orders=%s&_wpnonce=%s',
                    implode(',', $success),
                    $nonce
                ));
                echo '<div class="updated"><p><a target="_blank" class="button button-primary" href="' . esc_url($pdf_url) . '">' . 
                     esc_html__('Click here to download PDF labels for orders: ', 'postis') . 
                     esc_html(implode(', ', $success)) . '</a></p></div>';
            }
        }
    }

    public function handle_bulk_pdf_download() {

        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'postis_bulk_pdf')) {
            wp_die(__('Security check failed.', 'postis'));
        }

        if (!current_user_can('edit_shop_orders')) {
            wp_die(__('You do not have sufficient permissions to access this page.', 'postis'));
        }

        // Get order IDs from URL
        $order_ids = isset($_GET['orders']) ? array_map('absint', explode(',', sanitize_text_field($_GET['orders']))) : array();
        if (empty($order_ids)) {
            wp_die(__('No orders selected for printing.', 'postis'));
        }

        $pdf_files = array();
        foreach ($order_ids as $order_id) {
            $order_id = intval($order_id);
            if ($order_id && postis_get_shipment_data($order_id, 'shipmentId')) {
                $pdf_file = $this->bulk_pdf_shipment_init($order_id, false);
                if ($pdf_file) {
                    $pdf_files[] = $pdf_file;
                }
            }
        }

        if (empty($pdf_files)) {
            $this->log->add('postis', "No PDF files were generated.");
            wp_die(__('No PDF files were generated.', 'postis'));
        }

        // Merge PDFs
        $pdf_path = postis_files_setup_get_directory() . '/postis_bulk_pdf.pdf';
        postis_merge_pdf_files($pdf_files, $pdf_path);

        // Output the PDF
        if (file_exists($pdf_path)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="postis_bulk_labels.pdf"');
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
            ob_clean();
            flush();
            readfile($pdf_path);
            unlink($pdf_path); // Clean up the temporary file
            exit;
        } else {
            wp_die(__('Error generating PDF file.', 'postis'));
        }
    }

    /*
    **======== Create Custom Product Fields On Shipping Tab ========= 
    */
    function create_product_fields() {
        
        global $woocommerce, $post;
        echo '<div class="options_group">';
            woocommerce_wp_text_input( 
                array( 
                    'id'          => 'hsTariffNumber', 
                    'label'       => __( 'Tarriff Number', 'postis' ), 
                    'placeholder' => '',
                    'desc_tip'    => 'true',
                    'description' => __( 'Tarriff Number. Needs to be 6 or 8 numbers', 'postis' ) 
                )
            );
            woocommerce_wp_text_input( 
                array( 
                    'id'          => 'descriptionOfContents', 
                    'label'       => __( 'Description in english', 'postis' ), 
                    'placeholder' => '',
                    'desc_tip'    => 'true',
                    'description' => __( 'This needs to be written in english!', 'postis' ) 
                )
            );
        echo '</div>';
    }
    
    
    /*
    **======== Save Admin Product Meta ========= 
    */
    function save_product_fields($post_id) {

        $hsnumber     = isset($_POST['hsTariffNumber']) ? $_POST['hsTariffNumber'] : '';
        $descContents = isset($_POST['descriptionOfContents']) ? $_POST['descriptionOfContents'] : '';
    
        update_post_meta($post_id, 'hsTariffNumber', sanitize_text_field($hsnumber));
        update_post_meta($post_id, 'descriptionOfContents', sanitize_text_field($descContents));
    }
    
    
    /*
    **======== Create Order Filter Dropdown Options ========= 
    */
    function create_order_filter_dropdown() {
        
    	global $typenow;
    
    	if ( 'shop_order' === $typenow ) {
    
    		?>
    		<select name="postis_filter_by_shipment" id="postis_filter_by_shipment">
    			<option value=""><?php esc_html_e( 'Shipment Print Status', 'postis' ); ?></option>
    			<option value="printed"><?php esc_html_e( 'Printed', 'postis' ); ?></option>
    			<option value="not_printed"><?php esc_html_e( 'Not printed', 'postis' ); ?></option>
    		</select>
    		<?php
    	}
    }
    
    
    /*
    **======== WC Order Query ========= 
    */
    function order_filter_query( $vars ) {
        
    	global $typenow;
    
    	if ( 'shop_order' === $typenow && isset( $_GET['postis_filter_by_shipment'] ) && ! empty( $_GET['postis_filter_by_shipment'] ) ) {
    
    		$vars['meta_key']   = 'postis_shipment_pdf_printed';
    		$vars['meta_value'] = wc_clean( $_GET['postis_filter_by_shipment'] );
    	}
    
    	return $vars;
    }
    
    
    /*
    **======== Single PDF Generator ========= 
    */
    function pdf_shipment_init($order_id, $allow_printing = true){
        
        $shipmentId   = postis_get_shipment_data($order_id, 'shipmentId');
        $sender_meta  = postis_get_shipment_data($order_id, 'recipient');
        $options_meta = postis_get_shipment_data($order_id, 'options');
        
        $numberofitems = !empty($options_meta['numberOfItems']) ? $options_meta['numberOfItems'] : 1;
        $country_code = isset($sender_meta['countryCode']) ? $sender_meta['countryCode'] : '';
        
        $is_shipment_international = postis_is_shipment_international($country_code);
        
        // Get pdf settings
        $pdf_width         = postis_get_settings( 'pdf_width' );
        $pdf_height        = postis_get_settings( 'pdf_height' );
        $pdf_rotate        = postis_get_settings( 'pdf_rotate' );
        $pdf_orientation   = postis_get_settings( 'pdf_orientation' );
        $pdf_moveright     = postis_get_settings( 'pdf_moveright' );
        $pdf_movedown      = postis_get_settings( 'pdf_movedown' );
        $pdf_biggerbarcode = postis_get_settings( 'pdf_biggerbarcode' );
        
        $pdf_request = $this->api->pdf_shipment_api_request($order_id, $allow_printing = true);
    
        if ( is_wp_error( $pdf_request ) || wp_remote_retrieve_response_code( $pdf_request ) != 200 ) {
            echo wp_remote_retrieve_body( $pdf_request );
            
            update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'not_printed' );
        } else {
    
            $response = wp_remote_retrieve_body( $pdf_request );
            
            // save PDF
            $this->postis_generate_pdf( $response, $shipmentId );
            
            $pdf_name = "{$shipmentId}.pdf";
            
            $pdf_args = array(  'pdf_width'         => $pdf_width,
                                'pdf_height'        => $pdf_height,
                                'pdf_rotate'        => $pdf_rotate,
                                'pdf_orientation'   => $pdf_orientation,
                                'pdf_moveright'     => $pdf_moveright,
                                'pdf_movedown'      => $pdf_movedown,
                                'pdf_biggerbarcode' => $pdf_biggerbarcode,
                                'numberOfItems'     => $numberofitems,
                                );
                                
            postis_process_pdf( $pdf_name, $pdf_args, $is_shipment_international, $order_id);
            
            // Check if automatic printing is enabled and allow_printing is true
            $automatic_printing = postis_get_settings('pdf_print');
            if ($automatic_printing == 'yes' && $allow_printing) {
                $print_resp = $this->api->print_shipment_api_request($shipmentId);
                $print_resp_code = wp_remote_retrieve_response_code($print_resp);
                update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'printed' );
            }

        }
    }
    
    
    /*
    **======== multiple PDF Generator ========= 
    */
    function bulk_pdf_shipment_init($order_id, $allow_printing = true){
        
        $shipmentId   = postis_get_shipment_data($order_id, 'shipmentId');
        $sender_meta  = postis_get_shipment_data($order_id, 'recipient');
        $options_meta = postis_get_shipment_data($order_id, 'options');
        
        $numberofitems = !empty($options_meta['numberOfItems']) ? $options_meta['numberOfItems'] : 1;
        $country_code = isset($sender_meta['countryCode']) ? $sender_meta['countryCode'] : '';
        
        $is_shipment_international = postis_is_shipment_international($country_code);
        
        // Get pdf settings
        $pdf_width         = postis_get_settings( 'pdf_width' );
        $pdf_height        = postis_get_settings( 'pdf_height' );
        $pdf_rotate        = postis_get_settings( 'pdf_rotate' );
        $pdf_orientation   = postis_get_settings( 'pdf_orientation' );
        $pdf_moveright     = postis_get_settings( 'pdf_moveright' );
        $pdf_movedown      = postis_get_settings( 'pdf_movedown' );
        $pdf_biggerbarcode = postis_get_settings( 'pdf_biggerbarcode' );
        
        $path_pdf   = postis_files_setup_get_directory('pdf')."/{$shipmentId}.pdf";
        
        $pdf_request = $this->api->pdf_shipment_api_request($order_id, $allow_printing = true);
    
        if ( is_wp_error( $pdf_request ) || wp_remote_retrieve_response_code( $pdf_request ) != 200 ) {
            echo wp_remote_retrieve_body( $pdf_request );
            update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'not_printed' );
        } else {
    
            $response = wp_remote_retrieve_body( $pdf_request );
            
            // save PDF
            $this->postis_generate_pdf( $response, $shipmentId );
            
            $pdf_name = "{$shipmentId}.pdf";
            
            $pdf_args = array(  'pdf_width'         => $pdf_width,
                                'pdf_height'        => $pdf_height,
                                'pdf_rotate'        => $pdf_rotate,
                                'pdf_orientation'   => $pdf_orientation,
                                'pdf_moveright'     => $pdf_moveright,
                                'pdf_movedown'      => $pdf_movedown,
                                'pdf_biggerbarcode' => $pdf_biggerbarcode,
                                'numberOfItems'     => $numberofitems,
                                );
            
            update_post_meta( $order_id, 'postis_shipment_pdf_printed', 'printed' );
            
            return postis_files_setup_get_directory('pdf').$pdf_name;
        }
    }
    
    
    /*
    **======== Save PDF In Directory ========= 
    */
    function postis_generate_pdf( $response, $shipment_id ) {
    
        //$this->log->add('postis', 'Generating PDF for shipment: '.$shipment_id);

        $path_pdf   = postis_files_setup_get_directory('pdf')."/{$shipment_id}.pdf";
        $pdf_fp     = fopen($path_pdf, 'w');
        
        fwrite($pdf_fp, $response);
        fclose($pdf_fp);
    }
    
	
    /*
    **======= Automatically create the pdf on status =======
    */
    function generate_shipment_pdf_on_status_change($order_id, $old_status, $new_status, $order) {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'mark_completed') {
            //$this->log->add('postis', 'Skipping PDF generation for bulk actions');
            return; // Quick fix. Skip PDF generation for bulk actions
        }

        //$this->log->add('postis', "Order status changed triggered for order ID: " . $order_id);

        $auto_generate_status = postis_get_settings('pdf_auto_generate_status');

        //$this->log->add('postis', "Auto-generate setting set to: " . $auto_generate_status);

        if (empty($auto_generate_status)) {
            $auto_generate_status = 'completed';
            //$this->log->add('postis', "Auto generate shipment not set, Using default auto-generate status: " . $auto_generate_status);
        }

        $auto_generate_status = str_replace('wc-','',$auto_generate_status);

        if ($order->has_shipping_method('postis') && $new_status === $auto_generate_status) {
            //$this->log->add('postis', "New status matches auto-generate status");

            $shipmentId = postis_get_shipment_data($order_id, 'shipmentId');
            //$this->log->add('postis', "Shipment ID: " . $shipmentId);

            if (empty($shipmentId)) {
                //$this->log->add('postis', "No shipment ID found for order ID: " . $order_id);
                //$this->log->add('postis', "Creating shipment for order ID: " . $order_id);

                $response = $this->api->create_shipment_api_request($order_id, false, array());
                $get_shipment_meta = json_decode($response['body'], true);

                if ($response['response']['code'] != 400 && $response['response']['code'] != 401) {

                    update_post_meta( $order_id, 'postis_shipment_meta', $get_shipment_meta );
                    //$this->log->add('postis', "Shipment created successfully for order ID: " . $order_id);

                    $shipmentId = postis_get_shipment_data($order_id, 'shipmentId');
                    //$this->log->add('postis', "New shipment ID: " . $shipmentId);

                    if (!empty($shipmentId)) {
                        //$this->log->add('postis', "Generating PDF for order ID: " . $order_id);
                        //$this->pdf_shipment_init($order_id, $allow_printing = false);
                        $add_tracking_to_email = postis_get_settings('add_tracking_to_email');
                        if ($add_tracking_to_email === 'yes') {
                            //$this->log->add('postis', "Email function enabled.");
                            $trackingNumber = postis_get_shipment_data($order_id, 'shipmentId');
                            if (!empty($trackingNumber)) {
                                //$this->log->add('postis', "Sending email with tracking number:" . $trackingNumber);
                                $tracking_url = 'https://posturinn.is/einstaklingar/mottaka/finna-sendingu/?q=' . $trackingNumber;
                                
                                // Load the email template file
                                ob_start();
                                include plugin_dir_path(__FILE__) . 'tracking-email-template.php';
                                $message = ob_get_clean();
                                
                                // Get the WooCommerce email settings
                                $email_from = get_option('woocommerce_email_from_address');
                                $email_from_name = get_option('woocommerce_email_from_name');
                                
                                // Set the "From" email address and name
                                add_filter('wp_mail_from', function() use ($email_from) {
                                    return $email_from;
                                });
                                add_filter('wp_mail_from_name', function() use ($email_from_name) {
                                    return $email_from_name;
                                });
                                
                                // Send the tracking details email
                                $subject = __('Þú átt von á sendingu', 'postis');
                                $headers = array('Content-Type: text/html; charset=UTF-8');
                                $recipient = $order->get_billing_email();
                                wp_mail($recipient, $subject, $message, $headers);
                                
                                // Remove the filters after sending the email
                                remove_filter('wp_mail_from', 'wp_mail_from');
                                remove_filter('wp_mail_from_name', 'wp_mail_from_name');
                            }
                        }
                    }
                } else {
                    //$this->log->add('postis', "Failed to create shipment for order ID: " . $order_id);
                    //$this->log->add('postis', "Server response: " . $get_shipment_meta['message']);
                }
            } else {
                //$this->log->add('postis', "Shipment already exists for order ID: " . $order_id);
                //$this->log->add('postis', "Generating PDF for order ID: " . $order_id);
                $this->pdf_shipment_init($order_id, $allow_printing = false);
            }
        } else {
            //$this->log->add('postis', "Order does not have the 'postis' shipping method or new status does not match auto-generate status");
        }
    }


    public static function get_instance() {
        // create a new object if it doesn't exist.
        is_null(self::$ins) && self::$ins = new self;
        return self::$ins;
    }

    
}



postis_admin_init();
function postis_admin_init() {
	return POSTIS_Admin::get_instance();
}
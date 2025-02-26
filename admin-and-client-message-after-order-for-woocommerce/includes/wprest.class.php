<?php
/**
 * Rest API Handling
 * 
 * */

if( ! defined('ABSPATH') ) die('Not Allowed.');


class WOOCONVO_WP_REST {
	
	private static $ins = null;
	
	public static function __instance()
	{
		// create a new object if it doesn't exist.
		is_null(self::$ins) && self::$ins = new self;
		return self::$ins;
	}
	
	public function __construct() {
		
		add_action( 'rest_api_init', function()
            {
                header( "Access-Control-Allow-Origin: *" );
            }
        );
		
		add_action( 'rest_api_init', [$this, 'init_api'] ); // endpoint url

	}
	
	
	function init_api() {
	    
	    foreach(wooconvo_get_rest_endpoints() as $endpoint) {
	        
            register_rest_route('wooconvo/v1', $endpoint['slug'], array(
                'methods' => $endpoint['method'],
                'callback' => [$this, $endpoint['callback']],
                'permission_callback' => [$this, 'permission_check'],
    	    
            ));
	    }
        
    }
    
    // validate request
    function permission_check($request){
        
        // return true;
        
        $nonce = $request->get_header('X-WP-Nonce');
        
        // for debuggin purpose
        if( !$nonce ) return true;
        
        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return new WP_Error('rest_forbidden', esc_html__('Nonce verification failed.', 'wooconvo'), array('status' => 401));
        }
        
        if (!current_user_can( 'read' )) {
            return new WP_Error('rest_forbidden', esc_html__('Your are not allowed.', 'wooconvo'), array('status' => 401));
        }
        
        return true;
    }
    
    // saving settings
    function save_settings($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        if( current_user_can( 'manage_options' ) ){
            $data   = $request->get_params();
            wooconvo_logger($data);
            wooconvo_save_settings($data);
            wp_send_json_success($data);    
        } else {
            wp_send_json_error(['message'=>__('You are not allowed to access this', 'wooconvo')]);
        }
        
    }
    
    // get settings
    function get_settings($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        if( !current_user_can( 'manage_options' ) ){
            wp_send_json_error(['message'=>__('You are not allowed to access this', 'wooconvo')]); 
        }
        
        $settings = wooconvo_get_settings();
        wp_send_json_success($settings);
    }
    
    function get_meta($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $meta = wooconvo_get_settings_meta();
        wp_send_json_success( json_encode($meta) );
    }
    
    // sending a message
    function send_message($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        $attachments = !$attachments ? [] : $attachments;
        
        // return wooconvo_logger($data);
        
        $msg_obj = new WOOCONVO_Order($order_id);
        $order = $msg_obj->add_message($user_id, $message, $attachments, $context);
        
        wp_send_json_success($order);
    }
    
    // get order details by order_id
    function get_order_by_id($request) {
        
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $wooconvo_order = new WOOCONVO_Order($order_id);
        
        wp_send_json_success(apply_filters('wooconvo_get_order_by_id', $wooconvo_order, $order_id));
    }
    
    
    
    // set order starred by vendor
    function set_order_starred($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $msg_obj = new WOOCONVO_Order($order_id);
        $msg_obj->set_starred();
        
        wp_send_json_success($msg_obj);
    }
    
    // set order un-starred by vendor
    function set_order_unstarred($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $msg_obj = new WOOCONVO_Order($order_id);
        $msg_obj->set_unstarred();
        wp_send_json_success($msg_obj);
    }
    
    // get all orders with wooconvo threads attached
    function get_orders($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $orders = [];
        if( $context === 'myaccount' && isset($user_id) ) {
            $orders = wooconvo_get_orders($user_id);
        } else if( $context === 'wp_admin' ){
            $orders = wooconvo_get_orders();
        } else if( $context === 'yith_vendor' && class_exists('WOOCONVO_Addon_YithMultiVendor') ){
            $vendor = yith_get_vendor( $user_id, 'user' );
            $orders = $vendor->get_orders('all');
            // $orders = WOOCONVO_Addon_YithMultiVendor::get_orders($user_id);
        }else if( $context === 'dokan_vendor' ){
            $orders = WOOCONVO_Addon_DokanMultiVendor::get_orders($user_id);
        }else if( $context === 'wcvendors_vendor' ){
            $orders = WOOCONVO_Addon_WCVendorsMultiVendor::get_orders($user_id);
        }else if( $context === 'multivendorx_vendor' ){
            $orders = WOOCONVO_Addon_MultivendorXMultiVendor::get_orders($user_id);
        }else if( $context === 'wcfm_vendor' ){
            global $WCFM;
            $orders = $WCFM->wcfm_vendor_support->wcfm_get_orders_by_vendor($user_id);   
            // $orders = WOOCONVO_Addon_WCFMMarketplace::get_orders($user_id);
        }else if( $context === 'wcpv_vendor' ){
            $orders = WOOCONVO_Addon_WCProductVendorMultiVendor::get_orders($user_id);
        }
        
        // converting orders to WOOCONVO_Order
        $orders = array_map(function($order){
            if( is_a($order, 'WC_Order') ){
                $order_obj = new WOOCONVO_Order($order->get_id());
            } else {
                $order_obj = new WOOCONVO_Order($order);
            }
            // $order_obj->status = $order->post_status;
            return $order_obj;
        }, $orders);
        
        wp_send_json_success($orders);
    }
    
    // get undread of order by user type
    // user_type: vendor, customer
    function get_unread_orders($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        $user_type = isset($user_type) ? $user_type : 'vendor';
        
        $orders = wooconvo_get_unread_orders($user_type);
        // converting orders to WOOCONVO_Order
        $orders = array_map(function($order){
            return new WOOCONVO_Order($order->ID);
        }, $orders);
        
        wp_send_json_success($orders);
    }
    
    function set_read($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        $user_type = isset($user_type) ? $user_type : 'vendor';
        
        $msg_obj = new WOOCONVO_Order($order_id);
        $order = $msg_obj->set_read($user_type);
        wp_send_json_success($order);
    }
    
    function set_unread($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        $user_type = isset($user_type) ? $user_type : 'vendor';
        
        $msg_obj = new WOOCONVO_Order($order_id);
        $order = $msg_obj->set_unread($user_type);
        wp_send_json_success($order);
    }
    
    
    // Upload file(s)
    // Upload file(s)
    function upload_file($request) {
        if (!$request->sanitize_params()) {
            wp_send_json_error(['message' => $request->get_error_message()]);
        }
    
        $data = $request->get_params();
        extract($data);
    
        $dir_path = wooconvo_file_directory($order_id);
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = sanitize_file_name($_FILES['file']['name']);
        $extension = strtolower(end(explode('.',$file_name)));
    
        // Validate file upload
        if (!is_uploaded_file($file_tmp)) {
            wp_send_json_error(['message' => __('Invalid file upload.', 'wooconvo')]);
        }
    
        // Check file type and extension
        $file_type = wp_check_filetype_and_ext($file_tmp, $file_name);
        if (!$file_type['ext'] || !$file_type['type']) {
            wp_send_json_error(['message' => __('File type not allowed.', 'wooconvo')]);
        }
    
        // $allowed_types = [
        //     'jpg' => 'image/jpeg',
        //     'jpeg' => 'image/jpeg',
        //     'png' => 'image/png',
        //     'gif' => 'image/gif',
        //     'pdf' => 'application/pdf',
        //     'mp3' => 'audio/mpeg',
        //     'wav' => 'audio/wav'
        // ];
    
        // if (!array_key_exists($file_type['ext'], $allowed_types) || $file_type['type'] !== $allowed_types[$file_type['ext']]) {
        //     wp_send_json_error(['message' => __('File type not allowed.', 'wooconvo')]);
        // }
    
        // Rename and move the file
        $new_file_name = apply_filters('wooconvo_filename', uniqid() . '.' . $file_type['ext']);
        $destination = realpath($dir_path) . '/' . $new_file_name;
    
        if (!move_uploaded_file($file_tmp, $destination)) {
            wp_send_json_error(['message' => __('File upload failed.', 'wooconvo')]);
        }
    
        $resp = [
            'filename'  => $new_file_name,
            'is_image'  => false,
            'is_audio'  => false,
            'thumbnail' => wooconvo_get_default_thumb($extension),
            'location'  => 'local'
        ];
    
        // Check if the file is an image
        if (in_array($file_type['ext'], ['jpg', 'jpeg', 'png', 'gif'])) {
            $thumb_size = apply_filters('wooconvo_thumb_size', 100);
            wooconvo_create_image_thumb($dir_path, $new_file_name, $thumb_size);
            $resp['is_image'] = true;
            $resp['thumbnail'] = wooconvo_get_dir_url(true) . $new_file_name;
        }
    
        // Check if the file is an audio file
        if (in_array($file_type['ext'], ['mp3', 'wav'])) {
            $resp['is_audio'] = true;
            $resp['audio_url'] = wooconvo_get_dir_url() . $order_id . '/' . $new_file_name;
        }
    
        wp_send_json_success($resp);
    }

    
    // upload images thumbs for aws addon
    function upload_images_thumb($request){
        
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $file_name = sanitize_file_name( $file_name );
        $extension = strtolower(end(explode('.',$file_name)));  
        // wooconvo_logger($file_name);
    	
        $resp = ['filename' => $file_name,
                'is_image'=>false,
                'thumbnail'=>wooconvo_get_default_thumb($extension),
                'location' => 'aws',
                'key'       => $key,
                'bucket'    => $bucket,
                'region'    => $region
                ];
        if( wooconvo_is_image($file_name) ) {
            $thumb_size = apply_filters('wooconvo_thumb_size', 100);
            wooconvo_create_image_thumb_from_dataurl($file_name, $file_data, $thumb_size);
            $resp['is_image'] = true;
            $thumb_url = wooconvo_get_dir_url(true);
            $resp['thumbnail'] = $thumb_url . $file_name;
        }
        
        wp_send_json_success($resp);
    }
    
    // secure download file
    function download_file($request){
        if( ! $request->sanitize_params() ) {
            wp_send_json_error( ['message'=>$request->get_error_message()] );
        }
        
        $data   = $request->get_params();
        extract($data);
        
        $dir_path = wooconvo_file_directory($order_id);
        $file_path = $dir_path . $filename;
        
        
        if (file_exists($file_path)){

			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Description: File Transfer');
			
			// if file to be opened in browser
			if( !wooconvo_get_option('image_open_click')){
			    header('Content-Disposition: attachment; filename='.basename($file_path));
			}
			
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Pragma: public');
			header('Content-Type: '.mime_content_type($file_path));
			header('Content-Length: ' . filesize($file_path));
			
			$chunksize = 1024 * 1024;

		    // Open Resume
		    $handle = @fopen($file_path, 'r');
		
		    if (false === $handle) {
		        return FALSE;
		    }
		
		    $output_resource = fopen( 'php://output', 'w' );
		    
		    while (!@feof($handle)) {
		        $content  = @fread($handle, $chunksize);
		        fwrite( $output_resource, $content );
		
		        if (ob_get_length()) {
		            ob_flush();
		            flush();
		        }
		    }
		
		    return @fclose($handle);
		}
    }
    
    
    // revision addon when accepted
    function revision_accepted($request) {
        // Sanitize request parameters
        if (!$request->sanitize_params()) {
            wp_send_json_error(['message' => $request->get_error_message()]);
        }
    
        $data = $request->get_params();
        $order_id = isset($data['order_id']) ? intval($data['order_id']) : null;
    
        if (!$order_id || $order_id <= 0) {
            wp_send_json_error(['message' => 'Invalid order ID.']);
        }
    
        // Initialize order object
        $order_obj = new WOOCONVO_Order($order_id);
    
        // Set revision accepted
        $order = $order_obj->set_revision_accepted();
    
        // Check if order should be marked as completed
        $revision_accepted_completed = wooconvo_get_option('revision_accepted_completed', 0);
        if ($revision_accepted_completed == 1) {
            $wc_order = wc_get_order($order_id);
            if ($wc_order && $wc_order->get_status() !== 'completed') {
                $wc_order->update_status('completed', __('Order marked as completed after revision acceptance.', 'text-domain'));
            }
        }
    
        // Return success response
        wp_send_json_success($order_obj);
    }
    
}


function init_wooconvo_wp_rest(){
	return WOOCONVO_WP_REST::__instance();
}
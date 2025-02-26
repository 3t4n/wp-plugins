<?php
add_filter( 'woocommerce_email_attachments', 'wpshare247_aeiwooc_attach_to_wc_emails_invoice', 10, 3);
function wpshare247_aeiwooc_attach_to_wc_emails_invoice ( $attachments , $email_id, $order ) {
	
	// Avoiding errors and problems
    if ( ! is_a( $order, 'WC_Order' ) || ! isset( $email_id ) ) {
        return $attachments;
    }
	
	// if you are using a child theme, use this line instead to get the directory
 	// $file_path = get_stylesheet_directory() . '/file.pdf';
	$file_path = wpshare247_aeiwooc_create_invoice_file( $order, '' );
	if($file_path){
		$attachments[] = $file_path;
	}
	
	return $attachments;
}

function wpshare247_aeiwooc_create_file_name_from_order( $order_id ){
	if(!$order_id) return '';
	
	$file_name_format = Aeiwooc::class_get_option('file_name_save'); // ORDERID ; ORDERID_TIME; ORDERID_MD5
	switch( $file_name_format ){
		case 'ORDERID_TIME':
			$invoice_file_name = $order_id. '_' . time();
		break;
		
		case 'ORDERID_MD5':
			$invoice_file_name = md5($order_id);
		break;
		
		default:
			$invoice_file_name = $order_id;
			break;
	}
	$invoice_file_name = $invoice_file_name . '.xlsx';
	return $invoice_file_name;
}

function wpshare247_aeiwooc_create_invoice_file_by_order_id( $order_id, $save_dir = '' ){
	$order = wc_get_order( $order_id );
	return wpshare247_aeiwooc_create_invoice_file( $order, $save_dir );
}

function wpshare247_aeiwooc_create_invoice_file( $order, $save_dir = '' ){
	if(!is_a( $order, 'WC_Order' )) return '';
	
	$save_dir = trim($save_dir);
	if($save_dir =='' || !file_exists($save_dir)){
		$wpshare247_woocommerce_invoices =  Aeiwooc::get_wp_upload_dir_file();
		if (! is_dir($wpshare247_woocommerce_invoices)) {
		   mkdir( $wpshare247_woocommerce_invoices, 0700 );
		}
		
		$save_dir = $wpshare247_woocommerce_invoices;
	}
	
	$order_id = $order->get_id();
	$invoice_file_name = wpshare247_aeiwooc_create_file_name_from_order( $order_id );
	$file_path = $save_dir . '/'.$invoice_file_name; // directory of the current theme
	
	$create_file_ok = false;
	
	if(Aeiwooc::is_pro()){
		$exc_file =  WPSHARE247_AEIWOOC_PLUGIN_PRO_DIR . '/wpshare247_aeiwooc_create_excel_file.php';
	}else{
		$exc_file =  WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/excel-lib/simplexlsxgen/wpshare247_aeiwooc_create_excel_file.php';
	}
	
	if( file_exists($exc_file) ){
		require_once ( $exc_file  );
	}
	
	if( function_exists('wpshare247_aeiwooc_create_excel_file_richtext') ){ 
		$create_file_ok = wpshare247_aeiwooc_create_excel_file_richtext($file_path, $order);
	}
	
	if($create_file_ok){
		return $file_path;
	}
	
	return '';
}

function wpshare247_aeiwooc_export_excel_file($order_ids, $save_dir){
	if(!is_array($order_ids) || empty($order_ids)) return false;
	
	if(!is_dir($save_dir)){
		$wpshare247_woocommerce_invoices =  Aeiwooc::get_wp_upload_dir_file();
		if (! is_dir($wpshare247_woocommerce_invoices)) {
		   mkdir( $wpshare247_woocommerce_invoices, 0700 );
		}
		
		$save_dir = $wpshare247_woocommerce_invoices;
	}
	
	$export_excel_file_name = 'export_orders_'.uniqid(). '_'. date('H_i_s_d_m_Y') . '.xlsx';
	$file_path = $save_dir . '/'.$export_excel_file_name;
	
	if(Aeiwooc::is_pro()){
		$exc_file =  WPSHARE247_AEIWOOC_PLUGIN_PRO_DIR . '/wpshare247_aeiwooc_create_excel_file.php';
	}else{
		$exc_file =  WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/excel-lib/simplexlsxgen/wpshare247_aeiwooc_create_excel_file.php';
	}
	
	if( file_exists($exc_file) ){
		require_once ( $exc_file  );
	}
	
	if( function_exists('wpshare247_aeiwooc_export_excel_file_lib') ){ 
		return wpshare247_aeiwooc_export_excel_file_lib($order_ids, $file_path);
	}
	
	return false;
}

function wpshare247_aeiwooc_invoices_zip(){
	$invoices_dir =  Aeiwooc::get_wp_upload_dir_file();
	if( !file_exists($invoices_dir) ) return false;
	
	$invoices_zip = $invoices_dir.'.zip';
	
	return wpshare247_aeiwooc_dir_zip($invoices_zip, $invoices_dir);
}

function wpshare247_aeiwooc_create_zip_file_from_order_ids($arr_order_id) {
	if(empty($arr_order_id)) return false;
	
	$download_dir_temp = 'orders_' . time().'_'.uniqid();
	$save_dir = Aeiwooc::get_wp_upload_dir_file() . '/' . $download_dir_temp;
	if (! is_dir($save_dir)) {
	   mkdir( $save_dir, 0700 );
	}

	foreach ($arr_order_id as $order_id) {
		$file_path = wpshare247_aeiwooc_create_invoice_file_by_order_id( $order_id, $save_dir );
	}
	$zip_path_file = $save_dir . '.zip'; 
	$file_dir = wpshare247_aeiwooc_dir_zip($zip_path_file, $save_dir);
	
	//Delete----------
	wpshare247_aeiwooc_delete_directory($save_dir);
	
	return $file_dir;
}
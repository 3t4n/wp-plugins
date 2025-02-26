<?php
function wpshare247_aeiwooc_create_excel_file_richtext($file_path, $order){ 

	$lib =  WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/excel-lib/simplexlsxgen/src/SimpleXLSXGen.php';
	if( file_exists($lib) ){
		require_once ( $lib  );
	}else{
		return false;
	}
	
	
	if($file_path){
		//Get order info----------------------------
		$order_key = $order->get_id();
		$order_date_created = get_the_date('H:i:s d/m/Y', $order_key);
		$order_currency_symbol = $order->get_currency();
		$order_currency_symbol_parentheses = '('.$order_currency_symbol.')';
		
		//Get user info----------------------------
		$aj_user_id = get_current_user_id();
		$user_info = get_userdata( $aj_user_id );
		$staff_name = $user_info->display_name;
		if(!$staff_name){
			if($user_info->last_name || $user_info->first_name){
				$staff_name = $user_info->last_name . " ".$user_info->first_name;
			}else{
				$staff_name = $user_info->user_login;
			}
		}
		
		//Get plugin setting---------------------------- 
		$order_date_format = Aeiwooc::class_get_option('order_date_format');
		if($order_date_format){
			$order_date_created = get_the_date($order_date_format, $order_key);
		}
		
		$invoice_title = Aeiwooc::class_get_option('title');
		if(!$invoice_title){
			$invoice_title = get_bloginfo( 'name' );
		}
		$invoice_address = Aeiwooc::class_get_option('address');
		$invoice_tel = Aeiwooc::class_get_option('tel');
		$invoice_email = Aeiwooc::class_get_option('email');  
		
		$unit = Aeiwooc::class_get_option('unit');
		if(!$unit) $unit = 'Cái';
		
		$head_bg_color = Aeiwooc::class_get_option('head_bg'); 
		$head_bg_color = str_replace("#","",$head_bg_color);
		if(!$head_bg_color) $head_bg_color = '92d050';
		
		$head_color = Aeiwooc::class_get_option('head_color'); 
		$head_color = str_replace("#","",$head_color);
		
		$border_color = Aeiwooc::class_get_option('border'); 
		$border_color = str_replace("#","",$border_color);
		
		$co_address_text = Aeiwooc::class_get_option('co_address_text');
		if(!$co_address_text){ $co_address_text = __('Address', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$co_tel_text = Aeiwooc::class_get_option('co_tel_text');
		if(!$co_tel_text){ $co_tel_text = __('Tel', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$co_email_text = Aeiwooc::class_get_option('co_email_text');
		if(!$co_email_text){ $co_email_text = __('Email', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_key_text = Aeiwooc::class_get_option('order_key_text');
		if(!$order_key_text){ $order_key_text = __('Order ID', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_date_text = Aeiwooc::class_get_option('order_date_text');
		if(!$order_date_text){ $order_date_text = __('Order datetime', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_stt_text = Aeiwooc::class_get_option('order_product_stt_text');
		if(!$order_product_stt_text){ $order_product_stt_text = __('STT', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_name_text = Aeiwooc::class_get_option('order_product_name_text');
		if(!$order_product_name_text){ $order_product_name_text = __('Product', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_unit_text = Aeiwooc::class_get_option('order_product_unit_text');
		if(!$order_product_unit_text){ $order_product_unit_text = __('Unit', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_quantity_text = Aeiwooc::class_get_option('order_product_quantity_text');
		if(!$order_product_quantity_text){ $order_product_quantity_text = __('Quantity', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_subtotal_text = Aeiwooc::class_get_option('order_product_subtotal_text');
		if(!$order_product_subtotal_text){ $order_product_subtotal_text = __('Price', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_product_total_text = Aeiwooc::class_get_option('order_product_total_text');
		if(!$order_product_total_text){ $order_product_total_text = __('Total', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_subtotal_text = Aeiwooc::class_get_option('order_subtotal_text');
		if(!$order_subtotal_text){ $order_subtotal_text = __('Subtotal', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_ship_text = Aeiwooc::class_get_option('order_ship_text');
		if(!$order_ship_text){ $order_ship_text = __('Shipping', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_coupon_text = Aeiwooc::class_get_option('order_coupon_text');
		if(!$order_coupon_text){ $order_coupon_text = __('Discount', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_total_text = Aeiwooc::class_get_option('order_total_text');
		if(!$order_total_text){ $order_total_text = __('Checkout total', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_customer_name_text = Aeiwooc::class_get_option('order_customer_name_text');
		if(!$order_customer_name_text){ $order_customer_name_text = __('Customer name', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_customer_tel_text = Aeiwooc::class_get_option('order_customer_tel_text');
		if(!$order_customer_tel_text){ $order_customer_tel_text = __('Customer tel', WPSHARE247_AEIWOOC_TEXTDOMAIN); } 
		
		$order_customer_email_text = Aeiwooc::class_get_option('order_customer_email_text');
		if(!$order_customer_email_text){ $order_customer_email_text = __('Email', WPSHARE247_AEIWOOC_TEXTDOMAIN); } 
		
		$order_customer_address_text = Aeiwooc::class_get_option('order_customer_address_text');
		if(!$order_customer_address_text){ $order_customer_address_text = __('Customer address', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_customer_note_text = Aeiwooc::class_get_option('order_customer_note_text');
		if(!$order_customer_note_text){ $order_customer_note_text = __('Customer note', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		$order_customer_payment_text = Aeiwooc::class_get_option('order_customer_payment_text');
		if(!$order_customer_payment_text){ $order_customer_payment_text = __('Payment method', WPSHARE247_AEIWOOC_TEXTDOMAIN); }
		
		
		//Setup data -------------------
		$data = array(
					//Thông tin đơn hàng
					array($invoice_title),
					array($co_address_text, $invoice_address),
					array($co_tel_text, $invoice_tel),
					array($co_email_text, $invoice_email),
					
					array(''), array(''), // empty row
					
					array($order_key_text, $order_key),
					array($order_date_text, $order_date_created),
					
					array(''), // empty row
					
					//Danh sách sản phẩm
					array(	$order_product_stt_text, 
							$order_product_name_text, 
							$order_product_unit_text, 
							$order_product_quantity_text, 
							$order_product_subtotal_text.' '.$order_currency_symbol_parentheses,
							$order_product_total_text.' '.$order_currency_symbol_parentheses),
					
					
				);
	
		$order_items = $order->get_items();
		if($order_items){
			$stt = 1;
			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();
				$name = $item->get_name();
				$quantity = $item->get_quantity();
				$subtotal = $product->get_price();
				$total = $item->get_total();
				
				//Thêm 1 dòng hóa đơn
				$data[] = array($stt, $name, $unit, $quantity, $subtotal, $total);
				$stt++;
				
			}
		}
		
		$data[] = array(''); $data[] = array('');
		
		$data[] = array($order_subtotal_text, $order->get_subtotal() );
		
		$order_shipping_total = $order->get_shipping_total();
		if($order_shipping_total){
			$data[] = array($order_ship_text, $order_shipping_total );
		}
		
		$order_fees = $order->get_fees();
		if($order_fees){
			foreach ( $order_fees as $item ) {
				$fee_name = $item->get_name();
				$fee_total = $item->get_total();
				$data[] = array($fee_name, $fee_total );
			}
		}
		
		$order_discount_total = $order->get_discount_total();
		if($order_discount_total){
			$Cell_Next++;
			$data[] = array($order_coupon_text, "-".$order_discount_total );
		}
		
		$data[] = array($order_total_text,  $order->get_total() );
		
		$data[] = array(''); $data[] = array('');
		
		$cust_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
		$data[] = array($order_customer_name_text,  $cust_name );
		
		$data[] = array($order_customer_tel_text,  $order->get_billing_phone() );
		
		$data[] = array($order_customer_email_text,  $order->get_billing_email() );
		
		$data[] = array($order_customer_address_text,  $order->get_billing_address_1() );
		
		$data[] = array($order_customer_note_text,  $order->get_customer_note() );
		
		$data[] = array($order_customer_payment_text,  $order->get_payment_method_title() );
		
		//---------
		return SimpleXLSXGen::fromArray( $data )->saveAs($file_path);
	}
	
	return false;
}


function wpshare247_aeiwooc_export_excel_file_lib($order_ids, $file_path){
	if(!is_array($order_ids) || empty($order_ids) || !$file_path) return false;
	
	//Include excel tool
	$lib =  WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/excel-lib/simplexlsxgen/src/SimpleXLSXGen.php';
	if( file_exists($lib) ){
		require_once ( $lib  );
	}else{
		return false;
	}
	
	$data = array(
					//Danh sách sản phẩm
					array(	__('Order Numbern', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Order Status', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Order Date', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Customer note', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('First Name (Billing)', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Last Name (Billing)', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Company (Billing)', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Address 1&2 (Billing)', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('City (Billing)', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Checkout total', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Subtotal', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Shipping', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Fees total', WPSHARE247_AEIWOOC_TEXTDOMAIN),
							__('Discount', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Product', WPSHARE247_AEIWOOC_TEXTDOMAIN), 
							__('Payment method', WPSHARE247_AEIWOOC_TEXTDOMAIN),
						),
				);
	
	$count = 0;
	foreach($order_ids as $order_id){
		$order = wc_get_order( $order_id );
		if ( ! is_a( $order, 'WC_Order' ) ) {
			continue;
		}
		
		$row++;
		
		//Get order info
		$status = wc_get_order_status_name($order->get_status());
		$order_date_created = get_the_date('H:i:s d/m/Y', $order_id);
		$customer_note = $order->get_customer_note();
		$billing_first_name = $order->get_billing_first_name();
		$billing_last_name = $order->get_billing_last_name();
		$billing_company = $order->get_billing_company();
		$billing_address_12 = $order->get_billing_address_1() . ';;' .$order->get_billing_address_2();
		$billing_city = $order->get_billing_city();
		$total = $order->get_total();
		$subtotal = $order->get_subtotal();
		$order_shipping_total = $order->get_shipping_total();
		
		$fee_total = 0;
		$order_fees = $order->get_fees();
		if($order_fees){
			foreach ( $order_fees as $item ) {
				$fee_total += $item->get_total();
			}
		}
		
		$order_discount_total = $order->get_discount_total();
		
		$products = '';
		$order_items = $order->get_items();
		if($order_items){
			foreach ( $order_items as $item_id => $item ) {
				$name = $item->get_name();
				$products .= $name . ' || ';
			}
		}
		
		$payment_method = $order->get_payment_method_title();
		
		//Set cell data
		$data[] = array($order_id, 
						$status, 
						$order_date_created, 
						$customer_note, 
						$billing_first_name,
						$billing_last_name,
						$billing_company,
						$billing_address_12,
						$billing_city,
						$total,
						$subtotal,
						$order_shipping_total,
						$fee_total,
						$order_discount_total,
						$products,
						$payment_method
						);
	}
	
	$is_create = SimpleXLSXGen::fromArray( $data )->saveAs($file_path);
	
	if( file_exists($file_path) ){
		return $file_path;
	}
	
	return false;
}
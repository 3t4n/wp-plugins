<?php
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'Ni_Order_Columns_Init' ) ) {
	include_once("niocowoo-function.php");
	class Ni_Order_Columns_Init extends NiOCoWoo_Function{
		var $is_hpos_enable = false;
	    function __construct(){	
			$this->is_hpos_enable =$this->is_hpos_enabled() ;

			if ($this->is_hpos_enable){
				add_filter( 'manage_woocommerce_page_wc-orders_columns', array(&$this,'ni_add_custom_column'), 11);
				add_action( 'manage_woocommerce_page_wc-orders_custom_column'  ,  array(&$this,'ni_add_custom_column_content_hpos'), 11, 2 );
			}else{
				
				add_filter('manage_edit-shop_order_columns', array(&$this,'ni_add_custom_column'), 11);
				add_action( 'manage_shop_order_posts_custom_column' ,  array(&$this,'ni_add_custom_column_content'), 11, 2 );
				
			}
			
			
		}
		
		function ni_add_custom_column($columns){
			$new_columns = array();

			
			
			foreach ( $columns as $column_name => $column_info ) {
				$new_columns[ $column_name ] = $column_info;
				if ( 'order_total' === $column_name ) {
					$new_columns['order_products'] = __( 'Order Product', 'niwaoc' );
					$new_columns['customer_ip_address'] = __( 'IP Address', 'niwaoc' );
					$new_columns['payment_method_title'] = __( 'Payment Method Title', 'niwaoc' );
					$new_columns['tax_total'] = __( 'Tax Total', 'niwaoc' );
					
				}
			}
			return $new_columns;
		}
		function ni_add_custom_column_content($column){
			global $post, $the_order;
			if ( empty( $the_order ) || $the_order->get_id() !== $post->ID ) {
				$the_order = wc_get_order( $post->ID );
			}
			switch ( $column ) {
				case 'order_products' :
				 $order_items = $the_order->get_items();
				 
				 $admin_url =  admin_url("post.php")."?post=niproductid&action=edit";
				 
				 $prodct_name = '';
				 $prodct_names = array();
				 foreach( $order_items as $product ) {
					
					 $product_id = isset( $product['product_id'])?$product['product_id']:0;
					 //$woo_product = wc_get_product( $product_id );
					 //$product_sku =   $woo_product->get_sku();
					
					 
					
					 
					 
					  $product_sku =   get_post_meta($product_id,'_sku',true);
					 
						
					 $product_name =  isset( $product['name'])?$product['name']:'';
					 $product_qty =  isset( $product['qty'])?$product['qty']:'';
					 //print_r($product);
					 //$prodct_name[] = $product['name'].$product['qty'];
					 
					 
					  if ($product_sku  != ''){
						  $prodct_names[] =  '<a target="_blank" href="'.  str_replace ("niproductid", $product_id,$admin_url) .'">'.$product_name.'</a>' . ' ('. $product_sku  .')' .' x '. $product_qty;
					  }else{
					  	$prodct_names[] =  '<a target="_blank" href="'.  str_replace ("niproductid", $product_id,$admin_url) .'">'.$product_name.'</a>' .' x '. $product_qty;
					  }	
					  
				 }
				 
				echo $product_list = implode( ', ', $prodct_names );
				break;
				case 'customer_ip_address' :
				echo get_post_meta(  $post->ID,"_customer_ip_address",true );
				break;
				case 'payment_method_title' :
				echo get_post_meta(  $post->ID,"_payment_method_title",true );
				break;	
				case 'tax_total' :
				echo wc_price($the_order->get_total_tax());
				break;	
			}

		}
		function ni_add_custom_column_content_hpos($column, $post_id){
			
			$the_order = wc_get_order( $post_id );

			//error_log(print_r($the_order, true));
			switch ( $column ) {
				case 'order_products' :
				 $order_items = $the_order->get_items();
				 
				 $admin_url =  admin_url("post.php")."?post=niproductid&action=edit";
				 
				 $prodct_name = '';
				 $prodct_names = array();
				 foreach( $order_items as $product ) {
					
					$product_id = isset( $product['product_id'])?$product['product_id']:0;
					
					$product_sku =   get_post_meta($product_id,'_sku',true);
					 
					 $product_name =  isset( $product['name'])?$product['name']:'';
					 $product_qty =  isset( $product['qty'])?$product['qty']:'';
					
					if ($product_sku  != ''){
						$prodct_names[] =  '<a target="_blank" href="'.  str_replace ("niproductid", $product_id,$admin_url) .'">'.$product_name.'</a>' . ' ('. $product_sku  .')' .' x '. $product_qty;
					}else{
					$prodct_names[] =  '<a target="_blank" href="'.  str_replace ("niproductid", $product_id,$admin_url) .'">'.$product_name.'</a>' .' x '. $product_qty;
					}	
					  
				 }
				 
				echo $product_list = implode( ', ', $prodct_names );
				break;
				case 'customer_ip_address' :
				echo $customer_ip = $the_order->get_customer_ip_address();
				break;
				case 'payment_method_title' :
					echo	$payment_method = $the_order->get_payment_method_title();
				break;	
				case 'tax_total' :
				echo wc_price($the_order->get_total_tax());
				break;	
			}

		}
		
	}
}
?>
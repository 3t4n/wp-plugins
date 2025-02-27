<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;} 
if( !class_exists( 'Ni_WooPR_Email' ) ) {
    class Ni_WooPR_Email {
		 public function __construct(){
			 //https://stackoverflow.com/questions/21100035/php-replace-string-with-values-from-array
		 }
		 function send_reminder_email($order_id = 661){
			$return_data  	 = array(); 
			
			$return_data["email_status"] = 0;
			
		 	$order = wc_get_order( $order_id );
			
			$niwoopr_settings = get_option("niwoopr_settings");
			$niwoopr_settings =  isset( $niwoopr_settings)? $niwoopr_settings:array();
			$from_name = isset($niwoopr_settings["from_name"])?$niwoopr_settings["from_name"]:'';
			$from_email_address = isset($niwoopr_settings["from_email_address"])?$niwoopr_settings["from_email_address"]:'';
			$email_subject_line = isset($niwoopr_settings["email_subject_line"])?$niwoopr_settings["email_subject_line"]:'';
			$email_content = isset($niwoopr_settings["email_content"])?$niwoopr_settings["email_content"]:'';
			
			$billing_email_address = $order->get_billing_email();
			
			$repalce_context = $this->get_repalce_content($order);
			$new_email_content = str_replace(array_keys($repalce_context), array_values($repalce_context), $email_content);
			
			$return_data = $this->send_email($billing_email_address,$from_name ,$from_email_address,$email_subject_line,$new_email_content);
			
			
			
			if(isset($return_data["email_status"]) and $return_data["email_status"]	 == 1){
				$reminder_count = get_post_meta($order_id,'_ni_last_reminder_count', true);
				$reminder_count = $reminder_count == "" ? 0 : $reminder_count;
				update_post_meta($order_id,'_ni_last_reminder_date', date_i18n("Y-m-d H:i:s"));
				update_post_meta($order_id,'_ni_last_reminder_count', ($reminder_count + 1));
			}
			
			return $return_data;
			
		 }
		 function send_email($to_email,$from_name, $from_email_address, $email_subject_line,$email_content){
			$return_data  	 = array(); 
			$return_data["email_status"] = 0;
			
		 	$headers =  array();
			$headers[] = 'Content-Type: text/html; charset=UTF-8';
			$headers[] = 'From: '.$from_name.' <' .$from_email_address. '>';
			
			$email_status = wp_mail($to_email, $email_subject_line, wpautop($email_content), $headers);
			
			if ($email_status){
				$return_data["email_status"] = 1;
			}
			
			return $return_data;
			
		 }
		 function get_repalce_content($order){
			 
			$date_format = get_option('date_format');
			 
		 	$replace_text = array();
			
			$replace_text["{{order_id}}"] 			= $order->get_id();
			
			//apply_filters( 'niwoopr_repalce_content_before', $replace_text,$order);
			
			$replace_text["{{date_created}}"] 		= date_i18n($date_format,strtotime($order->get_date_created()));
			
			$replace_text["{{payment_method}}"] 	= $order->get_payment_method_title();
			
			
			$replace_text["{{billing_first_name}}"] = $order->get_billing_first_name();
			$replace_text["{{billing_last_name}}"] 	= $order->get_billing_last_name();
			
			$replace_text["{{order_total}}"] 		= 	$order->get_formatted_order_total();
			//$replace_text["{{order_total}}"] = 	$order->get_formatted_order_total();
			
			
			$replace_text["{{store_url}}"] 			= get_permalink( wc_get_page_id( 'shop' ) );
			$replace_text["{{site_url}}"] 			=  get_site_url();
		
			
			return apply_filters( 'niwoopr_repalce_content', $replace_text,$order);
		 }
		 function get_placeholder_text(){
			 
			 $placeholder_text = array();
			$placeholder_text[] = "{{order_id}}";
			$placeholder_text[] = "{{date_created}}";
			
			$placeholder_text[] ="{{payment_method}}";
			
			
			$placeholder_text[] ="{{billing_first_name}}"; 
			$placeholder_text[] = "{{billing_last_name}}"; 
			
			$placeholder_text[]="{{order_total}}" 	;	
			
			
			
			$placeholder_text[] ="{{store_url}}" ;		
			$placeholder_text[] ="{{site_url}}" ;
			
		 	return apply_filters( 'niwoopr_placeholder_text', $placeholder_text);
		 }
		 function get_order_status(){
			global $wpdb;
			$order_status = array();
			$query = "";
			$query .= " SELECT  posts.post_status  as order_status";
			$query .= "	FROM {$wpdb->prefix}posts as posts		";
			$query .= "	WHERE 1 = 1 ";
			$query .= " AND posts.post_status NOT IN ('auto-draft','inherit')";
			$query .= " AND posts.post_type ='shop_order'";
			$query .= " group By order_status";
			
			$row = $wpdb->get_results( $query);	
			foreach($row as $key=>$value){
				$order_status[ $value->order_status] =  ucfirst( str_replace("wc-","", $value->order_status)) ; 
			}	
			return $order_status;
		}
	}
}
	
<?php
/*
*	@PACKAGE Tracking Code To Thank You
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('TCTTY')){

	class TCTTY{
		
	
		public function tctty_custom_tracking( $order_id ) {
			
			$settings = get_option('tctty_setting'); 
			// Lets grab the order
			$order = wc_get_order( $order_id );

			/**
			 * Tracking code
			 * You can get the order total etc e.g. $order->get_total();
			 */
			$code =get_option('tctty_tr_code');
			echo "<script type='text/javascript'>";
			$code =	str_replace("<script>"," ", $code);
			$code =	str_replace("</script>"," ", $code);
			echo $code;
			echo "</script>";
		 

		}



	}
}
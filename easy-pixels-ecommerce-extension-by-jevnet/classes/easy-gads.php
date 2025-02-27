<?php



$easyPixels->trackingOptions->gads->putWCConversionCode=function($order=null)
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			$tracking="gtag('event', 'conversion', {
			'send_to': '".$this->getCode()."/".$this->getLabel()."',
			'value': ".$order->get_total().",
			'tax':".$order->get_total_tax().",
			'shipping':".$order->get_shipping_total().",
			'currency': '".$order->get_currency()."',
			'transaction_id': '".$order->get_order_number()."'
			});";
			echo '<script>'.$tracking.'</script>';
		}
	};

$easyPixels->trackingOptions->gads->putWCPageViewEvent=function ()
	{
		$tracking='';
		if((class_exists( 'WooCommerce' ))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			if(is_product())
			{
				global $product;
		        $id=$product->get_sku() ? $product->get_sku() : $product->get_id();
				$cat=jn_WCtracking::getProductCategory($product);
//		        $cat=(get_term_by( 'id', $product->category_ids[0], 'product_cat' ) )?$term->name:'';global $post;
				$tracking="<script> gtag('event', 'page_view', { 'send_to': '".$this->getCode()."', 'ecomm_pagetype': 'product', 'ecomm_prodid': '".$cat."', 'ecomm_totalvalue': ".$product->get_price()." }); </script>";
			}
			if(is_product_category())
			{
				$tracking="<script> gtag('event', 'page_view', { 'send_to': '".$this->getCode()."', 'ecomm_pagetype': 'category', ecomm_category: '". single_cat_title( '', false )."'}); </script>";
				
			}
			if(is_product_tag())
			{
				$tracking="<script> gtag('event', 'page_view', { 'send_to': '".$this->getCode()."', 'ecomm_pagetype': 'category', ecomm_category: '". single_cat_title( '', false )."'}); </script>";
			}
			if(is_cart()){}
			if(is_checkout()){}
			echo $tracking;
		}
	};

/*
class jn_easyGAdsWC extends jn_easyGAds
{
	
	static public function save($WP_settings_group='jnEasyPixelsSettings-group')
	{
		if(isset($_POST["jn_GADW_WCLabel"]))
		{
			$settings=get_option('jn_EPADW');
			$settings["WCLabel"]=sanitize_text_field($_POST["jn_GADW_WCLabel"]);
			update_option('jn_EPADW', $settings);
		}
	}
}*/
<?php

$easyPixels->trackingOptions->analytics->putWCConversionCode=function($order=null)
	{
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			$itemList=$order->get_items();
			$itemsParam="";
			$position=1;
			foreach ($itemList as $orderItem) {
    			$id=$orderItem->get_product()->get_sku() ? $orderItem->get_product()->get_sku() : ( '#' . $orderItem->get_product()->get_id() );
				$itemsParam.="{'id':'".$id."',
				'name':'".$orderItem->get_product()->get_name()."',
				'price':".$orderItem->get_product()->get_price().",
				'variant':".$orderItem->get_variation_id().",
				'category':'".$orderItem->get_product()->get_category_ids()[0]."',
				'quantity':".$orderItem->get_quantity().",
				'list_position':".$position++."},";
				/*https://developers.google.com/analytics/devguides/collection/gtagjs/events?hl=es#item-parameters */
			}
			$coupons_list = '';
			foreach( $order->get_coupon_codes() as $coupon) {
			    $coupons_list .=  $coupon;
			    if( $i < $coupons_count )
			    	$coupons_list .= ', ';
			    $i++;
			}

			$itemsParam=($itemsParam!='')?", 'items':[".$itemsParam."],'coupon':'".$coupons_list."'":"";
			

			$tracking="gtag('event', 'purchase', {
			'send_to': '".$this->getCode()."',
			'value': ".$order->get_total().",
			'tax':".$order->get_total_tax().",
			'currency': ".json_encode($order->get_currency()).",
			'transaction_id': '".$order->get_order_number()."',
			'shipping': ".$order->get_shipping_total().",
			'affiliation':'".get_bloginfo('name')."'
			".$itemsParam."
			});";
			echo '<script>'.$tracking.'</script>';
		}
	};


$easyPixels->trackingOptions->analytics->jn_productView_tracking=function()
	{		
		if((class_exists( 'WooCommerce' ))&&(is_product())&&($this->is_enabled())&&($this->getCode()!=''))
		{
			global $product;
	        global $post;
	        $id=$product->get_sku() ? $product->get_sku() : $product->get_id();
	        $cat=jn_WCtracking::getProductCategory($product);

			$brandList='';
			echo "<script>gtag('event', 'view_item', {
					'items': [
					{
					  'id': '".$id."',
					  'name': '".$product->get_title()."',
					  'brand': '".$brandList."',
					  'category': '". $cat."',
					  'variant': '',
					  'list_position': 1,
					  'quantity': 1,
					  'price': ".$product->get_price()."
					}
					]
					});</script>";
		}
	};


$easyPixels->trackingOptions->analytics->putAddToCartAjaxCode=function()
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!='')&&  ( is_shop() || is_product_category() || is_product_tag() ) )
		{
		echo "
		<script>(function(\$){\$( document.body ).on( 'added_to_cart', function(event, fragments, dhash, button)
		{gtag('event', 'add_to_cart', {
  'items': [{'id': button.data('product_id'),'quantity': button.data('quantity')}]});})})(jQuery);</script>";
        }
	};

$easyPixels->trackingOptions->analytics->putAddToCartCode=function ($cart_item_key,$product_id)
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$product = wc_get_product( $product_id );
			add_action('jn_easyPixels_footer',function() use ($product) {echo "<script>gtag('event', 'add_to_cart', {'items': [{'id': '".$product->get_id()."','name': '".$product->get_name()."','price': ".$product->get_price()."}]});</script>";});
		}
	};



$easyPixels->trackingOptions->analytics->getProductViewList=function ($list='')
	{
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$productList=$list->getProductViewList();
			echo "<script>gtag('event', 'view_item_list', {'items': [";
			foreach ($productList as $product) {
				echo "{'id': '".$product->id."','name': '".$product->name."','list_name': 'Search Results','category': '".$product->category."','list_position': ".$product->position.",'quantity': 1,'price': ".$product->price."},";
			}
			echo ']});</script>';
		}
	};

$easyPixels->trackingOptions->analytics->putInitCheckoutCode=function ($list)
	{
		global $woocommerce;
		if((!$this->is_enabled())||($this->getCode()=='')){return;}
		{
			$productList=$list->getProductViewList();
			$coupons=$woocommerce->cart->get_applied_coupons();
			$couponList='';
			foreach ($coupons as $coupon) {
				$couponList.=$coupon.',';
			}
			echo "<script>gtag('event', 'begin_checkout', {'items': [";
			foreach ($productList as $product) {
				echo "{'id': '".$product->id."','name': '".$product->name."','list_name': 'Checkout','category': '".$product->category."','list_position': ".$product->position.",'quantity': ".$product->quantity.",'price': ".$product->price."},";
			}
			echo "],'coupon':'".$couponList."'});</script>";
		}
	};

$easyPixels->trackingOptions->analytics->putNewUserRegistrationCode=function()
	{
		if((!$this->is_enabled())||($this->getCode()=='')){return;}
		if ( isset( $_GET['jnep_newusr'] ) && ($_GET['jnep_newusr']=='1') ) {echo "<script>gtag('event', 'sign_up');</script>";}
	};




class jn_AnalyticsWC extends jn_Analytics
{

	function __construct()
	{
		parent::__construct();
//		add_action( 'woocommerce_add_to_cart', array($this, 'putAddToCartCode'),10,2 );
//		add_action( 'template_redirect', array( $this, 'putNewUserRegistrationCode' ) );
	}
}
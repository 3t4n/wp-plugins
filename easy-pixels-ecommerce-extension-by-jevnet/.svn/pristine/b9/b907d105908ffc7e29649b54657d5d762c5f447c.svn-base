<?php

$easyPixels->trackingOptions->bing->putWCConversionCode=function ($order=null)
	{
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			$itemList=$order->get_items();
			$itemsParam="";
			$position=1;
			foreach ($itemList as $orderItem) {
    			$id=$orderItem->get_product()->get_sku() ? $orderItem->get_product()->get_sku() : ( '#' . $orderItem->get_product()->get_id() );
				$itemsParam.="'".$id."',";
			}

			$tracking="window.uetq = window.uetq || [];window.uetq.push('event', 'purchase', {'ecomm_prodid': [".$itemsParam."], 'revenue_value': ".$order->get_total().", 'currency': ".json_encode($order->get_currency()).", 'ecomm_pagetype': 'purchase','transaction_id':'".$order->get_order_number()."'});";
			echo '<script>'.$tracking.'</script>';
		}
	};


$easyPixels->trackingOptions->bing->jn_productView_tracking=function()
	{		
		if((class_exists( 'WooCommerce' ))&&(is_product())&&($this->is_enabled())&&($this->getCode()!=''))
		{
			global $product;
	        global $post;
	        $id=$product->get_sku() ? $product->get_sku() : $product->get_id();
			echo "<script>window.uetq = window.uetq || []; window.uetq.push ('event', 'view_item', {'ecomm_prodid': ['".$id."'], 'ecomm_pagetype': 'product'});</script>";
		}
	};


$easyPixels->trackingOptions->bing->putWCPageViewEvent=function ()
	{
		$tracking='';
		if((class_exists( 'WooCommerce' ))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			if(is_product())
			{
				global $product;
		        $id=$product->get_sku() ? $product->get_sku() : $product->get_id();
				echo "<script>window.uetq = window.uetq || []; window.uetq.push ('event', 'page_view', {'ecomm_prodid': ['".$id."'], 'ecomm_pagetype': 'product'});</script>";
			}
			if(is_cart()){}
			echo $tracking;
		}
	};


$easyPixels->trackingOptions->bing->getProductViewList=function($list='')
	{
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$productList=$list->getProductViewList();
			$contents='';
			foreach ($productList as $product) {
				$contents.="'".$product->id."', ";
			}
			echo "<script>window.uetq = window.uetq || []; window.uetq.push ('event', 'view_item_list', {'ecomm_prodid': [".$contents."], 'ecomm_pagetype': 'category'});</script>";
		}
	};


$easyPixels->trackingOptions->bing->putAddToCartAjaxCode=function()
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!='')&&  ( is_shop() || is_product_category() || is_product_tag() ) )
		{
		echo "
		<script>(function(\$){\$( document.body ).on( 'added_to_cart', function(event, fragments, dhash, button)
		{gtag('event', 'add_to_cart', {
  'items': [{'id': button.data('product_id'),'quantity': button.data('quantity')}]});})})(jQuery);</script>";

		echo "<script>window.uetq = window.uetq || []; window.uetq.push ('event', 'add_to_cart', {'ecomm_prodid': button.data('product_id'), 'ecomm_pagetype': 'cart'});</script>";
        }
	};

$easyPixels->trackingOptions->bing->putAddToCartCode=function ($cart_item_key,$product_id)
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$product = wc_get_product( $product_id );
			add_action('jn_easyPixels_footer',function() use ($product) {
							echo "<script>window.uetq = window.uetq || []; window.uetq.push ('event', 'add_to_cart', {'ecomm_prodid': '".$product->get_id()."','revenue_value': ".$product->get_price().", 'currency': '".get_woocommerce_currency()."', 'ecomm_pagetype': 'cart'});</script>";
						});
		}
	};


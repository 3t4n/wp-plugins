<?php
$easyPixels->trackingOptions->gtm->putWCConversionCode=function($order=null)
	{
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			$itemList=$order->get_items();
//					var_dump($itemList);
			$productsParam="";
			$position=1;
			foreach ($itemList as $orderItem) {
    			$id=$orderItem->get_product()->get_sku() ? $orderItem->get_product()->get_sku() : ( '#' . $orderItem->get_product()->get_id() );
	        	$cat=jn_WCtracking::getProductCategory($orderItem->get_product());
				$productsParam.="{'id':'".$id."',
				'name':'".$orderItem->get_product()->get_name()."',
				'price':".$orderItem->get_product()->get_price().",
				'variant':".$orderItem->get_variation_id().",
				'category':'".$cat."',
				'quantity':".$orderItem->get_quantity().",
				'list_position':$position},";
				/*https://developers.google.com/analytics/devguides/collection/gtagjs/events?hl=es#item-parameters */
			}
			$coupons_list = '';
			foreach( $order->get_coupon_codes() as $coupon) {
			    $coupons_list .=  $coupon;
			    if( $i < $coupons_count )
			    	$coupons_list .= ', ';
			    $i++;
			}

			$productsParam=($productsParam!='')?", 'products':[".$productsParam."],'coupon':'".$coupons_list."'":"";
			

			$tracking="dataLayer.push({
				'ecommerce':
					{'purchase': {
						'actionField': {
							'id': '".$order->get_order_number()."', 
							'revenue': ".$order->get_total().",
							'tax':".$order->get_total_tax().",
							'currency': ".json_encode($order->get_currency()).",
							'shipping': ".$order->get_shipping_total().",
							'affiliation':'".get_bloginfo('name')."'
							}
							".$productsParam."
						}
					}
				});";
			echo '<script>'.$tracking.'</script>';
		}
	};

$easyPixels->trackingOptions->gtm->jn_productView_tracking=function()
	{
		if((class_exists( 'WooCommerce' ))&&(is_product())&&($this->is_enabled())&&($this->getCode()!=''))
		{
			global $product;
	        $id=$product->get_sku() ? $product->get_sku() : $product->get_id();
			$cat=jn_WCtracking::getProductCategory($product);
//	        $cat=(get_term_by( 'id', $product->category_ids[0], 'product_cat' ) )?$term->name:'';global $post;
/*			$brands = wp_get_post_terms( $post->ID, 'product_brand', array("fields" => "all") );
			$brandList='';
			foreach( $brands as $brand ) {
				$brandList.= term_description( $brand->term_id, 'product_brand' ).',';
			}
			$brandList=rtrim($brandList,", ");*/
			$brandList='';
			echo "<script>dataLayer.push({'ecommerce':{
					'detail': {
						'products': [{
							'id': '".$id."',
							'name': '".$product->get_title()."',
							'brand': '".$brandList."',
							'category': '".$cat."',
							'variant': '',
							'price': ".$product->get_price()."
							}]
						}
					}});</script>";
		}
	};



$easyPixels->trackingOptions->gtm->putAddToCartAjaxCode=function()
	{		
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!='')&&  ( is_shop() || is_product_category() || is_product_tag() ) )
		{
		echo "
		<script>(function(\$){\$( document.body ).on( 'added_to_cart', function(event, fragments, dhash, button)
		{
			dataLayer.push({'event': 'addToCart','ecommerce': {'currencyCode': '".get_woocommerce_currency()."','add': {'products': [{  'id': button.data('product_id'),'quantity': button.data('quantity')}]}
  }
  })
})})(jQuery);</script>";
        }
	};

$easyPixels->trackingOptions->gtm->putAddToCartCode=function($product)
	{
		if(($this->is_enabled())&&($this->getCode()!='') )
		{
			add_action('jn_easyPixels_footer',function() use ($product) {echo "<script>dataLayer.push({
  'event': 'addToCart',
  'ecommerce': {
    'currencyCode': '".get_woocommerce_currency()."',
    'add': {'products': [{'id': '".$product_id."'}]}
  }
  })</script>";});
		}
	};

$easyPixels->trackingOptions->gtm->getProductViewList=function($list='')
	{
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$productList=$list->getProductViewList();
			echo "<script>dataLayer.push({'ecommerce': {'currencyCode': '".get_woocommerce_currency()."','impressions': [";
			foreach ($productList as $product) {
				echo "{'id': ".$product->id.",'name': '".$product->name."','list': 'Search Results','category': '".$product->category."','position': ".$product->position.",'price': ".$product->price."},";
			}
			echo ']}});</script>';
		}
	};

$easyPixels->trackingOptions->gtm->putInitCheckoutCode=function($list='')
{
		global $woocommerce;
		if((!$this->is_enabled())||($this->getCode()=='')){return;}

		$productList=$list->getProductViewList();
		$coupons=$woocommerce->cart->get_applied_coupons();
		$couponList='';
		foreach ($coupons as $coupon) {
			$couponList.=$coupon.',';
		}
		echo "<script>dataLayer.push({'event':'checkout','ecommerce': {'currencyCode': '".get_woocommerce_currency()."','checkout':{'products': [";
		foreach ($productList as $product) {
			echo "{'id': ".$product->id.",'name': '".$product->name."','list_name': 'Checkout','category': '".$product->category."','list_position': ".$product->position.",'quantity': ".$product->quantity.",'price': ".$product->price."},";
		}
		echo "],'coupon':'".$couponList."'}}});</script>";

	};

/*
class jn_easyGTagManagerWC extends jn_easyGTagManager
{
	function __construct()
	{
		parent::__construct();
//		add_action( 'woocommerce_add_to_cart', array($this, 'putAddToCartCode'),10,2 );
	}

}*/
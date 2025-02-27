<?php



$easyPixels->trackingOptions->facebook->putWCConversionCode=function($order=null)
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if((!is_null($order))&&($this->is_enabled())&&($this->getCode()!=''))
		{
			$tracking="fbq('track', 'Purchase', {'value':'".$order->get_total()."','currency':'".$order->get_currency()."'});";
			$noscript='<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id='.$this->getCode().'&amp;ev=Purchase&amp;cd[value]='.$order->get_total().'&amp;cd[currency]='.$order->get_currency().'"/>';
			echo '<script>'.$tracking.'</script><noscript>'.$noscript.'</noscript>';
		}
	};


$easyPixels->trackingOptions->facebook->putInitCheckoutCode=function ()
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!='')){echo "<script>fbq('track', 'InitiateCheckout');</script>";}
	};

$easyPixels->trackingOptions->facebook->putRemoveFromCartAjaxCode=function ()
	{
//		if ( is_shop() || is_product_category() || is_product_tag() )
		if(!class_exists( 'WooCommerce' )){return;}
		echo "<script>(function($){ 

                    $( document.body ).on( 'removed_from_cart', function(event, fragments, dhash, button){
			fbq('track', 'RemoveFromCart', {
				content_ids: button.data('product_id') ,
				content_type: 'product'
			});
                    });

                })(jQuery);</script>";
	};



$easyPixels->trackingOptions->facebook->putAddToCartAjaxCode=function ()
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!='') )
		{
		echo "<script>(function(\$){\$( document.body ).on( 'added_to_cart', function(event, fragments, dhash, button){fbq('track', 'AddToCart', {content_ids: button.data('product_id') ,content_type: 'product'});});})(jQuery);</script>";
		}
	};


$easyPixels->trackingOptions->facebook->jn_productView_tracking=function ()
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if((is_product())&&($this->is_enabled())&&($this->getCode()!='') )
		{
			global $product;
			$id=$product->get_sku() ? $product->get_sku() : $product->get_id();
//			$cat=(get_term_by( 'id', $product->category_ids[0], 'product_cat' ) )?$term->name:'';
			$cat=jn_WCtracking::getProductCategory($product);
			$price=$product->get_price();
			if($price==''){$price=1;}
			echo "<script>fbq('track', 'ViewContent', {content_type: 'product',content_name: '".$product->get_title()."',content_category: '".$cat."', content_ids: ['".$id."'], content_type: 'product', value: ".$price.", currency: '".get_woocommerce_currency()."'});</script>";
		}
	};


$easyPixels->trackingOptions->facebook->getProductViewList=function($list='')
	{
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$productList=$list->getProductViewList();
			$contents='';
			foreach ($productList as $product) {
//				$cat=jn_WCtracking::getProductCategory($product->id);
				$price=$product->price;
				if($price==''){$price=1;}
				$contents.="{'id': '".$product->id."', 'quantity': 1, 'content_name': '".$product->name."', 'value': ".$price.",content_category: '". $product->category."'},";
			}
			echo "<script>fbq('track', 'ViewContent', {contents: [".$contents."], content_type: 'product_group', currency: '".get_woocommerce_currency()."'});</script>";
		}
	};


$easyPixels->trackingOptions->facebook->putAddToCartCode=function($cart_item_key,$product_id)
	{
		if(!class_exists( 'WooCommerce' )){return;}
		if(($this->is_enabled())&&($this->getCode()!=''))
		{
			$product = wc_get_product( $product_id );
			$price=$product->get_price();
			if($price==''){$price=1;}
			add_action('jn_easyPixels_footer',function() use ($product) {echo "<script>fbq('track', 'AddToCart', {content_ids: '".$product->get_id()."',content_name: '".$product->get_name()."',content_type: 'product',value: ".$price.", currency: '".get_woocommerce_currency()."'});</script>";});
		}
	};

$easyPixels->trackingOptions->analytics->putNewUserRegistrationCode=function()
	{
		if((!$this->is_enabled())||($this->getCode()=='')){return;}
		if ( isset( $_GET['jnep_newusr'] ) && ($_GET['jnep_newusr']=='1') ) {echo "<script>fbq('track', 'CompleteRegistration');</script>";}
	};


class jn_FacebookWC extends jn_Facebook
{
	
	function __construct()
	{
		parent::__construct();
/*		add_action( 'woocommerce_add_to_cart', array($this, 'putAddToCartCode'),10,2 );
		add_action('jn_easyPixels_footer',array($this, 'viewContentTrackingProduct'),10,2);*/
	}

}
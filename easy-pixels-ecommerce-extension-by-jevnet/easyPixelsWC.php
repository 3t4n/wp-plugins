<?php
/*
Plugin Name: Easy Pixels - eCommerce Extension by JEVNET
Plugin URI: https://wordpress.org/plugins/easy-pixels-ecommerce-extension-by-jevnet/
Description: Easy Pixels extension to set the tracking codes on Woocommerce.
Version: 2.12
Author: JEVNET
Author URI: https://www.jevnet.es
License: GPLv2 or later
Text Domain: easy-pixels-ecommerce-extension-by-jevnet
WC tested up to: 5.5

*/


if ( !function_exists( 'add_action' ) ) {
	echo '¿Qué quieres hacer?';
	exit;
}

/* Translations */
add_action('plugins_loaded', 'jn_epwce_load_textdomain');
function jn_epwce_load_textdomain() {
	load_plugin_textdomain( 'easy-pixels-ecommerce-extension-by-jevnet', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

define('JN_EasyPixelsWC_PATH', dirname(__FILE__));
define('JN_EasyPixelsWC_URL', plugins_url('', __FILE__));


if (!class_exists( 'jn_Analytics' ) ){add_action( 'admin_notices', 'jnepwc_noEasyPixels_notice' );}
else{add_action('jn_init_easypixels_extensions','easypixelsWC_run');}

function easypixelsWC_run($easyPixels=null)
{
	if($easyPixels==null){$easyPixels=new jn_easypixels();}
	include(JN_EasyPixelsWC_PATH."/classes/WCtracking.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-analytics.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-facebook.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-gads.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-bing.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-gtm.php");
	include_once(JN_EasyPixelsWC_PATH."/classes/easy-product.php");

	if(is_admin())
	{
		if(!class_exists( 'WooCommerce' )){	add_action( 'admin_notices', 'jnepwc_noWooCommerce_notice' );}

		add_action('plugins_loaded', 'jn_easypixelsWC_load_textdomain');
		add_action('easypixels_admintabs','jn_easypixels_admintabs_WC',20);
		require_once(JN_EasyPixelsWC_PATH . '/admin/easyPixelsWCAdmin.php');
		add_action('admin_init','jn_easypixels_saveEPWCSettings');
		add_action('admin_menu','jn_easypixels_createWCMenuOption');
	}
	else
	{

		$productList=new jnep_WCproductList();
		add_action('jn_easyPixels_footer',function() use ($easyPixels,$productList){jn_easypixels_footerCodes($easyPixels,$productList);});


/* REVISAR ADD TO CART */
//add_action( 'woocommerce_add_to_cart', function() use ($easyPixels){$easyPixels->trackingOptions->analytics->putAddToCartCode($cart_item_key,$product_id);$easyPixels->trackingOptions->facebook->putAddToCartCode($cart_item_key,$product_id);},10,2);

		/* Add to cart */
		add_action( 'woocommerce_add_to_cart', array($easyPixels->trackingOptions->analytics, 'putAddToCartCode'),10,2 );
		add_action( 'woocommerce_add_to_cart', array($easyPixels->trackingOptions->facebook, 'putAddToCartCode'),10,2 );
		add_action( 'woocommerce_add_to_cart', array($easyPixels->trackingOptions->gtm, 'putAddToCartCode'),10,2 );
		add_action( 'woocommerce_add_to_cart', array($easyPixels->trackingOptions->bing, 'putAddToCartCode'),10,2 );

		/* View product list */
		add_action( 'woocommerce_after_shop_loop', function() use ($easyPixels,$productList)
			{
				$easyPixels->trackingOptions->analytics->getProductViewList($productList);
				$easyPixels->trackingOptions->facebook->getProductViewList($productList);
				$easyPixels->trackingOptions->gtm->getProductViewList($productList);
				$easyPixels->trackingOptions->bing->getProductViewList($productList);
			} );

		/* Init checkout */
		add_action( 'woocommerce_after_checkout_form', function() use ($easyPixels,$productList)
			{
				$easyPixels->trackingOptions->analytics->putInitCheckoutCode($productList);
				$easyPixels->trackingOptions->facebook->putInitCheckoutCode($productList);
				$easyPixels->trackingOptions->gtm->putInitCheckoutCode($productList);
			},100 );

		/* Registration */
		add_filter( 'woocommerce_registration_redirect', 'jn_easypixels_redirect_url' );
		$easyPixels->trackingOptions->analytics->putNewUserRegistrationCode();
		$easyPixels->trackingOptions->facebook->putNewUserRegistrationCode();

	}
}

function jn_easypixels_purchaseTracking($easyPixels)
{

	if (( class_exists( 'WooCommerce' ) )&&( is_order_received_page() ))
	{
		$order_key= sanitize_text_field($_GET['key']);
		$order= new WC_Order( wc_get_order_id_by_order_key( $order_key ) );
		$easyPixels->trackingOptions->analytics->putWCConversionCode($order);
		$easyPixels->trackingOptions->facebook->putWCConversionCode($order);
		$easyPixels->trackingOptions->gads->putWCConversionCode($order);
		$easyPixels->trackingOptions->bing->putWCConversionCode($order);
		$easyPixels->trackingOptions->gtm->putWCConversionCode($order);
	}
}


function jn_easypixels_redirect_url( $url )
{
	$url = add_query_arg( array(
	'jnep_newusr' => '1'
	), $url );
	return $url;
}

function jn_easypixels_footerCodes($easyPixels=null,$productList=[])
{
	$easyPixels->trackingOptions->analytics->jn_productView_tracking();
	$easyPixels->trackingOptions->facebook->jn_productView_tracking();
	$easyPixels->trackingOptions->bing->jn_productView_tracking();
	$easyPixels->trackingOptions->gads->putWCPageViewEvent();
	$easyPixels->trackingOptions->gtm->jn_productView_tracking();

	$easyPixels->trackingOptions->analytics->putAddToCartAjaxCode();
	$easyPixels->trackingOptions->facebook->putAddToCartAjaxCode();
	$easyPixels->trackingOptions->bing->putAddToCartAjaxCode();
	jn_easypixels_purchaseTracking($easyPixels);
}

function jnepwc_noWooCommerce_notice()
{
	if(!class_exists('WooCommerce'))
	{
	?>
		<div class="notice  notice-info">
			<p><?php echo __( 'Easy Pixels eCommerce extension plugin is active but WooCommerce is not active or not installed. There is no problem and you can keep it active if you love it. We know love has no sense.', 'easy-pixels-ecommerce-extension-by-jevnet' ); ?></p>
		</div>
	<?php
	}
}

function jnepwc_noEasyPixels_notice()
{
	if(!class_exists('jn_Analytics'))
	{
	?>
		<div class="notice  notice-info">
			<p><?php echo __( 'Easy Pixels eCommerce extension plugin is active but Easy Pixels is not active or not installed. Please ', 'easy-pixels-ecommerce-extension-by-jevnet');
			echo '<a href="'.admin_url().'plugins.php">'.__('activate Easy Pixels', 'easy-pixels-ecommerce-extension-by-jevnet').'</a> '.__('or', 'easy-pixels-ecommerce-extension-by-jevnet').' <a href="'.admin_url().'plugin-install.php?tab=plugin-information&plugin=easy-pixels-by-jevnet&TB_iframe=true&width=640&height=500" target="_blank" class="button button-primary button-large">'.__('download it', 'easy-pixels-ecommerce-extension-by-jevnet').'</a>'; ?></p>
		</div>
	<?php
	}
}




/* Translations */
function jn_easypixelsWC_load_textdomain() {
	load_plugin_textdomain( 'easy-pixels-ecommerce-extension-by-jevnet', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

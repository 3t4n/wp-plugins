<?php
/**
 * Apptivo Ecommerce Configuration
 * @package Apptivo eCommerce
 * @author Rajkumar <rmohanasundaram[at]apptivo[dot]com>
*/
$version = curl_version();
$versionCheck = version_compare($version['version'],"7.34.0");
if($versionCheck== -1){
define('API_SERVICES','https://api.apptivo.com/');
// define('API_SERVICES','https://stag-tomcat-322.apptivo.net/');

// define('API_SERVICES','https://staging.apptivo.net/');
// define('API_SERVICES','http://gpandian-dev.apptivo.net/');
 // define('API_SERVICES','https://stag-tomcat-322.apptivo.net/'); 
 // define('API_SERVICES','https://stag-tomcat-321.apptivo.nesst/');//15 may working fine
define('TLSV2_SUPPORT',false);
}
else
{
// define('API_SERVICES','https://stag-tomcat-322.apptivo.net/');d
// define('API_SERVICES','https://stag-tomcat-321.apptivo.net/');ss
define('API_SERVICES','https://api2.apptivo.com/');//prd
// define('API_SERVICES','https://staging.apptivo.net/');
// define('API_SERVICES','http://gpandian-dev.apptivo.net/');
define('TLSV2_SUPPORT',true);
}
$apptivo_ecommerce_apikey = trim(get_option('apptivo_ecommerce_apikey'));
$apptivo_ecommerce_accesskey = trim(get_option('apptivo_ecommerce_accesskey'));
define('APPTIVO_ECOMMERCE_API_KEY',$apptivo_ecommerce_apikey);
define('APPTIVO_ECOMMERCE_ACCESSKEY',$apptivo_ecommerce_accesskey);
define('ITEM_WSDL',API_SERVICES.'app/services/v1/ItemServices?wsdl');
define('INDEX_ITEM_WSDL',API_SERVICES.'ts/services/AppItemWebService?wsdl');
define('CART_WSDL',API_SERVICES.'app/services/v1/CartServices?wsdl');
define('USER_WSDL',API_SERVICES.'app/services/v1/UserServices?wsdl');
define('SHIPPING_WSDL',API_SERVICES.'app/services/v1/ShippingServices?wsdl');




define('ITEM_v6_API',API_SERVICES.'/app/dao/v6/items');
define('APPTIVO_SIGNUP_API',API_SERVICES.'/app/dao/signup');


// define('ITEM_v6_API',API_SERVICES.'app/dao/v6/items');
define('ITEM_API_URL',API_SERVICES.'app/dao/item');
define('AWP_ITEM_SERVICES',API_SERVICES.'app/services/ItemServices?wsdl');
define('AWP_API_KEY','GkX3ZmZ/7dHM2abtEDPUVxnxLnU=');

// define('APPTIVO_SIGNUP_API',APPTIVO_API_URL.'app/dao/signup');
define('merchant_v6_API',API_SERVICES.'app/dao/v6/merchant');
define('cart_v6_API',API_SERVICES.'app/dao/v6/cart');
define('suppliers_v6_API',API_SERVICES.'app/dao/v6/suppliers');
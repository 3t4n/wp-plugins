<?php

if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'classes/jsonBody.php';
require_once plugin_dir_path( __DIR__ ) . 'model/classes/getVendorData.php';

function minutos_WooFulfillmentCheckout($order_id){

    $jsonBody = new Minutos_jsonBody;
    $getVendorData = new Minutos_getVendorData;

    $getVendorData->getShippingData();

    $name99 = $getVendorData->name_99;
    $nameSame = $getVendorData->name_same;
    $nameNext = $getVendorData->name_next;
    $nameCO2 = $getVendorData->name_CO2;

    $order = wc_get_order( $order_id );

    $total_weight = 0;

    foreach( $order->get_items() as $item_id => $product_item ){
        $quantity = $product_item->get_quantity(); // get quantity
        $product = $product_item->get_product(); // get the WC_Product object
        $product_weight = $product->get_weight(); // get the product weight
        // Add the line item weight to the total weight calculation
        $total_weight += floatval( $product_weight * $quantity );
    }

    $shippingMethod = $order->get_shipping_method();

    $deliveryType;

    $packageSize;

    if($shippingMethod == $nameNext || $shippingMethod == $nameSame || $shippingMethod == $name99 || $shippingMethod == $nameCO2)
    {

        if($shippingMethod == $nameNext){

            $deliveryType = "nextDay";

        }elseif($shippingMethod == $nameSame){

            $deliveryType = "sameDay";

        }elseif($shippingMethod == $name99){

            $deliveryType = "99minutos";

        }else{

            $deliveryType = "CO2";
        }

        if($total_weight < 1){

            $packageSize = 'xs';

        }elseif(1 <= $total_weight && $total_weight < 2){

            $packageSize = 's';

        }elseif(2 <= $total_weight && $total_weight < 3){

            $packageSize = 'm';

        }elseif(3 <= $total_weight && $total_weight < 5){

            $packageSize = 'l';

        }elseif(5 <= $total_weight && $total_weight < 25){

            $packageSize = 'xl';

        }

        foreach ( $order->get_items() as $item_id => $item ) {
            $product_id = $item->get_product_id();
            $vendor_id = get_post_field( 'post_author', $product_id );
            $vendor = get_userdata( $vendor_id );
            $email = $vendor->user_email;
            $getVendorData->vendorData($email);
            $businessName = $getVendorData->business;
            $apikey = $getVendorData->apikey;
            $sellerName = $getVendorData->sellerName;
            $Email = $getVendorData->Email;
            $Phone = $getVendorData->Phone;
            $originAddress = "{$getVendorData->originAddress} {$getVendorData->originNumber}";
            $originNumber = $getVendorData->originNumber;
            $zipCode = $getVendorData->zipCode;
            $receiver = $order->get_shipping_first_name() . " " . $order->get_shipping_last_name();
            $emailReceiver = $order->get_billing_email();
            $phoneReceiver = $order->get_billing_phone();
            $addressDestination = $order->get_shipping_address_1() . " " . $order->get_shipping_address_2();
            $postalCodeDestination = $order->get_shipping_postcode();

            $jsonBody->sellerData($order_id, $vendor_id, $businessName);

            $jsonBody->body($apikey, $deliveryType, $packageSize, $sellerName, $Email, $Phone, $originAddress, $zipCode, $receiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $order_id, $vendor_id, $originNumber);
        }
    }
}

add_action( 'woocommerce_order_status_processing', 'minutos_WooFulfillmentCheckout');
<?php
/**************************************************************************
FoxyPress provides a complete shopping cart and inventory management tool 
for use with FoxyCart's e-commerce solution.
Copyright (C) 2008-2014 WebMovement, LLC - View License Information - FoxyPress.php
**************************************************************************/

$root = dirname(dirname(dirname(dirname(__FILE__))));
require_once($root.'/wp-config.php');
require_once($root.'/wp-includes/wp-db.php');

	$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

	$remoteDomain = get_option('foxycart_remote_domain');
	if($remoteDomain){
		$foxyStoreURL = get_option('foxycart_storeurl');
	}else{
		$foxyStoreURL = get_option('foxycart_storeurl') . ".foxycart.com";
	}
	$foxyAPIURL = "https://" . $foxyStoreURL . "/api";
	$foxyData = array();
	$foxyData["api_token"] = get_option('foxycart_apikey');
	$foxyData["api_action"] = "customer_list";

    
    $foxyData['customer_email_filter'] = '*' . $term . '*';
         
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $foxyAPIURL);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $foxyData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	$response = trim(curl_exec($ch));
	 
	if ($response == false)
		$customers = null;
	else
	{
        $customers = array();
	    $foxyXMLResponse = simplexml_load_string($response, NULL, LIBXML_NOCDATA);
	     // var_dump($foxyXMLResponse);
	    $i = 0;
	    foreach ($foxyXMLResponse->customers->customer as $customer) 
	    {
	        $c = array(
	        				'value' => (string)$customer[$i]->customer_email,
	        				'id' => (int)$customer[$i]->customer_id,
	                        'first_name' => (string)$customer[$i]->customer_first_name,
	                        'last_name' => (string)$customer[$i]->customer_last_name,
	                        'company' => (string)$customer[$i]->customer_company,
	                        'address1' => (string)$customer[$i]->customer_address1,
	                        'address2' => (string)$customer[$i]->customer_address2,
	                        'city' => (string)$customer[$i]->customer_city,
	                        'state' => (string)$customer[$i]->customer_state,
	                        'postal_code' => (string)$customer[$i]->customer_postal_code,
	                        'phone_number' => (string)$customer[$i]->customer_phone,
	                        'shipping_first_name' => (string)$customer[$i]->shipping_first_name,
	                        'shipping_last_name' => (string)$customer[$i]->shipping_last_name,
	                        'shipping_company' => (string)$customer[$i]->shipping_company,
	                        'shipping_address1' => (string)$customer[$i]->shipping_address1,
	                        'shipping_address2' => (string)$customer[$i]->shipping_address2,
	                        'shipping_city' => (string)$customer[$i]->shipping_city,
	                        'shipping_state' => (string)$customer[$i]->shipping_state,
	                        'shipping_postal_code' => (string)$customer[$i]->shipping_postal_code,
	                        'shipping_phone' => (string)$customer[$i]->shipping_phone,
	                        );
	        array_push($customers, $c);
	        $i++;
	    }
		array_push($customers, array('message' => $foxyXMLResponse->messages->message));
	}

	echo json_encode($customers);
?>
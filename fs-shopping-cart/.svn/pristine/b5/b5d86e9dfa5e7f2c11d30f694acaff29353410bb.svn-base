<?php
// Version: 1.0 

class FSSCPayPalClass {
	function PPHttpPost($PayPalMethodType, $PayPalURLVars) {
		global $CheckoutLink,$FSSCPages,$fscartconfig;

		$PayPalAPIUsername = urlencode($fscartconfig['PayPalExpressUsername']);
		$PayPalAPIPassword = urlencode($fscartconfig['PayPalExpressPassword']);
		$PayPalAPISignature = urlencode($fscartconfig['PayPalExpressSignature']);

		$PayPalCurrency = $_SESSION['currencycode'];
		$PayPalReturnURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);
		$PayPalCancelURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);

		$PayPalEnvironment = '';
		if ($fscartconfig['PayPalExpressEnvironment'] == 'sandbox') {
			$PayPalEnvironment = '.sandbox';
		}

		$PayPalTransactionURL = "https://api-3t".$PayPalEnvironment.".paypal.com/nvp";
		$Version = urlencode('76.0');

		$CurlInit = curl_init();
		curl_setopt($CurlInit, CURLOPT_URL, $PayPalTransactionURL);
		curl_setopt($CurlInit, CURLOPT_VERBOSE, 1);
		curl_setopt($CurlInit, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($CurlInit, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($CurlInit, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($CurlInit, CURLOPT_POST, 1);

		$TransactionPrereq = "METHOD=$PayPalMethodType&VERSION=$Version&PWD=$PayPalAPIPassword&USER=$PayPalAPIUsername&SIGNATURE=$PayPalAPISignature$PayPalURLVars";

		curl_setopt($CurlInit, CURLOPT_POSTFIELDS, $TransactionPrereq);
		$CurlResponse = curl_exec($CurlInit);
		$CurlResponseValues = explode("&", $CurlResponse);
		$ResponseArray = array();
		foreach ($CurlResponseValues as $i => $value) {
			$ResponseValue = explode("=", $value);
			if (sizeof($ResponseValue) > 1) {
				$ResponseArray[$ResponseValue[0]] = $ResponseValue[1];
			}
		}

		return $ResponseArray;
	}
}

function fssc_SetExpressCheckout() {
	global $CheckoutLink,$FSSCPages,$fscartconfig,$wpdb;
	if ($fscartconfig['EnableSSL'] == 1) {
		$CheckoutLink = str_replace("http://", "https://", get_option('home'));
	} else {
		$CheckoutLink = get_option('home');
	}

	$PayPalAPIUsername = urlencode($fscartconfig['PayPalExpressUsername']);
	$PayPalAPIPassword = urlencode($fscartconfig['PayPalExpressPassword']);
	$PayPalAPISignature = urlencode($fscartconfig['PayPalExpressSignature']);

	$PayPalCurrency = $_SESSION['currencycode'];
	$PayPalReturnURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);
	$PayPalCancelURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);

	$PayPalEnvironment = '';
	if ($fscartconfig['PayPalExpressEnvironment'] == 'sandbox') {
		$PayPalEnvironment = '.sandbox';
	}

	$PayPalURLVars = '&CURRENCYCODE='.urlencode($PayPalCurrency);	
	$PayPalURLVars .= '&PAYMENTACTION=Sale';
	$PayPalURLVars .= '&ALLOWNOTE=1';
	$PayPalURLVars .= '&AMT='.$_SESSION['finalprice'];
	$PayPalURLVars .= '&RETURNURL='.$PayPalReturnURL;
	$PayPalURLVars .= '&CANCELURL='.$PayPalCancelURL;
	
	$PaymentTotal = 0;
	$ItemNumber = 0;
	$CartInfo = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY parent_basket_id");
	foreach ($CartInfo as $CartInfo) {
		$ProductName = $wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$CartInfo->products_id);
		$PayPalURLVars .= '&L_PAYMENTREQUEST_0_QTY'.$ItemNumber.'='. urlencode($CartInfo->products_quantity);
		$PayPalURLVars .= '&L_PAYMENTREQUEST_0_AMT'.$ItemNumber.'='.urlencode($CartInfo->products_price);
		$PayPalURLVars .= '&L_PAYMENTREQUEST_0_NAME'.$ItemNumber.'='.urlencode($ProductName);
		$ItemTotalPrice = $ItemTotalPrice + $CartInfo->products_price * $CartInfo->products_quantity;
		$ItemNumber++;
	}
	
	$Taxes = $_SESSION['finalprice'] - $_SESSION['shipping'] - $ItemTotalPrice;
	
	$PayPalURLVars .= '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrency);
	$PayPalURLVars .= '&PAYMENTREQUEST_0_TAXAMT='.$Taxes;
	$PayPalURLVars .= '&PAYMENTREQUEST_0_SHIPPINGAMT='.$_SESSION['shipping'];
	$PayPalURLVars .= '&PAYMENTREQUEST_0_AMT='.urlencode($_SESSION['finalprice']);
	$PayPalURLVars .= '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice);

	$PayPalClass = new FSSCPayPalClass();
	$ResponseArray = $PayPalClass->PPHttpPost('SetExpressCheckout', $PayPalURLVars);

	if (strtoupper($ResponseArray["ACK"]) == "SUCCESS" || strtoupper($ResponseArray["ACK"]) == "SUCCESSWITHWARNING") {
		$PayPalRedirect = 'https://www'.$PayPalEnvironment.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$ResponseArray["TOKEN"].'';
		header('Location: '.$PayPalRedirect);
		exit();
	} else {
		return urldecode($ResponseArray["L_LONGMESSAGE0"]).'<pre>'.print_r($ResponseArray).'</pre>';
	}
}

function fssc_DoExpressCheckoutPayment() {
	global $_GET,$fscartconfig,$CheckoutLink,$FSSCPages;

	$PayPalAPIUsername = urlencode($fscartconfig['PayPalExpressUsername']);
	$PayPalAPIPassword = urlencode($fscartconfig['PayPalExpressPassword']);
	$PayPalAPISignature = urlencode($fscartconfig['PayPalExpressSignature']);

	$PayPalCurrency = $_SESSION['currencycode'];
	$PayPalReturnURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);
	$PayPalCancelURL = urlencode($CheckoutLink.'/'.$FSSCPages['CheckoutURL']);

	$PayPalEnvironment = '';
	if ($fscartconfig['PayPalExpressEnvironment'] == 'sandbox') {
		$PayPalEnvironment = '.sandbox';
	}

	$PayPalToken = urlencode($_GET["token"]);
	$PayPalPlayerID = urlencode($_GET["PayerID"]);

	$PayPalURLVars = '&TOKEN='.$PayPalToken.'&PAYERID='.$PayPalPlayerID.'&PAYMENTACTION='.urlencode("SALE").'&AMT='.urlencode($_SESSION['finalprice']).'&CURRENCYCODE='.urlencode($PayPalCurrency);

	$PayPalClass = new FSSCPayPalClass();
	$ResponseArray = $PayPalClass->PPHttpPost('DoExpressCheckoutPayment', $PayPalURLVars);

	if (strtoupper($ResponseArray["ACK"]) == "SUCCESS" || strtoupper($ResponseArray["ACK"]) == "SUCCESSWITHWARNING") {
		return 'SUCCESS';
	} else {
		return $ResponseArray["L_LONGMESSAGE0"];
		// return '<pre>'.print_r($ResponseArray).'</pre>';
	}
}

?>
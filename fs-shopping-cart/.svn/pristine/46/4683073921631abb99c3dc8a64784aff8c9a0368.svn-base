<?php
//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

$CheckoutHeadingsStyle = ''; if (function_exists(fssc_text_styling)) { $CheckoutHeadingsStyle = fssc_text_styling($fscartstyle['CheckoutHeadingSize'], $fscartstyle['CheckoutHeadingColor']); }
$CheckoutButtonStyle = ' style=""'; if (function_exists(fssc_button_styling)) { $CheckoutButtonStyle = fssc_button_styling($fscartstyle, 'checkout'); }

if (isset($_SESSION['CheckoutComplete'])) { 
	$PageStatus = $_SESSION['CheckoutComplete'];
	session_destroy();
} elseif(!isset($PageStatus)) {
	$PageStatus = '';
}

$CurrencyCode = $wpdb->get_var("SELECT currency_name FROM ".$wpdb->prefix."fssc_currencies WHERE currency_id = ".$_SESSION['currency']);
$_SESSION['currencycode'] = $CurrencyCode;
	
// CHECK FOR PRODUCTS IN CART
if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY products_price") == 0) {
	$PageStatus = 'There are no products in your shopping cart.';
}

if (!isset($_POST['customer_first_name'])) {
	if ($user_ID != 0 && $user_ID != -1) {
		$UserInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."users WHERE ID = ".$user_ID);		
		if ($fscartconfig['PaymentEnableCreditCard'] == 1) { $_POST['payment-method'] = "payment-creditcard"; } else { $_POST['payment-method'] = "asdf"; }
		$_POST['customer_first_name'] = $UserInfo->first_name;
		$_POST['customer_last_name'] = $UserInfo->last_name;
		$_POST['customer_company'] = $UserInfo->company_name;
		$_POST['customer_taxid'] = $UserInfo->company_tax_id;
		$_POST['customer_address1'] = $UserInfo->address;
		$_POST['customer_city'] = $UserInfo->city;
		$_POST['customer_country'] = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_name = '".$UserInfo->country."'");
		$_POST['customer_province'] = $UserInfo->stateprov;
		$_POST['customer_zip'] = $UserInfo->zippostal;
		$_POST['customer_phone'] = $UserInfo->phone_number;
		$_POST['customer_email'] = $UserInfo->user_email;
		$_POST['customer_website'] = $UserInfo->user_url;
		$_POST['order_shipping_address'] = $UserInfo->order_shipping_address;
		$_POST['customer_ship_first_name'] = $UserInfo->sfirst_name;
		$_POST['customer_ship_last_name'] = $UserInfo->slast_name;
		$_POST['customer_ship_company'] = $UserInfo->scompany;
		$_POST['customer_ship_address1'] = $UserInfo->saddress;
		$_POST['customer_ship_city'] = $UserInfo->scity;
		$_POST['customer_ship_country'] = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_name = '".$UserInfo->scountry."'");
		$_POST['customer_ship_stateprov'] = $UserInfo->sstateprov;
		$_POST['customer_ship_zippostal'] = $UserInfo->szippostal;
		$_POST['customer_ship_phone'] = $UserInfo->sphone;
		$_POST['customer_resalecert'] = $UserInfo->resalecert;
	} else {
		if ($fscartconfig['PaymentEnableCreditCard'] == 1) { $_POST['payment-method'] = "payment-creditcard"; } else { $_POST['payment-method'] = ""; }
		$_POST['customer_first_name'] = "";
		$_POST['customer_last_name'] = "";
		$_POST['customer_company'] = "";
		$_POST['customer_address1'] = "";
		$_POST['customer_address2'] = "";
		$_POST['customer_city'] = "";
		$_POST['customer_country'] = $fscartconfig['DefaultCountry'];
		$_POST['customer_province'] = "";
		$_POST['customer_zip'] = $_SESSION['customer_zippostal'];
		$_POST['customer_phone'] = "";
		$_POST['customer_email'] = "";
		$_POST['customer_taxid'] = "";
		$_POST['customer_resalecert'] = "";
		$_POST['order_shipping_address'] = 'my-billing-address';
		$_POST['customer_ship_name'] = "";
		$_POST['customer_ship_company'] = "";
		$_POST['customer_ship_address1'] = "";
		$_POST['customer_ship_address2'] = "";
		$_POST['customer_ship_city'] = "";
		$_POST['customer_ship_country'] =  $fscartconfig['DefaultCountry'];
		$_POST['customer_ship_stateprov'] = "";
		$_POST['customer_ship_zippostal'] = $_SESSION['shipping_zippostal'];
		$_POST['customer_ship_phone'] = "";
		$_POST['additional_comments'] = "";
		$_POST['cardnumber'] = "";
		$_POST['name_on_card'] = "";
		$_POST['cardexpm'] = "";
		$_POST['cardexpy'] = "";
		$_POST['cvdvalue'] = "";
	}
}

$page_content = '<div id="fs-view-cart">';
$page_content .= '<a href="'.get_bloginfo('home').'/'.$FSSCPages['ViewCartURL'].'/">Go Back</a><br /><br />';

if ($_SESSION['order_error'] != '') {
	$page_content .= '<p style="color: red;">'.$_SESSION['order_error'].'</p>';
	unset($_SESSION['order_error']);
}
if ($PageStatus != '') {
	$page_content .= $PageStatus;
} else {
	if ($fscartconfig['EnableSSL'] == 1) {
		$CheckoutLink = str_replace("http://", "https://", get_option('home'));
	} else {
		$CheckoutLink = get_option('home');
	}
	$PLFCountry = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE currency_code = '".$CurrencyCode."'");
	$HTTPCall = 'http'; if ($fscartconfig['EnableSSL'] == 1) { $HTTPCall = 'https'; }
	$page_content .= '<div id="fssc-checkout"><form name="fsscpaymentform" method="POST" action="'.$CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/">



	<div style="float: left; width: 49%;">
	<h1 '.$CheckoutHeadingsStyle.'>1. Billing Address</h1>
	<div class="fssc-checkout-input">'.fssc_form_input("First Name*", "customer_first_name", $_POST['customer_first_name'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Last Name*", "customer_last_name", $_POST['customer_last_name'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Company", "customer_company", $_POST['customer_company'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Address*", "customer_address1", $_POST['customer_address1'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Apt./Suite", "customer_address2", $_POST['customer_address2'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("City*", "customer_city", $_POST['customer_city'], "15").'</div>
	<div class="fssc-checkout-input"><label for="customer_country">Country*</label><select id="customer_country" name="customer_country" onchange="getFSSClist(this, \'customer_province\', \'CountryID\', \'\', \''.$HTTPCall.'\');">';
					if ($fscartconfig['CountryLock'] == 1) {
						$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 AND country_id = ".$fscartconfig['DefaultCountry']);
					} else {
						$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1");
					}
					foreach ($FSSCCountries as $FSSCCountries) {
						$selected = '';
						if (isset($_POST['customer_country'])) {
							if ($_POST['customer_country'] == $FSSCCountries->country_id) {
								$selected = ' selected';
							}
						}
						$page_content .= '<option value="'.$FSSCCountries->country_id.'"'.$selected.'>'.$FSSCCountries->country_name.'</option>';
					}
					$page_content .= '</select></div>
	<div class="fssc-checkout-input"><label for="customer_province">State/Prov.*</label><select id="customer_province" name="customer_province" onchange="getFSSClist(this, \'\', \'ProvinceID\', \'\', \''.$HTTPCall.'\')"><option value="">Loading...</option></select></div>
	<div class="fssc-checkout-input">'.fssc_form_input("Zip/Postal*", "customer_zip", $_POST['customer_zip'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Phone*", "customer_phone", $_POST['customer_phone'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Email*", "customer_email", $_POST['customer_email'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Website", "customer_website", $_POST['customer_website'], "15").'</div>';
	if ($fscartconfig['RequireTaxId'] != "Hide") { $page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Company Tax ID", "customer_taxid", $_POST['customer_taxid'], "15").'</div>'; }
	if ($fscartconfig['RequireResaleCertificate'] != "Hide") { $page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Resale Certificate", "customer_resalecert", $_POST['customer_resalecert'], "15").'</div>'; }
	$page_content .='</div>
	
	
	
	<div style="float: left; width: 49%;">
	<h1 '.$CheckoutHeadingsStyle.'>2. Shipping Address</h1>
	<div class="fssc-checkout-input"><label for="order_shipping_address">Ship To</label>';
	$order_shipping_address_sel1 = "selected";
	$order_shipping_address_sel2 = "";
	if ($_POST['order_shipping_address'] == 'different-address') {
		$order_shipping_address_sel1 = "";
		$order_shipping_address_sel2 = "selected";
	}
	$page_content .= '<select name="order_shipping_address" onchange="document.getElementById(\'shipping-address\').className=this.value;">
	<option value="my-billing-address" '.$order_shipping_address_sel1.'>My Billing Address</option>
	<option value="different-address" '.$order_shipping_address_sel2.'>A Different Address</option>
	</select></div>
	<div id="shipping-address">
	<div class="fssc-checkout-input">'.fssc_form_input("First Name*", "customer_ship_first_name", $_POST['customer_ship_first_name'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Last Name*", "customer_ship_last_name", $_POST['customer_ship_last_name'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Company", "customer_ship_company", $_POST['customer_ship_company'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Address*", "customer_ship_address1", $_POST['customer_ship_address1'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Apt./Suite", "customer_ship_address2", $_POST['customer_ship_address2'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("City*", "customer_ship_city", $_POST['customer_ship_city'], "15").'</div>
	<div class="fssc-checkout-input"><label for="customer_ship_country">Country*</label><select name="customer_ship_country" onchange="getFSSClist(this, \'customer_ship_stateprov\', \'CountryID\', \'\', \''.$HTTPCall.'\');">';
	if ($fscartconfig['CountryLock'] == 1) {
		$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 AND country_id = ".$fscartconfig['DefaultCountry']);
	} else {
		$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1");
	}
	foreach ($FSSCCountries as $FSSCCountries) {
		$selected = '';
		if (isset($_POST['customer_ship_country'])) {
			if ($_POST['customer_ship_country'] == $FSSCCountries->country_id) {
				$selected = ' selected';
			}
		}
		$page_content .= '<option value="'.$FSSCCountries->country_id.'"'.$selected.'>'.$FSSCCountries->country_name.'</option>';
	}
	$page_content .= '</select></div>
	<div class="fssc-checkout-input"><label for="customer_ship_province">State/Prov.*</label><select id="customer_ship_stateprov" name="customer_ship_stateprov"><option value="">Loading...</option></select></div>
	<div class="fssc-checkout-input">'.fssc_form_input("Zip/Postal*", "customer_ship_zip", $_POST['customer_ship_zip'], "15").'</div>
	<div class="fssc-checkout-input">'.fssc_form_input("Phone*", "customer_ship_phone", $_POST['customer_ship_phone'], "15").'</div>';
	if ($_POST['order_shipping_address'] == 'different-address') {
		$page_content .= '<SCRIPT TYPE="text/javascript">
		<!--
		document.getElementById(\'shipping-address\').className=\'different-address\';
		//-->
		</SCRIPT>';
	} else {
		$page_content .= '<SCRIPT TYPE="text/javascript">
		<!--
		document.getElementById(\'shipping-address\').className=\'hide\';
		//-->
		</SCRIPT>';
	}
	$page_content .= '</div>
	</div>
	<div style="clear: both;"></div><br /><br />';
	
	

	$PaymentOptionCount = 0;
	$PaymentOptions = '';
	if ($current_user->user_level == 10) {
		$PaymentOptions .= '<option value="payment-admintest"'; if ($_POST['payment-method'] == 'payment-admintest') { $PaymentOptions .= ' selected'; } $PaymentOptions .= '>Admin Test Order</option>';
		$PaymentOptionCount++;
	}
	if ($fscartconfig['PaymentEnableCreditCard'] == 1) {
		$PaymentOptions .= '<option value="payment-creditcard"'; if ($_POST['payment-method'] == 'payment-creditcard') { $PaymentOptions .= ' selected'; } $PaymentOptions .= '>Credit Card</option>';
		$PaymentOptionCount++;
	}
	if ($fscartconfig['PaymentEnablePayPal'] == 1) {
		$PaymentOptions .= '<option value="payment-paypal"'; if ($_POST['payment-method'] == 'payment-paypal') { $PaymentOptions .= ' selected'; } $PaymentOptions .= '>PayPal</option>';
		$PaymentOptionCount++;
	}
	if ($fscartconfig['PaymentEnableGoogleCheckout'] == 1) {
		$PaymentOptions .= '<option value="payment-google"'; if ($_POST['payment-method'] == 'payment-google') { $PaymentOptions .= ' selected'; } $PaymentOptions .= '>Google Checkout</option>';
		$PaymentOptionCount++;
	}
	if ($fscartconfig['PaymentEnableEmailOrder'] == 1) {
		$PaymentOptions .= '<option value="payment-email"'; if ($_POST['payment-method'] == 'payment-email') { $PaymentOptions .= ' selected'; } $PaymentOptions .= '>Email Order</option>';
		$PaymentOptionCount++;
	}
	


	$page_content .= '<div style="float: left; width: 49%;">';
	if ($PaymentOptionCount >= 1) {
		$page_content .= '<h1 '.$CheckoutHeadingsStyle.'>3. Payment Information</h1>';
		$page_content .= '<div class="fssc-checkout-input"><label for="payment-method">Payment Method</label><select name="payment-method" onchange="if (this.value != \'payment-creditcard\') { document.getElementById(\'fssc_checkout_ccbox\').className=\'hide\'; } else { document.getElementById(\'fssc_checkout_ccbox\').className=\'\'; } ">'.$PaymentOptions.'</select></div>';
	}
	$page_content .='<div id="fssc_checkout_ccbox">';
	if ($fscartconfig['PaymentEnableCreditCard'] == 1) {
		if ($fscartconfig['SupportedCreditCards'] != '') {
			$page_content .= '<div class="fssc-checkout-input"><label for="supported-cards">Supported Card Types</label>'.$fscartconfig['SupportedCreditCards'].'</div>';
		}
		$page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Credit Card Number", "cardnumber", $_POST['cardnumber'], "15").'</div>';
		$page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Name on Card", "name_on_card", $_POST['name_on_card'], "15").'</div>';
		$page_content .= '<div class="fssc-checkout-input"><label for="cardexpm">Expiry Date</label><select name="cardexpm" style="width: 75px">';
		$expiry_months = array(
		"01" => "01 (Jan)",
		"02" => "02 (Feb)",
		"03" => "03 (Mar)",
		"04" => "04 (Apr)",
		"05" => "05 (May)",
		"06" => "06 (Jun)",
		"07" => "07 (Jul)",
		"08" => "08 (Aug)",
		"09" => "09 (Sep)",
		"10" => "10 (Oct)",
		"11" => "11 (Nov)",
		"12" => "12 (Dec)"
		);
		foreach ($expiry_months as $key => $value) {
			$page_content .= fssc_print_select_box($_POST['cardexpm'], $key, $value);
		}
		$page_content .= '</select>
		<select name="cardexpy" style="width: 75px">';
		for ($i=date("Y");$i<=date("Y")+10;$i++) {
			$page_content .= fssc_print_select_box($_POST['cardexpy'], substr($i, -2), $i);
		}
		$page_content .= '</select></div>';
		$page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Security Code", "cvdvalue", $_POST['cvdvalue'], "15").'</div>';
	}
	$page_content .= '</div></div>	



	<div style="float: left; width: 49%;">
	<h1 '.$CheckoutHeadingsStyle.'>4. Special Instructions</h1>
	<textarea name="additional_comments" rows="11" style="width: 98%;">'; if (isset($_POST['additional_comments'])) { $page_content .= $_POST['additional_comments']; } $page_content .= '</textarea>
	</div>
	<div style="clear: both;"></div><br /><br />';
	
	
	
	$page_content .= '<div style="float: left; width: 49%;">
	<h1 '.$CheckoutHeadingsStyle.'>Order Details</h1>';
								$CartProducts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."'");
								$total = 0;
								$count = 0;
								if (count($CartProducts) > 0) {
									$UserTypeID = '-2';
									if ($user_ID) {
										if (function_exists(fssc_get_user_type)) { $UserTypeID = fssc_get_user_type($user_ID); }	
									}
									$AllProductPromo = FALSE;
									if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = 0 AND user_type_id = ".$UserTypeID) > 0) {
										$AllProductPromo = TRUE;
										$AllProductPromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id =0 AND user_type_id = ".$UserTypeID);
										$AllProductPromoTotal = $AllProductPromoDetails->products_count;
									}
									foreach ($CartProducts as $CartProducts) {
										$count++;
										$subtotal = $CartProducts->products_quantity * $CartProducts->products_price;
										if ($CartProducts->coupon_id != 0) {
											$total = $total - $subtotal; // COUPON DISCOUNT
										} else {
											$total = $total + $subtotal;
										}			
	
										// CHECK FOR PROMOTIONS
										if ($AllProductPromo == TRUE) {
											$AllProductPromoTotal = $AllProductPromoTotal - $CartProducts->products_quantity;
											if ($AllProductPromoTotal <= 0) {
												if ($AllProductPromoDetails->discount_type == 'Fixed') {
													$total = $total - $AllProductPromoDetails->discount_value;
												} else {
													$SubtotalChange = $AllProductPromoDetails->discount_value / 100;
													$presubtotal = $CartProducts->products_price * $SubtotalChange;
													$total = $total - $presubtotal;
												}
												$AllProductPromo = FALSE;
											}
										} elseif ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$CartProducts->products_id." AND user_type_id = ".$UserTypeID) > 0) {
											$PromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$CartProducts->products_id." AND user_type_id = ".$UserTypeID);
											if ($CartProducts->products_quantity >= $PromoDetails->products_count) {
												if ($PromoDetails->discount_type == 'Fixed') {
													$total = $total - $PromoDetails->discount_value;
												} else {
													$SubtotalChange = $PromoDetails->discount_value / 100;
													$presubtotal = $CartProducts->products_price * $SubtotalChange;
													$total = $total - $presubtotal;
												}
											}
										}
	
	
	
									}
									if (!$user_ID && $total >= $fscartconfig['OrderSubTotalDecreaseMinOrder'] && $fscartconfig['OrderSubTotalDecreaseValue'] != 0 && $fscartconfig['OrderSubTotalDecreaseValue'] != '0.00' && $fscartconfig['OrderSubTotalDecreaseValue'] != '') {
										if ($fscartconfig['OrderSubTotalDecreaseType'] == 'Fixed') {
											$total = $total - $fscartconfig['OrderSubTotalDecreaseValue'];
										} else {
											$CostChange = 100 - $fscartconfig['OrderSubTotalDecreaseValue'];
											$CostChange = $CostChange / 100;
											$total = $total * $CostChange;
											$total = fssc_currency_format($total);
										}
									}
	
	
	
	
									$_SESSION['subtotal'] = $total;
									$page_content .= '<div class="fssc-checkout-details"><label for="subtotal">Subtotal</label>'.$_SESSION['currency_symbol'].fssc_currency_format($_SESSION['subtotal']).' '.$CurrencyCode.'</div>';
									if ($_SESSION['shipping'] == 0.00) {
										$ShippingStyle = 'Free';
									} else {
										$ShippingStyle = $_SESSION['currency_symbol'].fssc_currency_format($_SESSION['shipping']).' '.$CurrencyCode;
									}
									$page_content .= '<div class="fssc-checkout-details"><label for="shipping">Shipping</label>'.$ShippingStyle.'</div>';
									
									$page_content .= '<div id="fssccheckouttaxes"></div>';
									
									$_SESSION['finalprice'] = $_SESSION['subtotal'] + $_SESSION['shipping'];
									$page_content .= '<div class="fssc-checkout-details"><label for="finalprice">Final Price</label><span id="fssccheckoutfinalprice">'.$_SESSION['currency_symbol'].fssc_currency_format($_SESSION['finalprice']).' '.$CurrencyCode.'</span></div>';
									
									if ($_POST['payment-method'] != "payment-creditcard") { $page_content .= '<SCRIPT TYPE="text/javascript"> document.getElementById(\'fssc_checkout_ccbox\').className=\'hide\';	</SCRIPT>'; } 
									$page_content .= '<SCRIPT TYPE="text/javascript"> document.getElementById(\'fssccheckouttaxes\').className=\'css-hide\';	</SCRIPT>'; 
									$page_content .= '<script type="text/javascript"> 
																			function preloadForm() {';
																			$JavaScripRun = 'getFSSClist(\''.$_SESSION['fssccountry'].'\', \'customer_province\', \'CountryID\', \'\', \''.$HTTPCall.'\'); ';
																			if (isset($_POST['customer_country'])) {
																				if ($_POST['customer_country'] != '') {
																					$CountryID = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_country']."'");
																					$JavaScripRun = 'getFSSClist(\''.$CountryID.'\', \'customer_province\', \'CountryID\', \''.$_POST['customer_province'].'\', \''.$HTTPCall.'\'); '. "\n";
																					$JavaScripRun .= 'getFSSClist(\''.$_POST['customer_province'].'\', \'\', \'ProvinceID\', \'\', \''.$HTTPCall.'\'); '. "\n";
																				}
																			}
																			$page_content .= $JavaScripRun;
																			$JavaScripRun = 'getFSSClist(\''.$_SESSION['fssccountry'].'\', \'customer_ship_stateprov\', \'CountryID\', \'\', \''.$HTTPCall.'\'); ';
																			if (isset($_POST['customer_ship_country'])) {
																				if ($_POST['customer_ship_country'] != '') {
																					$CountryID = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_ship_country']."'");
																					$JavaScripRun = 'getFSSClist(\''.$CountryID.'\', \'customer_ship_stateprov\', \'CountryID\', \''.$_POST['customer_ship_stateprov'].'\', \''.$HTTPCall.'\'); '. "\n";
																				}
																			}
																			$page_content .= $JavaScripRun;
																			$page_content .= '}
																			window.onload = preloadForm;
																		</script>';
	
								}
						$page_content .= '</div>';
		
	
	
	$page_content .= '<div style="float: left; width: 49%;">
	<h1 '.$CheckoutHeadingsStyle.'>Products</h1>';
	$CartProducts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY basket_id");
	$CartProductsCount = count($CartProducts);
	if ($CartProductsCount > 0) {
		foreach ($CartProducts as $CartProducts) {
			if ($CartProducts->products_id != 0) {
				$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$CartProducts->products_id);
				$page_content .= $CartProducts->products_quantity. ' x '.$ProductDetails->products_name.'<br />';
			}
		}
	}
	$page_content .= '</div><div style="clear: both;"></div><br /><br />';
	

	if ($fscartconfig['EnableSSL'] == 1) {
		$CheckoutLink = str_replace("http://", "https://", get_option('home'));
	} else {
		$CheckoutLink = get_option('home');
	}
	if ($fscartstyle['CustomCompleteOrderButton'] != '') {
		$page_content .= '<div align="center"><input type="image" src="'.$fscartstyle['CustomCompleteOrderButton'].'" name="submit" value="submit" alt="submit">';
	} else {
		$page_content .= '<div align="center"><input type="submit" name="submit" value="'.$fscartconfig['CheckoutButtonText'].'" class="fsscgradient fsscbutton" '.$CheckoutButtonStyle.'>';
	}

	if ($fscartconfig['EnableSSL'] == 1) {
		$page_content .= '	<p><br /><img src="'.$CheckoutLink.'/wp-content/plugins/fs-shopping-cart/images/lock.gif"></p>';
	}
	$page_content .= '</div>';
	$page_content .= '</form></div>';
}
$page_content .= '</div>';
echo $page_content;

?>
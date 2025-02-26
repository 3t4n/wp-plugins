<?php
global $post,$_SESSION,$fscartconfig;

//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

if ($fscartconfig['PurchaseRequiresLogin'] == 1 && $user_ID == 0) {
	echo 'Please login to add products to your shopping cart.';
}

$CheckoutButtonStyle = ' style=""'; if (function_exists(fssc_button_styling)) { $CheckoutButtonStyle = fssc_button_styling($fscartstyle, 'vccheckout'); }
$ShopButtonStyle = ' style=""'; if (function_exists(fssc_button_styling)) { $ShopButtonStyle = fssc_button_styling($fscartstyle, 'vcshop'); }

$CurrencyCode = $wpdb->get_var("SELECT currency_name FROM ".$wpdb->prefix."fssc_currencies WHERE currency_id = ".$_SESSION['currency']);
$_SESSION['currencycode'] = $CurrencyCode;
$CouponStatus = '&nbsp;';

if(isset($_GET['zpunset'])) {
	unset($_SESSION['customer_zippostal']);
	unset($_SESSION['shipping']);
	unset($_SESSION['shippingservicename']);
	unset($_POST['fssc-cust-zippostal']);
}

if (!isset($_SESSION['shipping'])) {
	if ($fscartconfig['ShippingType'] == 'UPS') {
		$_SESSION['shipping'] = 'UPS';
	} elseif ($fscartconfig['ShippingType'] == 'FedEx') {
		$_SESSION['shipping'] = 'FedEx';
	} else {
		$_SESSION['shipping'] = $fscartconfig['ShippingFixedRate'];
	}
}

if (isset($_POST['finder-submit'])) {
	if (function_exists('fssc_finder_cart_submit')) { fssc_finder_cart_submit(); }
}

// CHECK FOR COUPON CODES
if (isset($_POST['couponsubmit'])) { 
	$UserType = '-2';
	if (function_exists(fssc_get_user_type)) { $UserType = fssc_get_user_type($user_ID); }			
	$CouponCode = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_coupons WHERE coupon_code = '".$_POST['couponcode']."' AND user_type_id = ".$UserType);
	if (count($CouponCode) == 0) { 
		$CouponStatus = '<span style="color: red">Invalid Coupon Code.</span>'; 
	} else {
		$CouponCheck = $wpdb->get_var("SELECT COUNT(users_id) FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' AND coupon_id != 0");
		if ($CouponCheck > 0) {
			$CouponStatus = '<span style="color: red">Cannot Combine Coupon Codes.</span>';
		} else {
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_users_basket (users_id, users_code, products_id, products_quantity, products_price, last_updated, fixed_quantity, coupon_id) 
										VALUES (0, '".$_SESSION['users_code']."', 0, 1, '".$CouponCode->coupon_value."', NOW(), 1, '".$CouponCode->coupon_id."')");		
		}
	}
}

// CHECK FOR PRODUCT QUANTITY UPDATES
if (isset($_POST['update-qty'])) {
	
	$CartInfo = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY parent_basket_id");
	foreach ($CartInfo as $CartInfo) {
		if ($_POST[$CartInfo->basket_id.'-qty'] == 0) {
			fssc_remove_from_cart($CartInfo->basket_id);
		} else {
			$UpdateQuantity = TRUE;
			if ($CartInfo->parent_basket_id != 0) {
				if (function_exists(fssc_auto_accessory_update)) { $_POST[$CartInfo->basket_id.'-qty'] = fssc_auto_accessory_update($CartInfo, $_POST); }
			}
			if ($UpdateQuantity == TRUE) {
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_users_basket SET products_quantity = '".$_POST[$CartInfo->basket_id.'-qty']."' WHERE basket_id = ".$CartInfo->basket_id);
			}
		}
	}
	if (isset($_SESSION['customer_zippostal'])) {
		$_POST['fssc-cust-zippostal'] = $_SESSION['customer_zippostal'];
	}
}

if (isset($_POST['ups-zip']) && $fscartconfig['ShippingType'] == 'UPS') {
	if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/ups/ups.php')) { require_once(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/ups/ups.php'); }
}

if ($fscartconfig['ShippingType'] == 'FedEx') {
	if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/fedex/fedex.php')) { require_once(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/fedex/fedex.php'); fssc_fedex_get_options($_POST); }
}

	$page_content .= '<div id="fs-view-cart">';
	$sampler = TRUE;
	$ProductCount = 0;
	
	
	$REMPadding = floor($fscartconfig['MaxThumbnailSize'] / 2);
	$REMPadding = $REMPadding - 8;
	
	$UserBasket = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY basket_id");
	$_SESSION['total_weight'] = 0;
	$BasketCount = count($UserBasket);
	if (count($UserBasket) > 0) {
		$page_content .= '<form name="shopping-cart" action="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/" method="POST">';
		
		$page_content .= '<div class="vc-rem">&nbsp;</div>';
		$page_content .= '<div class="vc-description">&nbsp;</div>';
		$page_content .= '<div class="vc-price"><strong>Price</strong></div>';
		$page_content .= '<div class="vc-total"><strong>Total</strong></div>';
		$page_content .= '<div style="clear: both;"></div>';
		
		
		
		$UserTypeID = '-2';
		$CouponDiscount = 0;
		if ($user_ID) {
			if (function_exists(fssc_get_user_type)) { $UserTypeID = fssc_get_user_type($user_ID); }			
		}
		$AllProductPromo = FALSE;
		if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = 0 AND user_type_id = ".$UserTypeID) > 0) {
			$AllProductPromo = TRUE;
			$AllProductPromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id =0 AND user_type_id = ".$UserTypeID);
			$AllProductPromoTotal = $AllProductPromoDetails->products_count;
		}
		$FreeProductShipping = TRUE;
		$ExtraProductShipping = 0;
		foreach ($UserBasket as $UserBasket) {
			if ($UserBasket->coupon_id != 0) {
				$CouponCode = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_coupons WHERE coupon_id = '".$UserBasket->coupon_id."'");
				$page_content .= '<div class="vc-rem"><a href="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=del&id='.$UserBasket->basket_id.'" style="display: block; padding-top: 3px;"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0"></a></div>';
				$page_content .= '<div class="vc-description">Coupon Code: '.$CouponCode->coupon_code.' ('.$_SESSION['currency_symbol'].$UserBasket->products_price.' Off)</div>';
				$page_content .= '<div class="vc-price">- '.$_SESSION['currency_symbol'].$UserBasket->products_price.'</div>';
				$page_content .= '<div class="vc-total">- '.$_SESSION['currency_symbol'].$UserBasket->products_price.'</div>';
				$CouponDiscount = $CouponDiscount + $UserBasket->products_price;
			} else {
				if ($UserBasket->products_id != 0) {
					$ProductInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$UserBasket->products_id);
					if ($ProductInfo->products_free_shipping == 0) { $FreeProductShipping = FALSE; }
					$ExtraProductShipping = $ExtraProductShipping + $ProductInfo->products_extra_shipping;
					$ProductCount = $ProductCount + $UserBasket->products_quantity;
					$subtotal = $UserBasket->products_quantity * $UserBasket->products_price;			
					$page_content .= '<div class="vc-rem" style="padding: '.$REMPadding.'px 0;"><a href="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=del&id='.$UserBasket->basket_id.'" onClick="pageTracker._trackEvent(\'User Basket\', \'Add to Cart\', \''.addslashes($ProductInfo->products_part_number).'\');"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0"></a></div>';
					$page_content .= '<div class="vc-description" style="height: '.$fscartconfig['MaxThumbnailSize'].'px;">';
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$UserBasket->products_id.'.jpg')) {
						if ($ProductInfo->products_show_details == 1) {
							$page_content .= '<div class="vc-image" style="width: '.$fscartconfig['MaxThumbnailSize'].'px; height: '.$fscartconfig['MaxThumbnailSize'].'px;"><a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$ProductInfo->products_url.'/"><img src="'.get_option('home').'/wp-content/uploads/fscart/products/small/'.$UserBasket->products_id.'.jpg" border="0" alt=""></a></div>';
						}
					}
					$num_of_products = $num_of_products + $UserBasket->products_quantity;
					if ($ProductInfo->products_show_details == 1) {
						$page_content .= '<strong><a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$ProductInfo->products_url.'/">'.$ProductInfo->products_name.'</a></strong><br /><br />';
					} else {
						$page_content .= '<strong>'.$ProductInfo->products_name.'</strong><br /><br />';
					}
					$page_content .= $fscartconfig['ProductIdentification'].': '.$ProductInfo->products_part_number.'<br />';
					if ($UserBasket->variation_id != 0) {
						$VariationName = $wpdb->get_var("SELECT variation_name FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = ".$UserBasket->variation_id);
						$page_content .= 'Variation: '.$VariationName.'<br />';
					}
				}
				$page_content .= '</div>';
				
				$subtotal2 = $UserBasket->products_quantity * $UserBasket->products_price;
				
				// CHECK FOR PROMOTIONS
				if ($AllProductPromo == TRUE) {
					$AllProductPromoTotal = $AllProductPromoTotal - $UserBasket->products_quantity;
					if ($AllProductPromoTotal <= 0) {
						if ($AllProductPromoDetails->discount_type == 'Fixed') {
							$subtotal = $subtotal - $AllProductPromoDetails->discount_value;
						} else {
							$SubtotalChange = $AllProductPromoDetails->discount_value / 100;
							$presubtotal = $UserBasket->products_price * $SubtotalChange;
							$subtotal = $subtotal - $presubtotal;
						}
						$AllProductPromo = FALSE;
					}
				} elseif ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$UserBasket->products_id." AND user_type_id = ".$UserTypeID) > 0) {
					$PromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$UserBasket->products_id." AND user_type_id = ".$UserTypeID);
					if ($UserBasket->products_quantity >= $PromoDetails->products_count) {
						if ($PromoDetails->discount_type == 'Fixed') {
							$subtotal = $subtotal - $PromoDetails->discount_value;
						} else {
							$SubtotalChange = $PromoDetails->discount_value / 100;
							$presubtotal = $UserBasket->products_price * $SubtotalChange;
							$subtotal = $subtotal - $presubtotal;
						}
					}
				}		
				
				$total = $total + $subtotal;
				$page_content .= '<div class="vc-price" style="height: '.$fscartconfig['MaxThumbnailSize'].'px;">';
				if ($UserBasket->products_price_option != '') {
					$page_content .= fssc_currency_format($UserBasket->products_price_option).'<br />';
				}
				$page_content .= ''.$_SESSION['currency_symbol'].fssc_currency_format($UserBasket->products_price).'<br />';
				$qtydisable = '';
				if ($UserBasket->fixed_quantity == 1) {
					$page_content .= $UserBasket->products_quantity.'QTY <input type="hidden" name="'.$UserBasket->basket_id.'-qty" value="'.$UserBasket->products_quantity.'" size="2">';
				} else {
					$page_content .= 'QTY <input type="text" name="'.$UserBasket->basket_id.'-qty" value="'.$UserBasket->products_quantity.'" size="2">';
				}
				$page_content .= '</div>';
				$page_content .= '<div class="vc-total" style="height: '.$fscartconfig['MaxThumbnailSize'].'px;">';
				if ($subtotal != $subtotal2) {
					// DISCOUNT PRICE - SHOW WHAT THEY SAVED
					$page_content .= "<strike>".$_SESSION['currency_symbol'].fssc_currency_format($subtotal2)."</strike><br />".$_SESSION['currency_symbol'].fssc_currency_format($subtotal);
				} else {
					$page_content .= $_SESSION['currency_symbol'].fssc_currency_format($subtotal);
				}
				$page_content .= '</div>';
			}
		}
		$page_content .= '<div style="clear: both;"></div>';
		
		// FIGURE OUT SHIPPING
		if ($fscartconfig['ShippingType'] == 'UPS') {
			// DO NOTHING
		} elseif ($fscartconfig['ShippingType'] == 'FedEx') {
			// DO NOTHING
		} else {
			if ($fscartconfig['ShippingType'] == 'Fixed') {
				if ($FreeProductShipping == TRUE) {
					$_SESSION['shipping'] = 0.00;			
				} else {
					$_SESSION['shipping'] = $fscartconfig['ShippingFixedRate'];			
					$_SESSION['shipping'] = $_SESSION['shipping'] + $ExtraProductShipping;
				}
			} elseif ($fscartconfig['ShippingType'] == 'Percentage') {
				if ($FreeProductShipping == TRUE) {
					$_SESSION['shipping'] = 0.00;			
				} else {
					$ShippingPercentage = $fscartconfig['ShippingPercentageRate'];
					$ShippingPercentage = $ShippingPercentage / 100;
					$_SESSION['shipping'] = $total * $ShippingPercentage;
					$_SESSION['shipping'] = $_SESSION['shipping'] + $ExtraProductShipping;
				}
			} elseif ($fscartconfig['ShippingType'] == 'Fixed Table') {
				if ($FreeProductShipping == TRUE) {
					$_SESSION['shipping'] = 0.00;			
				} else {
					$_SESSION['shipping'] = $wpdb->get_var("SELECT shipping_cost_cost FROM wp_fssc_shipping_costs WHERE $total >= shipping_cost_range1 AND $total <= shipping_cost_range2");
					$_SESSION['shipping'] = $_SESSION['shipping'] + $ExtraProductShipping;
				}
			} elseif ($fscartconfig['ShippingType'] == 'Percentage Table') {
				if ($FreeProductShipping == TRUE) {
					$_SESSION['shipping'] = 0.00;			
				} else {
					$ShippingPercentage = $wpdb->get_var("SELECT shipping_cost_cost FROM wp_fssc_shipping_costs WHERE $total >= shipping_cost_range1 AND $total <= shipping_cost_range2");
					$ShippingPercentage = $ShippingPercentage / 100;
					$_SESSION['shipping'] = $total * $ShippingPercentage;
					$_SESSION['shipping'] = $_SESSION['shipping'] + $ExtraProductShipping;
				}
			}
			$_SESSION['shipping'] = $_SESSION['shipping'];
		}
		
		if (!$user_ID && $total >= $fscartconfig['OrderSubTotalDecreaseMinOrder'] && $fscartconfig['OrderSubTotalDecreaseValue'] != 0 && $fscartconfig['OrderSubTotalDecreaseValue'] != '0.00' && $fscartconfig['OrderSubTotalDecreaseValue'] != '') {
			if ($fscartconfig['OrderSubTotalDecreaseType'] == 'Fixed') {
				$DiscountType = $_SESSION['currency_symbol'].$fscartconfig['OrderSubTotalDecreaseValue'];
			} else {
				$DiscountType = $fscartconfig['OrderSubTotalDecreaseValue'].'%';
			}
			$page_content .= '<div id="fssc-vc-discount-note">Your order qualifies for a '.$DiscountType.' discount.</div>';
		}
		$page_content .= '<div style="text-align: right; padding: 5px 60px 0 0;"><input type="submit" name="update-qty" value="Update Quantity"></div>';
		$page_content .= '</form>';

		// FIGURE OUT PROMOTIONS
		if (!$user_ID && $total >= $fscartconfig['OrderSubTotalDecreaseMinOrder'] && $fscartconfig['OrderSubTotalDecreaseValue'] != 0 && $fscartconfig['OrderSubTotalDecreaseValue'] != '0.00' && $fscartconfig['OrderSubTotalDecreaseValue'] != '') {
			if ($fscartconfig['OrderSubTotalDecreaseType'] == 'Fixed') {
				$total = $total - $fscartconfig['OrderSubTotalDecreaseValue'];
			} else {
				$CostChange = 100 - $fscartconfig['OrderSubTotalDecreaseValue'];
				$CostChange = $CostChange / 100;
				$total = $total * $CostChange;
			}
		}
		if ($CouponDiscount > 0) {
			$total = $total - $CouponDiscount;
		}
		
		
		$page_content .= '<div style="float: left; width: 300px; margin-top: 18px;"><form id="fssccoupon" name="fssccoupon" method="POST" action="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/">Coupon Code <input type="text" id="couponcode" name="couponcode" value="" size="16"> <input type="submit" name="couponsubmit" value="Add"></form>'.$CouponStatus.'</div>';
		
		$page_content .= '<div style="float: right; width: 350px; margin-top: 18px;">';
		if ($fscartconfig['ShippingType'] == 'FedEx') {
			$page_content .= fssc_fedex_shipping_options();
		} elseif ($fscartconfig['ShippingType'] == 'UPS') {
			$page_content .= fssc_ups_shipping_options();
		} elseif ($_SESSION['shipping'] != 0.00) {
			$page_content .= '<div class="vc-overviewl">'.$_SESSION['currency_symbol'].$_SESSION['shipping'].'</div><div class="vc-overviewr">Shipping</div>';
		}
		if ($_SESSION['taxes'] != 0.00) {
			$page_content .= '<div class="vc-overviewl">'.$_SESSION['currency_symbol'].$_SESSION['taxes'].'</div><div class="vc-overviewr">Taxes</div>';
		}
		$total = $total + $_SESSION['shipping'] + $_SESSION['taxes'];
		$page_content .= '<div class="vc-overviewl">'.$_SESSION['currency_symbol'].fssc_currency_format($total).' '.$CurrencyCode.'</div><div class="vc-overviewr">Total</div>';
		
		$page_content .= '</div><div style="clear: both;"></div>';

		$page_content .= '</form>';
		
		if ($fscartconfig['EnableSSL'] == 1) {
			$CheckoutLink = str_replace("http://", "https://", get_option('home'));
		} else {
			$CheckoutLink = get_option('home');
		}
		
		$page_content .= '<div align="center" style="padding-top: 25px;">';
		if ($fscartstyle['CustomContinueShoppingButon'] != '') {
			$page_content .= '<a href="'.get_option('home').'/"><img src="'.$fscartstyle['CustomContinueShoppingButon'].'" border="0" alt="Continue Shopping"></a> ';
		} else {
			$page_content .= '<a href="'.get_option('home').'/" class="fsscgradient fsscbutton fssclink" '.$ShopButtonStyle.'><span>'.$fscartconfig['ViewCartContinueShoppingText'].'</span></a> ';
		}
		
		if ($user_ID) {
			$UserType = '';
			if (function_exists(fssc_user_type_name)) { $UserType = fssc_user_type_name($user_ID); }	
			if (function_exists(fssc_get_user_type_info)) { $UserTypeInfo = fssc_get_user_type_info($user_ID); } else {$UserTypeInfo->user_type_req_min_order = 0; }			
			if ($UserTypeInfo->user_type_req_min_order != 0 && $UserTypeInfo->user_type_req_min_order > $ProductCount) {
				if ($fscartstyle['CustomCheckoutButton'] != '') {
					$page_content .= '<img src="'.$fscartstyle['CustomCheckoutButton'].'" border="0" alt="Proceed to Secure Checkout" onclick="alert(\'Your order does not meet the minimum order quantity.\');" style="cursor: pointer;">';
				} else {
					$page_content .= '<a href="#" class="fsscgradient fsscbutton fssclink" '.$CheckoutButtonStyle.' onclick="if (document.getElementById(\'fssccustzippostal\').value != \'\') { document.fedexestimate.submit(); } else { alert(\'Your order does not meet the minimum order quantity.\'); }"><span>'.$fscartconfig['ViewCartCheckoutText'].'</span></a> ';
				}
			} elseif ($fscartconfig['ShippingType'] == 'UPS' || $fscartconfig['ShippingType'] == 'FedEx' && !$_SESSION['customer_zippostal']) {
				if ($fscartstyle['CustomCheckoutButton'] != '') {
					$page_content .= '<img src="'.$fscartstyle['CustomCheckoutButton'].'" border="0" alt="Proceed to Secure Checkout" onclick="if (document.getElementById(\'fssccustzippostal\').value != \'\') { document.fedexestimate.submit(); } else { alert(\'Please enter your zip/postal code to calculate shipping.\'); }" style="cursor: pointer;">';
				} else {
					$page_content .= '<a href="#" class="fsscgradient fsscbutton fssclink" '.$CheckoutButtonStyle.' onclick="if (document.getElementById(\'fssccustzippostal\').value != \'\') { document.fedexestimate.submit(); } else { alert(\'Please enter your zip/postal code to calculate shipping.\'); }"><span>'.$fscartconfig['ViewCartCheckoutText'].'</span></a> ';
				}
			} else {
				if ($fscartstyle['CustomCheckoutButton'] != '') {
					$page_content .= '<a href="'.$CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/" id="checkoutbutton"><img src="'.$fscartstyle['CustomCheckoutButton'].'" border="0" alt="Proceed to Secure Checkout"></a>';
				} else {
					$page_content .= '<a href="'.$CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/" class="fsscgradient fsscbutton fssclink" '.$CheckoutButtonStyle.'><span>'.$fscartconfig['ViewCartCheckoutText'].'</span></a> ';
				}
			}
		} else {
			if ($fscartstyle['CustomCheckoutButton'] != '') {
				$page_content .= '<a href="'.$CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/" id="checkoutbutton"><img src="'.$fscartstyle['CustomCheckoutButton'].'" border="0" alt="Proceed to Secure Checkout"></a>';
			} else {
				$page_content .= '<a href="'.$CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/" class="fsscgradient fsscbutton fssclink" '.$CheckoutButtonStyle.'><span>'.$fscartconfig['ViewCartCheckoutText'].'</span></a> ';
			}
		}
		if ($fscartconfig['EnableSSL'] == 1) {
			$page_content .= '	<p><br /><img src="'.$CheckoutLink.'/wp-content/plugins/fs-shopping-cart/images/lock.gif"></p>';
		}
		$page_content .= '</div>';
		
	} else {
		$page_content .= "<p>There are currently no items in your cart.</p>";
	}
	
	$page_content .= '</div>';
	
	echo $page_content;
	

?>




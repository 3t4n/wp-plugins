<?php
/*
Template Name: Horizontal
*/

$ProductNameStyle = ''; if (function_exists(fssc_text_styling)) { $ProductNameStyle = fssc_text_styling($fscartstyle['ProductListingsNameSize'], $fscartstyle['ProductListingsNameColor']); }
$ProductDescStyle = ''; if (function_exists(fssc_text_styling)) { $ProductDescStyle = fssc_text_styling($fscartstyle['ProductListingDescriptionSize'], $fscartstyle['ProductListingDescriptionColor']); }
$ProductPriceStyle = ''; if (function_exists(fssc_text_styling)) { $ProductPriceStyle = fssc_text_styling($fscartstyle['ProductListingPriceSize'], $fscartstyle['ProductListingPriceColor']); }
$BuyButtonStyle = ''; if (function_exists(fssc_buybutton_styling)) { $BuyButtonStyle = fssc_buybutton_styling($fscartstyle, 'listing'); }
$SubTextLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $SubTextLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductListingDescLinkColor'); }

// PRINT PRODUCTS
foreach ($products as $products) {
	$ProductToCountry = TRUE;
	$CountryProductCheck = $wpdb->get_var("SELECT COUNT(products_id) FROM ".$wpdb->prefix."fssc_products_to_countries WHERE products_id = ".$products->products_id);
	if ($CountryProductCheck > 0) {
		// PRODUCT IS IN COUNTRY FILTER - CHECK TO SEE IF IT SHOULD BE DISPLAYED
		$CountryProductCheck = $wpdb->get_var("SELECT COUNT(products_id) FROM ".$wpdb->prefix."fssc_products_to_countries WHERE products_id = ".$products->products_id." AND country_id = ".$_SESSION['fssccountry']);
		if ($CountryProductCheck == 0) {
			$ProductToCountry = FALSE;
		}
	}
	if ($ProductToCountry == TRUE) {
		$page_content .= '<div id="fs-product-listingh" style="width: '.$fscartconfig['ListingsPerLine'].'%;">';
		$ProductLinkS = '';
		$ProductLinkE = '';
		if ($products->products_show_details == 0 || $fscartconfig['AllowProductPages'] == 0) {
			$ProductLinkS = '<a href="'.get_option('home').'/wp-content/uploads/fscart/products/enlarged/'.$products->products_id.'.jpg" target="_blank">';
			$ProductLinkE = '</a>';
		} elseif (file_exists(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$products->products_id.'.jpg')) {
			$ProductLinkS = '<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$products->products_url.'/">';
			$ProductLinkE = '</a>';
		}
		$page_content .= $ProductLinkS;
		if ($fscartconfig['DisplayCategoryPageProductPicture'] == "1") {
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$products->products_id.'.jpg')) {
				$page_content .= '<div style="text-align: center;"><img src="'.get_option('home').'/wp-content/uploads/fscart/products/small/'.$products->products_id.'.jpg" border="0" alt="'.$products->products_name.'" title="Click here for more information."></div>';
			} else {
				$page_content .= '<div style="width: '.$fscartconfig['MaxThumbnailSize'].'px; height: '.$fscartconfig['MaxThumbnailSize'].'px; text-align: center;">&nbsp;</div>';
			}
		}
		
		$ProductsName = $products->products_name;
		if (function_exists(fssc_pro_product_name)) { $ProductsName = fssc_pro_product_name($products); }
		
		//$page_content .= '<h3'.$ProductNameStyle.'>'.$products->products_part_number.'</h3>';
		$page_content .= '<h3'.$ProductNameStyle.'>'.$ProductsName.'</h3>';
		$page_content .= $ProductLinkE;
		$page_content .= '<div id="horiz-buy-box">';
		if ($products->products_discontinued != 1) {
			$PriceOptions = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_pricing WHERE products_id = '.$products->products_id.' AND pricing_price != "0.00" ORDER BY pricing_order');
			$ShowBuyButton = FALSE;
			$ShowPrice = FALSE;
			if (fssc_get_price($products->products_id) == 0 || fssc_get_price($products->products_id) == 0.00) {
				$ShowBuyButton = FALSE;
				$ShowPrice = FALSE;
			} else {
				$ShowBuyButton = TRUE;
				$ShowPrice = TRUE;
			}
			if ($fscartconfig['AlwaysShowBuyButton'] == 1) {
				$ShowBuyButton = TRUE;
			}
			if ($ShowPrice == TRUE) { 
				if ($products->products_price_label != '' && $_SERVER['REQUEST_URI'] != '/') {
					$page_content .= '<div class="price_label">'.$products->products_price_label.'</div>';
				}
				$ProductPrice = fssc_get_price($products->products_id);
				//$DefaultProductPrice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = ".$products->products_id." AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);
				if (!is_user_logged_in()) {
				$InstantRebate = $wpdb->get_var("SELECT products_instant_rebate FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = ".$products->products_id." AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);
				} else {
				$InstantRebate = 0.00;
				}
				if (!is_user_logged_in()) {
				//if ($ProductPrice != $DefaultProductPrice) {
				//	$page_content .= '<div class="osprice">'.$_SESSION['currency_symbol'].fssc_currency_format($DefaultProductPrice).'</div>';
				//}
				}
				if ($InstantRebate != '0.00') {
					$page_content .= '<div class="sprice" style="text-decoration: line-through;">'.$_SESSION['currency_symbol'].fssc_currency_format($ProductPrice).'</div>';
				} else {
					$page_content .= '<div class="sprice">'.$_SESSION['currency_symbol'].fssc_currency_format($ProductPrice).'</div>';
				}
			} else {
				$page_content .= '<div class="sprice">&nbsp;</div>';
			}
			if ($ShowBuyButton == TRUE) { 
				if ($products->products_electronic_download != '' && $products->products_download_button == 2) {
					$page_content .= '<a href="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/download.php?pid='.$products->products_id.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>Download</span></a>';
				} elseif ($fscartstyle['CustomAddtoCartButton'] != '') {
					$page_content .= '<input type="image" src="'.$fscartstyle['CustomAddtoCartButton'].'" name="submit" value="submit" alt="submit">';
				} else {
					//$page_content .= '<input type="submit" value="'.$fscartconfig['ProductBuyButtonText'].'" name="add-to-cart" class="fsscgradient fsscbutton" '.$BuyButtonStyle.' onClick="pageTracker._trackEvent(\'User Basket\', \'Add to Cart\', \''.addslashes($products->products_part_number).'\');">';
					$BuyButtonText = $fscartconfig['ProductBuyButtonText'];
					if ($products->products_buy_button_text != '') { $BuyButtonText = $products->products_buy_button_text; }
					$BuyButtonLink = get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=add&pid='.$products->products_id;
					if ($products->products_buy_button_link != '') { $BuyButtonLink = $products->products_buy_button_link; }
					$page_content .= '<div style="fssc-buy-button"><a href="'.$BuyButtonLink.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span'.$BuyButtonRadius.'>'.$BuyButtonText.'</span></a></div>';
				}
			}
		}
		$page_content .= '</div>';
		$page_content .= '</div>';
		
	}
}
$page_content .= '<div style="clear: left;"></div>';
?>
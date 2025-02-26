<?php
/*
Template Name: Vertical
*/

$ProductNameStyle = ''; if (function_exists(fssc_text_styling)) { $ProductNameStyle = fssc_text_styling($fscartstyle['ProductListingsNameSize'], $fscartstyle['ProductListingsNameColor']); }
$ProductDescStyle = ''; if (function_exists(fssc_text_styling)) { $ProductDescStyle = fssc_text_styling($fscartstyle['ProductListingDescriptionSize'], $fscartstyle['ProductListingDescriptionColor']); }
$ProductPriceStyle = ''; if (function_exists(fssc_text_styling)) { $ProductPriceStyle = fssc_text_styling($fscartstyle['ProductListingPriceSize'], $fscartstyle['ProductListingPriceColor']); }
$BuyButtonStyle = ''; if (function_exists(fssc_buybutton_styling)) { $BuyButtonStyle = fssc_buybutton_styling($fscartstyle, 'listing'); }
$SubTextLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $SubTextLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductListingDescLinkColor'); }

foreach ($products as $products) {
	$ProductToCountry = TRUE;
	$CountryProductCheck = $wpdb->get_var("SELECT COUNT(products_id) FROM ".$wpdb->prefix."fssc_products_to_countries WHERE products_id = ".$products->products_id);
	if ($CountryProductCheck > 0) {
		$CountryProductCheck = $wpdb->get_var("SELECT COUNT(products_id) FROM ".$wpdb->prefix."fssc_products_to_countries WHERE products_id = ".$products->products_id." AND country_id = ".$_SESSION['fssccountry']);
		if ($CountryProductCheck == 0) {
			$ProductToCountry = FALSE;
		}
	}
	if ($ProductToCountry == TRUE) {
		$page_content .= '<div id="fs-product-listing">';
		$ProductLinkS = '';
		$ProductLinkE = '';
		if ($products->products_show_details == 0 || $fscartconfig['AllowProductPages'] == 0) {
			$ProductLinkS = '<a href="'.get_option('home').'/wp-content/uploads/fscart/products/enlarged/'.$products->products_id.'.jpg" target="_blank">';
			$ProductLinkE = '</a>';
		} elseif (file_exists(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$products->products_id.'.jpg')) {
			$ProductLinkS = '<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$products->products_url.'/"'.$ProductNameStyle.'>';
			$ProductLinkE = '</a>';
		}
		if ($fscartconfig['DisplayCategoryPageProductBuyButton'] == "1") {
			$page_content .= '<div id="buy-box">';
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
					$ProductPrice = fssc_get_price($products->products_id);
					//$DefaultProductPrice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = ".$products->products_id." AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);
					$page_content .= '<div class="sprice"'.$ProductPriceStyle.'>'.$products->products_price_label.' $'.fssc_currency_format($ProductPrice).'</div>';
				} else {
					$page_content .= '<div class="sprice"'.$ProductPriceStyle.'>&nbsp;</div>';
				}
				if ($ShowBuyButton == TRUE) { 
					if ($products->products_electronic_download != '' && $products->products_download_button == 2) {
						$page_content .= '<a href="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/download.php?pid='.$products->products_id.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>Download</span></a>';
					} elseif ($fscartstyle['CustomAddtoCartButton'] != '') {
						$page_content .= '<input type="image" src="'.$fscartstyle['CustomAddtoCartButton'].'" name="submit" value="submit" alt="submit">';
					} else {
						$BuyButtonText = $fscartconfig['ProductBuyButtonText'];
						if ($products->products_buy_button_text != '') { $BuyButtonText = $products->products_buy_button_text; }
						$BuyButtonLink = get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=add&pid='.$products->products_id;
						if ($products->products_buy_button_link != '') { $BuyButtonLink = $products->products_buy_button_link; }
						$page_content .= '<div class="fssc-buy-button"><p><a href="'.$BuyButtonLink.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>'.$BuyButtonText.'</span></a></p>';
						$page_content .= '<p><a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$products->products_url.'/" class="fsscgradient fsscbutton fssclink" style="text-shadow: none; color: #526168; background-color: #f0f3f5; font-size: 12px; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><span>Learn More</span></a></p></div>';
					}
				}
			} else {
				$page_content .= '&nbsp;';
			}
			
			
			$page_content .= '</div>';
		}
		
		$ProductsName = $products->products_name;
		if (function_exists(fssc_pro_product_name)) { $ProductsName = fssc_pro_product_name($products); }
		
		$page_content .= '<div id="fs-product-listing-details">'; 
		$page_content .= '<h3'.$ProductNameStyle.'>'.$ProductsName.'</h3>';
		
		if ($products->short_description != '') {
			$page_content .= '<p'.$ProductDescStyle.'>'.$products->short_description.$ProductLinkS.'<br />View more features...'.$ProductLinkE.'</p>';
		} else {
			$page_content .= '<p'.$ProductDescStyle.'>';
			if ($fscartconfig['DisplayCategoryPageProductDescription'] == "1") {
				$page_content .= stripslashes(substr($products->products_description, 0, 200)).'...<br />';
			}
			if ($fscartconfig['DisplayCategoryPageProductNumber'] == "1") {
				$page_content .= '<strong>'.$fscartconfig['ProductIdentification'].':</strong> '.$products->products_part_number.'<br />';
			}
			if ($fscartconfig['EnableBrands'] == 'TRUE') {
				$Brand = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'fssc_products_to_brands, '.$wpdb->prefix.'fssc_brands WHERE '.$wpdb->prefix.'fssc_products_to_brands.products_id = '.$products->products_id.' AND '.$wpdb->prefix.'fssc_brands.brand_id = '.$wpdb->prefix.'fssc_products_to_brands.brand_id');
				if ($fscartconfig['DisplayCategoryPageProductBrand'] == "1") {
					$page_content .= '<strong>Brand: </strong><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$Brand->brand_url.'/" id="brand-link" '.$SubTextLinkStyle.'>'.$Brand->brand_name.'</a><br />';
				}
			}
			if ($products->products_special_notice != '') {
				if (is_user_logged_in() && $products->products_special_notice == 'Login for Actual Price') {
					
				} else {
					$page_content .= '<span id="fs-product-notice">'.$products->products_special_notice.'</span><br />';
				}
			} elseif ($InstantRebate != '0.00') {
				//$page_content .= '<span id="fs-product-rebate">$'.$InstantRebate.' Instant Rebate</span><br />';
			} else {
				//$MemberPrice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products_pricing WHERE user_type_id = 0 AND products_id = ".$products->products_id." AND products_price < ".str_replace(',','',$ProductPrice)." LIMIT 1");
				//if (is_numeric($MemberPrice) && $type != 'Featured Products') {
				//	if ($MemberPrice < str_replace(',','',$ProductPrice) && $Brand->brand_id == 8) {
				//		$page_content .= '<div id="fs-product-discount-l">List Price - <a href="/my-account/" rel="nofollow">Login For Actual Price</a></div>';
				//	}
				//}		
			}
		}
		
		if ($fscartconfig['DisplayCategoryPageProductStock'] == "1" && $products->products_availability != '') {
		if ($products->products_availability == 1) {
			$products->products_availability = 'In Stock';
		} elseif ($products->products_availability == 3) {
			$products->products_availability = 'Coming Soon';
		} else {
			$products->products_availability = 'Out of Stock';
		}
			$page_content .= '<strong>Availability:</strong> '.$products->products_availability.'<br />';
		}
		$page_content .= '</p>';
		$page_content .= '</div>';
		if ($fscartconfig['DisplayCategoryPageProductPicture'] == "1") {
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$products->products_id.'.jpg')) {
				$page_content .= '<div id="fs-product-image">'.$ProductLinkS.'<img src="'.get_option('home').'/wp-content/uploads/fscart/products/small/'.$products->products_id.'.jpg" border="0" alt="'.$ProductsName.'">'.$ProductLinkE.'</div>';
			} else {
				$page_content .= '<div id="fs-product-image" style="min-height: 60px;">&nbsp;</div>';
			}
		}
		$page_content .= '</div>';
	}
}
?>
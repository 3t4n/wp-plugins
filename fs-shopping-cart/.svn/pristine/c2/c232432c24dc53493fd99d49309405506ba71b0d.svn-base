<?php
/*
Template Name: Default
*/

$ProductNameStyle = ''; if (function_exists(fssc_text_styling)) { $ProductNameStyle = fssc_text_styling($fscartstyle['ProductNameSize'], $fscartstyle['ProductNameColor']); }
$ProductPriceStyle = ''; if (function_exists(fssc_text_styling)) { $ProductPriceStyle = fssc_text_styling($fscartstyle['ProductPriceSize'], $fscartstyle['ProductPriceColor']); }
$ProductHeaderStyle = ''; if (function_exists(fssc_text_styling)) { $ProductHeaderStyle = fssc_text_styling($fscartstyle['ProductHeadingSize'], $fscartstyle['ProductHeadingColor']); }
$ProductDetailsStyle = ''; if (function_exists(fssc_text_styling)) { $ProductDetailsStyle = fssc_text_styling($fscartstyle['ProductSubFontSize'], $fscartstyle['ProductSubFontColor']); }
$ProductDescStyle = ''; if (function_exists(fssc_text_styling)) { $ProductDescStyle = fssc_text_styling($fscartstyle['ProductListingDescriptionSize'], $fscartstyle['ProductListingDescriptionColor']); }
$ProductPriceStyle = ''; if (function_exists(fssc_text_styling)) { $ProductPriceStyle = fssc_text_styling($fscartstyle['ProductListingPriceSize'], $fscartstyle['ProductListingPriceColor']); }
$BuyButtonStyle = ''; if (function_exists(fssc_buybutton_styling)) { $BuyButtonStyle = fssc_buybutton_styling($fscartstyle, 'details'); }
$SubFontLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $SubFontLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductSubFontLinkColor'); }

$ToolBarLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $ToolBarLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductToolBarLinkColor'); }
$ToolBarTextStyle = ''; if (function_exists(fssc_text_styling)) { $ToolBarTextStyle = fssc_text_styling($fscartstyle['ProductToolBarFontSize'], $fscartstyle['ProductToolBarFontColor']); }
$ToolBarStyle = 'style="background: url('.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/pnavg.png) repeat-x; background-color: #d0d0d0; border: 1px solid #d0d0d0; "'; if (function_exists(fssc_toolbar_styling)) { $ToolBarStyle = fssc_toolbar_styling($fscartstyle); }

$page_content .= '<div id="fs-product-page">';
	$page_content .= '<div id="details-box">';
	/*
	if (file_exists(ABSPATH.'/wp-content/uploads/fscart/products/'.$product->products_id.'.jpg')) { 
		$page_content .= '<div id="product-image"><a href="'.get_option('home').'/wp-content/uploads/fscart/products/enlarged/'.$product->products_id.'.jpg" class="thickbox" rel="fsscproducts"><img src="'.get_option('home').'/wp-content/uploads/fscart/products/'.$product->products_id.'.jpg" border="0" alt="'.$product->products_name.'"></a></div>';
	} else {
		$page_content .= '<div id="product-image"><div id="noimage" style="height: '.$fscartconfig['MaxStandardPictureSize'].'px; width: '.$fscartconfig['MaxStandardPictureSize'].'px;">No Image</div></div>';
	}
	*/
	$page_content .= '<div id="buy-buttons">';
	if ($product->products_discontinued != 1) {
		$PriceOptions = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_pricing WHERE products_id = '.$product->products_id.' AND pricing_price != "0.00" ORDER BY pricing_order');
		$ShowBuyButton = FALSE;
		$ShowPrice = FALSE;
		if (fssc_get_price($product->products_id) == 0 || fssc_get_price($product->products_id) == 0.00) {
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
			$ProductPrice = fssc_get_price($product->products_id);
			//$DefaultProductPrice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = ".$product->products_id." AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);
			if (!is_user_logged_in()) {
			$InstantRebate = $wpdb->get_var("SELECT products_instant_rebate FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = ".$product->products_id." AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);
			} else {
			$InstantRebate = 0.00;
			}
			//if ($ProductPrice != $DefaultProductPrice) {
			//	$page_content .= '<div class="osprice">'.$_SESSION['currency_symbol'].fssc_currency_format($DefaultProductPrice).'</div>';
			//}
			if (is_user_logged_in()) {
				$product->products_price_label = '';
			}
			
			$page_content .= '<div id="pdsprice" class="sprice"'.$ProductPriceStyle.'>'.$product->products_price_label.' '.$_SESSION['currency_symbol'].fssc_currency_format($ProductPrice).'</div>';
			
			if ($product->products_pricematch == 1) {
				$page_content .= '<div class="fssc-price-match"><a href="'.get_bloginfo('home').'/price-match/" style="background: none;"><img src="'.get_bloginfo('home').'/wp-content/plugins/fs-shopping-cart/images/pricematch.jpg" alt="'.$product->products_part_number.' Price Match" border="0" /></a></div>';
			}
		} else {
			$page_content .= '<div id="pdsprice" class="sprice"'.$ProductPriceStyle.'>&nbsp;</div>';
		}
		if ($ShowBuyButton == TRUE) { 
			$BuyButtonText = $fscartconfig['ProductBuyButtonText'];
			if ($product->products_buy_button_text != '') { $BuyButtonText = $product->products_buy_button_text; }
			$BuyButtonLink = get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=add&pid='.$product->products_id;
			if ($product->products_buy_button_link != '') { $BuyButtonLink = $product->products_buy_button_link; }
			if ($product->products_electronic_download_ext != '' && $product->products_download_button == 2) {
				$page_content .= '<a href="'.$product->products_electronic_download_ext.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>Download</span></a>';
			} elseif ($product->products_electronic_download != '' && $product->products_download_button == 2) {
				$page_content .= '<a href="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/download.php?pid='.$product->products_id.'" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>Download</span></a>';
			} elseif ($fscartstyle['CustomAddtoCartButton'] != '') {
				$page_content .= '<a href="'.$BuyButtonLink.'" id="fssc-buy-now"><img src="'.$fscartstyle['CustomAddtoCartButton'].'" border="0"></a>';
			} else {
				$page_content .= '<a href="'.$BuyButtonLink.'" id="fssc-buy-now" class="fsscgradient fsscbutton fssclink" '.$BuyButtonStyle.'><span>'.$BuyButtonText.'</span></a>';
			}
		}

	}
	$page_content .= '</div>';
	$page_content .= '<h1'.$ProductNameStyle.'>'.$product->products_name.'</h1>';
	$page_content .= '<div id="pdetails" '.$ProductDetailsStyle.'>';
	$Variations = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE products_id = ".$product->products_id." ORDER BY variation_id");
	if (count($Variations) > 0) {
		$page_content .= '<strong>Variation: </strong><select name="pdvid" id="pdvid" onchange="var VInfo; VInfo = this.value.split(\'-\'); document.getElementById(\'pdsprice\').innerHTML = \''.$_SESSION['currency_symbol'].'\'+VInfo[1]; document.getElementById(\'fssc-buy-now\').href = \''.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/?f=add&vid=\'+VInfo[0]">';
		$page_content .= '<option value="0-'.$ProductPrice.'">'.$product->products_part_number.'</option>';
		foreach ($Variations as $Variations) {
			$selected = '';
			if ($CurrentVariation == $Variations->variation_id) { $selected = ' selected'; }
			$page_content .= '<option value="'.$Variations->variation_id.'-'.fssc_get_price('v'.$Variations->variation_id).'"'.$selected.'>'.$Variations->variation_name.'</option>';
		}
		$page_content .= '</select><br /><br />';
	}
	$page_content .= '<strong>'.$fscartconfig['ProductIdentification'].': </strong>'.$product->products_part_number.'<br />';
	if ($fscartconfig['DisplayCategoryPageProductStock'] == "1" && $product->products_availability != '') {
		if ($product->products_availability == 1) {
			$product->products_availability = 'In Stock';
		} elseif ($product->products_availability == 3) {
			$product->products_availability = 'Coming Soon';
		} else {
			$product->products_availability = 'Out of Stock';
		}
		$page_content .= '<strong>Availability:</strong> '.$product->products_availability.'<br />';
	}
	if ($fscartconfig['EnableBrands'] == 'TRUE') {
		$Brand = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'fssc_products_to_brands, '.$wpdb->prefix.'fssc_brands WHERE '.$wpdb->prefix.'fssc_products_to_brands.products_id = '.$product->products_id.' AND '.$wpdb->prefix.'fssc_brands.brand_id = '.$wpdb->prefix.'fssc_products_to_brands.brand_id');
		$page_content .= '<strong>Brand: </strong><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$Brand->brand_url.'/" id="brand-link" '.$SubFontLinkStyle.'>'.$Brand->brand_name.'</a><br />';
	}
	if ($product->products_special_notice != '') {
		$page_content .= '<div id="fs-product-notice">'.$product->products_special_notice.'</div>';
	}
	if ($InstantRebate != '0.00' && $InstantRebate != '') {
		$page_content .= '<div id="fs-product-rebate">'.$_SESSION['currency_symbol'].$InstantRebate.' Instant Rebate</div>';
	}
	
	
	if ($FSSCExtensions['GFLikes'] == TRUE) { $page_content .= fssc_google_facebook_like(); }
	
	if ($product->products_availability != "" && $product->products_availability != 0) {
		$page_content .= '<strong>Stock: </strong>'.$product->products_availability.'<br />';
	}
	$page_content .= '</div>';
	$page_content .= '</div>';
	$page_content .= '</div>';
		
	if ($fscartconfig['ProductToolBar'] == 0 && $product->products_toolbar == 1) {
		$page_content .= '<ul id="fs-product-nav" '.$ToolBarStyle.'>';
		if ($product->products_description != '') {
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-product-description\').className=\'\';document.getElementById(\'fs-product-images\').className=\'hide\';document.getElementById(\'fs-product-accessories\').className=\'hide\';document.getElementById(\'fs-product-related\').className=\'hide\';">Overview</li>';
		}
		if ($wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'fssc_products_images WHERE products_id = '.$product->products_id) != 0) {
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-product-description\').className=\'hide\';document.getElementById(\'fs-product-images\').className=\'\';document.getElementById(\'fs-product-accessories\').className=\'hide\';document.getElementById(\'fs-product-related\').className=\'hide\';document.getElementById(\'fs-product-reviews\').className=\'hide\';">Images</li>';
		}
		if ($wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'fssc_products_accessories WHERE products_id = '.$product->products_id) != 0) {
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-product-description\').className=\'hide\';document.getElementById(\'fs-product-images\').className=\'hide\';document.getElementById(\'fs-product-accessories\').className=\'\';document.getElementById(\'fs-product-related\').className=\'hide\';document.getElementById(\'fs-product-reviews\').className=\'hide\';">Accessories</li>';
		}
	
		$ProductFinderRelated = $wpdb->get_results('SELECT products_id, COUNT(*) AS matches FROM wp_fssc_products_to_finder WHERE option_id IN ('.$InOptions.') AND products_id != '.$product->products_id.' GROUP BY products_id ORDER BY matches DESC LIMIT 10');
	
		if ($wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'fssc_products_related WHERE products_id = '.$product->products_id) != 0 || count($ProductFinderRelated) != 0) {
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-product-description\').className=\'hide\';document.getElementById(\'fs-product-images\').className=\'hide\';document.getElementById(\'fs-product-accessories\').className=\'hide\';document.getElementById(\'fs-product-reviews\').className=\'hide\';document.getElementById(\'fs-product-related\').className=\'\';">Related Products</li>';
		}
		
		if ($FSSCExtensions['Reviews'] == TRUE) { 
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-product-description\').className=\'hide\';document.getElementById(\'fs-product-images\').className=\'hide\';document.getElementById(\'fs-product-accessories\').className=\'hide\';document.getElementById(\'fs-product-related\').className=\'hide\';document.getElementById(\'fs-product-reviews\').className=\'\';">Reviews</li>';
		}
			
		if ($product->products_custom_tab1 != '' && $product->products_custom_tab1_value != '') {
			$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.$product->products_custom_tab1_value.'" '.$ToolBarLinkStyle.' onClick="pageTracker._trackEvent(\'More Product Info\', \''.$product->products_custom_tab1.'\', \''.addslashes($product->products_part_number).'\'); ">'.$product->products_custom_tab1.'</a></li>';
		}
		if ($product->products_custom_tab2 != '' && $product->products_custom_tab2_value != '') {
			$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.$product->products_custom_tab2_value.'" '.$ToolBarLinkStyle.' onClick="pageTracker._trackEvent(\'More Product Info\', \''.$product->products_custom_tab2.'\', \''.addslashes($product->products_part_number).'\'); ">'.$product->products_custom_tab2.'</a></li>';
		}
		if ($product->products_custom_tab3 != '' && $product->products_custom_tab3_value != '') {
			$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.$product->products_custom_tab3_value.'" '.$ToolBarLinkStyle.' onClick="pageTracker._trackEvent(\'More Product Info\', \''.$product->products_custom_tab3.'\', \''.addslashes($product->products_part_number).'\'); ">'.$product->products_custom_tab3.'</a></li>';
		}
		
		$page_content .= '</ul>';
	}

	$page_content .= '<div id="fs-description">';
	if (function_exists('fssc_str_replace')) {
		$product->products_description = fssc_str_replace($product->products_description);
	}
	$page_content .= '<div id="fs-product-description">';
	if ($wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'fssc_products_features WHERE products_id = '.$product->products_id) != 0) {
		$page_content .= '<h2'.$ProductHeaderStyle.'>'.$product->products_part_number.' Features</h2>';
		$features = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_features WHERE products_id = '.$product->products_id.' ORDER BY features_id');
		$page_content .= '<ul>';
		foreach ($features as $features) {
			$page_content .= '<li>'.$features->features_feature.'</li>';
		}
		$page_content .= '</ul>';
		$page_content .= '<p>&nbsp;</p>';
	}
	if ($product->products_description != '') {
		$page_content .= '<h2'.$ProductHeaderStyle.'>'.$product->products_part_number.' Overview</h2>';
		$page_content .= '<p>'.stripslashes(str_replace("\n","<br>", $product->products_description)).'</p>';
	}
	$page_content .= '</div>';

	$page_content .= '<div id="fs-product-images">';
	$page_content .= '<h2'.$ProductHeaderStyle.'>'.$product->products_part_number.' Images</h2>';
	$additional_images = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_images WHERE products_id = '.$product->products_id.' ORDER BY images_id');
	if (count($additional_images) > 0) {
		foreach ($additional_images as $additional_images) {
			$page_content .= '<a href="'.get_option('home').'/wp-content/uploads/fscart/products/additional/enlarged/'.$additional_images->images_id.'.jpg" target="_blank" id="prod-add-image" class="thickbox" rel="fsscproducts"><img src="'.get_option('home').'/wp-content/uploads/fscart/products/additional/small/'.$additional_images->images_id.'.jpg" border="0"></a>';
		}
	}
	$page_content .= '</div>';
	
	$page_content .= '<div id="fs-product-accessories">';
	$page_content .= '<h2'.$ProductHeaderStyle.'>'.$product->products_part_number.' Accessories</h2>';
	$page_content .= fssc_print_products_listing (0, $product->products_id, 'Accessory Products', FALSE, FALSE, 9999);
	$page_content .= '</div>';

	$page_content .= '<div id="fs-product-related">';
	$page_content .= '<h2'.$ProductHeaderStyle.'>'.$product->products_part_number.' Related Products</h2>';
	// USING PRODUCT FINDER
	$InOptions = '';
	$FinderIDs = $wpdb->get_results('SELECT * FROM wp_fssc_products_to_finder WHERE products_id = '.$product->products_id);
	if (count($FinderIDs) != 0) {
		foreach ($FinderIDs as $FinderIDs) {
			$InOptions .= $FinderIDs->option_id.', ';
		}
		$InOptions = substr($InOptions, 0, -2);
		$FoundProductIDs = $wpdb->get_results('SELECT products_id, COUNT(*) AS matches FROM wp_fssc_products_to_finder WHERE option_id IN ('.$InOptions.') AND products_id != '.$product->products_id.' GROUP BY products_id ORDER BY matches DESC LIMIT 10');
		$ProductIDs = '';
		foreach ($FoundProductIDs as $FoundProductIDs) {
			$ProductIDs .= $FoundProductIDs->products_id.', ';
		}
		$ProductIDs = substr($ProductIDs, 0, -2);
		$FinderSQL = 'SELECT * FROM wp_fssc_products WHERE products_id IN ('.$ProductIDs.')';
		$page_content .= fssc_print_products_listing (0, $FinderSQL, 'Finder', FALSE, FALSE, 99999);
	} else {
		$page_content .= fssc_print_products_listing (0, $product->products_id, 'Related Products', FALSE, FALSE, 9999);
	}
	$page_content .= '</div>';

	if ($FSSCExtensions['Reviews'] == TRUE) { 
		$page_content .= fssc_product_reviews($product->products_id, $_POST, $ProductHeaderStyle);
	}


	$page_content .= '</div>';
	// INITIAL OVERVIEW DISPLAY
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'fs-product-description\').className=\'\';
	
	
	document.getElementById(\'fs-product-images\').className=\'hide\';
	document.getElementById(\'fs-product-accessories\').className=\'hide\';
	document.getElementById(\'fs-product-related\').className=\'hide\';
	
	document.getElementById(\'fs-product-reviews\').className=\'hide\';
	//-->
	</SCRIPT>';
	
	if (isset($_POST['submit'])) {
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'fs-product-description\').className=\'hide\';
	document.getElementById(\'fs-product-reviews\').className=\'\';
	//-->
	</SCRIPT>';
	}
?>
<?php
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		return 'You must be logged in to view our product catalog.';
		exit;
	}

	$CategoryNameStyle = fssc_text_styling($fscartstyle['CategoryNameSize'], $fscartstyle['CategoryNameColor']);
	$ToolBarTextStyle = fssc_text_styling($fscartstyle['ProductListingToolBarFontSize'], $fscartstyle['ProductListingToolBarFontColor']);
	$ToolBarGradient = ''; if ($fscartstyle['ProductListingToolBarGradient'] == 'yes') { $ToolBarGradient = 'background: url('.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/pnavg.png) repeat-x; '; }
	$ToolBarBGColor = ''; if ($fscartstyle['ProductListingToolBarColor'] != '') { $ToolBarBGColor = 'background-color: #'.$fscartstyle['ProductListingToolBarColor'].'; '; }
	$ToolBarBorder = ''; if ($fscartstyle['ProductListingToolBarBorderColor'] != '') { $ToolBarBorder = 'border: 1px solid #'.$fscartstyle['ProductListingToolBarBorderColor'].'; '; $ToolBarTextStyle = substr($ToolBarTextStyle, 0, -1).' border-right: 1px solid #'.$fscartstyle['ProductListingToolBarBorderColor'].'; "'; }
	$ToolBarStyle = 'style="'.$ToolBarGradient.$ToolBarBGColor.$ToolBarBorder.'"';
	$ToolBarLinkStyle = 'style="color: #'.$fscartstyle['ProductListingToolBarLinkColor'].';"';

	if (preg_match("#/discontinued/#i", $_SERVER['REQUEST_URI'])) {
		$Discontinued = TRUE;
		$pageurl = explode("/".$FSSCPages['BrandURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		$pageurl[1] = str_replace("discontinued", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
	} else {
		$Discontinued = FALSE;
		$pageurl = explode("/".$FSSCPages['BrandURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
	}
	if (!$pageurl[1]) {
		$BrandID = 0;
	} else {
		$BrandID = $wpdb->get_var("SELECT brand_id FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'");
	}
	if ($BrandID == 0 || $BrandID == '') {
		$page_content = '<h1'.$CategoryNameStyle.'>Invalid Brand</h1>';
	} else {
		$BrandInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_id = '".$BrandID."'");
		if ($Discontinued == TRUE) {
			$page_content = '<h1'.$CategoryNameStyle.'>'.$BrandInfo->brand_name.' Discontinued Products</h1>';
		} else {
			$page_content = '<h1'.$CategoryNameStyle.'>'.$BrandInfo->brand_name.'</h1>';
		}
		if ($BrandInfo->brand_product_count > 0) {
			$page_content .= '<ul id="fs-product-nav" '.$ToolBarStyle.'>';
			if ($Discontinued == TRUE) {
				if ($BrandInfo->brand_description != '') {
				$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$BrandInfo->brand_url.'/" '.$ToolBarLinkStyle.'>About</a></li>';
				}
				$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$BrandInfo->brand_url.'/" '.$ToolBarLinkStyle.'>All Products</a></li>';
			} else {
				if ($BrandInfo->brand_description != '') {
					$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-brand-description\').className=\'\';document.getElementById(\'fs-brand-all\').className=\'hide\';document.getElementById(\'fs-tab-1\').className=\'hide\';document.getElementById(\'fs-tab-2\').className=\'hide\';document.getElementById(\'fs-tab-3\').className=\'hide\';document.getElementById(\'fs-tab-4\').className=\'hide\';document.getElementById(\'fs-tab-5\').className=\'hide\';">About</li>';
				}
				$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-brand-all\').className=\'\';document.getElementById(\'fs-brand-description\').className=\'hide\';document.getElementById(\'fs-tab-1\').className=\'hide\';document.getElementById(\'fs-tab-2\').className=\'hide\';document.getElementById(\'fs-tab-3\').className=\'hide\';document.getElementById(\'fs-tab-4\').className=\'hide\';document.getElementById(\'fs-tab-5\').className=\'hide\';">All Products</li>';
			}
			if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products, ".$wpdb->prefix."fssc_products_to_brands WHERE ".$wpdb->prefix."fssc_products_to_brands.brand_id = ".$BrandInfo->brand_id." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_brands.products_id AND ".$wpdb->prefix."fssc_products.products_visibility = 1 AND ".$wpdb->prefix."fssc_products.products_discontinued = 1") > 0) {
				$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$BrandInfo->brand_url.'/discontinued/" '.$ToolBarLinkStyle.'>Discontinued Products</a></li>';
			}
			$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_id = '".$BrandID."'");
			$brand_details = mysql_fetch_array($sql);
			for($i=1;$i<=6;$i++) {
				$prepage_content = '';
				if ($brand_details['brand_tab_'.$i] != '' && $brand_details['brand_tab_'.$i] != 'unset') {
					$prepage_content .= '<li onClick="document.getElementById(\'fs-brand-all\').className=\'hide\';document.getElementById(\'fs-tab-1\').className=\'hide\';document.getElementById(\'fs-tab-2\').className=\'hide\';document.getElementById(\'fs-tab-3\').className=\'hide\';document.getElementById(\'fs-tab-4\').className=\'hide\';document.getElementById(\'fs-tab-5\').className=\'hide\';">'.$brand_details['brand_tab_'.$i].'</li>';
					$prepage_content = str_replace("('fs-tab-".$i."').className='hide'","('fs-tab-".$i."').className=''",$prepage_content);
				}
				$page_content .= $prepage_content;
			}
			$page_content .= '</ul>';
		
			if ($Discontinued == FALSE) {
				$page_content .= '<div id="fs-brand-description"><br />';
				$page_content .= '<h2>About '.$BrandInfo->brand_name.'</h2>';
				$page_content .= '<p>'.stripslashes(str_replace("\n","<br />",$BrandInfo->brand_description)).'</p>';
				$page_content .= '</div>';
			}

			$page_content .= '<div id="fs-brand-all"><br />';
			if ($Discontinued == TRUE) {
				$page_content .= fssc_print_products_listing (0, $BrandID, 'Brand Disco', FALSE, FALSE, 9999);
			} else {
				$page_content .= fssc_print_products_listing (0, $BrandID, 'Brand', FALSE, FALSE, 9999);
			}
			$page_content .= '</div>';
			
			for($i=1;$i<=6;$i++) {
				if ($brand_details['brand_tab_'.$i] != '' && $brand_details['brand_tab_'.$i] != 'unset') {
					$page_content .= '<div id="fs-tab-'.$i.'"><br />';
					$page_content .= fssc_print_products_listing ($i, $BrandID, 'Brand', FALSE, FALSE, 9999);
					$page_content .= '</div>';
				}
			}
		}
	}
	// INITIAL OVERVIEW DISPLAY
	if ($Discontinued == FALSE) {
		$page_content .= '<SCRIPT TYPE="text/javascript">
		<!--
		document.getElementById(\'fs-brand-description\').className=\'hide\';
		document.getElementById(\'fs-brand-all\').className=\'\';
		document.getElementById(\'fs-tab-1\').className=\'hide\';
		document.getElementById(\'fs-tab-2\').className=\'hide\';
		document.getElementById(\'fs-tab-3\').className=\'hide\';
		document.getElementById(\'fs-tab-4\').className=\'hide\';
		document.getElementById(\'fs-tab-5\').className=\'hide\';
		//-->
		</SCRIPT>';
	}
	echo $page_content;
?>
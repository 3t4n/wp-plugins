<?php

//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

wp_enqueue_script('thickbox', true);
wp_enqueue_style('thickbox');
add_filter('the_content', 'fssc_content', 1);
if (preg_match("#/".$FSSCPages['ProductsURL']."/#i", $_SERVER['REQUEST_URI']) || preg_match("#/".$FSSCPages['BrandURL']."/#i", $_SERVER['REQUEST_URI'])) {
	add_filter('wp_title', 'fssc_meta_title');
} elseif (preg_match("#/".$FSSCPages['ViewCartURL']."/#i", $_SERVER['REQUEST_URI'])) {
	//if (isset($_SESSION['customer_zippostal'])) {
	//	$_POST['fssc-cust-zippostal'] = $_SESSION['customer_zippostal'];
	//}
	if (!$user_ID) {
		$current_user = wp_get_current_user();
		$user_ID = $current_user->ID;
	}
	if (isset($_GET['f']) && $fscartconfig['PurchaseRequiresLogin'] == 1 && $user_ID == 0) {
		//unset($_POST);
		//unset($_GET);
		add_filter('wp_head', 'fssc_account_redirect');
	} else {
		if (isset($_GET['f'])) {
			if ($_GET['f'] == 'add') {
				if (isset($_GET['vid'])) {
					fssc_add_to_cart('v'.$_GET['vid']);
				} elseif (isset($_GET['pid'])) {
					fssc_add_to_cart($_GET['pid']);
				}
			} elseif ($_GET['f'] == 'del') {
				fssc_remove_from_cart($_GET['id']);
			}
			add_filter('wp_head', 'fssc_redirect');
		}
	}
} elseif (preg_match("#/".$FSSCPages['CheckoutURL']."/#i", $_SERVER['REQUEST_URI'])) {
	if (isset($_POST['customer_first_name']) || isset($_GET['PayerID'])) {
		fssc_checkout();
	}
}
if (preg_match("/download.php/i", $_SERVER['REQUEST_URI'])) {
	$ProductID = explode('/fs-shopping-cart/download.php?pid=', $_SERVER['REQUEST_URI']);
	if (isset($ProductID[1])) {
		if (is_numeric($ProductID[1])) {
			$FSSCDownloadResult = fssc_digital_download($ProductID[1]);
			if ($FSSCDownloadResult != 'Success') {
				echo $FSSCDownloadResult; die();
			}
		}
	}
}

function fssc_account_redirect() {
	global $FSSCRedirect,$FSSCPages;
	echo '<meta http-equiv="refresh" content="0;url='.get_option('home').'/'.$FSSCPages['MyAccountURL'].'/" />'; exit;
}
function fssc_redirect() {
	global $FSSCRedirect,$FSSCPages;
	echo '<meta http-equiv="refresh" content="0;url='.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/" />'; exit;
}
function fssc_meta_title() {
	global $wpdb,$pageurl,$FSSCPages;
	if (preg_match("#/".$FSSCPages['ProductsURL']."/#i", $_SERVER['REQUEST_URI'])) {
		$pageurl = explode("/".$FSSCPages['ProductsURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
		if (!$pageurl[1]) {
			return 'Products - ';
		} else {
			$category = stripslashes($wpdb->get_var("SELECT categories_name FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'"));
			$product = stripslashes($wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'"));
			if ($category != '') {
				if (preg_match('/order=/i', $_SERVER['REQUEST_URI'])) {
					$URLExplode = explode ('=',$_SERVER['REQUEST_URI']);
					$URLExplode[2] = str_replace('&pe','',$URLExplode[2]);
					$CatPageNumber = $URLExplode[2] / $URLExplode[3];
					$CatPageNumber = round($CatPageNumber);
					$CatPageNumber++;
					return $category.' - Page '.$CatPageNumber.' - ';
				} else {
					return $category.' - ';
				}
			} elseif($product != '') {
				$productsku = $wpdb->get_var("SELECT products_part_number FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				$productprice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				return $product.' - ';
			}
		}
	} elseif (preg_match("#/".$FSSCPages['BrandURL']."/#i", $_SERVER['REQUEST_URI'])) {
		$pageurl = explode("/".$FSSCPages['BrandURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		$pageurl[1] = str_replace("discontinued", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
		if (!$pageurl[1]) {
			return 'Invalid Brand';
		} else {
			$BrandName = stripslashes($wpdb->get_var("SELECT brand_name FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'"));
			$BrandTitle = stripslashes($wpdb->get_var("SELECT brand_meta_title FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'"));
			if (preg_match("#/discontinued/#i", $_SERVER['REQUEST_URI'])) {
				return $BrandName.' Discontinued Products -';
			} else {
				if ($BrandTitle != '') {
					return $BrandTitle;
				} else {
					return $BrandName;
				}
			}

		}
	}
}
function fssc_content($content) {
	global $post,$wpdb,$wp_rewrite,$user_ID,$current_user,$fscartconfig,$FSSCPages,$fscartstyle,$pageurl,$FSSCExtensions,$FSSCCheckoutResponse;
	if ($post->ID == $FSSCPages['Products']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		if (preg_match("#/".$FSSCPages['ProductsURL']."/#i", $_SERVER['REQUEST_URI'])) {
			$pageurl = explode("/".$FSSCPages['ProductsURL']."/", $_SERVER['REQUEST_URI']);
			$pageurl[1] = str_replace("/", "", $pageurl[1]);
			if (preg_match('/\?/i', $pageurl[1])) {
				$pageurl = explode('?', $pageurl[1]);
				$pageurl[1] = $pageurl[0];
			}
			if (!$pageurl[1]) {
				include('themes/'.$fscartconfig['Theme'].'/home.php');
			} elseif ($pageurl[1] == 'search') {
				if (isset($_POST['string'])) {
					if (isset($_POST)) { if (fsrep_spam_check($_POST) == TRUE) { unset($_POST); } }
					$page_content = '<h1>Search Results</h1>';
					$page_content .= fssc_print_products_listing (0, $_POST['string'], 'Search', FALSE, FALSE, 99999);
					echo $page_content;
				}
			} else {
				$category_count = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
				$product_count = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				if ($category_count > 0) {
					include('includes/product_listing.php');
				} elseif($product_count > 0) {
					$category_id = fssc_grab_category_id();
					$product = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_url = "'.$pageurl[1].'"');
					$products_views = $product->products_views + 1;
					$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_views = ".$products_views." WHERE products_id = ".$product->products_id);
					$page_content = '<div id="fs-cart">';
					$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/product-'.$fscartconfig['DetailsTemplate'];
					include($ListingTemplate.".php");
					$page_content .= '</div>';
					echo $page_content;
				} else {
					echo 'Error 404: Not Found.';
				}
			}
		}
	} elseif ($post->ID == $FSSCPages['Brand']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		include('includes/product-brand.php');
	} elseif ($post->ID == $FSSCPages['Finder']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		if ($FSSCExtensions['ProductFinder'] == TRUE) { fssc_product_finder(); }
	} elseif ($post->ID == $FSSCPages['MyAccount']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		$page_content = '';
		$pageurl = explode("/my-account/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
		if (!$pageurl[1]) {
			require('includes/accounts_main.php');
		}
		echo $page_content;
	} elseif ($post->ID == $FSSCPages['ViewCart']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		$FSSCRedirect = get_option('home').'/'.$FSSCPages['ViewCartURL'].'/';
		add_filter('wp_title', 'fssc_redirect', 1);
		include('includes/view_cart.php');
	} elseif ($post->ID == $FSSCPages['Checkout']) {
		if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
			return 'You must be logged in to view our product catalog.';
			exit;
		}
		include('includes/checkout.php');
	} else {
		include('includes/fssc_filters.php');
		return($content);
	}
}

add_action('wp_head', 'fssc_locations_javascript');

function fssc_locations_javascript() {
?>
<script type="text/javascript" >

function getFSSClist(sel, elementidupdate, fsrepvariable, current, socket){
jQuery(document).ready(function($) {

	if (sel != '[object HTMLSelectElement]' && sel != '[object]') {
    var FSSCID = sel;
  } else {
    var FSSCID = sel.options[sel.selectedIndex].value;
  }

	$('#'+elementidupdate).empty();
	
	var data = {
		action: 'fssc_locations_action',
		elementidupdate: elementidupdate,
		fsrepvariable: fsrepvariable,
		current: current,
		fsrepvalue: FSSCID
	};

	jQuery.post(ajaxurl, data, function(response) 
	{
		if (fsrepvariable == 'CountryID') {
			$('#'+elementidupdate).append(response);
		}
		if (fsrepvariable == 'ProvinceID') {
			eval(response);
		}
	});
});
};
</script>
<?php
}

add_action('wp_ajax_fssc_locations_action', 'fssc_locations_function');

function fssc_locations_function() {
	global $wpdb,$fscartconfig,$CurrencyCode;
	
	$FSREPVar = $_POST['fsrepvariable'];
	$FSREPSel = $_POST['fsrepvalue'];
	
	if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
	
	if($FSREPVar == 'CountryID'){
		$FSREPOptions = '<option value="Not Applicable">Not Applicable</option>';
		if ($FSREPSel == '' || $FSREPSel == '0') { $FSREPSel = $fscartconfig['DefaultCountry']; }
		if (is_numeric($FSREPSel)) {
			$FSSCCountry = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$FSREPSel."' ORDER BY country_name");
		} else {
			$FSSCCountry = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_code = '".$FSREPSel."' ORDER BY country_name");
		}
		$FSSCProvinces = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_provinces WHERE province_visibility = 1 AND country_id = ".$FSSCCountry->country_id." ORDER BY province_name");
		if ($FSSCCountry->country_id == 1) {
			$FSREPOptions = '<option value="">Select a State</option>';
		} elseif (count($FSSCProvinces) == 0) {
			$FSREPOptions = '<option value="Not Applicable">Not Applicable</option>';
		} else {
			$FSREPOptions = '<option value="">Select a Province</option>';
		}
		$count = 0;
		foreach ($FSSCProvinces as $FSSCProvinces) {
			$count++;
			$selected = '';
			if ($_POST['current'] == $FSSCProvinces->province_name) {
				$selected = ' selected';
			}
			$FSREPOptions .= '<option value="'.$FSSCProvinces->province_name.'"'.$selected.'>'.$_POST['current'].' '.$FSSCProvinces->province_name.'</option>';
		}
	}
	
	if($FSREPVar == 'ProvinceID'){
		$CurrencyCode = $wpdb->get_var("SELECT currency_name FROM ".$wpdb->prefix."fssc_currencies WHERE currency_id = ".$_SESSION['currency']);
		$FSSCProvince = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_provinces WHERE province_name = '".$FSREPSel."'");
		$Currency = $wpdb->get_var("SELECT config_value FROM ".$wpdb->prefix."fssc_config WHERE config_name = 'Currency'");
		$TaxName1 = $wpdb->get_var("SELECT config_value FROM ".$wpdb->prefix."fssc_config WHERE config_name = 'TaxName1'");
		$TaxName2 = $wpdb->get_var("SELECT config_value FROM ".$wpdb->prefix."fssc_config WHERE config_name = 'TaxName2'");
		$TaxName3 = $wpdb->get_var("SELECT config_value FROM ".$wpdb->prefix."fssc_config WHERE config_name = 'TaxName3'");
		$_SESSION['taxtable'] = '';
		$_SESSION['DBTaxes'] = '';
		$TotalTax = 0;
		$_SESSION['finalprice'] = $_SESSION['subtotal'];
		if ($TaxName1 != 'not set' && $FSSCProvince->taxvalue1 != 0.00) {
			$Percent = $FSSCProvince->taxvalue1 / 100;
			$Tax = $_SESSION['subtotal'];
			$Tax = $Tax * $Percent;
			$Tax = number_format($Tax,2);
			$TotalTax = $TotalTax + $Tax;
			$_SESSION['taxtable'] .= '<div class="fssc-checkout-details"><label for="subtotal">'.$TaxName1.'</label>'.$_SESSION['currency_symbol'].number_format($Tax,2).' '.$CurrencyCode.'</div>';
			$_SESSION['DBTaxes'] .= $TaxName1.'	'.number_format($Tax,2)."\n";
		}
		if ($TaxName2 != 'not set' && $FSSCProvince->taxvalue2 != 0.00) {
			$Percent = $FSSCProvince->taxvalue2 / 100;
			$Tax = $_SESSION['subtotal'];
			$Tax = $Tax * $Percent;
			$Tax = number_format($Tax,2);
			$TotalTax = $TotalTax + $Tax;
			$_SESSION['taxtable'] .= '<div class="fssc-checkout-details"><label for="subtotal">'.$TaxName2.'</label>'.$_SESSION['currency_symbol'].number_format($Tax,2).' '.$CurrencyCode.'</div>';
			$_SESSION['DBTaxes'] .= $TaxName2.'	'.number_format($Tax,2)."\n";
		}
		if ($TaxName3 != 'not set' && $FSSCProvince->taxvalue3 != 0.00) {
			$Percent = $FSSCProvince->taxvalue3 / 100;
			$Tax = $_SESSION['subtotal'];
			$Tax = $Tax * $Percent;
			$Tax = number_format($Tax,2);
			$TotalTax = $TotalTax + $Tax;
			$_SESSION['taxtable'] .= '<div class="fssc-checkout-details"><label for="subtotal">'.$TaxName3.'</label>'.$_SESSION['currency_symbol'].number_format($Tax,2).' '.$CurrencyCode.'</div>';
			$_SESSION['DBTaxes'] .= $TaxName3.'	'.number_format($Tax,2)."\n";
		}
		
		// UPDATE FINAL PRICE
		$_SESSION['finalprice'] = $_SESSION['finalprice'] + $TotalTax + $_SESSION['shipping'];
	
		$FSREPOptions = 'document.getElementById(\'fssccheckouttaxes\').className=\'\';';
		$FSREPOptions .= 'document.getElementById(\'fssccheckouttaxes\').innerHTML=\''.$_SESSION['taxtable'].'\';';
		$FSREPOptions .= 'document.getElementById(\'fssccheckoutfinalprice\').innerHTML=\''.$_SESSION['currency_symbol'].number_format($_SESSION['finalprice'],2).' '.$CurrencyCode.'\';';
		
		
	}
		
	echo $FSREPOptions;
	die();
	
}
?>
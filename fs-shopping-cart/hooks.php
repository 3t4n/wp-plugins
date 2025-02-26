<?php
// ADMIN MENU HOOK
add_action('admin_menu', 'fssc_admin_pages');
function fssc_admin_pages() {
	global $wpdb,$FSSCExtensions,$fscartconfig,$FSSCPermissions;
	$NewOrders = $wpdb->get_var("SELECT COUNT(orders_status) FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Processing'");
	add_menu_page('FS Ecommerce', 'FS Ecommerce', 10, __FILE__, 'fssc_admin_home');
	add_submenu_page(__FILE__, 'Help & Support', 'Help & Support', 0, __FILE__, 'fssc_admin_home');
	add_submenu_page(__FILE__, 'Orders', 'Orders<span class="awaiting-mod count-'.$NewOrders.'"><span class="pending-count">'.$NewOrders.'</span></span>', 8, 'fssc-orders', 'fssc_orders_page');
	if ($FSSCExtensions['Licenses'] == TRUE) { add_submenu_page(__FILE__, 'Licenses', 'Licenses', 8, 'fssc-licenses', 'fssc_licenses'); }
	if ($FSSCExtensions['Statistics'] == TRUE) { add_submenu_page(__FILE__, 'Statistics', 'Statistics', 8, 'fssc-stats', 'fssc_stats'); }
	add_submenu_page(__FILE__, 'Configuration', 'Configuration', 8, 'fssc-config', 'fssc_config');
	add_submenu_page(__FILE__, 'Categories', 'Categories', 8, 'fssc-categories', 'fssc_categories_page');
	add_submenu_page(__FILE__, 'Products', 'Products', 8, 'fssc-products', 'fssc_products_page');
	if ($fscartconfig['EnableBrands'] == 'TRUE') { add_submenu_page(__FILE__, 'Brands / Vendors', 'Brands', 8, 'fssc-brands', 'fssc_brands_page'); }
	if ($fscartconfig['EnableDistributors'] == 'TRUE' && $FSSCExtensions['Distributors'] == TRUE) { add_submenu_page(__FILE__, 'Distributors', 'Distributors', 8, 'fssc-distributors', 'fssc_distributors_page'); }
	add_submenu_page(__FILE__, 'Deals & Discounts', 'Deals & Discounts', 8, 'fssc-users', 'fssc_users_page');
	add_submenu_page(__FILE__, 'Taxes', 'Taxes', 8, 'fssc-taxes', 'fssc_taxes');
	if ($FSSCExtensions['ProductFinder'] == TRUE) { add_submenu_page(__FILE__, 'Product Finder', 'Product Finder', 8, 'fssc-finder', 'fssc_finder'); }
	if ($FSSCExtensions['Reviews'] == TRUE) { 
		$NewReviews = $wpdb->get_var("SELECT COUNT(review_visibility) FROM ".$wpdb->prefix."fssc_reviews WHERE review_visibility = 0");
		add_submenu_page(__FILE__, 'Reviews', 'Reviews<span class="awaiting-mod count-'.$NewReviews.'"><span class="pending-count">'.$NewReviews.'</span></span>', 8, 'fssc-reviews', 'fssc_reviews'); 
	}
}

add_action('admin_bar_menu', 'fssc_admin_bar', 100);
function fssc_admin_bar() {
	global $wp_admin_bar,$wpdb,$FSSCExtensions,$fscartconfig, $user_ID;
	if ($user_ID == 1) {
		$NewOrders = $wpdb->get_var("SELECT COUNT(orders_status) FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Processing'");
		$wp_admin_bar->add_menu( array(
		'id' => 'fssc_admin_bar',
		'title' => 'FireStorm E-Commerce',
		'href' => admin_url('admin.php?page=fs-shopping-cart/hooks.php'),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_orders',
		'title' => 'Order Management ('.$NewOrders.')',
		'href' => admin_url('admin.php?page=fssc-orders'),
		));
		if ($FSSCExtensions['LICENSES'] == TRUE) { 
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_licenses',
		'title' => 'Licenses',
		'href' => admin_url('admin.php?page=fssc-licenses'),
		));
		}
		if ($FSSCExtensions['Statistics'] == TRUE) { 
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_stats',
		'title' => 'Statistics',
		'href' => admin_url('admin.php?page=fssc-stats'),
		));
		}
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_deals',
		'title' => 'Deals & Discounts',
		'href' => admin_url('admin.php?page=fssc-users'),
		));
		if ($FSSCExtensions['Reviews'] == TRUE) { 
		$NewReviews = $wpdb->get_var("SELECT COUNT(review_visibility) FROM ".$wpdb->prefix."fssc_reviews WHERE review_visibility = 0");
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_reviews',
		'title' => 'Reviews ('.$NewReviews.')',
		'href' => admin_url('admin.php?page=fssc-reviews'),
		));
		}
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_products',
		'title' => 'View All Products',
		'href' => admin_url('admin.php?page=fssc-products'),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_config',
		'title' => 'Configuration',
		'href' => admin_url('admin.php?page=fssc-config'),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_config-sub',
		'title' => 'Configuration',
		'href' => admin_url('admin.php?page=fssc-config'),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_categories',
		'title' => 'Categories',
		'href' => admin_url('admin.php?page=fssc-categories'),
		));
		if ($fscartconfig['EnableBrands'] == 'TRUE') { 
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_brands',
		'title' => 'Brands',
		'href' => admin_url('admin.php?page=fssc-brands'),
		));
		}
		if ($fscartconfig['EnableDistributors'] == 'TRUE' && $FSSCExtensions['Distributors'] == TRUE) { 
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_distributors',
		'title' => 'Distributors',
		'href' => admin_url('admin.php?page=fssc-distributors'),
		));
		}
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_taxes',
		'title' => 'Taxes',
		'href' => admin_url('admin.php?page=fssc-taxes'),
		));
		if ($FSSCExtensions['ProductFinder'] == TRUE) { 
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_config',
		'id' => 'fssc_admin_finder',
		'title' => 'Product Finder',
		'href' => admin_url('admin.php?page=fssc-finder'),
		));
		}
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_bar',
		'id' => 'fssc_admin_support',
		'title' => 'Support',
		'href' => 'http://www.firestormplugins.com/',
		'meta' => array('target' => '_blank',),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_support',
		'id' => 'fssc_admin_support_forum',
		'title' => 'Discussion Forum',
		'href' => 'http://www.firestormplugins.com/forums/',
		'meta' => array('target' => '_blank',),
		));
		$wp_admin_bar->add_menu( array(
		'parent' => 'fssc_admin_support',
		'id' => 'fssc_admin_support_custom',
		'title' => 'Customization',
		'href' => 'http://www.firestormplugins.com/wordpress-customization/',
		'meta' => array('target' => '_blank',),
		));
	}
}

wp_enqueue_style('fssc_main_css', plugins_url('/css/style.css', __FILE__), FALSE, '1.0', 'all');
wp_enqueue_style('fssc_theme_css', plugins_url('/themes/'.$fscartconfig['Theme'].'/style.css', __FILE__), FALSE, '1.0', 'all');

wp_register_style('fssc_main_css_ie6', plugins_url('/css/ie6.css', __FILE__), FALSE, '1.0');
$GLOBALS['wp_styles']->add_data('fssc_main_css_ie6', 'conditional', 'lte IE 6');
wp_enqueue_style('fssc_main_css_ie6');

wp_register_style('fssc_main_css_ie7', plugins_url('/css/ie7.css', __FILE__), FALSE, '1.0');
$GLOBALS['wp_styles']->add_data('fssc_main_css_ie7', 'conditional', 'lte IE 7');
wp_enqueue_style('fssc_main_css_ie7');

wp_register_style('fssc_main_css_ie8', plugins_url('/css/ie8.css', __FILE__), FALSE, '1.0');
$GLOBALS['wp_styles']->add_data('fssc_main_css_ie8', 'conditional', 'lte IE 8');
wp_enqueue_style('fssc_main_css_ie8');

wp_register_style('fssc_main_css_ie9', plugins_url('/css/ie9.css', __FILE__), FALSE, '1.0');
$GLOBALS['wp_styles']->add_data('fssc_main_css_ie9', 'conditional', 'lte IE 9');
wp_enqueue_style('fssc_main_css_ie9');

add_action('wp_head', 'fssc_head');
function fssc_head() {
	global $fscartconfig,$wpdb,$FSSCPages;
	if ($fscartconfig['EnableSSL'] == 1) {
		$Link = str_replace("http://", "https://", get_option('home'));
	} else {
		$Link = get_option('home');
	}

	echo '<script type="text/javascript"> var ajaxurl = "'.admin_url('admin-ajax.php').'"; </script>';

	//wp_enqueue_script('fssc_ajax', plugins_url('/js/ajax.php', __FILE__), FALSE, '1.0', 'all');

	if (preg_match("#/product-finder/#i", $_SERVER['REQUEST_URI'])) {
		wp_enqueue_style('fssc_ajax', plugins_url('/css/ui.dropdownchecklist.css', __FILE__), FALSE, '1.0', 'all');
		wp_enqueue_script('jquery');
		wp_enqueue_style('fssc_ajax', plugins_url('/js/ui.core.js', __FILE__), FALSE, '1.0', 'all');
		wp_enqueue_style('fssc_ajax', plugins_url('/js/ui.dropdownchecklist.js', __FILE__), FALSE, '1.0', 'all');

		echo '<script type="text/javascript">
        $(document).ready(function() {';
				echo '$("#finder_brand").dropdownchecklist({ maxDropHeight: 120, width: 250, emptyText: " All Brands" });';
				$Fields = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_id");
				foreach ($Fields as $Fields) {
					echo '$("#finder_'.$Fields->option_id.'").dropdownchecklist({ maxDropHeight: 120, width: 250, emptyText: " Any" });';
				}
        echo '});
    </script>';
	}	
	// PRODUCT META DESCRIPTION & KEYWORDS
	
	if (preg_match("#/".$FSSCPages['BrandURL']."/#i", $_SERVER['REQUEST_URI'])) {
		$METADescription = '';
		$METAKeywords = '';
		$pageurl = explode("/".$FSSCPages['BrandURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		$pageurl[1] = str_replace("discontinued", "", $pageurl[1]);
		$METADescription = $wpdb->get_var("SELECT brand_meta_description FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'");
		$METAKeywords = $wpdb->get_var("SELECT brand_meta_keywords FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'");
		if (preg_match("#/discontinued/#i", $_SERVER['REQUEST_URI'])) {
			echo "<meta name=\"description\" content=\"".$wpdb->get_var("SELECT brand_name FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '".$pageurl[1]."'")." discontinued products.\" /> \n";
			echo "<meta name=\"keywords\" content=\"\" /> \n";
		} else {
			echo "<meta name=\"description\" content=\"".$METADescription."\" /> \n";
			echo "<meta name=\"keywords\" content=\"".$METAKeywords."\" /> \n";
		}
	} elseif (preg_match("#/".$FSSCPages['ProductsURL']."/#i", $_SERVER['REQUEST_URI'])) {
		$METADescription = '';
		$METAKeywords = '';
		$pageurl = explode("/".$FSSCPages['ProductsURL']."/", $_SERVER['REQUEST_URI']);
		$pageurl[1] = str_replace("/", "", $pageurl[1]);
		if (preg_match('/&/i', $pageurl[1])) {
			$pageurl = explode('?', $pageurl[1]);
			$pageurl[1] = $pageurl[0];
		}
		if (!$pageurl[1]) {
			$METADescription = '';
			$METAKeywords = '';
		} else {
			$CategoryDescription = $wpdb->get_var("SELECT categories_meta_description FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
			$CategoryKeywords = $wpdb->get_var("SELECT categories_meta_keywords FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
			$ProductName = $wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
			if ($CategoryDescription != '') {
				$METADescription = $CategoryDescription;
				$METAKeywords = $CategoryKeywords;
			} elseif($ProductName != '') {
				$METAKeywords = $wpdb->get_var("SELECT products_meta_keywords FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				$METADescription = $wpdb->get_var("SELECT products_meta_description FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				$ProductDescription = $wpdb->get_var("SELECT products_description FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				if ($METADescription == '') {
					$METADescription = strip_tags(substr($ProductDescription,0,160));
					$METADescription = str_replace("\n", " ", $METADescription);
					$METADescription = str_replace("\n", " ", $METADescription);
				}
			}
		}
		
		echo "<meta name=\"description\" content=\"".$METADescription."\" /> \n";
		echo "<meta name=\"keywords\" content=\"".$METAKeywords."\" /> \n";
	}
}


?>
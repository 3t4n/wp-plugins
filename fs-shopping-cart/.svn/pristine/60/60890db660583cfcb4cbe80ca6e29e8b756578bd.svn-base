<?php
function fssc_product_ordering_fix() {
	global $wpdb;
	$ProductOrdering = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories ORDER BY categories_id, products_order");
	$count = 0;
	$CategoryID = 0;
	foreach ($ProductOrdering as $ProductOrdering) {
		if ($CategoryID != $ProductOrdering->categories_id) {
			$CategoryID = $ProductOrdering->categories_id;
			$count = 0;
		}
		$count++;
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_categories SET products_order = $count WHERE products_id = $ProductOrdering->products_id AND categories_id = $ProductOrdering->categories_id");
	}
}

function fssc_products_sub_links ($ProductsPage, $f, $CategoryID, $pid) {
	global $fscartconfig;
	echo '<div class="nav-tabs-nav">';
	echo '<div class="nav-tabs-wrapper">';
	echo '<div class="nav-tabs" style="margin-bottom: 0px;">';
	echo '<span class="nav-tab'; if ($ProductsPage == 'general') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=general&f=edit&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'general') { echo ' font-weight: bold;'; } echo '">General Details</a></span>';
	echo '<span class="nav-tab'; if ($ProductsPage == 'pricing') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=pricing&f=pricing&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'pricing') { echo ' font-weight: bold;'; } echo '">Pricing</a></span>';
	echo '<span class="nav-tab'; if ($ProductsPage == 'acc') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=acc&f=acc&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'acc') { echo ' font-weight: bold;'; } echo '">Accessories</a></span>';
	echo '<span class="nav-tab'; if ($ProductsPage == 'rel') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=rel&f=rel&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'rel') { echo ' font-weight: bold;'; } echo '">Related Products</a></span>';
	echo '<span class="nav-tab'; if ($ProductsPage == 'images') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=images&f=iadd&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'images') { echo ' font-weight: bold;'; } echo '">Images</a></span>';
	if ($fscartconfig['EnableDistributors'] == 'TRUE') { echo '<span class="nav-tab'; if ($ProductsPage == 'distr') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=distr&f=distr&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'distr') { echo ' font-weight: bold;'; } echo '">Distributors</a></span>'; }
	echo '<span class="nav-tab'; if ($ProductsPage == 'filters') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=filters&f=cty&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'filters') { echo ' font-weight: bold;'; } echo '">Filters</a></span>';
	echo '<span class="nav-tab'; if ($ProductsPage == 'finder') { echo ' nav-tab-active" style="background-color: #faf9f9; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-products&fp=finder&f=finder&cid='.$CategoryID.'&pid='.$pid.'" style="text-decoration: none; color: #333333;'; if ($ProductsPage == 'finder') { echo ' font-weight: bold;'; } echo '">Product Finder</a></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<table class="widefat page fixed" cellspacing="0" border="1"><tbody><tr><td>';
	if ($ProductsPage == 'general') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=edit&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'edit') { echo ' style="color: #000000;"'; } echo '>Details</a> | ';
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=var&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'var') { echo ' style="color: #000000;"'; } echo '>Variations</a> | ';
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=cat&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'cat') { echo ' style="color: #000000;"'; } echo '>Categories</a> ';
	} elseif ($ProductsPage == 'pricing') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=pricing&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'pricing') { echo ' style="color: #000000;"'; } echo '>Pricing</a>';
	} elseif ($ProductsPage == 'acc') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=acc&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'acc') { echo ' style="color: #000000;"'; } echo '>Accessories</a> | ';
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=racc&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'racc') { echo ' style="color: #000000;"'; } echo '>Reverse Accessories</a> | ';
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=cacc&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'cacc') { echo ' style="color: #000000;"'; } echo '>Copy Accessories</a> | ';
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=aacc&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'aacc') { echo ' style="color: #000000;"'; } echo '>Auto Accessory</a>';
	} elseif ($ProductsPage == 'rel') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=rel&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'rel') { echo ' style="color: #000000;"'; } echo '>Related Products</a>';
	} elseif ($ProductsPage == 'images') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=iadd&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'iadd') { echo ' style="color: #000000;"'; } echo '>Additional Images</a>';
		echo '';
	} elseif ($ProductsPage == 'distr' && $fscartconfig['EnableDistributors'] == 'TRUE') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=distr&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'distr') { echo ' style="color: #000000;"'; } echo '>Distributors</a>';
	} elseif ($ProductsPage == 'filters') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=cty&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'cty') { echo ' style="color: #000000;"'; } echo '>Country Filter</a>';
	} elseif ($ProductsPage == 'finder') {
		echo '<a href="admin.php?page=fssc-products&fp='.$ProductsPage.'&f=finder&cid='.$CategoryID.'&pid='.$pid.'"'; if ($_GET['f'] == 'finder') { echo ' style="color: #000000;"'; } echo '>Product Finder</a>';
	}
	echo'</td></tr></tbody></table><br><br>';
}

function fssc_products_page() {
	global $wpdb,$fscartconfig,$FSSCExtensions;
		echo '<div class="wrap">';
		if (isset($_GET['pid'])) {
			echo '<h2>Editing '.$wpdb->get_var("SELECT products_part_number FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$_GET['pid']).' <a href="admin.php?page=fssc-products&f=add" class="add-new-h2">Add New</a></h2>';
			echo fssc_products_sub_links($_GET['fp'], $_GET['f'], $_GET['cid'], $_GET['pid']);
		} else {
			echo '<h2>Products <a href="admin.php?page=fssc-products&f=add" class="add-new-h2">Add New</a></h2>';
		}
		$CategoryID = 0;
		if (isset($_GET['cid'])) {
			$CategoryID = $_GET['cid'];
			$CategoryName = $wpdb->get_var("SELECT categories_name FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $CategoryID");
		} 
		if (!isset($_GET['f'])) {
			require_once("forms/products_list.php");
		} elseif ($_GET['f'] == "add" || $_GET['f'] == "edit") {
			require_once("forms/products.php");
		} elseif ($_GET['f'] == "iadd" || $_GET['f'] == "idel") {
			require_once("forms/images.php");
		} elseif ($_GET['f'] == "cat") {
			require_once("forms/product_categories.php");			
		} elseif($_GET['f'] == "acc" || $_GET['f'] == "racc" || $_GET['f'] == "cacc" || $_GET['f'] == "aacc") {
			require_once("forms/accessories.php");			
		} elseif($_GET['f'] == "rel") {
			require_once("forms/related.php");			
		} elseif($_GET['f'] == "distr" && $fscartconfig['EnableDistributors'] == 'TRUE') {
			if (function_exists(fssc_distributors_admin)) { fssc_distributors_admin($_GET['pid'], $_GET['cid']); } else { echo fssc_feature_disabled('Distributors'); }				
		} elseif($_GET['f'] == "pricing") {
			require_once("forms/pricing.php");			
		} elseif($_GET['f'] == "cty") {
			if (function_exists(fssc_product_country_filter)) { fssc_product_country_filter($_GET['pid'], $_GET['cid']); } else { echo fssc_feature_disabled('Country Filter'); }	
		} elseif($_GET['f'] == "var") {
			require_once("forms/variations.php");			
		} elseif($_GET['f'] == "finder") {
			if (function_exists(fssc_product_finder_admin)) { fssc_product_finder_admin($_GET['pid'], $_GET['cid']); } else { echo fssc_feature_disabled('Product Finder'); }	
		}
	echo '</div>';
}
?>
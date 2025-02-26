<?php
	if (isset($_POST['submit'])) {
		
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ListingsTemplate'])."' WHERE config_name = 'ListingsTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DetailsTemplate'])."' WHERE config_name = 'DetailsTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['Theme'])."' WHERE config_name = 'Theme'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['FeaturedProductTemplate'])."' WHERE config_name = 'FeaturedProductTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['TopSellersTemplate'])."' WHERE config_name = 'TopSellersTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MostPopularTemplate'])."' WHERE config_name = 'MostPopularTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['NewProductsTemplate'])."' WHERE config_name = 'NewProductsTemplate'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CatalogHomeDisplayThumbnails'])."' WHERE config_name = 'CatalogHomeDisplayThumbnails'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['AllowProductPages'])."' WHERE config_name = 'AllowProductPages'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductBreadCrumbDisplay'])."' WHERE config_name = 'ProductBreadCrumbDisplay'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductBreadCrumbDisplay'])."' WHERE config_name = 'ProductBreadCrumbDisplay'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['SubCategoryDisplay'])."' WHERE config_name = 'SubCategoryDisplay'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductDescription'])."' WHERE config_name = 'DisplayCategoryPageProductDescription'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductNumber'])."' WHERE config_name = 'DisplayCategoryPageProductNumber'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductStock'])."' WHERE config_name = 'DisplayCategoryPageProductStock'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductPicture'])."' WHERE config_name = 'DisplayCategoryPageProductPicture'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductPrice'])."' WHERE config_name = 'DisplayCategoryPageProductPrice'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductBuyButton'])."' WHERE config_name = 'DisplayCategoryPageProductBuyButton'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CategoryBreadCrumbDisplay'])."' WHERE config_name = 'CategoryBreadCrumbDisplay'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ShowPHeaderPagination'])."' WHERE config_name = 'ShowPHeaderPagination'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ShowFHeaderPagination'])."' WHERE config_name = 'ShowFHeaderPagination'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DefaultProductsPerPage'])."' WHERE config_name = 'DefaultProductsPerPage'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DisplayCategoryPageProductBrand'])."' WHERE config_name = 'DisplayCategoryPageProductBrand'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DefaultCatOrder'])."' WHERE config_name = 'DefaultCatOrder'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ListingsPerLine'])."' WHERE config_name = 'ListingsPerLine'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CategoryToolBar'])."' WHERE config_name = 'CategoryToolBar'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductToolBar'])."' WHERE config_name = 'ProductToolBar'");

		if (function_exists(fssc_prostyling_admin_update)) { $fscartstyle = fssc_prostyling_admin_update($_POST); }

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	} else {
		if (function_exists(fssc_prostyling_config)) { 
			$fscartstyle = fssc_prostyling_config(); 
		}
	}

	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Theme</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	$FSSCThemeChoices = array('Default' => 'default');
	if ($FSSCThemes = opendir(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/')) {
		while (false !== ($FSSCThemeDir = readdir($FSSCThemes))) {
			if ($FSSCThemeDir != '.' && $FSSCThemeDir != '..' && $FSSCThemeDir != 'default') {
				if (file_exists(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/'.$FSSCThemeDir.'/style.css')) {
					$FSSCThemeStyle = file(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/'.$FSSCThemeDir.'/style.css');
					$FSSCAddTheme = array(str_replace('Template Name: ','',$FSSCThemeStyle[1]) => $FSSCThemeDir);
					$FSSCThemeChoices = array_merge($FSSCThemeChoices, $FSSCAddTheme);
				}
			}
		}
		closedir($FSSCThemes);
	}
	fssc_print_admin_selectbox('Store Theme', 'Theme', $fscartconfig['Theme'], $FSSCThemeChoices, '');
	echo '</tbody></table>';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Template</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		$FSSCListingsChoices = array('Delete' => 'delete');
		$FSSCProductChoices = array('Delete' => 'delete');
		if ($FSSCTemplates = opendir(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/'.$fscartconfig['Theme'])) {
			while (false !== ($FSSCTemplateDir = readdir($FSSCTemplates))) {
				if (preg_match('/listings-/i',$FSSCTemplateDir)) {
					$FSSCTemplateStyle = file(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/'.$fscartconfig['Theme'].'/'.$FSSCTemplateDir);
					$FSSCAddTemplate = array(str_replace('Template Name: ','',$FSSCTemplateStyle[2]) => str_replace('listings-','',str_replace('.php','',$FSSCTemplateDir)));
					$FSSCListingsChoices = array_merge($FSSCListingsChoices, $FSSCAddTemplate);
				} elseif (preg_match('/product-/i',$FSSCTemplateDir)) {
					$FSSCTemplateStyle = file(ABSPATH.'/wp-content/plugins/fs-shopping-cart/themes/'.$fscartconfig['Theme'].'/'.$FSSCTemplateDir);
					$FSSCAddTemplate = array(str_replace('Template Name: ','',$FSSCTemplateStyle[2]) => str_replace('product-','',str_replace('.php','',$FSSCTemplateDir)));
					$FSSCProductChoices = array_merge($FSSCProductChoices, $FSSCAddTemplate);
				}
			}
			closedir($FSSCTemplates);
		}
	array_shift($FSSCListingsChoices);
	array_shift($FSSCProductChoices);
	fssc_print_admin_selectbox('Product Listings Template', 'ListingsTemplate', $fscartconfig['ListingsTemplate'], $FSSCListingsChoices, '');
	fssc_print_admin_selectbox('Product Details Template', 'DetailsTemplate', $fscartconfig['DetailsTemplate'], $FSSCProductChoices, '');
	fssc_print_admin_selectbox('Featured Products Template', 'FeaturedProductTemplate', $fscartconfig['FeaturedProductTemplate'], $FSSCListingsChoices, '');
	fssc_print_admin_selectbox('Top Sellers Template', 'TopSellersTemplate', $fscartconfig['TopSellersTemplate'], $FSSCListingsChoices, '');
	fssc_print_admin_selectbox('Most Popular Template', 'MostPopularTemplate', $fscartconfig['MostPopularTemplate'], $FSSCListingsChoices, '');
	fssc_print_admin_selectbox('New Products Template', 'NewProductsTemplate', $fscartconfig['NewProductsTemplate'], $FSSCListingsChoices, '');
	echo '</tbody></table>';
	
	if (function_exists(fssc_prostyling_custom_graphics)) { fssc_prostyling_custom_graphics($fscartstyle); }
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Products Homepage</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Display Thumbnails', 'CatalogHomeDisplayThumbnails', $fscartconfig['CatalogHomeDisplayThumbnails'], array('Yes' => 1, 'No' => 0), '');
	echo '</tbody></table>';


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Product Listing Pages</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		fssc_print_admin_selectbox('Default Product Order', 'DefaultCatOrder', $fscartconfig['DefaultCatOrder'], array('My Custom Order' => 'order', 'Sort by Purchases' => 'purchases', 'Sort by Pageviews' => 'views', 'Sort by Add to Carts' => 'addtocarts', 'Sort by Price' => 'price', 'partnumber' => 'Sort by Part Number', 'Sort by Name' => 'name'), '');
		fssc_print_admin_selectbox('Listings Per Line', 'ListingsPerLine', $fscartconfig['ListingsPerLine'], array(1 => 100, 2 => 50, 3 => 33, 4 => 25, 5 => 20, 6 => 16.66, 7 => 14.28, 8 => 12.5, 9 => 11.11, 10 => 10,), 'For horizontal listings.');
		fssc_print_admin_input('Default Products Per Page', 'DefaultProductsPerPage', $fscartconfig['DefaultProductsPerPage'], 4, '');
		fssc_print_admin_selectbox('Show Header Pagination', 'ShowPHeaderPagination', $fscartconfig['ShowPHeaderPagination'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Disable Tool Bar', 'CategoryToolBar', $fscartconfig['CategoryToolBar'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Show Footer Pagination', 'ShowFHeaderPagination', $fscartconfig['ShowFHeaderPagination'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display SubCategories on Category Pages', 'SubCategoryDisplay', $fscartconfig['SubCategoryDisplay'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Description', 'DisplayCategoryPageProductDescription', $fscartconfig['DisplayCategoryPageProductDescription'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Number', 'DisplayCategoryPageProductNumber', $fscartconfig['DisplayCategoryPageProductNumber'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Brand', 'DisplayCategoryPageProductBrand', $fscartconfig['DisplayCategoryPageProductBrand'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Stock', 'DisplayCategoryPageProductStock', $fscartconfig['DisplayCategoryPageProductStock'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Picture', 'DisplayCategoryPageProductPicture', $fscartconfig['DisplayCategoryPageProductPicture'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Price', 'DisplayCategoryPageProductPrice', $fscartconfig['DisplayCategoryPageProductPrice'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Display Category Page Product Buy Button', 'DisplayCategoryPageProductBuyButton', $fscartconfig['DisplayCategoryPageProductBuyButton'], array('Yes' => 1, 'No' => 0), '');
		fssc_print_admin_selectbox('Category Bread Crumb Display', 'CategoryBreadCrumbDisplay', $fscartconfig['CategoryBreadCrumbDisplay'], array('Yes' => 1, 'No' => 0), '');
		if (function_exists(fssc_prostyling_listing_page)) { fssc_prostyling_listing_page($fscartstyle); }
	echo '</tbody></table>';
	
	
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Product Details Pages</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Allow Product Details Pages', 'AllowProductPages', $fscartconfig['AllowProductPages'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Product Bread Crumb Display', 'ProductBreadCrumbDisplay', $fscartconfig['ProductBreadCrumbDisplay'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Disable Tool Bar', 'ProductToolBar', $fscartconfig['ProductToolBar'], array('Yes' => 1, 'No' => 0), '');
	if (function_exists(fssc_prostyling_details_page)) { fssc_prostyling_details_page($fscartstyle); }
	echo '</tbody></table>';
	
	if (function_exists(fssc_prostyling_viewcart_page)) { fssc_prostyling_viewcart_page($fscartstyle); }

	if (function_exists(fssc_prostyling_checkout_page)) { fssc_prostyling_checkout_page($fscartstyle); }

	if ($FSSCExtensions['ProStyling'] == FALSE) { echo fssc_feature_disabled('Pro Styling'); }
	
?>
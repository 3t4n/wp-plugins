<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['Currency'])."' WHERE config_name = 'Currency'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['PriceTSeparator'])."' WHERE config_name = 'PriceTSeparator'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['PriceCSeparator'])."' WHERE config_name = 'PriceCSeparator'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableMultiCurrency'])."' WHERE config_name = 'EnableMultiCurrency'");
		if ($FSSCExtensions['ProFunctions'] == TRUE) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableIPtoCountry'])."' WHERE config_name = 'EnableIPtoCountry'"); }
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DefaultCountry'])."' WHERE config_name = 'DefaultCountry'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableSSL'])."' WHERE config_name = 'EnableSSL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MaxStandardPictureSize'])."' WHERE config_name = 'MaxStandardPictureSize'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MaxThumbnailSize'])."' WHERE config_name = 'MaxThumbnailSize'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductIdentification'])."' WHERE config_name = 'ProductIdentification'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CartHomeRedirect'])."' WHERE config_name = 'CartHomeRedirect'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CountryLock'])."' WHERE config_name = 'CountryLock'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DigitalDownloadDirectory'])."' WHERE config_name = 'DigitalDownloadDirectory'");
		if ($_POST['DigitalDownloadDirectory'] != $fscartconfig['DigitalDownloadDirectory']) { rename(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory'], ABSPATH."wp-content/uploads/fscart/".$_POST['DigitalDownloadDirectory']); }
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['RemoveDecimals'])."' WHERE config_name = 'RemoveDecimals'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['AlwaysShowBuyButton'])."' WHERE config_name = 'AlwaysShowBuyButton'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}
	
	if (isset($_GET['permalinks'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."options SET option_value = '/%category%/%postname%/' WHERE option_name = 'permalink_structure'");
	}
	if (isset($_GET['pagecheck'])) {
		$Pages = array(
			'Products' => '[fssc-products]',
			'View Cart' => '[fssc-view-cart]',
			'Checkout' => '[fssc-checkout]',
			'My Account' => '[fssc-my-account]'
		);
		fssc_add_pages($Pages);
	}
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Plugin Status</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column">&nbsp;</th>
		</tr>
		</thead>
		<tbody>';
			$Pages = array(
		'Products Page' => '[fssc-products]',
		'View Cart Page' => '[fssc-view-cart]',
		'Checkout Page' => '[fssc-checkout]',
		'My Account Page' => '[fssc-my-account]'
	);
	foreach ($Pages as $Title => $Content) {
		if ($wpdb->get_var("SELECT COUNT(post_content) FROM ".$wpdb->prefix."posts WHERE post_content = '$Content' AND post_status IN ('publish', 'private')") == 0) {
			$PageStatus = '<span style="color: red;">Missing</span>';
			$PageSolution = '<a href="admin.php?page=fssc-config&pagecheck=true" class="button-primary">Automatically Fix</a>';
		} else {
			$PageStatus = '<span style="color: green;">Found</span>';
			$PageSolution = '';
		}
		echo '<tr><td>'.$Title.'</td><td>'.$PageStatus.'</td><td>'.$PageSolution.'</td>';
	}
	$FSREPPermalinkStructure = $wpdb->get_var("SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name = 'permalink_structure'");
	if ($FSREPPermalinkStructure == '') {
		$PermaStatus = '<span style="color: red;">Invalid</span>';
		$PermaSolution = '<a href="admin.php?page=fssc-config&permalinks=fix" class="button-primary">Automatically Fix</a>';
	} else {
		$PermaStatus = '<span style="color: green;">Correct</span>';
		$PermaSolution = '';
	}
	echo '<tr><td>Permalinks Structure</td><td>'.$PermaStatus.'</td><td>'.$PermaSolution.'</td>';
	echo '</tbody></table>';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>General Settings</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Default Currency', 'Currency', $fscartconfig['Currency'], array('USD' => '1', 'CAD' => '2', 'GBP' => '3', 'EUR' => '4', 'AUD' => '5', 'JPY' => '6'), '');
	fssc_print_admin_input('Price Thousand Separator', 'PriceTSeparator', $fscartconfig['PriceTSeparator'], 4, '');
	fssc_print_admin_input('Price Cent Separator', 'PriceCSeparator', $fscartconfig['PriceCSeparator'], 4, '');
	fssc_print_admin_selectbox('Show Buy Button for $0.00 Products', 'AlwaysShowBuyButton', $fscartconfig['AlwaysShowBuyButton'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Remove Zero Decimals', 'RemoveDecimals', $fscartconfig['RemoveDecimals'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Enable Muli-Currency', 'EnableMultiCurrency', $fscartconfig['EnableMultiCurrency'], array('Yes' => 1, 'No' => 0), '');
	if ($FSSCExtensions['ProFunctions'] == TRUE) {
		fssc_print_admin_selectbox('IP to Country Automation', 'EnableIPtoCountry', $fscartconfig['EnableIPtoCountry'], array('Yes' => 1, 'No' => 0), '');
	} else {
		if (function_exists(fssc_print_admin_ext_selectbox)) { fssc_print_admin_ext_selectbox('IP to Country Automation', 'XXXXXXXXXXXXXXXXX', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), FALSE, ''); }
	}
	
	$FSSCCountryChoices = array('United States' => 1, 'Canada' => 2);
	$Countries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 AND country_name != 'United States' AND country_name != 'Canada' ORDER BY country_name");
	foreach ($Countries as $Countries) {
		$FSSCAddCountry = array($Countries->country_name => $Countries->country_id);
		$FSSCCountryChoices = array_merge($FSSCCountryChoices, $FSSCAddCountry);
	}
	fssc_print_admin_selectbox('Default Country', 'DefaultCountry', $fscartconfig['DefaultCountry'], $FSSCCountryChoices, '');
	
	fssc_print_admin_selectbox('Only Ship to Current Country', 'CountryLock', $fscartconfig['CountryLock'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Enable SSL', 'EnableSSL', $fscartconfig['EnableSSL'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_input('Max Thumbnail Size', 'MaxThumbnailSize', $fscartconfig['MaxThumbnailSize'], 4, '');
	fssc_print_admin_input('Max Standard Picture Size', 'MaxStandardPictureSize', $fscartconfig['MaxStandardPictureSize'], 4, '');
	fssc_print_admin_input('Product Identification', 'ProductIdentification', $fscartconfig['ProductIdentification'], 20, 'Examples include: Part Number, Product ID, SKU, etc..');
	fssc_print_admin_selectbox('Redirect Cart Home', 'CartHomeRedirect', $fscartconfig['CartHomeRedirect'], fssc_categories_basic_a(0,0,'','',array('No' => '')), '');
echo '</tbody></table>';

	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Digital Downloads</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_input('Digital Download Directory', 'DigitalDownloadDirectory', $fscartconfig['DigitalDownloadDirectory'], 20, '');
echo '</tbody></table>';
?>

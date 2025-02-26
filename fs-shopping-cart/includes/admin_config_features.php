<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableBrands'])."' WHERE config_name = 'EnableBrands'");
		if (function_exists(fssc_email_purchase_order)) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableDistributors'])."' WHERE config_name = 'EnableDistributors'"); }
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableInventoryManagement'])."' WHERE config_name = 'EnableInventoryManagement'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['InventoryOutofStockWarning'])."' WHERE config_name = 'InventoryOutofStockWarning'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['InventoryLowStockWarning'])."' WHERE config_name = 'InventoryLowStockWarning'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['InventoryWarnLimit'])."' WHERE config_name = 'InventoryWarnLimit'");
		
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProFunctionsL'])."' WHERE config_name = 'ProFunctionsL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProStylingL'])."' WHERE config_name = 'ProStylingL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MultiCurrencyL'])."' WHERE config_name = 'MultiCurrencyL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['UserTypesL'])."' WHERE config_name = 'UserTypesL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['GFLikesL'])."' WHERE config_name = 'GFLikesL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ReviewsL'])."' WHERE config_name = 'ReviewsL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['AmazonL'])."' WHERE config_name = 'DistributorsL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['DistributorsL'])."' WHERE config_name = ''");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['GoogleShoppingL'])."' WHERE config_name = 'GoogleShoppingL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['AffiliatesL'])."' WHERE config_name = 'AffiliatesL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['RebatesL'])."' WHERE config_name = 'RebatesL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductFinderL'])."' WHERE config_name = 'ProductFinderL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MailChimpL'])."' WHERE config_name = 'MailChimpL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['StatisticsL'])."' WHERE config_name = 'StatisticsL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['LicensesL'])."' WHERE config_name = 'LicensesL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['FedExL'])."' WHERE config_name = 'FedExL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['FPDFL'])."' WHERE config_name = 'FPDFL'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['UPSL'])."' WHERE config_name = 'UPSL'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Plugin Extensions</b></th>
		<th scope="col" class="manage-column" width="250"><b>License</b> (<a href="http://www.firestormplugins.com/my-account/" target="_blank">view licenses</a>)</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_ext('Pro Features', 'ProFunctions', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['ProFunctions'], $FSSCExtensions['ProFunctionsV']);
	fssc_print_admin_ext('Pro Styling', 'ProStyling', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['ProStyling'], $FSSCExtensions['ProStylingV']);
	fssc_print_admin_ext('Styling', 'Styling', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Styling'], $FSSCExtensions['StylingV']);
	fssc_print_admin_ext('Multi Currency', 'MultiCurrency', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['MultiCurrency'], $FSSCExtensions['MultiCurrencyV']);
	fssc_print_admin_ext('User Types', 'UserTypes', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['UserTypes'], $FSSCExtensions['UserTypesV']);
	fssc_print_admin_ext('Like & +1', 'GFLikes', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['GFLikes'], $FSSCExtensions['GFLikesV']);
	fssc_print_admin_ext('Statistics', 'Statistics', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Statistics'], $FSSCExtensions['StatisticsV']);
	fssc_print_admin_ext('Mail Chimp', 'MailChimp', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['MailChimp'], $FSSCExtensions['MailChimpV']);
	fssc_print_admin_ext('Product Reviews', 'Reviews', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Reviews'], $FSSCExtensions['ReviewsV']);
	fssc_print_admin_ext('Amazon', 'Amazon', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Amazon'], $FSSCExtensions['AmazonV']);
	fssc_print_admin_ext('Product Finder', 'ProductFinder', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['ProductFinder'], $FSSCExtensions['ProductFinderV']);
	fssc_print_admin_ext('Distributors', 'Distributors', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Distributors'], $FSSCExtensions['DistributorsV']);
	fssc_print_admin_ext('Google Shopping Feed', 'GoogleShopping', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['GoogleShopping'], $FSSCExtensions['GoogleShoppingV']);
	fssc_print_admin_ext('Affiliate System', 'Affiliates', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Affiliates'], $FSSCExtensions['AffiliatesV']);
	fssc_print_admin_ext('Licenses', 'Licenses', $fscartconfig[''], array('Disabled' => '0', 'Enabled' => '1'), $FSSCExtensions['Licenses'], $FSSCExtensions['LicensesV']);
	echo '</tbody></table>';


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Standard Features</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Enable Brands', 'EnableBrands', $fscartconfig['EnableBrands'], array('Yes' => 'TRUE', 'No' => 'FALSE'), '');
	if (function_exists(fssc_email_purchase_order)) { fssc_print_admin_selectbox('Enable Distributors', 'EnableDistributors', $fscartconfig['EnableDistributors'], array('Yes' => 'TRUE', 'No' => 'FALSE'), ''); }
	echo '</tbody></table>';

	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Inventory Management</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Enable Inventory Management', 'EnableInventoryManagement', $fscartconfig['EnableInventoryManagement'], array('Yes' => '1', 'No' => '0'), '');
	if ($fscartconfig['EnableInventoryManagement'] == 1) {
		fssc_print_admin_selectbox('Out of Stock Notification', 'InventoryOutofStockWarning', $fscartconfig['InventoryOutofStockWarning'], array('Yes' => '1', 'No' => '0'), '');
		fssc_print_admin_selectbox('Low in Stock Notification', 'InventoryLowStockWarning', $fscartconfig['InventoryLowStockWarning'], array('Yes' => '1', 'No' => '0'), '');
		fssc_print_admin_input('Low Stock Amount', 'InventoryWarnLimit', $fscartconfig['InventoryWarnLimit'], 3, '');
	}
	echo '</tbody></table>';
	
	if (function_exists(fssc_licenses_admin)) { echo fssc_licenses_admin(); }

?>
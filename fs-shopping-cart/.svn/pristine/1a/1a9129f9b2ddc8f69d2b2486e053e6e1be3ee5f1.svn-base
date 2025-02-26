<?php
	if (isset($_POST['submit'])) {
		if ($FSSCExtensions['Statistics'] == TRUE) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['StatsPricingShipping'])."' WHERE config_name = 'StatsPricingShipping'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['StatsPricingMerchFees'])."' WHERE config_name = 'StatsPricingMerchFees'");
		}
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['GoogleAnalyticsID'])."' WHERE config_name = 'GoogleAnalyticsID'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnableAnalyticsEcommerce'])."' WHERE config_name = 'EnableAnalyticsEcommerce'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ContactManagement'])."' WHERE config_name = 'ContactManagement'");
		if ($fscartconfig['ContactManagement'] == 'mailchimp') {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MailChimpAPI'])."' WHERE config_name = 'MailChimpAPI'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MailChimpListID'])."' WHERE config_name = 'MailChimpListID'");
		}
		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Google Analytics</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_input('Google Analytics ID', 'GoogleAnalyticsID', $fscartconfig['GoogleAnalyticsID'], 10, 'Example: UA-XXXXXX-X');
	fssc_print_admin_selectbox('Enable Ecommerce Tracking', 'EnableAnalyticsEcommerce', $fscartconfig['EnableAnalyticsEcommerce'], array('Yes' => 1, 'No' => 0), '');
	echo '</tbody></table>';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Statatistic Settings</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		if ($FSSCExtensions['Statistics'] == TRUE) {
			fssc_print_admin_input('Average Shipping Costs $', 'StatsPricingShipping', $fscartconfig['StatsPricingShipping'], 10, '');
			fssc_print_admin_input('Average Merchant Fees %', 'StatsPricingMerchFees', $fscartconfig['StatsPricingMerchFees'], 10, '');
		} else {
			fssc_feature_disabled_mini();
		}
	echo '</tbody></table>';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Contact Management</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		$FSSCContactManagement = array('Disable Tracking' => '');
		if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/mailchimp.php')) {
			$TempArray = array('Mail Chimp' => 'mailchimp');
			$FSSCContactManagement = array_merge($FSSCContactManagement, $TempArray);
		}
		if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/constantcontact.php')) {
			$TempArray = array('Constant Contact' => 'constantcontact');
			$FSSCContactManagement = array_merge($FSSCContactManagement, $TempArray);
		}
		fssc_print_admin_selectbox('Contact Management', 'ContactManagement', $fscartconfig['ContactManagement'], $FSSCContactManagement, '');
		if ($fscartconfig['ContactManagement'] == 'mailchimp') {
			fssc_print_admin_input('Mail Chimp API', 'MailChimpAPI', $fscartconfig['MailChimpAPI'], 20, '');
			fssc_print_admin_input('Mail Chimp List ID', 'MailChimpListID', $fscartconfig['MailChimpListID'], 20, '');
		}
	echo '</tbody></table>';

?>
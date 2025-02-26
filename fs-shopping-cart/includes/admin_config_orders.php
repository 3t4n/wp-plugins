<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['PercentageIncreasePricing'])."' WHERE config_name = 'PercentageIncreasePricing'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderNumber'])."' WHERE config_name = 'OrderNumber'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CheckoutErrorNotification'])."' WHERE config_name = 'CheckoutErrorNotification'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderRecipient'])."' WHERE config_name = 'OrderRecipient'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderSenderName'])."' WHERE config_name = 'OrderSenderName'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderSenderEmail'])."' WHERE config_name = 'OrderSenderEmail'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderThankYouMessage'])."' WHERE config_name = 'OrderThankYouMessage'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['OrderEmailMessage'])."' WHERE config_name = 'OrderEmailMessage'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['TrackingNotification'])."' WHERE config_name = 'TrackingNotification'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['EnablePO'])."' WHERE config_name = 'EnablePO'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['PONumber'])."' WHERE config_name = 'PONumber'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['POSubject'])."' WHERE config_name = 'POSubject'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['POSpecialInstructions'])."' WHERE config_name = 'POSpecialInstructions'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['POAutoSendToDistributor'])."' WHERE config_name = 'POAutoSendToDistributor'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['POAddress'])."' WHERE config_name = 'POAddress'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>General Settings</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Percentage Increase Pricing', 'PercentageIncreasePricing', $fscartconfig['PercentageIncreasePricing'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_input('Next Order Number', 'OrderNumber', $fscartconfig['OrderNumber'], 8, '');
	fssc_print_admin_selectbox('Checkout Error Notification', 'CheckoutErrorNotification', $fscartconfig['CheckoutErrorNotification'], array('Yes' => 1, 'No' => 0), '');

	echo '</tbody></table>';


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Shopping Cart</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_input('Order Recipient', 'OrderRecipient', $fscartconfig['OrderRecipient'], 20, '');
	fssc_print_admin_input('Order Sender Name', 'OrderSenderName', $fscartconfig['OrderSenderName'], 20, '');
	fssc_print_admin_input('Order Sender Email', 'OrderSenderEmail', $fscartconfig['OrderSenderEmail'], 20, '');
	fssc_print_admin_input('Order Thank You Message', 'OrderThankYouMessage', $fscartconfig['OrderThankYouMessage'], 20, '');
	fssc_print_admin_textarea('Tracking Notification', 'TrackingNotification', $fscartconfig['TrackingNotification'], 40, 5, '');
	fssc_print_admin_textarea('Order Thank You Message', 'OrderEmailMessage', $fscartconfig['OrderEmailMessage'], 40, 5, '');
	echo '</tbody></table>';

	if ($FSSCExtensions['Distributors'] == TRUE) {
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
			<thead>
			<tr>
			<th scope="col" class="manage-column" width="200"><b>Purchase Orders</b></th>
			<th scope="col" class="manage-column" width="250">&nbsp;</th>
			<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tbody>';
		fssc_print_admin_selectbox('Enable Purchase Orders', 'EnablePO', $fscartconfig['EnablePO'], array('Yes' => 'Yes', 'No' => 'No'), '');
		fssc_print_admin_input('Next Purchase Order #', 'PONumber', $fscartconfig['PONumber'], 8, '');
		fssc_print_admin_input('PO Email Subject', 'POSubject', $fscartconfig['POSubject'], 20, '');
		fssc_print_admin_input('PO Special Instructions', 'POSpecialInstructions', $fscartconfig['POSpecialInstructions'], 20, '');
		fssc_print_admin_selectbox('Automatically Send PO to Distributor', 'POAutoSendToDistributor', $fscartconfig['POAutoSendToDistributor'], array('Yes' => 'Yes', 'No' => 'No'), '');
		fssc_print_admin_textarea('PO Display Address', 'POAddress', $fscartconfig['POAddress'], 40, 5, '');
		echo '</tbody></table>';
	}

?>
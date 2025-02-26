<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PaymentEnableEmailOrder']."' WHERE config_name = 'PaymentEnableEmailOrder'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PaymentEnablePayPal']."' WHERE config_name = 'PaymentEnablePayPal'");
		if ($fscartconfig['PaymentEnablePayPal'] == 1) { 
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PayPalExpressUsername']."' WHERE config_name = 'PayPalExpressUsername'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PayPalExpressPassword']."' WHERE config_name = 'PayPalExpressPassword'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PayPalExpressSignature']."' WHERE config_name = 'PayPalExpressSignature'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PayPalExpressEnvironment']."' WHERE config_name = 'PayPalExpressEnvironment'");
		}
		if (file_exists(ABSPATH.'/wp-content/plugins/fs-shopping-cart/gateways/googlecheckout/gateway.php')) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PaymentEnableGoogleCheckout']."' WHERE config_name = 'PaymentEnableGoogleCheckout'"); 
		}
		if ($fscartconfig['PaymentEnableGoogleCheckout'] == 1) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['GoogleCheckoutMerchantNumber']."' WHERE config_name = 'GoogleCheckoutMerchantNumber'"); }
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PaymentEnableCreditCard']."' WHERE config_name = 'PaymentEnableCreditCard'");
		if ($_POST['PaymentEnableCreditCard'] == 1) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['PaymentGateway']."' WHERE config_name = 'PaymentGateway'");
		} else {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '' WHERE config_name = 'PaymentGateway'");
		}
		
		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}

	} 
	
	
	echo '<form action="#" name="gateways" method="POST">';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Payment Types</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Email Orders', 'PaymentEnableEmailOrder', $fscartconfig['PaymentEnableEmailOrder'], array('Enable' => 1, 'Disable' => 0), '');
	fssc_print_admin_selectbox('PayPal Express', 'PaymentEnablePayPal', $fscartconfig['PaymentEnablePayPal'], array('Enable' => 1, 'Disable' => 0), '');
	if (file_exists(ABSPATH.'/wp-content/plugins/fs-shopping-cart/gateways/googlecheckout/gateway.php')) {
		fssc_print_admin_selectbox('Google Checkout', 'PaymentEnableGoogleCheckout', $fscartconfig['PaymentEnableGoogleCheckout'], array('Enable' => 1, 'Disable' => 0), '');
	}
	fssc_print_admin_selectbox('Credit Card', 'PaymentEnableCreditCard', $fscartconfig['PaymentEnableCreditCard'], array('Enable' => 1, 'Disable' => 0), '');
	echo '</tbody></table>';
	
	if ($fscartconfig['PaymentEnablePayPal'] == 1) { 
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
			<thead>
			<tr>
			<th scope="col" class="manage-column" width="200"><b>PayPal Express Settings</b></th>
			<th scope="col" class="manage-column" width="250">&nbsp;</th>
			<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tbody>';
			fssc_print_admin_input('PayPal Express API Username', 'PayPalExpressUsername', $fscartconfig['PayPalExpressUsername'], 20, 'PayPal Express API credentials can be obtained by logging into your PayPal account and clicking the <b>Request API credentials</b> link within your profile.');
			fssc_print_admin_input('PayPal Express API Password', 'PayPalExpressPassword', $fscartconfig['PayPalExpressPassword'], 20, '');
			fssc_print_admin_input('PayPal Express API Signature', 'PayPalExpressSignature', $fscartconfig['PayPalExpressSignature'], 20, '');
			fssc_print_admin_selectbox('Live / Sandbox Server', 'PayPalExpressEnvironment', $fscartconfig['PayPalExpressEnvironment'], array('Live' => ';ive', 'Sandbox' => 'sandbox'), '');
		echo '</tbody></table>';
	}
	if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/googlecheckout.php') && $fscartconfig['PaymentEnableGoogleCheckout'] == 1) { 
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
			<thead>
			<tr>
			<th scope="col" class="manage-column" width="200"><b>Google Checkout Settings</b></th>
			<th scope="col" class="manage-column" width="250">&nbsp;</th>
			<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tbody>';
			fssc_print_admin_input('Merchant Number', 'GoogleCheckoutMerchantNumber', $fscartconfig['GoogleCheckoutMerchantNumber'], 20, '');
		echo '</tbody></table>';
	}
	
	
	
	
	if ($fscartconfig['PaymentEnableCreditCard'] == 1) { 
		$FSSCGatewayChoices = array('None' => '');
		if ($FSSCGateways = opendir(ABSPATH.'/wp-content/plugins/fs-shopping-cart/gateways/')) {
			while (false !== ($FSSCGatewayDir = readdir($FSSCGateways))) {
				if ($FSSCGatewayDir != '.' && $FSSCGatewayDir != '..' && $FSSCGatewayDir != 'custom') {
					if (file_exists(ABSPATH.'/wp-content/plugins/fs-shopping-cart/gateways/'.$FSSCGatewayDir.'/gateway.php')) {
						$FSSCGatewayName = file(ABSPATH.'/wp-content/plugins/fs-shopping-cart/gateways/'.$FSSCGatewayDir.'/gateway.php');
						$FSSCAddGateway = array(str_replace('Gateway Name: ','',$FSSCGatewayName[2]) => $FSSCGatewayDir);
						$FSSCGatewayChoices = array_merge($FSSCGatewayChoices, $FSSCAddGateway);
					}
				}
			}
			closedir($FSSCGateways);
			$FSSCAddGateway = array('Custom' => 'custom');
			$FSSCGatewayChoices = array_merge($FSSCGatewayChoices, $FSSCAddGateway);
		}
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Credit Card Gateway</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		fssc_print_admin_selectbox('Credit Card Gateway', 'PaymentGateway', $fscartconfig['PaymentGateway'], $FSSCGatewayChoices, ''); 
		echo '</tbody></table>';
		
		if ($fscartconfig['PaymentGateway'] != '') { 
			if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/'.$fscartconfig['PaymentGateway'].'/gateway.php')) { require_once(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/'.$fscartconfig['PaymentGateway'].'/gateway.php'); } 
			if (function_exists(fssc_ccgateway_admin)) {
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200"><b>Gateway Settings</b></th>
				<th scope="col" class="manage-column" width="250">&nbsp;</th>
				<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
				</tr>
				</thead>
				<tbody>';
				fssc_ccgateway_admin($_POST);
				echo '</tbody></table>';
			}
		}
	}
	
	echo '</form>';
		
	//fssc_gateway_paypalpro_admin ($_POST); // PAYPAL PRO
	//fssc_gateway_authorizenet_admin ($_POST); // AUTHORIZE.NET
?>
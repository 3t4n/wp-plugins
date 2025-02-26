<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ProductBuyButtonText'])."' WHERE config_name = 'ProductBuyButtonText'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['CheckoutButtonText'])."' WHERE config_name = 'CheckoutButtonText'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ViewCartCheckoutText'])."' WHERE config_name = 'ViewCartCheckoutText'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['ViewCartContinueShoppingText'])."' WHERE config_name = 'ViewCartContinueShoppingText'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['SupportedCreditCards'])."' WHERE config_name = 'SupportedCreditCards'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}


	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Wording</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_input('Product Buy Button Text', 'ProductBuyButtonText', $fscartconfig['ProductBuyButtonText'], 20, '');
	fssc_print_admin_input('View Cart Continue Shopping Button Text', 'ViewCartContinueShoppingText', $fscartconfig['ViewCartContinueShoppingText'], 20, '');
	fssc_print_admin_input('View Cart Checkout Button Text', 'ViewCartCheckoutText', $fscartconfig['ViewCartCheckoutText'], 20, '');
	fssc_print_admin_input('Checkout Button Text', 'CheckoutButtonText', $fscartconfig['CheckoutButtonText'], 20, '');
	fssc_print_admin_input('Supported Credit Cards', 'SupportedCreditCards', $fscartconfig['SupportedCreditCards'], 20, '');
	echo '</tbody></table>';
?>
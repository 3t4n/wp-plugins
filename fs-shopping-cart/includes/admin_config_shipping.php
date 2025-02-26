<?php
if (isset($_POST['submit'])) {
	
	if (isset($_POST['ShippingType'])) {	
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['ShippingType']."' WHERE config_name = 'ShippingType'");
	} else {
		if ($fscartconfig['ShippingType'] == 'Fixed') {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['ShippingFixedRate']."' WHERE config_name = 'ShippingFixedRate'");
		} elseif ($fscartconfig['ShippingType'] == 'Percentage') {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['ShippingPercentageRate']."' WHERE config_name = 'ShippingPercentageRate'");
		} elseif ($fscartconfig['ShippingType'] == 'Fixed Table' || $fscartconfig['ShippingType'] == 'Percentage Table') {
			$ShippingCosts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_shipping_costs ORDER BY shipping_cost_id");
			foreach ($ShippingCosts as $ShippingCosts) {
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_shipping_costs SET shipping_cost_cost = '".$_POST[$ShippingCosts->shipping_cost_id.'-shipping_cost']."' WHERE shipping_cost_id = ".$ShippingCosts->shipping_cost_id);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_shipping_costs SET shipping_cost_range1 = '".$_POST[$ShippingCosts->shipping_cost_id.'-shipping_cost_range1']."' WHERE shipping_cost_id = ".$ShippingCosts->shipping_cost_id);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_shipping_costs SET shipping_cost_range2 = '".$_POST[$ShippingCosts->shipping_cost_id.'-shipping_cost_range2']."' WHERE shipping_cost_id = ".$ShippingCosts->shipping_cost_id);
			}
		}
	}
		
	$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
	while($dbfscartconfig = mysql_fetch_array($sql)) {
		$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
	}
}

echo '<form action="admin.php?page=fssc-config&f=shipping" name="shipping-type" method="POST">';
echo '<table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" class="manage-column" width="200"><b>Shipping Service</b></th>
	<th scope="col" class="manage-column" width="250">&nbsp;</th>
	<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
	</tr>
	</thead>
	<tbody>';
	$ShippingServices = array(
														'Fixed Amount' => 'Fixed', 
														'Percentage' => 'Percentage',
														'Fixed Table' => 'Fixed Table',
														'Percentage Table' => 'Percentage Table',
														'FedEx' => 'FedEx',
														'UPS' => 'UPS'
													 );
	fssc_print_admin_selectbox('Shipping Service', 'ShippingType', $fscartconfig['ShippingType'], $ShippingServices, '');
	echo '</tbody></table></form>';
	echo '<form action="admin.php?page=fssc-config&f=shipping" name="shipping-type" method="POST">';
if ($fscartconfig['ShippingType'] == 'UPS') {
	if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/ups/upsadmin.php')) { require_once(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/ups/upsadmin.php'); fssc_ups_admin($_POST); }
} elseif ($fscartconfig['ShippingType'] == 'FedEx') {
	if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/fedex/fedexadmin.php')) { require_once(ABSPATH.'wp-content/plugins/fs-shopping-cart/extensions/fedex/fedexadmin.php'); fssc_fedex_admin($_POST); }
} elseif ($fscartconfig['ShippingType'] == 'Fixed Table' || $fscartconfig['ShippingType'] == 'Percentage Table') {
	echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column">Cost</th>
		<th scope="col" id="title" colspan="4" class="manage-column">Price Ranges</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" id="title" colspan="5" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Shipping Costs" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
	if ($fscartconfig['ShippingType'] == 'Fixed Table') {
		$Dollar = $_SESSION['currency_symbol'];
		$Percentage = '';
	} else {
		$Dollar = '';
		$Percentage = '%';
	}
	$ShippingCosts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_shipping_costs ORDER BY shipping_cost_id");
	foreach ($ShippingCosts as $ShippingCosts) {
		
		echo '<tr><td width="100">'.$Dollar.'<input type="text" name="'.$ShippingCosts->shipping_cost_id.'-shipping_cost" value="'.$ShippingCosts->shipping_cost_cost.'" size="5">'.$Percentage.'</td>';
		echo '<td width="100">'.$_SESSION['currency_symbol'].'<input type="text" name="'.$ShippingCosts->shipping_cost_id.'-shipping_cost_range1" value="'.$ShippingCosts->shipping_cost_range1.'" size="5"></td>';
		echo '<td width="10">-</td>';
		echo '<td width="100">'.$_SESSION['currency_symbol'].'<input type="text" name="'.$ShippingCosts->shipping_cost_id.'-shipping_cost_range2" value="'.$ShippingCosts->shipping_cost_range2.'" size="5"></td>';
		echo '<td>&nbsp;</td></tr>';
	}
	echo '</tbody></table>';
} else {
	if ($fscartconfig['ShippingType'] == 'Fixed') {
		$Dollar = $_SESSION['currency_symbol'];
		$Percentage = '';
		$TableTitle = 'Fixed Cost';
		$InputName = 'ShippingFixedRate';
		$InputValue = $fscartconfig['ShippingFixedRate'];
	} else {
		$Dollar = '';
		$Percentage = '%';
		$TableTitle = 'Percentage Cost';
		$InputName = 'ShippingPercentageRate';
		$InputValue = $fscartconfig['ShippingPercentageRate'];
	}
	echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column">'.$TableTitle.'</th>
		</tr>
		</thead>
		<tfoot
		<tr>
		<th scope="col" id="title" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Shipping Costs" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
	echo '<tr><th>'.$Dollar.'<input type="text" name="'.$InputName.'" value="'.$InputValue.'" size="5">'.$Percentage.'</th></tr>';
	echo '</tbody></table>';
}
echo '</form>';
?>
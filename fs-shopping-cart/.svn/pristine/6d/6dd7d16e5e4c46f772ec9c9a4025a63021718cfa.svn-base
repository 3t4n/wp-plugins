<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['Currency'])."' WHERE config_name = 'Currency'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}

	$FSSCCurrencies = array('USD' => '1');
	$AllCurrencies = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_currencies WHERE currency_id != 1 ORDER BY currency_id");
	foreach ($AllCurrencies as $AllCurrencies) {
		$TempArray = array($AllCurrencies->currency_name => $AllCurrencies->currency_id);
		$FSSCCurrencies = array_merge($FSSCCurrencies, $TempArray);
	}
		
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Default Currency</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Default Currency', 'Currency', $fscartconfig['Currency'], $FSSCCurrencies, '');
echo '</tbody></table>';


if (function_exists(fssc_currency_admin)) { echo fssc_currency_admin(); } else { echo fssc_feature_disabled('Multi-Currency'); }

?>

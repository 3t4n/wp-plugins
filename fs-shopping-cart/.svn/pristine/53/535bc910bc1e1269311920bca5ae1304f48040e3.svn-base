<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['StoreRequiresLogin'])."' WHERE config_name = 'StoreRequiresLogin'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['PurchaseRequiresLogin'])."' WHERE config_name = 'PurchaseRequiresLogin'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['RequireTaxId'])."' WHERE config_name = 'RequireTaxId'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['RequireResaleCertificate'])."' WHERE config_name = 'RequireResaleCertificate'");

		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Registration</b></th>
		<th scope="col" class="manage-column" width="250">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
	fssc_print_admin_selectbox('Login Required to View Products', 'StoreRequiresLogin', $fscartconfig['StoreRequiresLogin'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Login Required to Purchase', 'PurchaseRequiresLogin', $fscartconfig['PurchaseRequiresLogin'], array('Yes' => 1, 'No' => 0), '');
	fssc_print_admin_selectbox('Company Tax ID', 'RequireTaxId', $fscartconfig['RequireTaxId'], array('Hide' => 'Hide', 'Show / Not Required' => 'Show / Not Required', 'Show / Required' => 'Show / Required'), '');
	fssc_print_admin_selectbox('Company Resale Certificate', 'RequireResaleCertificate', $fscartconfig['RequireResaleCertificate'], array('Hide' => 'Hide', 'Show / Not Required' => 'Show / Not Required', 'Show / Required' => 'Show / Required'), '');
	echo '</tbody></table>';


?>
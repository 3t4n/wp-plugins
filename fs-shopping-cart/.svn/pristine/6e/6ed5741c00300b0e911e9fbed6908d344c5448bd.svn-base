<?php
	if($_GET['f'] == "acc" && isset($_GET['pid']) && is_numeric($_GET['pid'])) {
		if (isset($_POST['submit'])) {
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_accessories WHERE products_id = ".$_GET['pid']);
			$Products = $wpdb->get_results("SELECT products_id FROM ".$wpdb->prefix."fssc_products WHERE products_id != ".$_GET['pid']);
			foreach($Products as $Products) {
				if (isset($_POST[$Products->products_id])) {
					$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_accessories (products_id, accessory_id) VALUES (".$_GET['pid'].", ".$Products->products_id.") ");
				}
			}
			echo '<div id="message" class="updated fade"><p><strong>Your accessories have been updated.</strong></p></div>';
		}
		echo '<h2>Accessories</h2>';
		echo '<form name="add-product" action="admin.php?page=fssc-products&fp=acc&f=acc&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'" method="POST">';
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Accessories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Accessories" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Accessories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Accessories" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
		$Products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id != ".$_GET['pid']." ORDER BY products_name");
		foreach($Products as $Products) {
			$checked = '';
			if ($wpdb->get_var("SELECT * FROM ".$wpdb->prefix."fssc_products_accessories WHERE products_id = ".$_GET['pid']." AND accessory_id = ".$Products->products_id) > 0) {
				$checked = ' checked';
			}
			echo '<tr><td colspan="2"><input type="checkbox" value="1" name="'.$Products->products_id.'"'.$checked.'> '.$Products->products_name.'</td></tr>';
		}
		echo '</tbody></table></form>';
	} elseif($_GET['f'] == "racc" && isset($_GET['pid']) && is_numeric($_GET['pid'])) {
		if (isset($_POST['submit'])) {
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_accessories WHERE accessory_id = ".$_GET['pid']);
			$Products = $wpdb->get_results("SELECT products_id FROM ".$wpdb->prefix."fssc_products");
			foreach($Products as $Products) {
				if (isset($_POST[$Products->products_id])) {
					$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_accessories (products_id, accessory_id) VALUES (".$Products->products_id.", ".$_GET['pid'].") ");
				}
			}
			echo '<div id="message" class="updated fade"><p><strong>Your accessories have been updated.</strong></p></div>';
		}
		echo '<h2>Reverse Accessory Association</h2>';
		echo '<form name="add-product" action="admin.php?page=fssc-products&fp=acc&f=racc&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'" method="POST">';
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Accessories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Accessories" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Accessories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Accessories" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
		$Products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id != ".$_GET['pid']." ORDER BY products_name");
		foreach($Products as $Products) {
			$checked = '';
			if ($wpdb->get_var("SELECT * FROM ".$wpdb->prefix."fssc_products_accessories WHERE accessory_id = ".$_GET['pid']." AND products_id = ".$Products->products_id) > 0) {
				$checked = ' checked';
			}
			echo '<tr><td colspan="2"><input type="checkbox" value="1" name="'.$Products->products_id.'"'.$checked.'> '.$Products->products_name.'</td></tr>';
		}
		echo '</tbody></table></form>';
	} elseif($_GET['f'] == "cacc" && isset($_GET['pid']) && is_numeric($_GET['pid'])) {
		if ($FSSCExtensions['ProFunctions'] == TRUE) { fssc_copy_accessory_admin(); } else { echo fssc_feature_disabled('Copy Accessories'); }
	} elseif($_GET['f'] == "aacc" && isset($_GET['pid']) && is_numeric($_GET['pid'])) {
		if ($FSSCExtensions['ProFunctions'] == TRUE) { fssc_auto_accessory_admin(); } else { echo fssc_feature_disabled('Auto Accessory'); }
	}

?>
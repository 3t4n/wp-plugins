<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_related WHERE products_id = ".$_GET['pid']);
		$Products = $wpdb->get_results("SELECT products_id FROM ".$wpdb->prefix."fssc_products");
		foreach($Products as $Products) {
			if (isset($_POST[$Products->products_id])) {
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_related (products_id, related_id) VALUES (".$_GET['pid'].", ".$Products->products_id.") ");
			}
		}
		echo '<div id="message" class="updated fade"><p><strong>Your related products have been updated.</strong></p></div>';
	}
		echo '<h2>Related Products</h2>';
		echo '<form name="add-product" action="admin.php?page=fssc-products&fp=rel&f=rel&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'" method="POST">';
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Products</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Related Products" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Products</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Related Products" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
		$Products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id != ".$_GET['pid']." ORDER BY products_name");
		foreach($Products as $Products) {
			$checked = '';
			if ($wpdb->get_var("SELECT * FROM ".$wpdb->prefix."fssc_products_related WHERE products_id = ".$_GET['pid']." AND related_id = ".$Products->products_id) > 0) {
				$checked = ' checked';
			}
			echo '<tr><td colspan="2"><input type="checkbox" value="1" name="'.$Products->products_id.'"'.$checked.'> '.$Products->products_name.'</td></tr>';
		}
		echo '</tbody></table></form>';
?>
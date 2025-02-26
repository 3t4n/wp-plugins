<?php
function fssc_products_to_categories_checkbox ($ParentID, $Level, $ProductID) {
	global $wpdb;
	$Level = $Level + 1;
	$Categories = $wpdb->get_results("SELECT parent_id, categories_id, categories_name, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $ParentID ORDER BY categories_order");
	$CategoryCount = count($Categories);
	if ($CategoryCount > 0) {
		foreach ($Categories as $Categories) {
			$Bold = '';
			$Spacing = '';
			$Checked = '';
			if ($Categories->parent_id == 0) {
				$Bold = ' style="font-weight: bold;"';
			}
			$ProductInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $ProductID AND categories_id = ".$Categories->categories_id);
			$PCCount = count($ProductInfo);
			if ($PCCount > 0) {
				$Checked = ' checked="checked"';
			}
			for ($i=1; $i<$Level; $i++) {
				$Spacing .= '&nbsp;&nbsp;&nbsp;';
			}
			echo '<tr><td'.$Bold.' colspan="2"><input type="checkbox" name="'.$Categories->categories_id.'" value="1" '.$Checked.'> '.$Spacing.stripslashes($Categories->categories_name).'</td></tr>';
			unset($ProductInfo);
			fssc_products_to_categories_checkbox ($Categories->categories_id, $Level, $ProductID);
		}
	}
}

	if (isset($_POST['submit'])) {
		$Categories = $wpdb->get_results("SELECT categories_id FROM ".$wpdb->prefix."fssc_categories");
		foreach ($Categories as $Categories) {
			$CategoryCheck = $wpdb->get_var("SELECT COUNT(categories_id) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$Categories->categories_id." AND products_id = ".$_GET['pid']);
			if ($_POST[$Categories->categories_id] == 1) {
				if ($CategoryCheck == 0) {
					$ProductOrder = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$Categories->categories_id." ORDER BY products_order LIMIT 1");
					$ProductOrder++;
					if (function_exists(fssc_pro_products_to_categories_add)) { fssc_pro_products_to_categories_add($Categories, $ProductOrder); } else {
						$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_to_categories (products_id, categories_id, products_order) VALUES (".$_GET['pid'].", ".$Categories->categories_id.", ".$ProductOrder.")");
					}
					fssc_cat_prod_count($Categories->categories_id, '+1');
				} else {
					if (function_exists(fssc_pro_products_to_categories_update)) { fssc_pro_products_to_categories_update($Categories); }
				}
			} else {
				if ($CategoryCheck > 0) {
					$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$Categories->categories_id." AND products_id = ".$_GET['pid']);
					fssc_cat_prod_count($Categories->categories_id, '-1');
				}
			}
		}
		fssc_product_ordering_fix();
		echo '<div id="message" class="updated fade"><p><strong>Your categories have been updated.</strong></p></div>';
}

if (function_exists(fssc_pro_products_to_categories_checkbox)) {
	fssc_pro_product_to_categories($_GET['pid']);
} else {
	echo '<h2>Categories</h2>';
	echo '<form name="categories" action="" method="POST">';
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column"><b>Categories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Categories" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Categories</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Categories" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
		fssc_products_to_categories_checkbox (0, 0, $_GET['pid']);
		echo '</tbody></table><br />';
}
?>
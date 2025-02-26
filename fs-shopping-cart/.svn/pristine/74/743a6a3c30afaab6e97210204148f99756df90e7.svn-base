<?php
function fssc_distributors_page() {
	global $wpdb;

	echo '<div class="wrap">';

	if (isset($_POST['submit'])) {
		$distributors = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_distributors ORDER BY distributor_name");
		foreach ($distributors as $distributors) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_distributors SET distributor_name = '".addslashes($_POST[$distributors->distributor_id])."' WHERE distributor_id = ".$distributors->distributor_id);
		}
		if ($_POST['new-distributor'] != '') {
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_distributors (distributor_name) VALUES ('".addslashes($_POST['new-distributor'])."')");
		}
		echo '<div id="message" class="updated fade"><p><strong>Your distributors have been update.</strong></p></div>';
	}
	if ($_GET['f'] == "del" && $_GET['id'] != ""){
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_distributors WHERE distributor_id = ".$_GET['id']);
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_distr WHERE distributor_id = ".$_GET['id']);
		echo '<div id="message" class="updated fade"><p><strong>Your distributor has been deleted.</strong></p></div>';
	}

	echo '<div class="wrap">';
	echo '<h2>Distributors</h2>';
	echo '<form name="edit-distributor" action="admin.php?page=fssc-distributors" method="POST">';
	echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="300"><b>Add Distributor</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Add" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tbody>';
		echo '<tr><td><input type="text" name="new-distributor" size="30" maxlength="250" value="">';
		echo '</td><td>&nbsp;</td>';
	echo '</tbody></table><br />';
	echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="300"><b>Distributors</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="300"><b>Distributors</b></th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
	$distributors = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_distributors ORDER BY distributor_name");
	foreach ($distributors as $distributors) {
		echo '<tr><td><a href="admin.php?page=fssc-distributors&f=del&id='.$distributors->distributor_id.'" onClick="return confirm(\'Are you sure you want to remove this distributor?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a> <input type="text" name="'.$distributors->distributor_id.'" size="30" maxlength="250" value="'.$distributors->distributor_name.'">';
		echo '</td><td>&nbsp;</td>';
	}
	echo '</tbody></table>';
	
	echo '</form>';
	echo '</div>';

}
?>
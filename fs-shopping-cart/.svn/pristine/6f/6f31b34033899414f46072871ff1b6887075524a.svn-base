<?php
// fs_brand_page() displays the page content for the first submenu of the custom Shopping Cart menu
function fssc_users_page() {
	global $wpdb,$fscartconfig;

	if (!isset($_GET['f'])) {
		$UsersPage = 'users';
	} else {
		$UsersPage = $_GET['f'];
	}
		
	echo '<div class="wrap">';
	echo '<form name="update-fssc-users" action="#" method="POST">';
	echo '<h2>Customer Discounts</h2>';
	echo '<div class="nav-tabs-nav">';
	echo '<div class="nav-tabs-wrapper">';
	echo '<div class="nav-tabs">';
	echo '<span class="nav-tab'; if ($UsersPage == 'users') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=users" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'users') { echo ' font-weight: bold;'; } echo '">Customers</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == 'settings') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=settings" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'settings') { echo ' font-weight: bold;'; } echo '">User Types</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == 'coupons') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=coupons" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'coupons') { echo ' font-weight: bold;'; } echo '">Coupon Codes</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == 'order') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=order" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'order') { echo ' font-weight: bold;'; } echo '">Order Discounts</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == 'shipping') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=shipping" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'shipping') { echo ' font-weight: bold;'; } echo '">Shipping Discount</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == '2item') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=2item" style="text-decoration: none; color: #333333;'; if ($UsersPage == '2item') { echo ' font-weight: bold;'; } echo '">2nd Item Discount</a></span>';
	echo '<span class="nav-tab'; if ($UsersPage == 'global') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-users&f=global" style="text-decoration: none; color: #333333;'; if ($UsersPage == 'global') { echo ' font-weight: bold;'; } echo '">Customer % Discount</a></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	if ($UsersPage == 'users') {

		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column">Email</th>
			<th scope="col" id="title" class="manage-column">Name</th>
			<th scope="col" id="title" class="manage-column">Company</th>
			<th scope="col" id="title" class="manage-column" style="text-align: center;">';
			// if (function_exists(fssc_user_type_selectbox)) { echo 'User Type'; }			
			echo '<input type="submit" name="submit" class="button-primary" value="Update Users" style="padding: 3px 8px;">';
			echo '</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" class="manage-column" colspan="4"><input type="submit" name="submit" class="button-primary" value="Update Users" style="padding: 3px 8px;"></th>
			</tr>
			</tfoot>
			<tbody>';
			$Users = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users");
			foreach ($Users as $Users) {
				echo '<tr>';
				echo '<td>'.$Users->user_email.'</td>';
				echo '<td>'.$Users->first_name.' '.$Users->last_name.'</td>';
				echo '<td>'.$Users->company_name.'<br />';
				if ($Users->company_tax_id != '') {
					echo 'Tax ID: '.$Users->company_tax_id.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				if ($Users->resalecert != '') {
					echo 'Resale Certificate: '.$Users->resalecert;
				}
				echo '</td>';
				echo '<td align="center">';
				if (function_exists(fssc_user_type_selectbox)) { fssc_user_type_selectbox($Users->ID); }			
				echo '</td>';
				echo '</tr>';
			}
		echo '</tbody></table>';

	} elseif ($UsersPage == 'settings') {
		if (function_exists(fssc_user_types_settings)) { fssc_user_types_settings($_POST); } else { echo fssc_feature_disabled('User Types'); }				
	} elseif ($UsersPage == 'coupons') {
		if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/includes/coupons.php')) { require_once(ABSPATH."wp-content/plugins/fs-shopping-cart/includes/coupons.php"); } else { echo fssc_feature_disabled('Coupon Codes'); }
	} elseif ($UsersPage == 'order') {
	
		if (isset($_POST['submit'])) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['OrderSubTotalDecreaseType']."' WHERE config_name = 'OrderSubTotalDecreaseType'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".str_replace("'", "", str_replace('"','',$_POST['OrderSubTotalDecreaseValue']))."' WHERE config_name = 'OrderSubTotalDecreaseValue'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".str_replace("'", "", str_replace('"','',$_POST['OrderSubTotalDecreaseMinOrder']))."' WHERE config_name = 'OrderSubTotalDecreaseMinOrder'");
			$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
			while($dbfscartconfig = mysql_fetch_array($sql)) {
				$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
			}
		}
	
		echo '<form action="#" name="shipping-costs" method="POST"><table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column" width="175">Order Subtotal Discount</th>
		<th scope="col" id="title" colspan="2" class="manage-column">&nbsp;</th>
		</tr>
		</thead>
		<tbody>';
		fssc_print_admin_selectbox('SubTotal Decrease Type', 'OrderSubTotalDecreaseType', $fscartconfig['OrderSubTotalDecreaseType'], array('Fixed' => 'Fixed', 'Percentage' => 'Percentage'), '');
		fssc_print_admin_input('SubTotal Decrease Value', 'OrderSubTotalDecreaseValue', $fscartconfig['OrderSubTotalDecreaseValue'], 5, '');
		fssc_print_admin_input('Minimum Order Amount', 'OrderSubTotalDecreaseMinOrder', $fscartconfig['OrderSubTotalDecreaseMinOrder'], 5, '');
		echo '</tbody>
		<tfoot>
		<tr>
		<th scope="col" id="title" colspan="3" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Order Subtotal Discount" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		</table></form><br />';

	} elseif ($UsersPage == 'shipping') {
	
	if (isset($_POST['submit'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['ShippingIncreaseType']."' WHERE config_name = 'ShippingIncreaseType'");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".str_replace("'", "", str_replace('"','',$_POST['ShippingIncreaseValue']))."' WHERE config_name = 'ShippingIncreaseValue'");
		$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
		while($dbfscartconfig = mysql_fetch_array($sql)) {
			$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
		}
	}
	
	echo '<form action="#" name="shipping-costs" method="POST"><table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column" width="175">Shipping Promotion</th>
		<th scope="col" id="title" colspan="2" class="manage-column">&nbsp;</th>
		</tr>
		</thead>
		<tbody>';
		fssc_print_admin_selectbox('Shipping Increase/Decrease Type', 'ShippingIncreaseType', $fscartconfig['ShippingIncreaseType'], array('Fixed' => 'Fixed', 'Percentage' => 'Percentage'), '');
		fssc_print_admin_input('Shipping Increase/Decrease Value', 'ShippingIncreaseValue', $fscartconfig['ShippingIncreaseValue'], 5, 'To increase the value by 5 type in "5". To decrease the value by 5 type in "-5".');
		echo '</tbody>
		<tfoot>
		<tr>
		<th scope="col" id="title" colspan="3" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Shipping Promotion" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		</table></form><br />';

	} elseif ($UsersPage == '2item') {
	
		if (isset($_GET['del'])) {
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_promo_two WHERE promo_id = ".$_GET['del']);
		}
		if (isset($_POST['submit'])) {
			if ($_POST['discount_value'] != '') {
				if ($_POST['products_id'] == 0) {
					//$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_promo_two");
				} elseif($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = 0") > 0) {
					//$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_promo_two");
				} elseif($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$_POST['products_id']) > 0) {
					$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$_POST['products_id']);
				}
				if (!$_POST['user_type']) { $_POST['user_type'] = '-2'; }
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_promo_two (products_id, products_count, discount_type, discount_value, user_type_id) VALUES ('".$_POST['products_id']."', '".$_POST['products_count']."', '".$_POST['discount_type']."', '".$_POST['discount_value']."', '".$_POST['user_type']."')");
			}
		}
		echo '<form name="second-item" action="#" method="POST">';
		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column">Item Promotions</th>
			<th scope="col" id="title" colspan="4" class="manage-column">&nbsp;</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" id="title" class="manage-column">Item Promotions</th>
			<th scope="col" id="title" colspan="4" class="manage-column">&nbsp;</th>
			</tr>
			</tfoot>
			<tbody>
			<tr>
			<th>Product</th>
			<th>Qty</th>
			<th>Value</th>
			<th scope="col" id="title" class="manage-column" style="text-align: center;">';
			if (function_exists(fssc_user_type_selectbox)) { echo 'User Type'; }			
			echo '</th>
			<th>&nbsp;</th>
			</tr>';
			$Promos = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_promo_two ORDER BY promo_id DESC");
			echo '<form name="add-item-promo" action="" method="POST"><tr><td>';
			echo '<select name="products_id">';
			echo '<option value="0">All Products</option>';
			$Products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products ORDER BY products_part_number");
			foreach ($Products as $Products) {
				echo '<option value="'.$Products->products_id.'">'.$Products->products_part_number.'</option>';
			}
			echo '</select>';
			echo '</td><td>';
			echo '<select name="products_count">';
			for ($i=2;$i<=100;$i++) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			echo '</select>';
			echo '</td><td><input type="text" name="discount_value" value="" size="5"> ';
			echo '<select name="discount_type">';
			echo '<option value="Fixed">Fixed</option>';
			echo '<option value="Percentage">Percentage</option>';
			echo '</select>';
			echo '</td><td>';
			if (function_exists(fssc_user_type_selectbox)) { fssc_user_type_selectbox('', 'user_type'); }			
			echo '</td><td><input type="submit" name="submit" class="button-primary" value="Add Item Promotion" style="padding: 3px 8px;"></td></tr></form>';
			foreach ($Promos as $Promos) {
				$ProductName = $wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$Promos->products_id);
				$UserType = '';
				if (function_exists(fssc_user_type_name)) { $UserType = fssc_user_type_name($Promos->user_type_id); }			
				if ($Promos->discount_type == 'Fixed') {
					$Promos->discount_value = '$'.$Promos->discount_value;
				} else {
					$Promos->discount_value = $Promos->discount_value.'%';
				}
				if ($Promos->products_id == 0) {
					$ProductName = 'All Products';
				}
				echo '<tr><td><a href="admin.php?page=fssc-users&f=2item&del='.$Promos->promo_id.'" onClick="return confirm(\'Are you sure you want to remove this discount?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a> '.$ProductName.'</td><td>'.$Promos->products_count.'</td><td>'.$Promos->discount_value.' Off</td><td>'.$UserType.'</td><td>&nbsp;</td></tr>';
			}
			echo '</tbody></table></form><br />';
	
	
	} elseif ($UsersPage == 'global') {
	
		if (isset($_POST['submit'])) {
			$Users = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users ORDER BY user_nicename");
			foreach ($Users as $Users) {
				if ($_POST[$Users->ID] != '') {
					$DiscountCheck = $wpdb->get_var("SELECT COUNT(ID) FROM ".$wpdb->prefix."fssc_users_to_discounts WHERE ID = ".$Users->ID);
					if ($DiscountCheck == 0) {
						$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_users_to_discounts (ID, discount_percent) VALUES (".$Users->ID.", '".$_POST[$Users->ID]."')");
					} else {
						$wpdb->query("UPDATE ".$wpdb->prefix."fssc_users_to_discounts SET discount_percent = '".$_POST[$Users->ID]."' WHERE ID = ".$Users->ID);
					}
				} else {
					$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_users_to_discounts WHERE ID = ".$Users->ID);
				}
			}
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".addslashes($_POST['MinimumProductPrice'])."' WHERE config_name = 'MinimumProductPrice'");
			$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
			while($dbfscartconfig = mysql_fetch_array($sql)) {
				$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
			}
		}

		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column">Member Discounts</th>
			<th scope="col" id="title" colspan="2" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Minimum Price" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tbody>';
		echo fssc_print_admin_input('Minimum Product Price', 'MinimumProductPrice', $fscartconfig['MinimumProductPrice'], 3, '');
		echo '</tbody></table>';
		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column">Members</th>
			<th scope="col" id="title" colspan="2" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Member Discounts" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" id="title" class="manage-column">Members</th>
			<th scope="col" id="title" colspan="2" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Member Discounts" style="padding: 3px 8px;"></th>
			</tr>
			</tfoot>
			<tbody>';
		$Users = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users ORDER BY user_nicename");
		foreach ($Users as $Users) {
			$Discount = $wpdb->get_var("SELECT discount_percent FROM ".$wpdb->prefix."fssc_users_to_discounts WHERE ID = ".$Users->ID);
			echo '<tr><td>'.$Users->user_nicename.'</td><td width="150"><input type="text" value="'.$Discount.'" name="'.$Users->ID.'" size="3">%</td><td>&nbsp;</td></tr>';
		}
		echo '</tbody></table>';
	
	}
	echo '</form>';
	echo '</div>';
}
?>
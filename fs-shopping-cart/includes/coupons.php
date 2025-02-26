<?php
// Version: 1.0

if (isset($_GET['del'])) {
	$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_coupons WHERE coupon_id = ".$_GET['del']);
}
if (isset($_POST['submit'])) {
	if (!isset($_POST['user_type'])) { $_POST['user_type'] = '-2'; }
	$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_coupons (coupon_code, coupon_value, user_type_id) VALUES ('".$_POST['coupon_code']."', '".$_POST['coupon_value']."', '".$_POST['user_type']."')");
}

echo '<form name="coupon" action="#" method="POST">';
echo '<table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" id="title" class="manage-column">Coupon Codes</th>
	<th scope="col" id="title" colspan="2" class="manage-column">&nbsp;</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
	<th scope="col" id="title" class="manage-column">Coupon Codes</th>
	<th scope="col" id="title" colspan="2" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Add Coupon" style="padding: 3px 8px;"></th>
	</tr>
	</tfoot>
	<tbody>
	<tr>
	<th>Code</th>
	<th>Value</th>
	<th scope="col" id="title" class="manage-column" style="text-align: center;">';
	if (function_exists(fssc_user_type_selectbox)) { echo 'User Type'; }			
	echo '</th>
	</tr>';
	echo '<td><input type="text" name="coupon_code" value="" size="20"></td>';
	echo '<td><input type="text" name="coupon_value" value="" size="20"></td>';
	echo '<td>';
	if (function_exists(fssc_user_type_selectbox)) { fssc_user_type_selectbox('', 'user_type'); }			
	echo '</td></tr></tbody></table></form>';
echo '<table class="widefat page fixed" cellspacing="0">
	<tfoot>
	<tr>
	<th scope="col" id="title" class="manage-column">Coupon Codes</th>
	<th scope="col" id="title" colspan="2" class="manage-column">&nbsp;</th>
	</tr>
	</tfoot>
	<tbody>
	<tr>
	<th>Code</th>
	<th>Value</th>
	<th scope="col" id="title" class="manage-column" style="text-align: center;">';
	if (function_exists(fssc_user_type_selectbox)) { echo 'User Type'; }			
	echo '</th>
	</tr>';
	$Coupons = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_coupons ORDER BY coupon_id DESC");
	foreach ($Coupons as $Coupons) {
		$UserType = '';
		if (function_exists(fssc_user_type_name)) { $UserType = fssc_user_type_name($Coupons->user_type_id); }			
		echo '<tr><td><a href="admin.php?page=fssc-users&f=coupons&del='.$Coupons->coupon_id.'" onClick="return confirm(\'Are you sure you want to remove this coupon?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a> '.$Coupons->coupon_code.'</td><td>'.$Coupons->coupon_value.' Off</td><td>'.$UserType.'</td></tr>';
	}
echo '</tbody></table>';
?>
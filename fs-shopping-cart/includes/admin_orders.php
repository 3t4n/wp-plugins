<?php
function fssc_send_tracking($TID,$Email) {
	global $wpdb,$fscartconfig;
	$OrderDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_orders WHERE orders_id = $TID");
	if ($Email == 1) {
		$CustomerFirstName = explode(' ',$OrderDetails->customer_name);
		if (substr($OrderDetails->orders_tracking,0,2) == '1Z') {
			$TrackingLink = 'http://wwwapps.ups.com/WebTracking/processRequest?HTMLVersion=5.0&Requester=NES&AgreeToTermsAndConditions=yes&loc=en_US&tracknum='.$OrderDetails->orders_tracking;
		} else {
			$TrackingLink = 'http://www.fedex.com/Tracking?language=english&cntry_code=&tracknumbers='.$OrderDetails->orders_tracking;
		}
		$TackingNotificationMsg = str_replace("\n","<br />",$fscartconfig['TrackingNotification']);
		$TackingNotificationMsg = str_replace('[customer-first-name]',$CustomerFirstName[0],$TackingNotificationMsg);
		$TackingNotificationMsg = str_replace('[blog-name]',get_bloginfo('name'),$TackingNotificationMsg);
		$TackingNotificationMsg = str_replace('[tracking-number]','<a href="'.$TrackingLink.'">'.$OrderDetails->orders_tracking.'</a>',$TackingNotificationMsg);
		$headers  = 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
		$headers .= 'From: '.$fscartconfig['OrderSenderName'].' <'.$fscartconfig['OrderSenderEmail'].'>';
		mail($OrderDetails->customer_email, 'Your Order', $TackingNotificationMsg, $headers);
		echo '<div id="message" class="updated fade"><p>The shipment tracking number has been emailed to the customer.</p></div>';
	} else {
		echo '<div id="message" class="updated fade"><p>The shipment tracking number has been added to the order.</p></div>';
	}
}

function fssc_orders_page() {
	global $wpdb,$fscartconfig,$FSSCExtensions;

	if (!isset($_GET['f'])) {
		$OrderPage = 'processing';
	} else {
		$OrderPage = $_GET['f'];
	}

	if (isset($_POST['toid'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_tracking = '".$_POST['trackingnumber']."' WHERE orders_id = ".$_POST['toid']);
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_status = 'Completed' WHERE orders_id = ".$_POST['toid']);
		fssc_send_tracking($_POST['toid'],$_POST['email-customer']);
	}
	
	if (isset($_POST['order_status'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_status = '".$_POST['order_status']."' WHERE orders_id = ".$_POST['orders_id']);
		$StatusDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_orders WHERE orders_id = ".$_POST['orders_id']);
		if ($StatusDetails->orders_number == 0) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_number = '".$fscartconfig['OrderNumber']."' WHERE orders_id = ".$_POST['orders_id']);
			$fscartconfig['OrderNumber'] = $fscartconfig['OrderNumber'] + 1;
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$fscartconfig['OrderNumber']."' WHERE config_name = 'OrderNumber'");			
			$fscartconfig['PONumber'] = $fscartconfig['PONumber'] + 1;
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$fscartconfig['PONumber']."' WHERE config_name = 'PONumber'");
		}
	}

	if (isset($_GET['tnid'])) {
		fssc_send_tracking($_GET['tnid'],1);
	}

	if (isset($_GET['tclear'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_tracking = '' WHERE orders_id = ".$_GET['tclear']);
	}

	echo '<div class="wrap">';
	echo '<form name="update-fssc-orders" action="#" method="POST">';
	echo '<h2>Order Management</h2>';
	echo '<div class="nav-tabs-nav">';
	echo '<div class="nav-tabs-wrapper">';
	echo '<div class="nav-tabs">';
	echo '<span class="nav-tab'; if ($OrderPage == 'processing') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-orders&f=processing" style="text-decoration: none; color: #333333;'; if ($OrderPage == 'processing') { echo ' font-weight: bold;'; } echo '">Processing</a></span>';
	echo '<span class="nav-tab'; if ($OrderPage == 'completed') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-orders&f=completed" style="text-decoration: none; color: #333333;'; if ($OrderPage == 'completed') { echo ' font-weight: bold;'; } echo '">Completed</a></span>';
	echo '<span class="nav-tab'; if ($OrderPage == 'cancelled') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-orders&f=cancelled" style="text-decoration: none; color: #333333;'; if ($OrderPage == 'cancelled') { echo ' font-weight: bold;'; } echo '">Cancelled</a></span>';
	echo '<span class="nav-tab'; if ($OrderPage == 'abandoned') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-orders&f=abandoned" style="text-decoration: none; color: #333333;'; if ($OrderPage == 'abandoned') { echo ' font-weight: bold;'; } echo '">Abandoned</a></span>';
	echo '<span class="nav-tab'; if ($OrderPage == 'all') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-orders&f=all" style="text-decoration: none; color: #333333;'; if ($OrderPage == 'all') { echo ' font-weight: bold;'; } echo '">All</a></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	if (isset($_GET['oid'])) {
		$OrderDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_orders WHERE orders_id = ".$_GET['oid']);
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
			<thead>
			<tr>
			<th scope="col" class="manage-column">Order #'.$OrderDetails->orders_number.' (<a href="http://www.geobytes.com/IpLocator.htm?GetLocation&IpAddress='.$OrderDetails->customer_ip.'" target="_blank">'.$OrderDetails->customer_ip.')</a></th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" class="manage-column">Order #'.$OrderDetails->orders_number.'</th>
			</tr>
			</tfoot><tbody><tr><td>'.$OrderDetails->orders_overview.'</td></tr></tbody></table>';
	}
	if (isset($_GET['del'])) {
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_orders WHERE orders_id = ".$_GET['del']);
	}
	if (isset($_GET['clear'])) {
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Pending'");
	}
	
	if ($OrderPage == 'processing') {
		$Orders = $wpdb->get_results("SELECT *, DATE_FORMAT(orders_date_added, '%M %d %Y - %r') as DATEADDED, DATE_FORMAT(orders_last_modified, '%M %d %Y - %r') as LASTMODIFIED FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Processing' ORDER BY orders_id DESC");
	} elseif ($OrderPage == 'completed') {
		$Orders = $wpdb->get_results("SELECT *, DATE_FORMAT(orders_date_added, '%M %d %Y - %r') as DATEADDED, DATE_FORMAT(orders_last_modified, '%M %d %Y - %r') as LASTMODIFIED FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Completed' ORDER BY orders_id DESC");
	} elseif ($OrderPage == 'abandoned') {
		$Orders = $wpdb->get_results("SELECT *, DATE_FORMAT(orders_date_added, '%M %d %Y - %r') as DATEADDED, DATE_FORMAT(orders_last_modified, '%M %d %Y - %r') as LASTMODIFIED FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Pending' ORDER BY orders_id DESC");
	} elseif ($OrderPage == 'cancelled') {
		$Orders = $wpdb->get_results("SELECT *, DATE_FORMAT(orders_date_added, '%M %d %Y - %r') as DATEADDED, DATE_FORMAT(orders_last_modified, '%M %d %Y - %r') as LASTMODIFIED FROM ".$wpdb->prefix."fssc_orders WHERE orders_status = 'Cancelled' ORDER BY orders_id DESC");
	} else {
		$Orders = $wpdb->get_results("SELECT *, DATE_FORMAT(orders_date_added, '%M %d %Y - %r') as DATEADDED, DATE_FORMAT(orders_last_modified, '%M %d %Y - %r') as LASTMODIFIED FROM ".$wpdb->prefix."fssc_orders ORDER BY orders_id DESC");
	}
	
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="25">&nbsp;</th>
		<th scope="col" class="manage-column" width="100">Number</th>
		<th scope="col" class="manage-column" width="100">Status</th>
		<th scope="col" class="manage-column" width="210">Date</th>
		<th scope="col" class="manage-column">Billing Contact</th>
		<th scope="col" class="manage-column" width="200">Tracking #</th>
		<th scope="col" class="manage-column" width="65">&nbsp;</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="25">&nbsp;</th>
		<th scope="col" class="manage-column" width="100">Number</th>
		<th scope="col" class="manage-column" width="100">Status</th>
		<th scope="col" class="manage-column" width="210">Date</th>
		<th scope="col" class="manage-column">Billing Contact</th>
		<th scope="col" class="manage-column" width="200">Tracking #</th>
		<th scope="col" class="manage-column" width="65">&nbsp;</th>
		</tr>
		</tfoot>
			<tbody>';
		foreach ($Orders as $Orders) {
			if ($Orders->orders_number == 0) { $Orders->orders_number = 'N/A'; }
			echo '<tr>';
			echo '<td><a href="admin.php?page=fssc-orders&del='.$Orders->orders_id.'" onClick="return confirm(\'Are you sure you want to remove this order?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a></td>';
			echo '<td>'.$Orders->orders_number.'</td>';
			echo '<td><form name="updating-order-status" action="#" method="POST"><select name="order_status" onchange="this.form.submit()">';
			$Status = array('Pending','Processing','Completed','Cancelled');
			foreach ($Status as $Status) {
				$selected = ''; if ($Orders->orders_status == $Status) { $selected = ' selected'; }
				echo '<option value="'.$Status.'"'.$selected.'>'.$Status.'</option>';
			}
			echo '</select><input type="hidden" name="orders_id" value="'.$Orders->orders_id.'"></form></td>';
			echo '<td>'.$Orders->DATEADDED.'</td>';
			echo '<td>'.$Orders->customer_name.'<br />';
			echo '<a href="admin.php?page=fssc-orders&oid='.$Orders->orders_id.'">View Order</a>';
			if ($Orders->orders_tracking != '') { echo ' | <a href="admin.php?page=fssc-orders&tnid='.$Orders->orders_id.'">Send Tracking</a>'; }
			if ($Orders->orders_number != 'N/A' && $FSSCExtensions['ProFunctions'] == TRUE) { echo ' | <a href="admin.php?page=fssc-orders&invid='.$Orders->orders_id.'" onClick="window.open(\''.get_option('home').'/wp-content/plugins/fs-shopping-cart/extensions/invoice.php?id='.$Orders->orders_id.'\', \'Invoice\', \'width=600,height=800,scrollbars=yes\'); return false;">Invoice</a>'; }
			echo '</td>';
			if ($Orders->orders_number == 'N/A' || $Orders->orders_status == 'Cancelled') {
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			} elseif ($Orders->orders_tracking == '') {
				echo '<form name="updating-tracking" action="admin.php?page=fssc-orders&f=processing" method="POST"><td><input type="hidden" name="toid" value="'.$Orders->orders_id.'"><input type="text" name="trackingnumber" value="" style="width: 150px"><input type="submit" name="submit" value=">>" style="font-size: 10px;"></td><td><input type="checkbox" name="email-customer" value="1" checked> Email</td></form>';
			} else {
				if (substr($Orders->orders_tracking,0,2) == '1Z') {
					$TrackingLink = 'http://wwwapps.ups.com/WebTracking/processRequest?HTMLVersion=5.0&Requester=NES&AgreeToTermsAndConditions=yes&loc=en_US&tracknum='.$Orders->orders_tracking;
				} else {
					$TrackingLink = 'http://www.fedex.com/Tracking?language=english&cntry_code=&tracknumbers='.$Orders->orders_tracking;
				}
				echo '<td><a href="'.$TrackingLink.'" target="_blank">'.$Orders->orders_tracking.'</a></td><td><a href="admin.php?page=fssc-orders&f=processing&tclear='.$Orders->orders_id.'" style="color: #D0D0D0;">clear</a></td>';
			}
			echo '</tr>';
		}
	echo '</tbody></table>';
	echo '</div>';
}
?>
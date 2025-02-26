<?php
// Version: 1.0

	// EMAIL ORDER
	$EmailOrderRecipients = explode(',', $fscartconfig['OrderRecipient']);
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: '.$fscartconfig['OrderSenderName'].' <'.$fscartconfig['OrderSenderEmail'].'>';
	for ($i=0;$i<=sizeof($EmailOrderRecipients);$i++) {
		mail($EmailOrderRecipients[$i], 'Online Order', $orders_overview, $headers);
	}
	$PageStatus = '<div id="orderconfirm">'.$fscartconfig['PaymentEnableEmailOrderThankYou'].'</div>';
	// UPDATE ORDER STATUS
	$sql = mysql_query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_status = 'Emailed Order' WHERE orders_id = ".$_SESSION['invoice_number']) or die(mysql_error());
	session_destroy();
?>
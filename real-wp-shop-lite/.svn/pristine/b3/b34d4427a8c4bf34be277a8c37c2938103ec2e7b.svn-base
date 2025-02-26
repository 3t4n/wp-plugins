<?php

add_action('wp_ajax_UPDATE_ORDER_STATUS', 'vkrwps_update_order_status');
function vkrwps_update_order_status() {

	$oid = (int) $_POST['oid'];

    $rv = $_POST['rv'];
	
	global $wpdb;

    $uos = $wpdb->update( 
        'wp_vkrwps_order_info', 
        array( 
            'order_status' => $rv
        ), 
        array( 'ID' => $oid ), 
        array( 
            '%s'
        ), 
        array( '%d' ) 
    );

    $s = '';
    if ( $uos ) $s .= 'Status Updated!<br>';
    
    $get_cust_info = $wpdb->get_results( 
    "
    SELECT email, orderid
    FROM wp_vkrwps_order_info
    WHERE id = '$oid'
    "
    );

    foreach ($get_cust_info as $ce)
    {
       $em = $ce->email; 
       $oidfdb = $ce->orderid;
    }

    $sn = get_option( 'vkrwps_shopname' );
    $mem = get_option( 'vkrwps_mem' );
    $cps = get_option( 'vkrwps_cps' );
    $cps = $cps . ' ' . $oidfdb;

    $emailbody = '<p>Order status change - Order No.'.$oidfdb.'</p><p>New status: <b>'.$rv.'</b></p>';

    $headers[] = "Content-type: text/html";
    $headers[] = "From: $sn <$mem> \r\n";
    $ms = wp_mail( 
        $em, 
        $cps,
        $emailbody,
        $headers
    );

    if ( $ms ) $s .= 'E-mail sent!';

    echo $s;

	die();
}

?>
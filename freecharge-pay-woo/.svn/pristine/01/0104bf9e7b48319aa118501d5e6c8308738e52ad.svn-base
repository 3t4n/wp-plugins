<?php

function fcpgz_table_creator(){
    global $wpdb;
    $charset = $wpdb->get_charset_collate();
    $table_name=$wpdb->prefix.'fcpgz_orders';

    if($wpdb->get_var($wpdb->prepare( "SHOW TABLES LIKE %s", $table_name )) != $table_name){
        $sql= "CREATE TABLE $table_name(
            Id INT AUTO_INCREMENT PRIMARY KEY,
            ORDER_ID INT NOT NULL UNIQUE,
            txnReferenceId VARCHAR(200),
            merchantTxnID VARCHAR(200),
            refundTxnReferenceId VARCHAR(200),
            merchantRefundTxnId VARCHAR(200),
            orderStatus VARCHAR(255),
            txnAmount DECIMAL(26, 2),
            UNIQUE KEY (ORDER_ID)
            )$charset;";
            require_once (ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($sql);
    }
}




function fcpgz_insert_data($order_id,$transaction_id,$merchantTxnId,$order_status,$txn_amount) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fcpgz_orders';

    $data = array(
        'ORDER_ID' => $order_id,
        'txnReferenceId' => $transaction_id,
        'merchantTxnID' => $merchantTxnId,
        'refundTxnReferenceId' => NULL,
        'merchantRefundTxnId'=>NULL,
        'orderStatus'=> $order_status,
        'txnAmount' =>  $txn_amount
    );

    $wpdb->insert($table_name, $data);
}

function fcpgz_update_fcpgz_orders($order_id, $transaction_id, $merchantTxnId,$order_status) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fcpgz_orders';

    $wpdb->update(
        $table_name,
        array('txnReferenceId' => $transaction_id, 'orderStatus' => $order_status),
        array('ORDER_ID' => $order_id, 'merchantTxnID' => $merchantTxnId),
        array('%s'),
        array('%d', '%s')
    );
}


function fcpgz_update_refund_reference($order_id, $refundTxnReferenceId,$order_status) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fcpgz_orders';

    $wpdb->update(
        $table_name,
        array('refundTxnReferenceId' => $refundTxnReferenceId, 'orderStatus' => $order_status),
        array('ORDER_ID' => $order_id),
        array('%s'),
        array('%d')
    );
}
function fcpgz_update_merchant_refund_reference($order_id, $merchantRefundTxnId) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fcpgz_orders';

    $wpdb->update(
        $table_name,
        array('merchantRefundTxnId' => $merchantRefundTxnId),
        array('ORDER_ID' => $order_id),
        array('%s'),
        array('%d')
    );
}




?>

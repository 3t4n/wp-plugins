<?php 
if (!class_exists('Woo_Wallet_Wallet')) {
    echo "In order to use this recharge plugin you need to install two following plugins
<br />
1 Woocommerce<br />
2 WooCommerce Wallet – credit, cashback, refund system (https://wordpress.org/plugins/woo-wallet/)

";
exit();
}



   $user = wp_get_current_user();
    
    
    $id = $user->ID;
    
    global $wpdb;
    $user_id = $id;
    
    $table_name = $wpdb->prefix . 'recharge';
    if (current_user_can('administrator')) {
        
        $qr = "SELECT *   FROM $table_name    order by id desc  limit 50";
        
    } else {
        $qr = "SELECT *   FROM $table_name where user_id=$id   order by id desc   limit 50";
    }
    
    
    echo "<h2>Your recent recharge (Recent 50 Records )</h2>";
    
    
    
    $result = $wpdb->get_results($qr);
?>
<p>Admin can see all users report and user will see his own recharge report </p>
 <table class="table widefat"> 
 

 <thead>
    <tr>
        <th>Recharge ID</th>
		 <th>User ID</th>       
        <th>Number / Connection ID</th>       
        <th>Operator </th>
        <th>Amount</th>
       
           <th>Status</th> 
         <th>Operator ID</th>       
     <?php   if (current_user_can('administrator')) {
       ?>    <th>Status Url</th>
         <th>Status Responce</th>
	 <?php } ?>
    </tr>
</thead> 

<?php
    
    foreach ($result as $wp_formmaker_submits) {
        
        
        echo "<tr>";
        echo "<td>" . $wp_formmaker_submits->id . "</td>";
        echo "<td>" . $wp_formmaker_submits->user_id . "</td>";
        echo "<td>" . $wp_formmaker_submits->recharge_number . "</td>";
        echo "<td>" . $wp_formmaker_submits->recharge_operator . "</td>";
        
        echo "<td>" . $wp_formmaker_submits->recharge_amount . "</td>";
        
        echo "<td>" . $wp_formmaker_submits->status . "</td>";
        echo "<td>" . $wp_formmaker_submits->operator_transaction_id . "</td>";
       if (current_user_can('administrator')) {  
        echo "<td>" . $wp_formmaker_submits->status_url . "</td>";
        echo "<td>" . $wp_formmaker_submits->status_response . "</td>";
        
	   }
        
        
        
        echo "</tr>";
    }
    
    
    echo "</table>";
	
	?>
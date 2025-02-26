<?php
if (! defined('ABSPATH')) {
    die;
}
?>
<div id="notification" class="updated" style = "width:90%;">
    <p>Learn how to configure with Google Spreadsheets by clicking 
    <a href="https://techiesaround.com/create-service-account-in-google-api-console/" target="_blank">here</a>.
    </p>
    <span class="close" onclick="closeNotification()">&times;</span>
</div>
<?php

$orderShow = $customerShow = $inventoryShow = $credentialShow = $debugShow = "";
$orderTab = $inventoryTab = $customerTab = $credentialTab = $debugTab = "";
if(isset($_GET['view']) && $_GET['view'] == 'logs'){ 
    
    ?>
    <h1>Logs</h1> <br><br>
    <?php  echo do_shortcode('[aiogsc_logs_datatables]');
     } 
     else {  
if (isset($_GET['tab'])) {
    $tab = sanitize_text_field($_GET['tab']);
    if ($tab == 'customer') {
        $customerTab = 'active';
        $customerShow = 'show';
    }
    if ($tab == 'order') {
        $orderTab = 'active';
        $orderShow = 'show';
    }
    if ($tab == 'orderitem') {
        $orderTab = 'active';
        $orderShow = 'show';
    }    
    if ($tab == 'inventory') {
        $inventoryTab = 'active';
        $inventoryShow = 'show';
    }
    if ($tab == 'credential') {
        $credentialTab = 'active';
        $credentialShow = 'show';
    }
    if($tab == 'log') {
        $debugTab = 'active';
        $debugShow = 'show';
    }
}
$type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : "";
$aiogsc_google_token = get_option('aiogsc_google_token');
?>
 <div class="wrap">
                <h2><?php esc_html_e("AIOGSC Settings Page",'all-in-one-gsheetsync-for-woocommerce');?></h2></div>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div id="snackbar" class="snackbar"></div>
<button class="accordion <?php echo esc_attr($credentialTab); ?>">
<?php esc_html_e('Credentials', 'all-in-one-gsheetsync-for-woocommerce'); ?></button>
<div class="panel <?php echo esc_attr($credentialShow); ?>">
<form id="credentials-form" class="credentials-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" >
<?php $credential = get_option('aiogsc_google_credential');  ?>
<table class="credentials-table" role="presentation">
<tbody>

<tr>
<?php
if (isset($credential['client_email'])) {
?>
<h4 class='credential_success'><?php esc_html_e("Credentials Saved Successfully",'all-in-one-gsheetsync-for-woocommerce'); ?></h4>
<h4 class='credential_msg'><?php esc_html_e('To access the spreadsheet, share it with email','all-in-one-gsheetsync-for-woocommerce');?> <b><?php echo esc_html($credential['client_email']); ?></b>, 
<br>
<a href="<?php echo esc_url(admin_url('admin.php?page=aiogsc-sync')); ?>"><?php esc_html_e('Click here','all-in-one-gsheetsync-for-woocommerce');?></a><?php esc_html_e('to know how to share spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></h4>
<?php
} else { ?>
<th scope="row">
<label for="aiogsc-credentials"><?php esc_html_e('Credentials','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<textarea name="credentials" id="credentials" class="regular-text" rows="8" cols="80" class="large-text" style="width:99%;">
</textarea>
<a href="https://console.developers.google.com/" target="_blank"><?php esc_html_e('Get Credential','all-in-one-gsheetsync-for-woocommerce');?></a>
<?php } ?>
</td>
</tr>

</tbody></table>
<?php
        if (isset($credential['client_email'])) {
            ?>
<input type="hidden" name="deleteCredential" value="1">
<input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Remove Configuration','all-in-one-gsheetsync-for-woocommerce');?>">

<?php
        } else {
            ?>
<input type="hidden" name="deleteCredential" value="0">
<p class="submit">
<input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Save Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<?php
        } ?>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
</div>

<button class="accordion <?php echo esc_attr($inventoryTab); ?>"><?php esc_html_e('Inventory','all-in-one-gsheetsync-for-woocommerce');?></button>
<?php
    $google_product_identifier = get_option('aiogsc_google_product_identifier');
    $google_qty = get_option('aiogsc_google_qty');
    $google_sheet_id = get_option('aiogsc_google_sheet_id');
    $sheet_data = aiogsc_GoogleSpreadsheets();
    $google_sheets = $sheet_data[1];
?>
	<div class="panel <?php echo esc_attr($inventoryShow); ?>">
<?php
if ($aiogsc_google_token != '1') {
    if ($google_product_identifier == '') {
        ?>
<form id="inventory-form" class="inventory-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" >
<table class="inventory-credentials-table" style="border-spacing: 10px;" role="presentation">
<tbody>
    <tr>
<th style="width:300px;text-align: left;">
<label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Names','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<select id="google_sheet" class="google_sheet_drop" name="google_sheet">
<option value="select" selected disabled hidden><?php esc_html_e('Select a Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
<?php
foreach ($google_sheets as $google_sheet_key=>$google_sheet_values) {
            ?>
            <optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>">
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>
<?php
        } ?>
</select>
</td>
    </tr>
<tr id="inventory_map_headers"></tr>
<tr id="identity_bind_html"></tr>
<tr id="qty_bind_html"></tr>       
</tbody></table>
<p class="submit">
<input type="submit" id="inventorySave" name="submit" class="button button-primary" value="<?php esc_html_e('Save Inventory Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
<?php
    }
    elseif ($google_product_identifier != '' && $type == 'edit' && $tab == 'inventory') {
    $google_product_identifier = get_option('aiogsc_google_product_identifier');	    
        ?>
<form id="inventory-form" class="inventory-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" >
<table class="inventory-credentials-table" role="presentation">
<tbody>
<tr>
<th style="width:300px;text-align: left;">
<label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Names','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<select id="google_sheet" class="google_sheet_drop" name="google_sheet">
<option value="select" selected disabled hidden><?php esc_html_e('Select a Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
<?php
    foreach ($google_sheets as $google_sheet_key=>$google_sheet_values) {
	   ?>
        <optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                $sheet_selected = ($google_sheet_id == $google_sheet_key . '|' . $sheet_name) ? "selected" : "";
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>" <?php echo esc_html($sheet_selected); ?>>
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>

<?php
        } ?>
</select>
</td>
</tr>
<tr id="inventory_map_headers"></tr>
<tr id="identity_bind_html"></tr><br>
<tr id="qty_bind_html"></tr>
</tbody></table>
<p class="submit">
<input type="submit" id="inventorySave" name="submit" class="button button-primary" value="<?php esc_html_e('Save Inventory Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
<?php
    }   else { ?>
<?php
$sheet_name = explode('|',$google_sheet_id);
 ?>
<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th style="width:250px;"><label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Name','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td><?php echo esc_html($sheet_name[1]); ?></td>
</tr>
<tr>
<th style="width:250px;"><label for="aiogsc-credentials"><?php esc_html_e('Sku (Product Identifier)','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td><?php echo esc_html($google_product_identifier); ?></td>
</tr>
<tr>
<th style="width:250px;"><label for="aiogsc-credentials"><?php esc_html_e('Qty','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td><?php echo esc_html($google_qty); ?></td>
</tr>
</tbody></table>
<br><br>
<input type="hidden" name="google_sheet_id" id="google_sheet_id" value="<?php echo  esc_html($google_sheet_id); ?>">
<input type="hidden" name="google_product_identifier" id="google_product_identifier" value="<?php echo  esc_html($google_product_identifier); ?>">
<input type="hidden" name="google_qty" id="google_qty" value="<?php echo  esc_html($google_qty); ?>">
<button class="button" id="insteand_synz"><?php esc_html_e('Instant Synz','all-in-one-gsheetsync-for-woocommerce');?></button>
<br><br>
<a href="<?php echo esc_url(admin_url('admin.php')); ?>?page=aiogsc-settings&type=edit&tab=inventory"><button class="button" id="edit"><?php esc_html_e('Edit','all-in-one-gsheetsync-for-woocommerce');?></button></a>
<?php }
} else { ?>
<h1><?php esc_html_e('Please update your credentials to configure Inventory','all-in-one-gsheetsync-for-woocommerce');?></h1>
<?php } ?>
</div>


<button class="accordion <?php echo  esc_html($orderTab); ?>"><?php esc_html_e('Orders','all-in-one-gsheetsync-for-woocommerce');?></button>
<div class="panel <?php echo  esc_html($orderShow); ?>">
<?php
if ($aiogsc_google_token != '1') {
	$google_order_mapping = get_option('aiogsc_google_order_mapping');
    	$google_order_sheetid = get_option('aiogsc_google_order_sheetid');	
        $ordertype = get_option('aiogsc_google_order_sync_type');
    if ($google_order_mapping == '') {
        ?>
<form id="order-form" class="order-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th scope="row">
<label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Names','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<select id="google_sheet_order" class="google_sheet_order_drop" name="google_sheet_order">
<option value="select" selected disabled hidden><?php esc_html_e('Select a Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
<?php
foreach ($google_sheets as $google_sheet_key=>$google_sheet_values) {
?>
<optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>">
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>
<?php
        } ?>
</select>
</td>
</tr>
<tr>
    <td colspan="2">
       <strong> <label for="sync-order"><?php esc_html_e('Sync Order On','all-in-one-gsheetsync-for-woocommerce');?></label></strong>
        <br>
        <br>
        <label><input type="radio" name="sync-order" value="new-order"><?php esc_html_e(' New Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="after-payment"> <?php esc_html_e('After Payment Complete','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="processing-order"> <?php esc_html_e('Processing Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="completing-order"> <?php esc_html_e('Completing Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <br>
    </td>
</tr>
<tr id="order_maping_headers"></tr>
<tr id="bind_attribute_html"></tr>
</tbody></table>
<p class="submit">
<input type="submit" id="orderSave" name="submit" class="button button-primary" value="<?php esc_html_e('Save Order Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
<?php
    }
    elseif ($google_order_mapping != '' && $type == 'edit' && $tab == 'order') {
        ?>
<form id="order-form" class="order-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th scope="row">
<label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Names','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<select id="google_sheet_order" class="google_sheet_order_drop" name="google_sheet_order">
<option value="select" selected disabled hidden><?php esc_html_e('Select a Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
<?php
    foreach ($google_sheets as $google_sheet_key => $google_sheet_values) {
        ?>
        <optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                $sheet_selected = ($google_order_sheetid == $google_sheet_key . '|' . $sheet_name) ? "selected" : "";
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>" <?php echo esc_html($sheet_selected); ?>>
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>
        <?php
    }
    ?>
</select>
</td>
</tr>
<tr>
    <td colspan="2">
       <strong> <label for="sync-order"><?php esc_html_e('Sync Order On','all-in-one-gsheetsync-for-woocommerce');?></label></strong>
        <br>
        <br>
        <label><input type="radio" name="sync-order" value="new-order" <?php checked($ordertype, 'new-order'); ?>> <?php esc_html_e('New Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="after-payment"  <?php checked($ordertype, 'after-payment'); ?>> <?php esc_html_e('After Payment Complete','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="processing-order" <?php checked($ordertype, 'processing-order'); ?>> <?php esc_html_e('Processing Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <label><input type="radio" name="sync-order" value="completing-order" <?php checked($ordertype, 'completing-order'); ?>> <?php esc_html_e('Completing Order','all-in-one-gsheetsync-for-woocommerce');?></label>
        <br>
        <br>
    </td>
</tr>


<tr id="order_maping_headers"></tr>
<tr id="bind_attribute_html"></tr>
</tbody></table>
<p class="submit">
<input type="submit" id="orderSave" name="submit" class="button button-primary" value="<?php esc_html_e('Save Order Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
<?php
    }   
    else {
        $google_order_mapping = json_decode($google_order_mapping, true);
        $mapping_val = '';
        foreach ($google_order_mapping as $key=>$value) {
            $mapping_val .= '<tr>
		<td>'. esc_html($key).'</td>
		<td>'. esc_html($value) .'</td>
		</tr>';
        } ?>

<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th scope="row"><label for="aiogsc-credentials"><?php esc_html_e('Woocommerce Selected Attributes','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<th scope="row"><label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Selected Attributes','all-in-one-gsheetsync-for-woocommerce');?></label></th>
</tr>
<?php echo $mapping_val; ?>
</tbody>
</table>
<a href="<?php echo esc_url(admin_url('admin.php')); ?>?page=aiogsc-settings&type=edit&tab=order"><button class="button" id="edit"><?php esc_html_e('Edit','all-in-one-gsheetsync-for-woocommerce');?></button></a>
<?php
    }
} else { ?>
<h1><?php esc_html_e('Please update your credentials to configure Order','all-in-one-gsheetsync-for-woocommerce');?></h1>
<?php } ?>
</div>


<button class="accordion <?php echo esc_attr($customerTab);?>"><?php esc_html_e('Customer','all-in-one-gsheetsync-for-woocommerce');?></button>
<div class="panel <?php echo esc_attr($customerShow); ?>">
<?php
if ($aiogsc_google_token != '1') {
    $google_customer_mapping = get_option('aiogsc_google_customer_mapping');
    $google_customer_sheetid = get_option('aiogsc_google_customer_sheetid');
    if ($google_customer_mapping == '') {
        ?>
<form id="customer-form" class="customer-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" >
<table class="credentials-table" role="presentation">
<tbody>
    <tr>
    <th scope="row">    
    <label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?> </label></th>
    <td>
    <select id="google_sheet_customer" class="google_sheet_customer_drop" name="google_sheet_customer">
    <option value="select" selected disabled hidden><?php esc_html_e('Select an Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
    <?php
        foreach ($google_sheets as $google_sheet_key=>$google_sheet_values) {
            ?>
            <optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>">
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>
    <?php
        } ?>
    </select>
    </td>
    </tr>
<tr id="customer_mapping_header"></tr>
<tr id="bind_attribute_customer"></tr>
</tbody></table>
<p class = "alert_text"><?php esc_html_e('Note: kindly choose the order section to sync the woocommerce address details.','all-in-one-gsheetsync-for-woocommerce');?></p>
<p class="submit">
<input id="customerSave" type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Save Credentials','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>
<?php
    } elseif ($google_customer_mapping != '' && $type == 'edit' && $tab == 'customer') {
        $google_customer_mapping = json_decode($google_customer_mapping, true);        ?>

    <form id="customer-form" class="customer-form" method="POST" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" >
<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th scope="row">
<label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Names','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<td>
<select id="google_sheet_customer" class="google_sheet_customer_drop" name="google_sheet_customer">
<option value="select" selected disabled hidden><?php esc_html_e('Select an Spreadsheet','all-in-one-gsheetsync-for-woocommerce');?></option>
<?php
        foreach ($google_sheets as $google_sheet_key=>$google_sheet_values) {
            ?>
             <optgroup label="<?php echo esc_html($google_sheet_values[0]); ?>">
            <?php
            foreach ($google_sheet_values[1] as $sheet_id => $sheet_name) {
                $sheet_selected = ($google_customer_sheetid == $google_sheet_key . '|' . $sheet_name) ? "selected" : "";
                ?>
                <option value="<?php echo esc_attr($google_sheet_key . '|' . $sheet_name); ?>" <?php echo esc_html($sheet_selected); ?>>
                    <?php echo esc_html($sheet_name); ?>
                </option>
                <?php
            }
            ?>
        </optgroup>
<?php
        } ?>
			</select>
</td>
</tr>
<tr id="customer_mapping_header"></tr>
<tr id="bind_attribute_customer"></tr>
</tbody></table>
<p class = "alert_text"><?php esc_html_e('Note: kindly choose the order section to sync the woocommerce address details.','all-in-one-gsheetsync-for-woocommerce');?></p>
<p class="submit">
<input id="customerSave" type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Save Customer Configuration','all-in-one-gsheetsync-for-woocommerce');?>">
</p>
<input type="hidden" name="action" value="aiogsc_ajax_call">
</form>

  <?php
    } else {
        $google_customer_mapping = json_decode($google_customer_mapping, true);
        $mapping_customer = '';
        foreach ($google_customer_mapping as $key=>$value) {
            $mapping_customer .= '<tr>
			<td>'. esc_html($key) .'</td>
<td>'. esc_html($value) .'</td>
</tr>';
        } ?>
<table class="credentials-table" role="presentation">
<tbody>
<tr>
<th scope="row"><label for="aiogsc-credentials"><?php esc_html_e('Woocommerce Selected Attributes','all-in-one-gsheetsync-for-woocommerce');?></label></th>
<th scope="row"><label for="aiogsc-credentials"><?php esc_html_e('Spreadsheet Selected Attributes','all-in-one-gsheetsync-for-woocommerce');?></label></th>
</tr>
<?php echo $mapping_customer; ?>
</tbody>
</table>
<a href="<?php echo esc_url(admin_url('admin.php') . '?page=aiogsc-settings&type=edit&tab=customer'); ?>" class="button" id="edit">
<?php esc_html_e('Edit', 'all-in-one-gsheetsync-for-woocommerce'); ?>
</a>
<?php
    }
} else { ?>
<h1><?php esc_html_e('Please update your credentials to configure Customer','all-in-one-gsheetsync-for-woocommerce');?></h1>
<?php } ?>
</div>



<button class="accordion <?php echo esc_attr($debugTab);?>"><?php esc_html_e('Log','all-in-one-gsheetsync-for-woocommerce');?></button>
<div class="panel <?php echo esc_attr($debugShow); ?>">
<?php
$logmode = get_option("aiogsc_logmode");
?>

<table style = "border-spacing: 30px;">
<tbody>
<tr>
    <td >
    <?php esc_html_e('Switch on debug mode if you want to write logs.','all-in-one-gsheetsync-for-woocommerce');?>     
    </td>
    <td>
<label class="switch">
    <?php if($logmode == 'true'){
       ?>
        <input type="checkbox" id="debugModeSwitch" checked>
        <?php
    }
    else { 
        ?>
        <input type="checkbox" id="debugModeSwitch">
   <?php } ?>
    
    <span class="slider"></span>
  </label>
</td>
</tr>
<tr>
    <td>
    <?php esc_html_e("Clear log records by clicking the 'Clear' button",'all-in-one-gsheetsync-for-woocommerce');?>
</td>

<td>
<button class = "button" id="clearlog"><?php esc_html_e('Clear','all-in-one-gsheetsync-for-woocommerce');?></button>

</td>

</tr>
<tr>
        <td>
        <?php esc_html_e("To view the Log Details by clicking the 'View' button",'all-in-one-gsheetsync-for-woocommerce');?> 
    </td>
    <td>           
   <a class = "button" href = "<?php echo esc_url( admin_url('admin.php?page=aiogsc-settings&view=logs'))?>" ><?php esc_html_e('View','all-in-one-gsheetsync-for-woocommerce');?> </a>  
    </td>
    </tr>
    

</tbody>
</table>


    </div>
  


<?php } ?>
<?php
if (! defined('ABSPATH')) {
    die;
}


use \Firebase\JWT\JWT;

if (!function_exists('aiogsc_settings')) {
function aiogsc_settings()
{
   
                require_once plugin_dir_path(__FILE__) . 'templates/aiogsc-settings.php';
}
}

add_action('wp_ajax_aiogsc_ajax_call', 'aiogsc_ajax_call');
add_action('wp_ajax_nopriv_aiogsc_ajax_call', 'aiogsc_ajax_call');

if (!function_exists('aiogsc_ajax_call')) {
function aiogsc_ajax_call()
{
    $api = new aiogsc_Api_Controller();
    
    $data = array(
        'success' => false,
        'message' => esc_html__('Error of while saving','all-in-one-gsheetsync-for-woocommerce'),
    );    

    $credential = (isset($_POST['credentials']) && !empty($_POST['credentials'])) ? json_decode(stripslashes(sanitize_text_field($_POST['credentials'])), true) : false ;
    if ($credential) {
        if (isset($credential['private_key'], $credential['client_email'])) {
            $token = $api->aiogsc_GenerateTokenSync($credential);
            if ($token[0]) {
                $token[1]['expires_in'] = time() + $token[1]['expires_in'];
                update_option('aiogsc_google_credential', $credential);
                update_option('aiogsc_google_token', $token[1]);
                $data = array(
            'success' => true,
            'module' => 'credential',
            'message' => esc_html__("Credentails Saved successfully",'all-in-one-gsheetsync-for-woocommerce'),
        );
            } else {
                $data = array(
                            'success' => false,
                'module' => 'credential',
                    'message' => esc_html__("Error :  on token Creation.",'all-in-one-gsheetsync-for-woocommerce'),
                );
            }
        } else {
            $data = array(
            'success' => false,
            'module' => 'credential',
            'message' => esc_html__("Error :  on token Creation.",'all-in-one-gsheetsync-for-woocommerce'),
        );
        }
    }

    if (isset($_POST['deleteCredential']) && $_POST['deleteCredential'] == 1) {
        $module = 'credential';
        $deleteCre = '1';
        $deletToken = '1';
        update_option('aiogsc_google_credential', $deleteCre);
        update_option('aiogsc_google_token', $deletToken);
        update_option('aiogsc_google_product_identifier', '');
        update_option('aiogsc_google_qty', '');
        update_option('aiogsc_google_sheet_id', '');
        update_option('aiogsc_google_order_mapping', '');
        update_option('aiogsc_google_order_sheetid', '');
        update_option('aiogsc_google_customer_mapping', '');
        update_option('aiogsc_google_customer_sheetid', '');
        global $wpdb;
        $table  = $wpdb->prefix . 'aiogsc_logs';
        $delete = $wpdb->query("TRUNCATE TABLE $table");
        $data = array(
        'success' => true,
        'module' => 'credential',
        'message' => esc_html__('Credential deleted Successfully.','all-in-one-gsheetsync-for-woocommerce'),
    );
    }


    if (isset($_POST['product_identifier']) && $_POST['product_identifier'] != '' && $_POST['qty'] != '' && $_POST['google_sheet'] != '') {
        $module = 'inventory';
        $product_identifier = sanitize_text_field($_POST['product_identifier']);
        $google_qty = sanitize_text_field($_POST['qty']);
        $google_sheet_id = sanitize_text_field($_POST['google_sheet']);
        update_option('aiogsc_google_product_identifier', $product_identifier);
        update_option('aiogsc_google_qty', $google_qty);
        update_option('aiogsc_google_sheet_id', $google_sheet_id);
        $data = array(
        'success' => true,
        'module' => 'inventory',
        'message' => esc_html__('Google Inventory Mapping Saved Successfully.','all-in-one-gsheetsync-for-woocommerce'),
        );
    }

    if (isset($_POST['google_sheet_order']) && $_POST['google_sheet_order'] != '') {
        $SpreadsheetID = sanitize_text_field($_POST['google_sheet_order']);
        $synctype = sanitize_text_field($_POST['sync-order']);
        $google_token   = get_option('aiogsc_google_token', false);
	$orderResponse   = $api->checkOrderRequest($SpreadsheetID, $google_token);
        update_option('aiogsc_google_order_sync_type',$synctype);
        update_option('aiogsc_google_order_mapping', $orderResponse);
        update_option('aiogsc_google_order_sheetid', $SpreadsheetID);
        $data = array(
        'success' => true,
    'module' => 'order',
        'message' => esc_html__('Google order Mapping Saved Successfully.','all-in-one-gsheetsync-for-woocommerce'),
    );
    }

    if (isset($_POST['google_sheet_orderitem']) && $_POST['google_sheet_orderitem'] != '') {
        $SpreadsheetID  = sanitize_text_field($_POST['google_sheet_orderitem']);
        $google_token   = get_option('aiogsc_google_token', false);
        $orderResponse   = $api->checkOrderRequest($SpreadsheetID, $google_token);
        update_option('aiogsc_google_orderitem_mapping', $orderResponse);
        update_option('aiogsc_google_orderitem_sheetid', $SpreadsheetID);
        $data = array(
        'success' => true,
    'module' => 'orderitem',
        'message' => esc_html__('Google order item Mapping Saved Successfully.','all-in-one-gsheetsync-for-woocommerce'),
    );
    }

    if (isset($_POST['google_sheet_customer']) && $_POST['google_sheet_customer'] != '') {
        $SpreadsheetID  = sanitize_text_field($_POST['google_sheet_customer']);
        $google_token   = get_option('aiogsc_google_token', false);
        $columnTitle    = aiogsc_columnTitle($SpreadsheetID, $google_token);
        $orderArray = array();
        foreach ($columnTitle as $key=>$value) {
            $orderArray[$_POST['woo_customer_attribute'.$key]] = sanitize_text_field($_POST['sheet_customer_header'.$key]);
        }
        $order_json =wp_json_encode($orderArray, true);
        update_option('aiogsc_google_customer_mapping', $order_json);
        update_option('aiogsc_google_customer_sheetid', $SpreadsheetID);
        $data = array(
        'success' => true,
    'module' => 'customer',
        'message' => esc_html__('Google Customer Mapping Saved Successfully','all-in-one-gsheetsync-for-woocommerce'),
        );
    }
    if ($data['module'] != '') {
        global $wpdb;
        $tablename = $wpdb->prefix.'aiogsc_logs';
        $wpdb->insert(
            $tablename,
            array(
        'module' => $data['module'],
        'response' => $data['message']),
            array( '%s', '%s' )
        );
    }
    wp_send_json($data);
    wp_die();
}
}

if (!function_exists('aiogsc_GoogleSpreadsheets')) {
function aiogsc_GoogleSpreadsheets()
{
    $api = new aiogsc_Api_Controller();
    $credential     = get_option('aiogsc_google_credential', false);
    $google_token   = get_option('aiogsc_google_token', false);
   
    if (is_array($google_token)  &&  time() > $google_token['expires_in']) {
        if ($credential) {
            $new_token = $api->aiogsc_GenerateTokenSync($credential);
            if ($new_token[0]) {
                $new_token[1]['expires_in'] = time() + $new_token[1]['expires_in'];
                $google_token = $new_token[1];
                update_option('aiogsc_google_token', $new_token[1]);
            }
        }
    }
    if ($google_token) {
        $r =  aiogsc_spreadsheetsAndWorksheets($google_token);
        if (isset($r[0]) && $r[0]) {
            return $r;
        } else {
            return array( false, array());
        }
    } else {
        return array( false, array());
    }
}
}

if (!function_exists('aiogsc_spreadsheetsAndWorksheets')) {
function aiogsc_spreadsheetsAndWorksheets($token = [])
{
    if (! is_array($token)) {
        return array( false, "Error : Token is Not Array. from wpgsi_spreadsheetsAndWorksheets func !"  );
    }
    if (! isset($token['access_token'])) {
        return array( false, "Error : access_token elements are not set on the token Array! from wpgsi_spreadsheetsAndWorksheets func !"  );
    }
    if (empty($token['access_token'])) {
        return array( false, "Error : access_token elements is empty on the token Array! from wpgsi_spreadsheetsAndWorksheets func !"  );
    }
    $returns = wp_remote_get("https://www.googleapis.com/drive/v3/files?access_token=" . $token['access_token']);
    if (is_wp_error($returns)  or  ! isset($returns['response']['code'])  or $returns['response']['code'] != 200) {
        return array( false, wp_json_encode($returns) );
    }
    $body                                   = json_decode($returns['body'], true);
    $files                                  = $body['files'];
    $spreadsheets                   = array();
    $spreadsheetsWorksheet  = array();

    foreach ($files  as $file) {
        if ($file['mimeType'] == "application/vnd.google-apps.spreadsheet") {
            $spreadsheets[ $file['id'] ] = $file['name'];
        }
    }
    foreach ($spreadsheets as $spreadsheetsKey => $spreadsheetsName) {
        $worksheetsReturns = wp_remote_get("https://sheets.googleapis.com/v4/spreadsheets/" . $spreadsheetsKey."/?access_token=" . $token['access_token']);
        if (! is_wp_error($worksheetsReturns)  &&  isset($worksheetsReturns['response']['code']) && $worksheetsReturns['response']['code'] == 200) {
            $worksheetsResponseBody = json_decode($worksheetsReturns['body'], true);
            $sheets = array();
            foreach ($worksheetsResponseBody['sheets'] as $value) {
                $sheets[ $value['properties']['sheetId'] ] = $value['properties']['title'];
            }
            $spreadsheetsWorksheet[ $spreadsheetsKey ] = array( $spreadsheetsName, $sheets );
        } else {
            return array( false,  wp_json_encode($worksheetsReturns) );
        }
    }
    return array( true, $spreadsheetsWorksheet );
}
}

add_action('wp_ajax_aiogsc_RetrieveSheetHeaders', 'aiogsc_RetrieveSheetHeaders');

add_action('wp_ajax_nopriv_aiogsc_RetrieveSheetHeaders', 'aiogsc_RetrieveSheetHeaders');

if (!function_exists('aiogsc_RetrieveSheetHeaders')) {
function aiogsc_RetrieveSheetHeaders()
{
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $SpreadsheetID  =sanitize_text_field($_POST['google_sheet_id']);
    $google_token   = get_option('aiogsc_google_token', false);
    $columnTitle    = aiogsc_columnTitle($SpreadsheetID, $google_token);
    $columnsTitles = wp_json_encode($columnTitle, true);
    $columnhtml = '';
    foreach ($columnTitle as $key=>$title) {
        $title = esc_html($title);
        $columnhtml .= '<option value="'.$title.'">'.$title.'</option>';
    }
    $columnTitles = '';
    $load_html = '<td style="width:300px;text-align: left;"><label for="aiogsc-product_identifier">Product Identifier</label></td>
		<td><select style="width:200px;" id="product_identifier" class="product_identifier_dbsave" name="product_identifier">
		<option value="select" selected disabled hidden>Select an SKU</option>
                '.$columnhtml.'
		</select></td>';

    $qty_html = '<td style="width:300px;text-align: left;"><label for="aiogsc-qty">Product Quantity</label></td>
		<td><select style="width:200px;" id="qty" class="qty_dbsave" name="qty">
		<option value="select" selected disabled hidden>Select an Quantity</option>
                '.$columnhtml.'
		</select></td>';

    $map_headers = '<th style="width:300px;text-align: left;"><label for="aiogsc-credentials">'. esc_html__("Woocommerce Product Headers","all-in-one-gsheetsync-for-woocommerce").'</label></th><th scope="row"><label for="aiogsc-credentials">'. esc_html__("Spreadsheet Headers","all-in-one-gsheetsync-for-woocommerce").'</label></th>';


    $siteUrl = get_site_url();
    $data = array(
            'load_html' => $load_html,
	    'qty_html' => $qty_html,
            'map_headers' => $map_headers,	    
            'json' => $columnsTitles,
        );
    wp_send_json($data);
    wp_die();
}
}

add_action('wp_ajax_retrieveSheetValues', 'aiogsc_RetrieveSheetValues');

add_action('wp_ajax_nopriv_retrieveSheetValues', 'aiogsc_RetrieveSheetValues');

if (!function_exists('aiogsc_RetrieveSheetValues')) {
function aiogsc_RetrieveSheetValues()
{
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $sheeID = get_option('aiogsc_google_sheet_id');
    $google_qty = get_option('aiogsc_google_qty');
    $google_product_identifier = get_option('aiogsc_google_product_identifier');
    $SpreadsheetID  = sanitize_text_field($sheeID);
    $google_token   = get_option('aiogsc_google_token', false);
    $event = new aiogsc_Event_Controller();
    $inventoryUpdate = $event->update_inventory($SpreadsheetID, $google_token, $google_qty, $google_product_identifier);
    wp_send_json($inventoryUpdate);
    wp_die();
}
}

add_action('wp_ajax_aiogsc_RetrieveOrderHeaders', 'aiogsc_RetrieveOrderHeaders');

add_action('wp_ajax_nopriv_aiogsc_RetrieveOrderHeaders', 'aiogsc_RetrieveOrderHeaders');

if (!function_exists('aiogsc_RetrieveOrderHeaders')) {
function aiogsc_RetrieveOrderHeaders()
{
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $SpreadsheetID  = sanitize_text_field($_POST['google_sheet_id']);
    $google_token   = get_option('aiogsc_google_token', false);
    $columnTitle    = aiogsc_columnTitle($SpreadsheetID, $google_token);
    $columnsTitles = wp_json_encode($columnTitle, true);
    $orderAttribute = array('order_id','product_name','quantity','product_price','billing_first_name','billing_last_name','billing_company','billing_phone','billing_address_1','billing_address_2','billing_postcode','billing_city','billing_state','billing_country','shipping_first_name','shipping_last_name','shipping_company','shipping_phone','shipping_address_1','shipping_address_2','shipping_postcode','shipping_city','shipping_state','shipping_country','shipment_method','order_total','sub_total','customer_name','customer_email','payment_method','order_date','status');
    $ordermap = get_option("aiogsc_google_order_mapping");
    $load_html = '';
    $val = 1;
    $order_mapping = json_decode($ordermap,true);
    foreach ($columnTitle as $colkey => $currentHeader) {
        $currentHeader = esc_html($currentHeader);
        // Left Dropdown
        $load_html .= '<tr id="' . esc_attr('bind_attribute' . $colkey) . '">';
        $load_html .= '<td style="width:270px">';
        $load_html .= '<select style="width:270px" id="' . esc_attr('woo_order_attribute' . $colkey) . '" class="' . esc_attr('product_identifier_dbsave_woo woo_order_attribute' . $val) . '" name="' . esc_attr('woo_order_attribute' . $colkey) . '">';
        
        $foundMatch = false;
        foreach ($orderAttribute as $attr) {
            $attr = esc_attr($attr);
            $attrName = isset($order_mapping[$attr]) ? esc_html($order_mapping[$attr]) : null;
            if ($attrName === $currentHeader) {
                $load_html .= '<option value="' . $attr . '" selected>' . $attr . '</option>';
                $foundMatch = true;
            } else {
                $load_html .= '<option value="' . $attr . '">' . $attr . '</option>';
            }
        }
       
        if (!$foundMatch) {
            $load_html .= '<option value="select" disabled hidden selected>Select an WooCommerce Order Header</option>';
        }
        $load_html .= '</select></td>';
        
        // Right Dropdown
      
       $load_html .= '<td style="width:270px">';
       $load_html .= '<select style="width:270px" id="' . esc_attr('sheet_header' . $colkey) . '" class="' . esc_attr('product_identifier_dbsave_google google_order_attribute' . $val) . '" name="' . esc_attr('sheet_header' . $colkey) . '">';
 
       $rightMatchFound = false;
       
            foreach($columnTitle as $hdval){
                $hdval = esc_html($hdval);
                if (!empty($order_mapping) && in_array($currentHeader, $order_mapping)) {
                if($currentHeader == $hdval){
                    $load_html .= '<option value="' . $hdval . '" selected>' . $hdval . '</option>';
                    $rightMatchFound = true;
                }
                else {
                    $load_html .= '<option value="' . $hdval . '">' . $hdval . '</option>';
                }
            }
            else {
                
                $load_html .= '<option value="' . $hdval . '">' . $hdval . '</option>';
                    
            }
        }
        if (!$rightMatchFound) {
            $load_html .= '<option value="select" disabled hidden selected>Select a Spreadsheet Header</option>';
        }
        $load_html .= '</select></td></tr>';
       
        $val++;
    }

    $map_headers = '<tr><th scope="row" style = "width:70%"><label for="aiogsc-credentials">Order Identifiers</label></th><th scope="row"><label for="aiogsc-credentials">Spreadsheet Headers</label></th></tr>';
    $map_headers = wp_kses($map_headers, array(
        'tr' => array(),
        'th' => array('scope' => array(), 'style' => array()),
        'label' => array('for' => array())
    ));

    $data = array(
            'load_html' => $load_html,
            'map_headers' => $map_headers,
    );
    
    wp_send_json($data);
    wp_die();
}
}

add_action('wp_ajax_aiogsc_RetrieveCustomerHeaders', 'aiogsc_RetrieveCustomerHeaders');

add_action('wp_ajax_nopriv_aiogsc_RetrieveCustomerHeaders', 'aiogsc_RetrieveCustomerHeaders');

if (!function_exists('aiogsc_RetrieveCustomerHeaders')) {
function aiogsc_RetrieveCustomerHeaders()
{
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $SpreadsheetID  = sanitize_text_field($_POST['google_sheet_id']);
    $google_token   = get_option('aiogsc_google_token', false);
    $columnTitle    = aiogsc_columnTitle($SpreadsheetID, $google_token);
    $columnsTitles = wp_json_encode($columnTitle, true);
    $orderAttribute = array('user_name','first_name','last_name','display_name','email');
    $google_customer_mapping = get_option('aiogsc_google_customer_mapping');
   
// Start generating the HTML for the dropdowns
$load_html = '';
$val = 1;
$customer_mapping = json_decode($google_customer_mapping, true);
foreach ($columnTitle as $colkey => $currentHeader) {
    $currentHeader = esc_html($currentHeader);
    // Left Dropdown
   $load_html .= '<tr id="bind_attribute' . esc_attr($colkey) . '">
            <td style="width:270px">
                <select style="width:270px" id="woo_customer_attribute' . esc_attr($colkey) . '" 
                        class="product_identifier_dbsave_woo_customer woo_customer_attribute' . esc_attr($val) . '" 
                        name="woo_customer_attribute' . esc_attr($colkey) . '">';
    $foundMatch = false;
   
    foreach ($orderAttribute as $attr) {
        $attr = esc_attr($attr);
        $attrName = isset($customer_mapping[$attr]) ? $customer_mapping[$attr] : null;
        if ($attrName === $currentHeader) {
            $load_html .= "<option value='$attr' selected>$attr</option>";
            $foundMatch = true;
        } else {
            $load_html .= "<option value='$attr'>$attr</option>";
        }
    }
   
    if (!$foundMatch) {
        $load_html .= '<option value="select" disabled hidden selected>Select an WooCommerce Order Header</option>';
    }
    $load_html .= '</select></td>';

    // Right Dropdown
    $load_html .= '<td style="width:270px">
            <select style="width:270px" id="sheet_customer_header' . esc_attr($colkey) . '" 
                    class="product_identifier_dbsave_google_customer google_customer_attribute' . esc_attr($val) . '" 
                    name="sheet_customer_header' . esc_attr($colkey) . '">';
        
    $rightMatchFound = false;

        foreach($columnTitle as $hdval){
            $hdval = esc_html($hdval);
            if (!empty($customer_mapping) && in_array($currentHeader, $customer_mapping)) {
            if($currentHeader == $hdval){
                $load_html .= "<option value='$hdval' selected>$hdval</option>";
                $rightMatchFound = true;
            }
            else {
            $load_html .= "<option value='$hdval'>$hdval</option>";
            }
        }
        else {
            
                $load_html .= "<option value='$hdval'>$hdval</option>";
                
        }
    }
    if (!$rightMatchFound) {
        $load_html .= '<option value="select" disabled hidden selected>Select a Spreadsheet Header</option>';
    }
    $load_html .= '</select></td></tr>';
    $val++;
}
        $map_headers = '<tr><th scope="row" style = "width:70%"><label for="aiogsc-credentials">'. esc_html__("Customer Identifiers","all-in-one-gsheetsync-for-woocommerce").'</label></th><th scope="row"><label for="aiogsc-credentials">'. esc_html__("Spreadsheet Headers","all-in-one-gsheetsync-for-woocommerce").'</label></th></tr>';
    $data = array(
            'load_html' => $load_html,
            'map_headers' => $map_headers,
    );

    wp_send_json($data);
    wp_die();
}
}

if (!function_exists('aiogsc_columnTitle')) {
function aiogsc_columnTitle($spreadsheets_id = '', $token = [])
{
    $gsheetids = explode('|', $spreadsheets_id);
    $spreadsheets_id = isset($gsheetids[0]) ? $gsheetids[0] : '';
    $sheetname = isset($gsheetids[1])? $gsheetids[1] : '';
   
    $request = wp_remote_get('https://sheets.googleapis.com/v4/spreadsheets/'. $spreadsheets_id . '/values/'.$sheetname .'!A1:YZ1?access_token='. $token['access_token']);

    if (is_wp_error($request)  or  ! isset($request['response']['code']) or $request['response']['code'] != 200) {
        return array( false, wp_json_encode($request) );
    }

    $responseBody = json_decode($request['body'], true);

    if (!isset($responseBody['values'][0])) {
        return array( true, array( "A"=>"","B"=>"","C"=>"","D"=>"","E"=>"","F"=>"","G"=>"","H"=>"","I"=>"","J"=>"","K"=>"","L"=>"","M"=>"","N"=>"","O"=>"","P"=>"","Q"=>"","R"=>"","S"=>"","T"=>"","U"=>"","V"=>"","W"=>"","X"=>"","Y"=>"","Z"=>"" ) );
    }

    $key_array = array();
    for ($i = "A"; $i < 'ZZ' ; $i++) {
        array_push($key_array, $i);
    }
    $columnKeyTitle  = array_combine(array_slice($key_array, 0, count($responseBody['values'][0])), $responseBody['values'][0]);

    return$columnKeyTitle;
}
}
$type = get_option('aiogsc_google_order_sync_type');
if($type == 'new-order')
add_action('woocommerce_thankyou', 'aiogsc_OrderSynzGoogle', 111, 1);

if($type == 'after-payment')
add_action('woocommerce_payment_complete','aiogsc_OrderSynzGoogle',111,1);
if($type == 'processing-order')
add_action('woocommerce_order_status_processing','aiogsc_OrderSynzGoogle',111,1);
if($type == 'completing-order')
add_action('woocommerce_order_status_completed','aiogsc_OrderSynzGoogle',111,1);

if (!function_exists('aiogsc_OrderSynzGoogle')) {
function aiogsc_OrderSynzGoogle($order_id)
{                 
        $google_order_sheetid   = get_option('aiogsc_google_order_sheetid', false);
        $event = new aiogsc_Event_Controller();
        $orderDetail = $event->get_order($order_id, $google_order_sheetid);       
        $order = wc_get_order($order_id);
        $note = esc_html__("aiogsc_notes",'all-in-one-gsheetsync-for-woocommerce') . '=' . $orderDetail ;
        $order->add_order_note($note);    
        return $orderDetail;  
}
}

if (!function_exists('aiogsc_CustomerCreated')) {
function aiogsc_CustomerCreated($customer_id)
{
    $google_customer_sheetid   = get_option('aiogsc_google_customer_sheetid', false);
    $event = new aiogsc_Event_Controller();
    $customerDetail = $event->get_customer($customer_id, $google_customer_sheetid);    
    return $customerDetail;
}
}
add_action('woocommerce_created_customer', 'aiogsc_CustomerCreated',150,1);

add_action('user_register', 'aiogsc_UserRegistration');

if (!function_exists('aiogsc_UserRegistration')) {
function aiogsc_UserRegistration($customer_id)
{   
    $event = new aiogsc_Event_Controller();
    $user_ID = get_current_user_id();
    $checkUserRole = $event->checkUserRole($user_ID);
    
    if ($checkUserRole == true) {
        $google_customer_sheetid   = get_option('aiogsc_google_customer_sheetid', false);
        $customerDetail = $event->get_customer($customer_id, $google_customer_sheetid);    
        return $customerDetail;
    }
}
}

if (!function_exists('aiogsc_ActionWoocommerceOrderStatusChanged')) {
function aiogsc_ActionWoocommerceOrderStatusChanged($this_get_id, $this_status_transition_from, $this_status_transition_to, $instance)
{
    $order_id = $this_get_id;
    $event = new aiogsc_Event_Controller();
    $customerDetail = $event->get_order_notes($order_id, $this_status_transition_to);
    return $customerDetail;
}
}
add_action('woocommerce_order_status_changed', 'aiogsc_ActionWoocommerceOrderStatusChanged', 10, 4);

add_filter( 'bulk_actions-edit-product', 'aiogsc_InstantSyncProductBulkActions' );
if (!function_exists('aiogsc_InstantSyncProductBulkActions')) {
function aiogsc_InstantSyncProductBulkActions( $bulk_actions ) {
    $bulk_actions['instant_sync'] = esc_html__('Instant sync','all-in-one-gsheetsync-for-woocommerce');
    return $bulk_actions;
}
}

add_action( 'admin_action_instant_sync', 'aiogsc_BulkProductSync' );

if (!function_exists('aiogsc_BulkProductSync')) {
function aiogsc_BulkProductSync() {
    if( !isset( $_REQUEST['post'] ) && !is_array( $_REQUEST['post'] ) )
	    return;
    $productData = array_map( 'absint', $_REQUEST['post'] );
    aiogsc_GoogleSpreadsheets();
    $sheeID = get_option('aiogsc_google_sheet_id');
    $SpreadsheetID  = sanitize_text_field($sheeID);
    $google_token   = get_option('aiogsc_google_token', true);
    $event = new aiogsc_Event_Controller();
    foreach( $productData as $product_id ) {
	    $sku = get_post_meta( $product_id, '_sku', true );
	    $inventoryUpdate = $event->update_inventory_listpage($SpreadsheetID, $google_token,$sku);
    }
    $location = add_query_arg( array(
                'post_type' => 'product',
                'instant_sync' => 1,
                'changed' => count( $productData),
                'ids' => join( ',' , $productData),
                'post_status' => 'all'
        ), 'edit.php' );
    wp_redirect( admin_url( $location ) );
    exit;

}
}
add_filter( 'bulk_actions-edit-shop_order', 'aiogsc_InstantSyncOrdersBulkActions' );

if (!function_exists('aiogsc_InstantSyncOrdersBulkActions')) {
function aiogsc_InstantSyncOrdersBulkActions( $bulk_actions ) {
    $bulk_actions['instant_sync_order'] = 'Instant sync Orders';
    return $bulk_actions;
}
}

add_action( 'admin_action_instant_sync_order', 'aiogsc_BulkOrderSync' );

if (!function_exists('aiogsc_BulkOrderSync')) {
function aiogsc_BulkOrderSync() {
    if( !isset( $_REQUEST['post'] ) && !is_array( $_REQUEST['post'] ) )
            return;
    aiogsc_GoogleSpreadsheets();
    $orderData = array_map( 'absint', $_REQUEST['post'] );        
    foreach( $orderData as $order_id ) {
	    aiogsc_OrderSynzGoogle($order_id,true);
    }    
	$location = add_query_arg( array(
    		'post_type' => 'shop_order',
		'instant_sync_order' => 1, 
		'changed' => count( $orderData ), 
		'ids' => join( ',',$orderData),
		'post_status' => 'all'
	), 'edit.php' );

	wp_redirect( admin_url( $location ) );
	exit;    
}
}

add_action('admin_notices', 'aiogsc_OrderStatusNotices');

if (!function_exists('aiogsc_OrderStatusNotices')) {
function aiogsc_OrderStatusNotices() {

	global $pagenow, $typenow;

	if( $typenow == 'shop_order'
	 && $pagenow == 'edit.php'
	 && isset( $_REQUEST['instant_sync_order'] ) ) {
        echo '<div class="updated"><p>' .esc_html__('Order updated to google sheet.',"all-in-one-gsheetsync-for-woocommerce") . '</p></div>';
	}
	
	if( $typenow == 'product'
         && $pagenow == 'edit.php'
         && isset( $_REQUEST['instant_sync'] ) ) {
                $message = esc_html__("Product Inventory Updated.","all-in-one-gsheetsync-for-woocommerce");
                echo '<div class="updated"><p>'. esc_html__("Product Inventory Updated.","all-in-one-gsheetsync-for-woocommerce") . '</p></div>';
        }	
}
}

if (!function_exists('aiogsc_logs_datatables')) {
function aiogsc_logs_datatables() {
    ob_start(); 
    $modetype = get_option("aiogsc_logmode");
    ?>
<input type="hidden" id="aiogsclogmode" value="<?php echo esc_attr($modetype); ?>">    
    <?php
    
    if($modetype == 'true'){ 
    ?>

    <table id="aiogsc_logstable">
    <thead>
        <tr>
            <th><?php esc_html_e('Module Name','all-in-one-gsheetsync-for-woocommerce');?></th>
	    <th><?php esc_html_e('Response','all-in-one-gsheetsync-for-woocommerce');?></th>
            <th><?php esc_html_e('Date/Time','all-in-one-gsheetsync-for-woocommerce');?></th>
        </tr>
    </thead>
    </table>
    <?php }
    else {?>
        <h1><?php esc_html_e('Please switch on the Log mode to view the Logs','all-in-one-gsheetsync-for-woocommerce');?></h1>
        <?php
    }
    
     return ob_get_clean();
}
}
add_shortcode ('aiogsc_logs_datatables', 'aiogsc_logs_datatables');

add_action('wp_ajax_aiogsc_logs_datatables', 'aiogsc_datatables_server_side_callback');
add_action('wp_ajax_nopriv_aiogsc_logs_datatables', 'aiogsc_datatables_server_side_callback');

if (!function_exists('aiogsc_datatables_server_side_callback')) {
function aiogsc_datatables_server_side_callback() {

  header("Content-Type: application/json");
  global $wpdb;  
  $logmode = get_option('aiogsc_logmode');
  if($logmode == 'true'){ 
  $table = $wpdb->prefix . 'aiogsc_logs';
  $totalData = $wpdb->get_var("SELECT COUNT(*) FROM $table");
  
$search = '%' . $wpdb->esc_like(sanitize_text_field($_REQUEST['search']['value'])) . '%';
$start = intval($_REQUEST['start']);
$length = intval($_REQUEST['length']);

$query = "SELECT * FROM $table";
$params = [];

if (!empty(trim($search, '%'))) {
    $query .= " WHERE (module LIKE %s OR response LIKE %s OR date LIKE %s)";
    $params[] = $search;
    $params[] = $search;
    $params[] = $search;
}

$query .= " ORDER BY id DESC LIMIT %d, %d";
$params[] = $start;
$params[] = $length;
if (count($params) == 5) {
    $prepared_query = $wpdb->prepare($query, $params[0], $params[1], $params[2], $params[3], $params[4]);
} elseif (count($params) == 2) {
    $prepared_query = $wpdb->prepare($query, $params[0], $params[1]);
} else {
    $prepared_query = $query;
}

$result = $wpdb->get_results($prepared_query);

  if ( count($result) != 0 ) {

          foreach ($result as $post) {
                  $module = $post->module;
		  $response = $post->response;
		  $date = $post->date;

      $nestedData = array();
      $nestedData[] = $module;
      $nestedData[] = $response;
      $nestedData[] = $date;      

      $data[] = $nestedData;

    }
    $json_data = array(
      "draw" => intval($_REQUEST['draw']),
      "recordsTotal" => intval($totalData),
      "recordsFiltered" => intval($totalData),
      "data" => $data
    );
    
    wp_send_json($json_data);

  } else {

    $json_data = array(
      "data" => array()
    );

    wp_send_json($json_data);
  }
}
else {
    echo "<p>". esc_html_e("Switch on the log mode to view the log details",'all-in-one-gsheetsync-for-woocommerce')."</p>";
}

  wp_die();

}
}

add_action('wp_ajax_aiogsc_SetLogOption','aiogsc_SetLogOption');

if (!function_exists('aiogsc_SetLogOption')) {
function aiogsc_SetLogOption(){
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $mode = sanitize_text_field($_REQUEST['debugMode']) ;
    update_option("aiogsc_logmode",$mode);     
}
}

add_action("wp_ajax_clearlog",'aiogsc_ClearLog');

if (!function_exists('aiogsc_ClearLog')) {
function aiogsc_ClearLog() {
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    global $wpdb;
    $table = $wpdb->prefix . 'aiogsc_logs';
    $result =  $wpdb->query("DELETE FROM $table");
    if ($result === false) {         
        $message = array("msg" => esc_html__("Error:","all-in-one-gsheetsync-for-woocommerce") . $wpdb->last_error);
    } elseif ($result === 0) {                
        $message = array("msg" => esc_html__("No rows were deleted","all-in-one-gsheetsync-for-woocommerce"));
    } else {        
        $message = array("msg" => esc_html__("Cleared the log data","all-in-one-gsheetsync-for-woocommerce"));
    }
    
    wp_json_encode($message);
    wp_die();
}
}

add_action('wp_ajax_aiogsc_RetrieveOrderItemHeaders', 'aiogsc_RetrieveOrderItemHeaders');

add_action('wp_ajax_nopriv_aiogsc_RetrieveOrderItemHeaders', 'aiogsc_RetrieveOrderItemHeaders');

if (!function_exists('aiogsc_RetrieveOrderItemHeaders')) {
function aiogsc_RetrieveOrderItemHeaders()
{
    check_ajax_referer('aiogsc_Sync', 'secureKey');
    $SpreadsheetID  = sanitize_text_field($_POST['google_sheet_orderitem_id']);
    $google_token   = get_option('aiogsc_google_token', false);
    $columnTitle    = aiogsc_columnTitle($SpreadsheetID, $google_token);
    $columnsTitles = wp_json_encode($columnTitle, true);
    $orderAttribute = array('order_id','product_name','quantity','product_price','billing_first_name','billing_last_name','billing_company','billing_phone','billing_address_1','billing_address_2','billing_postcode','billing_city','billing_state','billing_country','shipping_first_name','shipping_last_name','shipping_company','shipping_phone','shipping_address_1','shipping_address_2','shipping_postcode','shipping_city','shipping_state','shipping_country','shipment_method','order_total','sub_total','customer_name','customer_email','payment_method','order_date','status');

    $orderAttributes = '';
    foreach ($orderAttribute as $attribute) {
        $orderAttributes .= '<option value="'.$attribute.'">'.$attribute.'</option>';
    }

    $columnhtml = '';
    foreach ($columnTitle as $key=>$title) {
        $columnhtml .= '<option value="'.$title.'">'.$title.'</option>';
    }
    $columnTitles = '';
    $load_html = '';
    $val = 1;
    foreach ($columnTitle as $key=>$title) {
        $load_html .= '<tr id="bind_attribute'.$key.'"><td><select id="woo_order_attribute'.$key.' removeWooAttribute" class="product_identifier_dbsave_woo woo_order_attribute'.$val.'" name="woo_order_attribute'.$key.'" ><option value="select" selected disabled hidden>Select an woocommerce Order Header</option>'.$orderAttributes.'</select></td>
                <td><select id="sheet_header'.$key.'" class="product_identifier_dbsave_google google_order_attribute'.$val.'" name="sheet_header'.$key.'" >
                <option value="select" selected disabled hidden>Select an SpreadSheet Header</option>
                '.$columnhtml.'
                
                </select></td></tr>';
        $val++;
    }

    $map_headers = '<tr><th scope="row" style = "width:70%"><label for="aiogsc-credentials">'.esc_html__("Order Identifiers","all-in-one-gsheetsync-for-woocommerce").'</label></th><th scope="row"><label for="aiogsc-credentials">'. esc_html__("Spreadsheet Headers","all-in-one-gsheetsync-for-woocommerce").'</label></th></tr>';

    $data = array(
            'load_html' => $load_html,
            'map_headers' => $map_headers,
    );

    wp_send_json($data);
    wp_die();
}
}


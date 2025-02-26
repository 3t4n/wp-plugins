<?php
if (! defined('ABSPATH')) {
    die;
}
require_once plugin_dir_path(dirname(__FILE__)) . 'vendor/autoload.php';
use \Firebase\JWT\JWT;

class aiogsc_Api_Controller
{
    public function __construct()
    {
    }

    public function insert_order($mapping, $google_order_sheetid)
    {
        $SpreadsheetID  = sanitize_text_field($google_order_sheetid);
        $google_token   = get_option('aiogsc_google_token', false);
        $credential     = get_option('aiogsc_google_credential', false);
        if ($google_token  &&  time() > $google_token['expires_in']) {
            if ($credential) {
                $new_token = $this->aiogsc_GenerateTokenSync($credential);
                if ($new_token[0]) {
                    $new_token[1]['expires_in'] = time() + $new_token[1]['expires_in'];
                    $google_token = $new_token[1];
                    update_option('aiogsc_google_token', $new_token[1]);
                }
            }
        }
        $google_token   = get_option('aiogsc_google_token', false);
        $columnTitle    = $this->aiogsc_columnTitle($SpreadsheetID, $google_token);
        $inserRecord  = $this->insert_record($mapping, $SpreadsheetID, $google_token, $columnTitle);
        
        $insertLogs = $this->aiogsc_logs('order', $inserRecord);
        return $inserRecord;
    }

    public function insert_customer($mapping, $google_order_sheetid)
    {
        $SpreadsheetID  = sanitize_text_field($google_order_sheetid);
        $google_token   = get_option('aiogsc_google_token', false);
        $credential     = get_option('aiogsc_google_credential', false);

        if ($google_token  &&  time() > $google_token['expires_in']) {
            if ($credential) {
                $new_token = $this->aiogsc_GenerateTokenSync($credential);
                if ($new_token[0]) {
                    $new_token[1]['expires_in'] = time() + $new_token[1]['expires_in'];
                    $google_token = $new_token[1];
                    update_option('aiogsc_google_token', $new_token[1]);
                }
            }
        }
        $columnTitle    = $this->aiogsc_columnTitle($SpreadsheetID, $google_token);
        $inserRecord  = $this->insert_record($mapping, $SpreadsheetID, $google_token, $columnTitle);
        $insertLogs = $this->aiogsc_logs('customer', $inserRecord);
        return $inserRecord;
    }

    public function updateInventory($columnTitle, $columnLists, $google_qty, $google_product_identifier)
    {
        $updateInventory = $this->update_inventory($columnTitle, $columnLists, $google_qty, $google_product_identifier);
        $log = wp_json_encode($updateInventory);
        $insertLogs = $this->aiogsc_logs('inventory', $log);
        return $updateInventory;
    }

    public function aiogsc_columnTitle($spreadsheets_id = '', $token = [])
    { 
        $gsheetids = explode('|', $spreadsheets_id);
        $spreadsheets_id = isset($gsheetids[0]) ? $gsheetids[0] : '';
        $sheetname = isset($gsheetids[1])? $gsheetids[1] : '';
        $request = wp_remote_get('https://sheets.googleapis.com/v4/spreadsheets/'. $spreadsheets_id . '/values/' . $sheetname . '!A1:YZ1?access_token='. $token['access_token']);

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
    
    public function aiogsc_column($spreadsheets_id = '', $token = [])
    {
        $gsheetids = explode('|', $spreadsheets_id);
        $spreadsheets_id = isset($gsheetids[0]) ? $gsheetids[0] : '';
        $sheetname = isset($gsheetids[1])? $gsheetids[1] : '';
        $request = wp_remote_get('https://sheets.googleapis.com/v4/spreadsheets/'. $spreadsheets_id . '/values/' . $sheetname . '!A1:Z100?access_token='. $token['access_token']);

        $responseBody = json_decode($request['body'], true);

        return $responseBody['values'];
    }

    public function insert_record($mapping, $spreadsheets_id, $token, $columnTitle)
    {        
        $gsheetids = explode('|', $spreadsheets_id);
        $spreadsheets_id = isset($gsheetids[0]) ? $gsheetids[0] : '';
        $sheetname = isset($gsheetids[1])? $gsheetids[1] : '';
        foreach ($columnTitle as $key=>$value) {
            $mapped_val = str_replace(',', ' ', $mapping[$value]);
            $sheet_values[] = $mapped_val;
        }

        if (! is_array($token)) {
            return array( false, "Error: Token is Not Array. from wpgsi_columnTitle func !"  );
        }
        if (! isset($token['access_token'])) {
            return array( false, "Error: access_token elements are not set on the token Array! from wpgsi_columnTitle func !"  );
        }
        if (empty($token['access_token'])) {
            return array( false, "Error: access_token elements is empty on the token Array! from wpgsi_columnTitle func !"  );
        }

        $postVal = array(
            "range" => "$sheetname!A1:Z1",
            "majorDimension" => "ROWS",
            "values" => array(
                $sheet_values
            )
        );

        $response = wp_remote_post(
            "https://sheets.googleapis.com/v4/spreadsheets/" . $spreadsheets_id . "/values/" . $sheetname ."!A1:Z1:append?valueInputOption=RAW&access_token=" . $token['access_token'],
            array(
                'method'      => 'POST',
                'timeout'     => 30,
                'redirection' => 10,
                'httpversion' => '1.1',
                'blocking'    => true,
                'headers'     => array(
                    'Content-Type' => 'application/json',
                    'Cache-Control' => 'no-cache',
                ),
                'body'        => wp_json_encode($postVal),
                'cookies'     => array(),
            )
        );
        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();
            return $error_message;
        } else {
            $body = wp_remote_retrieve_body($response);
            return $body;
        }
    }
    public function update_inventory($columnTitle, $columnLists, $google_qty, $google_product_identifier)
    {
        $sheet_Column_sku = array_search($google_product_identifier, $columnLists[0]);
        $sheet_Column_qty = array_search($google_qty, $columnLists[0]);

        foreach ($columnLists as $columnList) {
            $sku = $columnList[$sheet_Column_sku];
            $qty = $columnList[$sheet_Column_qty];
            $post_id = wc_get_product_id_by_sku($sku);
            update_post_meta($post_id, '_stock', $qty);
            update_post_meta($post_id, '_manage_stock','yes');	
        }
        $data = array(
            'success' => true,
            'message' => __('Inventory Quantity Updated Successfully.','all-in-one-gsheetsync-for-woocommerce'),
    );

        return $data;
    }

    public function updateInventoryProductListing($columnLists,$sku)
    {
        foreach($columnLists as $column)
	    {
		    if($column[0] == $sku) // First column of google sheet is SKU
		    {
			    $value = $column[1];		    
		        $post_id = wc_get_product_id_by_sku($sku);
		        update_post_meta($post_id, '_stock', $value);	
                update_post_meta($post_id, '_manage_stock','yes');	    
            }
	    }
	    $data = array(
            'success' => true,
            'message' => __('Inventory Quantity Updated Successfully.','all-in-one-gsheetsync-for-woocommerce'),
    );

        return $data;
    }

    public function update_order_notes($response, $order_status)
    {
        $sheet_id = $response['spreadsheetId'];
        $updatedRange = $response['updates']['updatedRange'];
        $google_token   = get_option('aiogsc_google_token', false);
        $credential     = get_option('aiogsc_google_credential', false);
        if ($google_token  &&  time() > $google_token['expires_in']) {
            if ($credential) {
                $new_token = $this->aiogsc_GenerateTokenSync($credential);
                if ($new_token[0]) {
                    $new_token[1]['expires_in'] = time() + $new_token[1]['expires_in'];
                    $google_token = $new_token[1];
                    update_option('aiogsc_google_token', $new_token[1]);
                }
            }
        }

        $google_token   = get_option('aiogsc_google_token', false);
    }

    public function aiogsc_logs($module, $response)
    {
        global $wpdb;
        $tablename = $wpdb->prefix.'aiogsc_logs';
        $wpdb->insert(
            $tablename,
            array(
            'module' => $module,
            'response' => $response),
            array( '%s', '%s' )
        );
    }
    public function aiogsc_GenerateTokenSync($credential = [])
    {
        if (! isset($credential['client_email'])) {
            return array( false, array('Error:'=> 420 , 'Message' => 'Error: client_email not set. from  aiogsc_token func !') );
        }
        if (empty($credential['client_email'])) {
            return array( false, array('Error:'=> 420 , 'Message' => "Error: client_email is Empty. from aiogsc_token func !") );
        }
        if (! isset($credential['private_key'])) {
            return array( false, array('Error:'=> 420 , 'Message' => "Error: private_key not set. from  aiogsc_token func !") );
        }
        if (empty($credential['private_key'])) {
            return array( false, array('Error:'=> 420 , 'Message' => "Error: private_key is Empty. from aiogsc_token func !") );
        }

        $payload = array(
            "iss"       =>  $credential['client_email'],
            "scope"     => 'https://www.googleapis.com/auth/drive',
            "aud"       => 'https://oauth2.googleapis.com/token',
            "exp"       =>      time()+3600,
            "iat"       =>      time(),
        );

        $jwt  = JWT::encode($payload, $credential['private_key'], 'RS256');

        $args = array(
            'headers' => array(),
            'body'    => array(
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion'  => $jwt,
            )
        );
        $returns  =  wp_remote_post('https://oauth2.googleapis.com/token', $args);
        if (is_wp_error($returns) or ! is_array($returns) or ! isset($returns['body'])) {
            return array( false, "Error :  on token Creation." . wp_json_encode($returns, true)  );
        } else {
            return array( true, json_decode($returns['body'], true) );
        }
    }
    public function checkRole($userId)
    {
        if ($userId == 0) {
            return false;
        }
        $user = new WP_User($userId);
        $roles = $user->roles;
        if ($roles[0] == 'administrator') {
            return true;
        }
    }

    function checkOrderRequest($SpreadsheetID, $google_token)
{
        $columnTitle    = $this->aiogsc_columnTitle($SpreadsheetID, $google_token);
        $aiogsc_column = $this->aiogsc_column($SpreadsheetID, $google_token);
        $orderArray = array();
        foreach ($columnTitle as $key=>$value) {
            
                    $orderArray[sanitize_text_field($_POST['woo_order_attribute'.$key])] = sanitize_text_field($_POST['sheet_header'.$key]);
            
	}
        $order_json =wp_json_encode($orderArray, true);
	return $order_json;

}
}

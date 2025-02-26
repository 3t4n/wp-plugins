<?php
if (! defined('ABSPATH')) {
    die;
}
class aiogsc_Event_Controller
{
    public function __construct()
    {
    }

    public function get_order($order_id, $google_order_sheetid)
    {
        $frame = new aiogsc_Frame_Controller();
	$api = new aiogsc_Api_Controller();
	$order = wc_get_order($order_id);    
    
   
    foreach ($order->get_items('line_item') as $item_id => $item) {    
                    $item_get_name = $item->get_name();
                    $item_get_quantity = $item->get_quantity();
                    $item_get_total = $item->get_total();         
                    $product = $item->get_product();
                    $product_price = $product ? $product->get_price() : null;           
                    $frame_request = $frame->frame_request_order($order_id,$item_get_name,$item_get_quantity,$item_get_total,$product_price);                    
                    $api_insert = $api->insert_order($frame_request, $google_order_sheetid);
            }
	return $api_insert;
    }
    public function get_customer($customer_id, $google_order_sheetid)
    {
        $frame = new aiogsc_Frame_Controller();
        $api = new aiogsc_Api_Controller();
        
        if ($customer_id == 0) {
            return false;
        }
        $user = new WP_User($customer_id);
        $roles = $user->roles;       
        if ($roles[0] == 'customer') {               
        $frame_request = $frame->frame_request_customer($customer_id);
        $api_insert = $api->insert_customer($frame_request, $google_order_sheetid);        
        return $api_insert;
        }
    }

    public function get_order_notes($order_id, $order_status)
    {
        $frame = new aiogsc_Frame_Controller();
        $api = new aiogsc_Api_Controller();
        $frame_request = $frame->frame_request_order_notes($order_id);
        $frame_request_status = $frame->frame_request_order_status();
        if ($frame_request['success'] == true && $frame_request_status['success'] == true) {
            $api_order_note = $api->update_order_notes($frame_request['notes'], $order_status);           
        }

        return $frame_request;
    }

    public function update_inventory($SpreadsheetID, $google_token, $google_qty, $google_product_identifier)
    {
        $api = new aiogsc_Api_Controller();
        $columnTitle   = $api->aiogsc_columnTitle($SpreadsheetID, $google_token);
        $columnLists   = $api->aiogsc_column($SpreadsheetID, $google_token);
        $updateInventory = $api->updateInventory($columnTitle, $columnLists, $google_qty, $google_product_identifier);
        return $updateInventory;
    }

    public function update_inventory_listpage($SpreadsheetID, $google_token, $sku)
    {
        $api = new aiogsc_Api_Controller();
	$columnLists   = $api->aiogsc_column($SpreadsheetID, $google_token);
	$updateInventory = $api->updateInventoryProductListing($columnLists,$sku);
    }

    public function checkUserRole($userId)
    {
        $api = new aiogsc_Api_Controller();
        $checkUserRole = $api->checkRole($userId);
        return $checkUserRole;
    }
}

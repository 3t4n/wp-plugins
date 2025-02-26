<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Model_Product {  
  
  protected $_wpdb;
  protected $_mainTable;      
      
      
  public function __construct(){
    global $wpdb;
    
    $this->_wpdb = $wpdb;   
    $this->_mainTable = "{$this->_wpdb->base_prefix}pofw_pizzatoppings_product";          		
  }	


  public function saveOptions($productId, $data)
  {
    $productId = (int) $productId;

    $ptProductId = isset($data['pt_product_id']) ? (int) $data['pt_product_id'] : -1;    
    $optionId = (int) $data['option_id'];
    $minSelection = isset($data['min_selection']) ? (int) $data['min_selection'] : 0;      
    $maxSelection = isset($data['max_selection']) ? (int) $data['max_selection'] : 0;
    
    $select = "SELECT pt_product_id FROM {$this->_mainTable} WHERE product_id = {$productId} LIMIT 1";       
    $ptProductId = $this->_wpdb->get_var($select);    
    
    if ($ptProductId > 0){       
      $this->_wpdb->query("UPDATE {$this->_mainTable} SET option_id = {$optionId}, min_selection = {$minSelection}, max_selection = {$maxSelection} WHERE pt_product_id = {$ptProductId}");                      
    } else {    
      $this->_wpdb->query("INSERT INTO {$this->_mainTable} SET product_id = {$productId}, option_id = {$optionId}, min_selection = {$minSelection}, max_selection = {$maxSelection}");                
    }           
  }


  public function getOptions($productId)
  {    
    $productId = (int) $productId;   
    $select = "SELECT pt_product_id, option_id, min_selection, max_selection FROM {$this->_mainTable} WHERE product_id = {$productId} LIMIT 1";       
    return $this->_wpdb->get_row($select, ARRAY_A);            
  }


  public function getAllOptions()
  {            
    $options = array();
       
    $select = "SELECT option_id, min_selection, max_selection FROM {$this->_mainTable} WHERE min_selection > 0 AND max_selection > 0";
    $rows = $this->_wpdb->get_results($select, ARRAY_A);      
    
    foreach($rows as $r){
      $options[$r['option_id']] = array('min_selection' => $r['min_selection'], 'max_selection' => $r['max_selection']); 
    }
    
    return $options;                    
  }
    
  
  public function deleteProductOptions($productId){    
    $productId = (int) $productId;
    $this->_wpdb->query("DELETE FROM {$this->_mainTable} WHERE product_id = {$productId}");                                   
  }

}

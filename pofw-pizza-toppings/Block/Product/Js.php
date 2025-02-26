<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Block_Product_Js {
  
  protected $_ptOption;
  protected $_ptProduct;
  
  protected $_productOptions;  
  protected $_ptProductData;  
  

	public function __construct(){

    include_once(Pektsekye_PT()->getPluginPath() . 'Model/Option.php');
    $this->_ptOption = new Pektsekye_PizzaToppings_Model_Option();
        
    include_once(Pektsekye_PT()->getPluginPath() . 'Model/Product.php');
    $this->_ptProduct = new Pektsekye_PizzaToppings_Model_Product();			 		  			
	}


  public function getProductId(){
    global $product;
    return (int) $product->get_id();              
  }
  
  
  public function getProductOptions() {  
    if (!isset($this->_productOptions)){
      $this->_productOptions = $this->_ptOption->getProductOptions($this->getProductId());
    }    
    return $this->_productOptions;              
  }
    

  public function getPtProductData()
  {
    if (!isset($this->_ptProductData)){
      $this->_ptProductData = $this->_ptProduct->getOptions($this->getProductId());
    }    
    return $this->_ptProductData;  
  }
  
  
  public function getOptionId()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['option_id'] : 0;
  } 


  public function getMinSelection()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['min_selection'] : 0;
  }


  public function getMaxSelection()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['max_selection'] : 0;
  }
  

  public function getMinMessage()
  { 
    $message = get_option('pofw_pizzatoppings_min_message', '');
    return !empty($message) ? __($message, 'pofw-pizza-toppings') : '';
  }
  

  public function getMaxMessage()
  {
    $message = get_option('pofw_pizzatoppings_max_message', '');
    return !empty($message) ? __($message, 'pofw-pizza-toppings') : '';
  }

  
  public function getVIdsByColJson(){
  
    $vIdsByCol = array();
    
    $previousOrder = 0;
    $col = 0;
    foreach ($this->getProductOptions() as $option){
      if ($option['type'] == 'checkbox'){
        foreach ($option['values'] as $value){
          $vId = (int) $value['value_id'];
          $order = (int) $value['sort_order'];
          if ($order >= $previousOrder + 100){
            $previousOrder += 100;
            $col++;
          }
          $vIdsByCol[$col][] = $vId;
        }
      }
    }    
    return json_encode($vIdsByCol);      
  }    
   
    
  public function toHtml(){
    include_once(Pektsekye_PT()->getPluginPath() . 'view/frontend/templates/product/js.php');
  }


}

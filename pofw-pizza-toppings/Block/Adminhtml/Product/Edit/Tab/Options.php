<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Block_Adminhtml_Product_Edit_Tab_Options {

  protected $_ptOption;
  protected $_ptProduct;
  
  protected $_productOptions;    
  protected $_ptProductData;  
    
    
	public function __construct() {

    include_once(Pektsekye_PT()->getPluginPath() . 'Model/Option.php' );
    $this->_ptOption = new Pektsekye_PizzaToppings_Model_Option();
    
    include_once(Pektsekye_PT()->getPluginPath() . 'Model/Product.php' );
    $this->_ptProduct = new Pektsekye_PizzaToppings_Model_Product();
  }



  public function getProductId() {
    global $post;    
    return (int) $post->ID;  
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
       

  public function getPtProductId()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['pt_product_id'] : -1;
  }


  public function getCheckboxOptionExists()
  {     
    $optionExists = false;
    foreach ($this->getProductOptions() as $option){
      if ($option['type'] == 'checkbox'){
        $optionExists = true;
        break;
      }
    }    
    return $optionExists; 
  }    


  public function getCheckboxSelectOptions() {
    $options = array('' => __('-- select product option --', 'pizza-toppings'));
    foreach($this->getProductOptions() as $optionId => $option){
      if ($option['type'] == 'checkbox'){
        $options[$optionId] = $option['title'];
      }    
    }
    return $options;
  }
  

  public function getMinSelection()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['min_selection'] : get_option('pofw_pizzatoppings_min_selection', 0);
  }
  
  
  public function getMaxSelection()
  {
    $options = $this->getPtProductData();
    return !empty($options) ? (int) $options['max_selection'] : get_option('pofw_pizzatoppings_max_selection', 0);
  }
  
  
  public function getProductOptionsPluginEnabled(){
    return function_exists('Pektsekye_PO');  
  }


  public function getOptionDefaultPluginEnabled(){
    return function_exists('Pektsekye_ODF');  
  }   
  
  
  public function toHtml() {
  
    echo '<div id="pt_product_data" class="panel woocommerce_options_panel hidden">';
    
    include_once(Pektsekye_PT()->getPluginPath() . 'view/adminhtml/templates/product/edit/tab/options.php');
    
    echo ' </div>';
  }


}

<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Block_Adminhtml_Pt_Settings {
    

  public function getMinSelection() 
  {   
    return get_option('pofw_pizzatoppings_min_selection', 0);
  }
  
  
  public function getMaxSelection() 
  {   
    return get_option('pofw_pizzatoppings_max_selection', 0);
  }


  public function getMinMessage()
  {
    return get_option('pofw_pizzatoppings_min_message', '');
  }
  

  public function getMaxMessage()
  {
    return get_option('pofw_pizzatoppings_max_message', '');
  }
  
  
  public function getMessage() 
  {
    return Pektsekye_PT()->getMessage();
  }
    
   
  public function toHtml()
  {
    include_once(Pektsekye_PT()->getPluginPath() . 'view/adminhtml/templates/pt/settings.php');
  }
  
}

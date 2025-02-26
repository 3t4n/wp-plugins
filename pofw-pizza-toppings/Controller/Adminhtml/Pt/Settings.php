<?php
if (!defined('ABSPATH')) exit; 

class Pektsekye_PizzaToppings_Controller_Adminhtml_Pt_Settings {
	
 
  public function execute(){
    
    if (!isset($_GET['action'])){
      return;
    }

    switch($_GET['action']){                 
      case 'updateConfig':
        if (isset($_POST['submit'])){           

            $minSelection = isset($_POST['pt_min_selection']) ? sanitize_text_field($_POST['pt_min_selection']) : '';
            update_option('pofw_pizzatoppings_min_selection', $minSelection);
            
            $maxSelection = isset($_POST['pt_max_selection']) ? sanitize_text_field($_POST['pt_max_selection']) : '';
            update_option('pofw_pizzatoppings_max_selection', $maxSelection);

            $minMessage = isset($_POST['pt_min_message']) ? sanitize_text_field($_POST['pt_min_message']) : '';
            update_option('pofw_pizzatoppings_min_message', $minMessage);
            
            $maxMessage = isset($_POST['pt_max_message']) ? sanitize_text_field($_POST['pt_max_message']) : '';
            update_option('pofw_pizzatoppings_max_message', $maxMessage);
            
            Pektsekye_PT()->setMessage(__('Settings have been saved.', 'pofw-pizza-toppings'));                                              
        }         
      break;                                                                                      
    }             
  }	


}

<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Model_Observer {  

  protected $_ptProduct;        
                
      
  public function __construct(){           
    include_once(Pektsekye_PT()->getPluginPath() . 'Model/Product.php' );
    $this->_ptProduct = new Pektsekye_PizzaToppings_Model_Product();
      
    add_action('woocommerce_process_product_meta', array($this, 'save_product_options'));
    add_filter('pofw_csv_export_data_option_rows', array($this, 'add_data_to_csv_export_option_rows'), 10, 1);       
    add_action("pofw_csv_import_product_options_saved", array($this, 'save_product_options_from_csv'), 10, 2);               
		add_action('delete_post', array($this, 'delete_post'));    	          		
  }	  


 
  public function save_product_options($post_id){
    if (isset($_POST['pt_changed']) && $_POST['pt_changed'] == 1){
      $productId = (int) $post_id;  
            
      $ptProductId = (int) $_POST['pt_product_id'];
      $optionId = (int) $_POST['pt_option_id'];    
      $minSelection = (int) $_POST['pt_min_selection'];      
      $maxSelection = (int) $_POST['pt_max_selection'];
              
      $data = array('pt_product_id' => $ptProductId, 'option_id' => $optionId, 'min_selection' => $minSelection, 'max_selection' => $maxSelection);
      
      $this->_ptProduct->saveOptions($productId, $data);                     
    }
  }
  

  public function add_data_to_csv_export_option_rows($rows){
       
    $options = $this->_ptProduct->getAllOptions();

    foreach ($rows as $k => $row){ 
      $optionId = $row['option_id'];
      if (isset($options[$optionId])){ 
        $rows[$k]['pofw_pt_min_selection'] = $options[$optionId]['min_selection'];
        $rows[$k]['pofw_pt_max_selection'] = $options[$optionId]['max_selection'];        
      }                                 
    }
    
    return $rows;    
  }
   
  
  public function save_product_options_from_csv($productId, $optionsData){

    $options = array();
    
    $this->_ptProduct->deleteProductOptions($productId);
       
    foreach($optionsData as $o){       
      if (isset($o['pofw_pt_min_selection']) || isset($o['pofw_pt_max_selection'])){
        $options['option_id'] = (int) $o['option_id'];
        if (isset($o['pofw_pt_min_selection'])){      
          $options['min_selection'] = (int) $o['pofw_pt_min_selection'];
        }
        if (isset($o['pofw_pt_max_selection'])){      
          $options['max_selection'] = (int) $o['pofw_pt_max_selection'];
        }
        break;        
      }
    }    
    
    $this->_ptProduct->saveOptions($productId, $options);                
  }
      
	
	public function delete_post($id){
		if (!current_user_can('delete_posts') || !$id || get_post_type($id) != 'product'){
			return;
		}
   		
    $this->_ptProduct->deleteProductOptions($id);             
	}		
		
}

<?php
/**
* Plugin Name: LH Script Ids
* Plugin URI: https://lhero.org/portfolio/lh-script-ids/
* Version: 1.00
* Author: Peter Shaw
* Author URI: https://shawfactor.com
* Description: A plugin to ensure every script enqueued by wordpress has a html id attribute
* License: GPL2
*/

if (!class_exists('LH_Script_ids_plugin')) {


class LH_Script_ids_plugin {
    
    private static $instance;
    
    public function script_loader_tag($tag, $handle, $src){
        
        
$check = true;
        
 $check = apply_filters( 'lh_script_ids_check_filter', $check, $tag, $handle, $src);
        
if (!is_admin() && (strpos($tag, 'id=') == false) && $check) {
    
    $add = 'id="'.$handle.'-script"';
    
   return str_replace( ' src', ' '.$add.' src', $tag ); 
    

} else {
    
    return $tag;
}
        
    }
    
    
     /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }


public function __construct() {
    
    add_filter( 'script_loader_tag', array($this,"script_loader_tag"), 1000, 3);
    
}
    
    
}

$lh_script_ids_instance = LH_Script_ids_plugin::get_instance();



}

?>
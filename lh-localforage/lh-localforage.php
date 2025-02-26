<?php
/**
 * Plugin Name: LH Localforage
 * Plugin URI: https://lhero.org/portfolio/lh-localforage/
 * Description: Adds Localforage persisstence to inputs and basic sessios management
 * Author: Peter Shaw
 * Author URI: https://shawfactor.com
 * Version: 1.74
 * Text Domain: lh_localforage
 * Domain Path: /languages
*/

if (!class_exists('LH_Localforage_plugin')) {


class LH_Localforage_plugin {
    
    private static $instance;
    
static function return_plugin_namespace(){
    
    return 'lh_localforage';
    
    }
    
public function register_core_scripts(){
    
    
 if (!class_exists('LH_Register_file_class')) {
     
    include_once('includes/lh-register-file-class.php');
    
}

$add_array = array('defer="defer"');
$add_array[] = 'id="localforage"';

$localforage = new LH_Register_file_class( 'localforage', plugin_dir_path( __FILE__ ).'scripts/localforage.js', plugins_url( '/scripts/localforage.js', __FILE__ ), true, array(), false, $add_array);

wp_enqueue_script('localforage');

unset($add_array);



$add_array = array('defer="defer"');
$add_array[] = 'id="'.self::return_plugin_namespace().'-script"';

$persist_global = array('input[type="email"]','input[autocomplete="name"]');
$add_array[] = 'data-persist_globally="'.htmlspecialchars(json_encode($persist_global)).'"';


$persist_local = array('#comment');
$add_array[] = 'data-persist_locally="'.htmlspecialchars(json_encode($persist_local)).'"';

$lh_localforage_core_script = new LH_Register_file_class( self::return_plugin_namespace().'-script', plugin_dir_path( __FILE__ ).'scripts/lh-localforage.js', plugins_url( '/scripts/lh-localforage.js', __FILE__ ), true, array(), true, $add_array);

unset($add_array);



    
}

public function maybe_enqueue(){
    
wp_enqueue_script(self::return_plugin_namespace().'-script');
    
}

    
public function plugins_loaded(){
    
//register the core scripts
add_action( 'wp_enqueue_scripts', array($this, 'register_core_scripts'), 10 );

//enqueue the script if needed
add_action( 'get_footer', array($this, 'maybe_enqueue'), 10 ); 
    

    
    
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
    
   //run our hooks on plugins loaded to as we may need checks       
    add_action( 'plugins_loaded', array($this,'plugins_loaded'));


}


}

$lh_localforage_instance = LH_Localforage_plugin::get_instance();


}

<?php
  /*
   Plugin Name: AR Registration Secure Spam Blocker
   Plugin URI: http://www.arijose.com/ar-reg-secure/
   Description: This plugin helps block bogus registrations by allowing a custom registration field and answer.
   Version: 1.1
   Author: Ari Rodriguez
   Author URI: http://www.arijose.com
   License: GPL2
   */


/**
 * Define some useful constants
 **/
define('AR_REG_SECURE_VERSION', '1.0');
define('AR_REG_SECURE_DIR', plugin_dir_path(__FILE__));
define('AR_REG_SECURE_URL', plugin_dir_url(__FILE__));



/**
 * Load files
 * 
 **/
function ar_reg_secure_load(){
		
    if(is_admin()) { //load admin files only in admin
        require_once(AR_REG_SECURE_DIR.'includes/admin.php');

        wp_register_style('ars_css_styles', plugins_url('assets/css/ars-styles.css',__FILE__ ));
		    wp_enqueue_style('ars_css_styles');
    }
        
    require_once(AR_REG_SECURE_DIR.'includes/core.php');
}

ar_reg_secure_load();


?>
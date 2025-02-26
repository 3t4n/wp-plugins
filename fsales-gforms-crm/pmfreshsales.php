<?php

/**
 * Plugin Name: FSales + GForms CRM
 * Description: Integrates Gravity Forms with Freshsales CRM, allowing form submissions to be automatically sent to your Freshsales CRM account.
 * Author: PugMarker Creative Solutions LLP
 * Author URI: http://pugmarker.com/
 * Version: 1.0
 * Text Domain: pm-freshsales
 */


// Define AddOn Version
define( 'PM_FRESHSALES_ADDON_VERSION', '1.0.0' );
 
if( in_array('gravityforms/gravityforms.php', apply_filters('active_plugins', get_option('active_plugins'))) ){
    add_action( 'gform_loaded', array( 'PM_Freshsales_AddOn_Bootstrap', 'load' ), 5 );
}
else{
    add_action( 'admin_notices', function(){
        ?>
        <div class="error notice">
        <p><?php _e( 'Please install or activate Gravity Forms plugin to use FSales + GForms CRM addon.', 'pm-freshsales' ); ?></p>
    </div>
        <?php
    } );
}

 
class PM_Freshsales_AddOn_Bootstrap {
 
    public static function load() {
 
        if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
            return;
        }
        
            require_once( 'class-pmgf-freshsales.php' );
    
            GFAddOn::register( 'PMFreshsalesCRM' );
    }
 
}
 

/**
 * Returns an instance of the PMFreshsalesCRM class
 *
 * @see    PMFreshsalesCRM::get_instance()
 *
 * @return object PMFreshsalesCRM
 */

function pm_freshsales_crm() {
    return PMFreshsalesCRM::get_instance();
}
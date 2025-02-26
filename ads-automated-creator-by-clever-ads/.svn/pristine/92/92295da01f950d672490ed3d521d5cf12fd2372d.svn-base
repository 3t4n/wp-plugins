<?php
/**
 * Plugin Name: Ads on Google by Clever Ads Creator
 * Plugin URI:  cleverads.com
 * Description: Get your Google Ads Promo Code for your business. This module allows you to activate a Google Ads Promotional Discount so you can advertise for less. Get ahead of your competitors by being the first to show your products to people when they search for them! ENJOY IT!
 * Version:     1.4
 * Author:      CleverPPC
 * Author URI:  
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: ads-automated-creator-by-clever-ads
 * Domain Path: /languages
 */

/**
 * Copyright: © 2021 CleverPPC.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */



if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('GGADS_VERSION', '1.2.3');
define('GGADS_PATH', plugin_dir_path(__FILE__));
define('GGADS_LINK', plugin_dir_url(__FILE__));
define('GGADS_PLUGIN_NAME', plugin_basename(__FILE__));

final class CREATOR_CLEVERADS {
    
    private $_cleverads_creator = null;

    function google_ads_automated_creator_by_clever_ads_page() {
        $file = file_get_contents('views/plugin_options.tpl', FILE_USE_INCLUDE_PATH);
        if($file == false){
            echo 'file not found';
        }else{
            echo $file;
        }
    }

    public function get_actual_obj() {
        if ($this->_cleverads_creator != null) {
            return $this->_cleverads_creator;
        }
        include_once GGADS_PATH . 'classes/admin_settings.php';      
        $this->_cleverads_creator = new CLEVERADS_CREATOR();
        return $this->_cleverads_creator;
    }

}
    

$CREATOR_CLEVERADS = new CREATOR_CLEVERADS();
$CLEVERADS = $CREATOR_CLEVERADS->get_actual_obj();


load_plugin_textdomain('google-ads-automated-creator-by-clever-ads',
                            false,
                            basename( dirname( __FILE__ ) ) . '/languages'
    );

?>

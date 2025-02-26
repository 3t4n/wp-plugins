<?php
/**
 * Plugin Name: Audit your Ads on Google by Clever Ads
 * Plugin URI:  cleverads.com
 * Description: Get a free Google Ads Audit, optimize your campaigns instantly and stop wasting money.
 * Version:     1.2
 * Author:      CleverPPC
 * Author URI:  
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: audit-your-ads-on-google-by-clever-ads
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

define('GGADS_VERSION_AUDIT', '1.2.3');
define('GGADS_PATH_AUDIT', plugin_dir_path(__FILE__));
define('GGADS_LINK_AUDIT', plugin_dir_url(__FILE__));
define('GGADS_PLUGIN_NAME', plugin_basename(__FILE__));

final class AUDIT_CLEVERADS {

    private $_cleverads_audit = null;

    function clever_audit_page() {
        $file = file_get_contents('views/plugin_options.tpl', FILE_USE_INCLUDE_PATH);
        if($file == false){
            echo 'file not found';
        }else{
            echo $file;
        }
    }

    public function get_actual_obj() {
        if ($this->_cleverads_audit != null) {
            return $this->_cleverads_audit;
        }
        include_once GGADS_PATH_AUDIT . 'classes/audit_admin_settings.php';      
        $this->_cleverads_audit = new CLEVERADS_AUDIT();
        return $this->_cleverads_audit;
    }
}

$AUDIT_CLEVERADS = new AUDIT_CLEVERADS();
$CLEVERADS = $AUDIT_CLEVERADS->get_actual_obj();


load_plugin_textdomain('clever-audit',
                            false,
                            basename( dirname( __FILE__ ) ) . '/languages'
    );

?>

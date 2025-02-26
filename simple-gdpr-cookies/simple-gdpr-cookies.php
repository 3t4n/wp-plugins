<?php
/**
 * Plugin Name: Simple GDPR Cookies
 * Plugin URI:  https://github.com/smeechos/simple-gdpr-cookies
 * Description: Simple GDPR cookie consent for WordPress!
 * Version:     1.0.0
 * Author:      Smeechos
 * Author URI:  https://github.com/smeechos/
 * Contributors: smeechos
 * License:     GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: simple_gdpr_cookies
 * Domain Path: /languages
 */

namespace Smeechos\Simple_GDPR_Cookies;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Simple_GDPR_Cookies {

    /**
     * Simple_GDPR_Cookies constructor.
     */
    public function  __construct()
    {
        // If this file is called directly, abort.
        if ( ! defined( 'WPINC' ) ) {
            die;
        }

        if ( !defined( 'SGC_PLUGIN_ROOT_DIR' ) ) {
            define( 'SGC_PLUGIN_ROOT_DIR', plugin_dir_path(__FILE__) );
        }

        if ( !defined( 'SGC_PLUGIN_BASE_NAME' ) ) {
            define( 'SGC_PLUGIN_BASE_NAME', plugin_basename(__FILE__) );
        }

        if ( !defined( 'SGC_PLUGIN_URL' ) ) {
            define( 'SGC_PLUGIN_URL', plugin_dir_url(__FILE__) );
        }

        if ( !defined( 'SGC_COOKIE_NAME' ) ) {
            define( 'SGC_COOKIE_NAME', 'sgc_user_consent' );
        }

        // Includes
        include( SGC_PLUGIN_ROOT_DIR . 'includes/class-admin-settings.php' );
        include( SGC_PLUGIN_ROOT_DIR . 'includes/class-load-assets.php' );
        include( SGC_PLUGIN_ROOT_DIR . 'includes/class-modal.php' );
    }
}

new Simple_GDPR_Cookies();

/**
 * Determines if the user consented to cookies.
 *
 * @return bool
 */
function sgdpr_cookies_accepted() {
    if ( isset($_COOKIE[SGC_COOKIE_NAME]) && $_COOKIE[SGC_COOKIE_NAME] === 'true' ) {
        return true;
    } else {
        return false;
    }
}
<?php
 /**
 * Plugin Name:       Ace Post Type Builder
 * Plugin URI:        
 * Description:       The Plugin simplifies creating and managing custom post types in WordPress with an intuitive interface and page builder compatibility.
 * Version:           1.6
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            buywptemplates
 * Author URI:        https://www.buywptemplates.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ace-post-type-builder
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'CPTB_PLUGIN_VERSION', '1.6' );
define( 'CPTB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CPTB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CPTB_MAIN_URL', 'https://license.buywptemplates.com/api/public/' );
define( 'CPTB_SERVER_URL', 'https://www.buywptemplates.com/' );

// Include necessary files
require_once CPTB_PLUGIN_DIR . 'includes/cptb-post-types.php';
require_once CPTB_PLUGIN_DIR . 'includes/cptb-taxonomies.php';
require_once CPTB_PLUGIN_DIR . 'includes/class-cptb-core.php';
require_once CPTB_PLUGIN_DIR . 'includes/cptb-taxonomies.php';
require_once CPTB_PLUGIN_DIR . 'global-functions.php';

// Initialize the plugin
function cptb_init() {
    $cptb_instance = Cptb_Type_Builder::instance();
    $cptb_instance->init();
}
add_action( 'plugins_loaded', 'cptb_init' );

add_action('admin_notices', 'cptb_admin_notice_with_html');
function cptb_admin_notice_with_html() {
    ?>
    <div class="notice is-dismissible cptb">
        <div class="cptb-notice-banner-wrap">
            <div class="cptb-notice-banner-wrap">
                <div class="cptb-notice-banner-left" style="position:relative">
                    <img class="cptb-arrow-img" src="<?php echo esc_url(CPTB_PLUGIN_URL . 'assets/images/arrow.png'); ?>" > 
                    <div class="cptb-per-wrap">
                        <div class="cptb-percentage-text">Get Discount</div>
                        <div class="cptb-arrow-per">20%</div>
                    </div>
                     <img class="cptb-img" src="<?php echo esc_url(CPTB_PLUGIN_URL . 'assets/images/banner-img.png'); ?>" > 
                </div>
                <div class="cptb-notice-banner-right">
                    <div class="cptb-notice-banner-content-wrap">
                        <h2 class="cptb-banner-heading">WP Theme Bundle Deal!</h2>
                        <h4 class="cptb-banner-sub-heading">250+ Premium Themes at just $99</h4>
                        <h5 class="cptb-banner-cat">Business | Blogging | Ecommerce | Education | More</h5>
                        <a href="<?php echo esc_url( CPTB_SERVER_URL . 'discount/WPBUNDLE?redirect=/products/wp-theme-bundle'); ?>" target="_blank" class="cptb-banner-btn">SHOP NOW</a>
                    </div>              
                </div>
            </div>
        </div>
    </div>
    <?php
}
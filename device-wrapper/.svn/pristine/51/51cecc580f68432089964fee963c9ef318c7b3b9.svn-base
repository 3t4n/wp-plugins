<?php

/**
 * Plugin Name: Device Wrapper
 * Description: This plugin enables users to wrap an image, video or iframe into a device mockup.
 * Author URI:  https://bogdan.kyiv.ua
 * Author:      Bogdan Bendziukov
 * Version:     1.1.7
 *
 * Text Domain: device-wrapper
 * Domain Path: /languages
 *
 * License:     GNU GPL v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * Network:     false
 * 
 */
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !function_exists( 'device_wrapper_freemius' ) ) {
    // Create a helper function for easy SDK access.
    function device_wrapper_freemius() {
        global $device_wrapper_freemius;
        if ( !isset( $device_wrapper_freemius ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $device_wrapper_freemius = fs_dynamic_init( array(
                'id'             => '12318',
                'slug'           => 'device-wrapper',
                'type'           => 'plugin',
                'public_key'     => 'pk_03c8079d50fe3ef356d356a485314',
                'is_premium'     => false,
                'premium_suffix' => '',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                    'slug'    => 'device-wrapper',
                    'contact' => false,
                    'parent'  => array(
                        'slug' => 'options-general.php',
                    ),
                ),
                'is_live'        => true,
            ) );
        }
        return $device_wrapper_freemius;
    }

    // Init Freemius.
    device_wrapper_freemius();
    // Signal that SDK was initiated.
    do_action( 'device_wrapper_freemius_loaded' );
}
define( 'DEVICE_WRAPPER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DEVICE_WRAPPER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DEVICE_WRAPPER_PLUGIN_DEVICE_URL', plugin_dir_url( __FILE__ ) . "src/images/devices/" );
define( 'DEVICE_WRAPPER_PLUGIN_ICON_URL', plugin_dir_url( __FILE__ ) . "src/images/icons/" );
add_action( 'plugins_loaded', 'device_wrapper_load_textdomain' );
/**
 * Load plugin textdomain
 */
function device_wrapper_load_textdomain() {
    load_plugin_textdomain( 'device-wrapper', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Add the top level menu page.
 */
function device_wrapper_options_page() {
    add_submenu_page(
        'options-general.php',
        __( 'Device Wrapper', 'device-wrapper' ),
        __( 'Device Wrapper', 'device-wrapper' ),
        'manage_options',
        'device-wrapper',
        'device_wrapper_options_page_html'
    );
}

/**
 * Register our wporg_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'device_wrapper_options_page' );
/**
 * Top level menu callback function
 */
function device_wrapper_options_page_html() {
    // check user capabilities
    if ( !current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
	<div class="wrap">
		<h1><?php 
    echo esc_html( get_admin_page_title() );
    ?></h1>
		<section class="device-wrapper-admin">
			<section class="device-wrapper-admin-description">
				<p>
					<?php 
    _e( 'The Device Wrapper plugin enables users to wrap an image, video or iframe into a device mockup, providing a more professional and polished look to their content.', 'device-wraper' );
    ?>
				</p>
				<p>
					<?php 
    _e( 'The Device Wrapper plugin does not require any specific configuration. Once activated, the plugin adds a new shortcode to WordPress that can be used to wrap images, videos or iframes into device mockups. It also provides a custom block for Gutenberg editor and a custom widget for Elementor builder (in PRO version).', 'device-wrapper' );
    ?>
				</p>
				<p>
					<?php 
    _e( 'To use the Device Wrapper plugin, simply insert the <code>[device-wrapper]</code> shortcode into any WordPress post or page. You can customize the shortcode by adding specific attributes.', 'device-wraper' );
    ?>
				</p>
				<h2>
					<?php 
    _e( 'Full documentation is available here:', 'device-wraper' );
    ?> <a href="https://devicewrapper.bogdan.kyiv.ua/documentation/" target="_blank">https://devicewrapper.bogdan.kyiv.ua/documentation/</a>
				</h2>
				<h3>
					<a href="https://devicewrapper.bogdan.kyiv.ua/" target="_blank"><?php 
    _e( 'The DEMO is available here.', 'device-wrapper' );
    ?></a>
				</h3>
				<h3>
					<?php 
    printf( __( 'To upgrade the Device Wrapper plugin to the LIFETIME PRO version <a href="%s">click here</a>!', 'device-wrapper' ), device_wrapper_freemius()->get_upgrade_url() );
    ?>
				</h3>
			</section>
			<section class="device-wrapper-admin-screenshot">
				<img src="<?php 
    echo DEVICE_WRAPPER_PLUGIN_URL;
    ?>src/images/screenshot_2.jpg" alt="features" width="100%" height="auto" />
			</section>
		</section>
		
	</div>
	<?php 
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
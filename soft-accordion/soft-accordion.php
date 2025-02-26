<?php

/**
 * Plugin Name:       Soft Accordion
 * Plugin URI:        #
 * Description:       Create dynamic FAQ sections with a powerful FAQ Accordion builder plugin using customizable layouts, drag & drop placement, and multiple customizations.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            SoftLab
 * Author URI:        https://profiles.wordpress.org/zubaerahamad/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       soft-accordion
 * Domain Path:       /languages
 *
 * @package soft-accordion
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'sa_fs' ) ) {
    sa_fs()->set_basename( false, __FILE__ );
} else {
    /**
     * DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE
     * `function_exists` CALL ABOVE TO PROPERLY WORK.
     */
    if ( !function_exists( 'sa_fs' ) ) {
        /**
         * Create a helper function for easy SDK access.
         */
        function sa_fs() {
            global $sa_fs;
            if ( !isset( $sa_fs ) ) {
                // Include Freemius SDK.
                include_once __DIR__ . '/freemius/start.php';
                $sa_fs = fs_dynamic_init( array(
                    'id'             => '17606',
                    'slug'           => 'soft-accordion',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_2bab7a91a4885a97121c0b576b886',
                    'is_premium'     => false,
                    'premium_suffix' => 'PRO',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                        'days'               => 3,
                        'is_require_payment' => true,
                    ),
                    'menu'           => array(
                        'slug'       => 'soft-accordion',
                        'first-path' => 'admin.php?page=soft-accordion-getting-started',
                        'contact'    => false,
                        'support'    => false,
                    ),
                    'is_live'        => true,
                ) );
            }
            return $sa_fs;
        }

        // Init Freemius.
        sa_fs();
        // Signal that SDK was initiated.
        do_action( 'sa_fs_loaded' );
    }
    /**
     * Define constants
     */
    define( 'SOFT_ACCORDION_VERSION', time() );
    define( 'SOFT_ACCORDION_FILE', __FILE__ );
    define( 'SOFT_ACCORDION_DIR', dirname( SOFT_ACCORDION_FILE ) );
    define( 'SOFT_ACCORDION_INCLUDES', SOFT_ACCORDION_DIR . '/includes' );
    define( 'SOFT_ACCORDION_URL', plugins_url( '', SOFT_ACCORDION_FILE ) );
    define( 'SOFT_ACCORDION_ASSETS', SOFT_ACCORDION_URL . '/assets' );
    // Include the base plugin file.
    include_once SOFT_ACCORDION_INCLUDES . '/base.php';
}
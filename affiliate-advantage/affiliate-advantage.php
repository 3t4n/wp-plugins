<?php

/**
 * Plugin Name: Affiliate Advantage
 * Plugin URI: http://levelwp.com/affiliate-advantage
 * Description: Affiliate Advantage is a revolution in affiliate link management. Collect, collate and store your affiliate links for use in your posts and pages.
 * Version: 1.0.0
 * Author: Level WP
 * Author URI: https://levelwp.com/
 * Requires at least: 4.5
 * Tested up to: 6.0
 * Requires PHP: 5.4
 *
 * Text Domain: affiliate-advantage
 * Domain Path: /Languages/
 *
 * @package Affiliate Advantage
 * @category Core
 * @author Level WP
 */
if ( !defined( 'ABSPATH' ) ) {
    die( 'What are you doing here?' );
}
use  Level_Wp\Affiliate_Advantage\Plugin ;
use  Level_Wp\Affiliate_Advantage\PluginActivator ;
use  Level_Wp\Affiliate_Advantage\PluginDeactivator ;

if ( function_exists( 'affiliate_advantage_freemuis' ) ) {
    affiliate_advantage_freemuis()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    
    if ( !function_exists( 'affiliate_advantage_freemuis' ) ) {
        // Create a helper function for easy SDK access.
        function affiliate_advantage_freemuis()
        {
            global  $affiliate_advantage_freemuis ;
            
            if ( !isset( $affiliate_advantage_freemuis ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_9825_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_9825_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/Lib/freemius/start.php';
                $affiliate_advantage_freemuis = fs_dynamic_init( array(
                    'id'             => '9825',
                    'slug'           => 'affiliate-advantage',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_d4861811b9ddaf23dde293fb3941f',
                    'is_premium'     => false,
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                    'days'               => 7,
                    'is_require_payment' => false,
                ),
                    'menu'           => array(
                    'slug'       => 'edit.php?post_type=affiliate_link',
                    'first-path' => 'edit.php?post_type=affiliate_link&page=settings&tab=guide',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $affiliate_advantage_freemuis;
        }
        
        // Init Freemius.
        affiliate_advantage_freemuis();
        // Signal that SDK was initiated.
        do_action( 'affiliate_advantage_freemuis_loaded' );
    }
    
    require_once plugin_dir_path( __FILE__ ) . '/Lib/autoload.php';
    register_activation_hook( __FILE__, 'activate_affiliate_advantage' );
    register_deactivation_hook( __FILE__, 'deactivate_affiliate_advantage' );
    register_uninstall_hook( __FILE__, 'uninstall_affiliate_advantage' );
    //affiliate_advantage_freemuis()->add_action('after_uninstall', 'affiliate_advantage_freemuis_uninstall_cleanup');
    $affiliate_advantage = Plugin::get_instance();
    $affiliate_advantage->init();
    function activate_affiliate_advantage()
    {
        Plugin::get_instance()->activate();
    }
    
    function deactivate_affiliate_advantage()
    {
        Plugin::get_instance()->deactivate();
    }
    
    function uninstall_affiliate_advantage()
    {
        Plugin::get_instance()->uninstall();
    }

}

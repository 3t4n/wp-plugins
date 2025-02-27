<?php

/**
 *
 * @link              https://www.danielealessandra.com/
 * @since             1.0.0
 * @package           DaReactions
 *
 * @wordpress-plugin
 * Plugin Name:       Da Reactions
 * Plugin URI:        https://www.da-reactions-plugin.com/
 * Description:       This plugin generates reactions to let your visitors rate content and comments.
 * Version:           5.2.1
 * Text Domain:       da-reactions
 * Domain Path:       /languages/
 * Author:            Daniele Alessandra
 * Author URI:        https://www.danielealessandra.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires at least: 5.9.0
 * Tested up to:      6.6.2
 * Donate link:       https://paypal.me/danielealessandra
 *
 *
 *
 * DaReactions is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * DaReactions is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DaReactions. If not, see https://www.gnu.org/licenses/gpl-2.0.txt.
 */
use DaReactions\Main;
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/**
 * @return string
 */
if ( !function_exists( 'da_reactions_get_registry' ) ) {
    /**
     */
    function da_reactions_get_registry() {
        $registry = 'wordpress.org';
        if ( darea_fs()->is_not_paying() ) {
            $registry = 'Freemium Free';
        } else {
            $registry = 'Freemium Premium';
        }
        if ( darea_fs()->is_trial() ) {
            $registry = 'Freemium Trial';
        }
        return $registry;
    }

}
$plugin_data = 'unknown';
if ( is_file( __FILE__ ) ) {
    $plugin_data = get_file_data( __FILE__, array(
        'Version' => 'Version',
    ), false );
}
define( 'DA_REACTIONS_VERSION', '5.2.1' );
define( 'DA_REACTIONS_URL', plugin_dir_url( __FILE__ ) );
define( 'DA_REACTIONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'DA_REACTIONS_NAME', plugin_basename( __FILE__ ) );
define( 'DA_REACTIONS_DIRECTORY_NAME', basename( __DIR__ ) );
spl_autoload_register( static function ( $class ) {
    if ( str_starts_with( $class, 'DaReactions\\' ) ) {
        include_once DA_REACTIONS_PATH . 'classes/' . str_replace( '\\', '/', $class ) . '.php';
    }
} );
if ( function_exists( 'darea_fs' ) ) {
    darea_fs()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    /**
     * START FREEMIUS
     */
    if ( !function_exists( 'darea_fs' ) ) {
        // Create a helper function for easy SDK access.
        /**
         * @return mixed
         */
        function darea_fs() {
            global $darea_fs;
            if ( !isset( $darea_fs ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_7147_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_7147_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once __DIR__ . '/vendor/freemius/wordpress-sdk/start.php';
                if ( function_exists( 'fs_dynamic_init' ) ) {
                    $darea_fs = fs_dynamic_init( array(
                        'id'             => '7147',
                        'slug'           => 'da-reactions',
                        'type'           => 'plugin',
                        'public_key'     => 'pk_1fd6695e557c14fd7619c9a257862',
                        'is_premium'     => false,
                        'has_paid_plans' => true,
                        'has_addons'     => false,
                        'trial'          => array(
                            'days'               => 30,
                            'is_require_payment' => false,
                        ),
                        'menu'           => array(
                            'slug'    => 'da-reactions',
                            'contact' => false,
                            'support' => false,
                            'network' => true,
                        ),
                        'is_live'        => true,
                    ) );
                }
            }
            return $darea_fs;
        }

        // Init Freemius.
        darea_fs();
        // Signal that SDK was initiated.
        do_action( 'darea_fs_loaded' );
    }
    /**
     * END FREEMIUS
     */
    $main = new Main();
    $main->run();
}
/**
 * Activation of plugin must stay here
 */
if ( !function_exists( 'activate_da_reactions_plugin' ) ) {
    /**
     * @throws JsonException
     */
    function activate_da_reactions_plugin() {
        DaReactions\Activator::activate();
    }

}
register_activation_hook( __FILE__, 'activate_da_reactions_plugin' );
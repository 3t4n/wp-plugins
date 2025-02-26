<?php
/**
 * Plugin Name: 6Storage Rentals
 * Description: Showcase self storage units, rent the units, reserve the units and 6storage has the enterprise portal to manage the tenants, operations, payments, automation, inventory, locks, leads, reports and further more actions.
 * Version:     2.18.0
 * Author:      6Storage
 * Author URI:  https://www.6Storage.com/
 * License:     GPL2
 * Plugin URI: https://www.6storage.com/self-storage-software/
 * Text Domain:       6storage-rentals
 * Domain Path:       /i18n/languages/
 */

defined('ABSPATH') or die('You can\'t access this file.');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

/**
 * The Code that runs during plugin activation
 */
function six_storage_online_activate_plugin()
{
    SixStorageOnline\Base\Six_Storage_Activate::six_storage_activation();
	(new SixStorageOnline\models\Six_Storage_LeadTable() )->create_table();
}
register_activation_hook(__FILE__, 'six_storage_online_activate_plugin');

/*  Code that runs once all the plugins are loaded  */

function six_storage_clear_cache_on_plugin_update(){

    $sixStoragePluginNewversion = '2.18.0';     // Update latest verison every time.

    if(empty(get_option('six_storage_online_rental_plugin_version')))
    {
        add_option('six_storage_online_rental_plugin_version', '2.0.0');
    }

     if(get_option('six_storage_online_rental_plugin_version') != $sixStoragePluginNewversion)
     {
        SixStorageOnline\Base\Six_Storage_BaseController::six_storage_clear_cache_fun();
        update_option('six_storage_online_rental_plugin_version', $sixStoragePluginNewversion);
    }
        
}

add_action('wp_loaded', "six_storage_clear_cache_on_plugin_update");

/**
 * The Code that runs during plugin deactivation
 */
function six_storage_online_deactivate_plugin()
{
    SixStorageOnline\Base\Six_Storage_Deactivate::Six_storage_deactivation();
}
register_deactivation_hook(__FILE__, 'six_storage_online_deactivate_plugin');

/**
 * The Code that runs during plugin uninstall 
 */
function six_storage_online_uninstall_plugin()
{
    SixStorageOnline\Base\Six_Storage_Uninstall::Six_Storage_Uninstall_Function();
}
register_uninstall_hook(__FILE__, 'six_storage_online_uninstall_plugin');

/** Translations File */

function six_storage_load_textdomain(){
    if(class_exists( 'SixStorageOnline\\Six_Storage_Init' )) {
        global $wp_filesystem;
    
        $six_storage_translation_loaded = load_plugin_textdomain( '6storage-rentals', FALSE, WP_CONTENT_DIR . '/languages/plugins/' );
       
        if($six_storage_translation_loaded === false){
            load_plugin_textdomain( '6storage-rentals', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/translations/');
        }
        SixStorageOnline\Six_Storage_Init::Six_Storage_register_services();
    }
}
add_action( 'init', 'six_storage_load_textdomain' );


//Load template from specific page
add_filter( 'page_template', 'six_storage_page_template' );
function six_storage_page_template( $page_template ){

    if ( get_page_template_slug() == 'six-storage-full-width.php' ) {
        $page_template = dirname( __FILE__ ) . '/template/page-template/six-storage-full-width.php';
    }
    return $page_template;
}

/**
 * Add "Custom" template to page attirbute template section.
 */
add_filter( 'theme_page_templates', 'six_storage_add_template_to_select', 10, 4 );
function six_storage_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

    // Add custom template named template-custom.php to select dropdown 
    $post_templates['six-storage-full-width.php'] = esc_html__('6Storage Full Width','6storage-rentals');

    return $post_templates;
}

function six_storage_prefix_plugin_update_message( $data, $response ) {
	printf(
		'<br><strong>%s</strong>',
		esc_html__( 'Heads up, Please clear cache after updating plugin!', '6storage-rentals' )
	);
}
add_action( 'in_plugin_update_message-' . plugin_basename(__FILE__), 'six_storage_prefix_plugin_update_message', 10, 2 );


/**
 * Setting file path for plugin
*/
if ( ! defined( 'SIX_STORAGE_PLUGIN_FILE' ) ) {
    $six_storage_plugin_url = plugin_dir_url(__FILE__);
	define( 'SIX_STORAGE_PLUGIN_FILE', $six_storage_plugin_url );
}

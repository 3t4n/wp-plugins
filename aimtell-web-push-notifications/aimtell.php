<?php
/*
Plugin Name: Aimtell Push Notifications
Plugin URI: http://wordpress.org/extend/plugins/aimtell-push-notifications/
Description: Send web push notifications. Supported on Safari, Chrome, Firefox and Opera. Plugin enables users to login/register and install required files. Please note this is just an installer and you will need to log into the dashboard to view subscribers and send notifications.
Version: 2.13
Author: Aimtell
Author URI: https://aimtell.com
License: GPL2
*/
/*  
Copyright 2017 Aimtell, Inc.
*/

//set the plugin version to use as a cache buster in css and js
$aimtell_version = "2.13";

// the script requires PHP 5.3+, so this should be defined
if( ! defined('__FOLDERDIR__')){
    define( '__FOLDERDIR__', dirname(__FILE__) );
}

if ( ! defined( 'AIMTELL_URL' ) ) {
    define( 'AIMTELL_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'AIMTELL_CURSITE_URL' ) ) {
    define( 'AIMTELL_CURSITE_URL', site_url() );
}

if ( ! defined( 'AIMTELL_LOG_LEVEL' ) ) {
    define( 'AIMTELL_LOG_LEVEL', get_aimtell_woocommerce_logging_level() );
}

/*************Plugin Functions****************/


function aimtellWP_footer(){
    
    $aimtell_domain = get_option( 'aimtell_domain' );
    $aimtell_uid = get_option( 'aimtell_uid' );
    $aimtell_idSite = get_option( 'aimtell_idSite' );
    $aimtell_webpushid = get_option( 'aimtell_webpushid' );

    //if site is not set up yet, don't show tracking code.
    if(!$aimtell_uid || !$aimtell_idSite || !$aimtell_domain || !$aimtell_webpushid){
        return false;
    }

    //format the website to have no http(s)
    $aimtell_url = explode("//", $aimtell_domain);
    $aimtell_url = $aimtell_url[1];
    $aimtell_manifest_location = wp_make_link_relative(AIMTELL_URL . 'assets/json/aimtell-manifest.json');
    $aimtell_worker_location = wp_make_link_relative(AIMTELL_URL . 'assets/js/aimtell-worker.js.php');

    $aimtell_tracking_code= "<!-- start aimtell tracking code -->       
    <script data-cfasync='false' type='text/javascript'>
     var _at = {};  window._at.track = window._at.track || function(){(window._at.track.q = window._at.track.q || []).push(arguments);}; _at.domain = '{$aimtell_url}'; _at.owner = '{$aimtell_uid}'; _at.idSite = '{$aimtell_idSite}'; _at.webpushid = '{$aimtell_webpushid}'; _at.worker = '{$aimtell_worker_location}'; _at.attributes = {}; (function() { var u='//s3.amazonaws.com/cdn.aimtell.com/trackpush/'; var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'trackpush.min.js'; s.parentNode.insertBefore(g,s); })();
    </script>
    <!-- end aimtell tracking code -->";

    echo $aimtell_tracking_code;

    //if woocommerce is activated, abandoned browse tracking is enabled, and it's a product page, add the script
    if(is_woocommerce_activated()){
        if(get_aimtell_woocommerce_abandoned_browse()){
            if(is_product()){
                $product_details = get_woocommerce_product_data();
                $product_available = $product_details->available;
                $product_name = $product_details->name;
                $product_image = $product_details->image;
                $product_price = $product_details->price;
                $product_url = $product_details->url;
                $browse_abandoned_delay = get_aimtell_woocommerce_abandoned_browse_delay();
                $woocommerce_abaondoned_browse_tracking_code = "<!-- start aimtell abandoned browse tracking code --><script data-cfasync='false' type='text/javascript'>

                var _aimtellAbandonedBrowseDelay = $browse_abandoned_delay * 60000; //convert minutes to milliseconds for setTimeout
                var _aimtellBrowseAbandoned = false;
                var _aimtellTimeout;
                
                function _aimtellGetTrackProduct() {

                    var product_data = {
                        title: '$product_name',
                        icon: '$product_image',
                        price: '$product_price',
                        url: '$product_url'
                    }
                    
                    //unset product data properties that are empty
                    for (var key in product_data) {
                        if (!product_data[key] || product_data[key] === '' || product_data[key] === null || product_data[key] === undefined) {
                            delete product_data[key];
                        }
                    }

                    console.log('[aimtell] Idle timer expired, tracking');
                    console.log(product_data);
                    
                    _aimtellTrackEvent('Aimtell', 'WooCommerce-Page-Inactive', window.location.origin + window.location.pathname, null, product_data);
                    console.log('[aimtell] tracked browse abandon event');

                    //remove event listeners for and set flag
                    _aimtellBrowseAbandoned = true;
                    const eventListeners = ['load', 'mousemove', 'keydown'];
                    eventListeners.forEach(function(event) {
                        window.removeEventListener(event, _aimtellResetTimer);
                    });
                    
                }

                function _aimtellResetTimer() {

                    clearTimeout(_aimtellTimeout);
                    _aimtellTimeout = setTimeout(_aimtellGetTrackProduct, _aimtellAbandonedBrowseDelay);

                }

                //run when aimtell is ready
                function _aimtellReady(){
                       
                    if(!_aimtellBrowseAbandoned){
                        console.log('[aimtell] WooCommerce browse abandonment enabled, with $browse_abandoned_delay minute delay');
                        //add event listeners
                        const eventListeners = ['load', 'mousemove', 'keydown'];
                        eventListeners.forEach(function(event) {
                            window.addEventListener(event, _aimtellResetTimer);
                        });
                    }

                }
                </script><!-- end aimtell abandoned browse tracking code -->";
                if($product_available){
                    echo $woocommerce_abaondoned_browse_tracking_code;
                }
                else{
                    echo "<!-- start aimtell abandoned browse tracking code --><script data-cfasync='false' type='text/javascript'>console.log('[Aimtell] WooCommerce abandoned browse enabled, product not available')</script><!-- end aimtell abandoned browse tracking code -->";
                }
            }
            else{
                echo "<!-- start aimtell abandoned browse tracking code --><script data-cfasync='false' type='text/javascript'>console.log('[Aimtell]WooCommerce abandoned browse enabled, not a product page')</script><!-- end aimtell abandoned browse tracking code -->";
            }
        }
        else{
            echo "<!-- start aimtell abandoned browse tracking code --><script data-cfasync='false' type='text/javascript'>console.log('[Aimtell] WooCommerce abandoned browse disabled')</script><!-- end aimtell abandoned browse tracking code -->";
        }
    }
    else{
        echo "<!-- start aimtell abandoned browse tracking code --><script data-cfasync='false' type='text/javascript'>console.log('[Aimtell] WooCommerce not activated')</script><!-- end aimtell abandoned browse tracking code -->";
    }

}



/***************Plugin Functions****************/

/****** Admin Functions *********/

function aimtellWP_footer_info() {     
    //load only on plugin page
    if(isset($_GET['page']) && $_GET['page'] == "aimtell-web-push"){
        echo phpversion(); 
    }
} 



function aimtellWP_admin_scripts($hook) {

    //grab the aimtell version
    global $aimtell_version;

    //load only on plugin page
    if(strpos($hook, "aimtell-web-push") > -1 ){

        //load css and set plugin version as cache buster
        wp_enqueue_style( 'aimtell-css', AIMTELL_URL. 'assets/css/stylesheet.css', array(), $aimtell_version );

        //load the aimtell core js file, dependency on jQuery, set plugin version as cache buster
        wp_enqueue_script(
            'aimtell-js',
            AIMTELL_URL . 'assets/js/aimtell.js',
            array( 'jquery' ),
            $aimtell_version
        );
    }
    
}

// Define the function in the main plugin file
function get_aimtell_woocommerce_tracking() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'options';
    $value = $wpdb->get_var($wpdb->prepare("SELECT option_value FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_tracking'));
    return $value ? intval($value) : 0;
}

function get_aimtell_woocommerce_abandoned_browse() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'options';
    $value = $wpdb->get_var($wpdb->prepare("SELECT option_value FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_abandoned_browse'));
    return $value ? intval($value) : 0;
}

function get_aimtell_woocommerce_abandoned_browse_delay() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'options';
    $value = $wpdb->get_var($wpdb->prepare("SELECT option_value FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_abandoned_browse_delay'));
    return $value ? intval($value) : 10;
}

function get_aimtell_woocommerce_logging_level() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'options';
    $value = $wpdb->get_var($wpdb->prepare("SELECT option_value FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_logging_level'));
    return $value ? intval($value) : 0;
}

function get_aimtell_log_file() {
    $path = __FOLDERDIR__ . '/logs/at.log';
    // return only the portion after the wp-content directory
    $path = '/'.str_replace(ABSPATH, '', $path);
    return $path;
}

function get_woocommerce_product_data() {
    global $product;
    $product_details = new stdClass();
    $product_details->available = $product->is_in_stock();
    $product_details->name = $product->get_name();
    $product_details->image = wp_get_attachment_image_url($product->get_image_id(), 'full');
    $product_details->price = $product->get_price();
    $product_details->url = get_permalink($product->get_id());
    return $product_details;
}


function aimtellWP_admin_menu() {
    add_menu_page(
        'Aimtell Push',
        'Aimtell Push',
        'manage_options',
        'aimtell-web-push',
        'aimtellWP_admin_load',
        AIMTELL_URL . 'assets/images/aimtell_icon.png'
    );
}

// function to add a aimtell sub-nav item for Settings which loads /templates/settings.php
function aimtellWP_admin_settings() {
    add_submenu_page(
        'aimtell-web-push',
        'Aimtell Push Settings',
        'Settings',
        'manage_options',
        'aimtell-web-push-settings',
        'aimtellWP_admin_settings_load'
    );
}

function aimtellWP_admin_load() {
	 
    //make sure user has proper permissions
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}


    //grab the option vars
    $aimtell_domain = get_option( 'aimtell_domain' );
    $aimtell_uid = get_option( 'aimtell_uid' );
    $aimtell_idSite = get_option( 'aimtell_idSite' );
    $aimtell_webpushid = get_option( 'aimtell_webpushid' );
    
    //grab page 
    $aimtell_show_page = (isset($_POST['page'])) ? $_POST['page'] : null;
   
    //load specific page
    switch ($aimtell_show_page) {

        case 'login':
            include __FOLDERDIR__."/templates/login.php";  
            break;

        case 'addSite':
            include __FOLDERDIR__."/templates/addSite.php";  
            break;

        case 'viewSite':
            
            //if posting idSite for update
            if(!empty($_POST['idSite'])){
                update_option( 'aimtell_idSite', $_POST['idSite'], 'yes' );
            }

            //if posting domain for update
            if(!empty($_POST['domain'])){
                update_option( 'aimtell_domain', $_POST['domain'], 'yes' );
            }

            //if posting webPushID for update
            if(!empty($_POST['webPushID'])){
                update_option( 'aimtell_webpushid', $_POST['webPushID'], 'yes' );
            }

            //if posting webPushID for update
            if(!empty($_POST['uid'])){
                update_option( 'aimtell_uid', $_POST['uid'], 'yes' );
            }

            //grab the token, we need to pass it 
            $aimtell_auth_token = $_COOKIE['aimtell_auth_token'];
            
            include __FOLDERDIR__."/templates/viewSite.php";  
            break;

        default:
            //if auth token is set and we already have all required site variables, go ahead show viewSite
            if(!empty($_COOKIE['aimtell_auth_token']) && !empty($aimtell_domain) && !empty($aimtell_uid) && !empty($aimtell_idSite) && !empty($aimtell_webpushid) ){
                $aimtell_auth_token = $_COOKIE['aimtell_auth_token'];
                include __FOLDERDIR__."/templates/viewSite.php";  
            }
            //if the domain is set in DB, they have an account, show login
            else if(!empty($aimtell_uid)){
                include __FOLDERDIR__."/templates/login.php";
            }
            else{
                include __FOLDERDIR__."/templates/login.php"; //removing register, we are forcing them to register on our website now
            }

            break;
    }

 
}

function aimtellWP_admin_settings_load() {
    include __FOLDERDIR__."/templates/settings.php";
}

/**
 * Log a message to the /wp-content/plugins/aimtell-web-push-notifications/includes/at.log file.
 * @param $msg - the message to log.
 */
function atlog($msg, $level = 1) {

    if (!defined('AIMTELL_LOG_LEVEL') || !AIMTELL_LOG_LEVEL || AIMTELL_LOG_LEVEL < $level ) return;

    try {

        // write to at.log file
        $time_formatted = "[".date('Y-m-d H:i:s').'] ';
        $log = $time_formatted.$msg.PHP_EOL;
        // put into plugin dir /aimtell-web-push-notifications/logs/at.log
        file_put_contents(__FOLDERDIR__."/logs/at.log", $log, FILE_APPEND);
        
    } catch (\Throwable $th) {
        //throw $th;
    }

}

function save_aimtell_settings() {

    global $wpdb;

    // Verify nonce for security
    if (!isset($_POST['aimtell_settings_nonce']) || !wp_verify_nonce($_POST['aimtell_settings_nonce'], 'save_aimtell_settings')) {
        wp_die('Unauthorized request');
    }

    // Determine the value of the checkbox (1 if checked, 0 if unchecked)
    $tracking_status = !empty($_POST['aimtell_woocommerce_tracking']) ? 1 : 0;
    $abandoned_browse_status = !empty($_POST['aimtell_woocommerce_abandoned_browse']) ? 1 : 0;
    $abandoned_browse_delay = !empty($_POST['aimtell_woocommerce_abandoned_browse_delay']) ? intval($_POST['aimtell_woocommerce_abandoned_browse_delay']) : 10;
    $logging_level = !empty($_POST['aimtell_woocommerce_logging_level']) ? intval($_POST['aimtell_woocommerce_logging_level']) : 0;

    // Save the setting to the wpft_options table
    $table_name = $wpdb->prefix . 'options';

    // Check if the option already exists
    $tracking_option_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_tracking'));
    $abandoned_browse_option_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_abandoned_browse'));
    $abandoned_browse_delay_option_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_abandoned_browse_delay'));
    $logging_level_option_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE option_name = %s", 'aimtell_woocommerce_logging_level'));

    if ($tracking_option_exists) {
        // Update the existing option
        $wpdb->update(
            $table_name,
            ['option_value' => $tracking_status],
            ['option_name' => 'aimtell_woocommerce_tracking'],
            ['%d'],
            ['%s']
        );
    } else {
        // Insert a new option
        $wpdb->insert(
            $table_name,
            [
                'option_name' => 'aimtell_woocommerce_tracking',
                'option_value' => $tracking_status,
            ],
            ['%s', '%d']
        );
    }

    if ($abandoned_browse_option_exists) {
        // Update the existing option
        $wpdb->update(
            $table_name,
            ['option_value' => $abandoned_browse_status],
            ['option_name' => 'aimtell_woocommerce_abandoned_browse'],
            ['%d'],
            ['%s']
        );
    } else {
        // Insert a new option
        $wpdb->insert(
            $table_name,
            [
                'option_name' => 'aimtell_woocommerce_abandoned_browse',
                'option_value' => $abandoned_browse_status,
            ],
            ['%s', '%d']
        );
    }

    if ($abandoned_browse_delay_option_exists) {
        // Update the existing option
        $wpdb->update(
            $table_name,
            ['option_value' => $abandoned_browse_delay],
            ['option_name' => 'aimtell_woocommerce_abandoned_browse_delay'],
            ['%d'],
            ['%s']
        );
    } else {
        // Insert a new option
        $wpdb->insert(
            $table_name,
            [
                'option_name' => 'aimtell_woocommerce_abandoned_browse_delay',
                'option_value' => $abandoned_browse_delay,
            ],
            ['%s', '%d']
        );
    }

    if ($logging_level_option_exists) {
        // Update the existing option
        $wpdb->update(
            $table_name,
            ['option_value' => $logging_level],
            ['option_name' => 'aimtell_woocommerce_logging_level'],
            ['%d'],
            ['%s']
        );
    } else {
        // Insert a new option
        $wpdb->insert(
            $table_name,
            [
                'option_name' => 'aimtell_woocommerce_logging_level',
                'option_value' => $logging_level,
            ],
            ['%s', '%d']
        );
    }

    // Redirect back to the settings page with a success message
    wp_redirect(admin_url('admin.php?page=aimtell-web-push-settings&status=success'));
    exit;
}

/**
 * Check if WooCommerce is activated
 */
function is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}





/************End Admin Functions**************/



add_action( 'admin_menu', 'aimtellWP_admin_menu' );
add_action( 'wp_footer', 'aimtellWP_footer', 100 );
add_action( 'admin_enqueue_scripts', 'aimtellWP_admin_scripts' );
add_filter('admin_footer_text', 'aimtellWP_footer_info'); 

add_action( 'admin_menu', 'aimtellWP_admin_settings' );
add_action('admin_post_save_aimtell_settings', 'save_aimtell_settings');



/****** Aimtell Integrations *********/

// only include this if the aimtell_woocommerce_tracking option is active
if (get_aimtell_woocommerce_tracking() || get_aimtell_woocommerce_abandoned_browse()) {
    include( __FOLDERDIR__ . '/integrations/aimtell-wc.php' );
}

/****** End Aimtell Integrations *********/

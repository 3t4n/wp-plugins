<?php
/*
Plugin Name: "Safe WP Updates" by WP Boom
Plugin URI: https://www.wpboom.com
Description: A site cloning and visual testing tool that allows creation of development sites for WordPress update testing through visual comparison via the Wp Boom service.
Version: 1.3.61
Requires at least: 6.2
Requires PHP: 7.4
Author: WP Boom
Text Domain: safe-wp-updates-by-wp-boom
License: GPLv2 or later
*/

if ( !defined('ABSPATH') ){
    die;  // Silence is golden, direct call is prohibited
}
if ( ! function_exists( 'get_option' ) ) {
    header( 'HTTP/1.0 403 Forbidden' );
    die;  // Silence is golden, direct call is prohibited
}






define( 'WPBOOM_VERSION', '1.3.4' );
define( 'WPBOOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPBOOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPBOOM_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ) );
define( 'WPBOOM_PLUGIN_FILE', basename( __FILE__ ) );
define( 'WPBOOM_PLUGIN_FULL_PATH', __FILE__ );
define( 'WPBOOM_ENABLE_SITEHEALTH', false );
define( 'WPBOOM_DATABASE_WARNING_SIZE', 25); // in MB
define( 'WPBOOM_EDITION', "NDIC" );
define('WPBOOM_TUNNEL_URL','https://openai.chrisbond.dev/tunnel.php'); // proxy for making requests to sites 
define( 'WPBOOM_SITE_SUFFIX','wpboomdev');
define ('WPBOOM_URL',"https://app.wpboom.com"); //  url of wpboom service 
define ('WPBOOM_API_URL',"/api/v1");
define ('WPBOOM_WPCLI_PATH',WPBOOM_PLUGIN_DIR . 'wp-cli/');
define ('WPBOOM_WPCLI_ZIP',WPBOOM_WPCLI_PATH . 'wp-cli.zip');
define ('WPBOOM_WPCLI',WPBOOM_WPCLI_PATH . 'wp-cli.phar');
define('WPBOOM_TOKEN','eyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoiQWRtaW4iLCJJc3N1ZXIiOiJJc3N1ZXIiLCJVc2VybmFtZSI6IkphdmFJblVzZSIsImV4cCI6MTY4OTQzNjgwMSwiaWF0IjoxNjg5NDM2ODAxfQ.lpZPhX0-NATInbUlKKqRcuhchnK2jV6HpOdyFZyMpQ4');
// Set the permission constants if not already set.
if ( ! defined( 'FS_CHMOD_DIR' ) ) {
    define( 'FS_CHMOD_DIR', ( fileperms( ABSPATH ) & 0777 | 0755 ) );
}
if ( ! defined( 'FS_CHMOD_FILE' ) ) {
    define( 'FS_CHMOD_FILE', ( fileperms( ABSPATH . 'index.php' ) & 0777 | 0644 ) );
}

require_once( WPBOOM_PLUGIN_DIR.'includes/classes/base-lib.php' );
require_once( WPBOOM_PLUGIN_DIR .'includes/classes/wpboom.php' );

add_action('admin_enqueue_scripts', array('SafeWPUpdates', 'admin_load_js'),100);
add_action('wp_ajax_safeupdates_ajax', array('SafeWPUpdates', 'safeupdates_ajax'));

/**
 * For display news Widget  content
 *
 * @since  1.0.0
 */
add_action('wp_ajax_safeupdates_news',function(){
    check_ajax_referer( 'safeupdates-ajax' );
    require_once( ABSPATH . WPINC . '/feed.php' );
    $rss = fetch_feed("https://www.wpboom.com/feed/");
    $maxitems = $rss->get_item_quantity( 5 ); 
    $rss_items = $rss->get_items( 0, $maxitems );
    ?>
    <ul>
        <?php if ( $maxitems == 0 ) : ?>
            <li><?php wp_kses_post( 'No items'); ?></li>
        <?php else : ?>
            <?php // Loop through each feed item and display each item as a hyperlink. ?>
            
            <?php foreach ( $rss_items as $item ) : ?>
                
                <li>
                    <div class="row">
                       
                        <div class="col-12">
                            <a target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>"
                                title="<?php printf(  'Posted %s', wp_kses_post($item->get_date('j F Y | g:i a') )); ?>">
                                <?php echo wp_kses_post( $item->get_title() ); ?>
                            </a>
                            <?php echo wp_kses_post(explode("[",$item->get_description())[0]); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>&hellip;</p>
                            <p><a target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>"
                                title="<?php printf(  'Posted %s', wp_kses_post($item->get_date('j F Y | g:i a') )); ?>">READ MORE &gt;
                            </a></p>
                        </div>
                </li>
            <?php endforeach; ?>
           
        <?php endif; ?>
    </ul>
    <?php
    exit;
});
// Uninstall action
register_uninstall_hook( WPBOOM_PLUGIN_FULL_PATH, array('SafeWPUpdates', 'uninstall') );
// Activation action
register_activation_hook( WPBOOM_PLUGIN_FULL_PATH, array('SafeWPUpdates', 'setup') );
// Deactivation action
register_deactivation_hook( WPBOOM_PLUGIN_FULL_PATH, array('SafeWPUpdates', 'cleanup') );

add_action('init', function(){
    
    SafeWPUpdates::init();
});

/**
 * Displays notification if the user is viewing development site admin
 *
 * @since  1.0.0
 */

 function safeupdates_admin_notice() {
    global $wpdb;
    if(defined('WPBOOM_COPY') && defined('WPBOOM_LIVE_PREFIX')){
        echo // Customize the message below as needed
        '<div class="notice notice-warning is-dismissible">
        <p><i class="dashicons dashicons-camera-alt"></i> <strong>WPBOOM</strong>: You are viewing a development site located in the sub-folder: <em class="fw-semibold">'.wp_kses_post(rtrim($wpdb->prefix,'_')).'</em></p>
        </div>'; 
    }
}
add_action( 'admin_notices', 'safeupdates_admin_notice' );

/**
 * DEV SITE (WPBOOM_COPY) -specific hooks 
 *
 * @since  1.0.0
 */

if(defined('WPBOOM_COPY') && defined('WPBOOM_LIVE_PREFIX')){
    add_filter('the_content', function($content){
        $options = get_option('safeupdates_options');
        if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){ 
            $prefix = array_key_first($options['spawned']);
            $re = '/src="(.*)(('.$prefix.'\/wp-content))(.*)"/m';
            $subst = "src=\"$1wp-content$4\"";
            $content = preg_replace($re, $subst, $content);
        }
       
        return $content;

    });
    add_action('wp_enqueue_scripts', function(){
        $options = get_option('safeupdates_options');
        if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){ 
            $prefix = array_key_first($options['spawned']);
            wp_enqueue_script('wpboom-main-front-js', WPBOOM_PLUGIN_URL . 'js/wpboom-front.js?version='.time(), ["jquery"], "1.3.1", true);
            wp_localize_script( 'wpboom-main-front-js', 'boomvars', array(
                'prefix' => $prefix
            ) );
        }
        
    });
    add_action( 'save_post', function($post_id, $post, $update){
        global $wpdb;
        if($post->post_type != 'attachment' || $update){
            return;
        }
        $prefix = rtrim($wpdb->prefix,"_");
        $post->post_guid = str_replace('/' .  $prefix . '/..','',$post->post_guid);
        // ideally we would want to store any media added to the dev site to the live site tables
        // future feature
      

    },11,3);
}

add_filter( 'safeupdates_cron_ajax', ['SafeWPUpdates','safeupdates_ajax'],10,6);



/**
 * Adds admin menu
 *
 * @since  1.0.0
 */
function safeupdates_admin_menu(){
    add_menu_page(
        __( 'Safe Updates', 'safe-wp-updates-by-wp-boom' ),
        __( 'Safe Updates', 'safe-wp-updates-by-wp-boom' ),
        'manage_options',
        'safeupdates_dashboard', 
        'safeupdates_dashboard_page_content',
        'dashicons-camera-alt',
        12
    );
   
}
add_action( 'admin_menu','safeupdates_admin_menu');




/**
 * Function to display main dashboard
 * Also checks for request to save api_token.
 *
 * @since  1.0.0
 */

function safeupdates_dashboard_page_content() {
    global $wpdb,$SafeWPUpdates_scan_targets,$SafeWPUpdates_colors;
    if(defined('WPBOOM_COPY')){
        include(WPBOOM_PLUGIN_DIR . '/dashboard-disabled.html');
        return;
    }
    $args = [
        'method' => 'spawn',
        'update_plugins' => 0,
        'include_uploads' => 1,
        'skip_database' => 0
    ];
    

    
    $options = get_option('safeupdates_options',[]);
    unset($options['path_to_wpcli']);
    update_option('safeupdates_options',$options);
   
    if(isset($_REQUEST['api_token'])){
        if(isset($_POST['api_token']) && $_POST['api_token'] !== ''){
            $api_token = sanitize_text_field(wp_unslash($_POST['api_token']));
        }
        if(isset($_POST['page']) && $_POST['page'] !== ''){
            $page = sanitize_text_field(wp_unslash($_POST['page']));
        }
       
        check_admin_referer( 'wpboom-update-api');
       
        //https://developer.wordpress.org/apis/security/sanitizing/
        $api_token = sanitize_text_field($api_token);
        if(!empty($api_token)){
            $options = safeupdates_update_token($api_token);
        } else {
            SafeWPUpdates_Lib::show_message("<span class='dashicons dashicons-info'></span> <strong>Token Cleared:</strong> WP Boom service account disconnected. To re-connect, click on 'Snapshot Live'." , 'error');
            
            $options['account_type'] = 'guest';
            $options['login'] = '';
            $options['pending_actions'] = '';
            unset($options['api']);
           
           
        }
       
        update_option('safeupdates_options',$options);
       
      
    }
    if(! array_key_exists("api",$options) && WPBOOM_EDITION != "NDIC" ){ //later version
        SafeWPUpdates_Lib::show_message("<span class='dashicons dashicons-info'></span> <strong>Have a WP Boom Account?</strong> Connect directly using the API to view your snapshots! Click <a class='wpboom-api-reveal' href='#' >here</a> to get started!" , 'info');
    }

    $url = get_home_url()."/wp-json";
    $response = wp_remote_post($url,
        array(
            'method'      => 'GET',
            'timeout'     => 60,
            'body'        => array()
        )
    );
    $remote_error = "";
    if(is_wp_error($response)){
        $error = $response->errors[array_key_first($response->errors)][0];
        $remote_error = 'This plugin encountered an error that prevents it from working: <ul class="mt-2 ms-2"><li>&bull; <span class="text-danger fw-bold">' . $error . '</span></li></ul>';
        
    }
    
    if(WPBOOM_ENABLE_SITEHEALTH){
        //https://developer.wordpress.org/reference/classes/wp_site_health/
        $wp_site_health = new WP_Site_Health();
        //https://developer.wordpress.org/reference/classes/wp_debug_data/
        $wp_debug_data = new WP_Debug_Data();
        $free_disk_space = SafeWPUpdates_Lib::get_free_disk_space('',false);
        $install_size = SafeWPUpdates_Lib::get_used_disk_space(ABSPATH,false) + SafeWPUpdates_Lib::get_database_size(false);
        $folder_info = SafeWPUpdates::get_scan_folder_info();
        $used_disk_space =  SafeWPUpdates_Lib::get_used_disk_space(ABSPATH,false);

        $disk_usage = ['used' => $used_disk_space,'free' => $free_disk_space, 'total' =>  $used_disk_space + $free_disk_space];

        $wp_content =  SafeWPUpdates_Lib::get_used_disk_space(ABSPATH."wp-content/",false);

        $content_sizes = SafeWPUpdates::get_wp_contents_sizes("wp-content");
        $plugin_sizes = WP_Boom::get_wp_contents_sizes("wp-content/plugins");
        $theme_sizes = WP_Boom::get_wp_contents_sizes("wp-content/themes");
        $root_sizes = WP_Boom::get_wp_contents_sizes("");
        $upload_sizes = WP_Boom::get_wp_contents_sizes("wp-content/uploads");
        $site_health = [
            (method_exists('WP_Site_Health', 'get_test_available_updates_disk_space'))?$wp_site_health->get_test_available_updates_disk_space():[],
            (method_exists('WP_Site_Health', 'get_test_update_temp_backup_writable'))?$wp_site_health->get_test_update_temp_backup_writable():[]
        ];

        $info = $wp_debug_data->debug_data();
    }
    
    $database_size = SafeWPUpdates_Lib::get_database_size();
    
    $upload_paths = wp_upload_dir();
    
    
    if(!array_key_exists("account_type",$options)){
        $options['account_type'] = 'guest';
        update_option( 'safeupdates_options', $options);
    }

    $wp_cli_installed = SafeWPUpdates_Lib::get_wp_cli_path(true);
    $exec_enabled = SafeWPUpdates_Lib::is_exec_enabled();
    $cron_enabled = SafeWPUpdates_Lib::is_cron_enabled();
    //$imagemagick_enabled = SafeWPUpdates_Lib::is_imagemagick_enabled(); //no longer required
    if(array_key_exists("api",$options) && array_key_exists("valid",$options['api'])){

        $api = $options['api'];
        if($api && !$api['valid']){ 
            SafeWPUpdates_Lib::show_message("<strong>WP BOOM API</strong>: API Token is invalid." , 'error');
        }
    }
    if(get_transient("wpboom-successful-sync")){
        SafeWPUpdates_Lib::show_message("<strong>WP BOOM API</strong>: Service sync successful. Token is valid." , 'success');
        delete_transient("wpboom-successful-sync");
    }
    include(WPBOOM_PLUGIN_DIR . '/dashboard.php');
    
}

/**
 * Stores api_token in options. This is basically a password that provides permission to communicate with the WPBOOM service
 * This token must match the value on the WPBOOM service server.
 *
 * @since  1.0.0
 * @return array
 */

function safeupdates_update_token($api_token,$rest = false){
    $options = get_option('safeupdates_options');
    //https://developer.wordpress.org/reference/functions/wp_remote_post/
    $options['api']['token'] =  $api_token;
    $token_url = WPBOOM_URL.WPBOOM_API_URL."?token=".$api_token;
    
    $response = wp_remote_post( WPBOOM_TUNNEL_URL,
        array(
            'method'      => 'GET',
            'timeout'     => 60,
            'body'        => array( 
                "token" => WPBOOM_TOKEN,
                "url"   => base64_encode($token_url)
                )
        )
    );
    $response = json_decode($response['body'],true);
   
    if(is_wp_error($response)){
        $options['api']['valid'] = 0;
        $options['api']['data'] = [];
        $options['pending_actions'] = '';
        $options['account_type'] = 'guest';
        foreach($response->errors as $error => $msg){
            SafeWPUpdates_Lib::show_message("<strong>WP BOOM API</strong>: The request returned <em class='text-danger'>{$error}</em>. ". $msg[0] , 'error');
        }
       
        //
    } else {
       
        if($response['content']){
            $response = json_decode($response['content'],true);
            
            if($response['success'] == true){
                if($options['pending_actions'] != "snapshot_after_login" && $options['pending_actions'] != "crawl_requested"){
                    $options['pending_actions'] = "ready";
                }
                
                $options['api']['valid'] = 1;
                $options['api']['data'] = $response['data'];
                $options['account_type'] = 'registered';
                if(!$rest && (!$options['api']['token'] || $options['api']['token'] != $api_token)){
                    SafeWPUpdates_Lib::show_message("<strong>WP BOOM API</strong>: Token failed." , 'error');
                   
                } else {
                   set_transient("wpboom-successful-sync",true);
                }
                
            }
        }
        
        
    }
    return $options;
}


/**
 * Allows WPBOOM service to ascertain status of plugin installation
 *
 * @since  1.0.0
 * @return array
 */
function safeupdates_REST_status() {
    $items = array();
    if(defined('WPBOOM_COPY')){
        $items[] = array(
            'status' => 'installed',
            'is_spawn' => true
        );
    } else {
        $items[] = array(
            'status' => 'installed',
            'is_spawn' => false
    );
    }
    return $items;
}

/**
 * Allows WPBOOM service to communicate completion of snapshot
 *
 * @since  1.0.0
 * @return array as json
 */

function safeupdates_REST_snapshot_completed($data) {
    require_once(ABSPATH.'wp-admin/includes/update.php');
    require_once(ABSPATH.'wp-admin/includes/misc.php');
    $response = array();
    
    $token = sanitize_text_field($data->get_param( 'token' ));
    $api = sanitize_text_field($data->get_param( 'api' ));
    $registered = sanitize_text_field($data->get_param( 'registered' ));  
    //echo $token."\n";
    //echo $api."\n";
    //echo $registered;
    
    if($token == WPBOOM_TOKEN){
        $options = get_option('safeupdates_options');
        if($registered == 'true'){
            $options['account_type'] = "registered";
            $options['api']['token'] = $api;
            $options['api']['valid'] =  1;
        } else {
            $options['account_type'] = "guest";
            $api['api']['token'] = $api;
            $options['api']['valid'] =  1;
        }
        if("crawl_requested" ==  $options['pending_actions']){
            $options['pending_actions'] = "snapshot_requested";
        } else {
            if($options['pending_actions'] != "snapshot_after_login"){
                $options['pending_actions'] = "ready";
            }
            
        }
       
        $options['action_date'] = gmdate("F j, Y");
        update_option('safeupdates_options',$options);
        $response = json_decode('{"code":"wpboom_success"}',true);
        
    } else {
        $response = $data;
        $response = json_decode('{"code":"rest_forbidden","message":"Sorry, you are not allowed to do that.","data":{"status":401}}',true);
    } 
    return $response;
}

/**
 * Allows WPBOOM service to sync
 *
 * @since  1.0.0
 */
function safeupdates_REST_sync($data) {
    require_once(ABSPATH.'wp-admin/includes/update.php');
    require_once(ABSPATH.'wp-admin/includes/misc.php');
    $response = array();
    
    $token = sanitize_text_field($data->get_param( 'token' ));
   
    if($token){
        $options = get_option('safeupdates_options');
        
        $api_token = $options['api']['token'];
        if(!$api_token){
            $response = json_decode('{"code":"wpboom_error","message":"Token not found.","data":{"status":404}}',true);
        } elseif($api_token != $token){
            $response = json_decode('{"code":"wpboom_error","message":"Invalid token.","data":{"status":401}}',true);
        } else {
            
            $options = safeupdates_update_token($token,true);
            update_option('safeupdates_options',$options);
            $response = json_decode('{"code":"wpboom_success"}',true);
        }
        
    } else {
        $response = $data;
        $response = json_decode('{"code":"rest_forbidden","message":"Sorry, you are not allowed to do that.","data":{"status":401}}',true);
    } 
    return $response;
}

/**
 * Creates wp-json endpoints
 *
 * @since  1.0.0
 */

function safeupdates_register_api_endpoints() {
   
    
    register_rest_route( 'wpboom/v2', '/status', array(
        'methods' => 'GET',
        'callback' => 'safeupdates_REST_status',
        'permission_callback' => '__return_true'
    ));

   
    register_rest_route( 'wpboom/v2', '/snapshot_completed/(?P<token>[a-zA-Z0-9-=.]+)/(?P<api>[a-zA-Z0-9-=.]+)/(?P<registered>(true|false))', array(
        'methods' => 'GET',
        'callback' => 'safeupdates_REST_snapshot_completed',
        'args' => [
            'auth' => array('default'=>current_user_can( 'manage_options' )), //self authentication
        ],
        'permission_callback' => '__return_true'
    ) );


    register_rest_route( 'wpboom/v2', '/sync/(?P<token>[a-zA-Z0-9-=]+)', array(
        'methods' => 'GET',
        'callback' => 'safeupdates_REST_sync',
        'args' => [
            'auth' => array('default'=>current_user_can( 'manage_options' )), //self authentication
        ],
        'permission_callback' => '__return_true'
    ) );

    
   
}
   
add_action( 'rest_api_init', 'safeupdates_register_api_endpoints' );

/**
 * Puts plugin link in admin bar
 *
 * @since  1.0.0
 */

function safeupdates_toolbar_link_to_wpboom( $wp_admin_bar ) {
	$args = array(
		'id'    => 'safeupdates_adminbar_link',
		'title' => __( 'Safe Updates', 'safe-wp-updates-by-wp-boom' ),
		'href'  => '/wp-admin/admin.php?page=safeupdates_dashboard',
		'meta'  => array(
			'class' => 'wpboom-adminbar-link'
		)
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'safeupdates_toolbar_link_to_wpboom', 80 );

/**
 * Processes heartbeat
 *
 * @since  1.0.0
 */
function safeupdates_heartbeat_received( $response, $data ) {
    if( $data['safeupdates_heartbeat'] == 'snapshot_requested' ||  $data['safeupdates_heartbeat'] == 'crawl_requested' ) {
        $options = get_option('safeupdates_options',[]);
        $response['safeupdates_pending_actions'] = $options['pending_actions'];
    }
    return $response;
}
add_filter( 'heartbeat_received', 'safeupdates_heartbeat_received', 10, 2 );

function safeupdates_change_frequency_of_heartbeat_settings( $settings ) {
    $settings['interval'] = 15; //Anything between 15-120
    return $settings;
}
add_filter( 'heartbeat_settings', 'safeupdates_change_frequency_of_heartbeat_settings' );
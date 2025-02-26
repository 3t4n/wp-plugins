<?php

/**
 * Plugin Name: Genie Image AI
 * Description:  Genie Image AI is the most intuitive A.I Content Wordpress Plugin that can help you save time and generate unique images.
 * Plugin URI: https://getgenie.ai/
 * Author: getgenieai
 * Version: 1.0.3
 * Author URI: https://getgenie.ai/
 *
 * Text Domain: genie-image-ai
 *
 * @package Genie Image AI
 * @category Pro
 *
 * License: GPLv3 or later
 */

defined('ABSPATH') || exit;

define('GENIEIMAGE_VERSION', '1.0.3');
define('GENIEIMAGE_TEXTDOMAIN', 'genie-image-ai');
define('GENIEIMAGE_BASENAME', plugin_basename(__FILE__));
define('GENIEIMAGE_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('GENIEIMAGE_DIR', trailingslashit(plugin_dir_path( __FILE__ )));

define('GENIEIMAGE_DEBUG_SCRIPT_SUFFIX', (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min');

define('GENIEIMAGE_NLP_REMOTE_ADDR', 'https://bridge.getgenie.ai/');
define('GENIEIMAGE_ACCOUNT_REMOTE_ADDR', 'https://getgenie.ai/account/');

define('GENIEIMAGE_ACCOUNT_REMOTE_ADDR_FALLBACK', 'https://app.getgenie.ai/');

define('GENIEIMAGE_BLOGWIZARD_PREFIX', 'genieimage_blogwizard_');
define('GENIEIMAGE_HISTORY_PREFIX', 'genieimage_history_');

function genieimage_on_activation( $plugin) {

    if('genie-image/genie-image-ai.php' != $plugin){
        return;
    }

    wp_safe_redirect( admin_url( 'admin.php?page=genieimage' ) . "#getting-started" );
    exit();
}
//add_action('activated_plugin', 'genieimage_on_activation');


function genieimage_admin_notice() {

    echo '<div class="notice notice-warning is-dismissible genieimagenotice-wrapper">
        <div class="genieimagenotice">
            <p class="notice-message">
                <img src="' . esc_url(GENIEIMAGE_URL . '/assets/dist/admin/images/genie-head.svg') . '" class="notice-icon" />
                ' . esc_html("I've noticed that you haven't activated the Pro/Free license yet. Click the button below to unleash my magic. Sincerely — Genie Image AI") . '
            </p>
            <div class="notice-link">
                <a href="' . esc_url('https://app.getgenie.ai/license/?product=free-trial') . '" target="_blank">' . esc_html('Claim your license') . '</a>
                <a href="' . esc_url(admin_url('admin.php?page=' . GENIEIMAGE_TEXTDOMAIN)) . '#image-license">' . esc_html('Finish setup with your license.') . '</a>
            </div>
        </div>
    </div>';
    }

add_action('admin_head', 'genieimage_header_script_data');

// check if it is upload.php page if yes then add a button after wp-heading-online class

function genieimage_add_button() {
    global $pagenow;
    if ( $pagenow == 'upload.php' ) {
       // add inline script genieimage-admin-scripts.js
       wp_add_inline_script( 'genieimage-admin-scripts', 'jQuery(document).ready(function($){$(".page-title-action").after("<button class=\"page-title-action\" onclick=wp.media().open()>Genie Image AI</button>");});');
    }
}

// load a button into media library
add_action( 'admin_head', 'genieimage_add_button' );

function genieimage_header_script_data(){

    $wizard_screen = null;
    $is_block_editor = null;

    if(function_exists('get_current_screen')){
        $current_screen = get_current_screen();
        $elementor_action = isset($_GET['action']) && $_GET['action'] == 'elementor'; //phpcs:ignore WordPress.Security.NonceVerification
        $bricks_action = isset($_GET['bricks']); //phpcs:ignore WordPress.Security.NonceVerification
        $oxygent_action = isset($_GET['ct_builder']); //phpcs:ignore WordPress.Security.NonceVerification
        $is_block_editor = $current_screen->is_block_editor();
        
        if($elementor_action){
            $wizard_screen = 'elementor';
        }

        if( 
            $current_screen->id == 'post' 
            && $current_screen->base == 'post' 
            && $current_screen->post_type == 'post'
            && !$elementor_action
        ){
            $wizard_screen = 'post';
        }
    
        if( 
            $current_screen->id == 'product' 
            && $current_screen->base == 'post' 
            && $current_screen->post_type == 'product'
        ){
            $wizard_screen = 'woo_product';
        }
    }
	
    global $pagenow;
    if (function_exists('is_plugin_active') && !is_plugin_active('getgenie/getgenie.php')) {
        $token = new \GenieImageAi\App\Auth\TokenManager();
    } else {
        $token = new \GenieAi\App\Auth\TokenManager();
    }
        
	$_nonce = wp_create_nonce( 'wp_rest' );
 
	$config = [
	    'version' => GENIEIMAGE_VERSION,
	    'restNonce' => $_nonce,
	    'siteUrl' => get_site_url(),
	    'assetsUrl' => GENIEIMAGE_URL . 'assets/',
	    'baseApi' => get_rest_url(null, 'genieimage/v1/'),
	    'parserApi' => GENIEIMAGE_NLP_REMOTE_ADDR,
	    'parserApiWp' => get_rest_url(null, 'genieimage/v1/parser/'),
	    'usageLimitStatsApi' => get_rest_url(null, 'genieimage/v1/limit_usage_stats/'),
	    'storeApi' => get_rest_url(null, 'genieimage/v1/store/'),
	    'licenseApi' => get_rest_url(null, 'genieimage/v1/license/'),
	    'licenseKeyLength' => 46,
	    'feedbackApi' => get_rest_url(null, 'genieimage/v1/feedback/'),
	    'historyApi' => get_rest_url(null, 'genieimage/v1/history/'),
	    'siteToken' => get_option('getgenie_site_token', ''),
	    'authToken' => $token->generate(), // access_denied or 4gb3rv3dyvy3h59gvwscdt3rerf23
	    'authTokenLeaserApi' => admin_url('admin-ajax.php?action=lease_auth_token'), // wp-ajax
        'isBlockEditor' => $is_block_editor,
	    'currentPage' =>  $pagenow
	];
 
	?>
	<script>
	    window.genieImage = window.genieImage ?? {};
	    window.genieImage.config = <?php echo json_encode($config); ?>;
	    window.genieImage.Components  = window.genieImage.Components ?? {};
        
	</script>
 <?php
 }


function genieimage_remote_request($remote_url_partial, $body, $header = []){
    $remote_url = GENIEIMAGE_ACCOUNT_REMOTE_ADDR . $remote_url_partial;
    $response = genieimage_remote_request_try($remote_url, $body, $header);

    if($response === null){
        $remote_url = GENIEIMAGE_ACCOUNT_REMOTE_ADDR_FALLBACK . $remote_url_partial;
        $response = genieimage_remote_request_try($remote_url, $body, $header);
    }

    return $response;
}

function genieimage_remote_request_try($remote_url, $body, $header = []){
    $response = wp_remote_post($remote_url, array(
        'method'      => 'POST',
        'timeout'     => 300,
        'redirection' => 3,
        'httpversion' => '1.0',
        'sslverify' => false,
        'blocking'    => true,
        'body' => $body,
        'headers' => array_merge($header, array(
            'Content-Type' => 'application/json',
        )),
    ));

    if(200 === wp_remote_retrieve_response_code($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $data          = json_decode($response_body);

        return $data;
    }

    return null;
}
 
include GENIEIMAGE_DIR . 'vendor/autoload.php';


new \GenieImageAi\App\Providers\EnqueueProvider();
new \GenieImageAi\App\Providers\SideMenuProvider();
new \GenieImageAi\App\Providers\SettingLinkProvider();

new \GenieImageAi\App\Api\Feedback();
new \GenieImageAi\App\Api\Parser();

new \GenieImageAi\App\Api\License();
new \GenieImageAi\App\Api\UsageLimitStats();
if (function_exists('is_plugin_active') && !is_plugin_active('getgenie/getgenie.php')) {
    new \GenieImageAi\App\Api\LeaseToken();
}
new \GenieImageAi\App\Services\History\Cpt();
new \GenieImageAi\App\Services\GenieChat\Cpt();

new \GenieImageAi\App\Api\Store();
new \GenieImageAi\App\Api\History();
new \GenieImageAi\App\Api\GenieChat();
new \GenieImageAi\App\Api\UploadImage();

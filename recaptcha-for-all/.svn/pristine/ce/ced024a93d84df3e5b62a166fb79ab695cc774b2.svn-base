<?php /*
Plugin Name: reCAPTCHA For All
Description: Protect ALL pages of your site against Spam and Hackers bots with reCAPTCHA
Version: 2.22
Domain Path: /language
Author: Bill Minozzi
Author URI: http://billminozzi.com
Text Domain: recaptcha-for-all
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
// Make sure the file is not directly accessible.
if (!defined('ABSPATH')) {
    die('We\'re sorry, but you can not directly access this file.');
}
// ob_start();
//
$recaptcha_for_all_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$recaptcha_for_all_plugin_version = $recaptcha_for_all_plugin_data['Version'];
$recaptcha_for_all_sitekey = trim(sanitize_text_field(get_option('recaptcha_for_all_sitekey', '')));
$recaptcha_for_all_secretkey = trim(sanitize_text_field(get_option('recaptcha_for_all_secretkey', '')));
// active?
$recaptcha_for_all_settings = trim(sanitize_text_field(get_option('recaptcha_for_all_settings', '')));
//die(var_dump($recaptcha_for_all_settings));
//$recaptcha_for_all_settings = 'no';

$recaptcha_for_all_settings_provider = trim(sanitize_text_field(get_option('recaptcha_for_all_settings_provider', 'google')));

$recaptcha_for_all_update = trim(sanitize_text_field(get_option('recaptcha_for_all_update', '')));


$recaptcha_for_all_recaptcha_score = trim(sanitize_text_field(get_option('recaptcha_for_all_recaptcha_score', '')));
define('RECAPTCHA_FOR_ALLVERSION', $recaptcha_for_all_plugin_version);
// define('RECAPTCHA_FOR_ALLPATH', plugin_dir_path(__file__));
define('RECAPTCHA_FOR_ALLPATH', plugin_dir_path(__FILE__));

define('RECAPTCHA_FOR_ALLURL', plugin_dir_url(__FILE__));
define('RECAPTCHA_FOR_ALL_IMAGES', plugin_dir_url(__FILE__) . 'images');
$recaptcha_for_all_plugin = plugin_basename(__FILE__);
//

function recaptcha_for_all_add_admstylesheet()
{
    wp_register_style('recaptcha-admin ', plugin_dir_url(__FILE__) . '/css/recaptcha.css');
    wp_enqueue_style('recaptcha-admin ');
    wp_enqueue_style('recaptcha-pointer', plugin_dir_url(__FILE__) . '/css/bill-wp-pointer.css');
}

require_once(RECAPTCHA_FOR_ALLPATH . 'functions/functions.php');

$recaptcha_for_all_visitor_ip = recaptcha_for_all_findip();
$recaptcha_for_all_visitor_ua = trim(recaptcha_for_all_get_ua());
$recaptcha_for_all_string_whitelist = implode(PHP_EOL, array_map('sanitize_textarea_field', explode(PHP_EOL, get_site_option('recaptcha_for_all_string_whitelist', ''))));
$arecaptcha_for_all_string_whitelist = explode(PHP_EOL, $recaptcha_for_all_string_whitelist);
$recaptcha_for_all_ip_whitelist = trim(get_site_option('recaptcha_for_all_ip_whitelist', ''));




if (recaptcha_for_all_maybe_search_engine())
    return;

$recaptcha_for_all_is_admin = recaptcha_for_all_check_wordpress_logged_in_cookie();


$arecaptcha_for_all_ip_whitelist = explode(PHP_EOL, $recaptcha_for_all_ip_whitelist);


for ($i = 0; $i < count($arecaptcha_for_all_ip_whitelist); $i++) {
    $arecaptcha_for_all_ip_whitelist[$i] = trim(sanitize_text_field($arecaptcha_for_all_ip_whitelist[$i]));
    if (!filter_var($arecaptcha_for_all_ip_whitelist[$i], FILTER_VALIDATE_IP))
        $arecaptcha_for_all_ip_whitelist[$i] = '';
}
$recaptcha_for_all_ip_whitelist = implode(PHP_EOL, $arecaptcha_for_all_ip_whitelist);


//$arecaptcha_for_all_slugs = array_map('sanitize_textarea_field', explode(PHP_EOL, get_option('recaptcha_for_all_slugs', '')));


$recaptcha_for_all_slugs = get_option('recaptcha_for_all_slugs', '');

// Verifica se $recaptcha_for_all_slugs é uma string
if (is_string($recaptcha_for_all_slugs)) {
    // Converte a string em um array, dividindo pelo delimitador de linha e sanitiza
    $arecaptcha_for_all_slugs = array_map('sanitize_textarea_field', explode(PHP_EOL, $recaptcha_for_all_slugs));
} elseif (is_array($recaptcha_for_all_slugs)) {
    // Sanitiza cada elemento da array
    $arecaptcha_for_all_slugs = array_map('sanitize_text_field', $recaptcha_for_all_slugs);
}



$recaptcha_for_all_pages = trim(sanitize_text_field(get_option('recaptcha_for_all_pages', 'yes_all')));

$recaptcha_for_all_login = trim(sanitize_text_field(get_option('recaptcha_for_all_login', 'no')));
$recaptcha_for_all_comment = trim(sanitize_text_field(get_option('recaptcha_for_all_comment', 'no')));


$recaptcha_for_all_background = trim(sanitize_text_field(get_option('recaptcha_for_all_background', 'yes')));
$recaptcha_request_url = sanitize_text_field($_SERVER['REQUEST_URI']);


if ($recaptcha_for_all_is_admin) {
    add_action('plugins_loaded', 'recaptcha_localization_init');
    require_once RECAPTCHA_FOR_ALLPATH . 'functions/function_sysinfo.php';
    //var_dump(__LINE__);

}

if (
    !isset($_COOKIE['recaptcha_cookie'])
    and !$recaptcha_for_all_is_admin
    and !recaptcha_for_all_maybe_search_engine()
    and !recaptcha_for_all_isourserver()
    and !recaptcha_for_all_is_ip_whitelisted($recaptcha_for_all_visitor_ip, $arecaptcha_for_all_ip_whitelist)
    and !recaptcha_for_all_is_string_whitelisted($recaptcha_for_all_visitor_ua, $arecaptcha_for_all_string_whitelist)
) {

    // google
    if (isset($_POST['token'])) {
        $token = sanitize_text_field($_POST['token']);


        $action = sanitize_text_field($_POST['action']);
        $response = (array)wp_remote_get(sprintf('https://www.recaptcha.net/recaptcha/api/siteverify?secret=%s&response=%s', $recaptcha_for_all_secretkey, $token));


        $recaptchaResponse = isset($response['body']) ? json_decode($response['body'], 1) : ['success' => false, 'error-codes' => ['general-fail']];
        //  (1.0 is very likely a good interaction, 0.0 is very likely a bot). 

        // fail
        if (!$recaptchaResponse["success"]) {

            // if (!has_action('parse_query', 'recaptcha_block')) {
            add_action('parse_query', 'recaptcha_block');
            // }

            return; // fail...
        }

        // Block...
        $recaptcha_for_all_recaptcha_score = $recaptcha_for_all_recaptcha_score / 10;
        if ($recaptchaResponse["score"] < $recaptcha_for_all_recaptcha_score) {

            if ($recaptcha_for_all_settings == 'yes') {

                if (!has_action('parse_query', 'recaptcha_block')) {
                    add_action('parse_query', 'recaptcha_block');
                }
                // add_action('parse_query', 'recaptcha_block');
            }
        }

        // ok
        recaptcha_for_all_add_stats_ok();
        add_action('wp_enqueue_scripts', 'recaptcha_for_all_register_cookie', 1000);
        return;
    }

    // turnstile
    if (isset($_POST['cf-turnstile-response']) and !empty($_POST['cf-turnstile-response'])) {


        $results = array();
        if (empty($postdata) && isset($_POST['cf-turnstile-response'])) {
            $postdata = sanitize_text_field($_POST['cf-turnstile-response']);
        }

        // bill 24


        if ($recaptcha_for_all_sitekey && $recaptcha_for_all_secretkey) {
            $headers = array(
                'body' => [
                    'secret' => $recaptcha_for_all_secretkey,
                    'response' => $postdata
                ]
            );


            $verify = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', $headers);
            $verify = wp_remote_retrieve_body($verify);



            if (!$verify) {
                return;
                //add_action('parse_query', 'recaptcha_block');
            }

            $response = json_decode($verify);


            if ($response->success) {

                recaptcha_for_all_add_stats_ok();
                add_action('wp_enqueue_scripts', 'recaptcha_for_all_register_cookie', 1000);
                return; // works...

            }


            // block
            add_action('parse_query', 'recaptcha_block');
            return; // fail...

            foreach ($response as $key => $val) {
                if ($key == 'error-codes') {
                    foreach ($val as $key => $error_val) {
                        $results['error_code'] = $error_val;
                    }
                }
            }
        } else
            return; // fail.. missing keys...


    }
    add_action('wp_enqueue_scripts', 'recaptcha_for_all_add_scripts', 1000);

    add_action('wp_enqueue_scripts', 'recaptcha_for_all_enqueueScripts', 9999);
    // add_action('admin_enqueue_scripts', 'recaptcha_for_all_enqueueAdminScripts');


    // >>>>>>>>>>>>>>   DESVIATE IF NOT COOKIE  <<<<<<<<<<<<<<<<<<<<<<

    // double check...
    if (!isset($_COOKIE['recaptcha_cookie'])) {
        // if ($recaptcha_for_all_settings == 'yes' and !is_admin()){ 
        if ($recaptcha_for_all_settings == 'yes') {

            global $recaptcha_active_called;
            $recaptcha_active_called = false;
            add_action('parse_query', 'recaptcha_is_active');
            // add_action('wp', 'recaptcha_is_active');
        }
    }

    /*
    if ($recaptcha_for_all_settings == 'yes') {
        if (!empty($recaptcha_for_all_sitekey) and !empty($recaptcha_for_all_secretkey))
            add_filter('template_include', 'recaptcha_for_all_page_template');
    }
    */
} else
    add_action('wp_enqueue_scripts', 'recaptcha_for_all_add_scripts', 1000);


if (!$recaptcha_for_all_is_admin) {
    $recaptcha_for_all_settings_china = trim(sanitize_text_field(get_option('recaptcha_for_all_settings_china', '')));
    if ($recaptcha_for_all_settings_china == 'yes') {
        if (isset($_COOKIE['recaptcha_cookie'])) {
            $recaptcha_fingerprint = sanitize_text_field($_COOKIE['recaptcha_cookie']);
            if (!empty($recaptcha_fingerprint)) {
                if (
                    strpos($recaptcha_fingerprint, 'Asia/Shanghai') !== false
                    or strpos($recaptcha_fingerprint, 'Asia/Hong_Kong') !== false
                    or strpos($recaptcha_fingerprint, 'Asia/Macau') !== false
                ) {
                    header('HTTP/1.1 403 Forbidden');
                    header('Status: 403 Forbidden');
                    header('Connection: Close');
                    http_response_code(403);
                    wp_die("Forbidden");
                }
            }
        }
    }
}



if ($recaptcha_for_all_is_admin) {
    if (empty($recaptcha_for_all_sitekey) or empty($recaptcha_for_all_secretkey)) {
        add_action('admin_notices', 'recaptcha_for_all_alert_keys');
    }

    add_action('admin_init', 'recaptcha_for_all_add_admstylesheet');
    add_action('admin_menu', 'recaptcha_for_all_memory_init');
    //register_activation_hook(__FILE__, 'recaptcha_for_all_was_activated');
    add_action('admin_init', 'recaptcha_for_all_check_string_whitelist');

    //  add_filter("plugin_action_links_$plugin", 'recaptcha_for_all_plugin_settings_link');
    add_filter("plugin_action_links_$recaptcha_for_all_plugin", 'recaptcha_for_all_settings_link');



    if (!recaptcha_for_all_is_ip_whitelisted($recaptcha_for_all_visitor_ip, $arecaptcha_for_all_ip_whitelist)) {
        //  update_option('recaptcha_for_all_ip_whitelist', $recaptcha_for_all_ip_whitelist . PHP_EOL . $recaptcha_for_all_visitor_ip);
    }


    add_action('wp_ajax_recaptcha_dismiss_notice2', 'recaptcha_dismiss_notice2');
    add_action('wp_head', 'recaptcha_ajaxurl');
    add_action('wp_ajax_recaptcha_for_all_dismissible_notice', 'recaptcha_for_all_dismissible_notice');
    register_activation_hook(__FILE__, 'recaptcha_for_all_activated');


    if ($recaptcha_for_all_is_admin) {

        add_action('wp_head', 'recaptcha_for_all_ajaxurl');

        function recaptcha_for_all_ajaxurl()
        {
            echo '<script type="text/javascript">
               var ajaxurl = "' . esc_url(admin_url('admin-ajax.php')) . '";
             </script>';
        }

        add_action('wp_ajax_recaptcha_for_all_image_select', 'recaptcha_for_all_image_select');
        add_action('admin_enqueue_scripts', 'recaptcha_for_all_adm_enqueue_scripts1');

        //

        // Obtenha a URL atual da página no painel de administração
        $current_page_url = admin_url(add_query_arg(array()));
        // https://recaptchaforall.com/wp-admin/wp-admin/tools.php?page=recaptcha_for_all_admin_page&tab=keys


        if (strpos($current_page_url, 'page=recaptcha_for_all_admin_page&tab=keys') !== false) {
            add_action('admin_enqueue_scripts', 'recaptcha_for_all_adm_enqueue_scripts3');
        }

        $r = get_option('recaptcha_for_all_was_activated', '0');
        //die(var_export($r));
        if (get_option('recaptcha_for_all_was_activated', '0') == '1') {
            add_action('admin_enqueue_scripts', 'recaptcha_for_all_adm_enqueue_scripts2');
        }
    }


    // add_action('admin_enqueue_scripts', 'recaptcha_for_all_load_upsell');
    // add_action('wp_ajax_recaptcha_for_all_install_plugin', 'recaptcha_for_all_install_plugin');


}
//
/*
$page = ob_get_contents();
ob_end_clean();
error_log($page,0);
*/

//

function recaptcha_for_all_adm_enqueue_scripts1()
{
    wp_enqueue_script("jquery");
    wp_enqueue_media();

    //wp_enqueue_script('recaptcha_for_all_circle', RECAPTCHA_FOR_ALLURL .
    //'js/radialIndicator.js', array('jquery'));
    //

    wp_enqueue_script('recaptcha_for_all_chart', RECAPTCHA_FOR_ALLURL .
        'js/chart.min.js', array('jquery'));


    wp_register_script("recaptcha_for_all-scripts", RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    wp_enqueue_script('recaptcha_for_all-scripts');

    // Localize your script and pass the variable
    $recaptcha_my_plugin_nonce = wp_create_nonce('recaptcha_my_plugin_action_upd_image');
    wp_localize_script('recaptcha_for_all-scripts', 'recaptcha_my_data', array(
        'recaptcha_my_nonce' => $recaptcha_my_plugin_nonce,
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-dialog'); // Exemplo: carregar o diálogo do jQuery UI

    // ui 
    $recaptcha_for_all_jqueryurl = RECAPTCHA_FOR_ALLURL . 'assets/css/jquery-ui.css';
    wp_register_style('bill-jquery-ui', $recaptcha_for_all_jqueryurl, array(), '1.12.1', 'all');
    wp_enqueue_style('bill-jquery-ui');
}



function recaptcha_for_all_check_wordpress_logged_in_cookie()
{
    // Percorre todos os cookies definidos
    foreach ($_COOKIE as $key => $value) {
        // Verifica se algum cookie começa com 'wordpress_logged_in_'
        if (strpos($key, 'wordpress_logged_in_') === 0) {
            // Cookie encontrado
            return true;
        }
    }
    // Cookie não encontrado
    return false;
}




// ---------------------------------- 2024  -------------------------------------
function recaptcha_for_all_new_more_plugins()
{
    $plugin = new recaptcha_for_all_Bill_show_more_plugins();
    $plugin->bill_show_plugins();
}

function recaptcha_for_all_bill_more()
{
    global $recaptcha_for_all_is_admin;
    //if (function_exists('is_admin') && function_exists('current_user_can')) {
    if ($recaptcha_for_all_is_admin and current_user_can("manage_options")) {
        $declared_classes = get_declared_classes();
        foreach ($declared_classes as $class_name) {
            if (strpos($class_name, "Bill_show_more_plugins") !== false) {
                //return;
            }
        }
        require_once dirname(__FILE__) . "/includes/more-tools/class_bill_more.php";
        //debug2(dirname(__FILE__) . "/includes/more-tools/class_bill_more.php");
    }
    // }
}

add_action("init", "recaptcha_for_all_bill_more", 5);





// -------------------------------------


function recaptcha_for_all_bill_hooking_diagnose()
{
    global $recaptcha_for_all_is_admin;
    // if (function_exists('is_admin') && function_exists('current_user_can')) {
    if ($recaptcha_for_all_is_admin and current_user_can("manage_options")) {
        $declared_classes = get_declared_classes();
        foreach ($declared_classes as $class_name) {
            if (strpos($class_name, "Bill_Diagnose") !== false) {
                return;
            }
        }
        $plugin_slug = 'recaptcha-for-all';
        $plugin_text_domain = $plugin_slug;
        $notification_url = "https://wpmemory.com/fix-low-memory-limit/";
        $notification_url2 =
            "https://wptoolsplugin.com/site-language-error-can-crash-your-site/";
        require_once dirname(__FILE__) . "/includes/diagnose/class_bill_diagnose.php";
    }
    // } 
}
add_action("init", "recaptcha_for_all_bill_hooking_diagnose", 10);
//
//



function recaptcha_for_all_bill_hooking_catch_errors()
{
    global $recaptcha_for_all_plugin_slug;

    $declared_classes = get_declared_classes();
    foreach ($declared_classes as $class_name) {
        if (strpos($class_name, "bill_catch_errors") !== false) {
            return;
        }
    }
    $recaptcha_for_all_plugin_slug = 'recaptcha_for_all';
    require_once dirname(__FILE__) . "/includes/catch-errors/class_bill_catch_errors.php";
}
add_action("init", "recaptcha_for_all_bill_hooking_catch_errors", 15);





// ------------------------

function recaptcha_for_all_load_feedback()
{
    global $recaptcha_for_all_is_admin;
    //if (function_exists('is_admin') && function_exists('current_user_can')) {
    if ($recaptcha_for_all_is_admin and current_user_can("manage_options")) {
        // ob_start();
        //
        require_once dirname(__FILE__) . "/includes/feedback-last/feedback-last.php";
        // ob_end_clean();
        //
    }
    //}
    //
}
add_action('wp_loaded', 'recaptcha_for_all_load_feedback', 10);


// ------------------------


function recaptcha_for_all_bill_install()
{
    global $recaptcha_for_all_is_admin;
    if ($recaptcha_for_all_is_admin and current_user_can("manage_options")) {
        $declared_classes = get_declared_classes();
        foreach ($declared_classes as $class_name) {
            if (strpos($class_name, "Bill_Class_Plugins_Install") !== false) {
                return;
            }
        }
        if (!function_exists('bill_install_ajaxurl')) {
            function bill_install_ajaxurl()
            {
                echo '<script type="text/javascript">
					var ajaxurl = "' .
                    esc_attr(admin_url("admin-ajax.php")) .
                    '";
					</script>';
            }
        }
        // ob_start();
        $plugin_slug = 'recaptcha-for-all';
        $plugin_text_domain = $plugin_slug;
        $notification_url = "https://wpmemory.com/fix-low-memory-limit/";
        $notification_url2 =
            "https://wptoolsplugin.com/site-language-error-can-crash-your-site/";
        $logo = RECAPTCHA_FOR_ALL_IMAGES . '/logo.png';
        $plugin_adm_url = admin_url();
        require_once dirname(__FILE__) . "/includes/install-checkup/class_bill_install.php";
        // ob_end_clean();
    }
}
add_action('wp_loaded', 'recaptcha_for_all_bill_install', 15);

// ago 2024


// testar se é ativo...
function recaptcha_for_all_redirect_login()
{

    if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false && !isset($_COOKIE['recaptcha_cookie'])) {
        wp_redirect(home_url());
    }

    return;
}


if (
    !$recaptcha_for_all_is_admin &&
    !empty($recaptcha_for_all_sitekey) &&
    !empty($recaptcha_for_all_secretkey) &&
    $recaptcha_for_all_login == 'yes' &&
    ($recaptcha_for_all_settings != 'no' || ($recaptcha_for_all_settings == 'no' && !empty($recaptcha_for_all_pages))) &&
    !recaptcha_for_all_isourserver() &&
    !recaptcha_for_all_is_ip_whitelisted($recaptcha_for_all_visitor_ip, $arecaptcha_for_all_ip_whitelist)
) {
    if (!isset($_COOKIE['recaptcha_cookie'])) {
        add_action('login_init', 'recaptcha_for_all_redirect_login');
    }
}

function recaptcha_for_all_verify_r_cookie_before_comment($commentdata)
{
    if (!isset($_COOKIE['recaptcha_cookie'])) {
        wp_die("You do not have permission to post a comment.");
    }
    return $commentdata;
}
if (
    !$recaptcha_for_all_is_admin
    and !recaptcha_for_all_isourserver()
    and !empty($recaptcha_for_all_sitekey)
    and !empty($recaptcha_for_all_secretkey)
    and !recaptcha_for_all_is_ip_whitelisted($recaptcha_for_all_visitor_ip, $arecaptcha_for_all_ip_whitelist
        and $recaptcha_for_all_comment == 'yes')
) {
    if (!isset($_COOKIE['recaptcha_cookie'])) {
        add_filter('preprocess_comment', 'recaptcha_for_all_verify_r_cookie_before_comment');
    }
}

/*
function recaptcha_for_all_enqueue_spinner_style()
{
    wp_enqueue_style('wp-spin');
}
add_action('wp_enqueue_scripts', 'recaptcha_for_all_enqueue_spinner_style');
*/

function recaptcha_for_all_plugin_enqueue_frontend()
{
    wp_register_script("recaptcha_for_all-scripts", RECAPTCHA_FOR_ALLURL . 'js/recaptcha-front-end.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    wp_enqueue_script('recaptcha_for_all-scripts');

    // Carregar o estilo do admin que contém o spinner
    wp_enqueue_style('wp-admin');
    wp_enqueue_style('wp-spin');
    // Registrar seu script
    // wp_enqueue_script('recaptcha_for_all-plugin-script', plugin_dir_url(__FILE__) . 'js/my-plugin-script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'recaptcha_for_all_plugin_enqueue_frontend');

//

function recaptcha_for_all_plugin_load_chat()
{
    if (function_exists('is_admin') && function_exists('current_user_can')) {
        if (is_admin() and current_user_can("manage_options")) {
            // ob_start();
            //debug2();

            if (! class_exists('recaptcha_for_all_plugin_BillChat\ChatPlugin')) {
                require_once dirname(__FILE__) . "/includes/chat/class_bill_chat.php";
            }



            // ob_end_clean();
        }
    }
}
add_action('wp_loaded', 'recaptcha_for_all_plugin_load_chat');
//

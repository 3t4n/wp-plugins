<?php
// Bill Minozzi 2024
if (!defined("ABSPATH")) {
    die();
}

// ===========  only functions ... =============================

// Store the last version in the options table
function recaptcha_for_all_store_last_plugin_version() {
    $last_version = get_option('recaptcha_for_all_last_plugin_version','');
    // Compare with the last version
    if (RECAPTCHA_FOR_ALLVERSION != $last_version) {
        // Plugin has been updated, perform your actions here
        if(empty(get_option('recaptcha_for_all_sitekey', ''))){
            // New Install...
            update_option('recaptcha_for_all_btn_background_color', '#BF4040');
            update_option('recaptcha_for_all_box_position', 'footer');
            update_option('recaptcha_for_all_background_color', '#000000');
            update_option('recaptcha_for_all_image_background', esc_url(RECAPTCHA_FOR_ALLURL.'images/background-plugin2.jpg'));
            update_option('recaptcha_for_all_box_width', '100%');
        }
        else {
            // Not New Install...
            if(!empty(get_option('recaptcha_for_all_custom_image_background',''))){
                update_option("recaptcha_for_all_image_option","custom");
            }
        }
    }
    // Update the last version in the options table
    update_option('recaptcha_for_all_last_plugin_version', RECAPTCHA_FOR_ALLVERSION);

}





function recaptcha_for_all_test_keys_google() {
    $sitekey = sanitize_text_field($_POST['sitekey']);
    $secretkey = sanitize_text_field($_POST['secretkey']);
    $token = sanitize_text_field($_POST['mytoken']);
    $response = wp_remote_get('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $token);

   
    if (is_wp_error($response)) {
        // Tratar erro de requisição
        // echo 'Erro ao fazer a requisição: ' . $response->get_error_message();
        wp_die('0');
    }
    
    // Verificando o código de status da resposta
    $status_code = wp_remote_retrieve_response_code($response);
    if ($status_code != 200) {
        // echo 'Erro na requisição, status code: ' . $status_code;
        wp_die('2');
    }
    
    // Obtendo o corpo da resposta
    $response_body = wp_remote_retrieve_body($response);
    
    if (empty($response_body)) {
        // echo 'Erro: Corpo da resposta está vazio.';
        wp_die('3');
    }
    
    // Decodificando a resposta JSON
    $result = json_decode($response_body, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Tratar erro de decodificação JSON
        // echo 'Erro ao decodificar a resposta JSON: ' . json_last_error_msg();
        wp_die('4');
    }

    // Verificando se a resposta foi bem-sucedida
    if ($result['success']) {
        wp_die('1');

        //echo 'reCAPTCHA verificado com sucesso!';
        // Você pode adicionar outras ações aqui, caso a verificação seja bem-sucedida
    } else {
        // echo 'Falha na verificação do reCAPTCHA!';
        // Você pode adicionar outras ações aqui, caso a verificação falhe
        wp_die('5');
    }
    wp_die('6');

}
add_action('wp_ajax_recaptcha_for_all_test_keys_google', 'recaptcha_for_all_test_keys_google');


function recaptcha_for_all_test_keys() {
    // turnstile...

    $sitekey = sanitize_text_field($_POST['sitekey']);
    $secretkey = sanitize_text_field($_POST['secretkey']);
    $token = sanitize_text_field($_POST['mytoken']);

    //debug2($token);
        $headers = array(
            'body' => [
                'secret' => $secretkey,
                'response' => $token
            ]
        );
          $verify = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', $headers);
          $verify = wp_remote_retrieve_body($verify);
        //debug2($verify);

       // (string) '{"success":false,"error-codes":["missing-input-response"],"messages":[]}'

         if(!$verify){
            wp_die(var_export($verify,true));

            //wp_die('NOT');
         }
         $response = json_decode($verify);
         if($response->success) {
            wp_die('OK');
         }
         else
         wp_die('NOT');
        wp_die('Fail to Validate!');
}
 add_action('wp_ajax_recaptcha_for_all_test_keys', 'recaptcha_for_all_test_keys');

// run the ajax...
if (!function_exists('bill_get_js_errors')) {
    function bill_get_js_errors()
        {
            if (isset($_REQUEST)) {
                if (!isset($_REQUEST['bill_js_error_catched']))
                    die("empty error");
                if (!wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']), 'jquery-bill')) {
                    status_header(406, 'Invalid nonce');
                    die();
                }
                $bill_js_error_catched = sanitize_text_field($_REQUEST['bill_js_error_catched']);
                $bill_js_error_catched = trim($bill_js_error_catched);
                if (!empty($bill_js_error_catched)) {
                    $txt = 'Javascript ' . $bill_js_error_catched;
                    error_log($txt);
                    // send email
                    // bill_php_error($txt);
                    //set_transient( 'sbb_javascript_error', '1', (3600*24) );
                    //add_option( 'sbb_javascript_error', time() );
                    die('OK!!!');
                }
            }
            die('NOT OK!');
        }
}



function recaptcha_is_active()
{
    global $wp_query;
    global $recaptcha_for_all_pages;
    global $arecaptcha_for_all_slugs;
    global $recaptcha_for_all_sitekey;
    global $recaptcha_for_all_secretkey;
    global $recaptcha_active_called;

    if ($recaptcha_active_called) {
        return;
    }
    
    $recaptcha_active = false;

    if(isset($wp_query->post->ID)){
        //debug2($recaptcha_for_all_pages );
        $recaptcha_postID = $wp_query->post->ID;
        //debug2($recaptcha_postID );
        if ($recaptcha_for_all_pages == 'yes_all') {
           $recaptcha_active = true;
        } elseif ($recaptcha_for_all_pages == 'yes_pages' and recaptcha_is_page($recaptcha_postID) ) {
            $recaptcha_active = true;
            //$recaptcha_for_all_pages == 'yes_all';
        } elseif ($recaptcha_for_all_pages == 'yes_posts' and recaptcha_is_post($recaptcha_postID) ) {
            $recaptcha_active = true;
            //$recaptcha_for_all_pages = 'yes_all';
        } elseif ($recaptcha_for_all_pages == 'no') {
            $slug = get_post_field( 'post_name', $recaptcha_postID );
            for($i = 0; $i < count($arecaptcha_for_all_slugs); $i++) {
                if($arecaptcha_for_all_slugs[$i] == $slug ) {
                    $recaptcha_active = true;
                    break;
                }
            }
        }
    }
    else
    {
        if ($recaptcha_for_all_pages == 'yes_all') 
            $recaptcha_active = true;
    }


    // deviation
    if ($recaptcha_active) {
        if (!empty($recaptcha_for_all_sitekey) and !empty($recaptcha_for_all_secretkey)){
            add_filter('template_include', 'recaptcha_for_all_page_template');
        }
    }
    $recaptcha_active_called = true;
    return;
}

function recaptcha_block()
{
    global $wp_query;
    global $recaptcha_for_all_pages;
    global $arecaptcha_for_all_slugs;
    global $recaptcha_for_all_sitekey;
    global $recaptcha_for_all_secretkey;  

    if(empty($recaptcha_for_all_sitekey) or empty($recaptcha_for_all_secretkey))
      return;

    $recaptcha_postID = '';
    if(isset($wp_query->post))
       if(gettype($wp_query->post) == 'object')
          $recaptcha_postID = $wp_query->post->ID;

    $recaptcha_active = false;
    if ($recaptcha_for_all_pages == 'yes_all') {
        $recaptcha_active = true;
    } elseif ($recaptcha_for_all_pages == 'yes_pages' and recaptcha_is_page($recaptcha_postID) ) {
        $recaptcha_active = true;
    } elseif ($recaptcha_for_all_pages == 'yes_posts' and recaptcha_is_post($recaptcha_postID) ) {
        $recaptcha_active = true;
    } elseif ($recaptcha_for_all_pages == 'no') {
        $slug = get_post_field( 'post_name', $recaptcha_postID );
        for($i = 0; $i < count($arecaptcha_for_all_slugs); $i++) {
            if($arecaptcha_for_all_slugs[$i] == $slug ) {
                $recaptcha_active = true;
                break;
            }
        }
    }

    // block
    if ($recaptcha_active) {
            header('HTTP/1.1 403 Forbidden');
            header('Status: 403 Forbidden');
            header('Connection: Close');
            http_response_code(403);
            wp_die("Forbidden");
    }
    
    return;
}



function recaptcha_for_all_memory_init()
{
    add_management_page(
        'reCAPTCHA for all',
        'reCAPTCHA for all',
        'manage_options',
        'recaptcha_for_all_admin_page', // slug
        'recaptcha_for_all_admin_page'
    );
}
function recaptcha_for_all_admin_page()
{
    require_once RECAPTCHA_FOR_ALLPATH . "/dashboard/dashboard-container.php";
}
function recaptcha_for_all_enqueueScripts()
{

    global $wp_query;

    global $recaptcha_for_all_sitekey;
    global $recaptcha_for_all_settings_provider;
    global $recaptcha_for_all_pages;
    global $arecaptcha_for_all_slugs;

    //die(var_export($recaptcha_for_all_settings_provider));

    $recaptcha_for_all_skip = true;

    
    if ($recaptcha_for_all_pages == 'no') {

        
        if(isset($wp_query->post->ID)){
            $recaptcha_postID = $wp_query->post->ID;

            //debug2($recaptcha_postID);


            $slug = get_post_field( 'post_name', $recaptcha_postID );

            //debug2($slug);

            for($i = 0; $i < count($arecaptcha_for_all_slugs); $i++) {
                if($arecaptcha_for_all_slugs[$i] == $slug ) {
                    // $recaptcha_active = true;
                    $recaptcha_for_all_skip = false;
                    //debug2($recaptcha_for_all_skip);
                    break;
                }
            }


        }

        // not enqueue...
        //debug2($recaptcha_for_all_skip);
        if ($recaptcha_for_all_skip )
            return;

    }
    

    //debug2($recaptcha_for_all_settings_provider);
    if( $recaptcha_for_all_settings_provider == 'google'){



      // Construa a URL da API do reCAPTCHA
    $api_url = sprintf('https://www.google.com/recaptcha/api.js?render=%s', $recaptcha_for_all_sitekey);

    // Registre o script do reCAPTCHA
    wp_register_script('recaptcha_for_all', $api_url, array(), '1.0', true);

    // Enfileire o script do reCAPTCHA
    wp_enqueue_script('recaptcha_for_all');


       /*
        // Adicione o código JavaScript para inicializar o reCAPTCHA com logs adicionais
        wp_add_inline_script('recaptcha_for_all', "
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM completamente carregado e analisado.');
                if (typeof grecaptcha !== 'undefined') {
                    console.log('grecaptcha está definido.');
                    grecaptcha.ready(function() {
                        grecaptcha.execute('$recaptcha_for_all_sitekey', {action: 'homepage'}).then(function(token) {
                            console.log('Token recebido:', token);
                            // Enviar o token para o backend ou adicioná-lo a um campo oculto
                            var recaptchaResponse = document.getElementById('g-recaptcha-response');
                            if (recaptchaResponse) {
                                recaptchaResponse.value = token;
                            }
                        });
                    });
                } else {
                    console.log('grecaptcha não está definido!');
                }
            });
        ");
        */
    }
    else {
         wp_enqueue_script("recaptcha_for_all", "https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback", array(), null, 'true');
    }

}
function recaptcha_for_all_add_scripts()
{
    
    //error_log(-'enqueue...');
    wp_enqueue_script("jquery");
    wp_enqueue_style('wp-admin');
    wp_enqueue_style('wp-spin');
    wp_enqueue_media();
    // wp_enqueue_script('wp-pointer');
    wp_register_script("recaptcha_for_all-scripts", RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    wp_enqueue_script('recaptcha_for_all-scripts');


}


function recaptcha_for_all_page_template()
{
    // die(var_export(RECAPTCHA_FOR_ALLPATH));
    recaptcha_for_all_add_stats_challenge(); 
    
    return RECAPTCHA_FOR_ALLPATH . 'template.php';
}
function recaptcha_for_all_register_cookie()
{
    $script_url = RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all_cookie.js';
    wp_register_script('recaptcha_for_all-cookie', $script_url, array(), 1.0, true); //true = footer
    wp_enqueue_script('recaptcha_for_all-cookie');
}
function recaptcha_for_all_maybe_search_engine2()
{
    global $recaptcha_for_all_visitor_ip;
    global $recaptcha_for_all_visitor_ua;
    $ua = $recaptcha_for_all_visitor_ua;
    // crawl-66-249-73-151.googlebot.com
    // msnbot-157-55-39-204.search.msn.com
    if ($ua !== null) 
      $ua = trim(strtolower($ua));
      
    $mysearch = array(
        'googlebot',
        'bingbot',
        'slurp',
        'Twitterbot',
        'facebookexternalhit',
        'WhatsApp'
    );
    for ($i = 0; $i < count($mysearch); $i++) {

        if (is_string($ua) && stripos($ua, $mysearch[$i]) !== false) {

            if (strpos($mysearch[$i], 'facebookexternalhit') !== false) {
                return true;
            }
            if (strpos($mysearch[$i], 'Twitterbot') !== false) {
                return true;
            }
            if (strpos($mysearch[$i], 'WhatsApp') !== false) {
                return true;
            }

            // gethostbyaddr(): Address is not a valid IPv4 or IPv6 address i

            if (filter_var($recaptcha_for_all_visitor_ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE | FILTER_FLAG_NO_PRIV_RANGE))
                $host = esc_attr(strip_tags(gethostbyaddr($recaptcha_for_all_visitor_ip)));
            else
                return false;



            $mysearch1 = array(
                'googlebot',
                'msn.com',
                'slurp'
            );
            $host = esc_attr(trim(strip_tags(gethostbyaddr($recaptcha_for_all_visitor_ip))));
            if ($host == trim($recaptcha_for_all_visitor_ip))
                return false;
            if (is_string($host) && stripos($host, $mysearch1[$i]) !== false) {
                return true;
            }
            
        }
    }
    return false;
}

function recaptcha_for_all_cached_gethostbyaddr($ip) {
    // Gerar chave transitória baseada no endereço IP
    $transient_key = 'recaptcha_for_all_dns_cache_' . md5($ip);
    $dns_cache_ttl = 3600; // 1 hora

    // Verificar se o valor transitório existe e não expirou
    if (false !== ($hostname = get_transient($transient_key))) {
        return $hostname;
    } else {
        // Realizar consulta DNS
        $hostname = gethostbyaddr($ip);

        // Sanitizar hostname para garantir que é seguro para armazenamento
        $hostname = sanitize_text_field($hostname);

        // Armazenar hostname no transitório com TTL
        set_transient($transient_key, $hostname, $dns_cache_ttl);

        return $hostname;
    }
}

function recaptcha_for_all_maybe_search_engine() {
    global $recaptcha_for_all_visitor_ip;
    global $recaptcha_for_all_visitor_ua;

    $ua = $recaptcha_for_all_visitor_ua;

    // Verificação inicial se o User Agent é nulo
    if ($ua === null) {
        return false;
    }

    $ua = trim(strtolower($ua));

    // User Agents de bots para procurar
    $mysearch = array(
        'googlebot',
        'bingbot',
        'slurp',
        'twitterbot',
        'facebookexternalhit',
        'whatsapp'
    );

    // User Agents que requerem retorno imediato
    $immediate_return = array('facebookexternalhit', 'twitterbot', 'whatsapp');

    // Verificar se o User Agent do visitante corresponde aos User Agents de bots
    foreach ($mysearch as $bot) {
        if (is_string($ua) && stripos($ua, $bot) !== false) {
            if (in_array($bot, $immediate_return)) {
                return true;
            }

            // Validar endereço IP do visitante
            if (filter_var($recaptcha_for_all_visitor_ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE | FILTER_FLAG_NO_PRIV_RANGE)) {
                // Obter hostname sanitizado usando consulta DNS em cache
                $host = recaptcha_for_all_cached_gethostbyaddr($recaptcha_for_all_visitor_ip);
                if ($host == trim($recaptcha_for_all_visitor_ip)) {
                    return false;
                }

                // Verificação adicional para hosts válidos
                $mysearch1 = array(
                    'googlebot',
                    'msn.com',
                    'slurp'
                );

                foreach ($mysearch1 as $valid_host) {
                    if (is_string($host) && stripos($host, $valid_host) !== false) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        }
    }
    return false;
}




function recaptcha_for_all_get_ua()
{
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return ""; // mozilla compatible";
    }
    $ua = trim(sanitize_text_field($_SERVER['HTTP_USER_AGENT']));
    //  $ua = recaptcha_for_all_clear_extra($ua);
    return $ua;
}
function recaptcha_for_all_findip()
{
    $ip = '';
    $headers = array(
        'HTTP_CF_CONNECTING_IP', // CloudFlare
        'HTTP_CLIENT_IP', // Bill
        'HTTP_X_REAL_IP', // Bill
        'HTTP_X_FORWARDED', // Bill
        'HTTP_FORWARDED_FOR', // Bill
        'HTTP_FORWARDED', // Bill
        'HTTP_X_CLUSTER_CLIENT_IP', //Bill
        'HTTP_X_FORWARDED_FOR', // Squid and most other forward and reverse proxies
        'REMOTE_ADDR', // Default source of remote IP
    );
    for ($x = 0; $x < 8; $x++) {
        foreach ($headers as $header) {
            /*
            if(!array_key_exists($header, $_SERVER))
            continue;
             */
            if (!isset($_SERVER[$header])) {
                continue;
            }
            $myheader = trim(sanitize_text_field($_SERVER[$header]));
            if (empty($myheader)) {
                continue;
            }
            $ip = trim(sanitize_text_field($_SERVER[$header]));
            if (empty($ip)) {
                continue;
            }
            if (false !== ($comma_index = strpos(sanitize_text_field($_SERVER[$header]), ','))) {
                $ip = substr($ip, 0, $comma_index);
            }
            // First run through. Only accept an IP not in the reserved or private range.
            if ($ip == '127.0.0.1') {
                $ip = '';
                continue;
            }
            if (0 === $x) {
                $ip = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE |
                    FILTER_FLAG_NO_PRIV_RANGE);
            } else {
                $ip = filter_var($ip, FILTER_VALIDATE_IP);
            }
            if (!empty($ip)) {
                break;
            }
        }
        if (!empty($ip)) {
            break;
        }
    }
    if (!empty($ip)) {
        return $ip;
    } else {
        return 'unknow';
    }
}
function recaptcha_for_all_isourserver()
{
    global $recaptcha_for_all_visitor_ip;
    // $server_ip = $_SERVER['REMOTE_ADDR'];
    //$server_ip = sanitize_text_field($_SERVER['SERVER_ADDR']);

    if (isset($_SERVER['SERVER_ADDR'])) {
        $server_ip = sanitize_text_field($_SERVER['SERVER_ADDR']);
    } else {
        return true;
    }


    if ($server_ip == $recaptcha_for_all_visitor_ip)
        return true;
    return false;
}
function recaptcha_for_all_was_activated()
{
    recaptcha_for_all_create_db_stats();
    /*
    $recaptcha_for_all_string_whitelist = implode( PHP_EOL, array_map( 'sanitize_textarea_field', explode(PHP_EOL, get_site_option('recaptcha_for_all_string_whitelist', '')) ) );
    $arecaptcha_for_all_string_whitelist = explode(PHP_EOL, $recaptcha_for_all_string_whitelist);
    if(count($arecaptcha_for_all_string_whitelist) < 1)
       recaptcha_for_all_create_string_whitelist();
       */
}

function recaptcha_for_all_check_string_whitelist()
{


    $recaptcha_for_all_string_whitelist = implode(PHP_EOL, array_map('sanitize_textarea_field', explode(PHP_EOL, get_site_option('recaptcha_for_all_string_whitelist', ''))));
    $arecaptcha_for_all_string_whitelist = explode(PHP_EOL, $recaptcha_for_all_string_whitelist);


    if (count($arecaptcha_for_all_string_whitelist) == 1) {


        if (empty(trim($arecaptcha_for_all_string_whitelist[0]))) {


            recaptcha_for_all_create_string_whitelist();
            return;
        }
    }



    if (count($arecaptcha_for_all_string_whitelist) < 1)
        recaptcha_for_all_create_string_whitelist();
}


// create string
function recaptcha_for_all_create_string_whitelist()
{
    global $arecaptcha_for_all_string_whitelist;
    $mywhitelist = array(
        'DuckDuck',
        'Paypal',
        'Seznam',
        'Stripe',
        'SiteUptime',
        'Yandex'
    );
    $text = '';
    for ($i = 0; $i < count($mywhitelist); $i++) {
        if (!recaptcha_for_all_is_string_whitelisted($mywhitelist[$i], $arecaptcha_for_all_string_whitelist))
            $text .= $mywhitelist[$i] . PHP_EOL;
    }
    if (!add_option('recaptcha_for_all_string_whitelist', $text)) {
        update_option('recaptcha_for_all_string_whitelist', $text);
    }
}
// test string
function recaptcha_for_all_is_string_whitelisted($recaptcha_for_all_ua, $arecaptcha_for_all_string_whitelist)
{
    if (gettype($arecaptcha_for_all_string_whitelist) != 'array')
        return;
    for ($i = 0; $i < count($arecaptcha_for_all_string_whitelist); $i++) {
        if (empty(trim($arecaptcha_for_all_string_whitelist[$i])))
            continue;
        if (strpos($recaptcha_for_all_ua, $arecaptcha_for_all_string_whitelist[$i]) !== false)
            return 1;
    }
    return 0;
}
// test IP
function recaptcha_for_all_is_ip_whitelisted($recaptcha_for_all_visitor_ip, $arecaptcha_for_all_ip_whitelist)
{
    if (gettype($arecaptcha_for_all_ip_whitelist) != 'array')
        return;
    for ($i = 0; $i < count($arecaptcha_for_all_ip_whitelist); $i++) {
        if (trim($arecaptcha_for_all_ip_whitelist[$i]) == trim($recaptcha_for_all_visitor_ip))
            return true;
    }
    return false;
}
function recaptcha_for_all_alert_keys()
{
    echo '<div class="notice notice-warning is-dismissible">';
    echo '<br /><b>';
    esc_attr_e('Site Key and Secret Key are empty! Go to Manage Keys (tab)', 'recaptcha_for_all');
    echo '<br /><br /></div>';
}
function recaptcha_for_all_settings_link($links)
{
    $settings_link = '<a href="tools.php?page=recaptcha_for_all_admin_page">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
/*
function recaptcha_for_all_plugin_act_message()
{
    echo '<div class="updated"><p>';
    $sbb_msg = '<h2>';
    $sbb_msg .= esc_attr__('reCAPTCHA For All was activated!', 'recaptcha-for-all');
    $sbb_msg .= '</h2>';
    $sbb_msg .= '<h3>';
    $sbb_msg .= esc_attr__(
        'For details and help, take a look at reCAPTCHA For All at your left menu => Tools',
        'recaptcha-for-all'
    );
    $sbb_msg .= '<br />';
    $sbb_msg .= '  <a class="button button-primary" href="tools.php?page=recaptcha_for_all_admin_page">';
    $sbb_msg .= esc_attr__('or click here', 'recaptcha-for-all');
    $sbb_msg .= '</a>';
    echo $sbb_msg;
    echo "</p></h3></div>";
}
*/
function recaptcha_for_all_plugin_activate()
{

    // do_action( 'recaptcha_for_all_plugin_act_message' );
    //  add_action('admin_init', 'recaptcha_for_all_plugin_act_message');
    add_option('recaptcha_for_all_was_activated', '1');
    update_option('recaptcha_for_all_was_activated', '1');
}

function recaptcha_is_post($id)
{

    $posts = get_posts();  
    foreach ($posts as $post) {
        if ($post->ID == $id) {
            return true;
        }
    }

    return false;
}


function recaptcha_is_page($id)
{

    $pages = get_pages();  // Obtém todas as páginas
    foreach ($pages as $page) {
        if ($page->ID == $id) {       
            return true;
        }
    }
    return false;
}

/*
function recaptcha_localization_init()
{
    //$path = basename( dirname( __FILE__ ) ) . '/language';
    //$path = plugin_basename(dirname(__FILE__)) . '/language';
    //$path = plugin_dir_path(__FILE__) . 'language/';
    $path = RECAPTCHA_FOR_ALLPATH . 'language/';

    $relative_path = plugin_basename(RECAPTCHA_FOR_ALLPATH) . '/language/';


    // $mofile = $path.'recaptcha-for-all-'.get_locale().'.mo';


    $loaded = load_plugin_textdomain('recaptcha-for-all', false, $relative_path);

    // var_dump($loaded);

    
    if (!$loaded and get_locale() <> 'en_US') {
        if (function_exists('recaptcha_localization_init_fail'))
            add_action('admin_notices', 'recaptcha_localization_init_fail');
    }
    

} 
*/

function recaptcha_localization_init()
{
    $path = RECAPTCHA_FOR_ALLPATH . 'language/';
    $locale = apply_filters('plugin_locale', determine_locale(), 'recaptcha-for-all');

    // Full path of the specific translation file (e.g., es_AR.mo)
    $specific_translation_path = $path . "recaptcha-for-all-$locale.mo";
    $specific_translation_loaded = false;

    // Check if the specific translation file exists and try to load it
    if (file_exists($specific_translation_path)) {
        $specific_translation_loaded = load_textdomain('recaptcha-for-all', $specific_translation_path);
    }

    // List of languages that should have a fallback to a specific locale
    $fallback_locales = [
        'de' => 'de_DE',  // German
        'fr' => 'fr_FR',  // French
        'it' => 'it_IT',  // Italian
        'es' => 'es_ES',  // Spanish
        'pt' => 'pt_BR',  // Portuguese (fallback to Brazil)
        'nl' => 'nl_NL'   // Dutch (fallback to Netherlands)
    ];

    // If the specific translation was not loaded, try to fallback to the generic version
    if (!$specific_translation_loaded) {
        $language = explode('_', $locale)[0];  // Get only the language code, ignoring the country (e.g., es from es_AR)
        
        if (array_key_exists($language, $fallback_locales)) {
            // Full path of the generic fallback translation file (e.g., es_ES.mo)
            $fallback_translation_path = $path . "recaptcha-for-all-{$fallback_locales[$language]}.mo";
            
            // Check if the fallback generic file exists and try to load it
            if (file_exists($fallback_translation_path)) {
                load_textdomain('recaptcha-for-all', $fallback_translation_path);
            }
        }
    }

    // Load the plugin
    load_plugin_textdomain('recaptcha-for-all', false, plugin_basename(RECAPTCHA_FOR_ALLPATH) . '/language/');
}







function recaptcha_localization_init_fail()
{
 

        if(isset($_COOKIE["recaptcha_dismiss"])) {

            $r = update_option('recaptcha_dismiss_language', '1');
            if (!$r) {
                $r = add_option('recaptcha_dismiss_language', '1');
            }

        }

          if(get_option('recaptcha_dismiss_language') == '1')
          return;
          

    //wp_enqueue_script("jquery");
    wp_register_script("recaptcha_for_all-dismiss", RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all_dismiss.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    wp_enqueue_script('recaptcha_for_all-dismiss');

    echo '<div id="recaptcha_an2" class="notice notice-warning is-dismissible">';
    echo '<br />';
    echo 'Recaptcha for all: Could not load the localization file (Language file)';
    echo '<br />';
    echo 'Please, take a look in our site, FAQ page, item => How can i translate this plugin?';
    echo '<br /><br /></div>';
    
    return;

}  
// recaptcha dismissible_notice2
function recaptcha_dismiss_notice2() {
    
    
	$r = update_option('recaptcha_dismiss_language', '1');
	if (!$r) {
		$r = add_option('recaptcha_dismiss_language', '1');
	}
    /*
	if($r)
	  die('OK!!!!!');
	else
	  die('NNNN');
    */
      
}

function recaptcha_ajaxurl()
{
    echo '<script type="text/javascript">
           var ajaxurl = "' . esc_url(admin_url('admin-ajax.php')) . '";
         </script>';
}


// wp_enqueue_script('myHandle','pathToJS');
/*
wp_localize_script(
   'myHandle',
   'ajax_obj',
    array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
);
*/

/////////// Pointers ////////////////


function recaptcha_for_all_activated()
{
	$r = update_option('recaptcha_for_all_was_activated', '1');
	if (!$r) {
		add_option('recaptcha_for_all_was_activated', '1');
	}
	$pointers = get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true);
	$pointers = ''; // str_replace( 'plugins', '', $pointers );
	update_user_meta(get_current_user_id(), 'dismissed_wp_pointers', $pointers);
}
function recaptcha_for_all_dismissible_notice()
{
	$r = update_option('recaptcha_for_all_dismiss', false);
	if (!$r) {
		$r = add_option('recaptcha_for_all_dismiss', false);
	}
	wp_die(esc_attr($r));
}






 
 function recaptcha_for_all_adm_enqueue_scripts2()
 {
    //wp_enqueue_script("jquery");
    //wp_enqueue_media();
    //wp_register_script("recaptcha_for_all-scripts", RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    //wp_enqueue_script('recaptcha_for_all-scripts');

     global $bill_current_screen;
       wp_enqueue_script('wp-pointer');
     //wp_enqueue_script('wp-pointer');


     require_once ABSPATH . 'wp-admin/includes/screen.php';
     $myscreen = get_current_screen();
     $bill_current_screen = $myscreen->id;
     $dismissed_string = get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true);
     // $dismissed = explode(',', (string) get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true));
    // if (in_array('plugins', $dismissed)) {  
     if ( !empty($dismissed_string))  {
         $r = update_option('recaptcha_for_all_was_activated', '0');
         if (!$r) {
             add_option('recaptcha_for_all_was_activated', '0');
         }
         return;
     }
     add_action('admin_print_footer_scripts', 'recaptcha_for_all_admin_print_footer_scripts');

     require_once ABSPATH . 'wp-admin/includes/screen.php';
     $myscreen = get_current_screen();
     $bill_current_screen = $myscreen->id;
     $dismissed_string = get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true);
     // $dismissed = explode(',', (string) get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true));
    // if (in_array('plugins', $dismissed)) {  
     if ( !empty($dismissed_string))  {
         $r = update_option('recaptcha_for_all_was_activated', '0');
         if (!$r) {
             add_option('recaptcha_for_all_was_activated', '0');
         }
         return;
     }
     // die(var_export(__LINE__));
     add_action('admin_print_footer_scripts', 'recaptcha_for_all_admin_print_footer_scripts');
 }

 
 function recaptcha_for_all_admin_print_footer_scripts()
 {
     global $bill_current_screen;
 
     $pointer_content = esc_attr__("Open Recaptcha For All Plugin Here!", "recaptcha-for-all");
     $pointer_content2 = esc_attr__("Just Click Over Tools => Recaptcha For All.","recaptcha-for-all");
 
  ?>
         <script type="text/javascript">
         //<![CDATA[
             // setTimeout( function() { this_pointer.pointer( 'close' ); }, 400 );
        
             jQuery(document).ready( function($) {


            console.log('entrou');


                jQuery('.dashicons-admin-tools').pointer({
              

                 content: '<?php echo '<h3>'.esc_attr($pointer_content).'</h3>'. '<div id="bill-pointer-body">'.esc_attr($pointer_content2).'</div>';?>',
 
                 position: {
                         edge: 'left',
                         align: 'right'
                     },
                 close: function() {
                     // Once the close button is hit
                     jQuery.post( ajaxurl, {
                         pointer: '<?php echo esc_attr($bill_current_screen); ?>',                        action: 'dismiss-wp-pointer'
                         });
                 }
             }).pointer('open');
             jQuery('.wp-pointer').css("margin-left", "100px");
             jQuery('#wp-pointer-0').css("padding", "10px");
       
         });
         //]]>
         </script>
         <?php
 }



function recaptcha_for_all_image_select(){
    if (isset($_POST['recaptcha_image_url'])) {
          error_log(sanitize_text_field($_POST['recaptcha_image_url']));
        if ( ! isset( $_POST['recaptcha_my_plugin_nonce'] )){
          die('-1');
        }
       if( ! wp_verify_nonce( sanitize_text_field($_POST['recaptcha_my_plugin_nonce']), 'recaptcha_my_plugin_action_upd_image' ))  {
         die('-2');
       }
       if ( current_user_can( 'manage_options' ) ) {
            //error_log('User is an admin');
        } else {
            error_log('User is not admin');
            die('-6');
        }
        $recaptcha_image_url =  sanitize_text_field($_POST['recaptcha_image_url']);
        error_log($recaptcha_image_url);
        $r = update_option('recaptcha_for_all_custom_image_background', $recaptcha_image_url);
        if (!$r) {
            $r = add_option('recaptcha_for_all_custom_image_background', $recaptcha_image_url);
        }
        die(esc_attr($r));
    }
    else
      die('0');
 }

 
//


function recaptcha_for_all_adm_enqueue_scripts3()
{

    // test connect...
    global $recaptcha_for_all_settings_provider;

    if(empty($recaptcha_for_all_settings_provider))
       return;


    wp_register_script("recaptcha_for_all-scripts-test", RECAPTCHA_FOR_ALLURL . 'js/recaptcha_for_all_test.js', array('jquery'), RECAPTCHA_FOR_ALLVERSION, true);
    wp_enqueue_script('recaptcha_for_all-scripts-test');
    
    $recaptchaDebug = '1';

    if($recaptcha_for_all_settings_provider != 'google'){
        wp_localize_script( 'recaptcha_for_all-scripts-test', 'recaptcha_my_data3', array(
            'recaptchaDebug' => $recaptchaDebug,
            'provider' => 'turnstile'
        ) );
    }
    else {
        wp_localize_script( 'recaptcha_for_all-scripts-test', 'recaptcha_my_data3', array(
           'recaptchaDebug' => $recaptchaDebug,
           'provider' => 'recaptcha'
         ) );
    }

}






function recaptcha_for_all_custom_plugin_row_meta($links, $file)
{
    if (strpos($file, 'recaptcha.php') !== false) {
        $new_links = array();

        $custom_link = admin_url('tools.php?page=recaptcha_for_all_admin_page&tab=tools');
        $new_links['More'] = '<a href="'.$custom_link.'"><b><font color="#FF6600">Additional Free Tools by the Same Author</font></b></a>';

        $links = array_merge($links, $new_links);
    }
    return $links;
}

// add_action('wp_loaded', 'recaptcha_for_all_load_feedback');
function recaptcha_for_all_add_stats_challenge(){
    global $recaptcha_for_all_visitor_ip;
    global $wpdb;
    $table = $wpdb->prefix . "recaptcha_for_all_stats";

    // Sanitize values if needed
    $ip = sanitize_text_field($recaptcha_for_all_visitor_ip);

    // Insert data into the table
    /*
    $sql = $wpdb->prepare(
        "INSERT INTO $table (ip, date, challenge) VALUES (%s, %s, %d)",
        $ip,
        current_time('mysql'),
        1
    );
    $result = $wpdb->query($sql);
    */

    //$result = $wpdb->query($wpdb->prepare("INSERT INTO $table (ip, date, challenge) VALUES (%s, %s, %d)", $ip, current_time('mysql'), 1));
    $result = $wpdb->query($wpdb->prepare("INSERT INTO %i (ip, date, challenge) VALUES (%s, %s, %d)", $table, $ip, current_time('mysql'), 1));


    // Check for errors
    if ($result === false) 
      recaptcha_for_all_create_db_stats();
}

function recaptcha_for_all_add_stats_ok() {
    global $recaptcha_for_all_visitor_ip;
    global $wpdb;
    $table = $wpdb->prefix . "recaptcha_for_all_stats";

    // Sanitize values if needed
    $ip = sanitize_text_field($recaptcha_for_all_visitor_ip);

    // Insert data into the table
    /*
    $sql = $wpdb->prepare(
        "INSERT INTO $table (ip, date, ok) VALUES (%s, %s, %d)",
        $ip,
        current_time('mysql'),
        1
    );
    $result = $wpdb->query($sql);
    */

    // $result = $wpdb->query($wpdb->prepare("INSERT INTO $table (ip, date, ok) VALUES (%s, %s, %d)", $ip, current_time('mysql'), 1));
    $result = $wpdb->query($wpdb->prepare("INSERT INTO %i (ip, date, ok) VALUES (%s, %s, %d)", $table, $ip, current_time('mysql'), 1));


    // Check for errors
    if ($result === false) 
      recaptcha_for_all_create_db_stats();
}



function recaptcha_for_all_tablexist($table)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "recaptcha_for_all_stats";
    // if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name)
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name)) == $table_name)
        return true;
    else
        return false;
}
//
function recaptcha_for_all_create_db_stats()
{
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    // creates my_tabin database if not exists
    $table = $wpdb->prefix . "recaptcha_for_all_stats"; 
    if (recaptcha_for_all_tablexist($table))
        return;
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE " . $table . " (
        `id` mediumint(9) NOT NULL AUTO_INCREMENT,
        `ip` text NOT NULL,
        `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        `challenge` int(11) NOT NULL,
        `ok` int(11) NOT NULL,
        `url` text NOT NULL,
        `referer` text NOT NULL,  
        `ua` TEXT NOT NULL,
    UNIQUE (`id`)
    ) $charset_collate;";
    dbDelta($sql);
  
    ob_start();
    // $wpdb->query("CREATE INDEX ip ON  `$table` (`ip`(50))");
    $wpdb->query($wpdb->prepare("CREATE INDEX ip ON %i (`ip`(50))", $table));

    ob_end_clean();
}
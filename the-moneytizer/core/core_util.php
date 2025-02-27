<?php

//Handle auto ads tm
if(get_option('themoneytizer_data_auto_ads_txt')==1&&get_option('themoneytizer_data_auto_ads_txt_update')!='updated'){
    
    @unlink(plugin_dir_path(__FILE__).'../../../../ads_tm.php');
    
    $htaccess = file_get_contents(plugin_dir_path(__FILE__).'../../../../.htaccess');

    $k = 1;
    while($k > 0){
        $htaccess = str_replace('#TheMoneytizer_ads_txt_start'.PHP_EOL, '', $htaccess, $k);
        $htaccess = str_replace('#/!\Don\'t place anything before these lines/!\ '.PHP_EOL, '', $htaccess);
        $htaccess = str_replace('#/!\Ne rien mettre avant ces lignes/!\ '.PHP_EOL, '', $htaccess);
        $htaccess = str_replace('RewriteEngine on'.PHP_EOL, '', $htaccess);
        $htaccess = str_replace('RewriteRule ^ads.txt$ ads_tm.php'.PHP_EOL, '', $htaccess);
        $htaccess = str_replace('#TheMoneytizer_ads_txt_end'.PHP_EOL, '', $htaccess);
    }

    $fp = fopen(plugin_dir_path(__FILE__).'../../../../.htaccess', 'w+');
    fwrite($fp, $htaccess);
    fclose($fp);

    $response_ads_tm = file_get_contents(plugins_url('inc/template_ads_tm.txt', __FILE__ ));

    
    $tm_auto = $response_ads_tm;
    $fp = fopen(plugin_dir_path(__FILE__).'../../../../ads_tm.php', 'w+');
    fwrite($fp, $tm_auto);
    fclose($fp);

    $content = file_get_contents(plugin_dir_path(__FILE__).'../../../../.htaccess');

    $htaccess = '#TheMoneytizer_ads_txt_start'.PHP_EOL;
    $htaccess .= '#/!\Don\'t place anything before these lines/!\ '.PHP_EOL;
    $htaccess .= '#/!\Ne rien mettre avant ces lignes/!\ '.PHP_EOL;
    $htaccess .= 'RewriteEngine on'.PHP_EOL;
    $htaccess .= 'RewriteRule ^ads.txt$ ads_tm.php'.PHP_EOL;
    $htaccess .= '#TheMoneytizer_ads_txt_end'.PHP_EOL;
    $htaccess .= $content;
    $fp = fopen(plugin_dir_path(__FILE__).'../../../../.htaccess', 'w+');
    fwrite($fp, $htaccess);
    fclose($fp);

    update_option('themoneytizer_data_auto_ads_txt_update', 'updated');
}

// Const for all format can be autoplaced
define("TAG_AUTOPLACE", array(5, 6, 11, 39, 24, 30, 44, 46, 38, 15, 47));

// Const for all banned format
define('TAG_INACTIVE_FORMAT', array(26, 27, 32, 33, 36, 37, 29));

// Const for allowed adcash format
define('TAG_ADCASH_FORMAT', array(39, 24, 44));

// Const for head autoplace
define("TAG_AUTOPLACE_HEAD", array(11, 39, 24, 30, 44, 46, 38, 15));

// Const for footer autoplace
define("TAG_AUTOPLACE_FOOTER", array(5, 6, 47));

// Const for reserved adcash format
define("TAG_ONLY_ADCASH", array(24, 44));

// Const for no lazy loading
define("TAG_NO_LAZY_LOADING", array(3, 38, 4, 20, 16));

// Const for current version
define('THEMONEYTIZER_PLUGIN_VERSION', '10.0.4');
update_option('themoneytizer_plugin_version', THEMONEYTIZER_PLUGIN_VERSION);

// Determine which sub domain to use
$themoneytizer_wp_lang = get_option('themoneytizer_user_language');
$themoneytizer_sub_domain = array('fr' => 'www', 'en' => 'us', 'us' => 'us', 'es' => 'es', 'pt' => 'pt', 'de' => 'de', 'it' => 'it', 'pl' => 'pl', 'ru' => 'ru');
if($themoneytizer_wp_lang != null && array_key_exists($themoneytizer_wp_lang, $themoneytizer_sub_domain)) {
    $themoneytizer_used_sub_domain = $themoneytizer_sub_domain[$themoneytizer_wp_lang];
} else {
    $themoneytizer_used_sub_domain = 'www';
}

//Const for sub domain
define('THEMONEYTIZER_SUBDOMAIN', $themoneytizer_used_sub_domain);

/*
* Function detecting exclusions for current url
* Return false for no exclusion
*/
function exception_run_lib(){
    $exc = false;
    $exc_list = ['elementor'];
    $url = $_SERVER['REQUEST_URI'];

    foreach($exc_list as $exc_item){
        if(strpos($url, $exc_item) !== false){
            $exc = true;
        }
    }
    return $exc;
}

/*
* Function adding async / defer for enqueued script
*/
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if ( 'cmp' !== $handle ) {
		return $tag;
	}

	//return str_replace( ' src', ' defer src', $tag );
	return str_replace( ' src', ' async src', $tag );
	//return str_replace( ' src', ' async defer src', $tag );

}, 10, 2 );

/*
* Function for post request
*/
function post_req($url, $body, $debug = false){
    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'sslverify' => false,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        'body' => $body,
        'cookies' => array()
    ));
    if(is_wp_error($response)){
        return json_encode(array("status" => 'error',
            "message" => __('Echec de la requête', 'themoneytizer'),
            "payload" => '',
            "timestamp" => time()
        ));
    }
    if(!$debug){
        $response = wp_remote_retrieve_body($response);
    }
    return $response;
}

/*
*
*/
function get_req($url){
    return wp_remote_get($url);
}
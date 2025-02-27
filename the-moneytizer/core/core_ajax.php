<?php

function themoneytizer_check_ads_txt() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'check_ads_txt') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $url='https://www.themoneytizer.com/plugin/check_ads_txt';

    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'sslverify' => false,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        'body' => array("site_id" =>$_POST['siteId']),
        'cookies' => array()
    ));

    $response = wp_remote_retrieve_body($response);
    echo __($response);
}

function themoneytizer_auto_ads_txt($internal_action = null) {
    if(!$internal_action){
        if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'auto_ads_txt') ) {
            return;
        }

        if(!current_user_can( 'manage_options' )){
            return 0;
        }
    }
    
    $response = new stdClass();
    if ($_POST['value']=='auto'||$internal_action=='auto') {
        $site_id = get_option('themoneytizer_site_id');
        $user_id = get_option('themoneytizer_user_id');
        $response_ads_tm = wp_remote_get('https://www.themoneytizer.com/wp_ads_tm.php?site_id='.$site_id."&user_id=".$user_id);
        if (is_array($response_ads_tm)) {
            $tm_auto = $response_ads_tm['body'];
            $fp = fopen('../ads_tm.php', 'w+');
            fwrite($fp, $tm_auto);
            fclose($fp);

            $content = file_get_contents('../.htaccess');

            $htaccess = '#TheMoneytizer_ads_txt_start'.PHP_EOL;
            $htaccess .= '#/!\Don\'t place anything before these lines/!\ '.PHP_EOL;
            $htaccess .= '#/!\Ne rien mettre avant ces lignes/!\ '.PHP_EOL;
            $htaccess .= 'RewriteEngine on'.PHP_EOL;
            $htaccess .= 'RewriteRule ^ads.txt$ ads_tm.php'.PHP_EOL;
            $htaccess .= '#TheMoneytizer_ads_txt_end'.PHP_EOL;
            $htaccess .= $content;
            $fp = fopen('../.htaccess', 'w+');
            fwrite($fp, $htaccess);
            fclose($fp);

            update_option('themoneytizer_data_auto_ads_txt', '1');

            $response->status = 'success';
            $response->message = __('Placement automatique de l\'ads.txt activé avec succès','themoneytizer');
        } else {
            $response->status = 'error';
        }
    } else {
		unlink('../ads_tm.php');

        $htaccess = file_get_contents('../.htaccess');

        $k = 1;
        while($k > 0){
            $htaccess = str_replace('#TheMoneytizer_ads_txt_start'.PHP_EOL, '', $htaccess, $k);
            $htaccess = str_replace('#/!\Don\'t place anything before these lines/!\ '.PHP_EOL, '', $htaccess);
            $htaccess = str_replace('#/!\Ne rien mettre avant ces lignes/!\ '.PHP_EOL, '', $htaccess);
            $htaccess = str_replace('RewriteEngine on'.PHP_EOL, '', $htaccess);
            $htaccess = str_replace('RewriteRule ^ads.txt$ ads_tm.php'.PHP_EOL, '', $htaccess);
            $htaccess = str_replace('#TheMoneytizer_ads_txt_end'.PHP_EOL, '', $htaccess);
        }

        $fp = fopen('../.htaccess', 'w+');
        fwrite($fp, $htaccess);
        fclose($fp);

        update_option('themoneytizer_data_auto_ads_txt', '0');

        $response->status = 'success';
        $response->message = __('Placement automatique de l\'ads.txt désactivé avec succès','themoneytizer');
    }

    if($internal_action==null){
        echo json_encode($response);
    }
}

/*
* Retrieve bills details
*/
function themoneytizer_get_bill_details() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'get_bill_details') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return "0";
    }

    $auth = get_option('themoneytizer_setting_token');
    if(!isset($_POST['bill_id'])){
        $response->status = 'error';
        $response->message = __('Paramètre manquant', 'themoneytizer');
        echo json_encode($response);
        return;
    }

    $body = ['version' => get_option('themoneytizer_plugin_version'), 'local_lang' => get_locale(),'bill_id' => $_POST['bill_id']];
    $url = "https://www.themoneytizer.com/plugin/getGeneratedBill?token=$auth";
    $res = post_req($url, $body);
    if($generated_bill = json_decode($res)){
        if($generated_bill->status == 'success') {
            echo esc_html(__($generated_bill->payload));
            return;
        }
    }
}

/*
* Reset plugin
*/
function themoneytizer_do_reset_plugin() {
    if(!wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'do_reset_plugin') ) {
        return 0;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    /*
    * Update version information
    */
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'action' => 'reset'];
    $url = "https://www.themoneytizer.com/plugin/setWebsiteInformations?token=$auth";
    $res = post_req($url, $body);

    include('inc/inc_delete_options.php');
    echo 'reset';
}

/*
* Retrieve ads.txt from themoneytizer.com
*/
function themoneytizer_get_ads_txt(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'get_ads_txt') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $url = 'https://www.themoneytizer.com/ads.txt?site_id='.get_option('themoneytizer_site_id').'&id='.get_option('themoneytizer_user_id');
    $res = get_req($url);
    if($res['body'] == '' || $res['body'] == null){
        echo json_encode(array('status' => 'error', 'message' => __('Une erreur est survenue', 'themoneytizer'), 'content' => ''));
    } else {
        echo json_encode(array('status' => 'success', 'message' => '', 'content' => $res['body']));
    }
}

/*
* Reactivate Tag
*/
function themoneytizer_do_reactivate_tag(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'do_reactivate_tag') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'tag_id' => $_POST['tagId']];
    $url = "https://www.themoneytizer.com/plugin/reactivateTag?token=$auth";
    $res = post_req($url, $body);
    $res = json_decode($res);
    if($res->status == 'success'){
        $response = array('status' => true, 'message' => __('Réactivation du tag réalisée avec succès.', 'themoneytizer'));
    } else {
        $response = array('status' => false, 'message' => __('Erreur lors de la réactivation du tag.', 'themoneytizer'));
    }
    echo json_encode($response);
}

/*
* Update user info
*/
function themoneytizer_update_profile() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'update_profile') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version'),
    "user_phone"=>$_POST["tel"], "user_adress"=>$_POST["adresse"], "user_city"=>$_POST["ville"], "user_zip"=>$_POST["cp"],
    "user_country"=>$_POST["pays"], "user_type_structure" => $_POST["structure"],
    "user_entreprise"=>$_POST["entreprise"], "user_siren"=>$_POST["siren"], "user_tva"=>$_POST["tva"], "user_denomination"=>$_POST["denomination"]];
    $url = "https://www.themoneytizer.com/plugin/updateUserProfile?token=$auth";
    $res = post_req($url, $body);
    $res = json_decode($res);
    if($res->status == 'success'){
        echo json_encode(array("status" => "success", "message" => __('Informations sauvegardées avec succès !', 'themoneytizer')));
    } else {
        echo json_encode(array("status" => "error", "message" => __('Erreur lors de la sauvegarde !', 'themoneytizer')));
    }
}

/*
* Update auto data
*/
function themoneytizer_update_data_auto(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'update_data_auto') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auto_conf = [];
    $auto_conf = (array)json_decode(get_option('themoneytizer_data_auto'));
    if(gettype($auto_conf)!='array'){
        $auto_conf = [];
    }

    $auto_el['ad_id'] = $_POST['adId'];
    $auto_el['status'] = $_POST['status'];
    $auto_el['tag'] = $_POST['tag'];

    $auto_conf[$_POST['adId']] = $auto_el;
    update_option('themoneytizer_data_auto', json_encode($auto_conf));

    echo json_encode(array('status'=>true,'message'=> __('Configuration placement automatique enregistrée avec succès.', 'themoneytizer')));
}

/*
* Put format on pending
*/
function themoneytizer_put_format_on_pending() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'put_format_on_pending') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'ad_id' => $_POST['adId']];
    $url = "https://www.themoneytizer.com/plugin/pendingTag?token=$auth";
    $res = post_req($url, $body);
    $res = json_decode($res);
    if($res->status == 'success'){
        $response = array('status' => true, 'message' => __('Format demandé avec succès.', 'themoneytizer'));
    } else {
        $response = array('status' => false, 'message' => __('Erreur lors de la demande du format.', 'themoneytizer'));
    }        
    echo json_encode($response);
}

/*
* Generate tag
*/
function themoneytizer_do_generate_tag() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'do_generate_tag') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'ad_id' => $_POST['adId']];
    $url = "https://www.themoneytizer.com/plugin/generateTag?token=$auth";
    $res = post_req($url, $body);
    $res = (array)json_decode($res);
    if($res['status']){
        $response = array('status' => true, 'message' => __('Format demandé avec succès.', 'themoneytizer'), 'translation' => array('label' => __('Placement manuel', 'themoneytizer')));
    } else {
        $response = array('status' => false, 'message' => __('Erreur lors de la demande du format.', 'themoneytizer'));
    }
    echo json_encode($response);
}



/*
* Update billing details
*/
function themoneytizer_update_bank_data() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'update_bank_data') ) {
        return;
    }
    
    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = [
        'version' => get_option('themoneytizer_plugin_version'),
        'bank_name' => $_POST['bank_name'],
        'bank_iban' => $_POST['bank_iban'],
        'bank_bic' => $_POST['bank_bic'],
        'bank_namebank' => $_POST['bank_namebank'],
        'bank_addressbank' => $_POST['bank_addressbank'],
        'bank_countrybank' => $_POST['bank_countrybank'],
        'bank_citybank' => $_POST['bank_citybank'],
        'bank_zipbank' => $_POST['bank_zipbank'],
        'bank_inter_iban' => $_POST['bank_inter_iban'],
        'bank_inter_bic' => $_POST['bank_inter_bic'],
        'bank_inter_namebank' => $_POST['bank_inter_namebank'],
        'bank_inter_addressbank' => $_POST['bank_inter_addressbank'],
        'bank_inter_countrybank' => $_POST['bank_inter_countrybank'],
        'bank_inter_citybank' => $_POST['bank_inter_citybank'],
        'bank_inter_zipbank' => $_POST['bank_inter_zipbank'],
        'paypal_email' => $_POST['paypal_email']
    ];
    $url = "https://www.themoneytizer.com/plugin/updateBankData?token=$auth";
    $res = post_req($url, $body);
    $res = json_decode($res);
    if($res->status=='success'){
        $response = array('status' => true, 'message' => __('Données bancaires mis à jour avec succès.', 'themoneytizer'));
    } else {
        $response = array('status' => false, 'message' => __('Erreur lors de la mise à jour des données bancaires.', 'themoneytizer'));
    }
    echo json_encode($response);
}

/*
* Analyse env of server and notify if redirect is not possible
*/
function themoneytizer_ads_txt_env_notifier(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'ads_txt_env_notifier') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    //Create a function that check if server is apache
    $server_env = $_SERVER['SERVER_SOFTWARE'];
    if(strpos($server_env, 'Apache') !== false){
        $response = array('status' => true, 'message' => '');
    } else {
        $response = array('status' => false, 'message' => __('TRANSLATION_SETTINGS_ENV_NOTIFIER', 'themoneytizer'));
    }
    echo json_encode($response);
}

/*
* Apply conf
*/
function themoneytizer_apply_conf() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'apply_conf') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getSiteActions?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status=='success'){
            $payload = json_encode($res->payload);
            update_option('themoneytizer_site_remote', $payload);  
        }
    }
    $conf_list = (array)json_decode(get_option('themoneytizer_site_remote'));
    foreach($conf_list as $conf){
        switch($conf->swr_type){
            case 'auto_cmp':
                if($conf->swr_status == 1){
                    themoneytizer_auto_cmp('auto');
                } else {
                    themoneytizer_auto_cmp('none');
                }
                break;

            case 'auto_ads_txt':
                if($conf->swr_status == 1){
                    themoneytizer_auto_ads_txt('auto');
                } else {
                    themoneytizer_auto_ads_txt('none');
                }
                break;

            case 'lazy_loading':
                    $lazy_conf = [];
                    $lazy_conf = (array)json_decode(get_option('themoneytizer_data_lazy'));
                    if(gettype($lazy_conf)!='array'){
                        $lazy_conf = [];
                    }
                    $payload = json_decode($conf->swr_data);
                    $lazy_el['ad_id'] = $payload->ad_id;
                    $lazy_el['order'] = $payload->order;
                    $lazy_el['anchor'] = $payload->anchor;
                    $lazy_el['status'] = $payload->status;
                    $lazy_el['frequency'] = $payload->frequency;
                    $lazy_el['tag'] = $payload->tag;
                    $lazy_el['height'] = $payload->height;
                    $lazy_el['width'] = $payload->width;
                    $lazy_el['align'] = $payload->align;
                    $lazy_el['start'] = $payload->start;
                    
                    $lazy_conf[$payload->ad_id] = $lazy_el;
                    
                    update_option('themoneytizer_data_lazy', json_encode($lazy_conf));
                
                break;
            
        }
    }
    $body = ['version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/setSiteActions?token=$auth";
    post_req($url, $body);

    $body = ['version' => get_option('themoneytizer_plugin_version'),
    'auto_cmp' => get_option('themoneytizer_data_auto_cmp'),
    'auto_ads_txt' => get_option('themoneytizer_data_auto_ads_txt'),
    'lazy_loading' => get_option('themoneytizer_data_lazy')];
    $url = "https://www.themoneytizer.com/plugin/setSiteOptionStatus?token=$auth";
    $res = post_req($url, $body);
    $response = array('status' => true, 'message' => __('Configuration appliquée avec succès !', 'themoneytizer'));
    update_option('themoneytizer_site_remote', json_encode(array()));
    echo json_encode($response);
}

function themoneytizer_update_language() {
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'update_language') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    if(isset($_POST['language'])){
        if(!in_array($_POST['language'], ["en", "fr", "it", "ru", "pt", "es", "de"])){
            return 0;
        }
        update_option('themoneytizer_data_language', $_POST['language']);
        $response = array('status' => true);
        echo json_encode($response);
        return;
    }
    $response = array('status' => false);
    echo json_encode($response);
}

add_action('wp_ajax_auto_ads_txt', 'themoneytizer_auto_ads_txt');
add_action('wp_ajax_ads_txt_env_notifier', 'themoneytizer_ads_txt_env_notifier');
add_action('wp_ajax_do_generate_tag', 'themoneytizer_do_generate_tag');
add_action('wp_ajax_put_format_on_pending', 'themoneytizer_put_format_on_pending');
add_action('wp_ajax_update_bank_data', 'themoneytizer_update_bank_data');
add_action('wp_ajax_get_bill_details', 'themoneytizer_get_bill_details');
add_action('wp_ajax_do_reset_plugin', 'themoneytizer_do_reset_plugin');
add_action('wp_ajax_get_ads_txt', 'themoneytizer_get_ads_txt');
add_action('wp_ajax_do_reactivate_tag', 'themoneytizer_do_reactivate_tag');
add_action('wp_ajax_update_data_auto', 'themoneytizer_update_data_auto');
add_action('wp_ajax_apply_conf', 'themoneytizer_apply_conf');
add_action('wp_ajax_update_profile', 'themoneytizer_update_profile');
add_action('wp_ajax_check_ads_txt', 'themoneytizer_check_ads_txt');
add_action('wp_ajax_update_language', 'themoneytizer_update_language');
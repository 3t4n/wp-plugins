<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class wpinfectlitescanner_WPInfectSecurity
{

    public function wpinfectlitescan_db404install() {
        global $wpdb;
        $wpinfectlitescan_db404install_version= '1.0';

        $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
        
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE ".$table_name." (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `filepath` varchar(1024) DEFAULT NULL,
            `filename` varchar(255) DEFAULT NULL,
            `hacktype` varchar(255) DEFAULT NULL,
            `getquery` text,
            `postquery` text,
            `ipv4` varchar(50) DEFAULT NULL,
            `ipv6` varchar(50) DEFAULT NULL,
            `useragent` varchar(1024) DEFAULT NULL,
            `detectcount` int(11) NOT NULL  DEFAULT 1,
            `lastdetect` datetime NOT NULL,
            PRIMARY KEY  (id)
        ) ".$charset_collate.";";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'wpinfectlitescan_nfblock_version', $wpinfectlitescan_db404install_version );
    }
    
    private function cget_home_path(){
        $home    = set_url_scheme( get_option( 'home' ), 'http' );
        $siteurl = set_url_scheme( get_option( 'siteurl' ), 'http' );

        if ( ! empty( $home ) && 0 !== strcasecmp( $home, $siteurl ) ) {
            $wp_path_rel_to_home = str_ireplace( $home, '', $siteurl ); /* $siteurl - $home */
            $pos = strripos( str_replace( '\\', '/', __FILE__ ), trailingslashit( $wp_path_rel_to_home ) );
            $home_path = substr( __FILE__, 0, $pos );
            $home_path = trailingslashit( $home_path );
        } else {
            $home_path = ABSPATH;
        }
        return $home_path;
    }
    
    public function readhtaccess($start,$end){
        
        $home_path = $this->cget_home_path();
        $htaccess_file = $home_path.'.htaccess';
        
        if (! file_exists($htaccess_file)) {
            return false;
        }
        
        if(! wp_is_writable($htaccess_file)){
            @chmod($htaccess_file, 0644);
        }
        
        if(! wp_is_writable($htaccess_file)){
            @chmod($htaccess_file, 0755);
        }
        
        if(! wp_is_writable($htaccess_file)){
            return false;
        }
        
        if (file_exists($htaccess_file)) {
            
            require_once(ABSPATH.'wp-admin/includes/file.php');
            global $wp_filesystem;WP_Filesystem();
            $str = $wp_filesystem->get_contents($htaccess_file);
            $str = str_replace("\r\n","\n",$str);
            $str = str_replace("\r","\n",$str);
            
            $str = trim($str);
            
            $str = preg_replace('/\n\n(\n)+/', "\n\n", $str);
            
            $alllines = explode("\n",$str);
            
            $lines="";
            $readlineok = true;
            foreach ($alllines as $line) {
                  $line=trim($line);
                  if($line==$start){
                    $readlineok=false;
                  }
                  if($readlineok){
                    $lines.=$line."\n"; 
                  }
                  if($line==$end && $readlineok==false){
                    $readlineok=true;
                  }
            }
            
            return $lines;
            
        } else {
            return false;
        }
    }
    
    public function security_detectwpscan($mode){

        if($mode==1){
            
            $lines = $this->readhtaccess("#WPINFECLITEDETECTWPSCAN_START","#WPINFECLITEDETECTWPSCAN_END");
            
            if ($lines !== false) {
                
                $url_string =  parse_url(home_url(), PHP_URL_HOST);
      
                $rules  = "#WPINFECLITEDETECTWPSCAN_START" . "\n"; 
                $rules .= '<IfModule mod_rewrite.c>' . "\n";
                $rules .= 'RewriteEngine On' . "\n";
                
                $rules .= 'RewriteRule ^(.*)wp-content/plugins/(.*)/changelog\.txt$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";

                $rules .= 'RewriteRule ^(.*)wp-tinymce\.js\.gz$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= 'RewriteRule ^(.*)rss-functions\.php$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= 'RewriteRule ^(.*)wp-config\.php\.save$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= 'RewriteRule ^(.*)wp-config\.php\.swp$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= 'RewriteRule ^(.*)\.wp-config\.php\.swp$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= 'RewriteRule ^(.*)wp-content/uploads/dump\.sql$ index.php?wpscan_detected_res_lite=1 [L]' . "\n";
                
                $rules .= '</IfModule>' . "\n";
                
                $rules .= "#WPINFECLITEDETECTWPSCAN_END" . "\n"; 
            
                $home_path = $this->cget_home_path();
                $htaccess_file = $home_path.'.htaccess';
                
                require_once(ABSPATH.'wp-admin/includes/file.php');WP_Filesystem();
                global $wp_filesystem;
                if($wp_filesystem->put_contents($htaccess_file, $rules.$lines)==false){
                    return false;
                }else{
                    return true;
                }

            } else {
                return false;
            }
        
        } else {
            
            $lines = $this->readhtaccess("#WPINFECLITEDETECTWPSCAN_START","#WPINFECLITEDETECTWPSCAN_END");
            if ($lines !== false) {
                
                $home_path = $this->cget_home_path();
                $htaccess_file = $home_path.'.htaccess';
                
                require_once(ABSPATH.'wp-admin/includes/file.php');WP_Filesystem();
                global $wp_filesystem;
                if($wp_filesystem->put_contents($htaccess_file, $lines)===false){
                    return false;
                }else{
                    return true;
                }

            } else {
                return false;
            }
        }
    }
    
    
    public function security_ipblock($blockips){
        
        $lines = $this->readhtaccess("#WPINFECLITEBLOCKIP_START","#WPINFECLITEBLOCKIP_END");
            
        if ($lines !== false) {
            
            if(empty($blockips)){
                $lines = $this->readhtaccess("#WPINFECLITEBLOCKIP_START","#WPINFECLITEBLOCKIP_END");
                if ($lines !== false) {
                    
                    $home_path = $this->cget_home_path();
                    $htaccess_file = $home_path.'.htaccess';
                    
                    require_once(ABSPATH.'wp-admin/includes/file.php');WP_Filesystem();
                    global $wp_filesystem;
                    if($wp_filesystem->put_contents($htaccess_file, $lines)===false){
                        return false;
                    }else{
                        return true;
                    }

                } else {
                    return false;
                }
            }else{
            
                $url_string =  parse_url(home_url(), PHP_URL_HOST);
                $rules  = "#WPINFECLITEBLOCKIP_START" . "\n"; 
               
                $rules .= '<IfModule mod_rewrite.c>' . "\n";
                $rules .= 'RewriteEngine on' . "\n";
                
                $blockips = unserialize($blockips);
                foreach( $blockips as $ip) {
                    $ip = $ip[1];
                    if (filter_var($ip, FILTER_VALIDATE_IP)) {
                        $iptxt = "RewriteCond %{REMOTE_ADDR} ^".str_replace(".","\.",$ip)."$ [OR]";
                        $rules .= $iptxt . "\n";
                    }
                }
                
                $rules .= 'RewriteCond %{QUERY_STRING} tehry64yeujwi7648i2kjdyrujt78k23p' . "\n";
                $rules .= 'RewriteRule ^(.*)$ - [F,L]' . "\n";
                $rules .= '</IfModule>' . "\n";
                    
                $rules .= "#WPINFECLITEBLOCKIP_END" . "\n"; 
            
                $home_path = $this->cget_home_path();
                $htaccess_file = $home_path.'.htaccess';
                
                require_once(ABSPATH.'wp-admin/includes/file.php');WP_Filesystem();
                global $wp_filesystem;
                if($wp_filesystem->put_contents($htaccess_file, $rules.$lines)==false){
                    return false;
                }else{
                    return true;
                }
            }

        } else {
            return false;
        }
    }
    
    public function wpinfectlitescan_check_hackmonitor_canenable(){
        
        $pass = array('123456','123456789','picture1','password','12345678','111111','123123','12345','1234567890','senha','1234567','qwerty','abc123','Million2','000000','1234','iloveyou','aaron431','password1','qqww1122','123','omgpop','123321','654321','qwertyuiop','qwer123456','123456a','a123456','666666','asdfghjkl','ashley','987654321','unknown','zxcvbnm','112233','chatbooks','20100728','123123123','princess','jacket025','evite','123abc','123qwe','sunshine','121212','dragon','1q2w3e4r','5201314','159753','123456789','pokemon','qwerty123','Bangbang123','jobandtalent','monkey','1qaz2wsx','abcd1234','default','aaaaaa','soccer','123654','ohmnamah23','12345678910','zing','shadow','102030','11111111','asdfgh','147258369','qazwsx','qwe123','michael','football','baseball','1q2w3e4r5t','party','daniel','asdasd','222222','myspace1','asd123','555555','a123456789','888888','7777777','fuckyou','1234qwer','superman','147258','999999','159357','love123','tigger','purple','samantha','charlie','babygirl','88888888','jordan23','789456123');
        
        global $wpdb;
        $p = $wpdb->prefix;
        $getTest = "SELECT * FROM ".$p."users left join ".$p."usermeta ON ".$p."users.ID = ".$p."usermeta.user_id where ".$p."usermeta.meta_key = '".$p."capabilities' and (meta_value like '%administrator%' or meta_value like '%editor%') order by ID ASC";
        
        $users = $wpdb->get_results($getTest);
        foreach($users as $user){
            $user_pass = $user->user_pass;
            foreach($pass as $pas){
               if(wp_check_password(trim($pas),$user_pass)){
                   return false;
                   break;
               }
            }
        }
        
        return true;
    }
    
}

function wpinfectlitescan_get_ip()
{
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    if($ip!=false){
        if(inet_pton($ip) === false){
            $ip=false;
        }
    }
    return $ip;
}

function wpinfectlitescan_deleteolddata(){
    
    $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor_logcount","infinity");
    
    if($wpinfectlitescanner_hackmonitor != "infinity"){
        
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
        
        $query = $wpdb->prepare("SELECT * FROM `%1s` ORDER BY lastdetect DESC limit %d",$table_name,$wpinfectlitescanner_hackmonitor);
        $resi = $wpdb->get_results($query,'ARRAY_A');
        
        if($wpdb->num_rows==$wpinfectlitescanner_hackmonitor){
           $lastrow = $resi[$wpinfectlitescanner_hackmonitor-1];
           $lastdetect = $lastrow['lastdetect'];
           $query = $wpdb->prepare("DELETE FROM `%1s` WHERE lastdetect <= '%s'",$table_name,$lastdetect);
           $wpdb->get_results($query);
        }
    }
}

function wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,$hacktype){
    global $wpdb;
                    
    $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
    $query = $wpdb->prepare("SHOW TABLES LIKE %s",$table_name);
    if($wpdb->get_var($query) != $table_name) {
        $secfunc=new wpinfectlitescanner_WPInfectSecurity();
        $secfunc->wpinfectlitescan_db404install();
    }
    
    if($wpdb->get_var($query) == $table_name) {
        if($ipv4 != ""){
            $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE filepath = '%s' and filename = '%s' and getquery='%s' and postquery='%s' and ipv4 = '%s'",$table_name,$filepath,$filename,$getval,$postval,$ipv4);
            $resi = $wpdb->get_results($query);
        }else{
            $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE filepath = '%s' and filename = '%s' and getquery='%s' and postquery='%s' and ipv6 = '%s'",$table_name,$filepath,$filename,$getval,$postval,$ipv6);
            $resi = $wpdb->get_results($query);
        }
       
        if($resi){
            foreach( $resi as $key => $row) {
                $dateyhisday = date_i18n("Y-m-d H:i:s");
                $sql = $wpdb->prepare("UPDATE `%1s` SET `lastdetect` = '%s', detectcount = detectcount+1 WHERE `id` = %d;",$table_name,$dateyhisday,$row->id);
                $wpdb->get_results($sql);
                break;
            }
        }else{

            wpinfectlitescan_deleteolddata();
            
            $dateyhisday = date_i18n("Y-m-d H:i:s");
            $sql = $wpdb->prepare("INSERT INTO `%1s` (`id`, `filepath`, `filename`, `hacktype`, `getquery` , `postquery`, `ipv4`, `ipv6`, `useragent`, `lastdetect`) VALUES (NULL, '%s', '%s' , '%s', '%s', '%s', '%s', '%s', '%s', '%s');",$table_name,$filepath,$filename,$hacktype,$getval,$postval,$ipv4,$ipv6,$useragent,$dateyhisday);
            $wpdb->get_results($sql);
            
        }
    }
}

function wpinfectlitescan_security_on_404(){
    
    $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor");
    if( is_404() && ! is_user_logged_in() && $wpinfectlitescanner_hackmonitor==1 ){
        
        $requrl = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $phpfilename = explode("?",basename($requrl))[0];
        $path_parts = pathinfo($phpfilename);
        
        if(isset($path_parts['extension']) && strpos($requrl,'phpmyadmin') === false){
            if( $path_parts['extension']=='php' && strpos($_SERVER['REQUEST_URI'],"wp-") !== false){
                
                if(!empty($_GET) || !empty($_POST)){
                    
                    $ispost = 0;
                    if(isset($_POST)){
                        $ispost = 1;
                    }
                    $ip = wpinfectlitescan_get_ip();
                    $useragent = $_SERVER['HTTP_USER_AGENT'];
                    
                    $allpath = explode("?",$_SERVER['REQUEST_URI']);
                    $allpath = $allpath[0];
                    $path_parts = pathinfo($allpath);
                    $filepath = $path_parts['dirname']."/";
                    $filename = $path_parts['basename'];
                    
                    $perceurl = parse_url($requrl);
                    $mydomain = $perceurl["host"];
                   
                    $ipv4 = "";
                    $ipv6 = "";
                    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        $ipv6=$ip;
                    }else{
                        $ipv4=$ip;
                        if(! filter_var($ipv4, FILTER_VALIDATE_IP)){
                            return;
                        }
                    }
                    
                    $postval = "";
                    if(! empty($_POST)){
                        $postval=json_encode($_POST);
                    }
                    $getval = "";
                    if(! empty($_GET)){
                        $getval=json_encode($_GET);
                    }
                    
                    wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,"Vulnerability hack");
                }
            }
        }
    }
}
add_action( 'template_redirect', 'wpinfectlitescan_security_on_404' );

function wpinfectlitescan_set_last_login($login) {
    $user = get_userdatabylogin($login);
    $ip = wpinfectlitescan_get_ip();
    if($ip){
        update_usermeta( $user->ID, 'wpinfectlitescan_last_login', $ip);
    }
}
add_action('wp_login', 'wpinfectlitescan_set_last_login');

function wpinfectlitescan_get_was_login() {
    $ip = wpinfectlitescan_get_ip();
    if($ip){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE meta_key LIKE 'wpinfectlitescan_last_login' and meta_value LIKE %s",$wpdb->usermeta,$ip);
        $res = $wpdb->get_results($query);
        if($res){
            return true;
        }else{
            return false;
        }
    }else{
        return true;
    }
}

function wpinfectlitescan_security_on_adminajax() {
    
    $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor");
    
    if(! is_user_logged_in() && $wpinfectlitescanner_hackmonitor==1){
        
        $requrl = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($requrl,'wp-admin') !== false && strpos($requrl,'admin-ajax.php') !== false){
            
            $ignoreactionlist = array("heartbeat","update_views_ajax","dotorg_communication","ids","get_attachment_comments","fetch_entry_footer_content","ave_publishPost","st_toc_track_click","aurora_heatmap","inc2734_wp_share_buttons_hatena","inc2734_wp_share_buttons_twitter","st_load_more_get_kanren_posts","views_count_up","wp-remove-post-lock","remove_item_from_cart","show_product_price_ajax","st_load_more_get_tax_group_posts","oembed-cache","keni_sns_fb","get_fair_data_load_more","fit_update_post_view_data","fit_set_post_views","fit_update_post_views_by_period","get_ajax_news_post","blc_work","inc2734_wp_share_buttons_facebook","background_updates","regenthumb_background","WP_FullCalendar","ai1wm_import","wc_square_credit_card_log_js_data","send_message","update-plugin","fit_add_rank_widget","calendar","evolve_dynamic_css","wpuf_ajax_login","wpmi-request-cache","primaryfilter","xo_event_calendar_month","mailpoet","entry_views","activity_filter","wpp_update","favorites_array","mx_output_ajax_widget","swell_ct_btn_data","health-check-site-status-result","vc_get_vc_grid_data","load-filter","process_simple_like","get_events_mine","presscore_template_ajax","query-attachments","ta_link","dashboard-widgets","get-community-events","swell_ct_ad_pv","swell_pv_count","ajax_create_history_list","doing_wp_cron","kaswaraPostShorcodesSearch","wpt_widget_content","load_fragment","sow_carousel_load","engage_dynamic_css","wq-custom","toggle_like","blc_dashboard_status","showbiz_show_image","thk_sns_cache","get_total","get_social_share_count","icwp-wpsf","tsnc_pv_count","swell_ct_ad_imp","cartflows_save_cart_abandonment_data","exportCf7Styles","randoseru_comment_ajax","xoo_wsc_refresh_fragments","wpsc_tickets","tour_get_sp","brizy_submit_form","exp_get_sp","view_seach_match_count","get_adaptive_async","workscout_incremental_jobs_suggest","pochipp_pro_ct_cv",
            "ajax_create_item_lists","elementor_pro_forms_send_form","post-views","get-post-data","handle_table_data","tcd_footer_cta_impression","favorites_favorite","sbi_resized_images_submit","wpfc_qtip_content","helpie_faq_click_counter","thk_sns_real","check_wsal","backwpup_working","registRedirectUrl","asp_pp_confirm_pi","asp_pp_create_pi" , "get_gellery_items" , "td_ajax_fb_login" , "td_ajax_fb_login_user123" , "user_verification_send_otp" , "share_counter" , "wp_video_gallery_ajax_add_single_youtube" , "postlist-loadmore" , "setcookielike" , "arplite_insert_plan_id" , "ajax_set_cookie_by_js" , "tb_generate_on_fly" , "get-achievements", "generate-password","shareaholic_debug_info","get_hotel_by_area_tag","get_shop_mail","answerd_ticket","edgt_core_album_playlist","extensive_vc_init_shortcode_pagination","get_listings_by_author","slimtrack","revolution-slider_show_image","init","elementor_menu_cart_fragments","my_ajax_action","shield_action","pvc-check-post", "kernel");
            
            $action = ( isset( $_REQUEST['action'] ) ) ? $_REQUEST['action'] : '';
            
            $useragent = $_SERVER['HTTP_USER_AGENT'];     
            $allpath = explode("?",$_SERVER['REQUEST_URI']);
            $allpath = $allpath[0];
            $path_parts = pathinfo($allpath);
            $filepath = $path_parts['dirname']."/";
            $filename = $path_parts['basename'];
            $perceurl = parse_url($requrl);
            $mydomain = $perceurl["host"];
                    
            if (! empty( $action ) && in_array($action,$ignoreactionlist, true)==false && strpos($useragent,$mydomain) === false ) {
                $hasaction = false;
                if ( has_action( "wp_ajax_{$action}" ) ) {
                    $hasaction = true;
                }
                if ( has_action( "wp_ajax_nopriv_{$action}" ) ){
                    $hasaction = true;
                }
                $action2 = str_replace( '-', '_', $action );
                if ( has_action( "wp_ajax_{$action2}" ) ) {
                    $hasaction = true;
                }
                if ( has_action( "wp_ajax_nopriv_{$action2}" ) ){
                    $hasaction = true;
                }
                if($hasaction==false && wpinfectlitescan_get_was_login()==false){
                    
                    $ispost = 0;
                    if(isset($_POST)){
                        $ispost = 1;
                    }
                    $ip = wpinfectlitescan_get_ip();
                   
                    $ipv4 = "";
                    $ipv6 = "";
                    
                    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        $ipv6=$ip;
                    }else{
                        $ipv4=$ip;
                        if(! filter_var($ipv4, FILTER_VALIDATE_IP)){
                            return;
                        }
                    }
                    
                    $postval = "";
                    if(! empty($_POST)){
                        $postval=json_encode($_POST);
                    }
                    $getval = "";
                    if(! empty($_GET)){
                        $getval=json_encode($_GET);
                    }
                    
                    wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,"Ajax action vulnerability hack");
                    
                }
            }
        }
    }
}
add_action( 'plugins_loaded', 'wpinfectlitescan_security_on_adminajax' );

function wpinfectlitescan_security_nowpscan(){
   $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor");
    
   if(! is_user_logged_in() && $wpinfectlitescanner_hackmonitor==1){

        
        if (
            isset($_GET['wpscan_detected_res_lite']) || 
            (!empty($_SERVER['HTTP_USER_AGENT']) && preg_match('/WPScan/i', $_SERVER['HTTP_USER_AGENT'])) 
        ) {
            
            $allpath = explode("?",$_SERVER['REQUEST_URI']);
            $allpath = $allpath[0];
            $path_parts = pathinfo($allpath);
            $filepath = esc_html($path_parts['dirname']."/");
            $filename = esc_html($path_parts['basename']);
            
            $useragent = esc_html($_SERVER['HTTP_USER_AGENT']); 
            
            $ip = wpinfectlitescan_get_ip();
                   
            $ipv4 = "";
            $ipv6 = "";
            
            if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $ipv6=$ip;
            }else{
                $ipv4=$ip;
                if(! filter_var($ipv4, FILTER_VALIDATE_IP)){
                    return;
                }
            }
            
            if (isset($_GET['wpscan_detected_res_lite'])){
                unset($_GET['wpscan_detected_res_lite']);
            }
            
            $postval = "";
            if(! empty($_POST)){
                $postval=json_encode($_POST);
            }
            $getval = "";
            if(! empty($_GET)){
                $getval=json_encode($_GET);
            }
            
            global $wpdb;
                    
            $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
            $resi = true;
            $query = $wpdb->prepare("SHOW TABLES LIKE %s",$table_name);
            if($wpdb->get_var($query) == $table_name) {
                if($ipv4!=""){
                    $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'WPSCAN' and ipv4 = %s",$table_name,$ipv4);
                    $resi = $wpdb->get_results($query);
                }else{
                    $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'WPSCAN' and ipv6 = %s",$table_name,$ipv6);
                    $resi = $wpdb->get_results($query);
                }
            }
           
            if($resi){
                foreach( $resi as $key => $row) {
                    $dateyhisday = date_i18n("Y-m-d H:i:s");
                    $sql = $wpdb->prepare("UPDATE `%1s` SET `lastdetect` = %s, detectcount = detectcount+1 WHERE `id` = %d;",$table_name,$dateyhisday,$row->id);
                    $wpdb->get_results($sql);
                    break;
                }
            }else{
                    
                wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,"WPSCAN");
            
            }
        }
   }
          
}
add_action( 'init', 'wpinfectlitescan_security_nowpscan' );

function wpinfectlitescan_security_bruteforthcheck($username, $password ) {
    
    if (!empty($username) && !empty($password)) {
        
        $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor");
        if($wpinfectlitescanner_hackmonitor==1){
            
            $commonpass = array('123456','123456789','picture1','password','12345678','111111','123123','12345','1234567890','senha','1234567','qwerty','abc123','Million2','000000','1234','iloveyou','aaron431','password1','qqww1122','123','omgpop','123321','654321','qwertyuiop','qwer123456','123456a','a123456','666666','asdfghjkl','ashley','987654321','unknown','zxcvbnm','112233','chatbooks','20100728','123123123','princess','jacket025','evite','123abc','123qwe','sunshine','121212','dragon','1q2w3e4r','5201314','159753','123456789','pokemon','qwerty123','Bangbang123','jobandtalent','monkey','1qaz2wsx','abcd1234','default','aaaaaa','soccer','123654','ohmnamah23','12345678910','zing','shadow','102030','11111111','asdfgh','147258369','qazwsx','qwe123','michael','football','baseball','1q2w3e4r5t','party','daniel','asdasd','222222','myspace1','asd123','555555','a123456789','888888','7777777','fuckyou','1234qwer','superman','147258','999999','159357','love123','tigger','purple','samantha','charlie','babygirl','88888888','jordan23','789456123');
            
            if($username==$password || in_array($password,$commonpass)){
                
                $allpath = explode("?",$_SERVER['REQUEST_URI']);
                $allpath = $allpath[0];
                $path_parts = pathinfo($allpath);
                $filepath = esc_html($path_parts['dirname']."/");
                $filename = esc_html($path_parts['basename']);
                
                $useragent = esc_html($_SERVER['HTTP_USER_AGENT']); 
                
                $ip = wpinfectlitescan_get_ip();
                       
                $ipv4 = "";
                $ipv6 = "";
                
                if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                    $ipv6=$ip;
                }else{
                    $ipv4=$ip;
                    if(! filter_var($ipv4, FILTER_VALIDATE_IP)){
                        return;
                    }
                }
                
                $postval = "";
                if(! empty($_POST)){
                    $postval=json_encode($_POST);
                }
                $getval = "";
                if(! empty($_GET)){
                    $getval=json_encode($_GET);
                }
                
                global $wpdb;
                        
                $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
                $resi = true;
                $query = $wpdb->prepare("SHOW TABLES LIKE %s",$table_name);
                if($wpdb->get_var($query) == $table_name) {
                    if($ipv4!=""){
                        $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'Brute force attack' and ipv4 = %s",$table_name,$ipv4);
                        $resi = $wpdb->get_results($query);
                    }else{
                        $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'Brute force attack' and ipv6 = %s",$table_name,$ipv6);
                        $resi = $wpdb->get_results($query);
                    }
                }
               
                if($resi){
                    foreach( $resi as $key => $row) {
                        $dateyhisday = date_i18n("Y-m-d H:i:s");
                        $sql = $wpdb->prepare("UPDATE `%1s` SET `lastdetect` = %s, detectcount = detectcount+1 WHERE `id` = %d;",$table_name,$dateyhisday,$row->id);
                        $wpdb->get_results($sql);
                        break;
                    }
                }else{
                        
                    wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,"Brute force attack");
                
                }
            }
        }
        
    }
}
add_action('wp_authenticate', 'wpinfectlitescan_security_bruteforthcheck', 30, 2);

///Todo XMLRPC Brute forth
function wpinfectlitescan_security_xmlrpcbruteforthcheck( $filter ) {
    
    if (!empty($_POST)) {
        
        $wpinfectlitescanner_hackmonitor = get_option("wpinfectlitescanner_hackmonitor");
        if($wpinfectlitescanner_hackmonitor==1){
            
            $commonpass = array('123456','123456789','picture1','password','12345678','111111','123123','12345','1234567890','senha','1234567','qwerty','abc123','Million2','000000','1234','iloveyou','aaron431','password1','qqww1122','123','omgpop','123321','654321','qwertyuiop','qwer123456','123456a','a123456','666666','asdfghjkl','ashley','987654321','unknown','zxcvbnm','112233','chatbooks','20100728','123123123','princess','jacket025','evite','123abc','123qwe','sunshine','121212','dragon','1q2w3e4r','5201314','159753','123456789','pokemon','qwerty123','Bangbang123','jobandtalent','monkey','1qaz2wsx','abcd1234','default','aaaaaa','soccer','123654','ohmnamah23','12345678910','zing','shadow','102030','11111111','asdfgh','147258369','qazwsx','qwe123','michael','football','baseball','1q2w3e4r5t','party','daniel','asdasd','222222','myspace1','asd123','555555','a123456789','888888','7777777','fuckyou','1234qwer','superman','147258','999999','159357','love123','tigger','purple','samantha','charlie','babygirl','88888888','jordan23','789456123');
            
            $reqtext = implode("",$_POST);
            
            $matched = false;
            if(strpos($reqtext,'<methodName>wp.') !== false){
                foreach($commonpass as $c){
                    if(strpos($reqtext,'<string>'.$c.'</string>') !== false){
                        $matched = true;
                        break;
                    }
                }
            }
            
            if($matched){
                
                $allpath = explode("?",$_SERVER['REQUEST_URI']);
                $allpath = $allpath[0];
                $path_parts = pathinfo($allpath);
                $filepath = esc_html($path_parts['dirname']."/");
                $filename = esc_html($path_parts['basename']);
                
                $useragent = esc_html($_SERVER['HTTP_USER_AGENT']); 
                
                $ip = wpinfectlitescan_get_ip();
                       
                $ipv4 = "";
                $ipv6 = "";
                
                if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                    $ipv6=$ip;
                }else{
                    $ipv4=$ip;
                    if(! filter_var($ipv4, FILTER_VALIDATE_IP)){
                        return;
                    }
                }
                
                $postval = "";
                if(! empty($_POST)){
                    $postval=json_encode($_POST);
                }
                $getval = "";
                if(! empty($_GET)){
                    $getval=json_encode($_GET);
                }
                
                global $wpdb;
                        
                $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
                $resi = true;
                $query = $wpdb->prepare("SHOW TABLES LIKE %s",$table_name);
                if($wpdb->get_var($query) == $table_name) {
                    if($ipv4!=""){
                        $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'XMLRPC brute force attack' and ipv4 = %s",$table_name,$ipv4);
                        $resi = $wpdb->get_results($query);
                    }else{
                        $query = $wpdb->prepare("SELECT * FROM `%1s` WHERE hacktype = 'XMLRPC brute force attack' and ipv6 = %s",$table_name,$ipv6);
                        $resi = $wpdb->get_results($query);
                    }
                }
               
                if($resi){
                    foreach( $resi as $key => $row) {
                        $dateyhisday = date_i18n("Y-m-d H:i:s");
                        $sql = $wpdb->prepare("UPDATE `%1s` SET `lastdetect` = %s, detectcount = detectcount+1 WHERE `id` = %d;",$table_name,$dateyhisday,$row->id);
                        $wpdb->get_results($sql);
                        break;
                    }
                }else{
                        
                    wpinfectlitescan_loghuck($ipv4,$filepath,$filename,$getval,$postval,$ipv6,$useragent,"XMLRPC brute force attack");
                
                }
            }
        }
        
    }
    return $filter;
};

add_filter( 'xmlrpc_enabled', 'wpinfectlitescan_security_xmlrpcbruteforthcheck' );
?>
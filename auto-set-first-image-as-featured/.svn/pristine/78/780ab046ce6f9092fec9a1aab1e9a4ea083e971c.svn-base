<?php
/*
Plugin URI: https://wordpress.org/plugins/auto-set-first-image-as-featured/
Author: BehroozDante
Author URI: https://BehroozDante.ir/
Email: behroozdante@gmail.com
*/
if (!defined('ABSPATH')) {
    exit;
}


function function_is_BusyBox_IsName_OptionAFBFContent($content)
{
    
    global $post;
    
    $is_BusyBox_IsName_OptionBeforeContent_MetaBox = get_post_meta($post->ID, 'is_BusyBox_IsName_OptionBeforeContent_MetaBox', true);
    $is_BusyBox_IsName_OptionBeforeContent         = get_option('is_BusyBox_IsName_OptionBeforeContent');
    
    
    $is_BusyBox_IsName_OptionAfterContent_MetaBox = get_post_meta($post->ID, 'is_BusyBox_IsName_OptionAfterContent_MetaBox', true);
    $is_BusyBox_IsName_OptionAfterContent         = get_option('is_BusyBox_IsName_OptionAfterContent');
    
 
    
    if ($is_BusyBox_IsName_OptionBeforeContent_MetaBox){
            
            $before_content_input = $is_BusyBox_IsName_OptionBeforeContent_MetaBox;
            
    }else{
        
        
        if ($is_BusyBox_IsName_OptionBeforeContent){
            $before_content_input = $is_BusyBox_IsName_OptionBeforeContent;
        }else{
            $before_content_input = null;
        }
        
        $before_content_input = null;
    }


    if ($is_BusyBox_IsName_OptionAfterContent_MetaBox){
            
            $after_content_input = $is_BusyBox_IsName_OptionAfterContent_MetaBox;
            
    }else{
        
        
        if ($is_BusyBox_IsName_OptionAfterContent){
            $after_content_input = $is_BusyBox_IsName_OptionAfterContent;
        }else{
            $after_content_input = null;
        }
        
        $after_content_input = null;
    }
    
 
  
    
    if (is_single()) {
        $fullcontent   = $before_content_input . $content . $after_content_input;
    } else {
        $fullcontent = $content;
    }
        return $fullcontent;
}

add_filter('the_content', 'function_is_BusyBox_IsName_OptionAFBFContent');




 
function function_is_BusyBox_IsName_CleanViews_Display($content)
{
    
    global $post;
    
 
    $is_BusyBox_IsName_CleanViewes_displayBeforePost         = get_option('is_BusyBox_IsName_CleanViewes_displayBeforePost');
    
    
    $is_BusyBox_IsName_CleanViewes_displayAfterPost         = get_option('is_BusyBox_IsName_CleanViewes_displayAfterPost');
 
    if ($is_BusyBox_IsName_CleanViewes_displayBeforePost){
            
            $before_content_input = is_BusyBox_IsName_getPostViews($post->ID);
            
    }else{
         $before_content_input = null;
    }

    if ($is_BusyBox_IsName_CleanViewes_displayAfterPost){
            
            $after_content_input = is_BusyBox_IsName_getPostViews($post->ID);
            
    }else{
     $after_content_input = null;
            
    }
    
 
    
    if (is_single()) {
        $fullcontent   = $before_content_input . $content . $after_content_input;
    } else {
        $fullcontent = $content;
    }
        return $fullcontent;
}

if (get_option('is_BusyBox_IsName_CleanViewes_displayBeforePost') || get_option('is_BusyBox_IsName_CleanViewes_displayAfterPost') ){
add_filter('the_content', 'function_is_BusyBox_IsName_CleanViews_Display');
}

if ( get_option('is_BusyBox_IsName_CleanViewes_Status') ){


function function_is_BusyBox_IsName_CleanViews_Calumn( $columns ) {
    $columns['BusyBox_CleanViewsColumn'] = __('<img style="width: 25px;" src=" '. plugin_dir_url( __FILE__ ). 'images/icon.png'. '"/>');
    return $columns;
}
function function_is_BusyBox_IsName_CleanViews_CalumnDisplay( $column ) {
    global $post;
    if ( $column === 'BusyBox_CleanViewsColumn') {
        echo is_BusyBox_IsName_getPostViews($post->ID);
    }
}
add_filter( 'manage_posts_columns', 'function_is_BusyBox_IsName_CleanViews_Calumn' );
add_action( 'manage_posts_custom_column', 'function_is_BusyBox_IsName_CleanViews_CalumnDisplay' );



function function_is_BusyBox_IsName_CleanViews_TargetPost($content)
{   
    global $post;
 
 
    if (is_single()) {
    $res = is_BusyBox_IsName_setPostViews($post->ID) . $content;
    }


    return $res;
 
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('the_content', 'function_is_BusyBox_IsName_CleanViews_TargetPost');
 
}


 
if ( get_option('is_BusyBox_IsName_OptionStatus_ipblock') ){

function is_BusyBox_IsName_get_client_ip_server() {
  $ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP']))
  $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
  $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
  $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
  $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
  $ipaddress = $_SERVER['REMOTE_ADDR'];
else
  $ipaddress = '';

  return $ipaddress;
}

 
function is_BusyBox_IsName_getCountry($ip){
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    return $jsonData->geoplugin_countryCode;
}

 
 
 
function function_is_BusyBox_IsName_OptionStatus_ipblock_TargetPost($content)
{   
    
    global $post;
     
     
    if ( current_user_can('manage_options') ) {
        return;
    }
    
 
    $redirect = get_option( 'is_BusyBox_IsName_OptionRedirectTo_ipblock' )['selected_page']; 
 
    
 
 
    if (is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "IR" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_iran') ){
    
 
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
  
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "JP" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_japan') ){
    
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "DE" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_germany') ){
    
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "FR" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_france') ){
    
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "CA" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_canada') ){
    
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "TR" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_turkey') ){
 
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "US" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_usa') ){
 
    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }elseif(is_BusyBox_IsName_getCountry( is_BusyBox_IsName_get_client_ip_server() ) == "CN" && get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_china') ){

    if( $redirect && $post->ID != $redirect) {
     $link = get_permalink($redirect);
     echo "<script type='text/javascript'>
     window.location.href='$link';
     </script>";
     exit;
    }
    
    }
      
    
    return $content;
 
}

 
add_filter('the_content', 'function_is_BusyBox_IsName_OptionStatus_ipblock_TargetPost');
 
}


if (get_option('is_BusyBox_IsName_OptionLoginLogo')) {
    
    function function_is_BusyBox_IsName_OptionLoginLogo()
    {
        echo "<style type='text/css'>#login h1 a, .login h1 a {background-image: url( " . get_option('is_BusyBox_IsName_OptionLoginLogo') . " );}</style>";
    }
    
    add_action('login_enqueue_scripts', 'function_is_BusyBox_IsName_OptionLoginLogo');
}

if (get_option('is_BusyBox_IsName_DarkDashboardStyles') ) {
    
    function is_BusyBox_IsName_DashboardStyles(){
     if (!strpos($_SERVER['REQUEST_URI'], "dante") !== false){
     wp_enqueue_style('darkmode', plugin_dir_url(__FILE__) . 'css/darkmode.css', array(), time(), false);
     }
    }
    
    add_action('admin_enqueue_scripts', 'is_BusyBox_IsName_DashboardStyles');
}

if (get_option('is_BusyBox_IsName_LoginStyles')) {
function function_is_BusyBox_IsName_CSLoginStyle()
    {
       echo "<link href='https://cdn.rawgit.com/rastikerdar/vazir-font/v19.2.0/dist/font-face.css' rel='stylesheet' type='text/css' />";
       wp_enqueue_style('loginstyle', plugin_dir_url(__FILE__) . 'css/loginstyle.css', array(), time(), false);
    }
    
add_action('login_enqueue_scripts', 'function_is_BusyBox_IsName_CSLoginStyle');
}

if (get_option('is_BusyBox_IsName_OptionFaviconLogo')) {
    
    function function_is_BusyBox_IsName_OptionFaviconLogo()
    {
        $favicon_url = get_option('is_BusyBox_IsName_OptionFaviconLogo');
        echo '<link rel="icon" href="' . $favicon_url . '" />';
    }
    
    add_action('wp_head', 'function_is_BusyBox_IsName_OptionFaviconLogo');
}



if (get_option('is_BusyBox_IsName_OptionMobileColorBar')) {
    
    function function_is_BusyBox_IsName_OptionMobileColorBar()
    {
        $color = get_option('is_BusyBox_IsName_OptionMobileColorBar');
        echo '<meta name="theme-color" content="' . $color . '">';
    }
    
    add_action('wp_head', 'function_is_BusyBox_IsName_OptionMobileColorBar');
}


if (get_option('is_BusyBox_IsName_OptionAutoRefreshPage')) {
    
    function function_is_BusyBox_IsName_OptionAutoRefreshPage()
    {
        $refresh_time = get_option('is_BusyBox_IsName_OptionAutoRefreshPage');
        echo '<meta http-equiv="refresh" content="' . $refresh_time . '">';
    }
    
    add_action('wp_head', 'function_is_BusyBox_IsName_OptionAutoRefreshPage');
}


 
if (get_option( 'is_BusyBox_IsName_OptionAuto404RedirectSpecialPage' )['selected_page']) {
    
    function function_is_BusyBox_IsName_OptionAuto404RedirectSpecialPage()
    {
        if (is_404()) {
            if (get_option( 'is_BusyBox_IsName_OptionAuto404RedirectSpecialPage' )['selected_page']) {
                $redirect = get_option( 'is_BusyBox_IsName_OptionAuto404RedirectSpecialPage' )['selected_page'];
                $link = get_permalink($redirect);
                wp_redirect($link);
            }
        }
    }
    
    add_action('wp', 'function_is_BusyBox_IsName_OptionAuto404RedirectSpecialPage');
    
}


if (!get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely')) {
    
    if (!get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely')) {
        include_once 'plugins/FeaturedImageGeneratorClassic.php';
    } else {
        include_once 'plugins/FeaturedImageGeneratorIsGutenberg.php';
    }
    
}


if (get_option('is_BusyBox_IsName_OptionAutoHideFirstImageFeatured')) {
    
    function function_is_BusyBox_IsName_OptionAutoHideFirstImageFeatured($content)
    {
        if (is_single()) {
            $content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
        }
        return $content;
    }
    
    add_filter('the_content', 'function_is_BusyBox_IsName_OptionAutoHideFirstImageFeatured');
}


function function_is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta($content)
{
    
    global $post;
    $options = get_post_meta($post->ID, 'is_BusyBox_IsName_ForceModule_Metadata');
    if (in_array('is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta', $options)) {
        $content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
    }
    return $content;
}


add_filter('the_content', 'function_is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta');





if (get_option('is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar')) {
    
    function function_is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedInAdminBae_icon($columns)
    {
        $columns['OptionAutoShowFirstImageFeaturedAdminBar'] = __('<img style="width: 25px;" src=" '. plugin_dir_url( __FILE__ ). 'images/icon.png'. '"/>');
        return $columns;
    }
    
    function function_is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedInAdminBae_show($column_name, $post)
    {
        if ($column_name == 'OptionAutoShowFirstImageFeaturedAdminBar') {
            if (has_post_thumbnail()) {
             
            echo '<style>td.OptionAutoShowFirstImageFeaturedAdminBar.column-OptionAutoShowFirstImageFeaturedAdminBar img{ width: 60%;height: auto;display: block;margin: 0 auto; }</style>';
            echo the_post_thumbnail();

            }
        }
        return $column_name;
    }
    
    add_filter('manage_posts_columns', 'function_is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedInAdminBae_icon');
    add_filter('manage_posts_custom_column', 'function_is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedInAdminBae_show', 10, 2);
}



if (get_option('is_BusyBox_IsName_OptionDisableRssFeed')) {
    
    function function_is_BusyBox_IsName_OptionDisableRssFeed()
    {
        wp_redirect(home_url(), 301);
        exit;
    }
    
    add_action('do_feed', 'function_is_BusyBox_IsName_OptionDisableRssFeed', 1);
    add_action('do_feed_rdf', 'function_is_BusyBox_IsName_OptionDisableRssFeed', 1);
    add_action('do_feed_rss', 'function_is_BusyBox_IsName_OptionDisableRssFeed', 1);
    add_action('do_feed_rss2', 'function_is_BusyBox_IsName_OptionDisableRssFeed', 1);
    add_action('do_feed_atom', 'function_is_BusyBox_IsName_OptionDisableRssFeed', 1);
}



if (get_option('is_BusyBox_IsName_OptionAddRssFirstImageFeatured')) {
    
    function function_is_BusyBox_IsName_OptionAddRssFirstImageFeatured($content)
    {
        global $post;
        if (has_post_thumbnail($post->ID)) {
            $content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . get_the_content();
        }
        return $content;
    }
    
    add_filter('the_excerpt_rss', 'function_is_BusyBox_IsName_OptionAddRssFirstImageFeatured');
    add_filter('the_content_feed', 'function_is_BusyBox_IsName_OptionAddRssFirstImageFeatured ');
}




if (get_option('is_BusyBox_IsName_OptionSaveExternalImage')) {
    
    /**
     * Find hotlinked external images in provided content
     */
    function behroozdante_cache_images_find_images_in_content($content, $domains)
    {
        preg_match_all('/<img[^>]*src=["\']([^"\']*)[^"\']*["\'][^>]*>/i', $content, $matches);
        foreach ($matches[1] as $url):
            $url = parse_url($url);
            $domains[$url['host']]++;
        endforeach;
        return $domains;
    }
    
    function behroozdante_cache_images_cache_image_inpost($url, $postid)
    {
        global $wpdb;
        $orig_url = $url;
        //check if pic is on Blogger
        $response = wp_remote_request($url);
        if (is_wp_error($response)) {
            return 'error1';
            $my_body = wp_remote_retrieve_body($response);
            if (strpos($my_body, 'src')) {
                preg_match_all('/<img[^>]*src=["\']([^"\']*)[^"\']*["\'][^>]*>/i', $my_body, $matches);
                foreach ($matches[1] as $url):
                    $spisak = $url;
                endforeach;
                $url = $spisak;
            }
        }
        set_time_limit(300);
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $upload = media_sideload_image($url, $postid);
        if (!is_wp_error($upload)) {
            preg_match_all('/<img[^>]*src=["\']([^"\']*)[^"\']*["\'][^>]*>/i', $upload, $locals);
            foreach ($locals[1] as $newurl):
                $wpdb->query("UPDATE $wpdb->posts SET post_content = REPLACE(post_content, '$orig_url', '$newurl');");
            endforeach;
        }
        return $url;
    }
    /**
     * Cache images on post's saving
     */
    function function_dante_cache_images_save_post_doit($post_ID, $post)
    {
        global $wpdb;
        $cache_images_settings = get_option('cache_images_automatic_caching');
        if ($cache_images_settings && $cache_images_settings == 1) {
            if (wp_is_post_autosave($post_ID) || wp_is_post_revision($post_ID))
                return $post_ID;
            $domains = behroozdante_cache_images_find_images_in_content($post->post_content, $domains);
            if (!$domains)
                return $post_ID;
            $local_domain = parse_url(get_option('siteurl'));
            foreach ($domains as $domain => $num):
                if (strstr($domain, $local_domain['host']))
                    continue; // Already local
                preg_match_all('/<img[^>]*src=["\']([^"\']*)[^"\']*["\'][^>]*>/i', $post->post_content, $matches);
                foreach ($matches[1] as $url):
                    if (strstr($url, get_option('siteurl') . '/' . get_option('upload_path')) || !strstr($url, $domain) || (($res) && in_multi_array($url, $res)))
                        continue; // Already local
                    behroozdante_cache_images_cache_image_inpost($url, $post_ID);
                endforeach;
            endforeach;
            return $post_ID;
        }
        return $post_ID;
    }
    
    add_action('publish_post', 'function_dante_cache_images_save_post_doit', 10, 2);
    
}





if (get_option('is_BusyBox_IsName_OptionDisableRightClick')) {
    
    function function_dante_die_right_img_click()
    {
        #https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
        echo "<script type='text/javascript'>document.ondragstart=function(){return false}; document.oncontextmenu=function(e){return false}; document.onkeydown = function(e) {if( e.ctrlKey ){return false}};</script>";
    }
    
    add_action('wp_head', 'function_dante_die_right_img_click');
    
}


if (get_option('is_BusyBox_IsName_OptionRemoveExtraSpace')) {
    
    function function_is_BusyBox_IsName_OptionRemoveExtraSpace($content)
    {
        if (is_single()) {
            $content = preg_replace('/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU', '', $content);
            $content = preg_replace('/<p>(?:\s|&nbsp;)*?<\/p>/i', '', $content);
            $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
        }
        return $content;
    }
    
    add_filter('the_content', 'function_is_BusyBox_IsName_OptionRemoveExtraSpace');
    
}


function function_is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta($content)
{
    
    global $post;
    $options = get_post_meta($post->ID, 'is_BusyBox_IsName_ForceModule_Metadata');
    if (in_array('is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta', $options)) {
        if (is_single()) {
            $content = preg_replace('/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU', '', $content);
            $content = preg_replace('/<p>(?:\s|&nbsp;)*?<\/p>/i', '', $content);
            $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
        }
    }
    return $content;
}

add_filter('the_content', 'function_is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta');


if (get_option('is_BusyBox_IsName_OptionDisableAdminBarNonAdmins')) {
    
    function dante_fnc_disable_adminbar_nonsuperadmin()
    {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }
    
    add_action('after_setup_theme', 'dante_fnc_disable_adminbar_nonsuperadmin');
    
}





if (get_option('is_BusyBox_IsName_OptionNofollowExternalLinks')) {
    
    function dante_get_host_main($url)
    {
        $host  = parse_url($url, PHP_URL_HOST);
        $names = explode(".", $host);
        
        if (count($names) == 1) {
            return $names[0];
        }
        
        $names = array_reverse($names);
        return $names[1] . '.' . $names[0];
    }
    
    function dante_add_nofollow_ex_callback($matches)
    {
        $text      = $matches[1];
        $site_link = dante_get_host_main(get_bloginfo('url'));
        
        //If this is an internal link, don't touch it
        if (strpos($text, $site_link)) {
            return "<a $text>";
        }
        
        //If this doesn't have the rel attribute, append the nofollow
        if (strpos($text, 'rel') === false) {
            $text = preg_replace("%(href=S(?!$site_link))%i", 'rel="nofollow" $1', $text);
        }
        
        return "<a $text target=\"_blank\" rel=\"nofollow\">";
    }
    function function_is_BusyBox_IsName_OptionNofollowExternalLinks($content)
    {
        return preg_replace_callback('|<a (.+?)>|i', 'dante_add_nofollow_ex_callback', $content);
    }
    
    add_filter('the_content', 'function_is_BusyBox_IsName_OptionNofollowExternalLinks');
    
}



if (get_option('is_BusyBox_IsName_OptionHideExtraNotif')) {
    
    function function_dante_hide_update_noticee_to_all_but_admin_users()
    {
        return remove_all_actions('admin_notices');
    }
    
    add_action('admin_head', 'function_dante_hide_update_noticee_to_all_but_admin_users', 1);
    
}




function function_dante_attachment_image_link_remove_filter($content)
{
    $content = preg_replace(array(
        '{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
        '{ wp-image-[0-9]*" /></a>}'
    ), array(
        '<img',
        '" />'
    ), $content);
    return $content;
}


if (get_option('is_BusyBox_IsName_OptionDisableImageLinks')) {
    add_filter('the_content', 'function_dante_attachment_image_link_remove_filter');
}


function function_is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta($content)
{
    
    global $post;
    $options = get_post_meta($post->ID, 'is_BusyBox_IsName_ForceModule_Metadata');
    if (in_array('is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta', $options)) {
        if (is_single()) {
            $content = preg_replace(array(
                '{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'
            ), array(
                '<img',
                '" />'
            ), $content);
            
        }
    }
    return $content;
}

add_filter('the_content', 'function_is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta');





if (get_option('is_BusyBox_IsName_OptionCustomJs')) {
    
    function function_is_BusyBox_IsName_OptionCustomJs()
    {
         $is_BusyBox_IsName_OptionCustomJs = get_option('is_BusyBox_IsName_OptionCustomJs')['text_area'];
        if ($is_BusyBox_IsName_OptionCustomJs) {
            echo "<script type= 'text/javascript'>" . $is_BusyBox_IsName_OptionCustomJs . "</script>";
        }
    }
    
    add_action('wp_head', 'function_is_BusyBox_IsName_OptionCustomJs');
}




if (get_option('is_BusyBox_IsName_OptionCustomCss')) {
    
    function function_is_BusyBox_IsName_OptionCustomCss()
    {
         $is_BusyBox_IsName_OptionCustomCss = get_option('is_BusyBox_IsName_OptionCustomCss')['text_area'];
        if ($is_BusyBox_IsName_OptionCustomCss) {
            echo "<style type='text/css'>" . $is_BusyBox_IsName_OptionCustomCss . "</style>";
        }
    }
    
    add_action('wp_head', 'function_is_BusyBox_IsName_OptionCustomCss');
}


if (!get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely')) {
    if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
        add_filter('use_block_editor_for_post_type', '__return_false', 10);
    } else {
        add_filter('gutenberg_can_edit_post_type', '__return_false', 10);
    }
}

if (get_option('is_BusyBox_IsName_OptionLimitingPostRevisions')) {
    
    
    function function_is_BusyBox_IsName_PostRevisions($num, $post)
    {
        return 3;
    }
    add_filter('wp_revisions_to_keep', 'function_is_BusyBox_IsName_PostRevisions', 10, 2);
    
}

if (get_option('is_BusyBox_IsName_OptionAntiDragImage')) {
    
    
    function function_is_BusyBox_IsName_AntiDragImage()
    {
        echo "<script type= 'text/javascript'>jQuery(document).ready(function($){ $('img').mousedown(function(){return false;}); });</script>";
    }
    add_action('wp_head', 'function_is_BusyBox_IsName_AntiDragImage');
    
}




/*Author URI: https://www.instagram.com/behroozdante/  |  Email: behroozdante@gmail.com */
?>
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

function is_BusyBox_IsName_TextDomain()
{
    load_plugin_textdomain('BusyBoxTextDoamin', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'is_BusyBox_IsName_TextDomain');


function is_BusyBox_IsName_BusyBoxWQuickRemAllData()
{
    
    delete_option('is_BusyBox_IsName_OptionRemAllData');
    delete_option('is_BusyBox_IsName_OptionRecommendedData');
    
    delete_option('is_BusyBox_IsName_OptionFontDashboardStyle');
    delete_option('is_BusyBox_IsName_LoginStyles');
    delete_option('is_BusyBox_IsName_DarkDashboardStyles');
    
    
    delete_option('is_BusyBox_IsName_OptionLoginLogo');
    delete_option('is_BusyBox_IsName_OptionFaviconLogo');
    
    delete_option('is_BusyBox_IsName_OptionMobileColorBar');
    
    delete_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely');
    
    
    delete_option('is_BusyBox_IsName_OptionAutoHideFirstImageFeatured');
    delete_option('is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar');
    delete_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg');
    
    
    
    delete_option('is_BusyBox_IsName_OptionDisableRssFeed');
    delete_option('is_BusyBox_IsName_OptionAddRssFirstImageFeatured');
    
    delete_option('is_BusyBox_IsName_OptionHideExtraNotif');
    delete_option('is_BusyBox_IsName_OptionDisableRightClick');
    
    delete_option('is_BusyBox_IsName_OptionDisableAdminBarNonAdmins');
    
    
    delete_option('is_BusyBox_IsName_OptionBeforeContent');
    delete_option('is_BusyBox_IsName_OptionAfterContent');
    delete_option('is_BusyBox_IsName_OptionSaveExternalImage');
    delete_option('is_BusyBox_IsName_OptionLimitingPostRevisions');
    delete_option('is_BusyBox_IsName_OptionAntiDragImage');
    
    
    delete_option('is_BusyBox_IsName_OptionDisableImageLinks');
    delete_option('is_BusyBox_IsName_OptionRemoveExtraSpace');
    
    delete_option('is_BusyBox_IsName_OptionUnusedTags');
    
    delete_option('is_BusyBox_IsName_OptionCustomCss');
    delete_option('is_BusyBox_IsName_OptionCustomJs');
    
    delete_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely');
    
    
    
    delete_option('is_BusyBox_IsName_OptionAutoRefreshPage');
    delete_option('is_BusyBox_IsName_OptionAuto404RedirectSpecialPage');
    
    delete_option('is_BusyBox_IsName_OptionNofollowExternalLinks');
    
    
    
    delete_option('is_BusyBox_IsName_CleanViewes_Status');
    delete_option('is_BusyBox_IsName_CleanViewes_PlaceHolder');
    delete_option('is_BusyBox_IsName_CleanViewes_FakeNum');
    delete_option('is_BusyBox_IsName_CleanViewes_CountAdmins');
    delete_option('is_BusyBox_IsName_CleanViewes_CountBots');
    delete_option('is_BusyBox_IsName_CleanViewes_displayBeforePost');
    delete_option('is_BusyBox_IsName_CleanViewes_displayAfterPost');

    delete_option('is_BusyBox_IsName_OptionStatus_ipblock');
    delete_option('is_BusyBox_IsName_OptionRedirectTo_ipblock');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_iran');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_japan');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_germany');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_france');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_canada');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_turkey');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_usa');
    delete_option('is_BusyBox_IsName_OptionCheckBox_ipblock_china');
    
}

function is_BusyBox_IsName_BusyBoxOptionRecommendedData()
{
    update_option('is_BusyBox_IsName_OptionFontDashboardStyle', '1');
    update_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely', '1');
    update_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely', '1');
    update_option('is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar', '1');
    update_option('is_BusyBox_IsName_OptionHideExtraNotif', '1');
    update_option('is_BusyBox_IsName_OptionDisableAdminBarNonAdmins', '1');
}

function is_BusyBox_IsName_EnqueueColorPicker()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'is_BusyBox_IsName_EnqueueColorPicker');

function is_BusyBox_IsName_loader_inject_html()
{
?>
 <div style="background: url('<?php echo plugins_url( '/images/loader.gif', __FILE__ ) ?>') 50% 50% no-repeat rgb(35, 40, 45);" class="loaderDanteTarget">
 <div class="loaderDante">
   <img style="position: absolute;left: -20px;bottom: 0px;width: 20px;" src="<?php echo plugins_url( '/images/icon.png?='.time().' ', __FILE__ ) ?>">
  <?php _e('wait for plugin to configure page DarkMode and assets', 'BusyBoxTextDoamin') ?>
 </div>
 <a href="//BehroozDante.ir/" target="_blank">
 <img style="position: absolute;left: 0;bottom: 0;width: 130px;" src="<?php echo plugins_url( '/images/copyright.png', __FILE__ ) ?>">
 </a>
</div>
<?php
}

if (get_option('is_BusyBox_IsName_DarkDashboardStyles') ) {
add_action( 'in_admin_footer', 'is_BusyBox_IsName_loader_inject_html' );
}
 
function is_BusyBox_IsName_EnqueueCssStyle()
{   
    $url = preg_replace('#^https?://#', '', get_site_url() );
    if (strpos($_SERVER['REQUEST_URI'], "dante") !== false){
    #wp_enqueue_style('darkmode', plugin_dir_url(__FILE__) . 'css/darkmode.css', array(), time(), false);
    wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'css/style.css', array(), time(), false);
    }
    
    if (!get_option('is_BusyBox_IsName_DarkDashboardStyles') ) {
    wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'css/style.css', array(), time(), false);
    }else{
    wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'css/style.css', array(), time(), false);
    wp_enqueue_style('darkmode', plugin_dir_url(__FILE__) . 'css/darkmode.css', array(), time(), false);
    }
    
    wp_enqueue_script('hooker', "https://$url/wp-content/plugins/auto-set-first-image-as-featured/js/hooker.js", array(), time(), false);
}
add_action('admin_enqueue_scripts', 'is_BusyBox_IsName_EnqueueCssStyle');


function custom_admin_dante_fix_icon() {
     
    echo '<style>
#adminmenu .wp-menu-image img {
    padding: 5px 0 0 0;
    opacity: .6;
    filter: alpha(opacity=60);
    width: 25px;
}
    </style>';
}
add_action('admin_footer', 'custom_admin_dante_fix_icon');


function is_BusyBox_IsName_PhpJsAlert($msg)
{
    echo "<script type='text/javascript'>jQuery(document).ready(function(){ alert('" . $msg . "') });</script>";
}


function is_BusyBox_IsName_RedirectActivatedHook($plugin)
{
    if ($plugin == plugin_basename(__FILE__)) {
        exit(wp_redirect(admin_url('admin.php?page=dante_dashboard')));
    }
}
add_action('activated_plugin', 'is_BusyBox_IsName_RedirectActivatedHook');

function is_BusyBox_IsName_RandomHexColor()
{
    $chars = 'ABCDEF0123456789';
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
        $color .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $color;
}

if (!get_option('is_BusyBox_IsName_OptionFontDashboardStyle')) {
    function is_BusyBox_IsName_FontStyleDashboard()
    {
        echo "<style type='text/css'>";
        echo "html,body, span, div, a, span, button, input, td, tr ,h1.wp-heading-inline, input#inspector-text-control-0, .rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6, input.code h1,h2,h3,h4,h5,h6 {font-family: 'Vazir', sans-serif !important; font-weight: 400; font-style: normal;}";
        echo ".dashicons, .dashicons-before:before, #wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon, .wp-admin-bar-arrow {font-family: 'dashicons' !important;}";
        echo "</style>";
    }
    add_action('admin_head', 'is_BusyBox_IsName_FontStyleDashboard');
}

 
function is_BusyBox_IsName_ColorWpColorPicker()
{
    echo "<script type='text/javascript'>jQuery(document).ready(function($){ $('.color-picker').wpColorPicker();});</script>";
    echo "<link href='https://cdn.rawgit.com/rastikerdar/vazir-font/v27.2.2/dist/font-face.css' rel='stylesheet' type='text/css' />";
}
add_action('admin_head', 'is_BusyBox_IsName_ColorWpColorPicker');


function is_BusyBox_IsName_MySQLRemUnusedTags()
{
    global $current_user, $wpdb;
    $taxonomy              = 'post_tag';
    $sql                   = 'SELECT wt.term_id FROM ' . $wpdb->terms . ' wt INNER JOIN ' . $wpdb->term_taxonomy . ' wtt ON wt.term_id=wtt.term_id WHERE wtt.taxonomy=\'' . $taxonomy . '\' AND wtt.count=0';
    $all_tags              = $wpdb->get_results($sql, ARRAY_A);
    $all_db_tags           = wp_count_terms($taxonomy, 'hide_empty=true');
    $all_db_unused_tags    = count($all_tags);
    $all_db_tags_after_rem = $all_db_tags - $all_db_unused_tags;
    
    $sql_sub = 'SELECT wt.term_id FROM ' . $wpdb->terms . ' wt INNER JOIN ' . $wpdb->term_taxonomy . ' wtt ON wt.term_id=wtt.term_id WHERE wtt.taxonomy=\'' . $taxonomy . '\' AND wtt.count=0 LIMIT ' . $all_db_unused_tags;
    $tags    = $wpdb->get_results($sql_sub, OBJECT);
    $i       = 0;
    set_time_limit(300);
    foreach ($tags as $tag) {
        wp_delete_term($tag->term_id, $taxonomy);
        $i++;
    }
}



add_action('add_meta_boxes', 'is_BusyBox_IsName_OptionAfterContent_MetaBox_add_custom_box');
add_action('add_meta_boxes', 'is_BusyBox_IsName_OptionBeforeContent_MetaBox_add_custom_box');


add_action('save_post', 'is_BusyBox_IsName_save_postdata_BFAF');

function is_BusyBox_IsName_OptionAfterContent_MetaBox_add_custom_box()
{   
    if (get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely') ){
     $context = 'side';
    }else{
     $context = 'normal';
    }
    
    add_meta_box('wp_editor_is_BusyBox_IsName_OptionAfterContent_MetaBox', __('content after post content <img style="width: 20px;float:right;margin: 0 5px 0 5px;" src=" '. plugin_dir_url( __FILE__ ). 'images/icon.png'. '"/>', "BusyBoxTextDoamin"), 'is_BusyBox_IsName_OptionAfterContent_MetaBox_add_custom_box_wp_editor_meta_box', 'post', $context, 'default');
}


function is_BusyBox_IsName_OptionBeforeContent_MetaBox_add_custom_box()
{

    if (get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely') ){
     $context = 'side';
    }else{
     $context = 'normal';
    }
    add_meta_box('wp_editor_is_BusyBox_IsName_OptionBeforeContent_MetaBox', __('content before post content <img style="width: 20px;float:right;margin: 0 5px 0 5px;" src=" '. plugin_dir_url( __FILE__ ). 'images/icon.png'. '"/>', "BusyBoxTextDoamin"), 'is_BusyBox_IsName_OptionBeforeContent_MetaBox_add_custom_box_wp_editor_meta_box', 'post', $context, 'default');
}

function is_BusyBox_IsName_OptionAfterContent_MetaBox_add_custom_box_wp_editor_meta_box($post)
{
    
    wp_nonce_field(plugin_basename(__FILE__), 'is_BusyBox_IsName_OptionBFAFContent_MetaBox');
    
    global $post;
    $field_value_af = get_post_meta($post->ID, 'is_BusyBox_IsName_OptionAfterContent_MetaBox', true);
 
    wp_editor($field_value_af, 'is_BusyBox_IsName_OptionAfterContent_MetaBox');
    
}



function is_BusyBox_IsName_OptionBeforeContent_MetaBox_add_custom_box_wp_editor_meta_box($post)
{
    
    wp_nonce_field(plugin_basename(__FILE__), 'is_BusyBox_IsName_OptionBFAFContent_MetaBox');
    
    global $post;
    $field_value_bf = get_post_meta($post->ID, 'is_BusyBox_IsName_OptionBeforeContent_MetaBox', true);
 
    wp_editor($field_value_bf, 'is_BusyBox_IsName_OptionBeforeContent_MetaBox');
    
    
}



add_action('add_meta_boxes_post', 'is_BusyBox_IsName_ForceModuleBox');
add_action('save_post', 'is_BusyBox_IsName_ForceModule_SaveMeta', 10, 2);
function is_BusyBox_IsName_ForceModuleBox()
{
    add_meta_box('is_BusyBox_IsName_ForceModule', __('custom force module<img style="width:20px;float:right;margin: 0 5px 0 5px;" src=" '. plugin_dir_url( __FILE__ ). 'images/icon.png'. '"/>', 'BusyBoxTextDoamin'), 'is_BusyBox_IsName_ForceModuleBox_Meta_box', 'post', 'side', 'core');
}
function is_BusyBox_IsName_ForceModuleBox_Meta_box($object, $box)
{
    $options = get_post_meta($object->ID, 'is_BusyBox_IsName_ForceModule_Metadata');
    
    wp_nonce_field(basename(__FILE__), 'is_BusyBox_IsName_ForceModule-nonce');
?>

    <ul>
        <li>
            <label>
                <input type="checkbox" name="is_BusyBox_IsName_ForceModule[]" value="is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta" <?php
    checked(in_array('is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta', $options), true);
?> /> 
                <?php
    _e('hide first image', 'BusyBoxTextDoamin');
?>
           </label>
        </li>
        <li>
            <label>
                <input type="checkbox" name="is_BusyBox_IsName_ForceModule[]" value="is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta" <?php
    checked(in_array('is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta', $options), true);
?> /> 
                <?php
    _e('disable linked image on content', 'BusyBoxTextDoamin');
?>
           </label>
        </li>
        <li>
            <label>
                <input type="checkbox" name="is_BusyBox_IsName_ForceModule[]" value="is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta" <?php
    checked(in_array('is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta', $options), true);
?> /> 
                <?php
    _e('remove extra space between post content', 'BusyBoxTextDoamin');
?>
           </label>
        </li>
 
    </ul>
<?php
}
function is_BusyBox_IsName_ForceModule_SaveMeta($post_id, $post = '')
{
    if (!is_object($post))
        $post = get_post();
    if (!isset($_POST['is_BusyBox_IsName_ForceModule-nonce']) || !wp_verify_nonce($_POST['is_BusyBox_IsName_ForceModule-nonce'], basename(__FILE__)))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (defined('DOING_AJAX') && DOING_AJAX)
        return;
    if (defined('DOING_CRON') && DOING_CRON)
        return;
    if ('revision' === $post->post_type)
        return;
    
    
    $metadata_options = array(
        'is_BusyBox_IsName_OptionAutoHideFirstImageFeatured_ForceMeta',
        'is_BusyBox_IsName_OptionDisableImageLinks_ForceMeta',
        'is_BusyBox_IsName_OptionRemoveExtraSpace_ForceMeta'
    );
    $meta_values      = get_post_meta($post_id, 'is_BusyBox_IsName_ForceModule_Metadata');
    if (isset($_POST['is_BusyBox_IsName_ForceModule']) && is_array($_POST['is_BusyBox_IsName_ForceModule'])) {
        foreach ($_POST['is_BusyBox_IsName_ForceModule'] as $new_data) {
            if (!in_array($new_data, $meta_values))
                add_post_meta($post_id, 'is_BusyBox_IsName_ForceModule_Metadata', $new_data, false);
        }
        foreach ($metadata_options as $old_data) {
            if (!in_array($old_data, $_POST['is_BusyBox_IsName_ForceModule']) && in_array($old_data, $meta_values))
                delete_post_meta($post_id, 'is_BusyBox_IsName_ForceModule_Metadata', $old_data);
        }
    } elseif (!empty($meta_values)) {
        delete_post_meta($post_id, 'is_BusyBox_IsName_ForceModule_Metadata');
    }
}

 

function is_BusyBox_IsName_save_postdata_BFAF($post_id)
{
    
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    
    if ((isset($_POST['is_BusyBox_IsName_OptionBFAFContent_MetaBox'])) && (!wp_verify_nonce($_POST['is_BusyBox_IsName_OptionBFAFContent_MetaBox'], plugin_basename(__FILE__))))
        return;
    
    
    if ((isset($_POST['post_type'])) && ('page' == $_POST['post_type'])) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    
    
    if (isset($_POST['is_BusyBox_IsName_OptionAfterContent_MetaBox'])) {
        update_post_meta($post_id, 'is_BusyBox_IsName_OptionAfterContent_MetaBox', $_POST['is_BusyBox_IsName_OptionAfterContent_MetaBox']);
    }
    
    if (isset($_POST['is_BusyBox_IsName_OptionBeforeContent_MetaBox'])) {
        update_post_meta($post_id, 'is_BusyBox_IsName_OptionBeforeContent_MetaBox', $_POST['is_BusyBox_IsName_OptionBeforeContent_MetaBox']);
    }
    
}

function is_BusyBox_IsName_getPostViews($postID){
    $count_key = 'WpToolBox_CleanViews_Count';
    if (!$postID){
    $postID = get_the_ID();
    }
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    
    if (get_option('is_BusyBox_IsName_CleanViewes_PlaceHolder')){
        $PlaceHolder = get_option('is_BusyBox_IsName_CleanViewes_PlaceHolder');
    }else{
        $PlaceHolder = "views";
    }
    
    if ( !is_rtl() ) {
    $res = $count." $PlaceHolder";
    }else{
    $res = "$PlaceHolder ". $count;
    }

    return $res;
}
add_shortcode('is_BusyBox_IsName_getPostViews', 'is_BusyBox_IsName_getPostViews');
 
function is_BusyBox_IsName_isBotAgent(){
    $bot_regex = '/BotLink|bingbot|AhrefsBot|ahoy|AlkalineBOT|anthill|appie|arale|araneo|AraybOt|ariadne|arks|ATN_Worldwide|Atomz|bbot|Bjaaland|Ukonline|borg\-bot\/0\.9|boxseabot|bspider|calif|christcrawler|CMC\/0\.01|combine|confuzzledbot|CoolBot|cosmos|Internet Cruiser Robot|cusco|cyberspyder|cydralspider|desertrealm, desert realm|digger|DIIbot|grabber|downloadexpress|DragonBot|dwcp|ecollector|ebiness|elfinbot|esculapio|esther|fastcrawler|FDSE|FELIX IDE|ESI|fido|H�m�h�kki|KIT\-Fireball|fouineur|Freecrawl|gammaSpider|gazz|gcreep|golem|googlebot|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|iajabot|INGRID\/0\.1|Informant|InfoSpiders|inspectorwww|irobot|Iron33|JBot|jcrawler|Teoma|Jeeves|jobo|image\.kapsi\.net|KDD\-Explorer|ko_yappo_robot|label\-grabber|larbin|legs|Linkidator|linkwalker|Lockon|logo_gif_crawler|marvin|mattie|mediafox|MerzScope|NEC\-MeshExplorer|MindCrawler|udmsearch|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|sharp\-info\-agent|WebMechanic|NetScoop|newscan\-online|ObjectsSearch|Occam|Orbsearch\/1\.0|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|Getterrobo\-Plus|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Search\-AU|searchprocess|Senrigan|Shagseeker|sift|SimBot|Site Valet|skymob|SLCrawler\/2\.0|slurp|ESI|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|nil|suke|http:\/\/www\.sygol\.com|tach_bw|TechBOT|templeton|titin|topiclink|UdmSearch|urlck|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|crawlpaper|wapspider|WebBandit\/1\.0|webcatcher|T\-H\-U\-N\-D\-E\-R\-S\-T\-O\-N\-E|WebMoose|webquest|webreaper|webs|webspider|WebWalker|wget|winona|whowhere|wlm|WOLP|WWWC|none|XGET|Nederland\.zoek|AISearchBot|woriobot|NetSeer|Nutch|YandexBot|YandexMobileBot|SemrushBot|FatBot|MJ12bot|DotBot|AddThis|baiduspider|SeznamBot|mod_pagespeed|CCBot|openstat.ru\/Bot|m2e/i';
    $userAgent = empty($_SERVER['HTTP_USER_AGENT']) ? FALSE : $_SERVER['HTTP_USER_AGENT'];
    $isBot = !$userAgent || preg_match($bot_regex, $userAgent);
    return $isBot;
}

function is_BusyBox_IsName_setPostViews($postID) {
    
    if (! get_option('is_BusyBox_IsName_CleanViewes_CountAdmins') && current_user_can('manage_options') ){
      return;
    }
    
    if (! get_option('is_BusyBox_IsName_CleanViewes_CountBots') && is_BusyBox_IsName_isBotAgent() ){
      return;
    }
    
    $count_key = 'WpToolBox_CleanViews_Count';
    $count = get_post_meta($postID, $count_key, true);
    
    if (get_option('is_BusyBox_IsName_CleanViewes_FakeNum')){
        $FakeNum = get_option('is_BusyBox_IsName_CleanViewes_FakeNum');
    }else{
        $FakeNum = "1";
    }
    
    if ($FakeNum){
      $count = $count + $FakeNum;
    }
    
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        update_post_meta($postID, $count_key, $count);
    }
}

function do_blockquote_shortcode_style1( $atts = null, $content = null ) {
    
 
    if ( get_option('is_BusyBox_IsName_blockquote_boxshadow') ){
        $boxshadow = '1px 1px 7px rgba(0,0,0,.1)';
    }else{
        $boxshadow = 'unset';
    }
    
    
    if ( get_option('is_BusyBox_IsName_blockquote_fontstyle')[selected_page] ){
        $fontstyle = get_option('is_BusyBox_IsName_blockquote_fontstyle')[selected_page];
    }else{
        $fontstyle = 'normal';
    }
    
    $textcolor = get_option('is_BusyBox_IsName_blockquote_textcolor');
    $bgcolor = get_option('is_BusyBox_IsName_blockquote_bgcolor');
    
    if ( get_option('is_BusyBox_IsName_blockquote_borderradius')[selected_page] ){
        $borderradius = get_option('is_BusyBox_IsName_blockquote_borderradius')[selected_page];
    }else{
        $borderradius = '0';
    }

    if ( get_option('is_BusyBox_IsName_blockquote_bottombordercolor') ){
        $borderbottom = get_option('is_BusyBox_IsName_blockquote_bottombordercolor');
    }else{
        $borderbottom = '#ffffff00';
    }
    
    $style = "
    width: 100%;
    padding: 15px;
    display: block;
    box-sizing: border-box;
    font-style:$fontstyle;
    background:$bgcolor;
    border-radius:$borderradius"."px;
    color:$textcolor;
    box-shadow: $boxshadow;
    border-bottom:solid $borderbottom;
    -moz-box-shadow: $boxshadow;
    -webkit-box-shadow: $boxshadow;
    -ms-box-shadow: $boxshadow;
    -o-box-shadow: $boxshadow;
    ";
    $output .= '<div style="'.$style.'">' . wp_strip_all_tags($content) . '</div>';
    return $output;
}

if (get_option('is_BusyBox_IsName_OptionStatus_blockquote')){
add_shortcode('is_BusyBox_IsName_blockquote', 'do_blockquote_shortcode_style1');
}

/*Author URI: https://www.instagram.com/behroozdante/  |  Email: behroozdante@gmail.com */
?>
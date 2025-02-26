<?php
/*
Plugin Name: auto set first image as featured – WP BusyBox
Plugin URI: https://wordpress.org/plugins/auto-set-first-image-as-featured/
Description: this plugin help you for auto set first image as featured image, also it have more than +20 effect and actions for your website.
Author: BehroozDante
Version: 14.9.2
Author URI: https://BehroozDante.ir/
Email: BehroozDante@gmail.com
*/

if (!defined( 'ABSPATH' ) ) {
exit;
}
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 
 #panel and menu
 
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 
function is_BusyBox_IsName_CreateMenu(){
 
add_action( 'admin_init', 'is_BusyBox_IsName_RegisterMainSettings' );
  
 add_menu_page(
 __('DashBoard', 'BusyBoxTextDoamin'), //page title
 __('<font style="font-weight:bold; color:rgb(0, 175, 255);">' . 'WP BusyBox' . '</font>', 'BusyBoxTextDoamin'), //menu title
 'administrator',//capability 
 'wp_BusyBox',//father menu slug
 'is_BusyBox_IsName_HtmlWhatIsNew',//callback function
  plugin_dir_url( __FILE__ ) . 'images/icon.png?v=1',//icon_url,
 '1'//position
 ); 
 
 add_submenu_page(
 'wp_BusyBox',
 __('access to hidden options', 'BusyBoxTextDoamin'), //page title
 __('<font class="confirmMsgOption" style="font-weight:bold;" color="#e80101">' . 'hidden options' . '</font>', 'BusyBoxTextDoamin'), //menu title
 'administrator', //capability,
 'dante_hidden_options',//menu slug
 'is_BusyBox_IsName_hiddenOptions' //callback function
 );
 
 add_submenu_page(
 'wp_BusyBox',
 __('credits and support', 'BusyBoxTextDoamin'), //page title
 __('<font color="#18ea0e">' . 'credits and support' . '</font>', 'BusyBoxTextDoamin'), //menu title
 'administrator', //capability,
 'dante_credits_and_support',//menu slug
 'is_BusyBox_IsName_HtmlCredits' //callback function
 );
 
} //end


function is_BusyBox_IsName_hiddenOptions() {
    $url = (get_bloginfo('url').'/wp-admin/options.php');
    if (headers_sent()){
      $message = __("warning: before changing anything, you may need to take a backup from your database, changed settings cannot back.", 'BusyBoxTextDoamin');
      echo "<script type='text/javascript'>alert('$message');</script>";
      die('<script type="text/javascript">window.location=\''.$url.'\';</script>');
    }else{
      header('Location: ' . $url);
      $message = __("warning: before changing anything, you may need to take a backup from your database, changed settings cannot back.", 'BusyBoxTextDoamin');
      echo "<script type='text/javascript'>alert('$message');</script>";
      die();
    }
}

 
function is_BusyBox_IsName_RegisterMainSettings() {

 
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionRemAllData' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionRecommendedData' );

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionFontDashboardStyle' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_DarkDashboardStyles' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_LoginStyles' );
 
 

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionLoginLogo' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionFaviconLogo' );

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionMobileColorBar' );

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely' );
 

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAutoHideFirstImageFeatured' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg' );

 

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionDisableRssFeed' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAddRssFirstImageFeatured' );

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionHideExtraNotif' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionDisableRightClick');
 
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionDisableAdminBarNonAdmins');


register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionBeforeContent');
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAfterContent');
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionSaveExternalImage' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionLimitingPostRevisions' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAntiDragImage' );
 

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionDisableImageLinks' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionRemoveExtraSpace');

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionUnusedTags' );

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCustomCss');
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCustomJs');

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionDisableGutenbergCompletely');

 

register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAutoRefreshPage' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionAuto404RedirectSpecialPage' );
 
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionNofollowExternalLinks' );
 
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_Status' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_PlaceHolder' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_FakeNum' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_CountAdmins' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_CountBots' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_displayBeforePost' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_CleanViewes_displayAfterPost' );
  
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionStatus_ipblock' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionRedirectTo_ipblock' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_iran' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_japan' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_germany' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_france' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_canada' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_turkey' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_usa' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionCheckBox_ipblock_china' );
 

 
 
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_OptionStatus_blockquote' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_boxshadow' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_fontstyle' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_textcolor' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_bgcolor' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_bottombordercolor' );
register_setting( 'is_BusyBox_IsName_SaveInput', 'is_BusyBox_IsName_blockquote_borderradius' );
 

}

 
/*
 #display admin menu
*/

if ( is_admin() ){ 
 add_action('admin_menu', 'is_BusyBox_IsName_CreateMenu');
}


 
/*
 #handle important function
*/
 
include_once 'function.php'; 
 
/*
 #html pages
*/

function is_BusyBox_IsName_HtmlWhatIsNew(){
?>

 
<div class="option-css-dante-option-body">
 
<center><strong>
<p>control panel version is 2.7 by <a href="//instagram.com/BehroozDante/" target="_blank"><?php echo '<img style="max-width:10%;vertical-align: middle;" src="' . plugins_url( 'images/myiG.png', __FILE__ ) . '" > '; ?></a></p>
</strong></center>
    
<div class="BusyBoxTab">
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenLinkInNewTabBlank('http://BehroozDante.ir');"><img style="max-width:50%;vertical-align: middle; display: block;margin: 0 auto;" src="<?php echo plugins_url( '/images/copyright.png', __FILE__ ) ?>"></button>
  <button  id ="BusyBoxDefultTabClick" class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabHome')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/home.png', __FILE__ ) ?>"><?php _e('home', 'BusyBoxTextDoamin'); ?></button>
  <button  id ="BusyBoxIdSysInfo" class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabSysInfo')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/sysinfo.png', __FILE__ ) ?>"><?php _e('system info', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabMain')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/main.png', __FILE__ ) ?>"><?php _e('main settings', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabFeaturedImg')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/featuedimg.png', __FILE__ ) ?>"><?php _e('featured img settings', 'BusyBoxTextDoamin'); ?></button>
  <button  id ="BusyBoxIdTabUnusedTags" class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabUnusedTags')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/unusedtag.png', __FILE__ ) ?>"><?php _e('remove unused tags', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabPostAndContent')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/postcontent.png', __FILE__ ) ?>"><?php _e('post and content', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabLinkAndRedirect')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/links.png', __FILE__ ) ?>"><?php _e('link and redirect', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabCustomCssJs')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/customcssjs.png', __FILE__ ) ?>"><?php _e('custom css and js', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_CleanViewer')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/cleanviewer.png', __FILE__ ) ?>"><?php _e('clean viewer', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_IpBlocker')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/ipblocker.png', __FILE__ ) ?>"><?php _e('ip blocker', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_blockquote')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/blockquote.png', __FILE__ ) ?>"><?php _e('blockquote style <div style="color:#fff;display: inline-block;background: #ca2222;border-radius: 5px;padding: 3px;font-size:8px;font-weight: bold;animation: pulseDanteFnc 1s infinite;">BETA</div>', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" onclick="is_BusyBox_IsName_OpenTabData(event, 'is_BusyBox_IsName_TabDashboardSettings')"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/dashboard.png', __FILE__ ) ?>"><?php _e('dashboard settings', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" style="color:#2ab934;" onclick="is_BusyBox_IsName_OpenLinkInNewTabBlank('//wordpress.org/support/plugin/auto-set-first-image-as-featured/reviews/');"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/rateus.png', __FILE__ ) ?>"><?php _e('rate us', 'BusyBoxTextDoamin'); ?></button>
  <button  class="BusyBoxTabLinks" style="color:blue;" onclick="is_BusyBox_IsName_OpenLinkInNewTabBlank('<?php echo get_bloginfo( 'url' ); ?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=auto-set-first-image-as-featured&section=changelog');"><img style="width: 20px;float: left;margin-top: 2px;margin-right: 5px;" src="<?php echo plugins_url( '/images/menuitems/changelog.png', __FILE__ ) ?>"><?php _e('changelog', 'BusyBoxTextDoamin'); ?></button>
</div>
 

<form method="post" action="options.php">

<?php
settings_fields( 'is_BusyBox_IsName_SaveInput' );
do_settings_sections( 'is_BusyBox_IsName_SaveInput' );

if ( is_rtl() ) {
 $dir = 'rtl';
}else{
 $dir = 'ltr';
}


?>
 
 
<div class="is_BusyBox_IsName_SaveChangesBtn"> 

<input type="submit" name="submit" id="submit" class="is_BusyBox_IsName_SaveChangesBtnInputSave" value="<?php _e('click here to save settings after changes', 'BusyBoxTextDoamin'); ?>" /></div>
 

<?php

if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {

$last_error_msg = "settings saved successfully.";
update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );

}


global $current_user, $wpdb;
$taxonomy = 'post_tag';
$sql = 'SELECT wt.term_id FROM '.$wpdb->terms.' wt INNER JOIN '.$wpdb->term_taxonomy.' wtt ON wt.term_id=wtt.term_id WHERE wtt.taxonomy=\''.$taxonomy.'\' AND wtt.count=0';
$all_tags = $wpdb->get_results($sql,ARRAY_A);
$all_db_tags = wp_count_terms( $taxonomy, array('hide_empty'=>false,'parent'=>0) );
$all_db_unused_tags = count($all_tags);
$all_db_tags_after_rem = $all_db_tags - $all_db_unused_tags;
 
 
$is_BusyBox_IsName_OptionUnusedTags = get_option('is_BusyBox_IsName_OptionUnusedTags');
if ($is_BusyBox_IsName_OptionUnusedTags){
if ($all_db_unused_tags !== 0){
delete_option( 'is_BusyBox_IsName_OptionUnusedTags' );

$last_error_msg = __("waiting for check your website unused tags for remove them from your database.", 'BusyBoxTextDoamin');
update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );

$res = is_BusyBox_IsName_MySQLRemUnusedTags();
 
if (!$res){
delete_option( 'is_BusyBox_IsName_OptionUnusedTags' );
$last_error_msg = __("you unused tags removed.", 'BusyBoxTextDoamin');
update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );
}

}else{
delete_option( 'is_BusyBox_IsName_OptionUnusedTags' );
$last_error_msg = __("you dont have unused tags.", 'BusyBoxTextDoamin');
update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );
}
 
 
} 
 

 
 if (
    get_option('is_BusyBox_IsName_OptionLoginLogo')
    || get_option('is_BusyBox_IsName_OptionFaviconLogo')
    || get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg')
  ){
    
 if (!preg_match('/\.(jpg|png|gif)$/i', get_option('is_BusyBox_IsName_OptionLoginLogo') )){
 delete_option('is_BusyBox_IsName_OptionLoginLogo');
 } 
 
 if (!preg_match('/\.(jpg|png|gif)$/i', get_option('is_BusyBox_IsName_OptionFaviconLogo') )){
 delete_option('is_BusyBox_IsName_OptionFaviconLogo');
 }
 
 if (!preg_match('/\.(jpg|png|gif)$/i', get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') )){
 delete_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg');
 }
 
 $last_error_msg = __("invalid URL type. the above feature disabled. try again with (jpg|png|gif) url links.", 'BusyBoxTextDoamin');
 update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );
 }
 
 
 
 
 $is_BusyBox_IsName_OptionRemAllData = get_option('is_BusyBox_IsName_OptionRemAllData');
 if ($is_BusyBox_IsName_OptionRemAllData){
 is_BusyBox_IsName_BusyBoxWQuickRemAllData();
 $last_error_msg = __("all saved plugin settings removed from website database.", 'BusyBoxTextDoamin');
 update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );
 }

 $is_BusyBox_IsName_OptionRecommendedData = get_option('is_BusyBox_IsName_OptionRecommendedData');
 if ($is_BusyBox_IsName_OptionRecommendedData){
 delete_option('is_BusyBox_IsName_OptionRecommendedData');
 is_BusyBox_IsName_BusyBoxWQuickRemAllData();
 is_BusyBox_IsName_BusyBoxOptionRecommendedData();
 $last_error_msg = __("your all saved settings removed from website database and recommended settings applied in your website.", 'BusyBoxTextDoamin');
 update_option( 'is_BusyBox_IsName_OptionLastError', $last_error_msg );
 }
 
 
 if(get_option('is_BusyBox_IsName_OptionFontDashboardStyle')){
 delete_option('is_BusyBox_IsName_OptionFontDashboardStyle');
 }
 
?>

 
<?php if (get_option( 'is_BusyBox_IsName_OptionLastError' ) ){ ?>
 
<a class="trigger_div_alert_popup" style="display:none;"></a>
<div class="hover_alert_popup">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        <p><?php echo get_option( 'is_BusyBox_IsName_OptionLastError' ) ?></p>
    </div>
</div>
 
<script type="text/javascript">

jQuery(document).ready(function($){
    
$(document).ready(function(){
    $("#trigger_div_alert_popup").click(); 
     $('.hover_alert_popup').show();
   <?php delete_option( 'is_BusyBox_IsName_OptionLastError' );  ?>
});

$(document).ready(function(){
   jQuery('#popupCloseButton').click(function () {
     <?php delete_option( 'is_BusyBox_IsName_OptionLastError' );  ?>
   });
});

$(document).ready(function(){
   jQuery('#trigger_div_alert_popup').click(function () {
     <?php delete_option( 'is_BusyBox_IsName_OptionLastError' );  ?>
   });
});

});
</script>

<?php } ?>

<div id="is_BusyBox_IsName_TabHome" class="tabcontent">

    <div class="blockquoteDante">

        <div class="blockquoteDante">
            <h3><?php _e('IMPORTANT NOTE', 'BusyBoxTextDoamin') ?></h3>
            <p>
                <?php _e('after this plugin updaded to 14.8, if you use another plugin to disable/enable Gutenberg (you must disable it), and use our plugin for disable/enable Gutenberg. on this version, gutenberg status and our plugin have directly link with (auto set first image as featued) and if you use other plugins for disable/enable gutenberg, it may make problem with our plugin performance.', 'BusyBoxTextDoamin') ?>
            </p>
            <p>
                <?php _e('so for disable/enable gutenberg, first disable other plugins(any plugins used to change gutenberg status) and then go to (gutenberg settings) by our plugin and disable or enable it.', 'BusyBoxTextDoamin') ?>
            </p>

        </div>

        <table class="form-table">

            <tr valign="top">
                <th scope="row">
                    <?php _e('remove all settings', 'BusyBoxTextDoamin'); ?>
                </th>
                <td>
                    <label class="switch">
                        <input "<?php if(get_option('is_BusyBox_IsName_OptionRemAllData')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionRemAllData">
                        <div class="slider round">
                            <span class="on">active</span><span class="off">inactive</span>
                        </div>
                    </label>
                    <br />
                    <p></p>
                    <strong><?php _e('if you enable this tickbox and save the settings, your all this plugin saved data will remove from database.', 'BusyBoxTextDoamin')?> </strong>
                </td>
            </tr>
        </table>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e('recommended settings', 'BusyBoxTextDoamin'); ?>
                </th>
                <td>
                    <label class="switch">
                        <input "<?php if(get_option('is_BusyBox_IsName_OptionRecommendedData')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionRecommendedData">
                        <div class="slider round">
                            <span class="on">active</span><span class="off">inactive</span>
                        </div>
                    </label>
                    <br />
                    <p></p>
                    <strong><?php _e('if you enable this tickbox and save the settings, your all this plugin saved data will remove from database and recommended settings will applied in your website, you also can change applied settings after this action.', 'BusyBoxTextDoamin')?> </strong>
                </td>
            </tr>

        </table>

    </div>

</div>
 

 
<div id="is_BusyBox_IsName_TabSysInfo" class="tabcontent">

    <?php include_once 'plugins/phpinfo.php'; ?>

        <div class="blockquoteDante">

            <div class="blockquoteDante">

                <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>

                <p>
                    <?php _e('you can check your php and wordpress system info from this part.', 'BusyBoxTextDoamin') ?>
                </p>

            </div>

            <div class="blockquoteDante">
                <div style="color:black; font-weight:bold;">

                    <div style="margin-top: 30px;">
                        <?php echo wp_dashboard_serverinfo(); ?>

                            <?php echo get_memcachedinfo(); ?>

                                <?php echo get_mysqlinfo(); ?>

                                    <?php echo get_phpinfo(); ?>

                                        <?php echo get_generalinfo(); ?>

                    </div>
                </div>

            </div>
        </div>

</div>





<div id="is_BusyBox_IsName_TabMain" class="tabcontent">

    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('some settings here. change your want settings and make your website better!', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('admin login logo image', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" size="40" placeholder="<?php echo preg_replace('#^https?://#', '', get_site_url() ); ?>/logo.png" name="is_BusyBox_IsName_OptionLoginLogo" value="<?php  if (get_option('is_BusyBox_IsName_OptionLoginLogo') ){echo esc_attr( get_option('is_BusyBox_IsName_OptionLoginLogo') );} ?>" />
                <p></p>
                <strong><?php _e('website login logo, put your logo image link here.<br/>larger image size will auto resize by plugin.', 'BusyBoxTextDoamin') ?></strong>
            </td>
           </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('website favicon logo', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" size="40" placeholder="<?php echo preg_replace('#^https?://#', '', get_site_url() ); ?>/logo.png" name="is_BusyBox_IsName_OptionFaviconLogo" value="<?php  if (get_option('is_BusyBox_IsName_OptionFaviconLogo') ){echo esc_attr( get_option('is_BusyBox_IsName_OptionFaviconLogo') );} ?>" />
                <p></p>
                <strong><?php _e('website favicon logo, put your logo image link here.<br/>The format for the image you have chosen must be 16x16 pixels or 32x32 pixels. The format of the image must be one of PNG, GIF, or ICO.<br/>larger image size will auto resize by plugin.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>

    </table>

    <table class="form-table">

        <tr valign="top">
            <th scope="row">
                <?php _e('mobile browser address bar color', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" name="is_BusyBox_IsName_OptionMobileColorBar" class="color-picker" value="<?php if ( get_option('is_BusyBox_IsName_OptionMobileColorBar') ){echo esc_attr( get_option('is_BusyBox_IsName_OptionMobileColorBar') );}else{ echo " #ffffff00 "; } ?>" />
                <p></p>
                <strong><?php _e('this is mobile browser address bar color, put your color code to change it. default is transparent', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>

    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('disable rss/feed on your website', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionDisableRssFeed')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionDisableRssFeed">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('disable rss/feed on your website, so use this option carefully, because the website rss/feed will be closed.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto add first image featured to rss/feed', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionAddRssFirstImageFeatured')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionAddRssFirstImageFeatured">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('when you enable this option, plugin add featured image to the feed/rss content.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('clean extra and unneeded notifics on admin panel', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionHideExtraNotif')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionHideExtraNotif">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you enable this option, plugin check admin panel for extra and unused notifics, and hide this notifics.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('disable right click on your website', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionDisableRightClick')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionDisableRightClick">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('tick this option for disable right click on your website(its safe and never effect on search engine).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('remove extra space between post content <font color="#ca2222"><br/>(global for all posts)</font>', 'BusyBoxTextDoamin'); ?></th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionRemoveExtraSpace')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionRemoveExtraSpace">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('tick this option for auto clean extra space/line between paragraph and post content.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('disable admin bar for non administrator', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionDisableAdminBarNonAdmins')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionDisableAdminBarNonAdmins">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('tick this option if you want to disable admin bar for non administrator.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>

    </table>

</div>




 
<div id="is_BusyBox_IsName_TabFeaturedImg" class="tabcontent">

    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('this settings for featured image.', 'BusyBoxTextDoamin') ?>
        </p>
        <p>
            <?php _e('after this plugin updaded to 14.8, if you use another plugin to disable/enable Gutenberg (you must disable it), and use our plugin for disable/enable Gutenberg. on this version, gutenberg status and our plugin have directly link with (auto set first image as featued) and if you use other plugins for disable/enable gutenberg, it may make problem with our plugin performance.', 'BusyBoxTextDoamin') ?>
        </p>
        <p>
            <?php _e('so for disable/enable gutenberg, first disable other plugins(any plugins used to change gutenberg status) and then go to (gutenberg settings) by our plugin and disable or enable it.', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto set first image featured options', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switchdefault">
                    <input "<?php if( get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedOptionEnableCompletely">
                    <div class="sliderdefault round">
                        <span class="ondefault">inactive</span><span class="offdefault">active</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you inactive this option, this featured will disable completely from your website. by plugin default, it is active', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('disable gutenberg editor', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switchdefault">
                    <input "<?php if( get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionDisableGutenbergCompletely">
                    <div class="sliderdefault round">
                        <span class="ondefault">inactive</span><span class="offdefault">active</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you inactive gutenberg status by this option, plugin will use (classic auto set first image as featured), otherwise it will use (gutenberg auto set first image as featured).', 'BusyBoxTextDoamin') ?></strong>
                <br/>
                <br/>
                <strong><?php _e('IMPORTANT: by plugin default, gutenberg is disabled so plugin will use (classic auto set first image as featured), if you using gutenberg, so change this option. ', 'BusyBoxTextDoamin') ?></strong>

                <strong><?php 

if(!get_option('is_BusyBox_IsName_OptionDisableGutenbergCompletely')){
_e('<br/>gutenberg status:<p style="color:#2ab934!important;display:inline!important;font-weight:bold!important;margin:5px!important;">( gutenberg is inactive on your website )</p><br/><br/>plugin will use (classic auto set first image as featured) option automatically. you will able to set custom URL. also you can select default image URL if post not has featured image by below options.', 'BusyBoxTextDoamin');
}else{
_e('<br/>gutenberg status:<p style="color:#2ab934!important;display:inline!important;font-weight:bold!important;margin:5px!important;">( gutenberg is active on your website )</p><br/><br/>plugin will use (gutenberg auto set first image as featured) option automatically. you will not able to set custom URL. also this option only looking for first image, if nothing found, you have to set it manually.', 'BusyBoxTextDoamin');
}

?></strong>

            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto hide first image featured<font color="#ca2222"><br/>(global for all posts)</font>', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionAutoHideFirstImageFeatured')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionAutoHideFirstImageFeatured">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('hide first image on all posts, when you enable this, plugin hide first image on content(its never remove, it just hide).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('show first image featured in admin post bar', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionAutoShowFirstImageFeaturedAdminBar">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('when you enable this, plugin add featured image column on admin bar (manage all post menu bar), so you can see and check your posts featured img.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('default image featured', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" size="40" placeholder="<?php echo plugins_url( 'images/noimage.png', __FILE__ ); ?>" name="is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg" value="<?php  if (get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') ){echo esc_attr( get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') );} ?>" />
                <p></p>
                <strong><?php _e('default image featured if post dont had first image or custom URL. (this is only works with classic editor).', 'BusyBoxTextDoamin') ?></strong>
                <p></p>
                    <?php
                    if (get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') ){
                    echo '<img width="30%"height="auto" src="' . get_option('is_BusyBox_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') . '" > '; 
                    }else{
                    echo '<img width="30%"height="auto" src="' . plugins_url( 'images/noimage.png', __FILE__ ) . '" > '; 
                    }
                    ?> 
            </td>
        </tr>

    </table>

</div>




<div id="is_BusyBox_IsName_TabUnusedTags" class="tabcontent">

    <div class="blockquoteDante">

        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('remove unused tags is a part of dante tool box. from this section you can remove your all unused tags from your database and cleanup your database and website from this terms.<br/>this section read unused tags from your MySQL database and clean this term_ids from this.', 'BusyBoxTextDoamin') ?>
        </p>
        <p>
            <?php _e('this is safe and only remove your unused tags, but we recommended get backup from your data base with UpdraftPlus Backup/Restore plugin.', 'BusyBoxTextDoamin') ?>
        </p>

    </div>

    <form method="post" action="options.php">

        <div class="blockquoteDante">
            <h2><?php _e('your website tags database info', 'BusyBoxTextDoamin'); ?></h2>
            <br/>

            <strong><div style="color:blue;"> <?php _e('all tags on your database: ', 'BusyBoxTextDoamin'); echo $all_db_tags; ?> </div></strong>
            <br/>
            <strong><div style="color:red"> <?php _e('unused tags on your database: ', 'BusyBoxTextDoamin'); if ($all_db_unused_tags !== 0){ echo $all_db_unused_tags; }else{ echo "<font color='MediumVioletRed'>good your website dont have unused tags.</font>"; } ?> </div></strong>
            <br/>
            <strong><div style="color:#2ab934;"> <?php _e('your real and used tags count, after clean unused tags: ', 'BusyBoxTextDoamin'); echo $all_db_tags_after_rem; ?> </div></strong>
            <br/>

        </div>

        <table class="form-table">
            <?php if ($all_db_unused_tags !== 0){ ?>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('confirm cleanup', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionUnusedTags')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionUnusedTags">
                    <div class="slider round">
                        <span class="on">im sure</span><span class="off">off</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('confirm cleanup and then save settings to cleanup unused tags.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

                <input type="submit" name="submit_OptionUnusedTags" id="submit" class="submitOptionUnusedTags" value="<?php esc_attr_e('remove my unused tags'); ?>" />

                <?php }else{ ?>
                    
                    <div class="blockquoteDante">
                    <p>
                        <?php _e('if you had any unused tags, delete button will be displayed, instead of this text.', 'BusyBoxTextDoamin'); ?>
                    </p>
                    </div>

                    <?php } ?>
        </table>

</div>






<div id="is_BusyBox_IsName_TabPostAndContent" class="tabcontent">

    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('This setting can change the content of your posts. you can get more control with this settings.', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('input before content <font color="#ca2222"><br/>(global for all posts)</font>', 'BusyBoxTextDoamin'); ?></th>
            <td>
                <?php is_BusyBox_IsName_OptionBeforeContent(); ?>
                    <p></p>
                    <strong><?php _e('put your text here, this text placed before your all posts content.<br/>html text and shortcodes supported.', 'BusyBoxTextDoamin')?> </strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('input after content <font color="#ca2222"><br/>(global for all posts)</font>', 'BusyBoxTextDoamin'); ?></th>
            <td>
                <?php is_BusyBox_IsName_OptionAfterContent(); ?>
                    <p></p>
                    <strong><?php _e('put your text here, this text placed after your all posts content.<br/>html text and shortcodes supported.', 'BusyBoxTextDoamin')?> </strong>
            </td>
        </tr>
    </table>
 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('save external image on your webhost', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionSaveExternalImage')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionSaveExternalImage">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you enable this option, plugin check post media links, if any media link not exist on your host and media library, plugin save media in your host and swap external link with new saved media url. note:(it just work when you update or publish a post).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('disable linked image on content', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionDisableImageLinks')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionDisableImageLinks">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('image can link to any links. if your theme support lightbox thumbnail and you inset any link to the img, your image will open via lightbox, if you enable this option, plugin unset all image links in the content, you dont need to unset Manually this links with search of all your post,(you can disable this feature via untick checkbox). note that, your img not open via lightbox if you enable this option).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('limiting post revisions', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionLimitingPostRevisions')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionLimitingPostRevisions">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you enable this option, plugin only save 3 latest revisions, it can help to reduce your database size.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('anti image drag', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionAntiDragImage')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionAntiDragImage">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <p></p>
                <strong><?php _e('if you enable this option, plugin dont allow to drag your all website images.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

</div>







<div id="is_BusyBox_IsName_TabLinkAndRedirect" class="tabcontent">

    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('you can get more control on your redirects, 404 page and more... with this settings.', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto refresh current page after n sec', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input style="text-align:center;" type="number" size="4" placeholder="10" name="is_BusyBox_IsName_OptionAutoRefreshPage" value="<?php if (get_option('is_BusyBox_IsName_OptionAutoRefreshPage') ){echo esc_attr( get_option('is_BusyBox_IsName_OptionAutoRefreshPage') );} ?>" />
                <p></p>
                <strong><?php _e('when you set it on 10, your website page/post auto refresh on 10 second. for example 300 is 5 minute.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('404 page auto redirect to defined url', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
            <select name='is_BusyBox_IsName_OptionAuto404RedirectSpecialPage[selected_page]'>
            <option value='0'><?php _e('- none -', 'BusyBoxTextDoamin'); ?></option>
            <?php $pages = get_pages(); ?>
            <?php foreach( $pages as $page ) { ?>
            <option value='<?php echo $page->ID; ?>' <?php selected( get_option( 'is_BusyBox_IsName_OptionAuto404RedirectSpecialPage' )['selected_page'], $page->ID ); ?> ><?php echo $page->post_title; ?></option>
            <?php }; ?>
            </select>
                <p></p>
                <strong><?php _e('create a <a target="_blank" href="'. admin_url( "post-new.php?post_type=page" ) .'">new page</a> and then select created page. when user get 404 page it will redirect to selected url.', 'BusyBoxTextDoamin')?> </strong>
             </td>
        </tr>
    </table>

 
    
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('add nofollow to external links', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionNofollowExternalLinks')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionNofollowExternalLinks">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('if you enable this, plugin set <font color="#ca2222">(rel=nofollow) + (target=_blank)</font> to only external links in the post content.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

</div>






<div id="is_BusyBox_IsName_TabCustomCssJs" class="tabcontent">
    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('you can put your custom css and javaScript from this part and These codes will be executed in the header of your site.<br/>NOTE: wrong code may <font color="#ca2222">break your website layout or may you get error 500</font>, If something goes wrong, <font color="#ca2222">you must deactive plugin from FTP/WebHost server</font>.', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <th scope="row">
            <?php _e('custom css', 'BusyBoxTextDoamin'); ?>
        </th>
        <tr valign="top">
            <td>
                <?php is_BusyBox_IsName_OptionCustomCss(); ?>
                    <p></p>
                    <strong><?php _e('NOTE: dont need to add, css open and close tags, only put your code without nothing extra tags, such as "style".', 'BusyBoxTextDoamin')?> </strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <th scope="row">
            <?php _e('custom javascript', 'BusyBoxTextDoamin'); ?>
        </th>
        <tr valign="top">
            <td>
                <?php is_BusyBox_IsName_OptionCustomJs(); ?>
                    <p></p>
                    <strong><?php _e('NOTE: dont need to add, javascript open and close tags, only put your code without nothing extra tags, such as "script".', 'BusyBoxTextDoamin')?> </strong>
            </td>
        </tr>
    </table>
</div>

 





  
  
<div id="is_BusyBox_IsName_CleanViewer" class="tabcontent">
    <div class="blockquoteDante">
        <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
        <p>
            <?php _e('enable clean post viewer. its lite and more manageable.<br/><br/>
            1-you can use of below code to display clean post viewer, just put it on <font color="#ca2222">single.php</font><br/><br/>
            <p>php:</p>
            <div class="thisisCode">
if ( function_exists("is_BusyBox_IsName_getPostViews") ) {<br/>
 echo is_BusyBox_IsName_getPostViews( get_the_ID() );<br/>
}
            </div>
            <br/>
            <p>shortcode:</p>
            <div class="thisisCode">
            [is_BusyBox_IsName_getPostViews]
            </div>
            <br/>
          
            2- you can set it to display automatically by below options. just enable (auto display views count) after or before post.', 'BusyBoxTextDoamin') ?>
        </p>
    </div>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('enable clean viewer', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_CleanViewes_Status')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_CleanViewes_Status">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('allow to plugin for collect each post viewe after enable this option <font color="#ca2222">each post viewe will be store on DataBase</font> .', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('viewe placeholder', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input style="text-align: center;" type="text" size="40" placeholder="viewe" name="is_BusyBox_IsName_CleanViewes_PlaceHolder" value="<?php if (get_option('is_BusyBox_IsName_CleanViewes_PlaceHolder') ){echo esc_attr( get_option('is_BusyBox_IsName_CleanViewes_PlaceHolder') );} ?>" />
                <p></p>
                <strong><?php _e('placeholder for (viewe) word <br/>(html, img tag or emoji are allowed)', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('fake viewes counter', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input style="text-align: center;" type="number" size="1" placeholder="0" name="is_BusyBox_IsName_CleanViewes_FakeNum" value="<?php  if (get_option('is_BusyBox_IsName_CleanViewes_FakeNum') ){echo esc_attr( get_option('is_BusyBox_IsName_CleanViewes_FakeNum') );}  ?>" />
                <p></p>
                <strong><?php _e('for example, if you save this field by number 1, user views will count sum + 1 so we have this method ->  <font color="#ca2222">(each real views + fake number)</font><br/>leave this field empty or 0 for real count.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('count admins viewes', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_CleanViewes_CountAdmins')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_CleanViewes_CountAdmins">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('allow to plugin for collect (wp-admin) viewe for each visited post .', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('count bots viewes', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_CleanViewes_CountBots')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_CleanViewes_CountBots">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('allow to plugin for collect (robot and not real user agents) viewe for each visited post.', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto display viewes count</br>(before post)', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_CleanViewes_displayBeforePost')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_CleanViewes_displayBeforePost">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('auto display viewes count (before each post).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('auto display viewes count</br>(after post)', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_CleanViewes_displayAfterPost')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_CleanViewes_displayAfterPost">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
                <strong><?php _e('auto display viewes count (after each post).', 'BusyBoxTextDoamin') ?></strong>
            </td>
        </tr>
    </table>

    </table>

</div>
  
  
  <div id="is_BusyBox_IsName_IpBlocker" class="tabcontent">
   
       <table class="form-table">
        <div class="blockquoteDante">
            <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
            <p>
                 <?php _e('this ability will checks users ip by <a target="_blank" href="//geoplugin.net">geoplugin.net</a> API, its so lite and fast. you can disable your website content for any users from difference countries. just enable your want country and all of users from that country will be redirected to your selected page.', 'BusyBoxTextDoamin') ?>
            </p>
        </div>
    </table>
 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('enable ip blocker', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionStatus_ipblock')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionStatus_ipblock">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
               <strong><?php _e('plugin will check users ip by <a target="_blank" href="//geoplugin.net">geoplugin.net</a> API.', 'BusyBoxTextDoamin')?> </strong>
             </td>
        </tr>
    </table>
    

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('redirect to', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
            <select name='is_BusyBox_IsName_OptionRedirectTo_ipblock[selected_page]'>
            <option value='0'><?php _e('- homepage -', 'BusyBoxTextDoamin'); ?></option>
            <?php $pages = get_pages(); ?>
            <?php foreach( $pages as $page ) { ?>
            <option value='<?php echo $page->ID; ?>' <?php selected( get_option( 'is_BusyBox_IsName_OptionRedirectTo_ipblock' )['selected_page'], $page->ID ); ?> ><?php echo $page->post_title; ?></option>
            <?php }; ?>
            </select>
                <p></p>
                <strong><?php _e('create a <a target="_blank" href="'. admin_url( "post-new.php?post_type=page" ) .'">new page</a> and then select created page. forbidden ip users will redirect to this address. leave empty for default html page.', 'BusyBoxTextDoamin')?> </strong>
             </td>
        </tr>
    </table>

    <table class="form-table">
        
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/iran.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_iran" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_iran'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/japan.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_japan" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_japan'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/germany.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_germany" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_germany'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/france.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_france" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_france'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/canada.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_canada" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_canada'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/turkey.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_turkey" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_turkey'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/usa.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_usa" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_usa'), true); ?> />
           </th>
            <th scope="row">
              <img style="vertical-align: middle;" src="<?php echo plugins_url( '/images/flags/china.png', __FILE__ ) ?>">
              <br/><br/>
              <input type="checkbox" name="is_BusyBox_IsName_OptionCheckBox_ipblock_china" value="1" <?php checked(1, get_option('is_BusyBox_IsName_OptionCheckBox_ipblock_china'), true); ?> />
           </th>
           
          <table class="form-table">
           <div class="blockquoteDante">
            <strong><?php _e('select your want country and save settings, <font color="#2ab934">checked</font> country ips will redirect to defined url.', 'BusyBoxTextDoamin')?> </strong>
           </div>
         </table> 
 
    </table>
      


  </div>





  <div id="is_BusyBox_IsName_blockquote" class="tabcontent">
     
 
       <table class="form-table">
        <div class="blockquoteDante">
            <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
            <p>
                <?php _e('do you want to use your own blockquote styles in your content ? its easy. just enable blockquote option and then use of each your wants settings and then it will display in your content by: <br/><div class="thisisCode">[is_BusyBox_IsName_blockquote]<font color="#2ab934">your text here</font>[/is_BusyBox_IsName_blockquote]</div>', 'BusyBoxTextDoamin') ?>
           </p>
        </div>
    </table>
 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('enable blockquote shortcode', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionStatus_blockquote')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionStatus_blockquote">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
               <strong><?php _e('allow plugin to enable below blockquote shortcodes in the content.', 'BusyBoxTextDoamin')?> </strong>
             </td>
        </tr>
    </table>

 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('enable box shadow', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <label class="switch">
                    <input "<?php if(get_option('is_BusyBox_IsName_blockquote_boxshadow')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_blockquote_boxshadow">
                    <div class="slider round">
                        <span class="on">yes</span><span class="off">no</span>
                    </div>
                </label>
             </td>
        </tr>
    </table>


    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('font style', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
            <select name='is_BusyBox_IsName_blockquote_fontstyle[selected_page]'>
            <option value='0'><?php _e('- none -', 'BusyBoxTextDoamin'); ?></option>
            <?php $pages = array('normal', 'oblique', 'italic'); ?>
            <?php foreach( $pages as $page ) { ?>
            <option value='<?php echo $page; ?>' <?php selected( get_option( 'is_BusyBox_IsName_blockquote_fontstyle' )['selected_page'], $page ); ?> ><?php echo $page; ?></option>
            <?php }; ?>
            </select>
            </td>
        </tr>
    </table>
    
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('text color', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" name="is_BusyBox_IsName_blockquote_textcolor" class="color-picker" value="<?php if ( get_option('is_BusyBox_IsName_blockquote_textcolor') ){echo esc_attr( get_option('is_BusyBox_IsName_blockquote_textcolor') );}else{ echo " #000 "; } ?>" />
           </td>
        </tr>
    </table>

 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('background color', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" name="is_BusyBox_IsName_blockquote_bgcolor" class="color-picker" value="<?php if ( get_option('is_BusyBox_IsName_blockquote_bgcolor') ){echo esc_attr( get_option('is_BusyBox_IsName_blockquote_bgcolor') );}else{ echo " #fff "; } ?>" />
           </td>
        </tr>
    </table>
    
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('border bottom color', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <input type="text" name="is_BusyBox_IsName_blockquote_bottombordercolor" class="color-picker" value="<?php if ( get_option('is_BusyBox_IsName_blockquote_bottombordercolor') ){echo esc_attr( get_option('is_BusyBox_IsName_blockquote_bottombordercolor') );}else{ echo " #fff "; } ?>" />
           </td>
        </tr>
    </table>
 
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('border radius', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
            <select name='is_BusyBox_IsName_blockquote_borderradius[selected_page]'>
            <option value='0'><?php _e('- none -', 'BusyBoxTextDoamin'); ?></option>
            <?php $pages = array('0', '5', '10', '15', '20', '25', '50'); ?>
            <?php foreach( $pages as $page ) { ?>
            <option value='<?php echo $page; ?>' <?php selected( get_option( 'is_BusyBox_IsName_blockquote_borderradius' )['selected_page'], $page ); ?> ><?php echo $page; ?></option>
            <?php }; ?>
            </select>
            </td>
        </tr>
    </table>
    
    
    
    
    
    
    
    <table class="form-table">
      <div class="blockquoteDante">
      <strong><?php _e('use of below shortcode in your content to display blockquote', 'BusyBoxTextDoamin')?> </strong>
      <br/><br/>
      <strong><?php _e('<div class="thisisCode"><font color="#ca2222">[is_BusyBox_IsName_blockquote]</font><br/><font color="#2ab934">your text here</font><br/><font color="#ca2222">[/is_BusyBox_IsName_blockquote]</font></div>', 'BusyBoxTextDoamin')?> </strong>
    </div>
   </table>
 
  </div>
  
  
<div id="is_BusyBox_IsName_TabDashboardSettings" class="tabcontent">

    <table class="form-table">
        <div class="blockquoteDante">
            <h3><?php echo '<img style="float: right;" src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > '; ?><?php _e('HELP', 'BusyBoxTextDoamin') ?></h3>
            <p>
                <?php _e('dashboard settings:<br>by default custom font family style is enabled for dashboard (wp-admin)', 'BusyBoxTextDoamin') ?>
            </p>
        </div>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('font family style', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>
                <label style="pointer-events:none;filter: blur(1px);" class="switchdefault">
                    <input "<?php if(get_option('is_BusyBox_IsName_OptionFontDashboardStyle')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_OptionFontDashboardStyle">
                    <div class="sliderdefault round">
                        <span class="ondefault">inactive</span><span class="offdefault">active</span>
                    </div>
                </label>

                <br />
                <p></p>
                <strong><?php _e('plugin will change dashboard and admin panel (wp-admin), font style to <a target="_blank" href="//github.com/rastikerdar/vazir-font">vazir-font</a>.', 'BusyBoxTextDoamin')?> </strong>
            </td>
        </tr>
    </table>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('Dashboard Style (DarkMode)', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                     <input "<?php if( get_option('is_BusyBox_IsName_DarkDashboardStyles')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_DarkDashboardStyles">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
              <strong><?php _e('allow to plugin for change dashboard to DarkMode style. skins, effects and more feature will be enable.', 'BusyBoxTextDoamin')?> </strong>
           </td>
        </tr>
    </table>


    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <?php _e('Login Style (DarkMode)', 'BusyBoxTextDoamin'); ?>
            </th>
            <td>

                <label class="switch">
                    <input "<?php if( get_option('is_BusyBox_IsName_LoginStyles')) { echo $checked = ' checked="checked " '; } ?>" type="checkbox" name="is_BusyBox_IsName_LoginStyles">
                    <div class="slider round">
                        <span class="on">active</span><span class="off">inactive</span>
                    </div>
                </label>

                <br/>
                <br/>
             <strong><?php _e('allow to plugin for change login style to Dark Mode.', 'BusyBoxTextDoamin')?> </strong>
          </td>
        </tr>
    </table>
    
 
</div>


</form>
</div>

<?php
} 
 
  
function is_BusyBox_IsName_HtmlCredits() {
?>

<div class="option-css-dante-option-body">
    
<table class="form-table">

 

 <div class="blockquoteDante">

<?php echo '<img style="display: block;margin: 0 auto;width: 100%;" src="' . plugins_url( 'images/cover.png', __FILE__ ) . '" > '; ?> </a>

<h3><?php _e('WordPress BusyBox', 'BusyBoxTextDoamin') ?></h3>
<p> <?php _e('
<b><font size="2" color="#2ab934">Description</font></b><br/>
this plugin help you for auto set first image as featured image, also it have more than +20 effect and actions for your website. plugin is 100% auto and maked with wordpress standard code.
just enable your want effect from plugin control panel and its done.
<br/><br/>
<b><font size="2" color="#ca2222">Important Note</font></b><br/>
1 – this plugin will not cause any pressure on your server. All functions, hooks and ect, will only be activated when requested by the user.
<br/><br/>
2 – All hooks and so on, use the latest version of WordPress version. If you find the old hook, effects or bugs, report it to solve the problem.
<br/><br/><b><font size="2" color="blue">suggestion or ideas</font></b><br/>
if you have a idea or suggestion about this plugin, I’ll be happy to hear it, i can add more hook and effects by your suggest, my goal is collected all important WordPress hooks and filters in one plugin.
<br/><br/>
you can send your offer, qustion or idea for this plugin on wordpress so if you want i add your features/idea to this plugin, please send it to plugin support in wordpress. also i can support or get your idea at (BehroozDante@gmail.com) or instagram (@BehroozDante) direct.
', 'BusyBoxTextDoamin') ?></p>
</div>
 
 
<div style="text-align:center;">
<h3>
<div style="color:red;">
<a href="//wordpress.org/support/plugin/auto-set-first-image-as-featured/reviews/" target="_blank">
<?php _e('[ send your suggestion, rate or feedback for this plugin on wordpress ]', 'BusyBoxTextDoamin') ?> 
</a>
</div>
</h3>
<a href="//wordpress.org/support/plugin/auto-set-first-image-as-featured/reviews/" target="_blank">
<?php echo '<img style="vertical-align: middle;" src="' . plugins_url( 'images/rateme.png', __FILE__ ) . '" > '; ?> </a>
</div>
 
<div style="text-align:center;">
<h4>
<div>
<?php _e('this plugin have any featured work and this works like other plugins so you can remove other plugins and only use of this, we recommend to do this<br/>because this plugin can do that works so your website cpu and speed can be faster, if you use of one plugin. also it can prevent potential interference with other plugins', 'BusyBoxTextDoamin') ?> 
</div>
</h4>
</div>
 
</hr>

<br/><br/>
<strong><?php _e('this plugin made by <a href="//instagram.com/BehroozDante/" target="_blank">BehroozDante</a> . its FREE and made for non-commercial purposes.', 'BusyBoxTextDoamin') ?></strong>

<br/>
 <br/>
<div style="text-align:left;">
<a href="//instagram.com/BehroozDante/" target="_blank">
<?php echo '<img style="vertical-align: middle;" src="' . plugins_url( 'images/myiG.png', __FILE__ ) . '" > '; ?> </a>
</div> 
 
 </table>
 </div>
 
  </div>
  
<?php
} 
 
/*
 #handle php into the html
*/

 
function is_BusyBox_IsName_OptionBeforeContent() { 
 $options = get_option( 'is_BusyBox_IsName_OptionBeforeContent' );
 $editor_settings = array('textarea_name' => 'is_BusyBox_IsName_OptionBeforeContent', 'media_buttons' => true, 'editor_height' => 220 );
 wp_editor( $options, 'is_BusyBox_IsName_OptionBeforeContent', $editor_settings );
}
 
function is_BusyBox_IsName_OptionAfterContent() {
 $options = get_option( 'is_BusyBox_IsName_OptionAfterContent' );
 $editor_settings = array('textarea_name' => 'is_BusyBox_IsName_OptionAfterContent', 'media_buttons' => true, 'editor_height' => 220 );
 wp_editor( $options, 'is_BusyBox_IsName_OptionAfterContent', $editor_settings );
}
 

function is_BusyBox_IsName_OptionCustomCss() { 
$options = get_option('is_BusyBox_IsName_OptionCustomCss');
$text_placeholder = 'put your css here, you dont need to add <style> on your first code and end with </style>.

#example 1 :

h1 {
color:red;
}
p {
color:blue;
}




#example 2 :

 
@media only screen and (max-width: 600px) {

h1 {
color:red;
}
p {
color:blue;
}

} 
 

';
echo "<textarea  name='is_BusyBox_IsName_OptionCustomCss[text_area]' placeholder='".$text_placeholder."' rows='30' cols='70' type='textarea'>{$options['text_area']}</textarea>";
}

 
function is_BusyBox_IsName_OptionCustomJs() { 
$options = get_option('is_BusyBox_IsName_OptionCustomJs');
$text_placeholder = 'put your js here, you dont need to add <script> on your first code and end with </script>.

#example: 

var head = document.getElementsByTagName("head")[0];
var script = document.createElement("script");
script.type = "text/javascript";
script.async=1;
script.src = "https://BehroozDante.ir/loader.js" ;
head.appendChild(script);
 

';
echo "<textarea name='is_BusyBox_IsName_OptionCustomJs[text_area]' placeholder='".$text_placeholder."' rows='30' cols='70' type='textarea'>{$options['text_area']}</textarea>";
}


// run hooks
include_once 'hook.php';

// deactivate hook
register_deactivation_hook( __FILE__, 'is_BusyBox_IsName_BusyBoxWQuickRemAllData' );
 
/*Author URI: https://www.instagram.com/BehroozDante/  |  Email: BehroozDante@gmail.com */
?>
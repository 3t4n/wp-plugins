<?php
/**
  * Plugin Name: Analytics_GTAG
  * Plugin URI: http://www.analytics-sem-tutorials.de/
  * Author: Sebastian Offers
  * Author URI: http://www.analytics-sem-tutorials.de/
  * Description: Google Anlytics für Wordpress, erlaubt es den Google Tag (GTAG) zu implementieren.
  * Tags: google analytics plugin, analytics für die website, Google tag implementieren, gtag implementieren
  * Version: 1.8.1
  * License: GPLv2 or later
  * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
 **/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



add_action('admin_menu', 'AGgaw_create_menu');
function AGgaw_create_menu()
{
   add_menu_page('Google Analytics Settings', 'Google Analytics', 'administrator', 'google-analytics-settings-page', 'fn_AGgaw_settings_page', 'dashicons-chart-bar');
   add_action( 'admin_init', 'fn_AGgaw_register_mysettings');
   add_action( 'admin_init', 'fn_AGet_register_mysettings');
   add_action( 'admin_init', 'fn_AGbn_register_mysettings');
}

/*****register Banner settings options****/
function fn_AGbn_register_mysettings()
{
   register_setting( 'AGbn-settings-group', 'AGbn_DatenschutzSeite' );
   register_setting( 'AGbn-settings-group', 'AGbn_TextBanner' );
   register_setting( 'AGbn-settings-group', 'AGbn_fCookie' );
   register_setting( 'AGbn-settings-group', 'AGbn_sCookie' );
   register_setting( 'AGbn-settings-group', 'AGbn_aCookie' );
   register_setting( 'AGbn-settings-group', 'AGbn_wCookie' );
   register_setting( 'AGbn-settings-group', 'AGbn_Design' );
   register_setting( 'AGbn-settings-group', 'AGbn_BannerDesign' );
   register_setting( 'AGbn-settings-group', 'AGbn_Position' );
}

/*****register Event settings options****/
function fn_AGet_register_mysettings()
{
   register_setting( 'AGet-settings-group', 'AGet_form7' );
   register_setting( 'AGet-settings-group', 'AGet_Scroll' );
   register_setting( 'AGet-settings-group', 'AGet_youtube' );
  
}

/*****register settings options****/
function fn_AGgaw_register_mysettings()
{
   register_setting( 'AGgaw-settings-group', 'AGgaw_analytics_id' );
   register_setting( 'AGgaw-settings-group', 'AGgaw_facebook_id' );                                           
   register_setting( 'AGgaw-settings-group', 'AGgaw_disable_track' );
   register_setting( 'AGgaw-settings-group', 'AGgaw_opt_out' );
   register_setting( 'AGgaw-settings-group', 'AGgaw_annonymize_ip' );
   register_setting( 'AGgaw-settings-group', 'AGgaw_youtube' );
   register_setting( 'AGgaw-settings-group', 'AGgaw_language' );
}



/*****settings options****/
function fn_AGgaw_settings_page()
{
   require plugin_dir_path(__FILE__) . 'options.php';
}
$AGet_form7 = get_option('AGet_form7', 'Ja');

$AGet_youtube = get_option('AGet_youtube', 'Ja');
$AGgaw_disable = get_option('AGgaw_disable_track', 'Nein');
$AGgaw_optout = get_option('AGgaw_opt_out', 'Ja');
$AGbn_DatenschutzSeite = get_option('AGbn_DatenschutzSeite');

function fn_gaw_analytics() {
  $AG_ViewPAge_url = plugins_url( 'AGviewpage.js', __FILE__ );
  $AGweb_property_id = get_option('AGgaw_analytics_id');
?>
<script src="https://www.googletagmanager.com/gtag/js?id=<?php echo $AGweb_property_id ?>"></script>; 
<script src="<?php echo $AG_ViewPAge_url ?>"> </script>; 
<?php
}
if ( $AGgaw_disable == 'Ja' || $AGgaw_disable == 'BannerFacebook' || $AGgaw_disable == 'Banner') {
   add_action('wp_head', 'fn_gaw_analytics');
}


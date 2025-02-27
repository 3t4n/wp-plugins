<?php
/*
Plugin Name: AI-SEO KISS
Plugin URI: https://meowapps.com
Description: SEO for AI-Driven Search. As AI takes the lead in search technology, AI-SEO KISS helps you adapt to this evolution by removing traditional SEO hassles and empowering you to create outstanding content for the AI era. Keep it simple stupid, for the win!
Version: 0.1.9
Author: Jordy Meow
Author URI: https://jordymeow.com
Text Domain: seo-kiss

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

define( 'SEOKISS_VERSION', '0.1.9' );
define( 'SEOKISS_PREFIX', 'seokiss' );
define( 'SEOKISS_DOMAIN', 'seo-kiss' );
define( 'SEOKISS_ENTRY', __FILE__ );
define( 'SEOKISS_PATH', dirname( __FILE__ ) );
define( 'SEOKISS_URL', plugin_dir_url( __FILE__ ) );

function upgrade_to_seo_engine() {
  add_thickbox();
  echo '<div class="notice notice-error">';
  echo '<h2>Important: SEO KISS is now <b>SEO Engine! ✌️</b></h2>';
  echo '<p><b>Please remove SEO KISS from your WordPress, and install <a href="https://wordpress.org/plugins/seo-engine/" target="_blank">SEO Engine</a> instead.</b> SEO Engine is the new version of SEO KISS, do not worry, it will keep all your settings and data and it is the continuation of this plugin.</p>';
  $plugin_name = 'seo-engine';
  $install_link = esc_url(network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $plugin_name . '&TB_iframe=true&width=600&height=550'));
  echo '<a class="button button-primary thickbox" style="margin-top: 10px;" href="' . $install_link . '">Install SEO Engine</a>';
  echo '<br /><br />';
  echo '</div>';
}

add_action('admin_notices', 'upgrade_to_seo_engine');


require_once( 'classes/init.php' );

?>

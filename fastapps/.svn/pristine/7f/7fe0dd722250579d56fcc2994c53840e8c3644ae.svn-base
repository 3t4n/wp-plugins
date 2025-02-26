<?php
/**
* Plugin Name: <b>FastApps Plugin</b>
* Plugin URI: http://fastapps.mu
* Description: Turns your WordPress website into a native mobile application that you can download and install on your phone and eventually publish on the app stores with a push notification service. 
* Version: 1.4.0
* Author: Reefcube
* Author URI: http://reefcube.mu
* License: Reefcube FastApps
*/
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
add_action('admin_menu', 'wpfapps_admin_menu');
add_action( 'admin_init', 'wpfapps_admin_styles' );
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
function add_action_links ( $links ) {
  $mylinks = array(
  '<a href="' . admin_url( 'admin.php?page=fast-apps' ) . '">Settings</a>',
  );
  return array_merge( $links, $mylinks );
}
function wpfapps_admin_menu() {
  add_menu_page('FastApps ', 'FastApps ', 'administrator', 'fast-apps', 'wpfapps_settings_page', plugins_url('images/favicon_wpfastapps.png', __FILE__) );
}
function wpfapps_admin_styles() {
   /* Register our stylesheet. */
   wp_register_style( 'fastapps-style', plugins_url('css/style.css', __FILE__) );
   wp_register_style( 'fastapps-font', '//fonts.googleapis.com/css?family=Roboto:400,500,700' );
   wp_enqueue_style('fastapps-style');
   wp_enqueue_style('fastapps-font');
}
function wpfapps_settings_page() {
global $wpdb;
global $success;
$get_url = get_site_url();
$user_info = get_userdata(1);
$fast_username = $user_info->user_nicename;
$fast_email = get_bloginfo( 'admin_email' );
$fast_site_name = get_bloginfo( 'name' );
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<div class="wrap" id="fastapps-page">';
  echo "<h3>" . __( 'Turn your responsive WordPress site into a native mobile application', 'oscimp_trdom' ) . "</h3>"; 
?>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <section id="presentation">
    <div class="wrapper">
      <ul>
        <li>
          <h3>Check if your WordPress is fully responsive</h3>
          <p>Correct if necessary the values filled automatically by the plugin. Enter a password and send for generation</p>
        </li>
        <li>
          <h3>Wait for the app to be created</h3>
          <p>Hundreds of websites are in the waiting queue. This is a semi automatic process, so be patient.</p>
        </li>
        <li>
          <h3>Download the app from Fastapps.mu</h3>
          <p>Sign in directly onto the website and check your dashboard for instructions</p>
        </li>
      </ul>
      <ul class='right'>
        <li>
          <p><a href="https://www.fastapps.mu/index.php#packages" target="_blank">See pricing</a>.</p>
        </li>
        <li>
          <p>If you want to skip the queue, check our affordable pricing including publishing and push notifications</p>
        </li>
        <li>
          <p>*Fastapps for iOS is not available yet</p>
        </li>
      </ul>
    </div>
  </section>
  <section id='form'>
    <a href="https://www.fastapps.mu/wp_register.php?name=<?php echo $fast_username; ?>&email=<?php echo $fast_email; ?>" target="_blank" class="button" style="text-align: center;line-height:45px;">Get in the queue for a free app</a>
  </section>
  <section id='website'>
    <div class='wrapper'></div>
  </section>
</div>
<?php
} //close function



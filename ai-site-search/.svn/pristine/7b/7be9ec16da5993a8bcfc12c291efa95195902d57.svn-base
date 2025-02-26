<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

function doculyticsBaseUrl() {
  return "https://doculytics.ai";
}
function doculyticsSearchScriptUrl() {
  return doculyticsBaseUrl() . "/js/site_search.js?platform=wordpress&access_token=" . doculyticsAccessToken();
}
function doculyticsManageUrl() {
  return doculyticsBaseUrl() . "/wordpress/auth?platform=wordpress&access_token=" . doculyticsAccessToken()."&resource_name=".urlencode(get_bloginfo('name'))."&resource_url=".urlencode(home_url());
}
function doculyticsAccessToken() {
  $doculytics_access_token = get_option('doculytics_access_token');
  //If not set
  if( empty($doculytics_access_token) ){
    //generate UUID
    $doculytics_access_token = 'wp_'.uniqid();
    update_option('doculytics_access_token', $doculytics_access_token);
  }
  return $doculytics_access_token;
}

function initialize_doculytics_search_js(){
  ?>
  <script>
    (function(d){
      var js, id = 'doculytics-js', ref = d.getElementsByTagName('script')[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = '<?php echo str_replace( '&#038;', '&', esc_url(doculyticsSearchScriptUrl())); ?>';
      ref.parentNode.insertBefore(js, ref);
    }(document));
  </script>
  <?php
}
//CALL INITIALIZE
add_action( 'wp_enqueue_scripts', 'initialize_doculytics_search_js' );


//ADD MENUS
add_action( 'admin_menu', 'doculytics_search_menu' );
function doculytics_search_menu() {
  add_menu_page( 'AI Site Search', 'AI Site Search', 'manage_options', 'doculytics-search-settings', 'doculytics_search_configuration', plugins_url('/images/doculytics-icon.png',__FILE__));
}
function doculytics_search_configuration() {
  echo '<br><br><br><br><center><h2>Redirecting to Doculytics Dashboard...</h2></center>';
  echo '<script>';
  echo "window.location.assign('".str_replace( '&#038;', '&',esc_url(doculyticsManageUrl()))."')";
  echo '</script>';
}
  
$current_date = new DateTime();
$current_timestamp = $current_date->format('U');
add_option('doculytics_install_time', $current_timestamp, '', 'yes' );	//Add a global doculytics token: (This will do nothing if the option already exists)

//Redirecting to landing page when plugin is activated
register_activation_hook(__FILE__, 'doculytics_site_search_activate');
add_action('admin_init', 'doculytics_site_search_redirect');
function doculytics_site_search_activate() {
  add_option('doculytics_site_search_activation_redirect', true);
}
function doculytics_site_search_redirect() {
  if (get_option('doculytics_site_search_activation_redirect', false)) {
    delete_option('doculytics_site_search_activation_redirect');
    wp_redirect(doculyticsManageUrl());
  }
}

?>

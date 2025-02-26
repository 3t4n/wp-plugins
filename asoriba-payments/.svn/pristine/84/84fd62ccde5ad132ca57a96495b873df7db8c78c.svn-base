<?php
   /**
    * The plugin bootstrap file.
    *
    * This file is read by WordPress to generate the plugin information in the plugin
    * admin area. This file also includes all of the dependencies used by the plugin,
    * registers the activation and deactivation functions, and defines a function
    * that starts the plugin.
    *
    * @package   Asoriba_Payments
    * @author    Asoriba <support@asoriba.com>
    * @license   GPL-3.0+
    * @link      https://asoriba.com
    * @copyright 2016 Asoriba
    *
    * @wordpress-plugin
    * Plugin Name:       Asoriba Payments
    * Plugin URI:        http://asoriba.com
    * Description:       The Asoriba Payments plugin is designed purposely to assist Churches and Christian Bodies receive donations and raise funds from their websites.You should have an account on Asoriba to make use of this plugin.
    * Version:           1.0.55
    * Author:            Asoriba
    * Author URI:        http://asoriba.com
    * Text Domain:       asoriba-payments
    * License:           GPL-3.0+
    * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
    * Domain Path:       /lang
    */
   
   if (!defined('ABSPATH')) {
     die;
   }
   
   
   require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
   
   
   
   function log_me($message) {
     if (WP_DEBUG === true) {
       if (is_array($message) || is_object($message)) {
         error_log(print_r($message, true));
       } else {
         error_log($message);
       }
     }
   }
   
   /**
   * Get all values from specific key in a multidimensional array
   *
   * @param $key string
   * @param $arr array
   * @return null|string|array
   */
   
   
   
   //Adds a menu to the admin menu
   add_action( 'admin_menu', 'asoriba_menu_page' );
   
   function asoriba_menu_page() {
   
     add_menu_page( 'asoriba', 'Asoriba', 'manage_options',
       'asoriba_menu_page_slug', 'asoriba_pointsoptions_do_page',
       plugins_url( '/views/images/icon.png' , __FILE__ ), 55 );
   
   }
   add_action('admin_init', 'asoriba_pointsoptions_init' );
   function asoriba_pointsoptions_init(){
     register_setting( 'asoriba_settings_options', 'asoriba_options_branch' );
     register_setting( 'asoriba_settings_key', 'asoriba_client_email' );
     register_setting( 'asoriba_settings_key', 'asoriba_secret_key' );
     register_setting( 'asoriba_settings_key', 'asoriba_client_logo' );
     register_setting( 'asoriba_settings_key', 'asoriba_client_id' );
   }
   
   
   
   add_action('admin_menu', 'register_asoriba_about_page');
   
   function register_asoriba_about_page() {
     add_submenu_page( 'asoriba_menu_page_slug',
       'Asoriba Payments', 'Dashboard', 'manage_options', 'asoriba_menu_page_slug' );
   
     add_submenu_page( 'asoriba_menu_page_slug',
       'Asoriba Payments', 'Settings', 'manage_options', 'asoriba_key_slug',
       'asoriba_submenu_key_callback' );
   }
   
   
   /**
    * Add action links to the plugin list for Page Builder.
    *
    * @param $links
    * @return array
    */
   function asoriba_panels_plugin_action_links($links) {
     // unset( $links['edit'] );
     $setting_url="admin.php?page=asoriba_key_slug";
     $settings_link = '<a href="' . admin_url($setting_url). '">Settings</a>';   
     array_unshift($links, $settings_link);
     return $links; 
   }
   add_action('plugin_action_links_' . plugin_basename(__FILE__), 'asoriba_panels_plugin_action_links');
   
   
   function asoriba_pointsoptions_do_page() {
     ?>
<div class="wrap">
   <h2>Manage your Payments here</h2>
   <?php
      $key = get_option('asoriba_secret_key');
      if(($key == "undefined"))
      {
        echo '<div class="error" style="margin-left: auto"><div style="margin: 10px auto;"> Asoriba Payments is not properly configured.' .
        ' <a href="' . admin_url( 'admin.php?page=asoriba_key_slug' ) . '">' . 'Set up' .
        '</a>'.
        '</div></div>';
      }
      
      else
      {
        echo get_option('asoriba_key');
        ?>
   <?php
      $response = wp_remote_post( 'https://api.asoriba.com/api/v1.0/plugins/accounts/get_widget_data/', array(
        'method' => 'GET',
        'timeout' => 45,
        'redirection' => 5,
        'blocking' => true,
        'headers' => array("Content-type" => "application/json", 
          "X-ASORIBA-WIDGET-CLIENT-SOURCE" => "wordpress", 
          "X-ASORIBA-WIDGET-SECRET-KEY" => get_option('asoriba_secret_key'), 
          "X-ASORIBA-WIDGET-CLIENT-ID" => get_option('asoriba_client_id'),
          )
        )
      );
      
      if ( is_wp_error( $response ) ) {
      
      
      }
      else {
      
       $m =  (json_encode($response['body'], true));
       $m = stripslashes($m);
       $m=substr($m,1,(strlen($m)-1));
       $m=substr($m,0,-1);
       $m =  json_decode($m, true);
      // var_dump ($m["results"]);
       $gateways = $m["results"][2]["gateways"];
       $branches = $m["results"][1]["branches"];
       $mmmm = json_encode($branches, false);
      // var_dump(json_decode($mmmm, false));
       $mmmm = json_decode($mmmm, false);
      //create a new array
       $secondArray = Array();
       foreach($mmmm as $value){
        $secondArray[$value->id] = $value->branch_name;
      }
      }
      
      if (get_option('asoriba_options_branch') != "") {
      ?>
   <form method="post" id="" action="options.php">
      <?php settings_fields('asoriba_settings_options'); ?>
      <table class="form-table">
         <tr valign="top">
            <th scope="row">Your current branch:</th>
            <!-- http://stackoverflow.com/questions/4742903/php-find-entry-by-object-property-from-a-array-of-objects -->
            <td>
               <label id="" name="asoriba_options_branch" type="text"><?php echo $secondArray[get_option('asoriba_options_branch')]; ?></label>
            </td>
         </tr>
         <tr valign="top">
            <th scope="row">Change Branch:</th>
            <td>
               <select class="asoriba_options_branch_select" id="asoriba_options_branch_select">
                  <option selected="selected" style=" display: none;">Select a branch</option>
                  <?php 
                     foreach($branches as $key => $item) {
                       ?>
                  <option value="<?php echo $item['id']; ?>"><?php echo $item['branch_name']; ?></option>
                  <?php
                     }
                     ?>
               </select>
               <input id="asoriba_options_branch" name="asoriba_options_branch" value="<?php echo get_option('asoriba_options_branch'); ?>" type="hidden"/>
            </td>
         </tr>
      </table>
      <p class="submit">
         <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
   </form>
   <?php
      }
      else {
      ?>
   <form method="post" id="" action="options.php">
      <?php settings_fields('asoriba_settings_options'); ?>
      <table class="form-table">
         <tr>
            <td colspan="2">
               <label for="auto_enroll_0" style="display: inline-block"><?php _e('Just some few settings to get you started.', 'woocommerce-beans' ); ?>
               </label>
            </td>
         </tr>
         <tr valign="top">
            <th scope="row">Select Branch</th>
            <td>
               <select class="asoriba_options_branch_select" id="asoriba_options_branch_select">
                  <?php 
                     foreach($branches as $key => $item) {
                       ?>
                  <option value="<?php echo $item['id']; ?>"><?php echo $item['branch_name']; ?></option>
                  <?php
                     }
                     ?>
               </select>
               <input id="asoriba_options_branch" name="asoriba_options_branch" value="<?php echo get_option('asoriba_options_branch'); ?>" type="hidden"/>
            </td>
         </tr>
      </table>
      <p class="submit">
         <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
   </form>
</div>
<?php
   }
   }
   }
   
   
   function asoriba_submenu_key_callback() {
     ?>
<style>
   div#spinner-asoriba
   {
   display: none;
   width:100px;
   height: 100px;
   position: fixed;
   top: 50%;
   left: 50%;
   background:url(http://www.arialinmobiliaria.com/images/spinner.gif) no-repeat center rgba(255, 255, 255, 0);;
   text-align:center;
   padding:20px;
   font:normal 16px Tahoma, Geneva, sans-serif;
   /*border:1px solid #666;*/
   margin-left: -50px;
   margin-top: -50px;
   z-index:2;
   overflow: auto;
   }
   .asoriba-split{
   width: 50%;
   }
   .asoriba-logo{
   width: 50%;
   }
</style>
<div id="spinner-asoriba">
</div>
<div class="wrap">
   <!-- <img id="asoriba_logo" src="https://www.asoriba.com/images/logo.png"  > -->
   <h2>Authenticate your Asoriba account </h2>
   <?php if (get_option('asoriba_secret_key') == "") {
      ?>
   <div class="">
      <div>
         <ul>
            <li>Enter your email and password</li>
         </ul>
      </div>
      <form method="post" id="asoribaSendkey" action="options.php" class="" align="left">
         <table>
            <tr>
               <td>
                  <?php settings_fields('asoriba_settings_key'); ?>
                  <table class="form-table">
                     <tr valign="top">
                        <p class="description" id="auth_desc" style="display: none; color: red;">Authenticating...</p>
                        <th scope="row">Email</th>
                        <td>
                           <input type="text" id= "asoriba_client_email" name="asoriba_client_email" value="<?php echo get_option('asoriba_client_email'); ?>" />
                        </td>
                        <td>
                           <input id="asoriba_secret_key" name="asoriba_secret_key" value="<?php echo get_option('asoriba_secret_key'); ?>" type="hidden"/>
                        </td>
                     </tr>
                     <tr valign="top">
                        <th scope="row">Password</th>
                        <td>
                           <input type="password" id="asoriba_client_password" name="asoriba_client_password" />
                           <p class="description" id="home-descri">
                              <?php _e( "Don''t have an Asoriba account? 
                                 <a href='http://asoriba.com'>Sign Up here </a> " ); ?>
                           </p>
                        </td>
                        <td>
                           <input id="asoriba_client_id" name="asoriba_client_id" value="<?php echo get_option('asoriba_client_id'); ?>" type="hidden"/>
                           <input id="asoriba_client_logo" name="asoriba_client_logo" value="<?php echo get_option('asoriba_client_logo'); ?>" type="hidden"/>
                        </td>
                     </tr>
                  </table>
                  <p class="submit">
                     <input type="submit" class="button-primary" id="asoribaSendkey" value="<?php _e('Save Changes') ?>" />
                  </p>
               </td>
               <td>
                  <img class="asoriba-logo" src="<?php echo get_option('asoriba_client_logo'); ?>" alt="" id="asoriba_client_logo_image">
               </td>
            </tr>
         </table>
      </form>
   </div>
   <?php
      }
      else {
      ?>
   <div id="asoribaLogoutDiv">
    <?php
      $response = wp_remote_post( 'https://devapi.asoriba.com/api/v1.0/plugins/accounts/get_widget_data/', array(
        'method' => 'GET',
        'timeout' => 45,
        'redirection' => 5,
        'blocking' => true,
        'headers' => array("Content-type" => "application/json", 
          "X-ASORIBA-WIDGET-CLIENT-SOURCE" => "wordpress", 
          "X-ASORIBA-WIDGET-SECRET-KEY" => get_option('asoriba_secret_key'), 
          "X-ASORIBA-WIDGET-CLIENT-ID" => get_option('asoriba_client_id'),
          )
        )
      );
      
      if ( is_wp_error( $response ) ) {
      
      
      }
      else {
      
       $m =  (json_encode($response['body'], true));
       $m = stripslashes($m);
       $m=substr($m,1,(strlen($m)-1));
       $m=substr($m,0,-1);
       $m =  json_decode($m, true);
      // var_dump ($m["results"]);
       $gateways = $m["results"][2]["gateways"];
       $branches = $m["results"][1]["branches"];
       $mmmm = json_encode($branches, false);
      // var_dump(json_decode($mmmm, false));
       $mmmm = json_decode($mmmm, false);
      //create a new array
       $secondArray = Array();
       foreach($mmmm as $value){
        $secondArray[$value->id] = $value->branch_name;
      }
      }
      
      ?>
      <table class="tg">
  <tr>
    <th class="tg-yw4l"></th>
    <th class="tg-yw4l"></th>
  </tr>
  <tr>
    <td class="tg-yw4l">
      Welcome onboard, <strong><?php echo $secondArray[get_option('asoriba_options_branch')]; ?> </strong> 

      <ol>
         <li>Click on this link to manage <a href="<?php echo admin_url( 'admin.php?page=asoriba_menu_page_slug' ); ?>">your dashboard</a> </li>
         <li>To manage your widget, go to Appearance -> Widgets to display your payment widget</li>
      </ol>
      Or you can logout:
      <p class="submit">
         <input type="submit" class="button-primary" id="asoribaLogout" value="<?php _e('Log out') ?>" />
      </p>
    </td>
    <td class="tg-yw4l">
        <img class="asoriba-logo" src="<?php echo get_option('asoriba_client_logo'); ?>" alt="" id="asoriba_client_logo_image">
    </td>
  </tr>
</table>
   </div>
   <?php
      }
      ?>
   <div class="asoriba_main_setting_div hidden" id="asoriba_main_setting_div">
      <div>
         <ul>
            <li>Enter your email and password</li>
         </ul>
      </div>
      <form method="post" id="asoribaSendkey1" action="options.php" class="" align="left">
         <table>
            <tr>
               <td>
                  <?php settings_fields('asoriba_settings_key'); ?>
                  <table class="form-table">
                     <tr valign="top">
                        <p class="description" id="auth_desc1" style="display: none; color: red;">Authenticating...</p>
                        <th scope="row">Email</th>
                        <td>
                           <input type="text" id= "asoriba_client_email1" name="asoriba_client_email" value="<?php echo get_option('asoriba_client_email'); ?>" />
                        </td>
                        <td>
                           <input id="asoriba_secret_key1" name="asoriba_secret_key" value="<?php echo get_option('asoriba_secret_key'); ?>" type="hidden"/>
                        </td>
                     </tr>
                     <tr valign="top">
                        <th scope="row">Password</th>
                        <td>
                           <input type="password" id="asoriba_client_password1" name="asoriba_client_password" />
                           <p class="description" id="home-descri">
                              <?php _e( "Don''t have an Asoriba account? 
                                 <a href='http://asoriba.com'>Sign Up here </a> " ); ?>
                           </p>
                        </td>
                        <td>
                           <input id="asoriba_client_id1" name="asoriba_client_id" value="<?php echo get_option('asoriba_client_id'); ?>" type="hidden"/>
                           <input id="asoriba_client_logo1" name="asoriba_client_logo" value="<?php echo get_option('asoriba_client_logo'); ?>" type="hidden"/>
                        </td>
                     </tr>
                  </table>
                  <p class="submit">
                     <input type="submit" class="button-primary" id="asoribaSendkey1" value="<?php _e('Save Changes') ?>" />
                  </p>
               </td>
               <td>
                  <img class="asoriba-logo" src="<?php echo get_option('asoriba_client_logo'); ?>" alt="" id="asoriba_client_logo_image1">
               </td>
            </tr>
         </table>
      </form>
   </div>
</div>
<?php
   }
   
   
   
   
   
   
   
   
   function asoriba_options_general_add_js() {
     ?>
<script type="text/javascript">
   jQuery(document).ready(function($){
     $("input#asoribaSendkey").click(function(event){
       event.preventDefault();
       // console.log("In form");
       var email = $("input#asoriba_client_email").val();
       var password = $("input#asoriba_client_password").val();
       $("#auth_desc").show();
   
       jQuery.param({ email: email, passowrd : password});
   
       // console.log(email + ' ' + password);
       $.ajax({
         async: true,
         url: 'https://api.asoriba.com/api/v1.0/plugins/accounts/sign_in/',
         method: 'POST',
         crossDomain: true,
         crossOrigin: true,
         processData: false,
         beforeSend: function () { showProgress();},
         contentType: 'application/json',
         headers: {
           "X-ASORIBA-WIDGET-CLIENT-SOURCE": "wordpress",
           "content-type": "application/json",
         },
         data: JSON.stringify( { "email": email, "password": password } ),
         success: function (resp) {
                           // console.log(resp);
                           // console.log(JSON.stringify(resp));
                           // console.log((resp.results[0].user_info.church.logo));
                           document.getElementById("asoriba_secret_key").value = (resp.results[0].user_info.secret_key);
                           document.getElementById("asoriba_client_id").value = (resp.results[0].user_info.client_id);
                           document.getElementById("asoriba_client_logo").value = resp.results[0].user_info.church.logo;
                           var test = $("input#asoriba_secret_key").val();
                           var image = (resp.results[0].user_info.avatar);
                           $("#asoriba_logo").attr("src", image);
                           // document.getElementById("asoriba_client_logo").src = resp.results[0].user_info.church.logo;
   
                           if(test == "undefined")
                           {
                             console.log("not submitting");
                             $("#auth_desc").text("Invalid credentials!");
                           }
                           else
                           {
                             hideProgress();
                             $("#auth_desc").text("Authenticating successful!");
                             $("#auth_desc").css('color', 'black');
                             $("form#asoribaSendkey").submit();
                           }
   
                         },
                         error: function(e) {
                           var jsonObject = JSON.parse(e.responseText);
                          // console.log(jsonObject.details);
                          $("#auth_desc").text(jsonObject.details);
                          hideProgress();
                        }
                      });
   });
   
   




















    $("input#asoribaSendkey1").click(function(event){
       event.preventDefault();
       // console.log("In form");
       var email = $("input#asoriba_client_email1").val();
       var password = $("input#asoriba_client_password1").val();
       $("#auth_desc1").show();
   
       jQuery.param({ email: email, passowrd : password});
   
       // console.log(email + ' ' + password);
       $.ajax({
         async: true,
         url: 'https://api.asoriba.com/api/v1.0/plugins/accounts/sign_in/',
         method: 'POST',
         crossDomain: true,
         crossOrigin: true,
         processData: false,
         beforeSend: function () { showProgress();},
         contentType: 'application/json',
         headers: {
           "X-ASORIBA-WIDGET-CLIENT-SOURCE": "wordpress",
           "content-type": "application/json",
         },
         data: JSON.stringify( { "email": email, "password": password } ),
         success: function (resp) {
                           // console.log(resp);
                           // console.log(JSON.stringify(resp));
                           // console.log((resp.results[0].user_info.church.logo));
                           // console.log(resp.results[0].user_info.client_id);
                          document.getElementById("asoriba_secret_key1").value = (resp.results[0].user_info.secret_key);
                           document.getElementById("asoriba_client_id1").value = (resp.results[0].user_info.client_id);
                           document.getElementById("asoriba_client_logo1").value = resp.results[0].user_info.church.logo;
                           var test = $("input#asoriba_secret_key1").val();
                           var image = (resp.results[0].user_info.avatar);
                           $("#asoriba_logo1").attr("src", image);
                           // document.getElementById("asoriba_client_logo").src = resp.results[0].user_info.church.logo;
   
                           if(test == "undefined")
                           {
                             console.log("not submitting");
                             $("#auth_desc1").text("Invalid credentials!");
                           }
                           else
                           {
                             hideProgress();
                             $("#auth_desc1").text("Authenticating successful!");
                             $("#auth_desc1").css('color', 'black');
                             $("form#asoribaSendkey1").submit();
                           }
   
                         },
                         error: function(e) {
                           var jsonObject = JSON.parse(e.responseText);
                          // console.log(jsonObject.details);
                          $("#auth_desc1").text(jsonObject.details);
                          hideProgress();
                        }
                      });
   });
   
   // asoriba_main_setting_div
   // asoribaLogout
   $("#asoribaLogout").click(function(event){
   $("#asoriba_main_setting_div").removeClass("hidden");
   $(this).hide()
   $("#asoribaLogoutDiv").hide();
   });
   $("#asoriba_options_branch_select").change(function(event){
   // console.log("In form");
   document.getElementById("asoriba_options_branch").value = $( "#asoriba_options_branch_select" ).val();
   
   });
   var spinnerVisible = false;
   function showProgress() {
   if (!spinnerVisible) {
     $("div#spinner-asoriba").fadeIn("fast");
     spinnerVisible = true;
   }
   };
   function hideProgress() {
   if (spinnerVisible) {
     var spinner = $("div#spinner-asoriba");
     spinner.stop();
     spinner.fadeOut("fast");
     spinnerVisible = false;
   }
   };
   
   });
   
</script>
<?php
}
add_action('admin_head', 'asoriba_options_general_add_js');
class AsoribaPayments extends WP_Widget {
/**
* Unique identifier for the widget, used as the text domain when
* internationalizing strings of text.
*
* @var string
*/
protected $widget_slug = 'asoriba-payments';
/**
* Sets up the widgets name etc
*/
public function __construct() {
// Load plugin text domain
add_action('init', array($this, 'widget_textdomain'));
parent::__construct(
$this->get_widget_slug(),
__('AsoribaPayments', $this->get_widget_slug()),
array(
'classname'  => $this->get_widget_slug().'-class',
'description' => __(
'Make Church Payments.',
$this->get_widget_slug()
)
)
);
// Register admin styles and scripts
add_action(
'admin_echo_styles',
array($this, 'register_admin_styles')
);
add_action(
'admin_enqueue_scripts',
array($this, 'register_admin_scripts')
);
// Register site styles and scripts
add_action(
'wp_enqueue_scripts',
array($this, 'register_widget_styles')
);
add_action(
'wp_enqueue_scripts',
array($this, 'register_widget_scripts')
);
}
/**
* Returns the widget slug.
*
* @return Plugin slug.
*/
public function get_widget_slug() {
return $this->widget_slug;
}
/**
* Outputs the content of the widget.
*
* @param array args     The array of form elements
* @param array instance The current instance of the widget
*/
public function widget($args, $instance)
{
// Check if there is a cached output
$cache = wp_cache_get($this->get_widget_slug(), 'widget');
if (!is_array($cache)) {
$cache = array();
}
if (isset($args['widget_id'])) {
$args['widget_id'] = $this->id;
}
if (isset($cache[$args['widget_id']])) {
return print $cache[$args['widget_id']];
}
extract($args, EXTR_SKIP);
$widget_output = $before_widget;
ob_start();
include(plugin_dir_path(__FILE__) . 'views/widget.php');
$widget_output .= ob_get_clean();
$widget_output .= $after_widget;
$cache[$args['widget_id']] = $widget_output;
wp_cache_set($this->get_widget_slug(), $cache, 'widget');
echo $widget_output;
}
/**
* Flushes the widget's cache.
*/
public function flush_widget_cache()
{
wp_cache_delete($this->get_widget_slug(), 'widget');
}
/**
* Processes the widget's options to be saved.
*
* @param array new_instance The new instance of values to be generated via the update.
* @param array old_instance The previous instance of values before the update.
*/
public function update($new_instance, $old_instance)
{
return array(
'title' => strip_tags($new_instance['title']),
'list_id' => strip_tags($new_instance['list_id']),
'include_name_fields' =>
strip_tags($new_instance['include_name_fields']),
'include_referral' => strip_tags($new_instance['include_referral']),
);
}
/**
* Generates the administration form for the widget.
*
* @param array instance The array of keys and values for the widget.
*/
public function form($instance)
{
$instance = wp_parse_args((array)$instance);
// Display the admin form
include(plugin_dir_path(__FILE__) . 'views/admin.php');
}
/**
* Loads the widget's text domain for localization and translation.
*/
public function widget_textdomain()
{
load_plugin_textdomain(
$this->get_widget_slug(),
false,
plugin_dir_path(__FILE__) . 'lang/'
);
}
/**
* Fired when the plugin is activated.
*
* @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
*/
public function activate($network_wide)
{
// TODO: Needed?
}
/**
* Fired when the plugin is deactivated.
*
* @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
*/
public function deactivate($network_wide)
{
// TODO: Needed?
}
/**
* Registers and enqueues admin-specific styles.
*/
public function register_admin_styles()
{
wp_enqueue_style(
$this->get_widget_slug() . '-admin-styles',
plugins_url('css/admin.css', __FILE__)
);
}
/**
* Registers and enqueues admin-specific JavaScript.
*/
public function register_admin_scripts()
{
wp_enqueue_script(
$this->get_widget_slug() . '-admin-script',
plugins_url('js/admin.js', __FILE__),
array('jquery')
);
}
/**
* Registers and enqueues widget-specific styles.
*/
public function register_widget_styles()
{
wp_enqueue_style(
$this->get_widget_slug() . '-widget-styles',
plugins_url('css/widget.css', __FILE__)
);
}
/**
* Registers and enqueues widget-specific scripts.
*/
public function register_widget_scripts()
{
wp_enqueue_script(
$this->get_widget_slug() . '-script',
plugins_url('js/widget.js', __FILE__),
array('jquery')
);
}
}
add_action('widgets_init', create_function('', 'register_widget("AsoribaPayments");'));
// var_dump(array_value_recursive('carrot', $arr)); // array(2) { [0]=> string(6) "carrot" [1]=> string(7) "carrot2" }
// var_dump(array_value_recursive('apple', $arr)); // null
// var_dump(array_value_recursive('baz', $arr)); // string(3) "baz"
// var_dump(array_value_recursive('candy', $arr)); // string(5) "candy"
// var_dump(array_value_recursive('pear', $arr)); // null
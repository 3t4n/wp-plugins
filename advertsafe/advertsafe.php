<?php

/*

Plugin Name: advertSAFE

Plugin URI: http://www.weptile.com

Description: This plugin displays the trusted advertSAFE partner site seal on your site. Earn 25% commission when site visitors and your users become advertSAFE through your site seal. It helps make the internet a safer place and gains trust for your site in the process. advertSAFE verifies the identity of ordinary internet users who advertise, have profiles or any other online presence. These individuals are then able to display their own advertSAFE digital ID badge or verification certificate to gain more trust from anyone they interact with online. Let’s face it, we all want more trust!

Version: 1.1.2

Author: Weptile

Author URI: http://www.weptile.com

License: GNU

*/





if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))

        {

                die('You are not allowed to call this page directly.');

        }





register_activation_hook(__FILE__, 'advertsafeadd');

function advertsafeadd( ) {

    add_option('adversafe_txt', '');

}





register_deactivation_hook(__FILE__, 'advertsaferemove');

function advertsaferemove( ) {

    delete_option('adversafe_txt');

}


// Add settings link on plugin page
function plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=advertsafe">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'plugin_settings_link' );




add_action('admin_menu', 'advertsafe_yonetim');

add_shortcode( 'advertSAFE site seal', 'advertsafe_fonks1' );

function advertsafe_yonetim()

        {

           add_options_page('advertSAFE site seal','advertSAFE site seal', 'manage_options', 'advertsafe', 'advertsafe_fonks');

        }

function advertsafe_fonks() {

			

			if(isset($_POST['gizli'])){

				if ($_POST['gizli'] == 'tmm') {

				

				

					$adversafe_textarea = $_POST['adversafetxt'];

					update_option('adversafe_txt', $adversafe_textarea);

		?>

					<div class="updated"><p><strong><?php _e('Options saved.'); ?></strong></p></div>

		<?php

				}

			}

		?>

		<div style="margin-top:10px;">
			<?php /* if(get_option('adversafe_txt')==""){?> advertSAFE verified – NO<?php }  */?>
            <!-- <h2><a href="https://www.advertsafe.com/">Join advertSAFE and grab your own badge</a></h2> -->

                <form method="post" action='<?php echo $_SERVER["REQUEST_URI"]; ?>'>

                    <label for="adversafetxt"><div style="width:80%; margin-left:10px;"><span style="text-decoration:underline; font-weight:bolder;">Activate your advertSAFE site seal to make money!</span><br /><br />
advertSAFE believes in a safer web environment for everyone and we invite you to join us and make this happen. Please follow these steps in exact order to make money from your site seal: <br />
<ul style="list-style:decimal;">
	<li>
    	advertSAFE pays 25% commission on all revenue generated through your site seal. There’s no cookie expiry and therefore includes any upgrades or membership fees in the future …. forever! Complete <a href="http://affiliatebase.com/signup.php" style="text-decoration:underline;">this form</a> and we will email you your unique affiliate code to place in the field below. 
    </li>
    <li>
    	List your website in our Approved Partners Directory (optional) <a href="https://www.advertsafe.com/becomeapartner.aspx" style="text-decoration:underline;">HERE</a>
    </li>
    <li>
    	Using the 'advertSAFE site seal' widget make sure the site seal is placed prominently throughout the site, not just on the home page! This site seal naturally spreads trust. However, encouraging your users to become advertSAFE with a newsletter using your affiliate link won't do any harm!
    </li>
    <li>
    	Using the 'advertSAFE user ID badge'' widget which displays a users ID badge if they have one. Place it where you wish their ID badge to be rendered.
    </li>
</ul></div>
</label><br /><br /><br />

                    <textarea name="adversafetxt" rows="10" style="width:300px;"><?php echo get_option('adversafe_txt'); ?></textarea>

                    <!-- <input type="text" id="merhaba" name="merhaba" value="<?php echo get_option('adversafe_txt'); ?>"/><br /> -->

                    <input type="hidden" id="gizli" name="gizli" value="tmm"/><br />

                    <input type="submit" id="submit" name="submit" class="button-primary" value="<?php _e('Save Changes'); ?> "/>

                </form>

        </div>

        <?php }

function advertsafe_fonks1() {

	$adversafe_get_option = get_option('adversafe_txt');

	if(empty($adversafe_get_option)){

		echo "<a href='http://www.advertsafe.com'><img src='".plugins_url()."/advertsafe/badges/200x80_ap.png'></a>";

		}else{

			echo "<a href='http://www.advertsafe.com'>".get_option('adversafe_txt')."</a>";

			}

}

 

add_filter('AdvertSAFE','advertsafe_fonks1');		

class advertsafeWidget extends WP_Widget

{	

  function advertsafeWidget()

  {

    $widget_ops = array('classname' => 'advertsafeWidget', 'description' => 'Displays advertSAFE Partner Site Seal' );

    $this->WP_Widget('advertsafeWidget', 'advertSAFE site seal', $widget_ops);

  }

  function widget($args, $instance)

  {

    extract($args, EXTR_SKIP);

 
    echo $before_widget;

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);


	$adversafe_get_option = get_option('adversafe_txt');

	if(empty($adversafe_get_option)){

		echo "<a href='http://www.advertsafe.com'><img src='".plugins_url()."/advertsafe/badges/200x80_ap.png'></a>";

		}else{

			echo get_option('adversafe_txt');

			}

    echo $after_widget;

  } 

}

add_action( 'widgets_init', create_function('', 'return register_widget("advertsafeWidget");') );


add_action( 'show_user_profile', 'weptile_user_advertsafe' );
add_action( 'edit_user_profile', 'weptile_user_advertsafe' );
function weptile_user_advertsafe( $user ) {
?>
  <h3 style="text-decoration:underline;">Your advertSAFE User ID</h3>
  <table class="form-table">
    <tr>
      <th></th>
      <td>
      <label for="useradvertsafe">Not advertSAFE? - it's all pretty simple to get extra trust online<br />
      1 - Click the site seal here to join advertSAFE<br />
2 - Get verified by us<br />
3 - Place your ID badge code in the field below. Your ID badge is then displayed for all to see!  
      
      </label><br />
        <a href='http://www.advertsafe.com'><img src='<?php echo plugins_url();?>/advertsafe/badges/200x80_ap.png'></a><textarea  name="useradvertsafe" id="useradvertsafe" class="regular-text" style="height:70px; margin-top:20px; margin-left:10px;" ><?php echo esc_attr( get_the_author_meta( 'useradvertsafe', $user->ID ) ); ?></textarea><br />
        <span class="description" style="margin-left:220px;">Enter advertSAFE User ID code</span>
    </td>
    </tr>
  </table>
<?php
}

add_action( 'personal_options_update', 'weptile_save_user_advertsafe' );
add_action( 'edit_user_profile_update', 'weptile_save_user_advertsafe' );
function weptile_save_user_advertsafe( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'useradvertsafe', $_POST['useradvertsafe'] );
	
    $saved = true;
  }
  return true;
}
class advertsafeWidget1 extends WP_Widget

{	
	
  function advertsafeWidget1()

  {

    $widget_ops = array('classname' => 'advertsafeWidget1', 'description' => 'Displays a users ID badge if they have one' );

    $this->WP_Widget('advertsafeWidget1', 'advertSAFE user ID badge', $widget_ops);

  }

  function widget($args, $instance)

  {
global $user_ID;
    extract($args, EXTR_SKIP);

 
    echo $before_widget;

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);


	$adversafe_get_option = get_user_meta( $user_ID, 'useradvertsafe', true ); 
	
	if(empty($adversafe_get_option)){
		
		echo "<span style=' font-weight:bolder'><a href='http://www.advertsafe.com' target='_blank' style='text-decoration:none;'>advertSAFE</a> verified - <span style='color:#F00'>No</span></span>";
		// echo "<a href='http://www.advertsafe.com'><img src='".plugins_url()."/advertsafe/badges/200x80_ap.png'></a>";

		}else{

			echo $adversafe_get_option;

			}

    echo $after_widget;

  } 

}

add_action( 'widgets_init', create_function('', 'return register_widget("advertsafeWidget1");') );
function advertsafe_fonks_site_seal() {
global $user_ID;
	$adversafe_get_option = get_user_meta( $user_ID, 'useradvertsafe', true ); 

	if(empty($adversafe_get_option)){

		echo "<a href='http://www.advertsafe.com'><img src='".plugins_url()."/advertsafe/badges/200x80_ap.png'></a>";

		}else{

			echo "<a href='http://www.advertsafe.com'>".$adversafe_get_option."</a>";

			}

}

 

add_filter('AdvertSAFE','advertsafe_fonks_site_seal');		

add_shortcode( 'advertSAFE user ID', 'advertsafe_fonks_site_seal' );
	
?>
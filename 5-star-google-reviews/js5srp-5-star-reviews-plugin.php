<?
/**
 * Plugin Name: 5 Star Google Reviews
 * Plugin URI: https://josephstevenson.com/5-star-google-reviews/
 * Description: Request reviews from your customers with this simple plugin and push only the 5 star reviews through to your favorite sites, including Google, Facebook and Yelp.
 * Version: 0.4
 * Author: Joseph Stevenson
 * Author URI: https://josephstevenson.com/
 */
wp_enqueue_script( 'jquery' );
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//load_plugin_textdomain('5-star-reviews-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );
// create custom plugin settings menu
add_action('admin_menu', 'js5srp_plugin_create_menu');
function js5srp_plugin_create_menu() {
	//create new top-level menu
	//add_menu_page('5 Star Google Reviews', '5 Star Google Reviews', 'administrator', __FILE__, 'my_cool_plugin_settings_page' , plugins_url('dashicons-admin-page', __FILE__) );
	
	add_menu_page( 
      '5 Star Google Reviews', 
      '5 Star Reviews', 
      'administrator', 
      __FILE__, 
      'js5srp_settings_page', 
      'dashicons-star-filled', 81,
	  __FILE__
      );

	//call register settings function
	add_action( 'admin_init', 'js5srp_plugin_settings' );
}
function js5srp_plugin_settings() {
	//register our settings
	register_setting( 'js5srp_settings-group', 'js5srp_google' );
	register_setting( 'js5srp_settings-group', 'js5srp_facebook' );
	register_setting( 'js5srp_settings-group', 'js5srp_yelp' );
	register_setting( 'js5srp_settings-group', 'js5srp_failtitle' );
	register_setting( 'js5srp_settings-group', 'js5srp_faildescription' );
	register_setting( 'js5srp_settings-group', 'js5srp_successtitle' );
	register_setting( 'js5srp_settings-group', 'js5srp_successdescription' );
	register_setting( 'js5srp_settings-group', 'js5srp_introtitle' );
	register_setting( 'js5srp_settings-group', 'js5srp_introdescription' );
	register_setting( 'js5srp_settings-group', 'js5srp_share' );

}
function js5srp_settings_page() {
?>
<div class="wrap">
<style>
input[type="text"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="week"], input[type="password"], input[type="checkbox"], input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], select, textarea {
    padding: 10px !important;
    width: 100% !important;
}
</style>
<h1>5 Star Google Reviews</h1>
<p>
This lightweight plugin will display a review form on your website. If the user leaves a 5 star review they will be forwarded to your google business, facebook or yelp page. Any reviews with 4 stars or less will be shown an apology page from you.
</p>
<p>
Perfect to get feedback from customers without complaints going straight to your google business, facebook or yelp pages.
</p>
<form method="post" action="options.php">
    <?php settings_fields( 'js5srp_settings-group' ); ?>
    <?php do_settings_sections( 'js5srp_settings-group' ); ?>
    <table class="form-table" style="width:100%">
    
     <tr valign="top">
        <th scope="row">Title at Introduction<br />
        <span style="font-weight:normal;"><i>Example:<br />
        Please Leave Us A Review Below</i></span>
        </th>
        <td>
        <input type="text" name="js5srp_introtitle" value="<?php echo esc_attr( get_option('js5srp_introtitle')); ?>" />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Description at Introduction<br />
        <span style="font-weight:normal;"><i>Example:<br />
        Please check the amount of stars based on your experience...</i></span></th>
			<td><textarea name="js5srp_introdescription"><?php echo esc_attr( get_option('js5srp_introdescription') ); ?></textarea></td>
        </tr>
    
    
    
        <tr valign="top">
        <th scope="row">Google Business URL<br /><a target="_blank" href="https://josephstevenson.com/finding-your-google-business-url-for-reviews/">Click Here to View Instructions</a></th>
        <td><input type="text" name="js5srp_google" value="<?php echo esc_attr( get_option('js5srp_google') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Facebook Business Page URL<br /><a target="_blank" href="https://josephstevenson.com/finding-your-facebook-url-for-reviews/">Click Here to View Instructions</a></th>
        <td><input type="text" name="js5srp_facebook" value="<?php echo esc_attr( get_option('js5srp_facebook') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Yelp Page URL<br /><a target="_blank" href="https://josephstevenson.com/finding-your-yelp-url-for-reviews/">Click Here to View Instructions</a></th>
        <td><input type="text" name="js5srp_yelp" value="<?php echo esc_attr( get_option('js5srp_yelp') ); ?>" /></td>
        </tr>
        
         <tr valign="top">
        <th scope="row">Title if User Leaves 5 Star Review<br />
        <span style="font-weight:normal;"><i>Example:<br />
        Thank You For Leaving A Review!</i></span></th>
        <td><input type="text" name="js5srp_successtitle" value="<?php echo esc_attr( get_option('js5srp_successtitle') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Description if User Leaves 5 Star Review<br />
        <span style="font-weight:normal;"><i>Example:<br />
        Would you mind sharing your review on Google, Facebook...</i></span></th>
			<td><textarea name="js5srp_successdescription"><?php echo esc_attr( get_option('js5srp_successdescription') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Title if User Leaves 4 Star or Less Review<br />
        <span style="font-weight:normal;"><i>Example:<br />
        Thank You For Leaving A Review!</i></span></th>
        <td><input type="text" name="js5srp_failtitle" value="<?php echo esc_attr( get_option('js5srp_failtitle') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Description if User Leaves 4 Star or Less Review<br />
        <span style="font-weight:normal;"><i>Example:<br />
        We are Sorry Your experience wasn't great...</i></span></th>
			<td><textarea name="js5srp_faildescription"><?php echo esc_attr( get_option('js5srp_faildescription') ); ?></textarea></td>
        </tr>
        
         <tr valign="top">
        <th scope="row">Share With Friends?</th>
        
        <?php if (esc_attr( get_option('js5srp_share') == "y")) { ?>
        
			<td><input type="radio" name="js5srp_share" value="y" checked> Yes<br>
  <input type="radio" name="js5srp_share" value="n">No<br></td>
  
  		<?php }else{ ?>
        
        <td><input type="radio" name="js5srp_share" value="y"> Yes<br>
  <input type="radio" name="js5srp_share" value="n" checked>No<br></td>
        
        <?php } ?>
  
        </tr>
        
    </table>
    
    <?php submit_button(); ?>

</form>

<h2>Add Review Form to Your Site</h2>
<p>
To add the review form to any page please use the shortcode below:
</p>
<p>
<strong>[FiveStar]</strong>
</p>
<p>
The review form will appear and execute based on the settings you have choosen above.
</p>



</div>
<?php } 

function js5srp_review_creation() {
    global $content;
    ob_start();
	include 'js5srp-sc.php';
    $output = ob_get_clean();
    return $output;
}

add_shortcode('FiveStar', 'js5srp_review_creation');


?>
<?php
/* Plugin Name: Deskero
Plugin URI: http://www.deskero.com/
Description: Deskero for WordPress
Version: 1.0
Author: Michele Matto
Author URI: http://www.deskero.com/
License: GPLv2 or later
*/


add_action('admin_init', 'deskero_admin_init');

function deskero_admin_init() {
	
	load_plugin_textdomain( 'deskero', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
	wp_enqueue_style( 'deskero_style', plugins_url( 'css/deskero_style.css', __FILE__ ) );
	
	register_setting( 'deskero_settings', 'deskero_domain' );
	register_setting( 'deskero_settings', 'deskero_widget_code' );
	register_setting( 'deskero_settings', 'deskero_widget_mode' );
}

add_action('admin_menu', 'deskero_menu');

function deskero_menu() {
	
	add_menu_page( "Deskero Settings", "Deskero", "manage_options", "deskero_page_settings", "deskero_page_settings", plugin_dir_url( __FILE__ ) . "images/deskero_icon.png" );
	
}


function deskero_page_settings() {

?>

<div class="wrap">

	<?php screen_icon('deskero'); ?>
    <h2><?php _e('Deskero settings for Wordpress', 'deskero'); ?></h2>
    <form method="post" action="options.php">
	
    <?php settings_fields( 'deskero_settings' ); ?>
    <?php do_settings_fields( 'deskero_settings' ); ?>
    
    <h3><?php _e('General settings', 'deskero'); ?></h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('Deskero domain', 'deskero'); ?></th>
        <td>http://<input type="text" name="deskero_domain" value="<?php echo get_option('deskero_domain'); ?>" />.deskero.com</td>
        </tr>
    </table>
    
    <h3><?php _e('Widget settings', 'deskero'); ?></h3>
    <table class="form-table">     
        <tr valign="top">
        <th scope="row"><?php _e('Paste widget code here', 'deskero'); ?></th>
        <td>
        	<textarea name="deskero_widget_code" cols="70" rows="10"><?php echo get_option('deskero_widget_code'); ?></textarea>
        	<p class="description"><?php _e('Login to Deskero (using a Business or Power plan), go to the Customize tab in the Setting menu and choose Feedback widget. Paste the code you\'ll obtain from the "Embed this code" grey window above here.', 'deskero'); ?></p>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e('Where to display', 'deskero'); ?></th>
        <td>
        	<input type="radio" name="deskero_widget_mode" value="everywhere" <?php if (get_option('deskero_widget_mode') == "everywhere" || get_option('deskero_widget_mode') == "") { ?>checked="checked"<?php } ?> /> <?php _e('Put widget in all pages and posts', 'deskero'); ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="deskero_widget_mode" value="short-code" <?php if (get_option('deskero_widget_mode') == "short-code") { ?>checked="checked"<?php } ?> /> <?php _e('Use with short-code: [deskero_widget]', 'deskero'); ?> 
        	
        	</td>
        </tr>
    </table>
    
    
    <?php submit_button(); ?>
	</form>
	</div>

<?php

}

function deskero_show_widget() {
    
  
   
   if (get_option('deskero_widget_mode') == "everywhere") {
	   
	   $deskero_widget = get_option('deskero_widget_code');
	    
	   if ($deskero_widget != "") {
	  	 echo $deskero_widget;
	   }
	   
   }
   
   
    
}

add_action('wp_footer', 'deskero_show_widget');

function deskero_widget_short_code(){
	
	if (get_option('deskero_widget_mode') == "short-code") {
	   
	   $deskero_widget = get_option('deskero_widget_code');
	    
	   if ($deskero_widget != "") {
	  	 return $deskero_widget;
	   }
	   
   }
   
}

add_shortcode( 'deskero_widget', 'deskero_widget_short_code' );



?>
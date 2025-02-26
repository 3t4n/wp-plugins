<?php
/*

Plugin Name: 3dady real-time web stats
Plugin URI: http://www.3dady.com/
Description: 3dady stats is a perfect free counter and web stats which indicates the exact number of visitors of your website easily
Version: 1.0
Author: 3dady
Author URI: http://www.3dady.com
License: OpenSource under GPL2
*/

// Hook for adding admin menus
if ( is_admin() ){ // admin actions
function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/yourstyle.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}

	function dady_menu() {
    define("dady_PERMISSIONS", "add_users");
    add_menu_page(
        __("3dady_settings"),
        __("3dady stats"),
        dady_PERMISSIONS,
        "3dady",
        "dady_settings"
    );
}
add_action('admin_menu', 'dady_menu');
add_action('admin_head', 'admin_register_head');
  add_action( 'admin_menu', 'dady_op_page' );
} else {
  // non-admin enqueues, actions, and filters
}

// action function for above hook
function dady_op_page() {



// dady_settings_page() displays the page content for the 3dady submenu
function dady_settings() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $dady_text = 'dady_input_text';
    $dady2_text = 'dady2_input_text';
    $hidden_field_name = 'dady_submit_hidden';
    $data_field_name = 'dady_input_text';
    $data_field_name2 = 'dady2_input_text';
    $head_field_name = 'mth_submit_hidden';

add_option('checkboxhf', TRUE); 
update_option('checkboxhf', (bool) $_POST["checkboxhf"]);

// Read in existing option value from database
    $dady_val = get_option( $dady_text );
    $dady2_val = get_option( $dady2_text );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'

  
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
          

     // Read their posted value
	    $dady_val = $_POST[ $data_field_name ]; 
        $dady2_val = $_POST[ $data_field_name2 ];

        // Save the posted value in the database
        update_option( $dady_text, $dady_val );  
        update_option( $dady2_text, $dady2_val ); 

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'

  
    if( isset($_POST[ $head_field_name ]) && $_POST[ $head_field_name ] == 'Y' ) {

        // Put an settings updated message on the screen


?>

<div class="updated"><p><strong><?php _e('settings saved.', 'dady-menu' ); ?></strong></p></div>
<?php

    }}



    // Now display the settings editing screen

    echo '<div class="wrap">';
    
    // icon for settings
       screen_icon( 'my-plugin' );

    // header

    echo "<h2>" . __( '3dady Settings', 'dady-menu' ) . "</h2>";

    // settings form
    
    ?>


<div style="height:80px; width: 100px; ! important; border: 1px solid rgb(204, 204, 204) ! important; padding: 10px; text-align: left ! important;" class="highligh_background" id="help_html_sidebar"></div>

<div style="width: 930px ! important; border: 1px solid rgb(204, 204, 204) ! important; padding: 10px; text-align: left ! important;" class="highlight_background" id="help_html_sidebar"><p><b>Important: this Plugin only works with Sidebar widget</b></p><b>Get the key and Position in the browser from 3dady Stats <a href="http://www.3dady.com/getcounter" title="Get the key" target="_blank">http://www.3dady.com/getcounter</a></b></div>	
<form name="form1" method="post" action="">

<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<p><?php _e("Your key: ", 'dady-menu' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $dady_val; ?>" size="100"></p>
<input type="hidden" name="<?php echo $head_field_name; ?>" value="Y">
<p><?php _e("Position in the browser: ", 'dady-menu' ); ?> 
<input type="text" name="<?php echo $data_field_name2; ?>" value="<?php echo $dady2_val; ?>" size="50"></p>

<p><?php _e("Check to Enable Sidebar widget: ", 'dady-menu' ); ?> 
<input type="checkbox" name="checkboxhf" value="checkbox" <?php if (get_option('checkboxhf')) echo "checked='checked'"; ?>/>

<?php submit_button(); ?>

</form>

<div style="width: 930px ! important; border: 1px solid rgb(204, 204, 204) ! important; padding: 10px; text-align: left ! important;" class="highlight_background" id="help_html_sidebar">
<p><b>Description :
know the number of visitors of your own website in real-time? 3dady is a perfect free counter and web stats which indicates the exact number of visitors of your website easily.! </b></p>

</div>

<div style="width: 930px ! important; border: 1px solid rgb(204, 204, 204) ! important; padding: 10px; text-align: left ! important;" class="highlight_background" id="help_html_sidebar">

<p><b>How to Use this? </b></p>
 
<p><b> 1. Get the key and Position in the browser from 3dady Stats <a href="http://www.3dady.com/getcounter" title="Get the key" target="_blank">http://www.3dady.com/getcounter</a> You must choose Sidebar Widget</b></p>

<p><b> 2. after finishing successfully,Counter code will be ready to use and you have to Click on "Add To WordPress"</b></p>

<p><b> 3.  Copy the key and position in the browser then put them in the fields at the top and Save</b></p>

 <p><b>5. Check the box to enable Sidebar widget.</b></p>

<p><b>7- Enjoy</b></p>

</div>

<div style="width: 930px ! important; border: 1px solid rgb(204, 204, 204) ! important; padding: 10px; text-align: left ! important;" class="highlight_background" id="help_html_sidebar">
<p><b>How to create a private Sidebar widget? </b></p>
 
<p><b> 1-  Signup 3dady Stats to use extended features, and private widget  <a href="http://www.3dady.com/signup" title="signup" target="_blank">http://www.3dady.com/signup</a> You must choose Sidebar Widget</b></p>

<p><b> 2- Sign In and Create a new project </b></p>

<p><b> 3- Fill out the form and add your website URL in field "URL of your project"</b></p>

<p><b> 4-choose  Statistics: >> access Access only for me</b></p>

 <p><b>5- choose  Position in the browser: >> private bottom and submit form</b></p>

<p><b>6- Enjoy</b></p>

</div>

</div>


<?php } 
}
function dady_text_inputreal() {
if(True== get_option('checkboxhf'))
echo '<script type="text/javascript" src="http://www.3dady.com/public/js/create_wz.js"></script><script type="text/javascript">create_wz_sidebar("'.get_option('dady_input_text').'","en","'.get_option('dady2_input_text').'");</script>';
}

add_action('get_footer', 'dady_text_inputreal');
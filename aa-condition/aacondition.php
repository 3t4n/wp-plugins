<?php 
/**
 * @package AA_Condition
 * @version 1.0
 */
/*
Plugin Name: AA Condition
Plugin URI: http://wordpress.org/plugins/aa-condition/
Description: It is a Custom Condition Plugin made by AA Extension . Just use shortcode [aa_condition_button] and then you can replace your condition from plugin file.
Author: aaextention
Version: 1.0
Author URI: http://webdesigncr3ator.com
*/
	
//tell wordpress to register the demolistposts shortcode
add_shortcode("aa_condition_button", "aaconditionbutton_handler");

function aaconditionbutton_handler() {

if ( is_user_logged_in() ) {
   echo '<p style="text-align:center"><a href="#"><span style="font-size:14px"><input type="button" value="GET HELP" name="START A PROJECT" class="button-medium"></span></a></p>';
} 


if ( is_user_logged_in() || !is_user_logged_in() )
{
 echo '<p style="text-align:center"><a href="#"><span style="font-size:14px"><input type="button" value="GIVE BACK" name="START A PROJECT" class="button-medium"></span></a></p>';

}

if ( !is_user_logged_in() ) {
echo '<p style="text-align:center; font-weight:bold;">If you would like to create a campaign please <span style="color:red">Log in</span> or <span style="color:red">Register</span> below.</p>';

?>

<style type="text/css">
.login_block p{ display:inline-block; padding-right:15px;}
.login_block { text-align:center; }

</style>

<div class="login_block">
<p style="font-weight:bold;"><?php _e("Login", 'aa_extension'); ?></a></p>

<p style=" font-weight:bold;"><?php _e("Register", 'aa_extension'); ?></a></p>
</div>
<?php 

} 

}





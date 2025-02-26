<?php
/*
Plugin Name: Meepi
Plugin URI: http://www.meepi.com
Description: Visitors leaving your website are worth nothing. Until now...Meepi.com.
Version: 1.4
Author: Daniel John Marsden
Author URI: http://www.djmweb.co/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Copyright: Daniel John Marsden


Meepi is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Meepi is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License 2
along with Meepi, if not, see https://www.gnu.org/licenses/gpl-2.0.html.

*/


// create custom plugin settings menu 
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {
 
	//create new top-level menu
	add_menu_page('Meepi Settings', 'Meepi', 'administrator', __FILE__, 'my_cool_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}


function register_my_cool_plugin_settings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'meepi_code' );
	register_setting( 'my-cool-plugin-settings-group', 'meepi_active' );

}

function my_cool_plugin_settings_page() {
?>
<div class="wrap">
<h2>Meepi Settings</h2>

<form method="post" action="options.php">
<?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
<?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>

<div style="margin-bottom:10px;">Enter your Meepi code from <a href="http://www.meepi.com">Meepi.com</a></div>
<textarea style="width:800px; max-width:100%; height:300px;" name="meepi_code"><?php echo esc_attr( get_option('meepi_code') ); ?></textarea>


<div style="margin-top:10px;">Meepi Status</div>

<select name="meepi_active">

<?php if(esc_attr( get_option('meepi_active') ) == "Enabled" ) { ?>

<option selected="selected">Enabled</option>
<option>Disabled</option>
	
<?php
}
else{ ?>

<option >Enabled</option>
<option selected="selected">Disabled</option>

<?php } ?>

</select>
        
    
<?php submit_button(); ?>

</form>
</div>
<?php } 






add_action( 'get_footer', 'add_meepi' );

function add_meepi () {


if (get_option( 'meepi_active' ) == "Enabled"){ ?>

<?php echo get_option( 'meepi_code' ); ?>

<?php } 

else {} ?>


<?php	}
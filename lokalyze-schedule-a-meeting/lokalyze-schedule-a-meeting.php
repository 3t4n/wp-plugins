<?php
/*
Plugin Name: Lokalyze - Schedule A Meeting
Description: Schedule a meeting with person and receive mail notifications.
Version: 1.0
Author: Lokalyze
Author URI: https://lokalyze.com/
License: GPL2
*/

/*  Copyright 2021 Lokalyze  (email : todd@lokalyze.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('LSAM_VERSION','1.0');
define('LSAM_BASENAME', plugin_basename( __FILE__ ) );
define('LSAM_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );
define('LSAM_FILENAME', str_replace( LSAM_BASEFOLDER.'/', '', LSAM_BASENAME ) );
define('LSAM_WEBSITE','https://lokalyze.com/');
define('LSAM_SUPPORT', LSAM_WEBSITE . '/');

$plugin_title = apply_filters( 'lsam_plugin_title',  'Schedule a Meeting');

function lsam_stylescript() {   
	wp_register_style( 'lsam_styles', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/bootstrap.min.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/font-awesome.min.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/parsley.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/default-css.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/style.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/responsive.css' );
	wp_register_style( 'lsam_styles', LSAM_BASEFOLDER.'/css/plugins/sweetalert.css' );
	wp_register_style( 'lsam_styles', 'https://fonts.googleapis.com/css?family=Lato' );
	wp_enqueue_style( 'lsam_styles' );	
	
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/bootstrap.min.js', array( 'jquery' ), '1.0', true );  
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/moment.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/plugins/sweetalert.min.js', array( 'jquery' ), '1.0', true );  
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/parsley.min.js', array( 'jquery' ), '1.0', true );  
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/parsleyextend.js', array( 'jquery' ), '1.0', true );  
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/script.js', array( 'jquery' ), '1.0', true ); 
    wp_enqueue_script( 'lsam_script', LSAM_BASEFOLDER .'js/datepicker.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'lsam_script' );
}
add_action('wp_enqueue_scripts', 'lsam_stylescript');

register_activation_hook( __FILE__, 'lsam_activate' );
function lsam_activate(){
	add_option( 'ladminemail', '', '', 'yes' );
	add_option( 'ltimezone', '', '', 'yes' );
	add_option( 'lprofile', '', '', 'yes' );
	
	if ( ! current_user_can( 'activate_plugins' ) ) return;
  
  	global $wpdb;
	
	$table_name = $wpdb->prefix.'posts';
  
  	if( null === $wpdb->get_row("SELECT post_name FROM $table_name WHERE post_name = 'schedule-a-meeting'", 'ARRAY_A') ) {
     
    	$current_user = wp_get_current_user();
    
		// create post object
		$page = array(
		  'post_title'  => __( 'Schedule A Meeting New' ),
		  'post_content' => '[schedule-a-meeting]',
		  'post_status' => 'publish',
		  'post_author' => $current_user->ID,
		  'post_type'   => 'page',
		);
    
		// insert the post into the database
		wp_insert_post( $page );
  	}
	
	return true;
}

register_uninstall_hook( __FILE__, 'lsam_uninstall' );
function lsam_uninstall() {
	return true;
}

register_deactivation_hook( __FILE__, 'lsam_deactivation' );
function lsam_deactivation() {  
	delete_option( 'ladminemail' );
	delete_option( 'ltimezone' );
	delete_option( 'lprofile' );			
	return true;
}

add_action('admin_menu', 'lsam_register_admin_page');

function lsam_register_admin_page() {
	global $plugin_title;
	$page = add_submenu_page('options-general.php', $plugin_title, $plugin_title, 'manage_options', 'schedule-a-meeting', 'lsam_admin_settings_page');
}

function lsam_admin_settings_page() {
	global $plugin_title;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ladminemail = sanitize_text_field($_POST['lsam_admin_email']);
		$ltimezone = sanitize_text_field($_POST['lsam_admin_timezone']);
		$lprofile = sanitize_text_field($_POST['lsam_admin_image']);	
		
		update_option( 'ladminemail', $ladminemail );
		update_option( 'ltimezone', $ltimezone );
		update_option( 'lprofile', $lprofile );
	}
	?>
	<div class="wrap">	
		<style>
			table.form-table.lsamnew {
				background: hsl(0, 0%, 99%) none repeat scroll 0 0;
				border: 1px solid hsl(0, 0%, 80%);
				width: 100%;
			}
			table.form-table.lsamnew tr:first-child th {
				background: #d8d8d8;
			}
			table.form-table.lsamnew th {
				font-weight: 600 !important;
				padding: 15px !important;
				text-align: left !important;
				vertical-align: middle !important;
				width: 25% !important;
			}
			table.form-table.lsamnew th {
				font-weight: 600 !important;
				padding: 15px !important;
				text-align: left !important;
				vertical-align: middle !important;
				width: 25% !important;
			}
			table.form-table.lsamnew td {
				font-weight: 600 !important;
				padding: 15px !important;
				text-align: left !important;
				vertical-align: middle !important;
				width: 75% !important;
			}
			table.form-table.lsamnew h2 {
				margin: 0;
			}
			table.form-table.lsamnew input {
				width: 50%;
			}
		</style>
		<h1>Lokalyze Schedule A Meeting <span class="version">v<?php echo LSAM_VERSION;?></span></h1>
		<form method="post" action="" class="lsam-container">
			<table class="form-table lsamnew">
				<tr>
					<th colspan="2"><h2>Schedule A Meeting - Settings</h2></th>
				</tr>
				<tr valign="top">
					<th scope="row">Email ID:</th>
					<td><input type="email" name="lsam_admin_email" value="<?php echo esc_html(get_option('ladminemail')); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row">Time Zone:</th>
					<td>
						<select name="lsam_admin_timezone">
							<?php 
								$selected_zone = esc_html(get_option('ltimezone'));
								echo wp_timezone_choice( $selected_zone ); 
							?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Profile Picture URL:</th>
					<td><input type="text" name="lsam_admin_image" value="<?php echo esc_html(get_option('lprofile')); ?>" /></td>
				</tr>
			</table>
			<input type="hidden" name="cnb[version]" value="<?php echo esc_html(CNB_VERSION); ?>" />
			<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
		</form>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
			<div class="successmessage">Settings Updated Successfully.</div>
		<?php } ?>
	</div>
<?php
}

?>
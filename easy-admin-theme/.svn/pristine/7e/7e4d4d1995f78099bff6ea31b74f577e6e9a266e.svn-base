<?
/*
Plugin Name: Easy Admin Theme
Plugin URL: http://remicorson.com/easy-admin-theme
Description: Display a different theme for logged in admins
Version: 1.0
Author: Remi Corson
Author URI: http://remicorson.com
Contributors: corsonr
*/

/* ------------------------------------------------------------------
 * PLUGIN GLOBALS
 * --------------------------------------------------------------- */

global $eat_base_dir;
$eat_base_dir = dirname(__FILE__);

global $eat_prefix;
$eat_prefix = 'eat_';

global $eat_fields_suffix;
$eat_fields_suffix = '_fields';

global $eat_plugin_name;
$eat_plugin_name = 'Easy Admin Theme';

global $eat_options;
$eat_options = get_option('eat_settings');

/* ------------------------------------------------------------------
 * PLUGIN CONSTANTS
 * --------------------------------------------------------------- */

if(!defined('EAT_PLUGIN_DIR')) {
	define('EAT_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

/* ------------------------------------------------------------------
 * PLUGIN TEXT DOMAIN
 * --------------------------------------------------------------- */

load_plugin_textdomain( 'eat', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/* ------------------------------------------------------------------
 * LOAD PLUGIN OPTIONS
 * --------------------------------------------------------------- */

$eat_options = get_option('eat_settings');

/* ------------------------------------------------------------------
 * PHP ERRORS DISPLAY
 * --------------------------------------------------------------- */

ini_set('display_errors', 'on');

/* ------------------------------------------------------------------
 * PLUGIN MENU - Pages & Sub-pages
 * --------------------------------------------------------------- */

function eat_admin_menu() {

	global $eat_settings_page;

	// Create Admin Menu Links
	$eat_settings_page      = add_submenu_page('themes.php', __('Easy Admin Theme Settings', 'eat'), __('Admin Theme', 'eat'),'manage_options', 'eat-settings', 'eat_settings_page');
	
}
add_action('admin_menu', 'eat_admin_menu');

/* ------------------------------------------------------------------
 * PLUGIN INCLUDES
 * --------------------------------------------------------------- */

// Front & admin functions
include($eat_base_dir . '/includes/eat_functions.php');
include($eat_base_dir . '/includes/scripts.php');

// Admin only
if( is_admin() AND isset( $_GET['page'] ) AND $_GET['page'] == 'eat-settings' ) {
	include($eat_base_dir . '/includes/functions-settings.php');
	include($eat_base_dir . '/includes/options.php');
}

/* ------------------------------------------------------------------
 * REGISTER PLUGIN SETTINGS
 * --------------------------------------------------------------- */

function eat_register_settings() {

	register_setting( 'eat_settings_group', 'eat_settings' ); // create whitelist of options
}
add_action( 'admin_init', 'eat_register_settings', 100 );

/* ------------------------------------------------------------------
 * SETTINGS PAGE LAYOUT
 * --------------------------------------------------------------- */

function eat_settings_page() {
	
	global $eat_options;
	global $eat_plugin_name;
		
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php echo $eat_plugin_name; ?> <?php _e('Settings', 'eat'); ?></h2>
		<?php
		if ( ! isset( $_REQUEST['is-updated'] ) )
			$_REQUEST['settings-updated'] = false;
		?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'eat' ); ?></strong></p></div>

		<?php endif; ?>
		<form method="post" action="options.php" class="eat_options_form">

			<?php settings_fields( addslashes('eat_settings_group') ); ?>
			
			<?php eat_show_custom_tabs(); ?>

			<?php eat_show_custom_fields(); ?>
			
			<!-- save the options -->
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'eat' ); ?>" />
			</p>
			
		</form>
	</div><!--end .wrap-->
	<?php
}

/* ------------------------------------------------------------------
 * UN-INSTALL
 * --------------------------------------------------------------- */

function eat_uninstall () 
{
    // Uncomment the line above to delete all data at plugin uninstall
    /* delete_option('eat_settings'); */
}

register_deactivation_hook( __FILE__, 'eat_uninstall' );

?>
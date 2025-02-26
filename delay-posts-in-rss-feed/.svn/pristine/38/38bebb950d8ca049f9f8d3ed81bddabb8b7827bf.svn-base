<?php
/*
Plugin Name: Delay Posts in WordPress RSS Feed
Plugin URI:  https://www.inthiscode.com/
Description: A plugin to delay posts from appearing in WordPress RSS feed.
Version:     1.3.1
Author:      InThisCode
Author URI:  http://www.inthiscode.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dpwrs-itc
*/
defined( 'ABSPATH' ) or die( 'You are lost.' );

// Admin menu
add_action( 'admin_menu', 'dpwrs_itc_add_admin_menu' ); // Add Admin Menu
if(!function_exists('dpwrs_itc_add_admin_menu')){
	function dpwrs_itc_add_admin_menu(  ) { 
		add_options_page( 'Delay Posts in RSS Feed', 'Delay Posts in RSS Feed', 'manage_options', 'dpwrs_itc', 'dpwrs_itc_options_page' );
	}
}
function dpwrs_itc_options_page(  ) { 
	?>
	<form action='options.php' method='post'>
		<h1>Delay Posts in RSS Feed</h1>
		<?php
		settings_fields( 'dpwrs_itc_pluginPage' );
		do_settings_sections( 'dpwrs_itc_pluginPage' );
		submit_button();
		?>
	</form>
	<?php
}

// settings link
function dpwrs_itc_plugin_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=dpwrs_itc">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'dpwrs_itc_plugin_settings_link' );

// Admin Settings
add_action( 'admin_init', 'dpwrs_itc_settings_init' ); 
function dpwrs_itc_settings_init() {
	register_setting( 'dpwrs_itc_pluginPage', 'dpwrs_itc_settings' );
	
	// Add section
	add_settings_section('dpwrs_itc_pluginPage_section', __( 'Settings', 'dpwrs-itc' ), 'dpwrs_itc_settings_section_callback', 'dpwrs_itc_pluginPage');
	
	// Enable plugin
	add_settings_field('dpwrs_itc_enable', __( 'Enable Plugin', 'dpwrs-itc' ), 'dpwrs_itc_enable_render', 'dpwrs_itc_pluginPage', 'dpwrs_itc_pluginPage_section');
	// Time Unit
	add_settings_field('dpwrs_itc_time_unit', __( 'Time Unit', 'dpwrs-itc' ), 'dpwrs_itc_time_unit_render', 'dpwrs_itc_pluginPage', 'dpwrs_itc_pluginPage_section');
	
	// Wait Time
	add_settings_field('dpwrs_itc_time_wait', __( 'Wait Time', 'dpwrs-itc' ), 'dpwrs_itc_time_wait_render', 'dpwrs_itc_pluginPage', 'dpwrs_itc_pluginPage_section');
	
}

// Callback
function dpwrs_itc_settings_section_callback(  ) { 
	echo __( '', 'dpwrs-itc' );
}

$dpwrs_itc_options = get_option( 'dpwrs_itc_settings' );

// Display enable checkbox
function dpwrs_itc_enable_render() {
	global $dpwrs_itc_options;
	?>
    <input type='checkbox' name='dpwrs_itc_settings[dpwrs_itc_enable]' <?php  if ( isset( $dpwrs_itc_options['dpwrs_itc_enable'] ) && $dpwrs_itc_options['dpwrs_itc_enable'] == '1' ) {echo 'Checked';} ?> value='1'>
    <?php
}

// Display Time Unit
function dpwrs_itc_time_unit_render() {
	global $dpwrs_itc_options;
	$dpwrs_time_unit_arr = array('SECOND','MINUTE', 'HOUR');
	?>
    <select name='dpwrs_itc_settings[dpwrs_itc_time_unit]'>
    <?php
	foreach($dpwrs_time_unit_arr as $dpwrs_time_unit_array) {
	?>
        <option value='<?php echo $dpwrs_time_unit_array; ?>' <?php selected( $dpwrs_itc_options['dpwrs_itc_time_unit'], $dpwrs_time_unit_array ); ?>><?php echo $dpwrs_time_unit_array; ?></option>    
    <?php
	}
	?>
    </select> <i>Unit of time</i>
    <?php
}

// Display wait Time
function dpwrs_itc_time_wait_render() {
	global $dpwrs_itc_options;
	?>
    <input type='number' min='0' oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  name='dpwrs_itc_settings[dpwrs_itc_time_wait]' value='<?php if($dpwrs_itc_options['dpwrs_itc_time_wait']) {echo $dpwrs_itc_options['dpwrs_itc_time_wait']; } else { echo '10'; } ?>'>
    <?php
}

// If checkbox checked
if ( isset( $dpwrs_itc_options['dpwrs_itc_enable'] ) && $dpwrs_itc_options['dpwrs_itc_enable'] == '1' ) {
	function dpwrs_publish_later_on_feed($dpwrs_where) {
		global $dpwrs_itc_options;
		global $wpdb;
		if ( is_feed() ) {
			// timestamp in WP-format
			$dpws_now = gmdate('Y-m-d H:i:s');
			// value for wait; + device
			$dpws_wait = $dpwrs_itc_options['dpwrs_itc_time_wait']; // integer
			$dpws_device = $dpwrs_itc_options['dpwrs_itc_time_unit']; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
			// add SQL-sytax to default $where
			$dpwrs_where .= " AND TIMESTAMPDIFF($dpws_device, $wpdb->posts.post_date_gmt, '$dpws_now') > $dpws_wait ";
		}
		return $dpwrs_where;
	}
	add_filter('posts_where', 'dpwrs_publish_later_on_feed');
}
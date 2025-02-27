<?php

/*
Plugin Name: Dashboard Post-it
Plugin URI: http://wordpress.org/extend/plugins/dashboard-post-it/
Description: Adds a simple 'Post-it' widget to the Dashboard that allows you to leave yourself or other authors a note. HTML allowed, HTML restrictions observed. Based on code from <a href="http://wpengineer.com/add-wordpress-dashboard-widgets/">WP Engineer</a> and <a href="http://rick.jinlabs.com/2009/02/01/how-add-options-to-your-wordpress-27-dashboard-widgets/">Ricardo Gonz&aacute;lez Castro</a>.
Version: 1.1
Author: Mark Dingemanse
Tags: plugin, dashboard, widget, note
Requires at least: 2.7
Tested up to: 2.8.4
Author URI: http://ideophone.org/
*/

/*
 * Spit out the content of the Post-it Widget
 */

function dashboard_postit() {
        $widget_options = dashboard_postit_Options();
		// echo "{$widget_options['pi_text']}";
		print wpautop($widget_options['pi_text']);

}
 
 
/**
 * Manage the defaults and the options
 */
function dashboard_postit_Options() {

	$defaults = array( 'pi_title' => 'Post-it', 'pi_text' => 'Your text here');
	if ( ( !$options = get_option( 'dashboard_postit' ) ) || !is_array($options) )
		$options = array();
	return array_merge( $defaults, $options );
	global $defaults;
}

/**
 * Add the Post-it Widget via function wp_add_dashboard_widget()
 */
 
function dashboard_postit_Init() {
	$options = dashboard_postit_Options();
	$title = $options['pi_title'];
	wp_add_dashboard_widget( 'dashboard_postit', $title, 'dashboard_postit', 'dashboard_postit_Setup' );
}

/**
 * Edit the options
 */

function dashboard_postit_Setup() {
 
	$options = dashboard_postit_Options();
 
		// Get our options and see if we're handling a form submission.
	if ( 'post' == strtolower($_SERVER['REQUEST_METHOD']) && isset( $_POST['widget_id'] ) && 'dashboard_postit' == $_POST['widget_id'] ) {
		foreach ( array( 'pi_title', 'pi_text' ) as $key )
				$options[$key] = stripslashes($_POST[$key]);
				if ( !current_user_can('unfiltered_html') )
					$newoptions['text'] = stripslashes(wp_filter_post_kses($newoptions['text'])); // This should take care of HTML permissions.
		update_option( 'dashboard_postit', $options );
	}
		
		// Format the options to be valid HTML attributes.
		// $title = htmlspecialchars($options['pi_text'], ENT_QUOTES);
		
?>
		<label style="display:block;margin-bottom:4px;" for="pi_title">Widget title: <input type="text" id="pi_title" name="pi_title" value="<?php echo $options['pi_title'] ?>" /></label>
		<label style="display:block;margin-bottom:4px;" for="pi_text">Your note: <textarea style="width: 99%; height: 200px;margin:4px 0;" id="pi_text" name="pi_text"><?php echo $options['pi_text'] ?></textarea></label>
<?php
}
 
/**
 * Use the hook to integrate our new widget
 */
add_action('wp_dashboard_setup', 'dashboard_postit_Init');
 
?>
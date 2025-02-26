<?php
/*
Plugin Name: Nations PC Solutions Support Dashboard
Plugin URI: http://nationspcsolutions.com/downloads
Description: New Beta Plugin Adds a dashboard support system for ZD Design Agency members WP Powered Website Service Admin Dashbaord and widget area (under Active Development).
Version: 1.0
Author: ModManMatt, CaliCoTek, Nations Pc Solutions

Author URI: http://nationspcsolutions.com/
Donate: http://nationspcsolutions.com/donations
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Start New Plugin code

// Start Add Actions to register the code with wp
add_action('wp_dashboard_setup', array('NPS_Support_Dashboard_Widget','init') ); // register dashboard widget action
add_action( 'admin_menu', 'register_nps_support_dashboard_menu_page' ); // register dash menu and page action
add_filter( 'plugin_action_links', 'nps_support_dashboard_plugin_action_links', 10, 2 ); // adds setting link to plugin installer page
// Set-up Action and Filter Hooks
// End Add Actions to register the code with wp.


// Start widget Install code
class NPS_Support_Dashboard_Widget {

    /**
     * The id of this widget.
     */
    const wid = 'my_widget_nps_support_dashboard_support';

    /**
     * Hook to wp_dashboard_setup to add the widget.
     */
    public static function init() {
        //Register widget settings...
        self::update_dashboard_widget_options(
            self::wid,                                  //The  widget id
            array(                                      //Associative array of options & default values
                'option_number_1' => 1,
			    'option_number_2' => 2,
			    'option_number_3' => 3,
			    'option_number_4' => 4,
			    'option_number_5' => 5,
            ),
            true                                        //Add only (will not update existing options)
        );

        //Register the widget...
        wp_add_dashboard_widget(
            self::wid,                                  //A unique slug/ID
            __( 'Nations PC Solutions Support', 'nouveau' ),  //Visible name for the widget
            array('NPS_Support_Dashboard_Widget','widget'),      //Callback for the main widget content
            array('NPS_Support_Dashboard_Widget','config')       //Optional callback for widget configuration content
        );
    }

    /**
     * Load the widget code
     */
    public static function widget() {
        require_once( 'widget.php' );
    }

    /**
     * Load widget config code.
     *
     * This is what will display when an admin clicks
     */
    public static function config() {
        require_once( 'widget-config.php' );
    }

    /**
     * Gets the options for a widget of the specified name.
     *
     * @param string $widget_id Optional. If provided, will only get options for the specified widget.
     * @return array An associative array containing the widget's options and values. False if no opts.
     */
    public static function get_dashboard_widget_options( $widget_id='' )
    {
        //Fetch ALL dashboard widget options from the db...
        $opts = get_option( 'dashboard_widget_options' );

        //If no widget is specified, return everything
        if ( empty( $widget_id ) )
            return $opts;

        //If we request a widget and it exists, return it
        if ( isset( $opts[$widget_id] ) )
            return $opts[$widget_id];

        //Something went wrong...
        return false;
    }

    /**
     * Gets one specific option for the specified widget.
     * @param $widget_id
     * @param $option
     * @param null $default
     *
     * @return string
     */
    public static function get_dashboard_widget_option( $widget_id, $option, $default=NULL ) {

        $opts = self::get_dashboard_widget_options($widget_id);

        //If widget opts dont exist, return false
        if ( ! $opts )
            return false;

        //Otherwise fetch the option or use default
        if ( isset( $opts[$option] ) && ! empty($opts[$option]) )
            return $opts[$option];
        else
            return ( isset($default) ) ? $default : false;

    }

    /**
     * Saves an array of options for a single dashboard widget to the database.
     * Can also be used to define default values for a widget.
     *
     * @param string $widget_id The name of the widget being updated
     * @param array $args An associative array of options being saved.
     * @param bool $add_only If true, options will not be added if widget options already exist
     */
    public static function update_dashboard_widget_options( $widget_id , $args=array(), $add_only=false )
    {
        //Fetch ALL dashboard widget options from the db...
        $opts = get_option( 'dashboard_widget_options' );

        //Get just our widget's options, or set empty array
        $w_opts = ( isset( $opts[$widget_id] ) ) ? $opts[$widget_id] : array();

        if ( $add_only ) {
            //Flesh out any missing options (existing ones overwrite new ones)
            $opts[$widget_id] = array_merge($args,$w_opts);
        }
        else {
            //Merge new options with existing ones, and add it back to the widgets array
            $opts[$widget_id] = array_merge($w_opts,$args);
        }

        //Save the entire widgets array back to the db
        return update_option('dashboard_widget_options', $opts);
    }

}
// End widget Install code
function nps_support_dashboard_plugin_action_links($links, $file) {

	if ( $file == plugin_basename( __FILE__ ) ) {
	    // the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
       	$nps_support_dashboard_links = '<a href="'.get_admin_url().'options-general.php?page=nps-support-dashboard/options.php">'.__('Settings', 'nps_support_dashboard').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $nps_support_dashboard_links );
	}

	return $links;
}

// Start admin Menu and Page Install code.

// add admin menu function to system for the menu
function register_nps_support_dashboard_menu_page(){ // Register the dash menu and page function
    add_menu_page( 'Support Dash', 'Support Dash', 'manage_options', 'nps_support_dashboard_page', 'nps_support_dashboard_menu_page', plugins_url( 'nps-support-dashboard/images/nps-icon.png' ), 0 ); 
}
// retreive the dashboard page code from dashboard_page.php and display the page when the menu button is clicked
function nps_support_dashboard_menu_page(){
    require_once( 'dashboard_page.php' );	
}
// End admin Menu and Page Install code

// Display a Settings link on the main Plugins page

// End New Plugin code

?>
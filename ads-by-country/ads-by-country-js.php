<?php
/*
Plugin Name: Ads By Country
Plugin URI: http://www.skyrocketwebsites.com/wordpress-plugins/ads-by-country/
Version: 0.1
Author: <a href="http://www.skyrocketwebsites.com">Nick Daugherty</a>
Description: This plugin uses Javascript to show ad widgets to users based on their country.  Uses the awesome <a href="http://www.maxmind.com" target="_blank">MaxMind</a> GeoIP Javascript Web Service.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	MaxMind's API is extremely fast, lightweight, and most of all, free. 

	DISCLAIMER: The author of this plugin is in no way associated with MaxMind, 
	and this plugin is not sanctioned or supported by MaxMind in any way. This 
	plugin is offered with no warranties or guarantees, expressed or implied. 
	The author of this plugin is in no way responsible for any results 
	associated with the use of this plugin. 

	Special thanks to Patrick Friedl for his WP-Geolocation plugin:
	http://wordpress.org/extend/plugins/wp-geolocation-js/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
*/
?>
<?php

//------------------------------------------------------------------------//
//---Functions------------------------------------------------------------//
//------------------------------------------------------------------------//
// set up the WPGeoLocation class
if (!class_exists("WPGeoLocation")) {
	class WPGeoLocation {

		function WPGeoLocation() { //constructor
		}

		function addHeaderCode() {
		?>
<!-- begin wp geolocation script -->
<script language="javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script language="javascript">
mmjsCountryCode = geoip_country_code();
mmjsCountryName = geoip_country_name();
mmjsIPAddress = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
</script>
<!-- end wp geolocation script -->
			<?php
		}		
		function getCountryCode() {
			return '<script language="javascript">document.write(geoip_country_code());</script>';
		}
		function getCountryName() {
			return '<script language="javascript">document.write(geoip_country_name());</script>';
		}
		function getIPAddress() {
			return $_SERVER['REMOTE_ADDR'];
		}

	}
} // end class WPGeoLocation

// initialize the WPGeoLocation class
if (class_exists("WPGeoLocation")) {
    $wp_geolocation = new WPGeoLocation();
	global $geo_countrycode;
	global $geo_countryname;
}

//------------------------------------------------------------------------//
//---Hooks-and-Shortcodes-------------------------------------------------//
//------------------------------------------------------------------------//
if (isset($wp_geolocation)) {
    // Actions
	add_action('wp_head', array(&$wp_geolocation, 'addHeaderCode'), 100);
	add_action( 'widgets_init', 'load_abc_widget' );

	// Shortcodes
    add_shortcode('mmjs-countrycode', array(&$wp_geolocation, 'getCountryCode'));
    add_shortcode('mmjs-countryname', array(&$wp_geolocation, 'getCountryName'));
    add_shortcode('mmjs-ip', array(&$wp_geolocation, 'getIPAddress'));
}

//------------------------------------------------------------------------//
//---Options Page---------------------------------------------------------//
//------------------------------------------------------------------------//
function skyrocket_abc_admin_menu() {
	$title = 'Ads By Country';
	add_options_page($title, $title, 'manage_options', dirname(__FILE__) . '/options.php');
}
add_action('admin_menu', 'skyrocket_abc_admin_menu');

//------------------------------------------------------------------------//
//---Widget---------------------------------------------------------------//
//------------------------------------------------------------------------//
function load_abc_widget() {
	register_widget('AdsByCountryWidget');
}

class AdsByCountryWidget extends WP_Widget {
	// Declares the AdsByCountryWidget class.
	function AdsByCountryWidget(){
		$widget_ops = array('classname' => 'widget_adsbycountry', 'description' => __( "Configure and set up display rules on the Ads by Country administration page.") );
		$this->WP_Widget('adsbycountry', __('Ads By Country'), $widget_ops);
		}

	// Display the Widget
	function widget($args, $instance){
		extract($args);
				
		# User-selected Settings
		$title = apply_filters('widget_title', $instance['title']);
		
		# Before the widget
		echo $before_widget;

		# The title
		if ( $title )
		echo $before_title . $title . $after_title;

		# Make the widget -- HTML CODE GOES HERE
		?>

<script type="text/JavaScript">
<!--
// Debug -- just checking a few things
//document.write("=== DEBUG MODE ON ===<br>");
//document.write("Your country is:<br>" + mmjsCountryCode + "<br>" + mmjsCountryName +  "<br>" + mmjsIPAddress + "<br>");
//document.write("=== AD START ===<br>");

switch(mmjsCountryCode)
{
case "US":
  var adcode = <?php echo json_encode(get_option('abc_US_ad')) ;?>;
  break;
case "CA":
  var adcode = <?php echo json_encode(get_option('abc_CA_ad')) ;?>;
  break;
case "GB":
  var adcode = <?php echo json_encode(get_option('abc_GB_ad')) ;?>;
  break;
case "AU":
  var adcode = <?php echo json_encode(get_option('abc_AU_ad')) ;?>;
  break;
default:
  var adcode = <?php echo json_encode(get_option('abc_worldwide_ad')) ;?>;
}

document.write(adcode);

//-->
</script>

		<?php 
		# After the widget
		echo $after_widget;
	}

	// Save the widget settings.
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		# Strip tags (if needed) and update the widget settings
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));

		return $instance;
	}

	// Create the edit form for the widget - admin side
	function form($instance){

		// Set the defaults
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '' 
			 ) );
		
		$title = htmlspecialchars($instance['title']);
	
		# Output the options
		//Title
		echo '<p>
			<label for="'. $this->get_field_name( 'title' ).'">Title: 
			<input style="width:100%" id="'. $this->get_field_id( 'title' ).'" name="'. $this->get_field_name( 'title' ).'" value="'. $title.'" type="text" /></label></p>';
		echo '<p>'. sprintf( __('Configure and set up display rules on the <a href="%s">Ads by Country</a> settings page.'), admin_url('options-general.php?page=ads-by-country/options.php') ) .'</p>';
	}
} // END AdsByCountryWidget class

?>
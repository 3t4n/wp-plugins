<?php
/*
Plugin Name: AdSenseAnna - The Google AdSense Sidebar
Plugin URI: http://kopy-online.de/internet/google-adsense-in-the-wordpress-sidebar-widget/
Description: implements a AdSense Image Block in your Sidebar. Visit <a href="http://kopy-online.de" target="_blank">my Website</a> for support and full instruction.
Author: Philipp Kopy
Author URI: http://www.kopy-online.de
Version: 1.2.1
*/

function widget_AdSenseAnna_init() {
	if ( !function_exists('register_sidebar_widget') ) return;
	function widget_AdSenseAnna($args) {
		extract($args);
		$options = get_option('widget_AdSenseAnna');
		echo $before_widget . $before_title . $options['AdSenseAnna-Title'] . $after_title;
		include($options['banner']  . ".php");
		echo $after_widget;
	}
	function widget_AdSenseAnna_control() {
		$options = get_option('widget_AdSenseAnna');

		if ( !is_array($options) ){
			//set default options
			$options = array ('banner' => "", 'AdSenseAnna-AdSenseID' => "", 'AdSenseAnna-Title' => "Adsense Sidebar");
		}
		if ( $_POST['AdSenseAnna-submit'] ) {
			    $options['banner'] = htmlspecialchars($_POST['banner']);
			    $options['AdSenseAnna-AdSenseID'] = htmlspecialchars($_POST['AdSenseAnna-AdSenseID']);
			    $options['AdSenseAnna-Title'] = htmlspecialchars($_POST['AdSenseAnna-Title']);
				update_option('widget_AdSenseAnna', $options);
		}
		include("html.inc");
	}
	register_sidebar_widget(array('AdSenseAnna', 'widgets'), 'widget_AdSenseAnna');
	register_widget_control(array('AdSenseAnna', 'widgets'), 'widget_AdSenseAnna_control', 300, 100);
}
add_action('widgets_init', 'widget_AdSenseAnna_init')



?>
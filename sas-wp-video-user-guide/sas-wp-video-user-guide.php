<?php
/*
Plugin Name: SelfAssemblySites Website Video User Guide
Plugin URI: http://www.selfassemblysites.com
Description: Embeds a WordPress video user guide right into your WordPress Dashboard.
Version: 1.0
Author: WebsiteDoctor
Author URI: http://www.websitedoctor.com
Contributors: WebsiteDoctor, SelfAssemblySites
Tags: video, guide, user guide
Requires at least: 3.0
Tested up to: 4.4.2
Stable tag: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

function sas_wp_video_guide() {
 	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'sas_dashboard_widget',
		'SelfAssemblySites Website Video User Guide',
		'register_sas_dashboard_widget'
	);

 	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'sas_dashboard_widget' => $dashboard['sas_dashboard_widget'] );
 	unset( $dashboard['sas_dashboard_widget'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

add_action( 'wp_dashboard_setup', 'sas_wp_video_guide' );

function register_sas_dashboard_widget() {
?>
<h2>Getting Started</h2>
<iframe width="100%" src="https://www.youtube.com/embed/hvpPzsL1HxY?rel=0" frameborder="0" allowfullscreen></iframe>

<h2>Editing Pages</h2>
<iframe width="100%" src="https://www.youtube.com/embed/1FOSBcnsNGI" frameborder="0" allowfullscreen></iframe>

<h2>Create a Link on a Page</h2>
<iframe width="100%"  src="https://www.youtube.com/embed/4QtVC_JEtzI" frameborder="0" allowfullscreen></iframe>

<h2>Insert and Edit Images</h2>
<iframe width="100%"  src="https://www.youtube.com/embed/7Dm5OCa1VnU" frameborder="0" allowfullscreen></iframe>

<h2>Publish a Blog Post</h2>
<iframe width="100%"  src="https://www.youtube.com/embed/uXFcPJaP1Kg" frameborder="0" allowfullscreen></iframe>

<h2>Add a New Page</h2>
<iframe width="100%"  src="https://www.youtube.com/embed/OA3FwKEw0rM" frameborder="0" allowfullscreen></iframe>

<h2>Editing Sidebars</h2>
<iframe width="100%" src="https://www.youtube.com/embed/6MyOqM9qVDo" frameborder="0" allowfullscreen></iframe>
<?php
}

?>
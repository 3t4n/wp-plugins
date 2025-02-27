<?php
if (!defined('ABSPATH'))
{
	exit;
}


function ecpt_admin_setting_panel_option_right_tip($content,$textdomain='', $wragtag ='span', $color = ' color:#999; ', $marginleft=' margin-left:20px; ', $italyleft = '<i>',$italyright = '</i>', $class='', $lefthu='(', $righthu =')')
{
	$return = __( " <$wragtag style='$marginleft  $color'> $italyleft $lefthu $content $righthu $italyright</$wragtag>", "$textdomain" );
	return $return;
	// for example echo __( " <span style='margin-left:20px;color:#999'><i>( Shortcode: [shortcode] )</i></span>", 'example-domaintext' );
	// call $ecpt_admin_setting_panel_option_right_tip = ecpt_admin_setting_panel_option_right_tip('Shortcode: [sortcode]','text-domain');
	// call echo $ecpt_admin_setting_panel_option_right_tip;
}



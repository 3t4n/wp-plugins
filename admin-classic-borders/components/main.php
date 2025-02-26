<?php

if (!function_exists('acb_add_admin_css')) {
	function acb_add_admin_css($atts, $content = null){

		$options_main = get_option('acb_options_main');
		$options_extra = get_option('acb_options_extra');

		$lightopacity = floatval($options_main['lightopacity'])/100;
		$darkopacity = floatval($options_main['darkopacity'])/100;

		echo '
		<style type="text/css">
		';
		echo '
			/* General Borders Options */
			#adminmenu li.wp-menu-open {border-width:0px;}
			#adminmenu li.wp-menu-separator {margin:0; height:9px;}
			#adminmenu #collapse-menu {margin-top:0;}
			#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu {border-top-color:rgba(255,255,255,'.$lightopacity.'); border-top-style:solid; border-top-width:0;}
			#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator {border-bottom-color:rgba(0,0,0,'.$darkopacity.'); border-bottom-style:solid; border-bottom-width:0;}
			#adminmenu {border-top-color:rgba(0,0,0,'.$darkopacity.'); border-top-style:solid; border-top-width:0;}
		';

		if ($options_main['bordertype'] == 'light') {echo '
			/* Light Borders */
			#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu {border-top-width:1px;}
		';}

		elseif ($options_main['bordertype'] == 'dark') {echo '
			/* Dark Borders */
			#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator {border-bottom-width:1px;}
			#adminmenu {border-top-width:1px;}
		';}

		elseif ($options_main['bordertype'] == '3D') {echo '
			/* 3D Borders */
			#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu {border-top-width:1px; }
			#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator {border-bottom-width:1px;}
			#adminmenu {border-top-width:1px;}
		';}

		echo '
			/* Breaking up the left-side border on activated plugins */
			.widefat {border-spacing:0px 1px;}
		';

		echo '
			/* Restoring borders between rows in non-plugins tables */
			.widefat th, .widefat td {border-bottom:1px solid rgb(225, 225, 225);}
			.widefat th, .widefat td {box-shadow:none !important;}
			.form-table td, .form-table th {border-bottom:solid 1px rgb(200,200,200);}
		';

		if ($options_extra['showrowhovereffect'] == 'yes') {echo '
			/* Creating a hover affect for rows */
			#the-list tr:hover, #the-comment-list tr:hover {background-color:'.$options_extra['rowhovercolor'].';}
		';}

		if ($options_extra['customcss']) {echo '
			/* Custom CSS added by the site owner */
			'.$options_extra['customcss'].'
		';}

		if ($options_extra['restoreadminbarheight'] == 'yes') {echo '
			@media screen and (min-width: 783px) {
				html {padding-top:28px !important;}
				#wpadminbar {height:28px;}
				#wpadminbar .ab-item, #wpadminbar .ab-label {line-height:28px !important; height:28px !important;} 
				#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before,
				#wpadminbar #wp-admin-bar-my-sites > .ab-item:before,
				#wpadminbar #wp-admin-bar-site-name > .ab-item:before,
				#wpadminbar #wp-admin-bar-edit > .ab-item:before,
				#wpadminbar #wp-admin-bar-updates .ab-icon:before {top:0 !important;}
				#wpadminbar #wp-admin-bar-new-content .ab-icon:before {top:2px !important;}
				#wpadminbar #wp-admin-bar-comments .ab-icon:before {top:1px !important;}
				#adminbarsearch {height:28px;}
				#adminbarsearch:before {top:5px;}
				#adminbarsearch input {top:-2px;} 
			}
		';}

		echo '
			@media screen and (min-width: 783px) {
				html.temp28px {padding-top:28px !important;}
				html.temp28px #wpadminbar {height:28px;}
				html.temp28px #wpadminbar .ab-item, html.temp28px #wpadminbar .ab-label {line-height:28px !important; height:28px !important;} 
				html.temp28px #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before,
				html.temp28px #wpadminbar #wp-admin-bar-my-sites > .ab-item:before,
				html.temp28px #wpadminbar #wp-admin-bar-site-name > .ab-item:before,
				html.temp28px #wpadminbar #wp-admin-bar-edit > .ab-item:before,
				html.temp28px #wpadminbar #wp-admin-bar-updates .ab-icon:before {top:0 !important;}
				html.temp28px #wpadminbar #wp-admin-bar-new-content .ab-icon:before {top:2px !important;}
				html.temp28px #wpadminbar #wp-admin-bar-comments .ab-icon:before {top:1px !important;}

				html.temp32px {padding-top:32px !important;}
				html.temp32px #wpadminbar {height:32px;}
				html.temp32px #wpadminbar .ab-item, html.temp32px #wpadminbar .ab-label {line-height:32px !important; height:32px !important;} 
				html.temp32px #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before,
				html.temp32px #wpadminbar #wp-admin-bar-my-sites > .ab-item:before,
				html.temp32px #wpadminbar #wp-admin-bar-site-name > .ab-item:before,
				html.temp32px #wpadminbar #wp-admin-bar-edit > .ab-item:before,
				html.temp32px #wpadminbar #wp-admin-bar-updates .ab-icon:before {top:2px !important;}
				html.temp32px #wpadminbar #wp-admin-bar-new-content .ab-icon:before {top:4px !important;}
				html.temp32px #wpadminbar #wp-admin-bar-comments .ab-icon:before {top:3px !important;}
			}
		</style>	
		';
	}
}
add_action('admin_head', 'acb_add_admin_css');

if (!function_exists('acb_add_frontend_css')) {
	function acb_add_frontend_css($atts, $content = null){

		$options_extra = get_option('acb_options_extra');

		if ( is_admin_bar_showing() && $options_extra['restoreadminbarheight'] == 'yes' ) {
			echo '
			<style type="text/css">
				@media screen and (min-width: 783px) {
					html {padding-top:28px !important;}
					#wpadminbar {height:28px;}
					#wpadminbar .ab-item, #wpadminbar .ab-label {line-height:28px !important; height:28px !important;} 
					#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before,
					#wpadminbar #wp-admin-bar-my-sites > .ab-item:before,
					#wpadminbar #wp-admin-bar-site-name > .ab-item:before,
					#wpadminbar #wp-admin-bar-edit > .ab-item:before,
					#wpadminbar #wp-admin-bar-updates .ab-icon:before {top:0 !important;}
					#wpadminbar #wp-admin-bar-new-content .ab-icon:before {top:2px !important;}
					#wpadminbar #wp-admin-bar-comments .ab-icon:before {top:1px !important;}
					#adminbarsearch {height:28px;}
					#adminbarsearch:before {top:5px !important;}
					#adminbarsearch input {top:-2px;}
				}
				@media screen and (max-width: 782px) {
					html {margin-top: 46px !important;}
					* html body {margin-top: 46px !important;}
					#wpadminbar {position:fixed !important;}
				}
			</style>
			';
		}
	}
}
add_action('wp_head', 'acb_add_frontend_css');

function remove_default_height_bump() {
	$options_extra = get_option('acb_options_extra');
	if ( is_admin_bar_showing() && $options_extra['restoreadminbarheight'] == 'yes' ) {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
}
add_action('get_header', 'remove_default_height_bump');
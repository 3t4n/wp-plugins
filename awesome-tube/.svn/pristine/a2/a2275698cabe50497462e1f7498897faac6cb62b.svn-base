<?php

if( is_user_logged_in() ) {
	if ( 'my-tube' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/my-tube.php';
		return $new_template;
	} elseif ( 'awetube-login' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/login-template.php';
		return $new_template;
	} elseif ( 'awetube-register' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/register-template.php';
		return $new_template;
	} elseif ( 'awetube-profile' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/edit-profile.php';
		return $new_template;
	} elseif ( 'awetube-upload' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/public/partials/awetube-upload.php';
		return $new_template;
	} elseif ( 'awetube-edit-video' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/public/partials/awetube-edit-video.php';
		return $new_template;
	}
} else {
	if ( 'my-tube' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/login-template.php';
		return $new_template;
	} elseif ( 'awetube-login' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/login-template.php';
		return $new_template;
	} elseif ( 'awetube-register' === $wp->request ) {
		$new_template = AWETUBE_PLUGIN_DIR . '/modules/templates/register-template.php';
		return $new_template;
	}
    // elseif ( 'edit_profile' === $wp->request ) {
	// 	$new_template = AWETUBE_PLUGIN_DIR . '/template/myaccount-template.php';
	// 	return $new_template;
	// }
}

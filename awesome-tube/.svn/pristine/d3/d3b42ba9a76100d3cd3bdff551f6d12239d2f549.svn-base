<?php

if( is_user_logged_in() ) {
	if ( 'my-tube' === $wp->request ) {
		$title_parts['title'] = 'My Account';
	} elseif ( 'edit_profile' === $wp->request ) {
		$title_parts['title'] = 'Edit Profile';
	} elseif ( 'awetube-upload' === $wp->request ) {
		$title_parts['title'] = 'Add Video';
	} elseif ( 'my-videos' === $wp->request ) {
		$title_parts['title'] = 'My Videos';
	} elseif ( 'awetube-edit-video' === $wp->request ) {
		$title_parts['title'] = 'Edit Video';
	} elseif ( 'awetube-login' === $wp->request ) {
		$title_parts['title'] = 'Login Page';
	} elseif ( 'awetube-profile' === $wp->request ) {
		$title_parts['title'] = 'Edit Profile';
	}
} else {
	if ( 'my-tube' === $wp->request ) {
		$title_parts['title'] = 'Login';
	} elseif ( 'edit_profile' === $wp->request ) {
		$title_parts['title'] = 'Login';
	} elseif ( 'awetube-upload' === $wp->request ) {
		$title_parts['title'] = 'Login';
	} elseif ( 'my-videos' === $wp->request ) {
		$title_parts['title'] = 'Login';
	} elseif ( 'edit-video' === $wp->request ) {
		$title_parts['title'] = 'Login';
	} elseif ( 'awetube-login' === $wp->request ) {
		$title_parts['title'] = 'Login Page';
	}
}

<?php

/**
 * Render the credly login button.
 *
 * @since 1.0.0
 */
function credly_login_render_form()
{
	echo
		'<p id="credly-login-or">OR</p>
		<button type="button" id="credly-login-button" class="button button-secondary button-large"><span>Log In with </span><img src="' . CREDLY_LOGIN_URL . 'assets/img/credly_logo_trans.png" /></button>';
}

/**
 * Render the credly login form modal window.
 *
 * @since 1.0.0
 */
function credly_login_render_modal()
{
	echo
		'<div id="credly-login-modal">
			<form name="credlyform" id="credlyform" action="" method="post">
		 		<img src="' . CREDLY_LOGIN_URL . 'assets/img/credly_logo.jpg" />
				<label for="credly_email">Email</label>
				<input type="text" name="credly_email" class="input" />
				<label for="credly_password">Password</label>
				<input type="password" name="credly_password" class="input" />
				<span id="credly-login-loader"></span>
				<input type="submit" value="Submit" class="button button-primary button-large" />
				<p id="credly-login-error"></p>
				<p class="credly-login-external-link">Not yet a member of Credly? <a href="https://credly.com/#!/create-account" target="_blank">Join now</a> (it\'s free).</p>
				<p class="credly-login-external-link"><a href="https://credly.com/#!/reset-password" target="_blank">Forgot password?</a></p>
			</form>
		</div>
		<div id="credly-login-overlay"></div>';
}

/**
 * Load the login form page styles in the page head.
 *
 * @since 1.0.0
 */
function credly_login_form_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . CREDLY_LOGIN_URL . 'assets/css/login.css" />';
}

/**
 * Load the frontend login form styles in the page head.
 * These styles are used for the sidebar widget.
 *
 * @since 1.0.0
 */
function credly_login_frontend_form_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . CREDLY_LOGIN_URL . 'assets/css/frontend.css" />';
}

/**
 * Load the buddypress frontend login form styles in the page head.
 *
 * @since 1.0.0
 */
function credly_login_buddypress_form_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . CREDLY_LOGIN_URL . 'assets/css/buddypress.css" />';
}


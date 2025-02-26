=== Plugin Name ===
Plugin Name: Glitch Authenticator
Contributors: liping
Donate link: http://www.gregariousgrocer.com/support-glitch-authenticator/
Tags: glitch.com, authentication
Requires at least: 2.8
Tested up to: 3.3
Stable tag: 0.7

This plugin adds support for users to login with their Glitch.com account.

== Description ==

Glitch Authenticator is not endorsed by or affiliated with [Tiny Speck, Inc.](http://www.tinyspeck.com/), the makers of [Glitch](http://www.glitch.com/), in any way.

= Features =

* allows users to login with their Glitch.com account
* displays Glitch avatars in comments

You will need to [generate an API key](http://developer.glitch.com/keys/new/) for your site.

= Hooks for Customisation =

1. `apply_filters('glitchauth_display_login', $glitchLoginButton)` - customise the Login with Glitch button
2. `apply_filters('glitchauth_loginmessage', $message, $error, $error_description)` - customise the login error message
3. `do_action('glitchauth_new_user', $obj)` - new user
4. `do_action('glitchauth_returning_user', $obj)` - returning user
5. `apply_filters('glitchauth_comment_avatar_size', $avatarSize)` - Change avatar size displayed in comments. Options are: '50' (default), '100', '172'

= Theme Integration =
 
To generate a Glitch login button for your theme, use the `glitchauth_login_url` function in place of `wp_login_url`.
Example: 
`<?php 
	echo '<a class="button" href="' . glitchauth_login_url() . '">Login with Glitch</a>'; 
	// Alternatively, bring the user back to current page after login by using the redirect_to param
	// echo '<a class="button" href="' . glitchauth_login_url() . '&' . http_build_query(array('redirect_to'=>get_permalink())) . '">Login with Glitch</a>';
?>`


If in <a href="http://codex.wordpress.org/The_Loop">The Loop</a>, you can use `the_glitch_avatar` function.
Example: 
`<?php 
if ( have_posts() ) while ( have_posts() ) : the_post(); 
	the_glitch_avatar('100'); 	// sizes: '50','100','172'
endwhile; 
?>`


To get a specific user's Glitch Avatar, use the `glitchauth_get_glitch_avatar()` function.
Example: 
`<?php
	$current_user = wp_get_current_user();
	echo '<img class="glitch-avatar" src="' . glitchauth_get_glitch_avatar($current_user) . '">';
?>`


== Changelog ==
= 0.7 =
- Support redirect_to (see Theme Integration)

= 0.6 = 
- Fixes
- Add support for minimum Glitch level for login (for spam control)
- Ability to block users from logging in by removing roles.

= 0.5 = 
First release

== Upgrade Notice ==
= 0.7 = 
Support redirect_to (see Theme Integration)

== Installation ==

1. For upgrading, please deactivate the plugin before uploading.
2. Upload the whole 'glitch-authenticator' folder to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to Settings > Glitch Authenticator and follow the instructions for keying in your Glitch API key and secret.

== Frequently Asked Questions ==
I am still waiting for questions! :D

== Screenshots ==

1. Login Screen
2. Avatars in Comments
3. API Settings

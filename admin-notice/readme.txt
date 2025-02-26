=== Plugin Name ===
Contributors: adamwalter
Tags: admin, backend, notice, alert
Requires at least: 3.0.1
Tested up to: 5.9
Requires PHP: 7.0
Stable tag: 1.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display a custom notice to all users in the WordPress admin.

== Description ==

Admin Notice is a very simple plugin that allows you to display custom notices in the WordPress admin that is visible to all users.

Control over the notice text and styling is available from the plugin's settings page.

Developers can use the `admin_notice_enable` hook to control the notice's visibility on a more granular level. The following example demonstrates how to show the notice only in the "Posts" area of the admin.

`
add_filter('admin_notice_enable', function($enabled) {

	$screen = get_current_screen();

	if (isset($screen->post_type) && $screen->post_type !== 'post') {
		$enabled = false;
	}

	return $enabled;

}, 10, 1);
`

== Installation ==

1. Upload `admin-notice` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Plugin options will be available under Settings → Admin Notice

== Frequently Asked Questions ==

= I have a question =

Leave your question in the support tab and I'll respond!

== Screenshots ==

1. Creating your admin notice

== Changelog ==

= 1.2 =
* Enhancement: Adds `admin_notice_enable` filter. Thanks to @sevans917 for the feature request!

= 1.1 =
* Enhancement: Renames notice styles to be in line with WordPress admin notice classes.
* Security: Much better input sanitization added.
* Tweak: Removes old (ugly) notice styles in favor of default WordPress styles.
* Tweak: Moves plugin settings page to the Settings menu.
* Tweak: Plugin now cleans up its database options on uninstall.
* Tweak: Major code refactoring.

= 1.0 =
* First version of the plugin

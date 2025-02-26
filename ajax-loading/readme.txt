=== AJAX Loading ===
Contributors: maheshmthorat
Donate Link: https://buymeacoffee.com/maheshmthorat
Tags: ajax, page loading, asynchronous, content, javascript
Requires at least: 4.5
Requires PHP: 5.6
Tested up to: 6.6.2
Stable tag: 1.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This plugin improves your users page experience without reloading pages using AJAX. 

== Description ==

Enhance your website’s performance and user experience with our **Ajax Page Loading Plugin**. Load content asynchronously without reloading the page, thanks to the power of AJAX. Enjoy seamless content updates and a smoother browsing experience with lightweight JavaScript implementation—no heavy JS frameworks required.

== Key Features: ==

🔹 **Seamless Content Updates:** Load new content without refreshing the entire page, ensuring a fluid and uninterrupted user experience.
🔹 **Lightweight Implementation:** Boost your website’s performance with minimal JavaScript, avoiding the bloat of heavy frameworks.
🔹 **Customizable JavaScript Callback:** Leverage the `wp_ajax_load_complete` callback function for tailored JS hooks and custom behaviors.

== JavaScript Callback Function ==

Use below callback function in your javascript library or you can just directly use * wp_footer * hook for add custom script. 

``wp_ajax_load_complete = function() {
``  // YOUR JS HOOKS
``}


== Installation ==

= Using plugins page =
1. Go to Plugins -> Add New and search for AJAX Loading.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.
3. Click the `AJAX Loading` link located in main menu section to configure the plugin options

= Using Manual File System =
1. Upload `all-in-one-wp-content-security.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Click the `AJAX Loading` link located in main menu section to configure the plugin options

== Screenshots ==

1. A general view of the plugin "options" page.

== Changelog ==

= 1.1 =
* Security Update

= 1.0 =
* Tested with WordPress 6.4.3
* Minor Fixes

= 0.2 =
* Tested with various themes and plugins.
* Bug fixes of JS and CSS animations.
* Added callback function for javascript after page loaded. 

= 0.1 =
* Initial Public Release

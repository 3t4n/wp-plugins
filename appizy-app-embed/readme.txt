=== App Embed ===
Contributors: nicolashefti
Tags: appizy, spreadsheet, embed, calculator, web-calculator
Requires at least: 4.9
Tested up to: 6.7
Requires PHP: 5.6
Stable tag:2.4.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Appizy App Embed provides a very easy and efficient way to embed your web-calculator created with Appizy.

== Description ==

Appizy App Embed allows you to add a web calculator inside your WordPress site.

Key features:

* Logged in user can save the application state.
* Shortcode generator in the Admin to customize the embed options.
* Fast embed using shortcode inside any post.
* Manage you web-calculator like any other media item.
* Separation of code (CSS and JavaScript) using an iFrame tag to avoid any collision with WordPress.

Please visit the [Github page](https://github.com/appizy/appizy-app-embed "Github") for the latest code development,
planned enhancements and known issues.

To learn more about spreadsheet conversion into web-calculator please visit [Appizy website](http://www.appizy.com).

== Getting Started ==

Here's how easy it is to use…

1. Once you have the plugin installed, go to your Media library and add your web-calculator to it.
2. Go to 'Tools > Appizy' to see all available web-calculators in your WordPress.
3. Copy the shortcode associated to the file of your choice and paste it into the post or page of your choice.
4. Save the content and open it. The web-calculator is now embedded into your content.

== Installation ==

Appizy App Embed can be found and installed via the Plugin menu within WordPress administration (Plugins -> Add New).
 Alternatively, it can be downloaded from WordPress.org and installed manually.

1. Upload the entire `appizy-app-embed-code` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress administration.

== Screenshots ==

1. Admin overview (accessible under "Tools > Appizy"). List of all applications and the shortcode generator
2. Example of shortcode in a post
3. Basic web-calculator embed
4. A web-calculator with a toolbar bellow to save the application data

== Upgrade notice ==

The version 2.0.0 brings a brand new feature to your web-calculator: it is not now possible for any logged-in user to
save the current state of the web-calculator. All shortcodes previously added to your page or article are still working
but you need to update them to enable the "saving feature".

== Frequently Asked Questions ==

= How can I send feedback or get help with a bug? =

We'd love to hear your bug reports, feature suggestions and any other feedback! Please head over to
<a href="https://github.com/Appizy/appizy-app-embed/issues">the GitHub issues page</a> to search for existing issues or
open a new one. You can also contact us on <a href="https://www.appizy.com/company/contact.html">Appizy website</a>.

= Where are the user's data from the calculator saved? =

These information are stored inside the WordPress database. Please ensure that the terms of use of your website allow
you to store these personal data.

= Is there any export or backup of these data available? =

The plugin does not offer yet any special export and backup feature. Please backup your website on a regular bases to
avoid any data loss.

= How safe is the data storage within the plugin? =

While we try to ensure that the plugin is error free, we cannot guarantee that user data will not be damaged,
deleted or lost. The developers will not be responsible for any failure caused by the plugin.

The "saving feature" is still in beta version. Do not use it for critical business or personal purpose.

== Changelog ==

= 2.4.0 =

* Security update
* Leverage on .wp-block-button to style toolbar buttons

= 2.3.0 =

* Add reset button

= 2.2.2 =

* Fix save button
* Add permission callback on REST routes

= 2.2.1 =

* Code style clean up

= 2.2.0 =

* Add print button option.

= 2.1.1 =

* Fix the version number inside plugin files.

= 2.1.0 =

* Add new "height" option in shortcode configuration to skip auto-height calculation on load.
* Remove default margin in auto-height calculation.

= 2.0.1 =

* Fix the version number inside plugin files

= 2.0.0 =

* Major new release, it is now possible to save the application state per user
* Shortcode generator to customize embed options

= 1.0.0 =

* Initial release

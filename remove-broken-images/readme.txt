=== Remove Broken Images ===
Contributors: room34
Donate link: https://room34.com/payments
Tags: missing images, broken images, deleted images, media library, remove
Requires at least: 4.9
Tested up to: 6.7
Stable tag: 1.5.0

Very simply, uses JavaScript to remove broken images from page display.

== Description ==

This is an extremely simple plugin that uses jQuery to remove broken images from displaying on your pages.

Note that version 1 does <em>not</em> alter any content in the database, nor does it remove the image tags from the initial HTML output of the page, so it doesn't stop 404 errors, nor does it benefit SEO or PageSpeed scores. It does, however, prevent the dreaded "broken image" icon from appearing in your pages, and in most cases it will remove the blank space some browsers allocate for images as they are loading.

**Coming in version 2:** We'll be adding an admin tool to let you see a list of posts and pages containing broken images, along with a tool to automatically remove their `img` tags from the database.

== Installation ==

== Frequently Asked Questions ==

= I installed and activated the plugin. Now what? =

That's it! There is no configuration necessary. The plugin adds a compact bit of JavaScript that detects if an image is returning a 404 error, and removes its HTML code from displaying on the page.

= Does this plugin delete the image code from my page/post in the WordPress database? =

No, version 1 does not make any changes whatsoever to your database. It also does not remove the missing image file's URL from the HTML that is sent to the user's web browser; it removes the tags from the DOM (Document Object Model) *after* the page has been loaded, using JavaScript, to prevent "broken image" icons, extra white space, and links/captions associated with those missing images from displaying.

= How can I redirect to the home page when an image is missing on a post? =

The `r34rbi_missing_image` jQuery hook (added in version 1.4.0) allows you to modify the plugin's behavior with custom code, whenever a missing image is encountered. It is used by the `r34rbi_redirect_on_missing_image` PHP filter (also added in version 1.4.0) to easily redirect to the home page in this situation, by adding this snippet of PHP code to your theme:

`add_filter('r34rbi_redirect_on_missing_image', '__return_true');`

You can replace `'__return_true'` with a custom callback function to change the redirect URL to something other than your site's home page.

== Screenshots ==

== Changelog ==

= 1.5.0 - 2024.10.04 =

* Features:
  * Added logic to remove SEO `meta` tags for `og:image` and `twitter:image` if they match the URL of an image the plugin is removing from the page content.
  * Expanded logic from 1.4.1 by adding a check for the Block Editor page.
* Development:
  * Refactored code into `R34RBI` class.
  * Created framework for admin settings page (not currently active, but will be used for version 2.0 features).
  * Set `$translate` input parameter to `false` on `get_plugin_data()` call, as it may cause PHP notices as of WordPress 6.7. See the [WordPress Trac](https://core.trac.wordpress.org/ticket/62154#comment:8) for more details.
* i18n:
  * Added `.pot` file for translation support.
* Bumped "Tested up to" to 6.7.

= 1.4.1 - 2024.04.23 =

* Added logic to prevent plugin's code from loading on admin or login pages.

= 1.4.0 - 2024.04.09 =

* Added `r34rbi_missing_image` jQuery hook to allow custom functionality to override the plugin's default behavior when a missing image is encountered. Also added `r34rbi_redirect_on_missing_image` PHP filter, to allow for an easy application of this functionality in your theme. See FAQs for code example.
* Bumped "Tested up to" to 6.5.

= 1.3.1 - 2023.07.23 =

* Re-minified JS.
* Bumped "Tested up to" to 6.3.

= 1.3.0 - 2021.12.21 =

* Added handling for `img` tags inserted dynamically into the DOM via AJAX.
* Added minified `script.min.js` file to reduce page payload.
* Reformatted source JavaScript code for legibility and added comments.

= 1.2.0 - 2021.11.22 =

* Refactored all of the plugin's logic into jQuery, eliminating the need for using `the_content` filter to insert `onerror` into all `img` tags.

= 1.1.0 - 2021.11.22 =

* Added separate `script.js` file; moved JavaScript logic from inline `onerror` attribute to a function that will also remove parent `a` element and ancestor `.wp-caption` element from the DOM, in addition to the `img` tag itself.

= 1.0.0 - 2021.11.20 =
* Original version.

== Upgrade Notice ==

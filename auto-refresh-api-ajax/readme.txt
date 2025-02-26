=== Auto Refresh API AJAX ===
Contributors: berkux
Tags: content,json,api,ajax,liveticker
Requires at least: 3.0
Tested up to: 6.6
Requires PHP: 7.0
Stable tag: 1.2.10
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Plugin to load data via JSON-API, display it on WordPress pages, posts, or sidebars, and auto-refresh without reloading. E.g. for livetickers...

== Description ==

= Auto Refresh API AJAX is a powerful WordPress plugin that allows you to seamlessly load JSON feeds via HTTP and display the data on your site. This plugin is perfect for displaying dynamic content such as the current time, live sports results, and more. =

**Key Features:**
- **Easy JSON Data Loading:** Effortlessly load JSON feeds and display their data on your WordPress site.
- **Auto-Refresh Functionality:** Set custom intervals to automatically reload the JSON feed and update the displayed data, ensuring your content is always up-to-date.
- **Dynamic Content Display:** Perfect for showcasing real-time information such as live sports results, current time, stock prices, weather updates, and more.
- **Customizable GET Parameters:** Use placeholders in your JSON URL (e.g., "...?day=#GET_day#") to dynamically replace them with actual values, enabling tailored content display on different pages.
- **User-Friendly Interface:** Simple setup and configuration through an intuitive interface.

**How It Works:**
1. **Configure JSON Feed URL:** Enter the URL of the JSON feed you want to display.
2. **How to proxy foreign URLs?** Choose how remote data is retireved
3. **Set Refresh Interval:** Choose the time interval after which the JSON feed should be reloaded.
4. **Select JSON data:** Choose the JSON-path to the needed value
5. **Display Dynamic Data:** Set the DOM-Pageselector, which is something like h1[class="page-title"] to define a HTML-Node where the data is inserted
6. **Optional: Custom GET Parameters:** Add GET parameters to your JSON URL to dynamically replace placeholders with real-time values, enhancing the flexibility of your content display.

[youtube https://www.youtube.com/watch?v=mzQLX8xkfOU]

With Auto Refresh API AJAX, you can ensure your site always shows the latest information, providing a dynamic and engaging experience for your visitors.

== Frequently Asked Questions ==
[Example](https://kux.de "Example: See the date and time in the Right column").

= API with authorization =
If the API requires authorization, you can handle this with the plugin [JSON Content Importer](https://json-content-importer.com "JSON Content Importer"): With this plugin you can access to almost any API and build a JSON-feed out of the API-JSON as you like.

== Installation ==
For detailed installation instructions, please read the [standard installation procedure for WordPress plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

1. Login to your WordPress installation
2. Install plugin by uploading the plugins to `/wp-content/plugins/`.
3. Activate the plugin through the _Plugins_ menu.
4. Klick on "Auto Refresh AA" menuentry in the left bar and set the info for what, how often, where...

= Where is this plugin from? =
This plugin is made in munich, bavaria, germany!
Famous for Oktoberfest, FC Bayern Munich, AllianzArena, TUM, BMW, Siemens, seas, mountains and much more...

== Screenshots ==

1. Settings of the plugin

== Changelog ==
= 1.2.10 =
* Plugin is ok with WP 6.5.4
* The plugin is compatible with PluginCheckPlugin Version 1.0.1, with the exception of a warning: "Warning: Processing form data without nonce verification." This warning pertains to "auto-refresh-api-ajax-lib.php." The reason for this warning is as follows: The URL containing JSON data can have a GET parameter like "...?day=#GET_day#", where "#GET_day#" is a placeholder. This URL is used in the backend to fetch the data and send it to the browser. If you add the same GET parameter (e.g., "...?day=today") to the URL where the data is displayed, the GET value replaces the placeholder. This feature is useful if you want to use "Auto Refresh API AJAX" on different pages with different JSON URLs.
* Change 1 due to PluginCheckPlugin: Request to the API changed - wp_remote_get replaces file_get_contents.  wp_remote_get sends some additional http-headerdata, some APIs might answer in a different way.
* Change 2 due to PluginCheckPlugin: Added wp_json_encode before using the received JSON
* Change 3 due to PluginCheckPlugin: Improved output-escaping and nonce-checking

= 1.2.9 =
* Plugin is ok with WP 6.4.3 and 5-RC
* IMPOROVED: Backend-Design, Two Steps to Do It!
* FIX: When using WP-CLI with Plugin $_SERVER['SERVER_NAME'] might not set, hence set to ''

= 1.2.8=
* Fixed security issue: Rio D. discovered and reported a Cross Site Scripting (XSS) vulnerability. Thank you Rio! For utilize you need Wordpress-Backend-Access and the affected Page is in the Wordpress-Adminarea only. Nevertheless: Update this Plugin, please!

= 1.2.7 =
* Plugin is ok with WP 6.1.1
* Fixes for PHP 8.1

= 1.2.6 =
* You can pass GET-parameter from the page with the updating content to the ARAA-Plugin and the JSON-API from where you get the data.  If you want to pass a GET-parameter like "leagueid" to the JSON-API do this: The URL is then http://../whatever?leagueid=valueofleagueid. Add #GET_leagueid# to the JSON-URL in the plugin (add & or ? to haave a validURL). In action #GET_leagueid#this is replaced by "leagueid=valueofleagueid" 

= 1.2.5 =
* Plugin is ok with WP 5.8.2
* Bugfix sorting out local and external JSON-URLs 

= 1.2.4 =
* Plugin is ok with WP 5.8.1
* Bugfix when using JSON-URLs from the local server, the plugin is also installed 

= 1.2.3 =
* Plugin is ok with WP 5.5.1
* Bugfix passing Parameter from PHP to JS. And adding check for that on page where these values are set 

= 1.2.2 =
* Plugin is ok with WP 5.4. and PHP 7.4

= 1.2.1 =
* Minor Bugfix: Missing function added 

= 1.2.0 =
Added setting of inital values: E. g. hide box with content until the content is loaded or load content with the server first before the client 

= 1.1.0 =
Added a 2nd way to proxy URLs for AJax-Calls

= 1.0.0 =
* Initial release

== Upgrade Notice ==
Version 1.2.10: 
* Plugin is ok with WP 6.5.4
* The plugin is compatible with PluginCheckPlugin Version 1.0.1, with the exception of a warning: "Warning: Processing form data without nonce verification." This warning pertains to "auto-refresh-api-ajax-lib.php." The reason for this warning is as follows: The URL containing JSON data can have a GET parameter like "...?day=#GET_day#", where "#GET_day#" is a placeholder. This URL is used in the backend to fetch the data and send it to the browser. If you add the same GET parameter (e.g., "...?day=today") to the URL where the data is displayed, the GET value replaces the placeholder. This feature is useful if you want to use "Auto Refresh API AJAX" on different pages with different JSON URLs.
* Change 1 due to PluginCheckPlugin: Request to the API changed - wp_remote_get replaces file_get_contents.  wp_remote_get sends some additional http-headerdata, some APIs might answer in a different way.
* Change 2 due to PluginCheckPlugin: Added wp_json_encode before using the received JSON
* Change 3 due to PluginCheckPlugin: Improved output-escaping and nonce-checking
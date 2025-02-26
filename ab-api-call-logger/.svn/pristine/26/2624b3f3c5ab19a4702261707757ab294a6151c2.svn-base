=== Plugin Name ===
Contributors: technosailor
Tags: development, api
Requires at least: 3.5.1
Tested up to: 3.6-beta1
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is made for plugin developers that work with APIs and need easy access to debug information.

== Description ==

This is a very simple plugin that creates a new adminbar menu with a list of pertinent API calls used on a page.

However, no good thing happens in a vacuum, and you good folks, are developers.

In order to log API calls, you should invoke the `log_api_call()` method of the `$ab_api_logger` global object. Of course, if you prefer, you can instantiate your own object using the `AB_API_Logger` class.

The `log_api_call()` method takes two properties. The first is an array of URLs that will be included as menu items (easy access, easy click to see responses). By default, the plugin maintains a property `$api_calls` with this array and uses it to  parse out the menu items. 

However, if you wish to maintain your own array, you can do that too. The plugin takes care of what it needs, and you can feel free to maintain what you need.

The second argument for the `log_api_calls()` method is the URL that will be added to the adminbar menu. You can escape it if you want, but I will as well for security.

The reason I built this plugin is because I deal with APIs a lot. My normal approach to API integration is to use a pre-existing PHP library or, more commonly, build a library around the API so I can use it easily without having to remember everything.

Usually, this means I create a class and that class is filled with methods that construct a URL based on parameters and then use `wp_remote_get()` to retrieve the response from the API. Anytime __after__ the URL is created, invoke this plugin:

	if( class_exists( 'AB_API_Logger' ) ) {
		// Example API Call: $api_url (http://api.example.com?apikey=asdfASD234&post_id=213)
		global $ab_api_logger;
		$ab_api_logger->log_api_call( $ab_api_logger->api_calls, $api_url );
	}

Pull requests can be submitted via [Github](https://github.com/technosailor/ab-api-call-logger)

== Screenshots ==

1. This screenshot (properly obfuscated to protect the innocent) shows a clickable list of API calls performed.

== Changelog ==

= 0.1 =
* Initial Release.
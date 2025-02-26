=== Admin Country Allowlist ===
Contributors: qwebltd
Tags: block, ban, security, block countries, ban countries, geo block, admin country allowlist, admin block countries, admin countries allowlist, admin allowlist, country allowlist, countries allowlist
Requires at least: 5.8
Tested up to: 6.7
Stable tag: 1.4.0
Requires PHP: 5.6
License: MIT
License URI: https://opensource.org/license/mit/

By far the simplest country allowlist plugin available. Locks admin panel and XMLRPC access to a given list of allowed countries.

== Description ==

By far the simplest country allowlist plugin available for Wordpress. Locks admin panel and XMLRPC access to a given list of allowed countries using [QWeb's IP to country lookup API](https://apis.qweb.co.uk/ip-lookup/).

This is free open source software (FOSS), which you're welcome to either use as-is, or fork and further develop under the very permissive terms of the [MIT license](LICENSE).

Out of the box, this is most likely the simplest, most efficient plugin for restricting access to your Wordpress admin panel to an allowlist of specific countries. Simply install and activate the plugin, obtain an access key via the QWeb Ltd API console, and enter your access key in the plugin settings. The plugin will automatically determine your own country and add this to the allowlist, and you can add other countries to the list as you like.

Countries are entered as comma separated [ISO 3166-1 alpha-2 country codes](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements) in a single field, making it super easy to copy & paste the same list across multiple websites.

This plugin also restricts access to the Wordpress XMLRPC mechanism, using the same country allowlist.

You can optionally choose to allow or disallow access through known public proxy servers, even if they're located in an allowed country.

The plugin creates a cache of IP information and automatically clears cache files older than one week. This reduces the number of lookup requests and keeps your website responsive, without creating an unnecessarily large cache.

As a single 25kb file, this is an exceptionally lightweight plugin. Built to be efficient, and using QWeb's incredibly responsive [IP lookup API](https://apis.qweb.co.uk/ip-lookup/), the Admin Country Allowlist plugin should be a part of your standard security kit for any Wordpress websites that you manage.

This plugin relies on [QWeb's IP to country lookup API](https://apis.qweb.co.uk/ip-lookup/) for IP to country lookups, and will not function without an active API key from this service. QWeb does provide a FREE tier for this API service, suitable for most websites. Please refer to the [QWeb Ltd API Terms of Use](https://apis.qweb.co.uk/console/eula) and [QWeb Ltd Privacy Policy](https://www.qweb.co.uk/privacy-policy).

== Installation ==

* Install from the Wordpress plugin repository.
* Activate the Admin Country Allowlist plugin.
* Log in to the [QWeb Ltd API console](https://apis.qweb.co.uk/console/), generate an API key for the IP Lookup API, and copy this key into the plugin's settings page.
* Optionally, add additional countries to the allowlist as comma separated [ISO 3166-1 alpha-2 country codes](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements).
* Optionally choose to allow or disallow known proxy servers, even when they're located within the allowed countries.

== Frequently Asked Questions ==

= I've installed, now what? =

Once you've installed and activated the plugin, all you need to do is enter an API access key into the settings page. Access keys are free and can be generated in seconds via the [QWeb Ltd API Console](https://apis.qweb.co.uk/). The plugin will automatically determine your own country as soon as you've entered your key, and add this to the allow list. You can add others if you like, but otherwise you're done!

= What exactly does this plugin do? =

Every time somebody, or something, tries to access your Wordpress admin panel or the XMLRPC mechanism, this plugin looks to see if it already knows the country that their IP address belongs to. If it doesn't, it uses the IP lookup service to find out.

If the determined country is listed in your allow list, or for some reason the country can't be reliably determined, access is granted. Otherwise the plugin returns a HTTP 403 response and code execution stops there, meaning that your server doesn't have to waste resources serving complete pages to potentially malicious traffic.

Successful lookups are cached for performance, and to reduce the number of requests made to the lookup service.

= How much do the API keys cost? =

QWeb Ltd offer a free tier for the IP lookup service, which allows up to 40 daily lookups. This should be enough for the vast majority of Wordpress websites because lookups only happen once per unique IP attempting admin panel access. You can monitor usage via the [QWeb Ltd API Console](https://apis.qweb.co.uk/), and if you run out of quota you'll receive a notification by email. Paid tiers are also available if you need more requests, starting at $2 per month.

= What happens if the API goes down, or my API quota runs out? =

This plugin is built to only block access if it's absolutely certain that it should. So if the plugin doesn't already have a cached response for a given IP and the API is unavailable, or you've reached your requests quota, the plugin will just allow access for that IP until it manages to determine the correct country for it. This way, you never risk getting blocked out of your own admin panel.

= Where can I see usage reports? =

You can see daily usage graphs via the [QWeb Ltd API Console](https://apis.qweb.co.uk/). As soon as you've entered your access key, the plugin does a lookup of your own IP to add your country to the allow list, so these graphs should immediately show some data and you'll know that the plugin is working. For performance, this plugin doesn't create any kind of logs directly as this would just slow the admin panel down unnecessarily.

= Why is this free? What's the catch? =

We're a web design agency and manage a number of Wordpress websites, so we primarily built this plugin to ease our own administrative work. Other plugins exist but generally require manually downloading and updating IP databases, and tend to incorporate more features than we needed. We wanted a really simple, zero maintenance plugin and we already had our own IP lookups API for it to use. Once built, it just made good sense to release this for other Wordpress administrators to use.

Admittedly, we also hope that if you find this plugin useful, you'd consider using some of our other, paid API services, or if you for some reason need to process a larger number of lookup requests you'd consider one of our paid tiers. There's no necessity for either though, and no real catch at all!

= Something went wrong and I can't access my own admin panel! Now what? =

We've made every effort to ensure that this doesn't happen, but if for some reason it does, simply log in to your websites FTP repository and rename /wp-content/plugins/admin-country-allowlist to /wp-content/plugins/disabled-admin-country-allowlist and Wordpress will automatically disable this plugin from firing.

If you're still having trouble, please do get in touch and we'll work with you to resolve.

= This is great! How do I support you? =

Thanks! You can support us for free by leaving a review and/or telling other people about this plugin or our API services. Or if you'd like to support us financially, simply upgrade your API key to a paid tier as this will give you more daily requests in return. You can also donate to me, Ric, through [Ko-fi](https://ko-fi.com/dev_ric) where I'm currently maintaining a devlog for an MMO game, Argentauria.

== Screenshots ==

1. Screenshot of the settings page. No convolution or bloat here, just three fields! Enter your API access key, a list of country codes to allow, and whether known proxy servers should be allowed.

== Changelog ==

= 1.4.0 =
* Added an option to deny access to the XMLRPC mechanism completely, reducing the number of required API lookups.
* Added blurb to the plugins settings page explaining what this page is for, because the current administrator might not be the original installer.

= 1.3.0 =
* When the API usage quota for a given access key is reached, we now only trigger one email instead of triggering for every lookup attempt.

= 1.2.1 =
* Added information to the settings page about where to find usage reports.
* Added a Settings button to the admin panel notice that appears if you haven't yet entered an access key.
* Added a screenshot to the plugin information page to better show its simplicity.

= 1.2.0 =
* Added site name to error notification emails to ease managing multiple websites.
* Reworked error notification emails to now also notify if communication with the API failed completely.

= 1.1.1 =
* Renamed global scope $cacheDirectory variable to $qwebAcaCacheDirectory to avoid potential conflicts with cache plugins
* Refactored for performance and better readability

= 1.1.0 =
* Reworked to no longer block calls for admin-ajax.php, because too many front-end plugins use it for legitimate requests.
* Enabled installation for websites running PHP as old as 5.6, and Wordpress as old as 5.8.
* Fixed a minor bug where sanitisation code called array() instead of is_array(), and thus wouldn't have spotted some broken configurations.

= 1.0.4 =
* Removed a redundant comma preventing plugin activation in some PHP versions.

= 1.0.3 =
* Replaced esc_html() wrapped $_SERVER variables with sanitize_text_field() wraps.

= 1.0.2 =
* Fixed an issue where some error messages incorrectly included the plugin cache directory as part of the text.
* Fixed an issue where some __() function calls didn't include the plugin's text domain as a second parameter.
* Replaced various instances of esc_html(__()) with esc_html__() for tidier code.
* Added line breaks within various multi-parameter printf() function calls to improve code readability.
* Added/amended various printf() and sprintf() function calls to separate variables from strings passed to __() translation functions.
* Wrapped various $_SERVER variables with esc_html() function calls for improved security.
* Renamed plugins_list_settings_link() function to qweb_aca_list_settings_link()

= 1.0.1 =
* Replaced Curl dependant code with wp_remote_get()
* Tested with Wordpress 6.4.2

= 1.0 =
* Initial public release.

== Upgrade Notice ==

= 1.0 =
* Initial public release.

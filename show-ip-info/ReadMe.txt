=== Show IP Info ===
Contributors: PyVold
Tags: ip address, country code, region, currency, languages, city, country name, user, visitor, display, shortcode, vs, rockon 
Requires at least: 5.6
Tested up to: 6.2
Stable tag: 2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show IP Info - Simply displays visitor IP Address & country info, like Language & Currencies.

== Description ==

The plugin fetches the IP address of the visitor from the HTTP header and then it collect more information about that IP address from ""https://ipdevops.com/api/remip/<visitor IP address>" that returns some information such like: languages, currency, country (and more in future versions)

Very simple to install, simple to use, light weight.

Note: ipdevops.com (public API for iptools) privacy-policy: https://ipdevops.com/privacy-policy

== Installation ==

Use WordPress Add New Plugin feature, searching "Show IP Info", or download the archive.

1. Log in to your website administrator panel
2. Go to Plugins page, and add new plugin
3. Upload plugin
4. Click Install Now button
5. Then click Activate Plugin button

Shortcodes:
[show_ip]
[showip_info type=country]
[showip_info type=languages]
[showip_info type=currency]
[showip_info type=capital]

== Screenshots ==

later

== Changelog ==
= 2.4(2023/03/30) =
* Compatability update.

= 2.3(2022/10/26) =
* Fix languages and all shortcuts.

= 2.2(2022/10/26) =
* Changed API endpoint from the service provider.

= 2.1(2021/12/4) =
* Improving the HTTP header sent to the API server for statistic reasons.

= 2.0 (2021/12/03) =
* shortcode types are no longer case sensitive, you can write country, Country, CoUnTrY..etc
* Country capital was added

= 1.0.1 (2021/12/02) =
* API call fix
* updating the short codes

= 1.0 (2021/12/01) =
* initial release

== Upgrade Notice ==
 
Upgrade to the latest version 2.2 as the old versions are not working any more.

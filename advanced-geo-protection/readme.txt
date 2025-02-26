=== Advanced GEO Protection ===
Contributors: iGEO Inc.
Tags: protection, geo, block country, spam, geo block, geo protection, geo security, ban, geo ban, geolocation, block, attack, hack, hacker, hacking, protection, website security, malware, protect, spam, trackback, vulnerability, wp-admin, block country, ban countries, ban country, blacklist
Requires at least: 3.0
Tested up to: 5.7.2
Stable tag: 2.9.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

You need to ban a bad user from accessing your WordPress website or admin area by user's IP address, or country. Detailed Logs and Statistics.

== Description ==

WP GEO Website Protection is the security plugin to limit access from unwanted counties or IP addresses. 

The plugin allows you to restrict access to the content of your website. You can enable or disable visitors from certain countries (parts of) the content.

For example, your website's content is intended for a specific range of visitors, limited to certain countries so you can customize it. Or if you want  to block access from the countries or IP addresses, which are characterized by hack attempts, spamming of your comments and so on, you can do it in a one click.

Due to the fact that a huge popular attacks on the administrative panel site, using this plugin, you can prevent this problem.

The plugin allows you to grant or restrict access to specific users or countries to your site. You can restrict access to both the entire content of the site and its individual parts.

This plugin will allow you to increase the level of security of your site, as you will control the activity of visitors and block potential malicious actions.

You can also block access to the administrative panel of your site for all countries except yours, or even allow access only for your IP.

You can block users from countries that are most known for hacking attempts, spamming, etc.

The plugin also has a list of allowed IPs. If you have blocked access for a specific country, but want to allow it to a specific user, you simply add it to the whitelist.

You can also use CSS to customize the type of message that will be shown to blocked users, or you can redirect users to any other page or external website.

You can also control access to publish content (articles, categories, comments).

But remember that this plugin is only a part of all the existing measures to protect your site from hacking, and does not give you 100% protection from any threats.

This plugin uses the GeoLite database from Maxmind. It has a 99.5% accuracy which t is very good for a free database. If you need higher accuracy you can buy a license from MaxMind directly.
If you cannot or do not want to download the GeoIP database from Maxmind please use the GeoIP API website directly from https://webence.nl/geoip-api/

If you want to use the GeoLite database from Maxmind you will have to download the GeoIP database from MaxMind directly and upload it to your site.
The WordPress license does not allow this plugin to download the MaxMind Geo database for you.

> You can easy filter front-end visitors and visitors who wants to login to Wordpress backend.

**Main features:**

* Ban visitors from the countries you don't want to see.
* Ban IP addresses which are characterized by hack attempts, spamming and etc.
* Ban visitors to your backend login page.
* Ban IP addresses which are bruteforcing your passwords.
* Allow list (whitelist) you can block whole country, but allow some IP addresses from this country
* Graphs by blocked countries (last 24 hours, last 7 days, last 30 days)
* It's easy to setup and free to use.
* Country blocking
* Spam protection
* Country Block
* GEO protection
* Attack, vulnerability, malware, hack blocking
* Free support.


GEO plugin that allows you to block access to your site based on the visitor location while also keeping your site safe from malicious attacks. The plugin brings a smart and powerful protection methods named as "WP Zero-day Exploit Prevention" and "WP Metadata Exploit Protection".

* In order to prevent hacking through the login form and XML-RPC by brute-force and the reverse-brute-force attacks, the number of login attempts will be limited per IP address even from the permitted countries.
* Minimize server load against brute-force attacks: You can configure this plugin as a Must Use Plugins so that this plugin can be loaded prior to regular plugins. It can massively reduce the load on server.
* Block badly-behaved bots and crawlers: A simple logic may help to reduce the number of rogue bots and crawlers scraping your site.
* Cooperation with full spec security plugin: This plugin is lite enough to be able to cooperate with other full spec security plugin such as [Wordfence Security](https://wordpress.org/plugins/wordfence/ "Wordfence Security &mdash; WordPress Plugins").
* Logs: Validation logs for useful information to audit attack patterns can be manageable.


GDPR INFORMATION

This plugin stores your visitors data in your local WordPress database. You can configure he number of days this data is stores on the settings page or disable logging any data.

Which data of blocked visitors is stored:
* IP Address
* Visits date and time
* Requested URL
* Country of the IP address
* If the block happened on your backend or your frontend


== Installation ==

1. Upload all the files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

== Screenshots ==

1. Front-end / backend protection page
2. Graphs and Logs
3. Visitor is blocked page


== Frequently Asked Questions ==

= Does the site using this plugin comply with GDPR? =

This plugin is designed based on the principle of "Privacy by design" so that you can compliantly run it to GDPR. As guarding against personal data breach, IP addresses in this plugin are encrypted and also can be anonymized by default. It also provides some functions not only to manually erase them but also to automatically remove them when those are exceeded a certain amount/time.

= Does this plugin support multisite? =

Yes. You can synchronize the settings with all the sites on the network when you activate on network and enable "**Network wide settings**" in "**Plugin settings**" section.

= I still have access from blacklisted country. Does it work correctly? =

Absolutely, YES.

Sometimes, a WordFence Security user would report this type of claim when he/she found some accesses in its Live traffic view. But please don't worry. Before WordPress runs, WordFence cleverly filters out malicious requests to your site using <a href="https://php.net/manual/en/ini.core.php#ini.auto-prepend-file" title="PHP: Description of core php.ini directives - Manual">auto_prepend_file</a> directive to include PHP based Web Application Firewall. Then this plugin validates the rest of the requests that pass over Wordfence because those were not in WAF rules, especially you enables "**Prevent Zero-day Exploit**".

It would also possibly be caused by the accuracy of country code in the geolocation databases. Actually, there is a case that a same IP address has different country code.

For more detail, please refer to "[I still have access from blacklisted country.](https://iplocationblock.com/codex/i-still-have-access-from-blacklisted-country/ 'I still have access from blacklisted country. | IP Location Block')". 

= Does this plugin works well with caching? =

The short answer is **YES**, especially for the purpose of security e.g. blocking malicious access both on the back-end and on the front-end.

You can find the long answer and the compatibility list of cache plugins at "[Compatibility with cache plugins](https://iplocationblock.com/codex/compatibility-with-cache-plugins/ 'Compatibility with cache plugins | IP Location Block')".


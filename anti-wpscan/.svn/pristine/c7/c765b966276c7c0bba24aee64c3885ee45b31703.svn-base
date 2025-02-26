=== anti-wpscan ===
Contributors: blackfault
Donate link: http://www.blackfault.com
Tags: security
Requires at least: 3.8
Tested up to: 3.9
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The anti-wpscan plugin prevents the security tool wpscan from scanning your Wordpress blog and enhances other aspects of security.

== Description ==
1.1 is a beta.

Tools such as wp-scan allow security professionals and malicous “hackers” to scan your blog for security holes. It detects the version of Wordpress, and version of all your plugins and cross-checks with a vulnerability database to see if there are any security threats with those versions. The users of wp-scan can then exploit any vulnerabilities found to gain unauthorized access to your Wordpress blog.

Anti-wpscan prevents this tool from obtaining these version numbers, greatly increasing security and prevent wp-scan bots from getting your version numbers.

Note. All un-even minor version numbers are considered beta. 1.1 is a beta. 1.2 would be production ready.

Features:

*	Block Wordpress version detection.
*	Block passive Wordpress version detection (not just the version in your meta tags).
*	Block plugin version detection.
*	Block all plugin change_log files.
*	Block directory browsing for improperly setup web hosting.
*	Block access to css files from clients without a referring url.
*	Block access to important files in wp-include.
*	Strip all comments from final putput. Prevents plugins from putting comments in your blog with version information.

Requirements:

*	Must be using an updated version of Wordpress.
*	Must be using custom permalinks (this generates a .htaccess file which anti-wspcan uses).

Check out my security blog at <a href="http://www.blackfault.com">Blackfault.com</a> for more information.

== Installation ==

1. Upload and unzip to your plugins folder.
2. Activate the plugin through the 'Plugins' menu in WordPress


== Upgrade Notice == 
N/A

== Frequently Asked Questions ==

= Will this block all wp-scan detection? =

This will block version detection on most Wordpress blogs. Some plugins such as google-xml-generator(Google XML Sitemaps) outputs the Wordpress version and can not be blocked without changing the code of that plugin. We contact plugin authors as we find plugins that do this.

= Will this prevent me from getting hacked? =

While this plugin will detect the ability to scan your Wordpress blog with wp-scan, it will not prevent hackers from continuing to try. This plugin will prevent the detection of possible vulnerabilities on your blog. 

== Support ==
<a href="http://www.blackfault.com/projects/anti-wpscan">Get support here.</a>


== Screenshots ==

None.

== Changelog ==

= 1.0 =
* Initial release. Allow for blocking of all plugin versions and blocks getting the version of Wordpress being used.

= 1.1 =
* wp-scan now puts the primary domain in as the referer. Removed referer requirement from mod_rewrite rules. Hard blocks on all .txt and readme.html files.
* Added output buffer modification to remove ALL COMMENTS in html. Plugin authors like to put their plugin version information in there and we are stripping that.



== UnInstall ==
To un-install, open .htaccess and remove everything between #RULES ADDED BY anti-wpscan and #END ANTI-WPSCAN RULES.

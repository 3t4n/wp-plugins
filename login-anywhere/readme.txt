=== Login Anywhere ===
Contributors: shubhcomputing
Donate link:
Tags: login, form, login form,shubhcomputing
Author: shubhcomputing
Tested up to: 4.5
License: GPLv2 or later  
License URI:http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 3.5.0
Stable tag: 0.1.2

== Description ==
It allows to add wordpress login form anywhere in any posts, pages or custom template.

= Features =

* Customize login form


= Links =

* [Plugin's web page](http://www.shubhcomputing.com)
* [FAQ](https://wordpress.org/plugins/login-anywhere/faq/)
* [Support forum](https://wordpress.org/support/plugin/login-anywhere)

= Get involved =

* Developers can contribute to the source code on our [GitHub repository](https://github.com/shubh-admin/login-anywhere).
* Users can contribute by leaving a 5 stars [review](https://wordpress.org/support/view/plugin-reviews/login-anywhere).

== Installation ==

= Manually =
* Install the plugin via, plugins in wp-admin or download zip file and extract to "/wp-content/plugins/".
* After installation, you just need to use the shortcode [login-form] in you pages or posts where you want to add it.
* If you want to add it to use in custom template use this code:-
echo do_shortcode('[login-form]');

= Automatically =
* Upload the folder "login-anywhere" to "/wp-content/plugins/"
* Activate the plugin through the "Plugins" menu in WordPress
* Enable/ disable 'Login Anywhere' setting by going WP-admin ->Login Anywhere 
* After installation, you just need to use the shortcode [login-form] in you pages or posts where you want to add it.
* If you want to add it to use in custom template use this code:-
echo do_shortcode('[login-form]').

== Screenshots ==

1. Search for Login Anywhere.
2. Install Login Anywhere.
3. Activate Plugin.
4. Usage of Login Anywhere.
5. Customize Login Form.


== Frequently Asked Questions ==
= What is the short code to show default Login Form? =
You can use `[login-form]` as a short code.

= Can you give me an example shortcode with customization? =
Here it is: `login-form label_username="Enter Username" label_password="Enter Password" label_remember="Remember Me on this System" label_log_in "Sign In"]`

== Changelog ==

= 0.1.3 =
* Compatible with WP version 4.5
= 0.1.2 =
* Minor changes
= 0.1.1 =
* Compatible with WP version 4.4

= 0.1.0 =
* Fixed various bugs related to WP version 4.3
* Fixed undefined variable exception
* Introduced feature to customize Login form label

= 0.0.2 =
* Fixed bug 'data' undefined


= 0.0.1 =
* This is first version no known errors found

== Upgrade Notice == 
= 0.1.0 =
* Upgrade recommended to get new feature
= 0.1.3 =
* Upgrade recommendation, if using Wordpress v4.5

== More Information ==
<a href="http://www.shubhcomputing">Visit plugin site</a> | <a href="https://wordpress.org/plugins/login-anywhere/faq/">FAQ</a> | 
<a href="https://wordpress.org/support/plugin/login-anywhere">Support</a> | <a href="http://twitter.com/shubhcomputing">Follow on Twitter</a> | <a href="http://www.facebook.com/shubhcomputing">Like us on Facebook</a>
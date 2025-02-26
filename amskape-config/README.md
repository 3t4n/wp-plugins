=== WP Advanced Developer Assistance ===
Contributors: ansan
Tags: admininstration, customization,email,IP ,WP login,debug,Gutenberg
Requires at least: 4.3
Tested up to: 5.5
Stable tag: 4.3
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*WP Advanced Developer Assistance* allows developer to customize WP login page design, email template customization, IP based  field masking and IP management. Also provide additional fetaures such as Disable Gutenberg Editor/ Enable Classic editor and Debugging functions like debug() and dd().

== Description ==

WP Advanced Developer Assistance allows developer to customize WP login page design, email template customization, IP based  field masking and IP management. Also provide additional fetaures such as Disable Gutenberg Editor/ Enable Classic editor and Debugging functions like debug() and dd().

**Config**
This allows users to add the static IP of users system to create a testing environment,So that the user can add IP filtered testing conditions.You can also add multiple static IP(s) separated by commas.
If you are using contact form 7 for submitting contact form, you can enable Custom Validation Message option to change validation messages of all fields .
You can disable the Gutenberg Editor from the pages in edit mode. Sometime it get conflict with other plugins.

**Admin Login**
You can customize your WordPress admin login page by adding a custom logo and color ,also you can add additional CSS styles to the login page.

**Email**
You can set the recipient email address to which the mails are to be sent when the site is running in developer mode.
Developer mode gets enabled when user try to access the site from the static IP that is added in the Config tab.
If you try to access the website from any other IP, the all emails will be sent to corresponding production recipients.

**Field Mask**
You can config your own masking format by  adding a class name and the corresponding format.Simply specify the class name to an input field to get the corresponding input field masking .


== Installation ==
1. Upload the entire wp-advanced-developer-assistance folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. You will find ‘Developer Assist’ menu in your WordPress admin panel.

For basic usage, you can also have a look at the plugin web site.

== Screenshots ==

1. config.png
2. admin-login.png
3. email.png
4. field-mask.png

== Changelog ==
= 1.0.2 =
* Fixed the IP look up issue
* Added dubugging functions debug() and dd()
* Added an option to disable Gutenberg editor

= 1.0.1 =
* Add option for clear value if not matched in field mask
* Move script into footer 

= 1.0.0 =
* Static IP configuration
* Developer Mode Email configuration
* Custom field masking
* Custom Validation Message
* Admin Login page customization
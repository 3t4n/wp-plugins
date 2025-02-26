=== Comment Approved Notifier Extended ===
Contributors: ufukart
Donate link: https://www.paypal.com/donate/?business=53EHQKQ3T87J8&no_recurring=0&currency_code=USD
Tags: comment, approve, notifier, comment approved, notification
Requires at least: 5.0
Tested up to: 6.7.1
Requires PHP: 5.6
Stable tag: 5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically send email notification to comment author after comment approval.

== Description ==

Comment Approved Notifier sends an e-mail to your commenters when you approve their comments. It is a very simple plugin. There are no settings, options. It starts to work when you activate it.
1. No Configuration
2. Activate and Forget
3. Full Compatible with SMTP Mail Sender Plugins

Po file included. If you translated this plugin to your language, please send me translated po file.
Comment Approved Notifier Extended now supported Multi Language.
Ready translations:
English
French
Italian
Romanian
Turkish

== Installation ==

1. Download the zip file and extract the contents.
1. Upload the 'comment-approved-notifier-extended' folder to your plugins directory (wp-content/plugins/).
1. Activate the plugin through the 'plugins' page in WordPress.
1. That is all.

== Frequently Asked Questions ==

= How can I set change from email address? =
You can change site email from Wordpress General Settings or change "$from_email = get_bloginfo('admin_email');" to "$from_email = 'yourmailadress@yourdomain.com';" from 115. row of comment-approved-notifier-extended.php.

= How can i translate to my language =
Po file included.

== Screenshots ==

1. The plugin sends an TURKISH e-mail like that.
2. The plugin sends an ENGLISH e-mail like that.

== Changelog ==

= 5.3 =
* Menu moved under the setting
* Added donate link

= 5.2 =
* Added mail template. Sent emails look better now
* Fully compatible with PHP 5.6 and above. Tested up to: PHP 8.2
* Few minor improvements

= 5.1 =
* Bug Fixed. (Email sending issue solved.)

= 5 =
* Refactored codes.
* Added Mail Subject and Title Editor.
* Added Shortcodes

= 4.4.2 =
* MultiLanguage

= 4.4.1 =
* Prepared for Wordpress Internationalization

= 4.4 =
* MultiLanguage

= 4.3 =
* Security Improvements

= 4.2 =
* Small Improvements

= 4.1 =
* Minor Optimizations

= 4 =
* Added English Language
Comment Approved Notifier Extended now supported English and Turkish Language.

= 3.0 =
* sender e-mail address changed from noreply to admin_email
* Added site name to subject
* Changed text/plain to text/html
* Codes cleaned.

= 2.2 =
* Add site name to "From" section (by yakuphan)

= 2.1 =
* Compatible up to WP 2.8 (by yakuphan)

= 2.0 =
* Compatible up to WP 2.7 (by yakuphan)

= 1.1 =
* Fixed some bugs. Older version sends e-mail to trackback commenters so please update. (by yakuphan)

= 1.0 =
* Plugin released. (by yakuphan)
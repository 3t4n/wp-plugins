=== Happy Birthday Reminder ===
Contributors: samchief
Donate link: http://quibos.net/
Tags: birthdays celebrants, Happy Birthday Reminder, date of birth, users birthday, upcoming birthdays, email notification
Requires at least: 3.5
Tested up to: 4.9
Stable tag: 1.0.0
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Happy Birthdays reminder keeps in remembrance wp users birthdays via email reminders and a page display via shortcode.

== Description ==

Happy Birthday Reminder generates reminders notifications based on certain number of days(configured in settings) to users birthday via mail to the admin email and a greeting message to the user on their birthday.
A shortcode is also available to preview users with upcoming birthdays in a post/page.
Features:

* **Integration with WordPress User Profile, and profile image**
* **Addition of a custom field to user profile for birthday date selection**
* **Send birthday greetings to users on their birthday**
* **Send upcoming birthdays to admin email**
* **Configure settings**
* **English Language (please feel free to contribute)**


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `happy-birthday-reminder` to the `/wp-content/plugins/` directory
2. Activate the plugin through the WordPress 'Plugins' menu. 
3. Set the birthdays of your users in their profiles.
4. Configure the plugin under wordpress settings->Birthday Reminder
5. Add the shortcode in form of: [WPBirthday] to a page or post to display upcoming birthdays.
6. Enjoy!

== Frequently Asked Questions ==

= I and my users are not receiving mail Notifications =

1. I highly recommend installing WP Mail SMTP by WPForms plugin to resolve email not sending problems.
2. Emails are scheduled to be sent daily using WP Cron which is only activated when the site is visited. Meaning if your site is dormant for the day, the scheduled mails will not be sent.

== Screenshots ==

1. Plugin Settings page
2. Display in a page via shortcode [WPBirthday]
3. Date Of Birth extra field in User Profile

== Upgrade Notice ==
= 1.0.0 =
* Initial Plugin Release 

== Changelog ==

= 1.0.0 =
* Initial Plugin Release
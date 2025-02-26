=== Stop Registration Spam ===
Donate link: https://ko-fi.com/tomroyal
Tags: anti-spam, registration
Requires at least: 5.6
Tested up to: 6.4
Stable tag: 1.24
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Stops spammy automated user registrations using a custom question.

== Description ==

This is a simple plugin designed to cut down on automated spam registrations and the emails they produce.

The idea is simple: in order to register, users have to answer a question that's simple for anyone reading your blog, but impossible for a script being run by a spammer.

To install, simply copy stop_registration_spam.php to your Plugins directory. Enable the plugin and an options page will appear under the Wordpress Settings menu.

In the settings page, enter your question (keep it short), answer (ideally very short) and a hint to display if the user gets it wrong. Save these and they'll be used for new registrations.

I've been using this plugin for a few months, and it cut spam from dozens a day to none at all. Hope you find it useful. Questions etc welcome on my blog:

http://www.tomroyal.com/blog/2012/04/09/stop-wordpress-registration-spam/

Tom

== Changelog ==

v1.2    - Removed some old PHP references, tested with Wordpress 6.4.2 on PHP 8.2
v1.21   - Updated Tested Up To value accordingly
v1.22   - Fix <? short PHP tag to <?php for better compatibility
v1.23   - Minor update to fix "tested up to"
v1.24   - Patch XSS issue
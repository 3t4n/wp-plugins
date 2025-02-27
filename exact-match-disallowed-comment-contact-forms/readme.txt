=== Exact Match Disallowed Comment & Contact Forms ===

Plugin URI:        https://www.completewebresources.com/exact-match-disallowed-comment-contact-forms-wordpress-plugin/
Tags:              anti spam, formidable, contact form 7, gravity forms, blacklist, blocklist, comment spam, contact form spam
Author URI:        https://www.completewebresources.com/exact-match-disallowed-comment-contact-forms-wordpress-plugin/
Author:            Complete SEO
Contributors:      CompleteWebResources
Requires PHP:      7.0
Tested up to:      6.4.2
Stable tag:        1.3
Version:           1.3
License:           GPLv3
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Change the default WordPress comment blocklist functionality to exact match and save entries marked as spam for review.

The WordPress comment blocklist inside matches keywords, so for example, blocklisting a word such as "pasta" will automatically delete comments containing "pastaroni" or "anitpasta" (but not "chef boyardee").

If you try to use the WordPress comment blocklist for contact form entries, this can be hugely problematic. The first major issue is falsely identifying comments as spam so you risk blocking valid contact form entries.

Additionally, there’s no moderation queue built into Formidable Forms, Contact Form 7, or Gravity Forms for entries marked as spam. This plugin fixes those issues.

= Changing the default WordPress comment blocklist functionality =

This plugin changes the default inside match blocklist functionality to exact match keywords, URLs, and ip addresses. If you add "karaoke" to your blocklist you'll only be blocking "karaoke" and not "karaoke stars."

= Retaining Contact Form Entries =

The plugin also retains contact form entries marked as spam in your database, so you can check them from the WordPress admin area.

= Important Notes / FAQ =

- For default comments in a post after submitting, if blocklisted, the comment will go to Spam status, whereas the default functionality would be to send that comment to the trash.
- We’re currently configured to work with Contact Form 7, Formidable Forms and Gravity Forms.
- Add keywords you want to block to the WordPress admin area under **Settings > Discussion > Disallowed Comment Keys**
- Upon activation, the plugin will automatically populate three keywords by default in the "Disallowed Comment Keys" field in the WP Admin area. This is so you know things are working. We leave it to the user to control their specific blocklist keywords. If you want a list of we'll known spam words as a starting point, check your preferred search engine for "ultimate comment blocklist" or "WordPress comment blocklist."
- **CAUTION:** Even though this is a significantly less blunt approach than the default WordPress functionality, please be careful. If you add the word "appointment" to your blocklist, you will block any form fill with the word "appointment" from getting through to your inbox.

= Support the Plugin =

If you love this plugin and want to support it, you can help us by linking to this page, leaving constructive feedback, or sending a monetary donation [paypal.me/completewebresources](https://paypal.me/completewebresources).

== Installation ==

1. Upload the plugin directory to the /wp-content/plugins/ directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the "Plugins" screen in WordPress.
3. Use the **Settings > Discussion > Disallowed Comment Keys** screen to configure your blocklist keywords.
4. Blocked entries you can see on Blocklist manager page from left sidebar.

== Screenshots ==

1. Changing the default WordPress comment blocklist functionality
2. Retaining Contact Form Entries
3. Formidable Form

== Changelog ==

= 1.3 =

* The "Comment must be manually approved" setting didn't work, a fix was applied

= 1.2 =

* Now comments that include blocklist keywords become "Spam" instead of "Pending"
* Gravity Forms is integrated 

= 1.1 =

* Add WP 5.5 compatibility.
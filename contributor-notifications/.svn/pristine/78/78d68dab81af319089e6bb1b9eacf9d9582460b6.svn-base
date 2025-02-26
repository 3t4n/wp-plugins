=== Contributor Notifications ===

Contributors: bhadaway
Donate link: https://calmestghost.com/donate
Tags: contributors, pending, posts, notifications, emails, alerts, review
Requires at least: 5.0
Tested up to: 6.3
Stable tag: 0.5
License: Public Domain
License URI: https://wikipedia.org/wiki/Public_domain

An incredibly simple and lightweight solution for alerting you of new pending posts from contributors and alerting contributors when their submissions are either approved or declined.

== Description ==

An incredibly simple and lightweight solution for alerting you of new pending posts from contributors and alerting contributors when their submissions are either approved or declined.

### Features ###

* Sends email to admin if new post pending
* Sends email to author if pending post approved
* Sends email to author if pending post declined

== Frequently Asked Questions ==

= Text Customization & Translation =

The email text is fully customizable and translation-ready. You can change the wording, the language, and add custom HTML and CSS.

Use whatever string swap/translation method you like, but I recommend the [Say what? plugin](https://wordpress.org/plugins/say-what/) because it's the easiest way to change the text with no coding required.

To use Say what?, you need to add three pieces of info, the exact text string you'd like to alter, the text domain, and the replacement string you'd like to use.

Strings:

`New Pending Post`
`<!--email-admin-->`
`Your Post Has Been Approved`
`<!--email-contributor-approved-->`
`Your Post Has Been Declined`
`<!--email-contributor-declined-->`
`Sorry, your post has been declined.`
` | `

Text Domain:

`contributor-notifications`

(see [example screenshot](https://ps.w.org/contributor-notifications/assets/say-what-screenshot.jpg))

= Why aren't emails being sent? =

I'm using the built-in `wp_mail` function. Most hosting environments (even shared hosts like Bluehost and GoDaddy) can handle email, but not very well out-of-the-box and require being optimized. It actually takes a bit of work to make sure your emails are deliverable. Some recommendations:

* Check that your SPF, DKIM, and other email records are set up correctly ([mail-tester.com](https://www.mail-tester.com/) is a great all-around tool for checking and fixing common email deliverability issues)
* Even on shared hosts, you should be able to add a dedicated IP to your account for very cheap (which allows you to get away from shared IPs that have a bad reputation because your neighbors are spamming)
* If all else fails, you can abandon using your own server for mail altogether, and host offsite with a free or paid third-party service like Gmail (check out the [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/) plugin to go that route)

= This plugin only works for the Pending post status. =

Some examples of when this plugin might be useful include when you allow registration on your site and by default, new users are granted the Contributor role, or when using a plugin like [User Submitted Posts](https://wordpress.org/plugins/user-submitted-posts/).

== Installation ==

**Automatic**

* From your WordPress Admin, navigate to: **Plugins** > **Add New**
* Search for: **Contributor Notifications**
* Install it
* Activate it

**Manual**

* Download
* Unzip
* Upload to **/plugins/** folder
* Activate

That's it. There are no settings to adjust.

== Changelog ==

= 0.5 =
* Minor code cleanup

= 0.4 =
* Set the admin/editor notification to a custom email address

= 0.3 =
* Email text can now be customized/translated

= 0.2 =
* Fixed error "Call to undefined function wp_get_current_user()"

= 0.1 =
* New
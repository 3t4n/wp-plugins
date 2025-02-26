=== Email Post Activation ===
Contributors: paulmac
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=LPT7UT9QE2G42&lc=IE&item_name=Paul%20McCarthy&amount=1%2e00&currency_code=EUR&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: email, post, browser, activation
Requires at least: 1.5
Tested up to: 2.7.1
Stable tag: trunk

Adds an iFrame to your blog footer to automatically activate any posts written by email.

== Description ==

WordPress allows posting via email, but must be told to check for emails. This is achieved by calling wp-mail.php using either a cron job, or by including a hidden iframe in your blog footer.

This plugin adds the iframe to the blog footer without editing the theme - updating your theme won't break your ability to email in posts to WordPress.

== Installation ==

1. Upload email-post-activation.php to your WordPress plugins folder.
1. Activate the plugin via the WordPress Plugins page.

== Frequently Asked Questions ==

= I don't see anything in my blog. Where is the iframe? =

The iframe used to call the wp-mail.php file is hidden. Its width and height have been set to 0. If you want to check that the plugin has loaded correctly:

1. Right click in your browser window.
1. Click View Source from the pop-up menu.
1. Scroll to the bottom of the page and look for a line that looks something like this:

&lt;iframe src="http://www.myblog.com/myblog/wp-mail.php" name="mailiframe" width="0" height="0" frameborder="0" scrolling="no" title=""&gt;

= I activated the plugin, and I still don't see anything. Are you sure this works? =

Yes, I'm sure it works :)

If you're using caching on your site, such as WP Super Cache, then you may have to clear the cache before you can see the code.

= How do I set up posting via email? =

You can read more about Blogging by Email at <http://codex.wordpress.org/Blog_by_Email> on the WordPress Documentation site.

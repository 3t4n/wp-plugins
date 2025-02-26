=== A Long Time Ago ===
Contributors: amielucha
Tags: time, timestamp, date, yesterday, weekdays, days of the week, today, time ago, timestamp shortcode, ago, minutes, now, fuzzy date, hours ago, Polish, Polski, dni tygodnia
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add "Posted x time ago" for human-readable post dates. If the post is fresher than 1 week the plugin returns the day of the week.

== Description ==

A Long Time Ago is a WordPress plugin that replaces the default post time (for example: "Posted on 01/01/2011 at 11:11") with "Posted x time ago" (examples: "Just now", "2 hours ago", "Yesterday", "on Thursday", "3 weeks ago", "1 year ago").

Enjoy!

= Features Include: =

*   Translation-ready. Includes English, Polish and Spanish.
*   `[time_ago]` shortcode allowing to place the time within posts and plugins.
*   ISO-formatted `<time>` HTML element
*   special cases: "just now" and "yesterday"

= Bonus: =

*   Function improving display of weekdays when using Polish language

== Installation ==

1. Upload `long-time-ago` folder to the `/wp-content/plugins/` directory or go to your WordPress Admin Panel -> Plugins -> Add New -> Upload (`wp-admin/plugin-install.php?tab=upload`)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use `time_ago()` to place the *posted on* date in your templates or `get_time_ago()` to retrieve it. You can also use the `[time_ago]` shortcode.

== Frequently Asked Questions ==

= How do I retrieve/display the formatted date? =

* To echo the date within the theme use `<?php time_ago() ?>`.
* To retrieve the date to a variable use `<?php get_time_ago() ?>`.
* To display it within content or in visual editors use the `[time_ago]` shortcode.

= How do I replace the *posted on* date format in my theme? =

Various themes use different methods to display the "posted on" date.

For themes based on *_s* such as *twentyfourteen* you can replace all instances of `twentyfourteen_posted_on()` (names vary from theme to theme but chances are it will be called themename_posted_on()) appearing across the theme with `time_ago()`.

You will most likely find the function in the following template files: content.php, content-single.php etc.

== Changelog ==

= 0.1 =
* Initial release. Includes English, Polish and Spanish translations.
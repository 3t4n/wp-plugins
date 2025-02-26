=== Plugin Name ===

Contributors: gabrielwhite
Tags: posts, pages, date, day, days, hours, minutes, relative date, days ago, hours ago, minutes ago, relative, timestamp
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 0.1

Show timestamp for a post or page using a relative description (e.g. "Hours ago", "5 days ago").

== Description ==
Show timestamp for a post or page using a relative description (e.g. "Hours ago", "5 days ago"). The strings can be be changed easily for translations, and custom text can be prepended or appended to the timestamp.

The rules for the descriptions are (along with the default strings):

* Within the last 60 minutes: "Moments ago"
* Within the last 8 hours: "Hours ago"
* Today: "Today"
* Yesterday: "Yesterday"
* 3-6 days ago: "4 days ago"
* 1-8 weeks ago: "5 weeks ago"
* 2-11 months ago: "7 months ago"
* 1-4 years ago: "2 years 5 months ago"  
* 4 or more years ago: "4 years ago"

== Installation ==
1. [Download](http://downloads.wordpress.org/plugin/wp-days-ago.zip) the plugin.
2. Unzip the contents of the downloaded file to the /wp-content/plugins/ directory of your Wordpress installation.
3. Log in to your Wordpress dashboard and activate the wp_days_ago plugin that should now be visible in the list.
4. You can now insert &lt;? wp_awhileago(); ?&gt; anywhere in [The Loop](http://codex.wordpress.org/The_Loop) in your Wordpress theme.

= Usage =
`<?php wp_awhileago( $prepend, $append, $descriptions); ?>`

= Parameters =

$prepend
 (string) (optional) This text will be prepended to the plugin's default output. Default value is &quot;&quot; (empty string).

$append
 (string) (optional) This text will be appended to the plugin's default output. Default value is &quot;&quot; (empty string).
 
$descriptions
 (array) (optional) This array allows you to change the descriptive strings displayed by the plugin. The default value is array: "Moments ago", "Hours ago", "Today", "Yesterday", "days", "week", "weeks", "month", "months", "year", "years", "ago", "At some point in time".

== Changelog ==

= 0.1 =
* Initial version.
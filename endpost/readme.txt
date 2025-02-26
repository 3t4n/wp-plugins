=== EndPost ===
Tags: post, buttons, html, end, each, code, custom
Requires at least: 2.0
Tested up to: 3.0
Stable tag: trunk

EndPost lets you add any custom HTML to the end of every post. You may use custom tags to be replaced with post-relevant contents to be used with custom share buttons/codes, etc.

== Description ==

EndPost lets you add any custom HTML to the end of every post. You may use custom tags to be replaced with post-relevant contents to be used with custom share buttons/codes, etc. You may also evaluate PHP code to put conditions on some code, you can use it in conjuction with any WP function as well.

= Features =
* Post-specific tags (title, date & time, permalink, etc)
* Full HTML control – No safety or indenting tricks that ruin the code, etc.
* PHP code evaluation
* Choose where to include the code – in the loop, on single pages and on pages.
* Comes pre-installed with Twitter & Facebook counters to demonstrate use

== Installation ==

1. Upload `endpost` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to `Settings` -> `EndPost`

== Frequently Asked Questions ==

= How do I use the plugin? =

1. In the Dashboard, you go to `Settings` -> `EndPost`.
1. From there you can edit the code that shows up for every post/page; it can be any HTML, PHP or text. You may use %tags% and [[tags]] to replace them with the post/page specific information. The list of tags is displayed in the options screen. You may evaluate PHP using ##code## (replace "code" with the actual code).

== Changelog ==

= 0.3 =
* Added PHP evaluate: You can evaluate PHP code by enclosing it in ## and ##

= 0.2 =
* Initial release.
=== Plugin Name ===
Contributors: georgekodinov
Donate link: http://www.progem.bg/kgeorge/?p=442
Tags: posts, ads, html, footer
Requires at least: 2.8.2
Tested up to: 3.0.0
Stable tag: trunk

This plugin allows plugging HTML or a result of evaluating PHP code as a footer after the post body in the single post display window.

== Description ==

This plugin allows plugging HTML or a result of evaluating PHP code as a footer after the post body in the single post display window. This is very useful when e.g. adding Google Ads to your blog. The HTML fragment is added enclosed in a DIV HTML element. You can also specify PHP code to use. The code is then passed to eval() and the result of eval() is enclosed inside a DIV HTML element.

There is a configuration page (under Settings) that allows specifying the fragment and whether it's PHP or HTML.

== Installation ==

1. Upload `addPostFooter.php` to the `/wp-content/plugins/` directory
2. Specify the fragment and whether to evaluate it as PHP or HTML through the plugin configuration menu under 'Settings' menu in WordPress
3. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Is this a GPL plugin ? =

Yes.

= How can I help you developing the plugin ? =

Make sure you click some of the google ads inside my blog

== Changelog ==

= 1.1.1 =
* Tested compatibility with 3.0RC1

= 1.1.0 =
* Added PHP code evaluation. Ensured compatibility with 2.9RC1

= 1.0.0 =
* Initial revision

== Features ==

1. appends HTML or result of evaluating PHP code at the end of the post text in single post window.
2. Has a configuration page to specify the code and whether it's PHP or HTML

Don't forget to visit my [plugin's home page](http://www.progem.bg/kgeorge/?p=442/ "my blog") and click some of the google ads there.

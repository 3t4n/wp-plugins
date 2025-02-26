=== QuickStyle Background ===
Contributors: jenniferzouak 
Tags: background design shortcode style quickstyle zouak
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 1.0.2

Shortcode which allows the content author to specify a background style for an existing or new element (i.e.a post) or page.

== Description ==
Shortcode which allows the content author to specify a background style for an existing or new element (i.e.a post) or page. This will override the theme setting. 

ex 1) Set the page background [quickstyle_background style='#f00'] 

ex 2) Find an existing block element with ID &quot;content&quot; [quickstyle_background div='content' style='url(&quot;..\bk3.png&quot;) #ff0'] 

ex 3) Create a new block element with id &quot;myId&quot; [quickstyle_background id='myId' style='url(&quot;..\bk3.png&quot;) #ff0'] Some content here [/quickstyle_background]

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.
== Changelog ==
1.0 - First Release Version<br/>
1.0.1 - Fix docs for the attribute name<br/>
1.0.2 - Rewrite to support more types of backgrounds as per user suggestions (thanks :) for the ideas!)

== Frequently Asked Questions ==

= What values can I put in the style attribute =

Valid CSS which would normally be accepted in the background property definition. Refer to http://www.w3schools.com/css/pr_background.asp

==Readme Generator== 

This Readme file was generated using <a href = 'http://sudarmuthu.com/wordpress/wp-readme'>wp-readme</a>, which generates readme files for WordPress Plugins.

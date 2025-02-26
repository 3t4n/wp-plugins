=== 2-4 comment fix ===
Contributors: janvarhol
Donate link: http://varhol.sk/
Tags: comments, fix
Requires at least: 2.0
Tested up to: 2.6.3
Stable tag: 4.3

This plugin will fix word `Comments` to go with Central European languages when comments count is between 2 and 4.

== Description ==

This fix replace your comment count to go with most of central european languages. There was a gap when word "Commments" was the same for counts greater than 1. But for example in Slovak and Czech there is different word when count is from 2 to 4. So there was gramatical error. This will fix it.


== Installation ==

1. Upload `2_4_comment_fix.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php comments_popup_link_2_4('No comments', '1 Comment', '% Comments', '% Comments(when 2-4)'); ?>` where you have popup links and `<?php comments_number_2_4('No comments', '1 Comment', '% Comments', '% Comments(when 2-4)'); ?>` where you are displaying number of comments in your template and translate the strings into your language. For the count between 2 and 4 there is the last string. Remember that functions have added _2_4 at the end of its name.

== Frequently Asked Questions ==

= What if I left plugin activated and installed another theme without rewriting template? =

Nothing happens. Plugin is ready for this, but I recommend deactivation of plugin if you are not using it anyway.

== Arbitrary section ==

This plugin is made for Slovak, Czech and other slovanian languages. If you are using different language on and you have similar problems but with other numbers, just write me to jan@varhol.sk.



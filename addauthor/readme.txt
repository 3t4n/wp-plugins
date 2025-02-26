=== addauthor ===
Contributors: wolly
Tags: author description,
Donate link: no link
Requires at least: 2.8
Tested up to: 5.8
Stable tag: 1.3

This plugin allow you to show where you want avatar and bio of the post author.***PAY ATTENTION if you are upgrading, CSS is changed***
== Description ==

This plugin allow you to show where you want, inside the loop, a gravatar of the author of the post, the description of the author of the post, the nick of the author of the post and the date of the post.***PAY ATTENTION if you are upgrading, please take note that CSS is changed, you find a CSS example in sample.css, copy it in yours style.css and apply the change you need***


== Installation ==

1. Upload `addauthor` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php if( function_exists( 'wolly_addaut' ) ) wolly_addaut();  ?>` in your templates where you want to show the author description WITHIN the loop.
4. Insert new class in yours style.css '.clear' and 'ul.addaut' 'ul.addaut li' and 'ul.addaut li'. You find an example in the file 'sample.css'
5. register to gravatar.com yours authors
6. fill in, under yours profile, the description of the authors

For 2.8 and 2.9 use the 1.2 for 2.7 use only 1.0 cause the 1.2 has the new function.
== Frequently Asked Questions ==
Why use this plugin?
To show a gravatar and a descritpion of the author(s) of your blog

== Screenshots ==

1. This is how addauthor appear on mine blog.

== Changelog ==
1.3 
Changed readme file for compatibily with new WP versions

1.2
Changed CSS to have a minimun height to avoid bad display if you have short author description

1.1
Changed some deprecated function in 2.8

1.0
First release
== Upgrade Notice ==

= 1.2 =
Changed CSS to have a minimun height to avoid bad display if you have short author's description, remember to change CSS definition in yours style.css. (a sample CSS is in sample.css)

= 1.1 =
This version has eliminated some deprecated functions in wordpress 2.8, don't upgrade if you use a lower version, upgrade if you use wordpress 2.8 or later

== Arbitrary section ==

== A brief Markdown Example ==



=== Plugin Name ===
Contributors: NetReview
Donate link: http://netreview.de
Tags: comments, dofollow, nofollow, nofollow free, 140
Requires at least: 2.0.2
Tested up to: 2.8.4
Stable tag: 2.0

140follow removes NOFOLLOW from author link if the comment has more than XXX characters.

== Description ==
English
140follow removes NOFOLLOW from author link if the comment has more than XXX characters.
The character count can be adjusted at the admin pannel. NOFOLLOW also can be added 
to single comments if you add "/dontfollow" to the end of the author link.

Deutsch
Das Plugin ersetzt rel="external nofollow" durch rel="external" aus dem Autor-Link, 
wenn der Kommentar mehr als XXX Zeichen besitzt. Die Anzahl der Zeichen kann
einfach im Adminbereich beliebig eingestellt werden.
  
Einzelnen Kommentaren kann das NOFOLLOW-tag wieder hinzugef&uuml;gt werden, wenn 
einfach "/dontfollow" (Danke an Oliver Bockelmann) zum Link hinzugef&uuml;gt wird. 


== Installation ==
- Upload 140follow to the '/wp-content/plugins/' directory
- Activate the plugin


If you whish to use the javascript character-counter below your comments:

English
 - Upload 140follow to the '/wp-content/plugins/' directory
 - Go to your used theme directory and open 'comments.php'
 - find <form action="<?php echo get_option('siteurl'); ?> ...
 - add this to the end of this line (before ">"):
    name="commentform"
 - find <p><textarea name="comment" id="comment" ...
 - after this line add this new line:
    <p><script>displaylimit("document.commentform.comment",<?php $followopt = get_option('dbfollow_options'); echo $followopt['follow_count']; ?>)</script></p>
 - Activate the plugin through the 'Plugins' menu in WordPress

Deutsch 
 - 140follow ins '/wp-content/plugins/' hochladen
 - &Ouml;ffne die Datei comments.php aus deinem Theme-Verzeichnis
 - Suche nach <form action="<?php echo get_option('siteurl'); ?> ...
 - Ans Ende der Zeile, also vor dem ">" folgendes einf&uuml;gen:
    name="commentform"
 - Suche nach <p><textarea name="comment" id="comment" ...
 - Nach dieser Zeile, eine neue Zeile mit folgendem Inhalt hinzuf&uuml;gen:
  <p><script>displaylimit("document.commentform.comment",<?php $followopt = get_option('dbfollow_options'); echo $followopt['follow_count']; ?>)</script></p>
 - Aktiviere das Plugin
 
== CHANGELOG ==
[Changelog v2.0](http://netreview.de/wordpress/140follow-2-0/ "Changelog v2.0")
[Changelog v1.0](http://netreview.de/wordpress/wordpress-plugin-140follow-fur-alle/ "Changelog v1.0")

== Frequently Asked Questions ==
[Tutorial & FAQ](http://netreview.de/wordpress/wordpress-plugin-140follow-fur-alle/ "Tutorial & FAQ")

== Screenshots ==
[Screens v2.0](http://netreview.de/wordpress/140follow-2-0/ "Screens v2.0")
[Screens v1.0](http://netreview.de/wordpress/wordpress-plugin-140follow-fur-alle/ "Screens v1.0")
=== Plugin Name ===
Contributors: meathor
Donate link: http://gomorrah-online.de/
Tags: shortcode
Requires at least: 3.0.1
Tested up to: 3.8.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provide an Shortcode to insert an Postslist from an given author ID

== Description ==

Provide an Shortcode to insert an Postslist from an given author ID

== Installation ==

Simply extract gomorrah-author-posts.zip and Upload Contents to Your Plugin Directory

After that... Aktivate.

== Frequently Asked Questions ==

= How to use =

Simply aktivate the Plugin and use the Shortcode:
   
[authorposts id=authorid] Benötigt   
   
[authorposts id=authorid post_type=type] Beiträge nur aus diesem Post Type   
   
[authorposts id=authorid num=anzahl] (wenn num nicht angegeben werden 5 ausgegeben)   
   
[authorposts id=authorid excerpt=true] zeigt einen auszug an   
   
[authorposts id=authorid thumbnail=true] zeigt das Thumbnail des Posts an wenn vorhanden   
   
[authorposts id=authorid thumbnail=true thumb_size=thumbnail] zeigt das thumbnail der angegebenen grösse an (muss mittels add_image_size hinzugefügt worden sein)   
   
[authorposts id=authorid title_pos=after_thumb] Obe der Titel Unter oder Über dem Beitragsbild angezeigt werden soll ( after_thumb oder before_thumb )   
   
[authorposts id=authorid date=true] Zeigt das Post Datum mit an   
   
[authorposts cat=1,2,3] zeigt aus den Schlagwort/tag ids 1 2 und 3 an   
   
[authorposts cat=1,2,3 exclude_cat=true] zeigt nur Beiträge an die NICHT in Schlagwort/tag 1,2 und 3 sind (ids)   
   
[authorposts tag=1,2,3] zeigt aus den Schlagwort/tag ids 1 2 und 3 an   
   
[authorposts tag=1,2,3 exclude_tag=true] zeigt nur Beiträge an die NICHT in Schlagwort/tag 1,2 und 3 sind (ids)   
   

= how to style =

Use these css Classes
   
.author-post{} = Main Div Container   
   
.author-post-thumb{} = Thumbnail Div Container   
   
.author-post-title{} = the title h3 Tag   
   
.author-post-meta-data = meta data div container (Date and excerpt)   
   
.author-post-date{} = Post Date Div Container   
   
.author-post-auszug{} = Excerpt div Container   
   
== Changelog ==

= 1.0 =
* First Release
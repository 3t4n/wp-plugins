=== Auto URL ===
Contributors: dexxaye
Tags: url,permalink, attachment, media, rewrite, seo
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 1.4

Auto URL generates customized permalinks according to post types, categories and tags

== Description ==
**Now supports custom post types.**

Auto URL generates customized permalinks according to post types, categories and tags.
You can generate your own customized url for posts, pages and attachments by using different tokens.
Your posts and pages will still be accessible via your old permalinks.

WP 3.1 and up only. Beta version. Appreciate any feedback.

How To Use:
1. go to URL Patterns page(wp-admin/admin.php?page=au-pattern) to set the patterns for post and page.
2. you can set patterns base on tags and categories
3. after you have set the patterns, click Bulk Generate URL to generate your custom url.
4. to see generated urls, got to url page(wp-admin/admin.php?page=au-url).

Screenshots: <a href="http://www.bunchacode.com/programming/auto-url/" target="_blank">http://www.bunchacode.com/programming/auto-url/</a>

Tested On: Firefox 5, Chrome 13, IE 7 and IE 8

-Available Tokens-

%id%
The unique ID # of the post, for example 423 

%name%
A sanitized version of the title of the post.

%namepath%
A sanitized version of the full title path of a page. Similar to %name% but shows the it's
title path which includes title of it's parent. Only available to pages.

%category%
A sanitized version of the category name. Uses only the first category.

%categories%
A sanitized version of the all the category names.

%categorypath%
A sanitized version of the category path name.

%blogname%
A sanitized version of the blog name.

%tag%
A sanitized version of the tag name. Uses only the first tag

%tags%
A sanitized version of all the tag names.

%author%
A sanitized version of the author name.

%year%
The year of the post, four digits, for example 2004 

%monthnum%
Month of the year, for example 05 

%day%
Day of the month, for example 28 

%hour%
Hour of the day, for example 15 

%minute%
Minute of the hour, for example 43 

%second%
Second of the minute, for example 33 
    
== Installation ==

1. Upload `auto-url` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
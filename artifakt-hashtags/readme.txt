=== The artifakt Hashtag Plugin ===
Contributors: artifaktcom
Tags: posts, hashtags, search
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: 2.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin makes #hashtagged keywords searchable across your website.

== Description ==
The artifakt Hashtag Plugin allows you to easily and quickly make keywords 
searchable across your website, in the same way it does on other websites where 
hashtags are used. Just adding the # symbol in front of a word or phrase makes 
it a link to the archive page of that hashtag.

Originally this plugin simply created links to a search results page for the 
hashtags, and that worked well but we got to thinking about SEO and how it 
would be nice to index the hashtags on your site. So we created a custom taxonomy 
"Hashtags" (duh) so now you have some options on how you display the archive 
pages and the SEO meta for the pages (if you are so inclinded). You could even 
create a tag cloud of all your hashtags using Wordpress' tag cloud widget.

We are leaving all the customizing of the archive pages and SEO work up to you
and your theme but your options are much more plentyful since version 2.0

Have fun! And as always, please let us know if there are any issues or
features you'd like to see.

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. When writing a post simply use hashtags on key words ( #wordpress ) and they will turn into links when the post is displayed  

== Frequently Asked Questions ==
= Help I get a 404 error when I click a hashtag! =
Go to Settings->Permalinks (this will flush the rewrite rules) then try again.
We are looking into this problem and will try to have an update soon.

== Changelog ==
= 2.5 =
Adding ability to use hashtags in comments

= 2.3 =
Hopefully fixes flush rewrite rules bug. Also fixes a bug if upgraded from 1.0
in which terms may not exist.

= 2.2 =
Fixing link issue. Flush rewrite rules still getting worked on.

= 2.0 =
Massive change! Moving to custom taxonomy "hashtag" instead of simple search
results page. 

Warning to the few v1.0 users: you will have to go back and resave any posts
with hashtags in order for them to properly be adding the the new custom
taxonomy. You can do so in bulk by selecting the posts the clicking "bulk
edit" then "update", you don't need to make any changes but the plugin just
needs to fire on save.

= 1.0 =
Plugin launch!

== Upgrade Notice ==

= 2.0 =
Massive change! Moving to custom taxonomy "hashtag" instead of simple search
results page.

= 1.0 =
Plugin launch!

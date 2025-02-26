=== Quick Bulk Tags Creator ===
Contributors: ehabsan
Tags: terms, taxonomies, tags, post tags
Requires at least: 4.0
Tested up to: 4.9.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.html

Easily add tags in bulk, and easily create a filter function to modifiy the values you insert

== Description ==
This plugin enables you to easily add as many tags as you wish in one round, i tested it on my localhost to add 1000 tag and everything worked fine.

you can also specifiy a slug by using the following format **tag,slug**, a working example will be:

`
tag1
tag2,slug2
`
When you don't specifiy a slug the tag name will be used as the slug, so in the previous example 2 tags will be inserted tag1 with tag1 as the slug,and tag2 with slug2 as the slug

You can also edit a function that will be used to modifiy the tags you insert, if you wish to edit that function go to the directory where this plugin was installed and then to the admin directory, open the filter-tags.php file and edit that function.

You will see that function in this plugin's settings page, however it will only be read-only so you can make sure that the tags will be modified as you expect them to be.

== Installation ==
Install the plugin automatically using the wordpress plugin installer or manually following these steps:
1) Download the Quick Bulk Tags Creator from wordpress.org
2) Upload quick-bulk-tags-creator folder to the /wp-content/plugins/ directory.
3) Activate the plugin through the ‘Plugins’ menu in WordPress.
4) Use the plugin by visiting the settings page, there is also a link for the settings page in the default page for adding tags.

== Frequently Asked Questions ==
= Is there a maximum number of tags that i can insert? =

No there is no maximum number, but since there is always a limit on time that a certain script can run - the default is 30 seconds - a suitable number for that time limit would be less than 5000 - on average speed servers.

= I tried to insert a huge number of tags and there were no results - the button is showing "working..." for a very long time? =

For a huge list of tags the script in the server-side could have been timed-out, if that's the case then a lot of tags were already inserted - but the plugin won't be able to report because there was no response of the server-side. Anyway copy the list of tags, and try to insert it again this time the plugin would insert the tags that were not inserted in the first round.

= What happens if i tries to insert tags that are already in the database? =

Whenever you try to insert tags the plugin will tell you the number of tags that were successfully inserted, and will show you a list of tags that were not inserted - so you can know which tags where already there.

= What is the use of that PHP Callback optional function? =

This function will be called on each tag you insert, allowing you to progrmatically modifiy the slug or the name of the tag.

= Why i can't edit the filter-tags file directly in the settings page? =

For the securirty of your website i made the view of that file a read-only view.

= Can i use this plugin to add terms from other taxonomies? =

For the moment this plugin works only with tags, however it is easy to customize it to work with other taxonomies. If i see requests for such a feature i may add it in the future.


== Screenshots ==
1. Settings page
2. Edit tags page
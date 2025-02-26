=== Advanced XML Reader ===
Contributors: RaymondDesign
Donate link: http://dev.raymonddesign.nl/donate/
Tags: xml, reader, curl, post, page, xmlreader
Requires at least: 2.5
Tested up to: 3.3.1
Stable tag: 0.3.4

DO NOT USE THIS PLUGIN ANYMORE! It is vulnerable for XXE (Xml eXternal Entity) injection.

== Description ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

Advanced XML Reader is a plugin that give blog owners the posibility to show any xml file in their post or page. You fill in the url of the xml file and the plugin finds all the used tags in the file.
An example: When you have a xml file with website statistics, using <WebsiteName>, <TotalPages> and <TotalVisitors>. Using that tags you can create a sentence like this: "Website: [advanced-xml:WebsiteName], pages: [advanced-xml:TotalPages], visitors: [advanced-xml:TotalVisitors].". You see that you can use every tag in the xml file in a post on your blog.
Much web services provides an API with XML file, you can use such files in this plugin.

Romanian translation by Web Geek Science (http://webhostinggeeks.com/)

== Installation ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

1. Install the plugin using the build-in plugin installer or upload the folder to the `/wp-content/plugins/` directory
2. Go to `Settings > Advanced XML` and fill in your xml file url
3. Now you can use the plugin, insert a tag in a post using `[advanced-xml tag="tagname"]`

== Frequently Asked Questions ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

= If there are multiple keys with the same name, can I loop through all the items? =
Yes, you can. Since version 0.3 it's possible to loop through all items.

== Screenshots ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

1. Options page, after you saved a xml file you can see all the tags you can use.
2. You can use the tags of the xml file in a post.
3. The tags are automatically replaced with the xml data.

== Changelog ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

= 0.1.1 =
* Fixed a session problem in `curl.php`, some users had a php 'headers already sent' warning

= 0.1.2 =
* Disabled curl caching, it causes some problems

= 0.2 =
* You can now use the plugin tags in every widget title
* You can now use the plugin tags in the default Wordpress 'text' widget

= 0.3 =
* The plugin now supports multiple entries in a xml file. It loops through the multiple entries.

= 0.3.1 =
* Hide a specified tag when looping through multiple results
* Recognize web urls and show them as links
* Recognize image urls and show them as images

= 0.3.2 = 
* Bugfix: this fixes issues with cURL `followlocation` and PHP in safe mode. It's recommended to update when your server is running PHP in safe mode.

= 0.3.3 = 
* Now using the Wordpress HTTP API instead of cURL. cURL isn't necessary anymore.

= 0.3.4 = 
* Now using the Wordpress Shortcode. New format for adding xml to your post: `[advanced-xml tag="tagname"]`. Old format still exists, but is deprecated.

= 0.3.5 = 

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

* Fixed a bug in calling `load_plugin_textdomain()`. Thanks to Will, [bug report](http://dev.raymonddesign.nl/wordpress-plugins/advanced-xml-reader/#comment-454).
* Fixed a bug in `aXMLreader_parsetag()`. Thanks to Valerio, [bug report](http://dev.raymonddesign.nl/wordpress-plugins/advanced-xml-reader/#comment-498).

== Upgrade Notice ==

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

= 0.1.1 =
This update fixes some session problems, see changelog for further details.

= 0.1.2 =
This is an error fix, we advise you to update.

= 0.2 =
This update gives you some extra features, see the changelog for details.

= 0.3 =
This update gives you some extra features, see the changelog for details.

= 0.3.1 =
This update gives you some extra features, see the changelog for details.

= 0.3.2 =
This is a bug fix affecting all setups using PHP in safe mode. It's strongly recommended to update.

= 0.3.3 =
* Now using the Wordpress HTTP API instead of cURL. cURL isn't necessary anymore. Please update when you do not want to use cURL.

= 0.3.4 =

* Now using native Wordpress Shortcodes, it's strongly recommended to update.

= 0.3.5 =

**DO NOT USE THIS PLUGIN ANYMORE!**

**It is vulnerable for XXE (Xml eXternal Entity) injection, which can lead to major security issues for your blog and the server hosting your blog.**

**More information is available here: http://osvdb.org/show/osvdb/92904**

=== Core Sidebars ===
Contributors: DanielNexterous
Site: http://www.nexterous.com/
Tags: pages, posts, sidebars, asides, widgets
Requires at least: 2.5
Tested up to: 2.5
Stable tag: 1.0.0

A small but useful plugin to have unique sidebars for each page/post.

== Description ==

A plugin that enables you to have dedicated content and/or widget sidebar for each specific page or post. For example, on a featured blog post you may want to place additional contact while on a calendar page you might want to place a calender widget or some text events or both.

== Installation ==

1. Upload the directory /core-sidebars/ into your Wordpress directory under /wp-content/plugins/

2. Open your administration panel and go to Plugins and activate it by clicking Activate next to the description of Core Sidebars.

3. You are now able to begin using the plugin. Go to the Manage menu to edit a post or a page or write a new page or post. Either way, you will find a new meta box entitled "Sidebars and Widgets". Click to open and then you will find the two boxes to enter your content. HTML is allowed in the content box.

4. To include the data in the function, delete everything inside your sidebar.php except for your style container. Now, using add this PHP code by customizing it to your needs.

<pre>
$sboptions = array(
     'order' => 'title-content-widgets', 
     'before_title' => '<h2>', 
     'after_title' => '</h2>', 
     'before_content' => '<div id="sidebarcontent">',  
     'after_content' => '</div>'); 
coresidebar($sboptions);
</pre>


== Widget Support ==

Widget support is enabled by default and you do not have to add any code. The only recommended change is that you go to your template's functions.php file and remove any coding containing a function similar to the one below.

`
if ( function_exists('register_sidebar') )
    register_sidebar();
`

To enable widgets on a page or post, go to the manage screen and click 'Add Widgets!' to add or 'Remove Widgets' to remove.

== Notes ==

This plugin is ONLY for Wordpress 2.5+. It will not work with lower versions and may in fact corrupt the data in older versions. Please stay up to date with both Wordpress and this plugin.

When using this plugin instead of Page Sidebars, this plugin will overwrite any of the widget configurations previously used. Also, do NOT use this script with Page Sidebars as it will lead to compatibility issues. Using this plugin will overwrite your other widget sidebars defined in your template. Proceed with caution.

For an older version of this plugin for Wordpress versions 2.3.3 or lower, check out Page Sidebars.

== Frequently Asked Questions ==

The following are FAQ that have been asked on my site or that I find people might confuse. If you need any more help, or have questions, feel free to contact me on my site. 

= Does this plugin support Widget Sidebars? =

Yes, by default, this plugin does support widget sidebars. You do not even need to add any code. However, you it is recommended that you remove some coding from one of the template files. See the other notes.

= Where do I add the tag for the sidebar? =

Normally, the tag is best place in your template's sidebar.php file.

= Should I use this plugin for Wordpress 2.3.3 or lower? =

No, this plugin is specifically for 2.5 or higher. The reason is that it uses new functions and actions that are defined in only Wordpress 2.5. For 2.3.3 or lower, check out my other plugin, Page Sidebars.
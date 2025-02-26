=== RSS Related Posts ===
Contributors: cbogdan
Donate link: http://blog.121416.co.cc/
Tags: related posts, rss, feed, simplepie
Requires at least: 2.0.2
Tested up to: 2.9.*
Stable tag: 2.0


This plugin shows a list of 10 related post, called by rss from Google blogsearch.


== Description ==

Do you think that you're the only one who is writing about these things? Honestly, if my answer disappoints you, you should know that you're not the only one who is writing about these things. So, in this point comes this plugin to help you. 

You could generate a link list of articles from other blogs, simply adding a custom field. The generated list it's based on Google BlogSearch, this means that in the created custom field, the value, will be a construction of keywords, which will be able to show other articles from other blogs, having the same subject.

Take a look at installation ...


== Installation ==

If you want this plugin to work for your blog, follow the steps:

*1. Go in your Dashboard blog logged like admin.
*2. From left menu select "Plugins" and there you will find "Add new" button. You can download the plugin from http://blog.121416.co.cc/wordpress/wp-plugin-rss-related-posts/ and use the "Upload" option to insert and activate this plugin in your blog or you can search for it right there in the "Add new" section, with the search query "rss related post" and press the button "Install" that you will find in the right part of the showed table with plugins.
*3. This plugin use SimplePie plugin so you have to install this plugin too. The instructions for SimplePie installation you will find here -> http://wordpress.org/extend/plugins/simplepie-plugin-for-wordpress/ . The second step is to install <a href="http://wordpress.org/extend/plugins/simplepie-core/">SimplePie Core</a>, it's another plugin , i know, but doesn't do anything, just has some new functions for the first SimplePie Plugin that you installed.
*4. You need to create a new directory for the cache. Go in your FTP account and create a new directory with the name 'cache' , in 'wp-content' folder.

Now go to see "How to use it" for more informations ...

= How to use it =

The function to call this plugin is `<?php rss_related_posts(); ?>`
You have a beautiful option that you can use, the custom field! By default this plugin will use your post title to figure out the rss related posts but sometimes this job doesn't give a relevant content so i come now with a solution. You create a new custom field in your post, with what key you want and in the value side you write some relevant word for your article.

`Ex: Custom Filed->  key = myrssposts ---- value = about best friends`

 What else you can do? You can use a strongly value to be more relevant for the content. If in your custom filed value you will do not put any words between inverted commas, the rss related posts will be less relevant than if you will write some words between inverted commas. This job it's such a dick because the plugin use google blogsearch and on google if you want to find something exactly you need to put your words between inverted commas. Here is the same situation, but will work without this inverted commas. 

`Ex: Custom Filed->  key = myrssposts ---- value = about "best friends"`

When you finish to create your custom field, you have to repeat this creation in every post from now on and the next step is to configure the plugin to use this custom field. This step is very easy and what you have to do is to put the name of your custom field inside the php function, in the example case, like this :

`<?php rss_related_posts(myrssposts); ?>`

You can makeup your rss result with two CSS classes that are inserted in the plugin code. One is for h2 tag, named 'rssheader' and one is for each item from rss results and is named 'rsscontent'.

You can add this code in your style.css file:

`.rssheader {
font-size: 16px;
color: #444444;
}`
`.rsscontent {
background: #eeeeee;
border: 1px solid #dddddd;
}`

== Upgrade Notice ==

Desactivate and delete the second version of this plugin, after that, you are able to install the new one!

== Screenshots ==
No screenshots, but here is a demo : http://blog.121416.co.cc/wordpress/wp-plugin-rss-related-posts/ . Take a look down, after the wole post content! I use javascript to personalize the div tags!

== Changelog ==

= 2.0 =

*This plugin now use <a href="http://wordpress.org/extend/plugins/simplepie-plugin-for-wordpress/">SimplePie plugin</a> and for the options use <a href="http://wordpress.org/extend/plugins/simplepie-core/">SimplePie Core</a>.
*Has customizable options like insertion of a custom field or makeup the results with css.

= 1.0 =
* just what i say about it

== Frequently Asked Questions ==


I have no answer for no question!


== Others ==

For further information, visit http://blog.121416.co.cc/wordpress/wp-plugin-rss-related-posts/
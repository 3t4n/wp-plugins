=== Post Thumb Revisited ===
Contributors: Alakhnor.
Tags: formatting, media, images, thumbnail, youtube, video, mp3, admin, swfobject, swf, flash, widget, post
Donate link: http://www.alakhnor.com/post-thumb/?page_id=2
Requires at least: 2.1
Stable tag: 2.2.1

Post-Thumb Revisited automatically creates and displays thumbnails for posts. Numerous functions and options to modify themes are available.

== Description ==

The plugin scan posts for images. Then, it can do the followings:

 * Loop display: show a thumbnail linked to the post.
 * Sidebar display: it can shows thumbnails from the most recent posts or thumbnails from random posts.

All thumbnails are dynamically created when needed and then saved. So, there is no complex thumbnail management.
The nice Highslide javascript library is included in the plugin and used if desired. It adds nice expansion effect to each link/thumbnail created by post-thumb revisited.

So, Post-Thumb revisited is a thumbnail management system.

Install the plugin, and then, you can add a thumbnail display in the Loop by a simple function:

        `<?php the_thumb(); ?>`

This will show the thumbnail of the first picture in the post for each post in the Loop.


Or you can add a list of your most recent posts represented by a thumbnail in the sidebar with:

        `<?php the_recent_thumbs(); ?>`

Or one or more random posts in the same way:

        `<?php the_random_thumb(); ?>`

Once you've done this, you do not have to care anymore about thumbnails!

For instance, if you want to change thumbnail size site-wide, just delete the thumbnails on your server, change the settings…done. Next time a page will be loaded, thumbnails will be updated automatically.

Images can be anywhere: anywhere on your server, on a remote server, on FlickR,...


== Installation ==

1. Unzip the file
2. Upload the "post-thumb" folder to your Wordpress plugins folder.
3. Activate it from the admin panel.
4. Navigate to the options->post thumb and configure each option before using.

Important: You must configure the location settings correctly or it will not work.

Detailed documentation: http://code.google.com/p/post-thumb-revisited/wiki/
Change logs: http://code.google.com/p/post-thumb-revisited/wiki/Changelogs


= Two levels of customizing =

The plugin is highly configurable. You can set the parameters in the option screen for the entire site, or change them locally in any function call your theme template may contain.

A lot of settings are available to help you manage thumbnails exactly the way you want:

 * Size of the thumbnails
 * Save name: all thumbnails are save in a folder. You can decide what name to use, even what folder.
 * Quality: quality of thumbnails can be adjusted.
 * Additionnally, a sharpness mask can be applied to further improve quality.
 * Rounded corners can be applied to thumbnails
 * You can add text in the thumbnail
 * Javascript library: in addition, Highslide JS can be used to display image or media.

With this, you can manage how your blog shows just like you wish.

= Simple example =

         `<?php echo get_recent_thumbs('altappend=first_&width=180&height=120&category=1&offset=0&limit=1'); ?>`
         `<?php echo get_recent_thumbs('altappend=main_&width=50&height=50&category=1&offset=1&limit=6'); ?>`

First line will display the first post of category 1 with a size of 180x120. The save name will first_image.xxx.
Second line will display the 6 following posts of category 1 with a size of 50x50. The save name will main_image.xxx.


= Formatting display =

Post-Thumb uses only standard html code. So, all formatting will go through css. If needed, some tags or classes can be added to the thumbnails.


== List of functions ==

= Loop functions =

 * `get_thumb`, `the_thumb`: displays thumbnail of current post.
 * `get_pt_excerpt`: improved excerpt (current post).


= Sidebar functions =

 * `get_recent_thumbs`, `the_recent_thumbs`: retrieves last published posts and displays their thumbnails.
 * `get_random_thumb`, `the_random_thumb`: retrieves randomly choosen posts and displays their thumbnails.
 * `RecentImages`: retrieves all images in published posts starting with last.


== Additional feature: thumbnailing inside posts ==

 * Images and thumbnails: You can tell Post-Thumb to thumbnail all of part of the images inside your posts.
 * WordTube Media: You can tell Post-Thumb to display WordTube media with thumbnail and play them in a popup windows.
 * Youtube video: You can tell Post-Thumb to display Youtube videos with thumbnail and play them in a popup windows.
 * Inserting Youtube video: Post-Thumb will accept either the embed code supply by Youtube, the link to the video or its owninsertion tag: `[YOUTUBE=(video ID) title=(video title)]`


== Widgets ==

Widgets are gathered in the Post-thumb widgets plugin. It needs to be activated too. If your theme is widget ready, then the following functions will be available:

Widget list:

 * pt-random: returns thumbnails from random posts.
 * pt-recent: returns thumbnails from most recent posts.
 * pt-recent-video: returns thumbnails & link to wordTube media from most recent posts.
 * pt-recent-youtube: returns thumbnails & link to youtube from most recent posts.
 * pt-last-youtube: displays last youtube from a given youtube user.
 * pt-slideshow: simple slideshow.
 * pt-recent-images: displays last images in posts.


== Support ==

Support can be found on plugin homepage: http://www.alakhnor.com/post-thumb

You can also view project here: http://code.google.com/p/post-thumb-revisited/

 * Additional documentation: http://code.google.com/p/post-thumb-revisited/w/list
 * Issues & requests: http://code.google.com/p/post-thumb-revisited/issues/list
 * Development version: http://code.google.com/p/post-thumb-revisited/source
 * Change logs: http://code.google.com/p/post-thumb-revisited/wiki/Changelogs

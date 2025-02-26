=== Plugin Name ===
Contributors: davidangel
Donate link: http://davidangel.net/photofade/
Tags: photo, slideshow, jquery, post, attachments
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: trunk,

Create a jQuery powered slideshow of the attached images using the [photofade] tag.

== Description ==

>This plugin takes the images attached to a post or page and creates a looping slideshow, just like the one above. It’s very simple right now, but I’ve got some other neat ideas for it in the future.

>Usage is simple:
**[photofade]** – Displays slideshow of images attached to your post/page by Menu Order. Defaults to 4 seconds. 
**[photofade time=’5000′]** – Displays the same slideshow with 5 second intervals, configured via milliseconds. 
**[photofade order=’random′]** – Displays the slideshow in random order. Options are 'sequence'(default), 'random' or 'random_start'
**[photofade height=’350′]** – Displays the slideshow at 350px tall. Control the height in pixels with this. Can also be set to 'variable' to allow for different image heights. Defaults to smallest image height.
**[photofade styles=’off’]** - Turns off default styles and use your own (you can use 'photofade_custom' class). Defaults to 'on'.

>If you enjoy this plugin, if it makes your life easier, if it saves you time, if you think it’s gorgeous in it’s simplicity, consider donating. I’d love to improve it more.

>**Note:** Plugin works best if uploaded images are of similar size/dimensions.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `photo-fade` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Upload photos to your post/page (you don't have to insert them, just attach them to post).
4. Use [photofade] shortcode in your post/page.
5. Use [photofade time='2000'] to control the time per slide.
6. Use [photofade order='random'] to randomly sort the slides.

== Frequently Asked Questions ==

= Where can I donate or learn more? =

http://davidangel.net/photofade/

== Screenshots ==


== Changelog ==
= 0.2.1 =
Moved some styles inline so they wouldn't be overriden by other stylesheets.

= 0.1.9 =
Added styles='on/off' and defaults to on. Use styles='off' if you'd like to style the photofade_custom class.

= 0.1.8 =
Quick bugfix.

= 0.1.7 =
Added 'variable' to height option in the shortcode. This will allow images to be different heights.

= 0.1.6 =
Fixed jQuery bug that affected some users

= 0.1.5 =
Website link updated (shortened)

= 0.1.4 =
Better margin control

= 0.1.3 =
Control the container height if you wish

= 0.1.1 =
Better documentation

= 0.0.5 =
Bug fixes

= 0.0.3 =
First Release


== Upgrade Notice ==

= 0.2.1 =
Moved some styles inline so they wouldn't be overriden by other stylesheets.

= 0.1.9 =
Optionally turn off default styles.

= 0.1.8 =
Quick bugfix.

= 0.1.7 =
Added 'variable' to height option in the shortcode. This will allow images to be different heights.

= 0.1.6 =
Fixed jQuery bug that affected some users

= 0.1.4 =
Better margin control

= 0.1.3 =
Control the container height if you wish

= 0.0.3 =
First Release


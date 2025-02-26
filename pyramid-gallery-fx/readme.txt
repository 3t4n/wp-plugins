=== Pyramid FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, pyramid, gallery, thumb, thumbs, xml, as3, photo, image, tooltip, effects, zoom, roll, over, out, background, columns
Requires at least: 2.8.0
Tested up to: 3.0
Stable tag: trunk

== Description ==

An original "Pyramid". Fully XML customizable, without using Flash. And it's free!

= Main features =

The Pyramid FX can be embedded in any website for free without even using Flash. It can have an overall width and height up to 1680 x 1050 pixels. It supports an unlimited number of rows and columns, thus an unlimited number of images. You can have the option to go to an URL or to enlarge the image when clicking a thumb. Both the description and tooltip have CSS formatted text. External PNGs (changeable) for next/previous buttons. The images border and spacing are configurable too. Enlarging effects are provided.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. [Download](http://www.flashxml.net/free/download/pyramid.zip "Pyramid FX") or [purchase](http://www.flashxml.net/pyramid.html#swmi-license "Pyramid FX") the Pyramid FX Flash component
2. Create a new folder inside your `/wp-content/` directory called `flashxml/pyramid-fx` and copy the content of the archive to this folder
3. Install [the plugin](http://downloads.wordpress.org/plugin/pyramid-gallery-fx.zip "Pyramid FX Plugin")
4. Activate the plugin from the **Plugins** tab in **WordPress Dashboard**
5. Go to **Pyramid FX** from the **Settings** tab and update the path in case you used a different one
6. In the post editor use the following tag to embed the Pyramid FX: `[pyramid-fx][/pyramid-fx]`. You could also add `<?php pyramidfx_echo_embed_code(); ?>` in the PHP file of your theme
7. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your Pyramid FX](http://www.flashxml.net/pyramid.html "Pyramid FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `flashxml/pyramid-fx/settings.xml`
8. To use your own images, upload them to the `flashxml/pyramid-fx/images` folder and update the `flashxml/pyramid-fx/images.xml` file accordingly

= Additional settings file =

To embed the Pyramid FX more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called **settings2.xml**. From the post editor, use the following code: `[pyramid-fx settings="settings2.xml"][/pyramid-fx]`. From the PHP files of your theme, add the file name as *the first argument* of the `pyramidfx_echo_embed_code()` function call. If you use a separate set of images, don't forget to create a new XML file for that and update the value in the settings file.

= No Flash support text =

To support visitors without Adobe Flash, you can provide alternative textual content. From the post editor, add the text between `[pyramid-fx]` and `[/pyramid-fx]`. From the PHP files of your theme, add the text as *the second argument* of the `pyramidfx_echo_embed_code()` function call.

= If you have PHP4 =

To make it work if you're using PHP4, add the following code `[pyramid-fx width="600" height="300"][/pyramid-fx]` in the post editor. From the PHP files of your theme, add the width and height as *the third and fourth argument* of the `pyramidfx_echo_embed_code()` function call. Don't forget to provide your own width and height values, since 600 and 300 are just examples.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/pyramid.html "Pyramid FX") is the utility that helps easily customize your Pyramid FX to fit all your needs.
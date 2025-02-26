=== 3D Stack FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, 3d, stack, free, flash, as3, thumb, image, tooltip, effect, animation, effects, text, reflection, thumbs, xml, photo, lightbox, slideshow, scrollbar, scroll, slide
Requires at least: 2.8.0
Tested up to: 3.0.1
Stable tag: trunk

One of the most advanced 3D Stack on the web. Completely XML customizable without any Flash knowledge. And it's free!

== Description ==

You can integrate it in any website for free without even using Flash. It's using the Papervision3D engine and it has multiple camera rotations and views with reflection effect. There is a configurable plane rotation and view of the first (head) and last (tail) images. You can use the optional slideshow function with unlimited number of many formats of images (JPG, GIF, PNG, BMP) of different widths and heights. It has many tooltip customizations and the scrollbar is skinnable.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. There are two files to download: [WordPress Plugin](http://downloads.wordpress.org/plugin/3d-stack-fx.zip "3D Stack FX Plugin") (that you have to install and activate) & [Free archive](http://www.flashxml.net/free/download/3d-stack.zip "3D Stack FX")
2. Create a new folder inside your **wp-content** folder called **flashxml**, inside this folder create a new one called **3d-stack-fx** and copy the content of the **free archive** there
3. If you copied the **free archive** to a location different than the one above, go to **3D Stack FX** from the **Settings** tab in your **WordPress Dashboard** and update the path accordingly
4. Add `[3d-stack-fx][/3d-stack-fx]` where you want the Flash to show up in your post/page
5. If you want to make the 3D Stack FX part of your theme, edit the template files and add `<?php stackfx_echo_embed_code(); ?>` where you want it to show up
6. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your 3D Stack FX](http://www.flashxml.net/3d-stack.html "3D Stack FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `wp-content/flashxml/3d-stack-fx/settings.xml`
7. To use your own images, upload them to `wp-content/flashxml/3d-stack-fx/images/` and update the `wp-content/flashxml/3d-stack-fx/images.xml` file accordingly

= Additional settings file =

To embed the 3D Stack FX more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called `settings2.xml`. Add `[3d-stack-fx settings="settings2.xml"][/3d-stack-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the file name as **the first argument** of the `stackfx_echo_embed_code()` function call (for example `<?php stackfx_echo_embed_code("settings2.xml"); ?>`).

= No Flash support text =

To support visitors without Adobe Flash Player, you can provide alternative content by adding the text between `[3d-stack-fx]` and `[/3d-stack-fx]`. If you made the Flash part of your theme, add the text as **the second argument** of the `stackfx_echo_embed_code()` function call (for example `<?php stackfx_echo_embed_code("","Alternative content"); ?>`).

= If you have PHP4 =

To make it work with PHP4, add `[3d-stack-fx width="600" height="300"][/3d-stack-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the width and height as **the third and fourth argument** of the `stackfx_echo_embed_code()` function call. Don't forget to provide your own width and height values, since 600 and 300 are just examples.

= Getting rid of the FlashXML.net label =

To remove the FlashXML.net label from the top-left corner you'll need to buy the [paid package](http://www.flashxml.net/3d-stack.html "3D Stack FX"). Once you'll do that, simply use the SWF file from the paid package to overwrite the SWF file from the `wp-content/flashxml/3d-stack-fx/` folder.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/3d-stack.html "3D Stack FX") is the utility that helps easily customize your 3D Stack FX to fit all your needs.
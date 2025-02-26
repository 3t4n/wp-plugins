=== 3D Wall FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, as3, wall, 3d, gallery, thumb, thumbs, zoom, columns, rows, effect, tootip, flat, xml, rotate
Requires at least: 2.8.0
Tested up to: 3.0.1
Stable tag: trunk

One of the most advanced 3D Wall on the web. Completely XML customizable without any Flash knowledge. And it's free!

== Description ==

You can integrate it in any website for free without even using Flash. Customizable width and height of the overall wall, up to 1680 x 1050 pixels. You can customize the number of columns and lines, items spacing, speed, radius and also the perspective and camera distance from wall. You can have different types of wall: flat, outside and inside curvature with different types of movement and tweening functions. The thumbs have glow and blur effects, you can link to an URL on clicking a thumb instead of enlarging it, the tooltips have a lot of properties and the scroll bar can be skinnable.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. There are two files to download: [WordPress Plugin](http://downloads.wordpress.org/plugin/3d-wall-fx.zip "3D Wall FX Plugin") (that you have to install and activate) & [Free archive](http://www.flashxml.net/free/download/3d-wall.zip "3D Wall FX")
2. Create a new folder inside your **wp-content** folder called **flashxml**, inside this folder create a new one called **3d-wall-fx** and copy the content of the **free archive** there
3. If you copied the **free archive** to a location different than the one above, go to **3D Wall FX** from the **Settings** tab in your **WordPress Dashboard** and update the path accordingly
4. Add `[3d-wall-fx][/3d-wall-fx]` where you want the Flash to show up in your post/page
5. If you want to make the 3D Wall FX part of your theme, edit the template files and add `<?php wallfx_echo_embed_code(); ?>` where you want it to show up
6. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your 3D Wall FX](http://www.flashxml.net/3d-wall.html "3D Wall FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `wp-content/flashxml/3d-wall-fx/settings.xml`
7. To use your own images, upload them to `wp-content/flashxml/3d-wall-fx/images/` and update the `wp-content/flashxml/3d-wall-fx/images.xml` file accordingly

= Additional settings file =

To embed the 3D Wall FX more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called `settings2.xml`. Add `[3d-wall-fx settings="settings2.xml"][/3d-wall-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the file name as **the first argument** of the `wallfx_echo_embed_code()` function call (for example `<?php wallfx_echo_embed_code("settings2.xml"); ?>`).

= No Flash support text =

To support visitors without Adobe Flash Player, you can provide alternative content by adding the text between `[3d-wall-fx]` and `[/3d-wall-fx]`. If you made the Flash part of your theme, add the text as **the second argument** of the `wallfx_echo_embed_code()` function call (for example `<?php wallfx_echo_embed_code("","Alternative content"); ?>`).

= If you have PHP4 =

To make it work with PHP4, add `[3d-wall-fx width="600" height="300"][/3d-wall-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the width and height as **the third and fourth argument** of the `wallfx_echo_embed_code()` function call. Don't forget to provide your own width and height values, since 600 and 300 are just examples.

= Getting rid of the FlashXML.net label =

To remove the FlashXML.net label from the top-left corner you'll need to buy the [paid package](http://www.flashxml.net/3d-wall.html "3D Wall FX"). Once you'll do that, simply use the SWF file from the paid package to overwrite the SWF file from the `wp-content/flashxml/3d-wall-fx/` folder.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/3d-wall.html "3D Wall FX") is the utility that helps easily customize your 3D Wall FX to fit all your needs.
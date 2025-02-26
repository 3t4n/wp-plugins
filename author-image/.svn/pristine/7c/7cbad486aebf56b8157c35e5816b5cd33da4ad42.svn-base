=== WP Custom Author Image ===
Contributors: p4wparamjeet
Donate link: https://paypal.me/paramjeetkumawat
Tags: wp-custom-author-image, author, user profile photo, user photo, user gravatar
Requires at least: 3.1
Tested up to: 5.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lets you easily add WP Custom Author Images on your site.


== Description ==

The WP Custom Author Image plugin for WordPress lets you easily add WP Custom Author Images on your site.

It creates a widget that you can insert in a sidebar or any other widget area allowed by your theme.
The plugin now supports a short code [wp-custom-author-image] you can use to directly add the image to the page or post content.

Alternatively, you can place the following call in the loop where you want the WP Custom Author Image to appear:

    <?php the_wp_custom_author_image($author_id = null); ?>

	This $author_id parameter is optional.  If it is not passed in, the code will attempt to get the current author of the page/post.

A second version of this function exists whereby you can pass in width and height to display the image.

    <?php the_wp_custom_author_image_size($width, $height, $author_id = null); ?>

	This $author_id parameter is optional.  If it is not passed in, the code will attempt to get the current author of the page/post.

To configure your WP Custom Author Image, browse Users / Your Profile in the admin area.


= Setting WP Custom Author Image Size =

You can adjust the actual display size in the WP Custom Author Image widget or by using the_wp_custom_author_image_size function call.

If you do not specify a size the width and height of the actual image will be used.


= Shortcode =

1. You can use [wp-custom-author-image] to display the uploaded WP Custom Author Image in your page/post content.


= Multi-Author Sites =

For sites with multitudes of authors, the widget offers the ability to insert a link to the author's posts -- his archives.


= Single Author Sites =

Normally the widget will only display an WP Custom Author Image when it can clearly identify who the content's author actually is. In other words, on singular pages or in the loop.

If you run a single author site, or a site with multiple ghost writers, be sure to check the "This site has a single author" option. The widget will then output your image at all times.


= Alternate About Page Link =

Normally the widget will use the author's posts page (/author/authorname/) is the image is clicked on.   If your site has a dedicated page for the author, such as an 'About Me' page,

there is a new field in 'Your Profile' called 'About Me Page'.  Entering a url in this field (/about-me/) will cause the widget to use this link as opposed to /author/authorname.


= Retrieving Author Url =

You can retrieve the url to the respective WP Custom Author Image by calling the function

	<?php the_wp_custom_author_image_url($author_id = null); ?>

If $author_id is blank the plugin will attempt to determine the current author and retrieve his/her image.


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Make the `wp-content` folder writable by your server (chmod 777)


== Screenshots ==

1. After activate this plugin go to plugin settings by click on "Users". You can also find the plugin settings by 'Users > Your Profile' menu in your WordPress backend like as above screen.
2. You can use [wp-custom-author-image] to display the uploaded WP Custom Author Image in your page/post content.


== Frequently Asked Questions ==

= Image Style =

You can use the `.entry_wp_custom_author_image` CSS class to customize where and how the image appears.

For instance:

    .entry_wp_custom_author_image {
      float: left;
      border: solid 1px outset;
      margin: 1.2em 1.2em 0px .1em;
    }

= Overriding CSS Floats =

When displaying wide videos, images or tabular data, it becomes desirable to bump the content below the author's image. To achieve this, insert the following code in your post:

	<div style="clear:both;"></div>

= Set Uploaded Image Max Width and Height =

Two constants can be set in your `wp-config.php` file to set the max size of the uploaded image.  These values are in pixels.

	define('wp_custom_wp_custom_author_image_WIDTH', 100);
	define('wp_custom_wp_custom_author_image_HEIGHT', 120);

The default values for these settings are 250 x 250.

= Can I Make changes to the Author's Bio Before it is Displayed =

There is a filter called wp_custom_author_image_bio that can be used to modify the bio text.

= Nothing is Displaying =

More than likely you have place the the_wp_custom_author_image function call outside of your template's posts loop so the author cannot be determined.  Trying passing in an author id directly.
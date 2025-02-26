=== Artiss Vine Embed ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: display, embed, page, post, postcard, seo, shortcode, show, video, vine, widget
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 1.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed Vine videos into your blog

== Description ==

Embed your Vine videos directly into your posts, pages or sidebar. Features include...

* Embed your Vine video with a simple shortcode or use widgets in your sidebar
* Use the video ID or full URL
* Specify video size and type (simple or postcard)
* Administration screen allows you to specify default options
* Google compatible metadata is added to the video output - great for SEO!

This isn't the first WordPress plugin to embed Vine videos but it will certainly be the best!

How do you do it? Simply use the shortcode [vine] with at least a parameter specifying the video ID. For example...

`[vine id=bjHh0zHdgZT]`

To specify a full URL you will need to enclose it within both opening and closing shortcode. For example...

`[vine]https://vine.co/v/bjHh0zHdgZT[/vine]`

Default output settings can be defined via an administration screen. Click on "Media" in the menu sidebar and there will be a sub-menu named "Vine Embeds". Click on this to specify default size and video type.

To change the defaults on an individual basis use the `size` or `type` parameters. The latter can be set to `simple` or `postcard`. For example...

`[vine size=480 type=postcard]bjHh0zHdgZT[/vine]`

And that's it!

In future releases expect the following...

* Editor button to make embedding even easier
* Responsive output of videos
* Internationalization
* And much more!

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/davidartiss "Artiss.co.uk on Twitter") (@davidartiss).

For problems, suggestions or enhancements for this plugin, please report them via the [WordPress forum](http://wordpress.org/support/plugin/artiss-vine-embed "WordPress Plugins Forum").

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Installation ==

The plugin can be added with the `Plugins->Add New` administration option. Alternatively, it can be installed manually after being downloaded from WordPress.org...

1. Upload the entire `artiss-vine-embed` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu.

Once activated you can immediately use the shortcode or the widget option. Within administration a menu option of Media -> Vine Embeds can be used to specify default output options.

== Screenshots ==

1. Postcard video output
2. Simple video output
3. Administration screen showing contextual help
4. Widget options

== Changelog ==

= 1.1.1 =
* Bug: Fixed a number of PHP errors that were being reported

= 1.1 =
* Maintenance: Compressed all images (over 38 KB saved)
* Enhancement: Added administration menu allowing you to specify default output options

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.1.1 =
* Update to fix some PHP errors

= 1.1 =
* Update to add option screen, allowing to specify default video settings

= 1.0 =
* Initial release
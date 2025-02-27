=== Random Gallery ===
Contributors: David G
Donate link: https://paypal.me/randomgallery
Tags: gallery, random, subset, images, category
Requires at least: 3.0.1
Tested up to: 6.2
Stable tag: 00.08
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Random Gallery displays a different subset of your images every time your page is refreshed.

== Description ==

Random Gallery lets you display a different subset of your images every time your page is refreshed. Just tell it which ones you want it to pick from and how many you want to show at a time.

= The Basics =

Random Gallery works with an old fashioned shortcode. You specify the pool of images with the `ids` or `category` parameter. Then you specify how many you want to show with the `shownum` parameter.

Here's an example of the `ids` method:

`[random-gallery ids='101,102,103,104,105' shownum='3']`

Note there are five images in the list but only three will be shown at a time.

And here is an example of the `category` method:

`[random-gallery category='myCategory' shownum='3']`

Random Gallery can handle the ordinary Gallery shortcode parameters `columns`, `size`, and `link`:

`[random-gallery category='myCategory' shownum='3' columns='1' size='medium' link='none']`

You can put shortcodes in all kinds of blocks, but it's best to use the shortcode widget.

= ids method details =

The `ids` parameter is the list of images you want to draw from. To build up the list, you need the numbers that WordPress assigns to each of your images.

There are plugins that let you see these numbers directly in the Media Library. Try searching the plugins directory for "reveal ids".

Otherwise, you can find them manually:

- open up your Media Library
- click on a photo
- the Attachment Details will pop up
- the URL in your address bar will look like this: `https://www.example.com/wp-admin/upload.php?item=101`
- take the number at the end of the URL (in this case 101) and add that number to `ids`
- repeat this process for each photo you want to include

= category method =

By default, categories are not available in the Media Library. However, there are plugins that will enable them. Try searching the plugins directory for "media library categories".

Once you have categories enabled, you can create a category, add images to it, and specify it in the shortcode by name.

== Curly Quotes Issue ==

One tricky thing to watch out for is curly quotation marks. WordPress likes to replace straight quotes (`'`) with curly quotes ('). This is usually a good thing, but Random Gallery can only handle straight quotes.

The easiest and best way to make sure you're only using straight quotes is to put your shortcode in a shortcode widget, then re-type all the quotes directly in the widget.

== Thanks ==

I hope Random Gallery works for you. If you have any trouble, just shoot me an email. Thanks!

== Installation ==

You can add Random Gallery directly from your WordPress dashboard Plugins page or you can download random-gallery.php and put it in the wp-content/plugins/ directory of your WordPress installation. Either way, make sure you activate it from the Plugins page.

== Frequently Asked Questions ==

= What if I have a question? =

I'd be happy to help!
[randomgallery@greenwold.com](mailto:randomgallery@greenwold.com)

= What if I have a suggestion? =

That would be most welcome!
[randomgallery@greenwold.com](mailto:randomgallery@greenwold.com)

= What if I find a bug? =

Please let me know right away!
[randomgallery@greenwold.com](mailto:randomgallery@greenwold.com)

== Changelog ==

= 00.08 =

Adds support for PHP 8. Drops support for Gallery shortcode parameter 'type'. Updates the readme and testing.

= 00.07 =

Bug fix: categories no longer limited to a shownum of 5. Updated the readme and testing.

= 00.06 =

Added support for categories. Added a donate link. Updated the readme and testing.

= 00.05 =

No change to the code. Just updated the readme and testing.

= 00.04 =

No change to the code. Just updated the readme and testing.

= 00.03 =

No change to the code. Just updated the readme and testing.

= 00.02 =

Added support for type, columns, size, and link.

Miscellaneous code and documentation improvements.

Fixed bug that was forcing the gallery to the top of the page.

= 00.01 =

Added header and comments.

= 00.00 =

Just the code. Made for and deployed on client's website.

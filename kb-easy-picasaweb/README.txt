=== KB Easy PicasaWeb ===
Contributors: adamrbrown
Donate link: http://adambrown.info/b/widgets/donate/
Tags: picasa, picasaweb, picassa, picassaweb, photos, images, photo, image, google, jpg, png, gif, photograph, photographs, photography
Requires at least: 2.0
Tested up to: 3.1.1
Stable tag: trunk

Picasa users: The simplest way to display a Picasa album inside a page or post. Just put a link to your album in a post; this plugin does the rest.

== Description ==

There are many PicasaWeb plugins for WordPress; I counted 8 of them before writing this plugin, and tried using several. (There are now over 50!) Unfortunately, most of them are annoying. Either they have poor documentation, or they require you to insert funny things into your posts, or they are slow, or whatever.

KB Easy PicasaWeb is the easiest, fastest, most visitor-friendly Picasa plugin for WordPress.

* **Easiest**: This plugin does not require you to insert funny markup into your posts--all you need is a link to a Picasa album, and the plugin does the rest.
* **Fastest**: The plugin uses efficient caching to keep your blog's pageloads quick.
* **Most visitor friendly**: The plugin uses PHP, not JavaScript, so it won't cause errors or annoying movement when loading. (If you've used JS-based Picasa plugins, you'll know what I mean.) Even your grandmother can view your photos if you use this plugin.

= How it Works =

I wrote KB Easy PicasaWeb so that there would be an easy, fast way to embed PicasaWeb albums into pages and posts. This is all you do:

1. Download and activate the plugin
1. Write a post (or edit an old one). Somewhere within it, create a link to a PicasaWeb album (on a line by itself).
1. Done. This plugin finds your link, recognizes it as a PicasaWeb link, and converts it into a nicely-formatted series of photos (with captions).

Want the photos to be larger or smaller? No problem--just go to `Settings->KB Picasa` and change the size.

= Why it's Quick =

The first time you view a post with photos in it, you'll notice a short delay (less than 5 seconds, typically) while the plugin queries PicasaWeb to request the album information. But unlike many other Picasa plugins, the delay occurs only once--the results get cached locally by the plugin for future use.

= See a Demo =

* If you want to see how the admin page looks, view the [screenshots](http://wordpress.org/extend/plugins/kb-easy-picasaweb/screenshots/).
* If you want to see how the photos look, check out the [photos category](http://adambrown.info/b/offtopic/category/photos/) on my blog. 

= Support =

If you post your support questions as comments below, I probably won't see them. If this documentation doesn't answer your questions, then post your support questions on a post in the [KB Easy PicasaWeb category](http://adambrown.info/b/widgets/category/kb-easy-picasaweb/) on my blog.

== Installation ==

1. IF USING WP 2.7 OR HIGHER, use the automatic installer. OTHERWISE, follow the usual download/unzip/upload/activate routine (after unzipping, upload the `kb-easy-picasaweb` folder, which should contain three PHP files and maybe some other garbage, to your `/wp-content/plugins/` directory).
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Optional: Go to the `Settings->KB Picasa` page to adjust the plugin's settings.
1. Create a new page or post on your site (or edit an existing one). Create a link to a PicasaWeb album on a line by itself.
1. View the page (or post) and admire all the photos.

You have several settings available at the options page, including

* Image size
* Whether to display captions
* Whether to link photos to the full-size version
* Whether to display photos in one column or two

= License =

This plugin is provided "as is" and without any warranty or expectation of function. I'll probably try to help you if you ask nicely, but I can't promise anything. You are welcome to use this plugin and modify it however you want, as long as you give credit where it is due. 

But please don't redistribute this plugin from anywhere other than right here. Unless months go by and it looks like I've completely abandoned this thing, let's not get forks going without a darn good reason; that just confuses people. But send me your improvements and I'll add them in.

= Support =

If you post your support questions as comments below, I probably won't see them. If this documentation doesn't answer your questions, then post your support questions on a post in the [KB Easy PicasaWeb category](http://adambrown.info/b/widgets/category/kb-easy-picasaweb/) on my blog.

== Screenshots ==

1. When you write a blog post, just insert a link to a PicasaWeb album on a line by itself, as shown here.
2. Here's the resulting post. On the plugin's settings page, I've set it to 2 columns with 160px photos and no captions.
3. Here's the same thing, almost. On the plugin's settings page, I've set it to 1 column, 400px photos, and captions.

== Upgrade Notice ==

= 1.3 =
Optional upgrade. New features: Improved CSS styling, ability to use private Picasa albums, option to limit how many photos are displayed.

= 1.3.1 =
If there's a stray "#" on the end of your URL (happens a lot), the plugin removes it instead of failing.

== Frequently Asked Questions ==

= It doesn't work! =

First, go to PicasaWeb and make sure the album is **publicly viewable**. If it's private, then make sure you included the `authkey` parameter in the URL.

If that's not the problem, well... The plugin looks for links to PicasaWeb albums and converts them into photo galleries. For the plugin to find your link, your link must meet the following criteria:

* The link must be on a line all by itself
* The link must point to a URL that looks like this: `http://picasaweb.google.com/username/albumname` (That's what all PicasaWeb album links look like, but double check anyway.)
* The link must be clickable. When viewing your post/page, can you click the link with your mouse and go to your album? (If not, the plugin can't find the link either.)
* The link must not contain `rel="noDisplay"` in it. Don't worry; it won't contain this unless you specifically put it there. (See "How do I hide a link from the plugin?" for more.)

If you're positive that none of those is the problem, then consider this: Some (stupid) hosts don't let WordPress (or plugins) make queries to external URLs. [Read more](http://wordpress.org/support/topic/120458).

= I changed a photo's caption, but it stayed the same! =

Remember, this plugin uses caching. If you add an album to a post, then you go over to PicasaWeb and add/remove images in your album, or change the captions in the album, those changes won't be reflected right away on your blog.

To force the cache to flush just this once, go to `Settings->KB Picasa` and change your image size (to anything), save, then change it back (and save again).

If this problem comes up frequently, go to `Settings->KB Picasa` and decrease the cache time.

= How do I hide a link from the plugin? =

Suppose that, for whatever reason, you want to put a link to a PicasaWeb album into a post, but you don't want it to get converted into a gallery by my plugin. There's a few ways to accomplish that.

* Don't put the link on a line by itself
* Add `rel="noDisplay"` to the link (in the code view, not the visual editor), like this: `<a href="url" rel="noDisplay">...</a>`

= I have a question that isn't addressed here. =

If you post your support questions as comments below, I probably won't see them. If this documentation doesn't answer your questions, then post your support questions on a post in the [KB Easy PicasaWeb category](http://adambrown.info/b/widgets/category/kb-easy-picasaweb/) on my blog.
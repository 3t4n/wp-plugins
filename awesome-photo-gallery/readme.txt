=== Awesome Photo Gallery ===
Contributors: CodeBrothers
Donate link: https://codebrothers.eu
Tags: photo gallery, photo album, photobook, album page, photo book, photo display, responsive gallery, gallery, slide show, image slideshow, photo gallery for wp
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 1.1.2

Create photo albums, upload photo's, categorize albums, slideshows, and use awesome widgets and shortcodes to show previews of a photo gallery.

== Description ==

= Photo Album Plugin =
With Awesome Photo Gallery it's very easy to implement a photo album in WordPress. With our free plugin you're able to manage and create photo albums. We have our own build lightweight modal to display the images in your photo gallery.

= Photo Gallery Features =
- Photo albums (galleries)
- Slideshow in the photo viewer (default: off, could be enabled in the Settings)
- Change the look and feel of thumbnails (designer, set colours and shadow)
- Categorize photo albums
- Every album has it's own URL
- This photo gallery plugin has its own archive
- Use shortcodes to list photo albums
- Use shortcodes to show a small preview of a specific album
- Shortcodes could be added in every post using a simple shortcut button
- With a WordPress widget you can show the latest album of your photo gallery
- Use another WordPress widget to show one random photo
- Drag & Drop the photos in a photo album to set their position
- Change the display type of a photo album, 2 column, 3 column or 4 column
- Change the thumbnail size from 50x50 to 150x150
- Set where the album description should be shown, above or below the album thumbnails
- Change the amount of thumbnails shown on the Album archive pages
- Lightweight photo viewer to display a photo gallery
- List a photo gallery (or multiple) with a shortcode for one specific category
- New: embed a complete gallery with a shortcode
- Advanced: Disable our frontend CSS and frontend JS

= Premium features in your photo gallery =
- Change the look and feel of the lightbox
- Enable share buttons for Twitter, Facebook, LinkedIn, Pinterest and Google+
- Enable a filmstrip for users in the lightbox
- Premium Support for 1-year

= URLs & Album overview =
To view the Photo Albums archive page, you can go to /albums/ on your website. When you'd like to create a page with all your albums, you should use the shortcode [apg\_list\_albums]. After installation of this photo album plugin, we automatically ask you if we are allowed to generate one page with your photo album overview.

= Translations =
Currently this photo gallery plugin is 100% translated in the following languages:<br />
- English (en_EN)<br />
- Dutch (nl_NL)<br />
- German (de_DE)<br />
<br />
If you'd like to help us translating the plugin, we'd love to hear from you! You can sent us an email on our website to get started.

> **Get more functionality with Premium!** <br /><br />
> You can extend the functionality by buying the premium version of Awesome Photo Gallery. With the premium version you'll have 1 year support, updates and extra functionality in your photo album plugin.<br /><br />
> The key features of Awesome Photo Gallery Premium are:<br />
> **Share buttons**<br />
> Implement share buttons for Twitter, Facebook, LinkedIn, Pinterest and Google+ in your photo lightbox and let visitors share your website.<br /><br />
> **Change the lightbox**<br />
> Change the look and feel of the lightbox, you're able to change the buttons type (rounded or square), background and text color. More options will be added later.<br /><br />
> **Filmstrip**<br />
> Add a filmstrip in the photo viewer and enable users to see the previous and coming up pictures.<br /><br />
> **Premium support**<br />
> When you have Awesome Photo Gallery Premium, you have the ability to use our premium support. We'd love to help you!<br /><br />
> [More information](https://codebrothers.eu) | [Get premium now >>](codebrothers.eu/awesome-photo-gallery-premium/)

= Why should I use this photo gallery? =
That's a very common question. We are working hard to integrate with more plugins and we like you to offer the best support for your photo gallery. We've made a very lightweight photo gallery and you always may request features.

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the photo gallery from the Plugins page.

Note: This plugin needs at least PHP 5.3+ to work as expected. PHP 5.2 is NOT supported. This plugin needs the PHP modules: cURL and filter.
== Frequently Asked Questions ==

**Which shortcode should I use to display all album previews on one page or post?**
You can use the shortcode [apg\_list\_albums] to do so. We have a shortcut button added above each post and page, so you can enter that shortcode very easy.

**Where can I change the thumbnail size?**
The thumbnail size can be changed in the settings. To find the Photo album settings, go in the left menu to "Photo albums" and hit "Settings". On this page is the thumbnail size settings listed.

**I'd like to get premium support for my photo album installation, what do I need?**
We are very happy to help you with our Premium Support. You can contact us using a small form on https://codebrothers.eu/support/. Don't forget to sent at least one license key with your email, so we can verify your license and website.

**My question is not listed here, where should I go?**
For more documentation about this photo gallery you can take a look in our [Documentation centre](https://codebrothers.eu/documentation-categories/awesome-photo-gallery/) to find more questions and answers.

**Where can I report issues and bugs?**
The development of this photo gallery plugin is on GitHub. You can help us by creating an issue directly in [the GitHub repository](https://github.com/Code-Brothers/Awesome-Photo-Gallery).

== Screenshots ==

1. Add and edit albums easily in your admin
2. List all albums you have added, and view which ones are published
3. Add and Upload new photos in your gallery with the media library
4. Manage the settings of all photo albums
5. The lightweight photo viewer in the photo gallery

== Changelog ==

= 1.1.2 - 6 April 2016 =

**Improvements**

- Album views counter included (backend only, charts will be available later)
- [Awesome Google Analytics](https://wordpress.org/plugins/awesome-google-analytics) integration (event tracking on photos)

= 1.1.1 - 16 February 2016 =

**Improvements**

- Shortcode [apg_list_albums] is updated; You're now able to add a category to the shortcode and list a specific album category. Example usage: [apg_list_albums category=151].

= 1.1.0 - 23 December 2015 =

**Improvements**

- Slideshow added to use in a photo gallery
- The shortcode "apg_album" supports a new attribute "preview=false" to disable the preview and enable the full gallery functionality. You can embed one complete photo gallery in a post or page with this example code: [apg_album id=184 preview=false]
- Moved from extensions to [Awesome Photo Gallery premium](https://codebrothers.eu/awesome-photo-gallery-premium/)
- Added a few new hooks and filters
- Change the look and feel of thumbnails with a simple designer in the settings (enable shadow and change border color and size)
- Improved UX

**Fixes**

- Small CSS fixes
- Rows in preview shortcode are aligned
- Bugfix in uploader (JS error)

= 1.0.2 - 22 November 2015 =

**Improvements**

- Tested up to WordPress 4.4
- German translation added (de_DE)
- Version number is now shown in album for debug purposes
- Links added to documentation and support
- Improved admin page titles

**Fixes**

- Photo viewer in front-end didn't work as expected in Firefox
- Try to show the first image in the album posts overview if the featured image was not set

= 1.0.1 - 10 November 2015 =

**Improvements**

- Screenshots added in WP Repo

**Fixes**

- Minor bug fixes in updater

= 1.0.0 - 9 November 2015 =

- Initial photo album release
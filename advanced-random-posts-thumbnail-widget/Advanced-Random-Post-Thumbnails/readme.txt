=== Advanced Random Post Thumbnails Widget ===
Contributors: diondeville and yakuphan
Tags: Random, Posts, Random Thumbs, Category, Category Thumbs,Random Thumbnails, Thumbnail Widget
Donate link: http://wpservicemasters.com/plugins/advanced-random-post-thumbnails-widget/
Requires at least: 2.8
Tested up to: 3.3
Stable tag: 1.2

Use a widget to display thumbnails from random posts. Thumbnails can be grabbed from all posts, from posts from selected categories or selected from categories assigned to a post a visitor is viewing.

== Description ==

Advanced Random Post Thumbnails Widget displays thumbnails grabbed randomly from posts. Each thumbnail is hyperlinked to the post is taken from and is displayed in widget. The widget is easily configurable from the `Appearance > Widgets` page. This plugin is based on the Advanced Random Post Widget by Yakup GÖVLER.

== Installation ==

1. Make sure you are running WordPress version 2.8 or higher.
1. Download the zip file and extract the contents.
1. Upload the 'advanced-random-post-thumbnails-widget' file to `/wp-content/plugins/`.
1, Extract the zip file.
1. Activate the plugin through the WordPress 'plugins' page.
1. See `Appearance > Widgets` to place the `Random Thumbnails Widget` within your theme.
1. Set the settings in `Appearance > Widgets`.

== Frequently Asked Questions ==

= How can I set it to take posts from post category being viewed by a site visitor? =

Select checkbox in widget's settings called 'Get posts from current category'.

= How can I get the widget to select posts from specific multiple categories? =

Write a comma separated list of category IDs in the `Categories` textbox.

= Can I style the layout of the images using CSS? =

Certainly. There are plenty of elements to style!

Working outwards from the image...

The img element uses the class img.dv-advanced-random-posts-thumb

The image wrapper div uses the class div.dv-advanced-random-image-image

The container wrapper for all the images uses the class div.dv-advanced-random-image-block

There is a 3 column, single row table between the image wrapper and the container wrapper. The table make sit easier to position the images relative to the container wrapper's left and right sides.

The left column is an empty buffer space with the class tr.dv-buffer-left

The middle column holds the images and has the class tr.dv-image-holder

The right column is an empty buffer space with the class tr.dv-buffer-right

The table has the class table.dv-advanced-random-image-table

= Can I translate the plugin to other languages? =

Sure go ahead. The plugin has a language folder. Put your translation in to it. Don't ask me how to create the .po file because I don't know. Let me know when you've translated the plugin language and I'll add your work to the plugin repository.

= Can I make a feature request? =

Yes you can. I don't monitor the WordPress forums often enough to catch requests posted there. Please visit me at [the plugin's homepage](http://wpservicemasters.com/plugins/advanced-random-post-thumbnails-widget/) to make your request. I will do what I can.

= Can I donate to you? =

Definitely! :D

WordPress and web development is my livelihood. I do accept donations but I prefer good ol' backlinks and word-of-mouth recommendations to potential clients. Visit me at [WP ServiceMasters](http://wpservicemasters.com/) to learn more about what I do.

== Screenshots ==

1. Widget's screenshot in Dashboard Theme Appearance

== Options ==

The Widget's options allow you to change the way images display within the widget.

= Title: =

Set the widget's title.

= Number of posts to show: =

How many posts to display.

= Thumbnail Custom Field Name =

Do you use a custom post field to denote images? Use this option to set the custom field as the source of displayed images.
This option stops both the first image of a post and the first attached post image from being used as thumbnails.

= Image Dimensions =

Set the width and height of the thumbnails. You do not need to specify both a height and a width but doing so prevents over-sized thumbnails.

= Display thumbnails in rows and columns? =

Choose whether to show thumbnails in a single-file column or in multiple columns that might form multiple rows depending on how many thumbnails will be displayed. Tick the box to display thumbnails in rows.

= Thumbnail Margins =

Set the pixel distance between each thumbnail and its neighbour.

= Get the first image of each post =

Uses the first image found in a post as the post's thumbnail.
This option is only active when a custom field is not specified.
This option stops the first image of a post from being used as the thumbnail.

= Left and Right Buffer Space =

The images a re laid out in a 3-column, 1-row table. The middle column holds the images. The left and right columns have zero-size by default. The left-most column (Left Buffer Space) may be used to push the images rightward from the widget's left-hand-side. The right-most column (Right Buffer Space) may be used to push the images leftward from the widget's right-hand-side.

By default, all images are centrally aligned relative to the widget's left and right sides. Some themes are awkwardly designed and can make it difficult to make the images display left, right or centrally justified in all themes. The left and right buffers make it easy to position the images in all themes.

= Get first attached image of post =

Uses the first image attached to a post as the post's thumbnail.
This option is only active when a custom field is not specified.

= Default image =

Set an thumbnail to display when a post lacks images. Specify the full URL or a location relative to the WordPress root directory. For example, `http://journalxtra.com/image.jpg` or `/wp-content/uploads/image.jpg`, respectively.

= Categories =

Optionally specify a comma separated list of post category IDs that images should be selected from.

= Get posts from current category: =

Each post is assigned one or more categories. When a visitor views a post you can select to display thumbnails that are assigned the same category/categories as the post being viewed. When this option is selected, the home page still displays thumbnails from all categories.

== Contact ==

[Support](http://wpservicemasters.com/plugins/advanced-random-post-thumbnails-widget/)

== Supported Languages ==

* English

== Changelog ==

= 1.2 =

* Fixed error with WordPress repository upload (hopefully)

= 1.1 =

* Added the option to set the images to display as either rows or columns (in HTML speak, inline or block)
* Added a 3-column, 1 row tabled image layout (can display up to 20 images at a time).
* Added left and right side buffer spaces.

= 1.0 =

* First release.
* Based on the Advanced Random Post Widget by Yakup GÖVLER. Thank you Yakup for writing the original script.
* Changes to the original script include:
* Removed the ability to display the title and excerpt from the post a thumbnail is generated from,
* Changed post display type from an unordered list (ul) to regular divs (div),
* Added the option to specify thumbnail margins,
* Added class names to generated thumbnails and their container div. See FAQ for class details,
* Modified various class and function names to permit both this widget and the Advanced Random Posts Widget to  be installed into the same site simultaneously without conflict,
* Made minor changes to the widget's language,
* Made various other changes that I can't recall.
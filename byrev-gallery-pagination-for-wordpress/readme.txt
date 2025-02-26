=== ByREV Gallery Pagination for Wordpress ===
Contributors: Emilian Robert Vicol a.k.a. byrev
Donate link: http://byrev.org/donate.php
Tags: gallery, images, photos, pagination, paginate, pictures, photography
Requires at least: 3.0
Tested up to: 3.3.2
Stable tag: 1.7.3.beta.001

== Description ==

This plugin offers the possibility of displaying a photo gallery on multiple pages / pagination gallery + Ajax, CDN, Caching, SEO

For custom configuration, change **[gallery]** from Wordpress Post with **[gallery pagination="N"]** , where N is number of images per page. 
Example: **[gallery link="file" columns="5" pagination="10"]**  --> will show only 10 images per page in 5 columns , respectively 2 rows. Images are directly linked (link="file")

ByREV Gallery Pagination Features:

*  CDN (Content Delivery Network) Support - Ability to use multiple Mirror CDN servers for displaying images.
*  Caching Support for Gallery - Save resources & speed-up your website. Support for disk, mysql ar auto. For now just **disk** option is available. The plugin uses a specially developed script for erase cache (only manual), to avoid execution time limits in php.
*  Pagination via URL Query = Ability to set the pagination with **pagination=N** query in url - Example: http://yourblog.url/post/?pagination=4&page-album=1. Note: This option will override the options from the post via [gallery], from Wp Menu config and __DEFAULT_IMAGE_IN_PAGE constant defined in plugin files.
*  AJAX Gallery Loading.  Made compatibility with: FancyBox - Jos&eacute; Pardilla, Light Box - Hiroaki Miyashita, Simple Lightbox - Archetyped, Slimbox - Kevin Sylvestre, Slimbox plugin - Peppe Argento, Slimbox2 - Greg Yingling
*  "Quick Cache" plugin support - for the navigation pages to be cached
*  Fill the gaps (to complete gallery) in last row - If the number of images in gallery will not fill last row to the end, the gaps is filled with empty images.
*  Gallery title SEO / No Duplicate Title! (custom database query may not be compatible) - For best compatibility use : wp_title, the_title, the_permalink
*  Compatible with **Simple Lightbox** , **Lightbox Gallery** , **FancyBox for WordPress** , **Slim Box** and many others.
*  For a quick execution, configuration can be applied directly from the plugin file.
*  Paging menu item can be Top, Bottom or Both positions.
*  Ability to use a different css files
*  The ability to customize the CSS code with another class
*  Extended Pagination Style or Simple Next/Preview Pagination
*  Plug-n-Play - once activated, the plugin will make the necessary changes. No other changes are required in template.
*  100% compatible with default wordpress gallery ( tested up to 3.1.3 )

== Installation ==

*  Download **ByREV Gallery Pagination for Wordpress** Plugin and Install !
*  Activate **ByREV Gallery Pagination for Wordpress** from wp plugins menu: /wp-admin/plugins.php
*  Use Wordpress menu **Settings -> Gallery Pagination** for custom config. (No other changes are required for default)

For more information, please see [plugin home page](http://byrev.org/bookmarks/gallery-pagination-for-wordpress-plugin/)
and [FAQ PAGE](http://byrev.org/bookmarks/gallery-pagination-for-wordpress-plugin/)

== Frequently Asked Questions ==

What is the meaning of statements from byrev-gallery-pagination.php (plugin file) ?

*  _MENU_CONFIGURATION - To configure from wordpress administration, this value must be TRUE. Otherwise, any changes/settings may be made only from byrev-gallery-pagination.php (plugin file).
*  __FORCE_PAGINATION - if "pagination" parameter is not present in gallery code like this: **[gallery pagination="N"]**, plugin will force paginate with **_DEFAULT_IMAGE_IN_PAGE** value (see below)
*  __DEFAULT_IMAGE_IN_PAGE - if **_FORCE_PAGINATION** is false, this value has no effect.
*  __CSS_PAGINATION_CLASS - Change with your class. For more example, view byrev-gallery-pagination.css from plugin folder.
*  __EXTEDED_PAGINATION - if is false pagination will show only NEXT / PREVIEW style, else will show < < [0, 1, 3 ... N] > > style
*  __INCLUDE_DEFAULT_CSS - if css style is custom/defined in other file, change this with false
*  __PAGINATION_BOTTOM and __PAGINATION_TOP - if both value is true, plugin add pagination at the bottom and top gallery. Set/Choose the option that you want, but at least one must be active/true.
*  __FILL_GAPS_IN_LAST_ROW - if the number of images in gallery will not fill last row to the end, the gaps is filled with empty images
*  __FILL_GAPS_TRANSPARENCY - empty images transparency (behavior) / translucency - from 0 to 1 , where 0 = max transparency and 1 = no transparency; 0.5 = 50% transparency.
*  __QUICK_CACHE_SUPPORT - for the navigation pages to be cached ( valid only for "Quick Cache" plugin )
*  __AJAX_PAGINATION - pagination is loaded with ajax / Save your bandwidth, resources & speed-up your website

I see no change in the gallery, why the layout/pagination does not appear?

*  Change value from **Default Thumbnails in Page** option to a lower value.
*  For default **Default Thumbnails in Page** is 15. If the number of pictures from gallery is smaller than this value, the plugin will not display anything (only simple gallery). Change value from **Settings -> Gallery Pagination** menu.
*  clean gallery cache

Is compatible with: Lightbox, Simple Lightbox, Fancybox, Slimbox or else ?

YES  (Except custom pagination or other changes to pagination.)

== Screenshots ==

1. Screenshot **Settings -> Gallery Pagination** Config
2. Screenshot with plugin in action
3. Fill the gaps (to complete gallery) in last row - 3 dummy images were added.

== Changelog ==
= 1.0 =

1 st public version.

= 1.1 =
Update description and other information for installation

= 1.2 =

Navigation url issue (solved)!

-  SOLVED: If blog/site does not have permalinks enabled, pagination links are not built correctly.

= 1.3 =

-  SOLVED: Correct initialization configuration in wordpress menu.
-  ADDED: New option in config: **FILL GAPS TRANSPARENCY**; empty images transparency (behavior) / translucency - from 0 to 1; 0 = max transparency and 1 = no transparency; 0.5 = 50% transparency.

= 1.4 =

- ADDED: **Quick Cache** plugin support, for the navigation pages to be cached ( valid only for "Quick Cache" plugin )
- SOLVED: Database options synchronization with new releases. 
- CHANGES: Minor optimization for better compatibility with WordPress.

= 1.5 =

- ADDED: Ajax Pagination Support, pagination is loaded with ajax / Save your bandwidth, resources & speed-up your website

= 1.6.1 =

- ADDED: Caching Support for Gallery
- ADDED: CDN Support - Ability to use multiple Mirror CDN servers for displaying images
- ADDED: Pagination via URL Query  - Set the pagination with **pagination=N** query in url

= 1.6.2 =

- SOLVED: Minor CDN issues.

= 1.6.3 =

- SOLVED: Minor activation issues messages: "plugin generated NNN characters of unexpected output during activation" !

= 1.7.0 =

- SOLVED/ADDED: The possibility of navigation even if you are in the archive page ( search, category, tags, home page ...)
- ADDED: "Jump to Gallery" (a.k.a automatic scroll page) to current gallery (which has given clik). Valid only if not using ajax (Ajax does not require hash mark)!
- SOLVED: Clean cache every time you save options (to avoid various navigation errors may occur)

= 1.7.1 =

- Minor CSS FIX (for IE)

= 1.7.2 =

- Solved: Gallery image/css broken for multiple gallery instances on the same page (via jQuery)

= 1.7.2b =

- Solved: 1'st load Ajax and Lighbox Problem ... (a future release will contain routines for lighbox-like effect ... we get rid of compatibility problems)
- Replace noimage.png with new thumb image (source findicons.com) . Old thumb is noimage2.png

= 1.7.2.beta.004 =

- Solved: Hide pagination links when there is only a single page

=  1.7.3.beta.001 =

- solve problem with latest wp update about ajax-pagination msg: Error! Requested page 1 is outside the index ...

== Upgrade Notice ==

No Upgrade Notice

== Note ==

*  Function **byrev_gallery_shortcode** is derived from function original wordpress **gallery_shortcode** located \wp-includes\media.php , Wordpress Media Library.
*  All code from **gallery_shortcode** with certain exceptions (clearly marked with "byrev insert N {" )  belongs to the wordpress developers and community. 
*  Code marked with "byrev insert N {" belong to the author of this plugin , Emilian Robert Vicol.
*  New **canonical** tag is not changed, is auto configured by wordpress.
*  Version 1.7.* is not fully tested, if any problems pls. leave a message !
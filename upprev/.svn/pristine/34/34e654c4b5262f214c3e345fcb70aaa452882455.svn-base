=== upPrev ===
Contributors: iworks
Donate link: https://ko-fi.com/iworks?utm_source=upprev&utm_medium=readme-donate
Tags: box, notification, related, SEO, thumbnail
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 4.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display cool, animated fly-out or fade box with related content.

== Description ==

Display cool, animated fly-out or fade box with related content.

When a reader scrolls to the bottom of a single post, page, or custom post type, an animate box will be shown allowing the reader to select the previous or random available post or posts in the selected configuration:

1. Just previous
1. Previous in category
1. Previous in tag
1. Random
1. Related using YARPP (only post/pages)

== Installation ==

There are 3 ways to install this plugin:

= 1. The super-easy way =
1. In your Admin, go to menu Plugins > Add
1. Search for `upPrev`
1. Click to install
1. Activate the plugin
1. A new menu `upPrev` in `Appearance` will appear in your Admin

= 2. The easy way =
1. Download the plugin (.zip file) on the right column of this page
1. In your Admin, go to menu Plugins > Add
1. Select the button `Upload Plugin`
1. Upload the .zip file you just downloaded
1. Activate the plugin
1. A new menu `upPrev` in `Appearance` will appear in your Admin

= 3. The old and reliable way (FTP) =
1. Upload `upPrev` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. A new menu `upPrev` in `Appearance` will appear in your Admin

== Frequently Asked Questions ==

= upPrev is turned on, but there is no box, what now? =

First of all, check your template. To proper work plugin requires function `wp_head` and `wp_footer`. If your template doesn't use one of the themes, upPrev will not work. If you cant check this action in your templates manually use this code to check it: https://gist.github.com/378450

= How to add a default image to a post without a thumbnail? =

Use the `iworks_upprev_image` action, read more:

[How to add a default image to a post without a thumbnail?](http://upprev.iworks.pl/faq/how-to-add-default-image-to-post-without-thumbnail.html)

= How to change the post thumbnail to another image? =

Use the `iworks_upprev_get_the_post_thumbnail` filter, read more:

[How to change post thumbnail to another image?](http://upprev.iworks.pl/faq/how-to-change-post-thubnail-to-other-image.html)

= How to add upPrev for pages or custom post types? =

Yes. Just select post types on `Appearance -> upPrev -> Content` page in `Select post types` section.

= How I can customize it with my styles? =

See here: [How I can customize my styles?](http://upprev.iworks.pl/faq/how-i-can-customize-with-my-own-styles.html)

= Need more snippets? =

Visit: [upPrev: snippet archive](http://upprev.iworks.pl/tag/snippet)

== Screenshots ==

1. upPrev on post
2. upPrev options: appearance
3. upPrev options: content
4. upPrev options: links
5. upPrev options: cache

== Changelog ==

= 4.1.0 (2025-02-23) =
* The [iWorks Options](https://github.com/iworks/wordpress-options-class) module has been updated to 2.9.6.
* The [iWorks Rate](https://github.com/iworks/iworks-rate) module has been updated to 2.2.3.
* The `iworks/upprev/wp_query/args` filter has been added.
* The `_load_textdomain_just_in_time()` notice has been fixed.

= 4.0.7 (2022-06-02) =
* Fixed fade effect. Props for [George](https://wordpress.org/support/users/giorgos93/).
* Fixed wrong admin area JavaScript name. Props for [George](https://wordpress.org/support/users/giorgos93/).

= 4.0.6 (2022-05-26) =
* Fixed undefined `$value`. Props for [Robert](https://wordpress.org/support/users/robertmindroi/).
* Replaced `FILTER_SANITIZE_STRING` by `FILTER_DEFAULT` to avoid warning in PHP 8.1.
* The [iWorks Options](https://github.com/iworks/wordpress-options-class) module has been updated to 2.9.4.
* The [iWorks Rate](https://github.com/iworks/iworks-rate) module has been updated to 2.1.0.
* Updated [Mobile Detect](http://mobiledetect.net/) to 2.8.39.

= 4.0.5 (2022-01-21) =
* Fixed "Settings" link on Plugins page.
* The [iWorks Options](https://github.com/iworks/wordpress-options-class) module has been updated to 2.8.0.
* The [iWorks Rate](https://github.com/iworks/iworks-rate) module has been updated to 2.0.6.

= 4.0.4 (2021-08-31) =
* Restored option "Hide on tablets".
* Back to [Mobile Detect](http://mobiledetect.net/) class for mobile/tablet detection, version 2.8.37.

= 4.0.3 (2021-08-18) =
* Fixed categories limit to display.
* Fixed opacity issue when we click "close" button and scroll. Props for [George](https://wordpress.org/support/users/giorgos93/).
* Fixed `post_type` mismatch. Props for [George](https://wordpress.org/support/users/giorgos93/).
* Improved category/tag select, first to try get entries from all, then, from any category/tag.

= 4.0.2 (2021-08-16) =
* Added option to hide re-open badge.
* Fixed double headers on configuration screen. Props for [George](https://wordpress.org/support/users/giorgos93/).
* Fixed missing custom element to open box. Props for [George](https://wordpress.org/support/users/giorgos93/).
* Fixed to greedy defaults.
* Minor configuration screen tweaking.
* Updated iWorks Option Class to version: 2.7.0.

= 4.0.1 (2021-08-12) =
* Fixed wrong plugin description. Props for [Patrick_D1985](https://wordpress.org/support/users/patrick_d1985/).
* Fixed WP CLI error. Props for [Patrick_D1985](https://wordpress.org/support/users/patrick_d1985/).
* Removed post thumbnail on posts list.

= 4.0.0 (2021-08-11) =

* Added version number to upprev.css.
* Fixed bug with removing filter name.
* Fixed problem with $('body').offset() by changed it to scrollTop() function.
* Added ajax request to load upPrevBox content.
* Added capability filter *iworks_upprev_capability* - now you can easy change capability (default is manage_options).
* Added categories exclude (only PRO version).
* Added color chooser (only PRO version).
* Added filter 'iworks_upprev_thumbnail_size' for thumbnail size.
* Added free layouts: "Vertical Three".
* Added pro layouts: "Bloginity style".
* Added remebering usage "close" button.
* Added settable header text thx to [pmfox](http://wordpress.org/support/profile/pmfox) [Can we change header text?](http://wordpress.org/support/topic/plugin-upprev-can-we-change-header-text).
* Added tags exclude (only PRO version).
* IMPROVEMENT: check variable iworks_upprev in javascript before use it
* IMPROVEMENT: javascript & CSS files are minifized.
* IMPROVEMENT: replace moble detection function to [Mobile_Detect](http://mobiledetect.net).
* IMPROVEMENT: rework option page to easier configuration
* Upgrade iWorks Option Class to version: 2.7.0.
* Upgrade YARPP integration, minimum YARPP version: 3.5.x.
* Updated Hebrew translation by [של אודי בורג](http://blog.udiburg.com)
* REFACTORING: rebuild options screen, sidebar boxes are now manageable.
* REFACTORING: moved code to class.
* REFACTORING: rewrite on page options to use wp_localize_script.
* REFACTORING: used a proper way to ajax call.
* TYPO: "Anlalitics" should be "Analytics" thx to Knut Sparhell.

= 3.3.30 (2015-10-06) =
* Fixed a problem with showing the title if contains tags with attributes. Props for [Ovidiu](http://pacura.ru/).

= 3.3.29 (2015-09-01) =
* Added Tagalog translation by [Kel DC](https://profiles.wordpress.org/kel-dc).

= 3.3.28 =
* Added Slovak translation by Daniel Schmidt.

= 3.3.27 =
* Added Dutch translation by [Ruud Kok](http://www.ruudkok.nl/).

= 3.3.26 =
* Fixed empty post_type value thx to [Zeus](http://wordpress.org/support/profile/prabhakaraan) [UpPrev error - array_key_exists()!](http://wordpress.org/support/topic/upprev-error-array_key_exists).
* Added Italian translation by [Francesco Giossi](http://www.giossi.com/).

= 3.3.25 =
* Updated Simplified Chinese translation by [Leo](http://smallseotips.com/).
* Added filter '[iworks_upprev_box_title](http://upprev.iworks.pl/documentation/filter-reference/iworks_upprev_box_title)' for box title, return false to remove title.

= 3.3.24 =
* BUGFIX: prevent to display upPrev box on attachment page thx to [Swaps4](http://wordpress.org/support/profile/swaps4) [upPrev displaying on attachment pages with no styling](http://wordpress.org/support/topic/upprev-displaying-on-attachment-pages-with-no-styling).
* Remove add_contextual_help function (deprecated from 3.3).
* Updated IworksOptionClass to 2.0.0.

= 3.3.23 =
* BUGFIX: default value only when is need thx to [Jeff](http://wordpress.org/support/profile/lambje) [Offset Not Working](http://wordpress.org/support/topic/offset-not-working).
* Updated IworksOptionClass to 1.7.7.

= 3.3.22 =
* Add [iworks_upprev_check filter](http://upprev.iworks.pl/documentation/filter-reference/iworks_upprev_check), see documentation: [Filter Reference – iworks_upprev_check](http://upprev.iworks.pl/fiter_reference_iworks_upprev_check.html).

= 3.3.21 =
* Replaced WP_PLUGIN_URL with plugins_url() thx to [tigr](http://wordpress.org/support/profile/tigr) [SSL compatibility](http://wordpress.org/support/topic/ssl-compatibility).

= 3.3.20 =
* Updated IworksOptionClass to 1.7.4.
* IMPROVEMENT: check upPrev compatibility with WordPress 3.7.
* Fixed "last selected tab".

= 3.3.19 =
* Updated Hebrew translation by [של אודי בורג](http://blog.udiburg.com).

= 3.3.18 =
* Updated Bulgarian translation by [Martin Halachev](http://wordpress.org/support/profile/mhalachev).

= 3.3.17 =
* BUGFIX: Move custom CSS after wp_enqueue_style. thx to [007me].(http://wordpress.org/support/profile/007me) [Can't change font size and style and costumize close button].(http://wordpress.org/support/topic/cant-change-font-size-and-style-and-costumize-close-button).

= 3.3.16 =
* BUGFIX: Excerpt number of words to show option not working for a concrete excerpt. thx to [gyalokai].(http://wordpress.org/support/profile/gyalokai) [Excerpt number of words to show option not working](http://wordpress.org/support/topic/excerpt-number-of-words-to-show-option-not-working).
* Updated IworksOptionClass to 1.7.2.
* Added box to front page thx to [SARed].(http://wordpress.org/support/profile/sared) [Using Upprev on a front page with latest posts?](http://wordpress.org/support/topic/using-upprev-on-a-front-page-with-latest-posts).

= 3.3.15 =
* Added Hebrew translation by [עמיעד](http://hatul.info).

= 3.3.14 =
* Fixed limit for taxonomies. Props for [darkjedipete](http://wordpress.org/support/profile/darkjedipete).

= 3.3.13 =
* Added Czech translation by [Michal Bláha](http://michalblaha.cz/).

= 3.3.12 =
* Fixed compatibility errors with YARPP 4.x version thx to [adamdport](http://wordpress.org/support/profile/adamdport).
* Added CSS to changed tabs class in WordPress 3.5.
* IMPROVEMENT: check upPrev compatibility with WordPress 3.5.

= 3.3.11 =
* Added Bulgarian translation by [Martin Halachev](http://wordpress.org/support/profile/mhalachev).

= 3.3.10 =
* Added Spanish translation by [Ramón Rautenstrauch](http://www.apasionadosdelmarketing.es/about/).

= 3.3.9 =
* Added Romanian translation by [Florin Arjocu](http://drumliber.ro/).

= 3.3.8 =
* Critical update, plugin crash site if choosing no post types.

= 3.3.7 =
* Added Russian translation by [Вадим Сохин](http://webbizreshenie.ru/).

= 3.3.6 =
* Added German translation by [Mario Wolf](http://wolfmedien.de/).

= 3.3.5 =
* Fixed double output when using YARPP thx to [gyutae](http://wordpress.org/support/profile/gyutae).
* Fixed visibility of developer admin options.

= 3.3.4 =
* Added Brazilian Portuguese translation by [Leonardo Antonioli](http://www.tobeguarany.com/).
* Fixed minor description bug (thx Eva).

= 3.3.3 =
* Added Vietnamese translation by [Xman](http://thegioimanguon.com/).
* Fixed usage of crc32 to build ids for tabbed config, which collapsed in other than utf8 charset.

= 3.3.2 =
* Added GA option: non-interaction to prevent events in bounce-rate calculation.

= 3.3.1 =
* Added French translation by [Eva](http://myclientisrich-leblog.com/).

= 3.3 =
* Added option to hide upPrevBox on mobile devices, matching implemented from [WP Mobile Detector](http://wordpress.org/extend/plugins/wp-mobile-detector/) ticket from [forum](http://wordpress.org/support/topic/plugin-upprev-mobile-themes).

= 3.2 =
* Added action *[iworks_upprev_image](http://upprev.iworks.pl/documentation/action-reference/iworks_upprev_image)* - you can add own code to produce icon, when them don't support post-thumbnails.
* Added thumbnail filter *iworks_upprev_get_the_post_thumbnail* - now you can easy change thumbnail.
* Added purging transient cache entries from $wpdb->options table when turn off this cache [forum](http://wordpress.org/support/topic/plugin-upprev-crazy-number-of-wp-options-database-entries).
* Add check _gaq object exist.
* CHECK: checked compatibility to WordPress 3.3.
* Updated IworksOptionClass to version 1.0.1.

= 3.1.1 =
* Added ability to turn off "remove_all_filters" function.

= 3.1 =
* Changed GA trackEvent syntax.
* Added Turkish translation by [wpdestek](http://wordpress.org/support/profile/wpdestek).

= 3.0.1 =
* Fixed printing GA code when "I don't have GA tracking on site." is unticked. [forum](http://wordpress.org/support/topic/plugin-upprev-google-analytics-tracking-code-error-ga-tracking-installed) thx [win101](http://wordpress.org/support/profile/win101d).

= 3.0 =
* Fixed end date filter for imported posts.
* Fixed javascript conflict on edit post screen.
* Fixed problem with unchecking 'Excerpts'. [forum](http://wordpress.org/support/topic/plugin-upprev-bugs-no-box-in-firefox-6-offset-doesnt-work-disable-excerpts-doesnt-work) thx [benjamin](http://wordpress.org/support/profile/kbenjamin).
* Fixed sticky posts display loop.
* Fixed thumbnail display problem.
* Added filter '[iworks_upprev_box_item](http://upprev.iworks.pl/documentation/filter-reference/iworks-upprev-box-item)' for any item excerpt YARPPs.
* Added GA track: view box and click link.
* Added option *ignore sticky posts*.
* Added sanitize function for offset.
* Added thumbnail preview on posts/pages list.
* IMPROVEMENT: cleaning empty styles from custom CSS field.
* REFACTORING: option management.

= 2.3.7 =
* Fixed problem for defaults post_type if no one choosed [forum](http://wordpress.org/support/topic/plugin-upprev-error).

= 2.3.6 =
* Fixed problem with using thumbnails in themes with thumbnail support [forum](http://wordpress.org/support/topic/plugin-upprev-version-235-update-breaks-thumbnail-support).
* Added custom CSS rules (forum](http://wordpress.org/support/topic/plugin-upprev-version-235-update-breaks-thumbnail-support).

= 2.3.5 =
* Fixed problem with using thumbnails in themes without thumbnail support.

= 2.3.4 =
* Fixed problem with default values and values saving (again).
* Added correct way to enqueue style and JavaScript files.

= 2.3.3 =
* Removed configuration link on plugins list page for WordPress multisite.
* Fixed problem with post excerpt.
* Fixed problem with default values and values saving.

= 2.3.2 =
* Fixed translation bug.
* Removed date limit for random posts.
* Fixed open in new window bug.
* Added limit to display only on selected post types [forum](http://wordpress.org/support/topic/plugin-upprev-previous-post-animated-notification-custom-post-types).

= 2.3.1 =
* Fixed a small bug with the display option.

= 2.3 =
* Added filter **iworks_upprev_box**.
* Added tabbed options (based on [Breadcrumb NavXT](http://wordpress.org/extend/plugins/breadcrumb-navxt/) plugin.
* Added prefix and suffix to urls.
* Added option to allow open links in new window.
* Added integration with [YARPP](http://wordpress.org/extend/plugins/yet-another-related-posts-plugin/).
* Fixed [Transients Cache Lifetime is set to wrong seconds](http://wordpress.org/support/topic/plugin-upprev-transients-cache-lifetime-is-set-to-wrong-seconds).
* Fixed deactivation hook option names.

= 2.2.1 =
* Fixed display problem with document shorter than browser.
* Added document post type as a checkbox list.

= 2.2 =
* Added upPrev configuration link to the admin bar.
* Added registered custom posts.
* Fixed error if the behaviour of boxing display for HTML element.
* Fixed wrong method post_type selection.

= 2.1.2 =
* Remove margin-top for title element.
* Added display taxonomies limit.

= 2.1.1 =
* Fixed scroll down again, the box flies out, which -- on a small screen -- can obscure a big chunk of the content. [forum](http://wordpress.org/support/topic/plugin-upprev-return-to-top-of-post-after-clicking-x).

= 2.1 =
* Added box width option.
* Added box bottom and side margin option.
* Added transient cache for scripts and styles.
* Added actions: **iworks_upprev_box_before** and **iworks_upprev_box_after**, called inside the upPrevBox, before and after post. Now you can add some elements to upPrevBox without plugin modification.
* Added option to display (or not) close button.
* Added post type choose to post, page or any.
* Added random order for displayed posts.

= 2.0.1 =
* Fixed translation load.
* Added show box header option.
* Added stamp for cache key.
* Added Polish translation by [Marcin Pietrzak](http://iworks.pl/).

= 2.0 =
* Fixed display upPrev box in case of an equal height of the window and the document.
* Added to use transient cache.
* Added thumbnail width (height depends on theme thumbnail).
* Added prevent some options if the active theme does not support it.
* Added activation & deactivation hooks (to setup defaults and remove config).
* Removed all filters the_content for a post in the upPrev box.

= 1.0.1 =
* Added post_date as a parameter, to get real previous post.
* Fixed JavaScript error.
* Added header for a simple method.

= 1.0 =
* INIT: copy and massive refactoring of plugin [upPrev Previous Post Animated Notification](http://wordpress.org/extend/plugins/upprev-nytimes-style-next-post-jquery-animated-fly-in-button/).

== Upgrade Notice ==

= 4.0 =

* Added a simple configuration screen. Rebuild the options page for easier configuration.

= 3.3.13 =

* Added Czech translation.

= 3.3.12 =

* Fixed using YARPP 4.x. Check upPrev compatibility with WordPress 3.5.

= 3.3.11 =

* Added Bulgarian translation.

= 3.3.10 =

* Added Spanish translation.

= 3.3.9 =

* Added Russian translation.

= 3.3.8 =

* Critical update to prevent site crash!

= 3.3.3.1 =

* Added Brazilian Portuguese translation.

= 3.0 =

* Added GA tracking for display and click. Add filter and action to modify the result.

= 2.3 =

* Added YARPP integration.

= 2.1 =

* Added support to custom post type.

= 2.1 =

* Added some appearance and cache improvements. Scripts and styles optimization. New order available: random.

= 2.0.1 =

* Added a Polish translation. Fix cache refresh missing after changing plugin configuration.

= 2.0 =

* More configuration options. Uses transient cache to store results. Optimization activation & deactivation process.


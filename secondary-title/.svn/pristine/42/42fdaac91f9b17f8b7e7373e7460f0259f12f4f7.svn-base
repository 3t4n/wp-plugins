=== Secondary Title ===

Contributors:        thaikolja
Donate link:         https://www.paypal.me/thaikolja/10
Tags:                title, second title, subheading, heading
Tested up to:        6.7.1
Stable tag:          2.2.0
Requires at least:   4.0
Requires PHP:        7.4
License:             GPLv2 or later
License URI:         https://www.gnu.org/licenses/gpl-2.0.en.html

Secondary Title is a simple, lightweight plugin that allows you to easily add an alternative title to posts, pages, and/or custom post types.

== Description ==

**Secondary Title** is a simple, light-weight plugin that adds an alternative title to posts, pages, and/or [custom post types](https://codex.wordpress.org/Post_Types), which can be displayed automatically, with a shortcode or by using PHP.

The plugin comes with an extra settings page, which allows you to customize the plugin according to your needs. You can change:

* [post types](https://codex.wordpress.org/Post_Types), categories, and specific post IDs the secondary title will be
shown on,
* whether the secondary title should be automatically added to the standard title (*Auto show*),
* the format both titles are being shown (only works when *Auto show* is activated),
* the position where the secondary title input field should be displayed (above or below the standard title) within the admin interface (Classic Editor only),
* whether the secondary title should only be displayed in the main post and not within widgets, etc.,
* if the secondary title should be usable in [permalinks](https://codex.wordpress.org/Using_Permalinks),
* and even more.

**Please see the [official website](https://docs.kolja-nolte.com/secondary-title/) for a full documentation.**

== Installation ==

= Quick Installation =

1. Install Secondary Title either by searching for the plugin with WordPress' native plugin installer found under *Plugins* <span aria-hidden="true" class="wp-exclude-emoji">→</span> *Add New* or [download the plugin manually](https://downloads.wordpress.org/plugin/secondary-title.zip) and copy the *secondary-title* folder into the */wp-content/plugins/* directory of your WordPress installation.
2. Activate the plugin in the *Plugins* section of your admin interface.
3. Go to *Settings* <span aria-hidden="true" class="wp-exclude-emoji">→</span> *Secondary Title* to customize the plugin as desired.

**IMPORTANT:** If the *Auto show* option is set to *Off*, you have to use either

`<?php echo get_secondary_title($post_id, $prefix, $suffix); ?>`

or

`<?php the_secondary_title($post_id, $prefix, $suffix); ?>`

in your theme file(s) (e.g., *single.php*) where you would like the secondary title to be displayed.

**For more detailed documentation with parameters, functions, and examples, please see the [official documentation](https://docs.kolja-nolte.com/secondary-title/)**.

== Frequently Asked Questions ==

= More Frequently Asked Questions =

The full FAQ can be found in the [documentation](https://docs.kolja-nolte.com/secondary-title/support/faq.html).

== Screenshots ==

1. The output of an example news article where the secondary title is highlighted in red and followed by the default post title as set in the plugin's "Title format" setting.

2. A post using the Gutenberg block editor. The secondary title can be entered on the right-hand side of the "Post" tab.

3. A part of Secondary Title's settings page that you can use to specify how the secondary title is displayed on your website. Styling and HTML can be used in the "Title format" input field.

4. Secondary Title supports the [Classic Editor plugin](https://wordpress.org/plugins/classic-editor/) and lets you enter the alternative title right above the primary post title.

5. Learn how Secondary Title works and use it for your theme or plugin by reading the [official documentation](https://docs.kolja-nolte.com/secondary-title/).

== Changelog ==

= 2.2.0 =
* Added support for WordPress `v6.7.1`
* Added [official Secondary Title documentation](https://docs.kolja-nolte.com/secondary-title/) (still in progress)
* Added comments in the code for better readability
* Changed minimum PHP version from `v7.1` to `v7.4` since the [majority of WordPress sites use PHP `v7.4`](https://wordpress.org/about/stats/) or above
* Fixed possible security vulnerability for XSS
* Fixed and renewed [dead screenshots](https://wordpress.org/plugins/secondary-title/#screenshots) on WordPress.org's plugin website
* Updated dead links in this `README.txt` as well as inside the plugin's settings page. You will now be redirected accordingly
* Updated [voku/anti-xss](https://github.com/voku/anti-xss) to `v4.1.42` via PHP Composer
* Updated Font Awesome version to `v6.6.0`
* Updated Copyright to 2025

= 2.1.0 =
* Added support for WordPress `v6.2`
* Added translations
* Added minor performance improvements
* Updated Font Awesome version

= 2.0.9.1 =
* Critical security vulnerability fixed and measures taken to prevent future vulnerabilities

= 2.0.9 =
* Added support for WordPress `v6.1.1`
* Added padding to `<input>` for Post IDs
* Rebuilt the "Select all" link to toggle all categories
* Enlarged "Post IDs" input field

= 2.0.8 =
* Added support for WordPress `v5.8`

= 2.0.7.1 =
* HOTFIX: Reverted a change that caused [a bug](https://wordpress.org/support/topic/secondary-titles-showing-in-categories-sidebar/) when displaying the secondary title in sidebars

= 2.0.7 =
* Added support for [wp-Typography plugin](https://wordpress.org/plugins/wp-typography/)
* Fixed [bug](https://wordpress.org/support/topic/auto-show-secondary-titles-not-working-with-some-titles/) that caused some special characters to be displayed incorrectly when using [wp-Typography plugin](https://wordpress.org/plugins/wp-typography/) (thanks to [@msailer](https://wordpress.org/support/users/msailer/) and [@pepe](https://wordpress.org/support/users/pputzer/))
* [Reintroduced the "Input field position" option](https://wordpress.org/support/topic/above-or-below-the-standard-title/), but only if [Classic Editor]() is installed and activated (thanks to [@boborg](https://wordpress.org/support/users/boborg/))
* Removed localized files and their related PHP functions since this is now being handled and downloaded automatically by WordPress

= 2.0.6 =
* Fixed [bug resulting in `PHP fatal error`](https://wordpress.org/support/topic/latest-version-causes-posts-to-crash/) when using undeclared variables in function parameters (thanks to [@philsimon](https://wordpress.org/support/users/philsimon/))

= 2.0.5 =
* Added compatibility with WordPress `v5.7`
* Removed all previously (since version `v1.9.5`) deprecated functions from the plugin's codebase
* Removed "Input field position" option when using WordPress `v5.0` and above
* Removed dismissible notice on all pages except for Secondary Title's settings page
* Fixed PHP notice
* Fixed code formatting in PHP file headers
* PHP files now use `die()` instead of `return` statement to prevent files from being accessed directly
* Code in SCSS files has been nested for better readability
* Updated language files (.pot)
* Added type annotation to certain PHP functions

= 2.0.4 =
* Fixed [bug](https://wordpress.org/support/topic/php-notice-trying-to-get-property-of-non-object-on-line-471/) printing `PHP Notice: Trying to get property of non-object on line 471`
* Fixed [bug](https://wordpress.org/support/topic/does-not-display-name-of-post-types-in-settings/) that resulted in not showing the correct post type names on the settings page
* Updated code to match current PHP standards
* Updated dead URLs leading to the documentation website

= 2.0.3 =
* Compatibility with WordPress `v5.5` and below.
* Changed the minimum required PHP version to `v7.1`.

= 2.0.2 =
* Added full support for [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/) `v3.0`. [Use `%secondary_title%`](https://semperplugins.com/documentation/title-settings/) to display.
* Added note reminding that *Input field* and *Column position* options only apply when using Classical Editor in WordPress versions with Gutenberg (>= `v5.0`).
* Cosmetic changes to the plugin's settings page.

= 2.0.1 =
* Hotfix: Moved file `admin/settings.php` to `includes/setings.php` due to PHP complications.

= 2.0.0 =
* Added support for Gutenberg editor. The secondary title can now be entered via a meta box on the sidebar of the editor.
* Added minimized versions for CSS (compiled from [SCSS](https://www.quora.com/What-is-SCSS-How-does-it-differ-from-CSS)) and JS files for performance improvement.
* Added partial support for [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/). Use `%secondary_title%` to display.
* Updated Font Awesome to `v5.8.1`.
* Updated translations.
* Updated screenshots.
* Fixed bug with reoccurring donation notice.
* Minor style adjustments.
* Removed `/includes/gutenberg-info.php` and the notice saying "Secondary Title doesn't work anymore."
* Moved `/includes/settings.php` to `/admin/settings.php`.

= 1.9.9 =
* This version was skipped.

= 1.9.8 =
* This version was skipped.

= 1.9.7.5 =
* Hotfix and minor adjustments.

= 1.9.7 =
* Secondary Title is now compatible with PHP version `v5.2.17` and above.
* Added info icons next to every setting, which links to the official documentation where those settings are being explained in detail.
* Added "Settings" link to the "Plugins" section in the admin area, which leads to the Secondary Title's settings page.
* Updated Font Awesome to `v5.2.0`.
* Minor restructure of resources directories.
* Declared unused `secondary_title_get_default_setting()` as deprecated function.
* Donation notifications dismissed by users will start to show up again if the plugin is re-activated (please don't kill me!).
* Minor adjustments to the donation notification.

== Upgrade Notice ==

= v2.2.0 =
Added support for the latest WordPress version, fixed broken links, and increased safety.

= v2.1.0 =
This release updated dependencies and translations as well as support for WordPress `v6.2`.

= v2.0.9.1 =
IMPORTANT: A security vulnerableelity has been discovered. Please update immediately to `v2.1.0`.

= v2.0.9 =
This update contains mostly cosmetic changes but also compatibility with WordPress `v6.1.1`.

= v2.0.8 =
WordPress `v5.8` support.

= v2.0.7.1 =
A hotfix that reverts a change that caused [a bug](https://wordpress.org/support/topic/secondary-titles-showing-in-categories-sidebar/) when displaying the secondary title in sidebars.

= v2.0.7 =
This version reintroduces the "Input field position" option for WordPress `v5.0` and above when using the [Classic Editor](https://wordpress.org/plugins/classic-editor/) plugin. It also adds support for the [wp-Typography](https://wordpress.org/plugins/wp-typography/) plugin.

= v2.0.6 =
A hotfix to remove [a bug](https://wordpress.org/support/topic/latest-version-causes-posts-to-crash/) that might lead to a PHP fatal error.

= v2.0.5 =
Secondary Title is now compatible with WordPress `v5.7`, the latest WP version.

= v2.0.4 =
A few bugs have been fixed and some code sections rewritten.

= v2.0.3 =
To prepare you for future updates, Secondary Title requires now WordPress `v7.1` (as does WordPress `v5.2`).

This update is mainly to tell the WordPress.org repository that Secondary Title is not a dead plugin. Expect more significant updates soon.

= v2.0.2 =
Support for [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/) (`v3.0` and above).

= v2.0.1 =
Hotfix.

= v2.0.0 =
This version adds a secondary title input field to the Gutenberg editor, removes annoying admin notices, and partly supports [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/).

= v1.9.9 =
This version was skipped.

= v1.9.8 =
This version was skipped.

= v1.9.7.5 =
Hotfix and minor adjustments.

= v1.9.7 =
PHP > `v5.2.17` compatibility and info icons next to options on the settings page.

= v1.9.6 =
Version `v1.9.6` contains a series of code and performance improvements and some new functions.

= v1.9.5 =
This update, among others changes, fixes a displaying error on posts/pages overview page.

= v1.9.4 =
Hotfix for `v1.9.3` where obsolete JS code was being executed on the wrong page, destroying the layout.

= v1.9.3 =
Fixed HTML in `<header>` tag and converted the secondary title column on page overviews into more reliable PHP. **Major changes are expected to be included in the next release.**

= v1.9.2 =
Created a comprehensive [documentation](https://docs.kolja-nolte.com/secondary-title/) and added shortcodes to display the secondary title inside your posts.

= v1.9.1 =
WordPress `v4.6` and WP.org translations compatibility.

= v1.9.0 =
Fixed issue with "Include in search" option and added "Column position" setting.

= v1.8.0 =
You can now set whether you'd like the secondary title to be searchable. See plugin settings page.

= v1.7.2 =
Hotfix for `v1.7.1`.

= v1.7.1 =
Hotfix for `v1.7.0`.

= v1.7.0 =
Removed permalinks function from the front-end; new settings page layout.

= v1.6.2 =
Fixed bug occurring when clicking "Save Changes" on settings page.

= v1.6.1 =
Fixed bug occurring when clicking "Save Changes" on settings page.

= v1.6.0 =
New setting added to change the position of the secondary title column on post, pages, or custom post types overview sites.

= v1.5.6 =
Small CSS fix.

= v1.5.5 =
Urgent hotfix for `v1.5.4`.

= v1.5.4 =
The option "Automatically append to permalink" has been removed; please use "Yes, use custom permalink structure" on the plugin's settings page instead.

= v1.5.3 =
Removed unnecessary character from post screen.

= v1.5.2 =
Small bug fix for JavaScript in Firefox.

= v1.5.1 =
Hotfix for `v1.5.1`.

= v1.5.0 =
Two bugs fixed and some code cleanup.

= v1.4.0 =
Code rearrangements and added `$use_settings` parameter to `get_secondary_title()` and related functions that defines whether or not the plugin settings should be validated.

= v1.3.0 =
Fixed posts overview bug, added/updated translations.

= v1.2.0 =
Bug fixes, translation updates.

= v1.1.0 =
Fixed bug on posts overview page, new/updated translations.

= v1.0.0 =
HTML allowed in secondary title and small fixes.

= v0.9.2 =
Additional hotfix for `v0.9`.

= v0.9.1 =
Hotfix for `v0.9`.

= v0.9.0 =
Bug fixes.

= v0.8.0 =
Permalinks support, bug fixes, translation updates.

= v0.7.0 =
Major changes; restructured plugin files, added "Secondary title" column to posts/page overview and more.

= v0.6.0 =
Bug fixes, setting added, compatibility with Word Filter Plus plugin.

= v0.5.1 =
Hotfix for `v0.5`.

= v0.5.0 =
Bug fixes and some more features.

= v0.4.0 =
Bug fix and translation update.

= v0.3.0 =
HTML support and new features.

= v0.2.0 =
Major changes, screenshots, FAQ, parameters.

= v0.1.0 =
This is the first release of Secondary Title.

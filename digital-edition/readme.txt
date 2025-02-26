=== Digital Edition ===
Contributors: tshedor
Tags: journalism, multimedia, tablet, publication, package, special edition, mobile
Requires at least: 3.0
Tested up to: 3.6.1
Stable tag: 0.2.2
Donate link: http://wp.timshedor.com/plugins/digital-edition-plugin/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Making your content pretty since 2013.

== Description ==

Create an impressive collection of articles and multimedia or rebundle old content for round-up editions. Create a new edition and tag posts appropriately from the Dashboard. Posts that have a [post format](http://codex.wordpress.org/Post_Formats) are supported and recommended, but not required.

Optionally allows for three full-page advertisements (appearing between every eight content items) and three small logos (with links) at a prominent display.

* [Sample](http://wp.timshedor.com/digital-edition/sample)
* [More documentation and how-to guide](http://wp.timshedor.com/plugins/digital-edition-plugin/)
* Follow me on [Twitter](http://twitter.com/tshedor)

= Licenses =

* Custom [Font Awesome](https://github.com/FortAwesome/Font-Awesome) build licensed under [SIL OFL 1.1](http://scripts.sil.org/OFL)
* Owl Carousel licensed under the [MIT License (Expat)](https://github.com/OwlFonk/OwlCarousel/blob/master/LICENSE)
* Code licensed under [GPLv2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)

== Installation ==

1. Upload `digital-edition` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add a new digital edition and check the digital edition category at the right. Any post tagged in the checked digital edition categories will be pulled in.

== Screenshots ==

1. Mobile view with navigation
2. Regular post
3. Splash/Intro screen
4. Edit screen

== Changelog ==

= 0.2.2 =

* Hide summary, splash, intro, anchor and colophon if empty (added per user-requested feature)
* Add password protection to the whole edition per user-reported bug
* Hide password-protected posts that appear within the edition from general display and from navigation bar (can't include form because it will post password to the digital edition, not the included posts)

= 0.2.1 =

* Add anchor and colophon to menu
* Add data-page attribute to anchor and colophon to work with page history

= 0.2 =

* Replace iScroll with Owl Carousel (more stable, faster)
* Page history
* Arrow key navigation
* Removed Foundation; general CSS clean up
* Better display of full screen images
* Better HTML markup with fewer tags and more attributes (i.e. language )

= 0.1.1 =

* Add screenshots for plugin directory [thanks mac2net](http://wordpress.org/support/topic/screenshot-7)
* Remove "&copy; Copyright {YEAR} {BLOG NAME}" from short summary bubble
* Add animation to navigation panel
* Add checkbox option to push content with the navigation panel [discussion](http://wordpress.org/support/topic/awkward-visuals)
* Add some tags to the WP plugin page
* Wrap error text to prepare for localization (still to do)
* Change v0.1 tag on SVN to 0.1

= 0.1 =

* Initial
=== WPDevDesign - Oxygen - Essentials ===

Contributors: srikat
Tags: oxygen, oxygen builder, essentials, basics
Donate link: https://www.paypal.me/sridharkatakam
Requires at least: 5.1
Tested up to: 5.2.4
Stable tag: trunk
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Essential changes for sites running [Oxygen](https://oxygenbuilder.com/), a visual site builder for WordPress.

== Description ==

This plugin enables HTML5 support for elements like the search form and adds (what I consider to be) some essential CSS - for example, to make all the images responsive when using the [Oxygen](https://oxygenbuilder.com/) visual site builder.

There are no settings for the plugin. Just install and activate.

Details:

1. Enables HTML5 support for comment list, comment form, search form, gallery and caption elements.
2. Adds some CSS from [Modern CSS Reset](https://hankchizljaw.com/wrote/a-modern-css-reset/) for
    - setting a min-height of 100vh for the `body` element.
    - removing default padding, default margin and list styles on `ul` and `ol` elements that have a class set.
    - inheriting font rules for inputs and buttons.
    - removing all animations and transitions for people that prefer not to see them via [prefers-reduced-motion](https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-reduced-motion).
3. Adds CSS for
    - making all images responsive and setting their `vertical-align` to `top` so they don't take up an extra pixel space at the bottom.
    - WordPress [image alignment classes](https://codex.wordpress.org/Wrapping_Text_Around_Images). This is useful for [wrapping text around images in Oxygen](https://wpdevdesign.com/how-to-wrap-text-around-images-in-oxygen/).
    - making the [admin bar sub menu items visible when using fixed header in Oxygen](https://wpdevdesign.com/how-to-fix-wordpress-toolbar-submenu-links-issue-with-fixed-header/).
    - making `label` elements visible which Oxygen, for some strange reason, seems to set the display of to none.
    - handling screen reader text for form labels when HTML5 output is enabled (which this plugin does).
    - aligning search form's input and button side-by-side and changing header search form's input width to `auto` from 100%.

== Installation ==

=== Automatic Installation ===

Search for `oxygen essentials` from within your WordPress plugins' Add New page and install.

=== Manual Installation ===

1. Click on the `Download` button to download the plugin.
2. Upload the entire `wpdevdesign-oxygen-essentials` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the `Plugins` menu in WordPress.

== Changelog ==

= 1.0.1 - November 12, 2019 =
1. Improved the code for loading custom CSS file after Oxygen's, thanks to Emmanuel Laborin. This will fix the incompatibility with his [OxyPowerPack](https://oxypowerpack.com/) plugin.

2. Added responsive CSS for image alignment classes.

= 1.0.0 =
Initial Release.

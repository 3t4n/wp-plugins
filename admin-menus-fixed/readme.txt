=== Admin Menus Fixed ===
Contributors: spherical, ozh
Donate link: https://sphericalmagic.com/plugins/
Author URI: https://sphericalmagic.com/
Plugin URI: https://blog.imperialearth.com/wordpress/fixed-admin-menus-the-plugin-condensed/
Tags: admin, administration, bar, css, custom, dashboard, dropdown, drop down, fixed, header, menus, multisite, navigation, network, ozh, position, productivity, screen, super, spherical
Requires at least: 3.5
Tested up to: 4.9.6
Stable tag: 1.4	
License: GPLv2

Ozh' Admin Drop Down Menu + WordPress Toolbar & Admin Menu Fixed to the Top and Side of the Admin Screens. Less Scrolling!

== Description ==

### What you need, where you need it - and when. ###

**For WordPress 3.8 to 4.9+ - Backward compatibile to WordPress 3.5 (see [Other Notes](https://wordpress.org/extend/plugins/admin-menus-fixed/other_notes/))**
**Works with: [*Ozh' Admin Drop Down Menu* 3.6+](https://wordpress.org/extend/plugins/ozh-admin-drop-down-menu/) and [*AG Custom Admin* 1.2.5+](https://wordpress.org/extend/plugins/ag-custom-admin/)**

**Admin Menus Fixed Three Ways:** As a companion to ***Ozh' Admin Drop Down Menu*** AND/OR ***AG Custom Admin*** OR ***Standalone*** (WordPress 3.5-3.7)

* **New in v1.4** Now Responsive down to phone sizes. *Ozh' Admin Drop Down Menu* header background automatically changes to high contrast when displayed on smaller screens.

* **New in v1.4** *Ozh' Admin Drop Down Menu* Header Gradient now wraps when the header does; improving the look and readability!

* Consolidates the WordPress Toolbar and Ozh's menu and makes them both always readily available at the top of your window; no matter where you happen to be scrolled on a long page.

* Incorporates HoverIntent to chill the Toolbar drop-down menu hair trigger, so now you can overshoot Ozh' Menu without the Toolbar menu falsely stepping on it; causing you to move away until it closes, so that you can get to what you were going for. Way easier to work this way. Fast. Efficient.

* Automatically adjusts to the WordPress Toolbar display state; whether disabled by *Ozh' Admin Drop Down Menu* or *AG Custom Admin*.

**Standalone:** (Depreciated) The WordPress Devs have taken a page from this plugin's book, pulling the concept into core by fixed-positioning the Toolbar and Admin Menus in versions 3.8+, so the plugin code is shrinking. Kinda goes against the new direction of pulling code *out* of core and having plugins handle the function if you want/need it, but I'm glad that the concept has been adopted; because it was long overdue. The plugin is returning to its own core purpose, that of enhancing *Ozh' Admin Drop Down Menu*, and I'm OK with that. - see [Other Notes](https://wordpress.org/extend/plugins/admin-menus-fixed/other_notes/)

For the backstory and a comprehensive overview of how the plugin got its start, see the [Fixed Admin Menus - The Plugin](https://blog.imperialearth.com/wordpress/fixed-admin-menus-the-plugin-condensed/) post series.

**See What Else We Do:**

* [Blown, Cast &amp; Fused Glass and Kinetic Sculpture](https://glasssculpture.org/)
* [Space &amp; Astronomical Art | Advanced Concept Design](https://imperialearth.com/)
* [Bengal and Maine Coon Rescue](https://bengalmania.org/)

== Installation ==

= Installation as usual: =

1. Upload plugin directory to your `/wp-content/plugins/` directory.
2. Activate the plugin through the WordPress Plugins menu.
3. May be Network Activated by Multisite Network Admin (recommended if Ozh's plugin is Network Activated but it is not necessary that the activation methods match). Network Activation is required in WP 3.2+ for the plugin to work in Network Admin screens.
4. *Ozh' Admin Drop Down Menu* and/or *AG Custom Admin* not required but are really cool. You should try them out. I've used *Ozh' Admin Drop Down Menu* for years and wouldn't work without it.

= Upgrading =

* Overwrite the current `/admin-menus-fixed/` directory and all contents.

== Frequently Asked Questions ==

= How do I configure it? =

No configuration is necessary. It works all by itself.

= This is cool. How can I support your effort? =

If you'd like to help a real starving artist, please [help us buy food and medical care for our Bengal and Maine Coon rescues.](https://bengalmania.org/)

== Frequently Asked Questions ==

= When Ozh' Admin Drop Down Menu headers wrap to one or more lines, why do they cover Admin Page content at the very top? =

One size does not fit all and it's a difficult, if not impossible, task to find a sweet spot that incnveiences the least number of users.

The content partially covered is the top of the page title (Dashboard, Posts, Media, Links, Pages... etc.) This isn't a serious thing, as Ozh' menu itself indicates the page you are on; thereby rendering the page title redundant.
The "Add New" Button is redundant, as the functionality is also available in each of the Drop Downs that need that functionality.
The "Screen Options" and "Help" tabs are another matter. They provide access to functionality unobtainable by other means.

I set break points to accommodate 5 extra menu header items in addition to the 11 WordPress standard entries. I figure that there will be at least 3 plugin headers added to an average WordPress install menu. When the plugin count exceeds 5, the menu will wrap earlier.

The standard WordPress menu headers are between 4 and 10 characters long. I have seen one plugin suite that adds 10 separate menu headers that are between 11 and 17 characters long... each. That gobbles up a lot of horizontal space right quick, adding up to being *longer* than the WordPress default set. Effectively doubling the horizontal space required makes things near impossible to predict. At a browser window width where the WordPress default set would not wrap, the menu is already wrapping once and is near to wrapping a second time, but the vertical spacing hasn't changed to accommodate. The problem gets far worse at mobile screen widths; where this condition would cause Ozh' menu to wrap 10 times!

In order to have Ozh' menu wrap as needed and accurately adjust the vertical spacing of the Admin Page content for every situation out there, I'd have to sniff the sheer number of plugins installed, determine which ones add menu entries AND determine how long each of those entries are. I could increase the default break point widths to accommodate an even larger default number but, then, I'd get users wondering why there is so much blank area above the page content when the menu wraps way earlier than necessary on their install. The idea is to save space, not squander it.

**Workarounds** (Not elegant but, if it is only a sometime thing, )

1. Setting Ozh' Admin Drop Down Menu to Icons Only can solve the issue, as they are small and all the same width.
1. Drag the browser window narrower temporarily until the vertical adjustment kicks in, exposing the hidden button/tabs.

== Screenshots ==

1. **WordPress Toolbar + Ozh' Admin Drop Down Menu - Both Fixed**
2. **Ozh' Admin Drop Down Menu in MiniMode - WordPress Toolbar Disabled**
3. **WordPress Toolbar in Mobile Mode - Ozh' Admin Drop Down Menu Fully Wrapped - Both Fixed**
4. **WordPress Toolbar + Standard Menu Expanded - Both Fixed** (WordPress 3.5-3.7)
5. **WordPress Toolbar + Standard Menu Expanded | Page Scrolled** (WordPress 3.5-3.7)
6. **WordPress Toolbar + Standard Menu Collapsed - Both Fixed** (WordPress 3.5-3.7)
7. **WordPress Toolbar + Standard Menu Collapsed | Page Scrolled** (WordPress 3.5-3.7)

== Upgrade Notice ==

A new version of Admin Menus Fixed is available. This release is for WordPress 3.8+ to 4.9+, now with Responsive Design. Please [upgrade now](https://wordpress.org/extend/plugins/admin-menus-fixed/).

== Other Notes ==

**Standalone:** (WordPress 3.5-3.7)

* The WordPress Toolbar and standard Admin Menu along the left side are made fixed-position in both expanded and collapsed modes; eliminating a lot of scrolling.
* See the [Screenshots](https://wordpress.org/extend/plugins/admin-menus-fixed/screenshots/) for all of the combinations.

== Changelog ==

= 1.4 =

* Compatibility with WordPress 4.9+
* Compatibility with *Ozh' Admin Drop Down Menu* 3.6.10
* Adjusted vertical placement of *Ozh' Admin Drop Down Menu* and Admin Page content when the WordPress Responsive Admin Menu activates in tablet/mobile mode and/or *Ozh' Admin Drop Down Menu* wraps to more than one line as the page width drops below various thresholds.
* Fixed sub-menus being difficult to access when *Ozh' Admin Drop Down Menu* 3.6.10 wraps to more than one line.
* Above fixes applied back through WordPress 3.5, where applicable.

= 1.3 =

* Compatibility with WordPress 3.8 to 4.1+
* Dropped support for WordPress versions older than 3.5; 'cuz... it's time, again.

= 1.2.2 =

* Fixed standard menu flyout on Chrome browser. Updated AG Custom Admin logic.

= 1.2.1 =

* Removed compatibility with WordPress Versions older than 3.2. You should be way past that by now; 'cuz... it's time.

= 1.2 =

* Compatibility with WordPress 3.5+ and	*Ozh' Admin Drop Down Menu* and *AG Custom Admin* Toolbar Removal.

= 1.1.1 =

* Compatibility with WordPress 3.4+. Code cleanup.

= 1.1 =

* Compatibility with WordPress 3.3+. Incorporates HoverIntent on the Toolbar drop-down's hair trigger, increasing the delay for better navigation. Code rewriitten for better compatibility according to conventional practice.

= 1.0 =

* Compatibility with WordPress 3.2+. Makes the standard WordPress Admin Menu fixed-position in both expanded and collapsed modes if installed Standalone.

= 0.6 =

* Now operates Standalone; accommodating the *Ozh' Admin Drop Down Menu* being deactivated without having to deactivate Admin Menus Fixed first. This allows the compressed and fixed position attributes of the WordPress Admin Bar to be retained, so the plugin can be used with the standard WordPress Admin Menu as well.

= 0.3 =

* First public release following an encouraging suggestion made by Ozh, after he saw my hack, to develop a companion plugin. Thanks, Ozh!

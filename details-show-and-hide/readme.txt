=== Details: Show and Hide ===
Contributors:      lastsplash
Author:            Bob Matyas
Author URI:		   https://www.bobmatyas.com
Tags:              block
Requires at Least: 5.9
Tested up to:      6.3
Stable tag:        1.0.4
Requires PHP:      5.6
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

A block for showing and hiding content.

== Description ==

**Beginning with WordPress v6.3, a Details Block is included in WordPress. This plugin is no longer needed.**

The block allows you to easily show and hide content using built-in browser functionality. It doesn't load any external JavaScript and relies on native HTML functionality. You can configure the appearance using built-in editor controls.

It uses the HTML `details` element to show and hide the content.



== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-details-block` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Start adding content.

== Frequently Asked Questions ==

= How do I customize the styling? =

The wrapper `<details>` element has the class `.wp-block-bm-wp-details-container` that you can use to target it and adjust styling as needed.

The `<summary>` element has the class `.wp-block-bm-wp-details-block`. 

= Where can I learn more about browser support? =

Details is supported in most major browsers (Chrome, Firefox, and Safari). Caniuse.com has a breakdown of browser support for [the details element](https://caniuse.com/details). 


== Screenshots ==

1. Collapsed details element with clickable heading.
2. Expanded details element with inner content.
3. Editor view of adding the block and inner content.

== Changelog ==

= 1.0.4 =
* Add deprecation notice

= 1.0.3 = 
* Deploy from Github

= 1.0 =
* Initial release

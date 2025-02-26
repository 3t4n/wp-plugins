=== Herzog Dupont for YOOtheme Pro ===
Contributors: forrestkirby
Tags: YOOtheme, YOOtheme Pro, Page Builder
Requires at least: 5.4
Tested up to: 6.4
Requires PHP: 8.0
Stable tag: 1.7.0
License: GNU General Public License version 3
License URI: https://gnu.org/licenses/gpl-3.0

Herzog Dupont for YOOtheme Pro is an extension for the [YOOtheme Pro page builder](https://yootheme.com/page-builder) which adds more elements to the element library.

== Description ==
This plugin adds more elements to the element library of the YOOtheme Pro page builder.

- Toggle Element: Display a button to hide content, switch between content or change its appearance. It's based on the UIkit Toggle component with all its options.
- Progress Element: Display your stats visually in an animated progress bar with a text label. It's based on the UIkit Progress component with all its options.
- Timeline Element: Display multiple panel elements in a vertical timeline. It has all the panel and card settings and many more style and layout options.
- Counter Element: Display your stats visually in an animated circular progress counter. Choose from many style and layout options.
- Flipcard Element: Display a panel element with a flipcard animation. It flips the panel on hover or click to reveal another panel with different content on the back side.
- Image Comparison Element: Quickly compare two images with a draggable slider showing a before-after effect. Choose from many image and slider icon options.
- Slideshow Grid Element: Display multiple Slideshows within one grid. Every grid item will contain its own Slideshow including navigations, animations and other features.
- Lottie Element: Display eye-catching and engaging Lottie animations. Choose from a variety of triggers.

== Installation ==
1. Make sure the latest version of YOOtheme Pro is installed.
2. Upload & install this plugin via the WordPress Plugins screen.
3. Activate the plugin.
4. Access the YOOtheme Pro Page Builder, the custom elements should now be available. You can select which elements should or should not be loaded in YOOtheme Pro at *Settings > Herzog Dupont*.

== Screenshots ==
1. Elements in the element library
2. Plugin settings in YOOtheme Pro
3. Toggle Element
4. Progress Element
5. Timeline Element
6. Counter Element
7. Flipcard Element
8. Image Comparison Element
9. Slideshow Grid Element
10. Lottie Element

== Changelog ==

= 1.7.0 =

- added HTML element option to Flipcard and multiple items elements
- added source option to all multiple items elements
- added option to transform element type into another
- added aria label option for links across all elements
- added focal point option for image cropping across all elements
- added option to remove margin to image comparison element
- raised minimum PHP version to 8.0.0
- raised minimum YOOtheme Pro version to 4.0.0
- replace UIkit `isInView` function by UIkit `isVisible` function in counter and lottie element

= 1.6.1 =

- fixed error if percentage is empty in counter element
- fixed conditions in toggle element

= 1.6.0 =

- added animation name to lottie element
- added automatically recompile style
- added loading eager option for images across all elements
- added transition border option to timeline element
- added before/after labels to image comparison element
- improved performance for event listening in lottie element
- changed card will not flip back when a link is clicked in flipcard element
- reverted fixed centered alignment in Safari in counter element
- raised minimum YOOtheme Pro version to 3.0.0
- fixed resize canvas on viewport resize in lottie element
- fixed item container width in timeline element
- fixed rendering of grid items depending on display settings in timeline element

= 1.5.3 =

- changed use namespace to avoid conflicts with other extensions for YOOtheme Pro

= 1.5.2 =

- removed option to disable pointer events for absolute positioned builder elements

= 1.5.1 =

- raised minimum PHP version to 7.4
- raised minimum YOOtheme Pro version to 2.7.9
- fixed initialization if after image load event is not triggered in image comparison element
- fixed notice about undefined index in flipcard element

= 1.5.0 =

- added option to disable pointer events for absolute positioned builder elements

= 1.4.3 =

- fixed panel padding update path in flipcard element
- fixed missing classes on cards in flipcard element

= 1.4.2 =

* changed show style customizer panel for timeline element only if element is enabled
* fixed warning about undefined array key in timeline element

= 1.4.1 =

* replaced CSS by LESS to use breakpoints of style customizer in timeline element
* raised minimum YOOtheme Pro version to 2.7
* fixed tile style options in timeline and flipcard elements
* fixed layout update for card padding when set on items

= 1.4.0 =

* added tile style options to timeline, flipcard and slideshow grid elements
* added heading options to content style in timeline, flipcard and slideshow grid elements
* added text lead and meta options to title style in timeline, flipcard and slideshow grid elements
* fixed center content vertically if image is left/right aligned in slideshow grid element

= 1.3.1 =

* fixed animation path in lottie element

= 1.3.0 =

* added flip mode touch options to flipcard element
* added figcaption to content.php in image comparison element
* added lottie element
* fixed nav if image is skipped in slideshow grid element
* fixed initialization in Safari in image comparison element

= 1.2.1 =

* fixed initialization in throttled networks and Safari in image comparison element

= 1.2.0 =

* added link text option for items in timeline element
* added full width option for buttons across all elements
* added option to animate the element or its items
* added slideshow grid element
* added color options to progress element
* raised minimum YOOtheme Pro version to 2.5
* renamed `value` field to `start` in progress element
* removed obsolete margin classes in progress element
* fixed update script breaks builder library in timeline element
* fixed images not being clipped for round cards in timeline and flipcard elements
* fixed render empty `<div>` if content field is empty in progress element
* fixed link styles if whole panel is linked in panel based elements

= 1.1.0 =

* added flip mode options to flipcard element

= 1.0.0 =

* initial release

== Links ==

- [Demo](https://herzog-dupont.de/yootheme-pro)
- [Documentation](https://herzog-dupont.de/documentation/herzog-dupont-for-yootheme-pro)
- [YOOtheme Pro Documentation](https://yootheme.com/support/yootheme-pro/wordpress/introduction)
- [YOOtheme Support](https://yootheme.com/support)
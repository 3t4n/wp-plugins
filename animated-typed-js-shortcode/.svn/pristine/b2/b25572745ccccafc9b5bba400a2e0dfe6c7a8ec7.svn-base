=== Animated Typed JS Shortcode ===
Contributors: yongkiagustinus
Tags: Shortcode, Animation, jQuery, Typography
Donate link: https://paypal.me/yongki
Requires at least: 4.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 2.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin add shortcode to create an animated typing effect with Typed JS. No settings needed, just plug and play.

== Description ==
Create an animated typing effect with [Typed.js](https://github.com/mattboldt/typed.js) easily.

Just install and activate, **Animated Typed JS Shortcode** plugin and you can start using `[typedjs][/typedjs]` shortcode to create your animated typing text.

No settings needed just plug and play.

= How to use the shortcode? =
You can use the shortcode just like this:

**`[typedjs]My animated typing text[/typedjs]`**

To show more than 1 string/text, separate the strings with a `double colons (::)` like this:

**`[typedjs]My animated typing text::It's freaking awesome![/typedjs]`**

If you want to customize your animated text behaviour, you can use shortcode attributes to do that like this:

**`[typedjs loop=true]My animated typing text::It's freaking awesome!::It's now looping, OMG![/typedjs]`**

Here are the list of all available attributes that you can use:

* `typespeed` : The text typing speed in milliseconds (default: 50)
* `startdelay` : Delay time before typing start in milliseconds (default: 500)
* `backspeed` : Backspacing speed in milliseconds (default: 50)
* `backdelay` : Time before backspacing in milliseconds (default: 500)
* `smartbackspace` : Only backspace what doesn't match the previous string (default: true)
* `shuffle` : Shuffle the strings (default: false)
* `fadeout` : Fade out instead of backspace (default: false)
* `fadeoutdelay` : Time before fade out in milliseconds (default: 500)
* `loop` : Loop strings animation (default: false)
* `loopcount` : Amount of loops if enabled (default: Infinity)
* `showcursor` : Show/hide cursor (default: true)
* `cursorchar` : Character to be used as cursor (default: |)
* `class`: Custom class for the shortcode element (default: '')

= Optimize Javascript loading =
The `typed.min.js` is only 12KB, in the previous version I tried to load the script only when the shortcode is used, but it's not working properly because the script is loaded asynchronously. So, I decided to load the script in the footer of the page to make sure it's loaded properly.

However, if you want to load the script only on specific pages, you can use this hook to enqueue the script only on specific pages:

```php
add_action('wp_enqueue_scripts', 'my_custom_typedjs_script');
function my_custom_typedjs_script() {
    if ( ! is_page( 'my-page-slug' ) ) {
        wp_dequeue_script( 'typedjsshortcode' );
    }
}
```

This will dequeue the script on all pages except the page with the slug `my-page-slug`.


= CREDITS =
Thanks to [Matt Boldt](https://mattboldt.com/) for creating this cool library [Typed.js](https://github.com/mattboldt/typed.js)!

== Installation ==
1. Upload "animated-typed-js-shortcode" folder to the "/wp-content/plugins/" directory.
1. Activate the plugin through the "Plugins" menu in WordPress.

== Frequently Asked Questions ==
= How do i get support? =
You can get support by going to Support section of this plugin page

== Upgrade Notice ==
Keep your plugin up to date to get the latest features & the best performance

== Changelog ==

= 2.1 =

Release date: July 27th, 2024

* WordPress 6.6 compatibility check
* Add validation and condition to prevent XSS injection on the shortcode attributes

= 2.0 =

Release date: August 12th, 2023

* WordPress 6.3 compatibility check
* Add attribute `class` to add custom class to the shortcode element

= 1.1 =

Release date: July 22nd, 2021

* WordPress 5.8 compatibility check

= 1.0 =

Release date: March 23rd, 2020

* Initial release.
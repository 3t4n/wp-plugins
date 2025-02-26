=== Easy Quotes ===
Contributors: juergen74
Donate link: https://www.paypal.com/donate?hosted_button_id=SQH5ZTLK3RY7Q
Tags: Quotes, Random, Daily, Testimonials, Lyrics
Requires at least: 6.1
Tested up to: 6.7
Stable tag: 1.2.3
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Collect and show your favorite Quotes / Reviews / Testimonials or any other short snippet of Text.

== Description ==

Easy Quotes let you collect and display your favorite Quotes / Reviews / Testimonials or any other short snippet of Text you want to present on your site.

Main Features:

* Custom Post Type "Quotes" with Quick Edit and Bulk Actions
* Add Custom Meta: Author, Date and Rating with Stars
* Gutenberg Block "Easy Quotes" to present your Collection all over your Site. (Block-Widget/Pages/Posts etc.)
* Show Random or Daily "Quotes" by Category or choose a Specific Quote.
* Option to rotate Quotes by Category
* Option to show Quotes as a List by Category
* Use Google Fonts and other typographic features to style your Quote.
* Built to blend into any style, but customizable with CSS to fit your needs.

## Try my new Plugin
[Easy Slider](https://wordpress.org/plugins/easy-slider2/)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/easy-quotes` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress


== Frequently Asked Questions ==

= Widget: How to make the Quote Title look like a standard Heading in my Widget Area? =

If you are using the Easy-Quotes Block as a Widget, try to find out what Header Tag your Theme uses as Widget Title. Usually this should be "h2" or "h3". In your Widget Block Settings "Title" you can then set that value.
Same for the CSS-Class. Under your Easy-Quotes Block Settings "Advanced" you can enter that classname under "Title CSS class(es)".

= Google Fonts: Are the Google Fonts hostet by google or local on your site? =

Both: While you're at the backend of your site, and trying out different Fonts, they'll get loaded from an external google location.
When you've found a font that pleases you, and your quote is viewed for the first time on the frontend, the font gets automatically downloaded to a local folder.
From this time on, only the local font is in use.

= Daily Quotes: How to link a quote to a specific day? =

Just change the "Published"-Date of your quote to this time. The quote will then be shown every year at that day. The year won't matter.
(So if you publish a quote on e.g.: 2020-02-29, the quote will pop up every 4 years in a leap year.)
If there is no Quote associated with a day, the most recently published one is displayed.

= Random or Daily Quote won't update =

This should be a Cache Problem. If you're using a Cache Plugin your site gets cached and can't show dynamic content.
You have to switch off your Cache Plugin or try the experimental feature "Avoid caching" in your Easy-Quote Block-Settings. (This will fetch the dynamic content through the REST-API and leaves your Cache intact.)

== Screenshots ==

1. True! :)
2. Custom Post Type "Quotes".
3. Adding a new Quote.
4. Choose "Easy Quotes" Block at the Gutenberg Block Editor.
5. Customize your Quote.
6. Hello Quote! :)


== Changelog ==

= 1.2.3 =
* Fixed vulnerability

= 1.2.2 =
* Minor Changes

= 1.2.1 =
* Minor Changes

= 1.2.0 =
* Added option "Random Viewing Order" for rotation mode
* Minor Bugfixes

= 1.1.1 =
* Added experimental feature: Avoid Cache for Random and Daily Quotes
* Minor Bugfixes

= 1.1.0 =
* Added new feature: Daily-Quote
* Minor Bugfixes

= 1.0.8 =
* Minor Bugfix

= 1.0.7 =
* Minor Bugfix

= 1.0.6 =
* Minor Bugfix

= 1.0.5 =
* Added new feature: List

= 1.0.4 =
* Minor Bugfixes

= 1.0.3 =
* Added new feature: Rotation
* Bugfixes

= 1.0.2 =
* Added new feature: Typography settings (Google Fonts, fontSize, lineHeight)
* Multiple optimizations

= 1.0.1 =
* Block preview
* Block renders faster in edit mode (implemented Javascript/React render)
* Optimized block widget integration
* Proper rendering html used in a quote
* Animation triggered when element enters the viewport
* Diverse optimizations

= 1.0.0 =
* Initial version.

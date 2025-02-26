=== Auto Currency Converter ===
Contributors: akky
Version 1.2.2
Tags: currency, money, exchange, Japan, yen, Japanese, USA, dollar, JPY, USD
Home: http://wordpress.org/extend/plugins/auto-currency-converter
Support: @akky
Requires at least: 4.0.0
Tested up to: 5.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The plugin automatically adds a price in the second currency. US dollars-Japanese Yen are currently supported. (more currencies are being planned)

===================================================================

== Description ==

When money notations appear in your posts/page text, this plugin detects and adds the converted amount in foreign currency.

For now, this plugin only works between Japanese Yen and US dollars, in English and Japanese.

For example, sentence like "It costs $350." would be "It costs $350(32,854 Japanese yen)."

The conversion is looking up the latest foreign exchange rates.

For bloggers who already did such conversion manually, the plugin has an option to set a date only after when the conversion works.

== Frequently Asked Questions ==

= Some numbers are not detected. What are limitations? =

 - number in text are not detected. For example,
   - twenty dollars
   - few thousand dollars
   - a couple of dollars
 - numbers bigger than billion are not handled
 - billion/trillion are in US style, not UK style (because it can not be supported both notations simultaneously)

= What if I do not want to display auto-converted prices in a specific post? =

 You may suppress the conversion by giving "acc_disable" tag on the post.

= Are USD/JPY rate correct? How much is it up-to-date? =

 It uses free currency converter API. However, when the API is down, this plugin uses direct value (110 yen / 1 dollar). This behaviour was changed at the version 1.2.2, I think it might be better than showing nothing converted.

= How are Japanese zenkaku(full-width) digits handled? =

 All Japanese zenkaku digits are converted, then checked and filtered. Because of that, all digits in the text, even though they are not money related, will be converted with regular ASCII digits.

== Installation ==

This section describes how to install the plugin and get it working.

1. Download the plug-in file, extract under your WordPress plugin folder.
2. Log into your Wordpress admin panel.
3. Go to Plug-ins and Activate the "Auto Currency Converter"

== Screenshots ==

== Changelog ==

= 1.2.2 =
* 1.2.1 had a bug so not working properly.

= 1.2.1 =
* use a direct value 110 yen/dollar when currency API is down or unavaiable. To let it keep running on

= 1.2.0 =
* fix a bug with the new API. Japanese conversion was badly done on version 1.1.8/1.1.9
* tested with the latest WordPress version 4.9.6

= 1.1.9 =
* fix build proceasure

= 1.1.8 =
* changed currency API to call, as the former API started asking registration and API key
* removed old version support, WordPress 3.x
* removed old version support, PHP 5.3

= 1.1.7 =
* fixed translation code not use constant, to enable [user translation](https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/)
* fixed a bug that $2000 was recognized as $200 and 0, when 4 digits written after dollar/yen mark.

= 1.1.6 =
* changed to call fixer.io API, as Yahoo finance API had stopped around November 1st
* added translation text-domain info in plugin header

= 1.1.5 =
* remove php-intl polyfil, which supports better localized currency notations even without php_intl extension. As the polyfil library is too large to deliver and useless if the user set up php_intl extension correctly.
* tested with the latest WordPress version 4.8.3

= 1.1.4 =
* fixed warning "A non-numeric value encountered" with PHP7.1 or later
* tested with the latest WordPress version 4.8.2

= 1.1.3 =
* tested with the latest WordPress version 4.6.1
* emphasize caution to user who runs her PHP without php-intl extension. enabling php-intl will make the pluging much much faster

= 1.1.2 =
* when the converted dollar is less than $1, it now displays like '$0.xx' instead of '$0'.
* added missing Japanese translations.

= 1.1.1 =
* 1.1.0 missed libraries for specific env.

= 1.1.0 =
* removed php_intl extension check
* even if php_intl extension is off, it works with the symfony/intl compatible library. Performance-wise, php_intl is better to be turned on. And it only supports English locale.

= 1.0.9 =
* added a feature to disable conversion on specific post with 'acc_disable' tag

= 1.0.8 =
* fixed a new bug at 1.0.7

= 1.0.7 =
* checked with the latest WordPress 4.4.2

= 1.0.6 =
* checked with the latest WordPress 4.4.1

= 1.0.5 =
* updated Composer autoloader to avoid collision with other plugins using later version of Composer

= 1.0.4 =
* make it work even allow_url_fopen is off.
* fixed - not caching the rates when data-fetching failed.

= 1.0.3 =
* stop trying to convert money in title. only money in body are processed.

= 1.0.2 =
* make the default cache period to one month, to avoid too much updates on feed

= 1.0.1 =
* changed to skip gracefully in case exchange rate are unavailable

= 1.0.0 =
* initial release

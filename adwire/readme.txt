=== Adwire ===
Contributors: adwire
Donate link: https://www.adwire.dev/donation
Tags: adwire, youtube, embed, monetization, preroll, vast, vmap, vpaid, simid
Requires at least: 5.0
Tested up to: 5.9.0
Stable tag: 0.3.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

An easy way to monetize embedded YouTube videos on your website.

== Description ==

An easy way to monetize embedded YouTube videos on your website.

Adwire temporarily removes YouTube iframe embed and replaces it with linear video advertisement according supplied AdTag. When linear video advertisement is finished, YouTube iframe embed is restored and automatically played for seamless user experience.

Adwire uses third-party service for handling advertisements - [Google IMA SDK](https://developers.google.com/interactive-media-ads), therefore you are obliged to read and agree with:

* [Adwire terms of service](https://www.adwire.dev/terms),
* [Google IMA SDK terms of service](https://developers.google.com/interactive-media-ads/docs/sdks/html5/client-side/terms),
* [YouTube terms of service](https://www.youtube.com/t/terms),
* [YouTube API terms of service](https://developers.google.com/youtube/terms/api-services-terms-of-service).

To be able to use Adwire, you will need to grant required consents on Adwire plugin settings page.

== Frequently Asked Questions ==

= Adwire plugin is not working =

* Adwire plugin works only with iframe embed code from YouTube. If you are using other plugins, which might alter or replace this code, Adwire plugin might not work.
* Google IMA SDK might not work correctly without user consent with cookies. You can temporarily override it in Adwire plugin settings (for testing purposes only).

= Adwire plugin stopped working =

* Adwire plugin is still in development stage. Please try to update Adwire plugin to latest version and try to re-save Adwire plugin settings to see if there are any errors.

= Where to get AdTag URL =

* You can get it from your ad network/provider, e.g. [AdSense for video (AFV)](https://support.google.com/adsense/answer/6054303) or create your own according to [VAST](https://iabtechlab.com/standards/vast/) or other supported format documentation.

== Screenshots ==

1. Admin page - tab 1.
2. Admin page - tab 2.
3. Admin page - tab 3.
4. Admin page - tab 4.
5. Admin page - tab 5.
6. Admin page - tab 6.

== Changelog ==

= 0.3.0 =
* Refactored cookie consent.
* Tested compatibility with PHP 8.1 and WordPress 5.9-RC4.

= 0.2.1 =
* Minor code refactoring.
* Updated readme.

= 0.2.0 =
* Refactored settings page.
* Added outstream ads.
* Reflected changes from Adwire service.

= 0.1.5 =
* Added exception for case of missing required variable.
* Updated readme.

= 0.1.4 =
* Minor code refactoring.
* Updated readme.

= 0.1.3 =
* Split combined YouTube consent into separate consents.
* Updated readme.

= 0.1.2 =
* Reflected changes from Adwire service.
* Updated readme.

= 0.1.1 =
* Added YouTube API terms of service consent.
* Tested compatibility with PHP 7.4 and WordPress 5.0.
* Updated readme.

= 0.1.0 =
* Initial release.

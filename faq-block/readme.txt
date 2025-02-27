=== FAQ Block ===
Contributors: TigrouMeow
Tags: gutenberg, faq, block, question, answer
Donate link: https://meowapps.com/donation/
Requires at least: 6.0
Tested up to: 6.5
Stable tag: 1.0.8

Very simple and clean Gutenberg Block for FAQ (Frequently Asked Questions).

== Description ==

FAQ Block is a block for Gutenberg. With it, you will be able to create a Frequently Asked Questions page on your website very easily. Simply add a block for each question and you are done.

== CSS only! ==
There is no Javascript, it's fully in CSS. It's very easy to customize it for your theme, and super light.

== Known issues ==
I am not sure if it's currently a bug in Gutenberg: this block requires an input in the generated HTML but for some reason, Gutenberg removes it from the DOM while saving. This issue only happens for author/editors, but not for admins (which is even more weird).

== Installation ==

1. Upload `faq-block` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Upgrade Notice ==

Replace all the files. Nothing else to do.

== Frequently Asked Questions ==

Nothing yet.

== Changelog ==

= 1.0.8 =
* Add: FAQPage for Google Snippet. However, since this plugin uses a pure block element, we can't analyze all the FAQ blocks and create a single FAQPage, for that we would need to create a FAQ Container Block. Let's see if we can do that in the future.

= 1.0.7 =
* Compatibility with WP 6.0.

= 1.0.6 =
* Compatibility with WP 5.9.

= 1.0.5 =
* Compatibility with WP 5.8.

= 1.0.4 =
* Fix: Compatibility with future version of Gutenberg.

= 1.0.2 =
* Fix: There was an issue with WP 5.

= 1.0.0 =
* Update: WordPress 5.0.

= 0.0.2 =
* Fix: Maximum height for an answer was limited.

= 0.0.1 =
* First release.

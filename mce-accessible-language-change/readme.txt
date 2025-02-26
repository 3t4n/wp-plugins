=== MCE Accessible Language Change ===
Contributors: sprungmarker
Tags: accessibility, accessible, buttons, editor, language, language change, language code, hreflang, lang, rich text editor, TinyMCE, wysiwyg, WCAG, WCAG 2, BITV, a11y,
Donate link: http://sprungmarker.de
Requires at least: 3.9
Tested up to: 4.8
Stable tag: trunk
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Adds language change button in the WordPress WYSIWYG editor. (WCAG, BITV)

== Description ==
Adds language change button in the WordPress WYSIWYG editor. (WCAG, BITV)

A very light weight plug-in for inserting language change. The button will
be added in the first row of the editor.

Just highlight the word or phrase or insert the cursor in the text, then click on the language button.
Fill out the form:

* Add the appropriate language code for the phrase or text (e.g. 'fr' for a french word or phrase)
* Only for links: Add the appropriate language code for the link target (e.g. 'fr' for a french word or phrase)
* If you want to delete lang attributes, activate the checkbox. But you can just empty the language code field.

Click "OK" and you get the the following:

* If you just inserted the cursor in the text, you get a lang attribute for the parent element.
* If you highlight a word or phrase, you get a span element with lang attribute surrounding the selected text.
* For links you get a lang attribute and in case a href lang attribute.

The plugin is localized for:

* english
* german
* spanish
* french
* italian


Please let me know if you would like additional localizations added. And of course if you want to improve included translations (developer @ sprungmarker.de)

**Note**

If your WP Version is **under 3.9** you have to download plugin version **1.2.** in [downloads](http://wordpress.org/plugins/mce-accessible-language-change/download/).
Version 1.2. does not work properly in IE.

== Installation ==
1. Upload `mce-accessible-language-change` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. To show your language change in a visual way in the editor - not on your website:

   You have to do nothing - the file in css > changelang.css will do everything for you.

   If you can not see any visual change, you probably have a file named editor-styles.css in your WordPress theme.
   If you have already an file named editor-style.css in your theme, you have to copy the styles below into your editor-styles.css to get your language changes visible in the editor.

CSS styles to add:

`[lang] {
     background: #f8f8f8;
     border: 1px solid #d2d0ce;
     padding: 2px;
 }

 a[hreflang] {
     background: #f8f8f8;
     border: 1px solid #d2d0ce;
     border-right: 5px solid #BF8EC8;
     padding: 2px;
     color: #9C2E16;
 }
 `

== Frequently Asked Questions ==
= No questions right now =

== Screenshots ==

1. The editor with the new button for language change.
2. The editor popup showing language change options.
3. The editor with selected text and lang attribute marked with CSS (visual / text mode).

== Changelog ==
=2.1=

* IE fix editor CSS

=2.0=

* Completely rewritten for TinyMCE 4.

=1.2=

* Small fix for new version of TinyMCE.

=1.1=

* Path corrections for TinyMCE.

=1.0=

* First release
* Minor changes renaming files according to the name of zip file.


== Upgrade Notice ==

= 2.1 =
If your are using IE, you should upgrade.

= 2.0 =
Plugin is rewritten and completely adapted to TinyMCE 4 - Upgrade for WP 3.9 and above.

= 1.2 =
Plugin was not working in TinyMCE 4 anymore - Upgrade immediately.

= 1.1 =
This was a path fix - you should upgrade.
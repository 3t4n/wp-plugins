=== Lumeer Embed ===
Contributors: mvecera
Tags: embed, post, page, excerpt, content, title, featured image, embed post
Requires at least: 2.6
Tested up to: 6.2.2
Stable tag: 1.0.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Embed a Lumeer project within any Post or Page using [lumeer_embed] shortcode.

== Description ==
Embed a public Lumeer project within a Post or Page. Use the shortcode `[lumeer_embed code="organization/project/view" show_panel="true" lang="en"]`.

The embed creates a `div` with an `iframe` in it. There is no technical way to avoid the `iframe` for embedding Lumeer. The `div` will occupy all available space. Create a surrounding `div` with specific dimensions. If you only see a logo and a thin horizontal line, try specifying a specific height of your surrounding `div`.

=== How to get the shortcode? ===

In your project in [Lumeer](https://get.lumeer.io/en/) go to the project settings page (click on the project code in the top left corner, right after the > sign, click on the Configure button). There select the Template tab, switch on public access to the project, and scroll down to get the shortcode.

=== 3rd Party Dependency ===

This plugin relies on a 3rd party service [Lumeer](https://www.lumeer.io/) to work properly. The service is provided free of charge, no account nor credit card is required, no guarantees are provided. 
You can read more details in [Lumeer's Terms of Service](https://www.lumeer.io/terms-of-service).

== Installation ==
1. Upload `lumeer-embed` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `[lumeer_embed code="..." show_panel="true" lang="en"]` in posts or pages where `code` is a string of form "organization/project/view" that can be obtained in your project settings in Lumeer.
4. The `show_panel` property is a boolean determining the visibility of the application top control panel (defaults to `false`).
5. The `lang` property determines the embedded UI language. English (en) is the default one. Currently available options are: en (English), cs (Czech).

== Frequently Asked Questions ==

Q. Can I embed a non-public project?
A. No, this plugin only embeds public projects.

Q. What will happen if I do not specify `code`?
A. Nothing will happen if you do not specify `code` in Shortcode.

Q. What will happen if I do not specify `show_panel`?
A. By default, `show_panel` is set to false and the top control panel won't be visible in your embed.

Q. The embed show only a thin horizontal line, how to fix that?
A. Add a `div` around the Shortcode and set a specific height of this element.

Q. What are available languages of the embedded UI? Can more be added?
A. The available languages currently are: en (English), cs (Czech). The language of the embedded application UI is not stored in this plugin. Thus adding more UI languages is a non-trivial task. Try contacting the application team at https://www.lumeer.io/contact/.

== Screenshots ==

1. Lumeer embedded in a WordPress page showing the Kanban Board view
2. Lumeer embedded in a WordPress page showing the Calendar view
3. Plugin's shortcode in the WordPress block editor
4. WordPress shortcode generated in the project settings in Lumeer

== Changelog ==

= 1.0 =
* First Release
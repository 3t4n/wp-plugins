=== Add Signature (Reloaded) ===
Contributors: markvp
Donate link: http://www.dagondesign.com/donate/
Tags: post, page, signature
Requires at least: 3.3
Tested up to: 3.5
Stable tag: stable
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a custom signature to the very end of the post automagically.

== Description ==

Adds a custom signature to the very end of the post automagically. Compared with original plugin by Dagon Design, it allows using also the Permalink, so that the sig can include the URL of the post. Useful when posts are replicated in news aggregation to direct visitors to the original site.

== Installation ==

1. Upload `add-sign.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Options->MVP Add Signature to customise.
4. Save Options and try to display a post.

== Frequently asked questions ==

Q: Can I insert images in signature?
A: Yes, you can, by uploading images (or any legal HTML content, e.g. a piece of Flash) into your Wordpress installation's file structure, e.g. /upload/images. Then, display the image (or other content) by using standard HTML instructions.

Q: Can I style the signature, e.g. italic, bold, etc.?
A: Yes, you can, by using inline CSS instructions e.g. paragraph, divs, tables, color, font, headers, etc. Just remember that values like the Permalink or other values included in the plugin's architecture must be included in the form %VARIABLE%, as stated in the Admin page.

Q: Do I have to modify my template?
A: No. If you use the main signature only (the 1st in the list) you can let the plugin add it automagically without even modifying a byte in your posts. If you want to CHOOSE and use a specific signature, then you have to trigger them by inserting a special comment in your post source in place of the signature (<!– ddsig1 –> for the 1st signature, <!– ddsig2 –> for the 2nd, and so on).

Q: Some more explanations?
A: You can find an italian language blog page explaining everything [here](http://nibble.it/?p=8848). Should you need a translation, I've checked and Google Translate offers a decent translation, no so smooth but clear enough for an english mother tongue to understand.

== Screenshots ==
See it in action on [The New Blog Times](http://nbtimes.it) and [NIBBLE](http://nibble.it)


== Changelog ==

v1.0: first release, based on version 1.32 of the original plugin.

== Upgrade notice ==

No upgrades are required unless Wordpress changes vital system calls. Will not bother you with plugin upgrades.
Please remember that this plugin's original work is by Dagon Design (http://www.dagondesign.com/articles/add-signature-plugin-for-wordpress/). Please thank them, not me, for this work. I just added a mere additional option, and my personal work added to this plugin is totally freeware.
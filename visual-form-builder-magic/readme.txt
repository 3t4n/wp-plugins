=== Plugin Name ===
Contributors: jrevillini
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QBHP7AUYRQ5S2
Tags: visual form builder, email
Requires at least: 3.5.1
Tested up to: 3.5.1
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is an add-on plugin which adds some magic to the wonderful Visual Form Builder (non-pro) plugin.

== Description ==

This is an add-on plugin which adds some magic to the wonderful Visual Form Builder (non-pro) plugin. You must have Visual Form Builder installed for this to do anything. Compatible with VFB 2.7.1 and up.

[Visual Form Builder Magic Plugin Page](http://james.revillini.com/visual-form-builder-magic/)

= Features =

*   Add the class send-to to any email form input and the submitted information will also get sent to those email addresses.

== Installation ==

1. Install the plugin from your wordpress plugin manager or upload the plugin ZIP file to the plugin manager.
1. Activate the plugin.
1. On any Visual Form Builder form, you can now add the class "send-to" to any field's CSS Classes and this plugin will submit the form information to that email as well.

== Frequently Asked Questions ==

= Ask something. =

I will answer you.

== Screenshots ==

1. Add the "send-to" class to the CSS Classes field to cause emails to get sent there as well.

== Changelog ==

= 1.0.4 =
* BUGFIX bad SQL in SELECT on fields with send-to class

= 1.0.3 =
* Nothing really. Just getting version numbers in sync. It was actually a needless commit. I could have done it in the tag, in retrospect.

= 1.0.2 =
* Removed hard-coded switch case for form_id. It was totally unnecessary. Thanks Matthew Muro.

= 1.0.1 = 
* fixed bug in readme

= 1.0 =
* Initial release which supports mutlitple email recipients based on form input
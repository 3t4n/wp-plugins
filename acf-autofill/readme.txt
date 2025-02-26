=== ACF Autofill ===
Contributors: tomjdevisser
Tags: acf, testing, dummy content, posts, pages
Requires at least: 4.9.0
Tested up to: 6.0
Requires PHP: 5.6.0
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A very lightweight WordPress plugin autofills ACF fields for quicker building and testing.

== Description ==
= What does it do? =
ACF Autofill is a handy tool to autofill your ACF fields when building or testing a website.

= How does it work? =
**Fallback images**
The first step when activating the plugin, is uploading some fallback images in ACFA settings.

**Field name checks**
ACFA does two checks when filling a field. First it checks the field type, e.g. repeater or text. Then it looks at your fieldname. If it recognizes the fieldname, it fills in an appropriate value. Otherwise it just uses a random fallback.

**Early Access**
The plugin is still in early access, and not all ACF fields are autofillable yet. I'm still working on this, so please keep that in mind when leaving reviews. Positive reviews might push me to finish the plugin sooner. ;-)

**What to expect**
Some features I will likely add in the future, let me know which ones you'd want first:
- "Kill my site" mode, to test longer words and content
- "Generate kitchensink" button, to fill one page with all available flexible layouts
- Custom data, a way to upload or fill in custom data and link it to custom fieldnames
- Autofill the other field types
- Exclude fields option

== Screenshots ==
1. Some autofilled fields based on the fieldnames

== Changelog ==
= 0.1.0 =
* Decided to give you early access, as I think the plugin might already be of use
* Autofillable fields: flexible content, image, (external) link, radio, repeater, text, textarea, wysiwyg
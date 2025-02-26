=== Advanced Custom Fields: Real Media Library Folder Field ===
Contributors: devowl, mguenter, jondennis
Tags: advanced custom fields, real media library, folder field, acf, media library folders
Stable tag: trunk
Requires at least: 4.0
Tested up to: 5.4
License: GPLv2

Media library folder field for Advanced Custom Fields (ACF). Folder created by Real Media Library.

== Description ==

The plugin adds a custom field to select a folder of the [Real Media Library](https://devowl.io/wordpress-real-media-library/) in a field group of Advanced Custom Fields (ACF).

You can configure this field type with the following parameters:

* Disable selection: Allows you to disable some folder types for selection (for example, no collections).
* Return format: Get Real Media Library folder object or folder ID.

== Requirements =

This plugin is an add-on that allows you to use the following plugins together, which must be installed:

- [Advanced Custom Fields (ACF)](https://wordpress.org/plugins/advanced-custom-fields/) (Free or PRO, version 4.x or 5.x)
- [Real Media Library](https://devowl.io/go/codecanyon/real-media-library?source=acf-rml-folder-field-wordpress-org)

Thanks to [Jon Dennis](http://www.theimageyard.co.uk/) who started the development of this add-on.

*This plugin is a free micro add-on for Real Media Library with limited support.*

== Installation ==

1. Go to your WordPress backend
2. Navigate to "Plugins" > "Add New"
3. Search for "Advanced Custom Fields (ACF): Real Media Library Folder Field"
4. Install and activate the plugin
5. Install [Advanced Custom Fields (ACF)](https://wordpress.org/plugins/advanced-custom-fields/)
6. Install [Real Media Library from devowl.io](https://devowl.io/go/codecanyon/real-media-library?source=acf-rml-folder-field-wordpress-org)
7. Create a field group in your Advanced Custom Fields!

== Changelog ==

= 1.1.4 =
* Fixed bug with Real Media Library 4.7.6

= 1.1.3 =
* Fixed bug with "Disable selection" (PHP warnings were generated)

= 1.1.2 =
* Fixed bug with CSS/JS resources
* Fixed bug with taxonomy field and RML field

= 1.1.1 =
* Improved the select boxes (better UX)

= 1.1.0 =
* Added option to select multiple folders
* Added compatibility for ACF 4

= 1.0.0 =
* Initial Release.

=== Media Auto Hash Rename ===
Contributors: Sparanoid
Donate link: https://sparanoid.com/donate/
Tags: admin, administration, media, file, files, rename, renaming
Requires at least: 4.0
Tested up to: 5.8
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Rename media filename during upload with unique hash.

== Description ==

Media Auto Hash Rename will rename any file (specific files can be ignored by file extension) during upload, with unique, low collision hashes. Hash characters and length can be configured for even lower collision rate.

More information please visit my [site](https://sparanoid.com/work/media-auto-hash-rename/).

This plugin provides no configuration GUI to make it more easier to maintain with the future WordPress updates.

Currently there're 3 constants you can configure in your `wp-config.php`, I recommend WP-CLI for maintaining these constants.

- `MAHR_LENGTH`: length of the random hashes, (default to `8`), longer can help reduce collision. Hashes at the length of 8 can be collision-free at the scale of 50,000 images).
- `MAHR_CHARS`: Characters used in hashes, default to `0123456789abcdefghijklmnopqrstuvwxyz_`, You can add more characters like uppercased alphabelts to dramatically reduce the collision without increasing the length of your filenames. But please note that this option can be dangerous if you're not familer with general URI encoding. So if you don't know what characters are allowed in a filename, just keep it untouched and use the default option.
- `MAHR_IGNORE`: File extensions to be ignored, default to `pdf, zip`, you can define a comma delimited list of file extensions to bypass renaming process of this plugin. All files that has the file extension you defined in the list will be ignored. Please note that:
  - File extensions must be defined without the leading peroid, for example: `'pdf, 7z, bmp'` works, `'.pdf, .7z, .bmp'` does not.
  - With (`'pdf, zip'`) or without (`'pdf,zip'`) space both work.
  - If you define your own ignore list, default ignore list will be discarded. For example, if you define `'7z'`, then `'pdf, zip'` will be processed during upload. You need to reapply these extensions with your own: `'7z, pdf, zip'`.
  - If you don't need to ignore any files by its extension. define an empty array `[]` (without quotes) to this option: `define( 'MAR_IGNORE', [] );` to force process PDF and ZIP files.

== Installation ==

WordPress (Also works on multisite enabled instance):

1. Upload the extracted files to the `/wp-content/plugins/` directory, or just install this plugin from your WordPress backend.
2. In 'Plugins' page, choose 'Activate'

== Frequently Asked Questions ==

= What if I deactivate this plugin? =

This pluigin, doesn't not write any extra data into your database. The files renamed by this plugin will still work after you deactivate this plugin.

== Screenshots ==

1. What filenames look like after renaming.

== Upgrade Notice ==

= 1.0.1 =
* Compatibility check for 5.8, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.0 =
* First release

== Changelog ==

= 1.0.1 =
* Compatibility check for 5.8, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.0 =
* First release

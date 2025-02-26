=== Get Filesize Shortcode ===
Contributors: ikaring
Tags: shortcode, filesize, pdf
Requires at least: 5.8
Tested up to: 6.4.2
Stable tag: trunk
Requires PHP: 5.6
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

"Get Filesize Shortcode" is a simple shortcode to get filesize of a file( eg. PDF, JPG, PNG ... ).

== Description ==

"Get Filesize Shortcode" is a simple shortcode to get filesize of a file( eg. PDF, JPG, PNG ... ) with a human readable format, using the largest unit the bytes will fit into.
Now added Get filesize block to display file link with file size.

#### Usage

Put `[filesize]http://yoursite.com/path/to/file.pdf[/filesize]` anywhere in a post.

Or you can use url attr instead. `[filesize url='http://yoursite.com/path/to/file.pdf']`

Also you can place `<?php echo do_shortcode('[filesize]http://yoursite.com/path/to/file.pdf[/filesize]'); ?>` in your templates.

As to "Get filesize" block, search 'get filesize' in Text block category and insert it.
Set file title and file url, and it generates a text link to the file with file size afterwards.
You can toggle Preview/Edit by clicking Preview/Edit button in toolbar of the block.

#### Note

*   File must be in your server
*   With files larger than 2MB, it might return different number due to the spec of filesize function of PHP.

== Installation ==

1. Upload `get-filesize-shortcode` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

None yet.

== Screenshots ==

None.

== Upgrade Notice ==

None.

== Changelog ==

= 1.2.0 =
* 2023-12-21
* Add support for Get filesize block

= 1.0.10 =
* 2019-08-07
* Update readme.txt

= 1.0.8 =
* 2018-08-16
* Update readme.txt, remove 'Donate link'

= 1.0.4 =
* 2018-08-08
* Update readme.txt

= 1.0.3 =
* minor bug fix

= 1.0.2 =
* 2018-08-08
* Support url attribute

= 1.0 =

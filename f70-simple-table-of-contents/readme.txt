=== F70 Simple Table of Contents ===
Contributors: niao70
Donate link: https://factory70.com/simple-table-of-contents#donate
Tags: table of contents, toc, navigation, links, indexes
Requires at least: 5.0
Tested up to: 6.6
Stable tag: 1.2.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display a table of contents in your posts by automatically generated from the headings. No Javascript code, simple to use.

== Description ==

This plugin display a table of contents at "Read More" block in your post. It is automatically created from the post headings (H2, H3).

This plugin does not have any javascript features such as smooth scrolling or folding. So if you mind about page speed or plugins confliction, you will love this.

You can set 2 settings each post.

* Display the table of contents (defalut = OFF)
* Heading levels included in the table of contents (default = H2 only, or H2 + H3)

= Notice =

* This plugin works if you use H2 ( and H3 and lesser ) headings in your posts.
* Headings hierarchy must be preserved. For example, H3 not after H2 does not appear in the table of contents.


== Installation ==

1. Navigate to Plugins > Add New page in your admin page then search "**F70 Simple Table of Contents**". Click the "Install Now" link.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to the edit page of the article you want to display the table of contents. In "Document" side area, there is a Table of contents panel at the bottom. Check "Display the table of contents".
4. If you want to include in the table of contents H3 too, select "H2 + H3".
5. Insert a "Read More" block into your article and save it. The table of contents appear in that position.


== Edit Appearance ==

To edit the appearance of the table of contents, write CSS. You can use "Customize > Additional CSS" or theme style sheets.

For example

Turn the box background a pale blue : 

	#f70stoc.table-of-contents{
		background-color: #effcff;
	}

Remove list marker :

	#f70stoc.table-of-contents ol{
		list-style-type: none;
	}

Increase the space between the border and the text :

	#f70stoc.table-of-contents ol li{
		padding: 1em 0;
	}


== Frequently Asked Questions == 

= How can I remove 1,2,3.. and a,b,c.. in the table of contents? =

Write CSS. See above code sample.


== Screenshots ==

1. Check "Display the table of contents" and insert a "Read More" block into your post and save it.
2. Display sample ( H2 Only )
3. Display sample ( H2 + H3 )
4. Display sample ( H2 Only, other site )
5. This plugin works if you use H2 headings in your posts.
6. Removed list marker and the box background a pale blue

== Upgrade Notice ==

= 1.1 =
List styles has changed. Please check your custom CSS for F70STOC.


== Changelog ==

= 1.2.3 =
* Tested up to WP 6.6.

= 1.2.2 =
* Tested up to WP 6.4.

= 1.2.1 =
* Tested up to WP 6.3.

= 1.2 =
* Fix a bug. There was a problem anchors didn't add if the post didn't have wp-block-heading class.

= 1.1.4 =
* Tested up to WP 6.2.

= 1.1.3 =
* Tested up to WP 6.0.1.

= 1.1.2 =
* Tested up to WP 5.9.

= 1.1.1 =
* Tested up to WP 5.8.

= 1.1 =
* Added support for paginated posts.
* Fix styles.

= 1.0.5 =
* Fix styles.

= 1.0.4 =
* Tested up to WP 5.7.
* Changed the condition to display the meta box. If the post type don't have editor then the meta box will disappear.

= 1.0.3 =
* Tested up to WP 5.6.

= 1.0.2 =
* Tested up to WP 5.5.

= 1.0.1 =
* Changed the way to internationalize.

= 1.0 =
* Initial release.


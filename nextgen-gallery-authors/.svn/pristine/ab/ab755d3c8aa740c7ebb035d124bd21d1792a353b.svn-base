=== NextGEN Gallery Date===
Contributors: Roberto Cantarano
Tags: nextgen-gallery,nextgen gallery,nextgen-gallery-authors,nextgen gallery authors
Requires at least: 3.1
Tested up to: 3.2
Stable tag: 0.2.5

This plugin will let you sort the galleries by date and get info about gallery creation (and modification) date. 

== Description ==

**Please use at least version 1.8.3 of NextGEN Gallery. This plugin is not tested with lower versions**

**[ A T T E N T I O N ] NextGEN Gallery core modification required!**

Read [installation page](http://wordpress.org/extend/plugins/nextgen-gallery-authors/installation/) 

NextGEN Gallery Authors is an add-on for the best wordpress gallery plugin i have seen! With my plugin, you can show galleries filtered by author.

== Credits ==

Copyright 2011 by Roberto Cantarano

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Installation ==

**[ A T T E N T I O N ] NextGEN Gallery core modification required!**

To use this plugin, you need to make a simple change to a NextGEN Gallery file(tested with version 1.8.3).
This will be necessary until the change will not be integrated (I have already sent the request to Alex Rabe).
To make the change, follow the instructions:

1. Open the following file: /wp-content/plugins/nextgen-gallery/nggfunctions.php;

2. The changes affect the function nggCreateAlbum, go to row 580, just before the
    -----------------------
    // check for page navigation
    if ($maxElement > 0) {
    ------------------------

3.  Enter the following filter:
    -----------------------
    $galleries = apply_filters('ngg_album_galleries_before_paging', $galleries, $album)
    ------------------------;

4.  To check if you have done correctly, check the screenshot (plugins/nextgen-gallery-date/date/admin/images/ngg-new-filter.png);

Now, install the plugin:

1. 	Install & Activate the plugin (you need NextGEN Gallery plugin to be active!)

2.	Check if there is a nggallery folder (and the gallery.php inside) in your theme folder. If not, create that folder, then open the "nextgen-gallery" folder in wordpress plugin folder, open "view" folder, copy gallery.php and album-extend.php and paste them in the nggallery folder you created before.

3. in album-extend.php, inside te cycle 'foreach ($galleries as $gallery)' you can use this var '$gallery->author_galleries' to get a link (like this http://lorem.com/lorem-ipsum/nggallery/auth-1) to reload the page only to show galleries created by that author.
   You can link directly the name of the author in this way:
   
   		$author = get_the_author_meta('display_name', $gallery->author);
		...
		<a href="<?php $gallery->author_galleries ?>"><?php $author ?></a>
		...
		
That's it ... Have fun

== Screenshots ==

== Frequently Asked Questions ==

== Changelog ==

= V0.1 - 24.08.2011 =
* Initial release
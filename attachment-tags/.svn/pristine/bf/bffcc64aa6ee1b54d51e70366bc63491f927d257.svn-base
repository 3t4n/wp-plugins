<?php

/*

Plugin Name: Attachment Tags
Version: 0.1
Plugin URI: http://mcnicks.org/plugins/attachment-tags/
Description: To be added.
Author: David McNicol
Author URI: http://mcnicks.org/

Copyright (c) 2005
Released under the GPL license
http://www.gnu.org/licenses/gpl.txt

This file is part of WordPress.
WordPress is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/



/* Load the config file. */

include_once( ABSPATH . "wp-content/plugins/attachment-tags.conf" );



/*** Constants - do not change any of these. ***/



/* Debug mode - only set this to 1 if you need to debug. */

define( 'AT_DEBUG', 0 );



/*** Functions - do not change any of these either. ***/



/* at_handle_tags
    - $content contains the existing content of the post
    - returns the existing content with the relevant attachments added
*/

add_action( 'the_content', 'at_handle_tags', 0 );

function at_handle_tags ( $content ) {
}

/* at_remove_tags
    - $content contains the existing content of the post
    - returns the existing content with the attachment tags removed

   This function removes the attachment tags from the given content. This
   is used to clean up excerpts for search returns and feeds.
*/

add_action( 'the_excerpt', 'at_remove_tags', 0 );

function at_remove_tags ( $content ) {
}

?>

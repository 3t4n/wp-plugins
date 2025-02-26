<?php
/*
Plugin Name: Author META
Version: 1.0
Plugin URI: http://www.ktstudios.com/wordpress-plugin-author-meta/
Description: Adds meta name="author" to the &lt;head&gt; of your posts and pages.
Author: KTStudios
Author URI: http://www.ktstudios.com/
*/

/*  Copyright 2011  KTStudios  (email : admin@ktstudios.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_head', 'kts_author_meta',1);

function kts_author_meta() {
	global $post;
	$postauthor = get_the_author_meta('display_name', $post->post_author);

	if ( $postauthor ) {
		echo '<meta name="author" content="'.$postauthor.'">'."\n";
	}
}

?>
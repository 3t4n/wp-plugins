<?php
/*
Plugin Name: Author mentions
Description: Replace each `@wordpress user_login@` by the user posts page link in your posts contents.
Version: 1.3
Author: Benjamin Niess
Author URI: http://www.benjamin-niess.fr

---
This program is free software; you can redistribute it and/or modify
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
---
*/

Class Author_Mentions_Main {
	function __construct() {
		add_filter( 'the_content', array( __CLASS__, 'link_author_mentions' ) );
	}

	/**
	 * Replace @authors@ inside the_content
	 *
	 * @param string $content the post content
	 * @return string the content with new permalink on mentions
	 * @author Benjamin Niess
	 */
	public static function link_author_mentions( $content ) {
		if ( is_admin() ) {
			return $content;
		}
		return preg_replace_callback( '/@[a-zA-Z]*@/', array( __CLASS__, 'content_callback' ), $content );
	}

	/*
	 * Callback function that filter potential authors
	 *
	 * @param string $mention the mention with the @
	 * @return string the mention with the permalink | the string without any change
	 * @author Benjamin Niess
	 */
	public static function content_callback( $mention ) {
		$split_a = str_replace( '@', '', $mention );
		if ( !isset( $split_a[0] ) || empty( $split_a[0] ) )
			return $mention;

		// Check if the user exists
		$user = get_user_by( 'login', esc_attr( $split_a[0] ) );
		if ( empty( $user ) || !isset( $user->user_login ) || empty( $user->user_login ) ){
			return $mention;
		}

		// Return the correct link without @@ and with the user display name
		return '<a href="' . esc_url( get_author_posts_url( $user->ID, $user->user_nicename ) ) . '" class="author_mentions" rel="friend">' . esc_html($user->display_name) . '</a>';
	}
}
new Author_Mentions_Main();
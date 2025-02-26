<?php

/*
Plugin Name: Stop Media Comment Spamming
Plugin URI: https://zeropointdevelopment.com/stopping-wordpress-media-attachment-comment-spamming/
Description: Stops media comment spamming by removing the ability to comment on attachments.  Other post types are not affected.
Version: 1.8.3
Author: DeveloperWil
Author URI: https://profiles.wordpress.org/developerwil
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

    Copyright © 2016 Zero Point Development.  (https://zeropointdevelopment.com/)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
 * Stop comments being used on Media Files
 *
 * @param $open
 * @param $post_id
 * @return bool
 */
function zpd_stop_media_comments( $open, $post_id ) {
  $post = get_post( $post_id );
  if ( 'attachment' == $post->post_type )
    $open = false;
  return $open;
}
add_filter( 'comments_open', 'zpd_stop_media_comments', 10, 2 );


/**
 * Temporarily disable comments for the current post
 * This is used to get around non-native WordPress plugins
 */
function zpd_turn_attachment_comments_off(){
    global $post;
    if( is_object( $post ) && !is_null( $post ) ) {
        if ('attachment' == $post->post_type) {
            $post->comment_status = "closed";
        }
    }
}
add_filter('get_header', 'zpd_turn_attachment_comments_off');

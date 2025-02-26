<?php
/*
Plugin Name: Remove Archive Label
Plugin URI: http://wordpress.org/plugins/remove-archive-label
Description: Removes the “Category:”, “Tag:”, “Author:”, “Archives:” and “Taxonomy:” in the archive title.
Version: 1.0.1
Author: Blue Skies Glyphs
Author URI: http://profiles.wordpress.org/oguido
License: GPL v2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
      
    return $title;
});
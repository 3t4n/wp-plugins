<?php
/*
Plugin Name: Admin Posts List Tag Filter
Version: 1.0
Plugin URI: http://toolstack.com/admin-posts-list-tag-filter
Author: Greg Ross
Author URI: http://toolstack.com
Text Domain: admin-posts-list-tag-filter
Description: Adds a tags filter select box to the posts list (any any other post type that has tag support) in the admin screen.

Compatible with WordPress 3.5+.

Read the accompanying readme.txt file for instructions and documentation.

Copyright (c) 2022 by Greg Ross

This software is released under the GPL v2.0, see license.txt for details
*/

function AdminPostListTagFilter( $post_type, $which ) {
	// If the post type doesn't have tags, don't bother showing the select box.
	$post_type_tax = get_object_taxonomies( $post_type, 'objects' );
	if( is_array( $post_type_tax ) && ! array_key_exists( 'post_tag', $post_type_tax ) ) { return; }

	// Get the current list of tags.
	$tags = get_tags( array( 'type' => $post_type, 'orderby' => 'name' ) );

	// Set the default to "All tags".
	$selected_tag_id = '';

	// If there are no tags, don't bother showing the select box.
	if( empty( $tags ) ) { return; }

	// Get the currently selected tag if there is one.
	if( array_key_exists( 'tag', $_REQUEST ) && $_REQUEST['tag'] !== '' && $_REQUEST['tag'] != '' )
		{
		// Make sure its a valid tag.
		foreach( $tags as $tag )
			{
			if( $tag->name === $_REQUEST['tag'] )
				$selected_tag_id = $tag->name;
			}
		}
?>
<label for="tag" class="screen-reader-text"><?php _e( 'Filter by tag', 'AdminPostListTagFilter' ); ?></label>
<select name="tag" id="tag">
	<option value=""<?php if ( $selected_tag_id === '' ) { echo ' selected="selected"'; } ?>><?php _e( 'All tags', 'AdminPostListTagFilter' ); ?></option>
<?php
	foreach( $tags as $tag ) {
		if( $tag->count > 0 ) {
			if ( $selected_tag_id === $tag->name ) { $selected = ' selected="selected"'; }  else { $selected = ''; }
			echo "\t\t" . '<option value="' . esc_attr( $tag->name ) . '"' . $selected . '>' . esc_html( $tag->name ) . '</option>' . PHP_EOL;
		}
	}


?>
</select>
<?php
}

add_action( 'restrict_manage_posts', 'AdminPostListTagFilter', 10, 2);
?>
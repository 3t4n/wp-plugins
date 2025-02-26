<?php
defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb, $wp_version;

wp_clear_scheduled_hook( 'Psost_Metabox_sitting_field_color_jss_new_c' );
wp_clear_scheduled_hook( 'Post_Metabox_Setting_field_js' );
wp_clear_scheduled_hook( 'Psost_Metabox_sitting_field_color_jss_new' );
wp_clear_scheduled_hook( 'Psost_Metabox_sitting_field_color_jss_new_q' );
wp_clear_scheduled_hook( 'Post_select_Metabox_select_picker_jss' );
wp_clear_scheduled_hook( 'Post_select_Metabox_Option_select_picker_js' );
wp_clear_scheduled_hook( 'faq_after_question_content' );


if ( get_option('on_UNINSTALL_REMOVE_ALL_DATA') == '1' ) {
	

	// Page.
	wp_trash_post( get_option('faq_cat_page') );

	

	// Delete options.
	$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'woocommerce\_%';" );
	$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'widget\_woocommerce\_%';" );

	// Delete posts + data.
	$allposts= get_posts( array('post_type'=>'question','numberposts'=>-1) );
	foreach ($allposts as $eachpost) {
	  wp_delete_post( $eachpost->ID, true );
	}
	
	// Delete terms if > WP 4.2 (term splitting was added in 4.2).
	if ( version_compare( $wp_version, '4.2', '>=' ) ) {
		// Delete term taxonomies.
		foreach ( array( 'faqs', 'faqscategory', 'Tags') as $taxonomy ) {
			$terms = get_terms( $taxonomy, array( 'fields' => 'ids', 'hide_empty' => false ) );
			foreach ( $terms as $value ) {
				wp_delete_term( $value, $taxonomy );
			}
		}

		// Delete orphan relationships.
		$wpdb->query( "DELETE tr FROM {$wpdb->term_relationships} tr LEFT JOIN {$wpdb->posts} posts ON posts.ID = tr.object_id WHERE posts.ID IS NULL;" );

		// Delete orphan terms.
		$wpdb->query( "DELETE t FROM {$wpdb->terms} t LEFT JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id WHERE tt.term_id IS NULL;" );

		// Delete orphan term meta.
		if ( ! empty( $wpdb->termmeta ) ) {
			$wpdb->query( "DELETE tm FROM {$wpdb->termmeta} tm LEFT JOIN {$wpdb->term_taxonomy} tt ON tm.term_id = tt.term_id WHERE tt.term_id IS NULL;" );
		}
	}

	// Clear any cached data that has been removed.
	wp_cache_flush();
}

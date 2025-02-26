<?php
namespace ABlocks\Blocks\FormBuilder;

class Helper {
	public function insert_form_entry( $form_type, $user_name, $user_email, $status = 'unread', $parent_id = null ) {
		global $wpdb;
		$table_entries = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_entries';

		$wpdb->insert(
			$table_entries,
			[
				'form_type' => $form_type,
				'user_name' => $user_name,
				'user_email' => $user_email,
				'status' => $status,
				'parent_id' => $parent_id,
				'created_at' => current_time( 'mysql' ),
			]
		);

		return $wpdb->insert_id;
	}
	public function update_form_entry( $entry_id, $data ) {
		global $wpdb;
		$table_entries = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_entries';

		// Only allow updating fields that exist in the table
		$allowed_fields = [ 'form_type', 'user_name', 'user_email', 'status', 'updated_at' ];
		$data = array_intersect_key( $data, array_flip( $allowed_fields ) );

		if ( empty( $data ) ) {
			return false; // Nothing to update
		}

		$data['updated_at'] = current_time( 'mysql' ); // Update the timestamp

		return $wpdb->update(
			$table_entries,
			$data,
			[ 'id' => $entry_id ]
		);
	}

	public function get_form_entry_with_replies( $entry_id ) {
		global $wpdb;
		$table_entries = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_entries';
		$table_meta = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_meta';

		$entry = $wpdb->get_row(
			$wpdb->prepare( "SELECT * FROM $table_entries WHERE id = %d", $entry_id )
		);

		if ( $entry ) {
			$meta_data = $wpdb->get_results(
				$wpdb->prepare( "SELECT meta_key, meta_value FROM $table_meta WHERE entry_id = %d", $entry_id ),
				OBJECT_K
			);
			$entry->meta = $meta_data;

			$replies = $wpdb->get_results(
				$wpdb->prepare( "SELECT * FROM $table_entries WHERE parent_id = %d", $entry_id )
			);

			foreach ( $replies as $reply ) {
				$reply_meta = $wpdb->get_results(
					$wpdb->prepare( "SELECT meta_key, meta_value FROM $table_meta WHERE entry_id = %d", $reply->id ),
					OBJECT_K
				);
				$reply->meta = $reply_meta;
			}

			$entry->replies = $replies;
		}//end if

		return $entry;
	}

	public function add_form_meta( $entry_id, $meta_key, $meta_value ) {
		global $wpdb;
		$table_meta = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_meta';

		$wpdb->insert(
			$table_meta,
			[
				'entry_id' => $entry_id,
				'meta_key' => $meta_key,
				'meta_value' => $meta_value,
			]
		);
	}

	public function update_form_meta( $entry_id, $meta_key, $meta_value ) {
		global $wpdb;
		$table_meta = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_meta';

		// Check if the metadata already exists
		$meta_exists = $wpdb->get_var(
			$wpdb->prepare( "SELECT meta_id FROM $table_meta WHERE entry_id = %d AND meta_key = %s", $entry_id, $meta_key )
		);

		if ( $meta_exists ) {
			// Update existing metadata
			return $wpdb->update(
				$table_meta,
				[ 'meta_value' => $meta_value ],
				[ 'meta_id' => $meta_exists ]
			);
		} else {
			// Insert new metadata
			return $wpdb->insert(
				$table_meta,
				[
					'entry_id' => $entry_id,
					'meta_key' => $meta_key,
					'meta_value' => $meta_value,
				]
			);
		}
	}

	public function delete_form_entry( $entry_id ) {
		global $wpdb;
		$table_entries = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_entries';
		$table_meta = $wpdb->prefix . ABLOCKS_PLUGIN_SLUG . '_form_meta';

		// Delete metadata associated with the entry
		$wpdb->delete( $table_meta, [ 'entry_id' => $entry_id ] );

		// Delete replies to the entry
		$wpdb->delete( $table_entries, [ 'parent_id' => $entry_id ] );

		// Delete the entry itself
		return $wpdb->delete( $table_entries, [ 'id' => $entry_id ] );
	}
}

<?php

namespace Codemanas\CmBlocks\Importer;

use Codemanas\CmBlocks\Database\FavoritesDB;


class Favorites {
	private static ?Favorites $instance = null;

	// The object is created from within the class itself only if the class has no instance.
	private ?FavoritesDB $db;

	public static function get_instance(): ?Favorites {
		if ( self::$instance == null ) {
			self::$instance = new Favorites();
		}

		return self::$instance;
	}

	// The constructor is private to prevent initiation with outer code.
	private function __construct() {
		$this->db = FavoritesDB::get_instance();
		// Handles AJAX request to save favorite pattern
		add_action( 'wp_ajax_save_favorite_pattern', [ $this, 'handle_favorite_pattern' ] );
		add_action( 'wp_ajax_nopriv_save_favorite_pattern', [ $this, 'handle_favorite_pattern' ] );

		// Handles AJAX request to delete favorite pattern
		add_action( 'wp_ajax_delete_favorite_pattern', [ $this, 'handle_favorite_pattern' ] );
		add_action( 'wp_ajax_nopriv_delete_favorite_pattern', [ $this, 'handle_favorite_pattern' ] );

		add_action( 'wp_ajax_get_favorite_patterns', [ $this, 'get_favorite_patterns' ] );
		add_action( 'wp_ajax_nopriv_get_favorite_patterns', [ $this, 'get_favorite_patterns' ] );
	}


	// Handle save and deletion of favorite patterns
	public function handle_favorite_pattern() {
		check_ajax_referer( 'cm-blocks-nonce-verify', 'nonce' );

		if ( isset( $_POST['object_id'] ) && isset( $_POST['action'] ) && isset( $_POST['type'] ) ) {
			$object_id = intval( $_POST['object_id'] );
			$action    = $_POST['action'];
			$type      = sanitize_text_field( $_POST['type'] ); // Sanitize type input

			if ( $object_id <= 0 ) {
				wp_send_json_error( 'Invalid object ID.' );
			}

			switch ( $action ) {
				case 'save_favorite_pattern':
					$this->db->upsert( $object_id, $type );
					wp_send_json_success( 'Favorite pattern saved.' );
					break;
				case 'delete_favorite_pattern':
					$this->db->delete( $object_id );
					wp_send_json_success( 'Favorite pattern deleted.' );
					break;
				default:
					wp_send_json_error( 'Invalid action type.' );
			}
		} else {
			wp_send_json_error( 'Invalid request.' );
		}

		wp_die();
	}

	// AJAX handler to fetch favorite patterns
	public function get_favorite_patterns() {
		check_ajax_referer( 'cm-blocks-nonce-verify', 'nonce' );
		$results = $this->db->get_users_favorites_by_type( get_current_user_id());
		if ( empty( $results ) ) {
			wp_send_json_error( 'No favorite patterns found.' );
		}

		wp_send_json_success( $results );
		wp_die();
	}


}
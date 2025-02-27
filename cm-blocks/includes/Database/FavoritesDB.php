<?php


namespace Codemanas\CmBlocks\Database;

class FavoritesDB {
	private static ?FavoritesDB $_instance = null;
	private \wpdb $wpdb;
	private string $table_name = 'cm_blocks_favorite_patterns';

	public static function get_instance(): ?FavoritesDB {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	public function __construct() {
		global $wpdb;
		$this->wpdb  =$wpdb;
		// Create favorites table on plugin activation
		register_activation_hook( CM_BLOCKS_FILE_PATH, [ $this, 'create_table' ] );
		add_action('init', [ $this, 'maybe_create_table' ]);
	}

	// Create custom database table cm_blocks_favorite_patterns
	public static function create_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'cm_blocks_favorite_patterns';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
            id bigint NOT NULL AUTO_INCREMENT,
            object_id bigint NOT NULL,
            type varchar(255) NOT NULL,
            user_id bigint NOT NULL,
            PRIMARY KEY  (id),
            UNIQUE KEY object_user (object_id, user_id)
        ) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}


	public function maybe_create_table() {
		if ($this->wpdb->get_var("SHOW TABLES LIKE '{$this->wpdb->prefix}{$this->table_name}'") !== $this->wpdb->prefix.$this->table_name) {
			$this->create_table();
			update_option('cm_blocks_favorite_patterns_table_created', true);
		}
	}


	// Get current user id
	private function get_user_id() {
		$user_id = get_current_user_id();

		if ( $user_id == 0 ) {
			return null;
		}

		return $user_id;
	}


	// Insert / Update / Delete
	//Upsert = Insert if new, Update if exists
	public function upsert( int $object_id, string $type ) {
		$user_id = $this->get_user_id();

		if ( is_null( $user_id ) ) {
			return;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'cm_blocks_favorite_patterns';

		if ( $object_id <= 0 ) {
			return false;
		}

		$existing_id = $wpdb->get_var( $wpdb->prepare(
			"SELECT id FROM $table_name WHERE object_id = %d AND user_id = %d",
			$object_id, $user_id
		) );

		if ( $existing_id ) {
			return $wpdb->update(
				$table_name,
				[ 'object_id' => $object_id, 'type' => $type, 'user_id' => $user_id ],
				[ 'id' => $existing_id ],
				[ '%d', '%s', '%d' ],
				[ '%d' ]
			);
		} else {
			return $wpdb->insert(
				$table_name,
				[ 'object_id' => $object_id, 'type' => $type, 'user_id' => $user_id ],
				[ '%d', '%s', '%d' ]
			);
		}
	}


	// Delete
	public function delete( int $object_id ) {
		$user_id = $this->get_user_id();

		if ( is_null( $user_id ) ) {
			return false;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'cm_blocks_favorite_patterns';

		if ( $object_id <= 0 ) {
			return false;
		}

		return $wpdb->delete(
			$table_name,
			[ 'object_id' => $object_id, 'user_id' => $user_id ],
			[ '%d', '%d' ]
		);
	}

	// Retrieve object id
	public function get_favorites() {
		$user_id = $this->get_user_id();

		if ( is_null( $user_id ) ) {
			return [];
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'cm_blocks_favorite_patterns';

		$results = $wpdb->get_results( $wpdb->prepare(
			"SELECT object_id, type FROM $table_name WHERE user_id = %d",
			$user_id
		), ARRAY_A );

		return $results;
	}

	public function get_users_favorites_by_type( $user_id = 0) {
		$table = $this->wpdb->prefix.$this->table_name;
		$query = $this->wpdb->prepare("SELECT * FROM {$table} WHERE user_id = %d", $user_id );
		return $this->wpdb->get_results($query, ARRAY_A);
	}

}

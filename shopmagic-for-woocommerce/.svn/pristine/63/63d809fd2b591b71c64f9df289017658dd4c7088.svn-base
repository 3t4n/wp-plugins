<?php

namespace WPDesk\ShopMagic\migrations;

use ShopMagicVendor\WPDesk\Migrations\AbstractMigration;
use WPDesk\ShopMagic\Database\DatabaseTable;

final class Version_42 extends AbstractMigration {

	public function up(): bool {
		$table_name = DatabaseTable::outcome_logs();

		$sql    = "ALTER TABLE {$table_name} MODIFY `note` TEXT NOT NULL";
		$result = $this->wpdb->query( $sql );

		$has_column = $this->wpdb->get_results(
			"SHOW COLUMNS FROM wp_shopmagic_automation_outcome_logs WHERE Field = 'note_context';",
			\ARRAY_N
		);

		if ( count( $has_column ) > 0 ) {
			return $result;
		}

		// We actually need to create the column.
		$sql    = "ALTER TABLE {$table_name} ADD `note_context` TEXT";

		return $result && $this->wpdb->query( $sql );
	}
}

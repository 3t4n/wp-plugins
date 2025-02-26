<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WaicInstallerDbUpdater {
	public static function runUpdate( $current_version ) {
		if ( WaicDb::get( "SELECT 1 FROM `@__modules` WHERE code='postsfields'", 'one' ) != 1 ) {
			WaicDb::query( "INSERT INTO `@__modules` (id, code, active, type_id, label) VALUES (NULL, 'postsfields', 1, 1, 'PostsFields');" );
		}
		if ( ! WaicDb::existsTableColumn( '@__tasks', 'cycle' ) ) {
			WaicDb::query( 'ALTER TABLE `@__tasks` ADD COLUMN `cycle` INT NOT NULL DEFAULT 0 AFTER `steps`' );
			WaicDb::query( "ALTER TABLE `@__tasks` ADD COLUMN `message` VARCHAR(250) DEFAULT '' AFTER `cycle`" );
		}
		if ( ! WaicDb::existsTableColumn( '@__tasks', 'title' ) ) {
			WaicDb::query( "ALTER TABLE `@__tasks` ADD COLUMN `title` VARCHAR(250) DEFAULT '' AFTER `author`" );
		}
		if ( ! WaicDb::existsTableColumn( '@__posts_create', 'added' ) ) {
			WaicDb::query( 'ALTER TABLE `@__posts_create` ADD COLUMN `added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `post_id`' );
			WaicDb::query( "ALTER TABLE `@__posts_create` ADD COLUMN `uniq` VARCHAR(32) NULL AFTER `added`" );
		}
	}
}

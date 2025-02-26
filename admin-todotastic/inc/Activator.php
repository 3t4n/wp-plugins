<?php
namespace Brickdots\AdminTodotastic;

use Brickdots\AdminTodotastic\base\UtilsProvider;
use Richdho\Utils\Activator as UtilsActivator;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd

/**
 * The activator class handles the plugin relevant activation hooks: Uninstall, activation,
 * deactivation and installation. The "installation" means installing needed database tables.
 */
class Activator {
    use UtilsProvider;
    use UtilsActivator;

    /**
     * Method gets fired when the user activates the plugin.
     */
    public function activate() {
        // Your implementation...
    }

    /**
     * Method gets fired when the user deactivates the plugin.
     */
    public function deactivate() {
        // Your implementation...
    }

    /**
     * Install tables, stored procedures or whatever in the database.
     * This method is always called when the version bumps up or for
     * the first initial activation.
     *
     * @param boolean $errorlevel If true throw errors
     */
    public function dbDelta($errorlevel) {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $todosTableName = $wpdb->prefix . 'bdotstd_todos';
        $mentionsTableName = $wpdb->prefix . 'bdotstd_todo_mentions';
        $statusesTableName = $wpdb->prefix . 'bdotstd_todo_statuses';
        $usersTable = $wpdb->prefix . 'users';
        $sql1 = "CREATE TABLE IF NOT EXISTS $todosTableName (
			  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			  `description` TEXT NOT NULL,
			  `author_id` BIGINT(20) UNSIGNED NOT NULL,
			  `position` TINYINT(2) UNSIGNED NOT NULL,
			  `status_id` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
			  `entity_type` VARCHAR(20) NOT NULL DEFAULT 'post',
			  `entity_id` BIGINT(20) UNSIGNED NOT NULL,
			  `due_by` TIMESTAMP NULL,
			  `created_at` TIMESTAMP NULL DEFAULT NULL,
			  `updated_at` TIMESTAMP NULL DEFAULT NULL,
			  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) $charsetCollate;";
        $sql2 = "CREATE TABLE IF NOT EXISTS $mentionsTableName (
			    `user_id` BIGINT(20) UNSIGNED NOT NULL,
			    `todo_id` BIGINT(20) UNSIGNED NOT NULL,
			    `created_at` TIMESTAMP NULL DEFAULT NULL,
				`updated_at` TIMESTAMP NULL DEFAULT NULL,
			    `deleted_at` TIMESTAMP NULL DEFAULT NULL
			  ) $charsetCollate;";
        $sql3 = "CREATE TABLE IF NOT EXISTS $statusesTableName (
			    `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
			    `text` VARCHAR(30) NOT NULL,
			    `label` VARCHAR(20) NOT NULL,
			    `is_marked_as_done` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
			    `created_at` TIMESTAMP NULL DEFAULT NULL,
			    `updated_at` TIMESTAMP NULL DEFAULT NULL,
			    PRIMARY KEY (`id`)
			  ) $charsetCollate;";
        $sql4 = "ALTER TABLE $todosTableName
			  ADD CONSTRAINT `FK_bdotstd_todo_status`
			  FOREIGN KEY (`status_id`)
			  REFERENCES $statusesTableName (`id`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;";
        $sql5 = "ALTER TABLE $todosTableName
			  ADD CONSTRAINT `FK_bdotstd_todo_user`
			  FOREIGN KEY (`author_id`)
			  REFERENCES $usersTable (`id`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;";
        $sql6 = "ALTER TABLE $mentionsTableName
			  ADD CONSTRAINT `FK_bdotstd_mention_user`
			  FOREIGN KEY (`user_id`)
			  REFERENCES $usersTable (`id`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;";
        $sql7 = "ALTER TABLE $mentionsTableName
			  ADD CONSTRAINT `FK_bdotstd_mention_todo`
			  FOREIGN KEY (`todo_id`)
			  REFERENCES $todosTableName (`id`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;";
        // Insert built-in statuses
        $sql8 = "INSERT INTO $statusesTableName
            (`id`, `text`, `label`, `is_marked_as_done`, `created_at`, `updated_at`) VALUES 
            ('', 'Open', 'open', '0', '2021-07-27 23:45:06', '2021-07-27 23:45:06'),
            ('', 'In progress', 'in-progress', '0', '2021-07-27 23:45:06', '2021-07-27 23:45:06'), 
            ('', 'Done', 'done', '1', '2021-07-27 23:45:06', '2021-07-27 23:45:06'),
            ('', 'Skipped', 'skipped', '1', '2021-07-27 23:45:06', '2021-07-27 23:45:06'),
            ('', 'Not applicable', 'not-applicable', '1', '2021-07-27 23:45:06', '2021-07-27 23:45:06');";

        dbDelta($sql1);
        dbDelta($sql2);
        dbDelta($sql3);
        dbDelta($sql4);
        dbDelta($sql5);
        dbDelta($sql6);
        dbDelta($sql7);

        // Check if the built-in statuses exist
        $count = $wpdb->get_var(
            $wpdb->prepare(
                'SELECT COUNT(id) FROM ' . $wpdb->prefix . 'bdotstd_todo_statuses WHERE label IN (%s,%s,%s,%s,%s)',
                'open',
                'in-progress',
                'done',
                'skipped',
                'not-applicable'
            )
        );

        if ((int) $count === 0) {
            dbDelta($sql8);
        }

        if ($errorlevel) {
            $wpdb->print_error();
        }
    }
}

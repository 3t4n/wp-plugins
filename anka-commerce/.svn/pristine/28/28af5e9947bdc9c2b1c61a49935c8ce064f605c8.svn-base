<?php
  /**
   * ANKA Commerce migrations to create and rollback database tables.
   *
   * @package Anka_Commerce
   * @since 1.1.0
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  /**
   * Create the `anka_commerce_payment_buttons` table.
   */
  function migration_create_anka_commerce_payment_buttons() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'anka_commerce_payment_buttons';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
              id INT NOT NULL AUTO_INCREMENT,
              title VARCHAR(255) NOT NULL,
              description TEXT,
              amount DECIMAL(10, 2) NOT NULL,
              currency VARCHAR(10) NOT NULL DEFAULT 'EUR',
              button_text VARCHAR(50) DEFAULT 'Pay Now',
              payment_url VARCHAR(255),
              shortcode VARCHAR(50) UNIQUE,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
              updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

  /**
   * Rollback the `anka_commerce_payment_buttons` table.
   */
  function rollback_create_anka_commerce_payment_buttons() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'anka_commerce_payment_buttons';
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table_name));
  }

  /**
   * Create the `anka_commerce_migrations` table.
   */
  function create_migrations_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'anka_commerce_migrations';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
              id INT NOT NULL AUTO_INCREMENT,
              migration_name VARCHAR(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (id),
              UNIQUE (migration_name)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

  /**
   * Run a specific migration.
   *
   * @param string $migration_name The name of the migration.
   * @param callable $migration_function The migration function to run.
   */
  function run_migration($migration_name, $migration_function) {
    global $wpdb;

    $cache_key = 'anka_commerce_migration_' . $migration_name;
    $exists = wp_cache_get($cache_key, 'anka_commerce');

    if ($exists === false) {
      $exists = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}anka_commerce_migrations WHERE migration_name = %s",
        $migration_name
      ));

      wp_cache_set($cache_key, $exists, 'anka_commerce', 3600); // Cache for 1 hour
    }

    if (!$exists) {
      call_user_func($migration_function);

      $migrations_table = $wpdb->prefix . 'anka_commerce_migrations';
      $wpdb->insert($migrations_table, ['migration_name' => sanitize_text_field($migration_name)]);

      wp_cache_set($cache_key, 1, 'anka_commerce', 3600); // Cache for 1 hour
    }
  }

  /**
   * Rollback a specific migration.
   *
   * @param string $migration_name The name of the migration.
   * @param callable $rollback_function The rollback function to run.
   */
  function rollback_migration($migration_name, $rollback_function) {
    global $wpdb;

    $cache_key = 'anka_commerce_migration_' . $migration_name;
    $exists = wp_cache_get($cache_key, 'anka_commerce');

    if ($exists === false) {
      $exists = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}anka_commerce_migrations WHERE migration_name = %s",
        $migration_name
      ));

      wp_cache_set($cache_key, $exists, 'anka_commerce', 3600); // Cache for 1 hour
    }

    if ($exists) {
      call_user_func($rollback_function);

      $migrations_table = $wpdb->prefix . 'anka_commerce_migrations';
      $wpdb->delete($migrations_table, ['migration_name' => sanitize_text_field($migration_name)]);

      wp_cache_delete($cache_key, 'anka_commerce');
    }
  }

  /**
   * Run all migrations.
   *
   * This function should be called when the plugin is activated.
   */
  function run_all_migrations() {
    create_migrations_table();

    $migrations = [
      'create_anka_commerce_payment_buttons' => 'migration_create_anka_commerce_payment_buttons',
      // Add more migrations here
    ];

    foreach ($migrations as $name => $function) {
      run_migration($name, $function);
    }
  }

  /**
   * Rollback all migrations.
   *
   * This function can be called when the plugin is deactivated.
   */
  function rollback_all_migrations() {
    $migrations = [
      'create_anka_commerce_payment_buttons' => 'rollback_create_anka_commerce_payment_buttons',
      // Add more rollback functions here
    ];

    foreach ($migrations as $name => $function) {
      rollback_migration($name, $function);
    }
  }
?>

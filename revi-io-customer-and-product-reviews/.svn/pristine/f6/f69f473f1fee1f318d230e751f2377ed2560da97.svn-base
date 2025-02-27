<?php

if (!defined('ABSPATH')) {
    exit;
}

function revi_install()
{
    revi_createReviDatabase();
    revi_createContent();
}

function revi_uninstall()
{
    revi_deleteReviDatabase();
    delete_option('revi_options');
}

function revi_createReviDatabase()
{
    global $wpdb;

    // Asegurarse de que el entorno de administración de WordPress esté cargado
    if (! function_exists('dbDelta')) {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    }

    // Obtener el conjunto de caracteres de la base de datos
    $charset_collate = $wpdb->get_charset_collate();

    // Definir las consultas SQL para crear las tablas
    $tables = [
        'revi_orders' => "CREATE TABLE IF NOT EXISTS revi_orders (
            `id_order` BIGINT(20) NOT NULL,
            `status` INT(1) NOT NULL,
            `date_sent` DATETIME NOT NULL,
            PRIMARY KEY (`id_order`)
        ) $charset_collate;",

        'revi_products' => "CREATE TABLE IF NOT EXISTS revi_products (
            `id_product` VARCHAR(36) NOT NULL,
            `num_reviews` INT(10) UNSIGNED NOT NULL,
            `avg_rating` FLOAT(5) NOT NULL,
            `date_sent` DATETIME NOT NULL,
            PRIMARY KEY (`id_product`)
        ) $charset_collate;"
    ];

    // Crear o actualizar las tablas
    foreach ($tables as $table => $sql) {
        dbDelta($sql);
    }
}


function revi_deleteReviDatabase()
{
    global $wpdb;

    $tables = ['revi_orders', 'revi_comments', 'revi_products', 'revi_categories'];

    foreach ($tables as $table) {
        $table_name = esc_sql($table);
        $sql = "DROP TABLE IF EXISTS `$table_name`";
        $wpdb->query($sql);
    }
}

function revi_createContent()
{
    $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/revi-io-customer-and-product-reviews/revi.php');
    $plugin_version = $plugin_data['Version'];

    if (
        !update_option('REVI_MODULE_VERSION', $plugin_version)
        || !update_option('REVI_SELECTED_STORE', 0)
        || !update_option('REVI_LANG', 'en')
        || !update_option('REVI_SELECTED_LANGUAGE', 'en')
        || !update_option('REVI_API_KEY', '')
        || !update_option('REVI_SUBSCRIPTION', '0')
        || !update_option('REVI_ORDER_STATUSES', array('wc-completed'))
        || !update_option('REVI_SELECTED_SHOPS', array(1))
        || !update_option('REVI_PRODUCT_METADATA', 0)
        || !update_option('REVI_TAB_REVIEWS', 0)
        || !update_option('REVI_TAB_PRODUCT_STARS', 0)
        || !update_option('REVI_DISPLAY_WIDGET_FLOATING', 1)
        || !update_option('REVI_NOTIFICATIONS', array())
    ) {
        return false;
    }
    return true;
}

function revi_verifyTables()
{
    global $wpdb;

    $tables = ['revi_orders', 'revi_products'];
    $missing_table = false;
    $missing_column = false;

    foreach ($tables as $table) {
        $table_name = $table;

        // Verificar tablas usando INFORMATION_SCHEMA
        $exists = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT TABLE_NAME 
                 FROM INFORMATION_SCHEMA.TABLES 
                 WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s",
                DB_NAME,
                $table_name
            )
        );

        if (empty($exists)) {
            $missing_table = true;
            break;
        }

        // Verificar si la tabla revi_products tiene el campo num_reviews
        if ($table_name == 'revi_products') {
            $column_exists = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT COLUMN_NAME
                     FROM INFORMATION_SCHEMA.COLUMNS 
                     WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = %s",
                    DB_NAME,
                    $table_name,
                    'num_reviews'
                )
            );

            if (empty($column_exists)) {
                $missing_column = true;
                break;
            }
        }
    }

    if ($missing_table || $missing_column) {
        revi_deleteReviDatabase();
        revi_createReviDatabase();
    }
}



function update_revi_database_from_files()
{
    global $wpdb;

    $upgrade_path = REVI_DIR . 'upgrade/';
    $module_version_bd = get_option('REVI_LAST_UPGRADE_VERSION');
    if (!isset($module_version_bd)) {
        $module_version_bd = '4.0.0';
    }


    // Lista de archivos de actualización en la carpeta upgrades
    $upgrade_files = [
        '4.2.7' => 'upgrade-4.2.7.sql',
        '6.0.7' => 'upgrade-6.0.7.sql',
    ];

    foreach ($upgrade_files as $version => $file) {
        if (version_compare($version, $module_version_bd, '>')) {
            $sql_file = $upgrade_path . $file;


            if (file_exists($sql_file)) {
                $sql = file_get_contents($sql_file);

                if ($sql) {
                    $sql_statements = explode(';', $sql);
                    foreach ($sql_statements as $statement) {
                        $statement = trim($statement);
                        if (!empty($statement)) {
                            $result = $wpdb->query($statement);
                            if ($result === false) {
                                echo "Error executing SQL: " . esc_html($statement) . "Error: " . esc_html($wpdb->last_error);
                            } else {
                                update_option('REVI_LAST_UPGRADE_VERSION', $version);
                            }
                        }
                    }
                } else {
                    echo "Error reading SQL file: " . esc_html($sql_file);
                }
            } else {
                echo "SQL file not found: " . esc_html($sql_file);
            }
        }
    }
}

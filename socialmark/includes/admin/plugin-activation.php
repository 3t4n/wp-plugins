<?php
defined('ABSPATH') || exit();
global $socialmark_db_version;
$socialmark_db_version = '1.0';
function socaialmark_install()
{
    global $socialmark_db_version;
    global $wpdb;

    $socialmark_table_name = $wpdb->prefix . 'sm_images';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $socialmark_table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		image_link text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('socialmark_db_version', $socialmark_db_version);

    if (!file_exists(SOCIALMARK_UPLOAD)) {
        mkdir(SOCIALMARK_UPLOAD, 0777, true);
    }
}

register_activation_hook(SOCIALMARK_FILE, 'socaialmark_install');
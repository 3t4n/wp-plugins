<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define("AWMT_PLUGIN_DIR_NAME", "aruba-wp-migration-tool");
define("AWMT_PLUGIN_DIR_PATH", WP_CONTENT_DIR . DIRECTORY_SEPARATOR . AWMT_PLUGIN_DIR_NAME);
// STEPS URL
define('AWMT_STEPS_URL', [
    1 => 'admin.php?page=aruba-wp-migration-tool-migration&step=1',
    2 => 'admin.php?page=aruba-wp-migration-tool-migration&step=2',
    3 => 'admin.php?page=aruba-wp-migration-tool-migration&step=3',
    4 => 'admin.php?page=aruba-wp-migration-tool-migration&step=4',
    5 => 'admin.php?page=aruba-wp-migration-tool-migration&step=5'
]);


define("AWMT_PROCESS_FOLDER_NAME", "wp2wp-rt-folder");
define("AWMT_MIGRATION_FOLDER_NAME", "migration");
define("AWMT_FILE_LOG_NAME", "log.txt");
define("AWMT_FOLDER_LOG_NAME", "folders.txt");
define("AWMT_FILE_MIGRATION_NAME", ".wp2wp-migration");
define("AWMT_PROCESS_FOLDER_PATH", WP_CONTENT_DIR . DIRECTORY_SEPARATOR . AWMT_PROCESS_FOLDER_NAME);
define("AWMT_MIGRATION_FOLDER_PATH", AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . AWMT_MIGRATION_FOLDER_NAME);
define("AWMT_FILE_LOG_PATH", AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . AWMT_FILE_LOG_NAME);
define("AWMT_FOLDER_LOG_PATH", AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . AWMT_FOLDER_LOG_NAME);
define("AWMT_FILE_MIGRATION_PATH", AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . AWMT_FILE_MIGRATION_NAME);

define("AWMT_REQUIRED_FOLDERS_FILES", ["wp-content", "wp-config.php",
    "wp-admin",
    "wp-includes",
    ".htaccess",
    "index.php",
    "license.txt",
    "readme.html",
    "wp-activate.php",
    "wp-blog-header.php",
    "wp-comments-post.php",
    "wp-config-sample.php",
    "wp-cron.php",
    "wp-links-opml.php",
    "wp-load.php",
    "wp-login.php",
    "wp-mail.php",
    "wp-settings.php",
    "wp-signup.php",
    "wp-trackback.php",
    "xmlrpc.php"]);

define("AWMT_CRON_JOB_ENDPOINT", DIRECTORY_SEPARATOR . "cron-job");

// aggiungere     "wp-includes",

define("AWMT_EXCLUDED_FOLDERS_FILES", [
    'user.ini',
    '.htaccess.preinstall'
]);

define(
    "AWMT_FILE_MIGRATION_DEFAULT_CONTENT",
    "WP2WP_PLUGIN_LANG=IT\n" .
        "WP2WP_MIGRATION_PAGE_ACTIVE=false\n" .
        "WP2WP_MIGRATION_COMPLETED=false\n" .
        "WP2WP_MIGRATION_PROCESS_ID=0\n" .
        "WP2WP_MIGRATION_ERROR=false\n" .
        "WP2WP_MIGRATION_STEP=-1\n" .
        "WP2WP_MIGRATION_STATE=-1\n" .
        "WP2WP_MIGRATION_CURRENT_STATE_NAME=false\n" .
        "WP2WP_MIGRATION_FILES_STATUS=0\n".
        "WP2WP_MIGRATION_KILLED_BY_USER=false\n".
	    "WP2WP_MIGRATION_EXITED=false\n"
);

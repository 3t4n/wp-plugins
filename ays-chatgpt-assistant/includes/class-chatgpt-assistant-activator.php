<?php
global $ays_chatgpt_assistant_db_version;
$ays_chatgpt_assistant_db_version = '1.0.0';
/**
 * Fired during plugin activation
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Ays_Chatgpt_Assistant
 * @subpackage Ays_Chatgpt_Assistant/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ays_Chatgpt_Assistant
 * @subpackage Ays_Chatgpt_Assistant/includes
 * @author     Ays_ChatGPT Assistant Team <info@ays-pro.com>
 */
class Chatgpt_Assistant_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
        global $ays_chatgpt_assistant_db_version;
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $installed_ver = get_option( "ays_chatgpt_assistant_db_version" );
        $data_table = $wpdb->prefix . CHATGPT_ASSISTANT_DB_PREFIX . 'data';
        $charset_collate = $wpdb->get_charset_collate();

        if( $installed_ver != $ays_chatgpt_assistant_db_version )  {

            $sql = "CREATE TABLE `".$data_table."` (
                `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `api_key` TEXT NOT NULL DEFAULT '',
                `options` TEXT NOT NULL DEFAULT '',
                PRIMARY KEY (`id`)
            )$charset_collate;";

            $sql_schema = "SELECT * FROM INFORMATION_SCHEMA.TABLES
                           WHERE table_schema = '".DB_NAME."' AND table_name = '".$data_table."' ";
            $results = $wpdb->get_results($sql_schema);

            if( empty( $results ) ){
                $wpdb->query( $sql );
            }else{
                dbDelta( $sql );
            }

            update_option( 'ays_chatgpt_assistant_db_version', $ays_chatgpt_assistant_db_version );

        }
	}

	public static function db_update_check() {
        global $ays_chatgpt_assistant_db_version;
        if ( get_site_option( 'ays_chatgpt_assistant_db_version' ) != $ays_chatgpt_assistant_db_version ) {
            self::activate();
        }
    }

}

<?php

/**

 * Register all actions and filters for the plugin

 *

 * @since      1.0.0

 *

 * @package    WC_Tag_Product

 * @subpackage wc_tag_on_products/classes

 */



/**

 * Register all actions and filters for the plugin.

 *

 * Maintain a list of all hooks that are registered throughout

 * the plugin, and register them with the WordPress API. Call the

 * run function to execute the list of actions and filters.

 *

 * @package    WC_Tag_Product

 * @subpackage wc_tag_on_products/classes

 * @author     Junaid <junaidali.it@gmail.com>

 */

class Wc_Tag_Activator {



	/**

	 * Short Description. (use period)

	 *

	 * Long Description.

	 *

	 * @since    1.0.0

	 */

	public static function activate() {

		  global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'wctag_products';

        if($wpdb->get_var("show tables like '$table_name'") != $table_name)
        {
            $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		status smallint(5) NOT NULL,
		number_of_days mediumint(9) NOT NULL,
		tag_txt VARCHAR(50) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

             $wpdb->insert(
                $table_name,
                array(
                    'status' => 1,
                    'number_of_days' => 1
                )
            );

        }
        else{

              global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'wctag_products';

        	$wpdb->query( "DROP TABLE IF EXISTS ".$table_name );

            $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        status smallint(5) NOT NULL,
        number_of_days mediumint(9) NOT NULL,
        tag_txt VARCHAR(50) NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

             $wpdb->insert(
                $table_name,
                array(
                    'status' => 1,
                    'number_of_days' => 1
                )
            );
             
        }



	}



}


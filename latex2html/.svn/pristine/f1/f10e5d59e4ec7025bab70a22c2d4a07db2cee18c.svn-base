<?php

defined('ABSPATH') or exit;

if(!interface_exists('l2h_db_interface')) {
    interface l2h_db_interface
    {
        public function l2h_db_create();
        public static function l2h_db_update(array $bibdata);
        public static function l2h_db_drop($dbname);
    }
}

if(!class_exists('l2h_db_class')) {
    class l2h_db_class implements l2h_db_interface
    {
        private $l2h_db_version = l2h_main_class::l2hdbVER;

        public function l2h_db_create()
        {
            global $wpdb;
            $tab_name        = $wpdb->prefix . 'l2hbibtex';
            $charset_collate = $wpdb->get_charset_collate();
            
              // Define the SQL query
            $sql = "CREATE TABLE $tab_name (
                id mediumint NOT NULL AUTO_INCREMENT,
                type text NOT NULL,
                bibkey text NOT NULL,
                author tinytext NOT NULL,
                title text,
                series tinytext,
                edition tinytext,
                publisher text,
                year YEAR(4) NOT NULL,
                booktitle text,
                editor tinytext,
                journal tinytext,
                fjournal tinytext,
                school tinytext DEFAULT '',
                volume tinytext,
                number tinytext,
                pages tinytext,
                doi tinytext, 
                issn tinytext,
                mrnumber tinytext,
                note text DEFAULT '' NOT NULL,
                implementationurl tinytext DEFAULT '' NOT NULL,
                paperurl tinytext DEFAULT '' NOT NULL,
                tags tinytext DEFAULT '' NOT NULL,
                `creation_time` timestamp DEFAULT 0 NOT NULL,
                `update_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,    
                PRIMARY KEY (id)
            ) $charset_collate;";
            
              // Include the upgrade file
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            
              // Check if table exists, if not, create it
            if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $tab_name)) != $tab_name) {
                  // Execute dbDelta and suppress any warnings or errors
                @dbDelta($sql);
                
                // Check for any errors after the query execution
                if ($wpdb->last_error) {
                    // Use WP_Error for error reporting instead of error_log
                    $error = new WP_Error();
                    $error->add('db_error', sprintf('Failed to create table %s: %s', $tab_name, $wpdb->last_error));
                    
                    // You can either log it or display it in a user-friendly way
                    // For example, display the error in admin
                    if (is_admin()) {
                        echo '<div class="error"><p>' . esc_html($error->get_error_message()) . '</p></div>';
                    }
                }
            } 
        }



        public static function l2h_db_update(array $bibdata)
        {
            global $wpdb;
            $tab_name = $wpdb->prefix . 'l2hbibtex';
            $wpdb->insert(
                $tab_name,
                $bibdata
            );
              // var_export($bibdata);
        }

        public static function l2h_db_drop($dbname)
        {
            global $wpdb;
        
                                                                // Sanitize the table name, as we cannot use placeholders for table names
            $tab_name = $wpdb->prefix . sanitize_key($dbname);  // sanitize_key ensures safe table names
        
              // Prepare the query (with placeholders for dynamic values)
            $wpdb->query( $wpdb->prepare("DROP TABLE IF EXISTS %s", $tab_name) );
        
                                                                            // Reset the db version safely
            $upgrade_options = get_option('l2h_upgrade_options', array());  // Use default to avoid errors
            if (isset($upgrade_options['dbVER'])) {
                $upgrade_options['dbVER'] = '1.0.0';
                update_option('l2h_upgrade_options', $upgrade_options);
            }
        }
        

          /**
         * Upgrade for database, version: 1.0.0
         */
        public static function l2h_db_upgradefrom_100_callback()
        {
              // need to check update_confirm value
            $upgrade_options = get_option('l2h_upgrade_options');
            if(isset($upgrade_options['upgrade_confirm']) && $upgrade_options['upgrade_confirm']) {
                if(version_compare($upgrade_options['dbVER'], '1.0.0') > 0) {
                    return;
                }

                global $wpdb;
                  // First we need to delete the table
                self::l2h_db_drop('l2hbibtex');
                $tab_name = $wpdb->prefix . 'l2hbibtex';
                  // new sql datatable
                $sql = "CREATE TABLE $tab_name(
          id mediumint NOT NULL AUTO_INCREMENT,
          type text NOT NULL,
          bibkey text NOT NULL,
          author tinytext NOT NULL,
          title text,
          series tinytext,
          edition tinytext,
          publisher text,
          year YEAR(4) NOT NULL,
          booktitle text,
          editor tinytext,
          journal tinytext,
          fjournal tinytext,
          school tinytext DEFAULT '',
          volume tinytext,
          number tinytext,
          pages tinytext,
          doi tinytext, 
          issn tinytext,
          mrnumber tinytext,
          note text DEFAULT '' NOT NULL,
          implementationurl tinytext DEFAULT '' NOT NULL,
          paperurl tinytext DEFAULT '' NOT NULL,
          tags tinytext DEFAULT '' NOT NULL,
          `creation_time` timestamp DEFAULT 0 NOT NULL,
          `update_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	
          PRIMARY KEY (id)
        );";
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
                $upgrade_options['dbVER']           = l2h_settings_class::l2h_upgrade_vernum('1.0.0');
                $upgrade_options['upgrade_confirm'] = false;
                update_option('l2h_upgrade_options', $upgrade_options);
                  //die( get_option('l2h_upgrade_options')['dbVER']);
                echo esc_html__('The database upgrade successfully!', 'latex2html') ."<br />";
            } else {
                echo esc_html__('This update will lose your bibtex data, please backup the `wp_l2hbibtex` table at first!', 'latex2html') . "<br />";
            }
        }
          /*
        public static function l2h_db_upgradefrom_101_callback()
          {
            if( isset( $upgrade_options['upgrade_confirm'] ) && $upgrade_options['upgrade_confirm'] ){
              $upgrade_options = get_option( 'l2h_upgrade_options' );
              if( version_compare( $upgrade_options['dbVER'] , '1.0.1' ) > 0 )
                return;


              $upgrade_options['dbVER']           = l2h_settings_class::l2h_upgrade_vernum( '1.0.1');
              $upgrade_options['upgrade_confirm'] = false;
              update_option( 'l2h_upgrade_options', $upgrade_options );
            }
        */

          /*
          public static function l2h_db_upgradefrom_110_callback()
          {
            if( isset( $upgrade_options['upgrade_confirm'] ) && $upgrade_options['upgrade_confirm'] ){
              $upgrade_options = get_option( 'l2h_upgrade_options' );
              if( version_compare( $upgrade_options['dbVER'] , '1.1.0' ) > 0 )
                return;
            }
          }
         */
    }
}

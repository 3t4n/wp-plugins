<?php

defined( 'ABSPATH' ) or exit;

class adoric_uninstall
{
    
    public function __construct() {
        register_deactivation_hook( ADORIC__FILE__, ['adoric_uninstall', 'wp_adoric_deactivate'] );
        register_uninstall_hook( ADORIC__FILE__, ['adoric_uninstall', 'wp_adoric_uninstall'] );
    }
    
    public static function wp_adoric_deactivate() {
        self::adoric_delete_options();
    }

    public static function wp_adoric_uninstall() {
        if ( is_multisite() ) {
            global $wpdb;

            $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

            foreach ( $blog_ids as $blog_id ) {
                switch_to_blog( $blog_id );

                ADORICWP::instance()->sql->delete_adoric_table();

                restore_current_blog();
            }
        } else {
            ADORICWP::instance()->sql->delete_adoric_table();
        }
        
        self::adoric_delete_options();
    }

    public static function adoric_delete_options()
    {
        add_action( 'admin_menu', 'adoric_remove_menu_item' );
        flush_rewrite_rules();
    }
    
    public function adoric_remove_menu_item() {
        remove_menu_page( plugin_dir_path(ADORIC__FILE__) . 'views/settings.php' );
        remove_menu_page( plugin_dir_path(ADORIC__FILE__) . 'views/dashboard.php');
    }
}

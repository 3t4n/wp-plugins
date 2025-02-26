<?php

defined( 'ABSPATH' ) or exit;

class adoric_activated
{
    public function __construct()
    {
        register_activation_hook( ADORIC__FILE__, ['adoric_activated', 'wp_adoric_activate'] );
    }
    
    public static function wp_adoric_activate() {
        if ( is_multisite() && $network_wide ) {
            
            global $wpdb;

            $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

            foreach ( $blog_ids as $blog_id ) {
                switch_to_blog( $blog_id );

                ADORICWP::instance()->sql->create_adoric_table();

                restore_current_blog();
          }
        } else {
            ADORICWP::instance()->sql->create_adoric_table();
        }
        
        flush_rewrite_rules();
    }

}

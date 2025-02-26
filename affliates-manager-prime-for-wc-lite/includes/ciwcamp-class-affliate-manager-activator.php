<?php

/**
 * Fired during plugin activation
 *
 * @link       http://codexinfra.com
 * @since      1.0.0
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Ciwcamp_Affliate_Manager_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
    public function ciwcamp_activate() 
    {
        $this->ciwcamp_check_woocommerce_activate();
	}
	

    /**
	 * This function is used to check whether the woocommerce activated or not
	 * @since    1.0.0
	 */

    function ciwcamp_check_woocommerce_activate()
    {
        if ( class_exists( 'WooCommerce' ) )
        {
            $this->ciwcamp_create_sales_table();
            
            $this->ciwcamp_create_withdraw_table();
            
            $this->ciwcamp_create_visits_table();
            
            $this->ciwcamp_create_affiliate_page();
        
        }
        else
        {
            exit(esc_html__('Woocommerce must be actived to install this plugin','ciwcamp-affliate-manager'));
        }
    }
    
    /**
	 * Create sale table
	 * @since    1.0.0
	 */
	 
    public function ciwcamp_create_sales_table()
    { 
        global $wpdb;   
    
        $ciwcamp_table_name = $wpdb->prefix . "ciwcamp_sales";

        $charset_collate = $wpdb->get_charset_collate();

        if( isset($ciwcamp_table_name) && isset( $charset_collate ) ) {

            $sql = "CREATE TABLE $ciwcamp_table_name (
                sales_id BIGINT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                affiliate_id BIGINT( 20 ) NOT NULL,
                order_id BIGINT( 20 ) NOT NULL,
                product_id VARCHAR( 255 ) NOT NULL,
                product_price VARCHAR( 255 ) NOT NULL,
                commission VARCHAR( 255 ) NOT NULL,
                milestone_type VARCHAR( 255 ) NOT NULL,
                milestone_value VARCHAR( 255 ) NOT NULL,
                source VARCHAR( 255 ) NOT NULL,
                status VARCHAR( 255 ) DEFAULT 'Pending',
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) $charset_collate;";
            
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			if( isset($sql) )
			{
				dbDelta( $sql );
			}
        }
    }


    /**
	 * Create withdraw table
	 * @since    1.0.0
	 */
	 
    public function ciwcamp_create_withdraw_table()
    {
        global $wpdb;   
    
        $ciwcamp_table_name = $wpdb->prefix . "ciwcamp_withdraw";

        $charset_collate = $wpdb->get_charset_collate();

        if( isset( $ciwcamp_table_name ) && isset( $charset_collate ) ) {

            $sql = "CREATE TABLE $ciwcamp_table_name (
                withdraw_id BIGINT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                affiliate_id VARCHAR( 255 ) NOT NULL,
                withdraw_amt VARCHAR( 255 ) NOT NULL,
                withdraw_method VARCHAR( 255 ) NOT NULL,
                status VARCHAR( 255 )   DEFAULT 'Pending',
                about VARCHAR( 255 ) NOT NULL,
                modified_date DATE,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) $charset_collate;";
            
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			if( isset($sql) )
			{
				dbDelta( $sql );
			}
        }
    }


    /**
	 * Create visit table
	 * @since    1.0.0
	 */
	 
    public function ciwcamp_create_visits_table()
    {
        global $wpdb;   
    
        $ciwcamp_table_name = $wpdb->prefix . "ciwcamp_visits";

        $charset_collate = $wpdb->get_charset_collate();
    
        if( isset( $ciwcamp_table_name ) && isset( $charset_collate ) ) {
            $sql = "CREATE TABLE $ciwcamp_table_name (
                visits_id BIGINT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                visitor_id VARCHAR( 255 ) NOT NULL,
                affiliate_id BIGINT( 20 ) NOT NULL,
                status VARCHAR( 255 )  DEFAULT 'Visited',
    			modified_date DATE,
    			created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) $charset_collate;";
            
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			if( isset($sql) )
			{
				dbDelta( $sql );
			}
        }
    }


    /**
	 * Create affiliate page
	 * @since    1.0.0
	 */
    public function ciwcamp_create_affiliate_page()
    { 
        global $user_ID;

        if( get_page_by_title('Affiliate Dashboard')==NULL )
        {
            $new_post = array(
                    'post_title' => 'Affiliate Dashboard',
                    'post_status' => 'publish',
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_author' => $user_ID,
                    'post_type' => 'page'
                );
    	    $post_id = wp_insert_post($new_post);
       }   
    }

}

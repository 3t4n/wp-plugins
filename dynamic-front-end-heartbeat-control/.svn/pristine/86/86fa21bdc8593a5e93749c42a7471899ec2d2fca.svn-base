<?php
namespace DynamicHeartbeat;

defined('ABSPATH') or die();

class DfehcUnclogger {
     
    protected $db = null;
    protected $cli = null;

  
    public function __construct() {
      
        if (defined('WP_CLI') && WP_CLI) {
            require_once(DfehcUnclogger::get_plugin_path() . 'defibrillator/cli-helper.php');
        }

        $this->db = new DfehcUncloggerDb();

        load_plugin_textdomain('dynamic-front-end-heartbeat-control', false, dirname(plugin_basename(__FILE__)) . '/languages');
 }
	public static function get_plugin_path() {
        return plugin_dir_path(__FILE__);
    }
	
    public function set_default_settings() {
        if( get_option( 'dfehc_unclogger_settings' ) ) {
            return;
        }
        update_option( 'dfehc_unclogger_settings', $this->default_settings, true );
    }
	
    public function count_woocommerce_transients() {
    
		return $this->db->count_woocommerce_transients();
}

    public function delete_woocommerce_transients() {
    
		return $this->db->delete_woocommerce_transients();
}

    public function clear_woocommerce_cache() {
    
		return $this->db->clear_woocommerce_cache();
}
    
    }

 function dfehc_permission_check() {
        return apply_filters('dfehc_unclogger_permission_check', current_user_can('manage_options'));
    }

      function dfehc_optimize_db( $req ) {
        $tool = isset($req['tool']) ? $req['tool'] : null;
        if( ! $tool ) {
            return new WP_Error('no_tool_specified');
        }
        if( ! method_exists($this->db, $tool) ) {
            return new WP_Error('no_matching_tool_found');
        }
        call_user_func(array($this->db, $tool));
        return $this->get_settings();
    }

 function dfehc_register_rest_routes() {
        register_rest_route( 'dfehc-unclogger/v1', '/get/', array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'permission_check'),
            'callback' => array($this, 'get_settings'),
        ) );
        register_rest_route( 'dfehc-unclogger/v1', '/optimize-db/(?P<tool>.*)', array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'permission_check'),
            'callback' => array($this, 'optimize_db'),
        ) );
        register_rest_route( 'dfehc-unclogger/v1', '/set/', array(
            'methods' => 'POST',
            'permission_callback' => array($this, 'permission_check'),
            'callback' => array($this, 'set_setting'),
        ) );
    }

      function dfehc_set_setting( $req ) {
        $data = $req->get_json_params();

        $setting = $data['setting'];
        $value = $data['value'];

        $method = 'set_'.strtolower($setting);
        return $this->tweaks->{$method}($value);
    }

     function dfehc_get_option( string $option_name ) {
        $settings = get_option( 'dfehc_unclogger_settings', array() );
        if( ! array_key_exists( $option_name, $settings ) ) {
            return false;
        }
        return $settings[$option_name];
    }

     function dfehc_update_option( string $option_name, $value ) {
        $settings = get_option( 'dfehc_unclogger_settings' );
        $settings[$option_name] = $value;
        update_option( 'dfehc_unclogger_settings', $settings, true );
    }

$dfehc_unclogger = new dfehcUnclogger();

class dfehcUncloggerDb extends dfehcUnclogger {

     public function __construct() {}


     public function get_database_size() {
        global $wpdb;
        $size = $wpdb->get_var("SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) FROM information_schema.tables WHERE TABLE_SCHEMA = '{$wpdb->dbname}' GROUP BY table_schema");
        return $size . 'MB';
    }

     public function count_trashed_posts() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_status = 'trash'");
        return $count;
    }

     public function delete_trashed_posts() {
        global $wpdb;
        $count = $wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_status = 'trash'");

}

     public function count_revisions() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type = 'revision'");
        return $count;
    }

     public function delete_revisions() {
        global $wpdb;
        $count = $wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_type = 'revision'");
        return $count;
    }

     public function delete_auto_drafts() {
        global $wpdb;
        $count = $wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_status = 'auto-draft'");
        return $count;
    }
	
	 public function count_auto_drafts() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_status = 'auto-draft'");
        return $count;
    }

     public function count_orphaned_postmeta() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) pm FROM {$wpdb->prefix}postmeta pm LEFT JOIN {$wpdb->prefix}posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL");
        return $count;
    }

     public function count_tables_with_different_prefix() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(TABLE_NAME) FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$wpdb->dbname}' AND TABLE_NAME NOT LIKE '{$wpdb->base_prefix}%'");
        return $count;
    }
	
	 public function delete_orphaned_postmeta() {
        global $wpdb;
        $count = $wpdb->query("DELETE pm FROM {$wpdb->prefix}postmeta pm LEFT JOIN {$wpdb->prefix}posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL");
        return $count;
    }
	
     public function count_woocommerce_transients() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->options} WHERE option_name LIKE '%woocommerce_%transient%'");
        return $count;
    }

    public function delete_woocommerce_transients() {
        global $wpdb;
        $count = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '%woocommerce_%transient%'");
        return $count;
    }
	
    public function clear_woocommerce_cache() {
        if (function_exists('wc_delete_product_transients')) {
            wc_delete_product_transients();
        }

        if (function_exists('wc_cache_helper')) {
            wc_cache_helper()->clear_cache();
        }

        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }
        
        return true;
    }

     public function list_tables_with_different_prefix() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$wpdb->dbname}' AND TABLE_NAME NOT LIKE '{$wpdb->base_prefix}%'",
            $output = 'ARRAY_A'
        );

        $tables = array();

        foreach( $query as $table ) {
            $tables []= $table['TABLE_NAME'];
        }

        $list = implode( ', ', $tables );

        return $list;

    }
	
	     public function drop_tables_with_different_prefix() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$wpdb->dbname}' AND TABLE_NAME NOT LIKE '{$wpdb->base_prefix}%'",
            $output = 'ARRAY_A'
        );

        $count = 0;

        foreach( $query as $table ) {
            $table_name = $table['TABLE_NAME'];
            $wpdb->query("DROP TABLE {$table_name}");
            $count++;
        }
        
        return $count;

    }

     public function count_expired_transients() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SELECT 'option_name', 'option_value' FROM {$wpdb->prefix}options WHERE 'option_name' LIKE '_transient_timeout%'",
            $output = 'ARRAY_A'
        );
        
        $count = 0;
        
        foreach( $query as $transient ) {

            $expiration_time = $transient['option_value'];

            if( $expiration_time < time() ) {
                $count++;
            }

        }

        return strval($count);

    }

     public function delete_expired_transients() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SELECT 'option_name', 'option_value' FROM {$wpdb->prefix}options WHERE 'option_name' LIKE '_transient_timeout%'",
            $output = 'ARRAY_A'
        );

        $count = 0;
        
        foreach( $query as $transient ) {

            $expiration_time = $transient['option_value'];

            if( $expiration_time < time() ) {

                $transient_name = str_replace( '_transient_timeout_', '', $transient['option_name'] );

                $wpdb->query("DELETE FROM {$wpdb->prefix}options WHERE 'option_name' LIKE '_transient_{$transient_name}'");
                $wpdb->query("DELETE FROM {$wpdb->prefix}options WHERE 'option_name' LIKE '_transient_timeout_{$transient_name}'");

                $count++;

            }

        }

        return $count;

    }

     public function count_myisam_tables() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SHOW TABLE STATUS WHERE Engine = 'MyISAM'",
            $output = 'ARRAY_A'
        );

        $count = 0;

        foreach( $query as $table ) {
            $count++;
        }
        
        return $count;

    }

     public function list_myisam_tables() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SHOW TABLE STATUS WHERE Engine = 'MyISAM'",
            $output = 'ARRAY_A'
        );

        $my_isam_tables = array();

        foreach( $query as $table ) {
            $my_isam_tables []= $table['Name'];
        }

        $list = implode( ', ', $my_isam_tables );
        
        return $list;

    }

     public function convert_to_innodb() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SHOW TABLE STATUS WHERE Engine = 'MyISAM'",
            $output = 'ARRAY_A'
        );

        $count = 0;

        foreach( $query as $table ) {
            $table_name = $table['Name'];
            $wpdb->query("ALTER TABLE {$table_name} ENGINE=InnoDB");
            $count++;
        }
        
        return $count;

    }

     public function optimize_tables() {

        global $wpdb;

        $query = $wpdb->get_results(
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$wpdb->dbname}'",
            $output = 'ARRAY_A'
        );

        $count = 0;

        foreach( $query as $table ) {
            $table_name = $table['TABLE_NAME'];
            $wpdb->query("OPTIMIZE TABLE {$table_name}");
            $count++;
        }
        
        return $count;

    }
    public function set_wp_post_revisions( $value ) {
        if( $value == 'default' ) {
            return $this->config->remove('constant', 'WP_POST_REVISIONS');
        }
        return $this->config->update('constant', 'WP_POST_REVISIONS', $value);
    }
    public function count_tables() {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(TABLE_NAME) FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$wpdb->dbname}'");
        return $count;
    }
    
     public function optimize_all() {
        $this->delete_trashed_posts();
        $this->delete_revisions();
        $this->delete_auto_drafts();
        $this->delete_orphaned_postmeta();
        $this->drop_tables_with_different_prefix();
        $this->delete_expired_transients();
        $this->convert_to_innodb();
        $this->optimize_tables();
    }

}
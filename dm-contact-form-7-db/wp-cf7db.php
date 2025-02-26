<?php
/*
Plugin name: DM Contact Form 7 DB
Plugin URI: mailto:davanwp@gmail.com
Description: Save Contact Form 7 entries.
Author: Devendra Mer
Author URI: mailto:davanwp@gmail.com
Text Domain: wp-cf7db
Domain Path: /languages/
Version: 1.0.1
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 *
 * @class    WP_CF7DB
 * @version  1.0.1
 */
class WP_CF7DB  {

    /* Plugin version. */
	const VERSION = '1.0.1';
	
	/* Support URL. */
	const SUPPORT_URL = 'mailto:davanwp@gmail.com';

    protected static $_instance = null;

    /**
	 * Main WP_CF7DB Instance.
	 *
	 * Ensures only one instance of WP_CF7DB is loaded or can be loaded.
	 *
	 * @static
	 * @see WP_CF7DB()
	 * @return WP_CF7DB - Main instance
	 * @since 1.0.0
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


    /**
     * Plugin Constructor method
    */
    public function __construct()
    {
        add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
    }

    /**
	 * The plugin URL.
	 *
	 * @return string
	 */
	public function plugin_url() {
		return plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) );
	}

	/**
	 * The plugin path.
	 *
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Plugin version getter.
	 *
	 * @since  1.0.0
	 *
	 * @param  boolean  $base
	 * @param  string   $version
	 * @return string
	 */
	public function plugin_version( $base = false, $version = '' ) {

		$version = $version ? $version : self::VERSION;

		if ( $base ) {
			$version_parts = explode( '-', $version );
			$version       = sizeof( $version_parts ) > 1 ? $version_parts[ 0 ] : $version;
		}

		return $version;
	}


	/**
	 * Plugin base path name getter.
	 *
	 * @return string
	 */
	public function plugin_basename() {
		return plugin_basename( __FILE__ );
	}

	/**
	 * Define constants if not present.
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	protected function maybe_define_constant( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	
	/**
	 * Plugin Loaded.
	 */
	public function plugins_loaded() {

		$this->define_constants();

		// Add init hooks.
		add_action( 'init', array( $this, 'init_textdomain' ) );
		add_action( 'admin_init', array( $this, 'activate' ) );
		add_filter( 'plugin_row_meta', array( $this, 'plugin_meta_links' ), 10, 4 );
		add_filter( 'plugin_action_links_' . WP_CF7DB()->plugin_basename(),  array( $this, 'plugin_settings_links') );
		add_action( 'wpcf7_before_send_mail',  array( $this, 'before_send_mail' ) );

		$this->includes();
	}


	/**
	 * Define constants.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	protected function define_constants() {
		$this->maybe_define_constant( 'WP_CF7DB_ABSPATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
        $this->maybe_define_constant( 'WP_CF7DB_SLUG', 'wp-cf7db' );
	}

	/**
	 * Include plugin files.
	 * 
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function includes() {
		
        // Classes.

		require_once( WP_CF7DB_ABSPATH . 'inc/admin-menu-page.php' );
		require_once( WP_CF7DB_ABSPATH . 'inc/admin-records-page.php' );
		require_once( WP_CF7DB_ABSPATH . 'inc/admin-record-details.php' );
		require_once( WP_CF7DB_ABSPATH . 'inc/export.php' );
        require_once( WP_CF7DB_ABSPATH . 'inc/script-enquer.php' );

		$csv = new WP_CF7DB_Export_CSV();

		if( isset($_REQUEST['exportcsv']) && ( $_REQUEST['exportcsv'] == true ) && isset( $_REQUEST['nonce'] ) ) {

            $nonce  = filter_input( INPUT_GET, 'nonce', FILTER_SANITIZE_STRING );

            if ( ! wp_verify_nonce( $nonce, 'dnonce' ) ) wp_die('Invalid nonce..!!');

            $csv->download_csv_file();
        }

		new WP_CF7DB_Admin_Menu();

	}

    /**
	 * Load textdomain.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public function init_textdomain() {
		load_plugin_textdomain( 'wp-cf7db', false, dirname( $this->plugin_basename() ) . '/languages/' );
	}
    

    /**
	 * Adds plugin page links
	 * 
	 * @since 1.0.0
	 * @param array $links all plugin links
	 * @return array $links all plugin links + our custom links (i.e., "Settings")
	 */
	
	public function plugin_settings_links( $links ) {

		$plugin_links = array(
			'<a href="' . admin_url( 'admin.php?page=wp-cf7db' ) . '">' . __( 'Settings', 'wp-cf7db' ) . '</a>'
		);

		return array_merge( $plugin_links, $links);
	}


	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param	mixed  $links
	 * @param	mixed  $file
	 * @return	array
	 */
	public static function plugin_meta_links(  $links, $file ) {

		if ( $file === WP_CF7DB()->plugin_basename() ) {
		
			$row_meta = array(
				'support' => '<a href="' . self::SUPPORT_URL . '">' . __( 'Support', 'wp-cf7db' ) . '</a>',
			);

			return array_merge( $links, $row_meta );
		}

		return $links;
	}

    /**
	 * Store plugin version.
	 * 
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function activate() {

		$version = get_option( 'wp_cf7db_version', false );
		if ( ! $version ) {
			add_option( 'wp_cf7db_version', self::VERSION );
		} elseif ( version_compare( $version, self::VERSION, '<' ) ) {
			update_option( 'wp_cf7db_version', self::VERSION );
		}

        $this->wp_cf7db_create_table();


	}

    /**
     * Create Database Table.
     * 
     * @since 1.0.0
     * 
     * @return void
    */
    public function wp_cf7db_create_table(){

        global $wpdb;
        $wp_cf7db       = apply_filters( 'wp_cf7db_database', $wpdb );
        $table_name = $wp_cf7db->prefix.'cf7db_forms';
    
        if( $wp_cf7db->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {
    
            $charset_collate = $wp_cf7db->get_charset_collate();
    
            $sql = "CREATE TABLE $table_name (
                id bigint(20) NOT NULL AUTO_INCREMENT,
                form_id bigint(20) NOT NULL,
                form_value longtext NOT NULL,
                form_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;";
    
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
        }
    
        $upload_dir    = wp_upload_dir();
        $wp_cf7db_dirname = $upload_dir['basedir'].'/wp_cf7db_uploads';
        if ( ! file_exists( $wp_cf7db_dirname ) ) {
            wp_mkdir_p( $wp_cf7db_dirname );
            $fp = fopen( $wp_cf7db_dirname.'/index.php', 'w');
            fwrite($fp, "<?php \n\t // Silence is golden.");
            fclose( $fp );
        }
        add_option( 'wp_cf7db_install_date', date('Y-m-d G:i:s'), '', 'yes');
    
    }

    function before_send_mail( $form_tag ) {

        global $wpdb;
        $wp_cf7db      = apply_filters( 'wp_cf7db_database', $wpdb );
        $table_name    = $wp_cf7db->prefix.'cf7db_forms';
        $upload_dir    = wp_upload_dir();
        $wp_cf7db_dirname = $upload_dir['basedir'].'/wp_cf7db_uploads';
        $time_now      = time();
    
        $submission   = WPCF7_Submission::get_instance();
        $contact_form = $submission->get_contact_form();
        $tags_names   = array();
        $strict_keys  = apply_filters('wp_cf7db_strict_keys', false);  
    
        if ( $submission ) {
    
            $allowed_tags = array();
    
            if( $strict_keys ){
                $tags  = $contact_form->scan_form_tags();
                foreach( $tags as $tag ){
                    if( ! empty($tag->name) ) $tags_names[] = $tag->name;
                }
                $allowed_tags = $tags_names;
            }
    
            $not_allowed_tags = apply_filters( 'wp_cf7db_not_allowed_tags', array( 'g-recaptcha-response' ) );
            $allowed_tags     = apply_filters( 'wp_cf7db_allowed_tags', $allowed_tags );
            $data             = $submission->get_posted_data();
            $files            = $submission->uploaded_files();
            $uploaded_files   = array();

            foreach ($files as $file_key => $file) {
				array_push($uploaded_files, $file_key);
                $file = is_array( $file ) ? reset( $file ) : $file;
                if( empty($file) ) continue;
                copy($file, $wp_cf7db_dirname.'/'.$time_now.'-'.$file_key.'-'.basename($file));
            }
    
            $form_data   = array();
    
            $form_data['wp_cf7db_status'] = 'unread';
            foreach ($data as $key => $d) {
                
                if( $strict_keys && !in_array($key, $allowed_tags) ) continue;
    
                if ( !in_array($key, $not_allowed_tags ) && !in_array($key, $uploaded_files )  ) {
    
                    $tmpD = $d;
    
                    if ( ! is_array($d) ){
                        $bl   = array('\"',"\'",'/','\\','"',"'");
                        $wl   = array('&quot;','&#039;','&#047;', '&#092;','&quot;','&#039;');
                        $tmpD = str_replace($bl, $wl, $tmpD );
                    }
    
                    $form_data[$key] = $tmpD;
                }
                if ( in_array($key, $uploaded_files ) ) {
                    $file = is_array( $files[ $key ] ) ? reset( $files[ $key ] ) : $files[ $key ];
                    $file_name = empty( $file ) ? '' : $time_now.'-'.$key.'-'.basename( $file ); 
                    $form_data[$key.'wp_cf7db_file'] = $file_name;
                }
            }
    
            /* wp_cf7db before save data. */
            $form_data = apply_filters('wp_cf7db_before_save_data', $form_data);
    
            do_action( 'wp_cf7db_before_save', $form_data );
    
            $form_id = $form_tag->id();
            $form_value   = serialize( $form_data );
            $form_date    = current_time('Y-m-d H:i:s');
    
            $wp_cf7db->insert( $table_name, array(
                'form_id'      => $form_id,
                'form_value'   => $form_value,
                'form_date'    => $form_date
            ) );
    
            /* wp_cf7db after save data */
            $insert_id = $cfdb->insert_id;
            do_action( 'wp_cf7db_after_save_data', $insert_id );
        }
    
    }

	/**
	 * Clean-up on de-activation.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function deactivate() {
	
	}


    

}

/**
 * Returns the main instance of WP_CF7DB to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return WP_CF7DB
 */
function WP_CF7DB() {
	return WP_CF7DB::instance();
}
  
// This code runs during plugin deactivation.
register_deactivation_hook( __FILE__, 'deactivate_WP_CF7DB' );
function deactivate_WP_CF7DB(){
	WP_CF7DB()->deactivate();
}


// Launch the whole plugin.
$GLOBALS[ 'wp_cf7db' ] = WP_CF7DB();
<?php
/**
 * Plugin Name: Ajax Custom CSS/JS
 * Plugin URI: https://wordpress.org/plugins/ajax-awesome-css/
 * Description: Add custom CSS/JSS to your website without modifying the CSS/JS files of the theme or plugin with the help of ajax functionality.You can change the background of editor and can adjust the site of the font. 
 * Version: 2.0.4
 * Author: Harpreet Singh
 * Author URI: https://profiles.wordpress.org/harry005
 * License: GNU General Public License v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/
if( ! defined( 'ABSPATH' ) ) {
	die();
}
if (!class_exists( 'HSAwsomeCustomCss' ) ) :
final class HSAwsomeCustomCss{
	protected static $_instance = null; 
	  /**
			Getting the instance of class
     */
	 public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	function hsawesome_install() {
		global $hsawesome_db_version;
		$hsawesome_db_version='2.0.2';
		global $wpdb;
		$installed_ver = get_option( "hsawesome_db_version" ,'1.0');
		if( $installed_ver != $hsawesome_db_version) {
		$table_name = $wpdb->prefix . 'awesomecustom';
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			awesomecss longtext NOT NULL,
			awesometheme longtext NOT NULL,
			awesomethemejs longtext NOT NULL,
			awesomejs longtext NOT NULL,
			awesomefontcss longtext NOT NULL,
			awesomefontjs longtext NOT NULL,
			UNIQUE KEY id (id) 
		) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		update_option( "hsawesome_db_version", $hsawesome_db_version );

		}
	}

	function myplugin_update_db_check() {
				global $hsawesome_db_version;
				$hsawesome_db_version='2.0.2';
				if ( get_option( 'hsawesome_db_version','1.0' ) != $hsawesome_db_version ) {
					$this->hsawesome_install();
					$this->hsawesome_install_data();
					
				}
	}	
	function hs_plugin_action_links($actions,$links){
		$hscss = array('hscss' => '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=hsaddacc') ) .'">Add CSS</a>');
		$hsjs = array('hsjs' => '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=hsaddaccjs') ) .'">Add JSS</a>');
		$hssupport = array('hssupport' => '<a href="https://wordpress.org/support/plugin/ajax-awesome-css" target="_blank">Support</a>');
		$actions = array_merge($hssupport, $actions);
		$actions = array_merge($hsjs, $actions);
		$actions = array_merge($hscss, $actions);
		return $actions;
	}
	
	function hsawesome_install_data() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'awesomecustom';
		$custom_query = 'SELECT * FROM '.$table_name.' where id =1';
		$checkdata = $wpdb->get_results($custom_query);
		$checkdata;
		 if($checkdata != NULL){
			$tt= $wpdb->update( 
			$table_name, 
				array( 
					'awesometheme' => '',
					'awesomethemejs' => '',
					'awesomefontcss' => '13',
					'awesomefontjs' => '13'
				),
				array( 'id' => 1 )
			);
			}
			else{
				$tt= $wpdb->insert( 
			$table_name, 
				array( 
					'awesomecss' => '',
					'awesomejs' => '',
					'awesometheme' => '',
					'awesomethemejs' => '',
					'awesomefontcss' => '13',
					'awesomefontjs' => '13',
					'id' => 1
				) 
			);
			}
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta($tt );
}
	
	
	public function __construct(){
		add_action( 'plugins_loaded',  array( $this , 'myplugin_update_db_check') );
		add_action( 'plugin_action_links_' . plugin_basename(__FILE__),  array( $this , 'hs_plugin_action_links'),10,5 );
			 if ( is_admin() ) {
					include_once( 'includes/admin/admin-main.php' );
			}
			else{
					include_once('includes/frontend/frontend.php');
			}
	}
}
endif;
$HSAwsomeCustomCss = HSAwsomeCustomCss::instance();

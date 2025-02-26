<?php
namespace Admintosh\Admin;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */

class Admin_Hooks {

    function __construct() {
        
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );       
    }

    public function admin_enqueue_scripts( $hook ) {

        if( in_array( $hook, [ 'toplevel_page_admintosh-setting-admin','admintosh-settings_page_login-history' ] ) ) {
            
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_media();
            wp_enqueue_style( 'jquery-ui', ADMINTOSH_DIR_URL.'/admin/assets/css/jquery-ui.css', array(), '1.0', false );
            wp_enqueue_style( 'dataTables', ADMINTOSH_DIR_URL.'/admin/assets/css/dataTables.dataTables.css', array(), '1.0', false );
            wp_enqueue_style( 'select2', ADMINTOSH_DIR_URL.'/admin/assets/css/select2.min.css', array(), '1.0', false );
            wp_enqueue_style( 'admintosh-admin', ADMINTOSH_DIR_URL.'/admin/assets/css/admintosh-admin.css', array(), '1.0', false  );

            wp_enqueue_script( 'dataTables', ADMINTOSH_DIR_URL.'/admin/assets/js/dataTables.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'select2', ADMINTOSH_DIR_URL.'/admin/assets/js/select2.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'wp-color-picker-alpha', ADMINTOSH_DIR_URL.'/admin/assets/js/wp-color-picker-alpha.js', array('jquery','wp-color-picker'), '1.0', true );
            wp_enqueue_script( 'admintosh-admin', ADMINTOSH_DIR_URL.'/admin/assets/js/admintosh-admin.js', array('jquery', 'wp-color-picker','jquery-ui-slider' ), '1.0', true );

            wp_localize_script( 'admintosh-admin', 'admintosh_adminobj', 
                array(
                    'admin_url' => admin_url('admin-ajax.php')
                ) 
            );

        }
    }

}

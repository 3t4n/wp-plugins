<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('WPMICONSLITE_Admin_Ajax') ) {
    class WPMICONSLITE_Admin_Ajax extends WPMICONSLITE_Library {

    /**
     * All the Admin ajax related tasks are hooked
     *
     * @since 1.0.0
     */
     public function __construct() {
      add_action( 'wp_ajax_wpmi_show_lightbox_html', array( $this, 'fn_show_icon_content' ) );
      add_action( 'wp_ajax_wpmi_icon_settings_save', array( $this, 'wpmi_settings_save' ) );
     }

      /*
      * Popup Show Icon Options
      */
      public function fn_show_icon_content(){
      check_ajax_referer( 'wpmenuicon-ajax-nonce', 'admin_nonce' );
        if(isset($_POST) && $_POST['menu_item_id'] != '' && $_POST['menu_id'] != ''){
              $menu_item_title = sanitize_text_field($_POST['menu_item_title']);
              $menu_item_id = sanitize_text_field($_POST['menu_item_id']);
              $menuid = sanitize_text_field($_POST['menu_id']);
              $menuitemdepth = sanitize_text_field($_POST['menu_item_depth']);
              $wpmi_menu_settings = array_filter( (array) get_post_meta( $menu_item_id, '_wpmenuiconsettings', true ) );
              include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/icon-popup-settings.php');
          }  
          wp_die();
    }

   public function wpmi_settings_save(){
        if ( check_ajax_referer( 'wpmenuicon-ajax-nonce', 'wp_nonce' ) ) {
               $menu_item_id = absint( $_POST['menu_item_id'] );
               if ( isset( $_POST['wpmenuicon_settings'] ) && !empty( $_POST['wpmenuicon_settings'] ) ) {
                $wpmenuicon_item_settings = array();
                parse_str( $_POST['wpmenuicon_settings'], $wpmenuicon_item_settings );

                $_POST['wpmi_icon_settings']['general_settings']['disable_desktop'] = (isset($_POST['wpmm_settings']['general_settings']['disable_text']) && $_POST['wpmm_settings']['general_settings']['disable_text'] == true)?'true':'false';

                $get_existing_settings = get_post_meta( $menu_item_id, '_wpmenuiconsettings', true );
                if ( is_array( $get_existing_settings ) ) {
                  $wpmenuicon_item_settings = array_merge( $get_existing_settings, $wpmenuicon_item_settings );
                }
                update_post_meta( $menu_item_id, '_wpmenuiconsettings', $wpmenuicon_item_settings );
                wp_send_json_success();
              }
        }
        wp_die();
    }
  }
  new WPMICONSLITE_Admin_Ajax();
}
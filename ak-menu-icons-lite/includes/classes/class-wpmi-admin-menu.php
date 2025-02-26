<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( ! class_exists( 'WPMILITE_ADMIN_MENU' ) ) :
/**
 * Admin Menu Settings
 */
class WPMILITE_ADMIN_MENU extends WPMICONSLITE_Library{

	 /**
     * Constructor
     */
    public function __construct() {
     add_action( 'admin_head', array($this, 'addWPMenuIconMetaBox')); // Metabox on left of menu to enable megamenu
     add_action( 'admin_menu', array( $this, 'add_menu' ) );
     add_action( 'wp_ajax_wpmi_save_icon_settings', array( $this, 'fn_save_icon_settings' ) );
     add_action( 'admin_footer', array( $this, 'fn_admin_lighbox' ) );
     add_action( 'admin_init', array( $this, 'redirect_to_site' ), 1 );
     add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
     add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
    }

     function admin_footer_text( $text ){
        if(isset( $_GET[ 'page' ] )){
            if($_GET[ 'page' ] == 'ak-menu-icons-lite' || $_GET[ 'page' ] == 'akml-how-to-use'){
               $link = 'https://wordpress.org/support/plugin/ak-menu-icons-lite/reviews/#new-post';
                $pro_link = 'https://accesspressthemes.com/wordpress-plugins/wp-menu-icons/';
                $text = 'Enjoyed WP Menu Icons Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">WP Menu Icons</a> - more features, more power!';
            }
         }
        return $text;
        }

      function redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'akmil-doclinks' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/wp-menu-icons-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'akmil-premium' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/wp-menu-icons/' );
                exit();
            }
        }

      function plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'ak-menu-icons-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/wp-menu-icons-lite" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/wp-menu-icons-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/wp-menu-icons/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

    /*
     * WP Menu Icons Metabox Display
    */
    public function addWPMenuIconMetaBox(){
    	if (wp_get_nav_menus()) {
           add_meta_box('nav-menu-theme-wpmenuicon', esc_html__('WP Menu Icons Lite Settings', 'ak-menu-icons-lite'), array($this, 'createMenuIcons'), 'nav-menus', 'side', 'high');
        }
    }

    /*
     * WP Menu Icons Lite Add Menu
    */
    public function add_menu(){
            add_menu_page( __( 'About WP Menu Icons Lite', 'ak-menu-icons-lite' ), __( 'About WP Menu Icons Lite', 'ak-menu-icons-lite' ), 'manage_options', WPMICONSLITE_TD, array( $this, 'main_page' ),'' );
            add_submenu_page( WPMICONSLITE_TD, __( 'How to use', 'ak-menu-icons-lite' ), __( 'How to use', 'ak-menu-icons-lite' ), 'manage_options', 'akml-how-to-use', array( $this, 'how_to_use' ) );
            add_submenu_page( WPMICONSLITE_TD, __( 'Documentation','ak-menu-icons-lite' ), __( 'Documentation', 'ak-menu-icons-lite'  ), 'manage_options', 'akmil-doclinks', '__return_false', null, 9 );
            add_submenu_page( WPMICONSLITE_TD, __( 'Check Premium Version', 'ak-menu-icons-lite'  ), __( 'Check Premium Version', 'ak-menu-icons-lite'  ), 'manage_options', 'akmil-premium', '__return_false', null, 9 );
    }

    public function main_page(){
     include_once(WPMICONSLITE_PATH . '/includes/views/backend/about.php');
    }

    public function how_to_use(){
     include_once(WPMICONSLITE_PATH . '/includes/views/backend/how_to_use.php');
    }

    public function createMenuIcons(){
          $navigation_menus = wp_get_nav_menus();
		  if(!empty($navigation_menus)){
		    $current_menu_id = $this->current_menu_id();
		    $menu_object = wp_get_nav_menu_object( $current_menu_id );
            if(!empty($menu_object)){
                $menu_name = $menu_object->name;
                $menu_slug = $menu_object->slug;
            }else{
                $menu_name = '';
                $menu_slug = '';
            }
		    $wpmi_icon_settings = get_option('wpmi_icon_settings');

            $enable_menu_icon = (isset($wpmi_icon_settings['menuid_'.$current_menu_id]['enable_menu_icon']) && $wpmi_icon_settings['menuid_'.$current_menu_id]['enable_menu_icon'] == 1)?1:0;
		    $disable_icon_desktop = (isset($wpmi_icon_settings['menuid_'.$current_menu_id]['disable_icon_desktop']) && $wpmi_icon_settings['menuid_'.$current_menu_id]['disable_icon_desktop'] == 1)?1:0;
		    $disable_icon_mobile = (isset($wpmi_icon_settings['menuid_'.$current_menu_id]['disable_icon_mobile']) && $wpmi_icon_settings['menuid_'.$current_menu_id]['disable_icon_mobile'] == 1)?1:0;
            $hide_label  = (isset($wpmi_icon_settings['menuid_'.$current_menu_id]['hide_label']) && $wpmi_icon_settings['menuid_'.$current_menu_id]['hide_label'] == 1)?1:0;
		    $icon_position  = (isset($wpmi_icon_settings['menuid_'.$current_menu_id]['icon_position']) && $wpmi_icon_settings['menuid_'.$current_menu_id]['icon_position'] != '')?esc_attr($wpmi_icon_settings['menuid_'.$current_menu_id]['icon_position']):'left';

		    if(empty( $wpmi_icon_settings)){
		      $wpmi_icon_settings = array();
		    }
            include(WPMICONSLITE_PATH . 'includes/views/backend/navigation-menu-settings/wpmi-icon-metabox-options.php');
		 }else{
		  _e( 'No Any Menu Created.', 'ak-menu-icons-lite' );
		}
    }

   /*
   * Enable WP Menu Icons Metabox And Save Icon Settings
   * @menu_id Current Menu Id
   */
   public function fn_save_icon_settings(){
     check_ajax_referer( 'wpmenuicon-ajax-nonce', 'admin_nonce' );
     $iconsettings = array();
     if ( isset( $_POST['menu_id'] ) && $_POST['menu_id'] > 0) {
        if(is_nav_menu( $_POST['menu_id'] ) && isset( $_POST['menu_icon_meta'] )){
            $icon_metadata = json_decode( stripslashes(  $_POST['menu_icon_meta']  ), true );
            $wpmi_icon_settings = get_option( 'wpmi_icon_settings' );
            if(!empty($icon_metadata)){
                foreach ( $icon_metadata as $key => $val ) {
                $title = $val['name'];
                preg_match_all( "/\[(.*?)\]/", $title, $matches );
                if ( isset( $matches[1][0] ) && isset( $matches[1][1] ) ) {
                    $menuid = $matches[1][0];
                    $mysetting = $matches[1][1];
                    $iconsettings[$menuid][$mysetting] = $val['value'];
                }
              }
            }else{
                $menuidd = "menuid_".$_POST['menu_id'];
                $iconsettings[$menuidd]['enable_menu_icon'] = 0;
            }
            if (!$iconsettings) {
                update_option( 'wpmi_icon_settings', $iconsettings );
            } else {
                $added_settings = get_option( 'wpmi_icon_settings' );
                $settings = array_merge( (array)$added_settings, (array)$iconsettings );
                update_option( 'wpmi_icon_settings', $settings );
            }
        }
     }
     wp_die();
   }

    /*
    * Load Lightbox For Icon Settings
    */
    public function fn_admin_lighbox(){
     echo "<div class='wpmi_menu_icon_wrapper'>
        <div class='wpmi-overlay'></div>
        <div id='wpmi_icon_settings_frame' style='display:none;'>
            <div class='wpmi_frame_header'>
             <div class='wpmi-media-modal-close'>
                <span class='wpmi_close_btn'><i class='fa fa-close'></i></span>
            </div>
            <div class='wpmi_main_content'></div>
          </div>
        </div>
      </div>";
    }
}
$global['wpmicon_lite_menu_obj'] = new WPMILITE_ADMIN_MENU();
endif;

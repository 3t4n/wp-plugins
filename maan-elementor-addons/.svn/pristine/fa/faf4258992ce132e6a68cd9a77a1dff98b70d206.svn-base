<?php


namespace Maantheme\Addons\Admin;

/**
 * The base handler class
 */
class Base
{
    /**
     * Initialize the class
     */
    function __construct()
    {
        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        // Check for required PHP version
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check Elementor
        if ( ! is_plugin_active( 'elementor/elementor.php' ) ) {
            add_action('admin_notices', [ $this, 'admin_notice_missing_elementor' ] );
            return;
        }
    }
    /**
     * [is_plugins_active] Check Plugin is Installed or not
     * @param  [string]  $pl_file_path plugin file path
     * @return boolean  true|false
     */
    public function is_plugins_active( $pl_file_path = NULL ){
        $installed_plugins_list = get_plugins();
        return isset( $installed_plugins_list[$pl_file_path] );
    }
    /**
     * [admin_notice_missing_main_plugin] Admin Notice For missing elementor.
     * @return [void]
     */
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $elementor = 'elementor/elementor.php';
        if( $this->is_plugins_active( $elementor ) ) {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
            $message = sprintf( __( '%1$sMaan Elementor Addons%2$s requires %1$s"Elementor"%2$s plugin to be active. Please activate Elementor to continue.', 'maan-elementor-addons' ), '<strong>', '</strong>' );
            $button_text = esc_html__( 'Activate Elementor', 'maan-elementor-addons' );
        } else {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
            $message = sprintf( __( '%1$sMaan Elementor Addons%2$s requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'maan-elementor-addons' ), '<strong>', '</strong>' );
            $button_text = esc_html__( 'Install Elementor', 'maan-elementor-addons' );
        }
        $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
        printf( '<div class="error"><p>%1$s</p>%2$s</div>', $message, $button );
    }
    /**
     * Elementor Missing Notice
     *
     * @return void
     */
    public function admin_notice_missing_elementor(){
        $elementor = 'elementor/elementor.php';
        if( $this->is_plugins_active( $elementor ) ) {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
            $message = sprintf( __( '%1$sMaan Elementor Addons%2$s requires %1$s"Elementor"%2$s plugin to be active. Please activate Elementor to continue.', 'maan-elementor-addons' ), '<strong>', '</strong>');
            $button_text = __( 'Activate Elementor', 'maan-elementor-addons' );
        } else {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
            $message = sprintf( __( '%Maan Elementor Addons%2$s requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'maan-elementor-addons' ), '<strong>', '</strong>' );
            $button_text = __( 'Install Elementor', 'maan-elementor-addons' );
        }
        $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
        printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
    }
}
<?php
/**
* Plugin main class
*
*
*/
if ( !defined( 'WPINC' ) ) {
    die();
}



if ( !class_exists( 'CWW_Connector_Lite' ) ):

    class CWW_Connector_Lite {

        /**
         * A reference to an instance of this class.
         *
         * @since  1.0.0
         * @access private
         * @var    object
         */
        private static $instance = null;


         /**
         * Returns the instance.
         *
         * @since  1.0.0
         * @access public
         * @return object
         */
        public static function get_instance() {
            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Sets up needed actions/filters for the plugin to initialize.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function __construct() {

            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
            add_action( 'plugins_loaded', array( $this, 'init' ) );
            add_action('admin_enqueue_scripts', array($this,'load_admin_scripts') );
            add_filter( 'plugin_action_links_' . CWW_CONNECTOR_BASENAME, array($this,'plugin_pro_link') );

            
        }


        /**
         * Loads the translation files.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function load_plugin_textdomain() {

            load_plugin_textdomain( 'cww-connector-lite', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        public function init(){
            
             // Check if Contact form 7 is installed and activated
            if ( ! defined( 'WPCF7_VERSION' ) ) {
                add_action( 'admin_notices', array( $this, 'required_plugins_notice' ) );
                return;
            }

            require_once CWW_CONNECTOR_PATH.'/forms/cf7.php';
            require_once CWW_CONNECTOR_PATH.'/crm/activecampaign/cf7.php';

        }

        /**
         * Show recommended plugins notice.
         *
         * @return void
         */
        public function required_plugins_notice() {
            $screen = get_current_screen();
            if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
                return;
            }

            $plugin = 'contact-form-7/wp-contact-form-7.php';

            if ( $this->is_cf7_installed() ) {
                if ( !current_user_can( 'activate_plugins' ) ) {
                    return;
                }

                $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                $admin_message = '<p>' . esc_html__( 'Ops! CWW Connector is not working because you need to activate the Contact Form 7 plugin first.', 'cww-connector-lite' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Now', 'cww-connector-lite' ) ) . '</p>';
            } else {
                if ( !current_user_can( 'install_plugins' ) ) {
                    return;
                }

                $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' );
                $admin_message = '<p>' . esc_html__( 'Ops! CWW Connector is not working because you need to install the Contact Form 7 plugin', 'cww-connector-lite' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Now', 'cww-connector-lite' ) ) . '</p>';
            }

            echo '<div class="error">' . wp_kses_post($admin_message) . '</div>';
        }

        /**
         * Check if has cf7 installed
         *
         * @return boolean
         */
        public function is_cf7_installed() {
            $file_path = 'contact-form-7/wp-contact-form-7.php';
            $installed_plugins = get_plugins();

            return isset( $installed_plugins[ $file_path ] );
        }

        function plugin_pro_link( $links ) {
         
            $links[] = '<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank" style="color:#05c305; font-weight:bold;">'.esc_html__('Upgrade To Pro','cww-connector').'</a>';
            return $links;
        }


       

        /**
        * enque scripts for backend
        *
        */
        function load_admin_scripts() {

          $adm_assets = CWW_CONNECTOR_URL.'/assets/admin/';

          if( isset( $_GET['page'] ) && $_GET['page'] == 'wpcf7' ) {

            
            wp_enqueue_style( 'cww-connector-admin', $adm_assets . 'admin.css', array(), CWW_CONNECTOR_VER );
            
            wp_enqueue_script( 'cww-connector-admin', $adm_assets . 'admin.js', array( 'jquery' ), CWW_CONNECTOR_VER, true );

            wp_localize_script( 'cww-connector-admin', 'cwwAdminObject', array(
                'admin_nonce'		=> wp_create_nonce( 'cww_ac_listID_nonce'),
                'ajaxurl'			=> esc_url( admin_url( 'admin-ajax.php' ) ),
                'conform_message'   => esc_html__('Do you really want to delete this field ?','cww-connector-lite'),
            ) );

            

          }

        }

        
    }
endif;

if ( !function_exists( 'cww_connector_init' ) ) {

    /**
     * Returns instanse of the plugin class.
     *
     * @since  1.0.0
     * @return object
     */
    function cww_connector_init() {
        return CWW_Connector_Lite::get_instance();
    }

}

cww_connector_init();

        
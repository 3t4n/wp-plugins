<?php
function adti_get_current_theme_author(){
    $current_theme = wp_get_theme();
    return $current_theme->get('Author');
}
function adti_get_current_theme_slug(){
    $current_theme = wp_get_theme();
    return $current_theme->stylesheet;
}
function adti_get_theme_screenshot(){
    $current_theme = wp_get_theme();
    return $current_theme->get_screenshot();
}

class ATDI_Advanced_Import {

    private $hook_suffix;

    public static function instance() {

        static $instance = null;

        if ( null === $instance ) {
            $instance = new self();
            update_option( '__gutentor_do_redirect', false );

        }

        return $instance;
    }

    public function __construct() {}

    public function import_menu() {
        if( !class_exists('Advanced_Import')){
            $this->hook_suffix[] = add_theme_page( esc_html__( 'Demo Import ','atdi' ), esc_html__( 'Demo Import','atdi'  ), 'manage_options', 'advanced-import', array( $this, 'get_started' ) );
        }
    }

    public function enqueue_styles( $hook_suffix ) {
        if ( !is_array($this->hook_suffix) || !in_array( $hook_suffix, $this->hook_suffix )){
            return;
        }
        wp_enqueue_style( ATDI_BASENAME, ATDI_URL . 'assets/css/main.css',array( 'wp-admin', 'dashicons' ), ATDI_VERSION, 'all' );
    }

    public function enqueue_scripts( $hook_suffix ) {
        if ( !is_array($this->hook_suffix) || !in_array( $hook_suffix, $this->hook_suffix )){
            return;
        }

        wp_enqueue_script( ATDI_BASENAME, ATDI_URL . 'assets/js/main.js', array( 'jquery'), ATDI_VERSION, true );
        wp_localize_script( ATDI_BASENAME, 'adti', array(
            'btn_text' => esc_html__( 'Processing...', 'atdi' ),
            'nonce'    => wp_create_nonce( 'adti_nonce' )
        ) );
    }

    public function get_started() {
        ?>
        <div id="ads-notice">
            <div class="ads-container">
                <img class="ads-screenshot" src="<?php echo esc_url(adti_get_theme_screenshot() )?>" />
                <div class="ads-notice">
                    <h2>
                        <?php
                        printf(
                            esc_html__( 'Welcome! Thank you for choosing %1$s! To get started with ready-made starter site templates. Install the Advanced Import plugin and install Demo Starter Site within a single click', 'atdi' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>');
                        ?>
                    </h2>

                    <p class="plugin-install-notice"><?php esc_html_e( 'Clicking the button below will install and activate the Advanced Import plugin.', 'atdi' ); ?></p>

                    <a class="ads-gsm-btn button button-primary button-hero" href="#" data-name="" data-slug="" aria-label="<?php esc_html_e( 'Get started with the Theme', 'atdi' ); ?>">
                        <?php esc_html_e( 'Get Started', 'atdi' );?>
                    </a>
                </div>
            </div>
        </div>
        <?php

    }

    public function install_advanced_import() {

        check_ajax_referer( 'adti_nonce', 'security' );

        $slug   = 'advanced-import';
        $plugin = 'advanced-import/advanced-import.php';

        $status = array(
            'install' => 'plugin',
            'slug'    => sanitize_key( wp_unslash( $slug ) ),
        );
        $status['redirect'] = admin_url( '/themes.php?page=advanced-import&browse=all&at-gsm-hide-notice=welcome' );

        if ( is_plugin_active_for_network( $plugin ) || is_plugin_active( $plugin ) ) {
            // Plugin is activated
            wp_send_json_success($status);
        }


        if ( ! current_user_can( 'install_plugins' ) ) {
            $status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'atdi' );
            wp_send_json_error( $status );
        }

        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

        // Looks like a plugin is installed, but not active.
        if ( file_exists( WP_PLUGIN_DIR . '/' . $slug ) ) {
            $plugin_data          = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            $status['plugin']     = $plugin;
            $status['pluginName'] = $plugin_data['Name'];

            if ( current_user_can( 'activate_plugin', $plugin ) && is_plugin_inactive( $plugin ) ) {
                $result = activate_plugin( $plugin );

                if ( is_wp_error( $result ) ) {
                    $status['errorCode']    = $result->get_error_code();
                    $status['errorMessage'] = $result->get_error_message();
                    wp_send_json_error( $status );
                }

                wp_send_json_success( $status );
            }
        }

        $api = plugins_api(
            'plugin_information',
            array(
                'slug'   => sanitize_key( wp_unslash( $slug ) ),
                'fields' => array(
                    'sections' => false,
                ),
            )
        );

        if ( is_wp_error( $api ) ) {
            $status['errorMessage'] = $api->get_error_message();
            wp_send_json_error( $status );
        }

        $status['pluginName'] = $api->name;

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );

        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            $status['debug'] = $skin->get_upgrade_messages();
        }

        if ( is_wp_error( $result ) ) {
            $status['errorCode']    = $result->get_error_code();
            $status['errorMessage'] = $result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( is_wp_error( $skin->result ) ) {
            $status['errorCode']    = $skin->result->get_error_code();
            $status['errorMessage'] = $skin->result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( $skin->get_errors()->get_error_code() ) {
            $status['errorMessage'] = $skin->get_error_messages();
            wp_send_json_error( $status );
        } elseif ( is_null( $result ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            WP_Filesystem();
            global $wp_filesystem;

            $status['errorCode']    = 'unable_to_connect_to_filesystem';
            $status['errorMessage'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'atdi' );

            // Pass through the error from WP_Filesystem if one was raised.
            if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
                $status['errorMessage'] = esc_html( $wp_filesystem->errors->get_error_message() );
            }

            wp_send_json_error( $status );
        }

        $install_status = install_plugin_install_status( $api );

        if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
            $result = activate_plugin( $install_status['file'] );

            if ( is_wp_error( $result ) ) {
                $status['errorCode']    = $result->get_error_code();
                $status['errorMessage'] = $result->get_error_message();
                wp_send_json_error( $status );
            }
        }

        wp_send_json_success( $status );

    }
    public function load_advanced_import(){

        if(adti_get_current_theme_author()=='amplethemes'|| adti_get_current_theme_author()=='ample themes' ) {
            require_once ATDI_PATH . 'inc/amplethemes/advanced-import.php';
        }elseif (adti_get_current_theme_author()=='a2zthemes'){

            require_once ATDI_PATH . 'inc/a2zthemes/advanced-import.php';

        }
    }

}

/**
 * Begins execution of the hooks.
 *
 * @since    1.0.0
 */
function adti_advanced_import( ) {
    return ATDI_Advanced_Import::instance();
}
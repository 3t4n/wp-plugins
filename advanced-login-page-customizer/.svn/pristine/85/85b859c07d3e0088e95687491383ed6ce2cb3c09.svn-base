<?php
/**
 * Rest API Class for Login UI.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class Login_UI_API {
    /**
     * Initiate class.
     *
     * @return void
     */
    public static function init() {
        add_action( 'rest_api_init', array( __CLASS__, 'register_rest_route' ) );
    }

    /**
     * Register rest routes.
     *
     * @return void
     */
    public static function register_rest_route() {
        register_rest_route( 'alpc//v1', '/login-ui-settings', array(
            array(
                'methods'  => \WP_REST_Server::READABLE,
                'callback' => array( __CLASS__, 'get_login_ui_settings' ),
                'permission_callback' => function() {
                    return current_user_can('manage_options');
                }
            ),
            array(
                'methods'  => \WP_REST_Server::EDITABLE,
                'callback' => array( __CLASS__, 'update_login_ui_settings' ),
                'permission_callback' => function() {
                    return current_user_can('manage_options');
                }
            ),
            array(
                'methods'  => \WP_REST_Server::DELETABLE,
                'callback' => array( __CLASS__, 'reset_login_ui_settings' ),
                'permission_callback' => function() {
                    return current_user_can('manage_options');
                }
            )
        ));
    }

    /**
	 * Get Login settings.
	 *
	 * @return array
	 */
    public static function get_login_ui_settings() {
        $settings = advanced_login_page_customizer_login_settings();
        return rest_ensure_response( $settings );
}

  
/**
	 * Update settings.
	 *
	 * @param \WP_REST_Request $data
	 * @return array
	 */
    public static function update_login_ui_settings( \WP_REST_Request $data ) {
        $params = $data->get_params();
        // $settings = advanced_login_page_customizer_login_settings();
        $settings = advanced_login_page_customizer_recursive_parse_args( $params, array() );
        update_option( 'advanced_login_page_customizer_login_ui_settings', $settings, false );
        return rest_ensure_response( $settings );
}



	

    /**
     * Reset settings.
     *
     * @return array
     */
    public static function reset_login_ui_settings() {
        // Reset the settings to an empty array
        update_option('advanced_login_page_customizer_login_ui_settings', array(), false);
        return rest_ensure_response( array( 'status' => true ) );
    }
}

Login_UI_API::init();


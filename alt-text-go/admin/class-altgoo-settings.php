<?php

/**
 * The settings-specific functionality of the plugin.
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/admin
 */

/**
 * The settings-specific functionality of the plugin.
 *
 * Renders the settings page and manage all settings
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/admin
 * @author     AltTextGo <support@alttextgo.com>
 */
class ALTGOO_Settings {

    /**
	 * The credits available fetched by API.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int   $credits    The credits left.
	 */
	private $credits;

    /**
	 * The activation status.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      bool    $is_success_activation    If the activation was successful.
	 */
	private $is_success_activation = false;


    // Get credits
    private function load_credits() {
        // fetch api key from option
        $api_key = get_option('altgoo_api_key');
        // api key exists, fetch credits via API call
        if (! empty($api_key)) {
            $api = new ALTGOO_API( $api_key );
            $this -> credits = $api->get_credits();

            if ( is_wp_error( $this -> credits ) ) {
                // Handle error 
                $error_code = $this->credits->get_error_code(); // Retrieve the error code
                if ( $error_code === 'authentication_failed' ) {
                    // Handle invalid API key (401)
                    add_settings_error( 'altgoo_get_credits_failed_invalid_key', '', 'Invalid API key. Please check your API key.', 'error' );
                } elseif ( $error_code === 'validation_error' ) {
                    // Handle validation errors (422)
                    add_settings_error( 'altgoo_get_credits_failed_validation', '', 'There was an error fetching credits using the API key. Please try again.', 'error' );
                } elseif ( $error_code === 'server_error' ) {
                    // Handle server error (500)
                    add_settings_error( 'altgoo_get_credits_failed_server', '', 'Server error. Please try again later.', 'error' );
                } else {
                    // Handle other errors, e.g. malformed response format with 200 code
                    add_settings_error( 'altgoo_get_credits_failed', '', 'Unexpected issue while fetching credits. Please try again.', 'error' );
                }
            } 
        }
        // when api key does not exist, do nothing 
    }

    // Register settings page
    public function register_settings_page() {
        add_menu_page(
            __( 'AltTextGo Settings', 'alt-text-go' ),
            __( 'AltTextGo', 'alt-text-go' ),
            'manage_options',
            'alt-text-go',
            array( $this, 'render_settings_page' ),
            'dashicons-universal-access-alt',
        );
    }

    // Render the settings page
    public function render_settings_page() {

        // load credits via api
        $this -> load_credits();
        // Load the settings page template
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/settings.php';
    }    

     /**
     * Register setting group.
     *
     * @since    1.0.0
     * @access   public
     */
    public function register_settings() {
            register_setting(
                'altgoo-settings',
                'altgoo_api_key',
                array(
                    'sanitize_callback' => 'sanitize_text_field',  // do not use sanitize_key, needs to retain case-sensitivity
                    'default' => '',
                )
            );
        }

    /**
     * Add or delete API key.
     *
     * @since 1.0.0
     * @access public
     */        
    public function handle_submit_api_key( $api_key, $old_api_key ) {
        
        if ( empty( $api_key ) ) {
            // if form sent empty key, then perform clearing key action
            add_settings_error( 'altgoo_api_cleared', '', 'API Key cleared.', 'updated' );
            return $api_key;
        } else {
            // if a key is passed, then perform activate key API call
            $api = new ALTGOO_API( $api_key );
            $this -> is_success_activation = $api->activate_api_key();

            if ( is_wp_error( $this -> is_success_activation ) ) {
                // if activation failed, handle error 
                $error_code = $this->is_success_activation->get_error_code();
                if ( $error_code === 'authentication_failed' ) {
                    // Handle invalid API key (401)
                    add_settings_error( 'altgoo_activate_api_key_failed_invalid_key', '', 'The API key your are trying to activate is invalid. Please check and try again.', 'error' );
                } elseif ( $error_code === 'activation_limit_reached' ) {
                    // Handle validation errors (400)
                    add_settings_error( 'altgoo_activate_api_key_limit_reached', '', 'Your API key was activated too many times. Please try another key.', 'error' );
                } elseif ( $error_code === 'mismatched_api_key_platform' ) {
                    // Handle validation errors (409)
                    add_settings_error( 'altgoo_activate_api_key_mismatched_platform', '', 'Your API key was created for another platform from WordPress. Please use an API key created for WordPress.', 'error' );
                } elseif ( $error_code === 'validation_error' ) {
                    // Handle validation errors (422)
                    add_settings_error( 'altgoo_activate_api_key_failed_validation', '', 'There was an error activating using the API key. Please check input format and try again.', 'error' );
                } elseif ( $error_code === 'server_error' ) {
                    // Handle server error (500)
                    add_settings_error( 'altgoo_activate_api_key_failed_server', '', 'Server error. Please try again later.', 'error' );
                } else {
                    // Handle other errors, e.g. malformed response format with 200 code
                    add_settings_error( 'altgoo_activate_api_key_failed', '', 'Unexpected issue while activating API key. Please try again.', 'error' );
                }
                // when activation failed, do not save api key
                return false;
            } else {
                // Success message
                $message = __( 'API Key activated. Go to any Post or Page to generate alt text. <a href="https://capture.dropbox.com/8Z6mwJTH1BmghpHS" target="_blank">Show me how</a>', 'alt-text-go' );
                $message = sprintf( $message);
                add_settings_error( 'altgoo_api_activated', '', $message, 'updated' );

                // only pass on api key to be saved when activated successfully
                return $api_key;
            }
        }
    }
}

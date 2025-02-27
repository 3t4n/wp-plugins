<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://gleap.io
 * @since      1.0.0
 *
 * @package    Gleap
 * @subpackage Gleap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gleap
 * @subpackage Gleap/public
 * @author     Gleap <hello@gleap.io>
 */
class Gleap_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_action('gleap_send_custom_event', array($this, 'send_custom_event'));
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gleap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gleap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

    /**
     * Prepare the data for the Gleap.identify call.
     *
     * @since    1.0.0
     */
    private function prepare_gleap_identify_data() {
        if (!is_user_logged_in()) {
            return '';
        }

        $user_data = get_userdata(get_current_user_id());
        $login = $user_data->user_login;
        $uname = $user_data->user_firstname . ' ' . $user_data->user_lastname;
        $nickname = (strlen($user_data->nickname) > 1) ? $user_data->nickname : '';
        $name = (strlen($uname) > 1) ? $uname : $nickname;
        $email = $user_data->user_email;

        // Prepare the default data array.
        $data = array(
            'name' => $name,
            'email' => $email,
        );

        // Allow other plugins to add or modify data.
        $data = apply_filters('gleap_identify_data', $data);

        return $data;
    }

    /**
     * Send a custom event to Gleap.
     *
     * @since    1.0.0
     * @param    array    $event_data    The data of the event to send.
     */
    public function send_custom_event($event_data) {
        $secret_api_token = carbon_get_theme_option('gleap_secret_api_token');

        // Check if the secret API token is set.
        if (empty($secret_api_token)) {
            // You can either throw an exception or handle the error appropriately.
            // For example:
            // throw new Exception('Gleap secret API token is not set.');
            // Or handle it another way, such as logging the error:
            error_log('Gleap: Cannot send event because secret API token is not set.');
            return;
        }

        $response = wp_remote_post('https://api.gleap.io/admin/track', array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Api-Token' => $secret_api_token,
            ),
            'body' => json_encode(array('events' => array($event_data))),
        ));

        // Error handling.
        if (is_wp_error($response)) {
            // Handle error - log it, notify admin, etc.
            error_log('Error sending custom event to Gleap: ' . $response->get_error_message());
        }
    }


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		if (class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active()) {
			return;
		}

		if (class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->preview->is_preview()) {
			return;
		}

		$gleap_token = carbon_get_theme_option('gleap_token');


        // Apply filter to allow modification of the gleap_token
        $gleap_token = apply_filters('gleap_modify_token', $gleap_token);

        if ($gleap_token) {
            $gleap_selected_roles_only = carbon_get_theme_option('gleap_selected_roles_only');
			if ($gleap_selected_roles_only == true) {
				$user_roles = wp_get_current_user()->roles;
				$gleap_selected_roles = carbon_get_theme_option('gleap_selected_roles');
				
				if (!array_intersect($user_roles, $gleap_selected_roles)) {
					// If the user's role is not in the selected roles, don't show Gleap
					return;
				}
			}

			$identify_script = "";
			if (is_user_logged_in()) {
                $gleap_identity_token = carbon_get_theme_option('gleap_identity_token');

                // Apply filter to allow modification of the gleap_identity_token
                $gleap_identity_token = apply_filters('gleap_modify_identity_token', $gleap_identity_token);

                $user_data = get_userdata(get_current_user_id());
                $login = $user_data->user_login;
                $signature = hash_hmac('sha256', $login, $gleap_identity_token);

                // Get the data for Gleap.identify.
                $identify_data = $this->prepare_gleap_identify_data();
                $identify_json = json_encode($identify_data);

                $identify_script = ',Gleap.identify("' . $login . '", ' . $identify_json . ', "' . $signature . '");';
			}

            $gleap_set_language = "";

            if ( class_exists( 'SitePress' ) ) {
                $current_language = apply_filters( 'wpml_current_language', NULL );
                $gleap_set_language = 'Gleap.setLanguage("' . $current_language . '"),';
            }

			wp_register_script('gleap-sdk-js', '',);
			wp_enqueue_script('gleap-sdk-js');
			wp_add_inline_script('gleap-sdk-js', '!function(Gleap,t,i){if(!(Gleap=window.Gleap=window.Gleap||[]).invoked){for(window.GleapActions=[],Gleap.invoked=!0,Gleap.methods=["identify","clearIdentity","attachCustomData","setCustomData","removeCustomData","clearCustomData","registerCustomAction","logEvent","sendSilentCrashReport","startFeedbackFlow","setAppBuildNumber","setAppVersionCode","preFillForm","setApiUrl","setFrameUrl","isOpened","open","close","on","setLanguage","setOfflineMode","initialize"],Gleap.f=function(e){return function(){var t=Array.prototype.slice.call(arguments);window.GleapActions.push({e:e,a:t})}},t=0;t<Gleap.methods.length;t++)Gleap[i=Gleap.methods[t]]=Gleap.f(i);Gleap.load=function(){var t=document.getElementsByTagName("head")[0],i=document.createElement("script");i.type="text/javascript",i.async=!0,i.src="https://sdk.gleap.io/latest/index.js",t.appendChild(i)},Gleap.load(),' . $gleap_set_language . 'Gleap.initialize("' . $gleap_token . '")' . $identify_script . '}}();');
		}
	}
}

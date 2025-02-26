<?php
/**
 * This file is reponsible to manage the license of the plugin.
 *
 * @package Webdigit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to manage the license.
 */
class WDGPT_License_Manager {
	/**
	 * The instance of the class.
	 *
	 * @var WDGPT_License_Manager
	 */
	private static $instance = null;

	/**
	 * Constructor.
	 */
	private function __construct() {
	}

	/**
	 * Retrieve the instance of the class.
	 *
	 * @return WDGPT_License_Manager
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new WDGPT_License_manager();
		}

		return self::$instance;
	}

	/**
	 * Retrieve the license key.
	 *
	 * @param string $license_type The license type.
	 *
	 * @return array
	 */
	public function get_license_key( $license_type = '' ) {
        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('Get licence - ' . $license_type, 200, 'get_license_key');
        }
		switch ( $license_type ) {
			case 'free':
				return $this->get_free_license();
			case 'premium':
				return $this->get_premium_license();
			default:
				return array(
					$this->get_premium_license(),
					$this->get_free_license(),
				);
		}
	}

	/**
	 * Sidebar menu for the license.
	 *
	 * @return $badge The badge for the license.
	 */
	public function get_license_badge() {
		$premium_license_key = $this->get_license_key( 'premium' );
		$free_license_key    = $this->get_license_key( 'free' );
		$badge               = '';

		if ( 'active' === $premium_license_key['status'] ) {
			$badge = '<span class="license-admin-menu-badge pro">' . __( 'Pro', 'webdigit-chatbot' ) . '</span>';
		} elseif ( 'active' === $free_license_key['status'] ) {
			$badge = '<span class="license-admin-menu-badge free">' . __( 'Free', 'webdigit-chatbot' ) . '</span>';
		}
		return $badge;
	}

	/**
	 * Verify if there is any plugin installed that could need an update.
	 * 
	 * @return string
	 */
	public function get_notifications_number() {
		$notification_number = 0;
		$addons_manager = WDGPT_Addons_Manager::instance();
		$addons = $addons_manager->retrieve_addons();

		foreach ($addons as $addon) {
			$addon_path = WP_PLUGIN_DIR . '/' . $addon['activation_slug'];
			if (is_plugin_active($addon['activation_slug']) && file_exists($addon_path)) {
				$plugin_data = get_plugin_data($addon_path);
				if (version_compare($plugin_data['Version'], $addon['version'], '<')) {
					$notification_number++;
				}
			}
		}

		return $notification_number > 0 ? '<span class="update-plugins count-' . $notification_number . '"><span class="plugin-count">' . $notification_number . '</span></span>' : '';
	}



	/**
	 * Retrieve the license capabilities.
	 *
	 * @return array
	 */
	public function get_license_capabilities() {
		$status = array(
			'free'    => false,
			'premium' => false,
		);

		$premium_license_key = $this->get_license_key( 'premium' );
		$free_license_key    = $this->get_license_key( 'free' );

		if ( 'active' === $premium_license_key['status'] ) {
			$status['premium'] = true;
		}
		if ( 'active' === $free_license_key['status'] ) {
			$status['free'] = true;
		}

		// If the premium license is active, the free license is also active.
		if ( $status['premium'] ) {
			$status['free'] = true;
		}
		return $status;
	}

	/**
	 * Retrieve the license status.
	 *
	 * @return array
	 */
	public function get_license_status() {

		$free_license    = $this->get_license_key( 'free' );
		$premium_license = $this->get_license_key( 'premium' );

		$status = array(
			'free'    => $free_license['status'],
			'premium' => $premium_license['status'],
		);
        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('Recovered statuses - Free: '. $status['free'] . " | Premium: " . $status['premium'], 200, 'get_license_status');
        }

		$state = $this->determine_license_state( $status );

        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('Final state determined - ' . $state, 200, 'get_license_status');
        }

		return $this->get_license_message( $state );
	}

	/**
	 * Retrieve the license status.
	 *
	 * @param array $status The status of the license.
	 *
	 * @return string
	 */
	private function determine_license_state( $status ) {

        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error("Status analysis - Free: " . $status['free'] . " | Premium: " . $status['premium'], 200, 'determine_license_state');
        }

		if ( 'expired' === $status['premium'] ) {
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("Premium licence expired", 200, 'determine_license_state');
            }
			return 'active' === $status['free'] ? 'premium_expired_free_active' : 'premium_expired';
		}

		if ( ! isset( $status['premium'] ) || 'inactive' === $status['premium'] ) {
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("Premium licence inactive", 200, 'determine_license_state');
            }
			return 'active' === $status['free'] ? 'premium_inactive_free_active' : 'premium_inactive';
		}

		if ( 'active' === $status['premium'] ) {
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("Premium licence active", 200, 'determine_license_state');
            }
			return 'premium_active';
		}

		if ( 'active' === $status['free'] ) {
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("Free licence active", 200, 'determine_license_state');
            }
			return 'free_active';
		}

		if ( 'inactive' === $status['free'] ) {
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("Free licence inactive", 200, 'determine_license_state');
            }
			return 'free_inactive';
		}

		return 'unknown';
	}

	/**
	 * Retrieve the license message.
	 *
	 * @param string $state The state of the license.
	 *
	 * @return array
	 */
	private function get_license_message( $state ) {

        $expiry_date = '';

        if('premium_expired' === $state || 'premium_expired_free_active' === $state) {
            $license_data = get_transient('wdgpt_license_verification');
            if ($license_data && isset($license_data->expiry_date) && isset($license_data->state) && 'expired' === $license_data->state) {
                $expiry_date = date("d/m/Y", strtotime($license_data->expiry_date)); // Formater la date
            }
        }

		$messages = array(
            'premium_expired'              => array(
                'css_class' => 'license-expired',
                'message'   => ('premium_expired' === $state && !empty($expiry_date))
                    ? sprintf( __( 'Your premium license expired on %s. Please renew your license to continue having access to new addons.', 'webdigit-chatbot' ), $expiry_date )
                    : __( 'Your premium license has expired. Please renew your license to continue having access to new addons.', 'webdigit-chatbot' ),
            ),
            'premium_expired_free_active'  => array(
                'css_class' => 'license-expired',
                'message'   => ('premium_expired_free_active' === $state && !empty($expiry_date))
                    ? sprintf( __( 'Your premium license expired on %s, but your free license is active. You can access free addons.', 'webdigit-chatbot' ), $expiry_date )
                    : __( 'Your premium license has expired, but your free license is active. You can access free addons.', 'webdigit-chatbot' ),
            ),
			'premium_inactive'             => array(
				'css_class' => 'license-warning',
				'message'   => __( 'Your premium license is inactive. Please activate your license to continue having access to new addons.', 'webdigit-chatbot' ),
			),
			'premium_inactive_free_active' => array(
				'css_class' => 'license-valid',
				'message'   => __( 'Your free license is active. You can accesss free addons.', 'webdigit-chatbot' ),
			),
			'premium_active'               => array(
				'css_class' => 'license-valid',
				'message'   => __( 'Your premium license is active. You can download all the available addons.', 'webdigit-chatbot' ),
			),
			'free_active'                  => array(
				'css_class' => 'license-valid',
				'message'   => __( 'Your free license is active. You can accesss free addons.', 'webdigit-chatbot' ),
			),
			'free_inactive'                => array(
				'css_class' => 'license-warning',
				'message'   => __( 'Your free license is inactive. Please activate your license to continue having access to new addons..', 'webdigit-chatbot' ),
			),
			'unknown'                      => array(
				'css_class' => 'license-warning',
				'message'   => __( 'Your license is inactive. Please activate your license to continue having access to new addons.', 'webdigit-chatbot' ),
			),
		);

		return $messages[ $state ] ?? $messages['unknown'];
	}

	/**
	 * Retrieve the free license.
	 *
	 * @return array
	 */
	private function get_free_license() {
		// Retrieve the free license from the options.
		$free_license = get_option( 'wd_smartsearch_free_license', '' );

		// Prepare the default license data.
		$license_data = array(
			'status'       => 'inactive',
			'license_type' => 'free',
			'license_key'  => '',
		);

		// If the free license contains 'free_', update the license data.
		if ( strpos( $free_license, 'free_' ) !== false ) {
			$license_data['status']      = 'active';
			$license_data['license_key'] = $free_license;
		}

		// Return the license data.
		return $license_data;
	}

	/**
	 * Retrieve the premium license.
	 *
	 * @return array
	 */
	private function get_premium_license() {
		// Get the transient value and its expiration time.
		$transient_value = get_transient( 'wdgpt_license_transient' );
		$expiration_time = get_option( '_transient_timeout_wdgpt_license_transient' );

        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error("Transient recovered : ". print_r($transient_value, true), 200, 'get_premium_license');
            WDGPT_Error_Logs::wdgpt_log_error("Transient expiration time : ". print_r($expiration_time, true), 200, 'get_premium_license');
        }

		// Initialize response with default values.
		$response = array(
			'status'       => 'inactive',
			'license_type' => 'premium',
			'license_key'  => '',
		);
        if ( $transient_value ) {
            // Vérifier si une licence expirée a été mise en cache
            $cached_verification = get_transient('wdgpt_license_verification');
            if ($cached_verification && isset($cached_verification->state) && $cached_verification->state === 'expired') {
                delete_transient('wdgpt_license_transient');
                delete_transient('wdgpt_license_verification');
                $transient_value = false; // Forcer une nouvelle vérification
            }
        }

        // If transient value exists, check if it is expired.
		if ( $transient_value ) {
			if ( $expiration_time < time() ) {
				// If the transient is expired, renew the license from the server.
				$data = $this->renew_license();
				if ( ! $data->is_valid ) {
					$response['status'] = 'expired';
				} else {
					$response['status']      = 'active';
					$response['license_key'] = $transient_value;
				}
			} else {
				$response['status']      = 'active';
				$response['license_key'] = $transient_value;
			}
		} else {
            // If the transient does not exist, renew the license from the server.
            if ( WDGPT_DEBUG_MODE ) {
                WDGPT_Error_Logs::wdgpt_log_error("No transient, recovery from server", 200, 'get_premium_license');
            }
			$data = $this->renew_license();
			if ( ! $data->is_valid ) {
				$response['status'] = 'expired';
			} else {
				$response['status']      = 'active';
				$response['license_key'] = $data->license_key;
			}
		}

		return $response;
	}

	/**
	 * Renew the license.
	 *
	 * @param string $license_key The license key.
	 *
	 * @return object
	 */
	public function renew_license( $license_key = '' ) {
		/*Fix performance issue while renewing the license*/
		$cached_result = get_transient('wdgpt_license_verification');
        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('Cached license verification: ' . print_r($cached_result, true), 200, 'renew_license');
        }
    	if (false !== $cached_result) {
            if (isset($cached_result->state) && $cached_result->state === 'expired') {
                if ( WDGPT_DEBUG_MODE ) {
                    WDGPT_Error_Logs::wdgpt_log_error("Expired licence detected in cache, delete cache!", 200, 'renew_license');
                }
                delete_transient('wdgpt_license_verification');
            } else {
                return $cached_result;
            }
    	}

        // Vérification de allow_url_fopen et cURL avant d'envoyer la requête
        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('allow_url_fopen enabled: ' . (ini_get('allow_url_fopen') ? 'YES' : 'NO'), 200, 'renew_license');
            WDGPT_Error_Logs::wdgpt_log_error('cURL available: ' . (function_exists('curl_version') ? 'YES' : 'NO'), 200, 'renew_license');
        }

		$url = 'https://www.smartsearchwp.com/wp-json/smw/license-verification/';
		$url_website = site_url();
		$url_website = str_replace(['http://', 'https://'], '', $url_website);

		if ( '' === $license_key ) {
			$license_key = get_option( 'wd_smartsearch_license', '' );
		}else{
            $license_key = sanitize_text_field( wp_unslash( $license_key ) );
            update_option( 'wd_smartsearch_license', $license_key );
        }

        // Vérification avant envoi de la requête
        if ( WDGPT_DEBUG_MODE ) {
            $debug_message = sprintf(
                "License Verification - Request Sent | License Key: %s | Site URL: %s | Request Method: %s",
                substr($license_key, 0, 40) . '****', // Masquer la licence
                $url_website,
                function_exists('curl_version') ? 'cURL' : 'wp_remote_post'
            );
            WDGPT_Error_Logs::wdgpt_log_error($debug_message, 200, 'wdgpt_license_verification');
        }


        $body = array(
			'license_key' => $license_key,
			'url_website' => $url_website,
		);

		$args = array(
			'body'        => wp_json_encode( $body ),
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array(
				'Content-Type' => 'application/json',
			),
			'cookies'     => array(),
		);

		$response = wp_remote_post( $url, $args );

        // Vérification de la réponse API
        if (is_wp_error($response)) {
            $error_message = sprintf(
                "License Verification - API Request Failed | Error Message: %s",
                $response->get_error_message()
            );
            WDGPT_Error_Logs::wdgpt_log_error($error_message, 500, 'wdgpt_license_verification');
        }

        $body     = wp_remote_retrieve_body( $response );
		$data     = json_decode( $body );

        if ( WDGPT_DEBUG_MODE ) {
            WDGPT_Error_Logs::wdgpt_log_error('API Response: ' . print_r($data, true), 200, 'renew_license');
        }

        // Vérification de la réponse de l'API
        if (WDGPT_DEBUG_MODE && !$data) {
            $error_message = sprintf(
                "License Verification - Invalid API Response | Raw Response: %s",
                $body
            );
            WDGPT_Error_Logs::wdgpt_log_error($error_message, 500, 'wdgpt_license_verification');
        }

        // Vérification si la licence est refusée
        if (WDGPT_DEBUG_MODE && !$data->is_valid) {
            $error_message = sprintf(
                "License Verification - License Rejected | Status: %s | Message: %s",
                $data->state ?? 'unknown',
                $data->message ?? 'No error message provided'
            );
            WDGPT_Error_Logs::wdgpt_log_error($error_message, 403, 'wdgpt_license_verification');
            return $data;
        }

		if (!empty($data)) {

            if (WDGPT_DEBUG_MODE) {
                if (isset($data->state) && $data->state === 'already_registered_with_another_url') {
                    WDGPT_Error_Logs::wdgpt_log_error(
                        "License Verification Failed - The key is already registered with another site.",
                        403,
                        'wdgpt_license_verification'
                    );
                } elseif (isset($data->state) && $data->state === 'verified_with_url') {
                    WDGPT_Error_Logs::wdgpt_log_error(
                        "License Verification - License successfully verified.",
                        200,
                        'wdgpt_license_verification'
                    );
                } elseif (isset($data->state) && $data->state === 'not_found') {
                    WDGPT_Error_Logs::wdgpt_log_error(
                        "License Verification - License not found.",
                        200,
                        'wdgpt_license_verification'
                    );
                } elseif (isset($data->state)) {
                    WDGPT_Error_Logs::wdgpt_log_error(
                        "License Verification - Unknown state received: " . print_r($data->state, true),
                        400,
                        'wdgpt_license_verification'
                    );
                } else {
                    WDGPT_Error_Logs::wdgpt_log_error(
                        "License Verification - No state received in API response.",
                        400,
                        'wdgpt_license_verification'
                    );
                }
            }

			if ( !$data->is_valid ) {
				return $data;
			}

            // Cache le résultat pendant 6 heures
            set_transient('wdgpt_license_verification', $data, 6 * HOUR_IN_SECONDS);

			$this->save_option( 'wd_smartsearch_license', $license_key );
			$license_data = array(
				'license_key' => $license_key,
				'expiry_date' => $data->expiry_date,
			);
			$this->set_premium_license_transient( $license_data );
			if (!isset($data->license_key)) {
				$data->license_key = $license_key;
			}
		}
		
		return $data;
	}

	/**
	 * Save the option for the license.
	 *
	 * @param string $option_name The name of the option.
	 * @param string $option_value The value of the option.
	 *
	 * @return void
	 */
	private function save_option( $option_name, $option_value ) {
		$opt_name_sanitize = isset( $option_value ) ? sanitize_text_field( wp_unslash( $option_value ) ) : '';
		update_option( $option_name, $opt_name_sanitize );
	}

	/**
	 * Set the transient for the license.
	 *
	 * @param array $license_data The license data.
	 *
	 * @return void
	 */
	private function set_premium_license_transient( $license_data ) {
		delete_transient( 'wdgpt_license_transient' );
		$expiration_date = $this->convert_string_to_timestamp( $license_data['expiry_date'] );
		$expiration_time = WEEK_IN_SECONDS;
		if ( $expiration_date > time() && $expiration_date - time() < WEEK_IN_SECONDS ) {
			$expiration_time = $expiration_date - time();
		}
		set_transient( 'wdgpt_license_transient', $license_data['license_key'], $expiration_time );
	}
	/**
	 * Retrieve the expiration date in seconds.
	 *
	 * @param string $expiration_date The expiration date.
	 *
	 * @return int
	 */
	private function convert_string_to_timestamp( $expiration_date ) {
		$expiration_date = new DateTime( $expiration_date );
		return $expiration_date->getTimestamp();
	}
}

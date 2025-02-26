<?php

namespace APG\Admin;
use APG\Core\Addonmanager;
use APG\Core\Helper;
use APG\Core\Licenses;

/**
 * Class Settings
 * @package APG\Admin
 */
class Settings extends Page {

	/**
	 * @var array
	 */
	private $options;

    /**
     * @var
     */
    public $template;

    /**
     * @var
     */
    private $extensions;

    /**
     *
     *
     * @param $extensions
     */
	public function __construct( $extensions = array() ) {
		$this->helper     = new Helper();
		$this->options    = get_option( 'apg_settings' );
        $this->extensions = $extensions;
	}

    /**
     * Get the setting
     *
     * @param $name
     *
     * @return mixed
     */
    public function get( $name ) {
	    $default = $this->helper->get_setting_defaults();
	    $checkboxes = $this->get_bool_fields();

	    if( is_bool( $default[ $name ] ) || in_array( $name, $checkboxes ) ) {
		    return (bool) esc_attr( $this->options[ $name ] );
	    }
	    elseif( ! is_bool( $default[ $name ] ) && isset( $this->options[ $name ] ) ) {
		    return esc_attr( $this->options[ $name ] );
	    }

	    return $default[ $name ];
    }

	/**
	 * Render the settings page
	 */
	public function render() {
        if ( isset( $_POST['apg_photo_settings_nonce'], $_POST['apg_settings'] ) && wp_verify_nonce( $_POST['apg_photo_settings_nonce'], 'apg_photo_settings_nonce' ) && current_user_can( 'manage_options' ) ) {
            $results = $this->handle_upload_post();

            if( $results === true ) {
	            $this->save_options();

	            $this->extensions = apply_filters( 'apg_extensions', array() );

                $this->apg_success( __('Your new settings are saved successfully!', 'apg') );
            }
            else{
                // Failure
                $this->error = $results['error'];

                if( empty( $this->error ) ) {
                    $this->error = __('There are no changes to save.', 'apg');
                }

                $this->apg_error();
            }
        }

        $apg_licenses = new Licenses( $this->extensions );

		$this->template['settings']                           = array();
		$this->template['settings']['extensions']             = $this->extensions;
		$this->template['settings']['licenses']               = $apg_licenses->get_licenses();
		$this->template['settings']['gallery']                = $this->get( 'gallery' );
		$this->template['settings']['thumb_size']             = (int) $this->get( 'thumb_size' );
		$this->template['settings']['album_description']      = $this->get( 'album_description' );
		$this->template['settings']['disable_frontend_css']   = (bool) $this->get( 'disable_frontend_css' );
		$this->template['settings']['disable_frontend_js']    = (bool) $this->get( 'disable_frontend_js' );
		$this->template['settings']['archive_limit']          = (int) $this->get( 'archive_limit' );
		$this->template['settings']['enable_slideshow']       = (bool) $this->get( 'enable_slideshow' );
		$this->template['settings']['slideshow_timeout']      = (int) $this->get( 'slideshow_timeout' );
		$this->template['settings']['slideshow_autostart']    = (bool) $this->get( 'slideshow_autostart' );
		$this->template['settings']['enable_thumb_shadow']    = (bool) $this->get( 'enable_thumb_shadow' );
		$this->template['settings']['thumb_shadow_color']     = $this->get( 'thumb_shadow_color' );
		$this->template['settings']['thumb_shadow_width']     = $this->get( 'thumb_shadow_width' );
		$this->template['settings']['thumb_border_width']     = $this->get( 'thumb_border_width' );
		$this->template['settings']['thumb_border_color']     = $this->get( 'thumb_border_color' );
		$this->template['settings']['google_analytics_event'] = (bool) $this->get( 'google_analytics_event' );

		/**
		 * Filter API: add extra fields here with the values, in order to work in the template views
		 */
		$this->template['settings'] = apply_filters( 'apg_settings_fields', $this->template['settings'] );

		/**
		 * Checks whether Awesome Google Analytics is installed or not
		 */
		$this->template['installed_aga'] = defined( 'AGA_VERSION' );
		if( $this->template['installed_aga'] ) {
			$aga = get_option( 'aga', array() );

			if( ! isset( $aga['ua_code'] ) ) {
				$aga['ua_code'] = __( 'not set', 'aga' );
			}

			$this->template['ga_ua_code'] = $aga['ua_code'];
		}

		// Manage Add-ons
		$addons                        = new Addonmanager( $this->extensions );
		$this->template['addons']      = $addons->get_addons();
		$this->template['addons_full'] = $this->extensions;

        $this->render_view('backend/settings', $addons->get_addons() );
	}

    /**
     * Update the settings to the database options
     *
     * @return array|bool
     */
    public function handle_upload_post() {
        $new_settings = filter_input(INPUT_POST, 'apg_settings', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if( ! is_null( $new_settings ) && $new_settings !== false ) {
	        $bool_fields = $this->get_bool_fields();

            foreach( $new_settings as $label => $value ) {
                if( in_array( $label, $bool_fields ) ) {
                    $this->options[ $label ] = true;
                    continue;
                }

	            if( $label === 'addons' ) {
		            $this->options[ 'addons' ] = $this->handle_addon_settings( $value );
	            }
	            elseif( ! in_array( $label, $bool_fields ) ) {
		            $this->options[ $label ] = sanitize_text_field( $value );
	            }
            }

	        foreach( $bool_fields as $b ) {
		        if( ! isset( $new_settings[ $b ] ) ) {
			        $this->options[ $b ] = false;
		        }
	        }

            if( isset( $new_settings['licenses'] ) ) {
                $apg_licenses = new Licenses( $this->extensions );
                $old_licenses = $apg_licenses->get_licenses();

                if( is_array( $new_settings['licenses'] ) ) {
                    $activated   = 0;
                    $deactivated = 0;
                    foreach( $new_settings['licenses'] as $product => $license ) {
                        if( ! empty( $license ) ) {
                            if( isset( $old_licenses[ $product ]['key'] ) && $old_licenses[ $product ]['key'] === sanitize_text_field( $license ) ) {
                                continue;
                            }

                            if( $apg_licenses->activate_license_key( $license, $product ) ){
                                $apg_licenses->save_license( $license, $product );
                                $activated++;
                            }
                            else{
                                return array(
                                    'error' => '<strong>' . __('License validation error:', 'apg') . '</strong> ' . esc_attr( $apg_licenses->get_error() ),
                                );
                            }
                        }
                        elseif( isset( $old_licenses[ $product ]['key'] ) ) {
                            if( $apg_licenses->deactivate_license_key( $old_licenses[ $product ]['key'], $product ) ) {
                                $apg_licenses->unsave_license( $product );
                                $deactivated++;
                            }
                            else{
                                return array(
                                    'error' => '<strong>' . __('License deactivation error:', 'apg') . '</strong> ' . esc_attr( $apg_licenses->get_error() ),
                                );
                            }
                        }
                    }

                    if( $activated >= 1 ) {
                        $this->apg_success( sprintf( __( 'We have successfully activated %d license key(s)!', 'apg' ), $activated ) );
                    }
                    if( $deactivated >= 1 ) {
                        $this->apg_success( sprintf( __( 'We have successfully deactivated %d license key(s)!', 'apg' ), $deactivated ) );
                    }
                }
            }

            // Don't store the license keys in this option set
            unset( $this->options['licenses'] );

            return true;
        }

        return array(
            'error' => __('Could not save your settings.','apg'),
        );
    }

	/**
	 * Filter the add-on settings
	 *
	 * @param $value
	 *
	 * @return array
	 */
	private function handle_addon_settings( $value ) {
		$fields = array();

		foreach( $this->extensions as $addonname => $addon ) {
			foreach( $addon['settings'] as $setting ) {
				foreach( $setting as $group ) {

					if( ! is_array( $group ) ) {
						continue;
					}

					foreach ( $group as $name => $field ) {
						if( $field['type'] === 'checkbox' ) {
							$fields[ $addonname ][ $name ] = false;
						}
						else {
							$fields[ $addonname ][ $name ] = '';
						}
					}
				}
			}
		}

		if( is_array( $value ) ) {
			foreach ( $value as $extension => $row ) {
				foreach ( $row as $key => $content ) {
					if ( $content == 'on' || $content === true ) {
						$fields[ $extension ][ $key ] = true;
					} elseif ( $content === false ) {
						$fields[ $extension ][ $key ] = false;
					} else {
						$fields[ $extension ][ $key ] = sanitize_text_field( $content );
					}
				}
			}
		}

		return $fields;
	}

    /**
     * Save the options in this class
     *
     * @return mixed
     */
    private function save_options() {
        return update_option( 'apg_settings', $this->options );
    }

	/**
	 * Get the bool fields
	 *
	 * @return mixed
	 */
	public function get_bool_fields() {
		$bool_fields = array(
			'disable_frontend_css',
			'disable_frontend_js',
			'enable_slideshow',
			'slideshow_autostart',
			'enable_thumb_shadow',
			'google_analytics_event',
		);

		/**
		 * API Filter: Set the checkbox fields here, to convert them into boolean's
		 */
		return apply_filters( 'apg_settings_checkboxes', $bool_fields );
	}

}
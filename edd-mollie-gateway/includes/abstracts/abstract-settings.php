<?php
/**
 * Abstract Gateway Settings Class
 */

defined( 'ABSPATH' ) || exit;

/**
 * EDD_Mollie_Settings class.
 */
abstract class EDD_Mollie_Settings {

	/**
	 * The plugin ID. Used for option names.
	 *
	 * @var string
	 */
	public $plugin_id = 'edd_mollie_';

	/**
	 * ID of the class extending the settings API. Used in option names.
	 *
	 * @var string
	 */
	public $id = '';

	/**
	 * Validation errors.
	 *
	 * @var array of strings
	 */
	public $errors = array();

	/**
	 * Setting values.
	 *
	 * @var array
	 */
	public $settings = array();

	/**
	 * Form option fields.
	 *
	 * @var array
	 */
	public $form_fields = array();

	/**
	 * The posted settings data. When empty, $_POST data will be used.
	 *
	 * @var array
	 */
	protected $data = array();

	/**
	 * Get the form fields after they are initialized.
	 *
	 * @return array of options
	 */
	public function get_form_fields() {
		return apply_filters( 'edd_mollie_settings_form_fields_' . $this->id, array_map( array( $this, 'set_defaults' ), $this->form_fields ) );
	}

	/**
	 * Set default required properties for each field.
	 *
	 * @param array $field Setting field array.
	 * @return array
	 */
	protected function set_defaults( $field ) {
		if ( ! isset( $field['default'] ) ) {
			$field['default'] = '';
		}
		return $field;
	}

	/**
	 * Output the admin options table.
	 */
	public function admin_options() {
		echo '<table class="form-table edd-mollie-settings">';
		$this->generate_settings_html( $this->get_form_fields() ); // WPCS: XSS ok.
		echo '</table>';

		printf( '<input type="hidden" name="option_name" value="%s">', esc_attr( $this->get_option_key() ) );
	}

	/**
	 * Initialise settings form fields.
	 *
	 * Add an array of fields to be displayed on the gateway's settings screen.
	 *
	 * @since  1.0.0
	 */
	public function init_form_fields() {}

	/**
	 * Return the name of the option in the WP DB.
	 *
	 * @since 2.6.0
	 * @return string
	 */
	public function get_option_key() {
		return $this->plugin_id . $this->id . '_settings';
	}

	/**
	 * Get a fields type. Defaults to "text" if not set.
	 *
	 * @param  array $field Field key.
	 * @return string
	 */
	public function get_field_type( $field ) {
		return empty( $field['type'] ) ? 'text' : $field['type'];
	}

	/**
	 * Get a fields default value. Defaults to "" if not set.
	 *
	 * @param  array $field Field key.
	 * @return string
	 */
	public function get_field_default( $field ) {
		return empty( $field['default'] ) ? '' : $field['default'];
	}

	/**
	 * Get a field's posted and validated value.
	 *
	 * @param string $key Field key.
	 * @param array  $field Field array.
	 * @param array  $post_data Posted data.
	 * @return string
	 */
	public function get_field_value( $key, $field, $form_data = array() ) {
		$type      = $this->get_field_type( $field );
		$field_key = $this->get_field_key( $key );
		$request   = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		
		if ( empty( $form_data ) && isset( $request[ $this->get_option_key() ] ) ) {
			$form_data = sanitize_text_field( wp_unslash( $request[ $this->get_option_key() ] ) );
		}
		$value     = isset( $form_data[ $key ] ) ? $form_data[ $key ] : null;

		if ( isset( $field['sanitize_callback'] ) && is_callable( $field['sanitize_callback'] ) ) {
			return call_user_func( $field['sanitize_callback'], $value );
		}

		// Look for a validate_FIELDID_field method for special handling.
		if ( is_callable( array( $this, 'validate_' . $key . '_field' ) ) ) {
			return $this->{'validate_' . $key . '_field'}( $key, $value );
		}

		// Look for a validate_FIELDTYPE_field method.
		if ( is_callable( array( $this, 'validate_' . $type . '_field' ) ) ) {
			return $this->{'validate_' . $type . '_field'}( $key, $value );
		}

		// Fallback to text.
		return $this->validate_text_field( $key, $value );
	}

	/**
	 * Sets the POSTed data. This method can be used to set specific data, instead of taking it from the $_POST array.
	 *
	 * @param array $data Posted data.
	 */
	public function set_post_data( $data = array() ) {
		$this->data = $data;
	}

	/**
	 * Returns the POSTed data, to be used to save the settings.
	 *
	 * @return array
	 */
	public function get_post_data() {
		if ( ! empty( $this->data ) && is_array( $this->data ) ) {
			return $this->data;
		}
		
		return $_POST; // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
	}

	/**
	 * Update a single option.
	 *
	 * @since 3.4.0
	 * @param string $key Option key.
	 * @param mixed  $value Value to set.
	 * @return bool was anything saved?
	 */
	public function update_option( $key, $value = '' ) {
		if ( empty( $this->settings ) ) {
			$this->init_settings();
		}

		$this->settings[ $key ] = $value;

		return update_option( $this->get_option_key(), apply_filters( 'edd_mollie_settings_sanitized_fields_' . $this->id, $this->settings ), 'yes' );
	}

	/**
	 * Processes and sanitize options.
	 * If there is an error thrown, will continue to save and validate fields, but will leave the erroring field out.
	 *
	 * @return array sanitized options
	 */
	public function process_admin_options( $input ) {
		if ( empty( $this->settings ) ) {
			$this->init_settings();
		}
		
		$request = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		
		// check if we're processing our own settings
		if (empty($request['option_name']) || $request['option_name'] != $this->get_option_key() ) {
			return $this->settings;
		}

		foreach ( $this->get_form_fields() as $key => $field ) {
			if ( 'title' !== $this->get_field_type( $field ) ) {
				try {
					$this->settings[ $key ] = $this->get_field_value( $key, $field, $input );
				} catch ( Exception $e ) {
					$this->add_error( $e->getMessage() );
				}
			}
		}

		return $this->settings;
	}

	/**
	 * Add an error message for display in admin on save.
	 *
	 * @param string $error Error message.
	 */
	public function add_error( $error ) {
		$this->errors[] = $error;
	}

	/**
	 * Get admin error messages.
	 */
	public function get_errors() {
		return $this->errors;
	}

	/**
	 * Display admin error messages.
	 */
	public function display_errors() {
		if ( $this->get_errors() ) {
			echo '<div id="edd_mollie_errors" class="error notice is-dismissible">';
			foreach ( $this->get_errors() as $error ) {
				echo '<p>' . wp_kses_post( $error ) . '</p>';
			}
			echo '</div>';
		}
	}

	/**
	 * Register Settings in WP Settings API.
	 *
	 * @since 1.0.0
	 * @uses get_option(), add_option()
	 */
	public function register_settings() {
		$page = 'edd_settings_gateways-edd-mollie_' . $this->id;
		$section = $this->get_option_key()."_default";

		foreach ( $this->get_form_fields() as $option_key => $field ) {
			$type = $this->get_field_type( $field );
			if ( is_callable( array( $this, "generate_{$type}_html" ) ) ) {
				$callback = array( $this, "generate_{$type}_html" );
			} elseif ( isset( $field['callback'] ) && is_callable( $field['callback'] ) ) {
				$callback = $field['callback'];
			} else {
				$callback = array( $this, "generate_text_html" );
			}

			if ( $type == 'title' ) {
				add_settings_section(
					$option_key,
					$field['title'],
					$callback,
					$page
				);
				$section = $option_key;
			} else {
				// echo "<pre>$section</pre>";
				add_settings_field(
					$option_key,
					$field['title'],
					$callback,
					$page,
					$section,
					$field + array( 'key' => $option_key )
				);
			}
		}
		register_setting( 'edd_settings', $this->get_option_key(), array( $this, 'process_admin_options' ) );
	}

	/**
	 * Initialise Settings.
	 *
	 * Store all settings in a single database entry
	 * and make sure the $settings array is either the default
	 * or the settings stored in the database.
	 *
	 * @since 1.0.0
	 * @uses get_option(), add_option()
	 */
	public function init_settings() {
		$this->settings = get_option( $this->get_option_key(), null );

		// If there are no settings defined, use defaults.
		if ( ! is_array( $this->settings ) ) {
			$form_fields    = $this->get_form_fields();
			$this->settings = array_merge( array_fill_keys( array_keys( $form_fields ), '' ), wp_list_pluck( $form_fields, 'default' ) );
		}
	}

	/**
	 * Get option from DB.
	 *
	 * Gets an option from the settings API, using defaults if necessary to prevent undefined notices.
	 *
	 * @param  string $key Option key.
	 * @param  mixed  $empty_value Value when empty.
	 * @return string The value specified for the option or a default value for the option.
	 */
	public function get_option( $key, $empty_value = null ) {
		if ( empty( $this->settings ) ) {
			$this->init_settings();
		}

		// Get option default if unset.
		if ( ! isset( $this->settings[ $key ] ) ) {
			$form_fields            = $this->get_form_fields();
			$this->settings[ $key ] = isset( $form_fields[ $key ] ) ? $this->get_field_default( $form_fields[ $key ] ) : '';
		}

		if ( ! is_null( $empty_value ) && '' === $this->settings[ $key ] ) {
			$this->settings[ $key ] = $empty_value;
		}

		return $this->settings[ $key ];
	}

	/**
	 * Prefix key for settings.
	 *
	 * @param  string $key Field key.
	 * @return string
	 */
	public function get_field_key( $key ) {
		return $this->plugin_id . $this->id . '_settings[' . $key . ']';
	}

	/**
	 * Generate Settings HTML.
	 *
	 * Generate the HTML for the fields on the "settings" screen.
	 *
	 * @param array $form_fields (default: array()) Array of form fields.
	 * @param bool  $echo Echo or return.
	 * @return string the html for the settings
	 * @since  1.0.0
	 * @uses   method_exists()
	 */
	public function generate_settings_html( $form_fields = array(), $echo = true ) {
		if ( empty( $form_fields ) ) {
			$form_fields = $this->get_form_fields();
		}

		$html    = '';
		$page    = 'edd_settings_gateways-edd-mollie_' . $this->id;
		$section = $this->get_option_key() . '_default';
		
		ob_start();
		do_settings_sections( $page );
		$html .= ob_get_clean();

		foreach ( $form_fields as $k => $v ) {
			$type = $this->get_field_type( $v );
			
			if ( $type == 'title' ) {
				ob_start();
				do_settings_sections( $k );
				$html .= ob_get_clean();
			}
		}

		if ( $echo ) {
			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $html;
		}
	}

	/**
	 * Get HTML for tooltips.
	 *
	 * @param  array $data Data for the tooltip.
	 * @return string
	 */
	public function get_tooltip_html( $data ) {
		if ( true === $data['desc_tip'] ) {
			$tip = $data['description'];
		} elseif ( ! empty( $data['desc_tip'] ) ) {
			$tip = $data['desc_tip'];
		} else {
			$tip = '';
		}

		// @TODO: write wc_help_tip replacement
		return $tip;
	}

	/**
	 * Get HTML for descriptions.
	 *
	 * @param  array $data Data for the description.
	 * @return string
	 */
	public function get_description_html( $data ) {
		if ( true === $data['desc_tip'] ) {
			$description = '';
		} elseif ( ! empty( $data['desc_tip'] ) ) {
			$description = $data['description'];
		} elseif ( ! empty( $data['description'] ) ) {
			$description = $data['description'];
		} else {
			$description = '';
		}

		return $description ? '<p class="description">' . $description . '</p>' . "\n" : '';
	}

	/**
	 * Get custom attributes.
	 *
	 * @param  array $data Field data.
	 * @return string
	 */
	public function get_custom_attribute_html( $data ) {
		$custom_attributes = array();

		if ( ! empty( $data['custom_attributes'] ) && is_array( $data['custom_attributes'] ) ) {
			foreach ( $data['custom_attributes'] as $attribute => $attribute_value ) {
				$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
			}
		}

		return implode( ' ', $custom_attributes );
	}

	/**
	 * Generate Text Input HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_text_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'placeholder'       => '',
			'type'              => 'text',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
		);

		$data = wp_parse_args( $data, $defaults );

		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<input class="input-text regular-input <?php echo esc_attr( $data['class'] ); ?>" type="<?php echo esc_attr( $data['type'] ); ?>" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" value="<?php echo esc_attr( $this->get_option( $key ) ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?> />
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php

	}

	/**
	 * Generate Password Input HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_password_html( $data ) {
		$data['type'] = 'password';
		return $this->generate_text_html( $data );
	}

	/**
	 * Generate Color Picker Input HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_color_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'placeholder'       => '',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
		);

		$data = wp_parse_args( $data, $defaults );

		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<span class="colorpickpreview" style="background:<?php echo esc_attr( $this->get_option( $key ) ); ?>;">&nbsp;</span>
			<input class="colorpick <?php echo esc_attr( $data['class'] ); ?>" type="text" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" value="<?php echo esc_attr( $this->get_option( $key ) ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?> />
			<div id="colorPickerDiv_<?php echo esc_attr( $field_key ); ?>" class="colorpickdiv" style="z-index: 100; background: #eee; border: 1px solid #ccc; position: absolute; display: none;"></div>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Textarea HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_textarea_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'placeholder'       => '',
			'type'              => 'text',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
		);

		$data = wp_parse_args( $data, $defaults );

		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<textarea rows="3" cols="20" class="input-text wide-input <?php echo esc_attr( $data['class'] ); ?>" type="<?php echo esc_attr( $data['type'] ); ?>" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?>><?php echo esc_textarea( $this->get_option( $key ) ); ?></textarea>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Checkbox HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_checkbox_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'label'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'type'              => 'text',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
		);

		$data = wp_parse_args( $data, $defaults );

		if ( ! $data['label'] ) {
			$data['label'] = $data['title'];
		}
		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<label for="<?php echo esc_attr( $field_key ); ?>">
			<input <?php disabled( $data['disabled'], true ); ?> class="<?php echo esc_attr( $data['class'] ); ?>" type="checkbox" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" value="1" <?php checked( $this->get_option( $key ), 'yes' ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?> /> <?php echo wp_kses_post( $data['label'] ); ?></label><br/>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Select HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_select_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'placeholder'       => '',
			'type'              => 'text',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
			'options'           => array(),
		);

		$data = wp_parse_args( $data, $defaults );

		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<select class="select <?php echo esc_attr( $data['class'] ); ?>" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?>>
				<?php foreach ( (array) $data['options'] as $option_key => $option_value ) : ?>
					<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( (string) $option_key, esc_attr( $this->get_option( $key ) ) ); ?>><?php echo esc_attr( $option_value ); ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Multiselect HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_multiselect_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'placeholder'       => '',
			'type'              => 'text',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
			'select_buttons'    => false,
			'options'           => array(),
		);

		$data  = wp_parse_args( $data, $defaults );
		$value = (array) $this->get_option( $key, array() );

		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<select multiple="multiple" class="multiselect <?php echo esc_attr( $data['class'] ); ?>" name="<?php echo esc_attr( $field_key ); ?>[]" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" <?php disabled( $data['disabled'], true ); ?> <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?>>
				<?php foreach ( (array) $data['options'] as $option_key => $option_value ) : ?>
					<?php if ( is_array( $option_value ) ) : ?>
						<optgroup label="<?php echo esc_attr( $option_key ); ?>">
							<?php foreach ( $option_value as $option_key_inner => $option_value_inner ) : ?>
								<option value="<?php echo esc_attr( $option_key_inner ); ?>" <?php selected( in_array( (string) $option_key_inner, $value, true ), true ); ?>><?php echo esc_attr( $option_value_inner ); ?></option>
							<?php endforeach; ?>
						</optgroup>
					<?php else : ?>
						<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( in_array( (string) $option_key, $value, true ), true ); ?>><?php echo esc_attr( $option_value ); ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
			<?php if ( $data['select_buttons'] ) : ?>
				<br/><a class="select_all button" href="#"><?php esc_html_e( 'Select all', 'edd-mollie-gateway' ); ?></a> <a class="select_none button" href="#"><?php esc_html_e( 'Select none', 'edd-mollie-gateway' ); ?></a>
			<?php endif; ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Number input HTML.
	 *
	 * @param string $key Field key.
	 * @param array  $data Field data.
	 * @since  1.0.0
	 * @return string
	 */
	public function generate_number_html( $data ) {
		$key = $data['key'];
		$field_key = $this->get_field_key( $key );
		$defaults  = array(
			'title'             => '',
			'label'             => '',
			'disabled'          => false,
			'class'             => '',
			'css'               => '',
			'desc_tip'          => false,
			'description'       => '',
			'custom_attributes' => array(),
			'size'              => '',
		);

		$data = wp_parse_args( $data, $defaults );

		if ( ! $data['label'] ) {
			$data['label'] = $data['title'];
		}

		if ( !empty( $data['size'] ) ) {
			$data['css'] .= ';width:auto;';
		}
		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
			<input <?php disabled( $data['disabled'], true ); ?> class="<?php echo esc_attr( $data['class'] ); ?>" type="number" name="<?php echo esc_attr( $field_key ); ?>" id="<?php echo esc_attr( $field_key ); ?>" style="<?php echo esc_attr( $data['css'] ); ?>" value="<?php echo esc_attr( $this->get_option( $key ) ); ?>" <?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); // WPCS: XSS ok. ?> size="<?php echo esc_attr( $data['size'] ); ?>" />
			<label for="<?php echo esc_attr( $field_key ); ?>"><?php echo wp_kses_post( $data['label'] ); ?></label><br/>
			<?php echo wp_kses_post( $this->get_description_html( $data ) ); // WPCS: XSS ok. ?>
		</fieldset>
		<?php
	}

	/**
	 * Generate Title HTML.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function generate_title_html() {
		return;
	}

	/**
	 * Validate Text Field.
	 *
	 * Make sure the data is escaped correctly, etc.
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string
	 */
	public function validate_text_field( $key, $value ) {
		$value = is_null( $value ) ? '' : $value;
		return wp_kses_post( trim( stripslashes( $value ) ) );
	}

	/**
	 * Validate Password Field. No input sanitization is used to avoid corrupting passwords.
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string
	 */
	public function validate_password_field( $key, $value ) {
		$value = is_null( $value ) ? '' : $value;
		return trim( stripslashes( $value ) );
	}

	/**
	 * Validate Textarea Field.
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string
	 */
	public function validate_textarea_field( $key, $value ) {
		$value = is_null( $value ) ? '' : $value;
		return wp_kses( trim( stripslashes( $value ) ),
			array_merge(
				array(
					'iframe' => array(
						'src'   => true,
						'style' => true,
						'id'    => true,
						'class' => true,
					),
				),
				wp_kses_allowed_html( 'post' )
			)
		);
	}

	/**
	 * Validate Checkbox Field.
	 *
	 * If not set, return "no", otherwise return "yes".
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string
	 */
	public function validate_checkbox_field( $key, $value ) {
		return ! is_null( $value ) ? 'yes' : 'no';
	}

	/**
	 * Validate Select Field.
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string
	 */
	public function validate_select_field( $key, $value ) {
		$value = is_null( $value ) ? '' : $value;
		return $this->clean_var( stripslashes( $value ) );
	}

	/**
	 * Validate Multiselect Field.
	 *
	 * @param  string $key Field key.
	 * @param  string $value Posted Value.
	 * @return string|array
	 */
	public function validate_multiselect_field( $key, $value ) {
		return is_array( $value ) ? array_map( array( $this, 'clean_var' ), array_map( 'stripslashes', $value ) ) : '';
	}

	/**
	 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
	 * Non-scalar values are ignored.
	 *
	 * @param string|array $var Data to sanitize.
	 * @return string|array
	 */
	public function clean_var( $var ) {
		if ( is_array( $var ) ) {
			return array_map( array( $this, 'clean_var' ), $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}
}
<?php

/**
 * Class Emc_Setting_Field.
 *
 * @return string
 */
class Emc_Setting_Field {

	/**
	 * Render setting field.
	 *
	 * @param $field
	 * @param $options
	 * @param $options_container
	 *
	 * @return string
	 */
	public static function render( $field, $options, $options_container ) {

		$options = wp_parse_args( $options, array(
			'type' => 'text',
			'values' => '',
			'base_name' => 'emc_options',
			'label' => $field,
			'wrapper_class' => '',
		) );

		$values = $options['values'];

		unset( $options['tab'], $options['values'] );

		$template = "<div class='emc-field emc-field__$field %s'>
                        <div class='emc-field__label'>%s</div>
                        <div class='emc-field__content'>%s</div>
                    </div>";

		$field_name = esc_attr( $field );

		$template = apply_filters( 'emc_setting_field_template', $template, $options, $options_container );

		$options_string = null;
		$options['name'] = ! empty( $options['base_name'] ) ? $options['base_name'] . '[' . $field_name . ']' : $field_name;
		$options['value'] = isset( $options_container[ $field ] ) ? $options_container[ $field ] : false;

		if ( $options['type'] == 'checkbox' ) $options['value'] = 1;

		$tooltip = ! empty( $options['data-tooltip'] ) ? $options['data-tooltip'] : null;

		if ( ! empty( $tooltip ) ) {
			unset( $options['data-tooltip'] );

			$options['label'] = $options['label'] . '<div class="emc-info">
                        <div class="emc-info__icon"></div>
                        <div class="emc-info__overlay">' . $tooltip . '</div>
                    </div>';
		}

		foreach ( $options as $key => $value ) {
			if ( is_array( $value ) || ! $value || $key == 'base_name' || $key == 'label' ) continue;
			$options_string .= $key . '="' . esc_attr( $value ) . '" ';
		}

		switch ( $options['type'] ) {
			case 'radio':
				if ( ! empty( $values ) ) {
					$field = null;
					foreach ( $values as $value => $label ) {
						$field .= "
						<label>
							<input type='radio' value='" . esc_attr( $value ) . "' " . checked( $value, $options['value'], false ) . " name='" . esc_attr( $options['name'] ) . "' {$options_string}>
							{$label}
						</label>";
					}
				}
				break;
			case 'checkbox':
				$checked_val = isset( $options_container[ $field ] ) ? $options_container[ $field ] : false;
				$field = "
						<input type='hidden' name='" . esc_attr( $options['name'] ) . "' value='0'/>
						<label class='emc-switch'>
							<input type='checkbox' name='" . esc_attr( $options['name'] ) . "' {$options_string} " . checked( 1, $checked_val, false ) . ">
							<span class='emc-slider'></span>
						</label>";
				break;

			case 'list':
			case 'select':
			case 'selectbox':
				$field = "<select {$options_string}>";

				if ( ! empty( $options['placeholder'] ) ) {
					$field .= '<option value="">' . $options['placeholder'] . '</option>';
				}

				if ( ! empty( $values ) ) {
					foreach ( $values as $pvalue => $plabel ) {
						$field .= '<option value="' . esc_attr( $pvalue ) . '" '. selected( $pvalue, $options['value'], false ) .'>' .
						          ( is_string( $plabel ) ? $plabel : $plabel['label'] )
						          . '</option>';
					}
				}

				$field .= '</select>';

				break;

			case 'color':
				$default_settings = emc_get_default_settings();
				$default_color = ! empty( $default_settings[ $field_name ] ) ? $default_settings[ $field_name ] : '';

				$field = "<input type='" . esc_attr( $options['type'] ) . "' {$options_string} data-default-color='" . esc_attr( $default_color ) . "'>";
				break;

			default:
				$field = "<input type='" . $options['type'] . "' {$options_string}>";
		}

		$template = sprintf( $template, $options['wrapper_class'], $options['label'], $field );

		return $template;
	}
}

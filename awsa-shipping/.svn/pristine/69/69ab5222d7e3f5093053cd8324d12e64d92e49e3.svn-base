<?php
/**
 * Class AWSA_Settings_Page_Fields
 *
 * @package           AWSA_Core
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Class AWSA_Settings_API
 */
class AWSA_Settings_Page_Fields {
	/**
	 * Get Settings Field
	 *
	 * @return array
	 */
	public function get_settings_fields() {
		return array();
	}

	/**
	 * Convert Fields to tr by title
	 *
	 * @return string HTML
	 */
	public function render_fields() {
		$fields = $this->get_settings_fields();

		foreach ( $fields as $field_id => $field_atts ) {
			$title      = isset( $field_atts['title'] ) ? $field_atts['title'] : '';
			$field_html = AWSA_Settings_API::generate_field_html( $field_atts );
			echo "<tr>
					<th>{$title}</th>
					<td>{$field_html}</td>
				</tr>";
		}
	}

	/**
	 * Sanitize Fields value for Save
	 *
	 * @param mixed $values
	 * @return mixed
	 */
	public function sanitize_fields( $values ) {
		$fields = $this->get_settings_fields();

		foreach ( $fields as $field_id => $field_atts ) {
			$v = isset( $values[ $field_id ] ) ? $values[ $field_id ] : '';

			$field_atts['value']  = $v;
			$vfields[ $field_id ] = AWSA_Settings_API::sanitize_field( $field_atts );
		}

		return $vfields;
	}

	/**
	 * Check has AWSA_Error in Values and Return Errors
	 *
	 * @param array $values
	 * @return false|array
	 */
	public function has_error( $values ) {
		foreach ( $values as $k => $v ) {
			if ( is_a( $v, 'AWSA_Error' ) ) {
				$errors[ $k ] = $v;
			}
		}

		return ! empty( $errors ) ? $errors : false;
	}

}

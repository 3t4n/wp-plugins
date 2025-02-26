<?php
/**
 * Divider field.
 *
 * @package    Fancy Fields For WPForms
 * @author     sanzeeb3
 * @since      1.0.0
 * @license    GPL-2.0+
 */
class FFWP_Field_F_Divider extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'Section Divider', 'fancy-fields-for-wpforms' );
		$this->type  = apply_filters( 'fancy_fields_for_wpforms_divider', 'f-divider' );
		$this->icon  = 'fa-arrows-h';
		$this->order = 19;
		$this->group = 'unlocked_fancy';
	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field settings.
	 */
	public function field_options( $field ) {

		// Options open markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Label.
		$this->field_option( 'label', $field );

		// Description.
		$this->field_option( 'description', $field );

		// Options close markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'close',
			)
		);
	}

	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field settings.
	 */
	public function field_preview( $field ) {

		// Label.
		$this->field_preview_option( 'label', $field );

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field      Field settings.
	 * @param array $deprecated Deprecated.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Primary field.
		printf(
			'<h3 class="ffwp-divider">' . esc_attr( $field['label'] ) .'</h3>'
		);

		?>
			<script>
				jQuery(document).ready(function( $ ){
					$(".ffwp-divider").siblings('label').hide();
				});
			</script>
		<?php
	}
}

new FFWP_Field_F_Divider();

<?php
/**
 * Framework fieldset field file.
 *
 * @link       https://shapedplugin.com
 * @since      2.0.0
 *
 * @package    Smart_Brands_For_Wc
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;

if ( ! class_exists( 'SPF_SMART_BRANDS_Field_fieldset' ) ) {
	/**
	 *
	 * Field: fieldset
	 *
	 * @since 2.0.0
	 * @version 2.0.0
	 */
	class SPF_SMART_BRANDS_Field_fieldset extends SPF_SMART_BRANDS_Fields {
		/**
		 * Field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		/**
		 * Render
		 *
		 * @return void
		 */
		public function render() {
			echo wp_kses_post( $this->field_before() );
			echo '<div class="csf-fieldset-content" data-depend-id="' . esc_attr( $this->field['id'] ) . '">';
			foreach ( $this->field['fields'] as $field ) {
				$field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
				$field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
				$field_value   = ( isset( $this->value[ $field_id ] ) ) ? $this->value[ $field_id ] : $field_default;
				$unique_id     = ( ! empty( $this->unique ) ) ? $this->unique . '[' . $this->field['id'] . ']' : $this->field['id'];

				SPF_SMART_BRANDS::field( $field, $field_value, $unique_id, 'field/fieldset' );
			}
			echo '</div>';
			echo wp_kses_post( $this->field_after() );
		}
	}
}

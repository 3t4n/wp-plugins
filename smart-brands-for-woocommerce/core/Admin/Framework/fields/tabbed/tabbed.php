<?php
/**
 * Framework tabbed field file.
 *
 * @link https://shapedplugin.com
 * @since 2.0.0
 *
 * @package Smart_Brands_For_Wc
 * @subpackage Smart_Brands_For_Wc/Admin
 */

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;

if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.


if ( ! class_exists( 'SPF_SMART_BRANDS_Field_tabbed' ) ) {
	/**
	 *
	 * Field: tabbed
	 *
	 * @since 2.0.0
	 * @version 2.0.0
	 */
	class SPF_SMART_BRANDS_Field_tabbed extends SPF_SMART_BRANDS_Fields {
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
		 * Render field
		 *
		 * @return void
		 */
		public function render() {
			$unallows = array( 'tabbed' );
			echo wp_kses_post( $this->field_before() );
			echo '<div class="csf-tabbed-nav">';
			foreach ( $this->field['tabs'] as $key => $tab ) {
				$tabbed_icon   = ( ! empty( $tab['icon'] ) ) ? '<i class="' . esc_attr( $tab['icon'] ) . '"></i>' : '';
				$tabbed_active = ( empty( $key ) ) ? 'csf-tabbed-active' : '';

				echo '<a href="#" class="csf-tab-item-' . esc_attr( $key ) . ' ' . esc_attr( $tabbed_active ) . '"">' . $tabbed_icon . esc_attr( $tab['title'] ) . '</a>'; // phpcs:ignore -- $tabbed_icon attribute has already been escaped above.
			}
			echo '</div>';

			echo '<div class="csf-tabbed-contents">';
			foreach ( $this->field['tabs'] as $key => $tab ) {

				$tabbed_hidden = ( ! empty( $key ) ) ? ' hidden' : '';
				echo '<div class="csf-tabbed-content' . esc_attr( $tabbed_hidden ) . '">';

				foreach ( $tab['fields'] as $field ) {
					if ( in_array( $field['type'], $unallows ) ) {
						$field['_notice'] = true;
					}
					$field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
					$field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
					$field_value   = ( isset( $this->value[ $field_id ] ) ) ? $this->value[ $field_id ] : $field_default;
					$unique_id     = ( ! empty( $this->unique ) ) ? $this->unique : '';

					SPF_SMART_BRANDS::field( $field, $field_value, $unique_id, 'field/tabbed' );
				}
				echo '</div>';
			}
			echo '</div>';
			echo wp_kses_post( $this->field_after() );
		}
	}
}

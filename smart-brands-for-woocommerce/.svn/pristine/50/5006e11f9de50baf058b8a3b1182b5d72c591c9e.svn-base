<?php
/**
 * Framework heading field file.
 *
 * @link       https://shapedplugin.com
 * @since      1.0.0
 *
 * @package    Smart_Brands_For_Wc
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.

if ( ! class_exists( 'SPF_SMART_BRANDS_Field_heading' ) ) {
	/**
	 *
	 * Field: heading
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	class SPF_SMART_BRANDS_Field_heading extends SPF_SMART_BRANDS_Fields {

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
			echo ( ! empty( $this->field['icon'] ) ) ? wp_kses_post( $this->field['icon'] ) : '';
			echo ( ! empty( $this->field['content'] ) ) ? wp_kses_post( $this->field['content'] ) : '';
			echo ( ! empty( $this->field['image'] ) ) ? '
			<div class="heading-wrapper">
				<img src="' . esc_url( $this->field['image'] ) . '"/>
				<span class="sp-smart-brands-pro-version">' . esc_html( SMART_BRANDS_VERSION ) . '</span>
			</div>' : '';
			echo ( ! empty( $this->field['after'] ) && ! empty( $this->field['link'] ) ) ? '
				<div class="sp_brands_shortcode_header_support">
					<span class="support"> ' . wp_kses_post( $this->field['after'] ) . '</span>
					<div class="csf-help-text sp_brand-support">
						<div class="sp_brand-info-label">' . esc_html__( 'Documentation', 'smart-brands-for-woocommerce' ) . '</div>
						' . esc_html__( 'Check out our documentation and more information about what you can do with the Smart Brands.', 'smart-brands-for-woocommerce' ) . '
						<a class="sp_brand-open-docs browser-docs" href="https://docs.shapedplugin.com/docs/smart-brands-for-woocommerce/overview/" target="_blank">' . esc_html__( 'Browse Docs', 'smart-brands-for-woocommerce' ) . '</a>
						<div class="sp_brand-info-label">' . esc_html__( 'Need Help or Missing a Feature?', 'smart-brands-for-woocommerce' ) . '</div>
						' . esc_html__( 'Feel free to get help from our friendly support team or request a new feature if needed. We appreciate your suggestions to make the plugin better.', 'smart-brands-for-woocommerce' ) . '
						<a class="sp_brand-open-docs support" href="https://shapedplugin.com/create-new-ticket/" target="_blank">' . esc_html__( 'Get Help', 'smart-brands-for-woocommerce' ) . '</a>
						<a class="sp_brand-open-docs feature-request" href="https://shapedplugin.com/contact-us/" target="_blank">' . esc_html__( 'Request a Feature', 'smart-brands-for-woocommerce' ) . '</a>
					</div>
			</div>' : '';
		}
	}
}

<?php
/**
 * Framework shortcode fields file.
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

if ( ! class_exists( 'SPF_SMART_BRANDS_Field_shortcode' ) ) {
	/**
	 *
	 * Field: Shortcode
	 *
	 * @since 2.0
	 * @version 2.0
	 */
	class SPF_SMART_BRANDS_Field_shortcode extends SPF_SMART_BRANDS_Fields {
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

			$type = ( ! empty( $this->field['attributes']['type'] ) ) ? $this->field['attributes']['type'] : 'text';
			global $post;
			$postid = $post->ID;
			echo '<div class="sp-smart-brand-scode-wrapper">';
			if ( isset( $this->field['shortcode'] ) && 'manage_view' === $this->field['shortcode'] ) {
				echo '<div class="spf-smart-brands-scode-content">
				<p>' . esc_html__( 'To display the Smart Brands, copy and paste this shortcode into your post, page, custom post, or block editor. Learn how to include it to your template file,', 'smart-brands-for-woocommerce' ) . ' <a href="https://docs.shapedplugin.com/docs/smart-brands-pro/configurations/how-to-insert-smart-brands-view-to-your-theme-files-or-other-php-files/" target="_blank">' . esc_html__( 'see how', 'smart-brands-for-woocommerce' ) . '</a></p>
				<div class="shortcode-wrap">
				<div class="sbfw-shcode-selectable">[smart_brand_for_wc id="' . esc_attr( $postid ) . '"]</div></div>
				<div class="sbfw-after-copy-text"><i class="fa fa-check-circle"></i>  ' . esc_html__( 'Shortcode  Copied to Clipboard!', 'smart-brands-for-woocommerce' ) . '</div>
				</div>';
			} else {
				echo '<div class="spf-smart-brands-scode-content"><p>' .
				sprintf(
					/* translators: 1: start strong tag, 2: close tag. */
					esc_html__( 'Smart Brands has seamless integration with Gutenberg, Classic Editor, %1$sElementor%2$s, Divi, Bricks, Beaver, Oxygen, WPBakery Builder, etc.', 'smart-brands-for-woocommerce' ),
					'<strong>',
					'</strong>'
				) . '
				</p></div>';
			}
			echo '</div>';
		}
	}
}

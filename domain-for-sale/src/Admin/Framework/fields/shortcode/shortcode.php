<?php

if ( ! defined( 'ABSPATH' ) ) {
	die; 
} // Cannot access directly.

if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_shortcode' ) ) {	
	/**
	 * DOMAIN_FOR_SALE_Field_shortcode
	 */
	class DOMAIN_FOR_SALE_Field_shortcode extends DOMAIN_FOR_SALE_Fields {
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
		 * Render method.
		 *
		 * @return void
		 */
		public function render() {
			// Get the Post ID.
			$post_id = get_the_ID();
			echo ( ! empty( $post_id ) ) ? __('<div class="domain-for-sale-scode-wrap-side"><p>To display your show, add the following shortcode into your post, custom post types, page, widget or block editor. If adding the show to your theme files, additionally include the surrounding PHP code.‎</p><span class="domain-for-sale-shortcode-selectable">[domain_for_sale id="' .  $post_id  . '"]</span></div><div class="domain-for-sale-after-copy-text"><i class="icofont-check-circled"></i> Shortcode Copied to Clipboard! </div>', 'domain-for-sale') : '';
		}

	}
}

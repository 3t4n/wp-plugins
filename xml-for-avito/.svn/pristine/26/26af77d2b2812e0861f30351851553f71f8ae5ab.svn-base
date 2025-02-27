<?php

/**
 * Trait Custom Type for variable products.
 *
 * @link       https://icopydoc.ru
 * @since      2.1.12
 * @version    2.5.8 (24-02-2025)
 *
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/variable
 */

/**
 * The trait adds `get_custom_type` methods.
 * 
 * This method allows you to return the custom tag.
 *
 * @since      0.1.0
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/variable
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     XFAVI_Get_Paired_Tag
 *             methods:     get_product
 *                          get_offer
 *                          get_feed_id
 *             functions:   common_option_get
 */
trait XFAVI_T_Variable_Get_Custom_Type {

	/**
	 * Get custom tag.
	 * 
	 * @see https://www.avito.ru/autoload/documentation/templates
	 * 
	 * 
	 * @param string $result_xml
	 * 
	 * @return string Example: `<custom_tag>12345</custom_tag>`.
	 */
	public function get_custom_type( $result_xml = '' ) {

		for ( $i = 1; $i < 12; $i++ ) {
			if ( get_term_meta( $this->get_feed_category_id(), 'xfavi_custom_type_tag_name' . $i, true ) !== '' ) {
				$tag_name = get_term_meta( $this->get_feed_category_id(), 'xfavi_custom_type_tag_name' . $i, true );
			} else {
				$tag_name = '';
			}
			$tag_name = apply_filters(
				'xfavi_f_variable_tag_name_custom_type',
				$tag_name,
				[ 
					'product' => $this->get_product(),
					'offer' => $this->get_offer(),
					'index' => $i
				],
				$this->get_feed_id()
			);

			if ( get_term_meta( $this->get_feed_category_id(), 'xfavi_custom_type_tag_value' . $i, true ) !== '' ) {
				$tag_value = get_term_meta( $this->get_feed_category_id(), 'xfavi_custom_type_tag_value' . $i, true );
			} else {
				$tag_value = '';
			}
			$tag_value = apply_filters(
				'xfavi_f_variable_tag_value_custom_type',
				$tag_value,
				[ 
					'product' => $this->get_product(),
					'offer' => $this->get_offer(),
					'index' => $i
				],
				$this->get_feed_id()
			);

			if ( ! empty( $tag_name ) && ! empty( $tag_value ) ) {
				$result_xml .= new Get_Paired_Tag( $tag_name, $tag_value );
			}
		}

		for ( $i = 1; $i < 12; $i++ ) {
			$tag_name = get_post_meta(
				$this->get_product()->get_id(),
				'_xfavi_custom_type_tag_name_' . $i,
				true
			);
			$tag_value = get_post_meta(
				$this->get_product()->get_id(),
				'_xfavi_custom_type_tag_value_' . $i,
				true
			);
			if ( ! empty( $tag_name ) && ! empty( $tag_value ) ) {
				$result_xml .= new Get_Paired_Tag( $tag_name, $tag_value );
			}
		}

		return $result_xml;

	}

}
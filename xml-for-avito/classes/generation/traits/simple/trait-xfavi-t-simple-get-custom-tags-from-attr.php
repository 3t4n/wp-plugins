<?php

/**
 * Trait for simple products.
 *
 * @link       https://icopydoc.ru
 * @since      0.1.0
 * @version    2.5.7 (05-02-2025)
 *
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/simple
 */

/**
 * The trait adds `get_custom_attr` method.
 * 
 * This method allows you to return the custom tags. The tag value is 
 * substituted from the WooCommerce attribute.
 *
 * @since      0.1.0
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/simple
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     XFAVI_Get_Paired_Tag
 *             methods:     get_product
 *                          get_feed_id
 *             functions:   common_option_get
 */
trait XFAVI_T_Simple_Get_Custom_Tags_From_Attr {

	/**
	 * Get the custom tags.
	 * 
	 * @see https://www.avito.ru/autoload/documentation/templates/100362?fileFormat=xml
	 * 
	 * @param string $result_xml
	 * 
	 * @return string Example: `<FrameMaterial>542</FrameMaterial>`.
	 */
	public function get_custom_tags_from_attr( $result_xml = '' ) {

		for ( $i = 1; $i < 6; $i++ ) {

			$custom_tag_name = common_option_get(
				'xfavi_custom_tag_name_' . $i,
				'',
				$this->get_feed_id(),
				'xfavi'
			);
			$custom_tag_attr = common_option_get(
				'xfavi_custom_attr_' . $i,
				'disabled',
				$this->get_feed_id(),
				'xfavi'
			);
			if ( $custom_tag_name === '' || $custom_tag_attr === 'disabled' ) {
				continue;
			} else {
				$attr_id = (int) $custom_tag_attr;
				$custom_tag_value = $this->get_product()->get_attribute( 
					wc_attribute_taxonomy_name_by_id( $attr_id ) 
				);
			}

			if ( ! empty( $custom_tag_value ) ) {
				$result_xml .= new Get_Paired_Tag( $custom_tag_name, $custom_tag_value );
			}

		}
		$result_xml = apply_filters(
			'xfavi_f_simple_custom_tags_from_attr',
			$result_xml,
			[ 'product' => $this->get_product() ],
			$this->get_feed_id()
		);
		return $result_xml;

	}

}
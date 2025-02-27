<?php

/**
 * Trait for simple products.
 *
 * @link       https://icopydoc.ru
 * @since      0.1.0
 * @version    2.5.5 (27-12-2024)
 *
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/simple
 */

/**
 * The trait adds `get_material` methods.
 * 
 * This method allows you to return the `Material` tag.
 *
 * @since      0.1.0
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds/traits/simple
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     XFAVI_Get_Paired_Tag
 *             methods:     get_product
 *                          get_offer
 *                          get_feed_id
 *             functions:   common_option_get
 */
trait XFAVI_T_Simple_Get_Material {

	/**
	 * Get `Material` tag.
	 * 
	 * @see https://www.avito.ru/autoload/documentation/templates
	 * 
	 * @param string $tag_name
	 * @param string $result_xml
	 * 
	 * @return string Example: `<Material>Бетон</Material>`
	 */
	public function get_material( $tag_name = 'Material', $result_xml = '' ) {

		$material = common_option_get(
			'xfavi_material',
			'disabled',
			$this->get_feed_id(),
			'xfavi'
		);

		if ( $material === 'disabled' ) {
			return $result_xml;
		}

		$tag_value = $this->get_product_post_meta( 'material' );
		if ( empty( $tag_value ) ) {
			$material = (int) $material;
			$tag_value = $this->get_product()->get_attribute( wc_attribute_taxonomy_name_by_id( $material ) );
		}

		$result_xml = $this->get_simple_tag($tag_name, $tag_value);
		return $result_xml;

	}

}
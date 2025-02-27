<?php

/**
 * Trait for simple products.
 *
 * @link       https://icopydoc.ru
 * @since      0.1.0
 * @version    2.5.6 (01-02-2025)
 *
 * @package    Y4YM
 * @subpackage Y4YM/includes/feeds/traits/simple
 */

/**
 * The trait adds `get_id` method.
 * 
 * This method allows you to return the `Id` tag.
 *
 * @since      0.1.0
 * @package    Y4YM
 * @subpackage Y4YM/includes/feeds/traits/simple
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     Y4YM_Get_Paired_Tag
 *             methods:     get_product
 *                          get_feed_id
 *                          get_simple_tag
 *                          get_duplicate_number
 *             functions:   common_option_get
 */
trait XFAVI_T_Simple_Get_Id {

	/**
	 * Get `id` tag.
	 * 
	 * @see https://www.avito.ru/autoload/documentation/templates/100362?fileFormat=xml
	 * 
	 * @param string $tag_name
	 * @param string $result_xml
	 * 
	 * @return string Example: `<id>542</id>`.
	 */
	public function get_id( $tag_name = 'Id', $result_xml = '' ) {

		$tag_value = '';

		$xfavi_simple_source_id = common_option_get( 
			'xfavi_simple_source_id', 
			false, 
			$this->get_feed_id(), 
			'xfavi'
		);
		switch ( $xfavi_simple_source_id ) {
			case "product_id":
				$tag_value = $this->get_product()->get_id();
				break;
			case "product_sku":
				$tag_value = $this->get_product()->get_sku();
				break;
			default:
				$tag_value = $this->get_product()->get_id();
		}

		$tag_value = apply_filters(
			'xfavi_f_simple_tag_value_id',
			$tag_value,
			[ 
				'product' => $this->get_product(),
				'duplicate_number' => $this->get_duplicate_number()
			],
			$this->get_feed_id()
		);
		if ( ! empty( $tag_value ) ) {
			$result_xml = new Get_Paired_Tag( $tag_name, $tag_value );
		}

		$result_xml = apply_filters(
			'xfavi_f_simple_tag_id',
			$result_xml,
			[ 
				'product' => $this->get_product(),
				'duplicate_number' => $this->get_duplicate_number()
			],
			$this->get_feed_id()
		);

		return $result_xml;

	}

}
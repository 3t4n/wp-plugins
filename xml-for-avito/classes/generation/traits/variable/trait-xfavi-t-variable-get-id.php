<?php

/**
 * Trait for variable products.
 *
 * @link       https://icopydoc.ru
 * @since      0.1.0
 * @version    2.5.6 (01-02-2025)
 *
 * @package    Y4YM
 * @subpackage Y4YM/includes/feeds/traits/variable
 */

/**
 * The trait adds `get_id` method.
 * 
 * This method allows you to return the `Id` tag.
 *
 * @since      0.1.0
 * @package    Y4YM
 * @subpackage Y4YM/includes/feeds/traits/variable
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     Y4YM_Get_Paired_Tag
 *             methods:     get_product
 *                          get_offer
 *                          get_feed_id
 *                          get_variable_tag
 *                          get_duplicate_number
 *             functions:   common_option_get
 */
trait XFAVI_T_Variable_Get_Id {

	/**
	 * Get `Id` tag.
	 * 
	 * @see https://www.avito.ru/autoload/documentation/templates/100362?fileFormat=xml
	 * 
	 * @param string $tag_name
	 * @param string $result_xml
	 * 
	 * @return string Example: `<Id>542</Id>`.
	 */
	public function get_id( $tag_name = 'Id', $result_xml = '' ) {

		$tag_value = '';

		$xfavi_var_source_id = common_option_get(
			'xfavi_var_source_id',
			false,
			$this->get_feed_id(),
			'xfavi'
		);
		switch ( $xfavi_var_source_id ) {
			case "product_id":
				$tag_value = $this->get_product()->get_id();
				break;
			case "offer_id":
				$tag_value = $this->get_offer()->get_id();
				break;
			case "product_sku":
				$tag_value = $this->get_product()->get_sku();
				break;
			case "offer_sku":
				$tag_value = $this->get_offer()->get_sku();
				break;
			default:
				$tag_value = $this->get_product()->get_id();
		}

		$tag_value = apply_filters(
			'xfavi_f_variable_tag_value_id',
			$tag_value,
			[ 
				'product' => $this->get_product(),
				'offer' => $this->get_offer(),
				'duplicate_number' => $this->get_duplicate_number()
			],
			$this->get_feed_id()
		);
		if ( ! empty( $tag_value ) ) {
			$result_xml = new Get_Paired_Tag( $tag_name, $tag_value );
		}

		$result_xml = apply_filters(
			'xfavi_f_variable_tag_id',
			$result_xml,
			[ 
				'product' => $this->get_product(),
				'offer' => $this->get_offer(),
				'duplicate_number' => $this->get_duplicate_number()
			],
			$this->get_feed_id()
		);

		return $result_xml;

	}

}
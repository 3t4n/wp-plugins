<?php

/**
 * Get unit for Simple Products.
 *
 * @link       https://icopydoc.ru
 * @since      0.1.0
 * @version    2.5.6 (01-02-2025)
 *
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds
 */

/**
 * Get unit for Simple Products.
 *
 * @since      0.1.0
 * @package    XFAVI
 * @subpackage XFAVI/includes/feeds
 * @author     Maxim Glazunov <icopydoc@gmail.com>
 * @depends    classes:     WC_Product_Variation
 *                          XFAVI_Get_Closed_Tag
 */
class XFAVI_Get_Unit_Offer_Simple extends XFAVI_Get_Unit_Offer {

	use XFAVI_T_Common_Ad;
	use XFAVI_T_Common_Contact_Info;
	use XFAVI_T_Common_Get_CatId;
	use XFAVI_T_Common_Skips;

	use XFAVI_T_Simple_Get_Accessory_Type;
	use XFAVI_T_Simple_Get_Acea;
	use XFAVI_T_Simple_Get_Adtype;
	use XFAVI_T_Simple_Get_Aft;
	use XFAVI_T_Simple_Get_Another_Type;
	use XFAVI_T_Simple_Get_Api;
	use XFAVI_T_Simple_Get_Apparel;
	use XFAVI_T_Simple_Get_Appareltype;
	use XFAVI_T_Simple_Get_BodySparePartType;
	use XFAVI_T_Simple_Get_Brand;
	use XFAVI_T_Simple_Get_Astm;
	use XFAVI_T_Simple_Get_Availability;
	use XFAVI_T_Simple_Get_Avito_Id;
	use XFAVI_T_Simple_Get_Cabinet_Type;
	use XFAVI_T_Simple_Get_Capacity;
	use XFAVI_T_Simple_Get_Category;
	use XFAVI_T_Simple_Get_Color;
	use XFAVI_T_Simple_Get_Condition;
	use XFAVI_T_Simple_Get_Custom_Tags_From_Attr;
	use XFAVI_T_Simple_Get_Custom_Type;
	use XFAVI_T_Simple_Get_DCL;
	use XFAVI_T_Simple_Get_Generation;
	use XFAVI_T_Simple_Get_Forwhom;
	use XFAVI_T_Simple_Get_Gender;
	use XFAVI_T_Simple_Get_Dimensions;
	use XFAVI_T_Simple_Get_Description;
	use XFAVI_T_Simple_Get_Dot;
	use XFAVI_T_Simple_Get_EngineSparePartType;
	use XFAVI_T_Simple_Get_Goods_Sub_Type;
	use XFAVI_T_Simple_Get_Goods_Type;
	use XFAVI_T_Simple_Get_Id;
	use XFAVI_T_Simple_Get_Image;
	use XFAVI_T_Simple_Get_Make;
	use XFAVI_T_Simple_Get_Material;
	use XFAVI_T_Simple_Get_Mechanism;
	use XFAVI_T_Simple_Get_Model;
	use XFAVI_T_Simple_Get_OEM;
	use XFAVI_T_Simple_Get_OEMOil;
	use XFAVI_T_Simple_Get_Plumbing_Type;
	use XFAVI_T_Simple_Get_Polarity;
	use XFAVI_T_Simple_Get_Price;
	use XFAVI_T_Simple_Get_ProductSubType;
	use XFAVI_T_Simple_Get_Sae;
	use XFAVI_T_Simple_Get_Size;
	use XFAVI_T_Simple_Get_Spare_Part_Type;
	use XFAVI_T_Simple_Get_Stock;
	use XFAVI_T_Simple_Get_Technic_Spare_Part_Type;
	use XFAVI_T_Simple_Get_Transmission_Spare_Part_Type;
	use XFAVI_T_Simple_Get_TiresType;
	use XFAVI_T_Simple_Get_Title;
	use XFAVI_T_Simple_Get_Vendorcode;
	use XFAVI_T_Simple_Get_Voltage;
	use XFAVI_T_Simple_Get_Volume;
	use XFAVI_T_Simple_Get_Weight;
	use XFAVI_T_Simple_Get_XML_Stock_Item;

	/**
	 * Generating the `Ad` tag with all the contents.
	 * 
	 * @param string $result_xml
	 * 
	 * @return string `<Ad...>...tags...</Ad>` or empty string.
	 */
	public function generation_product_xml( $result_xml = '' ) {

		$duplicate_count = 0; // сколько дублей товара нужно. 0 - если дубли не нужны
		$duplicate_count = apply_filters(
			'xfavi_f_duplicate_count',
			$duplicate_count,
			[ 
				'feed_id' => $this->get_feed_id(),
				'product' => $this->get_product()
			],
			$this->get_feed_id()
		);
		$duplicate_number = -1;

		while ( $duplicate_number < $duplicate_count ) {
			$duplicate_number++;
			$this->set_duplicate_number( $duplicate_number );

			$this->set_category_id();
			$this->get_skips();

			if ( get_term_meta( $this->get_feed_category_id(), 'xfavi_avito_standart', true ) !== '' ) {
				$xfavi_avito_standart = get_term_meta( $this->get_feed_category_id(), 'xfavi_avito_standart', true );
			} else {
				new XFAVI_Error_Log( sprintf( 'FEED № %1$s; %2$s %3$s %4$s; Файл: %5$s; %6$s: %7$s',
					$this->get_feed_id(),
					'WARNING: Для категории $this->get_feed_category_id() = ',
					$this->get_feed_category_id(),
					'задан стандарт по умолчанию',
					'class-xfavi-get-unit-offer-simple.php',
					__( 'строка', 'xml-for-avito' ),
					__LINE__
				) );
				$xfavi_avito_standart = 'lichnye_veshi';
			}

			switch ( $xfavi_avito_standart ) {
				case "lichnye_veshi":
					$result_xml .= $this->lichnye_veshi();
					break;
				case "dom":
					$result_xml .= $this->dom();
					break;
				case "tehnika":
					$result_xml .= $this->tehnika();
					break;
				case "zapchasti":
					$result_xml .= $this->zapchasti();
					break;
				case "business":
					$result_xml .= $this->business();
					break;
				case "hobby":
					$result_xml .= $this->hobby();
					break;
				case "zhivotnye":
					$result_xml .= $this->zhivotnye();
					break;
				default:
					$result_xml .= $this->lichnye_veshi();
			}

			$result_xml .= $this->get_custom_type();

			$result_xml = apply_filters(
				'x4avi_f_append_simple_offer',
				$result_xml,
				[ 
					'product' => $this->get_product(),
					'feed_category_id' => $this->get_feed_category_id(),
					'duplicate_number' => $this->get_duplicate_number()
				],
				$this->get_feed_id()
			);
			$result_xml .= new Get_Closed_Tag( 'Ad' );
		}
		return $result_xml;

	}

	/**
	 * Summary of get_common_xml_data
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function get_common_xml_data( $result_xml = '' ) {
		$result_xml .= $this->get_common_ad();
		$result_xml .= $this->get_contact_info();
		$result_xml .= $this->get_category();
		$result_xml .= $this->get_condition();

		$result_xml .= $this->get_image();
		$result_xml .= $this->get_description();
		$result_xml .= $this->get_id();
		$result_xml .= $this->get_title();

		if ( class_exists( 'WOOCS' ) ) {
			$xfavi_wooc_currencies = xfavi_optionGET( 'xfavi_wooc_currencies', $this->get_feed_id(), 'set_arr' );
			if ( $xfavi_wooc_currencies !== '' ) {
				global $WOOCS;
				$WOOCS->set_currency( $xfavi_wooc_currencies );
			}
		}
		$result_xml .= $this->get_price();
		if ( class_exists( 'WOOCS' ) ) {
			global $WOOCS;
			$WOOCS->reset_currency();
		}
		return $result_xml;
	}

	/**
	 * Summary of lichnye_veshi
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function lichnye_veshi( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type();
		$result_xml .= $this->get_goods_sub_type();
		$result_xml .= $this->get_product_sub_type();
		$result_xml .= $this->get_forwhom();
		$result_xml .= $this->get_mechanism();
		$result_xml .= $this->get_apparel( 'Apparel', 'lichnye_veshi' );
		$result_xml .= $this->get_appareltype();
		$result_xml .= $this->get_adtype();
		$result_xml .= $this->get_size();
		$result_xml .= $this->get_brand();
		$result_xml .= $this->get_gender();

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Summary of dom
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function dom( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type();
		$result_xml .= $this->get_adtype();
		$result_xml .= $this->get_goods_sub_type();
		$result_xml .= $this->get_plumbing_type();
		$result_xml .= $this->get_capacity();
		$result_xml .= $this->get_material();
		$result_xml .= $this->get_dimensions();
		$result_xml .= $this->get_weight();
		$result_xml .= $this->get_cabinet_type();
		$result_xml .= $this->get_color();
		$result_xml .= $this->get_availability();

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Summary of tehnika
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function tehnika( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type();
		$result_xml .= $this->get_goods_sub_type( 'ProductsType' );
		$result_xml .= $this->get_adtype( 'AdType', 'tehnika' );
		$result_xml .= $this->get_oem();
		$result_xml .= $this->get_oemoil();
		$result_xml .= $this->get_brand();

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Summary of zapchasti
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function zapchasti( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type( 'GoodsType', 'zapchasti' );
		$result_xml .= $this->get_goods_sub_type( 'ProductType' );
		$result_xml .= $this->get_adtype( 'AdType', 'zapchasti' );
		$result_xml .= $this->get_vendorcode();
		$result_xml .= $this->get_oem();
		$result_xml .= $this->get_oemoil();
		$result_xml .= $this->get_brand();
		$result_xml .= $this->get_make();
		$result_xml .= $this->get_model();
		$result_xml .= $this->get_generation();
		$result_xml .= $this->get_accessory_type();
		$result_xml .= $this->get_acea();
		$result_xml .= $this->get_aft();
		$result_xml .= $this->get_api();
		$result_xml .= $this->get_astm();
		$result_xml .= $this->get_dot();
		$result_xml .= $this->get_color();
		$result_xml .= $this->get_sae();
		$result_xml .= $this->get_volume();
		$result_xml .= $this->get_capacity();
		$result_xml .= $this->get_dcl();
		$result_xml .= $this->get_polarity();
		$result_xml .= $this->get_spare_part_type();
		$result_xml .= $this->get_technic_spare_part_type();
		$result_xml .= $this->get_transmission_spare_part_type();
		$result_xml .= $this->get_body_spare_part_type();
		$result_xml .= $this->get_engine_spare_part_type();
		$result_xml .= $this->get_voltage();
		$result_xml .= $this->get_dimensions();
		$result_xml .= $this->get_weight();

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Summary of business
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function business( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type();
		$result_xml .= $this->get_goods_sub_type();
		$result_xml .= $this->get_tirestype();
		$result_xml .= $this->get_common_xml_data();

		return $result_xml;
	}

	/**
	 * Summary of hobby
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function hobby( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type( 'GoodsType', 'hobby' );
		$result_xml .= $this->get_adtype();
		$result_xml .= $this->get_brand();

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Summary of zhivotnye
	 * 
	 * @param string $result_xml
	 * 
	 * @return string
	 */
	private function zhivotnye( $result_xml = '' ) {
		$result_xml .= $this->get_offer_tag();

		$result_xml .= $this->get_custom_tags_from_attr();
		$result_xml .= $this->get_goods_type( 'GoodsType', 'zhivotnye' );

		$result_xml .= $this->get_common_xml_data();
		return $result_xml;
	}

	/**
	 * Get Ad tag.
	 * 
	 * @return string
	 */
	private function get_offer_tag() {

		$result_xml = new Get_Open_Tag( 'Ad' );
		$result_xml .= $this->get_avito_id();
		return $result_xml;

	}

	/**
	 * Gets the value of the global attribute for the product.
	 * 
	 * @param int|string $attribute_id
	 * 
	 * @return string
	 */
	private function get_simple_global_attribute_value( $attribute_id ) {

		$attribute_id = (int) $attribute_id;
		if ( $attribute_id > 0 ) {
			$attr_val = $this->get_product()->get_attribute( wc_attribute_taxonomy_name_by_id( $attribute_id ) );
			if ( empty( $attr_val ) ) {
				$tag_value = '';
			} else {
				$tag_value = xfavi_replace_decode( $attr_val );
			}
		} else {
			$tag_value = '';
		}
		return $tag_value;

	}

	/**
	 * Get product post meta.
	 * 
	 * @param string $key
	 * @param string $prefix
	 * 
	 * @return string
	 */
	public function get_simple_product_post_meta( $key, $prefix = '_xfavi_' ) {

		if ( empty( $key ) ) {
			return '';
		} else {
			$key = $prefix . $key;
		}
		if ( get_post_meta( $this->get_product()->get_id(), $key, true ) !== '' ) {
			$value = get_post_meta( $this->get_product()->get_id(), $key, true );
		} else {
			$value = '';
		}
		return $value;

	}

	/**
	 * Get paired XML tag for feed. Example: `<tag_name>tag_value</tag_name>`.
	 * 
	 * This function processes the tag value using filters:
	 *    - `xfavi_f_simple_tag_value_{tag_value}`
	 *    - `xfavi_f_simple_tag_name_{tag_value}`
	 *    - `xfavi_f_simple_tag_{tag_value}`
	 * 
	 * @param string $tag_name
	 * @param mixed $tag_value
	 * @param array $tag_attributes_arr 
	 * 
	 * @return string
	 */
	private function get_simple_tag( $tag_name, $tag_value, $tag_attributes_arr = [] ) {

		$tag_value = apply_filters(
			'xfavi_f_simple_tag_value_' . $tag_name,
			$tag_value,
			[ 
				'product' => $this->get_product()
			],
			$this->get_feed_id()
		);

		if ( empty( $tag_value ) ) {
			$result_xml = '';
		} else {
			$tag_name = apply_filters(
				'xfavi_f_simple_tag_name_' . $tag_name,
				$tag_name,
				[ 
					'product' => $this->get_product()
				],
				$this->get_feed_id()
			);
			$result_xml = new Get_Paired_Tag(
				$tag_name,
				$tag_value,
				$tag_attributes_arr
			);
		}

		$result_xml = apply_filters(
			'xfavi_f_simple_tag_' . $tag_name,
			$result_xml,
			[ 
				'product' => $this->get_product()
			],
			$this->get_feed_id()
		);

		return $result_xml;

	}

}
<?php
/**
 * Exclsive Shop Global Attributes.
 *
 * @package Exclsive Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'ShopCred_Global_Attributes' ) ) {

	/**
	 * Class ShopCred_Global_Attributes.
	 */
	class ShopCred_Global_Attributes {


		/**
		 * Variable
		 *
		 * @since 1.0.0
		 * @var instance
		 */
		private static $instance;


		/**
		 *  Initiator
		 *
		 * @since 1.0.0
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
          /**
         * FILTERS attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_container_attributes() {

            return array(
               	//container start
                'gContainerAlignment' => array(
                    'type' => 'string',
                    'default' => "left"
                ),
                'gContainerBoxBGColor' => array(
                    'type' => 'string',
                    'default' => "#FFFFFF"
                ),
                'gContainerBGHColor' => array(
                    'type' => 'string',
                    'default' => "#FFFFFF"
                ),
                'gContainerBoxPadding'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '20', '20', '20', '20' ],
                            'tablet' 	=> [ '15', '15', '15', '15' ],
                            'mobile' 	=> [ '10', '10', '10', '10' ]
                        ),
                    ),
                ),
                'gContainerBoxPaddingUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gContainerBoxBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '0', '0', '0', '0' ],
                            'tablet' 	=> [ '0', '0', '0', '0' ],
                            'mobile' 	=> [ '0', '0', '0', '0' ]
                        ),
                    ),
                ),
                'gContainerBoxBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gContainerBoxBorderStyleNormal' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gContainerBoxBorderWidthNormal' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gContainerBoxBorderColorNormal' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gContainerBoxBorderStyleHover' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gContainerBoxBorderWidthHover' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gContainerBoxBorderColorHover' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gContainerBoxShadowColor' => array(
                    'type' => "string",
                    'default' => ''
                ),
                'gContainerBoxShadowHOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowVOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowBlur' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowSpread' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowPosition' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                'gContainerBoxShadowColorHover' => array(
                    'type' => "string",
                    'default' => '#000'
                ),
                'gContainerBoxShadowHOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowVOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowBlurHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowSpreadHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gContainerBoxShadowPositionHover' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                //container end
            );
        }

        /**
         * FILTERS attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_filters_attributes() {

            return array(
                'gFiltersColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#7a56ff',
                ),
                'gFiltersHColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#ffffff',
                ),
                'gFiltersFontSize'           => array(
                    'type'    => 'number',
                    'default' => '16',
                ),
                'gFiltersFontSizeType'       => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gFiltersFontSizeMobile'     => array(
                    'type' => 'number',
                ),
                'gFiltersFontSizeMobile'     => array(
                    'type' => 'number',
                ),
                'gFiltersFontFamily'         => array(
                    'type'    => 'string',
                ),
                'gFiltersFontWeight'         => array(
                    'type' => 'string',
                ),
                'gFiltersFontSubset'         => array(
                    'type' => 'string',
                ),
                'gFiltersLineHeight'         => array(
                    'type' => 'number',
                    'default' => 1.5,
                ),
                'gFiltersLineHeightType'     => array(
                    'type'    => 'string',
                    'default' => 'em',
                ),
                'gFiltersLineHeightTablet'   => array(
                    'type' => 'number',
                ),
                'gFiltersLineHeightMobile'   => array(
                    'type' => 'number',
                ),
                'gFiltersLoadGoogleFonts'    => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gFiltersAlignment' => array(
                    'type' => 'string',
                    'default' => "center"
                ),
                'gFiltersBGColor' => array(
                    'type' => 'string',
                    'default' => "#FFFFFF"
                ),
                'gFiltersBGHColor' => array(
                    'type' => 'string',
                    'default' => "#7a56ff"
                ),
                'gFiltersPaddingTop' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersSpacing' => array(
                    'type' => 'number',
                    'default' => 15
                ),
                'gFiltersPaddingRight' => array(
                    'type' => 'string',
                    'default' => "15"
                ),
                'gFiltersPaddingBottom' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersPaddingLeft' => array(
                    'type' => 'string',
                    'default' => '15'
                ),
                'gFiltersPaddingTopTable' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersPaddingRightTable' => array(
                    'type' => 'string',
                    'default' => "15"
                ),
                'gFiltersPaddingBottomTable' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersPaddingLeftTable' => array(
                    'type' => 'string',
                    'default' => '15'
                ),
                'gFiltersPaddingTopMobile' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersPaddingRightMobile' => array(
                    'type' => 'string',
                    'default' => "15"
                ),
                'gFiltersPaddingBottomMobile' => array(
                    'type' => 'string',
                    'default' => "10"
                ),
                'gFiltersPaddingLeftMobile' => array(
                    'type' => 'string',
                    'default' => '15'
                ),
                'gFiltersPaddingUnit' => array(
                    'type' => 'string',
                    'default' => 'px',
                ),
                'gFiltersPaddingSyncUnits' => array(
                    'type' => 'boolean',
                    'default' => true,
                ),
                'gFiltersBRTop' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRight' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRBottom' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRLeft' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRTopTablet' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRightTablet' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRBottomTablet' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRLeftTablet' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRTopMobile' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRightMobile' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRBottomMobile' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRLeftMobile' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRUnit' => array(
                    'type' => 'string',
                    'default' => 'px',
                ),
                'gFiltersBRSyncUnits' => array(
                    'type' => 'boolean',
                    'default' => true,
                ),
                'gFiltersBRTopHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRightHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRBottomHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRLeftHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRTopTabletHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRightTabletHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRBottomTabletHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRLeftTabletHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRTopMobileHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRRightMobileHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),
                'gFiltersBRBottomMobileHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRLeftMobileHover' => array(
                    'type' => 'string',
                    'default' => '10',
                ),	
                'gFiltersBRUnitHover' => array(
                    'type' => 'string',
                    'default' => 'px',
                ),
                'gFiltersBRSyncUnitsHover' => array(
                    'type' => 'boolean',
                    'default' => true,
                ),
                'gFiltersBorderStyleNormal' => array(
                    'type' => "string",
                    'default' => "solid"
                ),
                'gFiltersBorderWidthNormal' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gFiltersBorderColorNormal' => array(
                    'type' => "string",
                    'default' => "#7a56ff"
                ),
                'gFiltersBorderStyleHover' => array(
                    'type' => "string",
                    'default' => "solid"
                ),
                'gFiltersBorderWidthHover' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gFiltersBorderColorHover' => array(
                    'type' => "string",
                    'default' => "#7a56ff"
                ),

                'gFiltersBoxShadowColor' => array(
                    'type' => "string",
                    'default' => '#0000001a'
                ),
                'gFiltersBoxShadowHOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowVOffset' => array(
                    'type' => "number",
                    'default' => 10
                ),
                'gFiltersBoxShadowBlur' => array(
                    'type' => "number",
                    'default' => 30
                ),
                'gFiltersBoxShadowSpread' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowPosition' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                'gFiltersBoxShadowColorHover' => array(
                    'type' => "string",
                    'default' => '#000'
                ),
                'gFiltersBoxShadowHOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowVOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowBlurHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowSpreadHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gFiltersBoxShadowPositionHover' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
            );

            
        }

        /**
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_tags_attributes() {

            return array(
                //tags
                'gProductTagsColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#ffffff',
                ),
                'saleTagBgColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#3DCC87',
                ),
                'hotTagBgColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#FF5656',
                ),
                'dicntTagBgColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#3DCC87',
                ),  
                'saleTagBRColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#3DCC87',
                ),  
                'hotTagBRColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#3DCC87',
                ),  
                'dicntTagBRColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#3DCC87',
                ),
                'gProductTagsHColor'       		=> array(
                    'type'    => 'string',
                    'default' => '#ffffff',
                ),
                'gProductTagsFontSize'           => array(
                    'type'    => 'number',
                    'default' => '10',
                ),
                'gProductTagsFontSizeType'       => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gProductTagsFontSizeMobile'     => array(
                    'type' => 'number',
                ),
                'gProductTagsFontSizeMobile'     => array(
                    'type' => 'number',
                ),
                'gProductTagsFontFamily'         => array(
                    'type'    => 'string',
                ),
                'gProductTagsFontWeight'         => array(
                    'type' => 'string',
                ),
                'gProductTagsFontSubset'         => array(
                    'type' => 'string',
                ),
                'gProductTagsLineHeight'         => array(
                    'type' => 'number',
                    'default' => 1.5,
                ),
                'gProductTagsLineHeightType'     => array(
                    'type'    => 'string',
                    'default' => 'em',
                ),
                'gProductTagsLineHeightTablet'   => array(
                    'type' => 'number',
                ),
                'gProductTagsLineHeightMobile'   => array(
                    'type' => 'number',
                ),
                'gProductTagsLoadGoogleFonts'    => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gProductTagsTextTransform'         => array(
                    'type' => 'string',
                    'default' => 'uppercase',
                ),
                'gProductTagsLetterSpacing'         => array(
                    'type' => 'number',
                    'default' => 1.5,
                ),
                'gProductTagsAlignment' => array(
                    'type' => 'string',
                    'default' => "center"
                ),
                'gProductTagsBgColor' => array(
                    'type' => 'string',
                    'default' => "#3BC473"
                ),
                'gProductTagsBgHColor' => array(
                    'type' => 'string',
                    'default' => "#3BC473"
                ),
                'gProductTagsSpacing' => array(
                    'type' => 'number',
                    'default' => 15
                ),
                'gProductTagsPadding'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '5', '15', '5', '15' ],
                            'tablet' 	=> [ '5', '15', '5', '15' ],
                            'mobile' 	=> [ '5', '10', '5', '10' ]
                        ),
                    ),
                ),
                'gProductTagsPaddingUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),	
                'gProductTagsBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '50', '50', '50', '50' ],
                            'tablet' 	=> [ '50', '50', '50', '50' ],
                            'mobile' 	=> [ '50', '50', '50', '50' ]
                        ),
                    ),
                ),
                'gProductTagsBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),                
                'gProductTagsBRHover'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '50', '50', '50', '50' ],
                            'tablet' 	=> [ '50', '50', '50', '50' ],
                            'mobile' 	=> [ '50', '50', '50', '50' ]
                        ),
                    ),
                ),
                'gProductTagsBRHoverUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gProductTagsBorderStyleNormal' => array(
                    'type' => "string",
                    'default' => "solid"
                ),
                'gProductTagsBorderWidthNormal' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gProductTagsBorderColorNormal' => array(
                    'type' => "string",
                    'default' => "#3BC473"
                ),
                'gProductTagsBorderStyleHover' => array(
                    'type' => "string",
                    'default' => "solid"
                ),
                'gProductTagsBorderWidthHover' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gProductTagsBorderColorHover' => array(
                    'type' => "string",
                    'default' => "#3BC473"
                ),
                'gProductTagsBoxShadowColor' => array(
                    'type' => "string",
                    'default' => '#0000001a'
                ),
                'gProductTagsBoxShadowHOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowVOffset' => array(
                    'type' => "number",
                    'default' => 10
                ),
                'gProductTagsBoxShadowBlur' => array(
                    'type' => "number",
                    'default' => 30
                ),
                'gProductTagsBoxShadowSpread' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowPosition' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                'gProductTagsBoxShadowColorHover' => array(
                    'type' => "string",
                    'default' => '#000'
                ),
                'gProductTagsBoxShadowHOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowVOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowBlurHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowSpreadHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gProductTagsBoxShadowPositionHover' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
            );
        }
            
        /**
         * Pagination - attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_pagination_attributes() {

            return array(
            //pagination
                'displayProductPagination'    => array(
                    'type'    => 'boolean',
                    'default' => false,
                ),
                'pageLimit'                   => array(
                    'type'    => 'number',
                    'default' => 10,
                ),
                'productPaginationPGFontFamily'     => array(
                    'type'    => 'string',
                    'default' => '',
                ),
                'productPaginationPGLoadGoogleFonts'   => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'productPaginationPGColor'     => array(
                    'type'    => 'string',
                    'default' => '#000',
                ), 
                'productPaginationPGHcolor'     => array(
                    'type'    => 'string',
                    'default' => '#fff',
                ), 
                'productPaginationBgActiveColor'     => array(
                    'type'    => 'string',
                    'default' => '#e4e4e4',
                ),
                'productPaginationActiveColor'       => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),
                'productPaginationPGBgHcolor'           => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),
                'productPaginationPGBgColor'             => array(
                    'type'    => 'string',
                    'default' => '#fff',
                ),
                'productPaginationMarkup'            => array(
                    'type'    => 'string',
                    'default' => '',
                ),
                'productPaginationLayout'            => array(
                    'type'    => 'string',
                    'default' => 'filled',
                ),
                'productPaginationSpecing' => array(
                    'type'    => 'number',
                    'default' => 10,
                ),  
                'productPaginationPGPadding'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '6', '15', '6', '15' ],
                            'tablet' 	=> [ '6', '15', '6', '15' ],
                            'mobile' 	=> [ '6', '15', '6', '15' ]
                        ),
                    ),
                ),
                'productPaginationPGPaddingUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),	
                'productPaginationBorderActiveColor' => array(
                    'type' => 'string',
                ),
                'productPaginationBorderColor'       => array(
                    'type'    => 'string',
                    'default' => '#888686',
                ),
                'productPaginationBorderRadius'      => array(
                    'type' => 'number',
                ),
                'productPaginationBorderSize'        => array(
                    'type'    => 'number',
                    'default' => 1,
                ),
                'productPaginationSpacing'           => array(
                    'type'    => 'number',
                    'default' => 20,
                ),
                'productPaginationAlignment'         => array(
                    'type'    => 'string',
                    'default' => 'center',
                ),
                'productPaginationPrevText'          => array(
                    'type'    => 'string',
                    'default' => '« Previous',
                ),
                'productPaginationNextText'          => array(
                    'type'    => 'string',
                    'default' => 'Next »',
                ),
                'productPaginationPGMargin'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['20', '0', '20', '0'],
                            'tablet' 	=> ['15', '15', '15', '15'],
                            'mobile' 	=> ['10', '10', '10', '10']
                        ),
                    ),
                ),
                'productPaginationPGMarginUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'productPaginationPGBoxShadowColor' => array(
                    'type'    => 'string',
                    'default' => '#0000001a',
                ),	
                'productPaginationPGBoxShadowHOffset' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'productPaginationPGBoxShadowVOffset' => array(
                    'type'    => 'number',
                    'default' => 10,
                ),
                'productPaginationPGBoxShadowBlur' => array(
                    'type'    => 'number',
                    'default' => 30,
                ),
                'productPaginationPGBoxShadowSpread' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'productPaginationPGBoxShadowPosition' => array(
                    'type'    => 'string',
                    'default' => 'outset',
                ),
                'productPaginationPGBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '0', '0', '0', '0' ],
                            'tablet' 	=> [ '0', '0', '0', '0' ],
                            'mobile' 	=> [ '0', '0', '0', '0' ]
                        ),
                    ),
                ),
                'productPaginationPGBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'productPaginationPGBorderStyle'     => array(
                    'type' => 'string',
                    'default' => 'solid',
                ),
                'productPaginationPGBorderWidth'     => array(
                    'type' => 'number',
                    'default' => 1,
                ),
                'productPaginationPGBorderColor'     => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),	
                'productPaginationPGBorderHStyle'     => array(
                    'type' => 'string',
                    'default' => 'solid',
                ),
                'productPaginationPGBorderHWidth'     => array(
                    'type' => 'number',
                    'default' => 1,
                ),
                'productPaginationPGBorderHColor'     => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),
            
            );
        }

        /**
         * Load More - attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_loadmore_attributes() {

            return array(
            //loadmore
                'gButtonAlignment'    => array(
                    'type'    => 'string',
                    'default' => 'center',
                ), 
                'loadMoreProduct'    => array(
                    'type'    => 'boolean',
                    'default' => false,
                ),
                'loadMoreProductMarkup' => array(
                    'type'    => 'string',
                    'default' => '',
                ),
                'gButtonText'                => array(
                    'type'    => 'string',
                    'default' => __( 'Load More', 'shopcred' ),
                ),
                'gButtonColor'                => array(
                    'type'    => 'string',
                    'default' => '#ffffff',
                ),
                'gButtonBgColor'              => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),
                'gButtonHcolor'               => array(
                    'type' => 'string',
                    'default' => '#000',
                ),
                'gButtonBgHcolor'             => array(
                    'type' => 'string',
                    'default' => '#fff',
                ),
                'gButtonFontSize'             => array(
                    'type'    => 'number',
                    'default' => '14',
                ),
                'gButtonFontSizeType'         => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gButtonFontSizeMobile'       => array(
                    'type' => 'number',
                ),
                'gButtonFontSizeTablet'       => array(
                    'type' => 'number',
                ),
                'gButtonFontFamily'           => array(
                    'type'    => 'string',
                    'default' => '',
                ),
                'gButtonFontWeight'           => array(
                    'type' => 'string',
                    'default' => '600',
                ),
                'gButtonFontSubset'           => array(
                    'type' => 'string',
                ),
                'gButtonLineHeightType'       => array(
                    'type'    => 'string',
                    'default' => 'em',
                ),
                'gButtonLineHeight'           => array(
                    'type' => 'number',
                ),
                'gButtonLineHeightTablet'     => array(
                    'type' => 'number',
                ),
                'gButtonLineHeightMobile'     => array(
                    'type' => 'number',
                ),
                'gButtonLoadGoogleFonts'      => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gButtonTextTransform'         => array(
                    'type' => 'string',
                    'default' => 'uppercase',
                ),
                'gButtonLetterSpacing'         => array(
                    'type' => 'number',
                    'default' => 0.2,
                ),
                'gButtonBorderStyle'     => array(
                    'type' => 'string',
                    'default' => 'solid',
                ),
                'gButtonBorderWidth'     => array(
                    'type' => 'number',
                    'default' => 1,
                ),
                'gButtonBorderColor'     => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),	
                'gButtonBorderHStyle'     => array(
                    'type' => 'string',
                    'default' => 'solid',
                ),
                'gButtonBorderHWidth'     => array(
                    'type' => 'number',
                    'default' => 1,
                ),
                'gButtonBorderHColor'     => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),
                'gButtonSpaceing'         => array(
                    'type'    => 'number',
                    'default' => 20,
                ),
            
                'gButtonPadding'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['12', '22', '12', '22'],
                            'tablet' 	=> ['8', '15', '8', '15'],
                            'mobile' 	=> ['8', '15', '8', '15']
                        ),
                    ),
                ),
                'gButtonPaddingUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gButtonMargin'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['20', '0', '0', '0'],
                            'tablet' 	=> ['20', '0', '0', '0'],
                            'mobile' 	=> ['20', '0', '0', '0']
                        ),
                    ),
                ),
                'gButtonMarginUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),	                
                'gButtonBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['0', '0', '0', '0'],
                            'tablet' 	=> ['0', '0', '0', '0'],
                            'mobile' 	=> ['0', '0', '0', '0']
                        ),
                    ),
                ),
                'gButtonBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gButtonBoxShadowColor' => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),	
                'gButtonBoxShadowHOffset' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowVOffset' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowBlur' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowSpread' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowPosition' => array(
                    'type'    => 'string',
                    'default' => 'outset',
                ),
                'gButtonBoxShadowHoverColor' => array(
                    'type'    => 'string',
                    'default' => '#000',
                ),	
                'gButtonBoxShadowHOHoverffset' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowVOHoverffset' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowHoverBlur' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowHoverSpread' => array(
                    'type'    => 'number',
                    'default' => 0,
                ),
                'gButtonBoxShadowHoverPosition' => array(
                    'type'    => 'string',
                    'default' => 'outset',
                ),
            );
        }


        /**
         * Swiper Arrows - attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_swiper_arrows_attributes() {
            
            return array(
                'gSwiperArrowsIconColor' => array(
                    'type' => 'string',
                    'default' => "#FFFFFF"
                ),
                'gSwiperArrowsIconHColor' => array(
                    'type' => 'string',
                    'default' => "#000"
                ),
                'gSwiperArrowsBGColor' => array(
                    'type' => 'string',
                    'default' => "#000"
                ),
                'gSwiperArrowsBGHColor' => array(
                    'type' => 'string',
                    'default' => "#FFFFFF"
                ),
                'gSwiperArrowsBoxSize'                 => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperArrowsBoxSizeTablet'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperArrowsBoxSizeMobile'           => array(
                    'type'    => 'string',
                    'default' => '30',
                ),
                'gSwiperArrowsIconSize'                 => array(
                    'type'    => 'string',
                    'default' => '16',
                ),
                'gSwiperArrowsIconSizeTablet'           => array(
                    'type'    => 'string',
                    'default' => '16',
                ),
                'gSwiperArrowsIconSizeMobile'           => array(
                    'type'    => 'string',
                    'default' => '14',
                ),
                'gSwiperLeftArrowsPosX'           => array(
                    'type'    => 'string',
                    'default' => '30',
                ),
                'gSwiperLeftArrowsPosXTablet'           => array(
                    'type'    => 'string',
                    'default' => '30',
                ),
                'gSwiperLeftArrowsPosXMobile'           => array(
                    'type'    => 'string',
                    'default' => '20',
                ),
                'gSwiperLeftArrowsPosXMobile'           => array(
                    'type'    => 'string',
                    'default' => '%',
                ),
                'gSwiperLeftArrowsPosXSyncUnits'           => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gSwiperLeftArrowsPosY'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperLeftArrowsPosYTablet'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperLeftArrowsPosYMobile'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperLeftArrowsPosYUnit'           => array(
                    'type'    => 'string',
                    'default' => '%',
                ),
                'gSwiperLeftArrowsPosYSyncUnits'           => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gSwiperRightArrowsPosX'           => array(
                    'type'    => 'string',
                    'default' => '30',
                ),
                'gSwiperRightArrowsPosXTablet'           => array(
                    'type'    => 'string',
                    'default' => '30',
                ),
                'gSwiperRightArrowsPosXMobile'           => array(
                    'type'    => 'string',
                    'default' => '20',
                ),
                'gSwiperRightArrowsPosXUnit'           => array(
                    'type'    => 'string',
                    'default' => '%',
                ),
                'gSwiperRightArrowsPosXSyncUnits'           => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gSwiperRightArrowsPosY'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperRightArrowsPosYTablet'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperRightArrowsPosYMobile'           => array(
                    'type'    => 'string',
                    'default' => '50',
                ),
                'gSwiperRightArrowsPosYUnit'           => array(
                    'type'    => 'string',
                    'default' => '%',
                ),
                'gSwiperRightArrowsPosYSyncUnits'           => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'gSwiperArrowsBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['50', '50', '50', '50'],
                            'tablet' 	=> ['50', '50', '50', '50'],
                            'mobile' 	=> ['50', '50', '50', '50']
                        ),
                    ),
                ),
                'gSwiperArrowsBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gSwiperArrowsBRH'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['50', '50', '50', '50'],
                            'tablet' 	=> ['50', '50', '50', '50'],
                            'mobile' 	=> ['50', '50', '50', '50']
                        ),
                    ),
                ),
                'gSwiperArrowsBRHUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gSwiperArrowsBorderStyleNormal' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gSwiperArrowsBorderWidthNormal' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gSwiperArrowsBorderColorNormal' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gSwiperArrowsBorderStyleHover' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gSwiperArrowsBorderWidthHover' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gSwiperArrowsBorderColorHover' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gSwiperArrowsShadowColor' => array(
                    'type' => "string",
                    'default' => '#0000001a'
                ),
                'gSwiperArrowsShadowHOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowVOffset' => array(
                    'type' => "number",
                    'default' => 10
                ),
                'gSwiperArrowsShadowBlur' => array(
                    'type' => "number",
                    'default' => 30
                ),
                'gSwiperArrowsShadowSpread' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowPosition' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                'gSwiperArrowsShadowColorHover' => array(
                    'type' => "string",
                    'default' => '#000'
                ),
                'gSwiperArrowsShadowHOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowVOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowBlurHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowSpreadHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperArrowsShadowPositionHover' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
            );
        }
        
        
        /**
         * Swiper dots - attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_swiper_dots_attributes() {
            
            return array(
                'gSwiperDotsColor' => array(
                    'type' => 'string',
                    'default' => "#000"
                ),
                'gSwiperDotsHColor' => array(
                    'type' => 'string',
                    'default' => "#fff"
                ),
                'gSwiperDotsBGColor' => array(
                    'type' => 'string',
                    'default' => "#e5e5e5"
                ),
                'gSwiperDotsBGHColor' => array(
                    'type' => 'string',
                    'default' => "#000"
                ),
                'gSwiperDotsBR'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['50', '50', '50', '50'],
                            'tablet' 	=> ['50', '50', '50', '50'],
                            'mobile' 	=> ['50', '50', '50', '50']
                        ),
                    ),
                ),
                'gSwiperDotsBRUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ), 
                'gSwiperDotsBRH'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> ['50', '50', '50', '50'],
                            'tablet' 	=> ['50', '50', '50', '50'],
                            'mobile' 	=> ['50', '50', '50', '50']
                        ),
                    ),
                ),
                'gSwiperDotsBRHUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'gSwiperDotsBorderStyleNormal' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gSwiperDotsBorderWidthNormal' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gSwiperDotsBorderColorNormal' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gSwiperDotsBorderStyleHover' => array(
                    'type' => "string",
                    'default' => "none"
                ),
                'gSwiperDotsBorderWidthHover' => array(
                    'type' => "number",
                    'default' => 1
                ),
                'gSwiperDotsBorderColorHover' => array(
                    'type' => "string",
                    'default' => "#000000"
                ),
                'gSwiperDotsShadowColor' => array(
                    'type' => "string",
                    'default' => '#0000001a'
                ),
                'gSwiperDotsShadowHOffset' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowVOffset' => array(
                    'type' => "number",
                    'default' => 10
                ),
                'gSwiperDotsShadowBlur' => array(
                    'type' => "number",
                    'default' => 30
                ),
                'gSwiperDotsShadowSpread' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowPosition' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
                'gSwiperDotsShadowColorHover' => array(
                    'type' => "string",
                    'default' => '#000'
                ),
                'gSwiperDotsShadowHOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowVOffsetHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowBlurHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowSpreadHover' => array(
                    'type' => "number",
                    'default' => 0
                ),
                'gSwiperDotsShadowPositionHover' => array(
                    'type' => "string",
                    'default' => "outset"
                ),
            );
        }
        

        /**
         * Product Taxonomy_- attri
         * Get Global or common attributes for all product Block
         *
         * @since 0.0.1
         */
        public static function get_product_taxonomy_attributes() {
            return array(
                //Taxonomy
                'productTaxonomyColor'              => array(
                    'type'    => 'string',
                    'default' => '#111111',
                ),
                'productTaxonomyTag'                => array(
                    'type'    => 'string',
                    'default' => 'h3',
                ),
                'productTaxonomyFontSize'           => array(
                    'type'    => 'number',
                    'default' => '14',
                ),
                'productTaxonomyFontSizeType'       => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),
                'productTaxonomyFontSizeTablet'     => array(
                    'type' => 'number',
                ),
                'productTaxonomyFontSizeMobile'     => array(
                    'type' => 'number',
                ),
                'productTaxonomyFontFamily'         => array(
                    'type'    => 'string',
                    'default' => 'Roboto',
                ),
                'productTaxonomyFontWeight'         => array(
                    'type' => 'string',
                    'default' => '400',
                ),
                'productTaxonomyFontSubset'         => array(
                    'type' => 'string',
                ),
                'productTaxonomyLineHeight'         => array(
                    'type' => 'number',
                    'default' => 1,
                ),
                'productTaxonomyLineHeightType'     => array(
                    'type'    => 'string',
                    'default' => 'em',
                ),
                'productTaxonomyLineHeightTablet'   => array(
                    'type' => 'number',
                ),
                'productTaxonomyLineHeightMobile'   => array(
                    'type' => 'number',
                ),
                'productTaxonomyLoadGoogleFonts'    => array(
                    'type'    => 'boolean',
                    'default' => true,
                ),
                'productTaxonomyTextTransform'         => array(
                    'type' => 'string',
                    'default' => 'uppercase',
                ),
                'productTaxonomyLetterSpacing'         => array(
                    'type' => 'number',
                    'default' => 0,
                ),
                'productTaxonomyMargin'              => array(
                    'type'    => 'array',
                    'default' => array(
                        array(
                            'desk' 	=> [ '24', '0', '16', '0' ],
                            'tablet' 	=> [ '10', '0', '10', '0' ],
                            'mobile' 	=> [ '10', '0', '10', '0' ]
                        ),
                    ),
                ),
                'productTaxonomyMarginUnit'      => array(
                    'type'    => 'string',
                    'default' => 'px',
                ),

            'productTaxonomyBGColor' => array(
                'type' => 'string',
                'default' => "#FFF"
            ),
            'productTaxonomyBGHColor' => array(
                'type' => 'string',
                'default' => "#FFF"
            ),
            'productTaxonomyPadding'              => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'desk' 	    => [ '0', '0', '0', '0' ],
                        'tablet' 	=> [ '0', '0', '0', '0' ],
                        'mobile' 	=> [ '0', '0', '0', '0' ]
                    ),
                ),
            ),
            'productTaxonomyPaddingUnit'      => array(
                'type'    => 'string',
                'default' => 'px',
            ), 
            'productTaxonomyBR'              => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'desk' 	    => [ '0', '0', '0', '0' ],
                        'tablet' 	=> [ '0', '0', '0', '0' ],
                        'mobile' 	=> [ '0', '0', '0', '0' ]
                    ),
                ),
            ),
            'productTaxonomyBRUnit'      => array(
                'type'    => 'string',
                'default' => 'px',
            ),            
            'productTaxonomyBorderStyleNormal' => array(
                'type' => "string",
                'default' => "none"
            ),
            'productTaxonomyBorderWidthNormal' => array(
                'type' => "number",
                'default' => 0
            ),
            'productTaxonomyBorderColorNormal' => array(
                'type' => "string",
                'default' => ""
            ),
            'productTaxonomyBorderStyleHover' => array(
                'type' => "string",
                'default' => "none"
            ),
            'productTaxonomyBorderWidthHover' => array(
                'type' => "number",
                'default' => 0
            ),
            'productTaxonomyBorderColorHover' => array(
                'type' => "string",
                'default' => ""
            ),
                
            );
        }

    /**
     * QuickView attri
     * Get Global or common attributes for all product Block
     *
     * @since 0.0.1
     */
    public static function get_product_quickview_attributes() {

        return array(
            'displayQuickView'       		=> array(
                'type'    => 'boolean',
                'default' => true,
            ),  
            'gQuickViewColor'       		=> array(
                'type'    => 'string',
                'default' => '#000',
            ),
            'gQuickViewText'       		=> array(
                'type'    => 'string',
                'default' => '',
            ),
            'gQuickViewHColor'       		=> array(
                'type'    => 'string',
                'default' => '#000',
            ),
            'gQuickViewFontSize'           => array(
                'type'    => 'number',
                'default' => 16,
            ),
            'gQuickViewFontSizeType'       => array(
                'type'    => 'string',
                'default' => 'px',
            ),
            'gQuickViewFontSizeTablet'     => array(
                'type' => 'number',
            ),
            'gQuickViewFontSizeMobile'     => array(
                'type' => 'number',
            ),
            'gQuickViewFontFamily'         => array(
                'type'    => 'string',
            ),
            'gQuickViewFontWeight'         => array(
                'type' => 'string',
            ),
            'gQuickViewFontSubset'         => array(
                'type' => 'string',
            ),
            'gQuickViewLineHeight'         => array(
                'type' => 'number',
                'default' => 40,
            ),
            'gQuickViewLineHeightType'     => array(
                'type'    => 'string',
                'default' => 'px',
            ),
            'gQuickViewLineHeightTablet'   => array(
                'type' => 'number',
            ),
            'gQuickViewLineHeightMobile'   => array(
                'type' => 'number',
            ),
            'gQuickViewLoadGoogleFonts'    => array(
                'type'    => 'boolean',
                'default' => true,
            ),
            'gQuickViewTextTransform'         => array(
                'type' => 'string',
                'default' => 'none',
            ),
            'gQuickViewLetterSpacing'         => array(
                'type' => 'number',
                'default' => 1.5,
            ),
            'gQuickViewAlignment' => array(
                'type' => 'string',
                'default' => "center"
            ),
            'gQuickViewPosTop' => array(
                'type' => 'string',
                'default' => ""
            ),
            'gQuickViewPosBottom' => array(
                'type' => 'string',
                'default' => "10"
            ),
            'gQuickViewPosLeft' => array(
                'type' => 'string',
                'default' => ""
            ),
            'gQuickViewPosRight' => array(
                'type' => 'string',
                'default' => "10"
            ),
            'gQuickViewBGColor' => array(
                'type' => 'string',
                'default' => "#FFF"
            ),
            'gQuickViewBGHColor' => array(
                'type' => 'string',
                'default' => "#FFF"
            ),
            'gQuickViewSpacing' => array(
                'type' => 'number',
                'default' => 15
            ),
            'gQuickViewPadding'              => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'desk' 	    => [ '0', '0', '0', '0' ],
                        'tablet' 	=> [ '0', '0', '0', '0' ],
                        'mobile' 	=> [ '0', '0', '0', '0' ]
                    ),
                ),
            ),
            'gQuickViewPaddingUnit'      => array(
                'type'    => 'string',
                'default' => 'px',
            ),
            'gQuickViewBR'              => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'desk' 	    => [ '0', '0', '0', '0' ],
                        'tablet' 	=> [ '0', '0', '0', '0' ],
                        'mobile' 	=> [ '0', '0', '0', '0' ]
                    ),
                ),
            ),
            'gQuickViewBRUnit'      => array(
                'type'    => 'string',
                'default' => 'px',
            ),            
            'gQuickViewBorderStyleNormal' => array(
                'type' => "string",
                'default' => "solid"
            ),
            'gQuickViewBorderWidthNormal' => array(
                'type' => "number",
                'default' => 1
            ),
            'gQuickViewBorderColorNormal' => array(
                'type' => "string",
                'default' => "#000000"
            ),
            'gQuickViewBorderStyleHover' => array(
                'type' => "string",
                'default' => "solid"
            ),
            'gQuickViewBorderWidthHover' => array(
                'type' => "number",
                'default' => 1
            ),
            'gQuickViewBorderColorHover' => array(
                'type' => "string",
                'default' => "#000000"
            ),

            'gQuickViewBoxShadowColor' => array(
                'type' => "string",
                'default' => ''
            ),
            'gQuickViewBoxShadowHOffset' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowVOffset' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowBlur' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowSpread' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowPosition' => array(
                'type' => "string",
                'default' => "outset"
            ),
            'gQuickViewBoxShadowColorHover' => array(
                'type' => "string",
                'default' => '#000'
            ),
            'gQuickViewBoxShadowHOffsetHover' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowVOffsetHover' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowBlurHover' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowSpreadHover' => array(
                'type' => "number",
                'default' => 0
            ),
            'gQuickViewBoxShadowPositionHover' => array(
                'type' => "string",
                'default' => "outset"
            ),
        );

        
    }

    }


	/**
	 *  Prepare if class 'ShopCred_Global_Attributes' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	ShopCred_Global_Attributes::get_instance();
}

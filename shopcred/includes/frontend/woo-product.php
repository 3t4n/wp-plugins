<?php
/**
 * 
 * Front End CSS for Tabs Block
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

foreach ( $blockData as $atts ) {
    if ( ! isset( $atts['block_id'] ) ) {
        continue;
    }

    $defaults = ShopCred\Block_Defaults_Attributes::get_Block_DefaultsAttributes();

    $settings = wp_parse_args(
        $atts,
        $defaults['woo-product']
    );

    $id = $atts['block_id'];
    $blockVersion = ! empty( $settings['blockVersion'] ) ? $settings['blockVersion'] : 1;

    // $selector = '.spc-woo-product-id' . $id;
    $selector = '.spc-block-' . $id;

    //Container BoxShadow
    $gContainerBoxShadowPositionCSS = $settings['gContainerBoxShadowPosition'];

    if ( 'outset' == $settings['gContainerBoxShadowPosition'] ) {
        $gContainerBoxShadowPositionCSS = '';	
    }

//product tag BoxShadow

    $gProductTagsBoxShadowPositionCSS = $settings['gProductTagsBoxShadowPosition'];

    if ( 'outset' == $settings['gProductTagsBoxShadowPosition'] ) {
        $gProductTagsBoxShadowPositionCSS = '';	
    }

    //cart btn BoxShadow
    $addToCartbtnBoxShadowPositionCSS = $settings['addToCartbtnBoxShadowPosition'];

    if ( 'outset' == $settings['addToCartbtnBoxShadowPosition'] ) {
        $addToCartbtnBoxShadowPositionCSS = '';	
    }

    //Pagination BoxShadow
    $productPaginationPGBoxShadowPositionCSS = $settings['productPaginationPGBoxShadowPosition'];

    if ( 'outset' == $settings['productPaginationPGBoxShadowPosition'] ) {
        $productPaginationPGBoxShadowPositionCSS = '';	
    }

    //QuickView BoxShadow
    $gQuickViewBoxShadowPositionCSS = $settings['gQuickViewBoxShadowPosition'];

    if ( 'outset' == $settings['gQuickViewBoxShadowPosition'] ) {
        $gQuickViewBoxShadowPositionCSS = '';	
    }

    //button BoxShadow
    $gButtonBoxShadowPositionCSS = $settings['gButtonBoxShadowPosition'];

    if ( 'outset' == $settings['gButtonBoxShadowPosition'] ) {
        $gButtonBoxShadowPositionCSS = '';	
    }    

    //button hover BoxShadow
    $gButtonBoxShadowHoverPositionCSS = $settings['gButtonBoxShadowHoverPosition'];

    if ( 'outset' == $settings['gButtonBoxShadowHoverPosition'] ) {
        $gButtonBoxShadowHoverPositionCSS = '';	
    }  
    
    //swiper arrow BoxShadow
    $gSwiperArrowsShadowPositionCss = $settings['gSwiperArrowsShadowPosition'];

    if ( 'outset' == $settings['gSwiperArrowsShadowPosition'] ) {
        $gSwiperArrowsShadowPositionCss = '';	
    } 
    
    $gSwiperArrowsShadowPositionCssHover = $settings['gSwiperArrowsShadowPositionHover'];

    if ( 'outset' == $settings['gSwiperArrowsShadowPositionHover'] ) {
        $gSwiperArrowsShadowPositionCssHover = '';	
    }

    //swiper dots BoxShadow
    $gSwiperDotsShadowPositionCss = $settings['gSwiperDotsShadowPosition'];

    if ( 'outset' == $settings['gSwiperDotsShadowPosition'] ) {
        $gSwiperDotsShadowPositionCss = '';	
    } 
    
    $gSwiperDotsShadowPositionCssHover = $settings['gSwiperDotsShadowPositionHover'];

    if ( 'outset' == $settings['gSwiperDotsShadowPositionHover'] ) {
        $gSwiperDotsShadowPositionCssHover = '';	
    }

    $css->set_selector( '.wp-block-spc-woo-product' . $selector );
  
    $css->add_property( 'margin', $settings['productGridMainMargin'][0]['desk'][0] . $settings['productGridMainMarginUnit'] . ' ' . $settings['productGridMainMargin'][0]['desk'][1] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['desk'][2] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['desk'][3] . $settings['productGridMainMarginUnit'] );


    // Container
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' article .spc-woo-product-inner-wrap' );
    $css->add_property( 'text-align', $settings['gContainerAlignment'] );
    $css->add_property( 'background', $settings['gContainerBoxBGColor'] );
    $css->add_property( 'padding', $settings['gContainerBoxPadding'][0]['desk'][0] . $settings['gContainerBoxPaddingUnit'] . ' ' . $settings['gContainerBoxPadding'][0]['desk'][1] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['desk'][2] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['desk'][3] . $settings['gContainerBoxPaddingUnit'] );

    $css->add_property( 'box-shadow', array( $settings['gContainerBoxShadowHOffset'], $settings['gContainerBoxShadowVOffset'], $settings['gContainerBoxShadowBlur'], $settings['gContainerBoxShadowSpread'], $settings['gContainerBoxShadowColor'], $gContainerBoxShadowPositionCSS ), 'px' );
    $css->add_property( 'border-radius', $settings['gContainerBoxBR'][0]['desk'][0] . $settings['gContainerBoxBRUnit'] . ' ' . $settings['gContainerBoxBR'][0]['desk'][1] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['desk'][2] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['desk'][3] . $settings['gContainerBoxBRUnit'] );
    $css->add_property( 'border-style', $settings['gContainerBoxBorderStyleNormal'] );
    $css->add_property( 'border-width', $settings['gContainerBoxBorderWidthNormal'] . 'px');
    $css->add_property( 'border-color', $settings['gContainerBoxBorderColorNormal'] );

    //Stock Tag
    if(isset($settings['productStockTagPosX'][0]['desk'])){
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-stock-status' );
        $css->add_property( 'top', $settings['productStockTagPosX'][0]['desk'] . $settings['productStockTagPosXUnit']);
        $css->add_property( 'left', $settings['productStockTagPosY'][0]['desk'] . $settings['productStockTagPosYUnit']);
        $css->add_property( 'background', $settings['saleTagBgColor'] );
        $css->add_property( 'border-color', $settings['saleTagBRColor'] );
    }
    //Discount Tag
    $DiscountTopValue = isset($settings['productDiscntTagPosX'][0]['desk']) ? $settings['productDiscntTagPosX'][0]['desk'] : 0;
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-discount-price' );
    $css->add_property( 'top', $DiscountTopValue . $settings['productDiscntTagPosXUnit']);
    $css->add_property( 'right', $settings['productDiscntTagPosY'][0]['desk'] . $settings['productDiscntTagPosYUnit']);
    $css->add_property( 'background', $settings['dicntTagBgColor'] );
    $css->add_property( 'border-color', $settings['dicntTagBRColor'] );
    //featured/Hot Tag
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-featured-product' );
    $css->add_property( 'top', $settings['productHotTagPosY'][0]['desk'] . $settings['productHotTagPosYUnit']);
    $css->add_property( 'left', $settings['productHotTagPosX'][0]['desk'] . $settings['productHotTagPosXUnit']);
    $css->add_property( 'background', $settings['hotTagBgColor'] );
    $css->add_property( 'border-color', $settings['hotTagBRColor'] );

    //product tag
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag' );
    $css->add_property( 'color', $settings['gProductTagsColor'] );
    $css->add_property( 'font-family', $settings['gProductTagsFontFamily'] );
    $css->add_property( 'font-size', $settings['gProductTagsFontSize'] . $settings['gProductTagsFontSizeType'] );
    $css->add_property( 'line-height', $settings['gProductTagsLineHeight'] . $settings['gProductTagsLineHeightType'] );
    $css->add_property( 'font-weight', $settings['gProductTagsFontWeight'] );
    $css->add_property( 'text-transform', $settings['gProductTagsTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['gProductTagsLetterSpacing'] . 'px' );

    $css->add_property( 'background', $settings['gProductTagsBgColor'] );
    $css->add_property( 'border-width', $settings['gProductTagsBorderWidthNormal'] . 'px');
    $css->add_property( 'border-style', $settings['gProductTagsBorderStyleNormal'] );
    $css->add_property( 'border-color', $settings['gProductTagsBorderColorNormal'] );
    $css->add_property( 'padding', $settings['gProductTagsPadding'][0]['desk'][0] . $settings['gProductTagsPaddingUnit'] . ' ' . $settings['gProductTagsPadding'][0]['desk'][1] . $settings['gProductTagsPaddingUnit']  . ' ' . $settings['gProductTagsPadding'][0]['desk'][2] . $settings['gProductTagsPaddingUnit']  . ' ' . $settings['gProductTagsPadding'][0]['desk'][3] . $settings['gProductTagsPaddingUnit'] );
    $css->add_property( 'border-radius', $settings['gProductTagsBR'][0]['desk'][0] . $settings['gProductTagsBRUnit'] . ' ' . $settings['gProductTagsBR'][0]['desk'][1] . $settings['gProductTagsBRUnit']  . ' ' . $settings['gProductTagsBR'][0]['desk'][2] . $settings['gProductTagsBRUnit']  . ' ' . $settings['gProductTagsBR'][0]['desk'][3] . $settings['gProductTagsBRUnit'] );
    $css->add_property( 'box-shadow', array( $settings['gProductTagsBoxShadowHOffset'], $settings['gProductTagsBoxShadowVOffset'], $settings['gProductTagsBoxShadowBlur'], $settings['gProductTagsBoxShadowSpread'], $settings['gProductTagsBoxShadowColor'], $gProductTagsBoxShadowPositionCSS ), 'px' );
   
    // image
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image' );
    $css->add_property( 'margin-top',  '-' . $settings['gContainerBoxPadding'][0]['desk'][0], $settings['gContainerBoxPaddingUnit'] );
    $css->add_property( 'margin-left',  '-' . $settings['gContainerBoxPadding'][0]['desk'][3], $settings['gContainerBoxPaddingUnit'] );
    $css->add_property( 'margin-right',  '-' . $settings['gContainerBoxPadding'][0]['desk'][1], $settings['gContainerBoxPaddingUnit'] );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image img' );
    $css->add_property( 'border-top-left-radius', $settings['gContainerBoxBR'][0]['desk'][3] . $settings['gContainerBoxBRUnit'] );
    $css->add_property( 'border-top-right-radius', $settings['gContainerBoxBR'][0]['desk'][1] . $settings['gContainerBoxBRUnit'] );

    // Title style
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title' );
    $css->add_property( 'font-family', $settings['productTitleFontFamily'] );
    $css->add_property( 'margin', $settings['productTitleMargin'][0]['desk'][0] . $settings['productTitleMarginUnit'] . ' ' . $settings['productTitleMargin'][0]['desk'][1] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['desk'][2] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['desk'][3] . $settings['productTitleMarginUnit'] );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title a' );
    $css->add_property( 'color', $settings['productTitleColor'] );
    $css->add_property( 'font-family', $settings['productTitleFontFamily'] );
    $css->add_property( 'font-size', $settings['productTitleFontSize'] . $settings['productTitleFontSizeType'] );
    $css->add_property( 'line-height', $settings['productTitleLineHeight'] . $settings['productTitleLineHeightType'] );
    $css->add_property( 'font-weight', $settings['productTitleFontWeight'] );
    $css->add_property( 'text-transform', $settings['productTitleTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['productTitleLetterSpacing'] . 'px' );
    
     //QuickView
     if ( true === $settings['displayQuickView'] ) {
  
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper' );
        $css->add_property( 'text-align', $settings['gQuickViewAlignment'] );
        $css->add_property( 'top', $settings['gQuickViewPosTop'] . 'px' );
        $css->add_property( 'bottom', $settings['gQuickViewPosBottom'] . 'px' );
        $css->add_property( 'left', $settings['gQuickViewPosLeft'] . 'px' );
        $css->add_property( 'right', $settings['gQuickViewPosRight'] . 'px' );

        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn' );
        $css->add_property( 'color', $settings['gQuickViewColor'] );
        $css->add_property( 'font-family', $settings['gQuickViewFontFamily'] );
        $css->add_property( 'font-size', $settings['gQuickViewFontSize'] . $settings['gQuickViewFontSizeType'] );
        $css->add_property( 'line-height', $settings['gQuickViewLineHeight'] . $settings['gQuickViewLineHeightType'] );
        $css->add_property( 'font-weight', $settings['gQuickViewFontWeight'] );
        $css->add_property( 'text-transform', $settings['gQuickViewTextTransform'] );
        $css->add_property( 'letter-spacing', $settings['gQuickViewLetterSpacing'] . 'px' );
        $css->add_property( 'background', $settings['gQuickViewBGColor'] );
        $css->add_property( 'padding', $settings['gQuickViewPadding'][0]['desk'][0] . $settings['gQuickViewPaddingUnit'] . ' ' . $settings['gQuickViewPadding'][0]['desk'][1] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['desk'][2] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['desk'][3] . $settings['gQuickViewPaddingUnit'] );
        $css->add_property( 'border', $settings['gQuickViewBorderStyleNormal'] . ' ' . $settings['gQuickViewBorderWidthNormal'] . 'px ' . $settings['gQuickViewBorderColorNormal'] );
        $css->add_property( 'border-radius', $settings['gQuickViewBR'][0]['desk'][0] . $settings['gQuickViewBRUnit'] . ' ' . $settings['gQuickViewBR'][0]['desk'][1] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['desk'][2] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['desk'][3] . $settings['gQuickViewBRUnit'] );

        $css->add_property( 'box-shadow', array( $settings['gQuickViewBoxShadowHOffset'], $settings['gQuickViewBoxShadowVOffset'], $settings['gQuickViewBoxShadowBlur'], $settings['gQuickViewBoxShadowSpread'], $settings['gQuickViewBoxShadowColor'], $gQuickViewBoxShadowPositionCSS ), 'px' );

        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn .dashicons' );
        $css->add_property( 'font-size', $settings['gQuickViewFontSize'] . $settings['gQuickViewFontSizeType'] );
        $css->add_property( 'line-height', $settings['gQuickViewLineHeight'] . $settings['gQuickViewLineHeightType'] );
 
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn:hover' );
        $css->add_property( 'color', $settings['gQuickViewHColor'] );
        $css->add_property( 'background', $settings['gQuickViewBGHColor'] );
    }


    //Taxonomy
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy' );
    $css->add_property( 'margin', $settings['productTaxonomyMargin'][0]['desk'][0] . $settings['productTaxonomyMarginUnit'] . ' ' . $settings['productTaxonomyMargin'][0]['desk'][1] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['desk'][2] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['desk'][3] . $settings['productTaxonomyMarginUnit'] );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy a' );
    $css->add_property( 'color', $settings['productTaxonomyColor'] );
    $css->add_property( 'font-family', $settings['productTaxonomyFontFamily'] );
    $css->add_property( 'font-size', $settings['productTaxonomyFontSize'] . $settings['productTaxonomyFontSizeType'] );
    $css->add_property( 'line-height', $settings['productTaxonomyLineHeight'] . $settings['productTaxonomyLineHeightType'] );
    $css->add_property( 'font-weight', $settings['productTaxonomyFontWeight'] );
    $css->add_property( 'text-transform', $settings['productTaxonomyTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['productTaxonomyLetterSpacing'] . 'px' );
    $css->add_property( 'background', $settings['productTaxonomyBGColor'] );
    $css->add_property( 'border', $settings['productTaxonomyBorderStyleNormal'] . ' ' . $settings['productTaxonomyBorderWidthNormal'] . 'px ' . $settings['productTaxonomyBorderColorNormal'] );
    $css->add_property( 'padding', $settings['productTaxonomyPadding'][0]['desk'][0] . $settings['productTaxonomyPaddingUnit'] . ' ' . $settings['productTaxonomyPadding'][0]['desk'][1] . $settings['productTaxonomyPaddingUnit']  . ' ' . $settings['productTaxonomyPadding'][0]['desk'][2] . $settings['productTaxonomyPaddingUnit']  . ' ' . $settings['productTaxonomyPadding'][0]['desk'][3] . $settings['productTaxonomyPaddingUnit'] );
    $css->add_property( 'border-radius', $settings['productTaxonomyBR'][0]['desk'][0] . $settings['productTaxonomyBRUnit'] . ' ' . $settings['productTaxonomyBR'][0]['desk'][1] . $settings['productTaxonomyBRUnit']  . ' ' . $settings['productTaxonomyBR'][0]['desk'][2] . $settings['productTaxonomyBRUnit']  . ' ' . $settings['productTaxonomyBR'][0]['desk'][3] . $settings['productTaxonomyBRUnit'] );
    
    //rating
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating' );
    $css->add_property( 'margin', $settings['ratingMargin'][0]['desk'][0] . $settings['ratingMarginUnit'] . ' ' . $settings['ratingMargin'][0]['desk'][1] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['desk'][2] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['desk'][3] . $settings['ratingMarginUnit'] );


    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating .star-rating' );
    $css->add_property( 'color', $settings['ratingActiveColor'] );
    $css->add_property( 'font-size', $settings['ratingSize'] . 'px'); 

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating .star-rating .span::before' );
    $css->add_property( 'color', $settings['ratingActiveColor'] );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating .star-rating::before' );
    $css->add_property( 'color', $settings['ratingNormalColor'] );

    if ( "center" == $settings['gContainerAlignment'] ) {
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-rating.woocommerce-product-rating .star-rating' );
        $css->add_property( 'float', 'none' );
        $css->add_property( 'margin-left', 'auto' );
        $css->add_property( 'margin-right', 'auto' );
    }
    
     if ( "end" == $settings['gContainerAlignment'] ) {
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-rating.woocommerce-product-rating .star-rating' );
        $css->add_property( 'float', 'none' );
        $css->add_property( 'margin-left', 'auto' );
    }

    //excerpt
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-post-excerpt' );
    $css->add_property( 'color', $settings['productExcerptColor'] );
    $css->add_property( 'font-family', $settings['productExcerptFontFamily'] );
    $css->add_property( 'font-weight', $settings['productExcerptFontWeight'] );
    $css->add_property( 'text-transform', $settings['productExcerptTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['productExcerptLetterSpacing'] . 'px' );
    $css->add_property( 'font-size', $settings['productExcerptFontSize'] . $settings['productExcerptFontSizeType'] );
    $css->add_property( 'line-height', $settings['productExcerptLineHeight'] . $settings['productExcerptLineHeightType'] );
    $css->add_property( 'margin', $settings['productExcerptMargin'][0]['desk'][0] . $settings['productExcerptMarginUnit'] . ' ' . $settings['productExcerptMargin'][0]['desk'][1] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['desk'][2] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['desk'][3] . $settings['productExcerptMarginUnit'] );

    //price
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price ins' );
    $css->add_property( 'text-decoration', "none" );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price .amount' );
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price' );
    $css->add_property( 'color', $settings['productPriceColor'] );
    $css->add_property( 'font-family', $settings['productPriceFontFamily'] );
    $css->add_property( 'font-weight', $settings['productPriceFontWeight'] );
    $css->add_property( 'font-size', $settings['productPriceFontSize'] . $settings['productPriceFontSizeType'] );
    $css->add_property( 'line-height', $settings['productPriceLineHeight'] . $settings['productPriceLineHeightType'] );
    $css->add_property( 'text-transform', $settings['productPriceTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['productPriceLetterSpacing'] . 'px' );
     
    $css->add_property( 'margin', $settings['productPriceMargin'][0]['desk'][0] . $settings['productPriceMarginUnit'] . ' ' . $settings['productPriceMargin'][0]['desk'][1] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['desk'][2] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['desk'][3] . $settings['productPriceMarginUnit'] );


    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price ins' );
    $css->add_property( 'color', $settings['productPriceCurrentColor'] ); 

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price del' );
    $css->add_property( 'color', $settings['productPriceDelColor'] );
    $css->add_property( 'font-size', $settings['productPriceDelFontSize'][0]['desk'] . $settings['productPriceDelFontSizeUnit']);

    //btn 
    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper' );
    $css->add_property( 'margin', $settings['addToCartbtnMargin'][0]['desk'][0] . $settings['addToCartbtnMarginUnit'] . ' ' . $settings['addToCartbtnMargin'][0]['desk'][1] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['desk'][2] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['desk'][3] . $settings['addToCartbtnMarginUnit'] );

    $css->set_selector( '.site .wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper a.button:not(:hover):not(:active):not(.has-background)' );
    $css->add_property( 'background-color', $settings['addToCartbtnBgColor'] );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper a' );
    $css->add_property( 'color', $settings['addToCartbtnColor'] );
    $css->add_property( 'font-family', $settings['addToCartbtnFontFamily'] );
    $css->add_property( 'font-weight', $settings['addToCartbtnFontWeight'] );
    $css->add_property( 'font-size', $settings['addToCartbtnFontSize'] . $settings['addToCartbtnFontSizeType'] );
    $css->add_property( 'line-height', $settings['addToCartbtnLineHeight'] . $settings['addToCartbtnLineHeightType'] );
    $css->add_property( 'text-transform', $settings['addToCartbtnTextTransform'] );
    $css->add_property( 'letter-spacing', $settings['addToCartbtnLetterSpacing'] . 'em' );

    $css->add_property( 'background-color', $settings['addToCartbtnBgColor'] );
    $css->add_property( 'padding', $settings['addToCartbtnPadding'][0]['desk'][0] . $settings['addToCartbtnPaddingUnit'] . ' ' . $settings['addToCartbtnPadding'][0]['desk'][1] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['desk'][2] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['desk'][3] . $settings['addToCartbtnPaddingUnit'] );

    $css->add_property( 'border-width', $settings['addToCartbtnBorderWidth'] . 'px');
    $css->add_property( 'border-style', $settings['addToCartbtnBorderStyle'] );
    $css->add_property( 'border-color', $settings['addToCartbtnBorderColor'] );
    $css->add_property( 'border-radius', $settings['addToCartbtnBR'][0]['desk'][0] . $settings['addToCartbtnBRUnit'] . ' ' . $settings['addToCartbtnBR'][0]['desk'][1] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['desk'][2] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['desk'][3] . $settings['addToCartbtnBRUnit'] );
    $css->add_property( 'box-shadow', array( $settings['addToCartbtnBoxShadowHOffset'], $settings['addToCartbtnBoxShadowVOffset'], $settings['addToCartbtnBoxShadowBlur'], $settings['addToCartbtnBoxShadowSpread'], $settings['addToCartbtnBoxShadowColor'], $addToCartbtnBoxShadowPositionCSS ), 'px' );

    $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper a:hover' );
    $css->add_property( 'text-decoration', 'none' );
    $css->add_property( 'color', $settings['addToCartbtnHcolor'] );
    $css->add_property( 'background-color', $settings['addToCartbtnBgHcolor'] );
    $css->add_property( 'border-color', $settings['addToCartbtnBorderHColor'] );
    $css->add_property( 'border-width', $settings['addToCartbtnBorderHWidth'] . 'px');
    $css->add_property( 'border-style', $settings['addToCartbtnBorderHStyle'] );

    // wishlist btn
    
    //product pagination
    if ( true === $settings['displayProductPagination'] ) {

        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap' );
        $css->add_property( 'text-align', $settings['productPaginationAlignment'] );
        $css -> add_property('margin', $settings['productPaginationPGMargin'][0]['desk'][0].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['desk'][1].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['desk'][2].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['desk'][3].$settings['productPaginationPGMarginUnit']);
    
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap .page-numbers' );
        $css->add_property( 'font-family', $settings['productPaginationPGFontFamily'] );
        $css->add_property( 'font-size', $settings['productPaginationPGFontSize'] . $settings['productPaginationPGFontSizeType'] );
        $css->add_property( 'line-height', $settings['productPaginationPGLineHeight'] . $settings['productPaginationPGLineHeightType'] );
        $css->add_property( 'font-weight', $settings['productPaginationPGFontWeight'] );
        $css->add_property( 'text-transform', $settings['productPaginationTextTransform'] );
        $css->add_property( 'letter-spacing', $settings['productPaginationLetterSpacing'] . 'px' );
        $css->add_property( 'color', $settings['productPaginationPGColor'] );
        $css->add_property( 'background-color', $settings['productPaginationPGBgColor'] );
        $css->add_property( 'padding', $settings['productPaginationPGPadding'][0]['desk'][0] . $settings['productPaginationPGPaddingUnit'] . ' ' . $settings['productPaginationPGPadding'][0]['desk'][1] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['desk'][2] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['desk'][3] . $settings['productPaginationPGPaddingUnit'] );
        $css->add_property( 'border-width', $settings['productPaginationPGBorderWidth'] . 'px');
        $css->add_property( 'border-style', $settings['productPaginationPGBorderStyle'] );
        $css->add_property( 'border-color', $settings['productPaginationPGBorderColor'] );
        $css->add_property( 'margin-left', $settings['productPaginationSpecing'] . 'px');
        $css->add_property( 'margin-right', $settings['productPaginationSpecing'] . 'px');
        $css->add_property( 'border-radius', $settings['productPaginationPGBR'][0]['desk'][0] . $settings['productPaginationPGBRUnit'] . ' ' . $settings['productPaginationPGBR'][0]['desk'][1] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['desk'][2] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['desk'][3] . $settings['productPaginationPGBRUnit'] );
        $css->add_property( 'box-shadow', array( $settings['productPaginationPGBoxShadowHOffset'], $settings['productPaginationPGBoxShadowVOffset'], $settings['productPaginationPGBoxShadowBlur'], $settings['productPaginationPGBoxShadowSpread'], $settings['productPaginationPGBoxShadowColor'], $productPaginationPGBoxShadowPositionCSS ), 'px' );
    
        // productPagination current / Hover css 
        $css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap .page-numbers.current' );
        $css->add_property( 'color', $settings['productPaginationPGHcolor'] );
        $css->add_property( 'background-color', $settings['productPaginationPGBgHcolor'] );
        $css->add_property( 'border-color', $settings['productPaginationPGBorderHColor'] );
        $css->add_property( 'border-width', $settings['productPaginationPGBorderHWidth'] . 'px' );
        $css->add_property( 'border-style', $settings['productPaginationPGBorderHStyle'] );
    
    }

    //product Load More Style
    if ( true === $settings['loadMoreProduct'] ) {

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn' );
        $css->add_property( 'margin', $settings['gButtonMargin'][0]['desk'][0] . $settings['gButtonMarginUnit'] . ' ' . $settings['gButtonMargin'][0]['desk'][1] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['desk'][2] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['desk'][3] . $settings['gButtonMarginUnit'] );
        $css->add_property( 'text-align', $settings['gButtonAlignment'] );

        // Button css 
        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn .spc-woo-product-loadmore-btn' );
        $css->add_property( 'font-family', $settings['gButtonFontFamily'] );
        $css->add_property( 'font-size', $settings['gButtonFontSize'] . $settings['gButtonFontSizeType'] );
        $css->add_property( 'line-height', $settings['gButtonLineHeight'] . $settings['gButtonLineHeightType'] );
        $css->add_property( 'font-weight', $settings['gButtonFontWeight'] );
        $css->add_property( 'text-transform', $settings['gButtonTextTransform'] );
        $css->add_property( 'letter-spacing', $settings['gButtonLetterSpacing'] . 'em' );
        $css->add_property( 'color', $settings['gButtonColor'] );
        $css->add_property( 'background-color', $settings['gButtonBgColor'] );
        $css->add_property( 'padding', $settings['gButtonPadding'][0]['desk'][0] . $settings['gButtonPaddingUnit'] . ' ' . $settings['gButtonPadding'][0]['desk'][1] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['desk'][2] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['desk'][3] . $settings['gButtonPaddingUnit'] );
        $css->add_property( 'border-width', $settings['gButtonBorderWidth'] . 'px');
        $css->add_property( 'border-style', $settings['gButtonBorderStyle'] );
        $css->add_property( 'border-color', $settings['gButtonBorderColor'] );
        $css -> add_property('border-radius', $settings['gButtonBR'][0]['desk'][0].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['desk'][1].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['desk'][2].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['desk'][3].$settings['gButtonBRUnit']);
        $css->add_property( 'box-shadow', array( $settings['gButtonBoxShadowHOffset'], $settings['gButtonBoxShadowVOffset'], $settings['gButtonBoxShadowBlur'], $settings['gButtonBoxShadowSpread'], $settings['gButtonBoxShadowColor'], $gButtonBoxShadowPositionCSS ), 'px' );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn .spc-woo-product-loadmore-btn:hover' );
        $css->add_property( 'color', $settings['gButtonHcolor'] );
        $css->add_property( 'background-color', $settings['gButtonBgHcolor'] );
        $css->add_property( 'border-color', $settings['gButtonBorderHColor'] );
        $css->add_property( 'border-width', $settings['gButtonBorderHWidth'] . 'px' );
        $css->add_property( 'border-style', $settings['gButtonBorderHStyle'] );
        $css->add_property( 'box-shadow', array( $settings['gButtonBoxShadowHOHoverffset'], $settings['gButtonBoxShadowVOHoverffset'], $settings['gButtonBoxShadowHoverBlur'], $settings['gButtonBoxShadowHoverSpread'], $settings['gButtonBoxShadowHoverColor'], $gButtonBoxShadowHoverPositionCSS ), 'px' );

    }

    if( "carousel" === $settings['displayLayoutType'] && true === $settings['productCarouselNavigation'] ) {

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev svg' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconColor'] );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next svg' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconColor'] );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev:hover svg' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconHColor'] );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next:hover svg' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconHColor'] );


        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconColor'] );
        $css->add_property( 'background-color', $settings['gSwiperArrowsBGColor'] );
        $css->add_property( 'border-color', $settings['gSwiperArrowsBorderColorNormal'] );
        $css->add_property( 'border-width', $settings['gSwiperArrowsBorderWidthNormal'] . 'px' );
        $css->add_property( 'border-style', $settings['gSwiperArrowsBorderStyleNormal'] );
        $css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['desk'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][3].$settings['gSwiperArrowsBRUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperArrowsShadowHOffset'], $settings['gSwiperArrowsShadowVOffset'], $settings['gSwiperArrowsShadowBlur'], $settings['gSwiperArrowsShadowSpread'], $settings['gSwiperArrowsShadowColor'], $gSwiperArrowsShadowPositionCss ), 'px' );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconColor'] );
        $css->add_property( 'background-color', $settings['gSwiperArrowsBGColor'] );
        $css->add_property( 'border-color', $settings['gSwiperArrowsBorderColorNormal'] );
        $css->add_property( 'border-width', $settings['gSwiperArrowsBorderWidthNormal'] . 'px' );
        $css->add_property( 'border-style', $settings['gSwiperArrowsBorderStyleNormal'] );
        $css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['desk'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][3].$settings['gSwiperArrowsBRUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperArrowsShadowHOffset'], $settings['gSwiperArrowsShadowVOffset'], $settings['gSwiperArrowsShadowBlur'], $settings['gSwiperArrowsShadowSpread'], $settings['gSwiperArrowsShadowColor'], $gSwiperArrowsShadowPositionCss ), 'px' );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev:hover' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconHColor'] );
        $css->add_property( 'background-color', $settings['gSwiperArrowsBGHColor'] );
        $css->add_property( 'border-color', $settings['gSwiperArrowsBorderColorHover'] );
        $css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['desk'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][3].$settings['gSwiperArrowsBRHUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperArrowsShadowHOffsetHover'], $settings['gSwiperArrowsShadowVOffsetHover'], $settings['gSwiperArrowsShadowBlurHover'], $settings['gSwiperArrowsShadowSpreadHover'], $settings['gSwiperArrowsShadowColorHover'], $gSwiperArrowsShadowPositionCssHover ), 'px' );

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next:hover' );
        $css->add_property( 'color', $settings['gSwiperArrowsIconHColor'] );
        $css->add_property( 'background-color', $settings['gSwiperArrowsBGHColor'] );
        $css->add_property( 'border-color', $settings['gSwiperArrowsBorderColorHover'] );
        $css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['desk'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['desk'][3].$settings['gSwiperArrowsBRHUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperArrowsShadowHOffsetHover'], $settings['gSwiperArrowsShadowVOffsetHover'], $settings['gSwiperArrowsShadowBlurHover'], $settings['gSwiperArrowsShadowSpreadHover'], $settings['gSwiperArrowsShadowColorHover'], $gSwiperArrowsShadowPositionCssHover ), 'px' );

    }

    if( "carousel" === $settings['displayLayoutType'] && true === $settings['productCarouselPagination'] ) {

        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet' );
        $css->add_property( 'color', $settings['gSwiperDotsColor'] );
        $css->add_property( 'background-color', $settings['gSwiperDotsBGColor'] );
        $css->add_property( 'border-color', $settings['gSwiperDotsBorderColorNormal'] );
        $css->add_property( 'border-width', $settings['gSwiperDotsBorderWidthNormal'] . 'px' );
        $css->add_property( 'border-style', $settings['gSwiperDotsBorderStyleNormal'] );
        $css -> add_property('border-radius', $settings['gSwiperDotsBR'][0]['desk'][0].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['desk'][1].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['desk'][2].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['desk'][3].$settings['gSwiperDotsBRUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperDotsShadowHOffset'], $settings['gSwiperDotsShadowVOffset'], $settings['gSwiperDotsShadowBlur'], $settings['gSwiperDotsShadowSpread'], $settings['gSwiperDotsShadowColor'], $gSwiperDotsShadowPositionCss ), 'px' );
    
        $css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet-active' );
        $css->add_property( 'color', $settings['gSwiperDotsHColor'] );
        $css->add_property( 'background-color', $settings['gSwiperDotsBGHColor'] );
        $css->add_property( 'border-color', $settings['gSwiperDotsBorderColorHover'] );
        $css -> add_property('border-radius', $settings['gSwiperDotsBRH'][0]['desk'][0].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['desk'][1].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['desk'][2].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['desk'][3].$settings['gSwiperDotsBRHUnit']);
        $css->add_property( 'box-shadow', array( $settings['gSwiperDotsShadowHOffsetHover'], $settings['gSwiperDotsShadowVOffsetHover'], $settings['gSwiperDotsShadowBlurHover'], $settings['gSwiperDotsShadowSpreadHover'], $settings['gSwiperDotsShadowColorHover'], $gSwiperDotsShadowPositionCssHover ), 'px' );
    
    }

     // =======================   Tablet Version  ========================= //

    //Tablet Version
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector );
  
    $tablet_css->add_property( 'margin', $settings['productGridMainMargin'][0]['tablet'][0] . $settings['productGridMainMarginUnit'] . ' ' . $settings['productGridMainMargin'][0]['tablet'][1] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['tablet'][2] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['tablet'][3] . $settings['productGridMainMarginUnit'] );

    // Container
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' article .spc-woo-product-inner-wrap' );
    $tablet_css->add_property( 'padding', $settings['gContainerBoxPadding'][0]['tablet'][0] . $settings['gContainerBoxPaddingUnit'] . ' ' . $settings['gContainerBoxPadding'][0]['tablet'][1] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['tablet'][2] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['tablet'][3] . $settings['gContainerBoxPaddingUnit'] );
    
    $tablet_css->add_property( 'border-radius', $settings['gContainerBoxBR'][0]['tablet'][0] . $settings['gContainerBoxBRUnit'] . ' ' . $settings['gContainerBoxBR'][0]['tablet'][1] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['tablet'][2] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['tablet'][3] . $settings['gContainerBoxBRUnit'] );

    //Stock Tag
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-stock-status' );
    $tablet_css->add_property( 'top', $settings['productStockTagPosX'][0]['tablet'] . $settings['productStockTagPosXUnit']);
    $tablet_css->add_property( 'left', $settings['productStockTagPosY'][0]['tablet'] . $settings['productStockTagPosYUnit']);
    //Discount Tag
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-discount-price' );
    $tablet_css->add_property( 'top', $settings['productDiscntTagPosX'][0]['tablet'] . $settings['productDiscntTagPosXUnit']);
    $tablet_css->add_property( 'right', $settings['productDiscntTagPosY'][0]['tablet'] . $settings['productDiscntTagPosYUnit']);
    //featured/Hot Tag
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-featured-product' );
    $tablet_css->add_property( 'top', $settings['productHotTagPosY'][0]['tablet'] . $settings['productHotTagPosYUnit']);
    $tablet_css->add_property( 'left', $settings['productHotTagPosX'][0]['tablet'] . $settings['productHotTagPosXUnit']);

    //image
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image' );
    $tablet_css->add_property( 'margin-top',  '-' . $settings['gContainerBoxPadding'][0]['tablet'][0], $settings['gContainerBoxPaddingUnit'] );
    $tablet_css->add_property( 'margin-left',  '-' . $settings['gContainerBoxPadding'][0]['tablet'][3], $settings['gContainerBoxPaddingUnit'] );
    $tablet_css->add_property( 'margin-right',  '-' . $settings['gContainerBoxPadding'][0]['tablet'][1], $settings['gContainerBoxPaddingUnit'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image img' );
    $tablet_css->add_property( 'border-top-left-radius',  $settings['gContainerBoxBR'][0]['tablet'][3] . $settings['gContainerBoxBRUnit'] );
    $tablet_css->add_property( 'border-top-right-radius', $settings['gContainerBoxBR'][0]['tablet'][1] . $settings['gContainerBoxBRUnit'] );

    //Title
    // Title style
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title' );
    $tablet_css->add_property( 'font-size', $settings['productTitleFontSizeTablet'] . $settings['productTitleFontSizeType'] );
    $tablet_css->add_property( 'padding', $settings['productTitleMargin'][0]['tablet'][0] . $settings['productTitleMarginUnit'] . ' ' . $settings['productTitleMargin'][0]['tablet'][1] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['tablet'][2] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['tablet'][3] . $settings['productTitleMarginUnit'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title a' );
    $tablet_css->add_property( 'font-size', $settings['productTitleFontSizeTablet'] . $settings['productTitleFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['productTitleLineHeightTablet'] . $settings['productTitleLineHeightType'] );

    //QuickView
    if ( true === $settings['displayQuickView'] ) {
        $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn' );
        $tablet_css->add_property( 'font-size', $settings['gQuickViewFontSizeTablet'] . $settings['gQuickViewFontSizeType'] );
        $tablet_css->add_property( 'line-height', $settings['gQuickViewLineHeightTablet'] . $settings['gQuickViewLineHeightType'] );
        $tablet_css->add_property( 'margin', $settings['gQuickViewPadding'][0]['tablet'][0] . $settings['gQuickViewPaddingUnit'] . ' ' . $settings['gQuickViewPadding'][0]['tablet'][1] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['tablet'][2] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['tablet'][3] . $settings['gQuickViewPaddingUnit'] );
        $tablet_css->add_property( 'border-radius', $settings['gQuickViewBR'][0]['tablet'][0] . $settings['gQuickViewBRUnit'] . ' ' . $settings['gQuickViewBR'][0]['tablet'][1] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['tablet'][2] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['tablet'][3] . $settings['gQuickViewBRUnit'] );

        $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn .dashicons' );
        $tablet_css->add_property( 'font-size', $settings['gQuickViewFontSizeTablet'] . $settings['gQuickViewFontSizeType'] );
        $tablet_css->add_property( 'line-height', $settings['gQuickViewLineHeightTablet'] . $settings['gQuickViewLineHeightType'] );
    }

    //Taxonomy
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy' );
    $tablet_css->add_property( 'margin', $settings['productTaxonomyMargin'][0]['tablet'][0] . $settings['productTaxonomyMarginUnit'] . ' ' . $settings['productTaxonomyMargin'][0]['tablet'][1] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['tablet'][2] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['tablet'][3] . $settings['productTaxonomyMarginUnit'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy span' );
    $tablet_css->add_property( 'font-size', $settings['productTaxonomyFontSizeTablet'] . $settings['productTaxonomyFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['productTaxonomyLineHeightTablet'] . $settings['productTaxonomyLineHeightType'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy a' );
    $tablet_css->add_property( 'font-size', $settings['productTaxonomyFontSizeTablet'] . $settings['productTaxonomyFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['productTaxonomyLineHeightTablet'] . $settings['productTaxonomyLineHeightType'] );

    //Rating
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating' );
    $tablet_css->add_property( 'margin', $settings['ratingMargin'][0]['tablet'][0] . $settings['ratingMarginUnit'] . ' ' . $settings['ratingMargin'][0]['tablet'][1] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['tablet'][2] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['tablet'][3] . $settings['ratingMarginUnit'] );

    //price
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price' );
    $tablet_css->add_property( 'font-size', $settings['productPriceFontSizeTablet'] . $settings['productPriceFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['productPriceLineHeight'] . $settings['productPriceLineHeightType'] );
    $tablet_css->add_property( 'margin', $settings['productPriceMargin'][0]['tablet'][0] . $settings['productPriceMarginUnit'] . ' ' . $settings['productPriceMargin'][0]['tablet'][1] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['tablet'][2] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['tablet'][3] . $settings['productPriceMarginUnit'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price del' );
    $tablet_css->add_property( 'font-size', $settings['productPriceDelFontSize'][0]['tablet'] . $settings['productPriceDelFontSizeUnit']);

    //excerpt
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-post-excerpt' );
    $tablet_css->add_property( 'font-size', $settings['productExcerptFontSizeTablet'] . $settings['productExcerptFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['productExcerptLineHeightTablet'] . $settings['productExcerptLineHeightType'] );
    $tablet_css->add_property( 'margin', $settings['productExcerptMargin'][0]['tablet'][0] . $settings['productExcerptMarginUnit'] . ' ' . $settings['productExcerptMargin'][0]['tablet'][1] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['tablet'][2] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['tablet'][3] . $settings['productExcerptMarginUnit'] );

    //btn 
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper' );
    $tablet_css->add_property( 'margin', $settings['addToCartbtnMargin'][0]['tablet'][0] . $settings['addToCartbtnMarginUnit'] . ' ' . $settings['addToCartbtnMargin'][0]['tablet'][1] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['tablet'][2] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['tablet'][3] . $settings['addToCartbtnMarginUnit'] );

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper a' );
    $tablet_css->add_property( 'font-size', $settings['addToCartbtnFontSizeTablet'] . $settings['addToCartbtnFontSizeType'] );
    $tablet_css->add_property( 'line-height', $settings['addToCartbtnLineHeightTablet'] . $settings['addToCartbtnLineHeightType'] );
    $tablet_css->add_property( 'padding', $settings['addToCartbtnPadding'][0]['tablet'][0] . $settings['addToCartbtnPaddingUnit'] . ' ' . $settings['addToCartbtnPadding'][0]['tablet'][1] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['tablet'][2] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['tablet'][3] . $settings['addToCartbtnPaddingUnit'] );
    $tablet_css->add_property( 'border-radius', $settings['addToCartbtnBR'][0]['tablet'][0] . $settings['addToCartbtnBRUnit'] . ' ' . $settings['addToCartbtnBR'][0]['tablet'][1] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['tablet'][2] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['tablet'][3] . $settings['addToCartbtnBRUnit'] );
   
    if ( true === $settings['displayProductPagination'] ) {
    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap' );
    $tablet_css -> add_property('margin', $settings['productPaginationPGMargin'][0]['tablet'][0].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['tablet'][1].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['tablet'][2].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['tablet'][3].$settings['productPaginationPGMarginUnit']);

    $tablet_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap .page-numbers' );
    $tablet_css->add_property( 'padding', $settings['productPaginationPGPadding'][0]['tablet'][0] . $settings['productPaginationPGPaddingUnit'] . ' ' . $settings['productPaginationPGPadding'][0]['tablet'][1] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['tablet'][2] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['tablet'][3] . $settings['productPaginationPGPaddingUnit'] );
    $tablet_css->add_property( 'border-radius', $settings['productPaginationPGBR'][0]['tablet'][0] . $settings['productPaginationPGBRUnit'] . ' ' . $settings['productPaginationPGBR'][0]['tablet'][1] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['tablet'][2] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['tablet'][3] . $settings['productPaginationPGBRUnit'] );

    }
  
    if ( true === $settings['loadMoreProduct'] ) {
        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn' );
        $tablet_css->add_property( 'margin', $settings['gButtonMargin'][0]['tablet'][0] . $settings['gButtonMarginUnit'] . ' ' . $settings['gButtonMargin'][0]['tablet'][1] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['tablet'][2] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['tablet'][3] . $settings['gButtonMarginUnit'] );

        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn .spc-woo-product-loadmore-btn' );
        $tablet_css->add_property( 'padding', $settings['gButtonPadding'][0]['tablet'][0] . $settings['gButtonPaddingUnit'] . ' ' . $settings['gButtonPadding'][0]['tablet'][1] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['tablet'][2] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['tablet'][3] . $settings['gButtonPaddingUnit'] );
        $tablet_css -> add_property('border-radius', $settings['gButtonBR'][0]['tablet'][0].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['tablet'][1].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['tablet'][2].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['tablet'][3].$settings['gButtonBRUnit']);
    }
    
    
    if( "carousel" === $settings['displayLayoutType'] && true === $settings['productCarouselPagination'] ) {
        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperDotsBR'][0]['tablet'][0].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['tablet'][1].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['tablet'][2].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['tablet'][3].$settings['gSwiperDotsBRUnit']);

        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet-active' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperDotsBRH'][0]['tablet'][0].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['tablet'][1].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['tablet'][2].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['tablet'][3].$settings['gSwiperDotsBRHUnit']);

        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['tablet'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][3].$settings['gSwiperArrowsBRUnit']);
   
        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['tablet'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['tablet'][3].$settings['gSwiperArrowsBRUnit']);

        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev:hover' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['tablet'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][3].$settings['gSwiperArrowsBRHUnit']);
     
        $tablet_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next:hover' );
        $tablet_css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['tablet'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['tablet'][3].$settings['gSwiperArrowsBRHUnit']);
    }

    // =======================   Mobile Version  ========================= //

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector );
   
    $mobile_css->add_property( 'margin', $settings['productGridMainMargin'][0]['mobile'][0] . $settings['productGridMainMarginUnit'] . ' ' . $settings['productGridMainMargin'][0]['mobile'][1] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['mobile'][2] . $settings['productGridMainMarginUnit']  . ' ' . $settings['productGridMainMargin'][0]['mobile'][3] . $settings['productGridMainMarginUnit'] );
    
    // Container
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' article .spc-woo-product-inner-wrap' );
    $mobile_css->add_property( 'padding', $settings['gContainerBoxPadding'][0]['mobile'][0] . $settings['gContainerBoxPaddingUnit'] . ' ' . $settings['gContainerBoxPadding'][0]['mobile'][1] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['mobile'][2] . $settings['gContainerBoxPaddingUnit']  . ' ' . $settings['gContainerBoxPadding'][0]['mobile'][3] . $settings['gContainerBoxPaddingUnit'] );
    $mobile_css->add_property( 'border-radius', $settings['gContainerBoxBR'][0]['mobile'][0] . $settings['gContainerBoxBRUnit'] . ' ' . $settings['gContainerBoxBR'][0]['mobile'][1] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['mobile'][2] . $settings['gContainerBoxBRUnit']  . ' ' . $settings['gContainerBoxBR'][0]['mobile'][3] . $settings['gContainerBoxBRUnit'] );

    
    //Stock Tag
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-stock-status' );
    $mobile_css->add_property( 'top', $settings['productStockTagPosX'][0]['mobile'] . $settings['productStockTagPosXUnit']);
    $mobile_css->add_property( 'left', $settings['productStockTagPosY'][0]['mobile'] . $settings['productStockTagPosYUnit']);
    //Discount Tag
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-discount-price' );
    $mobile_css->add_property( 'top', $settings['productDiscntTagPosX'][0]['mobile'] . $settings['productDiscntTagPosXUnit']);
    $mobile_css->add_property( 'right', $settings['productDiscntTagPosY'][0]['mobile'] . $settings['productDiscntTagPosYUnit']);
    //featured/Hot Tag
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-tag.spc-featured-product' );
    $mobile_css->add_property( 'top', $settings['productHotTagPosY'][0]['mobile'] . $settings['productHotTagPosYUnit']);
    $mobile_css->add_property( 'left', $settings['productHotTagPosX'][0]['mobile'] . $settings['productHotTagPosXUnit']);

    //image
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image' );
    $mobile_css->add_property( 'margin-top',  '-' . $settings['gContainerBoxPadding'][0]['mobile'][0], $settings['gContainerBoxPaddingUnit'] );
    $mobile_css->add_property( 'margin-left',  '-' . $settings['gContainerBoxPadding'][0]['mobile'][3], $settings['gContainerBoxPaddingUnit'] );
    $mobile_css->add_property( 'margin-right',  '-' . $settings['gContainerBoxPadding'][0]['mobile'][1], $settings['gContainerBoxPaddingUnit'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap  > .spc-product-image img' );
    $mobile_css->add_property( 'border-top-left-radius', $settings['gContainerBoxBR'][0]['mobile'][3] . $settings['gContainerBoxBRUnit'] );
    $mobile_css->add_property( 'border-top-right-radius', $settings['gContainerBoxBR'][0]['mobile'][1] . $settings['gContainerBoxBRUnit'] );

    // Title style
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title' );
    $mobile_css->add_property( 'font-size', $settings['productTitleFontSizeMobile'] . $settings['productTitleFontSizeType'] );
    $mobile_css->add_property( 'margin', $settings['productTitleMargin'][0]['mobile'][0] . $settings['productTitleMarginUnit'] . ' ' . $settings['productTitleMargin'][0]['mobile'][1] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['mobile'][2] . $settings['productTitleMarginUnit']  . ' ' . $settings['productTitleMargin'][0]['mobile'][3] . $settings['productTitleMarginUnit'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-title a' );
    $mobile_css->add_property( 'font-size', $settings['productTitleFontSizeMobile'] . $settings['productTitleFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['productTitleLineHeightMobile'] . $settings['productTitleLineHeightType'] );

    //QuickView
    if ( true === $settings['displayQuickView'] ) {
        $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn' );
        $mobile_css->add_property( 'font-size', $settings['gQuickViewFontSizeMobile'] . $settings['gQuickViewFontSizeType'] );
        $mobile_css->add_property( 'line-height', $settings['gQuickViewLineHeightMobile'] . $settings['gQuickViewLineHeightType'] );
        $mobile_css->add_property( 'padding', $settings['gQuickViewPadding'][0]['mobile'][0] . $settings['gQuickViewPaddingUnit'] . ' ' . $settings['gQuickViewPadding'][0]['mobile'][1] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['mobile'][2] . $settings['gQuickViewPaddingUnit']  . ' ' . $settings['gQuickViewPadding'][0]['mobile'][3] . $settings['gQuickViewPaddingUnit'] );
        $mobile_css->add_property( 'border-radius', $settings['gQuickViewBR'][0]['mobile'][0] . $settings['gQuickViewBRUnit'] . ' ' . $settings['gQuickViewBR'][0]['mobile'][1] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['mobile'][2] . $settings['gQuickViewBRUnit']  . ' ' . $settings['gQuickViewBR'][0]['mobile'][3] . $settings['gQuickViewBRUnit'] );

        $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .quickview-wrapper a.spc-product-quickview-btn .dashicons' );
        $mobile_css->add_property( 'font-size', $settings['gQuickViewFontSizeMobile'] . $settings['gQuickViewFontSizeType'] );
        $mobile_css->add_property( 'line-height', $settings['gQuickViewLineHeightMobile'] . $settings['gQuickViewLineHeightType'] );
    }

    //Taxonomy
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy' );
    $mobile_css->add_property( 'margin', $settings['productTaxonomyMargin'][0]['mobile'][0] . $settings['productTaxonomyMarginUnit'] . ' ' . $settings['productTaxonomyMargin'][0]['mobile'][1] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['mobile'][2] . $settings['productTaxonomyMarginUnit']  . ' ' . $settings['productTaxonomyMargin'][0]['mobile'][3] . $settings['productTaxonomyMarginUnit'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy span' );
    $mobile_css->add_property( 'font-size', $settings['productTaxonomyFontSizeMobile'] . $settings['productTaxonomyFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['productTaxonomyLineHeightMobile'] . $settings['productTaxonomyLineHeightType'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-taxonomy a' );
    $mobile_css->add_property( 'font-size', $settings['productTaxonomyFontSizeMobile'] . $settings['productTaxonomyFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['productTaxonomyLineHeightMobile'] . $settings['productTaxonomyLineHeightType'] );
    
    //Rating
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-rating' );
    $mobile_css->add_property( 'margin', $settings['ratingMargin'][0]['mobile'][0] . $settings['ratingMarginUnit'] . ' ' . $settings['ratingMargin'][0]['mobile'][1] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['mobile'][2] . $settings['ratingMarginUnit']  . ' ' . $settings['ratingMargin'][0]['mobile'][3] . $settings['ratingMarginUnit'] );

    //price
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price' );
    $mobile_css->add_property( 'font-size', $settings['productPriceFontSizeMobile'] . $settings['productPriceFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['productPriceLineHeightMobile'] . $settings['productPriceLineHeightType'] );
    $mobile_css->add_property( 'margin', $settings['productPriceMargin'][0]['mobile'][0] . $settings['productPriceMarginUnit'] . ' ' . $settings['productPriceMargin'][0]['mobile'][1] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['mobile'][2] . $settings['productPriceMarginUnit']  . ' ' . $settings['productPriceMargin'][0]['mobile'][3] . $settings['productPriceMarginUnit'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-product-price del' );
    $mobile_css->add_property( 'font-size', $settings['productPriceDelFontSize'][0]['mobile'] . $settings['productPriceDelFontSizeUnit']);

    //excerpt
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-post-excerpt' );
    $mobile_css->add_property( 'font-size', $settings['productExcerptFontSizeMobile'] . $settings['productExcerptFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['productExcerptLineHeightMobile'] . $settings['productExcerptLineHeightType'] );
    $mobile_css->add_property( 'margin', $settings['productExcerptMargin'][0]['mobile'][0] . $settings['productExcerptMarginUnit'] . ' ' . $settings['productExcerptMargin'][0]['mobile'][1] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['mobile'][2] . $settings['productExcerptMarginUnit']  . ' ' . $settings['productExcerptMargin'][0]['mobile'][3] . $settings['productExcerptMarginUnit'] );
    //btn 
    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper' );
    $mobile_css->add_property( 'margin', $settings['addToCartbtnMargin'][0]['mobile'][0] . $settings['addToCartbtnMarginUnit'] . ' ' . $settings['addToCartbtnMargin'][0]['mobile'][1] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['mobile'][2] . $settings['addToCartbtnMarginUnit']  . ' ' . $settings['addToCartbtnMargin'][0]['mobile'][3] . $settings['addToCartbtnMarginUnit'] );

    $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-woo-product-inner-wrap .spc-button-wrapper a' );
    $mobile_css->add_property( 'font-size', $settings['addToCartbtnFontSizeMobile'] . $settings['addToCartbtnFontSizeType'] );
    $mobile_css->add_property( 'line-height', $settings['addToCartbtnLineHeightMobile'] . $settings['addToCartbtnLineHeightType'] );
    $mobile_css->add_property( 'padding', $settings['addToCartbtnPadding'][0]['mobile'][0] . $settings['addToCartbtnPaddingUnit'] . ' ' . $settings['addToCartbtnPadding'][0]['mobile'][1] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['mobile'][2] . $settings['addToCartbtnPaddingUnit']  . ' ' . $settings['addToCartbtnPadding'][0]['mobile'][3] . $settings['addToCartbtnPaddingUnit'] );
    $mobile_css->add_property( 'border-radius', $settings['addToCartbtnBR'][0]['mobile'][0] . $settings['addToCartbtnBRUnit'] . ' ' . $settings['addToCartbtnBR'][0]['mobile'][1] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['mobile'][2] . $settings['addToCartbtnBRUnit']  . ' ' . $settings['addToCartbtnBR'][0]['mobile'][3] . $settings['addToCartbtnBRUnit'] );

    if ( true === $settings['displayProductPagination'] ) {
        $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap' );
        $mobile_css -> add_property('margin', $settings['productPaginationPGMargin'][0]['mobile'][0].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['mobile'][1].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['mobile'][2].$settings['productPaginationPGMarginUnit']. ' '.$settings['productPaginationPGMargin'][0]['mobile'][3].$settings['productPaginationPGMarginUnit']);

        $mobile_css->set_selector( '.wp-block-spc-woo-product' . $selector . ' .spc-product-pagination-wrap .page-numbers' );
        $mobile_css->add_property( 'padding', $settings['productPaginationPGPadding'][0]['mobile'][0] . $settings['productPaginationPGPaddingUnit'] . ' ' . $settings['productPaginationPGPadding'][0]['mobile'][1] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['mobile'][2] . $settings['productPaginationPGPaddingUnit']  . ' ' . $settings['productPaginationPGPadding'][0]['mobile'][3] . $settings['productPaginationPGPaddingUnit'] );
        $mobile_css->add_property( 'border-radius', $settings['productPaginationPGBR'][0]['mobile'][0] . $settings['productPaginationPGBRUnit'] . ' ' . $settings['productPaginationPGBR'][0]['mobile'][1] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['mobile'][2] . $settings['productPaginationPGBRUnit']  . ' ' . $settings['productPaginationPGBR'][0]['mobile'][3] . $settings['productPaginationPGBRUnit'] );
    }

    if ( true === $settings['loadMoreProduct'] ) {
        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn' );
        $mobile_css->add_property( 'margin', $settings['gButtonMargin'][0]['mobile'][0] . $settings['gButtonMarginUnit'] . ' ' . $settings['gButtonMargin'][0]['mobile'][1] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['mobile'][2] . $settings['gButtonMarginUnit']  . ' ' . $settings['gButtonMargin'][0]['mobile'][3] . $settings['gButtonMarginUnit'] );

        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-woo-product-load-btn .spc-woo-product-loadmore-btn' );
        $mobile_css->add_property( 'padding', $settings['gButtonPadding'][0]['mobile'][0] . $settings['gButtonPaddingUnit'] . ' ' . $settings['gButtonPadding'][0]['mobile'][1] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['mobile'][2] . $settings['gButtonPaddingUnit']  . ' ' . $settings['gButtonPadding'][0]['mobile'][3] . $settings['gButtonPaddingUnit'] );
        $mobile_css -> add_property('border-radius', $settings['gButtonBR'][0]['mobile'][0].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['mobile'][1].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['mobile'][2].$settings['gButtonBRUnit']. ' '.$settings['gButtonBR'][0]['mobile'][3].$settings['gButtonBRUnit']);
    }

        
    if( "carousel" === $settings['displayLayoutType'] && true === $settings['productCarouselPagination'] ) {
        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperDotsBR'][0]['mobile'][0].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['mobile'][1].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['mobile'][2].$settings['gSwiperDotsBRUnit']. ' '.$settings['gSwiperDotsBR'][0]['mobile'][3].$settings['gSwiperDotsBRUnit']);

        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-swiper-pagination .swiper-pagination-bullet-active' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperDotsBRH'][0]['mobile'][0].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['mobile'][1].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['mobile'][2].$settings['gSwiperDotsBRHUnit']. ' '.$settings['gSwiperDotsBRH'][0]['mobile'][3].$settings['gSwiperDotsBRHUnit']);

        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['mobile'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['mobile'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['mobile'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['mobile'][3].$settings['gSwiperArrowsBRUnit']);
   
        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperArrowsBR'][0]['desk'][0].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][1].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][2].$settings['gSwiperArrowsBRUnit']. ' '.$settings['gSwiperArrowsBR'][0]['desk'][3].$settings['gSwiperArrowsBRUnit']);

        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-prev:hover' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['mobile'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][3].$settings['gSwiperArrowsBRHUnit']);
     
        $mobile_css->set_selector( '.spc-woo-product-wrapper' . $selector . ' .spc-nav-wrapper .spc-carousel-nav-next:hover' );
        $mobile_css -> add_property('border-radius', $settings['gSwiperArrowsBRH'][0]['mobile'][0].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][1].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][2].$settings['gSwiperArrowsBRHUnit']. ' '.$settings['gSwiperArrowsBRH'][0]['mobile'][3].$settings['gSwiperArrowsBRHUnit']);
    }

    /**
     * Do shopcred_block_css_data hook
     *
     * @since 1.0.0
     *
     * @param string $name The name of our block.
     * @param array  $settings The settings for the current block.
     * @param object $css Our desktop/main CSS data.
     * @param object $desktop_css Our desktop only CSS data.
     * @param object $tablet_css Our tablet CSS data.
     * @param object $tablet_only_css Our tablet only CSS data.
     * @param object $mobile_css Our mobile CSS data.
     */
    do_action(
        'shopcred_block_css_data',
        $name,
        $settings,
        $css,
        $desktop_css,
        $tablet_css,
        $tablet_only_css,
        $mobile_css
    );
}

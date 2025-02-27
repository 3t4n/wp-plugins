<?php
if($fastspring_options['fastspring_loadfontawesome'] == 'yes') {
	wp_enqueue_style('fsb_fontawesome', plugins_url('../public/css/awesome.css', __FILE__) );
}
if(isset($fastspring_options['fastspring_cssclass'])) {
	echo '<style>';
	echo $fastspring_options['fastspring_cssclass'];
	echo 'a.removeText { color: ' . $fastspring_options['fastspring_delete_iconcolor'] . ';}';
	echo 'a.removeText:hover { color: ' . $fastspring_options['fastspring_delete_iconcolorhover'] . ';}';
	echo 'p.text-success {color: ' . $fastspring_options['fastspring_free_text_color'] . ';}';
	echo '</style>';
}
?>
<script>
	fastspring_options = {
		enableTranslations: "<?php echo $fastspring_options['fastspring_translations'];?>",
		loadFA: false, 
		enableGA: "<?php echo $fastspring_options['fastspring_enableGADecorate'];?>",
		enableCart: true,
		cartType:"<?php echo $fastspring_options['fastspring_cart_location'];?>",
		showPromo:"<?php echo $fastspring_options['fastspring_show_coupon'];?>", 
		applyCouponButtonClass:"<?php echo $fastspring_options['fastspring_coupon_class'];?>", 
		checkoutButtonClass:"<?php echo $fastspring_options['fastspring_coclass'];?>", 
		crossSellButtonClass:"<?php echo $fastspring_options['fastspring_xsclass'];?>", 
		upSellButtonClass:"<?php echo $fastspring_options['fastspring_usclass'];?>", 
		edsButtonClass:"<?php echo $fastspring_options['fastspring_edsclass'];?>", 
		removeIcon: "<?php echo $fastspring_options['fastspring_delete_icon'];?>",
		applyCouponButtonIcon:"<?php echo $fastspring_options['fastspring_apply_icon'];?>", 
		checkoutButtonIcon:"<?php echo $fastspring_options['fastspring_coicon'];?>",
		crossSellButtonIcon:"<?php echo $fastspring_options['fastspring_xsicon'];?>",
		upSellButtonIcon:"<?php echo $fastspring_options['fastspring_usicon'];?>",
		edsButtonIcon:"<?php echo $fastspring_options['fastspring_edsicon'];?>", 
		enableMiniCart:"<?php echo $fastspring_options['fastspring_enablemini'];?>", 
		miniCartLocation: "<?php echo $fastspring_options['fastspring_mininotificationlocation'];?>",
		miniCartIcon: "<?php echo $fastspring_options['fastspring_mininotificationicon'];?>",
		miniCartBubbleColor: "<?php echo $fastspring_options['fastspring_mininotificationcolor'];?>", 
		cartHeaderBGColor: "<?php echo $fastspring_options['fastspring_header_color'];?>", 
		cartHeaderTextColor: "<?php echo $fastspring_options['fastspring_header_text_color'];?>", 
		popupClosedRedirectURL: "<?php echo $fastspring_options['fastspring_thankyou_page'];?>", 
		miniCartCheckoutBGColor: "<?php echo $fastspring_options['fastspring_header_color'];?>",
		miniCartCheckoutBGColorHover:"<?php echo adjustBrightness($fastspring_options['fastspring_header_color'], -40);?>",
		miniCartCheckoutTextColor:"<?php echo $fastspring_options['fastspring_header_text_color'];?>",
		miniCartCheckoutTextColorHover:"<?php echo $fastspring_options['fastspring_header_text_color'];?>",
		popupClosedRedirectParameter: "<?php echo $fastspring_options['fastspring_thankyou_parameter'];?>",
		translations: { 	
			en: {
				<?php if($fastspring_options['fastspring_applyCouponText_en'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_en']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_en'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_en']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_en'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_en']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_en'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_en']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_en'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_en']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_en'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_en']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_en'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_en']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_en'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_en']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_en'] != $GLOBALS['translationDefaults']['fastspring_dayText_en']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_en'] != $GLOBALS['translationDefaults']['fastspring_daysText_en']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_en'] != $GLOBALS['translationDefaults']['fastspring_edsText_en']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_en'] != $GLOBALS['translationDefaults']['fastspring_freeText_en']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_en'] != $GLOBALS['translationDefaults']['fastspring_monthText_en']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_en'] != $GLOBALS['translationDefaults']['fastspring_monthsText_en']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_en'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_en']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_en'] != $GLOBALS['translationDefaults']['fastspring_onText_en']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_en'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_en']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_en'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_en']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_en'] != $GLOBALS['translationDefaults']['fastspring_removeText_en']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_en'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_en']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_en'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_en']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_en'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_en']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_en'] != $GLOBALS['translationDefaults']['fastspring_shippingText_en']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_en'] != $GLOBALS['translationDefaults']['fastspring_upSellText_en']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_en'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_en']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_en'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_en'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_en']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_en'] != $GLOBALS['translationDefaults']['fastspring_weekText_en']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_en'] != $GLOBALS['translationDefaults']['fastspring_weeksText_en']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_en'] != $GLOBALS['translationDefaults']['fastspring_yearText_en']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_en'] != $GLOBALS['translationDefaults']['fastspring_yearsText_en']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_en'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_en'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_en']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_en'];?>",<?php } ?>
			}, 
			da: {
				<?php if($fastspring_options['fastspring_applyCouponText_da'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_da']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_da'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_da']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_da'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_da']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_da'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_da']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_da'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_da']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_da'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_da']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_da'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_da']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_da'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_da']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_da'] != $GLOBALS['translationDefaults']['fastspring_dayText_da']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_da'] != $GLOBALS['translationDefaults']['fastspring_daysText_da']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_da'] != $GLOBALS['translationDefaults']['fastspring_edsText_da']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_da'] != $GLOBALS['translationDefaults']['fastspring_freeText_da']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_da'] != $GLOBALS['translationDefaults']['fastspring_monthText_da']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_da'] != $GLOBALS['translationDefaults']['fastspring_monthsText_da']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_da'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_da']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_da'] != $GLOBALS['translationDefaults']['fastspring_onText_da']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_da'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_da']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_da'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_da']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_da'] != $GLOBALS['translationDefaults']['fastspring_removeText_da']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_da'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_da']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_da'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_da']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_da'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_da']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_da'] != $GLOBALS['translationDefaults']['fastspring_shippingText_da']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_da'] != $GLOBALS['translationDefaults']['fastspring_upSellText_da']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_da'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_da']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_da'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_da'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_da']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_da'] != $GLOBALS['translationDefaults']['fastspring_weekText_da']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_da'] != $GLOBALS['translationDefaults']['fastspring_weeksText_da']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_da'] != $GLOBALS['translationDefaults']['fastspring_yearText_da']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_da'] != $GLOBALS['translationDefaults']['fastspring_yearsText_da']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_da'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_da'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_da']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_da'];?>",<?php } ?>
			}, 
			de: {
				<?php if($fastspring_options['fastspring_applyCouponText_de'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_de']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_de'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_de']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_de'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_de']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_de'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_de']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_de'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_de']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_de'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_de']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_de'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_de']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_de'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_de']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_de'] != $GLOBALS['translationDefaults']['fastspring_dayText_de']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_de'] != $GLOBALS['translationDefaults']['fastspring_daysText_de']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_de'] != $GLOBALS['translationDefaults']['fastspring_edsText_de']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_de'] != $GLOBALS['translationDefaults']['fastspring_freeText_de']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_de'] != $GLOBALS['translationDefaults']['fastspring_monthText_de']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_de'] != $GLOBALS['translationDefaults']['fastspring_monthsText_de']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_de'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_de']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_de'] != $GLOBALS['translationDefaults']['fastspring_onText_de']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_de'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_de']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_de'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_de']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_de'] != $GLOBALS['translationDefaults']['fastspring_removeText_de']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_de'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_de']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_de'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_de']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_de'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_de']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_de'] != $GLOBALS['translationDefaults']['fastspring_shippingText_de']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_de'] != $GLOBALS['translationDefaults']['fastspring_upSellText_de']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_de'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_de']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_de'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_de'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_de']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_de'] != $GLOBALS['translationDefaults']['fastspring_weekText_de']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_de'] != $GLOBALS['translationDefaults']['fastspring_weeksText_de']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_de'] != $GLOBALS['translationDefaults']['fastspring_yearText_de']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_de'] != $GLOBALS['translationDefaults']['fastspring_yearsText_de']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_de'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_de'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_de']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_de'];?>",<?php } ?>
			}, 
			es: {
				<?php if($fastspring_options['fastspring_applyCouponText_es'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_es']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_es'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_es']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_es'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_es']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_es'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_es']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_es'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_es']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_es'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_es']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_es'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_es']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_es'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_es']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_es'] != $GLOBALS['translationDefaults']['fastspring_dayText_es']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_es'] != $GLOBALS['translationDefaults']['fastspring_daysText_es']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_es'] != $GLOBALS['translationDefaults']['fastspring_edsText_es']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_es'] != $GLOBALS['translationDefaults']['fastspring_freeText_es']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_es'] != $GLOBALS['translationDefaults']['fastspring_monthText_es']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_es'] != $GLOBALS['translationDefaults']['fastspring_monthsText_es']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_es'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_es']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_es'] != $GLOBALS['translationDefaults']['fastspring_onText_es']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_es'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_es']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_es'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_es']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_es'] != $GLOBALS['translationDefaults']['fastspring_removeText_es']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_es'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_es']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_es'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_es']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_es'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_es']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_es'] != $GLOBALS['translationDefaults']['fastspring_shippingText_es']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_es'] != $GLOBALS['translationDefaults']['fastspring_upSellText_es']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_es'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_es']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_es'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_es'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_es']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_es'] != $GLOBALS['translationDefaults']['fastspring_weekText_es']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_es'] != $GLOBALS['translationDefaults']['fastspring_weeksText_es']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_es'] != $GLOBALS['translationDefaults']['fastspring_yearText_es']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_es'] != $GLOBALS['translationDefaults']['fastspring_yearsText_es']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_es'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_es'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_es']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_es'];?>",<?php } ?>
			}, 
			fi: {
				<?php if($fastspring_options['fastspring_applyCouponText_fi'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_fi']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_fi'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_fi']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_fi'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_fi']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_fi'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_fi']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_fi'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_fi']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_fi'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_fi']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_fi'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_fi']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_fi'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_fi']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_fi'] != $GLOBALS['translationDefaults']['fastspring_dayText_fi']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_fi'] != $GLOBALS['translationDefaults']['fastspring_daysText_fi']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_fi'] != $GLOBALS['translationDefaults']['fastspring_edsText_fi']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_fi'] != $GLOBALS['translationDefaults']['fastspring_freeText_fi']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_fi'] != $GLOBALS['translationDefaults']['fastspring_monthText_fi']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_fi'] != $GLOBALS['translationDefaults']['fastspring_monthsText_fi']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_fi'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_fi']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_fi'] != $GLOBALS['translationDefaults']['fastspring_onText_fi']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_fi'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_fi']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_fi'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_fi']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_fi'] != $GLOBALS['translationDefaults']['fastspring_removeText_fi']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_fi'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_fi']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_fi'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_fi']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_fi'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_fi']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_fi'] != $GLOBALS['translationDefaults']['fastspring_shippingText_fi']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_fi'] != $GLOBALS['translationDefaults']['fastspring_upSellText_fi']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_fi'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_fi']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_fi'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_fi'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_fi']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_fi'] != $GLOBALS['translationDefaults']['fastspring_weekText_fi']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_fi'] != $GLOBALS['translationDefaults']['fastspring_weeksText_fi']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_fi'] != $GLOBALS['translationDefaults']['fastspring_yearText_fi']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_fi'] != $GLOBALS['translationDefaults']['fastspring_yearsText_fi']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_fi'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_fi'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_fi']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_fi'];?>",<?php } ?>
			}, 
			fr: {
				<?php if($fastspring_options['fastspring_applyCouponText_fr'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_fr']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_fr'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_fr']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_fr'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_fr']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_fr'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_fr']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_fr'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_fr']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_fr'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_fr']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_fr'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_fr']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_fr'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_fr']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_fr'] != $GLOBALS['translationDefaults']['fastspring_dayText_fr']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_fr'] != $GLOBALS['translationDefaults']['fastspring_daysText_fr']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_fr'] != $GLOBALS['translationDefaults']['fastspring_edsText_fr']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_fr'] != $GLOBALS['translationDefaults']['fastspring_freeText_fr']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_fr'] != $GLOBALS['translationDefaults']['fastspring_monthText_fr']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_fr'] != $GLOBALS['translationDefaults']['fastspring_monthsText_fr']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_fr'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_fr']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_fr'] != $GLOBALS['translationDefaults']['fastspring_onText_fr']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_fr'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_fr']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_fr'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_fr']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_fr'] != $GLOBALS['translationDefaults']['fastspring_removeText_fr']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_fr'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_fr']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_fr'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_fr']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_fr'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_fr']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_fr'] != $GLOBALS['translationDefaults']['fastspring_shippingText_fr']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_fr'] != $GLOBALS['translationDefaults']['fastspring_upSellText_fr']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_fr'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_fr']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_fr'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_fr'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_fr']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_fr'] != $GLOBALS['translationDefaults']['fastspring_weekText_fr']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_fr'] != $GLOBALS['translationDefaults']['fastspring_weeksText_fr']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_fr'] != $GLOBALS['translationDefaults']['fastspring_yearText_fr']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_fr'] != $GLOBALS['translationDefaults']['fastspring_yearsText_fr']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_fr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_fr'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_fr']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_fr'];?>",<?php } ?>
			}, 
			hr: {
				<?php if($fastspring_options['fastspring_applyCouponText_hr'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_hr']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_hr'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_hr']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_hr'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_hr']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_hr'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_hr']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_hr'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_hr']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_hr'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_hr']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_hr'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_hr']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_hr'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_hr']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_hr'] != $GLOBALS['translationDefaults']['fastspring_dayText_hr']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_hr'] != $GLOBALS['translationDefaults']['fastspring_daysText_hr']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_hr'] != $GLOBALS['translationDefaults']['fastspring_edsText_hr']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_hr'] != $GLOBALS['translationDefaults']['fastspring_freeText_hr']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_hr'] != $GLOBALS['translationDefaults']['fastspring_monthText_hr']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_hr'] != $GLOBALS['translationDefaults']['fastspring_monthsText_hr']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_hr'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_hr']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_hr'] != $GLOBALS['translationDefaults']['fastspring_onText_hr']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_hr'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_hr']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_hr'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_hr']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_hr'] != $GLOBALS['translationDefaults']['fastspring_removeText_hr']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_hr'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_hr']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_hr'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_hr']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_hr'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_hr']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_hr'] != $GLOBALS['translationDefaults']['fastspring_shippingText_hr']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_hr'] != $GLOBALS['translationDefaults']['fastspring_upSellText_hr']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_hr'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_hr']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_hr'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_hr'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_hr']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_hr'] != $GLOBALS['translationDefaults']['fastspring_weekText_hr']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_hr'] != $GLOBALS['translationDefaults']['fastspring_weeksText_hr']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_hr'] != $GLOBALS['translationDefaults']['fastspring_yearText_hr']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_hr'] != $GLOBALS['translationDefaults']['fastspring_yearsText_hr']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_hr'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_hr'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_hr']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_hr'];?>",<?php } ?>
			}, 
			it: {
				<?php if($fastspring_options['fastspring_applyCouponText_it'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_it']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_it'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_it']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_it'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_it']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_it'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_it']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_it'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_it']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_it'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_it']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_it'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_it']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_it'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_it']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_it'] != $GLOBALS['translationDefaults']['fastspring_dayText_it']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_it'] != $GLOBALS['translationDefaults']['fastspring_daysText_it']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_it'] != $GLOBALS['translationDefaults']['fastspring_edsText_it']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_it'] != $GLOBALS['translationDefaults']['fastspring_freeText_it']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_it'] != $GLOBALS['translationDefaults']['fastspring_monthText_it']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_it'] != $GLOBALS['translationDefaults']['fastspring_monthsText_it']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_it'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_it']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_it'] != $GLOBALS['translationDefaults']['fastspring_onText_it']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_it'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_it']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_it'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_it']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_it'] != $GLOBALS['translationDefaults']['fastspring_removeText_it']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_it'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_it']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_it'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_it']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_it'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_it']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_it'] != $GLOBALS['translationDefaults']['fastspring_shippingText_it']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_it'] != $GLOBALS['translationDefaults']['fastspring_upSellText_it']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_it'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_it']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_it'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_it'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_it']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_it'] != $GLOBALS['translationDefaults']['fastspring_weekText_it']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_it'] != $GLOBALS['translationDefaults']['fastspring_weeksText_it']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_it'] != $GLOBALS['translationDefaults']['fastspring_yearText_it']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_it'] != $GLOBALS['translationDefaults']['fastspring_yearsText_it']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_it'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_it'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_it']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_it'];?>",<?php } ?>
			}, 
			ja: {
				<?php if($fastspring_options['fastspring_applyCouponText_ja'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_ja']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_ja'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_ja']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_ja'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_ja']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_ja'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ja']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_ja'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_ja']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_ja'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ja']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_ja'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_ja']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_ja'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ja']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_ja'] != $GLOBALS['translationDefaults']['fastspring_dayText_ja']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_ja'] != $GLOBALS['translationDefaults']['fastspring_daysText_ja']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_ja'] != $GLOBALS['translationDefaults']['fastspring_edsText_ja']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_ja'] != $GLOBALS['translationDefaults']['fastspring_freeText_ja']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_ja'] != $GLOBALS['translationDefaults']['fastspring_monthText_ja']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_ja'] != $GLOBALS['translationDefaults']['fastspring_monthsText_ja']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_ja'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_ja']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_ja'] != $GLOBALS['translationDefaults']['fastspring_onText_ja']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_ja'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ja']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_ja'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_ja']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_ja'] != $GLOBALS['translationDefaults']['fastspring_removeText_ja']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_ja'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ja']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_ja'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ja']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_ja'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ja']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_ja'] != $GLOBALS['translationDefaults']['fastspring_shippingText_ja']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_ja'] != $GLOBALS['translationDefaults']['fastspring_upSellText_ja']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_ja'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ja']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_ja'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_ja'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ja']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_ja'] != $GLOBALS['translationDefaults']['fastspring_weekText_ja']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_ja'] != $GLOBALS['translationDefaults']['fastspring_weeksText_ja']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_ja'] != $GLOBALS['translationDefaults']['fastspring_yearText_ja']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_ja'] != $GLOBALS['translationDefaults']['fastspring_yearsText_ja']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_ja'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_ja'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_ja']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_ja'];?>",<?php } ?>
			}, 
			ko: {
				<?php if($fastspring_options['fastspring_applyCouponText_ko'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_ko']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_ko'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_ko']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_ko'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_ko']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_ko'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ko']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_ko'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_ko']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_ko'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ko']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_ko'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_ko']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_ko'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ko']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_ko'] != $GLOBALS['translationDefaults']['fastspring_dayText_ko']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_ko'] != $GLOBALS['translationDefaults']['fastspring_daysText_ko']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_ko'] != $GLOBALS['translationDefaults']['fastspring_edsText_ko']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_ko'] != $GLOBALS['translationDefaults']['fastspring_freeText_ko']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_ko'] != $GLOBALS['translationDefaults']['fastspring_monthText_ko']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_ko'] != $GLOBALS['translationDefaults']['fastspring_monthsText_ko']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_ko'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_ko']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_ko'] != $GLOBALS['translationDefaults']['fastspring_onText_ko']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_ko'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ko']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_ko'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_ko']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_ko'] != $GLOBALS['translationDefaults']['fastspring_removeText_ko']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_ko'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ko']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_ko'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ko']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_ko'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ko']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_ko'] != $GLOBALS['translationDefaults']['fastspring_shippingText_ko']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_ko'] != $GLOBALS['translationDefaults']['fastspring_upSellText_ko']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_ko'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ko']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_ko'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_ko'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ko']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_ko'] != $GLOBALS['translationDefaults']['fastspring_weekText_ko']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_ko'] != $GLOBALS['translationDefaults']['fastspring_weeksText_ko']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_ko'] != $GLOBALS['translationDefaults']['fastspring_yearText_ko']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_ko'] != $GLOBALS['translationDefaults']['fastspring_yearsText_ko']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_ko'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_ko'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_ko']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_ko'];?>",<?php } ?>
			}, 
			nl: {
				<?php if($fastspring_options['fastspring_applyCouponText_nl'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_nl']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_nl'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_nl']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_nl'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_nl']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_nl'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_nl']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_nl'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_nl']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_nl'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_nl']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_nl'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_nl']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_nl'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_nl']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_nl'] != $GLOBALS['translationDefaults']['fastspring_dayText_nl']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_nl'] != $GLOBALS['translationDefaults']['fastspring_daysText_nl']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_nl'] != $GLOBALS['translationDefaults']['fastspring_edsText_nl']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_nl'] != $GLOBALS['translationDefaults']['fastspring_freeText_nl']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_nl'] != $GLOBALS['translationDefaults']['fastspring_monthText_nl']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_nl'] != $GLOBALS['translationDefaults']['fastspring_monthsText_nl']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_nl'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_nl']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_nl'] != $GLOBALS['translationDefaults']['fastspring_onText_nl']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_nl'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_nl']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_nl'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_nl']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_nl'] != $GLOBALS['translationDefaults']['fastspring_removeText_nl']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_nl'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_nl']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_nl'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_nl']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_nl'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_nl']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_nl'] != $GLOBALS['translationDefaults']['fastspring_shippingText_nl']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_nl'] != $GLOBALS['translationDefaults']['fastspring_upSellText_nl']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_nl'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_nl']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_nl'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_nl'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_nl']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_nl'] != $GLOBALS['translationDefaults']['fastspring_weekText_nl']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_nl'] != $GLOBALS['translationDefaults']['fastspring_weeksText_nl']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_nl'] != $GLOBALS['translationDefaults']['fastspring_yearText_nl']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_nl'] != $GLOBALS['translationDefaults']['fastspring_yearsText_nl']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_nl'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_nl'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_nl']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_nl'];?>",<?php } ?>
			}, 
			no: {
				<?php if($fastspring_options['fastspring_applyCouponText_no'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_no']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_no'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_no']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_no'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_no']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_no'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_no']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_no'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_no']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_no'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_no']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_no'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_no']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_no'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_no']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_no'] != $GLOBALS['translationDefaults']['fastspring_dayText_no']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_no'] != $GLOBALS['translationDefaults']['fastspring_daysText_no']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_no'] != $GLOBALS['translationDefaults']['fastspring_edsText_no']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_no'] != $GLOBALS['translationDefaults']['fastspring_freeText_no']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_no'] != $GLOBALS['translationDefaults']['fastspring_monthText_no']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_no'] != $GLOBALS['translationDefaults']['fastspring_monthsText_no']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_no'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_no']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_no'] != $GLOBALS['translationDefaults']['fastspring_onText_no']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_no'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_no']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_no'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_no']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_no'] != $GLOBALS['translationDefaults']['fastspring_removeText_no']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_no'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_no']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_no'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_no']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_no'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_no']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_no'] != $GLOBALS['translationDefaults']['fastspring_shippingText_no']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_no'] != $GLOBALS['translationDefaults']['fastspring_upSellText_no']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_no'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_no']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_no'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_no'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_no']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_no'] != $GLOBALS['translationDefaults']['fastspring_weekText_no']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_no'] != $GLOBALS['translationDefaults']['fastspring_weeksText_no']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_no'] != $GLOBALS['translationDefaults']['fastspring_yearText_no']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_no'] != $GLOBALS['translationDefaults']['fastspring_yearsText_no']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_no'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_no'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_no']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_no'];?>",<?php } ?>
			}, 
			pt: {
				<?php if($fastspring_options['fastspring_applyCouponText_pt'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_pt']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_pt'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_pt']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_pt'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_pt']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_pt'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_pt']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_pt'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_pt']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_pt'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_pt']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_pt'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_pt']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_pt'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_pt']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_pt'] != $GLOBALS['translationDefaults']['fastspring_dayText_pt']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_pt'] != $GLOBALS['translationDefaults']['fastspring_daysText_pt']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_pt'] != $GLOBALS['translationDefaults']['fastspring_edsText_pt']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_pt'] != $GLOBALS['translationDefaults']['fastspring_freeText_pt']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_pt'] != $GLOBALS['translationDefaults']['fastspring_monthText_pt']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_pt'] != $GLOBALS['translationDefaults']['fastspring_monthsText_pt']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_pt'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_pt']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_pt'] != $GLOBALS['translationDefaults']['fastspring_onText_pt']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_pt'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_pt']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_pt'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_pt']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_pt'] != $GLOBALS['translationDefaults']['fastspring_removeText_pt']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_pt'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_pt']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_pt'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_pt']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_pt'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_pt']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_pt'] != $GLOBALS['translationDefaults']['fastspring_shippingText_pt']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_pt'] != $GLOBALS['translationDefaults']['fastspring_upSellText_pt']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_pt'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_pt']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_pt'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_pt'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_pt']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_pt'] != $GLOBALS['translationDefaults']['fastspring_weekText_pt']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_pt'] != $GLOBALS['translationDefaults']['fastspring_weeksText_pt']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_pt'] != $GLOBALS['translationDefaults']['fastspring_yearText_pt']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_pt'] != $GLOBALS['translationDefaults']['fastspring_yearsText_pt']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_pt'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_pt'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_pt']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_pt'];?>",<?php } ?>
			}, 
			ru: {
				<?php if($fastspring_options['fastspring_applyCouponText_ru'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_ru']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_ru'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_ru']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_ru'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_ru']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_ru'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ru']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_ru'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_ru']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_ru'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ru']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_ru'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_ru']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_ru'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ru']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_ru'] != $GLOBALS['translationDefaults']['fastspring_dayText_ru']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_ru'] != $GLOBALS['translationDefaults']['fastspring_daysText_ru']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_ru'] != $GLOBALS['translationDefaults']['fastspring_edsText_ru']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_ru'] != $GLOBALS['translationDefaults']['fastspring_freeText_ru']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_ru'] != $GLOBALS['translationDefaults']['fastspring_monthText_ru']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_ru'] != $GLOBALS['translationDefaults']['fastspring_monthsText_ru']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_ru'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_ru']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_ru'] != $GLOBALS['translationDefaults']['fastspring_onText_ru']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_ru'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ru']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_ru'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_ru']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_ru'] != $GLOBALS['translationDefaults']['fastspring_removeText_ru']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_ru'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ru']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_ru'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ru']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_ru'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ru']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_ru'] != $GLOBALS['translationDefaults']['fastspring_shippingText_ru']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_ru'] != $GLOBALS['translationDefaults']['fastspring_upSellText_ru']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_ru'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ru']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_ru'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_ru'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ru']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_ru'] != $GLOBALS['translationDefaults']['fastspring_weekText_ru']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_ru'] != $GLOBALS['translationDefaults']['fastspring_weeksText_ru']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_ru'] != $GLOBALS['translationDefaults']['fastspring_yearText_ru']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_ru'] != $GLOBALS['translationDefaults']['fastspring_yearsText_ru']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_ru'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_ru'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_ru']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_ru'];?>",<?php } ?>
			}, 
			sv: {
				<?php if($fastspring_options['fastspring_applyCouponText_sv'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_sv']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_sv'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_sv']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_sv'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_sv']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_sv'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_sv']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_sv'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_sv']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_sv'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_sv']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_sv'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_sv']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_sv'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_sv']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_sv'] != $GLOBALS['translationDefaults']['fastspring_dayText_sv']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_sv'] != $GLOBALS['translationDefaults']['fastspring_daysText_sv']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_sv'] != $GLOBALS['translationDefaults']['fastspring_edsText_sv']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_sv'] != $GLOBALS['translationDefaults']['fastspring_freeText_sv']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_sv'] != $GLOBALS['translationDefaults']['fastspring_monthText_sv']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_sv'] != $GLOBALS['translationDefaults']['fastspring_monthsText_sv']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_sv'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_sv']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_sv'] != $GLOBALS['translationDefaults']['fastspring_onText_sv']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_sv'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_sv']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_sv'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_sv']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_sv'] != $GLOBALS['translationDefaults']['fastspring_removeText_sv']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_sv'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_sv']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_sv'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_sv']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_sv'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_sv']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_sv'] != $GLOBALS['translationDefaults']['fastspring_shippingText_sv']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_sv'] != $GLOBALS['translationDefaults']['fastspring_upSellText_sv']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_sv'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_sv']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_sv'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_sv'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_sv']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_sv'] != $GLOBALS['translationDefaults']['fastspring_weekText_sv']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_sv'] != $GLOBALS['translationDefaults']['fastspring_weeksText_sv']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_sv'] != $GLOBALS['translationDefaults']['fastspring_yearText_sv']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_sv'] != $GLOBALS['translationDefaults']['fastspring_yearsText_sv']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_sv'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_sv'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_sv']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_sv'];?>",<?php } ?>
			}, 
			zh: {
				<?php if($fastspring_options['fastspring_applyCouponText_zh'] != $GLOBALS['translationDefaults']['fastspring_applyCouponText_zh']) { ?>applyCouponText: "<?php echo $fastspring_options['fastspring_applyCouponText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_cartTitleText_zh'] != $GLOBALS['translationDefaults']['fastspring_cartTitleText_zh']) { ?>cartTitleText: "<?php echo $fastspring_options['fastspring_cartTitleText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_checkoutText_zh'] != $GLOBALS['translationDefaults']['fastspring_checkoutText_zh']) { ?>checkoutText: "<?php echo $fastspring_options['fastspring_checkoutText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_continueShoppingText_zh'] != $GLOBALS['translationDefaults']['fastspring_continueShoppingText_zh']) { ?>continueShoppingText: "<?php echo $fastspring_options['fastspring_continueShoppingText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponLabelText_zh'] != $GLOBALS['translationDefaults']['fastspring_couponLabelText_zh']) { ?>couponLabelText: "<?php echo $fastspring_options['fastspring_couponLabelText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_couponPlaceholderText_zh'] != $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_zh']) { ?>couponPlaceholderText: "<?php echo $fastspring_options['fastspring_couponPlaceholderText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellText_zh'] != $GLOBALS['translationDefaults']['fastspring_crossSellText_zh']) { ?>crossSellText: "<?php echo $fastspring_options['fastspring_crossSellText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_crossSellTitleText_zh'] != $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_zh']) { ?>crossSellTitleText: "<?php echo $fastspring_options['fastspring_crossSellTitleText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_dayText_zh'] != $GLOBALS['translationDefaults']['fastspring_dayText_zh']) { ?>dayText: "<?php echo $fastspring_options['fastspring_dayText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_daysText_zh'] != $GLOBALS['translationDefaults']['fastspring_daysText_zh']) { ?>daysText: "<?php echo $fastspring_options['fastspring_daysText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_edsText_zh'] != $GLOBALS['translationDefaults']['fastspring_edsText_zh']) { ?>edsText: "<?php echo $fastspring_options['fastspring_edsText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_freeText_zh'] != $GLOBALS['translationDefaults']['fastspring_freeText_zh']) { ?>freeText: "<?php echo $fastspring_options['fastspring_freeText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthText_zh'] != $GLOBALS['translationDefaults']['fastspring_monthText_zh']) { ?>monthText: "<?php echo $fastspring_options['fastspring_monthText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_monthsText_zh'] != $GLOBALS['translationDefaults']['fastspring_monthsText_zh']) { ?>monthsText: "<?php echo $fastspring_options['fastspring_monthsText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_nextChargeText_zh'] != $GLOBALS['translationDefaults']['fastspring_nextChargeText_zh']) { ?>nextChargeText: "<?php echo $fastspring_options['fastspring_nextChargeText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_onText_zh'] != $GLOBALS['translationDefaults']['fastspring_onText_zh']) { ?>onText: "<?php echo $fastspring_options['fastspring_onText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderEmptyText_zh'] != $GLOBALS['translationDefaults']['fastspring_orderEmptyText_zh']) { ?>orderEmptyText: "<?php echo $fastspring_options['fastspring_orderEmptyText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_orderTotalText_zh'] != $GLOBALS['translationDefaults']['fastspring_orderTotalText_zh']) { ?>orderTotalText: "<?php echo $fastspring_options['fastspring_orderTotalText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_removeText_zh'] != $GLOBALS['translationDefaults']['fastspring_removeText_zh']) { ?>removeText: "<?php echo $fastspring_options['fastspring_removeText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsEveryText_zh'] != $GLOBALS['translationDefaults']['fastspring_renewsEveryText_zh']) { ?>renewsEveryText: "<?php echo $fastspring_options['fastspring_renewsEveryText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAutomaticallyText_zh'] != $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_zh']) { ?>renewsAutomaticallyText: "<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_renewsAlongWithSubscriptionText_zh'] != $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_zh']) { ?>renewsAlongWithSubscriptionText: "<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_shippingText_zh'] != $GLOBALS['translationDefaults']['fastspring_shippingText_zh']) { ?>shippingText: "<?php echo $fastspring_options['fastspring_shippingText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_upSellText_zh'] != $GLOBALS['translationDefaults']['fastspring_upSellText_zh']) { ?>upSellText: "<?php echo $fastspring_options['fastspring_upSellText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_viewDetailsText_zh'] != $GLOBALS['translationDefaults']['fastspring_viewDetailsText_zh']) { ?>viewDetailsText: "<?php echo $fastspring_options['fastspring_viewDetailsText_zh'];?>",<?php } ?>	
				<?php if($fastspring_options['fastspring_volumeDiscountsAvailableText_zh'] != $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_zh']) { ?>volumeDiscountsAvailableText: "<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weekText_zh'] != $GLOBALS['translationDefaults']['fastspring_weekText_zh']) { ?>weekText: "<?php echo $fastspring_options['fastspring_weekText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_weeksText_zh'] != $GLOBALS['translationDefaults']['fastspring_weeksText_zh']) { ?>weeksText: "<?php echo $fastspring_options['fastspring_weeksText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearText_zh'] != $GLOBALS['translationDefaults']['fastspring_yearText_zh']) { ?>yearText: "<?php echo $fastspring_options['fastspring_yearText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_yearsText_zh'] != $GLOBALS['translationDefaults']['fastspring_yearsText_zh']) { ?>yearsText: "<?php echo $fastspring_options['fastspring_yearsText_zh'];?>",<?php } ?>
				<?php if($fastspring_options['fastspring_youSaveText_zh'] != $GLOBALS['translationDefaults']['fastspring_youSaveText_zh']) { ?>youSaveText: "<?php echo $fastspring_options['fastspring_youSaveText_zh'];?>",<?php } ?>
			}, 
			
		}
	};
	var cartlocation = '<?php echo $fastspring_options['fastspring_cart_location'];?>';
	function popupClosed(data) {
		var fsb_spinner=document.getElementById("fsb-spinner");
		fsb_spinner.style.animationName="fsb-revfadeIn";
		setTimeout(function(){
			fsb_spinner.style.animationName = "fsb-fadeIn";
			fsb_spinner.style.display = "none";
		},450);
		if (data) {
			fastspring.builder.reset();
			window.location.replace("<?php echo $fastspring_options['fastspring_thankyou_page']?>");
		} else {
			closeitall();
		}
	}
</script>

<?php
function adjustBrightness($hex, $steps) {
	$steps = max(-255, min(255, $steps));
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}
	$color_parts = str_split($hex, 2);
	$return = '#';
	foreach ($color_parts as $color) {
		$color   = hexdec($color); 
		$color   = max(0,min(255,$color + $steps)); 
		$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
	}
	return $return;
}
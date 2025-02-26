jQuery(document).ready(function($) {
	jQuery('.woocommerce_page_wc-settings').find('.fdoe_premium_option').parent('label').after('<span class="fdoe_premium_link" ><a  target="_blank" class="fdoe_premium_link_ref" href="http://foodonlineplugin.com/">Premium</a></span>');
	jQuery('.woocommerce_page_wc-settings').find('select.fdoe_premium_option').after('<span class="fdoe_premium_link" ><a  target="_blank" class="fdoe_premium_link_ref" href="http://foodonlineplugin.com/">Premium</a></span>');
	jQuery('.woocommerce_page_wc-settings').find('input.fdoe_premium_option').not("input:checkbox").not("input[type='time']").after('<span class="fdoe_premium_link" ><a  target="_blank" class="fdoe_premium_link_ref" href="http://foodonlineplugin.com/">Premium</a></span>');
	$('#fdoe_product_popup_content_spec option[value="rating_"], #fdoe_product_popup_content_spec option[value="desc_"]').prop('disabled', true);

	// Enables the color picker in settings page
	$('.fdoe-color-picker').wpColorPicker();
	$('.woocommerce').find('table').show();
	$('.woocommerce').find('h2').show();
	// Main Settings Tab

	if (fdoe_admin.bundle_active == 0) {
		$('#fdoe_popup_bundle').parents('tr').hide();
	}
	if (fdoe_admin.composite_active == 0) {
		$('#fdoe_popup_composite').parents('tr').hide();
	}
	if (!$('#fdoe_top_bar:checkbox').prop('checked')) {
		$('#fdoe_top_bar_info').parents('tr').hide();
	}
	$('#fdoe_top_bar:checkbox').change(function() {
		if (this.checked) {
			$('#fdoe_top_bar_info').parents('tr').fadeIn('slow');
		} else {
			$('#fdoe_top_bar_info').parents('tr').fadeOut('slow');
		}
	});
	if ($('#fdoe_popup_simple').find('option:selected').attr("value") !== 'yes' && $('#fdoe_popup_variable').find('option:selected').attr("value") !== 'yes' &&
		$('#fdoe_popup_grouped').find('option:selected').attr("value") !== 'popup' &&
		(fdoe_admin.bundle_active == 0 || (fdoe_admin.bundle_active == 1 && $('#fdoe_popup_bundle').find('option:selected').attr("value") !== 'popup')) &&
		(fdoe_admin.composite_active == 0 || (fdoe_admin.composite_active == 1 && $('#fdoe_popup_composite').find('option:selected').attr("value") !== 'popup'))) {
		$('#fdoe_product_popup_content').parents('tr').hide();
		$('#fdoe_product_popup_content_spec').parents('tr').hide();
	}
	$('#fdoe_popup_simple , #fdoe_popup_variable, #fdoe_popup_grouped, #fdoe_popup_bundle, #fdoe_popup_composite').change(function() {
		if ($(this).find('option:selected').attr("value") == 'yes' || $(this).find('option:selected').attr("value") == 'popup') {
			$('#fdoe_product_popup_content').parents('tr').fadeIn('slow');
			if ($('#fdoe_product_popup_content').find('option:selected').attr("value") == 'custom' || $(this).find('option:selected').attr("value") == 'style-1') {
				$('#fdoe_product_popup_content_spec').parents('tr').fadeIn('slow');
			}
		} else if ($('#fdoe_popup_simple').find('option:selected').attr("value") !== 'yes' && $('#fdoe_popup_variable').find('option:selected').attr("value") !== 'yes' &&
			$('#fdoe_popup_grouped').find('option:selected').attr("value") !== 'popup' &&
			(fdoe_admin.bundle_active == 0 || (fdoe_admin.bundle_active == 1 && $('#fdoe_popup_bundle').find('option:selected').attr("value") !== 'popup')) &&
			(fdoe_admin.composite_active == 0 || (fdoe_admin.composite_active == 1 && $('#fdoe_popup_composite').find('option:selected').attr("value") !== 'popup'))) {
			$('#fdoe_product_popup_content_spec').parents('tr').hide();
			$('#fdoe_product_popup_content').parents('tr').hide();
		}
	});
	if ($('#fdoe_product_popup_content').find('option:selected').attr("value") == 'theme') {
		$('#fdoe_product_popup_content_spec').parents('tr').hide();
	}
	$('#fdoe_product_popup_content').change(function() {
		if ($(this).find('option:selected').attr("value") == 'theme') {
			$('#fdoe_product_popup_content_spec').parents('tr').hide();
		} else if ($(this).find('option:selected').attr("value") == 'custom' || $(this).find('option:selected').attr("value") == 'style-1') {
			$('#fdoe_product_popup_content_spec').parents('tr').fadeIn('slow');
		}
	});
	if ($('#fdoe_minicart_style').find('option:selected').attr("value") == 'theme') {
		$('#fdoe_minicart_reverse_order').parents('tr').hide();
	}
	$('#fdoe_minicart_style').change(function() {
		if ($(this).find('option:selected').attr("value") == 'theme') {
			$('#fdoe_minicart_reverse_order').parents('tr').hide();
		} else {
			$('#fdoe_minicart_reverse_order').parents('tr').fadeIn('slow');
		}
	});


	// End of Main Settings Tab
	// Menu Layout & Styling Tab

	if ($('#fdoe_show_images').find('option:selected').attr("value") == 'hide') {
		$('#fdoe_image_size').parents('tr').hide();
	}
	$('#fdoe_show_images').change(function() {
		if ($(this).find('option:selected').attr("value") == 'hide') {
			$('#fdoe_image_size').parents('tr').slideUp();
		} else {
			$('#fdoe_image_size').parents('tr').slideDown('slow');
		}
	});




	if (!$('#fdoe_sticky_bar:checkbox').prop('checked')) {
		$('#fdoe_sticky_mobile').parents('tr').hide();
	}
	$('#fdoe_sticky_bar:checkbox').change(function() {
		if (this.checked) {
			$('#fdoe_sticky_mobile').parents('tr').fadeIn('slow');
		} else {
			$('#fdoe_sticky_mobile').parents('tr').fadeOut('slow');
		}
	});
	// End of Menu Layout & Styling Tab
	// Order Time Management Tab
	if ($('#fdoe_extratime_mode').find('option:selected').attr("value") == 'orders') {
		$('#fdoe_processing_cats').parents('tr').hide();
	}
	$('#fdoe_extratime_mode').change(function() {
		if ($(this).find('option:selected').attr("value") == 'orders') {
			$('#fdoe_processing_cats').parents('tr').fadeOut();
		} else if ($(this).find('option:selected').attr("value") == 'items') {
			$('#fdoe_processing_cats').parents('tr').fadeIn();
		}
	});
	// Preperation times
	if ($('#fdoe_preperation_time_mode').find('option:selected').attr("value") == 'dynamic') {
		$('#fdoe_pickup_fixed').parents('tr').hide();
		$('#fdoe_dynamic_preperation_table').show();
		$('#fdoe_dynamic_preperation_table').prevAll('h2:first').show();
	} else {
		$('#fdoe_preptime_order_item').parents('tr').hide();
		$('#fdoe_dynamic_preperation_table').hide();
		$('#fdoe_dynamic_preperation_table').prevAll('h2:first').hide();
	}
	$('#fdoe_preperation_time_mode').change(function() {
		if ($(this).find('option:selected').attr("value") == 'dynamic') {
			$('#fdoe_dynamic_preperation_table').fadeIn();
			$('#fdoe_preptime_order_item').parents('tr').fadeIn();
			$('#fdoe_dynamic_preperation_table').prevAll('h2:first').fadeIn();
			$('#fdoe_pickup_fixed').parents('tr').fadeOut();
		} else {
			$('#fdoe_preptime_order_item').parents('tr').fadeOut();
			$('#fdoe_dynamic_preperation_table').fadeOut();
			$('#fdoe_dynamic_preperation_table').prevAll('h2:first').fadeOut();
			$('#fdoe_pickup_fixed').parents('tr').fadeIn();
		}
	});
	// End of Order Time Management Tab
});

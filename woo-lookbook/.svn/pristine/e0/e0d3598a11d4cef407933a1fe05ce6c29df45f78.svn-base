jQuery(document).ready(function ($) {
	'use strict';
	if (location.hash.includes('access_token=')&&location.hash.includes('data_access_expiration_time')&&location.hash.includes('expires_in')){
		location.href = (new URL(location.href)).href.replace('#','&');
		return;
	}
	if ($('.vi-ui.tabular.menu').length) {
		$('.vi-ui.tabular.menu .item').vi_tab({history: true, historyType: 'hash'});
	}
	if ($('.vi-ui.accordion').length) {
		$('.vi-ui.accordion:not(.wlb-accordion-init)').addClass('wlb-accordion-init').vi_accordion('refresh');
	}
	$('.vi-ui.checkbox:not(.wlb-checkbox-init)').addClass('wlb-checkbox-init').off().checkbox();
	$('.vi-ui.dropdown:not(.wlb-dropdown-init)').addClass('wlb-dropdown-init').off().dropdown();
	/*Save Submit button*/
	$(document).on('click','.wlb-submit:not(loading)', function () {
		$(this).addClass('loading');
	});
	/*Color picker*/
	jQuery('.color-picker').iris({
		change: function (event, ui) {
			jQuery(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
			var ele = jQuery(this).data('ele');
			if (ele == 'highlight') {
				jQuery('#message-purchased').find('a').css({'color': ui.color.toString()});
			} else if (ele == 'textcolor') {
				jQuery('#message-purchased').css({'color': ui.color.toString()});
			} else {
				jQuery('#message-purchased').css({backgroundColor: ui.color.toString()});
			}
		},
		hide  : true,
		border: true
	}).on('click',function () {
		jQuery('.iris-picker').hide();
		jQuery(this).closest('td').find('.iris-picker').show();
	});

	$(document).on('click', 'body',function () {
		jQuery('.iris-picker').hide();
	});
	$(document).on('click', '.color-picker',function (event) {
		event.stopPropagation();
	});
});
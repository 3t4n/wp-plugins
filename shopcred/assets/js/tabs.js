/**
 * Tabs that can create an accordion for mobile.
 */
jQuery(function ($) {
	$('.spc-tabs-wrap').each(function (a) {
		var ktStartTab = $(this).find('> .spc-tabs-title-list .spc-tab-title-active a').attr('data-tab');
		var ktTabsList = $(this).find('> .spc-tabs-title-list').attr({
			role: 'tablist',
		});
		$(this).find('> .spc-tabs-content-wrap > .spc-tab-inner-content').attr({
			role: 'tabpanel',
			'aria-hidden': 'true',
		});
		$(this).find('> .spc-tabs-title-list a').each(function (b) {
			var tabId = $(this).attr('data-tab');
			var tabName = $(this).parent().attr('id');
			$(this).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-inner-tab-' + tabId).attr('aria-labelledby', tabName);
		});
		$(this).find('.spc-tabs-content-wrap > .spc-inner-tab-' + ktStartTab).attr('aria-hidden', 'false');
		$(this).find('> .spc-tabs-title-list li:not(.spc-tab-title-active) a').each(function () {
			$(this).attr({
				role: 'tab',
				'aria-selected': 'false',
				tabindex: '-1',
				'aria-controls': $(this).parent().attr('id'),
			}).parent().attr('role', 'presentation');
		});
		$(this).find('> .spc-tabs-title-list li.spc-tab-title-active a').attr({
			role: 'tab',
			'aria-selected': 'true',
			'aria-controls': $(this).find('> .spc-tabs-title-list li.spc-tab-title-active a').parent().attr('id'),
			tabindex: '0',
		}).parent().attr('role', 'presentation');
		$(ktTabsList).on('keydown', 'a', function (e) {
			switch (e.which) {
				case 37: case 38:
					if ($(this).parent().prev().length != 0) {
						$(this).parent().prev().find('> a').click();
					} else {
						$(ktTabsList).find('li:last > a').click();
					}
					break;
				case 39: case 40:
					if ($(this).parent().next().length != 0) {
						$(this).parent().next().find('> a').click();
					} else {
						$(ktTabsList).find('li:first > a').click();
					}
					break;
			}
		});
		var resizeEvent = window.document.createEvent('UIEvents');
		resizeEvent.initUIEvent('resize', true, false, window, 0);
		window.dispatchEvent(resizeEvent);
	});
	$('.spc-tabs-title-list li a').on('click', function (e) {
		e.preventDefault();
		var tabId = $(this).attr('data-tab');

		$(this).closest('.spc-tabs-title-list').find('.spc-tab-title-active')
			.addClass('spc-tab-title-inactive')
			.removeClass('spc-tab-title-active')
			.find('a.spc-tab-title').attr({
				tabindex: '-1',
				'aria-selected': 'false',
			});
		$(this).closest('.spc-tabs-wrap').removeClass(function (index, className) {
			return (className.match(/\bspc-active-tab-\S+/g) || []).join(' ');
		}).addClass('spc-active-tab-' + tabId);
		$(this).parent('li').addClass('spc-tab-title-active').removeClass('spc-tab-title-inactive');
		$(this).attr({
			tabindex: '0',
			'aria-selected': 'true',
		}).focus();
		$(this).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tab-inner-content:not(.spc-inner-tab-' + tabId + ')').attr('aria-hidden', 'true');
		$(this).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-inner-tab-' + tabId).attr('aria-hidden', 'false');
		$(this).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tabs-accordion-title:not(.spc-tabs-accordion-title-' + tabId + ')').addClass('spc-tab-title-inactive').removeClass('spc-tab-title-active').attr({
			tabindex: '-1',
			'aria-selected': 'false',
		});
		$(this).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tabs-accordion-title.spc-tabs-accordion-title-' + tabId).addClass('spc-tab-title-active').removeClass('spc-tab-title-inactive').attr({
			tabindex: '0',
			'aria-selected': 'true',
		});
		var resizeEvent = window.document.createEvent('UIEvents');
		resizeEvent.initUIEvent('resize', true, false, window, 0);
		window.dispatchEvent(resizeEvent);
		var tabEvent = window.document.createEvent('UIEvents');
		tabEvent.initUIEvent('spc-tabs-open', true, false, window, 0);
		window.dispatchEvent(tabEvent);
	});
	$('.spc-create-accordion').find('> .spc-tabs-title-list .spc-title-item').each(function () {
		var tabId = $(this).find('a').attr('data-tab');
		var activeclass;
		var iconclass;
		var iconsideclass;
		if ($(this).hasClass('spc-tab-title-active')) {
			activeclass = 'spc-tab-title-active';
		} else {
			activeclass = 'spc-tab-title-inactive';
		}
		if ($(this).hasClass('spc-tabs-svg-show-only')) {
			iconclass = 'spc-tabs-svg-show-only';
		} else {
			iconclass = 'spc-tabs-svg-show-always';
		}
		if ($(this).hasClass('spc-tabs-icon-side-top')) {
			iconsideclass = 'spc-tabs-icon-side-top';
		} else {
			iconsideclass = '';
		}
		$(this).closest('.spc-tabs-wrap').find('> .spc-tabs-content-wrap > .spc-inner-tab-' + tabId).before('<div class="spc-tabs-accordion-title spc-tabs-accordion-title-' + tabId + ' ' + activeclass + ' ' + iconclass + ' ' + iconsideclass + '">' + $(this).html() + '</div>');
		$(this).closest('.spc-tabs-wrap').find('> .spc-tabs-content-wrap > .spc-tabs-accordion-title-' + tabId + '  a').removeAttr('role');
	});
	$('.spc-tabs-accordion-title a').on('click', function (e) {
		e.preventDefault();
		var tabId = $(this).attr('data-tab');
		if ($(this).parent('.spc-tabs-accordion-title').hasClass('spc-tab-title-active')) {
			$(this).closest('.spc-tabs-wrap').removeClass('spc-active-tab-' + tabId);
			$(this).parent('.spc-tabs-accordion-title').removeClass('spc-tab-title-active').addClass('spc-tab-title-inactive');
		} else {
			// $( this ).closest( '.spc-tabs-wrap' ).find( '.spc-tab-title-active' )
			// 	.addClass( 'spc-tab-title-inactive' )
			// 	.removeClass( 'spc-tab-title-active' );
			// $( this ).closest( '.spc-tabs-wrap' ).removeClass( function( index, className ) {
			// 	return ( className.match( /\bspc-active-tab-\S+/g ) || [] ).join( ' ' );
			// } ).addClass( 'spc-active-tab-' + tabId );
			$(this).closest('.spc-tabs-wrap').addClass('spc-active-tab-' + tabId);
			//$( this ).closest( '.spc-tabs-wrap' ).find( 'ul .spc-title-item-' + tabId ).addClass( 'spc-tab-title-active' ).removeClass( 'spc-tab-title-inactive' );
			$(this).parent('.spc-tabs-accordion-title').addClass('spc-tab-title-active').removeClass('spc-tab-title-inactive');
		}
		var resizeEvent = window.document.createEvent('UIEvents');
		resizeEvent.initUIEvent('resize', true, false, window, 0);
		window.dispatchEvent(resizeEvent);
		var tabEvent = window.document.createEvent('UIEvents');
		tabEvent.initUIEvent('spc-tabs-open', true, false, window, 0);
		window.dispatchEvent(tabEvent);
	});
	function kt_anchor_tabs() {
		if (window.location.hash != '') {
			if ($(window.location.hash + '.spc-title-item').length) {
				var tabid = window.location.hash.substring(1);
				var tabnumber = $('#' + tabid + ' a').attr('data-tab');
				// remove active.
				$('#' + tabid).closest('.spc-tabs-title-list').find('.spc-tab-title-active')
					.addClass('spc-tab-title-inactive')
					.removeClass('spc-tab-title-active')
					.find('a.spc-tab-title').attr({
						tabindex: '-1',
						'aria-selected': 'false',
					});
				// Set active
				$('#' + tabid).closest('.spc-tabs-wrap').removeClass(function (index, className) {
					return (className.match(/\bspc-active-tab-\S+/g) || []).join(' ');
				}).addClass('spc-active-tab-' + tabnumber);

				$('#' + tabid).addClass('spc-tab-title-active').removeClass('spc-tab-title-inactive');
				$('#' + tabid).find('a.spc-tab-title').attr({
					tabindex: '0',
					'aria-selected': 'true',
				}).focus();
				$('#' + tabid).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tab-inner-content:not(.spc-inner-tab-' + tabnumber + ')').attr('aria-hidden', 'true');
				$('#' + tabid).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-inner-tab-' + tabnumber).attr('aria-hidden', 'false');
				$('#' + tabid).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tabs-accordion-title:not(.spc-tabs-accordion-title-' + tabnumber + ')').addClass('spc-tab-title-inactive').removeClass('spc-tab-title-active').attr({
					tabindex: '-1',
					'aria-selected': 'false',
				});
				$('#' + tabid).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tabs-accordion-title.spc-tabs-accordion-title-' + tabnumber).addClass('spc-tab-title-active').removeClass('spc-tab-title-inactive').attr({
					tabindex: '0',
					'aria-selected': 'true',
				});
				if (($(window).width() <= 767 && $('#' + tabid).closest('.spc-tabs-wrap').hasClass('spc-tabs-mobile-layout-accordion')) || ($(window).width() > 767 && $(window).width() <= 1024 && $('#' + tabid).closest('.spc-tabs-wrap').hasClass('spc-tabs-tablet-layout-accordion'))) {
					// Anchor scroll won't work because anchor is hidden, manually add.
					$([document.documentElement, document.body]).animate({
						scrollTop: $('#' + tabid).closest('.spc-tabs-wrap').find('.spc-tabs-content-wrap > .spc-tabs-accordion-title.spc-tabs-accordion-title-' + tabnumber).offset().top - 20
					}, 600);
				}
			}
		}
	}
	window.addEventListener('hashchange', kt_anchor_tabs, false);
	kt_anchor_tabs();
});

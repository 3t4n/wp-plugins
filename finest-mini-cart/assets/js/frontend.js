/*-----------------------------
* Build Your Plugin JS / jQuery
-----------------------------*/

jQuery(document).ready(function (jQuery) {
	"use strict";


	// Perfect scrollbar
	finest_perfect_scrollbar();

	jQuery(document).on('click', '#finest-count', function (e) {
		e.preventDefault();
		finest_show_cart();
	});

	// Auto show
	if (finest.auto_show == 'yes') {
		jQuery('body').on('added_to_cart', function () {
			setTimeout(function () {
				finest_show_cart();
				finest_get_cart();
			}, 100);
		});
	} else {
		jQuery('body').on('added_to_cart', function () {
			setTimeout(function () {
				finest_get_cart();
			}, 100);
		});
	}

	function finest_show_cart() {
		jQuery('body').addClass('finest-body-show');
		jQuery('#finest-area').addClass('finest-area-show');
	}

	function finest_get_cart() {
		var data = {
			action: 'finest_get_cart',
			nonce: jQuery('#finest-nonce').val(),
			security: finest.nonce
		};
		jQuery.post(finest.ajaxurl, data, function (response) {
			var cart_response = JSON.parse(response);
			jQuery('#finest-area').html(cart_response['html']);
			finest_perfect_scrollbar()
			jQuery('#cart-count-number').html(cart_response['count']);
			jQuery('#product-show-total').html(cart_response['count']);
			jQuery('#finest-area').removeClass('finest-area-loading');
			if (((finest.hide_count_checkout == false) || (finest.hide_count_cart == false)) && (jQuery('body').hasClass('woocommerce-checkout') || jQuery('body').hasClass('woocommerce-cart'))) {
				jQuery('#finest-count').addClass('fmc-count-hide');
			} else {
				jQuery('#finest-count').removeClass('fmc-count-hide');
			}
		});
	}

	jQuery('body').on('click tap', '#finest-continue', function () {
		finest_hide_cart();
	});
	jQuery('body').on('click tap', '.finest-close', function () {
		finest_hide_cart();
	});

	jQuery('body').on('click', '.finest-overlay', function () {
		finest_hide_cart();
	});

	function finest_hide_cart() {
		jQuery('#finest-area').removeClass('finest-area-show');
		jQuery('body').removeClass('finest-body-show');
	}

	// plus plus

	jQuery('body').on('click', '#finest-area .finest-item-qty-minus', function () {
		var qtyMin = 1;
		var step = 1;
		var qtyInput = jQuery(this).parent().find('.finest-item-qty-input');
		var qty = Number(qtyInput.val());
		if ((qtyInput.attr('min') != '') && (qtyInput.attr('min') != null)) {
			qtyMin = Number(qtyInput.attr('min'));
		}
		if (qtyInput.attr('step') != '') {
			step = Number(qtyInput.attr('step'));
		}
		var qtyStep = qtyMin + step;
		if (qty >= qtyStep) {
			qtyInput.val(qty - step);
		}
		qtyInput.trigger('change');
	});

	// Qty plus
	jQuery('body').on('click', '#finest-area .finest-item-qty-plus', function () {
		var qtyMax = 100;
		var step = 1;
		var qtyInput = jQuery(this).parent().find('.finest-item-qty-input');
		var qty = Number(qtyInput.val());
		if ((qtyInput.attr('max') != '') && (qtyInput.attr('max') != null)) {
			qtyMax = Number(qtyInput.attr('max'));
		}
		if (qtyInput.attr('step') != '') {
			step = Number(qtyInput.attr('step'));
		}
		var qtyStep = qty + step;
		if (qtyMax >= qtyStep) {
			qtyInput.val(qtyStep);
		}
		qtyInput.trigger('change');
	});

	// Qty on change
	jQuery('body').on('change', '#finest-area .finest-item-qty-input', function () {
		var item_key = jQuery(this).attr('data-key');
		var item_qty = jQuery(this).val();
		finest_update_qty(item_key, item_qty);
	});

	// Qty validate
	var t = false;
	jQuery('body').on('focus', '#finest-area .finest-item-qty-input', function () {
		var thisQty = jQuery(this);
		var thisQtyMin = thisQty.attr('min');
		var thisQtyMax = thisQty.attr('max');
		if ((thisQtyMin == null) || (thisQtyMin == '')) {
			thisQtyMin = 1;
		}
		if ((thisQtyMax == null) || (thisQtyMax == '')) {
			thisQtyMax = 1000;
		}
		t = setInterval(
			function () {
				if ((thisQty.val() < thisQtyMin) || (thisQty.val().length == 0)) {
					thisQty.val(thisQtyMin)
				}
				if (thisQty.val() > thisQtyMax) {
					thisQty.val(thisQtyMax)
				}
			}, 100)
	});

	jQuery('body').on('blur', '#finest-area .finest-item-qty-input', function () {
		if (t != false) {
			window.clearInterval(t)
			t = false;
		}
		var item_key = jQuery(this).attr('data-key');
		var item_qty = jQuery(this).val();
		finest_update_qty(item_key, item_qty);

	});


	function finest_update_qty(cart_item_key, cart_item_qty) {
		var data = {
			action: 'finest_update_qty',
			cart_item_key: cart_item_key,
			cart_item_qty: cart_item_qty,
			nonce: jQuery('#finest-nonce').val(),
			security: finest.nonce
		};
		jQuery.post(finest.ajaxurl, data, function (response) {
			var cart_response = JSON.parse(response);
			jQuery('#finest-subtotal').html(cart_response['subtotal']);
			jQuery('#cart-count-number').html(cart_response['count']);
			jQuery('#product-show-total').html(cart_response['count']);
			jQuery('.tax-count').html(cart_response['tax_price']);
			jQuery('.total-price').html(cart_response['total_price']);

		});
	}

	// remove item

	jQuery('body').on('click', '#finest-area .finest-item-remove', function () {
		jQuery(this).closest('.finest-item').addClass('finest-item-removing');
		var item_key = jQuery(this).attr('data-key');
		finest_remove_item(item_key);
		jQuery(this).closest('.finest-item').slideUp(300);
	});

	function finest_remove_item(cart_item_key) {
		var data = {
			action: 'finest_remove_item',
			cart_item_key: cart_item_key,
			nonce: jQuery('#finest-nonce').val(),
			security: finest.nonce
		};
		jQuery.post(finest.ajaxurl, data, function (response) {
			var cart_response = JSON.parse(response);

			jQuery('#finest-subtotal').html(cart_response['subtotal']);
			jQuery('#cart-count-number').html(cart_response['count']);
			jQuery('#product-show-total').html(cart_response['count']);
			jQuery('.tax-count').html(cart_response['tax_price']);
			jQuery('.total-price').html(cart_response['total_price']);

			if (0 == cart_response['count']) {
				jQuery('.finest-area-bot').slideUp(300);
				jQuery('.finest-area-middle').html(cart_response['html']);
			}

		});
	}

	function finest_perfect_scrollbar() {
		jQuery('#finest-area .finest-area-middle').perfectScrollbar({
			suppressScrollX: true,
			theme: 'fmc'
		});
	}


	// coupon code
	jQuery('body').on('click', '.finiest_coupon_submit', function (e) {
		e.preventDefault();

		var couponCode = jQuery("#finiest_coupon_code").val();

		jQuery.ajax({
			nonce: jQuery('#finest-nonce').val(),
			security: finest.nonce,
			url: finest.ajaxurl,
			type: 'POST',
			data: 'action=finest_coupon_ajax_call&coupon_code=' + couponCode,
			success: function (response) {
				finest_get_cart();
				jQuery(".finiest_coupon_response").html(response.message);
				if (response.result == 'not valid' || response.result == 'already applied') {
					jQuery(".finiest_coupon_response").css('background-color', '#e2401c');
					jQuery(".finiest_coupon_response").css('color', '#ffffff');
				} else {
					jQuery(".finiest_coupon_response").css('background-color', '#0f834d');
					jQuery(".finiest_coupon_response").css('color', '#ffffff');
				}
				jQuery(".finiest_coupon_response").fadeIn().delay(2000).fadeOut();
			}
		});
	});


});
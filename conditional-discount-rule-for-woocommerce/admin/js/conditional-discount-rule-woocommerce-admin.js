(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery(function ($) {
		$("#pi_discount_start_time, #pi_discount_end_time").datepicker({
			dateFormat: 'yy/mm/dd',
		});

		$("#expiry_date").datepicker({
			dateFormat: 'yy-mm-dd',
		});

		function clearDate() {

			jQuery(document).on('click', ".pi-clear", function (e) {
				jQuery('input', jQuery(this).parent()).val("");
			})
		}
		clearDate();

		hideShowDropdown("#pi_discount_type", "#row_pi_percent_based_on", "percentage");

		hideShowDropdown("#pi_discount_type", "#row_pi_coupon_template", "future_coupon");

		hideShowDiscountAmount();

		function hideShowDiscountAmount() {
			var $ = jQuery;
			var parent = '#pi_discount_type';
			var child = '#row_pi_discount_amount, #row_pi_user_limit, #row_pi_usage_limit, #row_pi_percent_max_discount, #row_description';
			$(parent).on('change', function () {
				if ($(parent).val() == 'fixed' || $(parent).val() == 'percentage') {
					$(child).fadeIn();
				} else {
					$(child).fadeOut();
				}
			});
			jQuery(parent).trigger("change");
		}

		function hideShowDropdown(parent, child, value_to_show) {
			var $ = jQuery;
			$(parent).on('change', function () {
				if ($(parent).val() == value_to_show) {
					$(child).fadeIn();
				} else {
					$(child).fadeOut();
				}
			});
			jQuery(parent).trigger("change");
		}

		function enableDisable() {
			jQuery(document).on('click', '.pi-cdrw-status-change', function (e) {
				var id = jQuery(this).data('id');
				var status = jQuery(this).is(":checked") ? 1 : 0;
				jQuery("#pisol-cdrw-discount-list-view").addClass('blocktable');
				jQuery.ajax({
					url: ajaxurl,
					method: 'POST',
					data: {
						id: id,
						status: status,
						action: 'pisol_cdrw_change_status',
						_wpnonce: cdrw_variables._wpnonce
					}
				}).always(function (d) {
					jQuery("#pisol-cdrw-discount-list-view").removeClass('blocktable');
				})
			});
		}
		enableDisable();

		function ajaxSubmit() {
			$('#pisol-cdrw-new-method').submit(function (e) {
				e.preventDefault();
				var form = $(this);
				blockUI()
				$.ajax({
					type: "POST",
					url: ajaxurl,
					dataType: 'json',
					data: form.serialize(), // serializes the form's elements.
					success: function (data) {


						if (data.error != undefined) {
							var html = ''

							jQuery.each(data.error, function (index, val) {
								html += '<p class="pi-cdrw-notice error">' + val + '<span class="pi-close-notification dashicons dashicons-no-alt"></span></p>';
							});

							jQuery("#pisol-cdrw-notices").html(html);

							$.alert({
								title: 'Error',
								content: html,
								type: 'red',
								columnClass: 'small'
							});
						}

						if (data.success != undefined) {
							var html = '<p class="pi-cdrw-notice success">' + data.success + '<span class="pi-close-notification dashicons dashicons-no-alt"></span></p>';
							jQuery("#pisol-cdrw-notices").html(html);

							$.alert({
								title: 'Success',
								content: html,
								type: 'green',
								columnClass: 'small'
							});
						}

						if (data.redirect != undefined) {
							window.location = data.redirect;
						}
					}
				}).always(function () {
					unblockUI();
				});
			});
		}
		ajaxSubmit();

		function blockUI() {
			jQuery("#pisol-cdrw-new-method").addClass('pi-blocked')
		}

		function unblockUI() {
			jQuery("#pisol-cdrw-new-method").removeClass('pi-blocked')
		}

		function hideNotification() {
			jQuery(document).on('click', '.pi-close-notification', function () {
				jQuery(this).parent().remove();
			})
		}
		hideNotification()

		jQuery(document).on('click', '.pi-cdrw-delete, .pisol-confirm', function (e) {
			//show confirmation dialog
			var choice = confirm("Are you sure you want to delete it ?");
			if (!choice) {
				e.preventDefault();
			}
		});

	});

})(jQuery);

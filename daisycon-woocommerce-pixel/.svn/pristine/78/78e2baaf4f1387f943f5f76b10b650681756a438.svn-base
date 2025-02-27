(function( $ ) {
    'use strict';

    $(document).ready(function(){
        let current_value = 'yes';
        let td = null;

        // Old code, can probably be removed
        $('body').on('click', '#the-list .editinline', function(){
            let parent_tr = $(this).closest('tr'),
                post_id = parent_tr.attr('id');

            post_id = post_id.replace("post-", "");
			let $daisycon_inline_data = $('#daisycon_cc_inline_' + post_id),
				daisycon_cc_text = $daisycon_inline_data.text(),
                $daisycon_input = $('#edit-' + post_id).find('.daisycon_cc_quick_edit_input');

            $daisycon_input.val($daisycon_inline_data.text());
        });

        // Check if values are not yet, then hide the next
		let elements = $('#dc-woocommerce-pixel-form select[name*="daisycon_woocommerce_options[lcc_enabled"]');
        elements.each(function() {
            current_value = $(this).find(':selected').val();

            if ('yes' !== current_value) {

                td = $(this).parent().parent().next().find('td');

                td.find('input').hide();
                td.append('<span class="daisycon_not_available">-</span>');
            }
        });

        // If value gets updated, check what to do
		elements.on('change', function() {
            current_value = $(this).find(':selected').val();
            td = $(this).parent().parent().next().find('td');

            if ('yes' !== current_value && 0 === td.find('.daisycon_not_available').length) {

                td.find('input').hide();
                td.append('<span class="daisycon_not_available">-</span>');
            }
            else if ('yes' === current_value) {
                td.find('input').show();
                td.find('.daisycon_not_available').remove();
            }
        });

		// Show and hide automatic validation settings
		const formId = '#dc-woocommerce-pixel-form';
		const automaticValidationStatus = $(`${formId} select[name*="daisycon_woocommerce_options[enabled]"]`);
		const fields = [
			$(`${formId} input[name*="daisycon_woocommerce_options[consumer_key]"]`),
			$(`${formId} input[name*="daisycon_woocommerce_options[consumer_secret]"]`),
			$(`${formId} a[id*="link_for_woocoomerce_rest_api_keys"]`),
			$(`${formId} label[for*="explain_woocommerce_auth_fields_"]`)
		];

		function toggleFields(state) {
			fields.forEach((field) => {
				const fieldParent = field.parent().parent();
				if (state) {
					fieldParent.show();
				} else {
					fieldParent.hide();
				}
			});
		}

		function setFieldsState() {
			toggleFields(parseInt(automaticValidationStatus.val()));
		}

		setFieldsState();
		automaticValidationStatus.on('change', setFieldsState);
    });

})( jQuery );

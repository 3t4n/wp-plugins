(function ($) {
    $(document).ready(function(){
        var $timologio = $('#billing_timologio');

        function checkTimologioFieldsVisibility() {
           var required = '<abbr class="required" title="<?php echo $required; ?>">*</abbr>';    
           var timologio = $timologio.val() === 'Y';
           $('#billing_timologio_field label > .optional').hide();  
            if (timologio) {
				my_callback()
                $('.timologio-hide').slideDown('fast');
            $('#billing_vat_field label > .optional').remove();
            $('#billing_vat_field').find('abbr').remove(); 
            $('#billing_vat_field'+' label').append(required);
            $('#billing_company_field label > .optional').remove();
            $('#billing_company_field').find('abbr').remove(); 
            $('#billing_company_field'+' label').append(required);
            $('#billing_irs_field label > .optional').remove();
            $('#billing_irs_field').find('abbr').remove(); 
            $('#billing_irs_field'+' label').append(required);
            $('#billing_store_field label > .optional').remove();
            $('#billing_store_field').find('abbr').remove(); 
            $('#billing_store_field'+' label').append(required);
            } else {
                $('#billing_timologio_field label > .optional').show();
            
				my_callback()
                $('.timologio-hide').slideUp('fast');
            }
        }

        $timologio.change(checkTimologioFieldsVisibility);

        checkTimologioFieldsVisibility();
		
	function my_callback() {
        jQuery('body').trigger('update_checkout');
    }
		
		
    })
})(jQuery);
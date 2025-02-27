(function ($) {
    $(document).ready(function(){
        var $timologio = $('#billing_timologio');

        function checkTimologioFieldsVisibility() {
           var timologio = $timologio.val() === 'Y';
           $('#billing_timologio_field label > .optional').hide();  
            if (timologio) {
				my_callback()
                $('.timologio-hide').slideDown('fast');
            $('#billing_vat_field label > .optional').remove(); 
            $('#billing_irs_field label > .optional').remove();
            $('#billing_store_field label > .optional').remove();
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
jQuery(document).ready(function( $ ){
    $('#wpmc-main_color').wpColorPicker();
    $('[data-toggle="tooltip"]').tooltip();

	/*
	 * Toggle the step title strings
	 */
    toggle_wpml();
    $('#t_wpml').on( 'change', toggle_wpml );

    function toggle_wpml() {
        var all_text = '#t_login, #t_billing, #t_shipping, #t_order, #t_payment, #t_back_to_cart, #t_skip_login, #t_previous, #t_next'; 
        if ($('#t_wpml').is(':checked') ) {
            $(all_text).prop('disabled', true);
        } else {
            $(all_text).prop('disabled', false);
        }
    }

	/*
	 * Toggle the "Hide Shipping step for virtual products" option
	 */
	toggle_shipping_virtual_products( $('#show_shipping_step').is(':checked') );

	$('input[name="show_shipping_step"]').change( function() {
		toggle_shipping_virtual_products( $(this).is(':checked') );
	});

	function toggle_shipping_virtual_products( enable = true ) {
		$('#hide_shipping_step_virtual').closest('.form-group').css('display', enable ? 'block' : 'none');
	}
});

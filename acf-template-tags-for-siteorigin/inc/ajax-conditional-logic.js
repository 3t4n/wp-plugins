(function($) {
	$(document).ready(function() {
		
		if(typeof acf != 'undefined') {
			
			acf.add_action('hide_field', function( $field, context ){
				if (context == 'conditional_logic') {
					data = { action: 'ajax_conditional_logic', key: $($field).data('key'), value: 'hide', post_id: $('#post_ID').val() };
					jQuery.post(ajaxurl, data, function(response){
						console.log(response);
					});
				}
			});
			
			acf.add_action('show_field', function( $field, context ){
				if (context == 'conditional_logic') {
					data = { action: 'ajax_conditional_logic', key: $($field).data('key'), value: 'show', post_id: $('#post_ID').val() };
					jQuery.post(ajaxurl, data, function(response){
						console.log(response);
					});
				}
			});
			
		}
		
	})
})(jQuery);

!function($) {
    $('.wbsfvcselect').on('change', function(e){
        e.preventDefault();
		
		var form_id = $( this ).val();
		$.ajax({
			type: "POST",
			url:'admin-ajax.php',
			dataType: 'text',
			data: {
				action: 'wbs_update_form', 
				form_id: form_id
			},
			success : function(responseText) {
				//$('#free-forms-crm-update-success').show();
			}	
		});
    });
}(window.jQuery);
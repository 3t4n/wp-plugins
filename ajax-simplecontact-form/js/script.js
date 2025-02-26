jQuery(function($){
	$('#ajax_contact_form').submit(function (e) {
		e.preventDefault();
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action',
			data: $('#ajax_contact_form').serialize(),
		}, function(msg) {
			$(".form_result").html(msg);
		});
	});
});
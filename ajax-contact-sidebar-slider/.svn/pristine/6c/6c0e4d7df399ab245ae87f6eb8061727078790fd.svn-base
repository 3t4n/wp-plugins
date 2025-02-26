jQuery(document).ready(function($){
	$('#bs_contact_form').submit(function($) {
		//alert('hello');
		event.preventDefault();
		jQuery.ajax({
	      	url: bs_ajax_object.ajax_url,
	      	type: 'POST',
	      	data: {data: jQuery(this).serialize(), _nonce: bs_ajax_object.bs_nonce, action: 'bs_contact_submit'},
	      	complete: function(xhr, textStatus) {
	        	//jQuery(window).scrollTop(0);
	      	},
	      	success: function(data, textStatus, xhr) {
	        	jQuery('.ps_success_data').html("<span style='color: #8cf384; text-align: center;'>"+"Thanks for submitting form"+'</span>');
	        	//console.log(data);	     
	      	},
	      	error: function(xhr, textStatus, errorThrown) {
	        	//called when there is an error
	      	}
		});	
	});
});


(function($) {
"use strict";
jQuery(document).ready(function() {
		$(document).on('click', '.cdlzr_accbox_remove_label', function() {
			if (  $('.divcontrolbox').length > 1 ) {
				$(this).parent().parent().parent().parent().fadeOut(300, function() { $(this).remove(); });
			}
		});

		$(document).on('click', '#delete_element_btn', function() {
			var conf_acc = confirm("If you want to delete all Accordion!");
			if (conf_acc == true) {
			  $('.divcontrolbox').remove();
			} 
			
		});

		

	jQuery(document).on('click', '#create_element_btn', function() {
		//  $('.divcontrolbox').first().clone().find('input').attr({ value: '' }).end().find('textarea').val('').end().find('select option[value="0"]').attr("selected","selected").end()
		// .fadeIn(100, function() { $(this).appendTo('#divcontrolbox_rows'); });
		//  $('.divcontrolbox').first().clone().find('input').attr({ value: '' }).end().find('textarea').val('').end().find('select option[value="0"]').attr("selected","selected").end()
		// .fadeIn(100, function() { $(this).appendTo('#divcontrolbox_rows'); });	
		var accid = 1;
		accid++;
		jQuery.ajax({
			url: AjaxObj.ajax_url,
			type: 'post',
			data: {
				action: 'clzr_accbox_add_box',
				accid: accid			
			},
			dataType: 'html',
			beforeSend: function () {
				
			},
			success: function (response) {
				jQuery('#divcontrolbox_rows').append(response);
			},
		});	
	});

});		
})(jQuery);
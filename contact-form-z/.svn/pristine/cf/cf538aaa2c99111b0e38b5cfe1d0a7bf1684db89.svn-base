(function($){

  'use strict';

  $(function(){

// Enable past form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_paste, #zcf_options").on('change', '.zcf_enable_paste_form_list, .zcf_enable_akismet', function(){

	  if($(this).prop('checked')){
		zcf_attr = 'block';
	  }else{
		zcf_attr = 'none';
	  }

	  $(this).closest('.postbox').find('.inside').css('display', zcf_attr);

	});


// Clone past form row
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_paste").on('click', '.zcf_add_form_add_clone_row', function(){

	  zcf_clone_row = $('.zcf_add_form_list_row').clone(true);

	  zcf_clone_row.removeAttr('class');
	  zcf_clone_row.find('td').last().empty().append($('<button/>', {'class': 'button zcf_list_remove_row'}).append($('<span/>', {'class': 'dashicons dashicons-minus'})));

	  $('.zcf_add_form_list_body_row').append(zcf_clone_row);

	});


// Change past form type
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_paste").on('change', '.zcf_add_form_list_type', function(){

	  $(this).closest('tr').find('.zcf_add_form_list_title').css('display', 'none');
	  $(this).closest('tr').find('.zcf_add_form_list_title_' + $(this).val()).css('display', 'block');

	});

  });

})(jQuery);
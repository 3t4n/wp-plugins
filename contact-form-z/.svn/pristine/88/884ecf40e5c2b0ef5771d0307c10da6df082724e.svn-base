(function($){

  'use strict';

  $(function(){


// Enter title accept
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_accept_title', function(){

	  zcf_title = $(this).val();
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = zcf_title;
	  zcf_element = zcf_add_block_type + '_' + zcf_num;

	  if(zcf_title.length === 0){
		zcf_title = $(this).attr('data-default-text');
	  }

	  $('.zcf_label_' + zcf_element).text(zcf_title);

	});


// Change type accept
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_accept_type', function(){

	  var zcf_accept_text = 'none';
	  var zcf_accept_url = 'none';
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  switch($(this).val()){
		case '0':
		  $('.zcf_label_' + zcf_add_block_type + '_' + zcf_num).removeAttr('href').removeClass('zcf_accept_link_solid zcf_accept_link_dashed').off('click').closest('.zcf_list_container').siblings('div.zcf_accept_text_block').hide();
		  $('.zcf_container_text_block_' + zcf_add_block_type + '_' + zcf_num).text('');
		  break;
		case '1':
		  zcf_accept_text = 'none';
		  zcf_accept_url = 'table-row';
		  $('.zcf_label_' + zcf_add_block_type + '_' + zcf_num).removeClass('zcf_accept_link_dashed').addClass('zcf_accept_link_solid').off('click').closest('.zcf_list_container').siblings('div.zcf_accept_text_block').hide();
		  $('.zcf_container_text_block_' + zcf_add_block_type + '_' + zcf_num).text('');
		  break;
		case '2':
		  zcf_accept_text = 'table-row';
		  zcf_accept_url = 'none';
		  $('.zcf_label_' + zcf_add_block_type + '_' + zcf_num).removeAttr('href').removeClass('zcf_accept_link_solid').addClass('zcf_accept_link_dashed');
		  $('.zcf_label_' + zcf_add_block_type + '_' + zcf_num).on('click', function(){
			$(this).closest('.zcf_list_container').siblings('div.zcf_accept_text_block').toggle();
		  });
		  break;
	  }

	  $(this).closest('.zcf_block').find('.zcf_accept_content[data-attr-type="link"]').val('').closest('tr').css('display', zcf_accept_url);
	  $(this).closest('.zcf_block').find('.zcf_accept_content[data-attr-type="text"]').val('').closest('tr').css('display', zcf_accept_text);

	});


// Accept change default checked
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_accept_default', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if($(this).val() === 'checked'){
		zcf_attr = true;
	  }else{
		zcf_attr = false;
	  }

	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).prop('checked', zcf_attr);
	  $('.zcf_preview_form .zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).trigger('change.zcf');

	});


// Accept input text
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_accept_content', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = $(this).attr('data-attr-type');

	  switch(zcf_attr){
		case 'link':
		  $('.zcf_label_' + zcf_add_block_type + '_' + zcf_num).attr('href', $(this).val());
		  break;
		case 'text':
		  $('.zcf_container_text_block_' + zcf_add_block_type + '_' + zcf_num).text($(this).val());
		  break;
	  }

	});


// File change multiple
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_file_multiple', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if($(this).prop('checked')){
		zcf_attr = true;
	  }else{
		zcf_attr = false;
	  }

	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).attr('multiple', zcf_attr);

	});


// File field option value input
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input change', '.zcf_file_option', function(){

	  zcf_attr = $(this).attr('data-attr-type');

	  if($(this).val() < 0 && zcf_attr === 'size'){
		$(this).val('');
	  }

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  $('.zcf_limit_span_' + zcf_attr + '_' + zcf_add_block_type + '_' + zcf_num).text($(this).val() + (zcf_attr === 'size' && $(this).val() !== '' ? 'Mb' : ''));

	});

  });

})(jQuery);
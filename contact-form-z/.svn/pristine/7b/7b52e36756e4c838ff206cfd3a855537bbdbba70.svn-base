(function($){

  'use strict';

  $(function(){

// Off field input defaul value
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_text_default', function(){

	  if($(this).val() == 'text'){
		zcf_readonly = false;
	  }else{
		zcf_readonly = true;
	  }
	  $(this).siblings('.zcf_text_default_value').attr('readonly', zcf_readonly).val('');

	});


// Show/Hide field editor mask
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_connect_mask', function(){

	  if($(this).prop('checked')){
		zcf_display = 'block';
	  }else{
		zcf_display = 'none';
	  }
	  $(this).closest('.zcf_float_block').siblings('.zcf_mask_block').css('display', zcf_display);

	});


// Text field type change
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_text_field_type', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).attr('type', $(this).val()).val('');

	  var zcf_txt_min = zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_min[]"]').val();
	  var zcf_txt_max = zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_max[]"]').val();

	  if($(this).val() !== 'number'){

		zcf_txt_min = (zcf_txt_min === '' ? 0 : zcf_txt_min) + ' (0)';
		zcf_txt_max = zcf_txt_max === '' ? 0 : zcf_txt_max;

	  }

	  $('.zcf_limit_span_min_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_min);
	  $('.zcf_limit_span_max_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_max);

	  // Rebuild Rulles Blocks Field Text
	  var zcf_attr_num = zcf_add_block_type + '_' + zcf_num;
	  var zcf_prop = $(this).val() === 'number' ? 'number' : 'text';

	  if($('.zcf_rules_table_options_' + zcf_attr_num).length > 0){

		var zcf_conditions = '';
		for(var i in zcfRulesConditions[zcf_prop]){
		  var d = zcfRulesConditions[zcf_prop][i];
		  zcf_conditions += '<option value="' + i + '">' + d + '</option>';
		}
		
		$('.zcf_rules_table_options_' + zcf_attr_num).closest('.zcf_rules_block_list').find('.zcf_rules_field_type').val(zcf_prop);

		$('.zcf_rules_table_options_' + zcf_attr_num + ' .zcf_rules_if_condition_list').empty().html(zcf_conditions);

		$('.zcf_rules_table_options_' + zcf_attr_num + ' .zcf_rules_if_' + zcf_attr_num).attr('type', zcf_prop).val('');
		
		zcfMessageAlert(zcf_message.confirm_title, zcf_admin_message.reset_conditions, 'orange');

	  }

	});


// Text field placeholder
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_text_placeholder', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).attr('placeholder', $(this).val());

	});


// Text field default value
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_text_default_value', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if(zcf_closest_block.find('.zcf_text_default').val() === 'text' || zcf_add_block_type === 'textarea'){
		$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).val($(this).val());
	  }
	  
	  $('.zcf_preview_form .zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).trigger('input.zcf');

	});


// Text field min/max value length
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_text_length', function(){

	  if(parseInt($(this).val(), 10) < 0){
		$(this).val('');
	  }else{
		$(this).val(parseInt($(this).val(), 10));
	  }

	});


// Text field on/off mask
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_connect_mask', function(){

	  if(!$(this).prop('checked')){
		zcf_closest_block = $(this).closest('.zcf_block');
		zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
		zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
		$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).unmask();
	  }

	});


// Text field mask template
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_mask_options, .zcf_mask_template', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  var zcf_mask_val = zcf_closest_block.find('.zcf_mask_template').val();

	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).mask(
		  zcf_mask_val,
		  {
			reverse: zcf_closest_block.find('.zcf_mask_revers').prop('checked'),
			clearIfNotMatch: zcf_closest_block.find('.zcf_mask_clean').prop('checked'),
			selectOnFocus: true,
			placeholder: zcf_mask_val.replace(/[AS09#]/g, "_")
		  }
	  ).val('');

	});


// Textarea field min/max length
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_counter_length', function(){

	  if($(this).val() < 0){
		$(this).val('');
	  }

	  var zcf_counter;
	  var zcf_counter_value = 0;
	  var zcf_counter_length = 0;
	  zcf_closest_block = $(this).closest('.zcf_block');
	  var zcf_text_type = zcf_closest_block.find('.zcf_text_field_type').val();

	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = $(this).attr('data-attr-type');
	  zcf_counter = $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num);
	  zcf_counter_value = zcf_counter.val();
	  zcf_block = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_counter').prop('checked');

	  if($(this).val() === '' && zcf_block){
		$('.zcf_limit_block_' + zcf_attr + '_' + zcf_add_block_type + '_' + zcf_num).css('display', 'none');
	  }
	  if($(this).val() !== '' && zcf_block){
		$('.zcf_limit_block_' + zcf_attr + '_' + zcf_add_block_type + '_' + zcf_num).css('display', 'block');
	  }

	  if(zcf_add_block_type === 'text' && zcf_text_type === 'number'){
		zcf_counter_length = $(this).val();

		if(zcf_attr === 'min'){
		  zcf_counter_value = parseInt(zcf_counter_value) < $(this).val() ? $(this).val() : parseInt(zcf_counter_value);
		}else if(zcf_attr === 'max'){
		  zcf_counter_value = parseInt(zcf_counter_value) > $(this).val() ? $(this).val() : parseInt(zcf_counter_value);
		}

		zcf_counter.val(zcf_counter_value);

	  }else{
		if(zcf_attr === 'min'){
		  zcf_counter_length = $(this).val() + ' (' + (zcf_counter_value.length > $(this).val() ? $(this).val() : (zcf_counter_value.length)) + ')';
		}else if(zcf_attr === 'max'){
		  zcf_counter_length = ($(this).val() - zcf_counter_value.length) < 0 ? 0 : ($(this).val() - zcf_counter_value.length);
		}
		if($(this).val() !== '' && zcf_attr === 'max'){
		  zcf_counter.val(zcf_counter_value.substr(0, $(this).val()));
		}
	  }

	  $('.zcf_limit_span_' + zcf_attr + '_' + zcf_add_block_type + '_' + zcf_num).text(zcf_counter_length);

	});


// Textarea/File show/hide option block
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_textarea_counter, .zcf_file_option_view, .zcf_text_counter', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = $(this).attr('data-attr-type');

	  if($(this).prop('checked')){
		zcf_title = 'block';
	  }else{
		zcf_title = 'none';
	  }

	  switch(zcf_attr){
		case 'counter':

		  if(zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_max[]"]').val() !== ''){
			$('.zcf_limit_block_max_' + zcf_add_block_type + '_' + zcf_num).css('display', zcf_title);
		  }

		  if(zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_min[]"]').val() !== ''){
			$('.zcf_limit_block_min_' + zcf_add_block_type + '_' + zcf_num).css('display', zcf_title);
		  }

		  break;

		default:

		  $('.zcf_limit_block_' + zcf_attr + '_' + zcf_add_block_type + '_' + zcf_num).css('display', zcf_title);

		  break
	  }

	});


// Textarea field change content
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$(".zcf_preview_form").on('input', '.zcf_counter_txt', function(){

	  zcf_attr = $(this).attr('zcf_num_attr');
	  zcf_add_block_type = $(this).attr('zcf_type_attr');

	  zcf_closest_block = $('.zcf_' + zcf_add_block_type + '_rank[value="' + zcf_attr + '"]').closest('.zcf_block');
	  zcf_block = zcf_closest_block.find('.zcf_text_field_type').val();

	  var zcf_txt_min = zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_min[]"]').val();
	  var zcf_txt_max = zcf_closest_block.find('[name="' + zcf_add_block_type + '_length_max[]"]').val();

	  if(zcf_add_block_type === 'text' && zcf_block === 'number'){
		if(parseInt($(this).val(), 10) < zcf_txt_min && zcf_txt_min !== ''){
		  $(this).val(zcf_txt_min);
		}
		if(parseInt($(this).val(), 10) > zcf_txt_max && zcf_txt_max !== ''){
		  $(this).val(zcf_txt_max);
		}
	  }else{
		if(zcf_txt_max !== ''){
		  $(this).val($(this).val().substr(0, zcf_txt_max));
		}

		zcf_txt_min = zcf_txt_min === '' ? 0 : zcf_txt_min;
		zcf_txt_max = zcf_txt_max === '' ? 0 : zcf_txt_max;
		zcf_txt_min = zcf_txt_min + ' (' + ($(this).val().length > zcf_txt_min ? zcf_txt_min : ($(this).val().length)) + ')';
		zcf_txt_max = (zcf_txt_max - $(this).val().length) < 0 ? 0 : (zcf_txt_max - $(this).val().length);

		$('.zcf_limit_span_min_' + zcf_add_block_type + '_' + zcf_attr).text(zcf_txt_min);
		$('.zcf_limit_span_max_' + zcf_add_block_type + '_' + zcf_attr).text(zcf_txt_max);

	  }

	});


  });

})(jQuery);
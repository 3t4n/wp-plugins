(function($){

  'use strict';

  $(function(){


// Add lines field checkbox/radio/select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_add_clone_row', function(){

	  zcf_attr = $(this).attr('data-type-list');

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_attr + '_rank').val();
	  $(this).attr('data-rank-count', parseInt($(this).attr('data-rank-count'), 10) + 1);
	  zcf_rank_list = $(this).attr('data-rank-count');
	  zcf_closest_table = $(this).closest('.zcf_block_table_list');
	  zcf_clone_row = $(this).closest('tr').clone(true);
	  zcf_clone_row.find('.zcf_list_title').val('').prop('checked', false);
	  zcf_element = zcf_attr + '_' + zcf_rank;
	  zcf_points_title = zcf_admin_message.point + ' ';

	  zcf_clone_row.find('.zcf_list_title').attr({'name': zcf_attr + '_list_title[' + zcf_rank + '][' + zcf_rank_list + ']', 'data-num-value': zcf_rank_list});
	  zcf_clone_row.find('td').last().empty().append($('<button/>', {'class': 'button zcf_remove_clone_row'}).attr('data-type-list', zcf_attr).append($('<span/>', {'class': 'dashicons dashicons-minus'})));


	  switch(zcf_attr){
		case 'select':
		  zcf_readonly = true;
		  if($(this).closest('.zcf_block').find('.zcf_select_default').val() === '2'){
			if($(this).closest('.zcf_block').find('.zcf_select_multi').prop('checked')){
			  zcf_readonly = false;
			}else{
			  if($(this).closest('.zcf_block').find('.zcf_body_row').find('.zcf_list_check:checked').length === 0){
				zcf_readonly = false;
			  }
			}
		  }
		  zcf_clone_row.find('.zcf_list_check').attr('disabled', zcf_readonly).prop('checked', false);
		  zcf_clone_row.find('.zcf_list_check').next().attr('name', zcf_attr + '_list_check[' + zcf_rank + '][' + zcf_rank_list + ']').val('false');
		  zcf_length = zcf_closest_block.find('.zcf_min_count').children().length;
		  zcf_closest_block.find('.zcf_min_count, .zcf_max_count').append($('<option/>', {value: parseInt(zcf_length, 10), text: parseInt(zcf_length, 10)}));

		  $('.zcf_container_field_' + zcf_element).append($('<option/>', {'class': 'zcf_container_list_label_' + zcf_element + '_' + zcf_rank_list + ' zcf_container_title_label_' + zcf_element + '_' + zcf_rank_list}));
		  break;
		case 'checkbox':
		  zcf_clone_row.find('.zcf_list_check').prop('checked', false);
		  zcf_clone_row.find('.zcf_list_check').next().attr('name', zcf_attr + '_list_check[' + zcf_rank + '][' + zcf_rank_list + ']').val('false');
		  zcf_length = zcf_closest_block.find('.zcf_min_count').children().length;
		  zcf_closest_block.find('.zcf_min_count, .zcf_max_count').append($('<option/>', {value: parseInt(zcf_length, 10), text: parseInt(zcf_length, 10)}));

		  $('.zcf_container_block_' + zcf_element)
			  .append($('<label/>', {'class': 'zcf_list_container zcf_container_list_label_' + zcf_element + '_' + zcf_rank_list})
				  .append($('<label/>', {'class': 'zcf_container_title_label zcf_container_title_label_' + zcf_element + '_' + zcf_rank_list}))
				  .append($('<input/>', {
					'class': 'zcf_container_field_' + zcf_element + ' zcf_limit_list',
					'zcf_num_attr': zcf_num,
					'zcf_type_attr': 'checkbox',
					type: 'checkbox'
				  }))
				  .append($('<span/>', {'class': 'zcf_checkmark zcf_checkmark_checkbox'}))
				  );
		  break;
		case 'radio':
		  zcf_clone_row.find('.zcf_list_check').attr('name', zcf_attr + '_list[' + zcf_rank + ']').prop('checked', false);
		  zcf_clone_row.find('.zcf_list_check').next().attr('name', zcf_attr + '_list_check[' + zcf_rank + '][' + zcf_rank_list + ']').val('false');

		  $('.zcf_container_block_' + zcf_element)
			  .append($('<label/>', {'class': 'zcf_list_container zcf_container_list_label_' + zcf_element + '_' + zcf_rank_list})
				  .append($('<label/>', {'class': 'zcf_container_title_label zcf_container_title_label_' + zcf_element + '_' + zcf_rank_list}))
				  .append($('<input/>', {'class': 'zcf_container_field_' + zcf_element, type: 'radio', name: 'zcf_container_block_' + zcf_element}))
				  .append($('<span/>', {'class': 'zcf_checkmark zcf_checkmark_radio'}))
				  );
		  break;
		case 'rating':
		  zcf_points_title = '';
		  zcf_clone_row.find('.zcf_list_check').attr('name', zcf_attr + '_list[' + zcf_rank + ']').prop('checked', false);
		  zcf_clone_row.find('.zcf_list_check').next().attr('name', zcf_attr + '_list_check[' + zcf_rank + '][' + zcf_rank_list + ']').val('false');

		  $('.zcf_container_field_' + zcf_element).append($('<option/>', {value: zcf_rank_list, text: ''}));

		  break;
	  }

	  zcf_closest_table.find('.zcf_body_row').append(zcf_clone_row);
	  if(zcf_attr === 'rating'){
		createRatingPreview(zcf_closest_block);
	  }

	  // Redirect
	  $('.zcf_redirection_rules_options').each(function(index, element){

		if($(element).children('option[value="' + zcf_element + '"]').prop('selected')){
		  $(element).closest('tr').find('.zcf_redirection_rules_options_list')
			  .append($('<option/>', {value: zcf_element + '_' + zcf_rank_list, text: zcf_attr + '-' + zcf_rank + '-' + zcf_rank_list}));
		}

	  });

	  // Rules
	  $('.zcf_rules_block').find('.zcf_rules_if_' + zcf_element).append($('<option/>', {value: zcf_element + '_' + zcf_rank_list, text: zcf_attr + '-' + zcf_rank + '-' + zcf_rank_list}));

	  $('.zcf_rules_block_list').each(function(index, element){

		zcf_block = $(element).attr('data-zcf-num');

		rulesMultipleOptionsOne(
			$(element),
			zcf_element,
			zcf_block,
			'if',
			zcf_attr + '-' + zcf_rank + '-' + zcf_rank_list,
			zcf_rank_list
			);

		rulesMultipleOptionsOne(
			$(element),
			zcf_element,
			zcf_block,
			'then',
			zcf_attr + '-' + zcf_rank + '-' + zcf_rank_list,
			zcf_rank_list
			);

		$('.zcf_rules_if_block_' + zcf_element + ' .zcf_rules_all_title_checked input').prop('checked', false);
		$('.zcf_rules_then_block_' + zcf_element + ' .zcf_rules_all_title_checked input').prop('checked', false);

	  });
	  
	  zcf_closest_block.find('.zcf_list_title').last().val(zcf_points_title + zcf_closest_block.find('.zcf_list_title').length).trigger('input');

	});


// Delete lines field checkbox/radio/select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_remove_clone_row', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_attr = $(this).attr('data-type-list');
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_attr + '_rank').val();
	  switch(zcf_attr){
		case 'checkbox':
		  zcf_closest_block.find('.zcf_min_count').children().last().remove();
		  zcf_closest_block.find('.zcf_max_count').children().last().remove();
		  break;
		case 'select':
		  zcf_closest_block.find('.zcf_min_count').children().last().remove();
		  zcf_closest_block.find('.zcf_max_count').children().last().remove();
		  zcf_readonly = true;
		  if(zcf_closest_block.find('.zcf_select_default').val() === '2'){
			if(zcf_closest_block.find('.zcf_select_multi').prop('checked')){
			  zcf_readonly = false;
			}else{
			  if(zcf_closest_block.find('.zcf_body_row').find('.zcf_list_check:checked').not($(this).closest('tr').find('.zcf_list_check')).length === 0){
				zcf_readonly = false;
			  }
			}
		  }
		  zcf_closest_block.find('.zcf_list_check').not(zcf_closest_block.find('.zcf_body_row').find('.zcf_checkbox_state:checked')).attr('disabled', zcf_readonly);
		  break;
	  }

	  zcf_rank_list = $(this).closest('tr').find('.zcf_list_title').attr('data-num-value');

	  $(this).closest('tr').remove();
	  if(zcf_attr === 'rating'){
		createRatingPreview(zcf_closest_block);
	  }

	  // Redirect
	  $('.zcf_redirection_rules_options').each(function(index, element){

		if($(element).children('option[value="' + zcf_attr + '_' + zcf_rank + '"]').prop('selected')){
		  $(element).closest('tr').find('.zcf_redirection_rules_options_list option[value="' + zcf_attr + '_' + zcf_rank + '_' + zcf_rank_list + '"]').remove();
		}

	  });

	  // Preview
	  $('.zcf_container_list_label_' + zcf_attr + '_' + zcf_rank + '_' + zcf_rank_list).remove();

	  // Rules
	  $('.zcf_rules_options_' + zcf_attr + '_' + zcf_rank + '_' + zcf_rank_list).parent('.zcf_label').remove();
	  $('.zcf_rules_if_' + zcf_attr + '_' + zcf_rank + ' option[value="' + zcf_attr + '_' + zcf_rank + '_' + zcf_rank_list + '"]').remove();

	});

// Change activity state hidden field FOR Select/Checkbox/Radio
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_change_checkbox', function(){

	  $(this).next().val(String($(this).prop('checked')));
	  
	});

// Change activity checked FOR Select/Checkbox/Radio
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_list_check', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = $(this).closest('tr').find('.zcf_list_title').attr('data-num-value');

	  if($.inArray(zcf_add_block_type, ['select', 'checkbox']) != -1 && zcf_closest_block.find('.zcf_list_check:checked').length > zcf_closest_block.find('.zcf_max_count').val() && zcf_closest_block.find('.zcf_max_count').val() > 0){
		zcf_closest_block.find('.zcf_max_count option[value="' + zcf_closest_block.find('.zcf_list_check:checked').length + '"]').prop('selected', true);
	  }

	  if($(this).prop('checked')){
		zcf_num = true;
	  }else{
		zcf_num = false;
	  }

	  switch(zcf_add_block_type){
		case 'select':
		  zcf_readonly = true;
		  if($(this).closest('.zcf_block').find('.zcf_select_multi').prop('checked')){
			zcf_readonly = false;
		  }else{
			if($(this).closest('.zcf_block').find('.zcf_body_row').find('.zcf_list_check:checked').length === 0){
			  zcf_readonly = false;
			}
		  }
		  $(this).closest('.zcf_block').find('.zcf_list_check').not($(this)).attr('disabled', zcf_readonly);
		  $('.zcf_container_list_label_' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_attr).prop('selected', zcf_num);
		  break;
		case 'radio':
		  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_rank).prop('checked', false);
		  zcf_closest_block.find('.zcf_list_check').not($(this)).next().val('false');
		  break;
	  }
	  
	  $(this).next().val(zcf_num);

	  $('.zcf_container_list_label_' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_attr).find('input').prop('checked', zcf_num);

	  changeMaxLimitPoints(zcf_add_block_type, zcf_rank);

	  $('.zcf_preview_form .zcf_container_field_' + zcf_add_block_type + '_' + zcf_rank).trigger('change.zcf');

	});


// Enter title field checkbox/radio/select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_list_title', function(){

	  zcf_title = $(this).val();
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_num = $(this).attr('data-num-value');

	  if(zcf_title.length > 20){
		zcf_title = zcf_title.substr(0, 20) + '...';
	  }else if(zcf_title.length === 0){
		zcf_title = zcf_add_block_type + '-' + zcf_rank + '-' + zcf_num;
	  }

	  // Preview
	  $('.zcf_container_title_label_' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_num).text($(this).val());

	  if(zcf_add_block_type === 'rating'){
		createRatingPreview(zcf_closest_block);
	  }

	  // Redirect
	  $('.zcf_redirection_rules_options').each(function(index, element){

		if($(element).children('option[value="' + zcf_add_block_type + '_' + zcf_rank + '"]').prop('selected')){
		  $(element).closest('tr').find('.zcf_redirection_rules_options_list option[value="' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_num + '"]').text(zcf_title);
		}

	  });

	  // Rules
	  $('.zcf_rules_if_' + zcf_add_block_type + '_' + zcf_rank + ' option[value="' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_num + '"]').text(zcf_title);
	  $('.zcf_rules_options_' + zcf_add_block_type + '_' + zcf_rank + '_' + zcf_num).text(zcf_title);

	});


// Change default value field select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_select_default', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();


	  switch($(this).val()){
		case '1':
		  zcf_closest_block.find('.zcf_select_default_value').attr('readonly', false).val('');
		  zcf_closest_block.find('.zcf_body_row').find('.zcf_list_check').prop('checked', false).attr('disabled', true);
		  zcf_closest_block.find('.zcf_body_row').find('.zcf_list_check').next().val('false');
		  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_rank).prepend($('<option/>', {'class': 'zcf_container_item_' + zcf_add_block_type + '_' + zcf_rank}).prop('selected', true));
		  zcf_closest_block.find('.zcf_min_count, .zcf_max_count').css('display', 'none');
		  break;
		case '2':
		  zcf_closest_block.find('.zcf_select_default_value').attr('readonly', true).val('');
		  zcf_closest_block.find('.zcf_body_row').find('.zcf_list_check').prop('checked', false).attr('disabled', false);
		  zcf_closest_block.find('.zcf_body_row').find('.zcf_list_check').next().val('false');
		  $('.zcf_container_item_' + zcf_add_block_type + '_' + zcf_rank).remove();
		  if(zcf_closest_block.find('.zcf_select_multi').prop('checked')){
			zcf_closest_block.find('.zcf_min_count, .zcf_max_count').css('display', 'block');
		  }
		  break;
	  }

	});


// Input default value field select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_select_default_value', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  $('.zcf_container_item_' + zcf_add_block_type + '_' + zcf_rank).text($(this).val());

	});


// Change multiple field select
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_select_multi', function(){

	  zcf_block = $(this).closest('.zcf_block');
	  zcf_attr = zcf_block.find('.zcf_select_default').val();

	  zcf_add_block_type = zcf_block.find('[name="field[]"]').val();
	  zcf_num = zcf_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_element = $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num);

	  // Reload Checkbox Selected
	  if(zcf_attr === '2'){
		var zcf_list = zcf_block.find('.zcf_list_check');
		var zcf_list_checked = zcf_block.find('.zcf_list_check:checked');
		zcf_list.attr('disabled', false);

		if(!$(this).prop('checked')){

		  if(zcf_list_checked.length > 1){
			zcf_list.prop('checked', false);
			zcf_list.next().val('false');
		  }else if(zcf_list_checked.length === 1){
			zcf_list.not(zcf_list_checked).next().val('false');
			zcf_list.not(zcf_list_checked).prop('checked', false).attr('disabled', true);
		  }else{
			zcf_list.prop('checked', false);
			zcf_list.next().val('false');
		  }
		}

	  }

	  // Show/Hide Select Limit
	  if($(this).prop('checked') && zcf_attr === '2'){
		zcf_display = 'block';
	  }else{
		zcf_display = 'none';
	  }
	  zcf_block.find('.zcf_min_count, .zcf_max_count').css('display', zcf_display);


	  // Style And Selected Points
	  if($(this).prop('checked')){
		zcf_attr = true;

		zcf_element.css('height', $('.zcf_style_height_textarea_value').val() + $('.zcf_style_height_textarea_unit').val());
	  }else{
		zcf_attr = false;
		zcf_element.children().prop('selected', false);
		zcf_element.css('height', $('.zcf_style_height_value').val() + $('.zcf_style_height_unit').val());

	  }

	  zcf_element.attr('multiple', zcf_attr);

	  // Rebuild Rulles Blocks Options
	  var zcf_attr_num = zcf_add_block_type + '_' + zcf_num;
	  zcf_element = [zcf_add_block_type, zcf_num];
	  var zcf_prop = $(this).prop('checked');

	  $('.zcf_rules_block_list').each(function(index, element){

		zcf_num = $(element).attr('data-zcf-num');

		if($(element).find('.zcf_rules_if_condition').val() !== '||' && $(element).find('.zcf_rules_if_field').val() === zcf_attr_num){
		  $(element).find('.zcf_rules_if_action').empty();

		  if(zcf_prop){

			rulesMultipleOptions($(element), zcf_attr_num, zcf_element, zcf_num, 'if');

		  }else{

			rulesListOptions($(element), zcf_attr_num, zcf_element, zcf_num);
		  }
		}

	  });

	});


// Change Max Limit Points
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$(".zcf_preview_form").on('change', '.zcf_limit_list', function(){

	  changeMaxLimitPoints($(this).attr('zcf_type_attr'), $(this).attr('zcf_num_attr'));

	});

  });

  var changeMaxLimitPoints = function(ftype, fnum){

	zcf_block = $('.zcf_field_template_' + ftype + '_' + fnum);
	zcf_length = zcf_block.find('.zcf_max_count').val();

	switch(ftype){

	  case 'select':

		$('.zcf_container_block_' + ftype + '_' + fnum).find('option').attr('disabled', false);

		if(zcf_length < $('.zcf_container_block_' + ftype + '_' + fnum).find('option:selected').length && zcf_length != 0){
		  $('.zcf_container_block_' + ftype + '_' + fnum).find('option').prop('selected', false);
		}

		if(zcf_length > 0 && zcf_length == $('.zcf_container_block_' + ftype + '_' + fnum).find('option:selected').length && zcf_block.find('.zcf_select_multi').prop('checked')){
		  zcf_attr = true;
		}else{
		  zcf_attr = false;
		}
		$('.zcf_container_block_' + ftype + '_' + fnum).find('option').not(':selected').attr('disabled', zcf_attr);

		break;

	  case 'checkbox':

		$('.zcf_container_block_' + ftype + '_' + fnum).find('input').attr('disabled', false);

		if(zcf_length > 0 && zcf_length == $('.zcf_container_block_' + ftype + '_' + fnum).find('input:checked').length){
		  zcf_attr = true;
		}else{
		  zcf_attr = false;
		}
		$('.zcf_container_block_' + ftype + '_' + fnum).find('input').not(':checked').attr('disabled', zcf_attr);

		break;

	}

  };

})(jQuery);
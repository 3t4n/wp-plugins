(function($){

  'use strict';
  $(function(){

// Selecting type redirection rules
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_redirection_rules', function(){

	  zcf_attr = $(this).val();
	  $('.zcf_redirection_one_page, .zcf_options_table_list_more').css('display', 'none');
	  $('.zcf_redirection_one_page input').empty();
	  if(zcf_attr === ''){
		return;
	  }

	  switch(zcf_attr){
		case 'one':

		  $('.zcf_redirection_one_page').css('display', 'table-row');
		  break;
		case 'more':

		  if($('.zcf_redirection_more_page .zcf_redirection_rules_options option').length > 1){
			$('.zcf_options_table_list_more').css('display', 'table');
		  }else{
			zcfMessageAlert(zcf_message.confirm_title, zcf_admin_message.redirection_rules, 'orange');
			$('.zcf_redirection_rules option[value=""]').prop('selected', true);
		  }

		  break;
	  }

	});


// Add line redirection rules
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('click', '.zcf_redirection_rules_add_clone_row', function(){

	  zcf_clone_row = $('.zcf_redirection_more_page').clone(true);
	  zcf_clone_row.removeAttr('class');
	  zcf_clone_row.find('.zcf_redirection_rules_options_list option').not('option[value=""]').remove();
	  zcf_clone_row.find('select option[value=""]').prop('selected', true);
	  zcf_clone_row.find('input').val('');
	  zcf_clone_row.find('td').last().empty().append($('<button/>', {'class': 'button zcf_list_remove_row'}).append($('<span/>', {'class': 'dashicons dashicons-minus'})));
	  $('.zcf_redirection_more_body_row').append(zcf_clone_row);
	});


// Change redirection rules line
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_redirection_rules_options', function(){

	  $(this).closest('tr').find('.zcf_redirection_rules_options_list option').not('option[value=""]').remove();
	  if($(this).val() === ""){
		return;
	  }

	  zcf_num = $(this);
	  zcf_attr = $(this).val().split('_');
	  $('.zcf_field_template_' + $(this).val()).find('.zcf_list_title').each(function(index, element){

		zcf_title = $(this).val() !== '' ? $(this).val() : zcf_attr[0] + '-' + zcf_attr[1] + '-' + $(element).attr('data-num-value');
		$(zcf_num).closest('tr').find('.zcf_redirection_rules_options_list')
			.append($('<option/>', {value: $(zcf_num).val() + '_' + $(element).attr('data-num-value'), text: zcf_title}));
	  });
	});


// Add field rules
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('click', '.zcf_rules_field_block', function(){

	  if($('.zcf_container').children().length > 0){

		var zcf_options = '<option value="">' + zcf_rules_title.select_field + '</option>';
		$('.zcf_container').children().each(function(index, element){
		  zcf_attr = $(element).find('[name="field[]"]').val();
		  zcf_options += '<option value="' + zcf_attr + '_' + $(element).find('.zcf_' + zcf_attr + '_rank').val() + '">' + $(element).find('.zcf_input_title').text() + '</option>';
		});

		zcf_num = ++zcf_field_list['rules'];
		$('.zcf_rules_block')
			.append($('<div/>', {'class': 'zcf_rules_block_list zcf_rbl_' + zcf_num, 'data-zcf-num': zcf_num})
				.append($('<input/>', {'class': 'zcf_rules_field_type', type: 'hidden', value: 'text', name: 'rules_if_field_type[' + zcf_num + ']'}))
				.append($('<table/>', {'class': 'zcf_rules_title_table'})
					.append($('<tr/>')
						.append($('<td/>')
							.append($('<b/>', {text: zcf_rules_title.rule_title + ' # ' + (Number($('.zcf_rules_block_list').length) + 1)}))
							)
						.append($('<td/>')
							.append($('<button/>', {type: 'button', 'class': 'button zcf_show_hide_block', 'data-zcf-state-form': 'on'})
								.append($('<span/>', {'class': 'dashicons dashicons-minus'}))
								)
							.append($('<button/>', {type: 'button', 'class': 'button zcf_rules_remove_row'})
								.append($('<span/>', {'class': 'dashicons dashicons-no'}))
								)
							)
						)
					)
				.append($('<table/>', {'class': 'zcf_rules_table'})
					.append($('<tr/>')
						.append($('<td/>', {text: zcf_rules_title.if}))
						.append($('<td/>')
							.append($('<select/>', {'class': 'zcf_rules_if_field zcf_rules_field_title', name: 'rules_if[' + zcf_num + ']', html: zcf_options}))
							)
						.append($('<td/>', {'class': 'zcf_rules_if_condition_block'}))
						.append($('<td/>', {'class': 'zcf_rules_if_action'})))
					.append($('<tr/>')
						.append($('<td/>', {text: zcf_rules_title.then}))
						.append($('<td/>')
							.append($('<select/>', {'class': 'zcf_rules_then', name: 'rules_action[' + zcf_num + ']'})
								.append($('<option/>', {value: 'show', 'data-zcf-attr': zcf_rules_title.hide, text: zcf_rules_title.show}))
								.append($('<option/>', {value: 'hide', 'data-zcf-attr': zcf_rules_title.show, text: zcf_rules_title.hide}))
								)
							)
						.append($('<td/>'))
						.append($('<td/>')
							.append($('<div/>')
								.append($('<select/>', {'class': 'zcf_rules_then_field zcf_rules_field_title', name: 'rules_then[' + zcf_num + ']', html: zcf_options}).attr('disabled', true))
								)
							.append($('<div/>', {'class': 'zcf_rules_then_action'})

								)

							)
						)
					.append($('<tr/>')
						.append($('<td/>', {text: zcf_rules_title.else}))
						.append($('<td/>', {'class': 'zcf_rules_else_title', colspan: 3})
							)
						)
					)
				);
	  }else{
		zcfMessageAlert(zcf_message.confirm_title, zcf_admin_message.fields_rules, 'orange');
	  }

	});


// Add Rules Row Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('click', '.zcf_rules_add_options', function(){

	  zcf_clone_row = $(this).closest('tr').clone(true);
	  zcf_clone_row.find('input').val('');
	  zcf_clone_row.find('td').last().empty().append($('<button/>', {'class': 'button zcf_list_remove_row'}).append($('<span/>', {'class': 'dashicons dashicons-minus'})));
	  $(this).closest('.zcf_rules_table_options').append(zcf_clone_row);
	  zcf_closest_block = $(this).closest('.zcf_rules_block_list');
	  zcf_element = zcf_closest_block.find('.zcf_rules_if_field').val();
	  zcf_attr = zcf_element.split('_');
	  if(zcf_attr[0] === 'datetime'){
		zcf_closest_block.find('.zcf_rules_if_' + zcf_element).datetimepicker('destroy');
		rulesDatetime(zcf_closest_block, $('.zcf_field_template_' + zcf_element).find('.zcf_datetime_type').val());
	  }

	});


// Remove Rules Block
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('click', '.zcf_rules_remove_row', function(){

	  var th = $(this);
	  $.confirm({
		title: zcf_message.confirm_title,
		content: zcf_admin_message.rule_remove + '?',
		type: 'orange',
		boxWidth: '30%',
		useBootstrap: false,
		animateFromElement: false,
		backgroundDismiss: true,
		buttons: {
		  btnOk: {
			text: zcf_message.ok,
			btnClass: 'button button-primary zcf_style_button_alert_none',
			keys: ['enter'],
			action: function(){
			  th.closest('.zcf_rules_block_list').remove();
			  $('.zcf_rules_title_table td:first-child b').each(function(index, element){
				$(element).text(zcf_rules_title.rule_title + ' # ' + (Number(index) + 1));
			  });
			  setRulesForPreview();
			}
		  },
		  btnCancel: {
			text: zcf_message.cancel,
			btnClass: 'button button-default zcf_style_button_alert_none'
		  }
		}
	  });
	});


// Change Rules Field Condition IF
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_if_condition', function(){

	  zcf_closest_block = $(this).closest('.zcf_rules_block_list');// rules block
	  zcf_add_block_type = zcf_closest_block.find('.zcf_rules_if_field').val();
	  zcf_block = $('.zcf_field_template_' + zcf_add_block_type);// field block
	  zcf_element = zcf_add_block_type.split('_');
	  if((zcf_element[0] === 'select' && !zcf_block.find('.zcf_select_multi').prop('checked')) || $.inArray(zcf_element[0], ['radio', 'rating']) != -1){

		zcf_num = zcf_closest_block.attr('data-zcf-num');// rules block num
		zcf_closest_block.find('.zcf_rules_if_action').empty();
		if($(this).val() === '||'){
		  rulesMultipleOptions(zcf_closest_block, zcf_add_block_type, zcf_element, zcf_num, 'if');
		}else{
		  rulesListOptions(zcf_closest_block, zcf_add_block_type, zcf_element, zcf_num);
		}

	  }

	});


// Change Field IF
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_if_field', function(){

	  var zcf_attr_num = $(this).val();
	  zcf_element = $(this).val().split('_');
	  zcf_closest_block = $(this).closest('.zcf_rules_block_list');// rules block
	  zcf_num = zcf_closest_block.attr('data-zcf-num');// rules block num
	  zcf_block = $('.zcf_field_template_' + $(this).val());// field block

	  zcf_closest_block.find('.zcf_rules_if_action, .zcf_rules_if_condition_block').empty();
	  if(zcf_attr_num === ''){
		zcf_closest_block.find('.zcf_rules_then_field').prop("selectedIndex", 0).attr('disabled', true);
		zcf_closest_block.find('.zcf_rules_then_action, .zcf_rules_else_title').empty();
	  }else{
		zcf_closest_block.find('.zcf_rules_then_field').attr('disabled', false);
		switch(zcf_element[0]){
		  case 'text':
		  case 'textarea':
		  case 'datetime':

			var zcf_input_field_type = (zcf_block.find('.zcf_text_field_type').val() === 'number' ? 'number' : 'text');
			var zcf_input_field_type_list = (zcf_block.find('.zcf_text_field_type').val() === 'number' ? 'number' : zcf_element[0]);
			var zcf_conditions = '';
			for(var i in zcfRulesConditions[zcf_input_field_type_list]){
			  var d = zcfRulesConditions[zcf_input_field_type_list][i];
			  zcf_conditions += '<option value="' + i + '">' + d + '</option>';
			}

			zcf_closest_block.find('.zcf_rules_field_type').val(zcf_input_field_type);

			zcf_closest_block.find('.zcf_rules_if_action')
				.append($('<table/>', {'class': 'zcf_rules_table_options zcf_rules_table_options_' + zcf_attr_num})
					.append($('<tr/>')
						.append($('<td/>', {'class': 'zcf_rules_if_condition_block_list'})
							.append($('<select/>', {'class': 'zcf_rules_if_condition_list ', name: 'rules_if_condition[' + zcf_num + '][]', html: zcf_conditions}))
							)
						.append($('<td/>')
							.append($('<input/>', {'class': 'zcf_rules_point zcf_rules_if_' + $(this).val(), type: zcf_input_field_type, name: 'rules_if_options[' + zcf_num + '][]'}))
							)
						.append($('<td/>')
							.append($('<button/>', {type: 'button', 'class': 'button zcf_rules_add_options', 'data-zcf-attr': zcf_attr_num})
								.append($('<span/>', {'class': 'dashicons dashicons-plus'}))
								)
							)
						)
					);
			if(zcf_element[0] === 'datetime'){
			  rulesDatetime(zcf_closest_block, zcf_block.find('.zcf_datetime_type').val());
			}
			break;
		  case 'select':

			rulesConditions(zcf_closest_block, zcf_num, zcf_element[0]);
			if(zcf_block.find('.zcf_select_multi').prop('checked')){

			  rulesMultipleOptions(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num, 'if');
			}else{

			  rulesListOptions(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num);
			}

			break;
		  case 'checkbox':

			rulesConditions(zcf_closest_block, zcf_num, zcf_element[0]);
			rulesMultipleOptions(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num, 'if');
			break;
		  case 'radio':
		  case 'rating':

			rulesConditions(zcf_closest_block, zcf_num, zcf_element[0]);
			rulesListOptions(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num);
			break;
		  case 'file':
		  case 'accept':

			rulesConditions(zcf_closest_block, zcf_num, zcf_element[0]);
			zcf_closest_block.find('.zcf_rules_if_action')
				.append($('<select/>', {'class': 'zcf_rules_point', name: 'rules_if_options[' + zcf_num + ']'})
					.append($('<option/>', {value: 'true', text: zcf_rules_title.selected}))
					.append($('<option/>', {value: 'false', text: zcf_rules_title.not_selected}))
					);
			break;
		}

	  }

	});


// Change Field THEN
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_then_field', function(){

	  var zcf_attr_num = $(this).val();
	  zcf_element = $(this).val().split('_');
	  zcf_closest_block = $(this).closest('.zcf_rules_block_list');// rules block
	  zcf_num = zcf_closest_block.attr('data-zcf-num');// rules block num

	  zcf_closest_block.find('.zcf_rules_then_action').empty();

	  switch(zcf_element[0]){
		case 'select':
		case 'checkbox':
		case 'radio':

		  rulesMultipleOptions(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num, 'then');
		  break;
	  }

	});


// Check All Checkbox Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_all_checked', function(){

	  zcf_closest_block = $(this).closest('td');
	  if($(this).prop('checked')){
		zcf_closest_block.find('input[type="checkbox"]').prop('checked', true);
	  }else{
		zcf_closest_block.find('input[type="checkbox"]').prop('checked', false);
	  }

	});


// Check One Checkbox Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_checked', function(){

	  zcf_closest_block = $(this).closest('td');
	  if(zcf_closest_block.find('.zcf_rules_checked:checked').length === zcf_closest_block.find('.zcf_rules_checked').length){
		zcf_closest_block.find('.zcf_rules_all_checked').prop('checked', true);
	  }else{
		zcf_closest_block.find('.zcf_rules_all_checked').prop('checked', false);
	  }

	});


// Change Rules Action Else Title
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_logic").on('change', '.zcf_rules_then, .zcf_rules_then_field', function(){

	  zcf_closest_block = $(this).closest('.zcf_rules_block_list');
	  zcf_closest_block.find('.zcf_rules_else_title').empty();
	  if(zcf_closest_block.find('.zcf_rules_then_field').val() === ''){
		return;
	  }

	  zcf_element = zcf_closest_block.find('.zcf_rules_then_field').val().split('_');
	  switch(zcf_element[0]){
		case 'select':
		case 'checkbox':
		case 'radio':

		  zcf_attr = zcf_rules_title.field_values;
		  break;
		default:

		  zcf_attr = zcf_rules_title.field;
		  break;
	  }

	  zcf_title = zcf_closest_block.find('.zcf_rules_then option:selected').attr('data-zcf-attr');
	  zcf_closest_block.find('.zcf_rules_else_title').html('<b>' + zcf_title + '</b> ' + zcf_attr + ' <b>' + zcf_closest_block.find('.zcf_rules_then_field option:selected').text() + '</b>');
	});


// CHANGE Set Rules For Preview
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_logic").on('change', '.zcf_rules_if_field, .zcf_rules_if_condition, .zcf_rules_if_condition_list, .zcf_rules_then, .zcf_rules_then_field, .zcf_rules_point, .zcf_rules_all_checked', setRulesForPreview);


// CLICK Set Rules For Preview
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_logic").on('click', '.zcf_rules_add_options, .zcf_rules_remove_row', setRulesForPreview);


//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  });


  setRulesForPreview = function(){

	var zcf_rules_list = [];
	$('.zcf_preview_form *').off('.zcf');
	$('.zcf_preview_form .zcf_hider_rules').prop('disabled', false).removeClass('zcf_hider_rules');
	$('.zcf_rhidden').val('false');
	$('.zcf_rules_block .zcf_rules_if_field option:selected').not('[value=""]').each(function(index, element){
	  zcf_rules_list[$(this).val()] = $(this).val();
	});

	// IF Field
	for(var key in zcf_rules_list){

	  var field = zcf_rules_list[key];
	  var zcf_key = field.split('_');
	  var evn = 'change';

	  switch(zcf_key[0]){

		case 'text':
		case 'textarea':


		  $('.zcf_preview_form .zcf_container_field_' + field).on('input.zcf', {'field': field}, function(event){

			var global_rules = [];
			var global_num = 0;
			var global_value = $(this).val();
			var global_type = ($(this).attr('type') === 'number' ? 'Number' : 'String');
			$('.zcf_rules_block .zcf_rules_if_field option[value="' + event.data.field + '"]:selected').closest('.zcf_rules_block_list').each(function(idx, rules){

			  var if_condition_or = [];
			  var if_condition_other = [];
			  // Generate Condition IF
			  $(rules).find('.zcf_rules_if_condition_list').each(function(index, element){

				var v = $(rules).find('.zcf_rules_if_action .zcf_rules_point').eq(index).val();
				if($(this).val() === '||'){
				  if_condition_or.push(global_type + '("' + global_value + '")==' + global_type + '("' + v + '")');
				}else{
				  if_condition_other.push(global_type + '("' + global_value + '")' + $(this).val() + global_type + '("' + v + '")');
				}

			  });
			  // Generate Condition IF and THEN
			  global_rules[global_num] = ifThenRulesCondition(rules, if_condition_or, if_condition_other);
			  global_num++;
			});

			// Run Rules Actions
			runRulesActions(global_rules);
		  });

		  evn = 'input';

		  break;
		case 'datetime':


		  $('.zcf_preview_form .zcf_container_field_' + field).off('blur');
		  $('.zcf_preview_form .zcf_container_field_' + field).on('change.zcf', {'field': field}, function(event){

			var global_rules = [];
			var global_num = 0;
			var global_type = $('.zcf_field_template_' + event.data.field).find('.zcf_datetime_type').val();
			var global_value = ($(this).val() == '' || $(this).val() === null ? null : setDateTimeValue($(this).datetimepicker('getValue'), global_type));

			$('.zcf_rules_block .zcf_rules_if_field option[value="' + event.data.field + '"]:selected').closest('.zcf_rules_block_list').each(function(idx, rules){

			  var if_condition_or = [];
			  var if_condition_other = [];
			  // Generate Condition IF
			  $(rules).find('.zcf_rules_if_condition_list').each(function(index, element){

				var v = $(rules).find('.zcf_rules_if_action .zcf_rules_point').eq(index);
				v = (v.val() == '' || v.val() === null ? null : setDateTimeValue(v.datetimepicker('getValue'), global_type));

				if($(this).val() === '||'){
				  if_condition_or.push(global_value + '==' + v);
				}else{
				  if_condition_other.push(global_value + $(this).val() + v);
				}

			  });
			  // Generate Condition IF and THEN
			  global_rules[global_num] = ifThenRulesCondition(rules, if_condition_or, if_condition_other);
			  global_num++;
			});

			// Run Rules Actions
			runRulesActions(global_rules);
		  });
		  break;


		case 'select':
		case 'checkbox':
		case 'radio':
		case 'rating':


		  $('.zcf_preview_form .zcf_container_field_' + field).on('change.zcf', {'field': field}, function(event){

			var global_rules = [];
			var global_num = 0;
			var global_field = event.data.field.split('_');
			var global_type = ($.inArray(global_field[0], ['select', 'rating']) ? ' option:selected' : ':checked');
			var global_value = $.map($(this).closest('.zcf_container_block').find('.zcf_container_field_' + event.data.field + '' + global_type), function(e){
			  return event.data.field + '_' + e.value;
			});
			$('.zcf_rules_block .zcf_rules_if_field option[value="' + event.data.field + '"]:selected').closest('.zcf_rules_block_list').each(function(idx, rules){

			  var if_condition_or = [];
			  var if_condition_other = [];
			  var if_condition = $(rules).find('.zcf_rules_if_condition').val();
			  var select_multi = $('.zcf_field_template_' + event.data.field).find('.zcf_select_multi').prop('checked');

			  // Generate Condition IF
			  if(if_condition === '==' && $.inArray(global_field[0], ['select', 'radio', 'rating']) != -1 && !select_multi){
				if_condition_other.push($.inArray($(rules).find('.zcf_rules_if_action .zcf_rules_point').val(), global_value) != -1);
			  }else{
				$(rules).find('.zcf_rules_if_action .zcf_rules_point:checked').each(function(index, element){
				  if(if_condition === '||'){
					if_condition_or.push($.inArray($(this).val(), global_value) != -1);
				  }else{
					if_condition_other.push($.inArray($(this).val(), global_value) != -1);
				  }

				});
			  }
			 
			  // Generate Condition IF and THEN
			  global_rules[global_num] = ifThenRulesCondition(rules, if_condition_or, if_condition_other);
			  global_num++;
			});

			// Run Rules Actions
			runRulesActions(global_rules);
		  });
		  break;


		case 'file':
		case 'accept':


		  $('.zcf_preview_form .zcf_container_field_' + field).on('change.zcf', {'field': field}, function(event){

			var global_rules = [];
			var global_num = 0;
			var global_value = String(event.data.field.split('_')[0] === 'file' ? ($(this).val() !== '') : $(this).prop('checked'));
			$('.zcf_rules_block .zcf_rules_if_field option[value="' + event.data.field + '"]:selected').closest('.zcf_rules_block_list').each(function(idx, rules){

			  var if_condition_other = [$(rules).find('select.zcf_rules_point').val() == global_value];
			  // Generate Condition IF and THEN
			  global_rules[global_num] = ifThenRulesCondition(rules, [], if_condition_other);
			  global_num++;
			});

			// Run Rules Actions
			runRulesActions(global_rules);
		  });
		  break;
	  }

	  $('.zcf_preview_form .zcf_container_field_' + field).trigger(evn + '.zcf');

	}
  };


//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  var ifThenRulesCondition = function(rules, if_condition_or, if_condition_other){

	var if_condition = [];
	var then_rule_point = [];
	if(if_condition_other.length > 0){
	  if_condition.push('(' + if_condition_other.join(' && ') + ')');
	}
	if(if_condition_or.length > 0){
	  if_condition.push('(' + if_condition_or.join(' || ') + ')');
	}

	// Generate Points THEN
	if($(rules).find('.zcf_rules_then_action .zcf_rules_point').length > 0){

	  then_rule_point = $.map($(rules).find('.zcf_rules_then_action .zcf_rules_point:checked'), function(e){
		return e.value;
	  });
	}

	return {
	  'if_condition': if_condition.join(' || '),
	  'then_rule': $(rules).find('.zcf_rules_then').val(),
	  'then_rule_field': $(rules).find('.zcf_rules_then_field').val(),
	  'then_rule_point': then_rule_point
	};
  };


//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  var runRulesActions = function(global_rules){

	var global_action = {'hide': 'show', 'show': 'hide'};
	for(var k in global_rules){
	  var r = global_rules[k];

	  if(r.if_condition.length > 0){
		if(eval('(' + r.if_condition + ' ? true : false)')){

		  thenRulesForPreview(r.then_rule, r.then_rule_field, r.then_rule_point);
		}else{

		  thenRulesForPreview(global_action[r.then_rule], r.then_rule_field, r.then_rule_point);
		}
	  }

	}

  };


//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  var thenRulesForPreview = function(action, field, points){

	var key = field.split('_');
	switch(key[0]){
	  case 'text':
	  case 'textarea':
	  case 'datetime':
	  case 'file':
	  case 'accept':
	  case 'rating':

		if(action === 'hide'){
		  $('.zcf_container_block_' + field).addClass('zcf_hider_rules');
		}else{
		  $('.zcf_container_block_' + field).removeClass('zcf_hider_rules');
		}

		break;
	  case 'select':
	  case 'checkbox':
	  case 'radio':

		// Display Points
		for(var i in points){
		  var p = points[i];

		  if(action === 'hide'){
			$('.zcf_container_list_label_' + p).addClass('zcf_hider_rules').prop('disabled', true);
		  }else{
			$('.zcf_container_list_label_' + p).removeClass('zcf_hider_rules').prop('disabled', false);
		  }

		}

		// Display General Block
		var l_list = $('.zcf_container_block_' + field).find('input, option:not([value=""])').length;
		if((l_list === points.length && action !== 'show') || $('.zcf_container_block_' + field).find('.zcf_hider_rules').length >= l_list){

		  $('.zcf_container_block_' + field).addClass('zcf_hider_rules');

		}else{
		  $('.zcf_container_block_' + field).removeClass('zcf_hider_rules');
		}

		if(key[0] === 'select' && $('.zcf_preview_form .zcf_container_field_' + field + ' option:selected').prop('disabled')){
		  $('.zcf_preview_form .zcf_container_field_' + field + ' option').not('[disabled]').eq(0).prop('selected', true);
		}

		break;
	}

  };
})(jQuery);
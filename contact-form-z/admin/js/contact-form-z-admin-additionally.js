(function($){

  'use strict';

// Check Float Value
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  checkFloat = function(number){

	var z_num = number.val();

	if(!z_num.match(/^(0|[1-9]\d*)(\.\d+)?$/)){
	  z_num = 0;
	}

	number.val(z_num);

	return z_num;

  };

// Convert HEX to RGB
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  hexToRGB = function(hex){
	var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	return result ? {
	  r: parseInt(result[1], 16),
	  g: parseInt(result[2], 16),
	  b: parseInt(result[3], 16)
	} : null;
  };

// Alert Message
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  zcfMessageAlert = function(m_title, m_content, m_type){

	$.alert({
	  title: m_title,
	  content: m_content,
	  type: m_type,
	  boxWidth: '30%',
	  useBootstrap: false,
	  animateFromElement: false,
	  buttons: {
		btnOk: {
		  text: zcf_message.ok,
		  keys: ['enter'],
		  btnClass: 'button button-primary zcf_style_button_alert_none'
		}
	  }
	});

  };

// Success Message
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  zcfMessageSuccess = function(m_title, m_content, m_action){

	$.alert({
	  title: m_title,
	  content: m_content,
	  type: 'green',
	  boxWidth: '30%',
	  useBootstrap: false,
	  animateFromElement: false,
	  buttons: {
		btnOk: {
		  text: zcf_message.ok,
		  keys: ['enter'],
		  btnClass: 'button button-primary zcf_style_button_alert_none',
		  action: function(){
			if(m_action !== ''){
			  location.href = zcf_admin_url + m_action;
			}else{
			  location.reload();
			}
		  }
		}
	  }
	});

  };


// Create Mail and Redirect Block
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  mailAndRedirectBlock = function(block_title, block_type, block_element, block_num){

	// Add mail editor
	switch(block_type){
	  case 'file':
		$("#zcf_mail").find('.zcf_mail_template').each(function(index, element){
		  zcf_rank = $(element).find('[name="mail_template[]"]').val();
		  $(element).find('.zcf_add_mail_list_file')
			  .append($('<tr/>', {'class': 'zcf_mail_field_' + block_element})
				  .append($('<td/>').text(block_title))
				  .append($('<td/>')
					  .append($('<label/>', {'class': 'zcf_label'})
						  .append($('<input/>', {type: 'checkbox', name: 'mail_file[' + zcf_rank + '][]', value: block_num}))
						  .append($('<span/>', {'class': 'zcf_check_admin zcf_check_admin_checkbox'}))
						  )
					  )
				  );
		});
		break;
	  case 'accept':
	  case 'button':
		break;
	  default:
		$('.zcf_mail_field_list_body')
			.append($('<tr/>', {'class': 'zcf_mail_field_' + block_element})
				.append($('<td/>').text(block_title))
				.append($('<td/>', {'class': 'zcf_shortcode'}).text('[' + block_type + '-' + block_num + ']'))
				);
		break;
	}

	// Add redirection rules
	switch(block_type){
	  case 'checkbox':
	  case 'radio':
	  case 'select':
	  case 'rating':
		$('.zcf_redirection_rules_options').append($('<option/>', {text: block_title, value: block_element}));
		break;
	}

	// Add redirection rules
	switch(block_type){
	  case 'text':
	  case 'textarea':
		$('.zcf_akismet_param').append($('<option/>', {text: block_title, value: block_element}));
		break;
	}

  };


// Create Rules List Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  rulesListOptions = function(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num){

	zcf_attr = '';

	$('.zcf_field_template_' + zcf_attr_num).find('.zcf_list_title').each(function(index, element){

	  zcf_title = $(this).val() !== '' ? $(this).val() : zcf_element[0] + '-' + zcf_element[1] + '-' + $(element).attr('data-num-value');

	  zcf_attr += '<option value="' + zcf_attr_num + '_' + $(element).attr('data-num-value') + '">' + zcf_title + '</option>';

	});

	zcf_closest_block.find('.zcf_rules_if_action')
		.append($('<select/>', {'class': 'zcf_rules_point zcf_rules_if_' + zcf_attr_num, name: 'rules_if_options[' + zcf_num + ']', html: zcf_attr}));

  };


// Create Rules Multiple Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  rulesMultipleOptions = function(zcf_closest_block, zcf_attr_num, zcf_element, zcf_num, zcf_prefix){

	zcf_closest_block.find('.zcf_rules_' + zcf_prefix + '_action')
		.append($('<input/>', {type: 'hidden', name: 'rules_' + zcf_prefix + '_multi[' + zcf_num + ']'}))
		.append($('<div/>', {'class': 'zcf_rules_' + zcf_prefix + '_block_' + zcf_attr_num}));


	zcf_closest_block.find('.zcf_rules_' + zcf_prefix + '_block_' + zcf_attr_num)
		.append($('<label/>', {'class': 'zcf_label zcf_rules_all_title_checked'})
			.append($('<label/>', {text: zcf_rules_title.all}))
			.append($('<input/>', {
			  'class': 'zcf_rules_all_checked',
			  type: 'checkbox',
			  name: 'rules_' + zcf_prefix + '_all_options[' + zcf_num + ']'
			}))
			.append($('<span/>', {'class': 'zcf_check_admin zcf_check_admin_checkbox'}))
			);

	$('.zcf_field_template_' + zcf_attr_num).find('.zcf_list_title').each(function(index, element){

	  zcf_title = $(this).val() !== '' ? $(this).val() : zcf_element[0] + '-' + zcf_element[1] + '-' + $(element).attr('data-num-value');

	  rulesMultipleOptionsOne(zcf_closest_block, zcf_attr_num, zcf_num, zcf_prefix, zcf_title, $(element).attr('data-num-value'));

	});

  };


// Create Rules Multiple Options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  rulesMultipleOptionsOne = function(zcf_closest_block, zcf_attr_num, zcf_num, zcf_prefix, zcf_title, zcf_element_rank){

	zcf_closest_block.find('.zcf_rules_' + zcf_prefix + '_block_' + zcf_attr_num)
		.append($('<label/>', {'class': 'zcf_label'})
			.append($('<label/>', {'class': 'zcf_rules_options_' + zcf_attr_num + '_' + zcf_element_rank, text: zcf_title}))
			.append($('<input/>', {
			  'class': 'zcf_rules_point zcf_rules_checked',
			  type: 'checkbox',
			  name: 'rules_' + zcf_prefix + '_options[' + zcf_num + '][]',
			  value: zcf_attr_num + '_' + zcf_element_rank
			}))
			.append($('<span/>', {'class': 'zcf_check_admin zcf_check_admin_checkbox'}))
			);

  };


// Create Rules Conditions
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  rulesConditions = function(zcf_closest_block, zcf_num, zcf_element, zcf_text_type){

	var zcf_conditions = '';

	for(var i in zcfRulesConditions[zcf_element]){
	  var d = zcfRulesConditions[zcf_element][i];
	  zcf_conditions += '<option value="' + i + '">' + d + '</option>';
	}

	zcf_closest_block.find('.zcf_rules_if_condition_block')
		.append($('<select/>', {'class': 'zcf_rules_if_condition', name: 'rules_if_condition[' + zcf_num + ']', html: zcf_conditions}));

  };


// Change Style Color Rating
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  styleColorRating = function(block, color){

	var zcf_color_add_block_type = block.find('[name="field[]"]').val();
	var zcf_color_rank = block.find('.zcf_' + zcf_color_add_block_type + '_rank').val();
	var zcf_color_rating_type = block.find('.zcf_rating_type').val();
	var zcf_container = '.zcf_form .zcf_container_block_' + zcf_color_add_block_type + '_' + zcf_color_rank + ' .br-theme-' + zcf_color_rating_type + ' .br-widget';

	switch(zcf_color_rating_type){
	  case 'stars':

		styleColorRatingPseudo(zcf_container + ' a:before', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');

		break;
	  case 'vertical':
	  case 'movie':
	  case 'horizontal':

		styleColorRatingPseudo(zcf_container + ' a', 'background-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', .4)');
		styleColorRatingPseudo(zcf_container + ' .br-current-rating', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');
		styleColorRatingPseudo(zcf_container + ' a.br-active, ' + zcf_container + ' a.br-selected', 'background-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');

		break;
	  case 'square':

		styleColorRatingPseudo(zcf_container + ' a', 'border-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', .4)');
		styleColorRatingPseudo(zcf_container + ' a', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', .4)');
		styleColorRatingPseudo(zcf_container + ' .br-current-rating', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');
		styleColorRatingPseudo(zcf_container + ' a.br-active, ' + zcf_container + ' a.br-selected', 'border-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');
		styleColorRatingPseudo(zcf_container + ' a.br-active, ' + zcf_container + ' a.br-selected', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');

		break;
	  case 'pill':
	  case 'reversed':

		styleColorRatingPseudo(zcf_container + ' a', 'background-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', .4)');
		styleColorRatingPseudo(zcf_container + ' a', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');
		styleColorRatingPseudo(zcf_container + ' .br-current-rating', 'color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');
		styleColorRatingPseudo(zcf_container + ' a.br-active, ' + zcf_container + ' a.br-selected', 'background-color: rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', 1)');

		break;
	}
  };


// Change Style Color Rating Pseudo
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  styleColorRatingPseudo = function(selector, styles){
	var sheet = document.styleSheets[document.styleSheets.length-1];
	if(sheet.insertRule)
	  return sheet.insertRule(selector + " {" + styles + "}", sheet.cssRules.length);
	if(sheet.addRule)
	  return sheet.addRule(selector, styles);
  };


// Set Rules Datetime
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  rulesDatetime = function(zcf_closest_block, zcf_attr){

	switch(zcf_attr){
	  case 'time':
		zcf_set_format_datetime = zcf_default_time_format;
		break;
	  case 'datetime':
		zcf_set_format_datetime = zcf_default_date_format + ' ' + zcf_default_time_format;
		break;
	  default:
		zcf_set_format_datetime = zcf_default_date_format;
		break;
	}

	zcf_closest_block.find('.zcf_rules_if_action input').datetimepicker({
	  format: zcf_set_format_datetime,
	  lang: zcf_calendar_local,
	  mask: false,
	  datepicker: (zcf_attr !== 'time' ? true : false),
	  timepicker: (zcf_attr !== 'date' ? true : false),
	  step: 5
	});

  };

// Set Mail Block Alert
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  setMailBlockAlert = function(){
	
	if($('#zcf_mail').find('input[data-check-state="true"]').length == 0){
	  $('a[href="#zcf_mail"]').find('span.dashicons-warning').remove();
	}else{
	  if($('a[href="#zcf_mail"]').find('span.dashicons-warning').length == 0){
		$('a[href="#zcf_mail"]').html($('a[href="#zcf_mail"]').html() + '&nbsp;<span class="dashicons dashicons-warning"></span>');
	  }
	}
	
  };


// Generate Calendar Fot Preview
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  generatePreviewCalendar = function(closest_calendar_block){

	var zcf_preview_calendar_option = {
	  lang: closest_calendar_block.find('.zcf_datetime_language').val(),
	  mask: false
	};

	var zcf_interval_days = 0;
	var zcf_interval_minutes = 0;
	var zcf_interval_result = 0;
	var zcf_new_date = new Date();


	zcf_add_block_type = closest_calendar_block.find('[name="field[]"]').val();
	zcf_num = closest_calendar_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

// Set Type
	var zcf_true = closest_calendar_block.find('.zcf_datetime_format').val() === '2';

	switch(closest_calendar_block.find('.zcf_datetime_type').val()){
	  case 'date':

		zcf_preview_calendar_option.format = (zcf_true ? closest_calendar_block.find('.zcf_date_format').val() : zcf_default_date_format);
		zcf_preview_calendar_option.datepicker = true;
		zcf_preview_calendar_option.timepicker = false;
		zcf_new_date = zcf_new_date.setHours(0, 0, 0, 0);

		break;
	  case 'time':

		zcf_preview_calendar_option.format = (zcf_true ? closest_calendar_block.find('.zcf_time_format').val() : zcf_default_time_format);
		zcf_preview_calendar_option.datepicker = false;
		zcf_preview_calendar_option.timepicker = true;
		zcf_new_date = zcf_new_date.setSeconds(0, 0);

		break;
	  case 'datetime':

		zcf_preview_calendar_option.format = (zcf_true ? closest_calendar_block.find('.zcf_date_format').val() : zcf_default_date_format) + ' ' + (zcf_true ? closest_calendar_block.find('.zcf_time_format').val() : zcf_default_time_format);
		zcf_preview_calendar_option.datepicker = true;
		zcf_preview_calendar_option.timepicker = true;
		zcf_new_date = zcf_new_date.setSeconds(0, 0);

		break;
	}

// Set Week Start
	zcf_preview_calendar_option.dayOfWeekStart = closest_calendar_block.find('.zcf_datetime_start_day').val() === '' ? zcf_default_start_week : closest_calendar_block.find('.zcf_datetime_start_day').val();

// Set Step Minutes
	zcf_preview_calendar_option.step = closest_calendar_block.find('.zcf_datetime_minutes_step').val() > 0 ? closest_calendar_block.find('.zcf_datetime_minutes_step').val() : 5;

// Set Default Value
	switch(closest_calendar_block.find('.zcf_datetime_default').val()){
	  case '1':

		zcf_preview_calendar_option.value = closest_calendar_block.find('.zcf_datetime_default_value').datetimepicker('getValue');

		break;
	  case '2':

		zcf_preview_calendar_option.value = zcf_new_date;

		break;
	  case '3':

		zcf_interval_days = closest_calendar_block.find('.zcf_datetime_interval_days').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_days').val()) * 86400000;
		zcf_interval_minutes = closest_calendar_block.find('.zcf_datetime_interval_minutes').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_minutes').val()) * 60000;
		zcf_interval_result = zcf_new_date + zcf_interval_days + zcf_interval_minutes;

		zcf_preview_calendar_option.value = zcf_interval_result;
		zcf_preview_calendar_option.defaultDate = zcf_interval_result;
		zcf_preview_calendar_option.defaultTime = zcf_interval_result;

		break;
	}

// Set Min Limit
	switch(closest_calendar_block.find('.zcf_datetime_limit[data-limit-type="min"]').val()){
	  case '1':

		if(closest_calendar_block.find('.zcf_date_value_min').val() !== ''){
		  zcf_preview_calendar_option.minDate = closest_calendar_block.find('.zcf_date_value_min').datetimepicker('getValue');
		}

		if(closest_calendar_block.find('.zcf_time_value_min').val() !== ''){
		  zcf_preview_calendar_option.minTime = closest_calendar_block.find('.zcf_time_value_min').datetimepicker('getValue');
		}

		break;
	  case '2':

		zcf_preview_calendar_option.minDate = zcf_new_date;
		zcf_preview_calendar_option.minTime = zcf_new_date;

		break;
	  case '3':

		zcf_interval_days = closest_calendar_block.find('.zcf_datetime_interval_days_min').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_days_min').val()) * 86400000;
		zcf_interval_minutes = closest_calendar_block.find('.zcf_datetime_interval_minutes_min').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_minutes_min').val()) * 60000;

		zcf_preview_calendar_option.minDate = zcf_new_date + zcf_interval_days;
		zcf_preview_calendar_option.minTime = zcf_new_date + zcf_interval_minutes;

		break;
	}

// Set Max Limit
	switch(closest_calendar_block.find('.zcf_datetime_limit[data-limit-type="max"]').val()){
	  case '1':

		if(closest_calendar_block.find('.zcf_date_value_max').val() !== ''){
		  zcf_preview_calendar_option.maxDate = closest_calendar_block.find('.zcf_date_value_max').datetimepicker('getValue');
		}

		if(closest_calendar_block.find('.zcf_time_value_max').val() !== ''){
		  zcf_preview_calendar_option.maxTime = closest_calendar_block.find('.zcf_time_value_max').datetimepicker('getValue');
		}

		break;
	  case '2':

		zcf_preview_calendar_option.maxDate = zcf_new_date;
		zcf_preview_calendar_option.maxTime = zcf_new_date;

		break;
	  case '3':

		zcf_interval_days = closest_calendar_block.find('.zcf_datetime_interval_days_max').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_days_max').val()) * 86400000;
		zcf_interval_minutes = closest_calendar_block.find('.zcf_datetime_interval_minutes_max').val() === '' ? 0 : parseInt(closest_calendar_block.find('.zcf_datetime_interval_minutes_max').val()) * 60000;

		zcf_preview_calendar_option.maxDate = zcf_new_date + zcf_interval_days;
		zcf_preview_calendar_option.maxTime = zcf_new_date + zcf_interval_minutes;

		break;
	}

// Reset Default Value
	if(zcf_preview_calendar_option.value === ''){
	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).val('');
	}

	$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).datetimepicker('destroy');
	$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).datetimepicker(zcf_preview_calendar_option);

	$('.zcf_preview_form .zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).trigger('change.zcf');

  };
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------


})(jQuery);


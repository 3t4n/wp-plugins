(function($){

  'use strict';

  $(function(){


// Switch type field date and time
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_datetime_type', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_readonly_date = false;
	  zcf_readonly_time = false;

	  switch($(this).val()){
		case 'date':
		  zcf_calendar_param = {
			format: zcf_default_date_format,
			datepicker: true,
			timepicker: false
		  };
		  zcf_readonly_time = true;
		  break;
		case 'time':
		  zcf_calendar_param = {
			format: zcf_default_time_format,
			step: 5,
			timepicker: true,
			datepicker: false
		  };
		  zcf_readonly_date = true;
		  break;
		case 'datetime':
		  zcf_calendar_param = {
			format: zcf_default_date_format + ' ' + zcf_default_time_format,
			step: 5,
			datepicker: true,
			timepicker: true
		  };
		  break;
	  }

	  // Date Field
	  zcf_closest_block.find('.zcf_datetime_start_day').toggle(!zcf_readonly_date);
	  // Time Field
	  zcf_closest_block.find('.zcf_datetime_minutes_step').attr('readonly', zcf_readonly_time).val('');

	  if(zcf_closest_block.find('.zcf_datetime_default').val() > 2){
		// Date Field
		zcf_closest_block.find('.zcf_datetime_interval_days').attr('readonly', zcf_readonly_date).val('');
		// Time Field
		zcf_closest_block.find('.zcf_datetime_interval_minutes').attr('readonly', zcf_readonly_time).val('');
	  }

	  $.extend(zcf_base_calendar_param, zcf_calendar_param);

	  // Set DateTimePicker
	  zcf_closest_block.find('.zcf_set_calendar').val('');
	  zcf_closest_block.find('.zcf_set_calendar').datetimepicker('destroy');
	  zcf_closest_block.find('.zcf_set_calendar').datetimepicker(zcf_base_calendar_param);

	  // Rules Set DateTimePicker
	  $('.zcf_rules_if_datetime_' + zcf_closest_block.find('.zcf_datetime_rank').val()).val('');
	  $('.zcf_rules_if_datetime_' + zcf_closest_block.find('.zcf_datetime_rank').val()).datetimepicker('destroy');
	  $('.zcf_rules_if_datetime_' + zcf_closest_block.find('.zcf_datetime_rank').val()).datetimepicker(zcf_base_calendar_param);

	  generatePreviewCalendar(zcf_closest_block);

	});


// Switch type default value field date and time
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_datetime_default', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  var zcf_datetime_type = $(this).closest('.zcf_block').find('.zcf_datetime_type').val();

	  switch($(this).val()){
		case '1':
		  zcf_readonly = false;
		  zcf_readonly_date = true;
		  zcf_readonly_time = true;
		  break;
		case '2':
		  zcf_readonly = true;
		  zcf_readonly_date = true;
		  zcf_readonly_time = true;
		  break;
		case '3':
		  zcf_readonly = true;
		  zcf_readonly_date = false;
		  zcf_readonly_time = false;
		  break;
	  }

	  zcf_closest_block.find('.zcf_datetime_default_value').attr('readonly', zcf_readonly).val('');
	  zcf_closest_block.find('.zcf_datetime_interval_days').attr('readonly', (zcf_datetime_type === 'time' ? true : zcf_readonly_date)).val('');
	  zcf_closest_block.find('.zcf_datetime_interval_minutes').attr('readonly', (zcf_datetime_type === 'date' ? true : zcf_readonly_time)).val('');

	  if(zcf_closest_block.find('.zcf_datetime_default').val() !== '1'){
		zcf_closest_block.find('.zcf_datetime_default_value').hide();
	  }else{
		zcf_closest_block.find('.zcf_datetime_default_value').show();
	  }

	  generatePreviewCalendar(zcf_closest_block);

	});


// Switch min/max value field date and time
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_datetime_limit', function(){

	  zcf_closest_block = $(this).closest('td');
	  zcf_attr = $(this).attr('data-limit-type');
	  zcf_closest_block.find('.zcf_date_value_' + zcf_attr).val('');
	  zcf_closest_block.find('.zcf_time_value_' + zcf_attr).val('');
	  zcf_closest_block.find('.zcf_datetime_interval_days_' + zcf_attr).val('');
	  zcf_closest_block.find('.zcf_datetime_interval_minutes_' + zcf_attr).val('');

	  switch($(this).val()){
		case '1':
		  zcf_closest_block.find('.zcf_set_datetime_limit').css('display', 'table');
		  zcf_closest_block.find('.zcf_set_interval_limit').css('display', 'none');
		  break;
		case '2':
		  zcf_closest_block.find('.zcf_set_datetime_limit, .zcf_set_interval_limit').css('display', 'none');
		  break;
		case '3':
		  zcf_closest_block.find('.zcf_set_datetime_limit').css('display', 'none');
		  zcf_closest_block.find('.zcf_set_interval_limit').css('display', 'table');
		  break;
	  }

	  generatePreviewCalendar($(this).closest('.zcf_block'));

	});


// Switch format field date and time
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_datetime_format, .zcf_datetime_type', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  var zcf_select_date = 'none';
	  var zcf_select_time = 'none';

	  if(zcf_closest_block.find('.zcf_datetime_format').val() === '2'){
		switch(zcf_closest_block.find('.zcf_datetime_type').val()){
		  case 'date':
			var zcf_select_date = 'block';
			break;
		  case 'time':
			var zcf_select_time = 'block';
			break;
		  case 'datetime':
			var zcf_select_date = 'block';
			var zcf_select_time = 'block';
			break;
		}
	  }

	  zcf_closest_block.find('.zcf_date_format').css('display', zcf_select_date);
	  zcf_closest_block.find('.zcf_time_format').css('display', zcf_select_time);

	  generatePreviewCalendar(zcf_closest_block);

	});
	

// Datetime field change (select) options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_datetime_default_value, .zcf_datetime_start_day, .zcf_limit_change, .zcf_date_format, .zcf_time_format, .zcf_datetime_language', function(){

	  generatePreviewCalendar($(this).closest('.zcf_block'));

	});


// Datetime field change (input) options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_datetime_interval_days, .zcf_datetime_interval_minutes, .zcf_limit_input', function(){

	  generatePreviewCalendar($(this).closest('.zcf_block'));

	});


// Datetime field change step
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_datetime_minutes_step', function(){

	  if($(this).val() < 1){
		$(this).val(1);
	  }else if($(this).val() > 60){
		$(this).val(60);
	  }

	  generatePreviewCalendar($(this).closest('.zcf_block'));

	});



  });

})(jQuery);
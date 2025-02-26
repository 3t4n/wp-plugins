(function($){

  'use strict';

  var zcf_ajax_url = typeof zcf_admin_ajax === 'undefined' || zcf_admin_ajax === null ? '' : zcf_admin_ajax;
  var zcf_ajax_parent;
  var zcf_ajax_form_id;
  var zcf_ajax_attr;
  var zcf_ajax_action;

// Add New Form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '#zcf_save_form', function(){

	zcf_ajax_parent = $(this).closest('.zcf');

	zcfStartPreload(zcf_ajax_parent);

	var str_param = '';

	$('#zcf_mail').find('[name="mail_template[]"]').each(function(index, element){
	  str_param += '&editor_content[' + $(element).val() + ']=' + wp.editor.getContent('zcf_editor_id_' + $(element).val());
	});

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: $('#zcf_save_form_content').serialize() + str_param + '&general_title=' + $('.zcf_general_title').val(),
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		zcfEndPreload(zcf_ajax_parent);
		if(response.success){
		  zcfMessageSuccess(zcf_message.success_title, response.data.message, '?page=zcf-edit-form&form_id=' + response.data.id);
		}else{
		  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
		}
	  }
	});

  });

// Delete Form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_delete_form', function(){

	var th = $(this);

	$.confirm({
	  title: zcf_message.confirm_title,
	  content: zcf_admin_message.form_remove + '?',
	  type: 'orange',
	  boxWidth: '30%',
	  useBootstrap: false,
	  animateFromElement: false,
	  backgroundDismiss: true,
	  buttons: {
		btnOk: {
		  text: zcf_message.ok,
		  keys: ['enter'],
		  btnClass: 'button button-primary zcf_style_button_alert_none',
		  action: function(){
			zcf_ajax_parent = th.closest('.zcf');
			zcf_ajax_form_id = th.attr('data-value');

			zcfStartPreload(zcf_ajax_parent);

			$.ajax({
			  type: "POST",
			  url: zcf_ajax_url,
			  dataType: "json",
			  data: 'action=delete_form&form_id=' + zcf_ajax_form_id,
			  error: function(){
				zcfEndPreload(zcf_ajax_parent);
				zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
			  },
			  success: function(response){
				zcfEndPreload(zcf_ajax_parent);
				if(response.success){
				  zcfMessageSuccess(zcf_message.success_title, response.data.message, '?page=zcf-list-form');
				}else{
				  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
				}
			  }
			});
		  }
		},
		btnCancel: {
		  text: zcf_message.cancel,
		  btnClass: 'button button-default zcf_style_button_alert_none'
		}
	  }
	});

  });

// Action Bulk Form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_bulk_action_button', function(){

	zcf_ajax_parent = $(this).closest('.zcf');
	zcf_ajax_action = $('.zcf_list_forms_data').find('.zcf_bulk_action').val();

	switch(zcf_ajax_action){
	  case 'none':
		zcfMessageAlert(zcf_message.confirm_title, zcf_admin_message[zcf_ajax_action], 'orange');
		return;
		break;
	  case 'delete_form':

		$.confirm({
		  title: zcf_message.confirm_title,
		  content: zcf_admin_message[zcf_ajax_action] + '?',
		  type: 'orange',
		  boxWidth: '30%',
		  useBootstrap: false,
		  animateFromElement: false,
		  backgroundDismiss: true,
		  buttons: {
			btnOk: {
			  text: zcf_message.ok,
			  keys: ['enter'],
			  btnClass: 'button button-primary zcf_style_button_alert_none',
			  action: function(){
				zcfBulkActionAjax(zcf_ajax_parent, zcf_ajax_action);
			  }
			},
			btnCancel: {
			  text: zcf_message.cancel,
			  btnClass: 'button button-default zcf_style_button_alert_none'
			}
		  }
		});

		break;
	  default:
		zcfMessageAlert(zcf_message.error_title, '', 'red');
		return;
	}



  });

// Restore Form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '#zcf_restore_form', function(){

	zcf_ajax_parent = $(this).closest('.zcf');

	zcfStartPreload(zcf_ajax_parent);

	var str_param = '';

	$('#zcf_mail').find('[name="mail_template[]"]').each(function(index, element){
	  str_param += '&editor_content[' + $(element).val() + ']=' + wp.editor.getContent('zcf_editor_id_' + $(element).val());
	});

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: $('#zcf_restore_form_content').serialize() + str_param + '&general_title=' + $('.zcf_general_title').val(),
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		zcfEndPreload(zcf_ajax_parent);
		if(response.success){
		  zcfMessageSuccess(zcf_message.success_title, response.data.message, '?page=zcf-edit-form&form_id=' + response.data.id);
		}else{
		  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
		}
	  }
	});

  });

// Copy Form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_copy_form', function(){

	zcf_ajax_parent = $(this).closest('.zcf');
	zcf_ajax_form_id = $(this).attr('data-value');

	zcfStartPreload(zcf_ajax_parent);

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: 'action=copy_form&form_id=' + zcf_ajax_form_id,
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		zcfEndPreload(zcf_ajax_parent);
		if(response.success){
		  zcfMessageSuccess(zcf_message.success_title, response.data.message, '?page=zcf-edit-form&form_id=' + response.data.id);
		}else{
		  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
		}
	  }
	});

  });

// Save reCaptcha
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_save_recaptcha', function(){

	zcf_ajax_parent = $(this).closest('.zcf');

	zcfStartPreload(zcf_ajax_parent);

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: $('#zcf_recaptcha_content').serialize(),
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		zcfEndPreload(zcf_ajax_parent);
		if(response.success){
		  zcfMessageSuccess(zcf_message.success_title, response.data.message, '');
		}else{
		  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
		}
	  }
	});

  });

// Save reCaptcha
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("#zcf_mail").on('change', '.zcf_change_mail_field_value', function(){

	var th = $(this);
	th.closest('td').find('.zcf_mail_field_error').remove();

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: 'action=check_mail&mail=' + th.val() + '&check=' + th.attr('data-check'),
	  error: function(){

	  },
	  success: function(response){

		if(response.data.state === true){
		  th.after($('<div/>', {'class': 'zcf_mail_field_error', html: '<span class="dashicons dashicons-warning"></span>&nbsp;' + response.data.msg}));
		}
		th.attr('data-check-state', response.data.state);
		
		setMailBlockAlert();

	  }
	});

  });

// Action Report 
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_report_action_view, .zcf_report_action_excel', function(){

	zcf_ajax_parent = $(this).closest('.zcf');
	zcf_ajax_attr = $(this).attr('data-action');

	zcfStartPreload(zcf_ajax_parent);

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: $('.zcf_form_report').serialize() + '&type=' + zcf_ajax_attr,
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		if(response.success){

		  switch(zcf_ajax_attr){
			case 'vew_report':

			  $('.zcf_report_table_tbody, .zcf_report_table_thead').empty();
			  $('.zcf_report_table_block').css('display', 'none');

			  var tr = $('<tr/>');

			  for(var i in response.data.d.title){
				var h = response.data.d.title[i];
				var hname = h.name === '' ? i : h.name;
				$(tr).append($('<th/>', {text: hname}));
			  }
			  $('.zcf_report_table_thead').append(tr);

			  for(var i2 in response.data.d.row){
				var b = response.data.d.row[i2];
				tr = $('<tr/>');

				for(var i3 in response.data.d.title){
				  var bval;

				  if(typeof b[i3] === 'object'){
					var blist = [];
					for(var i0 in b[i3]){
					  blist.push(b[i3][i0]);
					}
					bval = blist.join('<br/>');

				  }else{
					bval = b[i3];
				  }
				  $(tr).append($('<td/>', {html: bval}));
				}

				$('.zcf_report_table_tbody').append(tr);
			  }

			  $('.zcf_report_table_block').css('display', 'block');

			  break;
			case 'create_excel':

			  var array_list = [];
			  var object = {};

			  for(var i2 in response.data.d.row){
				var b = response.data.d.row[i2];
//				col = 0;
				object = {};

				for(var i3 in response.data.d.title){
				  var h = response.data.d.title[i3];
				  var hname = h.name === '' ? i3 : h.name;
				  var bval;

				  if(typeof b[i3] === 'object'){
					var blist = [];
					for(var i0 in b[i3]){
					  blist.push(b[i3][i0]);
					}
					bval = blist.join('\n');

				  }else{
					bval = b[i3];
				  }
				  object[hname] = bval;
				}

				array_list.push(object);
			  }

			  var opts = [{sheetid: response.data.title, header: true}];
			  window.result = alasql('SELECT * INTO XLSX("' + response.data.title + ' - ' + response.data.title_time + '.xlsx",?) FROM ?',
				  [opts, [array_list]]);

			  break;
		  }

		}else{
		  zcfMessageAlert(zcf_message.confirm_title, response.data.message, 'orange');
		}
		zcfEndPreload(zcf_ajax_parent);
	  }
	});

  });


// Start Preload
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfStartPreload = function(obj){

	$(obj).css('opacity', '0.5').find('.zcf_ajax_loader').css('display', 'block');

  };

// Stop Preload
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfEndPreload = function(obj){

	$(obj).css('opacity', '1').find('.zcf_ajax_loader').css('display', 'none');

  };

// Table Ajax Action
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfBulkActionAjax = function(zcf_ajax_parent, zcf_ajax_action){

	zcfStartPreload(zcf_ajax_parent);

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "json",
	  data: $('.zcf_list_forms_data').serialize() + '&action=' + zcf_ajax_action,
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		zcfEndPreload(zcf_ajax_parent);
		if(response.success){
		  zcfMessageSuccess(zcf_message.success_title, response.data.message, '?page=zcf-list-form');
		}else{
		  zcfMessageAlert(zcf_message.error_title, response.data.message, 'red');
		}
	  }
	});

  };


// Show/Hide Math CAPTCHA
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  showHideMathCaptcha = function(){

	$.ajax({
	  type: "POST",
	  url: zcf_ajax_url,
	  dataType: "text",
	  data: 'action=math_captcha',
	  error: function(){
		zcfEndPreload(zcf_ajax_parent);
		zcfMessageAlert(zcf_message.error_title, zcf_message.error, 'red');
	  },
	  success: function(response){
		$(".zcf_preview_form").after(
			$('<div/>', {'class': 'zcf_container_block zcf_container_block_mathcaptcha_0 zcf_size_field_100'})
			.append($('<label/>', {'class': 'zcf_style_label', text: zcf_admin_message.human + '?'}))
			.append($('<table/>', {'class': 'zcf_mathcaptcha_block'})
				.append($('<tr/>')
					.append($('<td/>', {html: response}))
					.append($('<td/>')
						.append($('<input/>', {type: 'number', 'class': 'zcf_style_field', name: 'mathcaptcha'}))
						)
					)
				)
			);
	  }
	});

  };


// Load Window Template Field 
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  loadWindowTemplateField = function(){

	$.confirm({
	  title: zcf_admin_message.template_title,
	  icon: 'fa fa-wpforms fa-lg',
	  content: function(){
		var self = this;
		return $.ajax({
		  type: 'POST',
		  url: zcf_ajax_url,
		  dataType: 'html',
		  data: 'action=get_template'
		}).done(function(response){
		  self.setContent(response);
		}).fail(function(){
		  self.setContent('Something went wrong.');
		});
	  },
	  type: 'blue',
	  theme: 'material',
	  boxWidth: '60%',
	  useBootstrap: false,
	  animateFromElement: false,
	  backgroundDismiss: true,
	  buttons: {
		btnOk: {
		  text: zcf_admin_message.template_ok,
		  btnClass: 'button button-primary zcf_style_button_alert_none',
		  keys: ['enter'],
		  action: function(){

			var zblock;

			switch($('.zcf_template_field_block .zcf_check_template_field:checked').val()){

			  case 'contact':

				$('#zcf_template .zcf_add_block_button[data-value-field="text"]').trigger('click').trigger('click').trigger('click');

				zblock = $('.zcf_container').find('.zcf_block');

				zblock.eq(0).find('.zcf_field_title').val(zcf_template_fields_name.name).trigger('input');

				zblock.eq(1).find('.zcf_field_title').val(zcf_template_fields_name.phone).trigger('input');
				zblock.eq(1).find('.zcf_text_field_type').children('option[value="tel"]').prop('selected', true).trigger('change');

				zblock.eq(2).find('.zcf_field_title').val(zcf_template_fields_name.email).trigger('input');
				zblock.eq(2).find('.zcf_text_field_type').children('option[value="email"]').prop('selected', true).trigger('change');

				break;

			  case 'newsletter':

				$('#zcf_template .zcf_add_block_button[data-value-field="text"]').trigger('click').trigger('click');

				zblock = $('.zcf_container').find('.zcf_block');

				zblock.eq(0).find('.zcf_field_title').val(zcf_template_fields_name.name).trigger('input');

				zblock.eq(1).find('.zcf_field_title').val(zcf_template_fields_name.email).trigger('input');
				zblock.eq(1).find('.zcf_text_field_type').children('option[value="email"]').prop('selected', true).trigger('change');

				break;

			  case 'support_request':

				$('#zcf_template .zcf_add_block_button[data-value-field="text"]').trigger('click').trigger('click');
				$('#zcf_template .zcf_add_block_button[data-value-field="radio"]').trigger('click');
				$('#zcf_template .zcf_add_block_button[data-value-field="textarea"]').trigger('click');
				$('#zcf_template .zcf_add_block_button[data-value-field="file"]').trigger('click');

				zblock = $('.zcf_container').find('.zcf_block');

				zblock.eq(0).find('.zcf_field_title').val(zcf_template_fields_name.name).trigger('input');

				zblock.eq(1).find('.zcf_field_title').val(zcf_template_fields_name.email).trigger('input');
				zblock.eq(1).find('.zcf_text_field_type').children('option[value="email"]').prop('selected', true).trigger('change');

				zblock.eq(2).find('.zcf_field_title').val(zcf_template_fields_name.list_title).trigger('input');

				zblock.eq(2).find('.zcf_list_title').eq(0).val(zcf_template_fields_name.low).trigger('input');
				zblock.eq(2).find('.zcf_list_check').eq(0).prop('checked', true).trigger('change');
				zblock.eq(2).find('.zcf_list_title').eq(1).val(zcf_template_fields_name.normal).trigger('input');
				zblock.eq(2).find('.zcf_list_title').eq(2).val(zcf_template_fields_name.high).trigger('input');


				zblock.eq(3).find('.zcf_field_title').val(zcf_template_fields_name.message).trigger('input');

				zblock.eq(4).find('.zcf_field_title').val(zcf_template_fields_name.file_upload).trigger('input');
				zblock.eq(4).find('.zcf_file_multiple').prop('checked', true).trigger('change');

				break;
			}

		  }
		},
		btnCancel: {
		  text: zcf_message.cancel,
		  btnClass: 'button button-default zcf_style_button_alert_none'
		}
	  }
	});

  };


})(jQuery);


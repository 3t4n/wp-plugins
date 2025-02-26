(function($){

  'use strict';

  $(function(){


// Show/Hide Editor Block
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_template").on('mouseover', '.zcf_header_block', function(){
	  $(this).children('.zcf_header_block_button').css('opacity', 1);
	}).on('mouseout', '.zcf_header_block', function(){
	  $(this).children('.zcf_header_block_button').css('opacity', 0);
	});


// Enter title field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('input', '.zcf_field_title', function(){

	  zcf_title = $(this).val();
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = zcf_title;
	  zcf_element = zcf_add_block_type + '_' + zcf_num;
	  zcf_block = zcf_closest_block.find('.zcf_required').prop('checked') ? '&nbsp;<sup class="zcf_sup">*</sup>' : '';

	  if(zcf_title.length > 80){
		zcf_title = zcf_title.substr(0, 80) + '...';
	  }else if(zcf_title.length === 0){
		zcf_block = '';
		if(typeof $(this).attr('data-default-text') != 'undefined'){
		  zcf_title = zcf_attr = $(this).attr('data-default-text');
		}else{
		  zcf_title = zcf_add_block_type + ' ' + zcf_num;
		  zcf_attr = '&nbsp;';
		}

	  }

	  zcf_closest_block.find('.zcf_input_title').text(zcf_title);

	  // Mail Title
	  $('.zcf_mail_field_' + zcf_element + ' td:first-child').text(zcf_attr);

	  // Preview Title
	  if(!zcf_closest_block.find('.zcf_no_title').prop('checked')){
		$('.zcf_container_label_' + zcf_element).html(zcf_attr + zcf_block);
	  }

	  // Redirect Title
	  $('.zcf_redirection_rules_options option[value="' + zcf_element + '"]').text(zcf_title);

	  // Rules Title
	  $('.zcf_rules_field_title option[value="' + zcf_element + '"]').text(zcf_title);
	  $('.zcf_rules_block .zcf_rules_else_fied' + zcf_element).text(zcf_attr);

	  // Akismet Block
	  $('.zcf_akismet_param option[value="' + zcf_element + '"]').text(zcf_title);

	});


// Delete block field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_block_remove', function(event){

	  var th = $(this);

	  $.confirm({
		title: zcf_message.confirm_title,
		content: zcf_admin_message.field_remove + '?',
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
			  zcf_closest_block = th.closest('.zcf_block');

			  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
			  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

			  zcf_element = zcf_add_block_type + '_' + zcf_num;

			  $('.zcf_mail_field_' + zcf_element).remove();

			  $('.zcf_container_block_' + zcf_element).remove();


			  // Redirection block update
			  $('.zcf_redirection_rules_options').each(function(index, element){

				if($(element).children('option[value="' + zcf_element + '"]').prop('selected')){
				  $(element).closest('tr').find('.zcf_redirection_rules_options_list option').not('[value=""]').remove();
				  $(element).closest('tr').find('input').val('');
				}

			  });

			  $('.zcf_redirection_rules_options option[value="' + zcf_element + '"]').remove();

			  // Akismet Block
			  $('.zcf_akismet_param option[value="' + zcf_element + '"]').remove();

			  if($('.zcf_redirection_more_page .zcf_redirection_rules_options option').length === 1){
				$('.zcf_redirection_more_body_row tr').not('.zcf_redirection_more_page').remove();
				$('.zcf_options_table_list_more').css('display', 'none');
				$('.zcf_redirection_rules :first-child').prop('selected', true);
			  }


			  zcf_closest_block.remove();

			  removeRulesPoint(zcf_element);

			}
		  },
		  btnCancel: {
			text: zcf_message.cancel,
			btnClass: 'button button-default zcf_style_button_alert_none'
		  }
		}
	  });

	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Show/Hide options
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_view_options', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_closest_block.find('.zcf_options_block').toggle();
	  if(!zcf_closest_block.find('.zcf_connect_mask').prop('checked')){
		zcf_closest_block.find('.zcf_mask_block').hide();
	  }

	});


// Show/Hide Field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_block_field_hide', function(event){

	  var zcf_display, zcf_opacity, zcf_action, zcf_img, zcf_bool;
	  var th = $(this);
	  zcf_attr = $(this).attr('data-zcf-state');
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if(zcf_attr === 'off'){

		$.confirm({
		  title: zcf_message.confirm_title,
		  content: zcf_admin_message.set_hide_field,
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

				zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_field_hide').val('true');
				$('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).css('display', 'none');
				calculationSizeField();
				th.closest('.zcf_header_block').css('opacity', 0.3);
				th.attr({'data-zcf-state': 'on', 'title': zcf_admin_message['field_' + zcf_attr]}).html('<span class="dashicons dashicons-visibility"></span>');
				removeRulesPoint(zcf_add_block_type + '_' + zcf_num);
				th.tooltipster('content', zcf_button_title.show);
				setRulesForPreview();

			  }
			},
			btnCancel: {
			  text: zcf_message.cancel,
			  btnClass: 'button button-default zcf_style_button_alert_none'
			}
		  }
		});

	  }else{

		zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_field_hide').val('false');
		$('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).css('display', '');
		calculationSizeField();
		th.closest('.zcf_header_block').css('opacity', 1);
		th.attr({'data-zcf-state': 'off', 'title': zcf_message['field_' + zcf_attr]}).html('<span class="dashicons dashicons-hidden"></span>');
		th.tooltipster('content', zcf_button_title.hide);
		addRulesPoint(zcf_add_block_type, zcf_num);

	  }

	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Add in block edit fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_add_block_button', function(){

	  $(this).css('opacity', '1');
	  zcf_add_block_type = $(this).attr('data-value-field');

	  zcf_clone = $('.zcf_fields_list .zcf_' + zcf_add_block_type + '_form').clone(true);
	  zcf_num = ++zcf_field_list[zcf_add_block_type];
	  zcf_clone.find('.zcf_' + zcf_add_block_type + '_rank').val(zcf_num);
	  zcf_element = zcf_add_block_type + '_' + zcf_num;
	  zcf_clone.addClass('zcf_field_template_' + zcf_element);
	  zcf_clone.find('.zcf_field_title').val(zcf_base_fields_title[zcf_add_block_type]);
	  zcf_points = 3;
	  zcf_points_title = zcf_admin_message.point + ' ';

	  // Add to preview
	  switch(zcf_add_block_type){
		case 'text':
		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<input/>', {
					type: 'text',
					'class': 'zcf_style_field zcf_counter_txt zcf_container_field_' + zcf_element,
					'zcf_num_attr': zcf_num,
					'zcf_type_attr': 'text'
				  }))
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_min_' + zcf_element, text: zcf_txt_under_block.min + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_min_' + zcf_element}))
					  )
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_max_' + zcf_element, text: zcf_txt_under_block.max + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_max_' + zcf_element}))
					  )
				  );
		  break;
		case 'datetime':
		  zcf_clone.find('.zcf_set_calendar').datetimepicker('destroy');
		  zcf_clone.find('.zcf_set_calendar, .zcf_set_calendar_date').datetimepicker(zcf_base_default_calendar_param);
		  zcf_clone.find('.zcf_set_calendar_time').datetimepicker({
			lang: zcf_calendar_local,
			format: zcf_default_time_format,
			mask: false,
			step: 5,
			datepicker: false
		  });
		  zcf_clone.find('.zcf_datetime_language').val(zcf_calendar_local).change();

		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<input/>', {type: 'text', 'class': 'zcf_style_field zcf_container_field_' + zcf_element}))
				  );

		  $('.zcf_container_field_' + zcf_element).datetimepicker({
			lang: zcf_calendar_local,
			format: zcf_default_date_format,
			mask: false,
			timepicker: false,
			dayOfWeekStart: zcf_default_start_week
		  });

		  break;
		case 'textarea':
		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<textarea/>', {
					'class': 'zcf_style_field zcf_counter_txt zcf_container_field_' + zcf_element,
					'zcf_num_attr': zcf_num,
					'zcf_type_attr': 'textarea'
				  }))
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_min_' + zcf_element, text: zcf_txt_under_block.min + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_min_' + zcf_element}))
					  )
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_max_' + zcf_element, text: zcf_txt_under_block.max + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_max_' + zcf_element}))
					  )
				  );
		  break;
		case 'select':
		  zcf_clone.find('.zcf_list_title').attr({'name': zcf_add_block_type + '_list_title[' + zcf_num + '][1]', 'data-num-value': 1});
		  zcf_clone.find('.zcf_list_check').next().attr('name', zcf_add_block_type + '_list_check[' + zcf_num + '][1]');
		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<select/>', {
					'class': 'zcf_style_field zcf_container_field_' + zcf_element + ' zcf_limit_list',
					'zcf_num_attr': zcf_num,
					'zcf_type_attr': 'select'
				  })
					  .append($('<option/>', {'class': 'zcf_container_list_label_' + zcf_element + '_1 zcf_container_title_label_' + zcf_element + '_1'}))
					  )
				  );
		  break;
		case 'checkbox':
		  zcf_clone.find('.zcf_list_title').attr({'name': zcf_add_block_type + '_list_title[' + zcf_num + '][1]', 'data-num-value': 1});
		  zcf_clone.find('.zcf_list_check').next().attr('name', zcf_add_block_type + '_list_check[' + zcf_num + '][1]');

		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<label/>', {'class': 'zcf_list_container zcf_container_list_label_' + zcf_element + '_1'})
					  .append($('<label/>', {'class': 'zcf_container_title_label zcf_container_title_label_' + zcf_element + '_1'}))
					  .append($('<input/>', {
						'class': 'zcf_container_field_' + zcf_element + ' zcf_limit_list',
						type: 'checkbox',
						'zcf_num_attr': zcf_num,
						'zcf_type_attr': 'checkbox'
					  }))
					  .append($('<span/>', {'class': 'zcf_checkmark zcf_checkmark_checkbox'}))
					  )
				  );

		  break;
		case 'radio':
		  zcf_clone.find('.zcf_list_title').attr({'name': zcf_add_block_type + '_list_title[' + zcf_num + '][1]', 'data-num-value': 1});
		  zcf_clone.find('.zcf_list_check').attr('name', zcf_add_block_type + '_list[' + zcf_num + ']');
		  zcf_clone.find('.zcf_list_check').next().attr('name', zcf_add_block_type + '_list_check[' + zcf_num + '][1]');

		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<label/>', {'class': 'zcf_list_container zcf_container_list_label_' + zcf_element + '_1'})
					  .append($('<label/>', {'class': 'zcf_container_title_label zcf_container_title_label_' + zcf_element + '_1'}))
					  .append($('<input/>', {'class': 'zcf_container_field_' + zcf_element, type: 'radio', name: 'zcf_container_block_' + zcf_element}))
					  .append($('<span/>', {'class': 'zcf_checkmark zcf_checkmark_radio'}))
					  )
				  );

		  break;
		case 'rating':
		  zcf_points = 5;
		  zcf_points_title = '';
		  zcf_clone.find('.zcf_list_title').attr({'name': zcf_add_block_type + '_list_title[' + zcf_num + '][1]', 'data-num-value': 1});
		  zcf_clone.find('.zcf_list_check').attr('name', zcf_add_block_type + '_list[' + zcf_num + ']');
		  zcf_clone.find('.zcf_list_check').next().attr('name', zcf_add_block_type + '_list_check[' + zcf_num + '][1]');

		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<select/>', {'class': 'zcf_container_field_' + zcf_element})
					  .append($('<option/>', {value: '1', text: zcf_admin_message.point + ' 1'}))
					  )
				  );

		  setColorRatingParam(zcf_clone);

		  break;
		case 'accept':

		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<label/>', {'class': 'zcf_list_container'})
					  .append($('<label/>', {'class': 'zcf_container_title_label'})
						  .append($('<a/>', {'class': 'zcf_accept_link_block zcf_label_' + zcf_element, target: '_blank', text: zcf_clone.find('.zcf_accept_title').attr('data-default-text')}))
						  )
					  .append($('<input/>', {type: 'checkbox', 'class': 'zcf_container_field_' + zcf_element}))
					  .append($('<span/>', {'class': 'zcf_checkmark zcf_checkmark_checkbox'}))
					  )
				  .append($('<div/>', {'class': 'zcf_accept_text_block zcf_container_text_block_' + zcf_element}))
				  );

		  break;
		case 'file':
		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element + ' zcf_size_field_100', 'zcf-data-size': 100})
				  .append($('<label/>', {'class': 'zcf_style_label zcf_container_label_' + zcf_element, html: '&nbsp;'}))
				  .append($('<div/>', {'class': 'zcf_input_file_box'})
					  .append($('<input/>', {type: 'file', id: 'zcf_file_' + zcf_num, 'class': 'zcf_input_file zcf_container_field_' + zcf_element, 'data-multiple-caption': '{count} ' + zcf_file_title_list['count_title']}))
					  .append($('<label/>', {'for': 'zcf_file_' + zcf_num, html: zcf_figure_svg})
						  .append($('<span/>', {text: zcf_file_title_list['title']}))
						  )
					  )
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_size_' + zcf_element, text: zcf_txt_under_block.size + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_size_' + zcf_element}))
					  )
				  .append($('<div/>', {'class': 'zcf_style_limit_block zcf_hide_text zcf_limit_block_format_' + zcf_element, text: zcf_txt_under_block.format + ':'})
					  .append($('<span/>', {'class': 'zcf_limit_span_format_' + zcf_element}))
					  )
				  );
		  CFileInput();
		  break;
		case 'button':
		  $('.zcf_preview_form')
			  .append($('<div/>', {'class': 'zcf_container_block zcf_container_block_' + zcf_element})
				  .append($('<label/>', {'class': 'zcf_style_label'}))
				  .append($('<button/>', {
					type: 'text',
					'class': 'zcf_style_button zcf_container_label_' + zcf_element,
					text: zcf_add_block_type
				  }))
				  );
		  break;
	  }

// Add to preview style
	  switch(zcf_add_block_type){
		case 'text':
		case 'datetime':
		case 'textarea':
		case 'select':

		  $('.zcf_container_field_' + zcf_element).css('border-color', $('.zcf_style_color_border').val());
		  zcf_rgb = hexToRGB($('.zcf_style_color_focus').val());
		  $(".zcf_preview_form").on('focus', '.zcf_style_field', function(){
			this.style.setProperty('border-color', $('.zcf_style_color_focus').val(), 'important');
			$(this).css('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(' + zcf_rgb.r + ', ' + zcf_rgb.g + ', ' + zcf_rgb.b + ', .4)' : ''));
		  }).on('blur', '.zcf_style_field', function(){
			$(this).css({'border-color': $('.zcf_style_color_border').val(), 'box-shadow': 'none'});
		  });

		  $('.zcf_style_field:not(select[multiple])').not('textarea').css('height', $('.zcf_style_height_value').val() + $('.zcf_style_height_unit').val());
		  $('textarea.zcf_style_field, select[multiple].zcf_style_field').css('height', $('.zcf_style_height_textarea_value').val() + $('.zcf_style_height_textarea_unit').val());

		  break;
		case 'checkbox':
		case 'accept':
		  break;
		case 'radio':
		  break;
		case 'file':
		  $('.zcf_input_file_box').css('border-color', $('.zcf_style_color_border').val());
		  $('.zcf_input_file_box label').css('color', $('.zcf_style_color_border').val());
		  $('.zcf_input_file_box label figure').css('background-color', $('.zcf_style_color_border').val());
		  break;
		case 'button':
		  $('.zcf_style_button').css({
			'background-color': $('.zcf_style_color_button').val(),
			'border-color': $('.zcf_style_color_button').val(),
			'color': $('.zcf_style_color_button_text').val(),
			'width': ($('.zcf_style_width_button_unit').val() === 'initial' ? 'initial' : $('.zcf_style_width_button_value').val() + $('.zcf_style_width_button_unit').val()),
			'height': ($('.zcf_style_height_button_unit').val() === 'initial' ? 'initial' : $('.zcf_style_height_button_value').val() + $('.zcf_style_height_button_unit').val())
		  });
		  break;
	  }

// Overal Style
	  $('.zcf_style_button, .zcf_style_field, .zcf_input_file_box, .zcf_checkmark_checkbox').css('border-radius', $('.zcf_style_border_fields_value').val() + $('.zcf_style_border_fields_unit').val());
	  $('.zcf_style_field').css('width', $('.zcf_style_width_value').val() + $('.zcf_style_width_unit').val());
	  $('.zcf_input_file_box').css('max-width', $('.zcf_style_width_value').val() + $('.zcf_style_width_unit').val());

	  zcf_clone.find('[title]').tooltipster({theme: 'tooltipster-shadow', restoration: 'current', maxWidth: '300'});

	  zcf_closest_block = $('.zcf_container').append(zcf_clone).find('.zcf_block').last();

	  updatePointsList(zcf_closest_block, zcf_points, zcf_points_title, zcf_add_block_type);

	  mailAndRedirectBlock(zcf_add_block_type + ' ' + zcf_num, zcf_add_block_type, zcf_element, zcf_num);

	  // Rules Add Option
	  addRulesPoint(zcf_add_block_type, zcf_num);

	  //Update Title
	  zcf_closest_block.find('.zcf_field_title').trigger('input');

	});


// Copy block editor fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_block_copy', function(event){

	  $(this).closest('.zcf_block').find('.tooltipstered').tooltipster('destroy');
	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();

	  zcf_clone = zcf_closest_block.clone(true);

	  var zcf_num0 = zcf_clone.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_clone.removeClass('zcf_field_template_' + zcf_add_block_type + '_' + zcf_num0);

	  zcf_num = ++zcf_field_list[zcf_add_block_type];
	  zcf_element = zcf_add_block_type + '_' + zcf_num;
	  zcf_clone.addClass('zcf_field_template_' + zcf_element);

	  zcf_clone.find('.zcf_' + zcf_add_block_type + '_rank').val(zcf_num);
	  zcf_clone.find('.zcf_show_hide_block').attr('data-zcf-state-form', 'off').html('<span class="dashicons dashicons-edit"></span>');
	  zcf_clone.find('.zcf_body_block').css('display', 'none');
	  zcf_title = zcf_clone.find('.zcf_field_title').val() === '' ? zcf_add_block_type + ' ' + zcf_num : zcf_clone.find('.zcf_field_title').val();
	  zcf_clone.find('.zcf_input_title').text(zcf_title);

	  // Check select value
	  var selects = $(zcf_closest_block).find("select");
	  $(selects).each(function(i){
		$(zcf_clone).find("select").eq(i).val($(this).val());
	  });

	  switch(zcf_add_block_type){
		case 'datetime':

		  zcf_attr = zcf_clone.find('.zcf_datetime_type').val();
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

		  zcf_clone.find('.zcf_set_calendar, .zcf_set_calendar_date, .zcf_set_calendar_time').datetimepicker('destroy');
		  zcf_clone.find('.zcf_set_calendar').datetimepicker({
			format: zcf_set_format_datetime,
			lang: zcf_calendar_local,
			mask: false,
			datepicker: (zcf_attr !== 'time' ? true : false),
			timepicker: (zcf_attr !== 'date' ? true : false),
			step: 5,
			dayOfWeekStart: zcf_default_start_week
		  });
		  zcf_clone.find('.zcf_set_calendar_date').datetimepicker(zcf_base_default_calendar_param);
		  zcf_clone.find('.zcf_set_calendar_time').datetimepicker({
			lang: zcf_calendar_local,
			format: zcf_default_time_format,
			mask: false,
			step: 5,
			datepicker: false
		  });

		  break;

		case 'radio':
		  zcf_clone.find('[name="radio_list[' + zcf_num0 + ']"]').prop('name', 'radio_list[' + zcf_num + ']');
		case 'rating':
		  zcf_clone.find('[name="rating_list[' + zcf_num0 + ']"]').prop('name', 'rating_list[' + zcf_num + ']');

		  var zcf_color_rating_val = zcf_clone.find('.zcf_rating_color_points').val();
		  zcf_clone.find('.wp-picker-container').remove();
		  zcf_clone.find('.zcf_rating_color_points_row').append($('<input/>', {'class': 'zcf_rating_color_points', name: 'rating_color_points[]', value: zcf_color_rating_val}));
		  setColorRatingParam(zcf_clone);
		case 'select':
		case 'checkbox':

		  zcf_clone.find('.zcf_list_title').each(function(index, element){

			var k = $(element).prop('name').match(/\[\d\]/g);
			k[0] = '[' + zcf_num + ']';
			$(element).prop('name', zcf_add_block_type + '_list_title' + k.join(''));
			zcf_clone.find('[name^="' + zcf_add_block_type + '_list_check"]').eq(index).prop('name', zcf_add_block_type + '_list_check' + k.join(''));

		  });
		  break;
	  }

	  mailAndRedirectBlock(zcf_title, zcf_add_block_type, zcf_element, zcf_num);

	  var zcf_closest_clone_block = $('.zcf_container').append(zcf_clone).find('.zcf_block').last();
	  $('.zcf_field_template_' + zcf_add_block_type + '_' + zcf_num).find('[title]').tooltipster({theme: 'tooltipster-shadow', restoration: 'current', maxWidth: '300'});
	  $('.zcf_field_template_' + zcf_add_block_type + '_' + zcf_num0).find('[title]').tooltipster({theme: 'tooltipster-shadow', restoration: 'current', maxWidth: '300'});

	  // Preview Rebuilding
	  var zcf_element2 = 'zcf_container_block_' + zcf_add_block_type + '_' + zcf_num0;
	  zcf_clone = $('.' + zcf_element2).clone((zcf_add_block_type === 'rating' ? true : false));
	  $('.' + zcf_element2).find('[class^="zcf_"]').each(function(index, element){
		var zcf_temp = $(element).attr('class').replace(/[\s\n\r]+/g, ' ').trim().split(' ');
		for(var i in zcf_temp){
		  var d = zcf_temp[i];
		  if(/[0-9]/g.test(d)){
			var zcf_list = d.split('_');
			if(/[0-9]/g.test(zcf_list[zcf_list.length - 2])){
			  zcf_list[zcf_list.length - 2] = zcf_num;
			}else{
			  zcf_list[zcf_list.length - 1] = zcf_num;
			}
			zcf_clone.find('.' + d).removeClass(d).addClass(zcf_list.join('_'));
		  }

		}
	  });
	  // Only Radio
	  if(zcf_add_block_type === 'radio'){
		zcf_clone.find('input').prop('name', 'radio[' + zcf_num + ']');
	  }

	  zcf_clone.removeClass(zcf_element2).addClass('zcf_container_block_' + zcf_element);

	  $('.zcf_preview_form').append(zcf_clone);

	  switch(zcf_add_block_type){

		case 'text':

		  zcf_clone.find('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).attr('zcf_num_attr', zcf_num);

		  if(zcf_closest_block.find('.zcf_connect_mask').prop('checked') && zcf_closest_block.find('.zcf_mask_template').val() !== ''){
			$('.zcf_container_field_text_' + zcf_num).mask(
				zcf_closest_block.find('.zcf_mask_template').val(),
				{
				  reverse: zcf_closest_block.find('.zcf_mask_revers').prop('checked'),
				  clearIfNotMatch: zcf_closest_block.find('.zcf_mask_clean').prop('checked'),
				  selectOnFocus: true
				}
			);
		  }

		  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).on('input', function(){

			var zcf_txt_max = zcf_closest_block.find('[name="text_length_max[]"]').val();
			var zcf_txt_min = zcf_closest_block.find('[name="text_length_min[]"]').val();

			if(zcf_add_block_type === 'text' && zcf_closest_block.find('.zcf_text_field_type').val() === 'number'){
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

			  $('.zcf_limit_span_min_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_min);
			  $('.zcf_limit_span_max_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_max);

			}


		  });

		  break;
		case 'textarea':

		  zcf_clone.find('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).attr('zcf_num_attr', zcf_num);

		  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).on('input', function(){

			var zcf_txt_max = zcf_closest_block.find('[name="textarea_length_max[]"]').val();
			var zcf_txt_min = zcf_closest_block.find('[name="textarea_length_min[]"]').val();

			if(zcf_txt_max !== ''){
			  $(this).val($(this).val().substr(0, zcf_txt_max));
			}

			zcf_txt_min = zcf_txt_min === '' ? 0 : zcf_txt_min;
			zcf_txt_max = zcf_txt_max === '' ? 0 : zcf_txt_max;
			zcf_txt_min = zcf_txt_min + ' (' + ($(this).val().length > zcf_txt_min ? zcf_txt_min : ($(this).val().length)) + ')';
			zcf_txt_max = (zcf_txt_max - $(this).val().length) < 0 ? 0 : (zcf_txt_max - $(this).val().length);

			$('.zcf_limit_span_min_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_min);
			$('.zcf_limit_span_max_' + zcf_add_block_type + '_' + zcf_num).text(zcf_txt_max);

		  });

		  break;
		case 'datetime':

		  generatePreviewCalendar($('.zcf_field_template_datetime_' + zcf_num));

		  break;
		case 'select':
		case 'checkbox':
		  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).find('.zcf_limit_list').attr('zcf_num_attr', zcf_num);
		  break;
		case 'rating':
		  createRatingPreview($('.zcf_field_template_' + zcf_add_block_type + '_' + zcf_num));
		  styleColorRating($('.zcf_field_template_' + zcf_add_block_type + '_' + zcf_num), hexToRGB(zcf_color_rating_val));
		  break;
		case 'accept':

		  if(zcf_closest_block.find('.zcf_accept_type').val() == 2){

			$('.zcf_label_accept_' + zcf_num).on('click', function(){
			  $(this).closest('.zcf_list_container').siblings('div.zcf_accept_text_block').toggle();
			});

		  }

		  break;
		case 'file':
		  zcf_clone.find('#zcf_file_' + zcf_num0).attr('id', 'zcf_file_' + zcf_num);
		  zcf_clone.find('label[for="zcf_file_' + zcf_num0 + '"]').attr('for', 'zcf_file_' + zcf_num);
		  CFileInput();
		  break;

	  }

	  calculationSizeField();

	  // Rules Add Option
	  $('.zcf_rules_if_field, .zcf_rules_then_field').append($('<option/>', {value: zcf_add_block_type + '_' + zcf_num, text: zcf_add_block_type + ' ' + zcf_num}));

	  //Update Title
	  zcf_closest_clone_block.find('.zcf_field_title').val(zcf_closest_clone_block.find('.zcf_field_title').val() + ' (' + zcf_template_fields_name.copy + ')');
	  zcf_closest_clone_block.find('.zcf_field_title').trigger('input');

	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Add Additional Fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_add_additional_block_button', function(){

	  var zcf_additional_attr = $(this).val();
	  var zbase;

	  switch(zcf_additional_attr){
		case 'name':
		case 'tel':
		case 'email':
		case 'url':
		case 'number':
		case 'address':

		  $('#zcf_template .zcf_add_block_button[value="text"]').trigger('click');
		  zbase = $('.zcf_container').find('.zcf_block').last();
		  zbase.find('.zcf_text_field_type').children('option[value="' + zcf_additional_attr + '"]').prop('selected', true).trigger('change');

		  break;
		case 'date':
		case 'time':

		  $('#zcf_template .zcf_add_block_button[value="datetime"]').trigger('click');
		  zbase = $('.zcf_container').find('.zcf_block').last();
		  zbase.find('.zcf_datetime_type').children('option[value="' + zcf_additional_attr + '"]').prop('selected', true).trigger('change');

		  break;
		case 'rating10':

		  $('#zcf_template .zcf_add_block_button[value="rating"]').trigger('click');
		  zbase = $('.zcf_container').find('.zcf_block').last();
		  zbase.find('.zcf_add_clone_row').trigger('click').trigger('click').trigger('click').trigger('click').trigger('click');

		  break;
	  }

	  zbase.find('.zcf_field_title').val(zcf_base_fields_title[zcf_additional_attr]).trigger('input');

	});


// Moving position field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_block_move', function(event){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_element = $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num);

	  zcf_block_index = $(parent).index();
	  zcf_block_length = $('#zcf_template .zcf_block').length;

	  if(zcf_block_index === 0 || zcf_block_index === (zcf_block_length - 1)){
		return;
	  }

	  zcf_attr = $(this).attr('data-zcf-block-move');
	  switch(zcf_attr){
		case 'up':
		  $(zcf_closest_block).prev('.zcf_block').before(zcf_closest_block);
		  $(zcf_element).prev('.zcf_container_block').before(zcf_element);
		  break;
		case 'down':
		  $(zcf_closest_block).next('.zcf_block').after(zcf_closest_block);
		  $(zcf_element).next('.zcf_container_block').after(zcf_element);
		  break;
	  }

	  calculationSizeField();

	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Label title field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_required', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_element = zcf_closest_block.find('.zcf_field_title').val();

	  if($(this).prop('checked')){
		zcf_attr = '*';
		zcf_title = !zcf_closest_block.find('.zcf_no_title').prop('checked') && zcf_element !== '' ? '&nbsp;<sup class="zcf_sup">*</sup>' : '';
	  }else{
		zcf_attr = '&nbsp;';
		zcf_title = '';
	  }
	  $('.zcf_container_label_' + zcf_add_block_type + '_' + zcf_num).html(zcf_element + zcf_title);
	  zcf_closest_block.find('.zcf_sup').html(zcf_attr);

	});


// Show/Hide block editor fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template, #zcf_logic").on('click', '.zcf_show_hide_block, .zcf_title_show_hide', function(event){

	  zcf_action = $(this).closest('.zcf_block, .zcf_rules_block_list').find('.zcf_show_hide_block');
	  zcf_block = $(zcf_action).closest('.zcf_block, .zcf_rules_block_list').children('.zcf_body_block, .zcf_rules_table');
	  if($(zcf_action).attr('data-zcf-state-form') === 'on'){
		$(zcf_action).attr('data-zcf-state-form', 'off');
		zcf_attr = 'dashicons-edit';
		$(zcf_block).hide();
	  }else{
		$(zcf_action).attr('data-zcf-state-form', 'on');
		zcf_attr = 'dashicons-minus';
		$(zcf_block).show();
	  }

	  $(zcf_action).html('<span class="dashicons ' + zcf_attr + '"></span>');
	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Show/Hide Event
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_options").on('click', '.zcf_show_hide_block_event', function(event){

	  if($(this).attr('data-zcf-state-form') === 'on'){
		$(this).attr('data-zcf-state-form', 'off');
		zcf_attr = 'dashicons-edit';
		$('.zcf_body_block_event').hide();
	  }else{
		$(this).attr('data-zcf-state-form', 'on');
		zcf_attr = 'dashicons-minus';
		$('.zcf_body_block_event').show();
	  }

	  $(this).html('<span class="dashicons ' + zcf_attr + '"></span>');
	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// No title field change
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_no_title', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if($(this).prop('checked')){
		zcf_attr = '';
	  }else{
		zcf_attr = zcf_closest_block.find('.zcf_field_title').val();
	  }

	  $('.zcf_container_label_' + zcf_add_block_type + '_' + zcf_num).text(zcf_attr);

	});


// Click Size Field Stop Event
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('click', '.zcf_size_field', function(event){

	  event.stopPropagation ? event.stopPropagation() : (event.cancelBubble = true);

	});


// Change Size Field
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_size_field', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).removeClass('zcf_size_field_100 zcf_size_field_75 zcf_size_field_66 zcf_size_field_50 zcf_size_field_33 zcf_size_field_25 zcf_size_field_20 zcf_size_field_16');
	  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).addClass('zcf_size_field_' + $(this).val());
	  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_num).attr('zcf-data-size', $(this).val());

	  calculationSizeField();

	});

//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  });

// Remove Rules Point 
//----------------------------------------------------------------------------------------------------------------

  var removeRulesPoint = function(zcf_element){

	$('.zcf_rules_block_list').each(function(index, element){

	  if(($(element).find('.zcf_rules_if_field').children().length - 1) > 1){
		if($(element).find('.zcf_rules_if_field').val() === zcf_element){

		  $(element).find('.zcf_rules_if_field :first-child, .zcf_rules_then_field :first-child').prop('selected', true);
		  $(element).find('.zcf_rules_then_field').prop('disabled', true);
		  $(element).find('.zcf_rules_if_condition_block, .zcf_rules_if_action, .zcf_rules_else_title, .zcf_rules_then_action').empty();

		}

		if($(element).find('.zcf_rules_then_field').val() === zcf_element){

		  $(element).find('.zcf_rules_then_field :first-child').prop('selected', true);
		  $(element).find('.zcf_rules_else_title, .zcf_rules_then_action').empty();

		}

		$(element).find('.zcf_rules_if_field option[value="' + zcf_element + '"]').remove();
		$(element).find('.zcf_rules_then_field option[value="' + zcf_element + '"]').remove();
	  }else{
		$(element).remove();
	  }

	});

  };

// Add Rules Point 
//----------------------------------------------------------------------------------------------------------------

  var addRulesPoint = function(zcf_add_block_type, zcf_num){

	zcf_attr = $('.zcf_field_template_' + zcf_add_block_type + '_' + zcf_num).find('.zcf_field_title').val();

	$('.zcf_rules_if_field, .zcf_rules_then_field').append($('<option/>', {value: zcf_add_block_type + '_' + zcf_num, text: (zcf_attr == '' ? zcf_add_block_type + ' ' + zcf_num : zcf_attr)}));

  };

// Calculation Size Field
//----------------------------------------------------------------------------------------------------------------

  var calculationSizeField = function(){

	var zcf_prev_block = '';
	var zcf_prev_index = 0;
	var zcf_sum_size_line = 0;

	$('.zcf_container_block').removeClass('zcf_size_field_padding');
	$('.zcf_container').find('.zcf_padding_state').val('false');

	$('.zcf_preview_form').find('.zcf_container_block').each(function(index, element){

	  if($(element).css('display') !== 'none'){
		zcf_sum_size_line += Number($(element).attr('zcf-data-size'));

		if(zcf_prev_block !== ''){
		  if(zcf_sum_size_line > 100){
			zcf_sum_size_line = Number($(element).attr('zcf-data-size'));
		  }else{
			$('.zcf_container').find('.zcf_padding_state').eq(zcf_prev_index).val('true');
			zcf_prev_block.addClass('zcf_size_field_padding');
		  }
		}
		zcf_prev_block = $(element);
		zcf_prev_index = index;
	  }
	});
  };

// Add Points List
//----------------------------------------------------------------------------------------------------------------

  updatePointsList = function(block, znum, title, type){

	// Update First Point List
	var zcf_block_point = block.find('.zcf_body_row tr').first();
	zcf_block_point.find('.zcf_list_title').val(title + '' + 1).trigger('input');
	zcf_block_point.find('.zcf_list_check').prop('checked', false);
	zcf_block_point.find('.zcf_list_check').next().val('false');

	// Add Points List
	for(var p = 1;p < znum;){
	  zcf_block_point.find('.zcf_add_clone_row').trigger('click');
	  block.find('.zcf_list_title').eq(p).val(title + '' + (++p)).trigger('input');
	}

	if(type === 'rating'){
	  createRatingPreview(block);
	}

  };


})(jQuery);
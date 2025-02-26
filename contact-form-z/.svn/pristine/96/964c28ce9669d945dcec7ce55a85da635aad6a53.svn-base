(function($){

  'use strict';

  $(function(){

// Colors style
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_colors_style', function(){
	  
	  var zcf_cparam = zcf_colors_style_param[$(this).val()].param;

	  $('.zcf_style_color_title').val(zcf_cparam.color_title).change();
	  $('.zcf_style_color_border').val(zcf_cparam.color_border).change();
	  $('.zcf_style_color_focus').val(zcf_cparam.color_focus).change();
	  $('.zcf_style_color_button').val(zcf_cparam.color_button).change();
	  $('.zcf_style_color_button_hover').val(zcf_cparam.color_button_hover).change();
	  $('.zcf_style_color_button_text').val(zcf_cparam.color_button_text).change();
	  $('.zcf_style_color_checked').val(zcf_cparam.color_checked).change();
	  $('.zcf_rating_color_points').val(zcf_cparam.color_checked).change();

	});

// Width fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_width_value, .zcf_style_width_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_width_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_width_unit').val();

	  $('.zcf_style_field').css('width', zcf_num + zcf_title);
	  $('.zcf_input_file_box').css('max-width', zcf_num + zcf_title);

	});


// Height fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_height_value, .zcf_style_height_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_height_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_height_unit').val();

	  $('.zcf_style_field:not(select[multiple])').not('textarea').css('height', zcf_num + zcf_title);

	});


// Height textarea
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_height_textarea_value, .zcf_style_height_textarea_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_height_textarea_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_height_textarea_unit').val();

	  $('textarea.zcf_style_field, select[multiple].zcf_style_field').css('height', zcf_num + zcf_title);

	});


// Width button
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_width_button_value, .zcf_style_width_button_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_width_button_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_width_button_unit').val();
	  zcf_attr = (zcf_title === 'initial' ? 'initial' : zcf_num + zcf_title);

	  if(zcf_title === 'initial'){
		$('.zcf_style_width_button_value').val('').attr('readonly', true);
	  }else{
		$('.zcf_style_width_button_value').attr('readonly', false);
	  }

	  $('.zcf_style_button').css('width', zcf_attr);

	});


// Height button
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_height_button_value, .zcf_style_height_button_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_height_button_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_height_button_unit').val();
	  zcf_attr = (zcf_title === 'initial' ? 'initial' : zcf_num + zcf_title);

	  if(zcf_title === 'initial'){
		$('.zcf_style_height_button_value').val('').attr('readonly', true);
	  }else{
		$('.zcf_style_height_button_value').attr('readonly', false);
	  }

	  $('.zcf_style_button').css('height', zcf_attr);

	});


// Radius fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_border_fields_value, .zcf_style_border_fields_unit', function(){

	  zcf_closest_block = $(this).closest('table');
	  zcf_num = checkFloat(zcf_closest_block.find('.zcf_style_border_fields_value'));
	  zcf_title = zcf_closest_block.find('.zcf_style_border_fields_unit').val();

	  $('.zcf_style_button, .zcf_style_field, .zcf_input_file_box, .zcf_checkmark_checkbox').css('border-radius', zcf_num + zcf_title);

	});


// Shadow fields
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_style").on('change', '.zcf_style_shadow', function(){

	  zcf_rgb = hexToRGB($('.zcf_style_color_focus').val());

	  if($(this).prop('checked')){
		zcf_shadow_fields = true;
	  }else{
		zcf_shadow_fields = false;
	  }

	  // Fields
	  $(".zcf_preview_form_general, .zcf_preview_form").on('focus', '.zcf_style_field', function(){
		this.style.setProperty('border-color', $('.zcf_style_color_focus').val(), 'important');
		$(this).css('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(' + zcf_rgb.r + ', ' + zcf_rgb.g + ', ' + zcf_rgb.b + ', .4)' : ''));
	  }).on('blur', '.zcf_style_field', function(){
		$(this).css({'border-color': $('.zcf_style_color_border').val(), 'box-shadow': 'none'});
	  });
	  
	  // Button
	  zcf_rgb = hexToRGB($('.zcf_style_color_button_hover').val());
	  
	  styleColorRatingPseudo('.zcf_container_block .zcf_style_button:hover', 'box-shadow: inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(' + zcf_rgb.r + ', ' + zcf_rgb.g + ', ' + zcf_rgb.b + ', .4)' : ''));
		

	});


// Color Title
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_title').wpColorPicker({
	  defaultColor: '',
	  hide: true,
	  palettes: false,
	  change: function(event, ui){

		styleColorRatingPseudo('.zcf_container_block .zcf_style_label', 'color: ' + ui.color.toString() + ' !important');
		
	  },
	  clear: function(){

		styleColorRatingPseudo('.zcf_container_block .zcf_style_label', 'color: inherit !important');

	  }
	});


// Color border
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_border').wpColorPicker({
	  defaultColor: zcf_def_color_border,
	  hide: true,
	  palettes: false,
	  change: function(event, ui){

		$('.zcf_input_file_box, .zcf_style_field').css('border-color', ui.color.toString());
		$('.zcf_input_file_box label').css('color', ui.color.toString());
		$('.zcf_input_file_box label figure').css('background-color', ui.color.toString());

	  },
	  clear: function(){

		$('.zcf_input_file_box, .zcf_style_field').css('border-color', zcf_def_color_border);
		$('.zcf_input_file_box label').css('color', zcf_def_color_border);
		$('.zcf_input_file_box label figure').css('background-color', zcf_def_color_border);

	  }
	});


// Color border focus
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_focus').wpColorPicker({
	  defaultColor: zcf_def_color,
	  hide: true,
	  palettes: false,
	  change: function(event2, ui2){

		zcf_rgb = hexToRGB(ui2.color.toString());
		$(".zcf_preview_form_general, .zcf_preview_form").on('focus', '.zcf_style_field', function(){
		  this.style.setProperty('border-color', ui2.color.toString(), 'important');
		  $(this).css('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(' + zcf_rgb.r + ', ' + zcf_rgb.g + ', ' + zcf_rgb.b + ', .4)' : ''));
		}).on('blur', '.zcf_style_field', function(){
		  $(this).css({'border-color': $('.zcf_style_color_border').val(), 'box-shadow': 'none'});
		});

		$(".zcf_preview_form_general, .zcf_preview_form").on('mouseover', '.zcf_input_file_box label', function(){
		  this.style.setProperty('color', ui2.color.toString(), 'important');
		  this.querySelector('figure').style.setProperty('background-color', ui2.color.toString(), 'important');
		}).on('mouseout', '.zcf_input_file_box label', function(){
		  $(this).css('color', $('.zcf_style_color_border').val());
		  $(this).find('figure').css('background-color', $('.zcf_style_color_border').val());
		}).on('focus', '.zcf_input_file_box label', function(){
		  this.style.setProperty('color', ui2.color.toString(), 'important');
		  this.querySelector('figure').style.setProperty('background-color', ui2.color.toString(), 'important');
		});

	  },
	  clear: function(){

		$(".zcf_preview_form_general, .zcf_preview_form").on('focus', '.zcf_style_field', function(){
		  this.style.setProperty('border-color', zcf_def_color, 'important');
		  $(this).css('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(62, 151, 235, .4)' : ''));
		}).on('blur', '.zcf_style_field', function(){
		  $(this).css({'border-color': $('.zcf_style_color_border').val(), 'box-shadow': 'none'});
		});

		$(".zcf_preview_form_general, .zcf_preview_form").on('mouseover', '.zcf_input_file_box label', function(){
		  this.style.setProperty('color', zcf_def_color, 'important');
		  this.querySelector('figure').style.setProperty('background-color', zcf_def_color, 'important');
		}).on('mouseout', '.zcf_input_file_box label', function(){
		  $(this).css('color', $('.zcf_style_color_border').val());
		  $(this).find('figure').css('background-color', $('.zcf_style_color_border').val());
		});

	  }
	});


// Color button
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_button').wpColorPicker({
	  defaultColor: zcf_def_color,
	  hide: true,
	  palettes: false,
	  change: function(event, ui3){

		$('.zcf_style_button').css({'background-color': ui3.color.toString(), 'border-color': ui3.color.toString()});

	  },
	  clear: function(){

		$('.zcf_style_button').css({'background-color': zcf_def_color, 'border-color': zcf_def_color});

	  }
	});


// Color button hover
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_button_hover').wpColorPicker({
	  defaultColor: zcf_def_color_hover_button,
	  hide: true,
	  palettes: false,
	  change: function(event, ui4){
		zcf_rgb = hexToRGB(ui4.color.toString());
		$(".zcf_preview_form_general").on('mouseover', '.zcf_style_button', function(){
		  this.style.setProperty('background-color', ui4.color.toString(), 'important');
		  this.style.setProperty('border-color', ui4.color.toString(), 'important');
		  this.style.setProperty('color', $('.zcf_style_color_button_text').val(), 'important');
		  this.style.setProperty('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(' + zcf_rgb.r + ', ' + zcf_rgb.g + ', ' + zcf_rgb.b + ', .4)' : ''), 'important');
		}).on('mouseout', '.zcf_style_button', function(){
		  $(this).css({
			'background-color': $('.zcf_style_color_button').val(),
			'border-color': $('.zcf_style_color_button').val(),
			'color': $('.zcf_style_color_button_text').val(),
			'box-shadow': 'inset 0 1px 1px rgba(0,0,0,.075)'
		  });
		});

	  },
	  clear: function(){

		$(".zcf_preview_form_general").on('mouseover', '.zcf_style_button', function(){
		  this.style.setProperty('background-color', zcf_def_color_hover_button, 'important');
		  this.style.setProperty('border-color', zcf_def_color_hover_button, 'important');
		  this.style.setProperty('color', $('.zcf_style_color_button_text').val(), 'important');
		  this.style.setProperty('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075)' + (zcf_shadow_fields ? ',0 0 0 0.2rem rgba(62, 151, 235, .4)' : ''), 'important');
		}).on('mouseout', '.zcf_style_button', function(){
		  $(this).css({
			'background-color': $('.zcf_style_color_button').val(),
			'border-color': $('.zcf_style_color_button').val(),
			'color': $('.zcf_style_color_button_text').val(),
			'box-shadow': 'inset 0 1px 1px rgba(0,0,0,.075)'
		  });
		});
	  }
	});


// Color button text
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_button_text').wpColorPicker({
	  defaultColor: zcf_def_color_text_button,
	  hide: true,
	  palettes: false,
	  change: function(event, ui5){

		$('.zcf_style_button').css('color', ui5.color.toString());

		$(".zcf_preview_form_general").on('mouseover', '.zcf_style_button', function(){
		  this.style.setProperty('background-color', $('.zcf_style_color_button_hover').val(), 'important');
		  this.style.setProperty('border-color', $('.zcf_style_color_button_hover').val(), 'important');
		  this.style.setProperty('color', ui5.color.toString(), 'important');
		}).on('mouseout', '.zcf_style_button', function(){
		  $(this).css({
			'background-color': $('.zcf_style_color_button').val(),
			'border-color': $('.zcf_style_color_button').val(),
			'color': ui5.color.toString()
		  });
		});

	  },
	  clear: function(){

		$('.zcf_style_button').css('color', zcf_def_color_text_button);

		$(".zcf_preview_form_general").on('mouseover', '.zcf_style_button', function(){
		  this.style.setProperty('background-color', $('.zcf_style_color_button_hover').val(), 'important');
		  this.style.setProperty('border-color', $('.zcf_style_color_button_hover').val(), 'important');
		  this.style.setProperty('color', zcf_def_color_text_button, 'important');
		}).on('mouseout', '.zcf_style_button', function(){
		  $(this).css({
			'background-color': $('.zcf_style_color_button').val(),
			'border-color': $('.zcf_style_color_button').val(),
			'color': zcf_def_color_text_button
		  });
		});

	  }
	});


// Color checkbox and radio
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$('.zcf_style_color_checked').wpColorPicker({
	  defaultColor: zcf_def_color,
	  hide: true,
	  palettes: false,
	  change: function(event, ui6){

		$('.zcf_list_container').find('input:checked').siblings('.zcf_checkmark').css(
			{'background-color': ui6.color.toString(),
			  'border-color': ui6.color.toString()
			});

		$(".zcf_preview_form").on('change', '.zcf_list_container', function(){

		  if($(this).find('input').prop('checked')){
			$(this).find('.zcf_checkmark').css({'background-color': ui6.color.toString(), 'border-color': ui6.color.toString()});
			$(this).closest('div').find('.zcf_checkmark_radio').not($(this).find('.zcf_checkmark_radio')).css({'background-color': 'transparent', 'border-color': '#eee'});
		  }else{
			$(this).find('.zcf_checkmark').css({'background-color': 'transparent', 'border-color': '#eee'});
		  }

		  $(".zcf_preview_form").on('mouseover', '.zcf_list_container', function(){
			if(!$(this).find('input').prop('checked')){
			  this.querySelector('.zcf_checkmark').style.setProperty('border-color', '#ccc', 'important');
			}
		  }).on('mouseout', '.zcf_list_container', function(){
			if(!$(this).find('input').prop('checked')){
			  this.querySelector('.zcf_checkmark').style.setProperty('border-color', '#eee', 'important');
			}
		  });

		});

	  },
	  clear: function(){

		$('.zcf_list_container').find('input:checked').siblings('.zcf_checkmark').css(
			{'background-color': zcf_def_color,
			  'border-color': zcf_def_color
			});

		$(".zcf_preview_form").on('change', '.zcf_list_container', function(){

		  if($(this).find('input').prop('checked')){
			$(this).find('.zcf_checkmark').css({'background-color': zcf_def_color, 'border-color': zcf_def_color});
			$(this).closest('div').find('.zcf_checkmark_radio').not($(this).find('.zcf_checkmark_radio')).css({'background-color': 'transparent', 'border-color': '#eee'});
		  }else{
			$(this).find('.zcf_checkmark').css({'background-color': 'transparent', 'border-color': '#eee'});
		  }

		  $(".zcf_preview_form").on('mouseover', '.zcf_list_container', function(){
			if(!$(this).find('input').prop('checked')){
			  this.querySelector('.zcf_checkmark').style.setProperty('border-color', '#ccc', 'important');
			}
		  }).on('mouseout', '.zcf_list_container', function(){
			if(!$(this).find('input').prop('checked')){
			  this.querySelector('.zcf_checkmark').style.setProperty('border-color', '#eee', 'important');
			}
		  });

		});



	  }
	});

  });

})(jQuery);
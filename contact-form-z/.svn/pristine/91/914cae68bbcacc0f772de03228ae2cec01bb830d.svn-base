(function($){

  'use strict';

  $("#zcf_tabs").tabs();
  $('#zcf_tabs .zcf_add_block_button[title]').tooltipster({
	theme: 'tooltipster-light',
	restoration: 'current',
//	maxWidth: '300',
	distance: -45,
	arrow: false,
	side: 'right',
	animationDuration: 0,
	delay: 0,
	contentAsHTML: true
  });
  $('#zcf_tabs [title]').tooltipster({
	theme: 'tooltipster-shadow',
	restoration: 'current',
	maxWidth: '300'
  });

  $(function(){

	$("body").on('click', '.zcf_container_title_label', function(){
	  var zcf_input = $(this).siblings('input[type="checkbox"], input[type="radio"]');
	  if(!zcf_input.prop('disabled')){
		zcf_input.prop('checked', !(zcf_input.prop('checked'))).trigger('change');
	  }
	});

// Enter general title
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$(".zcf").on('input', '.zcf_general_title', function(){

	  $('.zcf_title_set_block').text($(this).val());

	});


// Show/Hide Math CAPTCHA
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_options").on('change', '.zcf_add_mathcaptcha', function(){

	  if($(this).prop('checked')){
		showHideMathCaptcha();
	  }else{
		$(".zcf_mathcaptcha_block").closest('.zcf_container_block').remove();
	  }

	});


// Show/Hide reCAPTCHA
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_options").on('change', '.zcf_add_recaptcha', function(){

	  if($(this).prop('checked')){
		$(".zcf_container_block_button_0").before(
			$('<div/>', {'class': 'zcf_container_block zcf_container_block_recaptcha_0'})
			.append($('<div/>', {id: 'g-recaptcha'}))
			);
		grecaptcha.render('g-recaptcha', {
		  'sitekey': $(this).attr('data-key')
		});
	  }else{
		$(".zcf_preview_form_general").find('#g-recaptcha').remove();
	  }

	});


// Delete line redirection rules
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("#zcf_options, #zcf_paste, #zcf_logic").on('click', '.zcf_list_remove_row', function(){

	  $(this).closest('tr').remove();

	});


// Show/Hide preview form
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$(".zcf").on('click', '.zcf_show_hide_preview_form', function(){

	  zcf_attr = $(this).attr('data-state-preview');
	  zcf_closest_block = $(this).closest('.meta-box-sortables');
	  if(zcf_attr === 'off'){
		zcf_closest_block.addClass('zcf_style_preview_form');
		$(this).attr('data-state-preview', 'on');
		$(this).closest('.zcf').find('.zcf_hdn').addClass('zcf_style_preview_form_hidden');
	  }else{
		zcf_closest_block.removeClass('zcf_style_preview_form');
		$(this).attr('data-state-preview', 'off');
		$(this).closest('.zcf').find('.zcf_hdn').removeClass('zcf_style_preview_form_hidden');
	  }

	});


// Select Shortcode from lisl table
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$(".zcf").on('click', '.zcf_shortcode', function(){

	  var doc = document, range, selection;
	  if(doc.body.createTextRange){
		range = document.body.createTextRange();
		range.moveToElementText(this);
		range.select();
	  }else if(window.getSelection){
		selection = window.getSelection();
		range = document.createRange();
		range.selectNodeContents(this);
		selection.removeAllRanges();
		selection.addRange(range);
	  }
	  document.execCommand("copy");

	});


// View History
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$(".zcf").on('click', '.zcf_history_form', function(){

	  $('.zcf_history_form_list').toggle();

	});


// Update reCaptcha
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$(".zcf").on('click', '.zcf_update_recaptcha', function(){

	  $('.zcf_recaptcha_input, .zcf_save_recaptcha').show();
	  $('.zcf_recaptcha_text, .zcf_update_recaptcha').remove();

	});


// Show/Hide Template Fields List
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

	$("body").on('change', '.zcf_check_template_field', function(){

	  $('.zcf_template_form_hide').css('display', '');
	  $('.zcf_template_form_' + $(this).val()).css('display', 'block');

	});

//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

  });


})(jQuery);

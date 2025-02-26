(function($){
  'use strict';

  var zcf_ajax_url = typeof zcf_admin_ajax === 'undefined' || zcf_admin_ajax === null ? '' : zcf_admin_ajax;
  var zcf_ajax_parent;
  var zcf_ajax_form_id;
  var zcf_ajax_attr;
  var zcf_ajax_action;

  $(function(){
	$("body").on('click', '.zcf_container_title_label', function(){
	  var zcf_input = $(this).siblings('input[type="checkbox"], input[type="radio"]');
	  if(!zcf_input.prop('disabled')){
		zcf_input.prop('checked', !(zcf_input.prop('checked'))).trigger('change');
	  }
	});
  });

  $("html").on('click', '.zcf_send_public_form', function(){

	var zcf_button = $(this);

	zcfPublicStartPreload(zcf_button);

	var zcf_form = zcf_button.closest('form');
	var zcf_form_id = zcf_form.find('input[name=form_id]').val();

	zcf_form.find('.zcf_error_message').empty().css('display', 'none');


	var zcf_data = new FormData();
	zcf_data.append('action', 'send_form');

	// Input data
	$.each(zcf_form.serializeArray(), function(key, input){
	  zcf_data.append(input.name, input.value);
	});

	//File data
	var file_data = zcf_form.find('input[type="file"]');
	for(var i = 0;i < file_data.length;i++){
	  var d = file_data[i].files;

	  if(d.length === 0)
		continue;

	  for(var i2 = 0;i2 < d.length;i2++){
		zcf_data.append(file_data[i].name + '[]', d[i2]);
	  }

	}

	$.ajax({
	  url: zcf_ajax_url,
	  data: zcf_data,
	  dataType: "json",
	  type: "POST",
	  processData: false,
	  contentType: false,
	  error: function(){

		zcfPublicEndPreload(zcf_button);
		zcfAlert(zcf_message.error_title, zcf_message.error, 'red', zcf_form_id);

	  },
	  success: function(response){
		if(response.success){

		  try{

			var zcf_event = new CustomEvent('zcf_' + response.data.generate_id, {
			  bubbles: true
			});

			document.dispatchEvent(zcf_event);

			zcfMessage(zcf_message.success_title, response.data.message, response.data.link, zcf_form_id);

		  }catch(err){
			zcfPublicEndPreload(zcf_button);
			zcfAlert(zcf_message.error_title, zcf_message.error, 'red', zcf_form_id);
		  }

		}else{

		  for(var i in response.data.error){
			var key = response.data.error[i];
			var msg_list = [];

			for(var i2 in key){
			  var msg = key[i2];
			  msg_list.push(msg);
			}

			$('.zcf_error_block_' + i).html(msg_list.join('<br/>')).css('display', 'block');
		  }

		  zcfAlert(zcf_message.confirm_title, response.data.error_global.error, 'orange', zcf_form_id);

		}

		zcfPublicEndPreload(zcf_button);

	  }

	});

  });


// Hied Error Block
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  $("body").on('click', '.zcf_error_message', function(){
	$(this).slideUp(500);
  });


// Start Preload
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfPublicStartPreload = function(obj){

	$(obj).closest('.zcf_container_block').css('display', 'none');
	$(obj).closest('.zcf_public').find('.zcf_bubbles').css('display', 'block');

  };

// Stop Preload
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfPublicEndPreload = function(obj){

	$(obj).closest('.zcf_container_block').css('display', 'block');
	$(obj).closest('.zcf_public').find('.zcf_bubbles').css('display', 'none');

  };

// Alert Message
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfAlert = function(m_title, m_content, m_type, form_id){

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
		  btnClass: 'zcf_style_button_alert' + form_id
		}
	  }
	});

  };

// Success Message
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
  var zcfMessage = function(m_title, m_content, m_action, form_id){

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
		  btnClass: 'zcf_style_button_alert' + form_id,
		  action: function(){
			if(m_action !== ''){
			  location.href = m_action;
			}else{
			  location.reload();
			}
		  }
		}
	  }
	});

  };



})(jQuery);

(function(){

  if(typeof window.CustomEvent === "function")
	return false;

  function CustomEvent(event, params){
	params = params || {bubbles: false, cancelable: false, detail: undefined};
	var evt = document.createEvent('CustomEvent');
	evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
	return evt;
  }

  CustomEvent.prototype = window.Event.prototype;

  window.CustomEvent = CustomEvent;
})();

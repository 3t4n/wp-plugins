(function($){

  'use strict';

  $(function(){

// Add block template letter
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_mail").on('click', '.zcf_add_mail_block', function(){

	  zcf_clone = $('.zcf_general_mail_template').clone(true);
	  zcf_num = ++zcf_field_list['mail'];

	  zcf_clone.removeClass('zcf_general_mail_template');
	  zcf_clone.find('.zcf_block_mail_remove').removeClass('zcf_hidden_block');
	  zcf_clone.find('.zcf_header_mail_title td:first-child b').text($(this).attr('data-mail-title'));

	  zcf_clone.find('[name="mail_template[]"]').val(zcf_num);
	  zcf_clone.find('[name^="whom"]').attr('name', 'whom[' + zcf_num + ']');
	  zcf_clone.find('[name^="from"]').attr('name', 'from[' + zcf_num + ']');
	  zcf_clone.find('[name^="reply-to"]').attr('name', 'reply-to[' + zcf_num + ']');
	  zcf_clone.find('[name^="subject"]').attr('name', 'subject[' + zcf_num + ']');

	  zcf_clone.find('.zcf_mail_editor').empty().append($('<textarea/>', {id: 'zcf_editor_id_' + zcf_num, name: 'body_mail[' + zcf_num + ']'}).css('height', '400px'));

	  zcf_clone.find('[name^=mail_file]').each(function(index, element){
		$(element).attr('name', 'mail_file[' + zcf_num + '][]').prop('checked', false);
	  });

	  $('#zcf_mail').children('.zcf_mail_template').last().after(zcf_clone);

	  wp.editor.initialize('zcf_editor_id_' + zcf_num, {
		tinymce: {
		  wpautop: true,
		  dfw: false,
		  toolbar1: "formatselect, bold, italic, bullist, numlist, blockquote, alignleft, aligncenter, alignright, link, wp_more, fullscreen, wp_adv",
		  toolbar2: "strikethrough, hr, forecolor, pastetext, removeformat, charmap, outdent, indent, undo, redo, wp_help"
		},
		quicktags: true
	  });



	});


// Delete block template letter
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_mail").on('click', '.zcf_block_mail_remove', function(event){

	  var th = $(this);

	  $.confirm({
		title: zcf_message.confirm_title,
		content: zcf_admin_message.mail_remove + '?',
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
			  th.closest('.zcf_mail_template').remove();
			}
		  },
		  btnCancel: {
			text: zcf_message.cancel,
			btnClass: 'button button-default zcf_style_button_alert_none'
		  }
		}
	  });

	});

  });

})(jQuery);
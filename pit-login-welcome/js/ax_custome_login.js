jQuery(document).ready( function($){
//**************** ADMIN SECTION START HERE ****************************

	jQuery('#ax_custom_login_bg_color').wpColorPicker();


      /* WP Media Uploader */
    var _rtp_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        jQuery('.rtp-media-uploader').click(function () {

            var button = jQuery(this),
                textbox_id = jQuery(this).attr('data-id'),
                image_id = jQuery(this).attr('data-src');

            _rtp_media = true;

            wp.media.editor.send.attachment = function (props, attachment) {

                //console.log(attachment);

                if ( _rtp_media && ( attachment.type === 'image' ) ) {
                    jQuery( '#'+ textbox_id ).val( attachment.id );
                    jQuery( '#'+ image_id ).attr( 'src', attachment.url );
                    button.next().show();
                } else {
                    alert('Please select a valid image file');
                    return false;
                }
            }

            wp.media.editor.open(button);
            return false;
        });

        jQuery('.add_media').on('click', function(){
            _rtp_media = false;
        });


jQuery("#ax_add_new_message").click(function(){

$.ajax({
			url:ajaxurl,
			data: {
					'action':'add_messages',
					'ax_add_message':$('#ax_custom_add_login_message').val()					
			       },
			success:function(data) {
			var new1_message='<tr valign="top" class="msg_row" id="'+data+'"><td><input type="radio" id="'+data+'" name="message" value="ax_custom_login_message_'+data+'"> </td><th scope="row">Message :</th><td><input  type="text"  id="ax_custom_login_message_'+data+'"  name="ax_custom_login_message_'+data+'" value="'+$('#ax_custom_add_login_message').val()+'"/></td></tr>';
			
				$('#message_table').append(new1_message);
				jQuery('#ax_custom_add_login_message').val('');
			    },
			error: function(errorThrown){
			    }
			});
	});
		
		
//Upadate Message//
jQuery(".ax_message_action").click(function(){
	ax_msg=$( "#message_table input[type=radio]:checked" ).val();
	arrindex=$( "#message_table input[type=radio]:checked" ).attr('id');
	$.ajax({
			url:ajaxurl,
			data: {
					'action':'update_messages',
					'ax_add_message':$('#'+ax_msg).val(),
					'ax_array_index':arrindex,
					'operation':this.id					
			       },
			success:function(data) {
			if(data=='ax_delete_message'){
				$('#message_table tr#'+arrindex).remove();
			}
		    },
			error: function(errorThrown){
			    }
			});
	});	
	
	
	$('#remove_logo').click(function(){
	$('#ax_custom_login_image').val('');
	$('#custom-login-logo').attr('src','');
	});
	
	$('#remove_bg').click(function(){
	$('#ax_custom_background_image').val('');
	$('#custom-login-bg').attr('src','');
	});

});


	
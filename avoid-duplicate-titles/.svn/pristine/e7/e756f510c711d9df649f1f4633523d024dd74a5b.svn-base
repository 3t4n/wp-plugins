
 /*
  *  author : venutius 
  *  website link : www.buddyuser.com  
  *  $('#publish').attr('disabled','disabled');
  */

jQuery(document).ready(function($){
   
    function wpadt_check_title_ajax(title, id, post_type, nonce) {
        var data = {
            action: 'title_checks',
            post_title: title,
            post_type: post_type,
            post_id: id,
			nonce: nonce
        };
        $.post(ajaxurl, data, function(response) {
			$('#message').remove();
			if ( response.length >= 76 ) {
				$('#publish').attr('disabled','disabled');
				$('#poststuff').prepend('<div id=\"message\" class=\"error below-h2 fade \"><p>'+response+'</p></div>');
			} else {
				$('#publish').removeAttr('disabled');
				$('#poststuff').prepend('<div id=\"message\" class=\"updated below-h2 fade \"><p>'+response+'</p></div>');
			}
		}); 
    };
    $('#title').change(function() {
        var title = $('#title').val();
        var id = $('#post_ID').val();
        var post_type = $('#post_type').val();
		var nonce = $('#_wpnonce').val();
        wpadt_check_title_ajax(title, id,post_type, nonce);
    });
	
	function wpadt_block_editor_check_title_ajax( title, id, post_type ) {
		console.log(title);
	}

    $('#post_ID').change(function() {
        var title = $('#post-title-0').val();
        var id = $('#post_ID').val();
        var post_type = $('#post_type').val();
        wpadt_block_editor_check_title_ajax(title, id,post_type);
    });
	postId = $('#post_title-0').val();
	console.log(postId);
});

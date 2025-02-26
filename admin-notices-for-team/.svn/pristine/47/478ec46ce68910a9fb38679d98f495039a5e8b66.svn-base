jQuery(document).ready(function($) {
    $('.ant-notice.is-dismissible').on('click', '.notice-dismiss', function(e){
       e.preventDefault();
        var div = $(this).parents('div:first');
        var dismiss = div.attr('data-notice-id');
      data = {
      	action: 'ant_dismiss',
		  notice: dismiss,
      	ant_nonce: ant_vars.ant_nonce
      };

     	$.post(ajaxurl, data, function(response) {
            $('.ant-notice.notice-dismiss').html(response);
            //$('.ant-notice.notice-dismiss').nextSibling().html(response);

		});	
		
		return false;
	});
});
jQuery(document).ready(function($){

    // Perform AJAX login on form submit
    $('form#login_form').on('submit', function(e){
        $('form#login_form p.status').show().text(ajax_login_object.loadingmessage);
		
        $.ajax({
			
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
			
            
                'action': 'mith_arcl_ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login_form #username').val(), 
                'password': $('form#login_form #password').val(), 
                'security': $('form#login_form #security').val() },
          
				
				
            success: function(data){
				
			    $('form#login_form p.status').text(data.message);
				$('form#login_form p.status').removeClass('hide');
                if (data.loggedin == true){
                  document.location.href = ajax_login_object.redirecturl;
                }	
				
            }
			
        });
		
		
        e.preventDefault();
    });
});
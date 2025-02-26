jQuery(document).ready(function() { 
	// check and validate user is username setting page and text box is not empty
	if(pagenow == "settings_page_username-setting-admin"){
		jQuery('#submit').click(function(e){
			username = jQuery('#username').val();
			if(username.length > 0){
				jQuery.post(
                    ajaxurl, 
					{
                        action: "check_username_already_exist", 
                        username: username
                    },
                   function(result) 
                    {
                        if( result == 0){ 	//"Username In Use!"
							alert('Username in use');
							return false;
                        }
                        else if(result == 1){	//"Username Not In Use!"
							return true;
                        }
				   }
				);			
			}
			else{
				return false;
			}
		});	
	}
	
	//Call Ajax function from here
	jQuery('#clickme').click(function(e) {
		username = jQuery('#username').val();
        if (username.length > 0){
		  jQuery.post(
                    ajaxurl, 
					{
                        action: "check_username_already_exist", 
                        username: username
                    },
                   function(result) 
                    {
                        if( result == 0){ //"Username In Use!"
							jQuery('#username-use').css('color','#FF0000');
							jQuery('#username-use').html('Username In Use!');
                        }
                        else if(result == 1){ //"Username Not In Use!"
							jQuery('#username-use').css('color','#00FF00');
							jQuery('#username-use').html('Username Not In Use!');
                        }
				   }
            );
		}
	});
});
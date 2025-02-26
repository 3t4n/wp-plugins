jQuery(document).ready(function($){ //actie alleen uitvoeren wanneer page ready is
	jQuery("#user_name").change(function (e) { //on change functie zetten op div #user_name
		var username = this.value; //de waarde uit het input field
		jQuery.post(
		    ajaxurl, {
		        'action': 'check_username', //de functie die in wordpress wordt opgeroepen 
		        'data':   {'usernameToCheck': username} //de input die gechecked moet worden
		    }, 
		    function(response){ //de functie die na de check wordt uitgevoerd
		    	if(response == 1) {
			    	jQuery("#user_name").attr('class', 'validateGreen');
		    	} else {
			    	jQuery("#user_name").attr('class', 'validateRed');
		    	}
		    }
	   );
	});
});
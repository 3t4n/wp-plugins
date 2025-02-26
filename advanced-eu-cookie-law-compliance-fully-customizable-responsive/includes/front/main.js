function agree_cookie_law(){
	createLocalCookie("cookie_law",1,21900);
	jQuery(".eu-law-container").hide();
	jQuery("body").removeClass("add-eu-law");
}

jQuery(document).ready(function() {
	var x=readLocalCookie("cookie_law");
	if(x){
		return;
	}
	else
	{
		jQuery(".eu-law-container").show();
		jQuery("body").addClass("add-eu-law");
	}
});

function createLocalCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function eraseCookie(name) {
	createLocalCookie(name,"",-1);
}

function readLocalCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

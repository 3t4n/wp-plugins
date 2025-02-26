$j=jQuery.noConflict(false);

$j(document).ready(function(){
/** amz_lb_ret */
	if (amz_lb_ret.show_once>0 && readCookie("amz_lb_ret")==1)
	{
	
	} else {
		window.setTimeout(show_facebox, amz_lb_ret.delay)
	}

});

function show_facebox(){
	if (amz_lb_ret.show_once>0){
		createCookie("amz_lb_ret", "1", amz_lb_ret.show_once);
	}
$j('a#inline').fancybox({
	'autoDimensions': true,
	'modal': false,
	'padding' : 0,
	'centerOnScroll':true,
	'hideOnOverlayClick' : false}).trigger('click');
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
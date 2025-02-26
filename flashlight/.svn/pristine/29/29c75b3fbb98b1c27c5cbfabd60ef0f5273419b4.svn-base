jQuery(document).ready(function($){
	//flaslight
	$(document).on('mousemove', function(e){
		$('.nw-flashlight').css({
		   left:  e.pageX - 125,
		   top:   e.pageY - 125
		});
	});
	//cookie
	function createCookie(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		}
		else var expires = "";
		document.cookie = name + "=" + value + expires + "; path=/";
	}
	
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}
	//toggle
	$("input.toggle-nw-checkbox").change(function() {
		if ($(this).is(':checked')) {
			$(".pre-nw-flashlight").addClass('nw-flashlight');
			createCookie("pre", "nw-flashlight", 1000);
		} else {
			$(".pre-nw-flashlight").removeClass('nw-flashlight');
			eraseCookie("pre", "nw-flashlight");
		}
	});

	if (readCookie("pre")) {
		$(".pre-nw-flashlight").addClass('nw-flashlight');
		$('input.toggle-nw-checkbox').attr('checked', 'checked');

	}	
});
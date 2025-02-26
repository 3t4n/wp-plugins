jQuery(document).ready(function($){

	var days = 1;

	if (wa_placement_script.wa_banner_duration) {
		days = parseInt(wa_placement_script.wa_banner_duration);
	} else {
		days = 0;
	}

	var expiretime = parseInt(localStorage.getItem('expiretime'));
	var now = new Date().getTime();

	
	if (!expiretime || now > expiretime ) {
	 	if ( wa_placement_script.wa_placement == 'top') {
	 		$('body').prepend(wa_placement_script.html);
	 		$('body').addClass('minddnd-wa-announcement-padding-top');

	  }	else {
	  	$('body').append(wa_placement_script.html);
	  }
	} 

	$('.mind-wa-close-announcement').on('click', function(){
		$('.minddnd-wa-announcement-wrap').addClass('minddnd-wa-hidden');
		$('body').removeClass('minddnd-wa-announcement minddnd-wa-announcement-padding-top');

		var starttime = new Date().getTime();
		const milliseconds = 86400000;
		var expirelength = (days * milliseconds);
		var lsExpireTime = starttime + expirelength;
		localStorage.setItem('expiretime', lsExpireTime );

	});
	
});
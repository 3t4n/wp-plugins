/**
 * AWS Cookie Popup JavaScripts
 * 
 * @version 1.3.0
 * @since 1.0.0
 */

(function ($) {

	/* Check document cookie, do nothing if cookie shows user has visited before (in last 15 days) */
	if ($.cookie("aws_visited") != 'true') {
		//console.log('New visitor, display popup');

		/*Set bg color*/
		var aws_popup_bgcolor = $('#aws_popup_bgcolor').val();
		$('#aws_cookie').css("background", aws_popup_bgcolor);

		/*Set font color*/
		var aws_popup_fcolor = $('#aws_popup_fcolor').val();
		$('#aws_cookie').find('*').css("color", aws_popup_fcolor);
		
		/*Set button font color*/
		var aws_popup_bfcolor = $('#aws_popup_bfcolor').val();
		$('#aws_cookie').find('.close-popup').css("color", aws_popup_bfcolor);

		/*Set close button bg color*/
		var aws_close_bgcolor = $('#aws_close_bgcolor').val();
		$('#aws_cookie_accept').css("background-color", aws_close_bgcolor);

		/* Disply the cookie message */
		$('#aws_cookie').show("fast");

		/* Cookie expiration time */
		var aws_popup_expire = parseInt($('#aws_popup_expire').val());

		/* Set popup not to display if user visited the site in the last 15 days */
		$.cookie('aws_visited', 'true', {
			expires: aws_popup_expire,
			path: '/'
		}); //cookie to be valid for entire site
	}

	$('#aws_cookie').show("fast");
	// $(".box").removeClass("popup-cookie");

	/* Allow user to close cookie popup */
	$('.close-popup').click(function () {
		//console.log('Close button clicked');
		$('#aws_cookie').hide("fast");
		return false;
	});

	/* Allow user to close cookie popup with escape, return or space button */
	$(document).keydown(function (eventObject) {
		if (eventObject.which == 27) { //Escape button
			//console.log('Escape button pressed');
			$('.close-popup').click(); //emulates click on prev button 
		}
	});

})(jQuery);
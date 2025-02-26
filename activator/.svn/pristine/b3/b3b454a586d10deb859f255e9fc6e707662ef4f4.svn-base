jQuery(document).ready(function($) {
	    // $() will work as an alias for jQuery() inside of this function
	$('#generator').click(function() {
		var disptext='[scriptact name="';
		disptext += $('#name').val();
		disptext +='" url="';
		disptext += $('#url').val();
		disptext +='" dependencies="';
		disptext += $('#dependencies').val();
		disptext +='"]';
		  $('#display').text(disptext);
		});
	$('#demo').click(function() {
		$('#name').val('my-script');
		$('#url').val('my-script.js');
		$('#generator').click();
	});
});
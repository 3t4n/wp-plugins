(function($){

	$(document).ready(function() {
		$(".toggle a").click(function() {

			$(this).next("p").slideToggle(300);
			return false;

		});

		

	});
	
	
})(jQuery);
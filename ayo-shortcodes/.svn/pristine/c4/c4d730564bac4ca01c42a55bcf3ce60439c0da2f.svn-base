jQuery(document).ready(function($) {
	// Alert
	function ayoAlert() {
		if(jQuery().alert) {
			$(".ayo-alert").alert();
		}
	}

	// Tooltip
	function ayoTooltip(){
		if( jQuery().tooltip ) {
		    $( ".ayo-tooltip" ).tooltip();
		}
	}

	ayoAlert();
	ayoTooltip();

	//SkillBar
	$(window).load(function() {
		$('.ayo-progress').each(function(){
			$(this).find('.ayo-progress-bar').animate({ 
				width: $(this).attr('data-percentage') 
			}, 1500 );
		});
	});

});
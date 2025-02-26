//emc admin scripts
jQuery(document).ready( function($) {
    $('.emc-tab-bar a').click(function(event){
		event.preventDefault();
		var context = $(this).closest('.emc-tab-bar').parent();
		$('.emc-tab-bar li', context).removeClass('emc-tab-active');
		$(this).closest('li').addClass('emc-tab-active');
		$('.emc-tab-panel', context).hide();
		$( $(this).attr('href'), context ).show();
	});
	$('.emc-tab-bar').each(function(){
		if ( $('.emc-tab-active', this).length )
			$('.emc-tab-active', this).click();
		else
			$('a', this).first().click();
	});
});
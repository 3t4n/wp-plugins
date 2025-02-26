jQuery(document).ready(function(){
		
	jQuery("ul.bigTarget li a").bigTarget({
		hoverClass: 'over',
		clickZone : 'li:eq(0)'
	});
	jQuery('.varietal_dropdown').hide();
	
	var viewLinkButton = '.border_bottomTan a.viewLink';
	var numButtons = jQuery('.border_bottomTan > a.viewLink').length;
			
	jQuery(viewLinkButton).click(function() {
		jQuery(this).next().slideToggle('fast');
			
			if(jQuery(this).hasClass('viewMore')) {
			
				jQuery(this).addClass('viewLess');
				jQuery(this).removeClass('viewMore');
			
			} else {
			
				jQuery(this).addClass('viewMore');
				jQuery(this).removeClass('viewLess');
			
			}
			
		return false;
	});
	
});
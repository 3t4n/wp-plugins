jQuery(document).ready(function($) {
	// SkillsBars
	setTimeout(function() {
		$('.skillbar').each(function(){
			$(this).find('.skillbar-bar').animate({
				width:$(this).attr('data-percent')
			}, 2000);
		});
	}, 200);

	// Property Carousel
	$('.my-property', '#rem-agent-page').carousel({
		visible: 4,
		itemMinWidth: 260,
		itemMargin: 20,
		autoRotate : 7000,
		speed: 1000
	});

	// Apply ImageFill	
	jQuery('.ich-settings-main-wrap .image-fill').each(function(index, el) {
		jQuery(this).imagefill();
	});
});
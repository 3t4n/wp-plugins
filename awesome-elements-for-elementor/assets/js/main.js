(function($){
	"use strict";

/*-----------------------
Both Page
-------------------------*/

	// Our Talent Slider
	$(".aefe-tm-our-talent-slider-content").owlCarousel({				
			items: 4,
			autoplay: true,				
			loop: true,
			margin:25,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],				
			responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},
					1000:{
						items:4
					}
				}

	});


	// progress bar
	$(".aefe_sk_st_progressbar").each(function(){
	$(this).find(".aefe_skst_bar").animate({
		"width": $(this).attr("data-perc")
	},3000);
	$(this).find(".aefe_skill_bar_st_label").animate({
		"left": $(this).attr("data-perc")
	},3000);
	});

	// progress bar
	$(".aefe_skill_barfiller").each(function(){
	$(this).find(".aefe_skill_fill.aefe-skills-skill").animate({
		"width": $(this).attr("data-perc")
	},1000);
	});



	$('.aefe-some-review-content-slide').owlCarousel({
		dots: false,
		items: 4,
		loop: true,
		autoplay:true,
		responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				750:{
					items:2
				},
				1000:{
					items:4
				}
			}
	});

	// Testimonial Slider
	$(".aefe-tms-testimonial-content-area").owlCarousel({				
		items: 1,
		autoplay: true,
		dots: true,				
		loop: true,				
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

	});

	// Team Member Style Three
	$(".aefe-tm-sth-our-team-content-area").owlCarousel({
			
		items: 3,
		autoplay: true,
		nav: false,			
		dots: false,
		margin:32,
		responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				750:{
					items:2
				},
				1000:{
					items:3
				}
		},
		loop: true
	
	});

	//testimonial style three
	$(".aefe-tm-3-testimonial-slider").owlCarousel({			
		items: 1,
		autoplay: true,
		nav: false,			
		dots: true,
		loop: true		
	
	});	


})(jQuery);
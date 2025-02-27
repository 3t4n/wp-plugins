(function($){

	var meteorite_portfolioIsotope = function($scope, $){
		if ( $('.meteorite-projects').length ) {
			$('.meteorite-projects').each(function() {

				var self		= $(this);
				var filterNav	= self.find('.project-filter').find('a');

				var projectIsotope = function($selector){

					$selector.isotope({
						filter: '*',
						itemSelector: '.project-item',
						percentPosition: true,
						animationOptions: {
							duration: 750,
							easing: 'liniar',
							queue: false,
						}
					});
				}

				self.find('.isotope-container').imagesLoaded( function() {
					projectIsotope(self.find('.isotope-container'));
				});

				$(window).load(function(){
					projectIsotope(self.find('.isotope-container'));
				});

				filterNav.click(function(){
					var selector = $(this).attr('data-filter');
					filterNav.removeClass('active');
					$(this).addClass('active');

					self.find('.isotope-container').isotope({
						filter: selector,
						animationOptions: {
							duration: 750,
							easing: 'liniar',
							queue: false,
						}
					});
					return false;
				});

			});
		}
	};

	var meteorite_testimonialCarousel = function($scope, $) {
		if ( $(".meteorite-testimonials").length ) {
			$('.meteorite-testimonials').each(function() {
				var this_carousel = $(this);
				if ( this_carousel.data('items-large') > 1 ) { 
					var sliderHeightAuto = false;
				} else {
					var sliderHeightAuto = true;
				} 
				this_carousel.owlCarousel({
					navigation: false,
					pagination: this_carousel.data('pagination'),
					responsive: true,
					items: this_carousel.data('items-large'),
					itemsDesktopSmall: [1400, this_carousel.data('items-large')],
					itemsTablet:[992, this_carousel.data('items-medium')],
					itemsTabletSmall: [768, this_carousel.data('items-medium')],
					itemsMobile: [480, this_carousel.data('items-small')],
					touchDrag: true,
					mouseDrag: true,
					autoHeight: sliderHeightAuto,
					stopOnHover: true,
					autoPlay: this_carousel.data('autoplay')
				});
			});
		}
	};

	var meteorite_teamCarousel = function($scope, $){
		if ( $(".meteorite-team").length ) {
			$('.meteorite-team').each(function() {
				var this_carousel = $(this);
				this_carousel.owlCarousel({
					navigation: false,
					pagination: this_carousel.data('pagination'),
					responsive: true,
					items: this_carousel.data('items-large'),
					itemsDesktopSmall: [1400, this_carousel.data('items-large')],
					itemsTablet:[992, this_carousel.data('items-medium')],
					itemsTabletSmall: [768, this_carousel.data('items-medium')],
					itemsMobile: [480, this_carousel.data('items-small')],
					touchDrag: true,
					mouseDrag: true,
					autoHeight: false,
					autoPlay: this_carousel.data('autoplay')
				});
			});
		}
	};

	var meteorite_newsCarousel = function($scope, $){
		if ( $(".meteorite-latest-news-carousel").length ) {
			$(".meteorite-latest-news-carousel").each(function() {
				var this_carousel = $(this);
				this_carousel.owlCarousel({
					navigation: false,
					pagination: this_carousel.data('pagination'),
					responsive: true,
					items: this_carousel.data('items-large'),
					itemsDesktopSmall: [1400, this_carousel.data('items-large')],
					itemsTablet:[992, this_carousel.data('items-medium')],
					itemsTabletSmall: [768, this_carousel.data('items-medium')],
					itemsMobile: [480, this_carousel.data('items-small')],
					touchDrag: true,
					mouseDrag: true,
					autoHeight: false,
					autoPlay: this_carousel.data('autoplay'),
				});
			});
		}
	};

	var meteorite_clientsCarousel = function($scope, $){
		if ( $(".meteorite-clients").length ) {
			$(".meteorite-clients").each(function() {
				var this_carousel = $(this);
				this_carousel.owlCarousel({
					navigation: false,
					pagination: this_carousel.data('pagination'),
					responsive: true,
					items: this_carousel.data('items-large'),
					itemsDesktopSmall: [1400, this_carousel.data('items-large')],
					itemsTablet:[992, this_carousel.data('items-medium')],
					itemsTabletSmall: [768, this_carousel.data('items-medium')],
					itemsMobile: [480, this_carousel.data('items-small')],
					touchDrag: true,
					mouseDrag: true,
					stopOnHover: true,
					autoHeight: false,
					autoPlay: this_carousel.data('autoplay')
				});
			});
		}
	};

	var meteorite_projectsCarousel = function($scope, $){
		if ( $(".meteorite-projects-carousel").length ) {
			$(".meteorite-projects-carousel").each(function() {
				var this_carousel = $(this);
				this_carousel.owlCarousel({
					navigation: false,
					pagination: false,
					responsive: true,
					items: this_carousel.data('cols'),
					itemsDesktopSmall: [1400, this_carousel.data('cols')],
					itemsTablet:[992,3],
					itemsTabletSmall: [768,2],
					itemsMobile: [480,1],
					touchDrag: true,
					mouseDrag: true,
					autoHeight: true,
					autoPlay: false,
					afterInit: function() { 
						setTimeout(function(){
							$(".owl-carousel").each(function(){
								/* 
								fixes a bug where the outer-wrapper has wrong width because when the plugin calculates the width, 
								the siteorigin wrapper isn't loaded 
								*/
								$(this).data('owlCarousel').updateVars();
							});
						},0);
					},
				});
				// Custom Navigation Events
				var owl = this_carousel;
				this_carousel.parent().find(".next").click(function(){
					owl.trigger('owl.next');
				});
				this_carousel.parent().find(".prev").click(function(){
					owl.trigger('owl.prev');
				});
			});
		}
	};

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_portfolioIsotope);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_testimonialCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_teamCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_newsCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_clientsCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', meteorite_projectsCarousel);
	});

})(jQuery);
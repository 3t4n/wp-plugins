jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   Counter
   =============================================== */

	function suevaCounter() {

		if ( $( '.suevafree-counter' ).length ) {
	
			var windowTop = $(window).scrollTop();
			var windowBottom = windowTop + $(window).height();
			var elementTop = $('.suevafree-counter').offset().top;
			var elementBottom = elementTop + $('.suevafree-counter').height();
			
			var isVisible = ( (elementBottom<= windowBottom) && (elementTop >= windowTop) );
	
			if ( isVisible === true ) {
	
				$('.suevafree-counter .count').each(function () {
						
					var counterValue = parseInt($(this).attr('data-count'));
					var currentValue = parseInt($(this).html());
					
					if ( currentValue < counterValue ) {
	
						$(this).prop('Counter', 0 ).delay(900).animate({
								
							Counter: counterValue
								
						}, {
									
							duration: 2000,
							easing: 'swing',
							
							step: function (now) { 
			
								$(this).text(Math.ceil(now));
			
							}
								
						});
	
					}
		
				});
			
			}
	
		}
		
	}

	$( document ).ready(suevaCounter);
	$( window ).scroll(suevaCounter);

/* ===============================================
   OVERLAY
   =============================================== */

	$('.overlay-image').hover(function(){
		
		var imgwidth = $(this).children('img').width();
		var imgheight = $(this).children('img').height();
		$(this).children('.zoom').css({'width':imgwidth,'height':imgheight});	
		$(this).children('.link').css({'width':imgwidth,'height':imgheight});
		$(this).css({'width':imgwidth+10});		
		
		$('.overlay',this).animate({ opacity : 0.6 },{queue:false});
		}, 
		function() {
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});
	
	});

/* ===============================================
   ONE PAGE
   =============================================== */

	function sueva_one_page() {
	
		var header = $('#header-wrapper.fixed-header .row').innerHeight() - 1;
		var demostore = $('p.demo_store').innerHeight();
		var adminbar = $('body.logged-in #wpadminbar').innerHeight();
		var offset = header + demostore + adminbar;
		
		$('.suevafree-menu ul.one-page-menu li').each(function(){

			var scroll_attr = $(this).children('a').attr('href');
			var scroll_item = scroll_attr.replace( '#one-page-', '' );
			var scroll_to =   scroll_item - 1;

			$(this).click(function() {
				
				$('.suevafree-menu ul.one-page-menu li').removeClass('current_page_item');
				$(this).addClass('current_page_item');
				
				if ( scroll_item === "0" ) {
					$.scrollTo( 0, {axis:'y',duration:'slow', margin:true, offset:-offset} );
				} else {
					$.scrollTo( "#onepage_sidebar .onepage-widget:eq(" + scroll_to + ")", {axis:'y',duration:'slow', margin:true, offset:-offset} );
				}

			});
		
		});
		
	}
	
	$( window ).load(sueva_one_page);

/* ===============================================
   SLICK
   ============================================= */

	$('.slick-suevafree-slideshow').each(function(){

		var slick_id = $(this).attr('id');
		
		var slick_center = false;
		
		if ( $(this).attr('data-center') === "true" ) {
			slick_center = true ;
		}
		
		var slick_columns = parseInt($(this).attr('data-columns'));
		var slick_columns_992 = 2 ;

		if ( $(this).attr('data-columns').length === 0 ) {
			slick_columns = 3 ;
		}

		if ( slick_columns <= 1 ) {
			slick_columns_992 = 1 ;
		}

		$('#' + slick_id + ' .suevafree-slick-wrapper' ).slick({

		  centerMode: slick_center,

		  dots: false,
		  speed: 300,
		  adaptiveHeight: true,

		  prevArrow: '<div class="prev-arrow"><i class="fa fa-angle-left"></i></div>',
		  nextArrow: '<div class="next-arrow"><i class="fa fa-angle-right"></i></div>',

		  slidesToShow: slick_columns,
		  slidesToScroll: slick_columns,
		
		  responsive: [
			{
			  breakpoint: 992,
			  settings: {
				centerMode: false,
				slidesToShow: slick_columns_992,
				slidesToScroll: slick_columns_992,
			  }
			},
			{
			  breakpoint: 768,
			  settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},

		  ]
		  
		});

		function wip_slick_arrows() {
			
			if ( $('#' + slick_id ).children('div.slick-arrow').length === 0 ) {
			
				$('#' + slick_id ).prev('header.title').removeClass('slick_arrows');
			
			} else {
			
				$('#' + slick_id ).prev('header.title').addClass('slick_arrows');
			
			}
		
		}
		
		$( window ).load(wip_slick_arrows);
		$( window ).resize(wip_slick_arrows);

	}); 
	
});
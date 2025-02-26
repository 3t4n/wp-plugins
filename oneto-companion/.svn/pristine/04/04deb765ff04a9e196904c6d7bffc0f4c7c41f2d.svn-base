// CUSTOM JS
jQuery(document).ready(function($) {
	// Theme Main Slider
	$("#theme-main-slider").owlCarousel({
		rtl: $("html").attr("dir") == 'rtl' ? true : false,
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop: $(this).children().length > 1 ? true : false, // loop is true up to 1199px screen.
		nav:true, // is true across all sizes
		margin:0, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		items: 1,
		dots: false,
		navText: ["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"]
    });
	
	// Sponsors One Marquee
    $(".sponsors-one .marquee").owlCarousel({
		rtl: $("html").attr("dir") == 'rtl' ? true : false,
        loop: true,
        dots: false,
        nav: false,
        margin: 0,
        autoplay: true,
        slideSpeed: 200,
        slideTransition: 'linear',
        autoplayTimeout: 3000,
        autoplaySpeed: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            560: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 6
            }
        }
    });

    // Testimonial Carousel
    $(".testimonial-carousel").owlCarousel({
        items: 1,
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        loop: $(this).children().length > 1 ? true : false, // loop is true up to 1199px screen.
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        margin: 0,
        transitionStyle: "fade",
        singleItem: true,
        touchDrag: true,
        mouseDrag: true,
        slideSpeed: 2000,
        autoplay: true,
        autoplayTimeout: 15000
    });
});
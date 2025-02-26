
/* --------------------------------------------
JS Start
-------------------------------------------- */

( function( $ ) {
	'use strict';

  /* Flexslider ---------------------*/
	function slickSliderSetup() {


// Slider styl 1 animation
  $(".modern-Slider").slick({
    autoplaySpeed:10000,
    speed:600,
    slidesToShow:1,
    slidesToScroll:1,
    pauseOnHover:false,
    dots:true,
    pauseOnDotsHover:true,
    cssEase:'linear',
   // fade:true,
    draggable:false,
    prevArrow: '<div  class="aazeen-slider-nav aazeen-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div  class="aazeen-slider-nav aazeen-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
  });

  // Slider style two
    $('.slider2').slick({
      centerMode: true,
 centerPadding: '160px',
      slidesToShow:1,
      cssEase: 'linear',
      pauseOnHover:false,
      prevArrow: '<div  class="aazeen-slider-nav aazeen-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
      nextArrow: '<div  class="aazeen-slider-nav aazeen-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
      responsive: [
    {
      breakpoint: 768,
      settings: {
        adaptiveHeight: true,
        slidesToShow:1,
        centerMode: false,
        centerPadding: '0px',
      }
    },
  ]
    });

  }

  $( window ).load( slickSliderSetup );
	$( document ).ajaxComplete( slickSliderSetup );
  $( window ).resize( slickSliderSetup );


})( jQuery );
jQuery(document).ready(function(){
jQuery(".slider").not('.slick-initialized').slick()
});

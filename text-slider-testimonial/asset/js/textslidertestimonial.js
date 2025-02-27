jQuery(function($)
{
  $(document).ready(function()
	{/*
	  $( ".text_slider_testimonial_panel" ).unslider({
		  autoplay: true,
		  keys: true,               
			dots: true          
	    });
	  */
	  var slider = tns({
		    container: '.text_slider_testimonial_panel ul',
		    items: 1,
		    slideBy: 'page',
		    autoplayHoverPause: true,
		    controls: false,
		    nav: false,
		    autoplayButtonOutput: false,
		    arrowKeys: true,
		    autoplay: true
		  });
   });
});

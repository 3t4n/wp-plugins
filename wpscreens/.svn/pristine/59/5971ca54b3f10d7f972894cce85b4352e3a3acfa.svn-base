jQuery(document).ready(function($) {
	$(".wpscr_slider-wrapper").hide();
   jQuery('#slect-slider-type').on('change', function(e) {
	   e.preventDefault();
	   var slider = jQuery(this).find(":selected").val();
	   if(slider) {
		   jQuery('.wpscr_slider-wrapper').hide();
		   jQuery('.wpscr_slider-wrapper#'+slider).show();
	   }
   });

   var savedSlider = jQuery('.saved-slider').attr('id');
   if (savedSlider) {
	   jQuery('.wpscr_slider-wrapper#'+savedSlider).show();
   }
});

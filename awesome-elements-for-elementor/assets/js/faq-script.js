(function($){
	$(document).ready(function(){
	//First child show
	$('#aefe_accordion').children('.aefe-faq-1-single_accordion:nth-child(2)').children('.aefe-faq-1-accordion_content').slideDown();
	
	//first child add active class
	$('#aefe_accordion').children('.aefe-faq-1-single_accordion:nth-child(2)').addClass('aefe-faq-1-active_single_accordion').children('.aefe-faq-1-accordion_hearder').addClass('aefe-faq-1-accordion_active');
	
	//Main Accordion
	$('.aefe-faq-1-accordion_hearder').on('click', function(){
	  //Accordion Content Toggle Slide
	  $(this)
	  //add class
	  .toggleClass('aefe-faq-1-accordion_active')
	  //content show/hide
	  .next('.aefe-faq-1-accordion_content').slideToggle()	  
	  //When click any accordion other content slide up.
	  .parents('.aefe-faq-1-single_accordion').toggleClass("aefe-faq-1-active_single_accordion").siblings().removeClass("aefe-faq-1-active_single_accordion").children('.aefe-faq-1-accordion_content').slideUp()
	  //Active class remove other accordion header
	  .prev('.aefe-faq-1-accordion_hearder').removeClass('aefe-faq-1-accordion_active');
	  
	});
		
	
})
	
	
	
})(jQuery);
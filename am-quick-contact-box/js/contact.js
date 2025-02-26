jQuery(document).ready(function($) {
    
	var height_nav = $('.quick-contact-box .nav-box').height() - $('.quick-contact-box .box-info').innerHeight() + $('.quick-contact-box .box-info').height();
	$('.quick-contact-box .box-info').css('min-height', height_nav );      
				
	$('.quick-contact-box .box-info div.panel').hide();
	$('.quick-contact-box .box-info div.panel:eq(0)').show();
					
	if( $('.quick-contact-box .active').length == 0 )
		$('.quick-contact-box .nav-box li:first-child').addClass('active');	
					
	$('.quick-contact-box .nav-box a').click(function(){
		var hash = $(this).attr('href');                        
		$('.quick-contact-box .active').removeClass('active');
					
		$('.quick-contact-box .box-info div.panel').hide();
		$(hash).fadeIn('slow');
		$(this).parent().addClass('active');	
					
		return false;
	});
				
});
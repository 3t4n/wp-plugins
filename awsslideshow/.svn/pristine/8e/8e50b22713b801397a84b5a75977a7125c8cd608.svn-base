(function($){
	
	function inputPromt(){
		
		var ips	=	$('.input-prompt');
			
		ips.each(function(){
			
			var ip		=	$(this);
				label	=	ip.find('label');
			
			if(ip.find('input').val() != '') label.addClass('screen-reader-text');
			
			ip.find('input').focus(function(){
			
				
				label.addClass('screen-reader-text');
			});
			
			ip.find('input').blur(function(){
			
				if($(this).val() == '')
					label.removeClass('screen-reader-text');
			});
			
		});
		
		
		
	}
	
	$(document).ready(function() {
		
		inputPromt();
	});
	
	
})(jQuery);
jQuery(document).ready(function($){
	
	/* style change */
	$('.dx-advanced-widgetsstyle-select').live('change',function(){
		var sSelect = $(this).val();
		$(this).parent('p').nextAll('.pic-style-form').fadeOut(500);
		$(this).parent('p').nextAll('.flash-style-form').fadeOut(500);
		if( sSelect == 'pic' ){			
			$(this).parent('p').nextAll('.pic-style-form').fadeIn(500);
		} else if( sSelect == 'flash' ){
			$(this).parent('p').nextAll('.flash-style-form').fadeIn(500);
		}
		else{
			
		}
	});
		
});
(function($){
	$.each(mask.class,function(index,value){
		var clearOption = false;
		if(mask.clear[index]==1)
			clearOption = true;
		if(mask.class[index] != '')
			$('.'+mask.class[index]).mask(mask.pattern[index],{clearIfNotMatch: clearOption});
	});

})(jQuery);
(function($){
    $(function(){
        $(".fanimaniColorpicker").wpColorPicker();

        $(document).ready(function(){
        	if($('.fanimaniToggleDisplayCheckbox').length>0){
        		if($('.fanimaniToggleDisplayCheckbox').is(':checked')){
        			$('.fanimaniToggleDisplay').show();
        		} else {
        			$('.fanimaniToggleDisplay').hide();
        		}

        		$('.fanimaniToggleDisplayCheckbox').change(function(){
        			if($(this).is(':checked')){
	        			$('.fanimaniToggleDisplay').show();
	        		} else {
	        			$('.fanimaniToggleDisplay').hide();
	        		}
        		})
        	}
        })
    });
})(jQuery);
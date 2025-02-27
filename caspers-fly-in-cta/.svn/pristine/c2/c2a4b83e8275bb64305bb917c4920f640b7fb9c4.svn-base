jQuery( document ).ready(function( $ ) {
	
	// show or hide position options based on type of slider. also shows/hides appropriate WIDTH input (px or %)
	$('#cpcta-slider-type').change(function(){
		var val = $('#cpcta-slider-type').val();
		if(val === 'vertical'){
			$('tr.cpcta-vert-slider-position ').removeClass('cj_hidden');
			$('tr.cpcta-hori-slider-position').addClass('cj_hidden');
            $('tr#cpcta-width-percent').removeClass('cj_hidden');
            $('tr#cpcta-width-pixel').addClass('cj_hidden');
			$('tr#cpcta-hori-slider-topbar-angle').addClass('cj_hidden');
		} else if(val === 'horizontal'){
			$('tr.cpcta-vert-slider-position').addClass('cj_hidden');
			$('tr.cpcta-hori-slider-position').removeClass('cj_hidden');
            $('tr#cpcta-width-percent').addClass('cj_hidden');
            $('tr#cpcta-width-pixel').removeClass('cj_hidden');
			$('tr#cpcta-hori-slider-topbar-angle').removeClass('cj_hidden');
		}
	});
	
	// show or hide specific-page or specific-post fields conditionally
	$('#cpcta-display-on').change(function(){
		var val = $('#cpcta-display-on').val();
		if(val === 'specific-page'){
			//show specific-page / 'Show on which page?' option
			$('tr.specific-page').removeClass('cj_hidden');
			//hide specific-post / 'Show on which post?' option
			$('tr.specific-post').addClass('cj_hidden');
		} else if (val === 'specific-post'){
			//show specific-post / 'Show on which post?' option
			$('tr.specific-post').removeClass('cj_hidden');
			//hide specific-page / 'Show on which page?' option
			$('tr.specific-page').addClass('cj_hidden');
		} else {
			//hide both specific-page and specific-post
			$('tr.specific-page').addClass('cj_hidden');
			$('tr.specific-post').addClass('cj_hidden');
		}
	});
    
    // show or hide timer for auto popup depending on whether or not it's enabled
    $('#cpcta-enable-autopop').change(function(){
        if(this.checked) { 
            $('tr#cpcta-autopop-timer').removeClass('cj_hidden');
        } else {
            $('tr#cpcta-autopop-timer').addClass('cj_hidden');
        }
    });
	
	// show or hide mobile px width based on hiding or not
	$('#cpcta-mobile-hidden').change(function(){
        if(this.checked) { 
            $('tr#cpcta-mobile-width').removeClass('cj_hidden');
        } else {
            $('tr#cpcta-mobile-width').addClass('cj_hidden');
        }
    });
});
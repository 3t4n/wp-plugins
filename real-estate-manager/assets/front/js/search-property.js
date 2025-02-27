jQuery(document).ready(function($) {
	
	$('#search-property').submit(function(event) {
		event.preventDefault();
		$('.searched-proerpties').html('');
		$('.loader').show();

	    var ajaxurl = $(this).data('ajaxurl');
	    var formData = $(this).serialize();

	    $.post(ajaxurl, formData, function(resp) {
			$('.loader').hide();
	    	$('.searched-proerpties').html(resp);
		    $('html, body').animate({
		        scrollTop: $(".search-results").offset().top
		    }, 2000);
			$('.ich-settings-main-wrap .image-fill').each(function(index, el) {
				jQuery(this).imagefill();
			});
	    });
	});
	
	jQuery(".labelauty").labelauty();

	var $filter = jQuery('.filter', '#rem-search-box');

	jQuery('.botton-options', '#rem-search-box').on('click', function(){
		hideSearcher();
	});

	function hideSearcher(navigatorMap){

		if(navigatorMap==true){
			$searcher.slideUp(500);
		} else {
			$searcher.slideToggle(500);
		}
		return false;
	}

	jQuery(".set-searcher", '#rem-search-box').on('click', hideSearcher);

	jQuery(".more-button", '#rem-search-box').on('click', function(){
		$filter.toggleClass('hide-filter');
		return false;
	});

	var $priceRange = jQuery("#price-range");
	if($priceRange.length) {
		$priceRange.noUiSlider({
			start: [ parseInt(rem_ob.price_min_default), parseInt(rem_ob.price_max_default) ],
			behaviour: 'drag',
			step: parseInt(rem_ob.price_step),
			connect: true,
			range: {
				'min': parseInt(rem_ob.price_min),
				'max': parseInt(rem_ob.price_max)
			},
			format: wNumb({
				decimals: 0
			}),				
		});
		$priceRange.Link('lower').to( jQuery('#price-value-min') )
		$priceRange.Link('lower').to( jQuery('#min-value') )
		$priceRange.Link('upper').to( jQuery('#price-value-max') );
		$priceRange.Link('upper').to( jQuery('#max-value') );
	}	
});
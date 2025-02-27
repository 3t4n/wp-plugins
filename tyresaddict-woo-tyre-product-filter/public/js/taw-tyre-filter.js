(function( $ ) {
'use strict';

$(function() {

 	if ( taw_tyre_filter === null ) {
 		return;
 	}


	$('.js-season').on('change', function(){
		var chk = this.checked;            
		$('.js-season').prop('checked', false); 
		if ( chk )
			$(this).prop('checked', true); 

		// pro - stud
		if ( $('.js-season-Winter').prop('checked') )
			$('.js-options-stud').prop('disabled', false);
		else
			$('.js-options-stud').prop('disabled', true);

		return false;
	})

	$('.js-car-type').on('change', function(){
		var chk = this.checked; 
		$('.js-car-type').prop('checked', false); 
		if ( chk )
			$(this).prop('checked', true); 

		return false;
	})

	$('.js-brand').on('change', function(){
		var all_chk = $('#tw-brand-all').prop('checked');
		
		if ( this.id == 'tw-brand-all' )
		{
			var chk = this.checked; 
			$('.js-brand').prop('checked', false); 
			if ( chk )
				$(this).prop('checked', true); 
			return;
		}
		else
		{
			var chk = this.checked; 
			$('#tw-brand-all').prop('checked', false);
			if ( chk )
				$(this).prop('checked', true); 
		}
		return false;
	})

	$('.js-twf-filter-reset').on('click', function(){
		$('.taw-filter .js-season').prop('checked', false); 
		$('.taw-filter .js-season-all').prop('checked', true); 

		$('.taw-filter .js-car-type').prop('checked', false); 
		$('.taw-filter .js-car-type-all').prop('checked', true); 

		$('.taw-filter .js-brand').prop('checked', false); 
		$('.taw-filter .js-brand-all').prop('checked', true); 

		$('.taw-filter select').val('');

		return false;
	});
});

})( jQuery );

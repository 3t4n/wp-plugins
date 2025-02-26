jQuery(document).ready(function($){
	
	/*
	$('.vvv').click(function( e ){
		if( $('#selected_template').val() == '' ){
			if( !confirm('You didn\'t select template. Are you sure ?') ){
				e.preventDefault();
			}
		}
	})
	*/

	$('.tpl_picker').click(function(e){
		e.preventDefault();
		$('.tpl_picker').removeClass('button-primary').addClass('button-secondary');

		$(this).removeClass('button-secondary').addClass('button-primary');

		$('#selected_template').val( $(this).attr('data-tpl') );
	})
});
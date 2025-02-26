jQuery(document).ready(function($){
	var form = $('#export-filters'),
		filters = form.find('.advanced-filters');
	filters.hide();

	form.find('input:radio').off('change').change(function() {
		filters.slideUp('fast');
		switch ( $(this).val() ) {		
			case 'advanced': $('#advanced-filters').slideDown(); break;
		}
	});

	$("#query").on( "change", function() {
		if ( ! $(this).val() ) {
			$('#advanced-filters > div').empty();
			$('#advanced-filters .spinner').css( "visibility", "hidden" );
		} else {
			$('#advanced-filters > div').empty();
			$('#advanced-filters .spinner').css( "visibility", "visible" );
			$.post( cpExporter.ajaxurl, { action: 'cp_exporter', nonce: cpExporter.nonce, query : $(this).val() }, function(data){
				$('#advanced-filters .spinner').css( "visibility", "hidden" );
				$('#advanced-filters > div').append( data );
			});
		}
	});
});
jQuery(document).ready(function($){

		$('form.dwkb-search .dwkb-search-input').autocomplete({
		appendTo: 'form.dwkb-search',
		source: function( request, resp ) {
			$.ajax({
				url: dwkb.ajax_url,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'dwkb-auto-suggest-search-result',
					title: request.term,
					nonce: $('form.dwkb-search .dwkb-search-input').data('nonce')
				},
				success: function( data ) {
					console.log( data );
					resp( $.map( data.data, function( item ) {
						if ( true == data.success ) {
							return {
								label: item.title,
								value: item.title,
								url: item.url,
							}
						}
					}))
				}
			});
		},
		select: function( e, ui ) {
			if ( ui.item.url !== '#' ) {
				window.location.href = ui.item.url;
			} else {
				return true;
			}
		},
		open: function( e, ui ) {
			var acData = $(this).data( 'uiAutocomplete' );
			acData.menu.element.addClass('dwkb-autocomplete').find('li').each(function(){
				var $self = $(this),
					keyword = $.trim( acData.term ).split(' ').join('|');
					$self.html( $self.text().replace( new RegExp( "(" + keyword + ")", "gi" ), '<span class="dwkb-text-highlight">$1</span>' ) );
			});
		}
	});
});
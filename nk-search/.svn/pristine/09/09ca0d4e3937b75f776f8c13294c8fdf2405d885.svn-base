var nksXhr;
jQuery( document ).ready( function(){
	jQuery( document ).on( 'keyup', '.nks-autocomplete', function( e ) {
		var searchInput = jQuery( this );
		clearTimeout( jQuery.data( this, 'timer' ) );
		searchInput.val( searchInput.val().trimStart() );
		if ( e.keyCode == 13 )
		nks_search( searchTerm );
		else
		jQuery( this ).data( 'timer', setTimeout( function() {
			nks_search( searchInput );
		}, 300 ) );
	});
	jQuery( document ).on( 'blur', '.nks-autocomplete', function( e ) {
		var searchInput = jQuery( this );
		setTimeout( function() {
			searchInput.parent().find( '.nks-suggestions' ).removeClass( 'nks-open-suggestions' );
		},300);
	});
	jQuery( document ).on( 'click', '.nks-redirect', function() {
		window.location.href = jQuery( this ).data( 'href' );
	})
});
function nks_search( searchInput ){
	searchInput.parent().find( '.nks-loader' ).show();
	if ( nksXhr ) {
		nksXhr.abort();
	}
	if( searchInput.val().trimStart().length < 2 ) {
		searchInput.parent().find( '.nks-loader' ).hide();
		searchInput.parent().find( '.nks-suggestions' ).removeClass( 'nks-open-suggestions' );
		return;
	}
	var data = {
		'action'         : nks.ajaxAction,
		'security'       : nks.nOnce,
		'post_search'    : searchInput.val(),
		'posts_per_page' :searchInput.attr('count'),
		'post_type'      :searchInput.attr('post_type'),
	};
	nksXhr = jQuery.post( nks.ajaxUrl, data, function( response ) {
		var lists = response.data;
		var str  = '';
		lists.forEach( function( list ) {
			str += '<li class="nks-redirect" data-href="' + list.link + '">'+ list.title + '</li>';
		});
		if ( lists.length === 0 ) {
			str += '<li class="nks-no-results">No results</li>';
		}
		searchInput.parent().find( '.nks-suggestions' ).addClass( 'nks-open-suggestions' );
		searchInput.parent().find( '.nks-suggestions' ).html( str );
		searchInput.parent().find( '.nks-loader' ).hide();
	});
}

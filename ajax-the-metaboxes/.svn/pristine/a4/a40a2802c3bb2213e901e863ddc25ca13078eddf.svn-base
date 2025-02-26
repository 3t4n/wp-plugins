jQuery(document).ready(function($) {
    //------------------------- handling button #1
    $( '.bp_ajax_submit_field' ).click( function( e ) {
		// Stop the button from submitting and refreshing the page.
		e.preventDefault();
data = {
              action : 'bp_action',
              data : $( '.bp_ajax_input_field' ).val(),
              submission : $( '.bp_ajax-submitted' ).val(),
              nonce : $( '#bp_ajax-nonce' ).val()

};

$.post(ajaxurl, data, function (response){
    $('#bp_ajax_results').html(response);
    console.log(response);
    i++;
});
	});
 //------------------------- handling button #2
          $( '.bp_ajax_submit_field_2' ).click( function( e ) {
		e.preventDefault();
data = {
            action : 'bp_action',
            data2 : $( '.bp_ajax_input_field' ).val(),
            submission : $( '.bp_ajax-submitted' ).val(),
            nonce : $( '#bp_ajax-nonce' ).val()
};
$.post(ajaxurl, data, function (response){
    $('#bp_ajax_results').html(response);
    console.log(response);
    i++;
});
		
	});
});
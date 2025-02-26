jQuery(document).ready( function($)
{
	if( typeof sa_ajax_request_url != 'undefined' )
	{
		$( '#social-actions' ).append( $( sa_ajax_loading_img ) );
		$( '#social-actions' ).load( sa_ajax_request_url, sa_ajax_request_data, 
			function()
			{
				$(this).hide().fadeIn( 1500 );
			});
	}
});
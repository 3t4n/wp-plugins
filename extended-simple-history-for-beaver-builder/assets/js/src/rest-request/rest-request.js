/**
 * @summary Make a request to the REST API.
 * @author WEBDOGS
 * @param {string} method The request rest method GET, POST, DELETE etc. Default GET.
 * @param {string} namespace The request namespace. Default /wp-json/wp/v2/;
 * @param {string} restBase Optional. The request rest base /wp-json/wp/v2/{restBase}.
 * @param {string} requestPath Optional. The REST API path for the request /wp-json/wp/v2/{restBase}/{requestPath}.
 * @param {Object} requestArguments Optional. The arguments to pass to the request.
 * @param {Object|string} postData Optional. The postData to pass to the request.send function.
 * @param {Object} headers
 * @param {Function} callback Optional. The callback function to pass the request response.
 * @param {Object} callbackArguments Optional. Additional arguments to pass to the callback function.
 * @return {XMLHttpRequest} The request.
 */
export default function restRequest(
	method = 'GET',
	namespace = '/wp-json/wp/v2/',
	restBase = '',
	requestPath = '',
	requestArguments = {},
	postData = null,
	headers = {},
	callback = null,
	callbackArguments = []
) {
	if ( 'string' !== typeof method ) {
		return;
	}

	method = method.toUpperCase();
	namespace = namespace || '/wp-json/wp/v2/';
	restBase = restBase || '';
	requestPath = requestPath || '';

	if (
		false ===
		[
			'CONNECT',
			'DELETE',
			'GET',
			'HEAD',
			'OPTIONS',
			'PATCH',
			'POST',
			'PUT',
			'TRACE',
		].indexOf( method )
	) {
		return;
	}

	const request = new window.XMLHttpRequest();

	request.open(
		method,
		[
			namespace,
			encodeURIComponent( restBase ),
			requestPath ? '/' + encodeURIComponent( requestPath ) : '',
			requestArguments && Object.keys( requestArguments ).length
				? '?' +
				  Object.keys( requestArguments )
						.map( function ( key ) {
							return (
								encodeURIComponent( key ) +
								'=' +
								encodeURIComponent( requestArguments[ key ] )
							);
						} )
						.join( '&' )
				: '',
		].join( '' )
	);

	for ( const key in headers ) {
		request.setRequestHeader( key, headers[ key ] );
	}

	request.addEventListener( 'load', ( event ) => {
		switch ( event.target.status ) {
			case 200:
			case 201:
				let response = false;
				try {
					response = JSON.parse( event.target.responseText );
				} catch ( error ) {
					/* eslint-disable no-console -- Log errors */
					console.log( error );
					console.log( event.target );
					console.log( event.target.responseText );
					/* eslint-enable no-console */
				}
				const responseHeaders = event.target
					.getAllResponseHeaders()
					.split( '\r\n' )
					.reduce( ( headersObject, headerString ) => {
						const keyValue = headerString.split( /:\s+/ );
						headersObject[ keyValue[ 0 ] ] = keyValue[ 1 ];
						return headersObject;
					}, {} );
				if ( 'function' === typeof callback ) {
					callback.apply( this, [
						response,
						responseHeaders,
						...callbackArguments,
					] );
				}
				break;
			case 429:
				const retryAfterMilliseconds =
					( event.target.getResponseHeader( 'Retry-After' ) || 1 ) *
					1000;
				window.setTimeout( () => {
					restRequest(
						method,
						namespace,
						restBase,
						requestPath,
						requestArguments,
						postData,
						headers,
						callback,
						callbackArguments
					);
				}, retryAfterMilliseconds );
				break;
			default:
				/* eslint-disable no-console -- Log errors */
				console.log( event.target );
				console.log( event.target.responseText );
				/* eslint-enable no-console */
				break;
		}
	} );

	if ( 'POST' === method && postData ) {
		if (
			'string' === typeof postData ||
			postData instanceof window.FormData
		) {
			request.send( postData );
		} else {
			request.send( JSON.stringify( postData ) );
		}
	} else {
		request.send();
	}

	return request;
}

console.log('before asl_init');
//document.addEventListener('DOMContentLoaded', asl_init );
asl_init();

function asl_init() {
	
	console.log( 'asl_init' );
    const _currentCartHash = asl_getCookie('woocommerce_cart_hash').toString().toLowerCase();
    const _previousCartHash = ( localStorage.getItem('_previousCartHash') ?? 'false' ).toLowerCase();
	
	console.log( _currentCartHash, _previousCartHash, _currentCartHash === _previousCartHash );
    // Update the stored cart hash value
    localStorage.setItem('_previousCartHash', _currentCartHash );

    if ( _currentCartHash === false 
		|| ( _currentCartHash === _previousCartHash ) ) {
		
        asl_interceptXHR();
    }
}
function asl_getCookie( _name ) {
	
    const _value = `; ${document.cookie}`;
//console.log( 'asl_getCookie ' + _value );
    const _parts = _value.split(`; ${_name}=`);
    return (_parts.length === 2) ?
		_parts.pop().split(';').shift() :
		false;
}

function asl_interceptXHR() {
	
	//console.log('asl_interceptXHR');
    const _send = XMLHttpRequest.prototype.send;
    XMLHttpRequest.prototype.send = function( p_data ) {
		
		//console.log( p_data );
//console.log( ' --- ' );
		//console.log( this );
        if ( ( typeof p_data === 'string' ) 
			&& p_data.includes( 'action=adscale/ajaxGetCart' )
		//_body.get('action') === 'adscale/ajaxGetCart'
		) {
            console.log('Blocked XHR: adscale/ajaxGetCart');
            // Implement your blocking logic here, or modify the request as needed
            return; // This line blocks the request
        }
        _send.apply( this, arguments );
    };
}

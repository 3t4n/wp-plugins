/*
File Name: curreX.js
Plugin URI: http://chaos-laboratory.com/2007/03/01/currex-ajax-based-currency-converter-widget-for-wordpress/
Description: AJAX based Currency Converter Widget - JavaScript Functions
Author: miCRoSCoPiC^eaRthLinG
Author URI: http://chaos-laboratory.com
License: GPL
*/

// XMLHttpRequester Object
var reqAjax;

// Validates field and calls the converter function
function convertCurrency() {

	// Amount
	var _amount = $jQ( '#amount' ).val();
	
	// Validate Amount Input
	if( isNaN( _amount ) ) {
		$jQ( '#convResult' ).html( '<span id="error">Invalid amount entered</span>' );
		return;
	} // if

	// Get From & To Currency Units
	var _curr_from = $jQ( '#curr_from' ).val();
	var _curr_to = $jQ( '#curr_to' ).val();

	// Block Widget
	$jQ( '#curreXbody' ).block({ 
		message: curreX_Loader,  
		css: { border: 'none', background: 'transparent' }
	}); 

	// Send AJAX Request
	try {
		reqAjax = $jQ.ajax( {
						type:		"POST",
						url:		curreX_Backend_URL,
						dataType:	"json",
						data:		"action=convert" +
									"&amount=" + _amount +
									"&currfrom=" + _curr_from +
									"&currto=" + _curr_to,
						success:	function( json ) {
						
										// Debug
										// alert( json.errcode + ' - '  + json.errmsg );
										
										// Hide Loading Indicator
										$jQ( '#convResult' ).html( '&nbsp;' );
										// Unblock
										$jQ( '#curreXbody' ).unblock(); 
										
										switch( json.errcode ) {
										
											case 'ERR-100':
												var _convamount = json.result == '0' ? '0.00' : json.result;
												var _amount = parseFloat( _convamount );
												
												// Fix to PREFERRED decimal places
												_amount = _amount.toFixed( _decimal_places );

												$jQ( '#convResult' ).html( '<span id="result">' + _amount + '</span>' );
												
												break;
												
											case 'ERR-200':
												$jQ( '#convResult' ).html( json.errmsg );
												break;
												
											default:
												$jQ( '#convResult' ).html( json.errmsg );
												break;
										
										} // switch

									},
						error:		function( xhr, msg, ex ) {
										alert( xhr.responseText );
										// Nullify Request Object
										reqAjax = null;
									}
		} );
				
	} catch(e) {
		alert(e);
	} // try-catch
		
} // convertCurrency

// Toggles the CheckBoxes and Select Fields
function toggleSelect( _object ) {

	document.getElementById( _object ).disabled = document.getElementById( _object ).disabled == true ? false : true;
	
	if( document.getElementById( _object ).disabled == true )
		document.getElementById( _object ).selectedIndex = -1;

} // toggleSelect

// Checks whether the value entered for Decimal Places is a number or not
function checkDecimal() {
	// If invalid value entered, clear field
	if( isNaN( $jQ( '#curreX-decimal' ).val() ) )
		$jQ( '#curreX-decimal' ).val( '' );
} // checkDecimal
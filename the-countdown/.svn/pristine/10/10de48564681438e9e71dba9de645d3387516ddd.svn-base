import domReady from '@wordpress/dom-ready';
const { createRoot, createElement, } = wp.element;

import { attributes } from './attributes';
import './lib/rAF.js';
import CountDownTimer from './timer.js';

domReady( function () {
	console.log( 'DOM is ready.' );
		
	// Adjust default attributes by value only
	Object.keys( attributes ).forEach( function( key, index ) {
		attributes[ key ] = attributes[ key ].default;
	});	

    const domElements = document.getElementsByClassName("the-countdown");

	for ( let i = 0; i < domElements.length; i++) {
				
		let getDomID = domElements[ i ].id.replaceAll('-', ''); // Adjust the var name
		let varName = window[ 'tc_' + getDomID ];

		const atts = { ...attributes, ...varName }; // merge with default

		const domElement = domElements[ i ];
		const uiElement = createElement( CountDownTimer, atts );

		if ( createRoot ) {
			createRoot( domElement ).render( uiElement );
		} else {
			render( uiElement, domElement );
		}
	}
} );

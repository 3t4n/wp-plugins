/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
const { useEffect, useState, } = wp.element;
import { __ } from '@wordpress/i18n';
const { applyFilters, } = wp.hooks;
import { isEmpty } from './utils.js';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
import './style.scss';

export default function Templates( { _countdown, attributes } ) {

	const { 
		expired = false,
	} = { ..._countdown };

	const {
		clientId, 
		labels1, 
		labels, 
		expiryText,
		onExpiry,
		expiryURL,
		hideonExpiry = false,
		format, 
		padZeroes,
		styles,
	} = { ...attributes };

	const { 
		lineHeight,
		gap,
	} = { ...styles };

	const digits = Object.assign({}, _countdown );
	const defaultFormats = ['years', 'months', 'weeks', 'days', 'hours', 'minutes', 'seconds'];	

	if ( !! padZeroes ) {
		Object.keys( digits ).forEach(function(key, index) {
			if ( defaultFormats.indexOf( key ) > -1 ) {
				digits[key] = digits[key] < 10 ? '0' + digits[key] : digits[key];
				digits.prevs[key] = digits.prevs[key] < 10 ? '0' + digits.prevs[key] : digits.prevs[key];
			};
		});
	}

	const getLabel = ( lbl ) => {		
		const lblPos = defaultFormats.indexOf( lbl.toLowerCase() );
		
		// See countdown sprite { ..._countdown } above
		// Make sure _countdown is ready first
		const isSingle = _countdown && digits[lbl] <= 1 ? true : false;
		return isSingle ? labels1[ lblPos ] : labels[ lblPos ];
	}

	const renderDefaultSection = () => {

		format.sort( (a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b) );

		const {
			digitSize,
			labelSize,
			minWidth,
			digitPad,
			labelPad,	
			digitColor,
			digitBgColor,
			labelColor,
			labelBgColor,
		} = { ...styles };

		return format.map( unit => {
			const unitStyle = {};
			if ( !! minWidth ) unitStyle.minWidth = minWidth;

			const amountStyle = {};
			if ( !! digitColor ) amountStyle.color = digitColor;
			if ( !! digitBgColor ) amountStyle.backgroundColor = digitBgColor;
			if ( !! digitSize ) amountStyle.fontSize = digitSize;
			if ( !! digitPad ) {
				amountStyle.paddingTop = digitPad;
				amountStyle.paddingBottom = digitPad;
			}

			const labelStyle = {};
			if ( !! labelColor ) labelStyle.color = labelColor;
			if ( !! labelBgColor ) labelStyle.backgroundColor = labelBgColor;
			if ( !! labelSize ) labelStyle.fontSize = labelSize;
			if ( !! labelPad ) {
				labelStyle.paddingTop = labelPad;
				labelStyle.paddingBottom = labelPad;
			}

			return (
				<span style={ unitStyle }>
					<span className="amount" style={ amountStyle }>
						{ digits[ unit.toLowerCase() ] }
					</span>
					<span className="label" style={ labelStyle }>
						{ getLabel( unit ) }
					</span>	
				</span>	
			);
		});
	}
	
	const renderScoreboardSection = () => {
		const {
			digitColor,
			digitSize,
			digitBgColor,
			labelColor,
			labelSize,
			labelBgColor,
		} = { ...styles };
		
		format.sort( ( a, b ) => defaultFormats.indexOf( a ) - defaultFormats.indexOf( b ) );

		const labelStyle = {};
		if ( !! labelColor ) labelStyle.color = labelColor;
		if ( !! labelSize ) labelStyle.fontSize = labelSize;
		if ( !! labelBgColor ) labelStyle.backgroundColor = labelBgColor;

		const digitStyle = {};
		if ( !! digitColor ) digitStyle.color = digitColor;
		if ( !! digitSize ) digitStyle.fontSize = digitSize;
		if ( !! digitBgColor ) digitStyle.backgroundColor = digitBgColor;

		return format.map( unit => {
			return (
				<span>
					<span className="label" style={ labelStyle }>
						{ getLabel( unit ) }
					</span>	
					<span className="amount" style={ digitStyle }>
						{ digits[ unit.toLowerCase() ] }
					</span>					
				</span>	
			);
		});
	}

	const renderFlipSection = () => {
		
		format.sort( ( a, b ) => defaultFormats.indexOf( a ) - defaultFormats.indexOf( b ) );

		const {		
			width, 
			height,
			digitColor,
			digitSize,
			digitBgColor,
			labelColor,
			labelSize,
			labelBgColor,
		} = { ...styles };

		const digitStyle = {};
		if ( !! height ) digitStyle.height = height;
		if ( !! digitSize ) digitStyle.fontSize = digitSize;
		if ( !! digitColor ) digitStyle.color = digitColor;

		const labelStyle = {};
		if ( !! labelSize ) labelStyle.fontSize = labelSize;
		if ( !! labelColor ) labelStyle.color = labelColor;
		if ( !! labelBgColor ) labelStyle.backgroundColor = labelBgColor;

		return format.map( _unit => {
			let unit = _unit.toLowerCase();			
			let currentDigit = digits[ unit ];

			let previousDigit = digits.prevs[ unit ];			
			let shuffle =  digits.hasOwnProperty( 'shuffles' ) && digits.shuffles.hasOwnProperty( unit ) ? digits.shuffles[ unit ] : true;

			// shuffle digits
			const digit1 = shuffle   ? previousDigit : currentDigit;
			const digit2 = ! shuffle ? previousDigit : currentDigit;

			// shuffle animations
			const animation1 = shuffle    ? 'fold'   : 'unfold';
			const animation2 = ! shuffle  ? 'fold'  : 'unfold';

			return (
				<div className={'flipClock'} style={{ width }}>
					<div className={'flipUnitContainer'} style={ digitStyle }>
						<div className="upperCard" style={{ backgroundColor: digitBgColor }}>
							<span>{ currentDigit }</span>
						</div>
						<div className="lowerCard" style={{ backgroundColor: digitBgColor }}>
							<span>{ previousDigit }</span>
						</div>
						<div className={`flipCard ${animation1}`} style={{ backgroundColor: digitBgColor }}>
						  <span>{ digit1 }</span>
						</div>
						<div className={`flipCard ${animation2}`} style={{ backgroundColor: digitBgColor }}>
						  <span>{ digit2 }</span>
						</div>					
					</div>

					<span className="label" style={ labelStyle }>
						{ getLabel( unit ) }
					</span>						
				</div>
			);
		});
	}
	
	const renderMinimalSection = () => {
		const {
			separator,
			fontSize,
			fontWeight,
			fontColor,
		} = { ...styles };

		format.sort( (a, b) => defaultFormats.indexOf( a ) - defaultFormats.indexOf(b) );		
		
		const arr = format.map( unit => {
			return digits[ unit.toLowerCase() ] + ' ' + getLabel( unit );
		});

		const spanStyle = {};
		if ( !! fontSize ) spanStyle.fontSize = fontSize;
		if ( !! fontColor ) spanStyle.color = fontColor;
		if ( !! fontWeight ) spanStyle.fontWeight = fontWeight;
		
		return (
			<span style={ spanStyle }>{ arr.join( separator ) }</span>
		);
	}
	
	const renderCircularSection = () => {

		const {
			baseColor,
			progressColor,
			digitColor,
			labelColor,
			digitSize,
			labelSize,
			baseSize,
			progressSize,
			digitTop,
			labelTop,
		} = { ...styles };
		
		let cirleId = 'tc'+clientId.replaceAll( '-','' );

		// Create temporary reminder in the window and check if it is not expired
		if ( ! window[cirleId] && ! digits.expired ) {
			window[cirleId] = digits;
		}		

		format.sort( (a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b) );
		return format.map( unit => {

			const fullAmount = {
				year: 10, // decade
				months: 12,
				days: 30,
				hours: 24,
				minutes: 60,
				seconds: 60,
			};

			const unitLowerCase = unit.toLowerCase();			
			const max = fullAmount[ unitLowerCase ];

			const value = digits[ unit.toLowerCase() ];
			const size = 200;
			const vBox = '-' + size*0 + ' -' + size*0 + ' ' + size + ' ' + size; // display: +- stroke width/2
			const radius = ( size / 2 ) - 10;
			const circumference = 3.14159 * radius * 2;
			const percentage = Math.round( circumference * ( ( max-value ) / max)) + 'px'

			const cx = size / 2;
			const cy = size / 2;

			//unitLowerCase === 'minutes' && console.log( 'digit, duration, remaining', digits[ unit.toLowerCase() ], duration, remaining);	

			const progressStroke = _countdown[ unit.toLowerCase() ] === 0 ? baseColor : progressColor;

			return (
				<svg width={ size } height={ size } viewBox={ vBox } style={{ transform:'rotate(-90deg)' }}>
					<circle r={ cx - 10 } cx={ cx } cy={ cy } fill="transparent" stroke={ baseColor } stroke-width={ baseSize }></circle>
					<circle r={ cx - 10 } cx={ cx } cy={ cy } stroke={ progressStroke } stroke-width={ progressSize } stroke-linecap="round" 
						stroke-dashoffset={ percentage } stroke-dasharray={ circumference } fill="transparent"></circle>
					<text x="100" y="50" font-size={ digitSize } text-anchor="middle" 
						dominant-baseline="middle" style={{transform:'rotate(90deg) translate(0px, -196px)'}}>
							<tspan x="100" y={ digitTop } font-weight="bold" fill={ digitColor }>{ value }</tspan>
							<tspan x="100" y={ labelTop } font-weight="normal" fill={ labelColor } font-size={ labelSize }>{ getLabel( unit ) }</tspan>
						</text>
				</svg>
			);
		});
	}
	
	let inlineStyles = {};
	
	const renderExpiryText = () => {
		switch ( onExpiry ) {
			case "redirect_url":
				// Redirect to URL is is set to and if expired
				if ( 'post-php' !== window.adminpage ) { // if not in admin

					window.setTimeout( () => {
						location.href = expiryURL;
					}, 2000 );

					return (
						<p className="tc-textCenter">
							{ __( 'Redirecting...', 'the-countdown' ) }
						</p>
					);
				} else {
					return (
						<p className="tc-textCenter">
							{ __( 'Redirecting on hold because you are not in front page.', 'the-countdown' ) }
						</p>
					);
				}

			default:
				return (
					<p className="tc-textCenter">
						{ expiryText }
					</p>
				);
		}
	}
	
	const hideIfExpired = () => {
		return !! expired && !! hideonExpiry ? true : false;
	}

	const {
		width,
	} = { ...styles };

	let margin = '0 ' + ( 100 - parseInt( width ) ) / 2 + '%';

	switch ( attributes.template ) {
		case "minimal":
			return (
				<>
					{ ! hideIfExpired() && 
						<span className="the-countdown tc-template-minimal">
							{ ! isEmpty( _countdown ) && renderMinimalSection() }
						</span>
					}
					
					{ !! expired && renderExpiryText() }
				</>
			);

		case "scoreboard":
			return (
				<>
					{ ! hideIfExpired() &&			
						<span className="the-countdown tc-template-scoreboard" style={{ width, gap }}>
							{ ! isEmpty( _countdown ) && renderScoreboardSection() }
						</span>
					}

					{ !! expired && renderExpiryText() }
				</>				
			);
			
		case "flip":
			return (
				<>
					{ ! hideIfExpired() &&			
						<span className="the-countdown tc-template-flip" style={{ lineHeight, gap }}>
							{ ! isEmpty( _countdown ) && renderFlipSection() }
						</span>
					}

					{ !! expired && renderExpiryText() }
				</>			
			);

		case "circular":
			return (
				<>
					{ ! hideIfExpired() &&			
						<span className="the-countdown tc-template-circular" style={{ width, gap, margin }}>
							{ ! isEmpty( _countdown ) && renderCircularSection() }
						</span>
					}

					{ !! expired && renderExpiryText() }
				</>			
			);	

		case "default":
		default:			
			return (
				<>
					{ ! hideIfExpired() &&			
						<span className="the-countdown tc-template-default" style={{ gap }}>
							{ ! isEmpty( _countdown ) &&  renderDefaultSection() }
						</span>
					}

					{ !! expired && renderExpiryText() }
				</>				
			);	
	}
}
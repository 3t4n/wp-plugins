import { __ } from '@wordpress/i18n';

const { useEffect, useState, useRef } = wp.element;

const apiFetch = wp.apiFetch;

import './lib/rAF.js';
import countdown from './lib/countdown.min.js';

import { convertRelativeTime } from './relative';
import Templates from './templates';

// https://codesandbox.io/s/x908rkw8yq?fontsize=14&file=/src/index.js
const fetchServerDateTime = ( attributes ) => {
	const [ currentDate, setcurrentDate ] = useState( null );
	const [ loading, setLoading ] = useState( true );

	const fetchDateTime = async () => {
		const response = await apiFetch({ path: 'the-countdown/v1/get-datetime' });
		const date = await response;

		setcurrentDate( new Date( date ) );
		setLoading( false );
	};

	useEffect(() => {
		fetchDateTime();
	}, [ attributes.mode, attributes.dateTime, attributes.relative ]); // update if dateTime or relative time changed

	return { currentDate, loading };
};

export default function CountDownTimer( attributes ) {	
	const { 
		dateTime,
		mode,
		tickInterval,
		format,
		onTick,
		onExpiry,
		expiryURL,
		relative,
	} = { ...attributes };

	let units = 0;
	let zeroUnits = {};
	let trueShuffles = {};
	
	for ( let i = 0; i < format.length; i++ ) {
		units = units + countdown[ format[i].toUpperCase() ]; // for countdown parameter
		zeroUnits[ format[i] ] = 0;
		trueShuffles[ format[i] ] = true;
	}

	const targetDate = 'relative' === mode ? convertRelativeTime( relative ) : new Date( dateTime );

	const { currentDate, loading } = fetchServerDateTime( attributes ); // update current server date time

	const initialState = {
		...zeroUnits,
		init : false,
		prevs : Object.assign({}, zeroUnits ),
		shuffles : Object.assign({}, trueShuffles ),
		expired : false,
		error : false,
	}
	
	const [ _countdown, _setCountdown ] = useState( initialState );
	
	const prevCountddownRef = useRef( initialState );

	// https://stackoverflow.com/a/69771433/806875
	// https://stackoverflow.com/a/69340268/806875
	useEffect(() => {
		if ( loading ) {
			return;
		}

		// Do quick redirect if expired right after calculation.
		const doExpiryAction = () => {
			// Redirect to URL is is set to and if expired
			if ( 'post-php' !== window.adminpage && 'redirect_url' === onExpiry ) {
				window.location = expiryURL;
				return;
			}

			_setCountdown( initialState );
		}


		if ( 'until' === mode || ( 'relative' === mode && ( targetDate.getTime() > currentDate.getTime() ) ) ) { // expired
			if ( targetDate.getTime() < currentDate.getTime() ) { // expired
				doExpiryAction();
			} else {
				let ticks = tickInterval;
				
				const interval = setInterval( () => {
					let countdownObj = countdown( targetDate, currentDate.getTime() + ticks, units );

					if ( countdownObj.start.toString() === countdownObj.end.toString() ) { // this -1 second
						clearInterval( interval );
						initialState.expired = true;
						_setCountdown( initialState ); // expired					
					} else {
						countdownObj.init = countdown( targetDate, currentDate.getTime() + tickInterval, units );
						countdownObj.expired = false;

						countdownObj.shuffles = prevCountddownRef.current.shuffles;
						
						for ( let i = 0; i < format.length; i++ ) {							
							let unit = format[i];
							if ( countdownObj[ unit ] !== prevCountddownRef.current[ unit ] ) {
								countdownObj.shuffles[ unit ] = ! Boolean( prevCountddownRef.current.shuffles[ unit ] );
							}
						}
						
						countdownObj.prevs = prevCountddownRef.current;
						_setCountdown( countdownObj );

						let fn = window[ onTick ]; // onTick callback						
						typeof fn === "function" && fn(); // is a function?

						ticks = ticks + (tickInterval * 1000);
					}
				}, parseInt( tickInterval * 1000 ) );				

				return () => clearInterval( interval );
			}
		}

		if ( 'since' === mode || ( 'relative' === mode && ( targetDate.getTime() < currentDate.getTime() ) ) ) { // expired
			if ( targetDate.getTime() > currentDate.getTime() ) { // expired
				doExpiryAction();
			} else {
				let ticks = tickInterval;

				const interval = setInterval( () => {
					let countdownObj = countdown( currentDate.getTime() + ticks, targetDate, units );

					if ( countdownObj.start.toString() === countdownObj.end.toString() ) { // this -1 second
						clearInterval( interval );
						initialState.expired = true;
						_setCountdown( initialState ); // expired
					} else {
						countdownObj.init = countdown( targetDate, currentDate.getTime() + tickInterval, units );
						countdownObj.expired = false;

						countdownObj.shuffles = prevCountddownRef.current.shuffles;
						
						for ( let i = 0; i < format.length; i++ ) {							
							let unit = format[i];
							if ( countdownObj[ unit ] !== prevCountddownRef.current[ unit ] ) {
								countdownObj.shuffles[ unit ] = ! Boolean( prevCountddownRef.current.shuffles[ unit ] );
							}
						}
						
						countdownObj.prevs = prevCountddownRef.current;
						_setCountdown( countdownObj );


						let fn = window[ onTick ]; // onTick callback						
						typeof fn === "function" && fn(); // is a function?

						ticks = ticks + (tickInterval * 1000);
					}
				}, parseInt( tickInterval * 1000 ) );

				return () => clearInterval( interval );
			}
		}
	}, [ currentDate, format, loading ] );

	if ( ! loading ) {

		// Return error if target date is not valid for since and until
		if ( 'since' === mode && ( targetDate.getTime() > currentDate.getTime() ) ) { // expired
			return <div className="tc-error">{ __( 'Target date cannot be in the future for "since" mode, please check the date time setting.' )} </div>
		}

		if ( 'until' === mode && ( targetDate.getTime() < currentDate.getTime() ) ) { // expired
			return <div className="tc-error">{ __( 'Target date cannot be in the past for "until" mode, please check the date time setting.' )} </div>
		}

		prevCountddownRef.current = _countdown;
		return Templates( { _countdown, attributes } );
	} else {
		return <div className="tc-textCenter">{ __( 'Rendering timer...', 'the-countdown' ) }</div>
	}
};

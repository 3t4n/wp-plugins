jQuery( function () {
	var __ = wp.i18n.__;
	var _n = wp.i18n._n;
	var sprintf = wp.i18n.sprintf;

// String also in PHP:
	console.log(
		__( 'Yo, we told you this plugin didn&#8217;t do much. Test Trunk', 'nothing-much' )
	);

// String unique to JavaScript:
	console.log(
		__( 'Yo, this plugin isn&#8217;t doing much in JavaScript.', 'nothing-much' )
	);

	console.log(
		__( 'Yo, this plugin isn&#8217;t doing much in JavaScript.', 'nothing-much' )
	);

	console.log(
		// translators: %s: The name of this plugin.
		sprintf( __( 'Yo, this plugin is named %s.' ), 'nothing-much' )
	);

	console.log(
		// translators: %d: number of eggs
		sprintf( _n( '%d egg.', '%d eggs.', 5, 'nothing-much' ), 5 )
	);
} );

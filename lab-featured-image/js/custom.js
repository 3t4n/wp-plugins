( function( wp ) {
	wp.data.dispatch('core/notices').createNotice(
		'error',
		'Please set a Featured Image. This post cannot be published without one.',
	{
			isDismissible: true,
		}
	);
} )( window.wp );


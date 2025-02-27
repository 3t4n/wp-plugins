/**
 * @summary Interaction tracking for the front-end builder.
 *
 * @author WEBDOGS
 * @since  1.0.0
 */

import dragTracking from './builder-tracking/drag-tracking';

{
	const init = () => {
		window.jQuery( dragTracking );
	};

	if (
		'complete' === document.readyState ||
		'interactive' === document.readyState
	) {
		init();
	} else {
		document.documentElement.ownerDocument.addEventListener(
			'DOMContentLoaded',
			init
		);
	}
}

/**
 * Check on form fields that want to trigger a save alert in case of unload
 */
const saveAlerts = () => {

	window.pwpSaveAlert = false;
	const saveAlerts = document.querySelectorAll( '[data-save-alert]' );
	if ( 0 !== saveAlerts.length ) {
		let inputForms = [];
		// Add listener to each field to track changes
		saveAlerts.forEach( input => {
			input.addEventListener( 'click', function() {
				// Mark that an alert is needed.
				window.pwpSaveAlert = true;
			});
			// Support inputs outside of a <form> element.
			const formLocation = input.getAttribute('form') ?? false;
			if ( formLocation ) {
				inputForms.push( document.getElementById( formLocation ) );
			} else {
				inputForms.push( input.closest( 'form' ) );
			}
		});
		inputForms.forEach( form => {
			// Allow each form submission to clear the save alert.
			form.addEventListener( 'submit', function() {
				window.pwpSaveAlert = false;
			});
		});
	}

	const clearSaveAlerts = document.querySelectorAll( '[data-clear-save-alert]' );
	if ( 0 !== clearSaveAlerts.length ) {
		clearSaveAlerts.forEach( inputButton => {
			// Allow each input/button "submission" to also clear the save alert.
			inputButton.addEventListener( 'click', function() {
				window.pwpSaveAlert = false;
			});
		});
	}

	window.addEventListener( 'beforeunload', (event) => {
		if ( window.pwpSaveAlert ) {
			// Recommended
			event.preventDefault();
			// Included for legacy support, e.g. Chrome/Edge < 119
			event.returnValue = true;
		}
	  }
	);
};

export default saveAlerts;

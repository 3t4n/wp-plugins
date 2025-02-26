/* Dutch (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Mathias Bynens <http://mathiasbynens.be/> */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

	jQuery(function($){
		$.datepicker.regional.nl = {
			closeText: "Sluiten",
			prevText: "←",
			nextText: "→",
			currentText: "Vandaag",
			monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni",
			"Juli", "Augustus", "September", "Oktober", "November", "December" ],
			monthNamesShort: [ "jan", "feb", "mrt", "apr", "mei", "jun",
			"jul", "aug", "sep", "okt", "nov", "dec" ],
			dayNames: [ "zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag" ],
			dayNamesShort: [ "zon", "maa", "din", "woe", "don", "vri", "zat" ],
			dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
			weekHeader: "Wk",
			dateFormat: "dd-mm-yy",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: "" };
		$.datepicker.setDefaults( $.datepicker.regional.nl );
	});

} ) );

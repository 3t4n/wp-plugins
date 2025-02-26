/* Inicialització en català per a l'extensió 'UI date picker' per jQuery. */
/* Writers: (joan.leon@gmail.com). */
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
		$.datepicker.regional.ca = {
			closeText: "Tanca",
			prevText: "Anterior",
			nextText: "Següent",
			currentText: "Avui",
			monthNames: [ "Gener","Febrer","Març","Abril","Maig","Juny",
			"Juliol","Agost","Setembre","Octubre","Novembre","Desembre" ],
			monthNamesShort: [ "gen","feb","març","abr","maig","juny",
			"jul","ag","set","oct","nov","des" ],
			dayNames: [ "diumenge","dilluns","dimarts","dimecres","dijous","divendres","dissabte" ],
			dayNamesShort: [ "Dg","Dl","Dt","Dc","Dj","Dv","Ds" ],
			dayNamesMin: [ "Dg","Dl","Dt","Dc","Dj","Dv","Ds" ],
			weekHeader: "Set",
			dateFormat: "dd/mm/yy",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: "" };
		$.datepicker.setDefaults($.datepicker.regional.ca);
	});

} ) );

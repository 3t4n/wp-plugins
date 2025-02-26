(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


    jQuery(document).ready(function($){

        // SETTINGS FIELDS

    	if (
    	$("#customStyle > input").is(':checked')  )
    	{
			//$("#fontStyle").fadeOut();
            //$("#fontStyle").find(".ant_check_description").fadeOut();

			$("#ant_dashboard_content tbody > tr:last-child").fadeIn(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(2)").fadeIn(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(3)").fadeIn(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(4)").fadeIn(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(5)").fadeIn(1000);

        };

        $("#customStyle > input").click(function () {
            $("#ant_dashboard_content tbody > tr:last-child").fadeToggle(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(2)").fadeToggle(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(3)").fadeToggle(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(4)").fadeToggle(1000);
            $("#ant_dashboard_content tbody > tr:nth-last-child(5)").fadeToggle(1000);
        });


        //DATEPICKER FIELDS

        $('.ant-date-picker').datepicker({
            dateFormat:  'yy-mm-dd'
        });

        //COLOR PICKER FIELDS

        $('.ant-color-picker').wpColorPicker();

    });

})( jQuery );


// RANGE FIELDS
function updateRadius(radiusValue){
    document.getElementById("currentRadiusValue").innerHTML = radiusValue;
}





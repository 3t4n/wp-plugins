( function( $ ) {
	"use strict";

	$( document ).ready( function() {
		$("input#dnxwporg_use_desc").click( function() {
		    if ( $(this).prop("checked") ) {
		        $("textarea#dnxwporg_custom_desc").prop("disabled", !$("input#dnxwporg_use_desc").prop("checked"));
		        $("textarea#dnxwporg_custom_desc").focus();
		    } else {
		        $("textarea#dnxwporg_custom_desc").prop("disabled", $("input#dnxwporg_use_desc").prop("checked"));
		    }
		});
	});

})(jQuery);
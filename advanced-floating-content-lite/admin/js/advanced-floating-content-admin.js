(function( $ ) {
	'use strict';

	if( jQuery().wpColorPicker ) {
		$(function() {
			$(".color-picker-afc").wpColorPicker();
		});
	}
    
    jQuery(document).on('click', '#remind_later', function(e) {

        e.preventDefault();
        var data = {
            'action': 'update_remind_later',
            'remind_later': 1
        };            
        jQuery.ajax({
            type: "POST",               
            dataType:"json",
            data    : data,
            url: ajaxurl,
            //This fires when the ajax 'comes back' and it is valid json
            success: function (response) {                    
                location.reload();

            }
            //This fires when the ajax 'comes back' and it isn't valid json
        }).fail(function (data) {               
            console.log(data);
            location.reload();
        });

    });
    
	
})( jQuery );

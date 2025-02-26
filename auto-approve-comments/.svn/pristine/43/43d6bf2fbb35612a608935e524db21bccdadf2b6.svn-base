"use strict";

if (typeof jQuery != 'function') {
    document.getElementById('aac-notice-error-jquery').style.display = 'block';
} else {

    (function($) {
    	
    	$('#aac-roles-autocomplete').on('input', function() {
    
    		var data = {
    			action: 'aac_ajax_get_roles_suggestions',
    			search: $('#aac-roles-autocomplete').val()
    		}
    
    		$.ajax({
    			url: auto_approve_comments_ajax_params.ajaxurl,
    			type: 'post',
    			data: data,
    			success: function( response ) {
    
    				$('#aac-roles-autocomplete').autocomplete({
    					source: response
    				});
    			}
    		})
    	})
    	
    })( jQuery );
}

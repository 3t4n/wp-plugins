jQuery(document).ready(function(){ 
    
    jQuery('#aptmicrodata_event_start_date').datepicker({
            dateFormat : 'D, m/d/yy'
    });
    
    var microdataType = jQuery('#aptmicrodata_saved_microdata_type').val();
    var aptmicrodataPostID = jQuery('#aptmicrodata_post_id').val();
    
    if(microdataType == '') {
    
        microdataType = jQuery('#aptmicrodata_microdata_type').val();
    
    }
    
    aptmicrodata_set_microdata_form(microdataType, aptmicrodataPostID);
    
    jQuery('#aptmicrodata_microdata_type').change(function(){
        
        var microdataType = jQuery('#aptmicrodata_microdata_type').val();
        aptmicrodata_set_microdata_form(microdataType, aptmicrodataPostID);
        
    });
    
});

function aptmicrodata_set_microdata_form(microdataType, aptmicrodataPostID) {
    
    var data = {
		action: 'aptmicrodata_'+microdataType+'_form',
                postID: aptmicrodataPostID
	};
    
    if(microdataType != 'none') {
    
        jQuery.post(ajaxurl, data, function(response) {
            jQuery("#aptmicrodata_microdata_form").html(response);
        });
    
    } else {
        
            jQuery("#aptmicrodata_microdata_form").html('');
        
    }
    
}


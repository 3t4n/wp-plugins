jQuery(document).ready(function () {
    
    jQuery(document).on('click', '#social-media-form input[name="media_type"]', function () {
        jQuery('#social-media-form .genrateBtn button').prop('disabled', false);
        
    });
    
    jQuery(document).on('click', '#social-media-form input[name="type"]', function () {
        var type = jQuery(this).val();
        jQuery('#social-media-form .types .type-content').addClass('hide');
        jQuery('#social-media-form .describe-fields').removeClass('hide');
        if( type == 'topic' ){
            jQuery('#social-media-form .other-fields').removeClass('hide');
            jQuery('#social-media-form .topic-field').removeClass('hide');
            jQuery('#social-media-form .summary-field').addClass('hide');
        }else if( type == 'summary' ){
            jQuery('#social-media-form .other-fields').removeClass('hide');
            jQuery('#social-media-form .topic-field').addClass('hide');
            jQuery('#social-media-form .summary-field').removeClass('hide');
        }else if( type == 'file' ){
            jQuery('#social-media-form .other-fields').addClass('hide');
            jQuery('#social-media-form .file-field').removeClass('hide');
        }
    });
    
    jQuery(document).on("click", "#social-media-form .btn-next", function () {
        var num = parseInt(jQuery(this).data('step'));
        var nextNum = num + 1;
        jQuery(this).data('step', nextNum);
        
        jQuery("#social-media-form .step").addClass("hide");
        jQuery("#social-media-form .step-"+ nextNum).removeClass("hide");
        
        if( num == 1 ){
            jQuery('#social-media-form .genrateBtn').addClass('hide');
            jQuery('#social-media-form .bottomButton').removeClass('hide');
            
        }
        
    });
    
    var page = addlly_getQueryVariable("page");
    if( page == 'linkedin-post-writer' ){
        jQuery('input[name="media_type"][value="linkedIn"]').trigger('click');
        jQuery('.genrateBtn button').prop('disabled', false);
        jQuery('.genrateBtn button').trigger('click');
        jQuery('input[name="type"][value="topic"]').trigger('click');
    }
    
});

function addlly_getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return pair[1];
        }
    }
    return false;
}


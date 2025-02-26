jQuery( function($) {
    
   
        $('input.charcounter-control').charcounter({
           // placement: 'bottom-right'
            placement: 'top-d'
        });
        $('textarea#meta_keyword').charcounter({
            placement: 'top-d'
        });
        $('textarea#meta_description').charcounter({
            placement: 'top-d'
        });
        
        jQuery('input[name="enable_tag"]').change(function() {

        var sandbox = jQuery('input[name="enable_page_tag"], input[name="enable_post_tag"], input[name="enable_og"]').closest('tr');
        if (jQuery(this).is(':checked')) {
            sandbox.show();            
        } else {
            sandbox.hide();           
        }
    }).change();
    
    
});

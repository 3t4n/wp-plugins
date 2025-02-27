
    jQuery( function($) {
        $( document ).tooltip();

        jQuery('.TMrPlanPugin_ShowElementEvnt').unbind('click').click(function(evnt){
            evnt.preventDefault();
            let target = jQuery(this).attr('target');
            if(jQuery('#'+target).is(':visible')){
                jQuery('#'+target).slideUp();
            }else{
                jQuery('#'+target).slideDown();
            }
        });

        if(jQuery('#MrPlanAvisoActualizacion').length>0){
            let version = jQuery('#MrPlanAvisoActualizacion').attr('version');
            let version_wordpress = jQuery('#MrPlanAvisoActualizacion').attr('version_wordpress');
            jQuery.ajax({
                url: "http://api.wordpress.org/plugins/info/1.0/misterplan.json",
                context: document.body
            }).done(function(data) {
                if(version!=data.version && data.requires <= version_wordpress){
                    jQuery('#MrPlanAvisoActualizacion').slideDown();
                }
            });
        }

        
    });


    function validate(form) {
    
        return confirm('Are you sure you want to delete this engine? This operation cannot be undone');
    }
 var cyber_option_index = 0;
function removeCyberCustomOption() {
    jQuery("#" + jQuery(this).attr('rel')).remove();

}
function adjustCyberCustomOptions() {
    switch(jQuery('#cyber_custom_type').val()) {
        case 'radio':
        case 'dropdown':
            jQuery('#cyber_options_displayed').show();
            break;
        case 'Select':
        case 'text':
        case 'checkbox':
        case 'textarea':
            jQuery('#cyber_options_displayed').hide();
            break;
        
    }
}

jQuery(document).ready(function(){
    function updateGroups() {
        jQuery('#cyber_widget_groups').val("");
        jQuery(".cyber_widget_group").each( function(index, el) { 
            if( jQuery(el).is(":checked")) {
                jQuery('#cyber_widget_groups').val( jQuery('#cyber_widget_groups').val() + 
                                                jQuery(el).val() + "::" 
                                                + jQuery(jQuery(el).attr("rel")).val() + "|*|");
            }
        });
    }


    jQuery('#cyber_submit').click(function(){
        var form = $("#cyberimpact");
        if(jQuery("[name=groups_choice]").length!=0){
            var sGroups = '';
            var aInput = jQuery("[name=groups_choice]");
            for(var i=0;i<aInput.length;i++){
                if(aInput[i].type=='select-one'){
                    sGroups+= aInput[i].value;
                }
                else{               
                    if(aInput[i].checked){
                        if(sGroups == '')
                            sGroups+= aInput[i].value;
                        else
                            sGroups+= ','+aInput[i].value;
                    }
                }   
            }
            jQuery("[name=cyber_groups]").val(sGroups);
            form.submit();
        }
    });

    jQuery('.cyber_widget_group').change(updateGroups);
    jQuery('.cyber_group_name').change(updateGroups);
    jQuery('#cyber_options_template').hide();
    jQuery('#cyber_add_option').click( function () {
        cyber_option_index ++;
        jQuery('#cyber_options_content').append(jQuery('#cyber_options_template').html().replace(/__ID__/g, "no" + cyber_option_index));
        jQuery('#no' + cyber_option_index + ' a').click(removeCyberCustomOption);
    });
    jQuery('.cyber_custom_field').click(function(){
        jQuery('#cyber_mandatory_custom').prop('checked',false);
        var field = jQuery(this).attr('rel');
        jQuery('#cyber_edit_custom').attr('rel', field);
        if(jQuery('#cyber_widget_mandatory_' + field).val()==1 ) // hidden field not 0 and not null 
            jQuery('#cyber_mandatory_custom').prop('checked',true);
        jQuery('#cyber_custom_label').val(jQuery('#cyber_widget_' + field).val());
        jQuery('#cyber_custom_type').val(jQuery('#cyber_widget_type_' + field).val());
        var opts = jQuery('#cyber_widget_options_' + field).val().split("\n");
        jQuery('#cyber_options_content').html("");
        if(opts.length) {
            for(cyber_option_index = 0; cyber_option_index< opts.length; cyber_option_index++) {
                if( opts[cyber_option_index] !== "") {
                    jQuery('#cyber_options_content').append(jQuery('#cyber_options_template').html().replace(/__ID__/g, "no" + cyber_option_index));
                    jQuery('#opt' + 'no' + cyber_option_index ).val(opts[cyber_option_index]);
                }
            }
        }
        jQuery('#cyber_options_content a').click(removeCyberCustomOption);
        adjustCyberCustomOptions();
    });
    jQuery('#cyber_custom_type').change(adjustCyberCustomOptions);

    jQuery('#cyber_custom_save').click(function(){
        var field;
        if(field = jQuery('#cyber_edit_custom').attr('rel')) { //atribution, not comparison for =
             if(jQuery('#cyber_mandatory_custom').attr('checked') ) // hidden field not 0 and not null
                jQuery('#cyber_widget_mandatory_' + field).val("1");
             else jQuery('#cyber_widget_mandatory_' + field).val("");
             
             jQuery('#cyber_widget_' + field).val(jQuery('#cyber_custom_label').val());
             
             jQuery('#cyber_widget_type_' + field).val(jQuery('#cyber_custom_type').val());
             
             jQuery('#cyber_widget_options_' + field).val("");
             jQuery('#cyber_options_content input').each(function () {
                if(jQuery('#cyber_widget_options_' + field).val() !== "")
                    jQuery('#cyber_widget_options_' + field).val(jQuery('#cyber_widget_options_' + field).val() + "\n");
                jQuery('#cyber_widget_options_' + field).val(jQuery('#cyber_widget_options_' + field).val() + jQuery(this).val());
             });
             if(jQuery('#cyber_custom_label').val())
                jQuery('#label_cyber_use_' + field).html(jQuery('#cyber_custom_label').val());
             else jQuery('#label_cyber_widget_' + field).val(jQuery('#label_cyber_widget_' + field).attr('title'));    
        }
        jQuery('.tb-close-icon').click();
        tb_remove();
        jQuery('#cyber_mandatory_custom').attr('checked',false);
    });
});


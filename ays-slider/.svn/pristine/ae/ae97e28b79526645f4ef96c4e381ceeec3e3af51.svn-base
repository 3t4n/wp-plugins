jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);
        jQuery(currentAttrValue).css("border-bottom","1px solid white");
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
    jQuery("#sortable_pics").sortable({
        revert: true
    });
    /************************************************************EFFECTS START******************************************************************/
    var ays_checked_counter = 0;
    var ays_selected_effect_name = new Array();
    jQuery("#ays_notransition").click(function(){
        ays_checked_counter++;
        if(ays_checked_counter == 1){
            jQuery("#ays_notransition").prop("checked",true);
        }
        if(ays_checked_counter == 2){
            jQuery("#ays_notransition").prop("checked",false);
            ays_checked_counter = 0;
        }
        if(jQuery("#ays_notransition").prop("checked")){
            jQuery("#ays_rand").prop("checked",false);
            jQuery(".ays_effects").each(function(){
                jQuery(this).prop("checked",false);
                jQuery(this).removeAttr("checked");
                jQuery(this).css("pointer-events","none");
                jQuery("#nk_ays_sl_eff").val("notransition");
            });
        }
        else{
            jQuery("#ays_rand").prop("checked",true);
            jQuery(".ays_effects").each(function(){
                jQuery(this).prop("checked",true);
                jQuery(this).attr("checked");
                jQuery(this).css("pointer-events","all");
                var ays_effect_name = jQuery(this).val();
                ays_selected_effect_name.push(ays_effect_name);
                console.log(ays_selected_effect_name);
                jQuery("#nk_ays_sl_eff").val("notransition");
            });
            var ays_effects_name = ays_selected_effect_name.join("***");
            jQuery("#nk_ays_sl_eff").val(ays_effects_name);
        }
    });
    jQuery(".ays_effects").change(function(){
        var ays_already_selected_effects = jQuery("#nk_ays_sl_eff").val().split("***");
        if(jQuery(this).is(":checked")==false){
            jQuery("#ays_rand").prop("checked",false);
            var ays_index =  ays_already_selected_effects.indexOf(jQuery(this).val());
            ays_already_selected_effects.splice(ays_index,1);
        }
        else{
            ays_already_selected_effects.push(jQuery(this).val());
        }
        jQuery("#nk_ays_sl_eff").val(ays_already_selected_effects.join("***"));

        if (jQuery('.ays_effects:checked').length == jQuery('.ays_effects').length) {
            jQuery("#ays_rand").prop("checked",true);
        }
    });
    var ays_selectall_elements_check = new Array();
    jQuery("#ays_rand").change(function(){
        if(jQuery("#ays_rand").prop("checked")){
            jQuery("#ays_notransition").prop("checked",false);
            jQuery(".ays_effects").each(function(){
                jQuery(this).prop("checked",true);
                ays_selectall_elements_check.push(jQuery(this).val());
            });
            jQuery("#nk_ays_sl_eff").val(ays_selectall_elements_check.join("***"));            
        }
        else{
            jQuery(".ays_effects").each(function(){
                jQuery(this).prop("checked",false);
            });
            jQuery("#nk_ays_sl_eff").removeAttr("value");            
        }

    });
    /*************************************************************EFFECTS END*******************************************************************/
    jQuery(".ays_rem").click(function(){
        jQuery(this).parent("span").fadeOut();
        jQuery(this).parent("span").parent("div").children("input[type=text]").val("");
        jQuery(this).parent("span").parent("div").children("input[type=hidden]").val("");
    });
});

                

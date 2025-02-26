window.addEventListener('load', function(){
    jQuery('#anychat-menu a').on('click', function(){
        var target = jQuery(this).data('target');
        if (!target){
            return true;
        }
        jQuery('#anychat-menu .active').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.anychat-panel').addClass('hidden');
        jQuery(target).removeClass('hidden');
    });
    jQuery('.ui.checkbox').checkbox();
    jQuery('#anychat-tabs').addClass('active');
    
    jQuery('.integration-type-option').click(function(){
        var val = jQuery(this).data('value');
        jQuery('#integration_type').val(val);
        jQuery('.integration-type-option.active').removeClass('active');
        jQuery(this).addClass('active');
    });
});
function lazySetup(id, name){
    
    jQuery_money('#lazyConfigStatus').prop('checked', false);
    if(jQuery_money('#lazyTagRead-'+id).is(':checked')){
        jQuery_money('#lazyConfigStatus').prop('checked', true);
    }

    jQuery_money('#lazyModalCenter').modal('show');
    jQuery_money('#lazyConfigId').val(id);
    jQuery_money('#lazyConfigWidth').val(jQuery_money('#lazy_data_width_'+id).val());
    jQuery_money('#lazyConfigHeight').val(jQuery_money('#lazy_data_height_'+id).val());
    jQuery_money('#lazyConfigFrequency').val(jQuery_money('#lazy_data_frequency_'+id).val());
    jQuery_money('#lazyConfigTag').val(jQuery_money('#tag_'+id).val());
    jQuery_money('#lazyConfigOrder').val(jQuery_money('#lazy_data_order_'+id).val());
    jQuery_money('#lazyConfigAnchor').val(jQuery_money('#lazy_data_anchor_'+id).val());
    jQuery_money('#lazyConfigStart').val(jQuery_money('#lazy_data_start_'+id).val());
    
    var align = jQuery_money('#lazy_data_align_'+id).val();
    jQuery_money('#lazyConfigAlign1').prop('checked', false);
    jQuery_money('#lazyConfigAlign2').prop('checked', false);
    jQuery_money('#lazyConfigAlign3').prop('checked', false);

    if(align == 'left'){
        jQuery_money('#lazyConfigAlign1').prop('checked', true);
    } else if(align == 'center'){
        jQuery_money('#lazyConfigAlign2').prop('checked', true);
    } else if(align == 'right'){
        jQuery_money('#lazyConfigAlign3').prop('checked', true);
    }
}

function lazyDismiss(){
    jQuery_money('#lazyModalCenter').modal('hide');
}

function lazySwitch(){
    console.log(this);
    console.log(jQuery_money(this));
}

function lazySave(){
    jQuery_money('#lazySaveButtonSpinner').show();
    jQuery_money('#lazySaveButtonLabel').hide();
    frequency   = jQuery_money('#lazyConfigFrequency').val();
    start       = jQuery_money('#lazyConfigStart').val();
    order       = jQuery_money('#lazyConfigOrder').val();
    anchor      = jQuery_money('#lazyConfigAnchor').val();
    status      = jQuery_money('#lazyConfigStatus').is(':checked');
    id          = jQuery_money('#lazyConfigId').val();
    tag         = jQuery_money('#lazyConfigTag').val();
    width       = jQuery_money('#lazyConfigWidth').val();
    height      = jQuery_money('#lazyConfigHeight').val();
    align       = jQuery_money('input[type=\'radio\'][name=\'lazyConfigAlign\']:checked').val();
    var data = {
        action: 'update_data_lazy',
        _nonce: nonceSettings['update_data_lazy'],
        frequency: frequency,
        order: order,
        anchor: anchor,
        status: status,
        id: id,
        tag: tag,
        width: width,
        height: height,
        align: align,
        start: start
    };
    
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = JSON.parse(response.substr(0, response.length - 1));
        
        jQuery_money('#lazy_data_width_'+id).val(jQuery_money('#lazyConfigWidth').val());
        jQuery_money('#lazy_data_height_'+id).val(jQuery_money('#lazyConfigHeight').val());
        jQuery_money('#lazy_data_frequency_'+id).val(jQuery_money('#lazyConfigFrequency').val());
        jQuery_money('#tag_'+id).val(jQuery_money('#lazyConfigTag').val());
        jQuery_money('#lazy_data_align_'+id).val(jQuery_money('#lazyConfigAlign').val());
        jQuery_money('#lazy_data_order_'+id).val(jQuery_money('#lazyConfigOrder').val());
        jQuery_money('#lazy_data_anchor_'+id).val(jQuery_money('#lazyConfigAnchor').val());
        jQuery_money('#lazy_data_start_'+id).val(jQuery_money('#lazyConfigStart').val());
        jQuery_money('#lazyTagRead-'+id).prop('checked', jQuery_money('#lazyConfigStatus').is(':checked'));
        jQuery_money('#lazySaveButtonSpinner').hide();
        jQuery_money('#lazySaveButtonLabel').show();
        if(data.status == 'true'){
            jQuery_money('#label-lazy-'+id).html('Status :<i class="themoneytizer_ico_green bi bi-play-fill"></i>');
        } else {
            jQuery_money('#label-lazy-'+id).html('Status :<i class="themoneytizer_ico_red bi bi-pause-fill"></i>');
        }
        lazyDismiss();

        if(result.status){
            Swal.fire({
                icon: 'success',
                title: result.message,
                timer: 2000,
              });
        } else {
            Swal.fire({
                icon: 'error',
                title: result.message,
                timer: 2000,
            });
        }
    });
}
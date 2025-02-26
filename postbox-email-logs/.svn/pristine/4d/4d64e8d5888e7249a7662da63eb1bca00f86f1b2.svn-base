jQuery(document).ready(function($){
    $(".pbeml-date").each(function() { 
        var val =  $(this).val();
        $(this).datepicker();   
        $(this).datepicker( "option", "dateFormat", 'dd/mm/yy');
        $(this).datepicker('setDate', val );
    });
    $('#doaction').click(function(e){
        var action = $('#bulk-action-selector-top').val();
        if( action == 'delete_all' && !confirm( pbeml.confirm )){
            return false;
        }
    });
    $('.pbeml-row').click(function(e){
        e.preventDefault();
        var selected = $(this);
        $('.pbeml .modal-body .data').html('');
        $('body').addClass('pbeml-popup-open');
        $('.pbeml .popup').show();
        $('.pbeml .loader').show();
        var data = {
            'action': 'pbeml_get_log_data',
            'id': $(this).data('log'),
            'nonce': $(this).data('nonce')
        };
        $.ajax({
            method: "POST",
            url: pbeml.ajax_url,
            data:data,
            success: function(res){
                try{
                    var res_data = JSON.parse(res);
                    if(res_data.redirect){
                        return location.reload();
                    }
                }catch(e){}
                if( $(selected).closest('b').length > 0){
                    $( selected ).closest('tr').find('.pbeml-row').unwrap();
                }
                $('.pbeml .loader').hide();
                $('.pbeml .modal-body .data').html( res );
                $('#pbeml-tabs').tabs();
            }
        });
        return false;
    });
    $('.pbeml .close, .pbeml .footer-colse').click(function(e){
        $('.pbeml .popup').hide();
        $('body').removeClass('pbeml-popup-open');
    });
    $(document).keyup(function(e) {
        if (e.key === "Escape") {  
            $('.pbeml .popup').hide();
            $('body').removeClass('pbeml-popup-open');
        }
   });
    
});
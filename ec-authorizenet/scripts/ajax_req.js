jQuery(document).ready(function($) {
    jQuery('#image_submit_auth_ajax').on('click',function(event){// v0.3.1 replaced .live with .on for jQuery 1.9
        event.preventDefault();
        var custom_amount = jQuery("#ajaxform input[name=amount_ajax]").val();
        var invoice_ajax = jQuery("#ajaxform input[name=invoice_ajax]").val();//v 0.2 added for invoice number
        //alert("invoice_ajax "+invoice_ajax );
        $.ajax({
            url: ajaxurl,
            data: {
                'custom_amount': custom_amount,
                'invoice_ajax': invoice_ajax,   //v 0.2 added for invoice number
                'rand': Math.random()/Math.random(),
                'action':'wp_tp_authorize_net_ajax'
            },
            success:function(data) {
                // This outputs the result of the ajax request
                jQuery('#auth_form_div').html('');
                jQuery('#auth_form_div').hide();
                jQuery('#auth_form_div').html(data);
                //document.getElementById('auth_form').submit();//);
                $( "#auth_form_div #auth_form").submit();
               
                    
            //alert(data);
                
            //jQuery('#featured-slider').css({display:'block'});
            },
            error: function(errorThrown){
                alert('error');
                console.log(errorThrown);
            }
        });
    })
});
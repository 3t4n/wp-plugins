jQuery(document).ready(function(){

    if(jQuery(".dsabafw_enable_multi_ship_adress").is(":checked")){ 
        jQuery(".shipping_address_setting ").show();
    }else {
        jQuery(".shipping_address_setting").hide();
    }

    jQuery(".dsabafw_enable_multi_ship_adress").click(function() {
        if(jQuery(this).is(":checked")) {
            jQuery(".shipping_address_setting").show(500);
        } else {
            jQuery(".shipping_address_setting").hide(500);
        }
    });


	jQuery('#different_select_user_role').select2({

        ajax: {
                url: DSABAFWscript_admin.ajaxurl,
                dataType: 'json',
                delay: true,
                data: function (params) {
                    return {
                        q: params.term,
                        action: 'wg_roles_ajax'
                    };
                },
                processResults: function( data ) {
                var options = [];
                if ( data ) {
 
                    jQuery.each( data, function( index, text ) {
                        options.push( { id: text[0], text: text[1],'price': text[2]} );
                    });
 
                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 0
    });


    if(jQuery(".user_role_enable_disable").is(":checked")){ 
        jQuery(".user_role_setting ").show();
    }else {
        jQuery(".user_role_setting").hide();
    }

    jQuery(".user_role_enable_disable").click(function() {
        if(jQuery(this).is(":checked")) {
            jQuery(".user_role_setting").show(500);
        } else {
            jQuery(".user_role_setting").hide(500);
        }
    });

	if(jQuery(".dsabafw_enable_multi_bill_adress").is(":checked")){ 
        jQuery(".billing_address_setting ").show();
    }else {
        jQuery(".billing_address_setting").hide();
    }

    jQuery(".dsabafw_enable_multi_bill_adress").click(function() {
        if(jQuery(this).is(":checked")) {
            jQuery(".billing_address_setting").show(500);
        } else {
            jQuery(".billing_address_setting").hide(500);
        }
    });

    //billing address popup
    jQuery('body').on('click','.form_option_edit_admin',function(){
        
        jQuery('body').addClass("dsabafw_billing_popup_body_admin");
        jQuery('body').append('<div class="dsabafw_loading_admin"><img src="'+ DSABAFWscript_admin.objectname +'/assets/img/loader.gif" class="dsabafw_loader_admin"></div>');
        var loading = jQuery('.dsabafw_loading_admin');
        loading.show();

        var id = jQuery(this).data("id");
        var eid = jQuery(this).data("eid-bil");
        var current = jQuery(this);
        jQuery.ajax({
            url: DSABAFWscript_admin.ajaxurl,
            type:'POST',
            data:'action=productscommentsbilling_admin&popup_id_pro_admin='+id+'&eid-bil-admin='+eid,
            dataType: 'JSON',
            success : function(response) {
                var loading = jQuery('.dsabafw_loading_admin');
                var html = response[0].html;
                loading.remove();
                jQuery("#dsabafw_billing_popup_admin").fadeIn(300);
                jQuery("#dsabafw_billing_popup_admin").html(html);
                jQuery( '#billing_country' ).trigger( 'change' );
                jQuery( '#billing_state' ).trigger( 'change' );
            },
            error: function() {
                alert('Error occured');
            }
        });
       return false; 
    });

    jQuery('body').on('click','#dsabafw_edit_billing_form_submit',function() {
        jQuery('#dsabafw_edit_billing_form').attr('onsubmit','return false;');
        jQuery('#dsabafw_edit_billing_form input').removeClass('dsabafw_inerror');
        jQuery('#dsabafw_edit_billing_form select').removeClass('dsabafw_inerror');

        jQuery.ajax({
            url: DSABAFWscript_admin.ajaxurl,
            type:'POST',
            data: jQuery('#dsabafw_edit_billing_form').serialize() + "&action=dsabafw_validate_edit_billing_form_fields",
            dataType: 'JSON',
            success : function(response) {
                var added = response['added'];
                var field_errors = response.field_errors;
                
                if( added == 'false' ) {
                    jQuery.each(field_errors, function(i, item) {
                        jQuery("#dsabafw_edit_billing_form #"+i).addClass('dsabafw_inerror');
                    });
                } else {
                    location.reload();
                }
            },
            error: function() {
                alert('Error occured');
            }
        });
    });
    
    jQuery(document).on('click','.dsabafw_close',function(){
        jQuery("#dsabafw_billing_popup_admin").fadeOut(300);
        jQuery('body').removeClass("dsabafw_billing_popup_body_admin");
    });

    jQuery('body').on('click','.form_option_ship_edit_admin',function(){
        jQuery('body').addClass("dsabafw_shipping_popup_body_admin");
        jQuery('body').append('<div class="dsabafw_loading_ship"><img src="'+ DSABAFWscript_admin.objectname +'/assets/img/loader.gif" class="dsabafw_loader"></div>');
        var loading = jQuery('.dsabafw_loading_ship');
        loading.show();
        var id = jQuery(this).data("id");
        var eid = jQuery(this).data("eid-ship");
        var current = jQuery(this);
        jQuery.ajax({
            url: DSABAFWscript_admin.ajaxurl,
            type:'POST',
            data:'action=productscommentsshipping_admin&popup_id_pro_ship='+id+'&eid-ship-popup='+eid,
            success : function(response) {
                var loading = jQuery('.dsabafw_loading_ship');
                loading.remove(); 
                jQuery( "#dsabafw_shipping_popup_admin" ).fadeIn(300);
                jQuery( "#dsabafw_shipping_popup_admin" ).html(response);
                jQuery( '#shipping_country' ).trigger( 'change' );
                jQuery( '#shipping_state' ).trigger( 'change' );
            },
            error: function() {
                alert('Error occured');
            }
        });
       return false; 
    });

    jQuery('body').on('click','#dsabafw_edit_shipping_form_submit',function() {
        jQuery('#dsabafw_edit_shipping_form').attr('onsubmit','return false;');
        jQuery('#dsabafw_edit_shipping_form input').removeClass('dsabafw_inerror');
        jQuery('#dsabafw_edit_shipping_form select').removeClass('dsabafw_inerror');

        jQuery.ajax({
            url: DSABAFWscript_admin.ajaxurl,
            type:'POST',
            data: jQuery('#dsabafw_edit_shipping_form').serialize() + "&action=dsabafw_validate_edit_shipping_form_fields",
            dataType: 'JSON',
            success : function(response) {
                var added = response['added'];
                var field_errors = response.field_errors;
                
                if( added == 'false' ) {
                    jQuery.each(field_errors, function(i, item) {
                        jQuery("#dsabafw_edit_shipping_form #"+i).addClass('dsabafw_inerror');
                    });
                } else {
                    //location.reload();
                }
            },
            error: function() {
                alert('Error occured');
            }
        });
    });

    jQuery(document).on('click','.dsabafw_closeship',function(){
        jQuery("#dsabafw_shipping_popup_admin").fadeOut(300);
        jQuery('body').removeClass("dsabafw_shipping_popup_body_admin");
    });

    var modal = document.getElementById("dsabafw_billing_popup_admin");
    var modal2 = document.getElementById("dsabafw_shipping_popup_admin");
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        jQuery('body').removeClass("dsabafw_billing_popup_body_admin");
      }
      if (event.target == modal2) {
        modal2.style.display = "none";
        jQuery('body').removeClass("dsabafw_shipping_popup_body_admin");
      }
    }

    jQuery('#dsabafw_select_order_billing').change(function(){
        var sid = jQuery(this).val();
        var billing_address = jQuery(this).find(':selected').data('billing');

        var billing_edit_btn = jQuery(this).closest('.order_data_column').find('a.edit_address');
        billing_edit_btn.trigger( "click" ).css('display', 'none');

        if(billing_address){
            jQuery("#_billing_first_name").val(billing_address.billing_first_name);
            jQuery("#_billing_last_name").val(billing_address.billing_last_name);
            jQuery("#_billing_company").val(billing_address.billing_company);
            jQuery("#_billing_country").val(billing_address.billing_country).change();
            jQuery("#_billing_address_1").val(billing_address.billing_address_1);
            jQuery("#_billing_address_2").val(billing_address.billing_address_2);
            jQuery("#_billing_city").val(billing_address.billing_city);
            jQuery("#_billing_state").val(billing_address.billing_state).change();
            jQuery("#_billing_postcode").val(billing_address.billing_postcode);
            jQuery("#_billing_phone").val(billing_address.billing_phone);
            jQuery("#_billing_email").val(billing_address.billing_email);
        }
    });

    jQuery('#dsabafw_select_order_shipping').change(function(){
        var sid = jQuery(this).val();
        var shipping_address = jQuery(this).find(':selected').data('shipping');

        var shipping_edit_btn = jQuery(this).closest('.order_data_column').find('a.edit_address');
        shipping_edit_btn.trigger( "click" ).css('display', 'none');
        
        if(shipping_address){
            jQuery("#_shipping_first_name").val(shipping_address.shipping_first_name);
            jQuery("#_shipping_last_name").val(shipping_address.shipping_last_name);
            jQuery("#_shipping_company").val(shipping_address.shipping_company);
            jQuery("#_shipping_country").val(shipping_address.shipping_country).change();
            jQuery("#_shipping_address_1").val(shipping_address.shipping_address_1);
            jQuery("#_shipping_address_2").val(shipping_address.shipping_address_2);
            jQuery("#_shipping_city").val(shipping_address.shipping_city);
            jQuery("#_shipping_state").val(shipping_address.shipping_state).change();
            jQuery("#_shipping_postcode").val(shipping_address.shipping_postcode);       
        }

    });

});
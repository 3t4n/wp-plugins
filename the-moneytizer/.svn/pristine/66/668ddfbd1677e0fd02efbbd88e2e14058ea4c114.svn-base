function showBill(bill_id){
    if(bill_id == null){
        return;
    }
    jQuery_money('#bill_id').attr('src','');
    jQuery_money('#bill_details_panel').css('display','block');
    jQuery_money('#bill_details_panel .spinner_bill_container').css('display', 'flex');
    jQuery_money('#bill_number').text(bill_id);
    jQuery_money('html, body').animate({
        scrollTop: jQuery_money('#bill_details_panel').offset().top - 20
    }, 'slow');

    var data = {
        action: 'get_bill_details',
        _nonce: nonceSettings['get_bill_details'],
        bill_id: bill_id
    };
    
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = response.substr(0, response.length - 1);
        srcVal ="data:application/pdf;base64,"+result;
        jQuery_money('#bill_details_panel .spinner_bill_container').css('display', 'none');
        jQuery_money('#bill_id').attr('src',srcVal);     
    });
}

function billResetDetails(){
    jQuery_money('#bill_id').attr('src','');
    jQuery_money('#bill_details_panel').css('display','none');
    jQuery_money('#bill_details_panel .spinner_bill_container').css('display', 'none');
}

function changeInterChoice(){
    if(jQuery_money('#billing_choice_inter').is(':checked')){
        jQuery_money('.billing_choice_inter_child').show();
    } else {
        jQuery_money('.billing_choice_inter_child').hide();
    }
}

function changeBillingChoice(){
    if(jQuery_money('#billing_choice_1').is(':checked')){
        jQuery_money('.billing_paypal_child').hide();
        jQuery_money('.billing_bank_child').show();
    }
    
    if(jQuery_money('#billing_choice_2').is(':checked')){
        jQuery_money('.billing_paypal_child').show();
        jQuery_money('.billing_bank_child').hide();
    }
}

function saveBillingDetails(){
    var errorHandler = false;
    var bank_name = null;
    var bank_iban = null;
    var bank_bic = null;
    var bank_namebank = null;
    var bank_addressbank = null;
    var bank_countrybank = null;
    var bank_citybank = null;
    var bank_zipbank = null;
    var bank_inter_iban = null;
    var bank_inter_bic = null;
    var bank_inter_namebank = null;
    var bank_inter_addressbank = null;
    var bank_inter_countrybank = null;
    var bank_inter_citybank = null;
    var bank_inter_zipbank = null;
    var paypal_email = null;
    var bank_status_choice = null;
    var bank_status_inter = false;

    if(jQuery_money('#billing_choice_1').is(':checked')){
        bank_status_choice = 1;

        bank_name = jQuery_money('#themoneytizer_user_bank_name').val();
        if(bank_name == "" ||bank_name == null){errorHandler = true;}
        bank_iban = jQuery_money('#themoneytizer_user_bank_iban').val();
        if(bank_iban == "" ||bank_iban == null){errorHandler = true;}
        bank_bic = jQuery_money('#themoneytizer_user_bank_bic').val();
        if(bank_bic == "" ||bank_bic == null){errorHandler = true;}
        bank_namebank = jQuery_money('#themoneytizer_user_bank_namebank').val();
        if(bank_namebank == "" ||bank_namebank == null){errorHandler = true;}
        bank_addressbank = jQuery_money('#themoneytizer_user_bank_addressbank').val();
        if(bank_addressbank == "" ||bank_addressbank == null){errorHandler = true;}
        bank_countrybank = jQuery_money('#themoneytizer_user_bank_countrybank').val();
        if(bank_countrybank == "" ||bank_countrybank == null){errorHandler = true;}
        bank_citybank = jQuery_money('#themoneytizer_user_bank_citybank').val();
        if(bank_citybank == "" ||bank_citybank == null){errorHandler = true;}
        bank_zipbank = jQuery_money('#themoneytizer_user_bank_zipcode').val();
        if(bank_zipbank == "" ||bank_zipbank == null){errorHandler = true;}

        if(jQuery_money('#billing_choice_inter').is(':checked')){
            bank_status_inter = true;
            bank_inter_iban = jQuery_money('#themoneytizer_user_bank_inter_iban').val();
            if(bank_inter_iban == "" ||bank_inter_iban == null){errorHandler = true;}
            bank_inter_bic = jQuery_money('#themoneytizer_user_bank_inter_bic').val();
            if(bank_inter_bic == "" ||bank_inter_bic == null){errorHandler = true;}
            bank_inter_namebank = jQuery_money('#themoneytizer_user_bank_inter_name').val();
            if(bank_inter_namebank == "" ||bank_inter_namebank == null){errorHandler = true;}
            bank_inter_addressbank = jQuery_money('#themoneytizer_user_bank_inter_address').val();
            if(bank_inter_addressbank == "" ||bank_inter_addressbank == null){errorHandler = true;}
            bank_inter_countrybank = jQuery_money('#themoneytizer_user_bank_inter_country').val();
            if(bank_inter_countrybank == "" ||bank_inter_countrybank == null){errorHandler = true;}
            bank_inter_citybank = jQuery_money('#themoneytizer_user_bank_inter_citybank').val();
            if(bank_inter_citybank == "" ||bank_inter_citybank == null){errorHandler = true;}
            bank_inter_zipbank = jQuery_money('#themoneytizer_user_bank_inter_zipcode').val();
            if(bank_inter_zipbank == "" ||bank_inter_zipbank == null){errorHandler = true;}
        }
    }
    
    if(jQuery_money('#billing_choice_2').is(':checked')){
        bank_status_choice = 2;
        paypal_email = jQuery_money('#themoneytizer_user_paypal').val();
        if(paypal_email == "" ||paypal_email == null){errorHandler = true;}
    }

    
    if(errorHandler){
        var errorMessage = jQuery_money('#billing_empty_message').val();
        swal({
            icon: 'error',
            text: errorMessage,
            timer: 3000,
            buttons: false
        })
        return;
    }

    var data = {
        action: 'update_bank_data',
        _nonce: nonceSettings["update_bank_data"],
        bank_name : bank_name,
        bank_iban : bank_iban,
        bank_bic : bank_bic,
        bank_namebank : bank_namebank,
        bank_addressbank : bank_addressbank,
        bank_countrybank : bank_countrybank,
        bank_citybank : bank_citybank,
        bank_zipbank : bank_zipbank,
        bank_inter_iban : bank_inter_iban,
        bank_inter_bic : bank_inter_bic,
        bank_inter_namebank : bank_inter_namebank,
        bank_inter_addressbank : bank_inter_addressbank,
        bank_inter_countrybank : bank_inter_countrybank,
        bank_inter_citybank : bank_inter_citybank,
        bank_inter_zipbank : bank_inter_zipbank,
        paypal_email : paypal_email,
      };
    
      jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
          var result = JSON.parse(response.substr(0, response.length-1));
          if(result.status){
            Swal.fire({
                  icon: 'success',
                  text: result.message,
                  timer: 3000,
                  buttons: false
              })
          } else {
              Swal.fire({
                  icon: 'error',
                  text: result.message,
                  timer: 3000,
                  buttons: false
              })
          }
      });
}
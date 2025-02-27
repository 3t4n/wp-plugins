function jumpToAdsTxt(){
    jQuery_money('#collapse_menu_settings').collapse('show');
    jQuery_money('html, body').animate({
        scrollTop: jQuery_money('#adstxt_panel').offset().top - 80
    }, 'slow');
}

function contentToClipBoard(target){
    jQuery_money(target).select();
    document.execCommand("copy");
}

function applyConf(){
  var data = {
    action: 'apply_conf',
    _nonce: nonceSettings['apply_conf']
  };
  jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
    var result = JSON.parse(response.substr(0, response.length-1));
    if(result.status){
      Swal.fire({
        icon: 'success',
        title: result.message,
        timer: 2000,
      });
      setTimeout(function(){ document.location.reload(); }, 1500);
    }
  });
}

jQuery_money('#token_form').validate({
  rules:
    {
      themoneytizer_setting_token: {
        required: true
      }
    },
  messages: {
    themoneytizer_setting_token: {
      required: "The Moneytizer ID is required."
    }
  }
});

function saveProfile(){
  var data = {
    action: 'update_profile',
    _nonce: nonceSettings['update_profile'],
    tel: jQuery('#themoneytizer_user_tel').val(),
    adresse: jQuery('#themoneytizer_user_address').val(),
    ville: jQuery('#themoneytizer_user_city').val(),
    cp: jQuery('#themoneytizer_user_zip_code').val(),
    pays: jQuery('#themoneytizer_user_country').val(),
    structure: jQuery('input[name="themoneytizer_user_type_structure"]:checked').val(),
    entreprise: jQuery('#themoneytizer_user_entreprise').val(),
    siren: jQuery('#themoneytizer_user_user_siren').val(),
    tva: jQuery('#themoneytizer_user_tva').val(),
    denomination: jQuery('#themoneytizer_user_denomination_social').val()
  };
  jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
    var result = JSON.parse(response.substr(0, response.length-1));
    if(result.status == 'success'){
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

function switchStructureType(){
  var struct = jQuery_money("[name='themoneytizer_user_type_structure']:checked").val();
  if(struct == 4){
    //Entreprise
    jQuery_money('#entreprise_money_user_up').show();
    jQuery_money('#siren_money_up').show();
    jQuery_money('#tva_money_up').show();
    jQuery_money('#themoneytizer_denomination_social').hide();
  } else if(struct == 3){
    //Association
    jQuery_money('#entreprise_money_user_up').hide();
    jQuery_money('#siren_money_up').show();
    jQuery_money('#tva_money_up').show();
    jQuery_money('#themoneytizer_denomination_social').show();
  } else if(struct == 2){
    //Auto-entrepreneur
    jQuery_money('#entreprise_money_user_up').show();
    jQuery_money('#siren_money_up').show();
    jQuery_money('#tva_money_up').hide();
    jQuery_money('#themoneytizer_denomination_social').hide();
  } else if(struct == 1){
    //Une personne
    jQuery_money('#entreprise_money_user_up').hide();
    jQuery_money('#siren_money_up').hide();
    jQuery_money('#tva_money_up').hide();
    jQuery_money('#themoneytizer_denomination_social').hide();
  }
}

function saveLanguage() {
  let lang = jQuery_money('#language_dropdown').val();
  var data = {
    action: 'update_language',
    _nonce: nonceSettings["update_language"],
    language: lang
  };
  jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
    var result = JSON.parse(response.substr(0, response.length-1));
    if(result.status){
      Swal.fire({
        icon: 'success',
        timer: 2000,
      });
      setTimeout(function(){ document.location.reload(); }, 1500);
    }
  });
}
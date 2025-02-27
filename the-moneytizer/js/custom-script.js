//trad should contain {themoney_lang: lang}
if(typeof trad == undefined){
  var trad = false;
}
if(trad){
  var lang = trad.themoney_lang;
} else {
  var lang = 'en';
}
var data = {
  action: 'retrieve_cmp',
};
var jQuery_money = jQuery.noConflict();
var loginDisplayed = false;

// REGISTRATION START

jQuery_money('#themoneytizer_user_reason_added').change(function () {
  if(jQuery_money(this).val() == 7){
    jQuery_money("#bloc_themoneytizer_user_reason_added").slideDown("slow");
  } else{
    jQuery_money("#bloc_themoneytizer_user_reason_added").slideUp("slow");
    jQuery_money('#themoneytizer_user_reason_added_other').val('');
  }
});

jQuery_money('#reg_form').validate({

  rules: {
      themoneytizer_user_type_structure: {
        required: true
      },
      themoneytizer_user_tel: {
        required: true,
        number: true,
        minlength: 10
      },
      themoneytizer_user_mail: {
        required: true,
        email: true
      },
      themoneytizer_user_name:  {
        required: true,
      },
      themoneytizer_user_firstname:  {
        required: true,
      },
      themoneytizer_user_password:  {
        required: true,
        minlength: 8
      },
      c_themoneytizer_user_password:  {
        required: true,
        equalTo: "#themoneytizer_user_password"
      },
      themoneytizer_user_address:  {
        required: true,
      },
      themoneytizer_user_city:  {
        required: true,
      },
      themoneytizer_user_zip_code:  {
        required: true,
      },
      themoneytizer_user_country:  {
        required: true,
      },
      themoneytizer_user_reason_added: {
        required: true,
      },
    },
  messages: {
    themoneytizer_user_type_structure: "Please select a structure",
    themoneytizer_user_country: "Please select a country.",
    themoneytizer_user_zip_code: "Please enter a zip code.",
    themoneytizer_user_city: "Please enter a city.",
    themoneytizer_user_address: "Please enter a valid adress.",
    themoneytizer_user_tel: "Please enter a valid phone number.",
    themoneytizer_user_name: "The lastname is required.",
    themoneytizer_user_firstname: "The firstname is required.",
    themoneytizer_user_mail: "Please enter a valid email address.",
    themoneytizer_user_password: {
      required: "The Password is required.",
      minlength: "The password should contain at least 8 characters."
    },
    c_themoneytizer_user_password: {
      required: "The Password confirmation is required.",
      equalTo: "The Password confirmation must be equal to the password."
    }
  }
});

jQuery_money('#reg_form_sec').validate({
  rules:
    {
      theme_money: {
        required: true
      },
      sub_theme_money: {
        required: true
      },
      lang_money: {
        required: true
      },
      vu_money : {
        required: true
      }
    },
  messages: {
    theme_money: "Please choose a category.",
    sub_theme_money: "Please choose a subcategory.",
    lang_money: "Please choose a country.",
    vu_money : "Please choose your amount"
  }
});

//Verify we are in the plugins to avoid any error access in console
if (window.location.href.indexOf("options-general.php") > -1) {
    setTimeout(() => {
      var data = {
        action: 'get_cmp',
        _nonce: nonceSettings['get_cmp'],
        lang: ''
      };
    
      jQuery.post(the_ajax_script.ajaxurl, data, function (response) {
        var new_response = response.substr(0, response.length -1);
    
        jQuery_money('#themoneytizer_tag_cmp').html(new_response);
        if (new_response !== '' && new_response !== '<title>CMP The Moneytizer</title>') {
          jQuery_money('#themoneytizer_tag_cmp textarea').css('height', '300px');
        }
      });
    }, 8000);
  
}

jQuery_money('#update_form').validate({
  rules: {
    themoneytizer_user_name: {
      required: true
    },
    themoneytizer_user_firstname: {
      required: true
    },
    themoneytizer_user_mail: {
      required: true
    },
    themoneytizer_user_tel: {
      required: true,
      number: true,
      minlength: 10
    },
    themoneytizer_user_city: {
      required: true
    },
    themoneytizer_user_zip_code: {
      required: true
    }
  }
});

jQuery_money('#update_form').submit(function (e) {
  e.preventDefault();

  if(jQuery(this).valid()) {
    var data = {
      action: 'update',

      nom: jQuery('#themoneytizer_user_name').val(),

      prenom: jQuery('#themoneytizer_user_firstname').val(),

      mail: jQuery('#themoneytizer_user_mail').val(),

      tel: jQuery('#themoneytizer_user_tel').val(),

      adresse: jQuery('#themoneytizer_user_address').val(),

      ville: jQuery('#themoneytizer_user_city').val(),

      cp: jQuery('#themoneytizer_user_zip_code').val(),

      pays: jQuery('#themoneytizer_user_country').val(),

      structure: jQuery('input[name="themoneytizer_user_type_structure"]:checked').val(),

      entreprise: jQuery('#themoneytizer_user_entreprise').val(),

      siren: jQuery('#themoneytizer_user_user_siren').val(),

      tva: jQuery('#themoneytizer_user_tva').val(),
    };

    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));

      if (result['error'] === true) {
        if (result['type'] === 'server') {
          switch (lang) {
            case 'fr':
              var message = 'Erreur, veuillez essayer ultérieurement';
              break;
            case 'es':
              var message = 'Error. Inténtalo más tarde';
              break;
            case 'it':
              var message = 'Errore, prego riprova';
              break;
            case 'pt':
              var message = 'Erro, por favor tente novamente mais tarde';
              break;
            case 'de':
              var message = 'Fehler. Bitte versuchen Sie es später noch einmal';
              break;
            case 'ru':
              var message = 'Ошибка, попробуйте позже';
              break;
            case 'us':
            case 'en':
            default:
              var message = 'Error, please try later';
          }
          swal({
            icon: 'error',
            title: message,
            timer: 2000,
          });
        }
        else if (result['type'] === 'bad_info') {
          switch (lang) {
            case 'fr':
              var message = 'Vous n\'êtes pas autorisés à modifier ces informations';
              break;
            case 'es':
              var message = 'No estás autorizado a cambiar esta información';
              break;
            case 'it':
              var message = 'Non ti è permesso modificare queste informazioni';
              break;
            case 'pt':
              var message = 'Você não tem permissão para modificar essas informações por conta própria';
              break;
            case 'de':
              var message = 'Sie sind nicht berechtigt, diese Informationen selbst zu ändern. Kontaktieren Sie dazu bitte Ihren Account Manager oder schreiben Sie eine Mail an germany@themoneytizer.com.';
              break;
            case 'ru':
              var message = 'You are not allowed to modify these information';
              break;
            case 'us':
            case 'en':
            default:
              var message = 'You are not allowed to modify these information';
          }
          swal({
            icon: 'error',
            title: message,
            timer: 2000,
          });
        }
      }
      else {
        switch (lang) {
          case 'fr':
            var message = 'Modifications effectuées avec succès !';
            break;
          case 'es':
            var message = 'Modifications effectuées avec succès !';
            break;
          case 'it':
            var message = 'Modifications effectuées avec succès !';
            break;
          case 'pt':
            var message = 'Modifications effectuées avec succès !';
            break;
          case 'de':
            var message = 'Änderungen erfolgreich abgeschlossen!';
            break;
          case 'ru':
            var message = 'Изменения прошли успешно!';
            break;
          case 'us':
          case 'en':
          default:
            var message = 'Your changes were registered !';
        }
        swal({
          icon: 'success',
          title: message,
          timer: 2000,
        });
      }
    });
  }
});

jQuery_money('#bankChoice2').on('click',function () {
  jQuery_money(".paypal_line").removeClass("not-show");
  jQuery_money(".bank-line").addClass("not-show");

  jQuery_money("input[name='themoneytizer_user_bank_name']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_namebank']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_adressbank']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_zipbank']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_citybank']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_iban']").val('');
  jQuery_money("input[name='themoneytizer_user_bank_bic']").val('');
  jQuery_money("select[name='themoneytizer_user_bank_countrybank']").val('');
});

jQuery_money('#bankChoice1').on('click',function () {
  jQuery_money(".paypal_line").addClass("not-show");
  jQuery_money(".bank-line").removeClass("not-show");

  jQuery_money("input[name='themoneytizer_user_paypal']").val('');
});

jQuery_money('#update_bank_data').validate({
  rules: {
    themoneytizer_user_bank_name: {
      required: true
    },
    themoneytizer_user_bank_namebank: {
      required: true
    },
    themoneytizer_user_bank_adressbank: {
      required: true
    },
    themoneytizer_user_bank_citybank: {
      required: true
    },
    themoneytizer_user_bank_zipbank: {
      required: true
    },
    themoneytizer_user_bank_countrybank: {
      required: true
    },
    themoneytizer_user_bank_iban: {
      required: true
    },
    themoneytizer_user_bank_bic: {
      required: true
    },
    themoneytizer_user_paypal: {
      required: true,
      email: true
    }
  }
});

jQuery_money('#update_bank_data').submit(function (e) {
  e.preventDefault();
  
  var dayOfTheDay = new Date();
  var today = dayOfTheDay.getDate();
  
  if (today >= 5 && today <= 10) {
    switch (lang) {
      case 'fr':
        var message = 'La modification de vos champs personnels de paiement est impossible du 5 au 10 inclus, chaque mois';
        break;
      case 'es':
        var message = 'No es posible modificar el método de pago o coordenadas bancarias entre el 5 y el 10 de cada mes';
        break;
      case 'it':
        var message = 'La modifica dei tuoi dati personali di pagamento non è possibile dal 5 al 10 incluso di ogni mese';
        break;
      case 'pt':
        var message = 'Não é possível alterar os seus dados de pagamento entre o dia 5 e o dia 10';
        break;
      case 'de':
        var message = 'Es ist nicht möglich, deine Zahlungsinformationen im Zeitraum vom 5. bis einschließlich 10. eines jeden Monat zu ändern';
        break;
      case 'ru':
        var message = 'Изменение ваших банковских данных невозможно с 5 до 10 числа включительно каждого месяца';
        break;
      case 'us':
      case 'en':
      default:
        var message = 'It is not possible to change your personal payment fields from the 5th to the 10th of each month';
    }
    swal({
      icon: 'error',
      title: message,
    });
  }
  else {
    if(jQuery(this).valid()) {
      var data = {
        action: 'update_bank_data',
      
        bank_name: jQuery('#themoneytizer_user_bank_name').val().trim(),
      
        bank_iban: jQuery('#themoneytizer_user_bank_iban').val().trim(),
      
        bank_bic: jQuery('#themoneytizer_user_bank_bic').val().trim(),
      
        bank_name_bank: jQuery('#themoneytizer_user_bank_namebank').val().trim(),
      
        bank_adress_bank: jQuery('#themoneytizer_user_bank_adressbank').val().trim(),
      
        bank_country_bank: jQuery('#themoneytizer_user_bank_countrybank').val().trim(),
      
        bank_city_bank: jQuery('#themoneytizer_user_bank_citybank').val().trim(),
      
        bank_zip_bank: jQuery('#themoneytizer_user_bank_zipbank').val().trim(),
      
        themoneytizer_user_paypal: jQuery('#themoneytizer_user_paypal').val().trim()
      };
    
      jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = JSON.parse(response.substr(0, response.length-1));
        if(result.status=='error'){
          Swal.fire({
            icon: 'error',
            title: result.message,
            timer: 2000,
          });
        } else {
          Swal.fire({
            icon: 'success',
            title: result.message,
            timer: 2000,
          });
        }
      });
    }
  }
});

// PROFILE & BANK EDITING END


// STATISTICS START

jQuery_money('#periode').bind('change', function (e) {
  if( jQuery_money('#periode').val() == 'custom_date') {
    jQuery_money('#custom_date').show();
    jQuery_money('#custom_date').css({ display: "inline-block" });
  }else{
    jQuery_money('#custom_date').hide();
  }
}).trigger('change');

jQuery_money(function() {
  jQuery_money( "#custom_date_from" ).datepicker();
});

jQuery_money(function() {
  jQuery_money( "#custom_date_to" ).datepicker();
});

jQuery_money('#periode').change(function() {
  jQuery_money("#custom_date_from").val('');
  jQuery_money("#custom_date_to").val('');
});

// STATISTICS END
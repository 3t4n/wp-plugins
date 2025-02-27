function ads_txt_setting(){
  jQuery_money('.ads-no-auto').toggle();
  if(jQuery_money('#auto_option_ads_txt').is(':checked')){
    var data = {
      action: 'auto_ads_txt',
      value: 'auto',
      _nonce: nonceSettings['auto_ads_txt']
    };
    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
      if(result.status=='success'){
        var message = result.message;
        Swal.fire({
          icon: 'success',
          html: message,
          timer: 2000,
        });
      }
    });
  } else {
    var data = {
      action: 'auto_ads_txt',
      value: 'manuel',
      _nonce: nonceSettings['auto_ads_txt']
    };
    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
      var message = result.message;
      Swal.fire({
        icon: 'success',
        html: message,
        timer: 2000,
      });
    });
  }
}


function checkAdsTxt(siteId) {
  var data = {
    action: 'check_ads_txt',
    _nonce: nonceSettings['check_ads_txt'],
    siteId: siteId
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
        Swal.fire({
          icon: 'error',
          html: message,
          timer: 2000,
        });
      }

      Swal.fire({
        icon: 'error',
        html: message,
      });
    } else {
      if (result['type'] === 'ok') {
        switch (lang) {
          case 'fr':
            var message = 'Votre fichier est bien intégré et à jour !';
            break;
          case 'es':
            var message = '¡Tu archivo ha sido bien integrado y actualizado!';
            break;
          case 'it':
            var message = 'Il file ads.txt è inserito e aggiornato!';
            break;
          case 'pt':
            var message = 'O vosso arquivo é bem integrado e actualizado !';
            break;
          case 'de':
            var message = 'Ihre ads.txt ist korrekt hinterlegt und auf dem neuesten Stand';
            break;
          case 'ru':
            var message = 'Файл ads.txt установлен и обновлен';
            break;
          case 'us':
          case 'en':
          default:
            var message = 'Your file is well integrated and up to date!';
        }
        Swal.fire({
          icon: 'success',
          html: message,
          timer: 2000,
        });
        setTimeout(function(){
          if(window.pluginHiddenTags){
            location.reload();
          }
        }, 1500);
        
      }
      else if (result['type'] === 'update') {
        switch (lang) {
          case 'fr':
            var message = 'Votre fichier est bien intégré mais n\'est pas à jour !';
            break;
          case 'es':
            var message = '¡Tu archivo ha sido integrado correctamente pero no está actualizado!';
            break;
          case 'it':
            var message = 'Il file è stato integrato correttamente ma non è aggiornato!';
            break;
          case 'pt':
            var message = 'O vosso ficheiro está bem integrado mas não atualizado !';
            break;
          case 'de':
            var message = 'Ihre ads.txt ist korrekt hinterlegt, aber nicht auf dem neuesten Stand';
            break;
          case 'ru':
            var message = 'Файл ads.txt добавлен, но не обновлен!';
            break;
          case 'us':
          case 'en':
          default:
            var message = 'Your file is well integrated but is not up to date!';
        }
        Swal.fire({
          icon: 'info',
          html: message,
          timer: 2000,
        });
      }
      else if (result['type'] === 'no') {
        switch (lang) {
          case 'fr':
            var message = 'Votre fichier n\'est pas intégré !';
            break;
          case 'es':
            var message = '¡Tu archivo no ha sido integrado!';
            break;
          case 'it':
            var message = 'Il file non è stato integrato !';
            break;
          case 'pt':
            var message = 'O seu arquivo não está integrado !';
            break;
          case 'de':
            var message = 'Ihre Ads.txt ist nicht integriert!';
            break;
          case 'ru':
            var message = 'Файл ads.txt отсутствует!';
            break;
          case 'us':
          case 'en':
          default:
            var message = 'Your file is not integrated!';
        }
        Swal.fire({
          icon: 'error',
          title: message,
          timer: 2000,
        });
      }
    }
  });
}

function ads_txt_download(){
  var data = {
    action: 'get_ads_txt',
    _nonce: nonceSettings['get_ads_txt']
  };

  jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
    var result = JSON.parse(response.substr(0, response.length-1));
    if(result.status == 'success'){
      //var result = response.substr(0, response.length - 1);
      var a = document.createElement('a');
      var data_type = 'data:text/text;charset=utf-8';
      a.href = data_type + ','+encodeURI(result.content);
      a.download = 'ads.txt';
      a.click();
    } else {
      Swal.fire({
        icon: 'error',
        html: result.message,
      });
    }
  });
};

function ads_txt_env_notifier(){
  var data = {
    action: 'ads_txt_env_notifier',
    _nonce: nonceSettings['ads_txt_env_notifier']
  };

  jQuery.post(the_ajax_script.ajaxurl, data, function (response) {
    var result = JSON.parse(response.substr(0, response.length - 1));
    if(!result.status){
      jQuery_money(".ads_txt_env_notifier").css('display', 'block');
      jQuery_money(".ads_txt_env_notifier .message-content").html(result.message);
    }
  });
}

//Execute code on page fully loaded
jQuery_money(document).ready(function() {
  ads_txt_env_notifier();
});
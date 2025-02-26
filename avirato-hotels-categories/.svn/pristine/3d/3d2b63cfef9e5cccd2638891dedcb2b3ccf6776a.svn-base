
jQuery(document).ready(function ($) {
  var data = {
    'action': 'ahc_AjaxConnCat',
    'whatever': ajax_object.we_value
  };
  function init() {

    var button = document.getElementById('ahc_externo');
    if (button.addEventListener) {

      button.addEventListener("click", function (event) {
        event.preventDefault();

        var codeCatcon = document.getElementById('codeCatcon').value;

        data = Object.assign({}, data, {codeCatcon});

        jQuery.post(ajax_object.ajax_url, data, function (response) {

          alert('Se generó el siguiente código: ' + response);

          window.location = window.location.href.split("&")[0];

        });
      }, false);
    } else if (button.attachEvent) {

      button.attachEvent("onclick", function (event) {
        event.preventDefault();
        jQuery.post(ajax_object.ajax_url, data, function (response) {
          alert('Se generó el siguiente código: ' + response);
        });

      });
    }
  }
  ;
  if (window.addEventListener) {
    window.addEventListener("load", init, false);
  } else if (window.attachEvent) {
    window.attachEvent("onload", init);
  } else {
    document.addEventListener("load", init, false);
  }
});

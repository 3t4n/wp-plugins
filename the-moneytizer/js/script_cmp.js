function checkCmp(siteId) {
    var data = {
      action: 'check_cmp',
      _nonce: nonceSettings['checl_cmp'],
      siteId: siteId
    };
    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
      console.log(result);
      if(result.status == true){
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

function cmp_setting(){
  jQuery_money('#themoneytizer_tag_cmp').toggle();
  jQuery_money('#container_themoney_copy_cmp').toggle();
  if(jQuery_money('input[name=cmp-auto-checkbox]').is(':checked')){
    var data = {
      action: 'auto_cmp',
      _nonce: nonceSettings['auto_cmp'],
      value: 'auto'
    };
    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
      if(result.status){
        Swal.fire({
          icon: 'success',
          title: result.message,
          timer: 2000,
        });
      }
    });
  } else {
    var data = {
      action: 'auto_cmp',
      _nonce: nonceSettings['auto_cmp'],
      value: 'manuel'
    };
    jQuery.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
      Swal.fire({
        icon: 'success',
        title: result.message,
        timer: 2000,
      });
    });
  }
};
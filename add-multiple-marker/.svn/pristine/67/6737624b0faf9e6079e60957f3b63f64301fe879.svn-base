// jQuery( window ).on( 'load resize', function() {
//   mapStructure();
// });
// AIzaSyDHlzcHiFP9Hktn7-vFQGs6eOkbfYMhI5o
jQuery( document ).ready( function( $ ) {
  let mapApiKeyValue = jQuery('input[name="amm_api_key"]').val();
  if ( mapApiKeyValue == '' ){
    var mapAPIKeyInput = '<div id="amm-modal-map-api"><h3>Enter Your Google Map Api Key</h3><div class="amm-modal-map-api-form"><div class="amm-api-section amm-panel"><fieldset><input class="amm-input" type="text" name="amm_modal_api_key" value="" placeholder="Please enter your map API key here"><span class="error error-span"></span></fieldset></div><div class="amm-call-to-btn"><button value="Save" class="submit amm-modal-save-btn">save</button></div></div></div>';
    $.blockUI({ message: mapAPIKeyInput }); 
  }
  // imgSvg();
  // ammSearch();
});

jQuery(document).on('click','#amm-modal-map-api button', function(){
  var _this = jQuery(this).parents('#amm-modal-map-api');
  var APIKeyValue = _this.find('input').val();
  var saveApiKeydata = {
    action: 'amm_save_map_api',
    apiKeyValue: APIKeyValue
  }

  jQuery.post(amm_plugin_custom_obj.ajax_url, saveApiKeydata, 
    function( response ){
      var ajax_result = jQuery.parseJSON( response );
      if (ajax_result.result == '1'){
        window.location = window.location.href;       
      }else{
        _this.find('span').text(ajax_result.message);
      }
  })
})


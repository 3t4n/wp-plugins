/*
 * Author: Michael Finkenberger
 * @since V1.0.0.0
 * Last change in plugin version: V1.2.0.0
 * Date: 28.04.2021
 * Tested with the latest plugin version
*/



function send_foodle_email(v_id, confirm_message) {
  var $ = jQuery;
    
  if ( confirm(confirm_message) ) {

    var foodle_email_response = document.getElementById('mf_foodle_email_response_' + v_id);
    var foodle_email_content = document.getElementById('mf_foodle_email_content_' + v_id);
    var foodle_email_overlay = document.getElementById('mf_foodle_email_overlay_' + v_id);
  
    foodle_email_overlay.style.width = foodle_email_content.offsetWidth + "px";
    foodle_email_overlay.style.height = foodle_email_content.offsetHeight + "px";
    
    foodle_email_content.style.opacity = "0.2";
    foodle_email_response.id = "mf_foodle_email_load";

    $.ajax({
      type: 'POST',
      url: mf_bob.ajaxurl,
      data: {
        action    : 'foodle_php_send_email',
        title     : mf_bob.title,
        foodle_id : v_id
      },
      success: function (data, textStatus, XMLHttpRequest) {
        foodle_email_response.id = "mf_foodle_email_response_" + v_id;
        foodle_email_content.innerHTML = data;
        foodle_email_overlay.style.width = "0px";
        foodle_email_overlay.style.height = "0px";
        foodle_email_content.style.opacity = "1";
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
      }
    });
    
  }
  
}


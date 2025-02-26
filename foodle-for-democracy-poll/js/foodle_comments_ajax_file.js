/*
 * Author: Michael Finkenberger
 * @since V2.5.1.0
 * Last change in plugin version: V2.5.1.0 (A comments table preview is being displayed interactively as a tooltip when hovering with the mouse over the related green icon, which indicates that comments are available for a poll)
 * Date: 15.01.2024
 * Tested with the latest plugin version
*/



function foodle_get_the_democracy_comments(v_id) {
  var $ = jQuery;
    
  var foodle_comments_response = document.getElementById('mf_foodle_comments_response_' + v_id);
  var foodle_comments_content = document.getElementById('mf_foodle_comments_content_' + v_id);
  var foodle_comments_overlay = document.getElementById('mf_foodle_comments_overlay_' + v_id);

  foodle_comments_overlay.style.width = foodle_comments_content.offsetWidth + "px";
  foodle_comments_overlay.style.height = foodle_comments_content.offsetHeight + "px";
  $('#mf_foodle_comments_content_' + v_id).prepend(foodle_comments_ajax_var.message);

  foodle_comments_content.style.opacity = "0.7";
  foodle_comments_response.id = "mf_foodle_comments_load";

  $.ajax({
    type: 'POST',
    url: foodle_comments_ajax_var.ajaxurl,
    data: {
      action          : 'foodle_copy_comments_to_tooltip',
      foodle_id       : v_id,
      comments_active : 'false',
      show_comments   : 'true',
      show_date       : 'true',
      show_time       : 'true',
      edit_comments   : 'false',
      delete_comments : 'false',
    },
    success: function (data, textStatus, XMLHttpRequest) {
      foodle_comments_response.id = "mf_foodle_comments_response_" + v_id;
      foodle_comments_content.innerHTML = data;
      foodle_comments_overlay.style.width = "0px";
      foodle_comments_overlay.style.height = "0px";
      foodle_comments_content.style.opacity = "1";
      foodle_comments_content.style.fontSize = "1.3em";
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
    }
  });
  
}


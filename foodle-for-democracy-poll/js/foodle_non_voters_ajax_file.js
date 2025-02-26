/*
 * Author: Michael Finkenberger
 * @since V2.5.5.0
 * Last change in plugin version: V2.5.5.0 (A table with a list of users that did not vote so far for a poll is being displayed interactively as a tooltip when hovering with the mouse over the related bar graph)
 * Date: 23.01.2024
 * Tested with the latest plugin version
*/



function foodle_get_the_non_voters(v_id) {
  var $ = jQuery;
    
  var foodle_non_voters_response = document.getElementById('mf_foodle_non_voters_response_' + v_id);
  var foodle_non_voters_content = document.getElementById('mf_foodle_non_voters_content_' + v_id);
  var foodle_non_voters_overlay = document.getElementById('mf_foodle_non_voters_overlay_' + v_id);

  foodle_non_voters_overlay.style.width = foodle_non_voters_content.offsetWidth + "px";
  foodle_non_voters_overlay.style.height = foodle_non_voters_content.offsetHeight + "px";
  $('#mf_foodle_non_voters_content_' + v_id).prepend(foodle_non_voters_ajax_var.message);

  foodle_non_voters_content.style.opacity = "0.7";
  foodle_non_voters_response.id = "mf_foodle_non_voters_load";

  $.ajax({
    type: 'POST',
    url: foodle_non_voters_ajax_var.ajaxurl,
    data: {
      action          : 'foodle_copy_non_voters_to_tooltip',
      foodle_id       : v_id,
    },
    success: function (data, textStatus, XMLHttpRequest) {
      foodle_non_voters_response.id = "mf_foodle_non_voters_response_" + v_id;
      foodle_non_voters_content.innerHTML = data;
      foodle_non_voters_overlay.style.width = "0px";
      foodle_non_voters_overlay.style.height = "0px";
      foodle_non_voters_content.style.opacity = "1";
      foodle_non_voters_content.style.fontSize = "1.3em";
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
    }
  });
  
}


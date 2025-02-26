/*
 * Author: Michael Finkenberger
 * @since V2.5.21.0
 * Last change in plugin version: V2.5.21.0 (Auto-generate a sortlist based on the first meta field an the regular expression)
 * Date: 06.11.2024
 * Tested with the latest plugin version
*/



function foodle_auto_generate_sortlist_js(metafield) {
  var $ = jQuery;

  var metafield_clean = metafield.replace('.','-');

  var foodle_auto_sortlist_response = document.getElementById('mf_foodle_auto_sortlist_response_' + metafield_clean);
  var foodle_auto_sortlist_content = document.getElementById('foodle_sortlist_' + metafield_clean);
  var foodle_auto_sortlist_overlay = document.getElementById('mf_foodle_auto_sortlist_overlay_' + metafield_clean);

  foodle_auto_sortlist_overlay.style.width = foodle_auto_sortlist_content.offsetWidth + "px";
  foodle_auto_sortlist_overlay.style.height = foodle_auto_sortlist_content.offsetHeight + "px";
  foodle_auto_sortlist_content.style.color = 'SteelBlue';

  foodle_auto_sortlist_content.style.opacity = "0.2";
  foodle_auto_sortlist_response.id = "mf_foodle_auto_sortlist_load";

  $.ajax({
    type: 'POST',
    url: foodle_auto_sortlist_ajax_var.ajaxurl,
    data: {
      action : 'foodle_auto_generate_sortlist',
      foodle_metafield : metafield,
    },
    success: function (data, textStatus, XMLHttpRequest) {
      foodle_auto_sortlist_response.id = "mf_foodle_auto_sortlist_response_" + metafield_clean;
      $content_object = $('#foodle_sortlist_' + metafield_clean);

      $content_object.html(data);
      $content_object.attr('rows',(data.match(/&#13;&#10;/g) || []).length + 2);
      $content_object.trigger('input'); // mark as changed
      $('#auto_sortlist_label_' + metafield_clean).html(foodle_auto_sortlist_ajax_var.auto_message + '&nbsp;');
      foodle_auto_sortlist_overlay.style.width = "0px";
      foodle_auto_sortlist_overlay.style.height = "0px";
      foodle_auto_sortlist_content.style.opacity = "1";
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
    }
  });

}


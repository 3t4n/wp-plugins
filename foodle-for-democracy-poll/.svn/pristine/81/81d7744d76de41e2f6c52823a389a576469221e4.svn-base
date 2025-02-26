/*
 * Author: Michael Finkenberger
 * @since V1.0.0.0
 * Last change in plugin version: V2.5.12.1 (added parameter 'comments')
 * Date: 14.04.2024
 * Tested with the latest plugin version
*/



function mf_sw_foodle_sort_js(jsid,jsshowdate,jsshowcategory,jscategories,jsmlss,jsanswerlist,jscategorysort,jsblocksort,jssolo,jsmaxcount,jscomments) {
  var $ = jQuery;

  //  if ( confirm("Last Break-Out") ) {
      
  if ( jsmlss == 123456789 ) { // Just re-do the admin area
    
    var foodle_email_response = document.getElementById('mf_foodle_email_response_' + jsid);
    var foodle_email_content = document.getElementById('mf_foodle_email_content_' + jsid);
    var foodle_email_overlay = document.getElementById('mf_foodle_email_overlay_' + jsid);
    
    foodle_email_overlay.style.width = foodle_email_content.offsetWidth + "px";
    foodle_email_overlay.style.height = foodle_email_content.offsetHeight + "px";
    
    foodle_email_content.style.opacity = "0.2";
    foodle_email_response.id = "mf_foodle_email_load";
    
    $.ajax({
      type: 'POST',
      url: foodle_update_ajax_var.ajaxurl,
      data: {
        action       : 'foodle_ajax_update_php',
        title        : foodle_update_ajax_var.title,
        id           : jsid,
        showdate     : jsshowdate,
        showcategory : jsshowcategory,
        categories   : jscategories,
        mlss         : jsmlss,
        answerlist   : jsanswerlist,
        categorysort : jscategorysort,
        blocksort    : jsblocksort,
        solo         : jssolo,
        maxcount     : jsmaxcount,
        comments     : jscomments
      },
      success: function (data, textStatus, XMLHttpRequest) {
        foodle_email_response.id = "mf_foodle_email_response_" + jsid;
        foodle_email_content.innerHTML = data;
        foodle_email_overlay.style.width = "0px";
        foodle_email_overlay.style.height = "0px";
        foodle_email_content.style.opacity = "1";
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
      }
    });
    
  } else {  // The real "change sorting" stuff
    
    var sw_foodle_sort_response = document.getElementById('mf_sw_foodle_sort_response_' + jsid);
    var sw_foodle_sort_content = document.getElementById('mf_sw_foodle_sort_content_' + jsid);
    var sw_foodle_sort_overlay = document.getElementById('mf_sw_foodle_sort_overlay_' + jsid);
    
    sw_foodle_sort_overlay.style.width = sw_foodle_sort_content.offsetWidth+"px";
    sw_foodle_sort_overlay.style.height = sw_foodle_sort_content.offsetHeight+"px";
    
    sw_foodle_sort_content.style.opacity = "0.2";
    sw_foodle_sort_response.id = "mf_sw_foodle_sort_load";
    
    jQuery.ajax({
      type: 'POST',
      url: foodle_update_ajax_var.ajaxurl,
      data: {
        action       : 'foodle_ajax_update_php',
        title        : foodle_update_ajax_var.title,
        id           : jsid,
        showdate     : jsshowdate,
        showcategory : jsshowcategory,
        categories   : jscategories,
        mlss         : jsmlss,
        answerlist   : jsanswerlist,
        categorysort : jscategorysort,
        blocksort    : jsblocksort,
        solo         : jssolo,
        maxcount     : jsmaxcount,
        comments     : jscomments
      },
      success: function (data, textStatus, XMLHttpRequest) {
        sw_foodle_sort_response.id = "mf_sw_foodle_sort_response_" + jsid;
        sw_foodle_sort_content.innerHTML = data;
        sw_foodle_sort_overlay.style.width = "0px";
        sw_foodle_sort_overlay.style.height = "0px";
        sw_foodle_sort_content.style.opacity = "1";
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert('Hmmm...: Error (jQuery.ajax): ' + textStatus + ' - ' + errorThrown);
      }
    });
    
  }
  
// }

}


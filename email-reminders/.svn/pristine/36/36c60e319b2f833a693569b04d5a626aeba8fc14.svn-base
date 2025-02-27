"use strict";

/**
 * @version 1.0
 * @package Support Functions
 * @subpackage BackEnd Main Script Lib
 * @category Scripts 
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2015-04-09
  */

/** Scroll to  specific HTML element
 * 
 * @param {type} object_name
 * @returns {undefined}
 */
function oper_scroll_to(object_name) {
  if (jQuery(object_name).length > 0) {
    var targetOffset = jQuery(object_name).offset().top; // targetOffset = targetOffset - 50;

    if (targetOffset < 0) targetOffset = 0;
    if (jQuery('#wpadminbar').length > 0) targetOffset = targetOffset - 50;else targetOffset = targetOffset - 20;
    jQuery('html,body').animate({
      scrollTop: targetOffset
    }, 500);
  }
}

function oper_animate_border(element, time, colors, x) {
  if (x >= colors.length) {
    x = 0;
  } else {
    x++;
    var color;

    if (colors[x] === '') {
      color = '';
    } else {
      color = '#' + colors[x];
    }

    element.css('border-color', color);
    setTimeout(function () {
      oper_animate_border(element, time, colors, x);
    }, time);
  }
}

function oper_field_highlight(object_name) {
  if (jQuery(object_name).length > 0) {
    oper_scroll_to(object_name);
    oper_animate_border(jQuery(object_name) // Element 
    , 200 // Time in ms
    , ['f87000', '', 'f87000', '', 'f87000', '', 'f87000', '', 'f87000', '', 'f87000', ''] // Colors Array
    , 0);
  }
}
/**  Show Yes/No dialog
 * 
 * @param {type} message_question
 * @returns {Boolean}
 */


function oper_are_you_sure(message_question) {
  var answer = confirm(message_question);

  if (answer) {
    return true;
  } else {
    return false;
  }
}

function oper_admin_show_message_processing(message_type) {
  var message = '';
  if (message_type == 'saving') message += oper_global1.oper_message_saving;else if (message_type == 'updating') message += oper_global1.oper_message_updating;else if (message_type == 'deleting') message += oper_global1.oper_message_deleting;else message += oper_global1.oper_message_processing;
  if (message == 'undefined') message = 'Processing';
  message = ' <span class="wpdevelop"><span class="glyphicon glyphicon-refresh oper_spin oper_ajax_icon"  aria-hidden="true"></span></span> ' + message + '...';
  oper_admin_show_message(message, 'info', 10000);
}
/** Show Alert Messages
 * 
 * @param {type} message
 * @param {type} m_type
 * @param {type} m_delay
 * @returns {undefined}
 */


function oper_admin_show_message(message, m_type, m_delay) {
  var alert_class = 'notice '; //'alert ';

  if (m_type == 'error') alert_class += 'notice-error '; //'alert-danger '; 

  if (m_type == 'warning') alert_class += 'notice-warning ';
  if (m_type == 'info') alert_class += 'notice-info '; //'alert-info '; 

  if (m_type == 'success') alert_class += 'alert-success updated ';
  jQuery('#ajax_working').html('<div id="oper_alert_message" class="oper_alert_message">' + '<div class="oper_inner_message ' + alert_class + '"> ' + '<a class="close" href="javascript:void(0)" onclick="javascript:jQuery(this).parent().hide();">&times;</a> ' + message + '</div>' + '</div>');
  jQuery('#oper_alert_message').animate({
    opacity: 1
  }, m_delay).fadeOut(500);
}

function oper_close_dropdown_selectbox(selector_id) {
  jQuery('#' + selector_id + '_container li input[type=checkbox],#' + selector_id + '_container li input[type=radio]').prop('checked', false);
  jQuery('#' + selector_id + '_container').hide();
} // Show Container depend from the selected option in dropdown list


function oper_show_selected_in_dropdown(selector_id, title, value) {
  jQuery('#' + selector_id + '_selector .oper_selected_in_dropdown').html(title);
  jQuery('#' + selector_id).val(value);
} // Show Container depend from the selected Radio Option and Selectbox value in dropdown list
// Exmaple: oper_show_selected_in_dropdown__radio_select_option( 'wh_ ... _date', 'wh_ ... _date2', 'wh_ ... _datedays_interval_Radios' );


function oper_show_selected_in_dropdown__radio_select_option(selector_id, selector_id2, radio_name) {
  // Get selected value in radio buttons
  var rad_val = jQuery('input:radio[name="' + radio_name + '"]:checked').val();

  if (rad_val != 'undefined') {
    var select_box = jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.input-group').find('select'); // Selectbox exist

    if (select_box.length > 0) {
      // Get label near selected radiobutton  and selected Tilte in selectbox
      var title = jQuery('input:radio[name="' + radio_name + '"]:checked').parent().find('label').html() + ' ' + jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.input-group').find('select option:selected').text(); // Get Value of selected option in selectbox

      var value = jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.input-group').find('select option:selected').val(); // Set  Title in dropdown list

      jQuery('#' + selector_id + '_selector .oper_selected_in_dropdown').html(title); // Set  value of radio button

      jQuery('#' + selector_id).val(rad_val); // Set  value of selectbox

      jQuery('#' + selector_id2).val(value);
    } else {
      // 2 Text Fields
      var text_box = jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.text-group').find('input[type="text"]');

      if (text_box.length > 0) {
        var text_divs = jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.text-group').find('.dropdown-menu-text-element'); // Check if we have 2 DIV elements with text fields

        if (text_box.length > 0) {
          var id_list = [selector_id, selector_id2];
          var title = ''; //Loop our text DIV elements

          jQuery('input:radio[name="' + radio_name + '"]:checked').parents('.text-group').find('.dropdown-menu-text-element').each(function (i) {
            if (title != '') title += ' - ';
            title += jQuery(this).find('input[type="text"]').val();
            jQuery('#' + id_list[i]).val(jQuery(this).find('input[type="text"]').val());
          }); // Set  Title in dropdown list

          jQuery('#' + selector_id + '_selector .oper_selected_in_dropdown').html(title);
        }
      }
    }
  } // Hide dropdown list


  jQuery('#' + selector_id + '_container').hide();
} //Set status of all checkbos in one time


function oper_set_checkbox_in_table(el_stutus, el_class) {
  jQuery('.' + el_class).attr('checked', el_stutus);

  if (el_stutus) {
    jQuery('.' + el_class).parent().parent().parent().parent().addClass('row_selected_color'); // jQuery('.'+el_class).parent().parent().addClass('warning');
  } else {
    jQuery('.' + el_class).parent().parent().parent().parent().removeClass('row_selected_color'); // jQuery('.'+el_class).parent().parent().removeClass('warning');
  }
}
/** Ajax Request
 * 
 * @param {type} us_id
 * @param {type} window_id
 * @returns {undefined}
 */
//<![CDATA[


function oper_verify_window_opening(us_id, window_id) {
  var is_closed = 0;

  if (jQuery('#' + window_id).hasClass('closed') == true) {
    jQuery('#' + window_id).removeClass('closed');
  } else {
    jQuery('#' + window_id).addClass('closed');
    is_closed = 1;
  }

  jQuery.ajax({
    // Start Ajax Sending
    url: oper_global1.oper_ajaxurl,
    type: 'POST',
    success: function success(data, textStatus) {
      if (textStatus == 'success') jQuery('#ajax_respond').html(data);
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      window.status = 'Ajax sending Error status:' + textStatus;
      alert(XMLHttpRequest.status + ' ' + XMLHttpRequest.statusText);

      if (XMLHttpRequest.status == 500) {
        alert('Error: 500');
      }
    },
    // beforeSend: someFunction,
    data: {
      action: 'USER_SAVE_WINDOW_STATE',
      user_id: us_id,
      window: window_id,
      is_closed: is_closed,
      oper_nonce: jQuery('#oper_admin_panel_nonce').val()
    }
  });
} //]]>

/** Ajax Request - Saving Custom Data for User
 * 
 * @param {int} us_id
 * @param {string} data_name
 * @param {string} data_value - serialized data
 * @param {int} is_reload  -  { 0 | 1 } reload or not page
 */
//<![CDATA[


function oper_save_custom_user_data(us_id, data_name, data_value, is_reload) {
  oper_admin_show_message_processing('saving');
  jQuery.ajax({
    // Start Ajax Sending
    url: oper_global1.oper_ajaxurl,
    type: 'POST',
    success: function success(data, textStatus) {
      if (textStatus == 'success') jQuery('#ajax_respond').html(data);
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      window.status = 'Ajax sending Error status:' + textStatus;
      alert(XMLHttpRequest.status + ' ' + XMLHttpRequest.statusText);

      if (XMLHttpRequest.status == 500) {
        alert('Error: 500');
      }
    },
    // beforeSend: someFunction,
    data: {
      action: 'USER_SAVE_CUSTOM_DATA',
      user_id: us_id,
      data_name: data_name,
      data_value: decodeURIComponent(data_value),
      is_reload: is_reload,
      oper_nonce: jQuery('#oper_admin_panel_nonce').val()
    }
  });
} //]]>
////////////////////////////////////////////////////////////////////////////////
// Contact Form
////////////////////////////////////////////////////////////////////////////////


function oper_submit_client_form(submit_form, wpdev_active_locale) {
  var count = submit_form.elements.length;
  var formdata = '';
  var inp_value;
  var element;
  var el_type;

  for (i = 0; i < count; i++) {
    element = submit_form.elements[i];

    if (element.type !== 'button' && element.type !== 'hidden') {
      // Get Value of Element
      if (element.type == 'checkbox') {
        if (element.value == '') {
          inp_value = element.checked;
        } else {
          if (element.checked) inp_value = element.value;else inp_value = '';
        }
      } else if (element.type == 'radio') {
        if (element.value == '') {
          inp_value = element.checked;
        } else {
          if (element.checked) inp_value = element.value;else inp_value = '';
        }
        /*
        if ( element.checked ) 
            inp_value = element.value; 
        else 
            continue;
        */

      } else {
        inp_value = element.value;
      } // Get value in selectbox of multiple selection


      if (element.type == 'select-multiple') {
        inp_value = jQuery('[name="' + element.name + '"]').val();
        if (inp_value == null || inp_value.toString() == '') inp_value = '';
      }
      /*if ( element.name == ('phone') ) {
          // we validate a phone number of 10 digits with no comma, no spaces, no punctuation and there will be no + sign in front the number - See more at: http://www.w3resource.com/javascript/form/phone-no-validation.php#sthash.U9FHwcdW.dpuf
          var reg =  /^\d{10}$/;
          var message_verif_phone = "Please enter correctly phone number";
          if ( inp_value != '' )
              if(reg.test(inp_value) == false) {oper_show_error_message( element , message_verif_phone);return;}
      }*/
      // Validation Check -- Requred fields


      if (element.className.indexOf('oper-validate-required') !== -1) {
        if (element.type == 'checkbox' && element.checked === false) {
          if (!jQuery(':checkbox[name="' + element.name + '"]', submit_form).is(":checked")) {
            oper_show_error_message(element, oper_global1.message_verif_requred_for_check_box);
            return;
          }
        }

        if (element.type == 'radio') {
          if (!jQuery(':radio[name="' + element.name + '"]', submit_form).is(":checked")) {
            oper_show_error_message(element, oper_global1.message_verif_requred_for_radio_box);
            return;
          }
        }

        if (element.type != 'checkbox' && element.type != 'radio' && inp_value === '') {
          oper_show_error_message(element, oper_global1.message_verif_requred);
          return;
        }
      } // Validation Check --- Email correct filling field


      if (element.className.indexOf('oper-validate-email') !== -1) {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,})$/;

        if (inp_value != '' && reg.test(inp_value) == false) {
          oper_show_error_message(element, oper_global1.message_verif_email);
          return;
        }
      }
      /*
      // Validation Check --- Same Email Field
      if ( ( element.className.indexOf('wpdev-validates-as-email') !== -1 ) && ( element.className.indexOf('same_as_') !== -1 ) ) { 
           // Get  the name of Primary Email field from the "same_as_NAME" class                    
          var primary_email_name = element.className.match(/same_as_([^\s])+/gi); 
          if (primary_email_name != null) { // We found
              primary_email_name = primary_email_name[0].substr(8);
               // Recehck if such primary email field exist in the  form
              if (jQuery('[name="' + primary_email_name  + '"]').length > 0) {
                   // Recheck the values of the both emails, if they do  not equla show warning                    
                  if ( jQuery('[name="' + primary_email_name  + '"]').val() !== inp_value ) {
                      oper_show_error_message( element , oper_global1.message_verif_same_emeil );return;
                  }
              }
          }
          // Skip one loop for the email veryfication field
          continue;
      } */

      /*
      // Get Form Data
      if ( element.name !== ('captcha_input' ) ) {
          if (formdata !=='') formdata +=  '~';                                                // next field element
           el_type = element.type;
          if ( element.className.indexOf('wpdev-validates-as-email') !== -1 )  el_type='email';
          if ( element.className.indexOf('wpdev-validates-as-coupon') !== -1 ) el_type='coupon';
           inp_value = inp_value + '';
          inp_value = inp_value.replace(new RegExp("\\^",'g'), '&#94;'); // replace registered characters
          inp_value = inp_value.replace(new RegExp("~",'g'), '&#126;'); // replace registered characters
           inp_value = inp_value.replace(/"/g, '&#34;'); // replace double quot
          inp_value = inp_value.replace(/'/g, '&#39;'); // replace single quot
           formdata += el_type + '^' + element.name + '^' + inp_value ;                    // element attr
      } */

    }
  } // End Fields Loop


  submit_form.trigger('submit'); // Submit Form,  if previously  was no interuptions
}
/**
 * Show message under specific element
 * 
 * @param {type} element - jQuery definition  of the element
 * @param {type} errorMessage - String message
 * @param {type} message_type "" | "alert-warning" | "alert-success" | "alert-info" | "alert-danger"
 */


function oper_show_message_under_element(element, errorMessage, message_type) {
  oper_scroll_to(element);

  if (jQuery(element).attr('type') == "radio") {
    jQuery(element).parent().parent().parent().after('<span class="oper-near-field-message alert ' + message_type + '">' + errorMessage + '</span>'); // Show message
  } else if (jQuery(element).attr('type') == "checkbox") {
    jQuery(element).parent().after('<span class="oper-near-field-message alert ' + message_type + '">' + errorMessage + '</span>'); // Show message
  } else {
    jQuery(element).after('<span class="oper-near-field-message alert ' + message_type + '">' + errorMessage + '</span>'); // Show message
  }

  jQuery(".widget_oper .oper-near-field-message").css({
    'vertical-align': 'sub'
  });
  jQuery(".oper-near-field-message").animate({
    opacity: 1
  }, 10000).fadeOut(2000);
} // Show Error Message in  Form  at Front End


function oper_show_error_message(element, errorMessage) {
  // Scroll to the element
  oper_scroll_to(element);
  jQuery("[name='" + element.name + "']").fadeOut(350).fadeIn(300).fadeOut(350).fadeIn(400).fadeOut(350).fadeIn(300).fadeOut(350).fadeIn(400).animate({
    opacity: 1
  }, 4000); // mark red border

  if (jQuery("[name='" + element.name + "']").attr('type') == "radio") {
    jQuery("[name='" + element.name + "']").parent().parent() //.parent()
    .after('<span class="oper-near-field-message alert alert-warning">' + errorMessage + '</span>'); // Show message
  } else if (jQuery("[name='" + element.name + "']").attr('type') == "checkbox") {
    jQuery("[name='" + element.name + "']").parent().parent().after('<span class="oper-near-field-message alert alert-warning">' + errorMessage + '</span>'); // Show message
  } else {
    jQuery("[name='" + element.name + "']").after('<span class="oper-near-field-message alert alert-warning">' + errorMessage + '</span>'); // Show message
  }

  jQuery(".oper-near-field-message").css({
    'padding': '5px 5px 4px',
    'margin': '2px',
    'vertical-align': 'top',
    'line-height': '32px'
  });
  if (element.type == 'checkbox') jQuery(".oper-near-field-message").css({
    'vertical-align': 'middle'
  });
  jQuery(".widget_oper .oper-near-field-message").css({
    'vertical-align': 'sub'
  });
  jQuery(".oper-near-field-message").animate({
    opacity: 1
  }, 10000).fadeOut(2000);
  element.focus(); // make focus to elemnt

  return;
}
/**
 * Reload the page with  new parameter value.
 * 
 * @param {type} url            - full URL  of the page,  can include or exclude that parameter
 * @param {type} param          - URL parameter name
 * @param {type} value          - URL parameter value
 * @returns {undefined}
 */


function oper_reload_page_with_paramater(url, param, value) {
  var hash = {};
  var parser = document.createElement('a');
  parser.href = url;
  var parameters = parser.search.split(/\?|&/);

  for (var i = 0; i < parameters.length; i++) {
    if (!parameters[i]) continue;
    var ary = parameters[i].split('=');
    hash[ary[0]] = ary[1];
  }

  hash[param] = value;
  var list = [];
  Object.keys(hash).forEach(function (key) {
    list.push(key + '=' + hash[key]);
  });
  parser.search = '?' + list.join('&'); //return parser.href;

  window.location.href = parser.href;
}

jQuery(window).on("load", function () {
  //FixIn: 8.7.9.7
  // Color Text picker ///////////////////////////////////////////////////////
  if (jQuery('.field-text-color').length > 0) {
    jQuery('.field-text-color').iris({
      change: function change(event, ui) {
        jQuery(this).css({
          backgroundColor: ui.color.toString()
        });
        jQuery(this).closest('.fields-color-group').find('.fieldvalue').css({
          color: ui.color.toString()
        });
      },
      hide: true,
      border: true,
      palettes: ['#333', '#555', '#777', '#aaa', '#fff']
    }).each(function () {
      jQuery(this).css({
        backgroundColor: jQuery(this).val()
      });
    }).on('click', function () {
      jQuery('.iris-picker').hide();
      jQuery(this).closest('div').find('.iris-picker').show();
    });
  } // Color Background picker ///////////////////////////////////////////////// 


  if (jQuery('.field-background-color').length > 0) {
    jQuery('.field-background-color').iris({
      change: function change(event, ui) {
        jQuery(this).css({
          backgroundColor: ui.color.toString()
        });
        jQuery(this).closest('.fields-color-group').find('.fieldvalue').css({
          backgroundColor: ui.color.toString()
        });
      },
      hide: true,
      border: true,
      palettes: ['#FFEE99', '#459', '#78b', '#ab0', '#df5d5d', '#f0f']
    }).each(function () {
      jQuery(this).css({
        backgroundColor: jQuery(this).val()
      });
    }).on('click', function () {
      jQuery('.iris-picker').hide();
      jQuery(this).closest('div').find('.iris-picker').show();
    });
    jQuery('.field-text-color, .field-background-color').on('click', function (event) {
      event.stopPropagation();
    });
  } ////////////////////////////////////////////////////////////////////////////
  // General Color picker in settings table //////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////


  if (jQuery('.oper_colorpick').length > 0) {
    jQuery('.oper_colorpick').iris({
      change: function change(event, ui) {
        jQuery(this).css({
          backgroundColor: ui.color.toString()
        });
      },
      hide: true,
      border: true,
      palettes: ['#125', '#459', '#78b', '#ab0', '#de3', '#f0f']
    }).each(function () {
      jQuery(this).css({
        backgroundColor: jQuery(this).val()
      });
    }).on('click', function () {
      jQuery('.iris-picker').hide();
      jQuery(this).closest('td').find('.iris-picker').show();
    });
    jQuery('body').on('click', function () {
      jQuery('.iris-picker').hide();
    });
    jQuery('.oper_colorpick').on('click', function (event) {
      event.stopPropagation();
    });
  }
}); ////////////////////////////////////////////////////////////////////////////
// Support Functions
////////////////////////////////////////////////////////////////////////////

/**
 * Reset of WP Editor or TextArea Content
 * @param {string} editor_textarea_id - ID of element
 * @param {string} editor_textarea_content - Content
 */

function oper_reset_wp_editor_content(editor_textarea_id, editor_textarea_content) {
  if (typeof tinymce != "undefined") {
    var editor = tinymce.get(editor_textarea_id);

    if (editor && editor instanceof tinymce.Editor) {
      editor.setContent(editor_textarea_content);
      editor.save({
        no_events: true
      });
    } else {
      jQuery('#' + editor_textarea_id).val(editor_textarea_content);
    }
  } else {
    jQuery('#' + editor_textarea_id).val(editor_textarea_content);
  }
}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIl9zcmMvanMvYWRtaW4tc3VwcG9ydC5qcyJdLCJuYW1lcyI6WyJvcGVyX3Njcm9sbF90byIsIm9iamVjdF9uYW1lIiwialF1ZXJ5IiwibGVuZ3RoIiwidGFyZ2V0T2Zmc2V0Iiwib2Zmc2V0IiwidG9wIiwiYW5pbWF0ZSIsInNjcm9sbFRvcCIsIm9wZXJfYW5pbWF0ZV9ib3JkZXIiLCJlbGVtZW50IiwidGltZSIsImNvbG9ycyIsIngiLCJjb2xvciIsImNzcyIsInNldFRpbWVvdXQiLCJvcGVyX2ZpZWxkX2hpZ2hsaWdodCIsIm9wZXJfYXJlX3lvdV9zdXJlIiwibWVzc2FnZV9xdWVzdGlvbiIsImFuc3dlciIsImNvbmZpcm0iLCJvcGVyX2FkbWluX3Nob3dfbWVzc2FnZV9wcm9jZXNzaW5nIiwibWVzc2FnZV90eXBlIiwibWVzc2FnZSIsIm9wZXJfZ2xvYmFsMSIsIm9wZXJfbWVzc2FnZV9zYXZpbmciLCJvcGVyX21lc3NhZ2VfdXBkYXRpbmciLCJvcGVyX21lc3NhZ2VfZGVsZXRpbmciLCJvcGVyX21lc3NhZ2VfcHJvY2Vzc2luZyIsIm9wZXJfYWRtaW5fc2hvd19tZXNzYWdlIiwibV90eXBlIiwibV9kZWxheSIsImFsZXJ0X2NsYXNzIiwiaHRtbCIsIm9wYWNpdHkiLCJmYWRlT3V0Iiwib3Blcl9jbG9zZV9kcm9wZG93bl9zZWxlY3Rib3giLCJzZWxlY3Rvcl9pZCIsInByb3AiLCJoaWRlIiwib3Blcl9zaG93X3NlbGVjdGVkX2luX2Ryb3Bkb3duIiwidGl0bGUiLCJ2YWx1ZSIsInZhbCIsIm9wZXJfc2hvd19zZWxlY3RlZF9pbl9kcm9wZG93bl9fcmFkaW9fc2VsZWN0X29wdGlvbiIsInNlbGVjdG9yX2lkMiIsInJhZGlvX25hbWUiLCJyYWRfdmFsIiwic2VsZWN0X2JveCIsInBhcmVudHMiLCJmaW5kIiwicGFyZW50IiwidGV4dCIsInRleHRfYm94IiwidGV4dF9kaXZzIiwiaWRfbGlzdCIsImVhY2giLCJpIiwib3Blcl9zZXRfY2hlY2tib3hfaW5fdGFibGUiLCJlbF9zdHV0dXMiLCJlbF9jbGFzcyIsImF0dHIiLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwib3Blcl92ZXJpZnlfd2luZG93X29wZW5pbmciLCJ1c19pZCIsIndpbmRvd19pZCIsImlzX2Nsb3NlZCIsImhhc0NsYXNzIiwiYWpheCIsInVybCIsIm9wZXJfYWpheHVybCIsInR5cGUiLCJzdWNjZXNzIiwiZGF0YSIsInRleHRTdGF0dXMiLCJlcnJvciIsIlhNTEh0dHBSZXF1ZXN0IiwiZXJyb3JUaHJvd24iLCJ3aW5kb3ciLCJzdGF0dXMiLCJhbGVydCIsInN0YXR1c1RleHQiLCJhY3Rpb24iLCJ1c2VyX2lkIiwib3Blcl9ub25jZSIsIm9wZXJfc2F2ZV9jdXN0b21fdXNlcl9kYXRhIiwiZGF0YV9uYW1lIiwiZGF0YV92YWx1ZSIsImlzX3JlbG9hZCIsImRlY29kZVVSSUNvbXBvbmVudCIsIm9wZXJfc3VibWl0X2NsaWVudF9mb3JtIiwic3VibWl0X2Zvcm0iLCJ3cGRldl9hY3RpdmVfbG9jYWxlIiwiY291bnQiLCJlbGVtZW50cyIsImZvcm1kYXRhIiwiaW5wX3ZhbHVlIiwiZWxfdHlwZSIsImNoZWNrZWQiLCJuYW1lIiwidG9TdHJpbmciLCJjbGFzc05hbWUiLCJpbmRleE9mIiwiaXMiLCJvcGVyX3Nob3dfZXJyb3JfbWVzc2FnZSIsIm1lc3NhZ2VfdmVyaWZfcmVxdXJlZF9mb3JfY2hlY2tfYm94IiwibWVzc2FnZV92ZXJpZl9yZXF1cmVkX2Zvcl9yYWRpb19ib3giLCJtZXNzYWdlX3ZlcmlmX3JlcXVyZWQiLCJyZWciLCJ0ZXN0IiwibWVzc2FnZV92ZXJpZl9lbWFpbCIsInRyaWdnZXIiLCJvcGVyX3Nob3dfbWVzc2FnZV91bmRlcl9lbGVtZW50IiwiZXJyb3JNZXNzYWdlIiwiYWZ0ZXIiLCJmYWRlSW4iLCJmb2N1cyIsIm9wZXJfcmVsb2FkX3BhZ2Vfd2l0aF9wYXJhbWF0ZXIiLCJwYXJhbSIsImhhc2giLCJwYXJzZXIiLCJkb2N1bWVudCIsImNyZWF0ZUVsZW1lbnQiLCJocmVmIiwicGFyYW1ldGVycyIsInNlYXJjaCIsInNwbGl0IiwiYXJ5IiwibGlzdCIsIk9iamVjdCIsImtleXMiLCJmb3JFYWNoIiwia2V5IiwicHVzaCIsImpvaW4iLCJsb2NhdGlvbiIsIm9uIiwiaXJpcyIsImNoYW5nZSIsImV2ZW50IiwidWkiLCJiYWNrZ3JvdW5kQ29sb3IiLCJjbG9zZXN0IiwiYm9yZGVyIiwicGFsZXR0ZXMiLCJzaG93Iiwic3RvcFByb3BhZ2F0aW9uIiwib3Blcl9yZXNldF93cF9lZGl0b3JfY29udGVudCIsImVkaXRvcl90ZXh0YXJlYV9pZCIsImVkaXRvcl90ZXh0YXJlYV9jb250ZW50IiwidGlueW1jZSIsImVkaXRvciIsImdldCIsIkVkaXRvciIsInNldENvbnRlbnQiLCJzYXZlIiwibm9fZXZlbnRzIl0sIm1hcHBpbmdzIjoiOztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBU0EsY0FBVCxDQUF5QkMsV0FBekIsRUFBdUM7QUFDbkMsTUFBS0MsTUFBTSxDQUFFRCxXQUFGLENBQU4sQ0FBc0JFLE1BQXRCLEdBQStCLENBQXBDLEVBQXdDO0FBQ3BDLFFBQUlDLFlBQVksR0FBR0YsTUFBTSxDQUFFRCxXQUFGLENBQU4sQ0FBc0JJLE1BQXRCLEdBQStCQyxHQUFsRCxDQURvQyxDQUVwQzs7QUFDQSxRQUFJRixZQUFZLEdBQUMsQ0FBakIsRUFBb0JBLFlBQVksR0FBRyxDQUFmO0FBQ3BCLFFBQUtGLE1BQU0sQ0FBQyxhQUFELENBQU4sQ0FBc0JDLE1BQXRCLEdBQStCLENBQXBDLEVBQXdDQyxZQUFZLEdBQUdBLFlBQVksR0FBRyxFQUE5QixDQUF4QyxLQUNNQSxZQUFZLEdBQUdBLFlBQVksR0FBRyxFQUE5QjtBQUNORixJQUFBQSxNQUFNLENBQUMsV0FBRCxDQUFOLENBQW9CSyxPQUFwQixDQUE0QjtBQUFDQyxNQUFBQSxTQUFTLEVBQUVKO0FBQVosS0FBNUIs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QUFBQSxTQUFTLEVBQUU7QUFBYixPQUFiO0FBQ0gsS0FIRCxNQUdPO0FBQ0g1SixNQUFBQSxNQUFNLENBQUUsTUFBTW9KLGtCQUFSLENBQU4sQ0FBbUMxRyxHQUFuQyxDQUF3QzJHLHVCQUF4QztBQUNIO0FBQ0osR0FSRCxNQVFPO0FBQ0hySixJQUFBQSxNQUFNLENBQUUsTUFBTW9KLGtCQUFSLENBQU4sQ0FBbUMxRyxHQUFuQyxDQUF3QzJHLHVCQUF4QztBQUNIO0FBQ0oiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEB2ZXJzaW9uIDEuMFxuICogQHBhY2thZ2UgU3VwcG9ydCBGdW5jdGlvbnNcbiAqIEBzdWJwYWNrYWdlIEJhY2tFbmQgTWFpbiBTY3JpcHQgTGliXG4gKiBAY2F0ZWdvcnkgU2NyaXB0cyBcbiAqIEBhdXRob3Igd3BkZXZlbG9wXG4gKlxuICogQHdlYi1zaXRlIGh0dHA6Ly9vcGx1Z2lucy5jb20vXG4gKiBAZW1haWwgaW5mb0BvcGx1Z2lucy5jb20gXG4gKiBcbiAqIEBtb2RpZmllZCAyMDE1LTA0LTA5XG4gICovXG5cblxuLyoqIFNjcm9sbCB0byAgc3BlY2lmaWMgSFRNTCBlbGVtZW50XG4gKiBcbiAqIEBwYXJhbSB7dHlwZX0gb2JqZWN0X25hbWVcbiAqIEByZXR1cm5zIHt1bmRlZmluZWR9XG4gKi9cbmZ1bmN0aW9uIG9wZXJfc2Nyb2xsX3RvKCBvYmplY3RfbmFtZSApIHtcbiAgICBpZiAoIGpRdWVyeSggb2JqZWN0X25hbWUgKS5sZW5ndGggPiAwICkgeyAgICAgICAgXG4gICAgICAgIHZhciB0YXJnZXRPZmZzZXQgPSBqUXVlcnkoIG9iamVjdF9uYW1lICkub2Zmc2V0KCkudG9wO1xuICAgICAgICAvLyB0YXJnZXRPZmZzZXQgPSB0YXJnZXRPZmZzZXQgLSA1MDtcbiAgICAgICAgaWYgKHRhcmdldE9mZnNldDwwKSB0YXJnZXRPZmZzZXQgPSAwO1xuICAgICAgICBpZiAoIGpRdWVyeSgnI3dwYWRtaW5iYXInKS5sZW5ndGggPiAwICkgdGFyZ2V0T2Zmc2V0ID0gdGFyZ2V0T2Zmc2V0IC0gNTA7XG4gICAgICAgIGVsc2UgIHRhcmdldE9mZnNldCA9IHRhcmdldE9mZnNldCAtIDIwO1xuICAgICAgICBqUXVlcnkoJ2h0bWwsYm9keScpLmFuaW1hdGUoe3Njcm9sbFRvcDogdGFyZ2V0T2Zmc2V0fSwgNTAwKTtcbiAgICB9XG59XG5cbmZ1bmN0aW9uIG9wZXJfYW5pbWF0ZV9ib3JkZXIoIGVsZW1lbnQsIHRpbWUsIGNvbG9ycywgeCApIHtcbiAgICBcbiAgICBpZiAoeCA+PSBjb2xvcnMubGVuZ3RoKSB7XG4gICAgICAgIHggPSAwO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIHgrKztcbiAgICAgICAgdmFyIGNvbG9yO1xuICAgICAgICBpZiAoIGNvbG9yc1t4XSA9PT0gJycgKSB7XG4gICAgICAgICAgICBjb2xvciA9ICcnXG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBjb2xvciA9ICcjJytjb2xvcnNbeF1cbiAgICAgICAgfSAgICAgICAgXG4gICAgICAgIGVsZW1lbnQuY3NzKCdib3JkZXItY29sb3InLCBjb2xvcilcbiAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIG9wZXJfYW5pbWF0ZV9ib3JkZXIoIGVsZW1lbnQsIHRpbWUsIGNvbG9ycywgeCApO1xuICAgICAgICB9LCB0aW1lKVxuICAgIH1cbn1cblxuZnVuY3Rpb24gb3Blcl9maWVsZF9oaWdobGlnaHQoIG9iamVjdF9uYW1lICkge1xuICAgIFxuICAgIGlmICggalF1ZXJ5KCBvYmplY3RfbmFtZSApLmxlbmd0aCA+IDAgKSB7IFxuICAgICBcbiAgICAgICAgb3Blcl9zY3JvbGxfdG8oIG9iamVjdF9uYW1lICk7XG4gICAgICAgIFxuICAgICAgICBvcGVyX2FuaW1hdGVfYm9yZGVyKFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBqUXVlcnkoIG9iamVjdF9uYW1lICkgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBFbGVtZW50IFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAsIDIwMCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBUaW1lIGluIG1zXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICwgWydmODcwMDAnLCAnJywgJ2Y4NzAwMCcsICcnLCAnZjg3MDAwJywgJycsICdmODcwMDAnLCAnJywgJ2Y4NzAwMCcsICcnLCAnZjg3MDAwJywgJyddICAgICAgLy8gQ29sb3JzIEFycmF5XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICwgMFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICk7IFxuICAgIH1cbn1cblxuLyoqICBTaG93IFllcy9ObyBkaWFsb2dcbiAqIFxuICogQHBhcmFtIHt0eXBlfSBtZXNzYWdlX3F1ZXN0aW9uXG4gKiBAcmV0dXJucyB7Qm9vbGVhbn1cbiAqL1xuZnVuY3Rpb24gb3Blcl9hcmVfeW91X3N1cmUoIG1lc3NhZ2VfcXVlc3Rpb24gKXtcbiAgICB2YXIgYW5zd2VyID0gY29uZmlybSggbWVzc2FnZV9xdWVzdGlvbiApO1xuICAgIGlmICggYW5zd2VyKSB7IHJldHVybiB0cnVlOyB9XG4gICAgZWxzZSAgICAgICAgIHsgcmV0dXJuIGZhbHNlO31cbn1cblxuZnVuY3Rpb24gb3Blcl9hZG1pbl9zaG93X21lc3NhZ2VfcHJvY2Vzc2luZyggbWVzc2FnZV90eXBlICl7XG4gICAgXG4gICAgdmFyIG1lc3NhZ2UgPSAnJyA7XG4gICAgXG4gICAgaWYgKCBtZXNzYWdlX3R5cGUgPT0gJ3NhdmluZycgKVxuICAgICAgICBtZXNzYWdlICs9IG9wZXJfZ2xvYmFsMS5vcGVyX21lc3NhZ2Vfc2F2aW5nO1xuICAgIGVsc2UgaWYgKCBtZXNzYWdlX3R5cGUgPT0gJ3VwZGF0aW5nJyApXG4gICAgICAgIG1lc3NhZ2UgKz0gb3Blcl9nbG9iYWwxLm9wZXJfbWVzc2FnZV91cGRhdGluZztcbiAgICBlbHNlIGlmICggbWVzc2FnZV90eXBlID09ICdkZWxldGluZycgKVxuICAgICAgICBtZXNzYWdlICs9IG9wZXJfZ2xvYmFsMS5vcGVyX21lc3NhZ2VfZGVsZXRpbmc7XG4gICAgZWxzZSBcbiAgICAgICAgbWVzc2FnZSArPSBvcGVyX2dsb2JhbDEub3Blcl9tZXNzYWdlX3Byb2Nlc3Npbmc7XG4gICAgICBcbiAgICBpZiAoIG1lc3NhZ2UgPT0gJ3VuZGVmaW5lZCcgKSAgXG4gICAgICAgIG1lc3NhZ2UgPSAnUHJvY2Vzc2luZydcbiAgICAgIFxuICAgIG1lc3NhZ2UgPSAnIDxzcGFuIGNsYXNzPVwid3BkZXZlbG9wXCI+PHNwYW4gY2xhc3M9XCJnbHlwaGljb24gZ2x5cGhpY29uLXJlZnJlc2ggb3Blcl9zcGluIG9wZXJfYWpheF9pY29uXCIgIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPjwvc3Bhbj48L3NwYW4+ICcgKyBtZXNzYWdlICsgJy4uLic7XG4gICAgXG4gICAgb3Blcl9hZG1pbl9zaG93X21lc3NhZ2UoIG1lc3NhZ2UsICdpbmZvJywgMTAwMDAgKTtcbn1cblxuLyoqIFNob3cgQWxlcnQgTWVzc2FnZXNcbiAqIFxuICogQHBhcmFtIHt0eXBlfSBtZXNzYWdlXG4gKiBAcGFyYW0ge3R5cGV9IG1fdHlwZVxuICogQHBhcmFtIHt0eXBlfSBtX2RlbGF5XG4gKiBAcmV0dXJucyB7dW5kZWZpbmVkfVxuICovXG5mdW5jdGlvbiBvcGVyX2FkbWluX3Nob3dfbWVzc2FnZSggbWVzc2FnZSwgbV90eXBlLCBtX2RlbGF5ICl7XG5cbiAgICB2YXIgYWxlcnRfY2xhc3MgPSAnbm90aWNlICc7ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8nYWxlcnQgJztcbiAgICBpZiAobV90eXBlID09ICdlcnJvcicpICAgICAgYWxlcnRfY2xhc3MgKz0gJ25vdGljZS1lcnJvciAnOyAgICAgICAgICAgICAgICAgLy8nYWxlcnQtZGFuZ2VyICc7IFxuICAgIGlmIChtX3R5cGUgPT0gJ3dhcm5pbmcnKSAgICBhbGVydF9jbGFzcyArPSAnbm90aWNlLXdhcm5pbmcgJztcbiAgICBpZiAobV90eXBlID09ICdpbmZvJykgICAgICAgYWxlcnRfY2xhc3MgKz0gJ25vdGljZS1pbmZvICc7ICAgICAgICAgICAgICAgICAgLy8nYWxlcnQtaW5mbyAnOyBcbiAgICBpZiAobV90eXBlID09ICdzdWNjZXNzJykgICAgYWxlcnRfY2xhc3MgKz0gJ2FsZXJ0LXN1Y2Nlc3MgdXBkYXRlZCAnOyBcblxuICAgIGpRdWVyeSgnI2FqYXhfd29ya2luZycpLmh0bWwoICAgJzxkaXYgaWQ9XCJvcGVyX2FsZXJ0X21lc3NhZ2VcIiBjbGFzcz1cIm9wZXJfYWxlcnRfbWVzc2FnZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwib3Blcl9pbm5lcl9tZXNzYWdlICcrYWxlcnRfY2xhc3MrJ1wiPiAnICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJzxhIGNsYXNzPVwiY2xvc2VcIiBocmVmPVwiamF2YXNjcmlwdDp2b2lkKDApXCIgb25jbGljaz1cImphdmFzY3JpcHQ6alF1ZXJ5KHRoaXMpLnBhcmVudCgpLmhpZGUoKTtcIj4mdGltZXM7PC9hPiAnICsgXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2UgKyBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnPC9kaXY+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnPC9kaXY+JyBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgKTtcbiAgICBqUXVlcnkoJyNvcGVyX2FsZXJ0X21lc3NhZ2UnKS5hbmltYXRlKCB7b3BhY2l0eTogMX0sIG1fZGVsYXkgKS5mYWRlT3V0KDUwMCk7XG59XG5cblxuZnVuY3Rpb24gb3Blcl9jbG9zZV9kcm9wZG93bl9zZWxlY3Rib3goIHNlbGVjdG9yX2lkICkge1xuICBqUXVlcnkoJyMnICsgc2VsZWN0b3JfaWQgKyAnX2NvbnRhaW5lciBsaSBpbnB1dFt0eXBlPWNoZWNrYm94XSwjJyArIHNlbGVjdG9yX2lkICsgJ19jb250YWluZXIgbGkgaW5wdXRbdHlwZT1yYWRpb10nKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICBqUXVlcnkoJyMnICsgc2VsZWN0b3JfaWQgKyAnX2NvbnRhaW5lcicpLmhpZGUoKTtcbn1cbi8vIFNob3cgQ29udGFpbmVyIGRlcGVuZCBmcm9tIHRoZSBzZWxlY3RlZCBvcHRpb24gaW4gZHJvcGRvd24gbGlzdFxuZnVuY3Rpb24gb3Blcl9zaG93X3NlbGVjdGVkX2luX2Ryb3Bkb3duKCBzZWxlY3Rvcl9pZCwgdGl0bGUsIHZhbHVlICl7XG4gICAgalF1ZXJ5KCcjJyArIHNlbGVjdG9yX2lkICsgJ19zZWxlY3RvciAub3Blcl9zZWxlY3RlZF9pbl9kcm9wZG93bicpLmh0bWwoIHRpdGxlICk7XG4gICAgalF1ZXJ5KCcjJyArIHNlbGVjdG9yX2lkICkudmFsKCB2YWx1ZSApOyAgICBcbn1cblxuLy8gU2hvdyBDb250YWluZXIgZGVwZW5kIGZyb20gdGhlIHNlbGVjdGVkIFJhZGlvIE9wdGlvbiBhbmQgU2VsZWN0Ym94IHZhbHVlIGluIGRyb3Bkb3duIGxpc3Rcbi8vIEV4bWFwbGU6IG9wZXJfc2hvd19zZWxlY3RlZF9pbl9kcm9wZG93bl9fcmFkaW9fc2VsZWN0X29wdGlvbiggJ3doXyAuLi4gX2RhdGUnLCAnd2hfIC4uLiBfZGF0ZTInLCAnd2hfIC4uLiBfZGF0ZWRheXNfaW50ZXJ2YWxfUmFkaW9zJyApO1xuZnVuY3Rpb24gb3Blcl9zaG93X3NlbGVjdGVkX2luX2Ryb3Bkb3duX19yYWRpb19zZWxlY3Rfb3B0aW9uKCBzZWxlY3Rvcl9pZCwgc2VsZWN0b3JfaWQyLCByYWRpb19uYW1lICl7XG4gICAgXG4gICAgLy8gR2V0IHNlbGVjdGVkIHZhbHVlIGluIHJhZGlvIGJ1dHRvbnNcbiAgICB2YXIgcmFkX3ZhbCA9IGpRdWVyeSgnaW5wdXQ6cmFkaW9bbmFtZT1cIicgKyByYWRpb19uYW1lICsgJ1wiXTpjaGVja2VkJykudmFsKCk7IFxuICAgIFxuICAgIGlmICggcmFkX3ZhbCAhPSAndW5kZWZpbmVkJyApIHtcbiAgICAgICAgXG4gICAgICAgIHZhciBzZWxlY3RfYm94ID0galF1ZXJ5KCdpbnB1dDpyYWRpb1tuYW1lPVwiJyArIHJhZGlvX25hbWUgKyAnXCJdOmNoZWNrZWQnKS5wYXJlbnRzKCcuaW5wdXQtZ3JvdXAnKS5maW5kKCdzZWxlY3QnKTtcbiAgICAgICAgLy8gU2VsZWN0Ym94IGV4aXN0XG4gICAgICAgIGlmICggc2VsZWN0X2JveC5sZW5ndGggPiAwICkge1xuICAgICAgICAgICAgLy8gR2V0IGxhYmVsIG5lYXIgc2VsZWN0ZWQgcmFkaW9idXR0b24gIGFuZCBzZWxlY3RlZCBUaWx0ZSBpbiBzZWxlY3Rib3hcbiAgICAgICAgICAgIHZhciB0aXRsZSA9IGpRdWVyeSgnaW5wdXQ6cmFkaW9bbmFtZT1cIicgKyByYWRpb19uYW1lICsgJ1wiXTpjaGVja2VkJykucGFyZW50KCkuZmluZCgnbGFiZWwnKS5odG1sKCkgKyAnICcgK1xuICAgICAgICAgICAgICAgICAgICAgICAgalF1ZXJ5KCdpbnB1dDpyYWRpb1tuYW1lPVwiJyArIHJhZGlvX25hbWUgKyAnXCJdOmNoZWNrZWQnKS5wYXJlbnRzKCcuaW5wdXQtZ3JvdXAnKS5maW5kKCdzZWxlY3Qgb3B0aW9uOnNlbGVjdGVkJykudGV4dCgpO1xuICAgICAgICAgICAgLy8gR2V0IFZhbHVlIG9mIHNlbGVjdGVkIG9wdGlvbiBpbiBzZWxlY3Rib3hcbiAgICAgICAgICAgIHZhciB2YWx1ZSA9IGpRdWVyeSgnaW5wdXQ6cmFkaW9bbmFtZT1cIicgKyByYWRpb19uYW1lICsgJ1wiXTpjaGVja2VkJykucGFyZW50cygnLmlucHV0LWdyb3VwJykuZmluZCgnc2VsZWN0IG9wdGlvbjpzZWxlY3RlZCcpLnZhbCgpO1xuICAgICAgICAgICAgLy8gU2V0ICBUaXRsZSBpbiBkcm9wZG93biBsaXN0XG4gICAgICAgICAgICBqUXVlcnkoJyMnICsgc2VsZWN0b3JfaWQgKyAnX3NlbGVjdG9yIC5vcGVyX3NlbGVjdGVkX2luX2Ryb3Bkb3duJykuaHRtbCggdGl0bGUgKTtcbiAgICAgICAgICAgIC8vIFNldCAgdmFsdWUgb2YgcmFkaW8gYnV0dG9uXG4gICAgICAgICAgICBqUXVlcnkoJyMnICsgc2VsZWN0b3JfaWQgKS52YWwoIHJhZF92YWwgKTtcbiAgICAgICAgICAgIC8vIFNldCAgdmFsdWUgb2Ygc2VsZWN0Ym94XG4gICAgICAgICAgICBqUXVlcnkoJyMnICsgc2VsZWN0b3JfaWQyICkudmFsKCB2YWx1ZSApOyAgICAgICAgICAgIFxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgLy8gMiBUZXh0IEZpZWxkc1xuICAgICAgICAgICAgdmFyIHRleHRfYm94ID0galF1ZXJ5KCdpbnB1dDpyYWRpb1tuYW1lPVwiJyArIHJhZGlvX25hbWUgKyAnXCJdOmNoZWNrZWQnKS5wYXJlbnRzKCcudGV4dC1ncm91cCcpLmZpbmQoJ2lucHV0W3R5cGU9XCJ0ZXh0XCJdJyk7ICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgIGlmICggdGV4dF9ib3gubGVuZ3RoID4gMCApIHsgICAgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgIHZhciB0ZXh0X2RpdnMgPSBqUXVlcnkoJ2lucHV0OnJhZGlvW25hbWU9XCInICsgcmFkaW9fbmFtZSArICdcIl06Y2hlY2tlZCcpLnBhcmVudHMoJy50ZXh0LWdyb3VwJykuZmluZCgnLmRyb3Bkb3duLW1lbnUtdGV4dC1lbGVtZW50Jyk7XG4gICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgIC8vIENoZWNrIGlmIHdlIGhhdmUgMiBESVYgZWxlbWVudHMgd2l0aCB0ZXh0IGZpZWxkc1xuICAgICAgICAgICAgICAgaWYgKCB0ZXh0X2JveC5sZW5ndGggPiAwICkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgIHZhciBpZF9saXN0ID0gWyBzZWxlY3Rvcl9pZCwgc2VsZWN0b3JfaWQyIF07XG4gICAgICAgICAgICAgICAgICAgIHZhciB0aXRsZSA9ICcnO1xuICAgICAgICAgICAgICAgICAgICAvL0xvb3Agb3VyIHRleHQgRElWIGVsZW1lbnRzXG4gICAgICAgICAgICAgICAgICAgIGpRdWVyeSgnaW5wdXQ6cmFkaW9bbmFtZT1cIicgKyByYWRpb19uYW1lICsgJ1wiXTpjaGVja2VkJykucGFyZW50cygnLnRleHQtZ3JvdXAnKS5maW5kKCcuZHJvcGRvd24tbWVudS10ZXh0LWVsZW1lbnQnKS5lYWNoKGZ1bmN0aW9uKCBpICkge1xuICAgICAgICAgICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoIHRpdGxlICE9ICcnIClcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZSArPSAnIC0gJzsgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlICs9IGpRdWVyeSh0aGlzKS5maW5kKCdpbnB1dFt0eXBlPVwidGV4dFwiXScpLnZhbCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgalF1ZXJ5KCcjJyArIGlkX2xpc3RbIGkgXSApLnZhbCggIGpRdWVyeSh0aGlzKS5maW5kKCdpbnB1dFt0eXBlPVwidGV4dFwiXScpLnZhbCgpICk7XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAvLyBTZXQgIFRpdGxlIGluIGRyb3Bkb3duIGxpc3RcbiAgICAgICAgICAgICAgICAgICAgalF1ZXJ5KCcjJyArIHNlbGVjdG9yX2lkICsgJ19zZWxlY3RvciAub3Blcl9zZWxlY3RlZF9pbl9kcm9wZG93bicpLmh0bWwoIHRpdGxlICk7XG4gICAgICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfVxuICAgIFxuICAgIC8vIEhpZGUgZHJvcGRvd24gbGlzdFxuICAgIGpRdWVyeSgnIycgKyBzZWxlY3Rvcl9pZCArICdfY29udGFpbmVyJykuaGlkZSgpOyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcbn1cbiAgICBcbi8vU2V0IHN0YXR1cyBvZiBhbGwgY2hlY2tib3MgaW4gb25lIHRpbWVcbmZ1bmN0aW9uIG9wZXJfc2V0X2NoZWNrYm94X2luX3RhYmxlKCBlbF9zdHV0dXMsIGVsX2NsYXNzICl7XG4gICAgIGpRdWVyeSgnLicrZWxfY2xhc3MpLmF0dHIoJ2NoZWNrZWQnLCBlbF9zdHV0dXMpO1xuXG4gICAgIGlmICggZWxfc3R1dHVzICkge1xuICAgICAgICBqUXVlcnkoJy4nK2VsX2NsYXNzKS5wYXJlbnQoKS5wYXJlbnQoKS5wYXJlbnQoKS5wYXJlbnQoKS5hZGRDbGFzcygncm93X3NlbGVjdGVkX2NvbG9yJyk7XG4gICAgICAgIC8vIGpRdWVyeSgnLicrZWxfY2xhc3MpLnBhcmVudCgpLnBhcmVudCgpLmFkZENsYXNzKCd3YXJuaW5nJyk7XG4gICAgIH0gZWxzZSB7XG4gICAgICAgIGpRdWVyeSgnLicrZWxfY2xhc3MpLnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLnJlbW92ZUNsYXNzKCdyb3dfc2VsZWN0ZWRfY29sb3InKTtcbiAgICAgICAgLy8galF1ZXJ5KCcuJytlbF9jbGFzcykucGFyZW50KCkucGFyZW50KCkucmVtb3ZlQ2xhc3MoJ3dhcm5pbmcnKTtcbiAgICAgfSAgICAgXG59XG4gICBcblxuLyoqIEFqYXggUmVxdWVzdFxuICogXG4gKiBAcGFyYW0ge3R5cGV9IHVzX2lkXG4gKiBAcGFyYW0ge3R5cGV9IHdpbmRvd19pZFxuICogQHJldHVybnMge3VuZGVmaW5lZH1cbiAqL1xuLy88IVtDREFUQVtcbmZ1bmN0aW9uIG9wZXJfdmVyaWZ5X3dpbmRvd19vcGVuaW5nKCB1c19pZCwgd2luZG93X2lkICl7XG5cbiAgICAgICAgdmFyIGlzX2Nsb3NlZCA9IDA7XG5cbiAgICAgICAgaWYgKGpRdWVyeSgnIycgKyB3aW5kb3dfaWQgKS5oYXNDbGFzcygnY2xvc2VkJykgPT0gdHJ1ZSl7XG4gICAgICAgICAgICBqUXVlcnkoJyMnICsgd2luZG93X2lkICkucmVtb3ZlQ2xhc3MoJ2Nsb3NlZCcpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgalF1ZXJ5KCcjJyArIHdpbmRvd19pZCApLmFkZENsYXNzKCdjbG9zZWQnKTtcbiAgICAgICAgICAgIGlzX2Nsb3NlZCA9IDE7XG4gICAgICAgIH1cblxuXG4gICAgICAgIGpRdWVyeS5hamF4KHsgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gU3RhcnQgQWpheCBTZW5kaW5nXG4gICAgICAgICAgICAgICAgdXJsOiBvcGVyX2dsb2JhbDEub3Blcl9hamF4dXJsLFxuICAgICAgICAgICAgICAgIHR5cGU6J1BPU1QnLFxuICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhLCB0ZXh0U3RhdHVzKXtpZiggdGV4dFN0YXR1cyA9PSAnc3VjY2VzcycpICAgalF1ZXJ5KCcjYWpheF9yZXNwb25kJykuaHRtbCggZGF0YSApO30sXG4gICAgICAgICAgICAgICAgZXJyb3I6ZnVuY3Rpb24gKFhNTEh0dHBSZXF1ZXN0LCB0ZXh0U3RhdHVzLCBlcnJvclRocm93bil7IHdpbmRvdy5zdGF0dXMgPSAnQWpheCBzZW5kaW5nIEVycm9yIHN0YXR1czonKyB0ZXh0U3RhdHVzOyBhbGVydChYTUxIdHRwUmVxdWVzdC5zdGF0dXMgKyAnICcgKyBYTUxIdHRwUmVxdWVzdC5zdGF0dXNUZXh0KTsgaWYgKCBYTUxIdHRwUmVxdWVzdC5zdGF0dXMgPT0gNTAwICkgeyBhbGVydCgnRXJyb3I6IDUwMCcpOyB9IH0gLFxuICAgICAgICAgICAgICAgIC8vIGJlZm9yZVNlbmQ6IHNvbWVGdW5jdGlvbixcbiAgICAgICAgICAgICAgICBkYXRhOntcbiAgICAgICAgICAgICAgICAgICAgYWN0aW9uOiAgICAgJ1VTRVJfU0FWRV9XSU5ET1dfU1RBVEUnLFxuICAgICAgICAgICAgICAgICAgICB1c2VyX2lkOiAgICB1c19pZCAsXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdzogICAgIHdpbmRvd19pZCxcbiAgICAgICAgICAgICAgICAgICAgaXNfY2xvc2VkOiAgaXNfY2xvc2VkLFxuICAgICAgICAgICAgICAgICAgICBvcGVyX25vbmNlOiBqUXVlcnkoJyNvcGVyX2FkbWluX3BhbmVsX25vbmNlJykudmFsKClcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG59XG4vL11dPlxuXG5cblxuLyoqIEFqYXggUmVxdWVzdCAtIFNhdmluZyBDdXN0b20gRGF0YSBmb3IgVXNlclxuICogXG4gKiBAcGFyYW0ge2ludH0gdXNfaWRcbiAqIEBwYXJhbSB7c3RyaW5nfSBkYXRhX25hbWVcbiAqIEBwYXJhbSB7c3RyaW5nfSBkYXRhX3ZhbHVlIC0gc2VyaWFsaXplZCBkYXRhXG4gKiBAcGFyYW0ge2ludH0gaXNfcmVsb2FkICAtICB7IDAgfCAxIH0gcmVsb2FkIG9yIG5vdCBwYWdlXG4gKi9cbi8vPCFbQ0RBVEFbXG5mdW5jdGlvbiBvcGVyX3NhdmVfY3VzdG9tX3VzZXJfZGF0YSggdXNfaWQsIGRhdGFfbmFtZSwgZGF0YV92YWx1ZSAsIGlzX3JlbG9hZCApe1xuXG4gICAgICAgIG9wZXJfYWRtaW5fc2hvd19tZXNzYWdlX3Byb2Nlc3NpbmcoICdzYXZpbmcnICk7XG5cbiAgICAgICAgalF1ZXJ5LmFqYXgoeyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBTdGFydCBBamF4IFNlbmRpbmdcbiAgICAgICAgICAgICAgICB1cmw6IG9wZXJfZ2xvYmFsMS5vcGVyX2FqYXh1cmwsXG4gICAgICAgICAgICAgICAgdHlwZTonUE9TVCcsXG4gICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEsIHRleHRTdGF0dXMpe2lmKCB0ZXh0U3RhdHVzID09ICdzdWNjZXNzJykgICBqUXVlcnkoJyNhamF4X3Jlc3BvbmQnKS5odG1sKCBkYXRhICk7fSxcbiAgICAgICAgICAgICAgICBlcnJvcjpmdW5jdGlvbiAoWE1MSHR0cFJlcXVlc3QsIHRleHRTdGF0dXMsIGVycm9yVGhyb3duKXsgd2luZG93LnN0YXR1cyA9ICdBamF4IHNlbmRpbmcgRXJyb3Igc3RhdHVzOicrIHRleHRTdGF0dXM7IGFsZXJ0KFhNTEh0dHBSZXF1ZXN0LnN0YXR1cyArICcgJyArIFhNTEh0dHBSZXF1ZXN0LnN0YXR1c1RleHQpOyBpZiAoIFhNTEh0dHBSZXF1ZXN0LnN0YXR1cyA9PSA1MDAgKSB7IGFsZXJ0KCdFcnJvcjogNTAwJyk7IH0gfSAsXG4gICAgICAgICAgICAgICAgLy8gYmVmb3JlU2VuZDogc29tZUZ1bmN0aW9uLFxuICAgICAgICAgICAgICAgIGRhdGE6e1xuICAgICAgICAgICAgICAgICAgICBhY3Rpb246ICAgICAnVVNFUl9TQVZFX0NVU1RPTV9EQVRBJyxcbiAgICAgICAgICAgICAgICAgICAgdXNlcl9pZDogICAgdXNfaWQsXG4gICAgICAgICAgICAgICAgICAgIGRhdGFfbmFtZTogIGRhdGFfbmFtZSxcbiAgICAgICAgICAgICAgICAgICAgZGF0YV92YWx1ZTogZGVjb2RlVVJJQ29tcG9uZW50KCBkYXRhX3ZhbHVlICksXG4gICAgICAgICAgICAgICAgICAgIGlzX3JlbG9hZDogIGlzX3JlbG9hZCwgXG4gICAgICAgICAgICAgICAgICAgIG9wZXJfbm9uY2U6IGpRdWVyeSgnI29wZXJfYWRtaW5fcGFuZWxfbm9uY2UnKS52YWwoKVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbn1cbi8vXV0+XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIENvbnRhY3QgRm9ybVxuLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cbmZ1bmN0aW9uIG9wZXJfc3VibWl0X2NsaWVudF9mb3JtKCBzdWJtaXRfZm9ybSwgd3BkZXZfYWN0aXZlX2xvY2FsZSApe1xuICAgIFxuICAgIHZhciBjb3VudCA9IHN1Ym1pdF9mb3JtLmVsZW1lbnRzLmxlbmd0aDtcbiAgICB2YXIgZm9ybWRhdGEgPSAnJztcbiAgICB2YXIgaW5wX3ZhbHVlO1xuICAgIHZhciBlbGVtZW50O1xuICAgIHZhciBlbF90eXBlO1xuXG4gICAgZm9yIChpPTA7IGk8Y291bnQ7IGkrKykgICB7XG4gICAgICAgIGVsZW1lbnQgPSBzdWJtaXRfZm9ybS5lbGVtZW50c1tpXTtcblxuICAgICAgICBpZiAoIChlbGVtZW50LnR5cGUgIT09J2J1dHRvbicpICYmIChlbGVtZW50LnR5cGUgIT09J2hpZGRlbicpICkgeyAgICAgICBcblxuICAgICAgICAgICAgLy8gR2V0IFZhbHVlIG9mIEVsZW1lbnRcbiAgICAgICAgICAgIGlmICggZWxlbWVudC50eXBlID09ICdjaGVja2JveCcgKXtcblxuICAgICAgICAgICAgICAgIGlmICggZWxlbWVudC52YWx1ZSA9PSAnJyApIHtcbiAgICAgICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gZWxlbWVudC5jaGVja2VkO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIGlmICggZWxlbWVudC5jaGVja2VkICkgXG4gICAgICAgICAgICAgICAgICAgICAgICBpbnBfdmFsdWUgPSBlbGVtZW50LnZhbHVlO1xuICAgICAgICAgICAgICAgICAgICBlbHNlIFxuICAgICAgICAgICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gJyc7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB9IGVsc2UgaWYgKCBlbGVtZW50LnR5cGUgPT0gJ3JhZGlvJyApIHtcblxuICAgICAgICAgICAgICAgIGlmICggZWxlbWVudC52YWx1ZSA9PSAnJyApIHtcbiAgICAgICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gZWxlbWVudC5jaGVja2VkO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIGlmICggZWxlbWVudC5jaGVja2VkICkgXG4gICAgICAgICAgICAgICAgICAgICAgICBpbnBfdmFsdWUgPSBlbGVtZW50LnZhbHVlO1xuICAgICAgICAgICAgICAgICAgICBlbHNlIFxuICAgICAgICAgICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gJyc7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIC8qXG4gICAgICAgICAgICAgICAgaWYgKCBlbGVtZW50LmNoZWNrZWQgKSBcbiAgICAgICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gZWxlbWVudC52YWx1ZTsgXG4gICAgICAgICAgICAgICAgZWxzZSBcbiAgICAgICAgICAgICAgICAgICAgY29udGludWU7XG4gICAgICAgICAgICAgICAgKi9cbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gZWxlbWVudC52YWx1ZTtcbiAgICAgICAgICAgIH0gICAgICAgICAgICAgICAgICAgICAgXG5cbiAgICAgICAgICAgIC8vIEdldCB2YWx1ZSBpbiBzZWxlY3Rib3ggb2YgbXVsdGlwbGUgc2VsZWN0aW9uXG4gICAgICAgICAgICBpZiAoZWxlbWVudC50eXBlID09J3NlbGVjdC1tdWx0aXBsZScpIHtcbiAgICAgICAgICAgICAgICBpbnBfdmFsdWUgPSBqUXVlcnkoJ1tuYW1lPVwiJytlbGVtZW50Lm5hbWUrJ1wiXScpLnZhbCgpIDtcbiAgICAgICAgICAgICAgICBpZiAoICggaW5wX3ZhbHVlID09IG51bGwgKSB8fCAoIGlucF92YWx1ZS50b1N0cmluZygpID09ICcnICkgKVxuICAgICAgICAgICAgICAgICAgICBpbnBfdmFsdWU9Jyc7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIC8qaWYgKCBlbGVtZW50Lm5hbWUgPT0gKCdwaG9uZScpICkge1xuICAgICAgICAgICAgICAgIC8vIHdlIHZhbGlkYXRlIGEgcGhvbmUgbnVtYmVyIG9mIDEwIGRpZ2l0cyB3aXRoIG5vIGNvbW1hLCBubyBzcGFjZXMsIG5vIHB1bmN0dWF0aW9uIGFuZCB0aGVyZSB3aWxsIGJlIG5vICsgc2lnbiBpbiBmcm9udCB0aGUgbnVtYmVyIC0gU2VlIG1vcmUgYXQ6IGh0dHA6Ly93d3cudzNyZXNvdXJjZS5jb20vamF2YXNjcmlwdC9mb3JtL3Bob25lLW5vLXZhbGlkYXRpb24ucGhwI3N0aGFzaC5VOUZId2NkVy5kcHVmXG4gICAgICAgICAgICAgICAgdmFyIHJlZyA9ICAvXlxcZHsxMH0kLztcbiAgICAgICAgICAgICAgICB2YXIgbWVzc2FnZV92ZXJpZl9waG9uZSA9IFwiUGxlYXNlIGVudGVyIGNvcnJlY3RseSBwaG9uZSBudW1iZXJcIjtcbiAgICAgICAgICAgICAgICBpZiAoIGlucF92YWx1ZSAhPSAnJyApXG4gICAgICAgICAgICAgICAgICAgIGlmKHJlZy50ZXN0KGlucF92YWx1ZSkgPT0gZmFsc2UpIHtvcGVyX3Nob3dfZXJyb3JfbWVzc2FnZSggZWxlbWVudCAsIG1lc3NhZ2VfdmVyaWZfcGhvbmUpO3JldHVybjt9XG4gICAgICAgICAgICB9Ki9cblxuXG4gICAgICAgICAgICAvLyBWYWxpZGF0aW9uIENoZWNrIC0tIFJlcXVyZWQgZmllbGRzXG4gICAgICAgICAgICBpZiAoIGVsZW1lbnQuY2xhc3NOYW1lLmluZGV4T2YoICdvcGVyLXZhbGlkYXRlLXJlcXVpcmVkJyApICE9PSAtMSApe1xuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIGlmICAoICggZWxlbWVudC50eXBlID09J2NoZWNrYm94JyApICYmICggZWxlbWVudC5jaGVja2VkID09PSBmYWxzZSApICkge1xuICAgICAgICAgICAgICAgICAgICBpZiAoICEgalF1ZXJ5KCc6Y2hlY2tib3hbbmFtZT1cIicrZWxlbWVudC5uYW1lKydcIl0nLCBzdWJtaXRfZm9ybSkuaXMoXCI6Y2hlY2tlZFwiKSApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIG9wZXJfc2hvd19lcnJvcl9tZXNzYWdlKCBlbGVtZW50ICwgb3Blcl9nbG9iYWwxLm1lc3NhZ2VfdmVyaWZfcmVxdXJlZF9mb3JfY2hlY2tfYm94KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybjsgICAgICAgICAgICAgICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgaWYgICggZWxlbWVudC50eXBlID09J3JhZGlvJyApIHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKCAhIGpRdWVyeSgnOnJhZGlvW25hbWU9XCInK2VsZW1lbnQubmFtZSsnXCJdJywgc3VibWl0X2Zvcm0pLmlzKFwiOmNoZWNrZWRcIikgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBvcGVyX3Nob3dfZXJyb3JfbWVzc2FnZSggZWxlbWVudCAsIG9wZXJfZ2xvYmFsMS5tZXNzYWdlX3ZlcmlmX3JlcXVyZWRfZm9yX3JhZGlvX2JveCk7XG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm47ICAgICAgICAgICAgICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGlmICAoICggZWxlbWVudC50eXBlICE9J2NoZWNrYm94JyApICYmICggZWxlbWVudC50eXBlICE9J3JhZGlvJyApICYmICggaW5wX3ZhbHVlID09PSAnJyApICkge1xuICAgICAgICAgICAgICAgICAgICBvcGVyX3Nob3dfZXJyb3JfbWVzc2FnZSggZWxlbWVudCAsIG9wZXJfZ2xvYmFsMS5tZXNzYWdlX3ZlcmlmX3JlcXVyZWQpO1xuICAgICAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAvLyBWYWxpZGF0aW9uIENoZWNrIC0tLSBFbWFpbCBjb3JyZWN0IGZpbGxpbmcgZmllbGRcbiAgICAgICAgICAgIGlmICggZWxlbWVudC5jbGFzc05hbWUuaW5kZXhPZiggJ29wZXItdmFsaWRhdGUtZW1haWwnICkgIT09IC0xICl7XG4gICAgICAgICAgICAgICAgdmFyIHJlZyA9IC9eKFtBLVphLXowLTlfXFwtXFwuXSkrXFxAKFtBLVphLXowLTlfXFwtXFwuXSkrXFwuKFtBLVphLXpdezIsfSkkLztcbiAgICAgICAgICAgICAgICBpZiAoICggaW5wX3ZhbHVlICE9ICcnICkgJiYgKCByZWcudGVzdChpbnBfdmFsdWUpID09IGZhbHNlICkgKSB7XG4gICAgICAgICAgICAgICAgICAgIG9wZXJfc2hvd19lcnJvcl9tZXNzYWdlKCBlbGVtZW50ICwgIG9wZXJfZ2xvYmFsMS5tZXNzYWdlX3ZlcmlmX2VtYWlsICk7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIC8qXG4gICAgICAgICAgICAvLyBWYWxpZGF0aW9uIENoZWNrIC0tLSBTYW1lIEVtYWlsIEZpZWxkXG4gICAgICAgICAgICBpZiAoICggZWxlbWVudC5jbGFzc05hbWUuaW5kZXhPZignd3BkZXYtdmFsaWRhdGVzLWFzLWVtYWlsJykgIT09IC0xICkgJiYgKCBlbGVtZW50LmNsYXNzTmFtZS5pbmRleE9mKCdzYW1lX2FzXycpICE9PSAtMSApICkgeyBcblxuICAgICAgICAgICAgICAgIC8vIEdldCAgdGhlIG5hbWUgb2YgUHJpbWFyeSBFbWFpbCBmaWVsZCBmcm9tIHRoZSBcInNhbWVfYXNfTkFNRVwiIGNsYXNzICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICB2YXIgcHJpbWFyeV9lbWFpbF9uYW1lID0gZWxlbWVudC5jbGFzc05hbWUubWF0Y2goL3NhbWVfYXNfKFteXFxzXSkrL2dpKTsgXG4gICAgICAgICAgICAgICAgaWYgKHByaW1hcnlfZW1haWxfbmFtZSAhPSBudWxsKSB7IC8vIFdlIGZvdW5kXG4gICAgICAgICAgICAgICAgICAgIHByaW1hcnlfZW1haWxfbmFtZSA9IHByaW1hcnlfZW1haWxfbmFtZVswXS5zdWJzdHIoOCk7XG5cbiAgICAgICAgICAgICAgICAgICAgLy8gUmVjZWhjayBpZiBzdWNoIHByaW1hcnkgZW1haWwgZmllbGQgZXhpc3QgaW4gdGhlICBmb3JtXG4gICAgICAgICAgICAgICAgICAgIGlmIChqUXVlcnkoJ1tuYW1lPVwiJyArIHByaW1hcnlfZW1haWxfbmFtZSAgKyAnXCJdJykubGVuZ3RoID4gMCkge1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBSZWNoZWNrIHRoZSB2YWx1ZXMgb2YgdGhlIGJvdGggZW1haWxzLCBpZiB0aGV5IGRvICBub3QgZXF1bGEgc2hvdyB3YXJuaW5nICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICggalF1ZXJ5KCdbbmFtZT1cIicgKyBwcmltYXJ5X2VtYWlsX25hbWUgICsgJ1wiXScpLnZhbCgpICE9PSBpbnBfdmFsdWUgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb3Blcl9zaG93X2Vycm9yX21lc3NhZ2UoIGVsZW1lbnQgLCBvcGVyX2dsb2JhbDEubWVzc2FnZV92ZXJpZl9zYW1lX2VtZWlsICk7cmV0dXJuO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIC8vIFNraXAgb25lIGxvb3AgZm9yIHRoZSBlbWFpbCB2ZXJ5ZmljYXRpb24gZmllbGRcbiAgICAgICAgICAgICAgICBjb250aW51ZTtcbiAgICAgICAgICAgIH0gKi9cblxuICAgICAgICAgICAgLypcbiAgICAgICAgICAgIC8vIEdldCBGb3JtIERhdGFcbiAgICAgICAgICAgIGlmICggZWxlbWVudC5uYW1lICE9PSAoJ2NhcHRjaGFfaW5wdXQnICkgKSB7XG4gICAgICAgICAgICAgICAgaWYgKGZvcm1kYXRhICE9PScnKSBmb3JtZGF0YSArPSAgJ34nOyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIG5leHQgZmllbGQgZWxlbWVudFxuXG4gICAgICAgICAgICAgICAgZWxfdHlwZSA9IGVsZW1lbnQudHlwZTtcbiAgICAgICAgICAgICAgICBpZiAoIGVsZW1lbnQuY2xhc3NOYW1lLmluZGV4T2YoJ3dwZGV2LXZhbGlkYXRlcy1hcy1lbWFpbCcpICE9PSAtMSApICBlbF90eXBlPSdlbWFpbCc7XG4gICAgICAgICAgICAgICAgaWYgKCBlbGVtZW50LmNsYXNzTmFtZS5pbmRleE9mKCd3cGRldi12YWxpZGF0ZXMtYXMtY291cG9uJykgIT09IC0xICkgZWxfdHlwZT0nY291cG9uJztcblxuICAgICAgICAgICAgICAgIGlucF92YWx1ZSA9IGlucF92YWx1ZSArICcnO1xuICAgICAgICAgICAgICAgIGlucF92YWx1ZSA9IGlucF92YWx1ZS5yZXBsYWNlKG5ldyBSZWdFeHAoXCJcXFxcXlwiLCdnJyksICcmIzk0OycpOyAvLyByZXBsYWNlIHJlZ2lzdGVyZWQgY2hhcmFjdGVyc1xuICAgICAgICAgICAgICAgIGlucF92YWx1ZSA9IGlucF92YWx1ZS5yZXBsYWNlKG5ldyBSZWdFeHAoXCJ+XCIsJ2cnKSwgJyYjMTI2OycpOyAvLyByZXBsYWNlIHJlZ2lzdGVyZWQgY2hhcmFjdGVyc1xuXG4gICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gaW5wX3ZhbHVlLnJlcGxhY2UoL1wiL2csICcmIzM0OycpOyAvLyByZXBsYWNlIGRvdWJsZSBxdW90XG4gICAgICAgICAgICAgICAgaW5wX3ZhbHVlID0gaW5wX3ZhbHVlLnJlcGxhY2UoLycvZywgJyYjMzk7Jyk7IC8vIHJlcGxhY2Ugc2luZ2xlIHF1b3RcblxuICAgICAgICAgICAgICAgIGZvcm1kYXRhICs9IGVsX3R5cGUgKyAnXicgKyBlbGVtZW50Lm5hbWUgKyAnXicgKyBpbnBfdmFsdWUgOyAgICAgICAgICAgICAgICAgICAgLy8gZWxlbWVudCBhdHRyXG4gICAgICAgICAgICB9ICovXG4gICAgICAgIH1cblxuICAgIH0gIC8vIEVuZCBGaWVsZHMgTG9vcFxuICAgIFxuICAgICAgICBcbiAgICBzdWJtaXRfZm9ybS50cmlnZ2VyKCAnc3VibWl0JyApOyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBTdWJtaXQgRm9ybSwgIGlmIHByZXZpb3VzbHkgIHdhcyBubyBpbnRlcnVwdGlvbnNcbn1cblxuXG4vKipcbiAqIFNob3cgbWVzc2FnZSB1bmRlciBzcGVjaWZpYyBlbGVtZW50XG4gKiBcbiAqIEBwYXJhbSB7dHlwZX0gZWxlbWVudCAtIGpRdWVyeSBkZWZpbml0aW9uICBvZiB0aGUgZWxlbWVudFxuICogQHBhcmFtIHt0eXBlfSBlcnJvck1lc3NhZ2UgLSBTdHJpbmcgbWVzc2FnZVxuICogQHBhcmFtIHt0eXBlfSBtZXNzYWdlX3R5cGUgXCJcIiB8IFwiYWxlcnQtd2FybmluZ1wiIHwgXCJhbGVydC1zdWNjZXNzXCIgfCBcImFsZXJ0LWluZm9cIiB8IFwiYWxlcnQtZGFuZ2VyXCJcbiAqL1xuZnVuY3Rpb24gb3Blcl9zaG93X21lc3NhZ2VfdW5kZXJfZWxlbWVudCggZWxlbWVudCAsIGVycm9yTWVzc2FnZSAsIG1lc3NhZ2VfdHlwZSkge1xuICAgIFxuICAgICBvcGVyX3Njcm9sbF90byggZWxlbWVudCApO1xuICAgIFxuICAgICBpZiAoIGpRdWVyeSggZWxlbWVudCApLmF0dHIoJ3R5cGUnKSA9PSBcInJhZGlvXCIgKSB7XG4gICAgICAgIGpRdWVyeSggZWxlbWVudCApLnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpXG4gICAgICAgICAgICAgICAgLmFmdGVyKCc8c3BhbiBjbGFzcz1cIm9wZXItbmVhci1maWVsZC1tZXNzYWdlIGFsZXJ0ICcrIG1lc3NhZ2VfdHlwZSArJ1wiPicrIGVycm9yTWVzc2FnZSArJzwvc3Bhbj4nKTsgLy8gU2hvdyBtZXNzYWdlXG5cbiAgICB9IGVsc2UgaWYgKGpRdWVyeSggZWxlbWVudCApLmF0dHIoJ3R5cGUnKSA9PSBcImNoZWNrYm94XCIpIHtcbiAgICAgICAgalF1ZXJ5KCBlbGVtZW50ICkucGFyZW50KClcbiAgICAgICAgICAgICAgICAuYWZ0ZXIoJzxzcGFuIGNsYXNzPVwib3Blci1uZWFyLWZpZWxkLW1lc3NhZ2UgYWxlcnQgJysgbWVzc2FnZV90eXBlICsnXCI+JysgZXJyb3JNZXNzYWdlICsnPC9zcGFuPicpOyAvLyBTaG93IG1lc3NhZ2VcblxuICAgIH0gZWxzZSB7XG4gICAgICAgIGpRdWVyeSggZWxlbWVudCApXG4gICAgICAgICAgICAgICAgLmFmdGVyKCc8c3BhbiBjbGFzcz1cIm9wZXItbmVhci1maWVsZC1tZXNzYWdlIGFsZXJ0ICcrIG1lc3NhZ2VfdHlwZSArJ1wiPicrIGVycm9yTWVzc2FnZSArJzwvc3Bhbj4nKTsgLy8gU2hvdyBtZXNzYWdlXG4gICAgfVxuICAgIGpRdWVyeShcIi53aWRnZXRfb3BlciAub3Blci1uZWFyLWZpZWxkLW1lc3NhZ2VcIilcbiAgICAgICAgICAgIC5jc3MoIHsndmVydGljYWwtYWxpZ24nOiAnc3ViJyB9ICkgO1xuICAgIGpRdWVyeShcIi5vcGVyLW5lYXItZmllbGQtbWVzc2FnZVwiKVxuICAgICAgICAgICAgLmFuaW1hdGUoIHtvcGFjaXR5OiAxfSwgMTAwMDAgKVxuICAgICAgICAgICAgLmZhZGVPdXQoIDIwMDAgKTsgXG59XG5cblxuLy8gU2hvdyBFcnJvciBNZXNzYWdlIGluICBGb3JtICBhdCBGcm9udCBFbmRcbmZ1bmN0aW9uIG9wZXJfc2hvd19lcnJvcl9tZXNzYWdlKCBlbGVtZW50ICwgZXJyb3JNZXNzYWdlKSB7XG5cbiAgICAvLyBTY3JvbGwgdG8gdGhlIGVsZW1lbnRcbiAgICBvcGVyX3Njcm9sbF90byggZWxlbWVudCApO1xuXG4gICAgalF1ZXJ5KFwiW25hbWU9J1wiKyBlbGVtZW50Lm5hbWUgK1wiJ11cIilcbiAgICAgICAgICAgIC5mYWRlT3V0KCAzNTAgKS5mYWRlSW4oIDMwMCApXG4gICAgICAgICAgICAuZmFkZU91dCggMzUwICkuZmFkZUluKCA0MDAgKVxuICAgICAgICAgICAgLmZhZGVPdXQoIDM1MCApLmZhZGVJbiggMzAwIClcbiAgICAgICAgICAgIC5mYWRlT3V0KCAzNTAgKS5mYWRlSW4oIDQwMCApXG4gICAgICAgICAgICAuYW5pbWF0ZSgge29wYWNpdHk6IDF9LCA0MDAwIClcbiAgICA7ICAvLyBtYXJrIHJlZCBib3JkZXJcbiAgICBcbiAgICBpZiAoalF1ZXJ5KFwiW25hbWU9J1wiKyBlbGVtZW50Lm5hbWUgK1wiJ11cIikuYXR0cigndHlwZScpID09IFwicmFkaW9cIikge1xuICAgICAgICBqUXVlcnkoXCJbbmFtZT0nXCIrIGVsZW1lbnQubmFtZSArXCInXVwiKS5wYXJlbnQoKS5wYXJlbnQoKS8vLnBhcmVudCgpXG4gICAgICAgICAgICAgICAgLmFmdGVyKCc8c3BhbiBjbGFzcz1cIm9wZXItbmVhci1maWVsZC1tZXNzYWdlIGFsZXJ0IGFsZXJ0LXdhcm5pbmdcIj4nKyBlcnJvck1lc3NhZ2UgKyc8L3NwYW4+Jyk7IC8vIFNob3cgbWVzc2FnZVxuXG4gICAgfSBlbHNlIGlmIChqUXVlcnkoXCJbbmFtZT0nXCIrIGVsZW1lbnQubmFtZSArXCInXVwiKS5hdHRyKCd0eXBlJykgPT0gXCJjaGVja2JveFwiKSB7XG4gICAgICAgIGpRdWVyeShcIltuYW1lPSdcIisgZWxlbWVudC5uYW1lICtcIiddXCIpLnBhcmVudCgpLnBhcmVudCgpXG4gICAgICAgICAgICAgICAgLmFmdGVyKCc8c3BhbiBjbGFzcz1cIm9wZXItbmVhci1maWVsZC1tZXNzYWdlIGFsZXJ0IGFsZXJ0LXdhcm5pbmdcIj4nKyBlcnJvck1lc3NhZ2UgKyc8L3NwYW4+Jyk7IC8vIFNob3cgbWVzc2FnZVxuXG4gICAgfSBlbHNlIHtcbiAgICAgICAgalF1ZXJ5KFwiW25hbWU9J1wiKyBlbGVtZW50Lm5hbWUgK1wiJ11cIilcbiAgICAgICAgICAgICAgICAuYWZ0ZXIoJzxzcGFuIGNsYXNzPVwib3Blci1uZWFyLWZpZWxkLW1lc3NhZ2UgYWxlcnQgYWxlcnQtd2FybmluZ1wiPicrIGVycm9yTWVzc2FnZSArJzwvc3Bhbj4nKTsgLy8gU2hvdyBtZXNzYWdlXG4gICAgfVxuICAgIGpRdWVyeShcIi5vcGVyLW5lYXItZmllbGQtbWVzc2FnZVwiKVxuICAgICAgICAgICAgLmNzcyggeydwYWRkaW5nJyA6ICc1cHggNXB4IDRweCcsICdtYXJnaW4nIDogJzJweCcsICd2ZXJ0aWNhbC1hbGlnbic6ICd0b3AnLCAnbGluZS1oZWlnaHQnOiAnMzJweCcgfSApO1xuICAgIFxuICAgIGlmICggZWxlbWVudC50eXBlID09ICdjaGVja2JveCcgKVxuICAgICAgICBqUXVlcnkoXCIub3Blci1uZWFyLWZpZWxkLW1lc3NhZ2VcIikuY3NzKCB7ICd2ZXJ0aWNhbC1hbGlnbic6ICdtaWRkbGUnfSApO1xuICAgICAgICAgICAgXG4gICAgalF1ZXJ5KFwiLndpZGdldF9vcGVyIC5vcGVyLW5lYXItZmllbGQtbWVzc2FnZVwiKVxuICAgICAgICAgICAgLmNzcyggeyd2ZXJ0aWNhbC1hbGlnbic6ICdzdWInIH0gKSA7XG4gICAgalF1ZXJ5KFwiLm9wZXItbmVhci1maWVsZC1tZXNzYWdlXCIpXG4gICAgICAgICAgICAuYW5pbWF0ZSgge29wYWNpdHk6IDF9LCAxMDAwMCApXG4gICAgICAgICAgICAuZmFkZU91dCggMjAwMCApOyAgIFxuICAgIGVsZW1lbnQuZm9jdXMoKTsgICAgLy8gbWFrZSBmb2N1cyB0byBlbGVtbnRcbiAgICByZXR1cm47XG5cbn1cblxuXG4vKipcbiAqIFJlbG9hZCB0aGUgcGFnZSB3aXRoICBuZXcgcGFyYW1ldGVyIHZhbHVlLlxuICogXG4gKiBAcGFyYW0ge3R5cGV9IHVybCAgICAgICAgICAgIC0gZnVsbCBVUkwgIG9mIHRoZSBwYWdlLCAgY2FuIGluY2x1ZGUgb3IgZXhjbHVkZSB0aGF0IHBhcmFtZXRlclxuICogQHBhcmFtIHt0eXBlfSBwYXJhbSAgICAgICAgICAtIFVSTCBwYXJhbWV0ZXIgbmFtZVxuICogQHBhcmFtIHt0eXBlfSB2YWx1ZSAgICAgICAgICAtIFVSTCBwYXJhbWV0ZXIgdmFsdWVcbiAqIEByZXR1cm5zIHt1bmRlZmluZWR9XG4gKi9cbmZ1bmN0aW9uIG9wZXJfcmVsb2FkX3BhZ2Vfd2l0aF9wYXJhbWF0ZXIoIHVybCwgcGFyYW0sIHZhbHVlICkge1xuICAgIHZhciBoYXNoICAgICAgID0ge307XG4gICAgdmFyIHBhcnNlciAgICAgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdhJyk7XG5cbiAgICBwYXJzZXIuaHJlZiAgICA9IHVybDtcblxuICAgIHZhciBwYXJhbWV0ZXJzID0gcGFyc2VyLnNlYXJjaC5zcGxpdCgvXFw/fCYvKTtcblxuICAgIGZvcih2YXIgaT0wOyBpIDwgcGFyYW1ldGVycy5sZW5ndGg7IGkrKykge1xuICAgICAgICBpZighcGFyYW1ldGVyc1tpXSlcbiAgICAgICAgICAgIGNvbnRpbnVlO1xuXG4gICAgICAgIHZhciBhcnkgICAgICA9IHBhcmFtZXRlcnNbaV0uc3BsaXQoJz0nKTtcbiAgICAgICAgaGFzaFthcnlbMF1dID0gYXJ5WzFdO1xuICAgIH1cblxuICAgIGhhc2hbcGFyYW1dID0gdmFsdWU7XG5cbiAgICB2YXIgbGlzdCA9IFtdOyAgXG4gICAgT2JqZWN0LmtleXMoaGFzaCkuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG4gICAgICAgIGxpc3QucHVzaChrZXkgKyAnPScgKyBoYXNoW2tleV0pO1xuICAgIH0pO1xuXG4gICAgcGFyc2VyLnNlYXJjaCA9ICc/JyArIGxpc3Quam9pbignJicpO1xuICAgIC8vcmV0dXJuIHBhcnNlci5ocmVmO1xuICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gcGFyc2VyLmhyZWY7XG59XG5cbmpRdWVyeSggd2luZG93ICkub24oIFwibG9hZFwiLCBmdW5jdGlvbiAoKXsgICAgICAgLy9GaXhJbjogOC43LjkuN1xuXG4gICAgLy8gQ29sb3IgVGV4dCBwaWNrZXIgLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xuICAgIGlmICggalF1ZXJ5KCcuZmllbGQtdGV4dC1jb2xvcicpLmxlbmd0aCA+IDAgKSB7XG4gICAgICAgIGpRdWVyeSgnLmZpZWxkLXRleHQtY29sb3InKS5pcmlzKCB7XG4gICAgICAgICAgICBjaGFuZ2U6IGZ1bmN0aW9uKGV2ZW50LCB1aSl7XG4gICAgICAgICAgICAgICAgalF1ZXJ5KHRoaXMpLmNzcyggeyBiYWNrZ3JvdW5kQ29sb3I6IHVpLmNvbG9yLnRvU3RyaW5nKCkgfSApOyAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jbG9zZXN0KCcuZmllbGRzLWNvbG9yLWdyb3VwJykuZmluZCgnLmZpZWxkdmFsdWUnKS5jc3MoIHsgY29sb3I6IHVpLmNvbG9yLnRvU3RyaW5nKCkgfSApO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgLCBoaWRlOiB0cnVlXG4gICAgICAgICAgICAsIGJvcmRlcjogdHJ1ZVxuICAgICAgICAgICAgLCBwYWxldHRlczogWycjMzMzJywgJyM1NTUnLCAnIzc3NycsICcjYWFhJywgJyNmZmYnXSAgICAgICAgXG4gICAgICAgIH0gKS5lYWNoKCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jc3MoIHsgYmFja2dyb3VuZENvbG9yOiBqUXVlcnkodGhpcykudmFsKCkgfSApO1xuICAgICAgICB9KVxuICAgICAgICAub24oICdjbGljaycsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBqUXVlcnkoJy5pcmlzLXBpY2tlcicpLmhpZGUoKTtcbiAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jbG9zZXN0KCdkaXYnKS5maW5kKCcuaXJpcy1waWNrZXInKS5zaG93KCk7XG4gICAgICAgIH0pO1xuICAgIH1cbiAgICAvLyBDb2xvciBCYWNrZ3JvdW5kIHBpY2tlciAvLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vIFxuICAgIGlmICggalF1ZXJ5KCcuZmllbGQtYmFja2dyb3VuZC1jb2xvcicpLmxlbmd0aCA+IDAgKSB7XG4gICAgICAgIGpRdWVyeSgnLmZpZWxkLWJhY2tncm91bmQtY29sb3InKS5pcmlzKCB7XG4gICAgICAgICAgICBjaGFuZ2U6IGZ1bmN0aW9uKGV2ZW50LCB1aSl7XG4gICAgICAgICAgICAgICAgalF1ZXJ5KHRoaXMpLmNzcyggeyBiYWNrZ3JvdW5kQ29sb3I6IHVpLmNvbG9yLnRvU3RyaW5nKCkgfSApO1xuICAgICAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jbG9zZXN0KCcuZmllbGRzLWNvbG9yLWdyb3VwJykuZmluZCgnLmZpZWxkdmFsdWUnKS5jc3MoIHsgYmFja2dyb3VuZENvbG9yOiB1aS5jb2xvci50b1N0cmluZygpIH0gKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgICwgaGlkZTogdHJ1ZVxuICAgICAgICAgICAgLCBib3JkZXI6IHRydWVcbiAgICAgICAgICAgICwgcGFsZXR0ZXM6IFsgJyNGRkVFOTknLCAnIzQ1OScsICcjNzhiJywgJyNhYjAnLCAnI2RmNWQ1ZCcsICcjZjBmJ10gICAgICAgIFxuICAgICAgICB9ICkuZWFjaCggZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBqUXVlcnkodGhpcykuY3NzKCB7IGJhY2tncm91bmRDb2xvcjogalF1ZXJ5KHRoaXMpLnZhbCgpIH0gKTtcbiAgICAgICAgfSlcbiAgICAgICAgLm9uKCAnY2xpY2snLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgalF1ZXJ5KCcuaXJpcy1waWNrZXInKS5oaWRlKCk7XG4gICAgICAgICAgICBqUXVlcnkodGhpcykuY2xvc2VzdCgnZGl2JykuZmluZCgnLmlyaXMtcGlja2VyJykuc2hvdygpO1xuICAgICAgICB9KTtcblxuICAgICAgICBqUXVlcnkoJy5maWVsZC10ZXh0LWNvbG9yLCAuZmllbGQtYmFja2dyb3VuZC1jb2xvcicpLm9uKCAnY2xpY2snLCBmdW5jdGlvbihldmVudCl7XG4gICAgICAgICAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xuICAgIC8vIEdlbmVyYWwgQ29sb3IgcGlja2VyIGluIHNldHRpbmdzIHRhYmxlIC8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cbiAgICAvLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vXG4gICAgaWYgKCBqUXVlcnkoJy5vcGVyX2NvbG9ycGljaycpLmxlbmd0aCA+IDAgKSB7XG4gICAgICAgIGpRdWVyeSgnLm9wZXJfY29sb3JwaWNrJykuaXJpcygge1xuICAgICAgICAgICAgY2hhbmdlOiBmdW5jdGlvbihldmVudCwgdWkpe1xuICAgICAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jc3MoIHsgYmFja2dyb3VuZENvbG9yOiB1aS5jb2xvci50b1N0cmluZygpIH0gKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgICwgaGlkZTogdHJ1ZVxuICAgICAgICAgICAgLCBib3JkZXI6IHRydWVcbiAgICAgICAgICAgICwgcGFsZXR0ZXM6IFsnIzEyNScsICcjNDU5JywgJyM3OGInLCAnI2FiMCcsICcjZGUzJywgJyNmMGYnXSAgICAgICAgXG4gICAgICAgIH0gKS5lYWNoKCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jc3MoIHsgYmFja2dyb3VuZENvbG9yOiBqUXVlcnkodGhpcykudmFsKCkgfSApO1xuICAgICAgICB9KVxuICAgICAgICAub24oICdjbGljaycsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBqUXVlcnkoJy5pcmlzLXBpY2tlcicpLmhpZGUoKTtcbiAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5jbG9zZXN0KCd0ZCcpLmZpbmQoJy5pcmlzLXBpY2tlcicpLnNob3coKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgalF1ZXJ5KCdib2R5Jykub24oICdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgalF1ZXJ5KCcuaXJpcy1waWNrZXInKS5oaWRlKCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGpRdWVyeSgnLm9wZXJfY29sb3JwaWNrJykub24oICdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KXtcbiAgICAgICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICB9KTtcbiAgICB9XG4gICAgXG59KTsgICAgICAgICAgICBcblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFN1cHBvcnQgRnVuY3Rpb25zXG4vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vXG5cbi8qKlxuICogUmVzZXQgb2YgV1AgRWRpdG9yIG9yIFRleHRBcmVhIENvbnRlbnRcbiAqIEBwYXJhbSB7c3RyaW5nfSBlZGl0b3JfdGV4dGFyZWFfaWQgLSBJRCBvZiBlbGVtZW50XG4gKiBAcGFyYW0ge3N0cmluZ30gZWRpdG9yX3RleHRhcmVhX2NvbnRlbnQgLSBDb250ZW50XG4gKi9cbmZ1bmN0aW9uIG9wZXJfcmVzZXRfd3BfZWRpdG9yX2NvbnRlbnQoIGVkaXRvcl90ZXh0YXJlYV9pZCwgZWRpdG9yX3RleHRhcmVhX2NvbnRlbnQgKSB7XG4gICAgaWYoIHR5cGVvZiB0aW55bWNlICE9IFwidW5kZWZpbmVkXCIgKSB7XG4gICAgICAgIHZhciBlZGl0b3IgPSB0aW55bWNlLmdldCggZWRpdG9yX3RleHRhcmVhX2lkICk7XG4gICAgICAgIGlmKCBlZGl0b3IgJiYgZWRpdG9yIGluc3RhbmNlb2YgdGlueW1jZS5FZGl0b3IgKSB7XG4gICAgICAgICAgICBlZGl0b3Iuc2V0Q29udGVudCggZWRpdG9yX3RleHRhcmVhX2NvbnRlbnQgKTtcbiAgICAgICAgICAgIGVkaXRvci5zYXZlKCB7IG5vX2V2ZW50czogdHJ1ZSB9ICk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBqUXVlcnkoICcjJyArIGVkaXRvcl90ZXh0YXJlYV9pZCApLnZhbCggZWRpdG9yX3RleHRhcmVhX2NvbnRlbnQgKTtcbiAgICAgICAgfVxuICAgIH0gZWxzZSB7XG4gICAgICAgIGpRdWVyeSggJyMnICsgZWRpdG9yX3RleHRhcmVhX2lkICkudmFsKCBlZGl0b3JfdGV4dGFyZWFfY29udGVudCApO1xuICAgIH1cbn0iXSwiZmlsZSI6Il9vdXQvanMvYWRtaW4tc3VwcG9ydC5qcyJ9

(function (jQuery) {

  jQuery(document).ready(function () {

    // Initially disable the preview link
    var previewLink = jQuery('#site-preview');

    if (jQuery('#tswchc_message_wrapper').val() == "") {
      previewLink.prop('disabled', true);
      previewLink.addClass('disabled');
      console.log(1);
    } else {
      previewLink.prop('disabled', false);
      previewLink.removeClass('disabled');
      console.log(2);
    }

    // Listen for input changes on the text field
    jQuery('#tswchc_message_wrapper').on('input', function () {
      var inputVal = jQuery(this).val();

      // Enable the link if input length is at least 3 characters
      if (inputVal.length >= 3) {
        previewLink.prop('disabled', false);
        previewLink.css('pointer-events', 'auto'); // Allow clicking
        previewLink.css('opacity', '1'); // Make the button fully visible
      } else {
        previewLink.prop('disabled', true);
        previewLink.css('pointer-events', 'none'); // Disable clicking
        previewLink.css('opacity', '0.5'); // Make the button semi-transparent
      }
    });

    /***************************************************************************/

    var nectarButton = jQuery('a[data-effect="mfp-zoom-in"]');

    console.log(nectarButton);

    if (nectarButton.length) {
      nectarButton.remove();
    }

    /***************************************************************************/

    jQuery('#ts-wchc-spinner').appendTo(jQuery('p.submit'));

    var hide_rules = [];
    var prev_rules = jQuery('#tswchc_rules').val();

    if (!prev_rules) {
      prev_rules = [];
    }

    if (prev_rules.length) {

      hide_rules = JSON.parse(prev_rules);

    }

    jQuery('#ts-wchc-wrapper .btn-check').click(function () {

      var category = jQuery(this).data('category');
      var role = jQuery(this).data('role');

      var rule = {
        "category": category,
        "role": role
      };

      if (!tswchc_exists(rule)) {

        hide_rules.push(rule);

      } else {

        tswchc_remove_rule(rule);

      }

      var input_rules = "";

      if (hide_rules.length) {

        var input_rules = JSON.stringify(hide_rules);

      }

      jQuery('#tswchc_rules').val(input_rules);

      tswchc_update_rules_counters(jQuery(this));

    });

    /***/

    jQuery('#ts-wchc-wrapper .check-all').click(function () {

      jQuery('#ts-wchc-wrapper').addClass('loading');

      var accordion_body = jQuery(this).parents('.accordion-body');

      setTimeout(function () {

        jQuery(accordion_body).find('.btn-check').each(function () {

          if (!jQuery(this).prop('checked')) {
            jQuery(this).prop('checked', 'checked')
          }

          var category = jQuery(this).data('category');
          var role = jQuery(this).data('role');

          var rule = {
            "category": category,
            "role": role
          };

          if (!tswchc_exists(rule)) {

            hide_rules.push(rule);

          }

          tswchc_update_rules_counters(jQuery(this));

          var input_rules = "";

          if (hide_rules.length) {

            var input_rules = JSON.stringify(hide_rules);

          }

          jQuery('#tswchc_rules').val(input_rules);

          jQuery('#ts-wchc-wrapper').removeClass('loading');

        }, 100)

      })


    });

    /**/

    jQuery('#ts-wchc-wrapper .tswchc-clear-all').click(function () {

      jQuery('#ts-wchc-wrapper').addClass('loading');

      var accordion_body = jQuery(this).parents('.accordion-body');

      setTimeout(function () {

        jQuery(accordion_body).find('.btn-check').each(function () {

          if (jQuery(this).prop('checked')) {
            jQuery(this).prop('checked', '')
          }

          var category = jQuery(this).data('category');
          var role = jQuery(this).data('role');

          var rule = {
            "category": category,
            "role": role
          };

          if (tswchc_exists(rule)) {

            tswchc_remove_rule(rule);

          }

          tswchc_update_rules_counters(jQuery(this));

        })

        var input_rules = "";

        if (hide_rules.length) {

          var input_rules = JSON.stringify(hide_rules);

        }

        jQuery('#tswchc_rules').val(input_rules);

        jQuery('#ts-wchc-wrapper').removeClass('loading');

      }, 100);


    });

    /**/

    jQuery('#ts-wchc-wrapper  #ts-wchc-form').submit(function () {

      jQuery('#ts-wchc-spinner').fadeIn(300);

      jQuery('#ts-wchc-wrapper  #submit').prop('disabled', true);

    });

    /**/

    function tswchc_ajax_worker(data) {
      jQuery('#ts-wchc-wrapper').addClass('loading');

      // Add nonce to the data object
      data.nonce = tswchc_ajax_object.nonce;

      jQuery.ajax({
        type: 'POST',
        url: tswchc_ajax_object.ajax_url,
        data: data,
        success: function (response) {
          jQuery('#ts-wchc-wrapper').removeClass('loading');

          // Validate response structure
          if (typeof response !== 'object' || response === null || typeof response.success === 'undefined') {
            alert('Unexpected response format.');
            console.error('Invalid response:', response);
            return;
          }

          if (!response.success) {
            alert(response.data?.message || 'An error occurred while processing your request.');
            console.error('Error response:', response);
            return;
          }

          // Handle success cases based on the action
          switch (data.action) {
            case 'tswchc_generate_plugin_options_json':
              if (response.data?.file_url) {
                tswchc_generate_download_link(response.data.file_url);
              } else {
                alert('File URL is missing in the response.');
              }
              break;

            case 'tswchc_import_plugin_options_json':
              tswchc_display_import_message(response.data?.message || 'Import successful.', response.success);

              if (response.success) {
                setTimeout(function () {
                  location.reload();
                }, 500);
              }
              break;

            case 'tswchc_reset_plugin_options':
              location.reload();
              break;

            default:
              console.warn('Unhandled action:', data.action);
              break;
          }

          // Reset spinner position
          jQuery('#ts-wchc-spinner').appendTo(jQuery('p.submit')).hide();
          console.log(response);
        },
        error: function (xhr, textStatus, errorThrown) {
          jQuery('#ts-wchc-wrapper').removeClass('loading');
          alert('Network error: ' + textStatus + ' (' + xhr.status + ')');
          console.error('AJAX error:', xhr, textStatus, errorThrown);
        }
      });
    }



    /**/

    function tswchc_exists(rule) {

      var _exists = false;

      jQuery(hide_rules).each(function (x, y) {

        if (rule.category == y.category && rule.role == y.role) {

          _exists = true;

        }

      });

      return _exists;

    }

    /**/

    function tswchc_remove_rule(rule) {

      jQuery(hide_rules).each(function (x, y) {

        if (rule.category == y.category && rule.role == y.role) {

          hide_rules.splice(x, 1);

        }

      });

    }

    /**/

    function tswchc_update_rules_counters(element) {
      jQuery('.btn-check').not(jQuery(element)).each(function () {
        if (jQuery(this).data('category') == jQuery(element).data('category') && jQuery(this).data('role') == jQuery(element).data('role')) {
          var prop_checked = jQuery(element).prop('checked');
          jQuery(this).prop('checked', prop_checked).change();
        }
      });

      jQuery('.btn-group').each(function (x, button_g) {
        var counter = 0;
        var new_counter_text = "";
        var type = "";

        jQuery(this).find(':checked').each(function () {
          counter++;
          type = jQuery(this).data('type');
        });

        if (counter > 0) {
          if (type === "role") {
            // Get the translated string and replace %d with the counter
            new_counter_text = tswchc_translations.hidden_for_role.replace('%d', counter);

            // For plural handling, check the counter
            if (counter > 1) {
              new_counter_text = tswchc_translations.hidden_for_roles.replace('%d', counter);
            }
          } else {
            // Get the translated string and replace %d with the counter
            new_counter_text = tswchc_translations.hidden_category.replace('%d', counter);

            // For plural handling, check the counter
            if (counter > 1) {
              new_counter_text = tswchc_translations.hidden_categories.replace('%d', counter);
            }
          }
        }

        jQuery('small#' + jQuery(button_g).data('counter')).text(new_counter_text);
      });

    }


    /**/

    jQuery('#tswchc_redirect_mode').change(function () {

      var selected = jQuery(this).find(":selected").val();

      jQuery('.redirect-mode').each(function () {

        jQuery(this).fadeOut(0);

        if (jQuery(this).data('mode') == selected) {

          jQuery(this).fadeIn();

        }

      })

    })

    /**/

    function delay(callback, ms) {
      var timer = 0;
      return function () {
        var context = this,
          args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
    }

    /**/

    function tswchc_generate_download_link(file_path) {

      // Get the download link text from translations
      var download_link_text = tswchc_translations.download_link_text;

      // Create the new link HTML
      var link = '<a href="' + file_path + '" class="link-success" target="blank">' + download_link_text + '</a>';

      // Insert the new link after the #tswchc-export-settings element
      jQuery('#tswchc-settings-link-wrapper').html(link);
    }

    /**/

    function tswchc_display_import_message(message, success) {

      var message_class = "text-success";

      if (success == false) {
        message_class = "text-warning";
      }

      var message = '<p class="' + message_class + '">' + message + '</p>';

      jQuery(message).insertAfter(jQuery('#tswchc-import-settings'));

    }

    /***/

    jQuery('.ts-wchc-filter').keyup(delay(function (e) {

      var value = jQuery(this).val();
      value = value.toLowerCase();

      var selector = jQuery(this).parent().data('selector');
      var target = jQuery(this).parent().data('target');

      if (target == 'category') {

        jQuery(selector).each(function () {

          var cat_name = jQuery(this).data('category-name').toLowerCase();
          var cat_slug = jQuery(this).data('category-slug').toLowerCase();

          if (!cat_name.includes(value) && !cat_slug.includes(value)) {

            jQuery(this).parent().addClass('hidden');

          } else {

            jQuery(this).parent().removeClass('hidden');

          }

        })

      } else if (target == 'role') {

        jQuery(selector).each(function () {

          var role = jQuery(this).data('role').toLowerCase();

          if (!role.includes(value)) {

            jQuery(this).parent().addClass('hidden');

          } else {

            jQuery(this).parent().removeClass('hidden');

          }

        })

      }

    }, 300));

    /***/

    jQuery('#reset-settings').click(function (event) {
      event.preventDefault();
      event.stopPropagation();
      jQuery("#reset-settings-modal").modal('show');
    });

    jQuery('#clear-plugin-settings').click(function (event) {

      event.preventDefault();

      jQuery('#ts-wchc-spinner').insertAfter(jQuery(this));

      jQuery('#ts-wchc-spinner').fadeIn(300);

      jQuery('#reset-settings-modal button').prop('disabled', true);

      var data = {
        action: 'tswchc_reset_plugin_options',
        nonce: tswchc_ajax_object.nonce,
      };

      tswchc_ajax_worker(data);

      reloading_page = tswchc_translations.reloading_page;

      jQuery('#reset-settings-modal .modal-footer').append('<span>' + reloading_page + '</span>');

    });

    jQuery('#modal-btn-no').click(function () {
      jQuery("#reset-settings-modal").modal('hide');
    });

    /**/

    jQuery('#tswchc-export-settings').click(function (event) {

      event.preventDefault();

      jQuery('#ts-wchc-spinner').insertAfter(jQuery(this));

      jQuery('#ts-wchc-spinner').fadeIn(300);

      var data = {
        action: 'tswchc_generate_plugin_options_json',
      };

      console.log(data);

      tswchc_ajax_worker(data);

    });

    /**/

    var json_settings = '';

    jQuery('#settings_file').on('change', function (event) {
      const file_input = event.target;
      const file = file_input.files[0];

      if (!file) {
        alert('No file selected.');
        return;
      }

      const reader = new FileReader();

      reader.onload = function (e) {
        try {
          const json_data = JSON.parse(e.target.result);
          json_settings = json_data;
          jQuery('#tswchc-import-settings').removeClass('disabled');
        } catch (error) {
          console.error('Error parsing JSON:', error);
          alert('Error parsing JSON. Please check if the file is valid JSON.');
        }
      };

      reader.readAsText(file);

    });

    jQuery('#tswchc-import-settings').click(function (event) {

      event.preventDefault();

      jQuery('#ts-wchc-spinner').insertAfter(jQuery(this));

      jQuery('#ts-wchc-spinner').fadeIn(300);

      var data = {
        action: 'tswchc_import_plugin_options_json',
        settings: json_settings,
        nonce: tswchc_ajax_object.nonce,
      };

      tswchc_ajax_worker(data);

    });

    /***/

    setTimeout(function () {

      jQuery('#tswchc_redirect_mode').change();

    }, 100)

    /***/


  })


}(jQuery));

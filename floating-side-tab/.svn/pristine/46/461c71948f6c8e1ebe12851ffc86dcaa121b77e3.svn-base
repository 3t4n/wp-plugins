jQuery(document).ready(function ($) {
  "use strict";

  /**
   *
   * @type object
   */
  var notice_timeout;

  /**
   * @type object
   */
  var translation_strings = fsdt_backend_obj.translation_strings;
  /**
   * Generates required notice
   *
   * @param {string} info_text
   * @param {string} info_type
   *
   */
  function fsdt_generate_info(info_text, info_type) {
    clearTimeout(notice_timeout);
    switch (info_type) {
      case "error":
        var info_html = '<p class="fsdt-error">' + info_text + "</p>";
        break;
      case "info":
        var info_html =
          '<p class="fsdt-info"><span class="dashicons dashicons-yes"></span>' +
          info_text +
          "</p>";
        break;
      case "ajax":
        var info_html =
          '<p class="fsdt-ajax"><img src="' +
          fsdt_backend_obj.plugin_url +
          '/assets/images/ajax-loader.gif" class="fsdt-ajax-loader"/>' +
          info_text +
          "</p>";
      default:
        break;
    }
    $(".fsdt-form-message").html(info_html).show();
    if (info_type != "ajax") {
      notice_timeout = setTimeout(function () {
        $(".fsdt-form-message").slideUp(1000);
      }, 5000);
    }
  }
  const fsdtCharacters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  function fsdtGenerateString(length) {
    let result = "";
    const fsdtCharactersLength = fsdtCharacters.length;
    for (let i = 0; i < length; i++) {
      result += fsdtCharacters.charAt(
        Math.floor(Math.random() * fsdtCharactersLength)
      );
    }

    return result;
  }

  function fsdt_checkbox_toggle() {
    $('.fsdt-field input[type="checkbox"]').each(function () {
      if (!$(this).parent().hasClass("fsdt-checkbox-toggle")) {
        var input_name = $(this).attr("name");
        $(this).parent().addClass("fsdt-checkbox-toggle");
        $("<label></label>").insertAfter($(this));
      }
    });
  }

  fsdt_checkbox_toggle();

  $(".fsdt-colorpicker").wpColorPicker();
  $(".fsdt-icon-sortable").sortable({
    placeholder: "fsdt-sortable-placeholder",
    forcePlaceholderSize: true,
    handle: ".fsdt-field-head",
  });
  var current_picker_trigger;
  var tab_type;
  const options = {
    iconLibraries: ["font-awesome.min.json", "elegant-icons.min.json"],
    iconLibrariesCss: ["all.min.css", "elegant-icons.min.css"],
    onSelect: function (jsonIconData) {
      if (tab_type == "tab-main-icon") {
        var icon_picker_trigger_id =
          "fsdt-icon-picker-block-" + current_picker_trigger;

        $("#" + icon_picker_trigger_id + " .selected-icon-libraryname").val(
          jsonIconData.libraryName
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-lib-id").val(
          jsonIconData.libraryId
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconHtml").val(
          jsonIconData.iconHtml
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconMarkup").val(
          jsonIconData.iconMarkup
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconClass").val(
          jsonIconData.iconClass
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconText").val(
          jsonIconData.iconText
        );
        $(".fsdt-menu-icon-view").show();
        $("#" + icon_picker_trigger_id + " .fsdt-selected-icon-view").html(
          jsonIconData.iconHtml
        );
      }
      if (tab_type == "tab-social-icon") {
        var icon_picker_trigger_id =
          "fsdt-social-icon-picker-block-" + current_picker_trigger;

        $("#" + icon_picker_trigger_id + " .selected-icon-libraryname").val(
          jsonIconData.libraryName
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-lib-id").val(
          jsonIconData.libraryId
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconHtml").val(
          jsonIconData.iconHtml
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconMarkup").val(
          jsonIconData.iconMarkup
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconClass").val(
          jsonIconData.iconClass
        );
        $("#" + icon_picker_trigger_id + " .selected-icon-iconText").val(
          jsonIconData.iconText
        );
        $(".fsdt-menu-social-icon-view").show();
        $("#" + icon_picker_trigger_id + " .fsdt-menu-social-icon-view").html(
          jsonIconData.iconHtml
        );
      }
    },
  };
  if ($("#fsdt-universal-icon-selector").length > 0) {
    var uip = new UniversalIconPicker("#fsdt-universal-icon-selector", options);
  }

  $("body").on("change", ".fsdt-customize-status", function () {
    if (this.checked) {
      $(".fsdt-custom-color-section").show();
    } else {
      $(".fsdt-custom-color-section").hide();
    }
  });
  /**
   * Tab show and hide
   */
  $("body").on("click", ".fsdt-wrap .nav-tab", function () {
    var settings_ref = $(this).data("settings-ref");
    $(".fsdt-wrap .nav-tab").removeClass("nav-tab-active");
    $(this).addClass("nav-tab-active");
    $(".fsdt-settings-section").hide();
    $(
      '.fsdt-settings-section[data-settings-ref="' + settings_ref + '"]'
    ).show();
    if (settings_ref == "help" || settings_ref == "about") {
      $(".fsdt-settings-action").hide();
    } else {
      $(".fsdt-settings-action").show();
    }
  });

  /**
   * top save button event
   */
  $("body").on("click", ".fsdt-save-btn", function () {
    $(".fsdt-form").submit();
  });
  /**
   * settings top save button event
   */
  $("body").on("click", ".fsdt-settings-save-btn", function () {
    $(".fsdt-global-settings").click();
  });

  /**
   * show each customize option
   */

  $("body").on("change", ".fsdt-each-customize-status", function () {
    if (this.checked) {
      $(".fsdt-each-customize").show();
    } else {
      $(".fsdt-each-customize").hide();
    }
  });
  /**
   * Postion select event
   */
  $("body").on("click", ".fsdt-position-select", function () {
    $(".fsdt-position-select").removeClass("fsdt-selected");
    $(this).addClass("fsdt-selected");
    var selected_icon = $('.fsdt-selected img').attr('data-postion');
    $('.fsdt-select-option option[value="' + selected_icon + '"]').prop('selected', true);
    return false;
  });
  /**
   * Animaton Select Event
   */
  $("body").on("click", ".fsdt-animation-select", function () {
    $(".fsdt-animation-select").removeClass("fsdt-animation-selected");
    $(this).addClass("fsdt-animation-selected");
    var selected_animation_icon = $('.fsdt-animation-selected i').attr('data-animation');
    $('.fsdt-select-option option[value="' + selected_animation_icon + '"]').prop('selected', true);
    return false;
  });
  /**
   * add new icon button event
   */
  $("body").on("click", ".fsdt-add-new-icon", function (e) {
    e.preventDefault();
    var icon_template = wp.template("icon-template");
    var icon_key = fsdtGenerateString(8);
    $(".fsdt-icon-block").append(icon_template({ icon_key }));
    $(".fsdt-colorpicker").wpColorPicker();
    fsdt_checkbox_toggle();
    /**
     * adding wp_editor default
     */

    var selector = $(this);
    var editor_id = "editor_" + icon_key;
    var editor_name = "fsdt_settings[menu][" + icon_key + "][custom_html]";

    var textarea = $('<textarea class="' + editor_id + '"></textarea>')
      .attr("id", editor_id)
      .attr("name", editor_name);
    $(".fsdt-editor-wrap-" + icon_key).html(textarea);
    wp.editor.remove(editor_id);
    wp.editor.initialize(editor_id, {
      tinymce: {
        wpautop: true,
        toolbar1:
          "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_adv",
        toolbar2:
          "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo",
        toolbar3: "",
        toolbar4: "",
      },
      quicktags: {
        buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,close",
      },
      mediaButtons: true,
    });
    var scrollableDiv = $(".fsdt-icon-block");
    var scrollHeight = scrollableDiv[0].scrollHeight;
    scrollableDiv.animate(
      {
        scrollTop: scrollHeight,
      },
      1000
    );

    // Assuming your scrollable div has an ID "scrollableDiv"
  });
  /**
   * remove new icon button event
   */
  $("body").on("click", ".fsdt-remove-new-icon", function () {
    if (confirm("Are you sure you want to remove this icon?")) {
      $(this).closest(".fsdt-each-icon").remove();
    }
  });
  /**
   * remove new social
   * icon button event
   */
  $("body").on("click", ".fsdt-social-icon-remove", function () {
    if (confirm("Are you sure you want to remove this social icon?")) {
      $(this).closest(".fsdt-each-social-icon-block").remove();
    }
  });

  /**
   * remove social icon in edit mode
   */
  $("body").on("click", ".fsdt-remove-each-social-new-icon", function () {
    if (confirm("Are you sure you want to remove this social icon???")) {
      $(this).closest(".fsdt-each-social-icon-block").remove();
    }
  });

  /**
   * template number change event
   */
  $("body").on("change", ".fsdt-template-dropdown", function () {
    var template = $(this).val();
    $(".fsdt-outer-bg").hide();
    $(".fsdt-tab-hover").show();
    $(".fsdt-each-template-preview-wrap").hide();
    $(
      '.fsdt-each-template-preview-wrap[data-template-ref="' + template + '"]'
    ).show();
  });

  /**
   * layout template preview event
   */

  $("body").on("change", ".fsdt-layout-post-select-option", function () {
    var template = $(this).val();

    $(".fsdt-each-post-layout-template-preview-wrap").hide();
    $(
      '.fsdt-each-post-layout-template-preview-wrap[data-template-ref="' +
      template +
      '"]'
    ).show();
  });

  /**
   * on change select option
   */
  $("body").on("change", ".fsdt-select-option", function () {
    var option_val = $(this).val();

    $(this).closest(".fsdt-added-block").find(".fsdt-url-block").hide();

    $(this).closest(".fsdt-added-block").find(".fsdt-tab-type-block").hide();

    if (option_val == "link") {
      $(this).closest(".fsdt-added-block").find(".fsdt-url-block").show();
      $(this).closest(".fsdt-added-block").find(".fsdt-tab-type-block").hide();
    }

    if (option_val == "tab") {
      $(this).closest(".fsdt-added-block").find(".fsdt-tab-type-block").show();
      $(this).closest(".fsdt-added-block").find(".fsdt-url-block").hide();
    }
  });

  /**
   * on change icon type select option
   */
  $("body").on("change", ".fsdt-icon-type-select-option", function () {
    var icon_type_option_val = $(this).val();

    $(this).closest(".fsdt-added-block").find(".fsdt-icon-picker-block").hide();
    $(this).closest(".fsdt-added-block").find(".fsdt-dashicon-block").hide();
    if (icon_type_option_val == "bootstrap_icons") {
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-icon-picker-block")
        .show();
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-custom-icon-block")
        .hide();
      $(this).closest(".fsdt-added-block").find(".fsdt-menu-icon-view").hide();
    }
    if (icon_type_option_val == "custom_icons") {
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-custom-icon-block")
        .show();
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-icon-picker-block")
        .hide();
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-custom-icon-img-preview")
        .hide();
    }
    if (icon_type_option_val == "") {
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-custom-icon-block")
        .hide();
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-icon-picker-block")
        .hide();
      $(this)
        .closest(".fsdt-added-block")
        .find(".fsdt-custom-icon-img-preview")
        .hide();
      $(this).closest(".fsdt-added-block").find(".fsdt-menu-icon-view").hide();
    }
  });

  /**
   * Open Media Uploader
   */
  $("body").on("click", ".fsdt-custom-icon", function (e) {
    var selector = $(this);

    var image = wp
      .media({
        title: "Upload Image",
        // mutiple: true if you want to upload multiple files at once
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        // This will return the selected image from the Media Uploader, the result is an object
        var uploaded_image = image.state().get("selection").first();
        // We convert uploaded_image to a JSON object to make accessing it easier
        // Output to the console uploaded_image

        var image_url = uploaded_image.toJSON().url;
        var image_id = uploaded_image.toJSON().id;
        // Let's assign the url value to the input field
        selector
          .closest(".fsdt-added-block")
          .find(".fsdt-custom-icon")
          .val(image_url);
        selector
          .closest(".fsdt-added-block")
          .find(".fsdt-custom-icon-img-preview")
          .html('<img src="' + image_url + '"/>');
        selector
          .closest(".fsdt-added-block")
          .find(".fsdt-custom-icon-img-preview")
          .show();
      });
  });

  $("body").on("click", ".fsdt-field-title", function () {
    $(this)
      .closest(".fsdt-each-form-field")
      .find(".fsdt-field-body")
      .slideToggle(500);
    if ($(this).find("span.dashicons").hasClass("dashicons-arrow-up")) {
      $(this)
        .find("span.dashicons")
        .removeClass("dashicons-arrow-up")
        .addClass("dashicons-arrow-down");
    } else {
      $(this)
        .find("span.dashicons")
        .removeClass("dashicons-arrow-down")
        .addClass("dashicons-arrow-up");
    }
  });
  $(".fsdt-field-title").click(function () {
    $(this)
      .parent()
      .find(".fsdt-field-body")
      .slideToggle(280)
      .removeClass("fsdt-display-none");
  });

  // Social Media Icon Accordion

  $(".fsdt-field-social-title").click(function () {
    $(this).parent().find(".fsdt-field-social-body").slideToggle(280);
  });
  $("body").on("click", ".fsdt-icon-picker-btn", function () {
    current_picker_trigger = $(this).data("field-key");
    tab_type = $(this).data("icon-type");
    $("#fsdt-universal-icon-selector").click();
  });
  $("body").on("click", ".fsdt-social-icon-picker-btnn", function () {
    current_picker_trigger = $(this).data("field-key");
    tab_type = $(this).data("icon-type");
    $("#fsdt-universal-icon-selector").click();
  });

  $("body").on("keyup", ".fsdt-tab-name", function () {
    var tab_title = $(this).val();
    if (tab_title !== "") {
      tab_title = $.parseHTML(tab_title);
      $(this)
        .closest(".fsdt-each-icon")
        .find(".fsdt-tab-title")
        .html(tab_title);
    } else {
      $(this)
        .closest(".fsdt-each-icon")
        .find(".fsdt-tab-title")
        .html("Untitled Menu Icon");
    }
  });

  $(".fsdt-compare-click").click(function () {
    $(".fsdt-compare-panel").toggle();
    $(".fsdt-wrap").toggleClass("fsdt-compare-overlay");
});
$(".close-panel").click(function () {
    $(".fsdt-compare-panel").hide();
    $(".fsdt-wrap").removeClass("fsdt-compare-overlay");
});


  $("body").on("submit", ".fsdt-form", function (e) {
    e.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
      type: "post",
      url: fsdt_backend_obj.ajax_url,
      data: {
        action: "fsdt_form_save_action",
        _wpnonce: fsdt_backend_obj.ajax_nonce,
        form_data: form_data,
      },
      beforeSend: function (xhr) {
        fsdt_generate_info(translation_strings.ajax_message, "ajax");
      },
      success: function (res) {
        res = $.parseJSON(res);
        if (res.status == 200) {
          fsdt_generate_info(res.message, "info");
          if (res.redirect_url) {
            window.location = res.redirect_url;
            exit;
          }
        } else {
          fsdt_generate_info(res.message, "error");
        }
      },
    });
  });
});

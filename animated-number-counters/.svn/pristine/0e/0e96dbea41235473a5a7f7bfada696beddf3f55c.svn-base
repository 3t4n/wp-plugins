jQuery(document).ready(function () {
  //Color picker script
  jQuery(".anc_6310_color_picker").each(function () {
    jQuery(this).minicolors({
      control: jQuery(this).attr("data-control") || "hue",
      defaultValue: jQuery(this).attr("data-defaultValue") || "",
      format: jQuery(this).attr("data-format") || "hex",
      keywords: jQuery(this).attr("data-keywords") || "",
      inline: jQuery(this).attr("data-inline") === "true",
      letterCase: jQuery(this).attr("data-letterCase") || "lowercase",
      opacity: jQuery(this).attr("data-opacity"),
      position: jQuery(this).attr("data-position") || "bottom left",
      swatches: jQuery(this).attr("data-swatches")
        ? jQuery(this).attr("data-swatches").split("|")
        : [],
      change: function (value, opacity) {
        if (!value) return;
        if (opacity) value += ", " + opacity;
        if (typeof console === "object") {
          // console.log(value);
        }
      },
      theme: "bootstrap",
    });
  });

  //Background type section
  jQuery("#background-type-2, #background-type-3, #background-type-4").hide();
  jQuery(
    "#background-type-" +
      jQuery(".anc_6310_tabs_panel_preview").attr("data-bg-type")
  ).show();
  jQuery("body").on("change", "#background_type", function () {
    var val = jQuery(this).val();
    jQuery("#background-type-2, #background-type-3, #background-type-4").hide();
    jQuery(`#background-type-${val}`).show();
  });

  //Upload image
  jQuery("body").on(
    "click",
    "#anc_6310_box_background_image_button",
    function (e) {
      e.preventDefault();
      var image = wp
        .media({
          title: "Upload Image",
          multiple: false,
        })
        .open()
        .on("select", function (e) {
          var uploaded_image = image.state().get("selection").first();
          var image_url = uploaded_image.toJSON().url;
          jQuery(`#anc_6310_box_background_image`).val(image_url);
        });
      jQuery("#anc_6310_add_new_media").css({
        "overflow-x": "hidden",
        "overflow-y": "auto",
      });
    }
  );

  //Sort
  jQuery(function () {
    jQuery("#anc-6310-sortable-counter").sortable();
    jQuery("#anc-6310-sortable-counter").disableSelection();
  });

  //Add/Edit Counter Start
  jQuery("body").on("click", ".anc-row-select-checkbox", function (event) {
    event.stopPropagation();
  });
  jQuery("body").on("click", ".anc-row-select", function () {
    var id = jQuery(this).attr("id");
    if (jQuery("#chk-box-" + id).prop("checked") == true) {
      jQuery("#chk-box-" + id).prop("checked", false);
      return false;
    } else {
      jQuery("#chk-box-" + id).prop("checked", true);
      return true;
    }
  });

  jQuery("#anc-6310-sortable-counter-sub").click(function () {
    var list_sortable = jQuery("#anc-6310-sortable-counter")
      .sortable("toArray")
      .toString();
    jQuery("#rearrange_counter_list").val(list_sortable);
  });

  jQuery("body").on("click", "#anc_6310_add_or_edit_counter", function () {
    jQuery("#anc_6310_add_or_edit_counter_modal").fadeIn(500);
    jQuery("body").css({
      overflow: "hidden",
    });
    return false;
  });

  jQuery("body").on("click", "#anc_6310_rearrange_counter", function () {
    jQuery("#anc_6310_rearrange_counter_modal").fadeIn(500);
    jQuery("body").css({
      overflow: "hidden",
    });
    return false;
  });

  jQuery("body").on("click", "#anc_6310_add_new_media", function () {
    jQuery("#anc_6310_add_new_media_modal").fadeIn(500);
    jQuery("body").css({
      overflow: "hidden",
    });
    return false;
  });
  jQuery("body").on(
    "click",
    ".anc-6310-close, .anc-6310-btn-danger",
    function () {
      jQuery(
        "#anc_6310_add_new_media_modal, #anc_6310_rearrange_counter_modal, #anc_6310_add_or_edit_counter_modal"
      ).fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
  );
  jQuery(window).click(function (event) {
    if (
      event.target ==
      document.getElementById("anc_6310_rearrange_counter_modal")
    ) {
      jQuery("#anc_6310_rearrange_counter_modal").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
    if (
      event.target ==
      document.getElementById("anc_6310_add_or_edit_counter_modal")
    ) {
      jQuery("#anc_6310_add_or_edit_counter_modal").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
    if (
      event.target == document.getElementById("anc_6310_add_new_media_modal")
    ) {
      jQuery("#anc_6310_add_new_media_modal").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
  });

  //Font picker script
  jQuery(
    "#anc_6310_jquery_button_font, #anc_6310_jquery_heading_font, #anc_6310_jquery_designation_font, #anc_6310_jquery_heading_font_style1, #anc_6310_jquery_designation_font_style1, #anc_6310_jquery_heading_font_style, #anc_6310_jquery_designation_font_style, #anc-6310-front-end-load, #anc_6310_jquery_description_font, #anc_6310_jquery_contact_font, #anc_6310_jquery_profile_details_font, #anc_6310_jquery_category_font_family, #anc_6310_jquery_read_more_font_family, #anc_6310_jquery_number_font, #anc_6310_jquery_number_prefix_font, #anc_6310_jquery_number_suffix_font"
  ).fontselect();

  //Item per row settings
  jQuery("body").on("click", "#anc_6310_items_per_row", function () {
    jQuery("#anc-6310-modal-add").fadeIn(500);
    jQuery("body").css({
      overflow: "hidden",
    });
    return false;
  });

  jQuery("body").on(
    "click",
    ".anc-6310-close, .anc-6310-btn-danger",
    function () {
      jQuery("#anc-6310-modal-add, #anc-6310-modal-edit").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
  );
  jQuery(window).click(function (event) {
    if (event.target == document.getElementById("anc-6310-modal-add")) {
      jQuery("#anc-6310-modal-add").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    } else if (event.target == document.getElementById("anc-6310-modal-edit")) {
      jQuery("#anc-6310-modal-edit").fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
  });

  //No preview available script
  jQuery("body").on("change", ".anc-6310-no-preview", function (e) {
    e.preventDefault();
    jQuery(".anc-6310-no-preview-available").fadeIn().delay(3000).fadeOut();
  });
  jQuery("body").on("blur", "input[name='social_border_width']", function (e) {
    e.preventDefault();
    jQuery(".anc-6310-no-preview-available").fadeIn().delay(3000).fadeOut();
  });
});

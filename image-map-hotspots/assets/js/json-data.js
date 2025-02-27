function generateJSON(selector = "#imh-6310-add-point ") {
  let myObj = {};
  let myCSS = {};
  let elementType = "1";

  myObj.iconType = 1;
  myObj.fontAwesomeIcon = jQuery(selector + ".icons-1").val();
  myObj.fontAwesomeHoverIcon = jQuery(selector + ".icons-2").val();
  myObj.fontAwesomeIconColor = jQuery(
    selector + ".imh_6310_fontawesome_icon_color"
  ).val();
  myObj.fontAwesomeIconHoverColor = jQuery(
    selector + ".imh_6310_fontawesome_icon_hover_color"
  ).val();
  myObj.fontAwesomIconSize = jQuery(selector + ".imh-6310_icon_size").val();
  myObj.fontAwesomIconSizeInMobile = jQuery(
    selector + ".imh-6310_icon_size_in_mobile"
  ).val();
  myObj.imgOrIconSize = jQuery(selector + ".img_or_icon_size").val();
  myObj.imgOrIconSizeInMobile = jQuery(
    selector + ".img_or_icon_size_in_mobile"
  ).val();
  myObj.customFirstImg = jQuery(selector + ".imh-6310-image-edit-1").val();
  myObj.customSecondImg = jQuery(selector + ".imh-6310-image-edit-2").val();
  myObj.customText = jQuery(selector + ".imh-6310_custom_enter_text").val();
  myObj.customTextSize = jQuery(
    selector + ".imh_6310_custom_text_font_size"
  ).val();
  myObj.customTextColor = jQuery(
    selector + ".imh_6310_custom_text_font_color"
  ).val();
  myObj.customTextBgColor = jQuery(
    selector + ".imh_6310_custom_text_font_bg_color"
  ).val();
  myObj.customeCode = jQuery(
    selector + `textarea[name='imh_6310_custom_code']`
  ).val();
  myObj.blinkTooltip = jQuery(selector + ".imh-6310_blink_type:checked").val();
  myObj.glowColor = jQuery(selector + ".imh_6310_fontawesome_icon_glow_color").val();

  // check element type

  myObj.selectedTemplate = jQuery(selector + ".imh-6310-active").attr(
    "data-id"
  );

  myObj.popupEmbedded = jQuery(selector + ".popup_embedded").val();
  myObj.selectedTemplate = "01";

   myObj.popupCustomHtml = jQuery(selector + `textarea[name='imh_6310_popup_custom_html']`).val()
  ;
  myObj.popupCustomCss = jQuery(selector + `textarea[name='imh_6310_popup_custom_css']`).val()
  ;
  myObj.popupCustomCodeWidth = jQuery(
    selector + ".imh_6310_custom_popup_width"
  ).val();
  // check selector type

  myObj.linkText = jQuery(selector + ".imh_6310_link_text").val();
  myObj.linkURL = jQuery(selector + ".imh_6310_custom_link_url").val();
  myObj.openNewTab = jQuery(selector + ".imh-6310-open-new-tab:checked").val();
  myObj.openPopup = jQuery(selector + ".imh-6310-open-popup:checked").val();
  myObj.openDesImg = jQuery(selector + ".imh-6310-des-img").val();
  myObj.openDescription = jQuery(
    selector + ".imh-6310-tooltip_discription"
  ).val();
  myObj.openDesFontSize = jQuery(
    selector + ".imh-6310-tooltip_discription_font_size"
  ).val();
  myObj.openDesFontColor = jQuery(
    selector + ".imh-6310-tooltip_discription_font_color"
  ).val();
  myObj.customButtonLinkType = jQuery(
    selector + ".imh-6310_button_link:checked"
  ).val();
  myObj.customButtonText = jQuery(selector + ".imh-6310-button-text").val();
  myObj.customButtonUrl = jQuery(selector + ".imh-6310-button-url").val();
  myObj.customButtonTextSize = jQuery(
    selector + ".imh_6310_button_text_size"
  ).val();
  myObj.customButtonTextColor = jQuery(
    selector + ".imh_6310_button_text_color"
  ).val();
  myObj.customButtonBgcolor = jQuery(
    selector + ".imh_6310_button_bg_color"
  ).val();
  myObj.tempCommonFontSize = jQuery(
    selector + ".imh_6310_template_font_size"
  ).val();
  myObj.tempCommonFontColor = jQuery(
    selector + ".imh_6310_template_font_color"
  ).val();
  myObj.tempCommonBgColor = jQuery(
    selector + ".imh_6310_template_bg_color"
  ).val();
  myObj.tem02EmbeddedLink = jQuery(
    selector + ".imh-6310-embedded_code_link"
  ).val();

  let customCode = jQuery(
    selector + `textarea[name='imh-6310-custome_html']`
  ).val();
  customCode = customCode.replace(/='/g, '="');
  customCode = customCode.replace(/'>/g, '">');
  myObj.customeHtmlCode = customCode;

  myObj.customeCssCode = jQuery(
    selector + `textarea[name='imh-6310-custome_css']`
  ).val();
  myObj.customeCodePopup = jQuery(
    selector + `textarea[name='imh_6310_custom_code_popup']`
  ).val();
  myObj.customIconLinkType = jQuery(
    selector + ".imh-6310_link_title_type:checked"
  ).val();
  myObj.elementType = elementType;


    myCSS.styleCSS = `
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-main-img{ 
        color: ${myObj.fontAwesomeIconColor} !important;
        font-size:${myObj.fontAwesomIconSize}px !important;
    } 
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-hover-img{ 
      color: ${myObj.fontAwesomeIconHoverColor} !important;
      font-size:${myObj.fontAwesomIconSize}px !important;
    } 
   
  `;
  
  

  //imh_6310_reset_fields();
  return [myObj, myCSS];
}

function setJsonData() {
  let jsonData = jQuery(`[data-id='${window.currentPoint}']`).attr("data-json");
  jsonData = JSON.parse(jsonData);
  if (!jsonData || !jsonData.elementType) {
    return;
  }
  imh_6310_reset_fields();

  jQuery("#imh-6310-edit-point .imh-6310-section-select:last").trigger("click");
  jQuery("#imh-6310-edit-point .imh-6310-section-select:first").trigger(
    "click"
  );

  jQuery(`
          #imh-6310-edit-point .toggle-tabs li:first-child, 
          #imh-6310-edit-point .imh-6310_icon_type[value='${jsonData.iconType}'],
          #imh-6310-edit-point .imh-6310_popover_type[value='${jsonData.mouseType}'],
          #imh-6310-edit-point .imh-6310_blink_type[value='${jsonData.blinkTooltip}'],
          #imh-6310-edit-point .imh-6310-section-select[value='${jsonData.elementType}'],
          #imh-6310-edit-point .imh-6310_link_title_type[value='${jsonData.customIconLinkType}'],
          #imh-6310-edit-point .imh-6310-open-popup[value='${jsonData.openPopup}'],
          #imh-6310-edit-point .imh-6310-open-new-tab[value='${jsonData.openNewTab}'],
          #imh-6310-edit-point .imh-6310_button_link[value='${jsonData.customButtonLinkType}']
        `).trigger("click");

  jQuery(".imh-6310-tooltip-img").removeClass("imh-6310-active");
  jQuery(".imh-6310-open-new-tab").prop("selectedIndex", jsonData.openNewTab);

  jQuery(".imh-6310-open-popup").prop("selectedIndex", jsonData.openPopup);
  if (Number(jsonData.openPopup) == 1) {
    jQuery(".tooltip-embedded").addClass("imh-6310-hide");
  } else {
    jQuery(".tooltip-embedded").removeClass("imh-6310-hide");
  }
  jQuery(".imh-6310-templates").removeClass("imh-6310-hide");
  jQuery(".imh-6310-active").removeClass("imh-6310-active");
  jQuery(
    `.imh-6310-templates, [data-id='${jsonData.selectedTemplate}']`
  ).removeClass("imh-6310-hide");

  jQuery(".icons-1").val(jsonData.fontAwesomeIcon);
  jQuery(".icons-2").val(jsonData.fontAwesomeHoverIcon);
  jQuery(".imh_6310_fontawesome_icon_color").val(jsonData.fontAwesomeIconColor);
  jQuery(".imh_6310_fontawesome_icon_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.fontAwesomeIconColor,
    });
  jQuery(".imh_6310_fontawesome_icon_hover_color").val(
    jsonData.fontAwesomeIconHoverColor
  );
  jQuery(".imh_6310_fontawesome_icon_hover_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.fontAwesomeIconHoverColor,
    });
  jQuery(".imh-6310_icon_size").val(jsonData.fontAwesomIconSize);
  jQuery(".imh-6310_icon_size_in_mobile").val(
    jsonData.fontAwesomIconSizeInMobile !== undefined
      ? jsonData.fontAwesomIconSizeInMobile
      : jsonData.fontAwesomIconSize
  );
  jQuery(".img_or_icon_size").val(jsonData.imgOrIconSize);
  jQuery(".img_or_icon_size_in_mobile").val(
    jsonData.imgOrIconSizeInMobile !== undefined
      ? jsonData.imgOrIconSizeInMobile
      : jsonData.imgOrIconSize
  );
  jQuery(".imh-6310-image-edit-1").val(jsonData.customFirstImg);
  jQuery(".imh-6310-image-edit-2").val(jsonData.customSecondImg);

  jQuery(".imh-6310_custom_enter_text").val(jsonData.customText);
  jQuery(".imh_6310_custom_text_font_size").val(jsonData.customTextSize);
  jQuery(".imh_6310_custom_text_font_color").val(jsonData.customTextColor);
  jQuery(".imh_6310_fontawesome_icon_glow_color").val(jsonData.glowColor);
  jQuery(".imh_6310_fontawesome_icon_glow_color")
  .closest("div")
  .find(".minicolors-swatch-color")
  .css({
    "background-color": jsonData.glowColor,
  });
  
  jQuery(".imh_6310_custom_text_font_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customTextColor,
    });
  jQuery(".imh_6310_custom_text_font_bg_color").val(jsonData.customTextBgColor);
  jQuery(".imh_6310_custom_text_font_bg_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customTextBgColor,
    });

  jQuery(`textarea[name='imh_6310_custom_code']`).val(jsonData.customeCode);
  jQuery(`textarea[name='imh_6310_custom_code_popup']`).val(
    jsonData.customeCodePopup
  );
  jQuery(`textarea[name='imh-6310-custome_html']`).val(
    jsonData.customeHtmlCode
  );
  jQuery(`textarea[name='imh-6310-custome_css']`).val(jsonData.customeCssCode);
  jQuery(".imh_6310_link_text").val(jsonData.linkText);
  jQuery(".imh_6310_custom_link_url").val(jsonData.linkURL);
  jQuery(".imh-6310-des-img").val(jsonData.openDesImg);
  jQuery(".imh-6310-tooltip_discription").val(jsonData.openDescription);
  jQuery(".imh-6310-tooltip_discription_font_size").val(
    jsonData.openDesFontSize
  );
  jQuery(".imh-6310-tooltip_discription_font_color").val(
    jsonData.openDesFontColor
  );
  jQuery(".imh-6310-tooltip_discription_font_color")
  .closest("div")
  .find(".minicolors-swatch-color")
  .css({
    "background-color": jsonData.openDesFontColor,
  });
  jQuery(".tooltip_discription_font_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.openDesFontColor,
    });
  jQuery(".imh-6310-button-text").val(jsonData.customButtonText);
  jQuery(".imh-6310-button-url").val(jsonData.customButtonUrl);
  jQuery(".imh_6310_button_text_size").val(jsonData.customButtonTextSize);
  jQuery(".imh_6310_button_text_color").val(jsonData.customButtonTextColor);
  jQuery(".imh_6310_button_text_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customButtonTextColor,
    });
  jQuery(".imh_6310_button_bg_color").val(jsonData.customButtonBgcolor);
  jQuery(".imh_6310_button_bg_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customButtonBgcolor,
    });
  jQuery(".popup_embedded").val(jsonData.popupEmbedded);
  jQuery(`textarea[name='imh_6310_popup_custom_html']`).val(
    jsonData.popupCustomHtml
  );
  jQuery(`textarea[name='imh_6310_popup_custom_css']`).val(
    jsonData.popupCustomCss
  );
  jQuery(".imh_6310_custom_popup_width").val(jsonData.popupCustomCodeWidth);
  jQuery(".imh-6310-tooltip-link").removeClass("imh-6310-hide");
  jQuery(".imh_6310_textarea").removeClass("imh-6310-hide");

  jQuery(".imh-6310-form-02").removeClass("imh-6310-hide");
  jQuery(".imh-6310-form-02").removeClass("imh-6310-hide");

  if (jsonData.selectedTemplate != "") {
    jQuery(
      `.imh-6310-tooltip-img[data-id='${jsonData.selectedTemplate}']`
    ).addClass("imh-6310-active");
    jQuery(
      `.imh-6310-tooltip-img[data-id='${jsonData.selectedTemplate}']`
    ).trigger("click");

    //set common
    jQuery(".imh_6310_template_font_size").val(jsonData.tempCommonFontSize);
    jQuery(".imh_6310_template_font_color").val(jsonData.tempCommonFontColor);
    jQuery(".imh_6310_template_font_color")
      .closest("div")
      .find(".minicolors-swatch-color")
      .css({
        "background-color": jsonData.tempCommonFontColor,
      });
    jQuery(".imh_6310_template_bg_color").val(jsonData.tempCommonBgColor);
    jQuery(".imh_6310_template_bg_color")
      .closest("div")
      .find(".minicolors-swatch-color")
      .css({
        "background-color": jsonData.tempCommonBgColor,
      });

    //Uncommon fields
   
  }
 if(jsonData.elementType == 1) {
    jQuery("#imh-6310-edit-point .imh-6310-tooltip-link").removeClass(
      "imh-6310-hide"
    );
    jQuery(
      "#imh-6310-edit-point .imh_6310_custom_template, .imh_6310_template_embedded"
    ).addClass("imh-6310-hide");
  }
}

function imh_6310_reset_fields() {
  jQuery(".ima-imh-6310_icon_type[value='1']").prop("checked", true);
  jQuery(".ima-imh-6310_popover_type[value='1']").prop("checked", true);
  jQuery(".imh-6310-tooltip-img").removeClass("imh-6310-active");
  jQuery(
    ".imh-6310-form, .imh-6310-tooltip-link, .imh-6310-templates, .tooltip-embedded"
  ).addClass("imh-6310-hide");
  jQuery(".imh-6310-embedded_code_link").val("");
  let fieldList =
    ".icons-1, .icons-2, .imh-6310-image-edit-1, .imh-6310-image-edit-2, .imh-6310_custom_enter_text, .imh_6310_custom_text_font_size, .imh_6310_custom_text_font_color, .imh_6310_custom_text_font_bg_color, .imh_6310_fontawesome_icon_color, .imh_6310_fontawesome_icon_hover_color, .imh-6310_icon_size, .imh-6310_icon_size_in_mobile, .img_or_icon_size, .img_or_icon_size_in_mobile, .imh_6310_link_text, .imh_6310_custom_link_url, .popup_embedded, .imh_6310_template_font_color, .imh_6310_template_bg_color, .imh_6310_template_font_size, .imh-6310-embedded_code_link, .imh-6310-tooltip_discription, .imh-6310-tooltip_discription_font_size, .imh_6310_fontawesome_icon_glow_color, .imh-6310-tooltip_discription_font_color, .imh-6310-button-text, .imh-6310-button-url, .imh_6310_button_text_color, .imh_6310_button_bg_color, .imh_6310_button_text_size, .imh-6310-custome_html, .imh-6310-custome_css, .imh_6310_custom_popup_width, .imh_6310_popup_custom_html, .imh_6310_popup_custom_css";
    fieldList = fieldList.split(",");
  // setTimeout(function () {
  for (let i = 0; i < fieldList.length; i++) {
    let selector = jQuery(fieldList[i].trim());
    if (
      selector.attr("data-value") !== undefined ||
      selector.attr("data-value") !== null
    ) {
      selector.val(selector.attr("data-value"));
      selector.attr("data-defaultValue", selector.attr("data-value"));
      selector.text(selector.attr("data-value"));
      if (selector.closest("div").find(".minicolors-swatch-color")) {
        selector
          .closest("div")
          .find(".minicolors-swatch-color")
          .css({
            "background-color": selector.attr("data-value"),
          });
      }
    }
  }
  // }, 100);
  jQuery(".imh-6310-section-select, .imh-6310-open-new-tab").prop(
    "selectedIndex",
    0
  );

  jQuery(".imh_6310_textarea").addClass("imh-6310-hide");

  setTimeout(function() {
    if (jQuery(".imh_6310_color_picker").length) {
      jQuery(".imh_6310_color_picker").each(function () {
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
            }
          },
          theme: "bootstrap",
        });
      });
    }
  }, 500);
}

function defineDragableElement() {
  let allElement = jQuery(".imh-6310-drag");
  allElement.each(function () {
    jQuery(this).draggable({
      appendTo: "body",
      containment: ".imh-6310-annotation-box",
      drag: function () {},
      stop: function () {
        let tWidth = jQuery(".imh-6310-annotation-box").width();
        let tHeight = jQuery(".imh-6310-annotation-box").height();
        var iconWidth = jQuery(this).width();
        var height = jQuery(this).find(".imh-6310-point-icons").height();
        var bottom = tHeight - (jQuery(this).position().top + height);
        var left = jQuery(this).position().left;

        var xPos = (
          (left / parseFloat(jQuery(this).parent().width())) *
          100
        ).toFixed(2);
        var yPos = (
          (bottom / parseFloat(jQuery(this).parent().height())) *
          100
        ).toFixed(2);
        jQuery(this).attr(
          "data-position",
          `${xPos}-${yPos}-${tWidth}-${iconWidth}`
        );      
      },
    });
  });
}

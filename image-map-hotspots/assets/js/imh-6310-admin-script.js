jQuery(window).load(function () {
  let annotationWidth = jQuery(".imh-6310-annotation-box").width();
  jQuery(".imh-6310-drag").each(function () {
    let jsonData = jQuery(this).attr("data-json");
    jsonData = JSON.parse(jsonData);
    let calData =
      (Number(jsonData.iconWidth) * annotationWidth) / Number(jsonData.tWidth);
    if (annotationWidth > Number(jsonData.iconWidth)) {
      calData = calData / 2 - Number(jsonData.iconWidth) / 2;
    } else {
      calData = calData / 2;
    }
    jQuery(this).attr(
      "style",
      `left: calc(${jsonData.xPos}% + ${calData}px) !important; bottom: ${jsonData.yPos}%;`
    );
  });

  imh_6310_icon_image_select();
  defineDragableElement();

  /* Link Setting */
  jQuery("body").on(
    "click",
    "#imh-6310-add-point .imh-6310_link_title_type",
    function () {
      if (Number(jQuery(this).val()) == 2) {
        jQuery("#imh-6310-add-point .imh-6310_link").addClass("imh-6310-hide");
      } else {
        jQuery("#imh-6310-add-point .imh-6310_link").removeClass(
          "imh-6310-hide"
        );
        if (
          Number(
            jQuery("#imh-6310-add-point .imh-6310_button_link:checked").val()
          ) == 2
        ) {
          jQuery("#imh-6310-add-point .imh-6310_button").addClass(
            "imh-6310-hide"
          );
        } else {
          jQuery("#imh-6310-add-point .imh-6310_button").removeClass(
            "imh-6310-hide"
          );
        }
      }
    }
  );

  jQuery("body").on(
    "click",
    "#imh-6310-add-point .imh-6310_button_link",
    function () {
      if (Number(jQuery(this).val()) == 2) {
        jQuery("#imh-6310-add-point .imh-6310_button").addClass(
          "imh-6310-hide"
        );
      } else {
        jQuery("#imh-6310-add-point .imh-6310_button").removeClass(
          "imh-6310-hide"
        );
      }
    }
  );

  /* Edit link Setting */
  jQuery("body").on(
    "click",
    "#imh-6310-edit-point .imh-6310_link_title_type",
    function () {
      if (Number(jQuery(this).val()) == 2) {
        jQuery("#imh-6310-edit-point .imh-6310_link").addClass("imh-6310-hide");
      } else {
        jQuery("#imh-6310-edit-point .imh-6310_link").removeClass(
          "imh-6310-hide"
        );
        if (
          Number(
            jQuery("#imh-6310-edit-point .imh-6310_button_link:checked").val()
          ) == 2
        ) {
          jQuery("#imh-6310-edit-point .imh-6310_button").addClass(
            "imh-6310-hide"
          );
        } else {
          jQuery("#imh-6310-edit-point .imh-6310_button").removeClass(
            "imh-6310-hide"
          );
        }
      }
    }
  );

  jQuery("body").on(
    "click",
    "#imh-6310-edit-point .imh-6310_button_link",
    function () {
      if (Number(jQuery(this).val()) == 2) {
        jQuery("#imh-6310-edit-point .imh-6310_button").addClass(
          "imh-6310-hide"
        );
      } else {
        jQuery("#imh-6310-edit-point .imh-6310_button").removeClass(
          "imh-6310-hide"
        );
      }
    }
  );

  /* **************************************************************** */

  //Add Point Script
  let counter = jQuery(".imh-6310-drag").length + 1;
  jQuery("body").on("click", ".imh-6310-add-place-save", function () {
    window.currentPoint = counter;
    let iconType = 1;
    let elementType = 1;
    let iconImage = "";

    let mainIcon = jQuery(".icons-1").val();
    let hoverIcon = jQuery(".icons-2").val();
    if (!mainIcon && !hoverIcon) {
      alert("Please select Icon");
      return;
    }
    if (!hoverIcon) {
      hoverIcon = mainIcon;
    }
    if (!mainIcon) {
      mainIcon = hoverIcon;
    }
    iconImage = `
        <i class="${mainIcon} imh-6310-pin-main-img imh-6310-blinking-${counter}"></i>
        <i class="${hoverIcon} imh-6310-pin-hover-img imh-6310-blinking-hover-${counter}"></i>
      `;

    let jsonObj = generateJSON("#imh-6310-add-point ");
    let jsonObjParse = JSON.stringify(jsonObj[0]);
    let iconHeight = 0;

    iconHeight = jsonObj[0].fontAwesomIconSize;
    iconHeight = Number(iconHeight) + 5;

    let html = `
      <div data-id='${counter}' class="imh-6310-drag ui-widget-content" style='bottom: calc(100% - ${iconHeight}px);'>
        <div class='imh-6310-point-editor'>
          <div class='imh-6310-point-edit'><i class='far fa-edit'></i></div>
          <div class= 'imh-6310-point-remove'><i class='fas fa-trash-alt'></i></div>
        </div>
        <div class="imh-6310-point-icons">
          ${iconImage} 
        </div>  
      </div>
      `;

    jQuery(".imh-6310-annotation-box").append(html);
    jQuery(`div[data-id='${counter}']`).attr("data-json", jsonObjParse);
    jQuery(`<style type='text/css'>${jsonObj[1].styleCSS}</style>`).appendTo(
      `.imh-6310-drag[data-id='${counter}'] .imh-6310-point-icons`
    );
    if (jsonObj[0].blinkTooltip == 1) {
      if (jsonObj[0].iconType == "1") {
        jQuery(`<style type='text/css'> 
        i.imh-6310-blinking-${counter}, 
        i.imh-6310-blinking-hover-${counter} {
          position: relative;
          display: block;
        }
      i.imh-6310-blinking-${counter}::after, 
      i.imh-6310-blinking-hover-${counter}::after {
      content: '';
      position: absolute;
      width: calc(${jsonObj[0].fontAwesomIconSize}px + 10px);
      height:calc(${jsonObj[0].fontAwesomIconSize}px + 10px);
      box-shadow: 0 0 1px 3px white;
      animation: pulse-animation-${counter} 2s infinite;
      display: block;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      border-radius: 50%;
      pointer-events: none;
    } 
    @keyframes pulse-animation-${counter} {
      0% {
        box-shadow: 0 0 0 0px ${jsonObj[0].glowColor};
      }
      100% {
        box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
      }
    }        
        </style>`).appendTo(`.imh-6310-blinking-${counter}`);
      }
    }
    defineDragableElement();

    jQuery("#imh-6310-add-point").fadeOut(500);
    jQuery("body").css({
      overflow: "initial",
    });
    counter++;
  });

  //Delete Point Script
  jQuery("body").on("click", ".imh-6310-btn-point-delete", function (event) {
    event.preventDefault();
    jQuery(`.imh-6310-point-${window.currentPoint}`).remove();
    jQuery(`#imh-6310-edit-point`).fadeOut(500);
    jQuery("body").css({
      overflow: "initial",
    });
  });

  //Close Edit Point Modal Script
  jQuery("body").on("click", ".imh-6310-close", function () {
    jQuery(`#imh-6310-edit-point`).fadeOut(500);
    jQuery("body").css({
      overflow: "initial",
    });
  });

  //Point Settings script
  jQuery("body").on("change", ".imh-6310-section-select", function () {
    let val = parseInt(jQuery(this).val());
    let parentId = jQuery(this).closest(".imh-6310-modal").attr("id");
    jQuery(
      ".imh-6310-tooltip-link, .imh-6310-embided, .imh-6310-external-link, .imh-6310-templates, .imh-6310-tooltip-img-css, .imh_6310_custom_template"
    ).addClass("imh-6310-hide");
    jQuery(`.imh-6310-type-${val}`).removeClass("imh-6310-hide");
    if (val == 1) {
      jQuery(".imh_6310_textarea").removeClass("imh-6310-hide");
      jQuery(
        ".imh-6310-tooltip-link, .imh-6310-templates, .toggle-tabs li[data-id='3']"
      ).removeClass("imh-6310-hide");
      jQuery(
        `#${parentId} .imh-6310-tooltip_img_section .imh-6310-type-${val}:first, #imh_6310_custom_code-html, .imh_6310_custom_code_popup-html`
      ).trigger("click");
    } else if (val == 2) {
      jQuery(
        ".imh_6310_textarea, .imh-6310-embided, .imh-6310-templates"
      ).removeClass("imh-6310-hide");
      jQuery('.toggle-tabs li[data-id="3"]').addClass("imh-6310-hide");
      jQuery(
        `#${parentId} .imh-6310-tooltip_img_section .imh-6310-type-${val}:first, #imh_6310_custom_code-html, .imh_6310_custom_code_popup-html`
      ).trigger("click");
    } else {
      jQuery(".imh_6310_custom_template").removeClass("imh-6310-hide");
      jQuery(
        '.imh_6310_font_prop, .imh_6310_template_embedded, .toggle-tabs li[data-id="3"]'
      ).addClass("imh-6310-hide");
      jQuery(".imh_6310_template_description").addClass("imh-6310-hide");
    }
  });

  // tooltio alert
  jQuery("body").on("click", ".imh-6310-tooltip-img-pro", function () {
    alert("This template avaiable on pro only.");
  });
  //Template load  script

  jQuery("body").on("click", ".imh-6310-tooltip-img", function () {
    jQuery(".imh-6310-tooltip-img").removeClass("imh-6310-active");
    jQuery(this).closest(".imh-6310-tooltip-img").addClass("imh-6310-active");
    let val = jQuery(this).closest(".imh-6310-tooltip-img").attr("data-id");
    jQuery(".imh-6310-form").addClass("imh-6310-hide");
    jQuery(`.imh-6310-form-${val}`).removeClass("imh-6310-hide");

    imh_6310_set_html_code(val);
  });

  //  tooltip embedded code show hide

  jQuery("body").on(
    "change",
    "#imh-6310-add-point .imh-6310-open-popup",
    function () {
      let val = parseInt(jQuery(this).val());
      jQuery("#imh-6310-add-point .tooltip-embedded").addClass("imh-6310-hide");
      if (val == 2) {
        jQuery("#imh-6310-add-point .tooltip-embedded").removeClass(
          "imh-6310-hide"
        );
        jQuery("#imh-6310-add-point .tooltip-custom-code").addClass(
          "imh-6310-hide"
        );
      }
      if (val == 3) {
        jQuery("#imh-6310-add-point .tooltip-custom-code").removeClass(
          "imh-6310-hide"
        );
        jQuery("#imh-6310-add-point .tooltip-embedded").addClass(
          "imh-6310-hide"
        );
      }
      if (val == 1) {
        jQuery(
          "#imh-6310-add-point .tooltip-embedded, .tooltip-custom-code"
        ).addClass("imh-6310-hide");
      }
    }
  );

  jQuery("body").on(
    "change",
    "#imh-6310-edit-point .imh-6310-open-popup",
    function () {
      let val = parseInt(jQuery(this).val());
      jQuery("#imh-6310-edit-point .tooltip-embedded").addClass(
        "imh-6310-hide"
      );
      if (val == 2) {
        jQuery("#imh-6310-edit-point .tooltip-embedded").removeClass(
          "imh-6310-hide"
        );
        jQuery("#imh-6310-edit-point .tooltip-custom-code").addClass(
          "imh-6310-hide"
        );
      }
      if (val == 3) {
        jQuery("#imh-6310-edit-point .tooltip-custom-code").removeClass(
          "imh-6310-hide"
        );
        jQuery("#imh-6310-edit-point .tooltip-embedded").addClass(
          "imh-6310-hide"
        );
      }
      if (val == 1) {
        jQuery(
          "#imh-6310-edit-point .tooltip-embedded, .tooltip-custom-code"
        ).addClass("imh-6310-hide");
      }
    }
  );

  //Combine JSON and push it in an input field
  jQuery("body").on("click", ".imh-6310-insert-ja-data", function () {
    let jsonCollection = [];
    jQuery(`.imh-6310-drag`).each(function () {
      let jsonObj = jQuery(this).attr("data-json");
      let dataPosition = jQuery(this).attr("data-position");
      if (jsonObj) {
        jsonObj = JSON.parse(jsonObj);
        if (dataPosition) {
          dataPosition = dataPosition.split("-");
          jsonObj.xPos = dataPosition[0];
          jsonObj.yPos = dataPosition[1];
          jsonObj.tWidth = dataPosition[2];
          jsonObj.iconWidth = dataPosition[3];
        } else if (!jsonObj.xPos && !jsonObj.yPos) {
          jsonObj.xPos = 0;
          jsonObj.yPos =
            ((jQuery(".imh-6310-annotation-box").height() -
              jQuery(this).height()) /
              jQuery(".imh-6310-annotation-box").height()) *
            100;
          jsonObj.tWidth = jQuery(".imh-6310-annotation-box").width();
          jsonObj.iconWidth = jQuery(this).width();
        }
        jsonCollection.push(jsonObj);
      }
    });
    jQuery("#imh_6310_json_field").val(JSON.stringify(jsonCollection));
  });

  //Manage icon remove start
  jQuery("body").on("click", ".fa-minus-circle", function () {
    jQuery(this).closest("td").find("input").val("");
  });
  //Manage icon remove end
});

function imh_6310_set_html_code(val) {
  let htmlCode = "";
  if (val == "01") {
    htmlCode = ` 
    <div class="imh-6310-tooltip imh-6310-template-01">
      <a href="#">Hover here</a>
      <div class="imh-6310-template-01-hover-content">Tooltip text</div>
    </div>
      `;
  } else if (val == "03") {
    htmlCode = `
    <div class="imh-6310-tooltip imh-6310-template-03 imh-6310-hide">
      <a href="#"><img src="img/4 (2).png" alt="" ></a>
        <div class="imh-6310-template-03-hover-content">
          <div class="imh-6310-template-03-tooltip-testimonial">
            <div class="imh-6310-template-03-tooltip-pic">
              <img src="img/7.png" alt="">
            </div>
            <div class="imh-6310-template-03-tooltip-testimonial-content">
              <div class="imh-6310-template-03-tooltip-testimonial-title">Williamson
                <div class="imh-6310-template-03-tooltip-post">Web Designer</div>
              </div>
              <div class="imh-6310-template-03-tooltip-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur
                debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit
                tempora voluptatem. Est, exercitationem id ipsa ipsum laboriosam perferendis temporibus!
              </div>
            </div>
          </div>
        </div>
    </div>
      `;
  } else if (val == "04") {
    htmlCode = `      
    <div class="imh-6310-tooltip imh-6310-template-04 imh-6310-hide">
      <a href="#"><img src="img/4 (2).png" alt=""></a>
        <div class="imh-6310-template-04-tooltip-testimonial">
          <div class="imh-6310-template-04-tooltip-testimonial-content">
            <div class="imh-6310-template-04-tooltip-pic">
              <img src="img/7.png">
            </div>
            <div class="imh-6310-template-04-tooltip-title">Williamson</div>
            <div class="imh-6310-template-04-tooltip-post">Web Developer</div>
          </div>
          <div class="imh-6310-template-04-tooltip-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dolor tellus, efficitur ut tortor id,
            molestie egestas nibh. In blandit ex at erat vehicula molestie. Mauris vel volutpat nulla. Suspendisse lorem
            ex, congue at elit id, tincidunt tempor orci. Nullam nec augue ac tellus rhoncus tincidunt nec ut ligula.
            Praesent.
          </div>
        </div>
    </div>   
      `;
  } else if (val == "05") {
    htmlCode = `      
    <div class="imh-6310-tooltip imh-6310-template-05 imh-6310-hide">
      <a href="#"><img src="img/4 (2).png" alt=""></a>
      <div class="imh-6310-template-05-hover-content">
        <div class="imh-6310-template-05-tooltip-testimonial">
          <div class="imh-6310-template-05-tooltip-testimonial-content">
            <div class="imh-6310-template-05-tooltip-pic">
              <img src="img/7.png">
            </div>
            <div class="imh-6310-template-05-tooltip-title">Williamson</div>
            <div class="imh-6310-template-05-tooltip-post">Web Developer</div>
          </div>
          <div class="imh-6310-template-05-tooltip-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dolor tellus, efficitur ut tortor id,
            molestie egestas nibh. In blandit ex at erat vehicula molestie. Mauris vel volutpat nulla. Suspendisse lorem
            ex, congue at elit id, tincidunt tempor orci. Nullam nec augue ac tellus rhoncus tincidunt nec ut ligula.
            Praesent.
          </div>
        </div>
      </div>
    </div>
      `;
  } else if (val == "02") {
    htmlCode = `      
    <div class="imh-6310-tooltip imh-6310-template-02">      
      <div class="imh-6310-template-02-hover-content">
        <div class="imh-6310-template-02-content">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25125110.814096835!2d94.35061650599457!3d23.913222352616348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1636176093357!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
      `;
  }

  jQuery(`textarea[name='imh_6310_custom_code']`).val(htmlCode);
  jQuery(
    `#imh_6310_custom_code-html, .imh_6310_custom_code_popup-html`
  ).trigger("click");
}

function imh_6310_icon_image_select() {
  //Manage icon Start
  jQuery("#icon-filter").on("keyup", function () {
    var value = jQuery(this).val().toLowerCase();
    jQuery(".imh-6310-choose-icon li").filter(function () {
      jQuery(this).toggle(
        jQuery(this).attr(`data-icon-name`).toLowerCase().indexOf(value) > -1
      );
    });
  });

  jQuery("body").on(
    "click",
    "#imh-6310-font-icon-close, .imh-6310-font-awesome-close",
    function () {
      jQuery("#imh_6310_social_icon").fadeOut(500);
    }
  );

  jQuery("body").on(
    "click",
    "imh-6310-plus-icons, .imh-6310-plus-icons i",
    function () {
      let selIds = jQuery(this)
        .closest(".imh-6310-plus-icons")
        .siblings(".imh-6310-form-input")
        .attr("id");
      jQuery("ul.imh-6310-choose-icon").attr("data-current-id", selIds);
      if (jQuery("#icon-filter").val()) {
        jQuery("#icon-filter").val("");
        jQuery(".imh-6310-choose-icon li").filter(function () {
          jQuery(this).toggle();
        });
      }
      jQuery("#imh_6310_social_icon").fadeIn(500);
      jQuery("body").css({
        overflow: "hidden",
      });
      jQuery("#icon-filter").focus();
      return false;
    }
  );

  jQuery("body").on("click", "ul.imh-6310-choose-icon li", function () {
    let cls = jQuery(this).find("i").attr("class");
    jQuery(`.` + jQuery("ul.imh-6310-choose-icon").attr("data-current-id")).val(
      cls
    );
    jQuery("#imh_6310_social_icon").fadeOut(500);
  });
  //Manage icon End

  /* Main Image Upload ########### */
  jQuery("body").on("click", ".imh-6310-upload-image", function (e) {
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
        jQuery(`.imh-6310-main-image`).attr("src", image_url);
        jQuery(`input[name='main_image']`).val(image_url);
      });

    jQuery("#imh_6310_add_new_media").css({
      "overflow-x": "hidden",
      "overflow-y": "auto",
    });
  });

  //Add Point
  jQuery("body").on("change", ".imh-6310_icon_type", function (e) {
    let value = Number(jQuery(this).val());
    jQuery(".imh-6310-marker").addClass("imh-6310-hide");
    jQuery(`.imh-6310-marker-type-${value}`).removeClass("imh-6310-hide");
  });

  jQuery("body").on("change", ".imh-6310_blink_type", function (e) {
    let value = Number(jQuery(this).val());
    if (value == "1") {
      jQuery(".imh_6310_icon_glow_color").removeClass("imh-6310-hide");
    } else {
      jQuery(".imh_6310_icon_glow_color").addClass("imh-6310-hide");
    }
  });

  /* ######### Custom Icon Media Start ########### */
  jQuery("body").on("click", ".imh-6310-icon-upload", function (e) {
    e.preventDefault();
    let dataId = jQuery(this).attr("data-id");

    var image = wp
      .media({
        title: "Upload Image",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        var image_url = uploaded_image.toJSON().url;
        jQuery(`.${dataId}`).val(image_url);
      });

    jQuery("#imh_6310_add_new_media").css({
      "overflow-x": "hidden",
      "overflow-y": "auto",
    });
  });
  /* ######### Custom Icon Media End ########### */

  /* ######### Custom Icon For Zoom In/Out Start ########### */
  /* Main Image Upload ########### */
  jQuery("body").on("click", ".imh-6310-zoom-icon", function (e) {
    e.preventDefault();
    const closest = jQuery(this);
    var image = wp
      .media({
        title: "Upload Icon",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        var image_url = uploaded_image.toJSON().url;
        closest.closest("td").find(`img`).attr("src", image_url);
        closest.closest("td").find(`input[type='hidden']`).val(image_url);
      });

    jQuery("#imh_6310_add_new_media").css({
      "overflow-x": "hidden",
      "overflow-y": "auto",
    });
  });
  /* ######### Custom Icon For Zoom In/Out End ########### */

  const zoomFeature = Number(
    jQuery("input[name='zoom_feature']:checked").val()
  );
  zoomFeature > 1
    ? jQuery(".toggle-zoom-feature").show()
    : jQuery(".toggle-zoom-feature").hide();

  jQuery("body").on("change", "input[name='zoom_feature']", function () {
    const value = Number(jQuery(this).val());
    value > 1
      ? jQuery(".toggle-zoom-feature").show()
      : jQuery(".toggle-zoom-feature").hide();
  });
}

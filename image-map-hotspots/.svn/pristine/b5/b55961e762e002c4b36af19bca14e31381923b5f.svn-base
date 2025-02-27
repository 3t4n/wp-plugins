window.currentPoint = 0;
jQuery(document).ready(function () {
  window.currentPoint = jQuery(".imh-6310-drag").length;
  //Add Point Modal
  jQuery("body").on("click", ".imh-6310-add-point", function () {
    if(jQuery('.imh-6310-main-image').attr('src') == ''){
      alert('Please upload image first');
      return;
    }
    jQuery("#imh-6310-add-point .imh-6310-templates").removeClass(
      "imh-6310-hide"
    );

    jQuery("#imh-6310-add-point").fadeIn(500);
    jQuery("body").css({
      overflow: "hidden",
    });
    imh_6310_reset_fields();
    jQuery(
      `
      #imh-6310-add-point .imh-6310-section-select:last
      `
    ).trigger("click");
    jQuery(
      `
      #imh-6310-add-point .imh-6310-section-select:first
      `
    ).trigger("click");

    jQuery(
      `#imh-6310-add-point .imh-6310-tooltip-img-css:first-child, 
      #imh-6310-add-point .toggle-tabs li:first-child, 
      #imh-6310-add-point .imh-6310_icon_type:first-child, 
      #imh-6310-add-point .imh-6310_blink_type:first-child,
      #imh-6310-add-point .imh-6310-section-select:first,
      #imh-6310-add-point .imh-6310-open-new-tab:first,
      #imh-6310-add-point .imh-6310_button_link:first,
      #imh-6310-add-point .imh-6310-open-popup:last,
      #imh-6310-add-point .imh-6310_link_title_type:last,
      #imh-6310-add-point .imh-6310_button_link:last,
      #imh-6310-add-point .imh-6310_popover_type:first
      `
    ).trigger("click");
    jQuery(".imh-6310-tab-2, .imh-6310-tab-3").addClass("imh-6310-hide");
    return false;
  });

  //Edit Point Modal
  jQuery("body").on(
    "click",
    ".imh-6310-drag .imh-6310-point-edit",
    function () {
      window.currentPoint = jQuery(this)
        .closest(".imh-6310-drag")
        .attr("data-id");
      jQuery("#imh-6310-edit-point").fadeIn(500);
      jQuery("body").css({
        overflow: "hidden",
      });
      setJsonData();
      return false;
    }
  );
  jQuery("body").on(
    "click",
    ".imh-6310-drag .imh-6310-point-remove",
    function () {
      if (confirm("Do you want to delete?")) {
        jQuery(this).closest(".imh-6310-drag").remove();
      }
      return false;
    }
  );

  jQuery("body").on("click", ".imh-6310-update-place-save", function (e) {
    e.preventDefault();
    let iconType = 1;
    let elementType = Number(
      jQuery("#imh-6310-edit-point .imh-6310-section-select").val()
    );
    let iconImage = "";
    if (iconType == 1) {
      let mainIcon = jQuery("#imh-6310-edit-point .icons-1").val();
      let hoverIcon = jQuery("#imh-6310-edit-point .icons-2").val();
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
        <i class="${mainIcon} imh-6310-pin-main-img imh-6310-blinking-${window.currentPoint}"></i>
        <i class="${hoverIcon} imh-6310-pin-hover-img imh-6310-blinking-hover-${window.currentPoint}"></i>
      `;
    } else if (iconType == 2) {
      let mainImg = jQuery("#imh-6310-edit-point .imh-6310-image-edit-1").val();
      let hoverImg = jQuery(
        "#imh-6310-edit-point .imh-6310-image-edit-2"
      ).val();
      if (!mainImg && !hoverImg) {
        alert("Please select image");
        return;
      }
      if (!hoverImg) {
        hoverImg = mainImg;
      }
      if (!mainImg) {
        mainImg = hoverImg;
      }
      iconImage = `
        <img src='${mainImg}' class="imh-6310-pin-main-img" />
        <img src='${hoverImg}' class="imh-6310-pin-hover-img" />
      `;
    } else {
      let ponterText = jQuery(
        "#imh-6310-edit-point .imh-6310_custom_enter_text"
      ).val();
      if (!ponterText && !ponterText) {
        alert("Please Enter Text");
        return;
      }
      iconImage = `
      <div class='imh-6310-customtext'>${ponterText}</div>
      `;
    }

    
      jQuery(".imh-6310-section-select").focus(); 
    

    let jsonObj = generateJSON("#imh-6310-edit-point ");
    let jsonObjParse = JSON.stringify(jsonObj[0]);
    let html = `
    ${iconImage}  
      `;
    jQuery(`.imh-6310-drag[data-id='${window.currentPoint}']`).attr(
      "data-json",
      jsonObjParse
    );

    jQuery(
      `.imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-point-icons`
    ).html(html);

    jQuery(`<style type='text/css'>${jsonObj[1].styleCSS}</style>`).appendTo(
      `.imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-point-icons`
    );
    if(jsonObj[0].blinkTooltip == 1){
      if(jsonObj[0].iconType == "1"){
        jQuery(`<style type='text/css'> 
        i.imh-6310-blinking-${window.currentPoint}, 
        i.imh-6310-blinking-hover-${window.currentPoint} {
          position: relative;
          display: block;
        }
      i.imh-6310-blinking-${window.currentPoint}::after, 
      i.imh-6310-blinking-hover-${window.currentPoint}::after {
      content: '';
      position: absolute;
      width: calc(${jsonObj[0].fontAwesomIconSize}px + 10px) !important;
      height: calc(${jsonObj[0].fontAwesomIconSize}px + 10px) !important;
      box-shadow: 0 0 1px 3px white;
      animation: pulse-animation-${window.currentPoint} 2s infinite;
      display: block;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      border-radius: 50%;
      pointer-events: none;
    } 
    @keyframes pulse-animation-${window.currentPoint} {
      0% {
        box-shadow: 0 0 0 0px ${jsonObj[0].glowColor};
      }
      100% {
        box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
      }
    }        
        </style>`).appendTo(`.imh-6310-blinking-${window.currentPoint}`);
      }
    }
  
    defineDragableElement();


    jQuery(`
    #imh-6310-edit-point
  `).fadeOut(500);
    jQuery("body").css({
      overflow: "initial",
    });
  });

  //Close Modal Script
  jQuery("body").on(
    "click",
    ".imh-6310-close, .imh-6310-btn-close",
    function () {
      jQuery(`
            #imh-6310-add-point,
            #imh-6310-edit-point             
          `).fadeOut(500);
      jQuery("body").css({
        overflow: "initial",
      });
    }
  );

  jQuery(".toggle-tabs li").click(function () {
    let id = jQuery(this).attr("data-id");
    jQuery(".toggle-tabs li").removeClass("active-tab");
    jQuery(this).addClass("active-tab");
    jQuery(".imh-6310-tab").addClass("imh-6310-hide");
    jQuery(`.imh-6310-tab-${id}`).removeClass("imh-6310-hide");
  });
});

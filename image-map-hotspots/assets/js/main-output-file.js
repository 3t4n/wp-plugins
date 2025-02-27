let ima6310Timeout;
let ima6310LastId = "";

function imh_6310_hide() {
  ima6310Timeout = setTimeout(function () {
    jQuery(".imh-6310-hover-content").css("transform", "scale(0)");
    let hoverContent = jQuery(".imh-6310-hover-content iframe");
    if (hoverContent.length) {
      hoverContent.each(function () {
        let src = jQuery(this).attr("src");
        jQuery(this).attr("src", "");
        jQuery(this).attr("src", src);
      });
    }
  }, 500);
}

window.addEventListener("load", function () {
  setTimeout(function () {
    jQuery(".imh-6310-hover-content").each(function () {
      jQuery("body").append(jQuery(this).clone());
      jQuery(this).remove();
    });
  }, 100);

  jQuery(".imh-6310-drag")
    .mouseover(function () {
      clearTimeout(ima6310Timeout);
      let pointId = jQuery(this).attr("data-id");
      let id = jQuery(this).closest(".imh-6310-annotation-box").attr("data-id");
      setTooltipPosition(jQuery(this), pointId, id);
      if (ima6310LastId && ima6310LastId != pointId) {
        jQuery(".imh-6310-hover-content").css("transform", "scale(0)");
      }
      ima6310LastId = pointId;

      jQuery(".imh-6310-hover-content-" + id + "-" + pointId)
        .stop()
        .css("transform", "scale(1)");
    })
    .mouseout(imh_6310_hide);

  setTimeout(function () {
    jQuery(".imh-6310-hover-content")
      .mouseover(function () {
        clearTimeout(ima6310Timeout);
      })
      .mouseout(imh_6310_hide);
  }, 500);

  //Popup Open
  jQuery("body").on(
    "click",
    ".imh-6310-drag, .imh-6310-drag .imh-6310-point-icons",
    function () {
      let dataId =
        jQuery(this).closest(".imh-6310-annotation-box").attr("data-id") +
        "-" +
        jQuery(this).closest(".imh-6310-drag").attr("data-id");

      let selector = jQuery(".imh-6310-popup-" + dataId);
      if (selector.length) {
        let width = selector.find("iframe").attr("width");
        let height = selector.find("iframe").attr("height");
        let windowWidth = jQuery(window).width();

        if (!width) {
          width = windowWidth > 700 ? 700 : windowWidth;
          height = windowWidth > 700 ? 490 : "auto";
        } else if (windowWidth < width) {
          height = (windowWidth * height) / width;
          width = windowWidth;
        }

        selector.find("iframe").css({
          width: width + "px",
          height: height + "px",
        });
        selector.css({
          display: "block",
        });
        selector.find(".imh-6310-modal-content").css({
          display: "block",
          width: width + "px",
          height: height + "px",
        });
        jQuery("body").css({
          overflow: "hidden",
        });
      }
    }
  );

  jQuery("body").on("click", ".imh-6310-modal", function () {
    jQuery(this).css({
      display: "none",
    });
    jQuery("body").css({
      overflow: "initial",
    });

    let src = jQuery(this).find("iframe").attr("src");
    jQuery(this).find("iframe").attr("src", "");
    jQuery(this).find("iframe").attr("src", src);
  });

  let annotationWidth = jQuery(".imh-6310-annotation-box").width();
  jQuery(".imh-6310-drag").each(function () {
    let jsonData = jQuery(this).attr("data-json");
    jsonData = JSON.parse(jsonData);
    let calData =
      (Number(jsonData.iconWidth) * annotationWidth) / Number(jsonData.tWidth);
    if (annotationWidth > Number(jsonData.iconWidth)) {
      calData = calData / 2 - Number(jsonData.iconWidth) / 2;
      jQuery(this).attr(
        "style",
        "left: calc(" +
          jsonData.xPos +
          "% + " +
          calData +
          "px) !important; bottom:" +
          jsonData.yPos +
          "%; display: inline-block;"
      );
    } else {
      calData = calData / 2;
      jQuery(this).attr(
        "style",
        "left: calc(" +
          jsonData.xPos +
          "% - " +
          calData +
          "px) !important; bottom:" +
          jsonData.yPos +
          "%; display: inline-block;"
      );
    }
  });

  //Hover iFrame tooltip responsive
  let hoverContent = jQuery(
    ".imh-6310-hover-content .imh-6310-template-02 iframe"
  );
  if (hoverContent.length) {
    hoverContent.each(function () {
      let iframeWidth = jQuery(this).attr("width");
      let iframeHeight = jQuery(this).attr("height");
      let deviceWidth = jQuery(window).width();
      iframeWidth =
        iframeWidth != undefined && iframeWidth != 0 && iframeWidth != ""
          ? iframeWidth
          : 496;
      iframeHeight =
        iframeHeight != undefined && iframeHeight != 0 && iframeHeight != ""
          ? iframeHeight
          : 397;

      if (deviceWidth < iframeWidth) {
        iframeHeight = (iframeHeight * deviceWidth) / iframeWidth;
        jQuery(this).attr("width", deviceWidth);
        jQuery(this).attr("height", iframeHeight);
      }
    });
  }

  imh6310RemoveLazyLoad(1000);
  imh6310RemoveLazyLoad(2000);
  imh6310RemoveLazyLoad(5000);
  imh6310RemoveLazyLoad(10000);
  setTimeout(function () {
    jQuery(".imh-6310-point-icons").show();
  }, 1000);
});

function imh6310RemoveLazyLoad(timeValue) {
  //Remove lazyload
  setTimeout(() => {
    var $allImages = jQuery(".imh-6310-img");
    $allImages.each(function () {
      var image = jQuery(this).attr("data-imh-value");
      var src = jQuery(this).attr("src");
      var alt = jQuery(this).attr("alt");
      var className = jQuery(this).attr("data-imh-cls");

      var attributes = this.attributes;
      var i = attributes.length;
      while (i--) {
        let attrName = attributes[i].name.toLowerCase();
        if (
          attrName != "src" &&
          attrName != "class" &&
          attrName != "alt" &&
          attrName != "data-imh-value" &&
          attrName != "data-imh-cls"
        ) {
          this.removeAttributeNode(attributes[i]);
        }
      }
      if (src != image) {
        jQuery(this).attr({
          src: image,
          class: className,
          alt: alt,
          "data-imh-value": image,
          "data-imh-cls": className,
        });
      } else {
        jQuery(this).attr({ class: className });
      }
    });
  }, timeValue);
}

function setTooltipPosition(event, pointId, id) {
  var closest = event.closest(".imh-6310-annotation-box");
  let jsonData = JSON.parse(
    closest.find("div[data-id='" + pointId + "']").attr("data-json")
  );

  if (jsonData.selectedTemplate == "02") {
    let iFrame = jQuery(
      ".imh-6310-hover-content-" + id + "-" + pointId + " iframe"
    );
    let iframeWidth = iFrame.attr("width");
    let iframeHeight = iFrame.attr("height");

    iframeWidth =
      iframeWidth != undefined && iframeWidth != 0 && iframeWidth != ""
        ? iframeWidth
        : 496;
    iframeHeight =
      iframeHeight != undefined && iframeHeight != 0 && iframeHeight != ""
        ? iframeHeight
        : 397;

    jQuery(
      ".imh-6310-hover-content-" +
        id +
        "-" +
        pointId +
        " iframe, .imh-6310-hover-content-" +
        id +
        "-" +
        pointId +
        " .imh-6310-template-02-hover-content"
    ).css({
      width: iframeWidth + "px",
      height: iframeHeight + "px",
    });
  }
  let icons = closest.find(
    "div[data-id='" + pointId + "'] .imh-6310-point-icons"
  );
  let tempIconSize = icons.width() / 2;
  let fromLeft = icons.offset().left;
  let fromRight = jQuery(window).width() - fromLeft;
  let fromTop = icons.offset().top;
  let iconHeight = icons.height();

  let content = jQuery(".imh-6310-hover-content-" + id + "-" + pointId);
  let pointWidth = content.width() / 2;
  let contentHeight = content.height();
  let toolTipPosition = calculateToolTipPosition(
    fromTop,
    tempIconSize,
    contentHeight
  );

  if (fromLeft + tempIconSize < pointWidth) {
    content.css({
      left: "0px",
      right: "auto",
    });
  } else if (fromRight + tempIconSize < pointWidth) {
    content.css({
      left: "auto",
      right: "0px",
    });
  } else {
    let temp = fromLeft + tempIconSize - pointWidth;
    content.css({
      left: temp + "px",
      right: "auto",
    });
  }

  let topPos;
  if (toolTipPosition == 1) {
    fromTop -= contentHeight + 10;
    topPos = fromTop + "px";
  } else if (toolTipPosition == 2) {
    fromTop += iconHeight + 5;
    topPos = fromTop + "px";
  }
  content.css({
    top: topPos,
  });
}

function calculateToolTipPosition(fromTop, tempIconSize, contentHeight) {
  let scrollTop = jQuery(window).scrollTop();
  let deviceHeight = jQuery(window).height();
  let center = scrollTop + deviceHeight / 2;
  let iconCenter = fromTop + tempIconSize + 10;

  if (fromTop - contentHeight > scrollTop) {
    //Space available in top
    return 1;
  } else if (iconCenter > center) {
    //Space not available in top but more space than bottom
    return 1;
  } else {
    return 2;
  }
}

// Common Section Start
jQuery.fn.extend({
  live: function (event, callback) {
    if (this.selector) {
      jQuery(document).on(event, this.selector, callback);
    }
    return this;
  },
});

jQuery.fn.extend({
  size: function (event, callback) {
    if (this.selector) {
      jQuery(document).on(event, this.selector, callback);
    }
    return this;
  },
});

jQuery(document).ready(function () {
  if (jQuery(".codemirror-textarea").length) {
    var code = jQuery(".codemirror-textarea")[0];
    var editor = CodeMirror.fromTextArea(code, {
      mode: "text/html",
      tabMode: "indent",
      autoCloseTags: true,
      lineNumbers: true,
      fixedGutter: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    });
  }

  //Tab Script
  jQuery(
    "#tab-2, #tab-3, #tab-4, #tab-5, #tab-6, #tab-7, #tab-8, #tab-9, #tab-10, #tab-11, #tab-12"
  ).hide();
  jQuery("body").on("click", ".imh-6310-mytab", function () {
    jQuery(".imh-6310-mytab").removeClass("active");
    jQuery(this).addClass("active");
    var ids = jQuery(this).attr("id");
    ids = parseInt(ids.substring(3));
    jQuery(
      "#tab-1, #tab-2, #tab-3, #tab-4, #tab-5, #tab-6, #tab-7, #tab-8, #tab-9, #tab-10, #tab-11, #tab-12"
    ).hide();
    jQuery("#tab-" + ids).show();
    jQuery("#tab6").click(function (event) {
      jQuery(".codemirror-textarea").focus();
    });
    return false;
  });

  //Font select script
  jQuery(
    "#imh_6310_title_font_family, #imh_6310_value_font_family"
  ).fontselect();
  // ################################# Common Section End #################################
});

!(function($, t, e, n) {
  "use strict";
  var i = $(".coupon-description"),
    a = $(".coupon-click"),
    d = $(".deal-reveal");
  $("document").ready(function() {
    i.on("click", s),
      a.on("click", c),
      d.on("click", o),
      $(i).each(function(t) {
        $(this).text().length < 125 && $(this).addClass("lesslength");
      });
  });
  var s = function(t) {
      t.preventDefault(),
        $(this).text().length > 125 &&
          ($(this).hasClass("expanded")
            ? $(this).removeClass("expanded")
            : $(this).addClass("expanded"));
    },
    c = function(e) {
      e.preventDefault();
      var n = $(location).attr("href"),
        i = n.substring(0, n.indexOf("?")),
        a = $(this).data("link");
      t.open(
        i + "?cid=" + $(this).data("id") + "#cp-code-" + $(this).data("id")
      );
      t.location.href = a;
    },
    o = function(e) {
      e.preventDefault();
      var n = $(this).data("link"),
        i = $(location).attr("href"),
        a = i.substring(0, i.indexOf("?"));
      t.open(n);
      t.location.href =
        a + "?cid=" + $(this).data("id") + "#cp-deal-" + $(this).data("id");
    };
})(jQuery, window, document);

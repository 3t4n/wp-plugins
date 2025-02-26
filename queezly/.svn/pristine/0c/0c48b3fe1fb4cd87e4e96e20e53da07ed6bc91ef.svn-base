;
jQuery(function ($) {
  'use strict';
  (function (w, d) {
    if (!w.Queezly || (w.Queezly && typeof w.Queezly.init !== "function")) {
      var s = d.createElement("script");
      var b = d.getElementsByTagName("head")[0];
      s.addEventListener("load", function () {
        w.Queezly.init();
      });
      s.async = true;
      s.src = WPQueezly.QUEEZLY_URL + "static/queezlyapp/js/embed/queezly.js";
      b.appendChild(s);
    }
  })(window, document);
});

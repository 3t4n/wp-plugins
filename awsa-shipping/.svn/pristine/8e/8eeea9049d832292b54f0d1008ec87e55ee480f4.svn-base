if (typeof awsa_get_form_serialize === "undefined") {
  function awsa_get_form_serialize(form) {
    form = jQuery(form);
    var data = form.serializeArray();
    var d = {};
    jQuery.each(data, function (i, v) {
      d[v.name] = v.value;
    });
    return d;
  }
}

/* loading functions start */
if (typeof awsa_show_loading === "undefined") {
  function awsa_show_loading(obj) {
    jQuery(obj).find(".aw-loading").removeClass("hidden");
  }
}

if (typeof awsa_hidden_loading === "undefined") {
  function awsa_hidden_loading(obj) {
    jQuery(obj).find(".aw-loading").addClass("hidden");
  }
}

if (typeof awsa_render_loading === "undefined") {
  function awsa_render_loading() {
    if (jQuery(".aw-loading").is(":empty")) {
      jQuery(".aw-loading").html(
        '<div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>'
      );
    }
  }
}
/* loading functions end */

if (typeof awsa_redo_captcha === "undefined") {
  function awsa_redo_captcha(form) {
    var b_captcha = form.find(".aw-box-captcha");
    jQuery.each(b_captcha, function (i, v) {
      var captcha_code = jQuery(v).find(".aw-captcha-code");
      var captcha_img = jQuery(v).find(".aw-captcha-img");
      captcha_code.val("");
      captcha_img.attr("src", captcha_img.attr("src") + "?time=" + new Date());
    });
  }
}

if (typeof awsa_redirect === "undefined") {
  function awsa_redirect(to) {
    if (to != "#" || to.length != 0) {
      window.location = to;
    } else {
      window.location = window.location;
    }
  }
}

if (typeof awsa_redirect_after === "undefined") {
  function awsa_redirect_after(to, time) {
    var timer = setTimeout(function () {
      awsa_redirect(to);
    }, time);
  }
}

if (typeof awsa_error === "undefined") {
  function awsa_error(check, obj) {
    if (!check) {
      jQuery(obj).addClass("aw-error");
    } else {
      jQuery(obj).removeClass("aw-error");
    }
  }
}

if (typeof awsa_ajax_process === "undefined") {
  /* Version: 1.0.0 */
  function awsa_ajax_process(p, form, r) {
    /*
        awsa_redo_captcha
        awsa_hidden_loading
        awsa_data

        */
    // var $ = jQuery;
    var html = "";
    if (typeof r != "null" && r != 0) {
      if (!jQuery.isEmptyObject(r.success_codes)) {
        jQuery.each(r.success_codes, function (i, v) {
          html +=
            '<div class="aw-notice aw-notice-success">' +
            awsa_data.success_messages[v] +
            "</div>";
        });
      }
      if (!jQuery.isEmptyObject(r.success_messages)) {
        jQuery.each(r.success_messages, function (i, v) {
          html += '<div class="aw-notice aw-notice-success">' + v + "</div>";
        });
      }

      if (!jQuery.isEmptyObject(r.error_codes)) {
        jQuery.each(r.error_codes, function (i, v) {
          html +=
            '<div class="aw-notice aw-notice-error">' +
            awsa_data.error_messages[v] +
            "</div>";
        });
      }
      if (!jQuery.isEmptyObject(r.error_messages)) {
        jQuery.each(r.error_messages, function (i, v) {
          html += '<div class="aw-notice aw-notice-error">' + v + "</div>";
        });
      }

      jQuery(form).find(".aw-error").removeClass("aw-error");
      if (!jQuery.isEmptyObject(r.e_error)) {
        jQuery.each(r.e_error, function (i, v) {
          switch (v) {
            default:
              jQuery(".aw-" + v, form).addClass("aw-error");
              break;
          }
        });
      }

      if (r.target) {
        jQuery(r.target, p).html(html);
      } else {
        jQuery(".aw-notice-box", form).html(html);
      }

      if (r.h_target) {
        /* must convert to html_results */
        jQuery(r.h_target, p).html(r.html);
      }

      if (!jQuery.isEmptyObject(r.html_results)) {
        jQuery.each(r.html_results, function (selector, html) {
          var awelement = jQuery(selector, p);
          if (
            awelement[0].tagName == "INPUT" ||
            awelement[0].tagName == "TEXTAREA"
          ) {
            var type = awelement[0].type;
            jQuery(awelement).val(html);
          } else {
            jQuery(awelement).html(html);
          }
        });
      }

      if (r.refresh_captcha) {
        awsa_redo_captcha(p);
      }

      if (r.reload_page) {
        awsa_redirect_after("", 2000);
      }

      if (r.reload_page_error) {
        $(".aw-notice-box", form).html(
          '<div class="aw-notice aw-notice-error">' +
            awsa_data.error_messages.reload_page +
            "</div>"
        );
      }

      awsa_hidden_loading(form);
    }
  }
}

jQuery(document).ready(function ($) {});

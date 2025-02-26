! function (n) {
	var r = {};

	function o(e) {
		if (r[e]) return r[e].exports;
		var t = r[e] = {
			i: e,
			l: !1,
			exports: {}
		};
		return n[e].call(t.exports, t, t.exports, o), t.l = !0, t.exports
	}
	o.m = n, o.c = r, o.d = function (e, t, n) {
		o.o(e, t) || Object.defineProperty(e, t, {
			enumerable: !0,
			get: n
		})
	}, o.r = function (e) {
		"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
			value: "Module"
		}), Object.defineProperty(e, "__esModule", {
			value: !0
		})
	}, o.t = function (t, e) {
		if (1 & e && (t = o(t)), 8 & e) return t;
		if (4 & e && "object" == typeof t && t && t.__esModule) return t;
		var n = Object.create(null);
		if (o.r(n), Object.defineProperty(n, "default", {
				enumerable: !0,
				value: t
			}), 2 & e && "string" != typeof t)
			for (var r in t) o.d(n, r, function (e) {
				return t[e]
			}.bind(null, r));
		return n
	}, o.n = function (e) {
		var t = e && e.__esModule ? function () {
			return e.default
		} : function () {
			return e
		};
		return o.d(t, "a", t), t
	}, o.o = function (e, t) {
		return Object.prototype.hasOwnProperty.call(e, t)
	}, o.p = "/", o(o.s = 0)
}([function (e, t, n) {
	n(1), n(6), e.exports = n(11)
}, function (e, t) {
	jQuery(document).ready(function () {
		jQuery(".opm_img-next-step").on("click", function () {
			jQuery("#opm_img_tab_step-1").hide(), jQuery("#tab-step-1").hide(), jQuery("#opm_img_tab_step-2").show(), jQuery("#tab-step-2").show()
		}), jQuery(".opm_img-prev-step").on("click", function () {
			jQuery("#opm_img_tab_step-2").hide(), jQuery("#tab-step-2").hide(), jQuery("#opm_img_tab_step-1").show(), jQuery("#tab-step-1").show()
		}), jQuery("form.opm_img-form").areYouSure({
			message: "Changes that you made may not be saved"
		}), jQuery(".reset-confirm").click(function () {
			if (0 == confirm("This will reset 'Optimize More' settings. Are you sure?")) return !1
		});
		jQuery(".opm_img_wrapper .navigation").offset();

		function t(e) {
			var t = jQuery(".opm_img-form"),
				n = t.attr("action"); - 1 !== n.indexOf("#") && (hash = n.replace(/.*#/, "#"), n = n.replace(/#.*/, "")), t.attr({
				action: n + "#" + e
			})
		}
		jQuery(".opm_img-navigation ul li a:not(.opm_img-ignore)").click(function () {
			var e = jQuery(this).attr("data-tab");
			jQuery(".opm_img-navigation ul li a").removeClass("current"), jQuery(".tab-content").removeClass("current"), jQuery(this).addClass("current"), jQuery(".opm_img_content section").removeClass("current"), jQuery(".opm_img_content section." + e).addClass("current"), t(e), jQuery("html, body").animate({
				scrollTop: 0
			}, 400)
		});
		var e = window.location.hash;
		"" != (e = e.replace("#", "")) ? (jQuery(".opm_img-navigation ul li a#opm_img_" + e).addClass("current"), jQuery(".opm_img_content section." + e).addClass("current"), t(e)) : 0 == jQuery(".opm_img_content section.current").length && (jQuery(".opm_img_content section").eq(0).addClass("current"), jQuery(".opm_img-navigation ul li").eq(0).find("a").addClass("current"))
	}), jQuery(document).ready(function () {
		jQuery('.main-toggle[type="checkbox"]').change(function (e) {
			var t = jQuery(this).prop("checked"),
				n = jQuery(this).attr("data-revised"),
				r = jQuery(this).parents(".toggle-group").find(".sub-fields");
			r.length && (t && "1" != n && r.find('input[type="checkbox"]:checked').length == r.find('input[type="checkbox"]').length || !t && "1" == n ? r.hide() : r.show())
		}).trigger("change"), jQuery(".opm_img-toggle-arrow").on("click", function () {
			jQuery(this).toggleClass("active"), jQuery(this).next("ul").slideToggle()
		}), jQuery("#enable_opm_img_admin").on("change", function () {
			jQuery(this).is(":checked") ? jQuery(".menu-admin-wrapper").show() : jQuery(".menu-admin-wrapper").hide()
		}).trigger("change"), jQuery(".enable_welcome_for_all_roles").on("change", function () {
			var e = jQuery("#select_user_roles" + jQuery(this).data("section"));
			jQuery(this).is(":checked") ? e.hide() : e.show()
		}).trigger("change"), jQuery('.opm_img-toggle[type="checkbox"]').change(function (e) {
			var o = jQuery(this).prop("checked"),
				t = jQuery(this).parent();
			t.siblings(), t.find('input[type="checkbox"]').prop({
					checked: o
				}),
				function e(t) {
					var n = t.parent().parent(),
						r = !0;
					t.siblings().each(function () {
						return r = jQuery(this).children('input[type="checkbox"]').prop("checked") === o
					}), r && o ? (n.children('input[type="checkbox"]').prop({
						checked: o
					}), e(n)) : r && !o ? (n.children('input[type="checkbox"]').prop("checked", o), n.children('input[type="checkbox"]').prop("indeterminate", 0 < n.find('input[type="checkbox"]:checked').length), e(n)) : (n = !0, t.parents("li").children('input[type="checkbox"]').hasClass("main-toggle-reverse") && (n = !1), t.parents("li").children('input[type="checkbox"]').prop({
						checked: n
					}))
				}(t)
		})
	})
}, , , , , function (e, t) {}, , , , , function (e, t) {}]), jQuery(document).ready(function (e) {
	var t = e(".opm_img-notice");
	t.length && t.hasClass("is-dismissible") && window.setTimeout(function () {
		t.fadeOut(800)
	}, 0)
}), jQuery(document).ready(function () {
	jQuery(".show-hide").change(function (e) {
		var t = jQuery(this).prop("checked"),
			n = jQuery(this).attr("data-show-hide"),
			r = jQuery(this).parents(".show-hide-group").find(".show-hide-content");
		r.length && (t && "1" != n && r.find('input[type="checkbox"]:checked').length == r.find('input[type="checkbox"]').length || !t && "1" == n ? r.fadeOut() : r.fadeIn())
	}).trigger("change")
});
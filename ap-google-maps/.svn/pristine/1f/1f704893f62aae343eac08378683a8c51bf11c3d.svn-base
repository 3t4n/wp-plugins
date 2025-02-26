! function(a, b, c, d) {

    function e() {
        var b = {
            action: "uber_google_maps_load_instances"
        };
        a.post(ajaxurl, b).done(function(b) {
            a("#instances-container").html(b)
        })
    }

    function f(b) {
        var c = {
            action: "uber_google_maps_create_instance"
        };
        a.post(ajaxurl, c).done(function(a) {
            e()
        })
    }

    function g(b, c) {
        h(b, function(d) {
            s = d.settings, l(), a("#main-options-wrap").fadeOut(100, function() {
                a("#instance-options-wrap").fadeIn(100), a("#instance-options-wrap").attr("data-instance-id", b), c()
            })
        })
    }

    function h(b, c) {
        var d = {
            action: "uber_google_maps_get_instance_options",
            id: b
        };
        a.post(ajaxurl, d).done(function(b) {
            var d = a.parseJSON(b);
            c(d)
        })
    }

    function i(b, c) {
        var d = {
            action: "uber_google_maps_delete_instance",
            id: b
        };
        a.post(ajaxurl, d).done(function(b) {
            a("#modal-delete-instance").modal("hide"), c()
        })
    }

    function j(b, c) {
        var d = {
            action: "uber_google_maps_save_instance",
            id: b,
            settings: a.uber_google_maps_get_current_settings()
        };
        console.log(d.settings), a.post(ajaxurl, d).done(function(a) {
            h(b, function(a) {
                s = a.settings, l()
            }), console.log(JSON.parse(a)), c()
        })
    }

    function k(b) {
        var c = {
            action: "uber_google_maps_get_map_editor"
        };
        a.post(ajaxurl, c).done(function(a) {
            b(a)
        })
    }

    function l() {
        k(function(b) {
            a("#map-editor-wrap").html(b), p(), a.uber_google_maps_init_editor()
        })
    }

    function m() {
        a("#instance-options-wrap").fadeOut(100, function() {
            a("#main-options-wrap").fadeIn(100), e()
        })
    }

    function n() {
        k(function(b) {
            a("#map-editor-wrap").html(""), a("#map-editor-fullscreen-wrap").remove(), a("body").removeClass("map-editor-fullscreen"), a("body").removeClass("bootstrap-wrap");
            var c = "";
            c = '<div id="map-editor-fullscreen-wrap"><div id="map-editor-wrap">' + b + "</div></div>", a("body").addClass("map-editor-fullscreen"), a("body").addClass("bootstrap-wrap"), a("body").prepend(c), p(), s = a.uber_google_maps_get_current_settings(), a.uber_google_maps_init_editor()
        })
    }

    function o() {
        s = a.uber_google_maps_get_current_settings(), a("#map-editor-fullscreen-wrap").remove(), a("body").removeClass("map-editor-fullscreen"), a("body").removeClass("bootstrap-wrap"), l()
    }

    function p() {
        a("#button-go-fullscreen").remove(), a("#button-close-fullscreen").remove(), a("#changes-saved-notification").after(a("body").hasClass("map-editor-fullscreen") ? '<button class="btn btn-lg btn-default pull-right" id="button-close-fullscreen"><span class="glyphicon glyphicon-remove"></span> Close Fullscreen</button>' : '<button class="btn btn-lg btn-default pull-right" id="button-go-fullscreen"><span class="glyphicon glyphicon-fullscreen"></span> Go Fullscreen</button>')
    }
    var q = 0,
        r = 0,
        s = d,
        t = d;
    a.uber_google_maps_get_stored_settings = function() {
        return a.extend(!0, {}, s)
    }, a.uber_google_maps_open_image_upload = function(a) {
        return t = a, tb_show("", "media-upload.php?type=image&TB_iframe=true"), !1
    }, a(c).ready(function() {
        e(), a(c).on("click", "#button-new-instance", function() {

            var b = a(this).html(),
                c = a(this);
            a(this).prop("disabled", "disabled"), a(this).html("Loading..."), f(function() {
                c.html(b), c.removeProp("disabled")
            }), a(".nav-tabs li").removeClass("active"), a(".tab-pane.active").removeClass("active"), a("#tab-plugin-options").addClass("active"), a("#plugin-options").addClass("active")
        }), a(c).on("click", ".button-instance-edit", function() {
            var b = a(this).data("instance-id");
            r = b;
            var c = a(this).html(),
                d = a(this);
            a(this).prop("disabled", "disabled"), a(this).html("Loading..."), a(".nav-tabs li").removeClass("active"), a(".tab-pane.active").removeClass("active"), a("#tab-plugin-options").addClass("active"), a("#plugin-options").addClass("active"), g(b, function() {
                d.html(c), d.removeProp("disabled")
            })
        }), a(c).on("click", ".button-instance-delete", function() {
            q = a(this).data("instance-id")
        }), a(c).on("click", "#button-instance-delete-confirm", function() {
            if (0 != q) {
                var b = (a(this).data("instance-id"), a(this).html()),
                    c = a(this);
                a(this).prop("disabled", "disabled"), a(this).html("Loading..."), i(q, function() {
                    c.html(b), c.removeProp("disabled"), e()
                })
            }
        }), a(c).on("click", "#button-back-to-main-options", function() {
            o(), m()
        }), a(c).on("click", "#button-save-instance", function() {
            var b = (a(this).html(), a(this));
            a(this).html("Saving..."), j(r, function() {
                b.html('<span class="glyphicon glyphicon-save"></span> Save'), a("#changes-saved-notification").show(), setTimeout(function() {
                    a("#changes-saved-notification").hide()
                }, 2e3)
            })
        }), a(c).on("click", "#button-go-fullscreen", function() {
            n()
        }), a(c).on("click", "#button-close-fullscreen", function() {
            o()
        }), b.send_to_editor = function(a) {
            jQuery(a).is("img") && (imgurl = jQuery(a).attr("src"), tb_remove()), jQuery(a).is("a") && (imgurl = jQuery(a).attr("href"), tb_remove()), jQuery.uber_google_maps_uploaded_image(t, imgurl)
        }
    })
}(jQuery, window, document);
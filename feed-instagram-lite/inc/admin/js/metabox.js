jQuery(document).ready(function ($) {

    var links = $('.gifeedtabcon li a'),
        tabcont = $("#tabs_container"),
        refreshTime,
        feedpos = $('#side-sortables').offset();

    setTimeout(function () {

        $(".gifeeddefaulttab").trigger("click");

        users_initialize();

    }, 100);

    function users_initialize() {

        var users = $('#gifeed_meta_ids_tags').val();

        users = users.split(',');

        $.each(users, function (i, v) {
            $('.gifeed_users[value="' + v + '"]').prop('checked', true);
        });

        gifeed_feedbuilder_id_filter();

    }

    $('.gifeedtabcon li a').on('click', function () {

        if ($(this).attr('id') == 'adv') {

            refreshTime = setTimeout(refreshCodeMirror, 1000);

        }

        $(tabcont).hide();
        $(".tabloader").css("height", "300").addClass("tbloader");
        $(tabcont).find("tr").hide();

        $(tabcont).find("." + $(this).attr("id") + "").fadeIn(150, function () {
            $(tabcont).fadeIn("slow");
            $(".tabloader").css("height", "auto").removeClass("tbloader");
        });

        links.removeClass('tabulous_active');
        $(this).addClass('tabulous_active');

    });

    //	Feed Builder Field
    function gifeed_feedbuilder_id_filter() {

        var $iselmt = $('#gifeed_meta_ids_tags');

        // Remove first comma
        $iselmt.val($iselmt.val().replace(/^,/, ''));
        // Remove last comma
        $iselmt.val($iselmt.val().replace(/,\s*$/, ''));
        // Remove double comma
        $iselmt.val($iselmt.val().replace(/,+/g, ','));

        if ($iselmt.val().indexOf(',') !== -1) {
            $('.feed_field_right').show();

        } else {
            $('.feed_field_right').hide();
            $(".feed_field_right #individual").prop("checked", true);
        }

        // Only allow alphabet, number, underscore and #
        if ($iselmt.val().match(/[^a-zA-Z0-9,#_. ]/g)) {
            $iselmt.val($iselmt.val().replace(/[^a-zA-Z0-9,#_. ]/g, ''));
        }

    } // End gifeed_feedbuilder_id_filter

    $(document).on("keyup contextmenu input", '#gifeed_meta_ids_tags', function () {

        gifeed_feedbuilder_id_filter();

    });

    // Preview
    $("#gifeed-preview").click(function () {

        $("#post").attr({
            "target": "_blank",
            "action": "admin-ajax.php"
        });
        $("#hiddenaction, #originalaction").val("gifeed_generate_preview");
        $("<input>").attr({
            "type": "hidden",
            "name": "action",
            "id": "gifeed_preview"
        }).val("gifeed_generate_preview").appendTo("#post");
        $("<input>").attr({
            "name": "security",
            "id": "gifeed_preview_security"
        }).val(gifeed_metabox_opt.nonce).appendTo("#post");
        $("#post").submit();
        $("#post").attr({
            "target": "",
            "action": "post.php"
        });
        $("#hiddenaction").val("editpost");
        $("#gifeed_preview, #gifeed_preview_security").remove();
        $("#originalaction").val("editpost");

    });

    /* Select Access Token */
    $('.gifeed_users').on('change', function () {

        var defV = $('#gifeed_meta_ids_tags').val();

        if (this.checked) {

            if (defV.indexOf(this.value) > -1) return false;
            $('#gifeed_meta_ids_tags').val(defV + ',' + this.value);

        } else {

            $('#gifeed_meta_ids_tags').val(defV.replace(this.value, ''));

        }

        setTimeout(function () {

            gifeed_feedbuilder_id_filter();

        }, 100);

    });


    $("#tabs_container *").attr("disabled", "disabled").off('click');

    var over = '<div class="overlay">' +
        '</div><a href="' + gifeed_metabox_opt.upgrade_link + '"><div class="upgradenow hvr-wobble-bottom"></div></a>';
    $(over).appendTo('#tabs_container');

    // Video Tutorial
    MediaBox('.mediabox');

    $(window).scroll(function () {

        if ($(window).scrollTop() > feedpos.top) {
            $('#side-sortables').addClass('fixed');
        } else {
            $('#side-sortables').removeClass('fixed');
        }

    });

    function refreshCodeMirror() {

        $('.CodeMirror').each(function (i, el) {
            el.CodeMirror.refresh();
        });

        clearInterval(refreshTime);

    }

}); // End Doc Ready

/*! mediabox v0.0.2 | (c) 2016 Pedro Rogerio | https://github.com/pinceladasdaweb/mediabox */
! function (e, t) {
    "use strict";
    "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? module.exports = t() : e.MediaBox = t()
}(this, function () {
    "use strict";
    var t = function (e) {
        if (!(this && this instanceof t)) return new t(e);
        this.selector = document.querySelectorAll(e), this.root = document.querySelector("body"), this.run()
    };
    return t.prototype = {
        run: function () {
            Array.prototype.forEach.call(this.selector, function (i) {
                i.addEventListener("click", function (e) {
                    e.preventDefault();
                    var t = this.parseUrl(i.getAttribute("href"));
                    this.render(t), this.close()
                }.bind(this), !1)
            }.bind(this))
        },
        template: function (e, t) {
            var i;
            for (i in t) t.hasOwnProperty(i) && (e = e.replace(new RegExp("{" + i + "}", "g"), t[i]));
            return e
        },
        parseUrl: function (e) {
            var t, i = {};
            return (t = e.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/)) ? (i.provider = "youtube", i.id = t[2]) : (t = e.match(/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/)) ? (i.provider = "vimeo", i.id = t[3]) : (i.provider = "Unknown", i.id = ""), i
        },
        render: function (e) {
            var t, i;
            if ("youtube" === e.provider) t = "https://www.youtube.com/embed/" + e.id;
            else {
                if ("vimeo" !== e.provider) throw new Error("Invalid video URL");
                t = "https://player.vimeo.com/video/" + e.id
            }
            i = this.template('<div class="mediabox-wrap"><div class="mediabox-content"><span class="mediabox-close"></span><iframe src="{embed}?autoplay=1" frameborder="0" allowfullscreen></iframe></div></div>', {
                embed: t
            }), this.root.insertAdjacentHTML("beforeend", i)
        },
        close: function () {
            var t = document.querySelector(".mediabox-wrap");
            t.addEventListener("click", function (e) {
                e.target && "SPAN" === e.target.nodeName && "mediabox-close" === e.target.className && (t.classList.add("mediabox-hide"), setTimeout(function () {
                    this.root.removeChild(t)
                }.bind(this), 500))
            }.bind(this), !1)
        }
    }, t
});
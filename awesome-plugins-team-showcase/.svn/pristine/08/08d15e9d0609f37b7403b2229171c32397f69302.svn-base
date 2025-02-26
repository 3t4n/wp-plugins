(function ($) {
    'use strict';

    $(document).ready(function () {

        if (parseInt(getUrlParameter('aws-preview-mode')) === 1)
        {
            init_preview();
        }

        if ($('.js-aws-carousel').length > 0) {

            var columns = $(".js-aws-carousel").data("columns");

            var auto = ($(".js-aws-carousel").data("carousel-auto") === "yes" ? true : false);
            var interval = parseInt($(".js-aws-carousel").data("carousel-interval"));
            var indicators = ($(".js-aws-carousel").data("carousel-indicators") === "yes" ? true : false);
            var arrows = ($(".js-aws-carousel").data("carousel-arrows") === "yes" ? true : false);

            var settings = {
                loop: true,
                margin: 2,
                dots: indicators,
                nav: arrows,
                autoplay: auto,
                autoplayTimeout: interval,
                autoWidth: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    768: {
                        items: 3
                    },
                    1024: {
                        items: 4
                    },
                    1200: {
                        items: columns
                    }
                }
            };

            $('.js-aws-carousel').owlCarousel(settings);

        }

        if ($(".awesome-team-showcase").length > 0)
        {
            $.each($(".awesome-team-showcase ul li"), function (i, val) {
                $("a", val).attr("tabindex", -1);
            });
        }

    });

    $(document).on("click", ".awesome-team-showcase .js-info-modal", function () {

        var aws_container = $(this).closest(".awesome-team-showcase");
        var parent_li = $(this).closest("li.team-showcase-member");

        if ($(".panel-layover", parent_li).attr("aria-hidden") === "true") {

            aws_container.find("li.team-showcase-member").removeClass("active");
            aws_container.find("li.team-showcase-member [tabindex]").attr("tabindex", -1);

            parent_li.addClass("active");
            parent_li.find("[tabindex]").attr("tabindex", 0);

            aws_container.find(".panel-layover").attr("aria-hidden", "true");
            $(".panel-layover", parent_li).attr("aria-hidden", "false");

        }
        else {

            $(".panel-layover", parent_li).attr("aria-hidden", "true");
            parent_li.removeClass("active");

        }

    });

    $(document).on("click", ".awesome-team-showcase .js-info-collapse", function () {


        var aws_container = $(this).closest(".awesome-team-showcase");
        var parent_li = $(this).closest("li.team-showcase-member");

        if ($(".panel-expanded", parent_li).attr("aria-expanded") === "false") {


            aws_container.find("li.team-showcase-member").removeClass("active");
            aws_container.find("li.team-showcase-member a").attr("tabindex", -1);

            parent_li.addClass("active");
            parent_li.find("a").attr("tabindex", -1);

            aws_container.find(".panel-expanded").attr("aria-expanded", "false");
            $(".panel-expanded", parent_li).attr("aria-expanded", "true");

        }
        else {

            $(".panel-expanded", parent_li).attr("aria-expanded", "false");
            aws_container.find("li.team-showcase-member").removeClass("active");

        }

    });

    $(document).on("click", ".panel-expanded .prev-panel", function () {

        var parent_li = $(this).closest("li.list-item");

        var index = $("li.list-item").index(parent_li);

        if (index > 0)
        {
            index--;
            $("li.list-item:eq(" + index + ") .js-expander").click();
        }

    });

    $(document).on("click", ".panel-expanded .next-panel", function () {

        var parent_li = $(this).closest("li.list-item");

        var index = $("li.list-item").index(parent_li);

        if (index < $("li.list-item").length)
        {
            index++;
            $("li.list-item:eq(" + index + ") .js-expander").click();
        }

    });

    $(document).on("focus", ".awesome-team-showcase", function (e) {

        $(this).find("ul.team-showcase li").removeClass("focus");
        $(this).find("ul.team-showcase li:eq(0)").addClass("focus");

    });

    $(document).on("focusout", ".awesome-team-showcase", function (e) {

        $(this).find("ul.team-showcase li").removeClass("focus");

    });

    $(document).on("keydown", ".awesome-team-showcase [tabindex]", function (e) {

        var container = $(this).closest(".awesome-team-showcase");

        if (container.find(".panel-layover[aria-hidden='false']").length > 0)
        {

            showcase_key_layover.keydown(e);

        }
        else
        {

            var focus = $(":focus");

            if (focus.closest(".awesome-team-showcase").length > 0)
            {
                showcase_grid_keys.keydown(e);
            }

        }


    });

    var showcase_key_layover = {

        keydown: function (e)
        {

            var key = e.which;

            var current = $("li.list-item.active");

            var c_ind = $("li.list-item").index(current);

            switch (key) {

                case 13: // ESC

                    current.find(".panel-layover-container .js-info-modal").click();

                    break;
                    
                case 27: // ESC

                    current.find(".panel-layover-container .js-info-modal").click();

                    break;
                    
                case 39: // Move next
                    
                    c_ind++;
                    $("li.list-item:eq(" + c_ind + ") .card .js-info-modal").click();

                    break;
                case 37: // Move prev

                    c_ind--;
                    $("li.list-item:eq(" + c_ind + ") .card .js-info-modal").click();

                    break;

            }

        }

    };

    var showcase_grid_keys = {

        keydown: function (e) {

            var key = e.which;

            var focus = $(":focus");

            var current = $("li.list-item.active");

            switch (key) {

                case 39:

                    var index = $("li.team-showcase-member").index($("li.team-showcase-member.focus"));
                    index++;
                    $("li.team-showcase-member").removeClass("focus");
                    $("li.team-showcase-member:eq(" + index + ")").addClass("focus");

                    if (current.find(".panel-expanded").attr("aria-hidden") === "false")
                    {
                        $("li.list-item:eq(" + index + ") .card .js-info-modal").click();
                    }
                    else if (current.find(".panel-expanded").attr("aria-expanded") === "true")
                    {
                        $("li.list-item:eq(" + index + ") .card .js-info-collapse").click();
                    }

                    break;

                case 37:

                    var index = $("li.team-showcase-member").index($("li.team-showcase-member.focus"));
                    index--;
                    $("li.team-showcase-member").removeClass("focus");
                    $("li.team-showcase-member:eq(" + index + ")").addClass("focus");

                    if (current.find(".panel-expanded").attr("aria-hidden") === "false")
                    {
                        $("li.list-item:eq(" + index + ") .card .js-info-modal").click();
                    }
                    else if (current.find(".panel-expanded").attr("aria-expanded") === "true")
                    {
                        $("li.list-item:eq(" + index + ") .card .js-info-collapse").click();
                    }


                    break;

                case 32:

                    e.preventDefault();

                    var li_focus = focus.find("li.focus");

                    li_focus.find(".panel-expanded .js-info-collapse").click();
                    li_focus.find(".panel-layover .js-info-modal").click();

                    break;

                case 13:

                    e.preventDefault();
                    var li_focus = focus.find("li.focus");
                    
                    li_focus.find(".panel-expanded .js-info-collapse").click();
                    li_focus.find(".panel-layover .js-info-modal").click();

                    break;

                case 27:

                    e.preventDefault();
                    var li_focus = focus.find("li.focus");


                    if (current.find(".panel-expanded").attr("aria-hidden") === "false")
                    {
                        li_focus.find(".panel-layover .js-info-modal").click();
                    }
                    else if (current.find(".panel-expanded").attr("aria-expanded") === "true")
                    {
                        li_focus.find(".panel-expanded .js-info-collapse").click();
                    }

                    break;

            }

        }

    };

    $(document).on("keydown", "[data-showcase='grid']", function (e)
    {

        console.log("KeyDown " + e.which);

        let current = $(":focus");

        adjust_tabindex();


        // TAB      9
        // Enter    13
        // Shift    16
        // Esc    27
        // Space    32
        // Down     40
        // Up       38
        // Home     36
        // End      35

        switch (e.which) {

            case 9: // Tab

                if (e.shiftKey)
                {
                    keyGrid.alttab(e);
                }
                else
                {
                    keyGrid.tab(e);
                }

                break;
            case 13: // Enter
                break;

            case 27: // Esc
                break;

            case 32: // Space
                keyGrid.space(e);
                e.preventDefault();
                break;

            case 37: // left
                keyGrid.left();
                e.preventDefault();
                break;

            case 38: // up
                //menu_move_up(e);
                break;

            case 39: // right
                keyGrid.right();
                e.preventDefault();
                break;

            case 40: // down
                break;

            case 36: // Home
                break;

            case 35: // End
                break;

            default:
                return;

        }

    });

    var keyGrid = {

        space: function () {

            let c_current = $(".card-active");
            c_current.find(".js-expander").click();


        },

        tab: function (e) {

            let current = $(":focus");
            let index = $(".card-active :focusable").index(current);
            let max = $(".card-active :focusable").length - 1;

            if (index >= max)
            {
                e.preventDefault();
                $("[data-showcase='grid']").focus();
            }


        },
        alttab: function (e) {

            let current = $(":focus");
            let index = $(".card-active :focusable").index(current);
            let max = $(".card-active :focusable").length - 1;

            if (index <= 0)
            {
                e.preventDefault();
                $("[data-showcase='grid']").focus();
            }

        },

        left: function () {

            let c_current = $(".card-active");

            $(".card-active").removeClass("card-active");

            let index = $(".card").index(c_current);
            index--;

            if (index < 0)
            {
                index = (c_current.closest("[data-showcase='grid']").find(".card").length) - 1;
            }

            var $cell = $('.card');
            var $thisCell = $(".card:eq(" + index + ")");

            $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
            $thisCell.removeClass('is-collapsed').addClass('is-expanded');
            $thisCell.addClass("card-active");

            if ($cell.not($thisCell).hasClass('is-inactive')) {

                $cell.not($thisCell).siblings().removeClass('is-inactive');
                $cell.not($thisCell).addClass('is-inactive');

            }
            else {

                $cell.not($thisCell).addClass('is-inactive');

            }

            this.movescroll($thisCell);

        },

        right: function () {

            let c_current = $(".card-active");

            $(".card-active").removeClass("card-active");

            let index = $(".card").index(c_current);
            index++;

            if ((index + 1) > c_current.closest("[data-showcase='grid']").find(".card").length)
            {
                index = 0;
            }

            var $cell = $('.card');
            var $thisCell = $(".card:eq(" + index + ")");

            $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
            $thisCell.removeClass('is-collapsed').addClass('is-expanded');
            $thisCell.addClass("card-active");

            if ($cell.not($thisCell).hasClass('is-inactive')) {

                $cell.not($thisCell).siblings().removeClass('is-inactive');
                $cell.not($thisCell).addClass('is-inactive');

            }
            else {

                $cell.not($thisCell).addClass('is-inactive');

            }

            this.movescroll($thisCell);

        },

        movescroll: function (cell) {

            var oftop = cell.position().top;

            $("html, body").stop(true).animate({
                scrollTop: oftop
            }, 150);

        }

    };

    function adjust_tabindex() {

        $('[data-showcase="grid"] *').removeAttr("tabindex");

        let tabindex = $('[data-showcase="grid"]').attr("tabindex");

        $.each($('.card-active [data-tab="true"]'), function (i, val) {

            var newtab = parseInt(tabindex) + 1 + i;
            $(val).attr("tabindex", newtab);

        });

    }

    function init_preview()
    {

        $(".post-list.team-showcase").addClass("aws-preview-mode");
        $(".post-list.team-table").addClass("aws-preview-mode");
        $(".aws-carousel").addClass("aws-preview-mode");


    }

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };


})(jQuery);



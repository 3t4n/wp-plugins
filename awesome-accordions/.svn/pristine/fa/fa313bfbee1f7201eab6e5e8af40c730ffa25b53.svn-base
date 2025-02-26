(function ($) {
    'use strict';

    $(document).ready(function () {

        if( $(".awesome-accordion").length > 0 )
        {
            $(".awesome-accordion.no-js").removeClass("no-js");
            prevent_focusable();
        }

        if( window.location.hash && $(".js-open-close-acc[data-hash]").length > 0 ) {
            
            let key = window.location.hash;
                key = key.substring(1);

            $(".awesome-accordion-item").addClass("closed");
            $(".awesome-accordion-panel").css("max-height", 0);

            $(".js-open-close-acc[data-hash='"+key+"']").click();
            
        }

    });

    $( window ).resize(function() {

        if( $(".awesome-accordion").length > 0 )
        {
            $(".awesome-accordion.no-js").removeClass("no-js");
            prevent_focusable();
        }

        if( window.location.hash && $(".js-open-close-acc[data-hash]").length > 0 ) {
            
            let key = window.location.hash;
                key = key.substring(1);

            $(".awesome-accordion-item").addClass("closed");
            $(".awesome-accordion-panel").css("max-height", 0);

            $(".js-open-close-acc[data-hash='"+key+"']").click();
            
        }
    });

    $(document).keydown(function (e) {

        let current = $(":focus");

        switch (e.which) {

            case 38: // up
                
                move_up_down(-1);
                
                break;

            case 40: // down
                
                move_up_down(1);
                
                break;
                
            case 36: // Home
                
                go_home_end(-1);
                
                break;
                
            case 35: // End
                
                go_home_end(1);
                
                break;

            default:
                return; // exit this handler for other keys
        }

        if( current.closest("ul.awesome-accordion").length > 0 && current.closest(".awesome-accordion-panel").length < 1 )
        {
            e.preventDefault(); // prevent the default action (scroll / move caret)
        }

    });

    $(document).on("click", ".js-open-close-acc", function () {
console.log("flag open/close")
        toggle_height($(this));

    });

    $(document).on("click", ".js-open-close-all", function () {
        console.log("flag open/close all")
        toggle_press($(this));

    });

    $(document).on("click", "[data-accordion-action]", function () {

        if ($(this).data("accordion-action") === "openall")
        {
            $(".awesome-accordion-item").removeClass("closed");
            $(".awesome-accordion-panel").css("max-height", "none");
        }
        else if ($(this).data("accordion-action") === "closeall")
        {
            $(".awesome-accordion-item").addClass("closed");
            $(".awesome-accordion-panel").css("max-height", 0);
        }

    });

    $(document).on("focusin", ".awesome-accordion-item", function () {

    });

    $(document).on("focusout", ".awesome-accordion-item", function () {

    });


    // FUNCTIONS
    ////////////////////////////////////////////////////////////////////////////

    function prevent_focusable()
    {
        $(".awesome-accordion-panel *").attr("tabindex", -1);
        $("li.opened .awesome-accordion-panel *").removeAttr("tabindex");
        $("li.opened .awesome-accordion-panel").attr("tabindex", 0);
    }

    function move_up_down(action)
    {
        
        let current = $(":focus");
        
        if( current.hasClass("js-open-close-acc") )
        {
            
            let ind = $(".js-open-close-acc").index(current);
                ind = ind + action;
            
            if( ind === $(".js-open-close-acc").length )
            {
                ind = 0;
            }
            else if( ind < 0 )
            {
                ind = $(".js-open-close-acc").length - 1;
            }
            
            $(".js-open-close-acc:eq(" + ind + ")").focus();
            
        }
        
    }

    function go_home_end(action)
    {
        
        let current = $(":focus");
        
        if( current.hasClass("js-open-close-acc") )
        {
            
            var ind = 0;
            
            if( action > 0 )
            {
                ind = $(".js-open-close-acc").length -1;
            }
            
            $(".js-open-close-acc:eq(" + ind + ")").focus();
            
        }
        
    }

    function toggle_height(element) {

        let li_elem = element.closest("li.awesome-accordion-item");
        let ac_elem = li_elem.find(".awesome-accordion-panel");

        $("[data-accordion-action][aria-pressed]").attr("aria-pressed", "false");

        if (li_elem.hasClass("closed"))
        {
            
            let parentul = li_elem.closest("ul.awesome-accordion");
            
            if( !parentul.data("allow-multiple") )
            {
                
                parentul.find(".awesome-accordion-btn").attr("aria-expanded", "false");
                parentul.find(".awesome-accordion-item").addClass("closed").removeClass("opened");
                parentul.find(".awesome-accordion-panel").attr("tabindex",-1).css("max-height", 0);
                
            }
            
            ac_elem.css("max-height", "400px");
            li_elem.removeClass("closed");
            li_elem.find(".awesome-accordion-btn").attr("aria-expanded", "true");
            
            li_elem.find(".awesome-accordion-panel *").removeAttr("tabindex");
            $(".awesome-accordion-panel").attr("tabindex", 0);
            
            let hash = element.data("hash");
            window.location.hash = hash;
            
        }
        else
        {
            
            ac_elem.css("max-height", 0);
            li_elem.addClass("closed");
            li_elem.removeClass("opened");
            li_elem.find(".awesome-accordion-btn").attr("aria-expanded", "false");
            
            li_elem.find(".awesome-accordion-panel *").attr("tabindex", -1);
            $(".awesome-accordion-panel").attr("tabindex",-1);
            
            history.pushState(null, null, '#');
            
        }
    }

    function toggle_press(element) {
        
        $("[data-accordion-action][aria-pressed]").attr("aria-pressed", "false");
        element.attr("aria-pressed", "true");
        
    }

    var beforePrint = function () {

        $(".awesome-accordion-item").removeClass("closed");
        $(".awesome-accordion-panel").css("max-height", "none");

    };

    var afterPrint = function () {

        $(".awesome-accordion-item").addClass("closed");
        $(".awesome-accordion-panel").css("max-height", 0);

        $(".awesome-accordion-item").first().removeClass("closed").find(".awesome-accordion-panel").css("max-height", 400);

    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function (mql) {
            if (mql.matches) {
                beforePrint();
            }
            else {
                afterPrint();
            }
        });
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;


})(jQuery);
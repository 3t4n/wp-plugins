(function ($) {
    'use strict';

    ////////////////////////////////////////////////////////////////////////////
    // GLOBAL VARS /////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    var global_editor;


    ////////////////////////////////////////////////////////////////////////////
    // EVENTS //////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    $(document).ready(function () {

        if( $("#baccordion-meta-settings").length > 0 )
        {
            $("#postbox-container-2 .postbox:not(#baccordion-meta-settings,#accordion_pro_settings)").hide();
        }

        if ( $(".js-accordion-container").length > 0 && typeof (tinymce) !== "undefined" && tinymce.editors)
        {

            var delay_reinit = setInterval(function () {

                reset_tiny();
                do_sortable();

                clearInterval(delay_reinit);

            }, 250);

        }

    });

    $(document).on("click", ".js-accordion-open", function () {

        var $this = $(this);

        var parent = $this.closest("li.accordion-item");
        var content = parent.find(".accordion-content");

        if (parent.hasClass('accordion-opened'))
        {

            $("li.accordion-item").removeClass("accordion-opened");
            $(".accordion-content").removeClass('opened').slideUp(350);

        }
        else
        {

            $("li.accordion-item").removeClass("accordion-opened");
            parent.addClass("accordion-opened");

            content.addClass('opened');
            content.slideToggle(350);

        }

    });

    $(document).on("click", ".js-remove-accordion", function () {

        $(".js-remove-active").removeClass("js-remove-active");
        $(this).addClass("js-remove-active");
        $(".accordion-remove-layover").fadeIn();

    });

    $(document).on("click", ".js-cancel-confirmation", function () {

        $(".accordion-remove-layover").fadeOut();

    });

    $(document).on("click", ".js-remove-confirmation", function () {

        $(".js-remove-active").closest("li.accordion-item").remove();

        $(".accordion-remove-layover").fadeOut();

        save_update_accordions();

    });

    $(document).on("click", ".js-remove-confirm", function () {

        $(this).closest(".accordion-item").remove();

    });

    $(document).on("click", ".js-add-accordion", function () {

        var data = {
            action: "accordion_new_element",
            id: $(".accordion-item").length
        };

        $.post(ajaxurl, data, function (res) {

            $(".js-accordion-container").append(res);
            reset_tiny();

            $(".js-accordion-open").last().click();

        });

    });

    $(document).on("change keyup click", ".accordion-container .accordion-content", function (e) {

        $(this).find(".js-save-accordion").html("Save");

    });

    $(document).on("click", ".js-save-accordion", function (e) {

        e.preventDefault();

        let $this = $(this);

        save_update_accordions($this);

    });



    ////////////////////////////////////////////////////////////////////////////
    // FUNCTIONS ///////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
    function do_sortable()
    {
        
        $("#sortable").sortable({
            handle: ".portlet-header",
            start: function (event, ui)
            {
                if (tinymce.editors.length > 0)
                {
                    global_editor = tinymce.editors[0].settings;
                    global_editor.selector = "textarea";
                }
                tinymce.remove();
            },
            stop: function (event, ui) {

                $.each($(".accordion-content"), function (i, val) {
                    
                    global_editor.setup = function (ed) {
                        ed.on('change', function (e) {

                            var editor_id = ed.id;

                            $("#wp-" + editor_id + "-wrap").closest("li").find(".js-save-accordion").html("Save");

                        });
                    };

                    tinymce.init(global_editor);

                });

                var delay = setInterval(function () {

                    save_update_accordions();
                    clearInterval(delay);

                }, 500);

            }
        });

        $("#sortable").disableSelection();
    }

    function save_update_accordions(button = false)
    {

        let post_id = $("#acc-post-id").val();

        let accs = [];

        $.each($("li.accordion-item"), function (i, val) {

            var index = $(".wp-editor-wrap", val).attr("id");
            index = index.replace('wp-accordions_', '');
            index = index.replace('-wrap', '');
            index = parseInt(index);

            accs.push({
                name: $("input.acc-name", val).val(),
                content: tinymce.editors[i].getContent({format: 'text'})
            });

        });

        var data = {
            action: "accordion_save_data",
            post_id: post_id,
            accs: accs
        };

        $.post(ajaxurl, data, function (res) {

            $.each(res, function (i, val) {

                $(".accordion-item:eq(" + i + ") .accordion-title").html(val.name);

            });

            if (button)
            {
                button.html("Saved");
            }

            $(".spinner").removeClass("is-active");

        }, "json");

    }

    function reset_tiny()
    {
        var delay_reinit = setInterval(function () {

            if (tinymce.editors.length > 0)
            {
                
                global_editor = tinymce.editors[0].settings;
                global_editor.selector = "textarea";

                tinymce.remove();

                global_editor.setup = function (ed) {
                    
                    ed.on('change', function (e) {

                        var editor_id = ed.id;

                        $("#wp-" + editor_id + "-wrap").closest("li").find(".js-save-accordion").html("Save");

                    });
                };

                tinymce.init(global_editor);

                clearInterval(delay_reinit);

            }
            else
            {
                clearInterval(delay_reinit);
            }

        }, 250);
    }

})(jQuery);
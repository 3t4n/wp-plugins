document.addEventListener("DOMContentLoaded", function () {
    const $ = jQuery;

    $("#rankology-tabs .hidden").removeClass("hidden");
    $("#rankology-tabs").tabs();

    function rkseo_get_field_length(e) {
        if (e.val().length > 0) {
            meta = e.val() + " ";
        } else {
            meta = e.val();
        }
        return meta;
    }

    /**
     * Execute a function given a delay time
     *
     * @param {type} func
     * @param {type} wait
     * @param {type} immediate
     * @returns {Function}
     */
    var debounce = function (func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    /**
     * Get Preview meta title
     */
    $("#rankology_titles_title_meta").on(
        "change paste keyup",
        debounce(function (e) {
            const template = $(this).val();
            const termId = $("#rankology-tabs").data("term-id");
            const homeId = $("#rankology-tabs").data("home-id");

            $.ajax({
                method: "GET",
                url: rankologyAjaxRealPreview.ajax_url,
                data: {
                    action: "get_preview_meta_title",
                    template: template,
                    post_id: $("#rankology-tabs").attr("data_id"),
                    term_id: termId.length === 0 ? undefined : termId,
                    home_id: homeId.length === 0 ? undefined : homeId,
                    nonce: rankologyAjaxRealPreview.get_preview_meta_title,
                },
                success: function (response) {
                    const { data } = response;

                    if (data.length > 0) {
                        $(".snippet-title").hide();
                        $(".snippet-title-default").hide();
                        $(".snippet-title-custom").html(data).text();
                        $(".snippet-title-custom").show();
                        if ($("#rankology_titles_title_counters").length > 0) {
                            $("#rankology_titles_title_counters").text(
                                data.length
                            );
                        }
                        if ($("#rankology_titles_title_pixel").length > 0) {
                            $("#rankology_titles_title_pixel").text(
                                pixelTitle(data)
                            );
                        }
                    } else {
                        $(".snippet-title").hide();
                        $(".snippet-title-custom").hide();
                        $(".snippet-title-default").show();
                    }
                },
            });
        }, 300)
    );

    $("#rankology_titles_title_meta_ct").on(
        "change paste keyup",
        debounce(function (e) {
            const template = $(this).val();
            const termId = $("#rankology-tabs").data("term-id");
            const homeId = $("#rankology-tabs").data("home-id");

            $.ajax({
                method: "GET",
                url: rankologyAjaxRealPreview.ajax_url,
                data: {
                    action: "get_preview_meta_title",
                    template: template,
                    post_id: $("#rankology-tabs").attr("data_id"),
                    term_id: termId.length === 0 ? undefined : termId,
                    home_id: homeId.length === 0 ? undefined : homeId,
                    nonce: rankologyAjaxRealPreview.get_preview_meta_title,
                },
                success: function (response) {
                    const { data } = response;

                    if (data.length > 0) {
                        $(".snippet-title-ct").hide();
                        $(".snippet-title-default-ct").hide();
                        $(".snippet-title-custom-ct").html(data).text();
                        $(".snippet-title-custom-ct").show();
                        if ($("#rankology_titles_title_counters").length > 0) {
                            $("#rankology_titles_title_counters").text(
                                data.length
                            );
                        }
                        if ($("#rankology_titles_title_pixel").length > 0) {
                            $("#rankology_titles_title_pixel").text(
                                pixelTitle(data)
                            );
                        }
                    } else {
                        $(".snippet-title-ct").hide();
                        $(".snippet-title-custom-ct").hide();
                        $(".snippet-title-default-ct").show();
                    }
                },
            });
        }, 300)
    );


    $("#rankology_titles_desc_meta").on(
        "change paste keyup",
        debounce(function (e) {
            const template = $(this).val();
            const termId = $("#rankology-tabs").data("term-id");
            const homeId = $("#rankology-tabs").data("home-id");

            $.ajax({
                method: "GET",
                url: rankologyAjaxRealPreview.ajax_url,
                data: {
                    action: "get_preview_meta_title",
                    template: template,
                    post_id: $("#rankology-tabs").attr("data_id"),
                    term_id: termId.length === 0 ? undefined : termId,
                    home_id: homeId.length === 0 ? undefined : homeId,
                    nonce: rankologyAjaxRealPreview.get_preview_meta_title,
                },
                success: function (response) {
                    const { data } = response;

                    if (data.length > 0) {
                        $(".snippet-description-custom").html(data).text();
                        $(".snippet-description-custom").show();
                        $(".snippet-description").hide();
                        $(".snippet-description-default").hide();
                        
                        if ($("#rankology_titles_desc_counters").length > 0) {
                            $("#rankology_titles_desc_counters").text(
                                data.length
                            );
                        }
                        if ($("#rankology_titles_desc_pixel").length > 0) {
                            $("#rankology_titles_desc_pixel").text(
                                pixelTitle(data)
                            );
                        }
                    } else {
                        $(".snippet-description").hide();
                        $(".snippet-description-custom").hide();
                        $(".snippet-description-default").show();
                    }
                    
                },
            });
        }, 300)
    );

    $("#rankology_titles_desc_meta_ct").on(
        "change paste keyup",
        debounce(function (e) {
            const template = $(this).val();
            const termId = $("#rankology-tabs").data("term-id");
            const homeId = $("#rankology-tabs").data("home-id");

            $.ajax({
                method: "GET",
                url: rankologyAjaxRealPreview.ajax_url,
                data: {
                    action: "get_preview_meta_title",
                    template: template,
                    post_id: $("#rankology-tabs").attr("data_id"),
                    term_id: termId.length === 0 ? undefined : termId,
                    home_id: homeId.length === 0 ? undefined : homeId,
                    nonce: rankologyAjaxRealPreview.get_preview_meta_title,
                },
                success: function (response) {
                    const { data } = response;

                    if (data.length > 0) {
                        $(".snippet-description-custom-ct").html(data).text();
                        $(".snippet-description-custom-ct").show();
                        $(".snippet-description-ct").hide();
                        $(".snippet-description-default-ct").hide();
                        
                        if ($("#rankology_titles_desc_counters").length > 0) {
                            $("#rankology_titles_desc_counters").text(
                                data.length
                            );
                        }
                        if ($("#rankology_titles_desc_pixel").length > 0) {
                            $("#rankology_titles_desc_pixel").text(
                                pixelTitle(data)
                            );
                        }
                    } else {
                        $(".snippet-description-ct").hide();
                        $(".snippet-description-custom-ct").hide();
                        $(".snippet-description-default-ct").show();
                    }
                    
                },
            });
        }, 300)
    );

//on click chnage the post & description lenght on preview in post edit & add in the meta title & metqa description

    $("#rankology-tag-single-title").click(function () {

        $("#rankology_titles_title_meta").val(
            rkseo_get_field_length($("#rankology_titles_title_meta")) +
            $("#rankology-tag-single-title").attr("data-tag")
        );
         $("#rankology_titles_title_meta").trigger("paste");
    });

    $("#rankology-tag-single-excerpt").click(function () {

        $("#rankology_titles_desc_meta").val(
            rkseo_get_field_length($("#rankology_titles_desc_meta")) +
            $("#rankology-tag-single-excerpt").attr("data-tag")
        );
        $("#rankology_titles_desc_meta").trigger("paste");
    });
    $("#rankology-tag-single-site-title").click(function () {
        $("#rankology_titles_title_meta").val(
            rkseo_get_field_length($("#rankology_titles_title_meta")) +
            $("#rankology-tag-single-site-title").attr("data-tag")
        );
        $("#rankology_titles_title_meta").trigger("paste");
    });
    // $("#rankology-tag-single-excerpt").click(function () {
    //     $("#rankology_titles_desc_meta").val(
    //         rkseo_get_field_length($("#rankology_titles_desc_meta")) +
    //         $("#rankology-tag-single-excerpt").attr("data-tag")
    //     );
    //     $("#rankology_titles_title_meta").trigger("paste");
    // });
    $("#rankology-tag-single-sep").click(function () {
        $("#rankology_titles_title_meta").val(
            rkseo_get_field_length($("#rankology_titles_title_meta")) +
            $("#rankology-tag-single-sep").attr("data-tag")
        );
        $("#rankology_titles_title_meta").trigger("paste");
    });

    let alreadyBind = false;

    //All variables
    $(".rankology-tag-dropdown").each(function (item) {
        const _self = $(this);

        function handleClickLi(current) {
            if (_self.hasClass("tag-title")) {
                $("#rankology_titles_title_meta").val(
                    rkseo_get_field_length($("#rankology_titles_title_meta")) +
                    $(current).attr("data-value")
                );
                $("#rankology_titles_title_meta").trigger("paste");
            }
            if (_self.hasClass("tag-description")) {
                $("#rankology_titles_desc_meta").val(
                    rkseo_get_field_length($("#rankology_titles_desc_meta")) +
                    $(current).attr("data-value")
                );
                $("#rankology_titles_desc_meta").trigger("paste");
            }
            // if (_self.hasClass("tag-titles")) {
            //     $("#rankology_titles_desc_meta").val(
            //         rkseo_get_field_length($("#rankology_titles_desc_meta")) +
            //         $(current).attr("data-value")
            //     );
            //     $("#rankology_titles_desc_meta").trigger("paste");
            // }
        }

        $(this).on("click", function () {
            $(this).next(".rkseo-wrap-tag-variables-list").toggleClass("open");

            $(this)
                .next(".rkseo-wrap-tag-variables-list")
                .find("li")
                .on("click", function (e) {
                    handleClickLi(this);
                    e.stopImmediatePropagation();
                })
                .on("keyup", function (e) {
                    if (e.keyCode === 13) {
                        handleClickLi(this);
                        e.stopImmediatePropagation();
                    }
                });

            function closeItem(e) {
                if (
                    $(e.target).hasClass("dashicons") ||
                    $(e.target).hasClass("rankology-tag-single-all")
                ) {
                    return;
                }

                alreadyBind = false;
                $(document).off("click", closeItem);
                $(".rkseo-wrap-tag-variables-list").removeClass("open");
            }

            if (!alreadyBind) {
                alreadyBind = true;
                $(document).on("click", closeItem);
            }
        });
    });


    /*for decription short code ajax*/

    
});

jQuery(document).ready(function($) {

    // Function to copy text to clipboard
    function copyToClipboard(text) {
        const tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(text).select();
        document.execCommand('copy');
        tempInput.remove();
    }

    // Add click event to individual copy buttons
    $('.rankology-copy-button').on('click', function() {
        const link = $(this).data('link');
        copyToClipboard(link);
    
        // Save the original HTML of the button
        const originalHTML = $(this).html();
    
        // Change button text to "Copied" with the icon
        $(this).html('<span class="dashicons dashicons-yes"></span> Copied').prop('disabled', true);
    
        // Reset text and icon after 2 seconds
        setTimeout(() => {
            $(this).html(originalHTML).prop('disabled', false);
        }, 2000);
    });
    
    // // Add click event to the "Copy All" button
    // $('#copy-all').on('click', function() {
    //     const allTitles = $('.copy-button')
    //         .map(function() {
    //             return $(this).data('title');
    //         })
    //         .get()
    //         .join('\n');
    //     copyToClipboard(allTitles);

    //     // Change button text to "Copied"
    //     $(this).text('Copied').prop('disabled', true);

    //     // Reset text after 2 seconds
    //     setTimeout(() => {
    //         $(this).text('Copy All to Post Content').prop('disabled', false);
    //     }, 2000);
    // });
});







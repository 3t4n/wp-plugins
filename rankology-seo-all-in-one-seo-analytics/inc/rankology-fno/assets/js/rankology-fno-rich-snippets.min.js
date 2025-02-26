jQuery(document).ready(function ($) {
    function makeid(length) {
        for (var result = "", characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", charactersLength = characters.length, i = 0; i < length; i++)
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        return result;
    }
    function bindSnippetArticleCounter(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] .rankology_rich_snippets_articles_counters";
        $(selector).after('<div class="rankology_rich_snippets_articles_counters_val">/ 110</div>'),
            0 != $(selector).length &&
                ($(selector).text($(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_article_title_meta").val().length),
                $(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_article_title_meta").val().length > 110 && $(selector).css("color", "red"),
                $(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_article_title_meta").keyup(function (event) {
                    $(selector).css("color", "inherit"),
                        $(this).val().length > 110 && $(selector).css("color", "red"),
                        $(selector).text($(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_article_title_meta").val().length),
                        $(this).val().length > 0
                            ? ($(".snippet-title-custom").text(event.target.value), $(".snippet-title").css("display", "none"), $(".snippet-title-custom").css("display", "block"), $(".snippet-title-default").css("display", "none"))
                            : 0 == $(this).val().length && ($(".snippet-title-default").css("display", "block"), $(".snippet-title-custom").css("display", "none"), $(".snippet-title").css("display", "none"));
                }));
    }
    function bindSnippetCourseDescription(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] .rankology_rich_snippets_courses_counters";
        $(selector).after('<div id="rankology_rich_snippets_courses_counters_val">/ 60</div>'),
            0 != $(selector).length &&
                ($(selector).text($(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_courses_desc").val().length),
                $(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_courses_desc").val().length > 60 && $(selector).css("color", "red"),
                $(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_courses_desc").keyup(function (event) {
                    $(selector).css("color", "inherit"),
                        $(this).val().length > 60 && $(selector).css("color", "red"),
                        $(selector).text($(".box-schema-item[data-key='" + number + "'] .rankology_fno_rich_snippets_courses_desc").val().length),
                        $(this).val().length > 0
                            ? ($(".snippet-title-custom").text(event.target.value), $(".snippet-title").css("display", "none"), $(".snippet-title-custom").css("display", "block"), $(".snippet-title-default").css("display", "none"))
                            : 0 == $(this).val().length && ($(".snippet-title-default").css("display", "block"), $(".snippet-title-custom").css("display", "none"), $(".snippet-title").css("display", "none"));
                }));
    }
    function bindDatePicker() {
        $(".rankology-date-picker").datepicker({
            dateFormat: "yy-mm-dd",
            beforeShow: function (input, inst) {
                $("#ui-datepicker-div").removeClass("ui-date-picker").addClass("rankology-ui-datepicker");
            },
        });
    }
    function bindOneUploadMedia(number, itemSelector) {
        const item_id = ".box-schema-item[data-key='" + number + "'] #" + $(itemSelector).attr("id");
        var mediaUploader;
        $(itemSelector).click(function (e) {
            e.preventDefault(),
                mediaUploader
                    ? mediaUploader.open()
                    : ((mediaUploader = wp.media.frames.file_frame = wp.media({ multiple: !1 })).on("select", function () {
                          (attachment = mediaUploader.state().get("selection").first().toJSON()),
                              $(item_id).attr("data-id") && (item_id = $(item_id).attr("data-id")),
                              $(item_id + "_meta").val(attachment.url),
                              $(item_id + "_attachment_id").length > 0 && $(item_id + "_attachment_id").val(attachment.id),
                              $(item_id + "_width").val(attachment.width),
                              $(item_id + "_height").val(attachment.height);
                      }),
                      mediaUploader.open());
        });
    }
    function bindUploadMedia(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] .rankology_media_upload";
        0 !== $(selector).length &&
            $(selector).each(function (key, itemSelector) {
                bindOneUploadMedia(number, itemSelector);
            });
    }
    function rankology_call_faq_accordion(number) {
        0 !== $(".box-schema-item[data-key='" + number + "'] #wrap-faq .faq").length &&
            $(".box-schema-item[data-key='" + number + "'] #wrap-faq .faq").accordion({ animate: !1, collapsible: !0, active: !1, heightStyle: "panel", header: "h3" });
    }
    function bindPositiveNotesAccordion(number) {
        0 !== $(".box-schema-item[data-key='" + number + "'] #wrap-positive-notes .positive_notes").length &&
            $(".box-schema-item[data-key='" + number + "'] #wrap-positive-notes .positive_notes").accordion({ animate: !1, collapsible: !0, active: !1, heightStyle: "panel", header: "h3" });
    }
    function bindNegativeNotesAccordion(number) {
        0 !== $(".box-schema-item[data-key='" + number + "'] #wrap-negative-notes .negative_notes").length &&
            $(".box-schema-item[data-key='" + number + "'] #wrap-negative-notes .negative_notes").accordion({ animate: !1, collapsible: !0, active: !1, heightStyle: "panel", header: "h3" });
    }
    function bindAddFaq(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] #wrap-faq";
        if (0 !== $(selector).length) {
            var template = $(".box-schema-item[data-key='" + number + "'] #wrap-faq .faq:last").clone(),
                stop = !1;
            $(".box-schema-item[data-key='" + number + "'] #wrap-faq .faq h3").click(function (event) {
                stop && (event.stopImmediatePropagation(), event.preventDefault(), (stop = !1));
            });
            var sectionsCount = $("#wrap-faq").attr("data-count");
            $(".box-schema-item[data-key='" + number + "'] #add-faq").click(function (e) {
                var section;
                return (
                    e.preventDefault(),
                    sectionsCount++,
                    template
                        .clone()
                        .find(":input")
                        .each(function () {
                            var input_id = this.id,
                                input_name = this.name,
                                newId = this.id.replace(/(\[rankology_fno_rich_snippets_faq\])\[.*?\]/, "$1[" + sectionsCount + "]");
                            $(this).attr("name", input_name.replace(/(\[rankology_fno_rich_snippets_faq\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                $(this)
                                    .prev()
                                    .attr("for", input_id.replace(/(\[rankology_fno_rich_snippets_faq\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                $(this)
                                    .prev()
                                    .attr("id", input_name.replace(/(\[rankology_fno_rich_snippets_faq\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                (this.id = newId);
                        })
                        .end()
                        .appendTo(".box-schema-item[data-key='" + number + "'] #wrap-faq"),
                    rankology_call_faq_accordion(number),
                    !1
                );
            }),
                $(".box-schema-item[data-key='" + number + "'] #wrap-faq").on("click", ".remove-faq", function () {
                    return (
                        $(this).fadeOut(300, function () {
                            return $(this).parent().parent().parent().parent().remove(), !1;
                        }),
                        !1
                    );
                });
        }
    }
    function bindAddPositiveNote(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] #wrap-positive-notes";
        if (0 !== $(selector).length) {
            var stop = !1;
            $(".box-schema-item[data-key='" + number + "'] #wrap-positive-notes .positive_notes h3").click(function (event) {
                stop && (event.stopImmediatePropagation(), event.preventDefault(), (stop = !1));
            }),
                $(".box-schema-item[data-key='" + number + "'] #add-positive-note").click(function (e) {
                    e.preventDefault();
                    const template = document.querySelector("#schema-template-positive-note");
                    if (0 === template.length) return;
                    const totalNotes = $("#wrap-positive-notes .positive_notes").length;
                    let str = $(template).clone().html();
                    return (str = str.replaceAll("[X]", "[" + totalNotes + "]")), $("#wrap-positive-notes").append(str), bindPositiveNotesAccordion(number), !1;
                }),
                $(".box-schema-item[data-key='" + number + "'] #wrap-positive-notes").on("click", ".remove-positive-note", function () {
                    return (
                        $(this).fadeOut(300, function () {
                            return $(this).closest(".positive_notes").remove(), !1;
                        }),
                        !1
                    );
                });
        }
    }
    function bindAddNegativeNote(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] #wrap-negative-notes";
        if (0 !== $(selector).length) {
            var stop = !1;
            $(".box-schema-item[data-key='" + number + "'] #wrap-negative-notes .negative_notes h3").click(function (event) {
                stop && (event.stopImmediatePropagation(), event.preventDefault(), (stop = !1));
            }),
                $(".box-schema-item[data-key='" + number + "'] #add-negative-note").click(function (e) {
                    e.preventDefault();
                    const template = document.querySelector("#schema-template-negative-note");
                    if (0 === template.length) return;
                    const totalNotes = $("#wrap-negative-notes .negative_notes").length;
                    let str = $(template).clone().html();
                    return (str = str.replaceAll("[X]", "[" + totalNotes + "]")), $("#wrap-negative-notes").append(str), bindNegativeNotesAccordion(number), !1;
                }),
                $(".box-schema-item[data-key='" + number + "'] #wrap-negative-notes").on("click", ".remove-negative-note", function () {
                    return (
                        $(this).fadeOut(300, function () {
                            return $(this).closest(".negative_notes").remove(), !1;
                        }),
                        !1
                    );
                });
        }
    }
    function rankology_call_how_to_accordion(number) {
        0 !== $(".box-schema-item[data-key='" + number + "'] #wrap-how-to .step").length &&
            $(".box-schema-item[data-key='" + number + "'] #wrap-how-to .step").accordion({ animate: !1, collapsible: !0, active: !1, heightStyle: "panel", header: "h3" });
    }
    function bindAddStep(number) {
        const selector = ".box-schema-item[data-key='" + number + "'] #wrap-how-to";
        if (0 !== $(selector).length) {
            var template = $(".box-schema-item[data-key='" + number + "'] #wrap-how-to .step:last").clone(),
                stop = !1;
            $(".box-schema-item[data-key='" + number + "'] #wrap-how-to .step h3").click(function (event) {
                stop && (event.stopImmediatePropagation(), event.preventDefault(), (stop = !1));
            });
            var sectionsCount = $("#wrap-how-to").attr("data-count");
            $(".box-schema-item[data-key='" + number + "'] #add-step").click(function (e) {
                e.preventDefault(), sectionsCount++;
                var section = template
                    .clone()
                    .find(":input")
                    .each(function () {
                        if (!$(this).parent().hasClass("js-media-upload-how-to-repeater")) {
                            var input_id = this.id,
                                input_name = this.name,
                                newId = this.id.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]");
                            $(this).attr("name", input_name.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                $(this)
                                    .prev()
                                    .attr("for", input_id.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                $(this)
                                    .prev()
                                    .attr("id", input_name.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]")),
                                (this.id = newId);
                        }
                    })
                    .end();
                section.appendTo(".box-schema-item[data-key='" + number + "'] #wrap-how-to");
                const baseIdValue = "rankology_fno_rich_snippets_data_" + number + "_" + sectionsCount;
                return (
                    section.find(".js-media-upload-how-to-repeater label").attr("for", baseIdValue + "_image_meta"),
                    section.find(".js-media-upload-how-to-repeater .rankology_media_upload").attr("id", baseIdValue + "_image"),
                    section.find(".js-media-upload-how-to-repeater .rankology_fno_rich_snippets_data_image_height").attr("id", baseIdValue + "_image_height"),
                    section.find(".js-media-upload-how-to-repeater .rankology_fno_rich_snippets_data_image_width").attr("id", baseIdValue + "_image_width"),
                    section.find(".js-media-upload-how-to-repeater .rankology_fno_rich_snippets_data_image_meta").attr("id", baseIdValue + "_image_meta"),
                    section
                        .find(".js-media-upload-how-to-repeater :input")
                        .each(function () {
                            var input_id = this.id,
                                input_name = this.name,
                                newId = this.id.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]");
                            $(this).attr("name", input_name.replace(/(\[rankology_fno_rich_snippets_how_to\])\[.*?\]/, "$1[" + sectionsCount + "]")), (this.id = newId);
                        })
                        .end(),
                    rankology_call_how_to_accordion(number),
                    bindOneUploadMedia(number, section.find(".js-media-upload-how-to-repeater .rankology_media_upload")),
                    !1
                );
            }),
                $(".box-schema-item[data-key='" + number + "'] #wrap-how-to").on("click", ".remove-step", function () {
                    return (
                        $(this).fadeOut(300, function () {
                            return $(this).parent().parent().parent().parent().remove(), !1;
                        }),
                        !1
                    );
                });
        }
    }
    $("#rankology-schemas-tabs").length && ($("#rankology-schemas-tabs .hidden").removeClass("hidden"), $("#rankology-schemas-tabs").tabs()),
        bindDatePicker(),
        $(".box-schema-item").each(function (key) {
            bindSnippetArticleCounter(key),
                bindSnippetCourseDescription(key),
                bindAddFaq(key),
                bindAddStep(key),
                bindPositiveNotesAccordion(key),
                bindAddPositiveNote(key),
                bindNegativeNotesAccordion(key),
                bindAddNegativeNote(key),
                rankology_call_faq_accordion(key),
                rankology_call_how_to_accordion(key);
        }),
        $(".wrap-rich-snippets-item").toggle(),
        $(".js-handle-snippet-type").toggleClass("closed"),
        $(document).on("click", ".js-handle-snippet-type", function (event) {
            event.preventDefault(), $(this).parent().parent().find(".wrap-rich-snippets-item").toggle(), $(this).toggleClass("closed");
        }),
        $(".js-expand-all").on("click", function (e) {
            e.preventDefault(), $(".wrap-rich-snippets-item").show(), $(".js-handle-snippet-type").addClass("closed");
        }),
        $(".js-close-all").on("click", function (e) {
            e.preventDefault(), $(".wrap-rich-snippets-item").hide(), $(".js-handle-snippet-type").removeClass("closed");
        }),
        $("#js-add-schema-manual").on("click", function (e) {
            e.preventDefault();
            const template = document.querySelector("#js-select-template-schema");
            if (0 === template.length) return;
            const key = makeid(10);
            let str = $(template).clone().html();
            (str = str
                .replace("[X]", key)
                .replace("rankology_fno_rich_snippets_data[X]", "rankology_fno_rich_snippets_data[" + key + "]")
                .replace("[X]", key)),
                $("#js-box-list-schemas").prepend(str);
        }),
        $(document).on("click", ".js-delete-schema-manual", function (e) {
            e.preventDefault();
            const dataKey = $(this).data("key");
            if (($(".box-schema-item[data-key='" + dataKey + "']").remove(), 0 === $(".box-schema-item").length)) {
                const template = document.querySelector("#schema-template-empty");
                if (0 === template.length) return;
                const number = $(".box-schema-item").length;
                let str = $(template).clone().html();
                (str = str
                    .replace("[X]", number)
                    .replace("rankology_fno_rich_snippets_data[X]", "rankology_fno_rich_snippets_data[" + number + "]")
                    .replace("[X]", number)),
                    $("#js-box-list-schemas").prepend(str);
            }
        }),
        $(document).on("change", ".js-select_rankology_fno_rich_snippets_type", function (e) {
            e.preventDefault();
            const _self = $(this),
                value = $(this).val(),
                template = document.querySelector("#schema-template-" + value);
            if (0 === template.length) return;
            const getContainerItem = function () {
                return _self.parent().parent().parent();
            };
            getContainerItem().find(".wrap-rich-snippets-item:eq(0)").hide(), getContainerItem().find(".wrap-rich-snippets-item:eq(1)").remove();
            let value_select_classes = value,
                snippet_selected = value;
            switch (value_select_classes) {
                case "localbusiness":
                    (value_select_classes = "local-business"), (snippet_selected = "local-business");
                    break;
                case "articles":
                    value_select_classes = "article";
                    break;
                case "courses":
                    value_select_classes = "course";
                    break;
                case "recipes":
                    value_select_classes = "recipe";
                    break;
                case "videos":
                    value_select_classes = "video";
                    break;
                case "events":
                    value_select_classes = "event";
                    break;
                case "products":
                    value_select_classes = "product";
                    break;
                case "softwareapp":
                    (value_select_classes = "software"), (snippet_selected = "software-app");
                    break;
                case "services":
                    value_select_classes = "service";
                    break;
                case "event":
                    (value_select_classes = "events"), (snippet_selected = "events");
            }
            let number = null;
            const alreadyExistItem = getContainerItem()
                .find(".wrap-rich-snippets-item:eq(0)")
                .hasClass("wrap-rich-snippets-" + snippet_selected);
            if (alreadyExistItem) getContainerItem().find(".wrap-rich-snippets-item:eq(0)").show();
            else {
                const find = "rankology_fno_rich_snippets_data[X]";
                let str = $(template).clone().html();
                (number = getContainerItem().data("key")), (str = str.split(find).join("rankology_fno_rich_snippets_data[" + number + "]")), getContainerItem().append(str);
            }
            if (null !== number) {
                switch (value_select_classes) {
                    case "article":
                        bindSnippetArticleCounter(number);
                        break;
                    case "course":
                        bindSnippetCourseDescription(number);
                        break;
                    case "faq":
                        bindAddFaq(number), rankology_call_faq_accordion(number);
                        break;
                    case "howto":
                        bindAddStep(number), rankology_call_how_to_accordion(number);
                        break;
                    case "product":
                        bindAddPositiveNote(number), bindPositiveNotesAccordion(number), bindAddNegativeNote(number), bindNegativeNotesAccordion(number);
                }
                bindDatePicker(), bindUploadMedia(number);
            }
        }),
        $(document).on(
            "click",
            "#rankology-tag-employment-1, #rankology-tag-employment-2, #rankology-tag-employment-3, #rankology-tag-employment-4, #rankology-tag-employment-5, #rankology-tag-employment-6, #rankology-tag-employment-7, #rankology-tag-employment-8",
            function () {
                var e = $(this).closest(".rankology_fno_rich_snippets_jobs_employment_type_p").find(".rankology_fno_rich_snippets_jobs_employment_type");
                0 == e.val().length ? e.val($(this).attr("data-tag")) : ((str = e.val()), (str = str.replace(/,\s*$/, "")), e.val(str + "," + $(this).attr("data-tag")));
            }
        );
    var the_index = $("p[data-group]").length,
        the_group = $("div[data-group]").length;
    function select_and_change() {
        $('select[id$="[filter]"]').on("change", function (opt) {
            const val = $(this).val();
            "taxonomy" === val
                ? ($(this).parent().find('select[id$="[taxo]"]').show(), $(this).parent().find('input[id$="[postId]"]').hide(), $(this).parent().find('select[id$="[cpt]"]').hide())
                : "post_type" === val
                ? ($(this).parent().find('select[id$="[taxo]"]').hide(), $(this).parent().find('input[id$="[postId]"]').hide(), $(this).parent().find('select[id$="[cpt]"]').show())
                : "postId" === val && ($(this).parent().find('select[id$="[taxo]"]').hide(), $(this).parent().find('input[id$="[postId]"]').show(), $(this).parent().find('select[id$="[cpt]"]').hide());
        });
    }
    function check_and_del_buttons() {
        var $gl = $("p[data-group]").length;
        $(".rankology_fno_rich_snippets_rules_del").show(), 1 == $gl && $(".rankology_fno_rich_snippets_rules_del:first").hide();
    }
    select_and_change(),
        $("p[data-group]").each(function (a, b) {
            var $g = $(b).data("group");
            check_and_del_buttons(b);
        }),
        $(".rankology_fno_rich_snippets_rules_del").css("cursor", "pointer"),
        $(".wrap-rich-snippets-rules").on("click", ".rankology_fno_rich_snippets_rules_and", function (e) {
            var $html = $(this).parent().clone().prop("outerHTML");
            ($html = $html.replace(/\[\i[0-9]\]/g, "[i" + the_index + "]")), the_index++, $(this).parent().after($html), select_and_change(), check_and_del_buttons();
        }),
        $(".wrap-rich-snippets-rules").on("click", ".rankology_fno_rich_snippets_rules_del", function (e) {
            var $g = $(this).data("group");
            1 == $('p[data-group="' + $g + '"]').length && ($(this).parent().parent().prev(".separat_or").length ? $(this).parent().parent().prev(".separat_or").remove() : $(this).parent().parent().next(".separat_or").remove()),
                $(this).parent().remove(),
                "" == $('div[data-group="' + $g + '"]').html() && $('div[data-group="' + $g + '"]').remove(),
                check_and_del_buttons();
        }),
        $(document).on("click", ".wrap-rich-snippets-rules #rankology_fno_rich_snippets_rules_add", function (e) {
            var $html = $(".wrap-rich-snippets-rules div[data-group]:first"),
                $sep;
            ($html = $html.clone()),
                $($html).find("p[data-group]:not(:first)").remove(),
                $($html).find(".rankology_fno_rich_snippets_rules_del").show(),
                ($html = ($html = ($html = $html.prop("outerHTML")).replace(/\[\g[0-9]\]/g, "[g" + the_group + "]")).replace(/data-group="[0-9]"/g, 'data-group="' + the_group + '"')),
                ($html += $(".separat_or:first").clone().prop("outerHTML")),
                the_group++,
                $(this).parent().prev().after($html),
                select_and_change(),
                check_and_del_buttons();
        }),
        $(':checkbox[name$="[closed]"]').on("click", function (e) {
            $(this).parent().parent().find("li:not(:first)").toggle();
        }),
        $(':checked[name$="[closed]"]').each(function (e) {
            $(this).parent().parent().find("li:not(:first)").toggle();
        });
    var count = $("#rankology-schemas-tabs .rkseo-schema-count").attr("data-count");
    $("#rkseo-automatic-tab span").html(count),
        $("#rankology-your-schema select.dyn")
            .change(function (e) {
                e.preventDefault();
                var select = $(this).val();
                "manual_global" == select
                    ? ($(this).next("input.manual_global").show(),
                      $(this).closest("p").find("input.manual_global").show(),
                      $(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").hide())
                    : "manual_img_global" == select
                    ? ($(this).next("input.manual_img_global").show(),
                      $(this).closest("p").find("input.manual_img_library_global").hide(),
                      $(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").hide())
                    : "manual_img_library_global" == select
                    ? ($(this).next("input.manual_img_global").hide(),
                      $(this).closest("p").find("input.manual_img_library_global").show(),
                      $(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").hide())
                    : "manual_date_global" == select
                    ? ($(this).next("input.manual_date_global").show(), $(this).closest("p").find("select.lb").hide(), $(this).closest("p").find("select.cf").hide(), $(this).closest("p").find("select.tax").hide())
                    : "manual_time_global" == select
                    ? ($(this).next("input.manual_time_global").show(), $(this).closest("p").find("select.lb").hide(), $(this).closest("p").find("select.cf").hide(), $(this).closest("p").find("select.tax").hide())
                    : "manual_rating_global" == select
                    ? ($(this).next("input.manual_rating_global").show(), $(this).closest("p").find("select.lb").hide(), $(this).closest("p").find("select.cf").hide(), $(this).closest("p").find("select.tax").hide())
                    : "custom_fields" == select
                    ? ($(this).closest("p").find("input").hide(),
                      $(this).closest("p").find("input.manual_img_global").hide(),
                      $(this).closest("p").find("input.manual_img_library_global").hide(),
                      $(this).closest("p").find("input.manual_date_global").hide(),
                      $(this).closest("p").find("input.manual_time_global").hide(),
                      $(this).closest("p").find("input.manual_rating_global").hide(),
                      $(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.tax").hide(),
                      $(this).closest("p").find("select.cf").show())
                    : "custom_taxonomy" == select
                    ? ($(this).closest("p").find("input").hide(),
                      $(this).closest("p").find("input.manual_img_global").hide(),
                      $(this).closest("p").find("input.manual_img_library_global").hide(),
                      $(this).closest("p").find("input.manual_date_global").hide(),
                      $(this).closest("p").find("input.manual_time_global").hide(),
                      $(this).closest("p").find("input.manual_rating_global").hide(),
                      $(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").show())
                    : "manual_custom_global" == select
                    ? ($(this).closest("p").find("textarea.manual_custom_global").show(), $(this).closest("p").find("select.lb").hide(), $(this).closest("p").find("select.cf").hide())
                    : "manual_lb_global" == select
                    ? ($(this).closest("p").find("select.lb").show(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").hide(),
                      $(this).closest("p").find("input").hide(),
                      $(this).closest("p").find("textarea").hide())
                    : ($(this).closest("p").find("select.lb").hide(),
                      $(this).closest("p").find("select.cf").hide(),
                      $(this).closest("p").find("select.tax").hide(),
                      $(this).closest("p").find("input").hide(),
                      $(this).closest("p").find("textarea").hide());
            })
            .trigger("change");
    var sc_a = ".wrap-rich-snippets-articles",
        sc_b = ".wrap-rich-snippets-local-business",
        sc_f = ".wrap-rich-snippets-faq",
        sc_c = ".wrap-rich-snippets-courses",
        sc_r = ".wrap-rich-snippets-recipes",
        sc_j = ".wrap-rich-snippets-jobs",
        sc_v = ".wrap-rich-snippets-videos",
        sc_e = ".wrap-rich-snippets-events",
        sc_p = ".wrap-rich-snippets-products",
        sc_s = ".wrap-rich-snippets-services",
        sc_app = ".wrap-rich-snippets-software-app",
        sc_re = ".wrap-rich-snippets-review",
        sc_cu = ".wrap-rich-snippets-custom",
        sc_ad = ".wrap-rich-snippets-type .advice";
    $("#rankology-your-schema .box-left > p ~ div").hide(),
        "none" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? $(sc_ad).show()
            : "articles" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_a).show())
            : "localbusiness" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_b).show())
            : "faq" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_f).show())
            : "courses" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_c).show())
            : "recipes" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_r).show())
            : "jobs" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_j).show())
            : "videos" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_v).show())
            : "events" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_e).show())
            : "products" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_p).show())
            : "services" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_s).show())
            : "softwareapp" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_app).show())
            : "review" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val()
            ? ($(sc_ad).hide(), $(sc_re).show())
            : "custom" == $("#rankology-your-schema #rankology_fno_rich_snippets_type option:selected").val() && ($(sc_ad).hide(), $(sc_cu).show()),
        $("#rankology-your-schema #rankology_fno_rich_snippets_type").change(function () {
            var rankology_rs_type = $("#rankology-your-schema #rankology_fno_rich_snippets_type").val();
            "none" == rankology_rs_type && ($(sc_ad).show(), $(sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "articles" == rankology_rs_type &&
                    ($(sc_a).show(), $(sc_ad + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "localbusiness" == rankology_rs_type &&
                    ($(sc_b).show(), $(sc_ad + "," + sc_a + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "faq" == rankology_rs_type && ($(sc_f).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "courses" == rankology_rs_type &&
                    ($(sc_c).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "recipes" == rankology_rs_type &&
                    ($(sc_r).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "jobs" == rankology_rs_type &&
                    ($(sc_j).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "videos" == rankology_rs_type &&
                    ($(sc_v).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_e + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "events" == rankology_rs_type &&
                    ($(sc_e).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_p + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "products" == rankology_rs_type &&
                    ($(sc_p).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_s + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "services" == rankology_rs_type &&
                    ($(sc_s).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_app + "," + sc_re + "," + sc_cu).hide()),
                "softwareapp" == rankology_rs_type &&
                    ($(sc_app).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + ", " + sc_s + ", " + sc_re + "," + sc_cu).hide()),
                "review" == rankology_rs_type &&
                    ($(sc_re).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_app + "," + sc_s + "," + sc_cu).hide()),
                "custom" == rankology_rs_type &&
                    ($(sc_cu).show(), $(sc_ad + "," + sc_a + "," + sc_b + "," + sc_f + "," + sc_c + "," + sc_r + "," + sc_j + "," + sc_v + "," + sc_e + "," + sc_p + "," + sc_app + "," + sc_s + "," + sc_re).hide());
        });
});

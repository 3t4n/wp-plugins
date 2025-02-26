jQuery(document).ready(function ($) {
    const features = [
        ["rankology_titles", "rankology_titles_home"],
        ["rankology_xml_sitemap_tab", "rankology_xml_sitemap_general"],
        ["rankology_social_tab", "rankology_social_knowledge"],
        ["rankology_advanced_tab", "rankology_advanced_image"],
        ["rankology_google_analytics_enable", "rankology_google_analytics_enable"],
        ["rankology_tool_settings", "rankology_tool_settings"],
        ["rankology_instant_indexing_general", "rankology_instant_indexing_general"],
        ["rankology_insights_general", "rankology_insights_general"]
    ];

    features.forEach(function (item) {
        var hash = $(location).attr("hash").split("#tab=")[1];

        if (typeof hash != "undefined") {
            $("#" + hash + "-tab").addClass("nav-tab-active");
            $("#" + hash).addClass("active");
        } else {
            if (
                typeof sessionStorage != "undefined" &&
                typeof sessionStorage != "null"
            ) {
                var rankology_tab_session_storage =
                    sessionStorage.getItem("rankology_save_tab");

                if (
                    rankology_tab_session_storage &&
                    $("#" + rankology_tab_session_storage + "-tab").length
                ) {
                    $("#rankology-tabs")
                        .find(".nav-tab.nav-tab-active")
                        .removeClass("nav-tab-active");
                    $("#rankology-tabs")
                        .find(".rankology-tab.active")
                        .removeClass("active");

                    $("#" + rankology_tab_session_storage + "-tab").addClass(
                        "nav-tab-active"
                    );
                    $("#" + rankology_tab_session_storage).addClass("active");
                } else {
                    //Default TAB
                    $("#tab_" + item[1] + "-tab").addClass("nav-tab-active");
                    $("#tab_" + item[1]).addClass("active");
                }
            }

            $("#rankology-tabs")
                .find("a.nav-tab")
                .click(function (e) {
                    e.preventDefault();
                    var hash = $(this).attr("href").split("#tab=")[1];

                    $("#rankology-tabs")
                        .find(".nav-tab.nav-tab-active")
                        .removeClass("nav-tab-active");
                    $("#" + hash + "-tab").addClass("nav-tab-active");

                    sessionStorage.setItem("rankology_save_tab", hash);

                    $("#rankology-tabs")
                        .find(".rankology-tab.active")
                        .removeClass("active");
                    $("#" + hash).addClass("active");
                });
        }
    });

    function rkseo_get_field_length(e) {
        if (e.val().length > 0) {
            meta = e.val() + " ";
        } else {
            meta = e.val();
        }
        return meta;
    }

    let alreadyBind = false;

    // Home Binding
    $("#rankology-tag-site-title").click(function () {
        $("#rankology_titles_home_site_title").val(
            rkseo_get_field_length($("#rankology_titles_home_site_title")) +
            $("#rankology-tag-site-title").attr("data-tag")
        );
    });

    $("#rankology-tag-site-desc").click(function () {
        $("#rankology_titles_home_site_title").val(
            rkseo_get_field_length($("#rankology_titles_home_site_title")) +
            $("#rankology-tag-site-desc").attr("data-tag")
        );
    });
    $("#rankology-tag-site-sep").click(function () {
        $("#rankology_titles_home_site_title").val(
            rkseo_get_field_length($("#rankology_titles_home_site_title")) +
            $("#rankology-tag-site-sep").attr("data-tag")
        );
    });

    $("#rankology-tag-meta-desc").click(function () {
        $("#rankology_titles_home_site_desc").val(
            rkseo_get_field_length($("#rankology_titles_home_site_desc")) +
            $("#rankology-tag-meta-desc").attr("data-tag")
        );
    });

    //Author
    $("#rankology-tag-post-author").click(function () {
        $("#rankology_titles_archive_post_author").val(
            rkseo_get_field_length($("#rankology_titles_archive_post_author")) +
            $("#rankology-tag-post-author").attr("data-tag")
        );
    });
    $("#rankology-tag-sep-author").click(function () {
        $("#rankology_titles_archive_post_author").val(
            rkseo_get_field_length($("#rankology_titles_archive_post_author")) +
            $("#rankology-tag-sep-author").attr("data-tag")
        );
    });
    $("#rankology-tag-site-title-author").click(function () {
        $("#rankology_titles_archive_post_author").val(
            rkseo_get_field_length($("#rankology_titles_archive_post_author")) +
            $("#rankology-tag-site-title-author").attr("data-tag")
        );
    });

    //Date
    $("#rankology-tag-archive-date").click(function () {
        $("#rankology_titles_archives_date_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_date_title")) +
            $("#rankology-tag-archive-date").attr("data-tag")
        );
    });
    $("#rankology-tag-sep-date").click(function () {
        $("#rankology_titles_archives_date_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_date_title")) +
            $("#rankology-tag-sep-date").attr("data-tag")
        );
    });
    $("#rankology-tag-site-title-date").click(function () {
        $("#rankology_titles_archives_date_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_date_title")) +
            $("#rankology-tag-site-title-date").attr("data-tag")
        );
    });

    //Search
    $("#rankology-tag-search-keywords").click(function () {
        $("#rankology_titles_archives_search_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_search_title")) +
            $("#rankology-tag-search-keywords").attr("data-tag")
        );
    });
    $("#rankology-tag-sep-search").click(function () {
        $("#rankology_titles_archives_search_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_search_title")) +
            $("#rankology-tag-sep-search").attr("data-tag")
        );
    });
    $("#rankology-tag-site-title-search").click(function () {
        $("#rankology_titles_archives_search_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_search_title")) +
            $("#rankology-tag-site-title-search").attr("data-tag")
        );
    });

    //404
    $("#rankology-tag-site-title-404").click(function () {
        $("#rankology_titles_archives_404_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_404_title")) +
            $("#rankology-tag-site-title-404").attr("data-tag")
        );
    });
    $("#rankology-tag-sep-404").click(function () {
        $("#rankology_titles_archives_404_title").val(
            rkseo_get_field_length($("#rankology_titles_archives_404_title")) +
            $("#rankology-tag-sep-404").attr("data-tag")
        );
    });

    //BuddyPress
    $("#rankology-tag-post-title-bd-groups").click(function () {
        $("#rankology_titles_bp_groups_title").val(
            rkseo_get_field_length($("#rankology_titles_bp_groups_title")) +
            $("#rankology-tag-post-title-bd-groups").attr("data-tag")
        );
    });
    $("#rankology-tag-sep-bd-groups").click(function () {
        $("#rankology_titles_bp_groups_title").val(
            rkseo_get_field_length($("#rankology_titles_bp_groups_title")) +
            $("#rankology-tag-sep-bd-groups").attr("data-tag")
        );
    });
    $("#rankology-tag-site-title-bd-groups").click(function () {
        $("#rankology_titles_bp_groups_title").val(
            rkseo_get_field_length($("#rankology_titles_bp_groups_title")) +
            $("#rankology-tag-site-title-bd-groups").attr("data-tag")
        );
    });

    //All variables
    $(".rankology-tag-dropdown").each(function (item) {
        const input_title = $(this).parent(".wrap-tags").prev("input");
        const input_desc = $(this).parent(".wrap-tags").prev("textarea");

        const _self = $(this);

        function handleClickLi(current) {
            if (_self.hasClass("tag-title")) {
                input_title.val(
                    rkseo_get_field_length(input_title) +
                    $(current).attr("data-value")
                );
                input_title.trigger("paste");
            }
            if (_self.hasClass("tag-description")) {
                input_desc.val(
                    rkseo_get_field_length(input_desc) +
                    $(current).attr("data-value")
                );
                input_desc.trigger("paste");
            }
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

    //Instant Indexing: Display keywords counter
    if ($("#rankology_instant_indexing_manual_batch").length) {
        newLines = $('#rankology_instant_indexing_manual_batch').val().split("\n").length;
        $('#rankology_instant_indexing_url_count').text(newLines);
        var lines = 100;
        var linesUsed = $('#rankology_instant_indexing_url_count');

        if (newLines) {
            var progress = newLines;

            if (progress >= 100) {
                progress = 100;
            }

            $('#rankology_instant_indexing_url_progress').attr('aria-valuenow', progress),
                $('#rankology_instant_indexing_url_progress').text(progress + '%'),
                $('#rankology_instant_indexing_url_progress').css('width', progress + '%')
        }

        $("#rankology_instant_indexing_manual_batch").on('keyup paste change click focus mouseout', function (e) {


            newLines = $(this).val().split("\n").length;
            linesUsed.text(newLines);

            if (newLines > lines) {
                linesUsed.css('color', 'red');
            } else {
                linesUsed.css('color', '');
            }

            if (newLines) {
                var progress = newLines;
            }

            if (progress >= 100) {
                progress = 100;
            }
            $('#rankology_instant_indexing_url_progress').attr('aria-valuenow', progress),
                $('#rankology_instant_indexing_url_progress').text(progress + '%'),
                $('#rankology_instant_indexing_url_progress').css('width', progress + '%')
        });
    }


    $('#rankology_instant_indexing_google_action_include[URL_UPDATED]').is(':checked') ? true : false,
        //Instant Indexing: Batch URLs
        $('.rankology-instant-indexing-batch').on('click', function () {
            $('#rankology-tabs .spinner').css(
                "visibility",
                "visible"
            );
            $('#rankology-tabs .spinner').css(
                "float",
                "none"
            );

            $.ajax({
                method: 'POST',
                url: rankologyAjaxInstantIndexingPost.rankology_instant_indexing_post,
                data: {
                    action: 'rankology_instant_indexing_post',
                    urls_to_submit: $('#rankology_instant_indexing_manual_batch').val(),
                    indexnow_api: $('#rankology_instant_indexing_bing_api_key').val(),
                    google_api: $('#rankology_instant_indexing_google_api_key').val(),
                    update_action: $('#rankology_instant_indexing_google_action_include_URL_UPDATED').is(':checked') ? 'URL_UPDATED' : false,
                    delete_action: $('#rankology_instant_indexing_google_action_include_URL_DELETED').is(':checked') ? 'URL_DELETED' : false,
                    google: $('#rankology_instant_indexing_engines_google').is(':checked') ? true : false,
                    bing: $('#rankology_instant_indexing_engines_bing').is(':checked') ? true : false,
                    automatic_submission: $('#rankology_instant_indexing_automate_submission').is(':checked') ? true : false,
                    _ajax_nonce: rankologyAjaxInstantIndexingPost.rankology_nonce,
                },
                success: function (data) {
                    window.location.reload(true);
                },
            });
        });

    //Instant Indexing: refresh API Key
    $('.rankology-instant-indexing-refresh-api-key').on('click', function () {
        $.ajax({
            method: 'POST',
            url: rankologyAjaxInstantIndexingApiKey.rankology_instant_indexing_generate_api_key,
            data: {
                action: 'rankology_instant_indexing_generate_api_key',
                _ajax_nonce: rankologyAjaxInstantIndexingApiKey.rankology_nonce,
            },
            success: function (success) {
                if (success.success === true) {
                    window.location.reload(true);
                }
            },
        });
    });
});


// document.addEventListener('DOMContentLoaded', function () {
//     const tabs = document.querySelectorAll('.rankology-tab');
//     const contents = document.querySelectorAll('.rankology-contents');
//     const subTabs = document.querySelectorAll('.rankology-sub-tab');
//     const subContents = document.querySelectorAll('.rankology-sub-content');
//
//     // Main Tabs
//     tabs.forEach(tab => {
//         tab.addEventListener('click', () => {
//             tabs.forEach(t => t.classList.remove('active'));
//             contents.forEach(c => c.classList.remove('active'));
//
//             tab.classList.add('active');
//             const activeContent = document.getElementById(tab.dataset.tab);
//             activeContent.classList.add('active');
//
//             // Automatically activate the FIRST sub-tab in the parent tab's content
//             const firstSubTab = activeContent.querySelector('.rankology-sub-tab');
//             if (firstSubTab) {
//                 // Use existing sub-tab logic to activate it
//                 firstSubTab.click();
//             }
//         });
//     });
//
//     // Sub-Tabs
//     subTabs.forEach(subTab => {
//         subTab.addEventListener('click', () => {
//             subTabs.forEach(st => st.classList.remove('active'));
//             subContents.forEach(sc => sc.classList.remove('active'));
//
//             subTab.classList.add('active');
//             const activeSubContent = document.getElementById(subTab.dataset.subTab);
//             activeSubContent.classList.add('active');
//         });
//     });
// });


// jQuery(document).ready(function ($) {
//     const $tabs = $('.rankology-parent-tabs');
//     const $contents = $('.rankology-contents');
//     const $subTabs = $('.rankology-sub-tab');
//     const $subContents = $('.rankology-sub-content');
//
//     // Main Tabs
//     $tabs.on('click', function () {
//         $tabs.removeClass('active');
//         $contents.removeClass('active');
//
//         $(this).addClass('active');
//         const activeContent = $('#' + $(this).data('tab'));
//         activeContent.addClass('active');
//
//         // Automatically activate the FIRST sub-tab in the parent tab's content
//         const firstSubTab = activeContent.find('.rankology-sub-tab').first();
//         if (firstSubTab.length) {
//             firstSubTab.trigger('click');
//         }
//     });
//
//     // Sub-Tabs
//     $subTabs.on('click', function () {
//         $subTabs.removeClass('active');
//         $subContents.removeClass('active');
//
//         $(this).addClass('active');
//         const activeSubContent = $('#' + $(this).data('sub-tab'));
//         activeSubContent.addClass('active');
//     });
// });



jQuery(document).ready(function ($) {
    const $tabs = $('.rankology-parent-tabs');
    const $contents = $('.rankology-contents');
    const $subTabs = $('.rankology-sub-tab');
    const $subContents = $('.rankology-sub-content');
    const $saveButton = $('#save-button'); // Save button selector

    // Main Tabs
    $tabs.on('click', function () {
        $tabs.removeClass('active');
        $contents.removeClass('active');

        $(this).addClass('active');
        const activeContent = $('#' + $(this).data('tab'));
        activeContent.addClass('active');

        // Automatically activate the FIRST sub-tab in the parent tab's content
        const firstSubTab = activeContent.find('.rankology-sub-tab').first();
        if (firstSubTab.length) {
            firstSubTab.trigger('click');
        }
    });

    // Sub-Tabs
    $subTabs.on('click', function () {
        $subTabs.removeClass('active');
        $subContents.removeClass('active');

        $(this).addClass('active');
        const activeSubContent = $('#' + $(this).data('sub-tab'));
        activeSubContent.addClass('active');
    });

    // Save Data Without Reloading

});


jQuery(document).ready(function ($) {
    $(document).on('click', '.nav-tab-wrapper #submit', function (e) {
        e.preventDefault(); // Prevent page reload

        let $saveButton = $(this); // Reference to the clicked button
        let formData = $('.rankology-form-heading').serializeArray(); // Get form data

        $.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'save_rankology_settings', // WordPress AJAX action
                form_data: formData
            },
            beforeSend: function () {
                $saveButton.text('Saving...').prop('disabled', true);
                $('.save-message').remove(); // Remove old messages
            },
            success: function (response) {
                let message = response.success
                    ? '<div class="save-message success"> Settings saved successfully!</div>'
                    : '<div class="save-message error"> Error: ' + response.data + '</div>';

                $('.rankology-form-heading').after(message); // Append message below the form
                $saveButton.text('Save').prop('disabled', false);

                // Hide the message after 3 seconds
                setTimeout(function () {
                    $('.save-message').fadeOut(500, function () {
                        $(this).remove();
                    });
                }, 3000);
            },
            error: function () {
                $('.rankology-form-heading').after('<div class="save-message error"> Error saving settings. Please try again.</div>');
                $saveButton.text('Save').prop('disabled', false);

                setTimeout(function () {
                    $('.save-message').fadeOut(500, function () {
                        $(this).remove();
                    });
                }, 3000);
            }
        });
    });
});





// jQuery(document).ready(function ($) {
//     // Function to show message below the form
//     function showFormMessage(message, type) {
//         let formMessage = $('<div class="form-message ' + type + '">' + message + '</div>');
//
//         $('.form-message').remove(); // Remove existing message
//         $('.rankology-form-heading').after(formMessage); // Insert message below the form
//
//         // Ensure message fades out properly
//         setTimeout(function () {
//             formMessage.fadeOut(500, function () {
//                 $(this).remove(); // Fully remove the element after fading out
//             });
//         }, 3000);
//     }
//
//     $(document).on('click', '#submit', function (e) {
//         e.preventDefault(); // Prevent page reload
//
//         let $saveButton = $(this); // Reference to the clicked button
//         let formData = $('.rankology-form-heading').serializeArray(); // Get form data
//
//         $.ajax({
//             url: ajaxurl, // WordPress AJAX URL
//             type: 'POST',
//             data: {
//                 action: 'save_rankology_settings', // WordPress AJAX action
//                 form_data: formData
//             },
//             beforeSend: function () {
//                 $saveButton.text('Saving...').prop('disabled', true);
//             },
//             success: function (response) {
//                 if (response.success) {
//                     showFormMessage('✅ Settings saved successfully!', 'success');
//                 } else {
//                     showFormMessage('❌ Error: ' + response.data, 'error');
//                 }
//                 $saveButton.text('Save').prop('disabled', false);
//             },
//             error: function () {
//                 showFormMessage('❌ Error saving settings. Please try again.', 'error');
//                 $saveButton.text('Save').prop('disabled', false);
//             }
//         });
//     });
// });

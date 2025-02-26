jQuery(document).ready(function ($) {

    var get_hash = window.location.hash;
    var clean_hash = get_hash.split('$');

    var hash = $(location).attr('hash').split('#tab=')[1];

    if (typeof hash != 'undefined') {
        $('#' + hash + '-tab').addClass("nav-tab-active");
        $('#' + hash).addClass("active");
    } else {
        if (typeof sessionStorage != 'undefined') {
            var rankology_tab_session_storage = sessionStorage.getItem("rankology_woocommerce_tab");

            if (clean_hash[1] == '1') { //WooCommerce Tab
                $('#tab_rankology_woocommerce-tab').addClass("nav-tab-active");
                $('#tab_rankology_woocommerce').addClass("active");
            } else if (clean_hash[1] == '2') { //Breadcrumbs Tab
                $('#tab_rankology_breadcrumbs-tab').addClass("nav-tab-active");
                $('#tab_rankology_breadcrumbs').addClass("active");
            } else if (clean_hash[1] == '3') { //Page Speed Tab
                $('#tab_rankology_page_speed-tab').addClass("nav-tab-active");
                $('#tab_rankology_page_speed').addClass("active");
            } else if (clean_hash[1] == '4') { //Robots Tab
                $('#tab_rankology_robots-tab').addClass("nav-tab-active");
                $('#tab_rankology_robots').addClass("active");
            } else if (clean_hash[1] == '5') { //Google News Tab
                $('#tab_rankology_news-tab').addClass("nav-tab-active");
                $('#tab_rankology_news').addClass("active");
            } else if (clean_hash[1] == '6') { //404 Tab
                $('#tab_rankology_404-tab').addClass("nav-tab-active");
                $('#tab_rankology_404').addClass("active");
            } else if (clean_hash[1] == '7') { //htaccess Tab
                $('#tab_rankology_htaccess-tab').addClass("nav-tab-active");
                $('#tab_rankology_htaccess').addClass("active");
            } else if (clean_hash[1] == '8') { //Dublin Core Tab
                $('#tab_rankology_dublin_core-tab').addClass("nav-tab-active");
                $('#tab_rankology_dublin_core').addClass("active");
            } else if (clean_hash[1] == '9') { //Rich Snippets Tab
                $('#tab_rankology_rich_snippets-tab').addClass("nav-tab-active");
                $('#tab_rankology_rich_snippets').addClass("active");
            } else if (clean_hash[1] == '10') { //Local Business Tab
                $('#tab_rankology_local_business-tab').addClass("nav-tab-active");
                $('#tab_rankology_local_business').addClass("active");
            } else if (clean_hash[1] == '11') { //RSS Tab
                $('#tab_rankology_rss-tab').addClass("nav-tab-active");
                $('#tab_rankology_rss').addClass("active");
            } else if (clean_hash[1] == '13') { //Easy Digital Downloads Tab
                $('#tab_rankology_edd-tab').addClass("nav-tab-active");
                $('#tab_rankology_edd').addClass("active");
            } else if (clean_hash[1] == '14') { //Rewrite Tab
                $('#tab_rankology_rewrite-tab').addClass("nav-tab-active");
                $('#tab_rankology_rewrite').addClass("active");
            } else if (clean_hash[1] == '15') { //White Label Tab
                $('#tab_rankology_white_label-tab').addClass("nav-tab-active");
                $('#tab_rankology_white_label').addClass("active");
            } else if (clean_hash[1] == '16') { //Inspect URL Tab
                $('#tab_rankology_inspect_url-tab').addClass("nav-tab-active");
                $('#tab_rankology_inspect_url').addClass("active");
            } else if (clean_hash[1] == '17') { //AI Tab
                $('#tab_rankology_ai-tab').addClass("nav-tab-active");
                $('#tab_rankology_ai').addClass("active");
            } else if (rankology_tab_session_storage) {
                $('#rankology-tabs').find('.nav-tab.nav-tab-active').removeClass("nav-tab-active");
                $('#rankology-tabs').find('.rankology-tab.active').removeClass("active");

                $('#' + rankology_tab_session_storage.split('#tab=') + '-tab').addClass("nav-tab-active");
                $('#' + rankology_tab_session_storage.split('#tab=')).addClass("active");
            } else {
                //Default TAB
                $('#tab_rankology_local_business-tab').addClass("nav-tab-active");
                $('#tab_rankology_local_business').addClass("active");
            }
        }
    };
    $("#rankology-tabs").find("a.nav-tab").click(function (e) {
        e.preventDefault();
        var hash = $(this).attr('href').split('#tab=')[1];

        $('#rankology-tabs').find('.nav-tab.nav-tab-active').removeClass("nav-tab-active");
        $('#' + hash + '-tab').addClass("nav-tab-active");

        if (clean_hash[1] == 1) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_woocommerce');
        } else if (clean_hash[1] == 2) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_breadcrumbs');
        } else if (clean_hash[1] == 3) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_page_speed');
        } else if (clean_hash[1] == 4) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_robots');
        } else if (clean_hash[1] == 5) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_news');
        } else if (clean_hash[1] == 6) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_404');
        } else if (clean_hash[1] == 7) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_htaccess');
        } else if (clean_hash[1] == 8) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_dublin_core');
        } else if (clean_hash[1] == 9) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_rich_snippets');
        } else if (clean_hash[1] == 10) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_local_business');
        } else if (clean_hash[1] == 11) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_rss');
        } else if (clean_hash[1] == 13) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_edd');
        } else if (clean_hash[1] == 14) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_rewrite');
        } else if (clean_hash[1] == 15) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_white_label');
        } else if (clean_hash[1] == 16) {
            sessionStorage.setItem("rankology_woocommerce_tab", 'tab_rankology_inspect_url');
        } else {
            sessionStorage.setItem("rankology_woocommerce_tab", hash);
        }

        $('#rankology-tabs').find('.rankology-tab.active').removeClass("active");
        $('#' + hash).addClass("active");
    });
    //Robots
    $('#rankology-tag-robots-1, #rankology-tag-robots-2, #rankology-tag-robots-3, #rankology-tag-robots-4, #rankology-tag-robots-5, #rankology-tag-robots-6, #rankology-tag-robots-7, #rankology-tag-robots-8, #rankology-tag-robots-9, #rankology-tag-robots-10, #rankology-tag-robots-11').click(function () {
        $(".rankology_robots_file").val($(".rankology_robots_file").val() + '\n' + $(this).attr('data-tag'));
    });
    //Breadcrumbs
    $('#rankology-tag-breadcrumbs-1, #rankology-tag-breadcrumbs-2, #rankology-tag-breadcrumbs-3, #rankology-tag-breadcrumbs-4, #rankology-tag-breadcrumbs-5').click(function () {
        $(".rankology_breadcrumbs_sep").val($(".rankology_breadcrumbs_sep").val() + '\n' + $(this).attr('data-tag'));
    });

    //Rich Snippets Media Uploader
    var mediaUploader;

    const array_placeholder = [
        "#rankology_rich_snippets_publisher_logo",
    ];

    array_placeholder.forEach(function (item) {
        $(item + "_placeholder_upload").click(function (e) {
            e.preventDefault();
            $(item + "_upload").trigger('click');
        });
    });

    $('#rankology_rich_snippets_publisher_logo_upload').click(function (e) {
        e.preventDefault();
        // If the uploader object has already been created, reopen the dialog
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            multiple: false
        });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#rankology_rich_snippets_publisher_logo_meta').val(attachment.url);
            $('#rankology_rich_snippets_publisher_logo_width').val(attachment.width);
            $('#rankology_rich_snippets_publisher_logo_height').val(attachment.height);

            $('#rankology_rich_snippets_publisher_logo_src').attr('src', attachment.url);

            $("#rankology_rich_snippets_publisher_logo_placeholder_src").attr('src', $("#rankology_rich_snippets_publisher_logo_meta").val());
        });
        // Open the uploader dialog
        mediaUploader.open();
    });

    const array_remove = [
        "#rankology_rich_snippets_publisher_logo",
    ];

    array_remove.forEach(function (item) {
        $(item + "_remove").click(function (e) {
            e.preventDefault();

            $(item + "_meta").val('');
            $(item + "_placeholder_src").attr('src', '');
        });
    });

    const array_update = [
        "#rankology_rich_snippets_publisher_logo"
    ];

    array_update.forEach(function (item) {
        $(item + "_meta").on('keyup paste change click focus input mouseout', function () {
            $(item + "_placeholder_src").attr('src', $(item + "_meta").val());
        });
    });
});

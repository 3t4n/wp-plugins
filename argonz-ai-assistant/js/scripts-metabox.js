jQuery(document).ready(function ($) {
    // Initialize tabs
    $('#argonz-metabox-tabs .argonz-tabs a').on('click', function (e) {
        e.preventDefault();

        // Remove active class from all tabs and contents
        $('#argonz-metabox-tabs .argonz-tabs a').removeClass('active');
        $('#argonz-metabox-tabs .argonz-tab-content').removeClass('active');

        // Add active class to clicked tab and corresponding content
        $(this).addClass('active');
        $($(this).attr('href')).addClass('active');
    });

    // Automatically load content when the metabox is opened
    const postId = argonzMetabox.post_id;
    const ajaxUrl = argonzMetabox.ajax_url;

    function loadGroqData() {
        $.ajax({
            url: ajaxUrl,
            method: 'POST',
            data: {
                action: 'argonz_fetch_api_data',
                post_id: postId
            },
            beforeSend: function () {
                $('#tab-revised-text').html('<p>در حال بارگذاری...</p>');
                $('#tab-keywords').html('<p>در حال بارگذاری...</p>');
            },
            success: function (response) {
                if (response.success) {
                    $('#tab-revised-text').html(
                        `<pre style="white-space: pre-wrap; word-wrap: break-word;">${response.data.revised_text}</pre>`
                    );
                    $('#tab-keywords').html(
                        `<ul>${response.data.keywords
                            .split(',')
                            .map((keyword) => `<li>${keyword.trim()}</li>`)
                            .join('')}</ul>`
                    );
                } else {
                    $('#tab-revised-text').html('<p>خطایی رخ داده است.</p>');
                    $('#tab-keywords').html('<p>خطایی رخ داده است.</p>');
                }
            },
            error: function () {
                $('#tab-revised-text').html('<p>خطا در برقراری ارتباط با سرور.</p>');
                $('#tab-keywords').html('<p>خطا در برقراری ارتباط با سرور.</p>');
            }
        });
    }

    // Load data on first load
    loadGroqData();
});

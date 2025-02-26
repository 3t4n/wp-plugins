(function ($) {
    'use strict';

    var siteurl = AI_Blog_Admin_WP_ARGS.siteurl,
        ajaxurl = AI_Blog_Admin_WP_ARGS.ajaxurl;

    $(document).ready(function(){

        $('#post_words_limit').on('input', function () {
            let input = $(this).val();
            input = input.replace(/\D/g, '');
            $(this).val(input);
        });

        $('#generate-blog-post').on('click', function (e) {
            e.preventDefault();

            var isValid = true;
            $('#publish_ai_blog')[0].reset();
            tinymce.get('ai_blog_post_content').setContent('');
            $('#ai-blog-preview').slideUp();
            $('.validation-error').hide().text('');

            var blogTopic = $('#generate_blog_topic').val().trim();
            var blogTopic_wordCount = blogTopic.split(/\s+/).filter(function(word) {
                return word.length > 0;
            }).length;

            if (!blogTopic) {
                $('#generate_blog_topic_error').text(AI_Blog_Admin_WP_ARGS.emptyFieldError).show();
                isValid = false;
            } else if (blogTopic_wordCount < 5) {
                $('#generate_blog_topic_error').text(AI_Blog_Admin_WP_ARGS.wordCountError).show();
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(blogTopic)) {
                $('#generate_blog_topic_error').text(AI_Blog_Admin_WP_ARGS.alphaOnlyError).show();
                isValid = false;
            }

            var postWordsLimit = $('#post_words_limit').val().trim();
            if (!/^\d+$/.test(postWordsLimit)) {
                $('#post_words_limit_error').text(AI_Blog_Admin_WP_ARGS.numericError).show();
                isValid = false;
            } else if (parseInt(postWordsLimit, 10) < 50) {
                $('#post_words_limit_error').text(AI_Blog_Admin_WP_ARGS.minLimitError).show();
                isValid = false;
            } else if (parseInt(postWordsLimit, 10) > 500) {
                $('#post_words_limit_error').html(AI_Blog_Admin_WP_ARGS.maxLimitError).show();
                isValid = false;
            }

            if (!isValid) return;

            var button = $(this);
            button.prop('disabled', true).text(AI_Blog_Admin_WP_ARGS.generatingText);
            $('#loader').show();

            var nonce = $('#generate_blog_nonce').val();
            var postTitle = $('#generate_blog_topic').val();
            var postWordsLimit = $('#post_words_limit').val();

            // Perform the AJAX request
            jQuery.ajax({
                url: ajaxurl,
                method: 'POST',
                data: {
                    action: 'generate_blog_post',
                    nonce: nonce,
                    post_title: postTitle,
                    post_words_limit: postWordsLimit
                },
                success: function (response) {
                    // Handle success response
                    var messageClass = response.success ? 'updated' : 'error';
                    $('#message-container').html(`<div class="${messageClass}"><p>${response.data.message}</p></div>`);

                    button.prop('disabled', false).text(AI_Blog_Admin_WP_ARGS.generateNewText);
                    $('#loader').hide();

                    $('#ai_blog_post_title').val(response.data.post_title);
                    tinymce.get('ai_blog_post_content').setContent(response.data.post_content);

                    // Show the preview section
                    $('#ai-blog-preview').slideDown();
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    const errorMessage = xhr.responseJSON?.data?.message || error;
                    $('#message-container').html(`<div class="error"><p>${errorMessage}</p></div>`);

                    button.prop('disabled', false).text(AI_Blog_Admin_WP_ARGS.generateNewText);
                    $('#loader').hide();

                    // Clear input fields
                    $('#generate_blog_topic').val('');
                    $('#post_words_limit').val('');

                },
                complete: function () {
                    // Re-enable the button and hide loader
                    button.prop('disabled', false).text(AI_Blog_Admin_WP_ARGS.generateNewText);
                    $('#loader').hide();
                    // Clear input fields
                    $('#generate_blog_topic').val('');
                    $('#post_words_limit').val('');
                }
            });
        });

        $('#clear_blog_data').on('click', function (e) {
            e.preventDefault();
            $('#publish_ai_blog')[0].reset();
            tinymce.get('ai_blog_post_content').setContent('');
            $('#ai-blog-preview').slideUp();
        });
    });
})(jQuery);
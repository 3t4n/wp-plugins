var ATBS_Plugin = function ($) {

    var _translations = {};
    var _oauth_token;
    var _identity;
    var _api_url;
    var _item_id;


    var init = function (options) {

        _oauth_token = options.oauth_token;
        _identity = options.identity;
        _api_url = options.api_url;
        
        $('.vocalreferences-btn-visible').on('click', function (e) {
            $.ajax({
                type: 'POST',
                url: _api_url + 'content/visible',
                data: JSON.stringify({
                    auth_token: _identity,
                    params: {
                        id: $(this).val()
                    }
                }),
                beforeSend: function (jqXHR) {
                    jqXHR.setRequestHeader('Content-Type', 'application/json');
                    jqXHR.setRequestHeader('Authorization', 'Bearer ' + _oauth_token);
                },
                async: true,
                dataType: 'json'
            });
        });

        $('.vocalreferences-btn-layout').on('click', function (e) {
            e.preventDefault();
            $('.vocalreferences_widget_tumbnail').removeClass('active');
            $(this).addClass('active');
            $('input[name="fields[wp_layout]"]').val($(this).data('id'));
            $('.vocalreferences_short_code').text('[atbs_widget layout_id=' + $(this).data('id') + ']');
        });

        $('.vocalreferences-btn-approve').on('click', function (e) {
            e.preventDefault();
            var message = _translations['Are you sure you want to approve the testimonial?'] || 'Are you sure?';
            if (confirm(message)) {
                $.ajax({
                    type: 'POST',
                    url: _api_url + 'content/approve',
                    data: JSON.stringify({
                        auth_token: _identity,
                        params: {
                            id: $(this).data('id')
                        }
                    }),
                    beforeSend: function (jqXHR) {
                        jqXHR.setRequestHeader('Content-Type', 'application/json');
                        jqXHR.setRequestHeader('Authorization', 'Bearer ' + _oauth_token);
                    },
                    async: true,
                    dataType: 'json'
                }).done(function (data) {
                    window.location.reload();
                });
            }
        });


        $('.vocalreferences-btn-delete').on('click', function (e) {
            e.preventDefault();
            var message = _translations['Are you sure you want to delete the testimonial?'] || 'Are you sure?';
            if (confirm(message)) {
                $.ajax({
                    type: 'POST',
                    url: _api_url + 'content/delete',
                    data: JSON.stringify({
                        auth_token: _identity,
                        params: {
                            id: $(this).data('id')
                        }
                    }),
                    beforeSend: function (jqXHR) {
                        jqXHR.setRequestHeader('Content-Type', 'application/json');
                        jqXHR.setRequestHeader('Authorization', 'Bearer ' + _oauth_token);
                    },
                    async: true,
                    dataType: 'json',
                }).done(function (data) {
                    window.location.reload();
                });
            }
        });

        $('.vocalreferences-btn-edit').on('click', function (e) {
            e.preventDefault();
            var url = 'https://merchant.vocalreferences.com/wp/edit-testimonial?id=' + $(this).data('id') + '&identity=' + _identity;
            fancybox(url, 'Edit Testimonial', 600, 650);
        });

        $('.vocalreferences-btn-addnew').on('click', function (e) {
            e.preventDefault();
            var url = 'https://merchant.vocalreferences.com/wp/add-testimonial?asLocal=1&identity=' + _identity;
            fancybox(url, 'Add Testimonial', 600, 650);
        });

        $('.vocalreferences-btn-copy-to-clipboard').on('click', function (e) {
            e.preventDefault();
            var elementToCopy = $('#table-link-href-' + $(this).data('id'));
            var input = $('.copy-input');
            copyToClipboard(elementToCopy, input);
        });

        $('.kt-checkbox').on('click', function (e) {
            if (!$(this).is(':checked')) {
                $(this).prop('checked', false);
            }
        });

        
        $('.vocalreferences-btn-reply').on('click', function (e) {
            _item_id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: _api_url + 'content/get-reply-comment',
                data: JSON.stringify({
                    auth_token: _identity,
                    params: {
                        id: _item_id
                    }
                }),
                beforeSend: function (jqXHR) {
                    jqXHR.setRequestHeader('Content-Type', 'application/json');
                    jqXHR.setRequestHeader('Authorization', 'Bearer ' + _oauth_token);
                },
                async: true,
                dataType: 'json'
            }).done(function (data) {
                $('#content_reply_comment').val(data.result.reply_comment);
                $('#replyModal').modal('show');
            });
        });
        
        $('.vocalreferences-btn-reply-save').on('click', function (e) {
            $.ajax({
                type: 'POST',
                url: _api_url + 'content/save-reply-comment',
                data: JSON.stringify({
                    auth_token: _identity,
                    params: {
                        id: _item_id,
                        reply_comment: $('#content_reply_comment').val(),
                    }
                }),
                beforeSend: function (jqXHR) {
                    jqXHR.setRequestHeader('Content-Type', 'application/json');
                    jqXHR.setRequestHeader('Authorization', 'Bearer ' + _oauth_token);
                },
                async: true,
                dataType: 'json'
            }).done(function (data) {
                $('#replyModal').modal('hide');
                window.location.reload();
            });
        });
        
    };

    var fancybox = function (url, title, width, height) {
        $.fancybox.open({
            src: url,
            type: 'iframe',
            opts: {
                iframe: {
                    preload: true // Preload iframe for smoother opening
                },
                padding: 10, // Space around the iframe content
                width: width, // Width of the iframe
                height: height, // Height of the iframe
                title: title, // Title for the iframe content
                transitionEffect: 'none', // No opening/closing animation
                buttons: [], // Disable default buttons
                smallBtn: true, // Show small close button
                beforeClose: function () {
                    window.location.reload(); // Reload the page when Fancybox closes
                }
            }
        });
    };

    if ($('.colorpicker-element').length > 0) {
        $('.colorpicker-element').colorpicker({
            format: "hex",
            autoInputFallback: false
        });
    }

    var i18n = function (t) {
        _translations = t;
    };

    var copyToClipboard = function (elementToCopy, input) {
        $(input).val($(elementToCopy).text()).select();
        document.execCommand("copy");
    };

    return {
        i18n: i18n,
        init: init,
        copyToClipboard: copyToClipboard,
    };
}(jQuery);
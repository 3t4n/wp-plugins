var ApiCalls = (function ($) {

    function createLoginLink(data, callbacks) {
        $.ajax({
            url: '/wp-json/ll/v1/create',
            type: 'POST',
            processData: false,
            contentType: false,
            headers: {
                'X-WP-Nonce': api.nonce
            },
            data: data,
            beforeSend: function () {
                if (typeof callbacks.beforeSend === 'function') {
                    callbacks.beforeSend();
                }
            },
            success: function (response) {
                if (response.message && typeof callbacks.success === 'function') {
                    callbacks.success(response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (typeof callbacks.error === 'function') {
                    callbacks.error(jqXHR.responseJSON, textStatus, errorThrown);
                }
            }
        });
    }

    function deleteLoginLink(linkId, callbacks) {
        $.ajax({
            url: '/wp-json/ll/v1/delete/' + linkId,
            type: 'DELETE',
            headers: {
                'X-WP-Nonce': api.nonce
            },
            beforeSend: function () {
                if (typeof callbacks.beforeSend === 'function') {
                    callbacks.beforeSend();
                }
            },
            success: function (response) {
                if (response.message && typeof callbacks.success === 'function') {
                    callbacks.success(response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (typeof callbacks.error === 'function') {
                    callbacks.error(textStatus + ': ' + errorThrown);
                }
            }
        });
    }

    return {
        createLoginLink: createLoginLink,
        deleteLoginLink: deleteLoginLink
    };

})(jQuery);

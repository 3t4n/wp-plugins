jQuery(document).ready(function ($) {
    function fetchRedirections(search = '') {
        $.post(art_ajax.ajax_url, { action: 'art_fetch_redirections', search }, function (response) {
            if (response.success) {
                $('#art-redirection-list').html(response.data.html);
            }
        });
    }

    fetchRedirections();

    $('#art-add-redirection-form').submit(function (e) {
        e.preventDefault();
        const data = {
            action: 'art_add_redirection',
            url_from: $('#url_from').val(),
            url_to: $('#url_to').val(),
        };

        $.post(art_ajax.ajax_url, data, function (response) {
            if (response.success) {
                alert(response.data.message);
                fetchRedirections();
            } else {
                alert(response.data.message);
            }
        });
    });

    $(document).on('click', '.art-delete-btn', function () {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this redirection?')) {
            $.post(art_ajax.ajax_url, { action: 'art_delete_redirection', id }, function (response) {
                if (response.success) {
                    alert(response.data.message);
                    fetchRedirections();
                }
            });
        }
    });

    $('#art-search').on('input', function () {
        fetchRedirections($(this).val());
    });
});

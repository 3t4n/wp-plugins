jQuery(document).ready(function ($) {
    'use strict';

    $(document).on('click', '.affi-share-btn', function (e) {
        let copied_text = $(this).find('.affi-share-btn-copy'),
            label_text = $(this).find('.affi-share-btn-text'),
            tempTextarea = $('<textarea>');
        $('body').append(tempTextarea);
        tempTextarea.val($(this).data('link')).select();
        document.execCommand('copy');
        tempTextarea.remove();
        copied_text.css('display', 'initial');
        label_text.css('display', 'none');
        setTimeout(function () {
            copied_text.css('display', 'none');
            label_text.css('display', 'initial');
        }, 1000);
    });
});
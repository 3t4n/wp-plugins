jQuery(document).ready(function($) {
    // Animasyonlu bildirimler için fonksiyon
    function showNotification(message, type = 'success') {
        const notification = $('<div>')
            .addClass('status-message')
            .addClass('status-' + type)
            .text(message)
            .hide();
        
        $('#update-status').html(notification);
        notification.fadeIn(300);
        
        setTimeout(() => {
            notification.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Manuel güncelleme
    $('#update-llms-txt').click(function(e) {
        e.preventDefault();
        
        const button = $(this);
        button.prop('disabled', true).addClass('updating');
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'update_llms_txt',
                nonce: llmsTxt.nonce
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.data);
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showNotification(response.data, 'error');
                }
            },
            error: function() {
                showNotification('Bir hata oluştu!', 'error');
            },
            complete: function() {
                button.prop('disabled', false).removeClass('updating');
            }
        });
    });

    // Dinamik form alanları için
    $('.add-row-button').click(function() {
        const tableBody = $(this).closest('.llms-card').find('tbody');
        const rowTemplate = $(this).data('template');
        tableBody.append(rowTemplate);
    });

    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').fadeOut(300, function() {
            $(this).remove();
        });
    });

    // Form değişikliklerini kaydetme
    let formChanged = false;
    
    $('form.llms-settings-form :input').on('change', function() {
        formChanged = true;
    });

    $(window).on('beforeunload', function() {
        if (formChanged) {
            return 'Kaydedilmemiş değişiklikleriniz var. Sayfadan ayrılmak istediğinizden emin misiniz?';
        }
    });

    $('form.llms-settings-form').on('submit', function() {
        formChanged = false;
    });
});
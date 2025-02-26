jQuery(document).ready(function ($) {
    var trash = $('#trash')
    var saveData = $('#save-settings')
    var save_settings_nonce = $('#save_settings_nonce').val();
    saveData.on('click', function (e) {
        e.preventDefault();
        var formData = $('#rgfb_settings').serializeArray();
        $.ajax({
            type: 'POST',
            url: ajaxurl, // WordPress AJAX URL
            data: {
                action: 'rgfb_save_settings',
                formData: formData,
                nonce: save_settings_nonce,
            },
            dataType: 'JSON',
            success: function (response) {
                $.alert({
                    title: (response.status) ? 'Success' : 'Warning',
                    content: response.msg,
                });
            }
        });
    })

    trash.on('click', function () {
        formBuilder.actions.clearFields()
    })

    $(".text-visibility").on('click', function(event) {
        event.preventDefault();
        const elementId = $(this).closest('div[id]').attr('id');
        togglePasswordVisibility(elementId);
    });
    
    function togglePasswordVisibility(elementId) {
        const inputElement = $(`#${elementId} input`);
        const iconElement = $(`#${elementId} i`);
    
        if (inputElement.attr("type") === "text") {
            inputElement.attr("type", "password");
            iconElement.addClass("fa-eye-slash").removeClass("fa-eye");
        } else if (inputElement.attr("type") === "password") {
            inputElement.attr("type", "text");
            iconElement.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    }
});


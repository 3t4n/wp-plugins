jQuery(function() {
    var $formUpdate = jQuery('.formUpdate');
    var $linkDeactivatePlugin = jQuery('.deactivatePlugin');
    var $formScreen = jQuery('.settings-wrapper');
    var url = $formUpdate.attr('action');
    var deactivateUrl = $linkDeactivatePlugin.attr('data-url');

    $formUpdate.on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var data = {
            action: 'adoric_install', 
            accountId: $formUpdate.find('INPUT[name="accountId"]').val()
        };

        jQuery.ajax({
            url: url,
            type: "POST",
            data: data,
            complete: function(xhr, status) {
                if (xhr.responseJSON.success) {
                    console.log('Success: ', xhr.responseJSON.data);
                    document.location.href = xhr.responseJSON.data.redirect || '/';
                } else {
                    $formScreen.find('.error-info').html(xhr.responseJSON.data);
                }
            }
        });
    });


    $linkDeactivatePlugin.on('click', function() {
        var data = {
            action: 'deactivate_adoric_plugin'
        };

        jQuery.ajax({
            url: deactivateUrl,
            type: "POST",
            data: data,
            complete: function(xhr, status) {
                if (xhr.status === 200) {
                    document.location.href = xhr.responseJSON.data.redirect || '/';
                }
            }
        });
    });
});
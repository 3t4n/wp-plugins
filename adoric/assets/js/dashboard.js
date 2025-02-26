jQuery(function() {
    var $formInstall = jQuery('.formInstall');
    var url = $formInstall.attr('action');
    var $formScreen = jQuery('.activate-form-wrapper');
    var $loaderScreen = jQuery('.loader-wrapper');
    var $welcomeScreen = jQuery('.welcome-wrapper');
    var $videoOpenButton = jQuery('.js-videoLink');
    var $videoCloseButton = jQuery('.videoModal__close');
    var $videoModal = jQuery('.videoModal');

    $formInstall.on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $formScreen.removeClass('active');
        $loaderScreen.addClass('active');

        var data = {
            action: 'adoric_install', 
            accountId: $formInstall.find('INPUT[name="accountId"]').val()
        };

        jQuery.ajax({
            url: url,
            type: "POST",
            data: data,
            complete: function(xhr, status) {
                if (xhr.responseJSON.success) {
                    console.log('Success: ', xhr.responseJSON.data);
                    document.location.reload();
                } else {
                    $formScreen.addClass('active');
                    $loaderScreen.removeClass('active');
                    $formScreen.find('.error-info').html(xhr.responseJSON.data);
                }
            }
        });
    });


    $videoOpenButton.on('click', function() {
        $videoModal.addClass('active');
    });
    $videoCloseButton.on('click', function() {
        $videoModal.removeClass('active');
    });
});
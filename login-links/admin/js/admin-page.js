jQuery(document).ready(function($) {
    $('#user').change(function() {
        var selectedUser = $(this).val();
        if (selectedUser === '0') {
            $('#role-field').show();
            $('#role').prop('disabled', false);
        } else {
            $('#role-field').hide();
            $('#role').prop('disabled', true);
        }
    });

    $('input[name="user_type"]').change(function() {
        var userType = $(this).val();

        if (userType === 'temporary') {
            $('#user-id-field').hide();
            $('#role-field').show();
            $('#user_id').prop('disabled', true);
            $('#role').prop('disabled', false);
        } else if (userType === 'existing') {
            $('#user-id-field').show();
            $('#role-field').hide();
            $('#role').prop('disabled', true);
            $('#user_id').prop('disabled', false);
        }
    });

    $('input[name="expiration_type"]').change(function() {
        var expirationType = $(this).val();
        
        if (expirationType === 'time-based') {
            $('#expiration-time-field').show();
            $('#login-times-field').hide();
            $('#max-logins').prop('disabled', true);
            $('#expiration-time-field input').prop('disabled', false);
            $('#expiration-unit').prop('disabled', false);
        } else if (expirationType === 'login-times') {
            $('#login-times-field').show();
            $('#expiration-time-field').hide();
            $('#max-logins').prop('disabled', false);
            $('#expiration-time-field input').prop('disabled', true);
            $('#expiration-unit').prop('disabled', true);
        } else if (expirationType === 'mixed') {
            $('#expiration-time-field').show();
            $('#login-times-field').show();
            $('#max-logins').prop('disabled', false);
            $('#expiration-time-field input').prop('disabled', false);
            $('#expiration-unit').prop('disabled', false);
        }
    });

    $(document).on('click', '.copy-btn', function(e) {
        e.preventDefault();
        var link = $(this).data('link');
        navigator.clipboard.writeText(link).then(function() {
            alert('Link copied to clipboard!');
        }, function(err) {
            alert('Failed to copy link.');
        });
    });

    $('#advanced-settings-toggler').on('click', function(e) {
        e.preventDefault();
        
        var content = $('#advanced-settings-content');
        var icon = $('.advanced-settings-toggler__icon');
        var text = $('.advanced-settings-toggler__text');

        content.toggle();
        icon.toggleClass('rotate');

        var currentText = text.text();
        var labelShow = $(this).data('label-show');
        var labelHide = $(this).data('label-hide');

        text.text(currentText === labelShow ? labelHide : labelShow);
    });
});

jQuery(document).ready(function($) {
    $('#add_temp_login_link').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        ApiCalls.createLoginLink(formData, {
            beforeSend: function() {
                $('.spinner').addClass('is-active');
            },
            success: function(response) {
                $('.spinner').removeClass('is-active');
                if(response.result === 'link_create_success') {
                    var template = $('#row-template').html();
                    var populatedRow = populateTemplate(template, response.rowData);
                    $('#col-right table tbody').prepend(populatedRow);
                    $(document).trigger('link_created_success');
                }
            },
            error: function(response, textStatus, errorThrown) {
                $('.spinner').removeClass('is-active');
                alert(response.message + ': ' + errorThrown);
				if( response.debug ) {
					console.log(response, textStatus, errorThrown);
				}
            }
        });
    });

    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var linkId = $(this).data('link');
        var confirmDelete = confirm('Are you sure you want to delete this login link?');
    
        if (confirmDelete) {
            ApiCalls.deleteLoginLink(linkId, {
                beforeSend: function() {
                },
                success: function(response) {
                    var $row = $(this).closest('tr');
                    hideAndRemoveNode($row, function(){
                        $(document).trigger('link_destroyed_success');
                    });
                }.bind(this),
                error: function(errorMessage) {
                    console.error('Error deleting link:', errorMessage);
					alert('Error deleting link:' + errorMessage);
                }
            });
        }
    });

    (function() {
        var $linkCount = $('.links-count');
        var $tableBody = $('#col-right table tbody');
    
        function addNoLinksFoundRow() {
            var template = $('#row-no-link-found-template').html();
            $tableBody.append(template);
        }
    
        function removeNoLinksFoundRow() {
            $('#row-no-link-found').remove();
        }
    
        function recalculateLinkCount() {
            var linkCount = $('.link-row').length;
            $linkCount.html(linkCount);
    
            if (linkCount === 0) {
                addNoLinksFoundRow();
            } else {
                removeNoLinksFoundRow();
            }
        }
    
        $(document).on('link_created_success', function() {
            recalculateLinkCount();
        });
    
        $(document).on('link_destroyed_success', function() {
            recalculateLinkCount();
        });
    })();
});

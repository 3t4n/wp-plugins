//emc frontend script
jQuery(document).ready(function ($) {
    $('.emc_call_number, .emc_sms_number, .emc_fax_number').intlTelInput({
        autoFormat: true,
        initialCountry: "auto",
        onlyCountries: countries
    });

    $('.emc_call_button').click(function () {
        var button = $(this);
        var agent = $(this).attr('data-agent');
        if ($.trim($('.emc_call_number').val()) == '') {
            $('.emc_call_number').focus();
            return false;
        }
	
        var user_phone = $.trim($('.emc_call_number').val());
        user_phone = user_phone.replace(/\s/g, "").replace(/[-]/g, "");
        var welcome = $('.emc_welcome_message').val();
        var security = $('#emc_nonce_field').val();
        button.after('<span class="emc-loader"></span>');
        button.attr('disabled', true);
        $('.emc_error').remove();
        var data = {
            'action': 'make_the_call_guest',
            'agent': agent,
            'user': user_phone,
            'welcome': welcome,
            'security': security
        };
        $.ajax({
            url: ajax_url,
            data: data,
            type: 'post',
            success: function (msg) {
                if (msg == 'Done') {
                    $('.emc_error').remove();
                    $('.emc-loader').remove();
                } else {
                    //console.log(msg);
                    $('.emc-loader').remove();
                    button.after('<span class="emc_error"> call failed</span>');
                    button.attr('disabled', false);
                }
            }, complete: function () {
                setTimeout(function () {
                    $('.emc-loader').remove();
                    button.attr('disabled', false);
                }, 5000);
            }
        });
    });

});

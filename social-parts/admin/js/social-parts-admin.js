const ajax_headers = {
    'Access-Control-Allow-Origin': '*',
    'Content-Type': 'application/json',
    'Accept': 'application/json'
};

const ajax_login_path = social_parts_api_url + 'login';

const ajax_domain_path = social_parts_api_url + 'domain';

const error_messages = {
    domain_unavailable: 'Domain is not available now, fill the form to get plugin',
    internal_server_error: 'Internal server error'
};

jQuery(document).ready(function () {
    jQuery('#social-parts-login').on('click', function () {
        var data = get_form_data();
        get_social_proof_token(data);
    });
    jQuery.ajaxSetup({
        headers: ajax_headers
    });
    if (social_parts_domain_id !== 0) {
        check_domain(social_parts_domain_id);
    } else if (social_parts_domain_id = get_domain_from_url()) {
        plugin_install(social_parts_domain_id);
    }
});

function get_form_data() {
    return {
        email: jQuery('#email').val(),
        password: jQuery('#password').val()
    };
}

function check_domain_callback() {
    if (social_parts_domain_id = get_domain_from_url()) {
        plugin_install(social_parts_domain_id);
    } else {
        var error = create_error_message('domain', error_messages.domain_unavailable);
        display_errors(error);
        jQuery('#social-parts-login-block').show();
        jQuery('#success-block').hide();
    }
}

function check_domain(social_parts_domain_id) {
    jQuery.post(social_parts_api_url + social_parts_domain_id + '/exists').done(function (data) {
        if (!data.success) {
            check_domain_callback();
        }
    }).fail(function () {
        check_domain_callback();
    });
}

function get_social_proof_token(data) {
    jQuery.post(ajax_login_path, JSON.stringify(data), function (data) {
        if (data.success) {
            var token = data.token;
            get_social_proof_domain(token);
        } else {
            display_errors(data);
        }
    }).fail(function (data) {
        display_errors(data.responseJSON.errors);
    });

}

function get_social_proof_domain(token) {
    jQuery.ajaxSetup({
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });
    jQuery.post(ajax_domain_path, '', function (data) {
        if (data.success) {
            var social_parts_domain_id = data.domain;
            plugin_install(social_parts_domain_id);
        } else {
            display_errors(data)
        }
    });
}

function plugin_install(social_parts_domain_id) {
    jQuery.ajaxSetup({
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
    });
    jQuery.post(ajaxurl, {
        action: 'social_parts_register',
        social_parts_domain_id: social_parts_domain_id
    }, function (data) {
        if (data.success) {
            location.reload();
        } else {
            display_errors(data.errors)
        }
    }).fail(function () {
        var error = create_error_message('server', error_messages.internal_server_error);
        display_errors(error);
    });
}

function get_domain_from_url() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    return url.searchParams.get('social_parts_domain_id');
}

function create_error_message(type, message) {
    return {
        type: [
            message
        ]
    };
}

function display_errors(errors) {
    jQuery('#social-parts-errors').html('');
    console.log(errors);
    jQuery.each(errors, function (key, value) {
        jQuery('#social-parts-errors').append('<div class="alert alert-danger">' + value + '</div>');
    });
}
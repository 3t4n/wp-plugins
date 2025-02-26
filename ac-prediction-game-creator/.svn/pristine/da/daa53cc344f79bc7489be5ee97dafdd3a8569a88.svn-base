/**
 * Created by Richard on 19/09/2016.
 */

console.log('ACPGC');
ACPGC = {
    common: {
        init: function () {
            'use strict';
            //uncomment to debug
            console.log('common test login form');

            //add js class
            jQuery('body').addClass('acpgcJs')

            jQuery('#league_invite_form').submit(function(e) {

                e.preventDefault();
                var email = jQuery('#invite_email').val();

                jQuery.ajax({
                    url: acpgc.ajaxurl, // WordPress AJAX URL
                    type: 'POST',
                    data: {
                        action: 'send_league_invite',
                        email: email,
                        league_id: acpgc.postid,
                        league_url: acpgc.posturl,
                        send_invite_nonce: acpgc.send_invitenonce // The nonce for verifying this request

                    },
                    success: function(response) {
                        alert('Invite sent!');
                    },
                    error: function() {
                        alert('Error sending invite.');
                    }
                });
            });

            jQuery('#custom_login_form').submit(function(event) {
                event.preventDefault();
                var username = jQuery('input[name="username"]').val();
                var password = jQuery('input[name="password"]').val();

                jQuery.ajax({
                    url: acpgc.root + 'acpgc/v1/login',
                    method: 'POST',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-WP-Nonce', acpgc.nonce);
                    },
                    data: {
                        'username': username,
                        'password': password
                    }
                }).done(function(response) {
                    if(response.success) {
                        window.location.href = response.redirect_url;  // Redirect user
                    } else {
                        alert(response.message);  // Show error message
                    }
                });
            });

            jQuery('#custom_registration_form').submit(function(event) {
                event.preventDefault();
                var email = jQuery('#email').val();
                var confirmEmail = jQuery('#confirm_email').val();
                var password = jQuery('#password').val();
                var confirmPassword = jQuery('#confirm_password').val();
                var firstName = jQuery('#first_name').val();
                var lastName = jQuery('#last_name').val();

                // Validate email and confirm email
                if (email !== confirmEmail) {
                    alert('Email and Confirm Email do not match.');
                    return;
                }

                // Validate password and confirm password
                if (password !== confirmPassword) {
                    alert('Password and Confirm Password do not match.');
                    return;
                }

                // Generate a unique username based on the email address
                var username = email.split('@')[0] + Math.floor(Math.random() * 1000);

                jQuery.ajax({
                    url: acpgc.root + 'acpgc/v1/register',
                    method: 'POST',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-WP-Nonce', acpgc.nonce);
                    },
                    data: {
                        'username': username, // Use the generated username
                        'email': email,
                        'password': password,
                        'first_name': firstName,
                        'last_name': lastName
                    }
                }).done(function(response) {
                    if(response.success) {
                        window.location.href = response.redirect_url;  // Redirect user on successful registration
                    } else {
                        alert(response.message);  // Show error message if registration fails
                    }
                });
            });

            jQuery('#custom_user_profile_form').submit(function(event) {
                event.preventDefault();
                console.log("submit profile");
                var email = jQuery('#email').val();
                var firstName = jQuery('#first_name').val();
                var lastName = jQuery('#last_name').val();


                var formData = new FormData(jQuery(this)[0]);
                console.log(this);
                console.log(formData);
                jQuery.ajax({
                    url: acpgc.root + 'acpgc/v1/update-user',
                    method: 'POST',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-WP-Nonce', acpgc.nonce);
                    },
                    data: formData,
                    processData: false,
                    contentType: false
                }).done(function(response) {
                    if(response.success) {
                        window.location.href = response.redirect_url;  // Redirect user on successful registration
                    } else {
                        alert(response.message);  // Show error message if registration fails
                    }
                });
            });

            jQuery('#forgot_password_link').click(function(event) {
                event.preventDefault();
                var email = prompt("Please enter your email:");
                if(email) {
                    jQuery.ajax({
                        url: acpgc.root + 'acpgc/v1/reset-password',
                        method: 'POST',
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', acpgc.nonce);
                        },
                        data: {
                            'email': email
                        }
                    }).done(function(response) {
                        if(response.success) {
                            alert("A password reset link has been sent to your email.");
                        }
                    });
                }
            });


            // Get all forms with the class .c-round-thumb__form
            var forms = document.querySelectorAll(".c-round-thumb__form");

            // Iterate through each form and attach the event listener
            forms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    var selects = form.querySelectorAll('select.c-question-list__select--answer');
                    for (var i = 0; i < selects.length; i++) {
                        if (selects[i].value === '') {
                            alert('Please select an option in all select inputs.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }
                    }
                });
            });


        }
    },
    page: {
        init: function () {
            //uncomment to debug
            //console.log('pages');
        }
    },
    post: {
        init: function () {
            //uncomment to debug
            //console.log('posts');
        }
    }
};

ACPGC_UTIL = {
    exec: function (template, handle) {
        var ns = ACPGC,
            handle = (handle === undefined) ? "init" : handle;

        if (template !== '' && ns[template] && typeof ns[template][handle] === 'function') {
            ns[template][handle]();
        }
    },
    init: function () {
        var body = document.body,
            template = body.getAttribute('data-post-type'),
            handle = body.getAttribute('data-post-slug');

        ACPGC_UTIL.exec('common');
        ACPGC_UTIL.exec(template);
        ACPGC_UTIL.exec(template, handle);
    }
};
jQuery(document).ready(ACPGC_UTIL.init);

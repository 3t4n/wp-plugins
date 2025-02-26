jQuery(document).ready(function ($) {
    if (jQuery("#inputPhone").length > 0) {
        jQuery("#inputPhone").intlTelInput({});
    }

    $('body').on('click', '.change_phone_number', function () {
        $('.input-phone-div').show(500);
        $('.input-otp-div').hide(500);
        $('.fa-modal__title').text(fa_step1_text);

    });

    $('body').on('click', '#resend_otp', function () {
        $('#phoneloginbtn').click();
    });

    $('#inputPhone , #inputOtp').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    // Initialize Firebase
    if (config_set == true) {
        firebase.initializeApp(firebaseConfig);
    }

    //=========================Login With Phone==========================
    var loginphone = document.getElementById("phoneloginbtn");
    var phoneinput = document.getElementById("inputPhone");
    var otpinput = document.getElementById("inputOtp");
    var verifyotp = document.getElementById("verifyotp");
    var captcha = false;

    if ($('#phoneloginbtn').length > 0) {

        // On click of loginbtn open model popup 

        loginphone.onclick = function () {
            if (phoneinput.value != '' && phoneinput.value != null && phoneinput.value != undefined) {
                if (jQuery('#inputemail').length >= 1) {
                    if (isEmail($('#inputemail').val()) == true) {
                        otpsent();
                    } else {
                        jQuery('.fa-modal-container .success').text('');
                        jQuery('.fa-modal-container .error').text(fa_email_error);
                        $(".fa-loader").remove();
                    }
                } else {
                    otpsent();
                }
            } else {
                jQuery('.fa-modal-container .success').text('');
                jQuery('.fa-modal-container .error').text(fa_ph_error);
                $(".fa-loader").remove();
            }
        }

        /* After adding the number sent otp to enterd number */
        function otpsent() {
            jQuery("#resend_otp , #phoneloginbtn").append('<div class="fa-loader"></div>');
            var country = '+' + $("#inputPhone").intlTelInput("getSelectedCountryData").dialCode;
            phnumber = country + '' + phoneinput.value
            if (captcha == false) {
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                    'size': 'invisible',
                });
                captcha = true;
            }
            var cverify = window.recaptchaVerifier;

            firebase.auth().signInWithPhoneNumber(phnumber, cverify).then(function (response) {
                window.confirmationResult = response;
                $('.input-phone-div').hide(500);
                $('.input-otp-div').show(500);
                $('.fa-modal__title').text(fa_step2_text);
                jQuery('.fa-modal-container .error').text('');
                jQuery('.fa-modal-container .success').text(fa_otp_sent);
                $(".fa-loader").remove();
            }).catch(function (error) {
                jQuery('.fa-modal-container .success').text('');
                jQuery('.fa-modal-container .error').text(fa_ph_error);
                $(".fa-loader").remove();
            })

        }


        /* Verify OTP with Firebase  */
        verifyotp.onclick = function () {
            if (otpinput.value != '' && otpinput.value != null && otpinput.value != undefined) {
                $("#verifyotp").append('<div class="fa-loader"></div>');

                confirmationResult.confirm(otpinput.value).then(function (response) {
                    var userobj = response.user;
                    var token = userobj.xa;
                    var provider = "phone";
                    var email = $('#inputemail').val();

                    if (token != null && token != undefined && token != "") {
                        jQuery('.fa-modal-container .success').text(fa_otp_verified);
                        jQuery('.error').text('');
                        sendDatatoServerPhp(email, provider, token, phnumber, userobj.uid);
                    } else {
                        jQuery('.fa-modal-container .success').text('');
                        jQuery('.error').text(fa_otp_fail);
                        $(".fa-loader").remove();
                    }

                }).catch(function (error) {
                    jQuery('.fa-modal-container .success').text('');
                    jQuery('.error').text(fa_otp_fail);
                    $(".fa-loader").remove();
                })
            } else {
                jQuery('.fa-modal-container .success').text('');
                jQuery('.error').text(fa_otp_fail);
                $(".fa-loader").remove();
            }
        }

        //===================Saving Login Details in Server Using AJAX================
        function sendDatatoServerPhp(email, provider, token, phnumber, firebaseUserID) {

            $.ajax({
                type: "POST",
                url: ajax_url,
                data: {
                    nonce: nonce, // pass the nonce here
                    action: "wp_ajax_user_login_signup",
                    current_page: current_page,
                    phone_number: phnumber,
                    email: email,
                    user_id: firebaseUserID
                },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.success == true) {

                        firebase.database().ref('users/' + firebaseUserID).set({
                            username: res.user_name,
                            email: res.user_email,
                            phone_number: res.phone_num,
                            wp_userid: res.wp_userid,
                            created_at: res.created_at,
                            last_login: res.last_login,
                        }).then(() => {
                            $(".fa-loader").remove();
                            location.href = res.url;
                        }).catch((error) => {
                            $(".fa-loader").remove();
                        });

                    }
                }
            });
        }
        //===========================End Saving Details in My Server=======================

    }
});
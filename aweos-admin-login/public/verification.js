var isVerifying = false;
var userLoginDefaultText;
var repeatTimer;

function sendRequest() {
    var email = jQuery("input[name=verify]").val();
    var adminAjax = texts.adminAjax + '?action=awal_time&destination=';

    jQuery.get(adminAjax + email).then(function(res) {
        if (res === "email not found") {
            jQuery('#info').html(texts.emailNotFound);
        }
        else if (res === "not an email") {
            jQuery('#info').html(texts.notAnEmail);
        }
        else if (jQuery.isNumeric(res)) {
            var calculation = calcUnit(res);
            startVisualTimer(calculation.time, calculation.unit, calculation.speed);
        }
        else {
            jQuery('#info').html(texts.emailJustSended);
        }
    });
}

function toggleUserLogin() {
    isVerifying = !isVerifying
    jQuery("#user_pass").toggle()
    jQuery("#sender").toggle()
    jQuery("#wp-submit").toggle()
    jQuery("label[for=user_pass]").toggle()
    jQuery("label[for=rememberme]").toggle()

	const txt = texts.inputLabel;

	if ( isVerifying ) {
		jQuery("label[for=user_login]").html(txt);
		jQuery("#verificator").html(texts.buttonBack);
	} else {
		jQuery("label[for=user_login]").html(userLoginDefaultText);
		jQuery("#verificator").html(texts.buttonToShowForm);
	}
}

function calcUnit(time) {

    var unit, speed;

    if (time <= 60) {
        unit = (time === 1) ? texts.sec[0] : texts.sec[1];
        speed = 1000
    }

    else if (time <= 3600) {
        time = Math.ceil(time / 60);
        unit = (time === 1) ? texts.min[0] : texts.min[1];
        speed = 60000
    }

    else if (time <= 86400) {
        // calc secs to hrs
        time = Math.ceil(time / 3600);
        unit = (time === 1) ? texts.hrs[0] : texts.hrs[1];
        speed = 3600000
    }

    else {
        // calc secs to days
        time = Math.ceil(time / 86400);
        unit = (time === 1) ? texts.day[0] : texts.day[1];
        speed = 86400000
    }

    return { time: time, unit: unit, speed: speed }
}

function startVisualTimer(time, unit, speed) {

    jQuery('#info').html(
        texts.toMuchRequests.replace("{{ time }}", time).replace("{{ unit }}", unit)
    );

    clearInterval(repeatTimer); // repeatTimer is global
    repeatTimer = setInterval(function() {

        jQuery('#info').html(
            texts.toMuchRequests.replace("{{ time }}", --time).replace("{{ unit }}", unit)
        );

        if (time <= 0) {
            clearInterval(repeatTimer);
            jQuery('#info').html(texts.timerDone);
        }
    }, speed);
}

jQuery(function () {
	userLoginDefaultText = jQuery("label[for=user_login]").html();
	jQuery('#verificator').click(toggleUserLogin);
	jQuery('#sender').click(sendRequest);
});

// ‚return key
document.onkeypress = function(e) {
    if (e.keyCode != 13) return true;
    if (e.target.name == "verify") sendRequest();
    return e.target.type == "password";
};
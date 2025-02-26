
jQuery(document).ready(function (jQuery) {
    var data = {
        'action': 'acip_AjaxZonas',
        'whatever': ajax_object.we_value      // We pass php values differently!
    };
    function init() {
        var button = document.getElementById('acip_externo');
        if (button.addEventListener) {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                var codecon = document.getElementById('codecon').value;
//                var usercon = document.getElementById('usercon').value;

                var calName = document.getElementById('calName').value;
//                if (jQuery("#codecon").val().length <= 0 || jQuery("#usercon").val().length <= 0 || jQuery("#calName").val().length <= 0) {
                if (jQuery("#codecon").val().length <= 0 || jQuery("#calName").val().length <= 0) {
                } else {
//                    data = Object.assign({}, data, {codecon, usercon, calName});
                    data = Object.assign({}, data, {codecon, calName});
                    jQuery.post(ajax_object.ajax_url, data, function (response) {
                        jQuery("#dialog-confirm").dialog({
                            position: { my: "center top", at: "center top+5%", of: window },
                            resizable: false,
                            draggable:false,
                            height: "auto",
                            maxHeight: 600,
                            width: 400,
                            modal: true,
                            dialogClass: "no-close",
                            buttons: {
                                "OK": function () {
                                    jQuery(this).dialog("close");
                                    window.location = window.location.href.split("&")[0];
                                }
                            }
                        });
                        jQuery('#dialog-confirm p').text(response);
                    });
                }
            }, false);
        } else if (button.attachEvent) {
            button.attachEvent("onclick", function (event) {
                event.preventDefault();
                jQuery.post(ajax_object.ajax_url, data, function (response) {
                    alert('Se generó el siguiente código: ' + response);
                });
            });
        }
    }
    ;
    if (window.addEventListener) {
        window.addEventListener("load", init, false);
    } else if (window.attachEvent) {
        window.attachEvent("onload", init);
    } else {
        document.addEventListener("load", init, false);
    }
});

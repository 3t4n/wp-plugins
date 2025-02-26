jQuery(document).ready(function ($) {
    var data = {
        'action': 'acip_AjaxGeneral',
        'whatever': ajax_object.we_value      // We pass php values differently!
    };
    function init() {
        var button = document.getElementById('acip_externo2');
        if (button.addEventListener) {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                if (jQuery("#codecon2").val().length <= 0 || jQuery("#nomcon2").val().length <= 0) {
                } else {
                    var htmlMulti = jQuery('#acip_noShow2').html();
                    data = Object.assign({}, data, {htmlMulti});
                    jQuery.post(ajax_object.ajax_url, data, function (response) {
                        $("#dialog-confirm").dialog({
                           position: { my: "center top", at: "center top+5%", of: window },
                           resizable: false,
                           draggable:false,
                           height: "auto",
                           maxHeight: 600,
                           closeOnEscape: true,
                           width: 400,
                           modal: true,
                           dialogClass: "no-close",
                           buttons: {
                            "OK": function () {
                                $(this).dialog("close");
                                window.location = window.location.href.split("&")[0];
                            }
                        }
                    });
                        $('#dialog-confirm p').text(response);
                    });
                }
            }, false);
        } else if (button.attachEvent) {
            button.attachEvent("onclick", function (event) {
                event.preventDefault();
                if (jQuery("#codecon2").val().length <= 0 || jQuery("#nomcon2").val().length <= 0) {
                } else {
                    jQuery.post(ajax_object.ajax_url, data, function (response) {
                        alert('Se generó el siguiente código: ' + response);
                    });
                }
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

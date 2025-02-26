function writeLog(table, url, description) {
    jQuery.ajax({
        url: "https://api.annuncifunebri.it/v2/writeLog",
        data: {
            'table': table,
            'url': url,
            'description': description,
        },
        method: "POST",
        crossDomain: true,
        dataType: 'jsonp'
    });
}

if (jQuery('.annfu_epigrafe_wrapper a.annfu_lightbox').length) {
    jQuery(".annfu_epigrafe_wrapper a.annfu_lightbox").colorbox({rel: "epigrafe", maxWidth: "90%", maxHeight: "90%"});
}

jQuery('#annfu_telefono').on('keyup', function () {
    var clean = jQuery(this).val().replace(/[^\+0-9]+/g, '');
    jQuery(this).val(clean);
});

jQuery('#annfu_invio').on('click', function () {
    if (!jQuery('.annfu_dati_personali').prop('checked')) {
        return confirm('Inviando il cordoglio acconsentirai al trattamento dei tuoi dati personali');
    }
});

//invio del cordoglio
jQuery('#annfu_form_cordoglio form').on('submit', function () {
    if (typeof OpenReplay !== "undefined") {
        OpenReplay.event('click: invio cordoglio');
    }

    var error = "";

    var token = jQuery('#annfu_token').val();
    var hash = jQuery('#annfu_hash').val();
    var nome = jQuery('#annfu_nome').val();
    var mail = jQuery('#annfu_mail').val();
    var telefono = jQuery('#annfu_telefono').val();
    var testo = jQuery('#annfu_testo').val();

    if (jQuery('#annfu_recapito').length > 0) {
        var recapito = jQuery('#annfu_recapito').val();
    }

    if (jQuery('#annfu_visibile').attr('type') == 'radio') {
        var visibile = jQuery('input[name=visibile]:checked').val();
    } else {
        var visibile = jQuery('#annfu_visibile').prop('checked') ? 0 : 1;
    }

    var testoSubmit = "Sto inviando " + (testo == "" ? "la partecipazione..." : "il cordoglio...");
    jQuery("#annfu_invio").val(testoSubmit);
    jQuery("#annfu_invio").prop("disabled", true);

    Cookies.set('hash', hash, {expires: 365});
    Cookies.set('cordoglio_nome', nome, {expires: 365});
    Cookies.set('cordoglio_telefono', telefono, {expires: 365});
    Cookies.set('cordoglio_testo', testo, {expires: 365});
    Cookies.set('cordoglio_visibile', visibile, {expires: 365});
    Cookies.set('cordoglio_data', new Date().toISOString().slice(0, 10), {expires: 365});

    if (nome.length <= 3) error += "Il nome &egrave; obbligatorio (min 3 caratteri)<br/>";
    var re = /[@\.]/i;
    if (mail != "" && !re.test(mail)) error += "L'email non &egrave; corretta<br/>";
    var reTelefono = /^\+?\d{9,13}$/gi;
    if (!reTelefono.test(telefono)) error += "Il numero di cellulare non è corretto<br/>";

    if (error != "") {
        jQuery('#annfu_errori').html(error);
        if (typeof OpenReplay !== "undefined") {
            OpenReplay.event('errori nei dati in invio cordoglio', error);
        }
    } else {
        jQuery('#annfu_loading').removeClass('hidden');

        jQuery.ajax({
            url: "https://api.annuncifunebri.it/v2/cordogli",
            data: {
                token: token,
                hash: hash,
                nome: nome,
                cognome: '',
                mail: mail,
                telefono: telefono,
                testo: testo,
                recapito: recapito,
                visibile: visibile,
                provenienza: 3,
            },
            type: "POST",
            crossDomain: true,
            dataType: 'jsonp',
            success: function (data) {
                var success = '';
                if ('utente' in data) {
                    if (data.testo === null) {
                        jQuery('.annfu_partecipazioni').html('<div class="annfu_partecipazioni_wrapper">' + data.partecipazioni + '</div>');
                    } else {
                        if (jQuery('.annfu').hasClass('impresa-concordia')) {
                            var visibile = data.visibile == 0 ? '<div class="annfu_cordoglio_non_visibile col-xs-12 col-sm-12 col-md-12 my-2 text-center"><strong><i class="fas fa-exclamation-triangle"></i> Questo cordoglio NON è pubblico; è visibile solamente su questo computer</strong></div>' : '';
                            var cordoglio = '<div class="annfu_cordoglio annfu_cordoglio_in_approvazione p-0"><div class="row">' +
                                '<div class="annfu_data_cordoglio col-xs-12 col-sm-12 col-md-12 py-1">' + data.data_ita + ' <em class="float-right">in attesa di lavorazione</em></div>' + visibile +
                                '<div class="annfu_cordoglio_intestazione col-xs-12 col-sm-12 col-md-12 my-3"><strong>' + data.utente.nominativo + '</strong></div>' +
                                '<div class="annfu_cordoglio_testo col-xs-12 col-sm-12 col-md-12">' + data.testo + '</div></div></div>';
                        } else {
                            var visibile = data.visibile == 0 ? '<div class="annfu_cordoglio_non_visibile col-xs-12 mb-4 text-center"><strong><i class="fas fa-exclamation-triangle"></i> Questo cordoglio NON è pubblico; è visibile solamente su questo computer</strong></div>' : '';
                            var cordoglio = '<div class="annfu_cordoglio annfu_cordoglio_in_approvazione clearfix">' +
                                '<div class="annfu_cordoglio_intestazione clearfix">' + visibile +
                                '<div class="col-xs-12"><strong>' + data.utente.nominativo + '</strong> <em>in attesa di lavorazione</em></div>' +
                                '<div class="annfu_cordoglio_testo col-xs-12">' + data.testo + '</div>' +
                                '<div class="annfu_data_cordoglio text-right col-xs-12">' + data.data_ita + '</div></div></div></div>';
                        }

                        jQuery('.annfu_cordogli').prepend(cordoglio);
                        Cookies.set('cordoglio_id', data.id, {expires: 1});
                    }
                    jQuery('.annfu_form_cordoglio_wrapper').html(jQuery('#annfu_grazie').html());

                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('Cordoglio inviato');
                    }
                } else {
                    jQuery('#annfu_errori').html('Non &egrave; stato possibile inserire il cordoglio. Riprovare tra qualche minuto.');
                    Cookies.set('cordoglio.error', 'Non &egrave; stato possibile inserire il cordoglio. Riprovare tra qualche minuto.');
                    jQuery("#annfu_invio").val("invia");
                    jQuery("#annfu_invio").prop("disabled", false);

                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('errore strano! cordoglio inserito ma senza utente', data);
                    }
                }
            },
            error: function (data) {
                jQuery('#annfu_errori').html('Non &egrave; stato possibile inserire il cordoglio. Riprovare tra qualche minuto');
                Cookies.set('cordoglio.error', 'Non &egrave; stato possibile inserire il cordoglio. Riprovare tra qualche minuto');
                if (typeof OpenReplay !== "undefined") {
                    OpenReplay.event('errore invio cordoglio lato server', data);
                }

                location.reload(true);
            },
        });

        jQuery('#annfu_errori, #annfu_successo').html('');
        jQuery('#annfu_testo').val('');
        jQuery('#annfu_loading').addClass('hidden');
    }
    return false;
});

jQuery('.annfu_dati_personali').on('click', function () {
    if (jQuery(this).is(':checked')) {
        jQuery('#annfu_invio').prop('disabled', false);
    } else {
        jQuery('#annfu_invio').prop('disabled', 'disabled');
    }
});

jQuery('.annfu_open_tab_cordoglio').on('click', function () {
    jQuery('a[data-tab=cordoglio]').click();
    jQuery('#annfu_form_cordoglio').addClass('active');
    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top - 100}, 'slow');
});

//tab
jQuery('#annfu_tabs a').click(function (e) {
    e.preventDefault();
    jQuery(this).tab('show');
});

jQuery('.annfu_opere_bene_a').click(function () {
    writeLog('donazioni', location.href, 'click ' + jQuery(this).data('ob') + ': ' + jQuery(this).attr('href'));
});

//box ricerca
jQuery("#annfu_filter_front").on("click", function () {
    jQuery(".annfu_annunci_filter .back form").removeClass("hidden");
    jQuery(".annfu_annunci_filter").removeClass('annfu_annunci_filter_front').addClass('annfu_annunci_filter_back');
});
jQuery("#annfu_filter_back").on("click", function () {
    jQuery(".annfu_annunci_filter").removeClass('annfu_annunci_filter_back').addClass('annfu_annunci_filter_front');
});

var provinciaOptions = jQuery(".annfu_provincia").html();
jQuery(".annfu_regione").on("change", function () {
    selected = jQuery(".annfu_regione option:selected").val();
    jQuery(".annfu_provincia").html(provinciaOptions);
    jQuery(".annfu_provincia option:not(.r_" + selected + ")").remove();
    jQuery(".annfu_provincia").prepend('<option value="" selected="selected" class="seleziona">Seleziona provincia</option>');

    jQuery("select").trigger('change.select2');
});

selected = jQuery(".annfu_regione option:selected").val();
jQuery(".annfu_provincia option").show();
jQuery(".annfu_provincia option:not(.r_" + selected + ")").hide();

jQuery("select").select2();

//datepicker
jQuery(".datepicker").datepicker({'dateFormat': 'dd/mm/yy'});

//modal
jQuery('.annfu_privacy').on('click', function () {
    jQuery('#annfu_modal_privacy').modal('show');
});
jQuery('.annfu_testi').on('click', function () {
    jQuery('#annfu_modal_testi').modal('show');
});
jQuery('.annfu_copia_testo').on('click', function () {
    jQuery('#annfu_testo').val(jQuery(this).prev().text());
    jQuery('#annfu_modal_testi').modal('hide');
});

jQuery('#annfu_carousel').carousel({
    interval: false
});


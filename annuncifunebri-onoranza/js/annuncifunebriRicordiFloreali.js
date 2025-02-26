function controllaRicordoFlorealeStep1() {
    var errors = [];

    var ricordo_floreale_id = jQuery('input[name=ricordo_floreale_id]:checked').val();
    var mittente = jQuery('#annfu_ricordo_floreale_mittente').val();
    var telefono = jQuery('#annfu_ricordo_floreale_telefono').val();
    var mail = jQuery('#annfu_ricordo_floreale_mail').val();
    var testo_biglietto = jQuery('#annfu_fiore_testo_biglietto').val();

    if (mittente == '' && mail == '' && telefono == '') {
        errors.push("I campi mittente, email e telefono sono obbligatori");
    } else {
        if (!ricordo_floreale_id) errors.push("Devi selezionare una composizione");
        if (mittente.length < 3) errors.push("Il mittente &egrave; obbligatorio (min 3 caratteri)");
        var re = /[@\.]/i;
        if (mail != "" && !re.test(mail)) errors.push("L'email non &egrave; corretta");
        var reTelefono = /^\+?\d{9,13}$/gi;
        if (!reTelefono.test(telefono)) errors.push("Il numero di cellulare non è corretto");
    }

    if (errors.length == 0) {
        jQuery('#annfu_ricordo_floreale_error').html('');
        if (testo_biglietto != '') {
            jQuery('.annfu_riepilogo_ricordo_floreale_testo_biglietto').html('Testo da inserire nel biglietto: ' + testo_biglietto);
        }
        jQuery('.annfu_riepilogo_ricordo_floreale_dati_mittente').html('<strong>Dati mittente</strong><br/>' + mittente + '<br/>' + 'Email: ' + mail + '<br/>Telefono: ' + telefono);
    } else {
        jQuery('#annfu_ricordo_floreale_error').html(errors.join('<br/>'));
        jQuery('.annfu_riepilogo_ricordo_floreale_dati_mittente').html('');
    }

    return errors;
}

function controllaRicordoFlorealeStep2() {
    var errors = [];

    var nome = jQuery('#annfu_ricordo_floreale_nome').val();
    var cognome = jQuery('#annfu_ricordo_floreale_cognome').val();
    var codice_fiscale = jQuery('#annfu_ricordo_floreale_codice_fiscale').val();
    var tipologia = jQuery('#annfu_ricordo_floreale_form_inner input[name=tipologia]:checked').val();
    var ragione_sociale = jQuery('#annfu_ricordo_floreale_ragione_sociale').val();
    var partita_iva = jQuery('#annfu_ricordo_floreale_partita_iva').val();
    var via = jQuery('#annfu_ricordo_floreale_via').val();
    var cap = jQuery('#annfu_ricordo_floreale_cap').val();
    var citta = jQuery('#annfu_ricordo_floreale_citta').val();
    var codice_destinatario = jQuery('#annfu_ricordo_floreale_codice_destinatario').val();
    var pec = jQuery('#annfu_ricordo_floreale_pec').val();
    var modalita_pagamento = jQuery('#annfu_ricordo_floreale_form_inner input[name=modalita_pagamento]:checked').val();
    var privacy = jQuery('#annfu_privacy_ricordo_floreale').prop('checked');

    if(tipologia == 1) { //persona fisica
        if (nome.length < 3) errors.push("Il nome &egrave; obbligatorio (min 3 caratteri)");
        if (cognome.length < 3) errors.push("Il cognome &egrave; obbligatorio (min 3 caratteri)");
        if (codice_fiscale.length != 16) errors.push("Il codice fiscale &egrave; obbligatorio (16 caratteri)");

        var pagatore = nome + ' ' + cognome + '<br/>Codice fiscale: ' + codice_fiscale;
    } else { //persona giuridica
        if (ragione_sociale.length < 3) errors.push("La ragione sociale &egrave; obbligatoria (min 3 caratteri)");
        if (codice_fiscale.length != 16 || partita_iva.length != 11) errors.push("Almeno uno tra codice fiscale e partita iva &egrave; obbligatorio");
        if (codice_destinatario.length < 6 || codice_destinatario.length > 7) errors.push("Il codice destinatario &egrave; obbligatorio (6 o 7 caratteri)");
        var re = /[@\.]/i;
        if (pec != "" && !re.test(pec)) errors.push("L'indirizzo PEC non &egrave; corretto");

        var pagatore = ragione_sociale + '<br/>Partita IVA: ' + partita_iva + '<br/>Codice fiscale: ' + codice_fiscale + '<br/>Codice destinatario:' + codice_destinatario + '<br/>PEC: ' + pec;
    }

    if (via.length < 3) errors.push("La via &egrave; obbligatoria");
    if (cap.length < 3) errors.push("Il cap &egrave; obbligatorio");
    if (citta.length < 3) errors.push("La città &egrave; obbligatoria");
    if (!modalita_pagamento) errors.push("Devi selezionare il metodo di pagamento");
    if (!privacy) errors.push("Devi accettare le condizioni della privacy");

    if (errors.length == 0) {
        jQuery('#annfu_ricordo_floreale_error').html('');
        jQuery('#annfu_ricordo_florale_ordina').prop('disabled', false).removeClass('annfu_ordina_disabled');
        jQuery('.annfu_riepilogo_ricordo_floreale_dati_pagamento').html('<strong>Dati pagamento</strong><br/>' + pagatore + '<br/>Indirizzo: ' + via + ' ' + cap + ' ' + citta + '<br/>Modalità di pagamento: ' + modalita_pagamento);
        writeLog('fiori', location.href, 'compilato i dati di pagamento: ' + pagatore + ',' + via + ',' + cap + ',' + citta + ',' + modalita_pagamento);
    } else {
        jQuery('#annfu_ricordo_floreale_error').html(errors.join('<br/>'));
        jQuery('#annfu_ricordo_florale_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
        jQuery('.annfu_riepilogo_ricordo_floreale_dati_pagamento').html('');
    }

    return errors;
}

function calcolaImportoRicordoFloreale() {
    return jQuery('input[name=ricordo_floreale_id]:checked').data('importo') * 1 || 0;
}

jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    if (e.target.text == 'Ricordo floreale') {
        if (jQuery('.annfu_ricordo_floreale_wrapper').height() > 410) {
            jQuery('.annfu_ricordo_floreale_wrapper').addClass('scroll');
        }
    }
});

jQuery('.annfu_open_tab_ricordi_floreali').on('click', function () {
    jQuery('a[data-tab=ricordi_floreali]').click();
    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top - 100}, 'slow');
});

jQuery('.annfu_ricordo_floreale_dettagli').on('click', 'a', function () {

    img_path = jQuery(this).parents('.annfu_ricordo_floreale').find('img').attr('src');
    if (!img_path) {
        img_path = jQuery(this).parents('.annfu_ricordo_floreale').find('.annfu_ricordo_floreale_img_wrapper').css('background-image').replace("url(\"", "").replace("\")", "");
    }

    html = '<img src="' + img_path + '" class="annfu_annfu_ricordo_floreale_grande" />';
    html += '<h2>' + jQuery(this).data('denominazione') + ' (&euro; ' + jQuery(this).data('importo') + ')</h2>';
    html += '<p class="annfu_text_left">' + jQuery(this).data('descrizione') + '</p>';
    html += '<br/><br/><small>In base alla stagione, i fiori potrebbero essere diversi da quelli rappresentati in figura</small>';

    jQuery('#annfu_modal_ricordi_floreali .modal-body').html(html);
    jQuery('#annfu_modal_ricordi_floreali').modal('show');
    writeLog('ricordi-floreali', location.href, 'apertura dettaglio ' + jQuery(this).data('denominazione'));
});

jQuery('input[name=ricordo_floreale_id]').on('click', function () {
    controllaRicordoFlorealeStep1();

    jQuery('.annfu_ricordo_floreale').removeClass('checked');
    jQuery(this).parents('.annfu_ricordo_floreale').addClass('checked');

    totale = calcolaImportoRicordoFloreale();

    jQuery('#annfu_riepilogo_ricordo_floreale_totale_ordine').html(totale.toFixed(2).replace('.', ','));
    jQuery('.annfu_riepilogo_ricordo_floreale_totale_ordine').html(totale.toFixed(2).replace('.', ','));
    jQuery('.annfu_riepilogo_ricordo_floreale_composizione').html('<strong>Composizione<br/></strong>' + jQuery(this).data('denominazione'));

    jQuery('html,body').animate({scrollTop: jQuery('#annfu_ricordo_floreale_mittente').offset().top - 20}, 'slow');
    jQuery('#annfu_ricordo_floreale_mittente').focus();

    writeLog('ricordi-floreali', location.href, 'selezionato ricordo floreale dettaglio ' + jQuery(this).data('denominazione'));
});

jQuery('input[name=tipologia]').on('click', function () {
    if(jQuery(this).val() == 1) {
        jQuery('.annfu_persona_f').show();
        jQuery('.annfu_persona_g').hide();
    } else {
        jQuery('.annfu_persona_f').hide();
        jQuery('.annfu_persona_g').show();
    }
});

jQuery('#annfu_ricordo_floreale_procedi').on('click', function () {
    errors = controllaRicordoFlorealeStep1();
    if(errors.length == 0) {
        jQuery('.annfu_ordine_step1').hide();
        jQuery('.annfu_ordine_step2').show();
    }
});

jQuery('#annfu_ricordo_floreale_indietro').on('click', function () {
    jQuery('.annfu_ordine_step2').hide();
    jQuery('.annfu_ordine_step1').show();
});

jQuery('.annfu_ordine_step1 .ricordo_floreale_controllato').on('blur', function () {
    controllaRicordoFlorealeStep1();
});

jQuery('.annfu_ordine_step2 .ricordo_floreale_controllato').on('blur', function () {
    controllaRicordoFlorealeStep2();
});

jQuery('#annfu_privacy_ricordo_floreale').on('click', function () {
    if (jQuery(this).is(':checked')) {
        jQuery('#annfu_ricordo_floreale_error').html('');
        jQuery('#annfu_ricordo_florale_ordina').prop('disabled', false).removeClass('annfu_ordina_disabled');
    } else {
        jQuery('#annfu_ricordo_florale_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
    }
});

jQuery('#annfu_ricordo_floreale_form').on('submit', function (e) {
    e.preventDefault();
    writeLog('ricordo-floreale', location.href, 'invio form');

    if (typeof OpenReplay !== "undefined") {
        OpenReplay.event('click: ordine ricordo floreale');
    }

    if (confirm('Cliccando su ok confermi di voler proseguire con l\'ordine.\nProseguendo, visualizzerai le modalità di pagamento e riceverai una email di conferma.\nSe invece vuoi annullare l\'ordine, clicca su annulla.')) {
        var errors = controllaRicordoFlorealeStep2();

        if (errors.length == 0) {
            var token = jQuery('#annfu_ricordo_floreale_token').val();
            var hash = jQuery('#annfu_ricordo_floreale_hash').val();
            var ricordo_floreale_id = jQuery('input[name=ricordo_floreale_id]:checked').val();
            var mittente = jQuery('#annfu_ricordo_floreale_mittente').val();
            var nome = jQuery('#annfu_ricordo_floreale_nome').val();
            var cognome = jQuery('#annfu_ricordo_floreale_cognome').val();
            var email = jQuery('#annfu_ricordo_floreale_mail').val();
            var telefono = jQuery('#annfu_ricordo_floreale_telefono').val();
            var testo_biglietto = jQuery('#annfu_ricordo_floreale_testo_biglietto').val();
            var importo = jQuery('#annfu_riepilogo_ricordo_floreale_totale_ordine').text().replace(',', '.');
            var tipologia = jQuery('#annfu_ricordo_floreale_form_inner input[name=tipologia]:checked').val();
            var ragione_sociale = jQuery('#annfu_ricordo_floreale_ragione_sociale').val();
            var partita_iva = jQuery('#annfu_ricordo_floreale_partita_iva').val();
            var codice_fiscale = jQuery('#annfu_ricordo_floreale_codice_fiscale').val();
            var via = jQuery('#annfu_ricordo_floreale_via').val();
            var cap = jQuery('#annfu_ricordo_floreale_cap').val();
            var citta = jQuery('#annfu_ricordo_floreale_citta').val();
            var codice_destinatario = jQuery('#annfu_ricordo_floreale_codice_destinatario').val();
            var pec = jQuery('#annfu_ricordo_floreale_pec').val();
            var modalita_pagamento = jQuery('#annfu_ricordo_floreale_form_inner input[name=modalita_pagamento]:checked').val();

            jQuery('#annfu_ricordo_floreale_avanzamento').show();
            jQuery.ajax({
                url: "https://admin.annuncifunebri.it/api/v2/fiore_ordine",
                data: {
                    'token': token,
                    'hash': hash,
                    'fiore_id': ricordo_floreale_id,
                    'mittente': mittente,
                    'nome': nome,
                    'cognome': cognome,
                    'email': email,
                    'telefono': telefono,
                    'testo_fascia': '',
                    'testo_biglietto': testo_biglietto,
                    'note': '',
                    'quantita': 1,
                    'importo': importo,
                    'tipologia': tipologia,
                    'ragione_sociale': ragione_sociale,
                    'partita_iva': partita_iva,
                    'codice_fiscale': codice_fiscale,
                    'via': via,
                    'cap': cap,
                    'citta': citta,
                    'codice_destinatario': codice_destinatario,
                    'pec': pec,
                    'modalita_pagamento': modalita_pagamento
                },
                method: "POST",
                crossDomain: true,
                dataType: 'jsonp',
                success: function (data) {
                    if (data.status.code == 200) {
                        jQuery('#annfu_ricordo_floreale_error').html('');
                        jQuery('#annfu_paga_ricordo_floreale_avanzamento').css({'color': '#0e5422'})
                        jQuery('#annfu_ricordo_florale_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
                        jQuery('#accordion, #annfu_ricordo_floreale_form_inner').remove().end();
                        jQuery('#annfu_ricordo_floreale_avanzamento').text('')

                        if(modalita_pagamento == 'paypal') {
                            jQuery('#annfu_paga_button').html('<a href="' + data.data.ordine.paypal + '/' + importo + '" target="_blank" class="annfu_btn_paypal btn btn-default btn-block">paga con PayPal</a>');
                        }
                        jQuery('#annfu_ricordo_floreale_paga').show();
                        jQuery('.annfu_annuncio_wrapper, #annfu_tabs, .annfu_fondo_form_cordogli, .annfu_foto_cordogli_wrapper').hide();
                        jQuery('#annfu_form_cordoglio_wrapper').addClass('annfu_ordine_completato');
                        writeLog('ricordo-floreale', location.href, 'SUCCESSO invio form');
                    } else {
                        jQuery('#annfu_ricordo_floreale_avanzamento').css({'color': '#c00'})
                        jQuery('#annfu_ricordo_floreale_avanzamento').text(data.status.message)
                        writeLog('ricordo-floreale', location.href, 'ERRORE invio form: ' + data.status.message);
                    }
                    jQuery('#annfu_paga_fiori_avanzamento').text(data.status.message)
                    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top}, 'slow');

                },
                error: function (data) {
                    writeLog('ricordo-floreale', location.href, 'ERRORE invio form: ' + data);
                    jQuery('#annfu_ricordo_floreale_avanzamento').css({'color': '#c00'});
                    jQuery('#annfu_ricordo_floreale_avanzamento').text('Errore nell\'invio dell\'ordine. Si prega di riprovare.');

                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('Errore in ordine ricordo floreale', data);
                    }
                },
            });
        } else {
            jQuery('#annfu_ricordo_floreale_error').html(errors.join('<br/>'));
            if (typeof OpenReplay !== "undefined") {
                OpenReplay.event('Errore in ordine ricordo floreale', errors);
            }
        }
    }
});

jQuery('#annfu_paga_button').on('click', 'a', function () {
    writeLog('ricordo-floreale', location.href, 'click paypal: ' + jQuery(this).attr('href'));
});

jQuery('.annfu_testi_ricordi_floreali').on('click', function () {
    jQuery('#annfu_modal_testi_ricordi_floreali').modal('show');
});
jQuery('.annfu_copia_testo_ricordo_floreale').on('click', function () {
    jQuery('#annfu_ricordo_floreale_testo_biglietto').val(jQuery(this).prev().text());
    jQuery('#annfu_modal_testi_ricordi_floreali').modal('hide');
});

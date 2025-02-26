const regexCF = /^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i
const regexEmail = /[@\.]/i
const regexTelefono = /^\+?\d{9,13}$/i;

function controllaFioriStep1() {
    var errors = [];

    var fiore_id = jQuery('input[name=fiore_id]:checked').val();
    var mittente = jQuery('#annfu_fiore_mittente').val();
    var telefono = jQuery('#annfu_fiore_telefono').val();
    var mail = jQuery('#annfu_fiore_mail').val();

    if (mittente == '' && mail == '' && telefono == '') {
        errors.push("I campi mittente, email e telefono sono obbligatori");
    } else {
        if (!fiore_id) errors.push("Devi selezionare una composizione");
        if (mittente.length < 3) errors.push("Il mittente &egrave; obbligatorio (min 3 caratteri)");
        if (mail != "" && !regexEmail.test(mail)) errors.push("L'email non &egrave; corretta");
        if (!regexTelefono.test(telefono)) errors.push("Il numero di cellulare non è corretto");
    }

    if (errors.length == 0) {
        jQuery('#annfu_error').html('');
        if (jQuery('#annfu_fiore_testo_fascia').val() != '') {
            jQuery('.annfu_totale_testo_fascia').html('Testo da inserire nella fascia: ' + jQuery('#annfu_fiore_testo_fascia').val());
        }
        if (jQuery('#annfu_fiore_testo_biglietto').val() != '') {
            jQuery('.annfu_totale_testo_biglietto').html('Testo da inserire nel biglietto: ' + jQuery('#annfu_fiore_testo_biglietto').val());
        }
        jQuery('.annfu_totale_dati_mittente').html('<strong>Dati mittente</strong><br/>' + mittente + '<br/>' + 'Email: ' + mail + '<br/>Telefono: ' + telefono);
    } else {
        jQuery('#annfu_error').html(errors.join('<br/>'));
        jQuery('.annfu_totale_dati_mittente').html('');
    }

    return errors;
}

function controllaFioriStep2() {
    var errors = [];

    var nome = jQuery('#annfu_fiore_nome').val();
    var cognome = jQuery('#annfu_fiore_cognome').val();
    var codice_fiscale = jQuery('#annfu_fiore_codice_fiscale').val();
    var tipologia = jQuery('input[name=tipologia]:checked').val();
    var ragione_sociale = jQuery('#annfu_fiore_ragione_sociale').val();
    var partita_iva = jQuery('#annfu_fiore_partita_iva').val();
    var via = jQuery('#annfu_fiore_via').val();
    var cap = jQuery('#annfu_fiore_cap').val();
    var citta = jQuery('#annfu_fiore_citta').val();
    var codice_destinatario = jQuery('#annfu_fiore_codice_destinatario').val();
    var pec = jQuery('#annfu_fiore_pec').val();
    var modalita_pagamento = jQuery('input[name=modalita_pagamento]:checked').val();
    var privacy = jQuery('#annfu_privacy_fiori').prop('checked');

    if(tipologia == 1) { //persona fisica
        if (nome.length < 3) errors.push("Il nome &egrave; obbligatorio (min 3 caratteri)");
        if (cognome.length < 3) errors.push("Il cognome &egrave; obbligatorio (min 3 caratteri)");
        if (codice_fiscale.length != 16 || !regexCF.test(codice_fiscale)) errors.push("Il codice fiscale non è corretto");

        var pagatore = nome + ' ' + cognome + '<br/>Codice fiscale: ' + codice_fiscale;
    } else { //persona giuridica
        if (ragione_sociale.length < 3) errors.push("La ragione sociale &egrave; obbligatoria (min 3 caratteri)");
        if (codice_fiscale.length != 16 || partita_iva.length != 11) errors.push("Almeno uno tra codice fiscale e partita iva &egrave; obbligatorio");
        if (codice_destinatario.length < 6 || codice_destinatario.length > 7) errors.push("Il codice destinatario &egrave; obbligatorio (6 o 7 caratteri)");
        if (pec != "" && !regexEmail.test(pec)) errors.push("L'indirizzo PEC non &egrave; corretto");

        var pagatore = ragione_sociale + '<br/>Partita IVA: ' + partita_iva + '<br/>Codice fiscale: ' + codice_fiscale + '<br/>Codice destinatario:' + codice_destinatario + '<br/>PEC: ' + pec;
    }

    if (via.length < 3) errors.push("La via &egrave; obbligatoria");
    if (cap.length < 3) errors.push("Il cap &egrave; obbligatorio");
    if (citta.length < 3) errors.push("La città &egrave; obbligatoria");
    if (!modalita_pagamento) errors.push("Devi selezionare il metodo di pagamento");
    if (!privacy) errors.push("Devi accettare le condizioni della privacy");

    if (errors.length == 0) {
        jQuery('#annfu_error').html('');
        jQuery('#annfu_ordina').prop('disabled', false).removeClass('annfu_ordina_disabled');
        jQuery('.annfu_totale_dati_pagamento').html('<strong>Dati pagamento</strong><br/>' + pagatore + '<br/>Indirizzo: ' + via + ' ' + cap + ' ' + citta + '<br/>Modalità di pagamento: ' + modalita_pagamento);
        writeLog('fiori', location.href, 'compilato i dati di pagamento: ' + pagatore + ',' + via + ',' + cap + ',' + citta + ',' + modalita_pagamento);
    } else {
        jQuery('#annfu_error').html(errors.join('<br/>'));
        jQuery('#annfu_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
        jQuery('.annfu_totale_dati_pagamento').html('');
    }

    return errors;
}

function calcolaImporto() {
    var importo = jQuery('input[name=fiore_id]:checked').data('importo') || 0;
    var quantita = 1; //jQuery('#annfu_fiore_quantita').val() || 0;

    return importo * quantita;
}

jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    if (e.target.text == 'Fiori') {
        if (jQuery('.annfu_fiori_wrapper').height() > 410) {
            jQuery('.annfu_fiori_wrapper').addClass('scroll');
        }
    }
});

jQuery('.annfu_open_tab_fiori').on('click', function () {
    jQuery('a[data-tab=fiori]').click();
    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top - 100}, 'slow');
});

jQuery('.annfu_fiore_dettagli').on('click', function () {

    img_path = jQuery(this).parents('.annfu_fiore').find('img').attr('src');
    if(!img_path) {
        img_path = jQuery(this).parents('.annfu_fiore').find('.annfu_fiore_img_wrapper').css('background-image').replace("url(\"", "").replace("\")", "");
    }

    html = '<img src="' + img_path + '" class="annfu_fiore_grande" />';
    html += '<h2>' + jQuery(this).data('denominazione') + ' (&euro; ' + jQuery(this).data('importo') + ')</h2>';
    html += '<p class="annfu_text_left">' + jQuery(this).data('descrizione') + '</p>';
    html += '<br/><br/><small>In base alla stagione, i fiori potrebbero essere diversi da quelli rappresentati in figura</small>';

    jQuery('#annfu_modal_fiori .modal-body').html(html);
    jQuery('#annfu_modal_fiori').modal('show');
    writeLog('fiori', location.href, 'apertura dettaglio ' + jQuery(this).data('denominazione'));
});

jQuery('input[name=fiore_id]').on('click', function () {
    controllaFioriStep1();

    jQuery('.annfu_fiore').removeClass('checked');
    jQuery(this).parents('.annfu_fiore').addClass('checked');

    totale = calcolaImporto();
    jQuery('#annfu_totale_ordine').html(totale.toFixed(2).replace('.', ','));
    jQuery('.annfu_totale_ordine').html(totale.toFixed(2).replace('.', ','));
    jQuery('.annfu_totale_fiore').html('<strong>Composizione<br/></strong>' + jQuery(this).data('denominazione'));

    if (jQuery(this).data('testo') == 1) {
        var maxCaratteri = jQuery(this).data('max-caratteri');
        var rows = maxCaratteri < 60 ? 1 : 4;
        jQuery('#annfu_fiore_testo_fascia').attr('maxlength', maxCaratteri).attr('rows', rows);
        if (maxCaratteri < 99999) jQuery('#annfu_fiore_testo_fascia').attr('placeholder', 'Testo da inserire nella fascia (max ' + maxCaratteri + ' caratteri)');
        else jQuery('#annfu_fiore_testo_fascia').attr('placeholder', 'Testo da inserire nella fascia');
        jQuery('#annfu_fiore_testo_fascia_wrapper').show();
    } else {
        jQuery('#annfu_fiore_testo_fascia').val('');
        jQuery('#annfu_fiore_testo_fascia_wrapper').hide();
    }

    jQuery('html,body').animate({scrollTop: jQuery('#annfu_fiore_mittente').offset().top - 20}, 'slow');
    jQuery('#annfu_fiore_mittente').focus();

    writeLog('fiori', location.href, 'selezionato fiore dettaglio ' + jQuery(this).data('denominazione'));
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

jQuery('#annfu_procedi').on('click', function () {
    errors = controllaFioriStep1();
    console.log(errors);
    if(errors.length == 0) {
        jQuery('.annfu_ordine_step1').hide();
        jQuery('.annfu_ordine_step2').show();
    }
});

jQuery('#annfu_indietro').on('click', function () {
    jQuery('.annfu_ordine_step2').hide();
    jQuery('.annfu_ordine_step1').show();
});

jQuery('.annfu_ordine_step1 .fiore_controllato').on('blur', function () {
    controllaFioriStep1();
});

jQuery('.annfu_ordine_step2 .fiore_controllato').on('blur', function () {
    controllaFioriStep2();
});

jQuery('#annfu_privacy_fiori').on('click', function () {
    if (jQuery(this).is(':checked')) {
        jQuery('#annfu_error').html('');
        jQuery('#annfu_ordina').prop('disabled', false).removeClass('annfu_ordina_disabled');
    } else {
        jQuery('#annfu_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
    }
});

jQuery('#annfu_fiori_form').on('submit', function (e) {
    e.preventDefault();
    writeLog('fiori', location.href, 'invio form');

    if (typeof OpenReplay !== "undefined") {
        OpenReplay.event('click: ordine fiori');
    }

    if (confirm('Cliccando su ok confermi di voler proseguire con l\'ordine.\nProseguendo, riceverai successivamente una email di conferma.\nSe invece vuoi annullare l\'ordine, clicca su annulla.')) {
        var errors = controllaFioriStep2();

        if (errors.length == 0) {
            var token = jQuery('#annfu_fiore_token').val();
            var hash = jQuery('#annfu_fiore_hash').val();
            var fiore_id = jQuery('input[name=fiore_id]:checked').val();
            var mittente = jQuery('#annfu_fiore_mittente').val();
            var nome = jQuery('#annfu_fiore_nome').val();
            var cognome = jQuery('#annfu_fiore_cognome').val();
            var email = jQuery('#annfu_fiore_mail').val();
            var telefono = jQuery('#annfu_fiore_telefono').val();
            var testo_fascia = jQuery('#annfu_fiore_testo_fascia').val();
            var testo_biglietto = jQuery('#annfu_fiore_testo_biglietto').val();
            var note = jQuery('#annfu_fiore_note').val();
            var importo = jQuery('#annfu_totale_ordine').text().replace(',', '.');
            var tipologia = jQuery('input[name=tipologia]:checked').val();
            var ragione_sociale = jQuery('#annfu_fiore_ragione_sociale').val();
            var partita_iva = jQuery('#annfu_fiore_partita_iva').val();
            var codice_fiscale = jQuery('#annfu_fiore_codice_fiscale').val();
            var via = jQuery('#annfu_fiore_via').val();
            var cap = jQuery('#annfu_fiore_cap').val();
            var citta = jQuery('#annfu_fiore_citta').val();
            var codice_destinatario = jQuery('#annfu_fiore_codice_destinatario').val();
            var pec = jQuery('#annfu_fiore_pec').val();
            var modalita_pagamento = jQuery('input[name=modalita_pagamento]:checked').val();

            jQuery('#annfu_fiori_avanzamento').show();
            jQuery.ajax({
                url: "https://admin.annuncifunebri.it/api/v2/fiore_ordine",
                data: {
                    'token': token,
                    'hash': hash,
                    'fiore_id': fiore_id,
                    'mittente': mittente,
                    'nome': nome,
                    'cognome': cognome,
                    'email': email,
                    'telefono': telefono,
                    'testo_fascia': testo_fascia,
                    'testo_biglietto': testo_biglietto,
                    'note': note,
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
                        var note = jQuery('#annfu_fiore_note').val();
                        jQuery('#annfu_error').html('');
                        jQuery('#annfu_paga_fiori_avanzamento').css({'color': '#0e5422'})
                        jQuery('#annfu_ordina').prop('disabled', 'disabled').addClass('annfu_ordina_disabled');
                        jQuery('.annfu_indicazioni_fiori').hide();
                        jQuery('#accordion, #annfu_fiori_form_inner').remove().end();
                        jQuery('#annfu_fiori_avanzamento').text('')
                        if (note != '') {
                            jQuery('.annfu_totale_note').html('Note per la fioreria: ' + note)
                        }

                        if(modalita_pagamento == 'paypal') {
                            jQuery('#annfu_paga_button').html('<a href="' + data.data.ordine.paypal + '/' + importo + '" target="_blank" class="annfu_btn_paypal btn btn-default btn-block">paga con PayPal</a>');
                        }
                        jQuery('#annfu_paga').show();
                        jQuery('.annfu_annuncio_wrapper, #annfu_tabs, .annfu_fondo_form_cordogli, .annfu_foto_cordogli_wrapper').hide();

                        writeLog('fiori', location.href, 'SUCCESSO invio form');
                    } else {
                        jQuery('#annfu_fiori_avanzamento').css({'color': '#c00'})
                        jQuery('#annfu_fiori_avanzamento').text(data.status.message)
                        writeLog('fiori', location.href, 'ERRORE invio form: ' + data.status.message);
                    }
                    jQuery('#annfu_paga_fiori_avanzamento').text(data.status.message)
                },
                error: function (data) {
                    writeLog('fiori', location.href, 'ERRORE invio form: ' + data);
                    jQuery('#annfu_fiori_avanzamento').css({'color': '#c00'});
                    jQuery('#annfu_fiori_avanzamento').text('Errore nell\'invio dell\'ordine. Si prega di riprovare.');

                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('Errore in ordine fiori', data);
                    }
                },
            });
        } else {
            jQuery('#annfu_error').html(errors.join('<br/>'));

            if (typeof OpenReplay !== "undefined") {
                OpenReplay.event('Errore in ordine fiori', errors);
            }
        }
    }
});

jQuery('#annfu_paga_button').on('click', 'a', function () {
    writeLog('fiori', location.href, 'click paypal: ' + jQuery(this).attr('href'));
    if (typeof OpenReplay !== "undefined") {
        OpenReplay.event('click: paypal');
    }
});

jQuery('.annfu_open_tab_fiori').on('click', function () {
    jQuery('a[data-tab=fiori]').click();
    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top - 100}, 'slow');
});

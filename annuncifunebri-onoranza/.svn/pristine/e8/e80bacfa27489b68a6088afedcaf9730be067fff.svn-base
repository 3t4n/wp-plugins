//foto cordogli
//invio della foto
jQuery('#annfu_form_foto form').on('submit', function (e) {
    e.preventDefault();
    var error = "";

    var files = jQuery('#annfu_foto_files').val();
    var token = jQuery('#annfu_foto_token').val();
    var hash = jQuery('#annfu_foto_hash').val();
    var nome = jQuery('#annfu_foto_nome').val();
    var telefono = jQuery('#annfu_foto_telefono').val();
    var didascalie;
    didascalie = {};

    jQuery('textarea.didascalia').each(function () {
        didascalie[jQuery(this).data('file')] = jQuery(this).val();
    });

    if (typeof OpenReplay !== "undefined") {
        OpenReplay.event('click: invio foto cordoglio');
    }

    Cookies.set('cordoglio_nome', nome, {expires: 365});

    if (nome == "") error += "Il nome &egrave; obbligatorio<br/>";
    var reTelefono = /^\+?\d{9,13}$/gi;
    if (!reTelefono.test(telefono)) error += "Il numero di cellulare non è corretto<br/>";
    if (files == "") error += "Devi caricare almeno una immagine<br/>";
    if (!jQuery('#annfu_foto_dati_personali').is(':checked')) error += "Il trattamento dei dati personali &egrave; obbligatorio<br/>";
    if (error != "") {
        jQuery('#annfu_foto_errori').html(error);
    } else {
        jQuery('#annfu_foto_errori, #annfu_foto_successo').html('');
        jQuery('#annfu_loading').removeClass('annfu_none');

        jQuery.ajax({
            url: "https://api.annuncifunebri.it/v2/cordogli/foto",
            data: {
                token: token,
                hash: hash,
                nome: nome,
                telefono: telefono,
                files: files,
                didascalie: didascalie,
                referrer: window.location.href
            },
            type: "POST",
            crossDomain: true,
            dataType: 'jsonp',
            success: function (data) {
                if ('testo' in data) {
                    jQuery('#annfu_foto_successo').html(data.testo).removeClass('annfu_none');
                    jQuery('#annfu_foto_cordoglio .dz-preview').remove().end();
                    jQuery('#annfu_foto_files').val('');
                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('Foto cordoglio salvato su AF in attesa di verifica pin', data);
                    }
                } else {
                    jQuery('#annfu_foto_errori').html('Non &egrave; stato possibile inviare le foto. Riprovare tra qualche minuto');

                    if (typeof OpenReplay !== "undefined") {
                        OpenReplay.event('Errore in foto cordoglio', data);
                    }
                }
            },
            error: function (data) {
                Cookies.set('foto-cordoglio.error', 'Non &egrave; stato possibile inviare le foto. Riprovare tra qualche minuto');
                // location.reload(true);
                if (typeof OpenReplay !== "undefined") {
                    OpenReplay.event('Errore in foto cordoglio', data);
                }
            },
        });

        jQuery('#annfu_loading').addClass('annfu_none');
    }
    return false;
});

//upload foto
Dropzone.autoDiscover = false;
var dz = jQuery("#annfu_foto_cordoglio").dropzone({
    url: "https://admin.annuncifunebri.it/api/v2/cordogli/foto/upload",
    headers: {
        'Cache-Control': null,
        'X-Requested-With': null,
    },
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    maxFilesize: 10,
    params: {
        annuncio: jQuery('#annfu_slug').data('annuncio')
    },
    init: function () {
        this.on('addedfile', function (file) {
            jQuery('#annfu_foto_invio').prop('disabled', true);
            jQuery('#annfu_foto_invio').val('Attendi il caricamento');
            jQuery('#annfu_foto_invio').addClass('annfu_disabled');
        });
        this.on('removedfile', function (file) {
            var files = jQuery('#annfu_foto_files').val();
            files = files == '' ? [] : files.split(',');
            var index = files.indexOf(jQuery('#annfu_foto_hash').val() + '-' + file.name);
            if (index > -1) {
                files.splice(index, 1);
            }
            files = files.join(',');
            jQuery('#annfu_foto_files').val(files);
        });
        this.on('complete', function (file) {
            jQuery('#annfu_foto_invio').prop('disabled', false);
            jQuery('#annfu_foto_invio').val('Invia');
            jQuery('#annfu_foto_invio').removeClass('annfu_disabled');
        });
    },
    renameFile: function (file) {
        return jQuery('#annfu_foto_hash').val() + '-' + file.name
    },
    success: function (file) {
        var files = jQuery('#annfu_foto_files').val();
        files = files == '' ? [] : files.split(',');
        files.push(file.upload.filename);
        files = files.join(',');//.substr(1);
        jQuery('#annfu_foto_files').val(files);
        jQuery(file.previewElement).find('.dz-image').append('<textarea data-file="' + file.upload.filename + '" class="didascalia" rows="2" maxlength="60" placeholder="Didascalia: max 60 caratteri"></textarea>');
    },
    dictDefaultMessage: '',
    dictRemoveFile: '<i class="fa fa-trash-o"></i> Elimina',
    dictCancelUpload: 'Annulla upload',
    dictUploadCanceled: 'Upload annullato',
    dictCancelUploadConfirmation: 'Sei sicuro di voler annullare l\'upload?',
    dictFileTooBig: 'Il peso del file è troppo elevato ({{filesize}}Mb). Max {{maxFilesize}}Mb'
});

if (jQuery('.annfu_foto_cordogli').length) {
    var imgsCount = jQuery('.annfu_foto_cordogli img').length;
    var imgsWidth = 0;
    jQuery('.annfu_foto_cordogli img').each(function () {
        imgsWidth += jQuery(this).width();
    });
    var containerImgsWidth = jQuery('.annfu_foto_cordogli').width();
    jQuery('.annfu_foto_cordogli').slick({
        mobileFirst: true,
        dots: imgsWidth < containerImgsWidth ? false : true,
        infinite: imgsWidth < containerImgsWidth ? false : true,
        speed: 300,
        slidesToShow: imgsWidth < containerImgsWidth ? imgsCount : 1,
        variableWidth: true,
        autoplay: imgsWidth < containerImgsWidth ? false : true,
        autoplaySpeed: 2000,
    });

    jQuery(".annfu_foto_cordogli a").colorbox({rel: "fc1", maxWidth: "90%", maxHeight: "90%"});
}

jQuery('.annfu_open_tab_foto').on('click', function () {
    jQuery('a[data-tab=foto]').click();
    jQuery('html,body').animate({scrollTop: jQuery('#annfu_form_cordoglio_wrapper').offset().top - 100}, 'slow');
});

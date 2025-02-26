<div class="annfu_form_cordoglio_wrapper px-2 px-lg-0">
    <h4 class="text-center">Scrivi il tuo messaggio di cordoglio</h4>

    <p class="mb-5 text-center">
        <span class="annfu_cordoglio_gratis">Lascia <strong>gratuitamente</strong> un messaggio di cordoglio, sar&agrave; nostra cura consegnarlo ai congiunti di <?php echo $annuncio['nominativo'] ?>.<br/></span>
        <span class="annfu_cordsogli_stampati">Tutti i pensieri verranno anche <strong>stampati e consegnati ai congiunti</strong> in ricordo.</span>
    </p>

    <div id="annfu_form_cordoglio">
        <div id="annfu_errori" class="annfu_error"></div>
        <form action="." method="post">
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>" id="annfu_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_hash"/>
            <div class="row">
                <div class="col-12">
                    <div class="form-group annfu_testo_wrapper text-center">
                        <textarea name="testo" id="annfu_testo" class="form-control controllato"></textarea>
                        <label for="testo">testo del messaggio</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group annfu_nome_wrapper text-center">
                        <input type="text" name="nome" id="annfu_nome" class="form-control controllato" required>
                        <label for="nome">nome e cognome / ragione sociale*</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group annfu_mail_wrapper text-center">
                        <input type="text" name="mail" id="annfu_mail" class="form-control controllato">
                        <label for="email">e-mail*</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group annfu_telefono_wrapper text-center">
                        <input type="text" name="telefono" id="annfu_telefono" class="form-control controllato" required>
                        <label for="telefono">cellulare*</label>
                    </div>
                </div>
            </div>
            <div class="form-group annfu_privacy_wrapper">
                <label class="annfu_label_privacy">
                    <input type="checkbox" class="annfu_dati_personali" class="annfu_checkbox"/>
                    Dichiaro di aver letto attentamente e compreso il contenuto della <a class="annfu_privacy annfu_pointer">Informativa sul
                        trattamento dei dati personali</a> relativamente alle finalità perseguite tramite l'acquisizione dei dati personali necessari
                    all'esecuzione delle prestazioni oggetto del servizio erogato.
                </label>
            </div>
            <div class="form-group annfu_visibile_wrapper">
                <div class="text-center"><strong>Inoltre</strong></div>
                <div>In merito alla diffusione dei miei dati personali, relativamente alla possibilità di pubblicare il mio messaggio ed i miei dati nella
                    sezione dedicata del presente sito web</div>
                <div class="mt-3">
                    <label for="annfu_visibile" class="mr-5">
                        <input type="radio" name="visibile" value="1" id="annfu_visibile" class="annfu_checkbox"/> Do il consenso
                    </label>
                    <label for="annfu_non_visibile">
                        <input type="radio" name="visibile" value="0" id="annfu_non_visibile" class="annfu_checkbox"/> Nego il consenso
                    </label>
                </div>
            </div>
            <input type="hidden" name="recapito"/>
            <div class="form-group py-2">
                <input type="submit" name="invio" value="invia" id="annfu_invio" class="annfu_invio btn btn-default my-5"/>
            </div>
            <div class="clearfix"></div>
            <div id="annfu_successo" class="annfu_success annfu_none"></div>
        </form>

        <p class="mb-4">I messaggi di cordoglio saranno visibili dopo la verifica<?php echo in_array($annuncio['onoranzaFunebre']['slug'], ANNFU_GRUPPO_CONCORDIA_COF) ? ' di COF Centro Onoranze Funebri' : ' di Concordia s.r.l.' ?></p>
    </div>
</div>

<template id="annfu_grazie">
    <div class="annfu_grazie">
        <h4>Grazie per aver utilizzato il servizio</h4>
        <p>Il tuo messaggio verrà stampato e consegnato alla famiglia di <?php echo $annuncio['nominativo'] ?>.</p>
        <p>Se non lo vedi comparire subito, non preoccuparti, ci stiamo lavorando; <strong>verrà pubblicato al più presto</strong>.</p>
        <p>Se vuoi scrivere un altro cordoglio, <a
                    href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug']; ?>">clicca
                qui per inserirlo</a>.</p>
    </div>
</template>
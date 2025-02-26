<div class="annfu_form_cordoglio_wrapper">
    <h4>Lascia il tuo messaggio di cordoglio alla famiglia</h4>

    <p>
        <span class="annfu_cordoglio_gratis">Lascia <strong>gratuitamente</strong> un messaggio di cordoglio, sar&agrave; nostra cura consegnarlo ai congiunti di <?php echo $annuncio['nominativo'] ?>.<br/></span>
        <span class="annfu_cordsogli_stampati">Tutti i pensieri verranno anche <strong>stampati e consegnati ai congiunti</strong> in ricordo.</span>
    </p>

    <p>Se non sai cosa scrivere, o non trovi le parole adatte, clicca solo sul pulsante invia e verr&agrave; inviato gratuitamente un avviso alla
        famiglia. Altrimenti <a class="annfu_testi annfu_pointer">clicca qui</a> e troverai una lista di testi da cui prendere spunto.</p>
    <div id="annfu_form_cordoglio">
        <div id="annfu_errori" class="annfu_error"></div>
        <form action="." method="post">
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>" id="annfu_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_hash"/>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group annfu_nome_wrapper">
                        <input type="text" name="nome" id="annfu_nome" class="form-control controllato" required
                               placeholder="Nome e Cognome / Ragione Sociale">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group annfu_mail_wrapper">
                        <input type="text" name="mail" id="annfu_mail" class="form-control controllato"
                               placeholder="Email (consigliato e visibile solo dalla famiglia)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group annfu_telefono_wrapper">
                        <input type="text" name="telefono" id="annfu_telefono" class="form-control controllato" required
                               placeholder="Cellulare (visibile solo dalla famiglia)">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group annfu_recapito_wrapper">
                        <input type="text" name="recapito" id="annfu_recapito" class="form-control controllato"
                               placeholder="Recapito (per un eventuale ringraziamento dalla famiglia)">
                    </div>
                </div>
            </div>
            <div class="form-group annfu_testo_wrapper">
                <textarea name="testo" id="annfu_testo" class="form-control controllato" placeholder="Testo"></textarea>
            </div>
            <div class="form-group annfu_visibile_wrapper">
                <label><input type="checkbox" name="visibile" value="1" id="annfu_visibile" class="annfu_checkbox"/>
                    Desidero che il cordoglio sia visibile solo alla famiglia</label>
            </div>
            <div class="form-group annfu_privacy_wrapper">
                <label class="annfu_label_privacy"><input type="checkbox" class="annfu_dati_personali" class="annfu_checkbox"/> Dichiaro di aver preso
                    visione e compreso l'informativa sul trattamento dei miei dati personali (<a class="annfu_privacy annfu_pointer">clicca qui per
                        maggiori dettagli</a>).</label>
            </div>
            <div class="form-group">
                <input type="submit" name="invio" value="invia" id="annfu_invio" class="annfu_invio btn btn-default"/>
            </div>
            <div class="clearfix"></div>
            <div id="annfu_successo" class="annfu_success annfu_none"></div>
        </form>
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
<div class="annfu_form_foto_cordoglio_wrapper">

    <h4 id="annfu_titolo_form_foto_cordoglio" class="text-center">Invia una foto alla famiglia per
        ricordare <?php echo $annuncio['nominativo'] ?></h4>
    <p class="annfu_paragrafo_form_foto_cordoglio">La famiglia deciderà poi se renderla visible su questa pagina.<br/><strong>Attenzione!</strong> Autenticazione richiesta. Inserisci un numero
        di
        cellulare per ricevere il link via <strong>Whatsapp</strong>.</p>
    <div id="annfu_form_foto" class="annfu_form_cordoglio">
        <div id="annfu_foto_errori" class="annfu_error"></div>
        <form action="." method="post">
            <span id="annfu_foto_slug" data-annuncio="<?php echo $annuncio['slug'] ?>"></span>
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>" id="annfu_foto_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_foto_hash"/>
            <input type="hidden" name="files" value="" id="annfu_foto_files"/>
            <div class="form-group">
                <input type="text" name="nome" id="annfu_foto_nome" class="form-control controllato" placeholder="Nome e Cognome / Ragione Sociale"
                       value="<?php echo isset($_COOKIE['cordoglio_nome']) ? htmlentities($_COOKIE['cordoglio_nome']) : "" ?>" required>
            </div>
            <div class="form-group">
                <input type="text" name="telefono" id="annfu_foto_telefono" class="form-control controllato"
                       placeholder="Cellulare (obbligatorio, visibile solo alla famiglia)"
                       value="<?php echo isset($_COOKIE['cordoglio_telefono']) ? htmlentities($_COOKIE['cordoglio_telefono']) : "" ?>" required>
            </div>
            <div class="form-group">
                <div id="annfu_foto_cordoglio" class="dropzone"></div>
                <div class="dz-didascalia">
                    <small>Trascina nell'area soprastante i file da caricare o clicca su un punto qualsiasi nell'area colorata. Una volta caricato il
                        file, sarà possibile inserire una didascalia per ogni foto. Max 10Mb per ogni foto</small>
                </div>
            </div>
            <div class="form-group">
                <label class="annfu_label_privacy"><input type="checkbox" id="annfu_foto_dati_personali" class="annfu_dati_personali annfu_checkbox"/>
                    Acconsento al
                    trattamento dei miei dati personali (<a class="annfu_privacy annfu_pointer">clicca qui per maggiori dettagli</a>).</label>
            </div>
            <div class="form-group">
                <input type="submit" name="invio" value="invia" id="annfu_foto_invio" class="annfu_invio btn btn-default mb-4"
                       title="Per poter inviare il cordoglio devi acconsentire al trattamento dei dati personali"/>
            </div>
            <div class="clearfix"></div>
            <div id="annfu_foto_successo" class="annfu_success annfu_none"></div>
        </form>
    </div>
</div>

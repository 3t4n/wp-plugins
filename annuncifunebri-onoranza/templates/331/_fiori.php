<?php if ($countFiori > 0): ?>
    <div class="annfu_fiori">
        <form action="." method="post" id="annfu_fiori_form">
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>" id="annfu_fiore_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_fiore_hash"/>

            <div id="annfu_fiori_form_inner">
                <h4>Ordina una composizione floreale</h4>
                <p class="mb-3">La perdita di una persona cara è un momento estremamente delicato e molto difficile da
                    affrontare e, il modo migliore per porgere le proprie condoglianze in maniera semplice e discreta, è
                    regalando dei fiori.<br/>I fiori per funerali e condoglianze portano con sé un messaggio di
                    cordoglio estremamente riguardoso che dice ti sono vicino.</p>
                <p><strong>Scegli tra le composizioni disponibili quella che più preferisci, al resto ci pensiamo noi.</strong></p>

                <div id="annfu_error" class="annfu_error"></div>

                <div class="annfu_fiori_wrapper row">
                    <?php foreach ($annuncio['fiori'] as $k => $v): ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="p-2 annfu_fiore">
                                <input type="radio" name="fiore_id" id="fiore_<?php echo $v['id'] ?>"
                                       value="<?php echo $v['id'] ?>"
                                       data-denominazione="<?php echo $v['denominazione'] ?>"
                                       data-importo="<?php echo number_format($v['importo'], 2) ?>"
                                       data-testo="<?php echo $v['testo_personalizzato'] == 1 ? 1 : 0; ?>"
                                       data-max-caratteri="<?php echo $v['max_caratteri'] ? $v['max_caratteri'] : 99999; ?>"/>
                                <div class="mb-2 annfu_fiore_img_wrapper"
                                     style="background-image:url(<?php echo $v['foto'] ?>);">
                                    <a class="pointer annfu_fiore_dettagli"
                                       data-denominazione="<?php echo $v['denominazione'] ?>"
                                       data-descrizione="<?php echo $v['descrizione'] ?>"
                                       data-importo="<?php echo number_format($v['importo'], 2, ',', '') ?>"
                                       data-target=".annfu_modal_fiori" data-toggle="modal"><i
                                                class="fa fa-search-plus"></i>
                                        dettagli</a>
                                </div>
                                <h5><?php echo $v['denominazione'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong class="annfu_fiore_prezzo">&euro;<?php echo number_format($v['importo'], 2, ',', '') ?></strong>
                                    <label class="annfu_fiore_scegli" for="fiore_<?php echo $v['id'] ?>">Scegli</label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 mt-3">
                        <div id="annfu_fiore_testo_fascia_wrapper" class="form-group">
                            <input type="text" name="testo_fascia" id="annfu_fiore_testo_fascia"
                                   class="fiore_controllato form-control" placeholder="Testo da inserire nella fascia"/>
                        </div>
                    </div>
                    <div class="col-12 mt-2 mb-3 annfu_ricordo_floreale_disclaimer">
                        Le foto dei "Ricordi floreali" hanno carattere puramente indicativo e possono variare senza alcun obbligo di preavviso.
                    </div>
                </div>

                <h5 class="mt-4 mb-2">Inserisci i tuoi dati</h5>
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="nome" id="annfu_fiore_nome"
                                   class="fiore_controllato form-control" placeholder="Nome" required/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="cognome" id="annfu_fiore_cognome"
                                   class="fiore_controllato form-control" placeholder="Cognome" required/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="telefono" id="annfu_fiore_telefono"
                                   class="fiore_controllato form-control" placeholder="Telefono" required/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="mail" id="annfu_fiore_mail"
                                   class="fiore_controllato form-control" placeholder="Email"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="annfu_fiore_testo_biglietto_wrapper" class="form-group">
                            <textarea name="testo_biglietto" id="annfu_fiore_testo_biglietto"
                                      class="fiore_controllato form-control"
                                      rows="3" placeholder="Testo per il biglietto (facoltativo)"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div id="annfu_fiore_note_wrapper" class="form-group">
                            <textarea name="note" id="annfu_fiore_note" class="form-control" rows="3"
                                      placeholder="Note per la fioreria (es. consegna in un determinato luogo e giorno/ora)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="annfu_totale_riepilogo">
                    <h4 class="mt-4 mb-2">Ordina</h4>
                    <div class="annfu_totale_fiore">Seleziona prima un fiore per completare l'ordine</div>
                    <div class="annfu_totale_testo_fascia"></div>
                    <div class="annfu_totale_testo_biglietto"></div>
                    <div class="annfu_totale_dati"></div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <div class="annfu_fiori_totale">
                                Totale ordine: &euro;<span class="annfu_totale_ordine">0,00</span>
                            </div>
                            <label class="annfu_label_privacy">
                                <input type="checkbox" id="annfu_privacy_fiori"
                                       class="annfu_dati_personali_fioriå annfu_checkbox"/>
                                Acconsento al trattamento dei miei dati personali
                            </label>
                            (<a class="annfu_privacy annfu_pointer">clicca qui per maggiori dettagli</a>).
                        </div>
                        <input type="submit" name="invio" value="ordina" id="annfu_ordina"
                               class="annfu_invio annfu_ordina_disabled btn btn-default" disabled="disabled"/>
                    </div>
                    <div id="annfu_fiori_avanzamento">Stiamo processando l'ordine...</div>
                    <small class="annfu_text_justify annfu_indicazioni_fiori">I fiori verranno consegnati nel luogo di
                        esposizione della salma (casa funeraria, abitazione o obitorio).</small>
                </div>
            </div>
            <div id="annfu_paga">
                <h4 class="mb-3">Ordine completato</h4>
                <div class="annfu_totale_fiore"></div>
                <div class="annfu_totale_testo_fascia"></div>
                <div class="annfu_totale_testo_biglietto"></div>
                <div class="annfu_totale_dati"></div>
                <div class="annfu_totale_note"></div>
                <div class="annfu_fiori_totale">
                    Totale da pagare: &euro;<span class="annfu_totale_ordine">0,00</span>
                </div>
                <br class="clear">
                <div id="annfu_paga_fiori_avanzamento" class="my-3"></div>
                <div id="annfu_paga_button"></div>
                <div id="annfu_paga_modalita_pagamento"></div>
            </div>

            <span id="annfu_totale_ordine" class="annfu_none"></span>

        </form>

    </div>
<?php endif; ?>

<?php if ($countRicordiFloreali > 0): ?>
    <div class="annfu_ricordi_floreali">
        <form action="." method="post" id="annfu_ricordo_floreale_form">
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>"
                   id="annfu_ricordo_floreale_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_ricordo_floreale_hash"/>

            <div id="annfu_ricordo_floreale_form_inner">
                <h4>Ricordo floreale</h4>
                <p class="mb-3">La perdita di una persona cara è un momento estremamente delicato e molto difficile da
                    affrontare e, il modo migliore per porgere le proprie condoglianze in maniera semplice e discreta, è
                    regalando dei fiori.<br/>I fiori per funerali e condoglianze portano con sé un messaggio di
                    cordoglio estremamente riguardoso che dice ti sono vicino.</p>
                <p><strong>Scegli tra le composizioni disponibili quella che più preferisci, al resto ci pensiamo
                        noi.</strong></p>
                <div class="annfu_ricordo_floreale_wrapper row">
                    <?php foreach ($annuncio['ricordiFloreali'] as $k => $v): ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="p-2 annfu_ricordo_floreale">
                                <label class="annfu_ricordo_floreale_scegli"
                                       for="ricordo_floreale_<?php echo $v['id'] ?>">
                                    <input type="radio" name="ricordo_floreale_id"
                                           id="ricordo_floreale_<?php echo $v['id'] ?>"
                                           value="<?php echo $v['id'] ?>"
                                           data-denominazione="<?php echo $v['denominazione'] ?>"
                                           data-importo="<?php echo number_format($v['importo'], 2) ?>"/>
                                    <div class="mb-2 annfu_ricordo_floreale_img_wrapper"
                                         style="background-image:url(<?php echo $v['foto'] ?>);">
                                        <div class="annfu_ricordo_floreale_dettagli d-flex justify-content-between align-items-center">
                                            <a class="pointer"
                                               data-denominazione="<?php echo $v['denominazione'] ?>"
                                               data-descrizione="<?php echo $v['descrizione'] ?>"
                                               data-importo="<?php echo number_format($v['importo'], 2, ',', '') ?>"
                                               data-target=".annfu_modal_ricordo_floreale" data-toggle="modal">
                                                <i class="fa fa-search-plus"></i> dettagli
                                            </a>
                                        </div>
                                    </div>
                                    <h5><?php echo $v['denominazione'] ?></h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="annfu_ricordo_floreale_prezzo">&euro;<?php echo number_format($v['importo'], 2, ',', '') ?></strong>
                                    </div>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-2 mb-3 annfu_ricordo_floreale_disclaimer">
                    Le foto dei "Ricordi floreali" hanno carattere puramente indicativo e possono variare senza alcun
                    obbligo di preavviso.
                </div>

                <h5 class="mt-4 mb-2">Inserisci i tuoi dati</h5>
                <div id="annfu_ricordo_floreale_error" class="annfu_error my-3"></div>

                <div class="annfu_ordine_step1">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="mittente" id="annfu_ricordo_floreale_mittente"
                                       class="ricordo_floreale_controllato form-control"
                                       placeholder="Mittente “es. Famiglia Rossi”" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form-group">
                                <input type="text" name="telefono" id="annfu_ricordo_floreale_telefono"
                                       class="ricordo_floreale_controllato form-control" placeholder="Telefono"
                                       required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="form-group">
                                <input type="text" name="mail" id="annfu_ricordo_floreale_mail"
                                       class="ricordo_floreale_controllato form-control" placeholder="Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="annfu_ricordo_floreale_testo_biglietto_wrapper" class="form-group">
                            <textarea name="testo_biglietto" id="annfu_ricordo_floreale_testo_biglietto"
                                      class="ricordo_floreale_controllato form-control"
                                      rows="3"
                                      placeholder="Testo per il biglietto (facoltativo, max 120 caratteri)"></textarea>
                                <p>Se non sai cosa scrivere, o non trovi le parole adatte, <a
                                            class="annfu_testi_ricordi_floreali annfu_pointer">clicca qui</a> e troverai
                                    una
                                    lista di testi da cui prendere spunto.</p>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a id="annfu_ricordo_floreale_procedi" class="btn btn-default">Procedi</a>
                        </div>
                    </div>
                </div>
                <div class="annfu_ordine_step2 annfu_none">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mr-3">
                                    <input type="radio" name="tipologia" value="1"
                                           id="annfu_ricordo_floreale_tipologia_1"
                                           class="ricordo_floreale_controllato" checked/> Persona fisica
                                </label>
                                <label>
                                    <input type="radio" name="tipologia" value="2"
                                           id="annfu_ricordo_floreale_tipologia_2"
                                           class="ricordo_floreale_controllato"/> Persona giuridica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_ricordo_floreale_dati_pagamento">
                        <div class="col-12 col-md-6 col-xl-4 annfu_persona_f">
                            <div class="form-group">
                                <input type="text" name="nome" id="annfu_ricordo_floreale_nome"
                                       class="ricordo_floreale_controllato form-control" placeholder="Nome"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 annfu_persona_f">
                            <div class="form-group">
                                <input type="text" name="cognome" id="annfu_ricordo_floreale_cognome"
                                       class="ricordo_floreale_controllato form-control" placeholder="Cognome"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-5 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="ragione_sociale" id="annfu_ricordo_floreale_ragione_sociale"
                                       class="ricordo_floreale_controllato form-control" placeholder="Ragione sociale"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="partita_iva" id="annfu_ricordo_floreale_partita_iva"
                                       class="ricordo_floreale_controllato form-control" placeholder="Partita IVA"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="form-group">
                                <input type="text" name="codice_fiscale" id="annfu_ricordo_floreale_codice_fiscale"
                                       class="ricordo_floreale_controllato form-control" placeholder="Codice fiscale"/>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_ricordo_floreale_dati_pagamento">
                        <div class="col-12 col-xl-5">
                            <div class="form-group">
                                <input type="text" name="via" id="annfu_ricordo_floreale_via"
                                       class="ricordo_floreale_controllato form-control" placeholder="Via"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-xl-2">
                            <div class="form-group">
                                <input type="text" name="cap" id="annfu_ricordo_floreale_cap"
                                       class="ricordo_floreale_controllato form-control" placeholder="Cap"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-xl-5">
                            <div class="form-group">
                                <input type="text" name="citta" id="annfu_ricordo_floreale_citta"
                                       class="ricordo_floreale_controllato form-control" placeholder="Città"/>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_ricordo_floreale_dati_pagamento">
                        <div class="col-12 col-md-5 col-xl-3 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="codice_destinatario"
                                       id="annfu_ricordo_floreale_codice_destinatario"
                                       class="ricordo_floreale_controllato form-control"
                                       placeholder="codice destinatario"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-xl-9 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="pec" id="annfu_ricordo_floreale_pec"
                                       class="ricordo_floreale_controllato form-control" placeholder="PEC"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="d-block">Modalità di pagamento</label>
                                <?php if ($annuncio['onoranzaFunebre']['modalitaPagamentoFiori']): ?>
                                    <?php $metodiPagamento = explode("\n", $annuncio['onoranzaFunebre']['modalitaPagamentoFiori']); ?>
                                    <?php foreach ($metodiPagamento as $v): ?>
                                        <?php list($metodo, $descrizione) = explode("|", $v) ?>
                                        <label class="d-block d-xl-inline mr-xl-3">
                                            <input type="radio" name="modalita_pagamento" value="<?php echo $metodo ?>"
                                                   class="ricordo_floreale_controllato"/>
                                            <?php echo $descrizione ?>
                                        </label>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="annfu_totale_riepilogo">
                        <h4 class="mt-4 mb-2">Ordina</h4>
                        <div class="annfu_riepilogo_ricordo_floreale_composizione">Seleziona prima un ricordo floreale
                            per
                            completare l'ordine
                        </div>
                        <div class="annfu_riepilogo_ricordo_floreale_testo_biglietto"></div>
                        <div class="annfu_riepilogo_ricordo_floreale_dati"></div>
                        <div class="d-md-flex justify-content-between align-items-center mb-4">
                            <div>
                                <div class="annfu_ricordo_floreale_totale">
                                    Totale ordine: &euro;<span
                                            class="annfu_riepilogo_ricordo_floreale_totale_ordine">0,00</span>
                                </div>
                                <label class="annfu_label_privacy">
                                    <input type="checkbox" id="annfu_privacy_ricordo_floreale"
                                           class="annfu_dati_personali_ricordo_floreale annfu_checkbox"/>
                                    Acconsento al trattamento dei miei dati personali
                                </label>
                                (<a class="annfu_privacy annfu_pointer">clicca qui per maggiori dettagli</a>).
                            </div>
                            <div>
                                <a id="annfu_ricordo_floreale_indietro" class="btn btn-default">Indietro</a>
                                <input type="submit" name="invio" value="ordina" id="annfu_ricordo_florale_ordina"
                                       class="mt-3 mt-md-0 annfu_invio annfu_ordina_disabled btn btn-default"
                                       disabled="disabled"/>
                            </div>
                        </div>
                        <div id="annfu_ricordo_floreale_avanzamento">Stiamo processando l'ordine...</div>
                    </div>
                </div>
            </div>
            <div id="annfu_ricordo_floreale_paga">
                <h4 class="mb-3">Grazie per aver effettuato l'ordine</h4>
                <div class="annfu_riepilogo_ricordo_floreale_composizione"></div>
                <div class="annfu_riepilogo_ricordo_floreale_testo_biglietto"></div>
                <div class="annfu_riepilogo_ricordo_floreale_dati_mittente"></div>
                <div class="annfu_riepilogo_ricordo_floreale_dati_pagamento"></div>
                <div class="mt-4 annfu_riepilogo_ricordo_floreale_totale">
                    Totale da pagare: &euro;<span class="annfu_riepilogo_ricordo_floreale_totale_ordine">0,00</span>
                </div>
                <br class="clear">
                <div id="annfu_paga_ricordo_floreale_avanzamento" class="my-3"></div>
                <div id="annfu_paga_button"></div>
                <div>
                    <a href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug'] . '/'; ?>">Ritorna
                        all'annuncio</a>
                </div>
            </div>

            <span id="annfu_riepilogo_ricordo_floreale_totale_ordine" class="annfu_none"></span>

        </form>

    </div>

    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_modal-ricordi-floreali.php') ?>
    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_modal-testi-ricordi-floreali.php') ?>
<?php endif; ?>

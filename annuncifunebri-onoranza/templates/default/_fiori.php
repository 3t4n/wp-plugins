<?php if ($countFiori > 0): ?>
    <div class="annfu_fiori">
        <form action="." method="post" id="annfu_fiori_form">
            <input type="hidden" name="token" value="<?php echo $metaData['token'] ?>" id="annfu_fiore_token"/>
            <input type="hidden" name="hash" value="<?php echo $annuncio['hash'] ?>" id="annfu_fiore_hash"/>

            <div id="annfu_fiori_form_inner">
                <h4>Ordina una composizione floreale</h4>
                <p class="mb-3">Scegli la tua composizione floreale da inviare alla famiglia in segno di vicinanza, noi
                    penseremo a consegnarla presso la casa funeraria o il luogo dove riposa la salma.</p>

                <p><strong>Scegli una composizione</strong></p>

                <div class="annfu_fiori_wrapper row">
                    <?php foreach ($annuncio['fiori'] as $k => $v): ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="p-2 annfu_fiore">
                                <label class="annfu_fiore_scegli" for="fiore_<?php echo $v['id'] ?>">
                                    <input type="radio" name="fiore_id" id="fiore_<?php echo $v['id'] ?>"
                                           value="<?php echo $v['id'] ?>"
                                           data-denominazione="<?php echo htmlentities($v['denominazione']) ?>"
                                           data-importo="<?php echo number_format($v['importo'], 2) ?>"
                                           data-testo="<?php echo $v['testo_personalizzato'] == 1 ? 1 : 0; ?>"
                                           data-max-caratteri="<?php echo $v['max_caratteri'] ? $v['max_caratteri'] : 99999; ?>"/>
                                    <div class="mb-2 annfu_fiore_img_wrapper"
                                         style="background-image:url(<?php echo $v['foto'] ?>);">
                                        <a class="pointer annfu_fiore_dettagli"
                                           data-denominazione="<?php echo htmlentities($v['denominazione']) ?>"
                                           data-descrizione="<?php echo htmlentities($v['descrizione']) ?>"
                                           data-importo="<?php echo number_format($v['importo'], 2, ',', '') ?>"
                                           data-target=".annfu_modal_fiori" data-toggle="modal"><i
                                                    class="fa fa-search-plus"></i>
                                            dettagli</a>
                                    </div>
                                    <h5><?php echo $v['denominazione'] ?></h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="annfu_fiore_prezzo">&euro;<?php echo number_format($v['importo'], 2, ',', '') ?></strong>
                                    </div>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 mt-3">
                        <div id="annfu_fiore_testo_fascia_wrapper" class="form-group">
                            <input type="text" name="testo_fascia" id="annfu_fiore_testo_fascia"
                                   class="fiore_controllato form-control" placeholder="Testo da inserire nella fascia"/>
                        </div>
                    </div>
                </div>

                <h5 class="mt-4 mb-2">Inserisci i tuoi dati</h5>

                <div id="annfu_error" class="annfu_error my-3"></div>

                <div class="annfu_ordine_step1">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="mittente" id="annfu_fiore_mittente"
                                       class="fiore_controllato form-control"
                                       placeholder="Mittente “es. Famiglia Rossi”" required/>
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
                        <div class="col-12 d-flex justify-content-end">
                            <a id="annfu_procedi" class="btn btn-default">Procedi</a>
                        </div>
                    </div>
                </div>
                <div class="annfu_ordine_step2 annfu_none">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mr-3">
                                    <input type="radio" name="tipologia" value="1" id="annfu_fiore_tipologia_1"
                                           class="fiore_controllato" checked/> Persona fisica
                                </label>
                                <label>
                                    <input type="radio" name="tipologia" value="2" id="annfu_fiore_tipologia_2"
                                           class="fiore_controllato"/> Persona giuridica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_fiore_dati_pagamento">
                        <div class="col-12 col-md-6 col-xl-4 annfu_persona_f">
                            <div class="form-group">
                                <input type="text" name="nome" id="annfu_fiore_nome"
                                       class="fiore_controllato form-control" placeholder="Nome"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 annfu_persona_f">
                            <div class="form-group">
                                <input type="text" name="cognome" id="annfu_fiore_cognome"
                                       class="fiore_controllato form-control" placeholder="Cognome"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-5 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="ragione_sociale" id="annfu_fiore_ragione_sociale"
                                       class="fiore_controllato form-control" placeholder="Ragione sociale"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="partita_iva" id="annfu_fiore_partita_iva"
                                       class="fiore_controllato form-control" placeholder="Partita IVA"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="form-group">
                                <input type="text" name="codice_fiscale" id="annfu_fiore_codice_fiscale"
                                       class="fiore_controllato form-control" placeholder="Codice fiscale"/>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_fiore_dati_pagamento">
                        <div class="col-12 col-xl-5">
                            <div class="form-group">
                                <input type="text" name="via" id="annfu_fiore_via"
                                       class="fiore_controllato form-control" placeholder="Via"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-xl-2">
                            <div class="form-group">
                                <input type="text" name="cap" id="annfu_fiore_cap"
                                       class="fiore_controllato form-control" placeholder="Cap"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-xl-5">
                            <div class="form-group">
                                <input type="text" name="citta" id="annfu_fiore_citta"
                                       class="fiore_controllato form-control" placeholder="Città"/>
                            </div>
                        </div>
                    </div>
                    <div class="row annfu_fiore_dati_pagamento">
                        <div class="col-12 col-md-5 col-xl-3 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="codice_destinatario" id="annfu_fiore_codice_destinatario"
                                       class="fiore_controllato form-control" placeholder="codice destinatario"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-xl-9 annfu_persona_g">
                            <div class="form-group">
                                <input type="text" name="pec" id="annfu_fiore_pec"
                                       class="fiore_controllato form-control" placeholder="PEC"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="d-block">Modalità di pagamento</label>
                                <?php if ($annuncio['onoranzaFunebre']['modalitaPagamentoFiori']): ?>
                                    <?php $metodiPagamento = explode("\n", $annuncio['onoranzaFunebre']['modalitaPagamentoFiori']); ?>
                                    <?php foreach ($metodiPagamento as $v): ?>
                                        <?php if ($v != ''): ?>
                                            <?php list($metodo, $descrizione) = explode("|", $v) ?>
                                            <label class="d-block d-xl-inline mr-xl-3">
                                                <input type="radio" name="modalita_pagamento"
                                                       value="<?php echo $metodo ?>" class="fiore_controllato"/>
                                                <?php echo $descrizione ?>
                                            </label>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
                            <div>
                                <a id="annfu_indietro" class="btn btn-default">Indietro</a>
                                <input type="submit" name="invio" value="ordina" id="annfu_ordina"
                                       class="annfu_invio annfu_ordina_disabled btn btn-default" disabled="disabled"/>
                            </div>
                        </div>
                        <div id="annfu_fiori_avanzamento">Stiamo processando l'ordine...</div>
                        <small class="annfu_text_justify annfu_indicazioni_fiori">Salvo diverse indicazioni, da
                            indicare nelle note soprastanti, fiori verranno consegnati in obitorio o in abitazione
                            prima della cerimonia funebre.</small>
                    </div>

                </div>

            </div>
            <div id="annfu_paga">
                <h4 class="mb-3">Ordine completato</h4>
                <div class="annfu_totale_fiore"></div>
                <div class="annfu_totale_testo_fascia"></div>
                <div class="annfu_totale_testo_biglietto"></div>
                <div class="annfu_totale_dati_mittente"></div>
                <div class="annfu_totale_dati_pagamento"></div>
                <div class="annfu_totale_note"></div>
                <div class="annfu_fiori_totale">
                    Totale da pagare: &euro;<span class="annfu_totale_ordine">0,00</span>
                </div>
                <br class="clear">
                <div id="annfu_paga_fiori_avanzamento" class="my-3"></div>
                <div id="annfu_paga_button"></div>
                <div>
                    <a href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug'] . '/'; ?>">Ritorna
                        all'annuncio</a>
                </div>

            </div>

            <span id="annfu_totale_ordine" class="annfu_none"></span>
        </form>

    </div>
<?php endif; ?>

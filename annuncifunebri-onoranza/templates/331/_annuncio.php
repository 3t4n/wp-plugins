<div class="row">
    <div class="col-md-12">
        <div class="annfu_annuncio_wrapper">
            <div class="annfu_annuncio">
                <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

                <div class="annfu_annuncio_citazione text-right"><em><?php echo $annuncio['citazione'] ?></em></div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="annfu_annuncio_foto">
                            <a href="<?php echo $annuncio['fotoGrande'] ?>">
                                <img src="<?php echo $annuncio['foto'] ?>" alt="<?php echo $annuncio['nominativo'] ?>"
                                     class="img-fluid">
                            </a>
                            <div class="annfu_annuncio_anni p-1 text-center">
                                <?php echo $annuncio['eta'] > 0 ? 'di anni ' . $annuncio['eta'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="annfu_annuncio_paese mt-3 mt-sm-0"><?php echo $annuncio['paese'] ?>,
                            <?php echo $annuncio['dataIta'] ?></div>
                        <div class="annfu_apertura mb-3"><?php echo $annuncio['apertura'] ?></div>

                        <h2 class="annfu_annuncio_nominativo">
                            <?php echo $annuncio['titolo'] ?>
                            <?php echo $annuncio['nominativo'] ?>
                            <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                            <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                        </h2>

                        <div class="annfu_annuncio_testo"><?php echo $annuncio['testo'] ?></div>

                        <div class="d-flex flex-column annfu_buttons_wrapper">
                            <a href="#annfu_form_cordoglio_wrapper"
                               class="btn btn-outline-primary annfu_vai_a_form_cordogli">
                                <i class="fas fa-pencil-alt"></i> Scrivi un messaggio di cordoglio
                            </a>
                            <?php if (count($annuncio['fiori'])): ?>
                                <a href="#annfu_form_fiori"
                                   class="mt-3 btn btn-outline-primary annfu_vai_a_form_cordogli annfu_open_tab_fiori">
                                    <i class="fas fa-spa"></i> Acquista un fiore
                                </a>
                            <?php endif; ?>

                            <?php if (count($annuncio['ricordiFloreali'])): ?>
                                <a href="#annfu_form_ricordi_floreali"
                                   class="mt-3 btn btn-outline-primary annfu_vai_a_form_cordogli annfu_open_tab_ricordi_floreali">
                                    <i class="fas fa-spa"></i> Acquista ricordo floreale
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php
                $cols = 3;
                //                $cols += $annuncio['dataSepoltura'] || $annuncio['luogoSepoltura'] ? 1 : 0;
                ?>
                <div class="col-md-12 my-5">
                    <div class="row annfu_box_info_wrapper">
                        <?php if ($annuncio['oraRosario'] != '00:01'): ?>
                            <div class="annfu_rosario_wrapper col-lg-<?php echo $cols > 0 ? 12 / $cols : 12 ?> mb-3 p-3">
                                <h5 class="mb-3">Recita del Santo Rosario</h5>
                                <div class="annfu_data_ora_rosario">
                                    <i class="far fa-calendar-alt"></i>
                                    <?php if ($annuncio['dataRosario']): ?>
                                        <?php echo $annuncio['dataRosarioIta'] ?>
                                        <?php echo $annuncio['oraRosario'] != '00:00' ? 'ore ' . $annuncio['oraRosario'] : '' ?>
                                    <?php else: ?>
                                        Data e ora ancora da definire
                                    <?php endif; ?>
                                </div>
                                <?php if ($annuncio['luogoRosario']): ?>
                                    <div class="annfu_luogo_rosario annfu_link_luogo">
                                        <i class="fas fa-church"></i>
                                        <?php echo annfu_text_url($annuncio['luogoRosarioLink'], $annuncio['luogoRosario'], '_blank') ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <div class="annfu_funerale_wrapper col-lg-<?php echo $cols > 0 ? 12 / $cols : 12 ?> mb-3 p-3">
                            <h5 class="mb-3">Celebrazione del funerale</h5>
                            <div class="annfu_data_ora_funerale">
                                <i class="far fa-calendar-alt"></i>
                                <?php if ($annuncio['dataFunerale']): ?>
                                    <?php echo $annuncio['dataFuneraleIta'] ?>
                                    <?php echo $annuncio['oraFunerale'] != '00:00' ? 'ore ' . $annuncio['oraFunerale'] : '' ?>
                                <?php else: ?>
                                    Data e ora ancora da definire
                                <?php endif; ?>
                            </div>
                            <div class="annfu_luogo_funerale annfu_link_luogo">
                                <i class="fas fa-church"></i>
                                <?php echo annfu_text_url($annuncio['luogoFuneraleLink'], $annuncio['luogoCerimonia'], '_blank') ?>
                            </div>
                            <?php if ($annuncio['accompagnamentoSepoltura']): ?>
                                <div class="annfu_accompagnamento_sepoltura annfu_link_luogo">
                                    <i class="fas fa-car"></i> <?php echo $annuncio['accompagnamentoSepoltura'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($annuncio['slug'] != 'marco-finocchiaro'): ?>
                            <div class="annfu_sepoltura_wrapper col-lg-<?php echo $cols > 0 ? 12 / $cols : 12 ?> mb-3 p-3">
                                <h5 class="mb-3"><?php echo $annuncio['sepoltura'] == 1 ? 'Tumulazione ceneri' : 'Sepoltura' ?></h5>
                                <?php if ($annuncio['dataSepoltura']): ?>
                                    <div class="annfu_data_ora_sepoltura">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo $annuncio['dataSepolturaIta'] ?>
                                        <?php echo $annuncio['oraSepoltura'] != '00:00' ? 'ore ' . $annuncio['oraSepoltura'] : '' ?>
                                    </div>
                                <?php else: ?>
                                    Data e ora ancora da definire
                                <?php endif; ?>
                                <?php if ($annuncio['luogoSepoltura']): ?>
                                    <div class="annfu_luogo_sepoltura annfu_link_luogo">
                                        <i class="fas fa-cross"></i>
                                        <?php echo annfu_text_url($annuncio['luogoSepolturaLink'], $annuncio['luogoSepoltura'], '_blank') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="annfu_annuncio_streaming_avviso mt-5 text-center">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
                </div>

                <?php if (count($annuncio['stanzaCasaFuneraria']) > 0): ?>
                    <?php $fileStanza = [1 => 'rosa', 22 => 'rosa', 23 => 'orchidea', 24 => 'calla', 34 => 'commiato'][$annuncio['stanzaCasaFuneraria']['stanza_id']]; ?>
                    <div class="annfu_casa_funeraria_wrapper p-3 d-flex align-items-center stanza-<?php echo $annuncio['stanzaCasaFuneraria']['stanza_id'] ?>">
                        <?php if ($annuncio['stanzaCasaFuneraria']['stanza_id'] != 34): ?>
                            <img src="<?php echo ANNFU_PLUGIN_URL ?>img/sala_<?php echo $fileStanza ?>.png"
                                 loading="lazy">
                        <?php endif; ?>
                        <h5 class="mb-0"><?php echo $annuncio['stanzaCasaFuneraria']['testo'] ?></h5>
                    </div>
                <?php endif; ?>

                <?php if ($annuncio['luogoRiposo']): ?>
                    <div class="annfu_riposo_wrapper mb-5 p-3 d-flex">
                        <?php if (strpos(strtolower($annuncio['luogoRiposo']), 'ospedale')): ?>
                            <i class="far fa-hospital"></i>
                        <?php else: ?>
                            <i class="nc-icon-outline ui-1_home-51"></i>
                        <?php endif; ?>
                        <?php if (filter_var($annuncio['luogoRiposoLink'], FILTER_VALIDATE_URL)): ?>
                            <a href="<?php echo $annuncio['luogoRiposoLink'] ?>" target="_blank">
                                <h5><?php echo $annuncio['luogoRiposo'] ?></h5>
                            </a>
                        <?php else: ?>
                            <h5><?php echo $annuncio['luogoRiposo'] ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="col-sm-12 col-md-12 annfu_annuncio_onoranza_funebre py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $annuncio['chiusuraOnoranzaFunebre'] ?><br/>
                            <a href="https://goo.gl/maps/vFaYvAv2MJnetz5MA" target="_blank"><i
                                        class="fas fa-map-marker-alt"></i> Viale
                                Rimembranze 13a, 20020 Magnago MI</a>
                        </div>
                        <div class="col-md-6">
                            <i class="far fa-clock"></i> Dal lunedì al sabato: dalle 09:00 alle 12:30, dalle 14:30 alle
                            18:30<br/>
                            <i class="far fa-clock"></i> Domenica e festivi: dalle 09:00 alle 12:00, dalle 15:00 alle
                            18:00
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mb-5">
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_social.php'); ?>
        </div>
        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_fondo_annuncio.php') ?>
    </div>
</div>
<div class="row">
    <?php if ($annuncio['tipoAnnuncio'] != 'ringraziamento'): ?>
        <div class="col-12">
            <div id="annfu_form_cordoglio_wrapper">
                <?php include_once('_annuncio-form.php') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_partecipazioni-cordogli.php') ?>

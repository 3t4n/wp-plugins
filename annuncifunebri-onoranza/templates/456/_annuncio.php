<div class="row">
    <div class="col-md-12">
        <div class="annfu_annuncio_wrapper">
            <div class="annfu_annuncio">
                <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

                <div class="row">
                    <div class="col-md-3">
                        <div class="annfu_annuncio_foto">
                            <a href="<?php echo $annuncio['fotoGrande'] ?>">
                                <img src="<?php echo $annuncio['foto'] ?>" alt="<?php echo $annuncio['nominativo'] ?>"
                                     class="img-fluid">
                            </a>
                        </div>

                        <?php $urlEpigrafe = $annuncio['fileEpigrafe'] ? explode('?', $annuncio['fileEpigrafe']) : null; ?>
                        <?php if (filter_var($annuncio['fileEpigrafe'], FILTER_VALIDATE_URL) && $urlEpigrafe && substr($urlEpigrafe[0], -4) != '.pdf'): ?>
                            <div class="annfu_annuncio_epigrafe mt-3">
                                <a href="<?php echo $annuncio['fileEpigrafe'] ?>">
                                    <img src="<?php echo $annuncio['fileEpigrafe'] ?>"
                                         alt="Epigrafe di <?php echo $annuncio['nominativo'] ?>"
                                         class="annfu_epigrafe_thumb">
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-md-9">
                        <div class="annfu_annuncio_paese mb-3 mt-sm-0"><?php echo $annuncio['paese'] ?>,
                            <?php echo $annuncio['dataIta'] ?></div>

                        <div class="annfu_annuncio_citazione mb-3 text-right">
                            <em><?php echo $annuncio['citazione'] ?></em>
                        </div>

                        <div class="annfu_apertura mb-3"><?php echo $annuncio['apertura'] ?></div>

                        <h2 class="annfu_annuncio_nominativo">
                            <?php echo $annuncio['titolo'] ?>
                            <?php echo $annuncio['nominativo'] ?>
                            <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                            <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                        </h2>
                        <div class="annfu_annuncio_anni">
                            <?php echo $annuncio['eta'] > 0 ? 'di anni ' . $annuncio['eta'] : '' ?>
                        </div>

                        <div class="annfu_annuncio_testo"><?php echo $annuncio['testo'] ?></div>

                        <div class="d-flex annfu_buttons_wrapper">
                            <a href="#annfu_form_cordoglio_wrapper"
                               class="mr-3 btn btn-outline-primary annfu_vai_a_form_cordogli">
                                <i class="fas fa-pencil-alt"></i> Scrivi un messaggio di cordoglio
                            </a>
                            <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                                <a href="#annfu_form_foto"
                                   class="mr-3 btn btn-outline-primary annfu_vai_a_form_cordogli annfu_open_tab_foto">
                                    <i class="fas fa-photo"></i> Invia una foto</a>
                            <?php endif; ?>
                            <?php if (count($annuncio['fiori'])): ?>
                                <a href="#annfu_form_fiori"
                                   class="btn btn-outline-primary annfu_vai_a_form_cordogli annfu_open_tab_fiori">
                                    <i class="fas fa-spa"></i> Acquista un fiore
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
                <div class="my-5">&nbsp;</div>
                <div class="row my-5 annfu_box_info_wrapper">
                    <?php if ($annuncio['luogoRiposo']): ?>
                        <div class="annfu_camera_ardente_wrapper col-lg-3 mb-3 p-3">
                            <h5 class="bordered">Camera ardente</h5>
                            <div class="annfu_riposo_wrapper mb-5 d-flex">
                                <?php if (strpos(strtolower($annuncio['luogoRiposo']), 'ospedale')): ?>
                                    <i class="far fa-hospital"></i>
                                <?php else: ?>
                                    <i class="nc-icon-outline ui-1_home-51"></i>
                                <?php endif; ?>
                                <?php if (filter_var($annuncio['luogoRiposoLink'], FILTER_VALIDATE_URL)): ?>
                                    <a href="<?php echo $annuncio['luogoRiposoLink'] ?>" target="_blank">
                                        <?php echo $annuncio['luogoRiposo'] ?>
                                    </a>
                                <?php else: ?>
                                    <span><?php echo $annuncio['luogoRiposo'] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($annuncio['dataRosario'] || $annuncio['luogoRosario']): ?>
                        <div class="annfu_rosario_wrapper col-lg-3 mb-3 p-3">
                            <h5 class="mb-3 bordered">Santo Rosario</h5>
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

                    <div class="annfu_funerale_wrapper col-lg-3 mb-3 p-3">
                        <h5 class="mb-3 bordered">Rito funebre</h5>
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

                    <?php if ($annuncio['dataSepoltura'] || $annuncio['luogoSepoltura']): ?>
                        <div class="annfu_sepoltura_wrapper col-lg-3 mb-3 p-3">
                            <h5 class="mb-3 bordered"><?php echo $annuncio['sepoltura'] == 1 ? 'Tumulazione ceneri' : 'Sepoltura' ?></h5>
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

                <div class="annfu_annuncio_streaming_avviso mt-5 text-center">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
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

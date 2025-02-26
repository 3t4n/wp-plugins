<?php if (in_array($annuncio['onoranzaFunebre']['slug'], ANNFU_GRUPPO_CONCORDIA_COF)): ?>
    <div class="annfu_impresa_info d-flex flex-column flex-lg-row justify-content-between mb-2 py-3 px-5 font-weight-bold">
        <div class="mb-3 mb-lg-0">
            <img width="30" src="https://www.casafunerariacof.it/wp-content/uploads/2021/04/marchio.svg"
                 class="attachment-large size-large wp-image-694 mr-3" alt="" loading="lazy">
            <?php echo $annuncio['onoranzaFunebre']['ragioneSocialeBreve'] ?>
        </div>
        <div class="mb-3 mb-lg-0">
            <img width="30" src="https://www.casafunerariacof.it/wp-content/uploads/2021/03/ico-cel-circle-ar.svg"
                 class="attachment-large size-large wp-image-60 mr-3" alt="" loading="lazy">
            <?php echo $annuncio['onoranzaFunebre']['telefono1'] ?>
        </div>
        <div>
            <img width="30" src="https://www.casafunerariacof.it/wp-content/uploads/2021/03/ico-mail-circle-ar.svg"
                 class="attachment-large size-large wp-image-69 mr-3" alt="" loading="lazy">
            <?php echo $annuncio['onoranzaFunebre']['mail'] ?>
        </div>
    </div>
<?php endif; ?>

<div class="annfu_annuncio_wrapper">
    <div class="annfu_annuncio">
        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '/_testo_cima_annuncio.php') ?>
        <div class="row mb-4">
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="mt-4 mt-lg-0 px-2 px-lg-0">
                    <div class="annfu_annuncio_citazione text-right"><em><?php echo $annuncio['citazione'] ?></em></div>
                    <div class="annfu_apertura mb-3 text-center"><?php echo $annuncio['apertura'] ?></div>

                    <h2 class="annfu_annuncio_nominativo my-5 text-center">
                        <?php echo $annuncio['titolo'] ?>
                        <?php echo $annuncio['nominativo'] ?>
                        <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                        <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                    </h2>

                    <?php if ($annuncio['eta']): ?>
                        <h3 class="annfu_annuncio_eta my-4 text-center">
                            di <?php echo $annuncio['eta'] ?> anni
                        </h3>
                    <?php endif; ?>

                    <div class="annfu_separator"></div>

                    <div class="annfu_annuncio_testo text-center"><?php echo $annuncio['testo'] ?></div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 order-1 order-lg-2">
                <div class="annfu_annuncio_foto_wrapper">
                    <div class="annfu_annuncio_foto">
                        <div class="annfu_ribbon_anniversario_wrapper">
                            <div class="annfu_ribbon_anniversario">&nbsp;</div>
                        </div>
                        <a href="<?php echo $annuncio['fotoGrande'] ?>">
                            <img src="<?php echo $annuncio['foto'] ?>" alt="<?php echo $annuncio['nominativo'] ?>"
                                 class="img-fluid m-0">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="annfu_annuncio_info_wrapper">
    <div class="row">
        <div class="col-12">
            <?php if (count($annuncio['stanzaCasaFuneraria']) > 0): ?>
                <div class="annfu_box_info annfu_casa_funeraria_wrapper mt-3 p-3 d-flex align-items-center">
                    <div class="text-center mr-4 annfu_icon_wrapper">
                        <i class="icon fas fa-church"></i><br/>Casa funeraria
                    </div>
                    <div class="mb-0 annfu_box_info_text"><?php echo $annuncio['stanzaCasaFuneraria']['testo'] ?></div>
                </div>
            <?php endif; ?>

            <?php if ($annuncio['dataRosario']): ?>
                <div class="annfu_box_info annfu_rosario_wrapper mt-3 p-3 d-flex align-items-center">
                    <div class="text-center mr-4 annfu_icon_wrapper">
                        <i class="icon fas fa-praying-hands"></i><br/>Santo Rosario
                    </div>
                    <div class="mb-0 annfu_box_info_text">
                        La recita del Santo Rosario avrà luogo il
                        giorno <?php echo $annuncio['dataRosarioIta'] ?> <?php echo $annuncio['oraRosario'] != '00:00' ? 'alle ore ' . $annuncio['oraRosario'] : '' ?>
                        <?php echo annfu_text_url($annuncio['luogoRosarioLink'], $annuncio['luogoRosario'], '_blank') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($annuncio['dataFunerale']): ?>
                <div class="annfu_box_info annfu_funerale_wrapper mt-3 p-3 d-flex align-items-center">
                    <div class="text-center mr-4 annfu_icon_wrapper">
                        <i class="icon fas fa-book-open"></i><br/>Cerimonia
                    </div>
                    <div class="mb-0 annfu_box_info_text">
                        I funerali avranno luogo il
                        giorno <?php echo $annuncio['dataFuneraleIta'] ?> <?php echo $annuncio['oraFunerale'] != '00:00' ? 'alle ore ' . $annuncio['oraFunerale'] : '' ?>
                        <?php echo annfu_text_url($annuncio['luogoFuneraleLink'], $annuncio['luogoCerimonia'], '_blank') ?>
                        <?php echo nl2br($annuncio['accompagnamentoSepoltura']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($annuncio['luogoSepoltura']): ?>
                <div class="annfu_box_info annfu_sepoltura_wrapper mt-3 p-3 d-flex align-items-center">
                    <div class="text-center mr-4 annfu_icon_wrapper">
                        <i class="icon fas fa-cross"></i><br/>Sepoltura
                    </div>
                    <div class="mb-0 annfu_box_info_text">
                        <?php echo nl2br($annuncio['luogoSepoltura']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="annfu_annuncio_paese mt-5 mb-4 text-center d-flex justify-content-center">
                <?php echo $annuncio['paese'] ?>, <?php echo $annuncio['dataIta'] ?>
            </div>

            <?php if (count($annuncio['streaming']) > 0 || $annuncio['streamingFunerale'] != ''): ?>
                <div class="annfu_annuncio_streaming_avviso my-5 text-center d-flex justify-content-center">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
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
        </div>
    </div>
</div>

<?php if ($annuncio['fileEpigrafe'] != ''): ?>
    <div class="annfu_epigrafe_wrapper mt-3 mb-5 text-center">
        <a href="<?php echo $annuncio['fileEpigrafe'] ?>" target="_blank" class="btn btn-default annfu_epigrafe"
           title="visualizza epigrafe">Visualizza epigrafe</a>
    </div>
<?php endif; ?>

<div class="annfu_social_wrapper pb-5">
    <?php include_once(ANNFU_PLUGIN_PATH . 'templates/concordia/_social.php'); ?>
</div>
<?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '/_testo_fondo_annuncio.php') ?>

<div class="row">
    <?php if ($annuncio['tipoAnnuncio'] != 'ringraziamento'): ?>
        <div class="col-12">
            <div id="annfu_form_cordoglio_wrapper">
                <?php include_once(ANNFU_PLUGIN_PATH . 'templates/concordia/_annuncio-form.php') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-12"><?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '/_testo_fondo_form_cordogli.php') ?></div>
</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH . 'templates/concordia/_partecipazioni-cordogli.php') ?>

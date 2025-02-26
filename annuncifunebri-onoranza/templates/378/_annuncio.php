<div class="row mb-5">
    <div class="col-md-12">

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

        <div class="d-none">
            <div class="annfu_annuncio_citazione text-right"><em><?php echo $annuncio['citazione'] ?></em></div>
            <div class="annfu_annuncio_apertura"><?php echo $annuncio['apertura'] ?></div>
            <h2 class="annfu_annuncio_nominativo">
                <?php echo $annuncio['titolo'] ?>
                <?php echo $annuncio['nominativo'] ?>
                <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
            </h2>
            <div class="annfu_annuncio_anni"><?php echo $annuncio['eta'] > 0 ? 'di anni ' . $annuncio['eta'] : '' ?></div>
            <div class="annfu_annuncio_testo"><?php echo $annuncio['testo'] ?></div>
            <div class="annfu_annuncio_paese"><?php echo $annuncio['paese'] ?>, <?php echo $annuncio['dataIta'] ?></div>
            <div class="annfu_annuncio_onoranza_funebre"><?php echo $annuncio['chiusuraOnoranzaFunebre'] ?></div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
                <div class="annfu_annuncio_foto">
                    <a href="<?php echo $annuncio['fileEpigrafe'] ?>" rel="epigrafe"
                       class="<?php echo get_option('annfu_lightbox') ? 'annfu_lightbox' : '' ?>">
                        <img src="<?php echo $annuncio['fileEpigrafe'] ?>" alt="<?php echo $annuncio['nominativo'] ?>">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 annfu_button_actions">
                <a class="annfu_open_tab_cordoglio annfu_pointer btn btn-block btn-cordoglio mb-2">
                    Lascia un cordoglio
                </a>
                <?php if (filter_var(get_option('annfu_link_fiori', ''), FILTER_VALIDATE_URL) && count($annuncio['fiori']) > 0): ?>
                    <a href="<?php echo get_option('annfu_link_fiori') ?>" class="btn btn-block btn-send mb-2"
                       target="_blank">
                        Acquista fiori
                    </a>
                <?php endif ?>
                <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                    <a class="annfu_open_tab_foto annfu_pointer btn btn-block btn-photo mb-2">
                        Invia una foto
                    </a>
                <?php endif ?>
                <div class="annfu_annuncio_streaming_avviso">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
                </div>

                <?php include_once(ANNFU_PLUGIN_PATH . '/templates/378/_social.php'); ?>

            </div>
        </div>

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_fondo_annuncio.php') ?>

    </div>
</div>

<div class="row">
    <?php if ($annuncio['tipoAnnuncio'] != 'ringraziamento'): ?>
        <div class="col-12">
            <div id="annfu_form_cordoglio_wrapper">
                <?php include_once(ANNFU_PLUGIN_PATH . 'templates/378/_annuncio-form.php') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_partecipazioni-cordogli.php') ?>

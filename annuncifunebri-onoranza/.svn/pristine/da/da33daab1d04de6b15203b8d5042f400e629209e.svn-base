<div class="row">
    <div class="col-xs-12 col-sm-12 <?php echo $annuncio['tipoAnnuncio'] != 'ringraziamento' ? 'col-md-7' : 'col-md-8 col-md-offset-2' ?>">

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

        <div class="annfu_annuncio_wrapper">
            <?php $urlEpigrafe = $annuncio['fileEpigrafe'] ? explode('?', $annuncio['fileEpigrafe']) : null; ?>
            <?php $showEpigrafe = $annuncio['onoranzaFunebre']['showEpigrafe'] && filter_var($annuncio['fileEpigrafe'], FILTER_VALIDATE_URL) && $urlEpigrafe && substr($urlEpigrafe[0], -4) != '.pdf'; ?>
            <div class="annfu_epigrafe_wrapper <?php echo $showEpigrafe ? '' : 'annfu_none' ?>">
                <a href="<?php echo $annuncio['fileEpigrafe'] ?>" rel="epigrafe"
                   class="<?php echo get_option('annfu_lightbox') ? 'annfu_lightbox' : '' ?>">
                    <img src="<?php echo $annuncio['fileEpigrafe'] ?>"
                         alt="<?php echo $annuncio['nominativo'] ?>">
                </a>
            </div>
            <div class="annfu_annuncio text-center <?php echo $showEpigrafe ? 'annfu_none' : '' ?>">
                <div class="annfu_annuncio_citazione text-right">
                    <em><?php echo $annuncio['citazione'] ?></em></div>
                <div class="annfu_annuncio_apertura"><?php echo $annuncio['apertura'] ?></div>
                <div class="annfu_annuncio_foto"
                    <?php echo $annuncio['fotoSoloOriginale'] !== false ? "style=\"background-image:url('" . $annuncio['fotoSoloOriginale'] . "');background-position:center;background-size:cover;width:" . get_option('annfu_foto_w_annuncio', ANNFU_FOTO_W_ANNUNCIO) . "px;height:" . get_option('annfu_foto_h_annuncio', ANNFU_FOTO_H_ANNUNCIO) . "px;margin:0 auto;\"" : ""; ?>
                >
                    <a href="<?php echo $annuncio['fotoGrande'] ?>">
                        <img style="width:<?php echo get_option('annfu_foto_w_annuncio', ANNFU_FOTO_W_ANNUNCIO) ?>px;height:<?php echo get_option('annfu_foto_h_annuncio', ANNFU_FOTO_H_ANNUNCIO) ?>px;<?php echo $annuncio['fotoSoloOriginale'] !== false ? 'opacity:0;' : '' ?>"
                             src="<?php echo $annuncio['foto'] ?>" alt="<?php echo $annuncio['nominativo'] ?>">
                    </a>
                </div>
                <h2 class="annfu_annuncio_nominativo text-center">
                    <?php echo $annuncio['titolo'] ?>
                    <?php echo $annuncio['nominativo'] ?>
                    <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                    <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                </h2>
                <div class="annfu_annuncio_data_morte"><?php echo $annuncio['dataMorteIta'] ?></div>
                <div class="annfu_annuncio_anni"><?php echo $annuncio['eta'] > 0 ? 'di ' . $annuncio['eta'] . ' anni' : '' ?></div>
                <div class="annfu_annuncio_testo"><?php echo $annuncio['testo'] ?></div>
                <div class="annfu_annuncio_paese text-left"><?php echo $annuncio['paese'] ?>,
                    <?php echo $annuncio['dataIta'] ?></div>
                <div class="annfu_annuncio_onoranza_funebre text-left"><?php echo $annuncio['chiusuraOnoranzaFunebre'] ?></div>
            </div>
        </div>

        <div class="annfu_annuncio_streaming_avviso text-center">
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
        </div>

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_fondo_annuncio.php') ?>

        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_social.php'); ?>
    </div>
    <?php if ($annuncio['tipoAnnuncio'] != 'ringraziamento'): ?>
        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_annuncio-form.php') ?>
    <?php endif; ?>

</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_partecipazioni-cordogli.php') ?>

<?php
global $wpdb;
$result = $wpdb->get_row($wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type='give_forms' and post_status='publish' and post_name = %s", $annuncio['slug']));
?>

<div class="row">
    <div class="col-md-12">

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

        <div class="row">

            <?php $urlEpigrafe = $annuncio['fileEpigrafe'] ? explode('?', $annuncio['fileEpigrafe']) : null; ?>
            <?php $showEpigrafe = $annuncio['onoranzaFunebre']['showEpigrafe'] && filter_var($annuncio['fileEpigrafe'], FILTER_VALIDATE_URL) && $urlEpigrafe && substr($urlEpigrafe[0], -4) != '.pdf'; ?>
            <?php if ($showEpigrafe): ?>
                <div class="col-md-12 annfu_epigrafe_wrapper text-center">
                    <a href="<?php echo $annuncio['fileEpigrafe'] ?>" rel="epigrafe"
                       class="<?php echo get_option('annfu_lightbox') ? 'annfu_lightbox' : '' ?>">
                        <img src="<?php echo $annuncio['fileEpigrafe'] ?>" alt="<?php echo $annuncio['nominativo'] ?>">
                    </a>
                    <div class="text-center">
                        <a class="annfu_open_tab_cordoglio annfu_pointer btn btn-cordoglio">
                            <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-cordoglio.png" alt="invia una foto"
                                 class="img-responsive">
                            Lascia un cordoglio
                        </a>
                        <?php if (filter_var(get_option('annfu_link_fiori', ''), FILTER_VALIDATE_URL) && count($annuncio['fiori']) > 0): ?>
                            <a href="<?php echo get_option('annfu_link_fiori') ?><?php echo $annuncio['nominativo'] ?>"
                               class="btn btn-send">
                                <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-flower.png" alt="acquista fiori"
                                     class="img-responsive">
                                Acquista fiori
                            </a>
                        <?php endif ?>
                        <?php if ($result && $result->ID): ?>
                            <?php echo do_shortcode('[give_form id="' . $result->ID . '"]'); ?>
                        <?php endif ?>
                        <?php if (true || $annuncio['abilitatoFotoCordogli']): ?>
                            <a class="annfu_open_tab_foto annfu_pointer btn btn-photo">
                                <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-photo.png" alt="invia una foto"
                                     class="img-responsive">
                                Invia una foto
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-4 col-sm-6 col-xs-12 mb-5">
                    <div class="annfu_annuncio_foto mb-3"
                        <?php echo $annuncio['fotoSoloOriginale'] !== false ? "style=\"background-image:url('" . $annuncio['fotoSoloOriginale'] . "');background-position:center;background-size:cover;width:" . get_option('annfu_foto_w_annuncio', ANNFU_FOTO_W_ANNUNCIO) . "px;height:" . get_option('annfu_foto_h_annuncio', ANNFU_FOTO_H_ANNUNCIO) . "px;margin:0 auto;\"" : ""; ?>
                    >
                        <a href="<?php echo $annuncio['fotoGrande'] ?>">
                            <img style="<?php echo $annuncio['fotoSoloOriginale'] !== false ? 'opacity:0;' : '' ?>"
                                 src="<?php echo $annuncio['fotoGrande'] ?>"
                                 alt="<?php echo $annuncio['nominativo'] ?>">
                        </a>
                    </div>

                    <a class="annfu_open_tab_cordoglio annfu_pointer btn btn-block btn-cordoglio mb-2">
                        <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-cordoglio.png" alt="invia una foto"
                             class="img-responsive">
                        Lascia un cordoglio
                    </a>

                    <?php if (filter_var(get_option('annfu_link_fiori', ''), FILTER_VALIDATE_URL) && count($annuncio['fiori']) > 0): ?>
                        <a href="<?php echo get_option('annfu_link_fiori') ?><?php echo $annuncio['nominativo'] ?>"
                           class="btn btn-block btn-send">
                            <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-flower.png" alt="acquista fiori"
                                 class="img-responsive">
                            Acquista fiori
                        </a>
                    <?php endif ?>
                    <?php if ($result && $result->ID): ?>
                        <?php echo do_shortcode('[give_form id="' . $result->ID . '"]'); ?>
                    <?php endif ?>
                    <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                        <a class="annfu_open_tab_foto annfu_pointer btn btn-block btn-photo">
                            <img src="<?php echo ANNFU_PLUGIN_URL ?>img/trevisin-photo.png" alt="invia una foto"
                                 class="img-responsive">
                            Invia una foto
                        </a>
                    <?php endif ?>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="annfu_annuncio">
                        <div class="annfu_annuncio_citazione text-right"><em><?php echo $annuncio['citazione'] ?></em>
                        </div>
                        <div class="annfu_annuncio_apertura"><?php echo $annuncio['apertura'] ?></div>
                        <h2 class="annfu_annuncio_nominativo">
                            <?php echo $annuncio['titolo'] ?>
                            <?php echo $annuncio['nominativo'] ?>
                            <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                            <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                        </h2>
                        <div class="annfu_annuncio_anni"><?php echo $annuncio['eta'] > 0 ? 'di anni ' . $annuncio['eta'] : '' ?></div>
                        <div class="annfu_annuncio_testo"><?php echo $annuncio['testo'] ?></div>
                        <div class="annfu_annuncio_paese"><?php echo $annuncio['paese'] ?>,
                            <?php echo $annuncio['dataIta'] ?></div>
                        <div class="annfu_annuncio_onoranza_funebre"><?php echo $annuncio['chiusuraOnoranzaFunebre'] ?></div>
                        <div class="annfu_annuncio_streaming_avviso">
                            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_fondo_annuncio.php') ?>

        <div class="mb-4">
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_social.php'); ?>
        </div>
    </div>
</div>

<div class="row">
    <?php if ($annuncio['tipoAnnuncio'] != 'ringraziamento'): ?>
        <div class="col-12">
            <?php include_once(ANNFU_PLUGIN_PATH . 'templates/226/_annuncio-form.php') ?>
        </div>
    <?php endif; ?>
</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH . 'templates/226/_partecipazioni-cordogli.php') ?>

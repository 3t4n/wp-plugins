<div class="row annfu_annuncio_wrapper">
    <div class="col-md-12">

        <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_cima_annuncio.php') ?>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="annfu_annuncio_foto">
                    <a href="<?php echo $annuncio['fotoGrande'] ?>">
                        <img src="<?php echo $annuncio['fotoGrande'] ?>" alt="<?php echo $annuncio['nominativo'] ?>"
                             class="img-fluid mb-4">
                    </a>
                </div>
                <?php if (count($annuncio['fiori']) > 0): ?>
                    <a href="#annfu_form_fiori" class="annfu_open_tab_fiori btn btn-block btn-send btn-flowers">
                        <img src="<?php echo ANNFU_PLUGIN_URL ?>img/fratelliferrario/wreath.png" alt="acquista fiori"
                             class="img-responsive">
                        Acquista composizione floreale
                    </a>
                <?php endif ?>
                <?php if (count($annuncio['ricordiFloreali']) > 0): ?>
                    <a href="#annfu_form_ricordi_floreali"
                       class="annfu_open_tab_ricordi_floreali btn btn-block btn-send btn-flowers">
                        <img src="<?php echo ANNFU_PLUGIN_URL ?>img/fratelliferrario/flower.png" alt="acquista fiori"
                             class="img-responsive">
                        Ricordo floreale
                    </a>
                <?php endif ?>
                <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                    <a class="annfu_open_tab_foto annfu_pointer btn btn-block btn-photo">
                        <img src="<?php echo ANNFU_PLUGIN_URL ?>img/fratelliferrario/image.png" alt="invia una foto"
                             class="img-responsive">
                        Invia una foto
                    </a>
                <?php endif ?>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="annfu_annuncio">
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
                    <div class="annfu_annuncio_paese"><?php echo $annuncio['paese'] ?>
                        , <?php echo $annuncio['dataIta'] ?></div>
                    <div class="annfu_annuncio_onoranza_funebre">
                        <strong><?php echo $annuncio['chiusuraOnoranzaFunebre'] ?></strong><br/>
                        <a href="https://maps.app.goo.gl/oe4J9QMDN9UJqpX4A" target="_blank">Casa funeraria di Fratelli
                            Ferrario</a><br/>
                        Orari<br/>
                        Dal lunedì al sabato: 8.30 - 18.30<br/>
                        Domenica e festivi: 9.00 - 12.00 / 15.00 - 18.00
                    </div>
                    <div class="annfu_annuncio_streaming_avviso">
                        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_pulsante_streaming.php'); ?>
                    </div>
                </div>
            </div>
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
            <div id="annfu_form_cordoglio_wrapper">
                <?php include_once('_annuncio-form.php') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_foto-cordogli.php') ?>

<div class="clearfix"></div>

<?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_partecipazioni-cordogli.php') ?>

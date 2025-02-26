<div class="annfu impresa-<?php echo str_replace(',', '-', get_option('annfu_onoranza_funebre_id')) ?>">
    <?php include_once(plugin_dir_path(__FILE__) . '_ricerca.php') ?>

    <div id="annfu_annunci">
        <div class="row">

            <?php if (count($r['data']) == 0): ?>
                <div class="annfu_annunci_no_results">Nessun risultato trovato. Prova a modificare i parametri della
                    ricerca.
                </div>
            <?php else: ?>
                <?php foreach ($r['data'] as $annuncio): ?>
                    <?php $link = get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug'] . '/'; ?>
                    <?php if ($annuncio['ofc']) $ofc = true ?>
                    <div class="annfu_annunci_container col-xs-6 col-sm-4 col-md-3">
                        <div class="annfu_annunci_wrapper">
                            <?php if (in_array($annuncio['tipoAnnuncio'], ['anniversario', 'trigesimo'])): ?>
                                <div class="annfu_ribbon_anniversario_wrapper">
                                    <div class="annfu_ribbon_anniversario"><?php echo $annuncio['tipoAnnuncio'] ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($annuncio['tipoAnnuncio'] == 'ringraziamento'): ?>
                                <div class="annfu_ribbon_ringraziamento_wrapper">
                                    <div class="annfu_ribbon_ringraziamento">ringraziamento</div>
                                </div>
                            <?php endif; ?>
                            <div <?php echo $annuncio['fotoSoloOriginale'] !== false ? "style=\"background-image:url('" . $annuncio['fotoSoloOriginale'] . "');background-position:center;background-size:cover;\"" : ""; ?>>
                                <?php $info = pathinfo($annuncio['fotoGrande']) ?>
                                <a class="annfu_annunci_foto" href="<?php echo $link ?>">
                                    <?php if (in_array(strtolower($info['extension']), ["png", "jpg", "jpeg", "gif"])): ?>
                                        <img src="<?php echo $annuncio['foto'] ?>"
                                             alt="<?php echo $annuncio['nominativo'] ?>"
                                            <?php echo $annuncio['fotoSoloOriginale'] !== false ? 'style="opacity:0"' : '' ?>
                                        >
                                    <?php else: ?>
                                        <img src="<?php echo ANNFU_PLUGIN_URL ?>/img/anonimo.jpg"
                                             alt="<?php echo $annuncio['nominativo'] ?>"
                                            <?php echo $annuncio['fotoSoloOriginale'] !== false ? 'style="opacity:0"' : '' ?>
                                        >
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div>
                                <h2 class="annfu_annunci_nominativo">
                                    <a href="<?php echo $link ?>">
                                        <?php echo $annuncio['titolo'] ?>
                                        <?php echo $annuncio['nominativo'] ?>
                                        <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                                        <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                                    </a>
                                </h2>
                                <?php if ($annuncio['eta'] > 0): ?>
                                    <div class="annfu_annunci_anni">di <?php echo $annuncio['eta'] ?> anni</div>
                                <?php else: ?>
                                    <div class="annfu_annunci_anni">&nbsp;</div>
                                <?php endif; ?>
                                <div class="annfu_annunci_paese"><?php echo $annuncio['paese'] ?></div>
                                <div class="annfu_annunci_casa_funeraria<?php echo $annuncio['casaFuneraria'] != '' ? '' : "_no" ?>"><?php echo $annuncio['casaFuneraria'] != '' ? $annuncio['casaFuneraria'] : "&nbsp;" ?></div>
                            </div>
                            <div class="annfu_add_cordoglio text-center"><a href="<?php echo $link ?>">lascia un
                                    messaggio<br/>di cordoglio</a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="clearfix"></div>
        </div>
        <?php include_once(plugin_dir_path(__FILE__) . '_paginazione.php') ?>
        <?php include_once(plugin_dir_path(__FILE__) . '_poweredby.php') ?>
    </div>
</div>

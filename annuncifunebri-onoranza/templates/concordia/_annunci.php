<div class="annfu impresa-<?php echo str_replace(',', '-', get_option('annfu_onoranza_funebre_id')) ?> <?php echo array_intersect(explode(",",get_option('annfu_onoranza_funebre_id')), ANNFU_GRUPPO_CONCORDIA) ? 'impresa-concordia' : '' ?>">

    <?php include_once(ANNFU_PLUGIN_PATH . 'templates/concordia/_ricerca.php') ?>

    <?php $tabs = [
        'Tutti'   => '',
        'Mantova' => 'mantova',
        'Rovigo'  => 'rovigo',
        'Modena'  => 'modena',
        'Lodi'    => 'lodi',
        'Bologna' => 'bologna',
    ];
    ?>

    <div id="annfu_annunci">
        <ul class="mt-5 annfu_tabs">
            <?php foreach ($tabs as $tab => $linkTab): ?>
                <li class="<?php echo isset($_COOKIE['annuncifunebri_provincia']) && annfu_decrypt($_COOKIE['annuncifunebri_provincia']) == $linkTab ? "annfu_active" : "" ?>">
                    <a href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCI ?>?provincia=<?php echo $linkTab ?>"><?php echo $tab ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="row">
            <?php if (count($r['data']) == 0): ?>
                <div class="annfu_annunci_no_results">Nessun risultato trovato. Prova a modificare i parametri della ricerca.</div>
            <?php else: ?>
                <?php foreach ($r['data'] as $annuncio): ?>
                    <?php $link = get_site_url() . '/' . ANNFU_PAGE_ANNUNCIO . '/' . $annuncio['comune']['slug'] . '/' . $annuncio['slug'] . '/'; ?>
                    <div class="annfu_annunci_container col-xs-6 col-sm-4 mb-3">
                        <div class="annfu_annunci_wrapper">
                            <div class="annfu_ribbon_anniversario_wrapper">
                                <div class="annfu_ribbon_anniversario">&nbsp;</div>
                            </div>
                            <div class="annfu_annunci_foto_wrapper">
                                <?php $info = pathinfo($annuncio['fotoGrande']) ?>
                                <div class="annfu_annunci_foto">
                                    <a href="<?php echo $link ?>">
                                        <?php if (in_array(strtolower($info['extension']), ["png", "jpg", "jpeg", "gif"])): ?>
                                            <img src="<?php echo $annuncio['foto'] ?>" alt="<?php echo $annuncio['nominativo'] ?>">
                                        <?php else: ?>
                                            <img src="<?php echo ANNFU_PLUGIN_URL ?>/img/anonimo.jpg" alt="<?php echo $annuncio['nominativo'] ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="annfu_annunci_info_wrapper d-flex flex-column align-self-end">
                                <h2 class="annfu_annunci_nominativo mt-auto">
                                    <a href="<?php echo $link ?>">
                                        <?php echo $annuncio['titolo'] ?>
                                        <?php echo $annuncio['nominativo'] ?>
                                        <?php echo $annuncio['secondaRiga'] != '' ? '<br/>' . $annuncio['secondaRiga'] : '' ?>
                                        <?php echo $annuncio['terzaRiga'] != '' ? '<br/>' . $annuncio['terzaRiga'] : '' ?>
                                    </a>
                                </h2>
                                <div class="annfu_annunci_paese">
                                    <?php echo $annuncio['paese'] ?>, <?php echo date('d-m-Y', strtotime($annuncio['createdAt'])) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="clearfix"></div>
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_poweredby.php') ?>
        </div>

        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_paginazione.php') ?>

    </div>

</div>

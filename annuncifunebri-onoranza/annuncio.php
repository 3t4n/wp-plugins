<?php if (!defined('ABSPATH')) exit; ?>
<div class="annfu impresa-<?php echo str_replace(',', '-', get_option('annfu_onoranza_funebre_id')) ?> <?php echo in_array(get_option('annfu_onoranza_funebre_id'), ANNFU_GRUPPO_CONCORDIA) ? 'impresa-concordia' : '' ?>">

    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_custom-css.php') ?>

    <?php global $wp_query, $annuncio; ?>
    <?php $vars = $wp_query->query_vars; ?>

    <?php if (isset($vars['comune']) && isset($vars['slug'])): ?>

        <?php if (is_null($annuncio)): ?>
            <?php
            $response = wp_remote_get(ANNFU_SITE_API . "/v2/annunci/" . $vars['slug'], [
                'sslverify' => false,
                'timeout'   => ANNFU_REMOTE_TIMEOUT,
                'headers'   => ['of' => get_option('annfu_onoranza_funebre_id')]
            ]);
            ?>
            <?php $annuncio = json_decode(wp_remote_retrieve_body($response), true); ?>
        <?php endif; ?>

        <?php if (array_key_exists('error', $annuncio)): ?>
            <p>Annuncio non trovato</p>
        <?php else: ?>

            <?php $metaData = $annuncio['metaData'] ?>
            <?php $annuncio = $annuncio['data'] ?>

            <?php $response = wp_remote_get(ANNFU_SITE_API . "/v2/testiDefault", ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]); ?>
            <?php $testi = json_decode(wp_remote_retrieve_body($response), true); ?>

            <div class="annfu_wrapper <?php echo $annuncio['slug'] ?> <?php echo $annuncio['tipoAnnuncio'] ?>">

                <?php if (isset($_GET['msg'])): ?>
                    <?php if ($_GET['msg'] == 'verificato'): ?>
                        <div class="annfu_verificato">Grazie per aver verificato il tuo numero. La foto verrà inviata alla famiglia che deciderà
                            se renderla pubblica.
                        </div>
                    <?php elseif ($_GET['msg'] == 'non-verificato'): ?>
                        <div class="annfu_non_verificato">Non è stato possibile verificare la tua identità.</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (get_option('annfu_breadcrumbs') == 1): ?>
                    <div id="annfu_regione_provincia_comune">
                        <a href="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI ?>">Italia</a> /
                        <a href="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI . '/' . $annuncio['regione']['slug'] ?>"><?php echo $annuncio['regione']['regione'] ?></a>
                        /
                        <a href="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI . '/' . $annuncio['regione']['slug'] . '/' . $annuncio['provincia']['slug'] ?>"><?php echo $annuncio['provincia']['provincia'] ?></a>
                        /
                        <?php echo $annuncio['comune']['comune'] ?>
                    </div>
                <?php endif; ?>

                <?php $template = get_annfu_template(); ?>
                <?php if (file_exists(ANNFU_PLUGIN_PATH . 'templates/' . $template . '/_annuncio.php')): ?>
                    <?php include_once(ANNFU_PLUGIN_PATH . 'templates/' . $template . '/_annuncio.php') ?>
                <?php else: ?>
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_annuncio.php') ?>
                <?php endif; ?>

            </div>

            <div class="clearfix"></div>

            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_modal-testi.php') ?>
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_modal-fiori.php') ?>
            <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_modal-privacy.php') ?>

        <?php endif; ?>

        <?php $page = isset($_COOKIE['annuncifunebri_page']) ? annfu_decrypt($_COOKIE['annuncifunebri_page']) : 1; ?>

        <div class="annfu_ritorna_annunci mb-5">
            <a href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCI ?>/<?php echo $page ?>">Ritorna alla pagina degli annunci</a>
        </div>

        <?php $ofc = $annuncio['ofc'] ?>
        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_poweredby.php') ?>
        <script>
            jQuery( document ).ready(function() {
                saveVisit("<?php echo $annuncio['slug'] ?>", 2, location.href);
            });
        </script>
    <?php else : ?>
        <div id="annfu_annunci">Annuncio non trovato</div>
    <?php endif; ?>
</div>

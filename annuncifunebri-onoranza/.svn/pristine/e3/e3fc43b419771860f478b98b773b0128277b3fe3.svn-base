<?php if (count($r['data']) > 0): ?>
    <?php
        global $wp_query;
        $vars = $wp_query->query_vars;
        $currentPage = isset($vars['pg'])
            ? $vars['pg']
            : (isset($_COOKIE['annuncifunebri_page'])
                ? annfu_decrypt($_COOKIE['annuncifunebri_page'])
                : 1);
    ?>
    <div class="row my-3">
        <div class="col-12">
            <?php $pagine = ceil($r['metaData']['results'] / get_option('annfu_max_per_page', ANNFU_MAX_PER_PAGE)); ?>
            <?php $link = get_site_url() . '/' . ANNFU_PAGE_ANNUNCI . '/'; ?>
            <?php $link .= isset($_COOKIE['annuncifunebri_regione']) && $_COOKIE['annuncifunebri_regione'] != '' ? annfu_decrypt($_COOKIE['annuncifunebri_regione']) . '/' : '' ?>
            <?php $link .= isset($_COOKIE['annuncifunebri_provincia']) && $_COOKIE['annuncifunebri_provincia'] != '' ? annfu_decrypt($_COOKIE['annuncifunebri_provincia']) . '/' : '' ?>
            <div class="annfu_pagination">
                <?php for ($p = 1; $p <= $pagine; $p++): ?>
                    <?php if ($p == 1): ?>
                        <a href="<?php echo $link ?>1">Prima</a>
                    <?php endif; ?>
                    <?php if (abs($p - $currentPage) < get_option('annfu_pages')): ?>
                        <?php if ($p == $currentPage): ?>
                            <span class="current"><?php echo $p ?></span>
                        <?php else: ?>
                            <a href="<?php echo $link . $p ?>" class="inactive"><?php echo $p ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($p == $pagine): ?>
                        <a href="<?php echo $link . $pagine ?>">Ultima</a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <div class="annfu_nb_results">
                <?php echo $r['metaData']['results'] ?> risultat<?php echo $r['metaData']['results'] == 1 ? 'o' : 'i' ?>
            </div>
        </div>
    </div>
<?php endif; ?>

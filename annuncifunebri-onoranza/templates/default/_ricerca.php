<?php if (!defined('ABSPATH')) exit; ?>

<?php $response = wp_remote_get(ANNFU_SITE_API . '/v2/regioni', ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]); ?>
<?php $regioni = json_decode(wp_remote_retrieve_body($response), true); ?>

<?php $response = wp_remote_get(ANNFU_SITE_API . '/v2/province', ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]); ?>
<?php $province = json_decode(wp_remote_retrieve_body($response), true); ?>

<div id="annfu_annunci_filter">
    <div class="row">
        <div class="col-12">
            <div class="annfu_annunci_filter annfu_annunci_filter_front">
                <div class="front">
                    <form action="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI ?>/" method="get"
                          role="search">
                        <input type="hidden" name="avanzata" value="0">
                        <p>Inserisci il nome, cognome o il paese di residenza per ricercare il tuo caro</p>
                        <div class="form-group">
                            <input type="text" placeholder="Cerca ..." class="form-control" name="text"
                                   value="<?php echo isset($_COOKIE['annuncifunebri_text']) ? annfu_decrypt($_COOKIE['annuncifunebri_text']) : '' ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Cerca" class="annfu_filter_submit btn btn-default">
                            <a id="annfu_filter_front" class="annfu_filter_button annfu_pointer">ricerca avanzata</a>
                            <a href="?text=" id="annfu_show_all" class="annfu_filter_button">mostra tutti</a>
                        </div>
                    </form>
                </div>

                <div class="back">
                    <form action="<?php echo get_site_url() ?>/<?php echo ANNFU_PAGE_ANNUNCI ?>/" method="get"
                          role="search" class="hidden">
                        <input type="hidden" name="avanzata" value="1">

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <input type="text" placeholder="Nome" class="form-control" name="nome"
                                       value="<?php echo isset($_COOKIE['annuncifunebri_nome']) ? annfu_decrypt($_COOKIE['annuncifunebri_nome']) : '' ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <input type="text" placeholder="Cognome" class="form-control" name="cognome"
                                       value="<?php echo isset($_COOKIE['annuncifunebri_cognome']) ? annfu_decrypt($_COOKIE['annuncifunebri_cognome']) : '' ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <input type="text" placeholder="Dal (gg/mm/aaaa)" class="form-control datepicker"
                                       name="dal"
                                       value="<?php echo isset($_COOKIE['annuncifunebri_dal']) ? annfu_decrypt($_COOKIE['annuncifunebri_dal']) : '' ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <input type="text" placeholder="Al (gg/mm/aaaa)" class="form-control datepicker"
                                       name="al"
                                       value="<?php echo isset($_COOKIE['annuncifunebri_al']) ? annfu_decrypt($_COOKIE['annuncifunebri_al']) : '' ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <select name="regione" class="annfu_regione">
                                    <option value="" class="seleziona">Seleziona regione</option>
                                    <?php foreach ($regioni as $k => $v): ?>
                                        <?php $selected = isset($_COOKIE['annuncifunebri_regione']) && $v['slug'] == annfu_decrypt($_COOKIE['annuncifunebri_regione']) ? 'selected="selected"' : '' ?>
                                        <option value="<?php echo $v['slug'] ?>" <?php echo $selected ?>><?php echo $v['regione'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <select name="provincia" class="annfu_provincia">
                                    <option value="" class="seleziona">Seleziona provincia</option>
                                    <?php foreach ($province as $k => $v): ?>
                                        <?php $selected = isset($_COOKIE['annuncifunebri_provincia']) && $v['slug'] == annfu_decrypt($_COOKIE['annuncifunebri_provincia']) ? 'selected="selected"' : '' ?>
                                        <option value="<?php echo $v['slug'] ?>"
                                                class="r_<?php echo $v['regione']['slug'] ?>" <?php echo $selected ?>><?php echo $v['provincia'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <input type="text" placeholder="Paese" class="form-control" name="paese"
                                       value="<?php echo isset($_COOKIE['annuncifunebri_paese']) ? annfu_decrypt($_COOKIE['annuncifunebri_paese']) : '' ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit" value="Cerca" class="annfu_filter_submit btn btn-default"/>
                                <a id="annfu_filter_back" class="annfu_filter_button annfu_pointer">ricerca
                                    semplificata</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if (!defined('ABSPATH')) exit; ?>
<div class="annfu">
    <h1>Annunci Funebri / Pannello di amministrazione</h1>

    <?php
    $onoranzaFunebreId = get_option('annfu_onoranza_funebre_id', '');
    $paginaAnnunci = get_option('annfu_page_annunci', ANNFU_PAGE_ANNUNCI);
    $paginaAnnuncio = get_option('annfu_page_annuncio', ANNFU_PAGE_ANNUNCIO);
    $paginaDiretta = get_option('annfu_page_diretta', ANNFU_PAGE_DIRETTA);
    $maxPerPage = get_option('annfu_max_per_page', 12);
    $pagine = get_option('annfu_pages', 5);
    $ultimiAnnunci = get_option('annfu_ultimi_annunci', 8);
    $ultimiAnnunciPerSlide = get_option('annfu_ultimi_annunci_per_slide', 4);
    $bootstrap = get_option('annfu_bootstrap', 4);
    $template = get_option('annfu_template', 'default');
    $showLightbox = get_option('annfu_lightbox', 0);
    $linkFiori = get_option('annfu_link_fiori', '');
    $showBreadcrumbs = get_option('annfu_breadcrumbs', 0);
    $showPoweredBy = get_option('annfu_poweredby', 1);
    $showEpigrafeFacebook = get_option('annfu_epigrafe_facebook', 0);
    $abilitaNotifichePwa = get_option('annfu_abilita_notifiche_pwa', 0);
    $notifichePwaFixed = get_option('annfu_notifiche_pwa_fixed', 0);
    $customPrivacy = get_option('annfu_custom_privacy', '');
    $css = get_option('annfu_css', '');
    $cssPwa = get_option('annfu_css_pwa', '');
    $searchConsole = get_option('annfu_search_console', '');

    if(get_option('annfu_invito_download_pwa_android') == '') {
        update_option('annfu_invito_download_pwa_android', 'Scarica la nostra app');
    }
    if(get_option('annfu_invito_download_pwa_ios') == '') {
        update_option('annfu_invito_download_pwa_ios', 'Installa la nostra cliccando sul pulsante "condividi" e poi su "aggiungi alla schermata home"');
    }

    $afOptions = annfu_get_options();
    $afOptionsValues = annfu_get_options_values();

    $templates = ['default' => 'Default'];
    if ($onoranzaFunebreId && file_exists(ANNFU_PLUGIN_PATH . 'templates/' . $onoranzaFunebreId . '/_annuncio.php')) {
        $templates = $templates + [$onoranzaFunebreId => 'Personalizzato'];
    } elseif (array_intersect(explode(",", $onoranzaFunebreId), ANNFU_GRUPPO_CONCORDIA) && file_exists(ANNFU_PLUGIN_PATH . 'templates/concordia/_annuncio.php')) {
        $templates = $templates + ['concordia' => 'Personalizzato Concordia'];
    }
    ?>

    <div class="annfu_form_wrap">

        <form method="post" action="options.php">

            <div> <!-- tabs container -->

                <!-- nav tabs -->
                <div class="nav nav-tabs" role="tablist">
                    <a class="nav-item nav-link active" href="#annfu_home" role="tab" data-toggle="tab">Utilizzo</a>
                    <a class="nav-item nav-link" href="#annfu_colors" role="tab" data-toggle="tab">Colori</a>
                    <a class="nav-item nav-link" href="#annfu_css_custom" role="tab" data-toggle="tab">CSS
                        personalizzato</a>
                    <a class="nav-item nav-link" href="#annfu_testi" role="tab" data-toggle="tab">Testi aggiuntivi</a>
                    <a class="nav-item nav-link" href="#annfu_own_privacy" role="tab" data-toggle="tab">Privacy
                        personalizzata</a>
                </div>

                <div class="tab-content"> <!-- tab panes -->

                    <div role="tabpanel" class="tab-pane p-3 active" id="annfu_home">
                        <h2>Utilizzo</h2>
                        <div class="clearfix">
                            codici da inserire in una pagina o articolo per visualizzare rispettivamente l'elenco degli
                            annunci e il singolo annuncio<br/><br/>
                            <pre class="annfu_code d-inline mr-3">[ANNFU_ANNUNCI]</pre>
                            <pre class="annfu_code d-inline mr-3">[ANNFU_ANNUNCIO]</pre>
                            <pre class="annfu_code d-inline">[ANNFU_DIRETTA]</pre>
                            <br/><br/>
                            in caso di problemi, inviare un'email a <a href="mailto:info@annuncifunebri.it">info@annuncifunebri.it</a>
                        </div>

                        <h2>Configurazione</h2>
                        <?php settings_fields('af-settings'); ?>
                        <?php do_settings_sections('af-settings'); ?>

                        <div class="annfu_form_row">
                            <input type="text" size="12" name="annfu_onoranza_funebre_id"
                                   value="<?php echo $onoranzaFunebreId ?>" class="annfu_input"
                                   placeholder="<?php echo __('#ID onoranza/e', 'af') ?>"/>
                            <span class="annfu_helper">#ID onoranza funebre; in caso di più onoranze, separare i valori con la virgola</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="12" name="annfu_page_annunci" value="<?php echo $paginaAnnunci ?>"
                                   class="annfu_input"
                                   placeholder="<?php echo __('nome (slug) della pagina', 'af') ?>"/>
                            <span class="annfu_helper">Nome (slug) della pagina degli annunci</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="12" name="annfu_page_annuncio"
                                   value="<?php echo $paginaAnnuncio ?>" class="annfu_input"
                                   placeholder="<?php echo __('nome (slug) della pagina', 'af') ?>"/>
                            <span class="annfu_helper">Nome (slug) della pagina del singolo annuncio</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="12" name="annfu_page_diretta"
                                   value="<?php echo $paginaDiretta ?>" class="annfu_input"
                                   placeholder="<?php echo __('nome (slug) della pagina', 'af') ?>"/>
                            <span class="annfu_helper">Nome (slug) della pagina della diretta del funerale</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="3" name="annfu_max_per_page" value="<?php echo $maxPerPage ?>"
                                   class="annfu_input" placeholder="<?php echo __('n.', 'af') ?>"/>
                            <span class="annfu_helper">Numero di annunci per pagina</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="3" name="annfu_pages" value="<?php echo $pagine ?>"
                                   class="annfu_input" placeholder="<?php echo __('n.', 'af') ?>"/>
                            <span class="annfu_helper">Numero pagine da visualizzare nella paginazione prima e dopo la pagina corrente</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="3" name="annfu_ultimi_annunci" value="<?php echo $ultimiAnnunci ?>"
                                   class="annfu_input" placeholder="<?php echo __('n.', 'af') ?>"/>
                            <span class="annfu_helper">Numero di annunci da visualizzare nel carosello</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="text" size="3" name="annfu_ultimi_annunci_per_slide"
                                   value="<?php echo $ultimiAnnunciPerSlide ?>"
                                   class="annfu_input" placeholder="<?php echo __('n.', 'af') ?>"/>
                            <span class="annfu_helper">Numero di annunci per slide da visualizzare nel carosello</span>
                        </div>
                        <div class="annfu_form_row my-4">
                            <div class="annfu_helper mb-2 mx-0">Seleziona la versione di bootstrap utilizzata dal tema
                            </div>
                            <label><input type="radio" name="annfu_bootstrap"
                                          value="3" <?php echo $bootstrap == '3' ? 'checked="checked"' : '' ?>/>
                                Bootstrap 3</label><br/>
                            <label><input type="radio" name="annfu_bootstrap"
                                          value="4" <?php echo $bootstrap == '4' ? 'checked="checked"' : '' ?>/>
                                Bootstrap 4</label><br/>
                            <label><input type="radio" name="annfu_bootstrap"
                                          value="0" <?php echo $bootstrap == '0' ? 'checked="checked"' : '' ?>/>
                                Non utilizza Bootstrap</label><br/>
                        </div>
                        <div class="annfu_form_row my-4 <?php echo count($templates) > 1 ? '' : 'd-none' ?>">
                            <div class="annfu_helper mb-2 mx-0">Seleziona il template che vuoi utilizzare</div>
                            <?php foreach ($templates as $k => $v): ?>
                                <label>
                                    <input type="radio" name="annfu_template"
                                           value="<?php echo $k ?>" <?php echo $template == $k ? 'checked="checked"' : '' ?>/>
                                    <?php echo $v ?>
                                </label><br/>
                                <div class="annfu_link_fiori <?php echo $v == 'Personalizzato' && in_array($onoranzaFunebreId, [226, 378]) ? '' : 'd-none' ?>">
                                    <input type="text" size="30" name="annfu_link_fiori"
                                           value="<?php echo $linkFiori ?>"
                                           class="annfu_input" placeholder="<?php echo __('https://...', 'af') ?>"/>
                                    <span class="annfu_helper">Link alla pagina dei fiori</span>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_epigrafe_facebook"
                                   value="1" <?php echo $showEpigrafeFacebook == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Visualizza epigrafe, se disponibile, in anteprima Facebook</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_lightbox"
                                   value="1" <?php echo $showLightbox == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Utilizza lightbox per effetti sulle foto</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_breadcrumbs"
                                   value="1" <?php echo $showBreadcrumbs == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Visualizza breadcrumbs nella pagina dell'annuncio</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_poweredby"
                                   value="1" <?php echo $showPoweredBy == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Visualizza il testo "powered by annuncifunebri.it" in fondo alle schermate annunci e annuncio</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_abilita_notifiche_pwa"
                                   value="1" <?php echo $abilitaNotifichePwa == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Abilita le notifiche push (funzionante solo in caso di creazione della PWA)</span>
                        </div>
                        <div class="annfu_form_row">
                            <input type="checkbox" name="annfu_fixed_notifiche_pwa"
                                   value="1" <?php echo $notifichePwaFixed == 1 ? 'checked="checked"' : '' ?>/>
                            <span class="annfu_helper">Ancora in alto il messaggio di invito a scaricare la PWA</span>
                        </div>

                        <div class="annfu_form_row">
                            <input type="text" size="40" name="annfu_search_console"
                                   value="<?php echo $searchConsole ?>"
                                   class="annfu_input"
                                   placeholder="<?php echo __('codice per la search console', 'af') ?>"/>
                            <span class="annfu_helper">
                                <a href="https://search.google.com/u/6/search-console/welcome">Codice fornito dalla Google Search Console, reperibile da
                                qui</a>
                            </span>
                        </div>

                        <br/>
                        <input type="submit" value="<?php echo __('Salva configurazione', 'af') ?>"
                               class="button button-primary" id="submit"
                               name="submit">

                    </div>

                    <div role="tabpanel" class="tab-pane p-3" id="annfu_colors">
                        <?php include_once('_backoffice-colors.php'); ?>
                    </div>

                    <div role="tabpanel" class="tab-pane p-3" id="annfu_css_custom">
                        <div class="annfu_form_row">
                            <p>CSS personalizzato</p>
                            <textarea rows="30" cols="80" name="annfu_css" id="annfu_textarea" class="annfu_textarea"
                                      placeholder="<?php echo __('CSS personalizzato', 'af') ?>"><?php echo $css ?></textarea>
                            <div id="annfu_editor"></div>
                        </div>
                        <div class="annfu_form_row mt-4">
                            <p>CSS personalizzato banner PWA</p>
                            <textarea rows="30" cols="80" name="annfu_css_pwa" id="annfu_textarea_pwa" class="annfu_textarea"
                                      placeholder="<?php echo __('CSS personalizzato PWA', 'af') ?>"><?php echo $cssPwa ?></textarea>
                            <div id="annfu_editor_pwa"></div>
                        </div>
                        <input type="submit" value="<?php echo __('Salva CSS personalizzato', 'af') ?>"
                               class="button button-primary" id="submit"
                               name="submit">
                    </div>

                    <div role="tabpanel" class="tab-pane p-3" id="annfu_testi">
                        <?php include_once('_testi-aggiuntivi.php'); ?>
                    </div>

                    <div role="tabpanel" class="tab-pane p-3" id="annfu_own_privacy">
                        <?php include_once('_custom-privacy.php'); ?>
                    </div>

                </div> <!-- end tab panes -->

            </div> <!-- end tabs container -->

        </form>
    </div>
</div>
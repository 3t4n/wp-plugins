<?php if (!defined('ABSPATH')) exit; ?>
<div class="annfu">
    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_custom-css.php') ?>

    <?php global $wp_query; ?>
    <?php $vars = $wp_query->query_vars; ?>

    <?php if (isset($vars['slug'])): ?>

        <?php $response = wp_remote_get(ANNFU_SITE_API . "/v2/direttaFunerale/" . $vars['slug'] . '?of=' . get_option('annfu_onoranza_funebre_id'), ['sslverify' => false, 'timeout' => ANNFU_REMOTE_TIMEOUT]); ?>
        <?php $streaming = json_decode(wp_remote_retrieve_body($response), true); ?>

        <?php if (array_key_exists('error', $streaming)): ?>
            <p>Annuncio non trovato</p>
        <?php else: ?>
            <?php if (!is_null($streaming) && count($streaming['data']) > 0): ?>
                <?php $streaming = $streaming['data']; ?>
                <div class="annfu_wrapper">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="annfu_streaming text-center">
                                <?php if (filter_var($streaming['annuncio']['streaming_funerale'], FILTER_VALIDATE_URL)): ?>
                                    <h2>Clicca sul pulsante play per guardare il funerale di <?php echo $streaming['annuncio']['nominativo'] ?></h2>
                                    <iframe id="annfu_streaming_funerale_youtube" width="100%" height="405px"
                                            src="https://www.youtube.com/embed/<?php echo str_replace('https://youtu.be/', '', $streaming['annuncio']['streaming_funerale']) ?>?autoplay=1&modestbranding=1&rel=0&showinfo=0&color=white&iv_load_policy=3&enablejsapi=1&wmode=opaque"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                <?php elseif (isset($streaming['streaming'])): ?>

                                <?php if (is_null($streaming['streaming'][0]['password']) || (isset($_COOKIE['annuncifunebri_streaming']) && annfu_decrypt($_COOKIE['annuncifunebri_streaming']) == $streaming['streaming'][0]['password'])): ?>
                                    <h2>Stai seguendo la diretta del funerale
                                        di<br/><?php echo $streaming['annuncio']['nominativo'] ?></h2>
                                    <p class="annfu_ricarica_pagina">In caso di problemi di visualizzazione, ricaricare
                                        la pagina.</p>

                                <?php foreach ($streaming['streaming'] as $k => $v): ?>
                                    <div id="player<?php echo $k ?>" class="annfu_player"></div>
                                    <script>
                                        var playerElement = document.getElementById("player<?php echo $k ?>");

                                        var ErrorPlugin = Clappr.ContainerPlugin.extend({
                                            name: 'error_plugin',
                                            bindEvents: function () {
                                                this.listenTo(this.container, Clappr.Events.CONTAINER_ERROR, this.onError)
                                            },
                                            hide: function () {
                                                this._err && this._err.remove()
                                            },
                                            show: function () {
                                                var $ = Clappr.$
                                                this.hide();
                                                var txt = (this.options.errorPlugin && this.options.errorPlugin.text) ? this.options.errorPlugin.text : 'Trasmissione interrotta.';
                                                this._err = $('<div class="annfu_streaming_player_sfondo">')
                                                    .css({'background-image': 'url(<?php echo annfu_fix_url($streaming['annuncio']['foto']) ?>)'})
                                                    .append($('<h2>' + txt + '</h2><p>Nuovo tentativo di connessione tra <span class="retry-counter">10</span> secondi</p>'));
                                                this.container && this.container.$el.prepend(this._err);
                                            },
                                            onError: function (e) {
                                                if (!this.container) return;
                                                this.show();
                                                this.container.getPlugin('click_to_pause').disable();
                                                var tid, t = 10, retry = function () {
                                                    clearTimeout(tid);
                                                    if (t === 0) {
                                                        this.container.getPlugin('click_to_pause').enable();
                                                        if (this.options.errorPlugin && this.options.errorPlugin.onRetry) {
                                                            this.options.errorPlugin.onRetry(e);
                                                            return;
                                                        } else {
                                                            this.container.stop();
                                                            this.container.play();
                                                            return;
                                                        }
                                                    }
                                                    $('.retry-counter').text(t);
                                                    t--;
                                                    tid = setTimeout(retry, 1000);
                                                }.bind(this);
                                                retry();
                                            }
                                        });

                                        var player = new Clappr.Player({
                                            disableErrorScreen: true, // Disable the internal error screen plugin
                                            source: "<?php echo $v['url'] ?>",
                                            poster: '<?php echo $streaming['annuncio']['foto'] ?>',
                                            plugins: [ErrorPlugin],
                                            errorPlugin: {
                                                text: 'Trasmissione interrotta.',
                                                onRetry: function (e) {
                                                    player.configure({
                                                        source: player.options.source,
                                                        autoPlay: true,
                                                    });
                                                }
                                            },
                                            width: '100%',
                                            height: '100%',
                                        });

                                        player.attachTo(playerElement);


                                    </script>

                                <?php endforeach; ?>
                                <?php else: ?>
                                    <h2>Inserisci la password per seguire la diretta del funerale
                                        di<br/><?php echo $streaming['annuncio']['nominativo'] ?></h2>
                                    <div class="annfu_streaming_player_wrapper">
                                        <div class="annfu_streaming_player_sfondo"
                                             style="background-image:url(<?php echo annfu_fix_url($streaming['annuncio']['foto']) ?>)"></div>
                                        <form method="post" action="." class="annfu_streaming_login">
                                            <label for="password">Inserisci la password</label>
                                            <div class="input-group">
                                                <input type="text" name="password" id="password" placeholder="password"
                                                       required autocomplete="off"/>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit">Invia</button>
                                                </span>
                                            </div>
                                            <?php if (isset($_POST['password'])): ?>
                                                <div class="has-error">
                                                    <strong class="help-block">Password errata.</strong>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                <?php endif; ?>

                                <?php elseif (isset($streaming['prossimo'])): ?>
                                    <h2>La diretta del funerale di <?php echo $streaming['annuncio']['nominativo'] ?>
                                        inizierà poco prima della cerimonia</h2>
                                    <p class="annfu_streaming_info_play">Il video sarà disponibile quando comparirà il
                                        tasto "play".<br/>In caso di
                                        problemi di visualizzazione, ricaricare la pagina.</p>
                                    <div class="annfu_streaming_player_wrapper">
                                        <div class="annfu_streaming_player_sfondo"
                                             style="background-image:url(<?php echo annfu_fix_url($streaming['annuncio']['foto']) ?>)"></div>
                                    </div>
                                    <script type="text/javascript">
                                        setTimeout(function () {
                                            window.location.reload(1);
                                        }, 30000);


                                    </script>

                                <?php elseif ($streaming['annuncio']['in_attesa_youtube'] == 1): ?>
                                    <h2>La diretta del funerale di <?php echo $streaming['annuncio']['nominativo'] ?> è
                                        terminata.</h2>
                                    <p>A breve sarà disponibile il video della registrazione.</p>
                                    <div class="annfu_streaming_player_wrapper">
                                        <div class="annfu_streaming_player_sfondo"
                                             style="background-image:url(<?php echo annfu_fix_url($streaming['annuncio']['foto']) ?>)"></div>
                                    </div>
                                    <script type="text/javascript">
                                        setTimeout(function () {
                                            window.location.reload(1);
                                        }, 30000);


                                    </script>
                                <?php endif; ?>

                                <p class="annufu_streaming_testo">Lascia <strong>gratuitamente</strong> un messaggio di
                                    cordoglio, sarà nostra cura
                                    consegnarlo ai congiunti di <?php echo $streaming['annuncio']['nominativo'] ?>.<br/>Tutti
                                    i pensieri verranno
                                    anche <strong>stampati e consegnati ai congiunti</strong> in ricordo.</p>
                                <a class="btn btn-default" href="<?php echo $streaming['annuncio']['url'] ?>">Lascia un
                                    messaggio di cordoglio.</a>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            <?php endif; ?>

        <?php endif; ?>

        <div><a href="<?php echo get_site_url() . '/' . ANNFU_PAGE_ANNUNCI ?>">Vai alla pagina degli annunci</a></div>
        <?php if (get_option('annfu_poweredby') == 1): ?>
            <div class="text-right annfu_poweredby">
                <?php if (isset($streaming['annuncio']['ofc']) && $streaming['annuncio']['ofc']): ?>
                    generato da <a href="https://onoranzefunebricloud.com?rel=p-af" target="_blank">eterno</a> e
                    <a href="<?php echo ANNFU_SITE ?>?rel=p-af" target="_blank">annuncifunebri</a>
                <?php else: ?>
                    <a href="<?php echo ANNFU_SITE ?>?rel=p-af" target="_blank">generato da annuncifunebri</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else : ?>
        <div id="annfu_annunci">Annuncio non trovato</div>
    <?php endif; ?>
</div>

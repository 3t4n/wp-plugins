<div class="annfu_partecipazioni_cordogli_wrapper">
    <div class="row">
        <div class="col-12">
            <?php if (count($annuncio['partecipazioni']) > 0 || count($annuncio['cordogli']) > 0): ?>
                <h3 class="mt-5 text-center">Tutti i messaggi di cordoglio</h3>
            <?php endif; ?>

            <div class="annfu_partecipazioni">
                <?php if (count($annuncio['partecipazioni']) > 0): ?>
                    <div class="annfu_partecipazioni_wrapper">
                        <?php $partecipazioni = []; ?>
                        <?php foreach ($annuncio['partecipazioni'] as $partecipazione): ?>
                            <?php $partecipazioni[] = $partecipazione['utente']; ?>
                        <?php endforeach; ?>
                        <?php echo implode(', ', $partecipazioni); ?>
                        <?php echo ' partecipa' . (count($annuncio['partecipazioni']) == 1 ? '' : 'no') . ' al lutto'; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php $count = count($annuncio['cordogli']); ?>
            <div class="annfu_cordogli">

                <?php $cordoglioId = isset($_COOKIE['cordoglio_id']) ? esc_html($_COOKIE['cordoglio_id']) : null; ?>
                <?php $annuncioHash = isset($_COOKIE['hash']) ? esc_html($_COOKIE['hash']) : null; ?>

                <?php if ($cordoglioId && $annuncioHash == $annuncio['hash'] && !in_array($cordoglioId, $annuncio['cordogli_approvati'])): ?>
                    <div class="annfu_cordoglio annfu_cordoglio_in_approvazione p-0">
                        <div class="row">
                            <?php if ($_COOKIE['cordoglio_visibile'] == 0): ?>
                                <div class="annfu_cordoglio_non_visibile col-xs-12 col-sm-12 col-md-12 mb-4 text-center">
                                    <strong><i class="fas fa-exclamation-triangle"></i> Questo cordoglio NON è pubblico; è visibile solamente su
                                        questo computer</strong>
                                </div>
                            <?php endif ?>
                            <div class="annfu_data_cordoglio col-xs-12 col-sm-12 col-md-12 py-1"><?php echo date_i18n('d F Y', strtotime($_COOKIE['cordoglio_data'])) ?> <em class="float-right">in attesa di lavorazione</em></div>
                            <div class="annfu_cordoglio_intestazione col-xs-12 col-sm-12 col-md-12 my-3">
                                <strong><?php echo esc_html($_COOKIE['cordoglio_nome']) ?></strong>
                            </div>
                            <div class="annfu_cordoglio_testo col-xs-12 col-sm-12 col-md-12"><?php echo esc_html($_COOKIE['cordoglio_testo']) ?></div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php unset($_COOKIE['cordoglio_id']) ?>
                <?php endif ?>


                <?php if ($count > 0): ?>

                    <?php foreach ($annuncio['cordogli'] as $cordoglio): ?>
                        <div class="annfu_cordoglio p-0">
                            <div class="row">
                                <div class="annfu_data_cordoglio col-xs-12 col-sm-12 col-md-12 py-1"><?php echo date_i18n('d F Y', strtotime($cordoglio['data'])) ?></div>
                                <div class="annfu_cordoglio_intestazione col-xs-12 col-sm-12 col-md-12 my-3">
                                    <strong><?php echo $cordoglio['utente'] ?></strong></div>
                                <div class="annfu_cordoglio_testo col-xs-12 col-sm-12 col-md-12"><?php echo $cordoglio['testo'] ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

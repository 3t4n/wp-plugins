<?php $testi = [
    "Sinceramente dispiaciuti per la triste circostanza, porgiamo le nostre condoglianze",
    "In questa triste circostanza, porgiamo sentite condoglianze.",
    "So che le parole sono ben poca cosa in momenti come questo, ma il mio cuore è con voi.",
    "La triste notizia ci ha veramente colpiti. Condoglianze.",
    "Mancherà tanto a tutti noi, ma resterà sempre vivo nei nostri ricordi."
]; ?>

<div id="annfu_modal_testi_ricordi_floreali" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Testi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php foreach ($testi as $testo): ?>
                    <div class="annfu_testo_default">
                        <span><?php echo $testo ?></span>
                        <a class="annfu_pointer annfu_copia_testo_ricordo_floreale">Copia il testo</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

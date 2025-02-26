<div id="annfu_modal_testi" class="modal fade" tabindex="-1" role="dialog">
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
                        <a class="annfu_pointer annfu_copia_testo">Copia il testo</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

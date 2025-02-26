<?php if (isset($annuncio['streaming']['in_corso'])): ?>
    <a href="<?php echo '/' . ANNFU_PAGE_DIRETTA . '/' . $annuncio['slug'] ?>" class="btn btn-default">
        <i class="fas fa-play streaming-play-icon"></i> Segui la diretta del funerale
    </a>
<?php endif; ?>

<?php if (isset($annuncio['streaming']['prossimo'])): ?>
    <p><em><i class="fas fa-play streaming-play-icon"></i> La diretta inizierà poco prima della cerimonia</em></p>
<?php endif; ?>

<?php if ($annuncio['streamingFunerale'] != ''): ?>
    <a href="<?php echo '/' . ANNFU_PAGE_DIRETTA . '/' . $annuncio['slug'] ?>" class="btn btn-default"
       target="_blank">
        <i class="fas fa-play streaming-play-icon"></i> Clicca qui per vedere la registrazione del funerale
    </a>
<?php endif; ?>

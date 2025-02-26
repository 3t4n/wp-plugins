<?php if ($annuncio['abilitatoFotoCordogli']): ?>
    <div class="clearfix"></div>
    <div class="annfu_foto_cordogli_wrapper">
        <?php if (count($annuncio['fotoCordogli']) > 0): ?>
            <div class="annfu_foto_cordogli">
                <?php foreach ($annuncio['fotoCordogli'] as $k => $foto): ?>
                    <figure class="annfu_pointer">
                        <a href="<?php echo $foto['url'] ?>"
                           title="<?php echo esc_html($foto['didascalia'] . ' - inviata da ' . $foto['mittente']) ?>" rel="fc1">
                            <img src="<?php echo $foto['url'] ?>" alt="<?php echo esc_html($foto['didascalia']) ?>"
                                 title="<?php echo esc_html($foto['didascalia'] . ' - inviata da' . $foto['mittente']) ?>"/>
                            <figcaption><strong><?php echo $foto['mittente'] ?></strong><br/><?php echo $foto['didascalia'] ?></figcaption>
                        </a>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="<?php echo count($annuncio['fotoCordogli']) > 0 ? "annfu_foto_cordogli_invito" : "annfu_foto_cordogli_invito_senza_foto" ?> annfu_text_center">
            <a class="annfu_open_tab_foto annfu_pointer">
                <i class="far fa-images"></i> Se desideri inviare una o più foto in ricordo di <?php echo $annuncio['nominativo'] ?> clicca qui
            </a>
        </div>
    </div>
<?php endif; ?>

<?php if ($countOpere > 0): ?>
    <div class="annfu_opere_bene">
        <?php foreach ($annuncio['opereBene'] as $k => $v): ?>
            <div class="annfu_opera_bene mb-4">
                <h4 class="annfu_opera_bene_denominazione"><?php echo $v['titolo'] ?></h4>
                <?php if(!is_null($v['logo'])): ?>
                    <img src="<?php echo $v['logo'] ?>" class="annfu_opera_bene_logo" />
                <?php endif; ?>
                <div class="annfu_opera_bene_descrizione"><?php echo $v['descrizione'] ?></div>
                <?php if($v['paypal'] != ''): ?>
                    <div class="annfu_opera_bene_paypal text-right">
                        <a href="<?php echo $v['paypal'] ?>" target="_blank" class="btn annfu_invio annfu_opere_bene_a" data-ob="<?php echo $v['titolo'] ?>">DONA ORA</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

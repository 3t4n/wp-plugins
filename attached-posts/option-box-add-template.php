<h4><?php Echo $this->t('Install a template in ZIP format') ?></h4>
<p><?php Echo $this->t('If you have a template in a .zip format, you may install it by uploading it here.') ?></p>
<p><?php Echo $this->t('Template as ZIP File') ?>: <input type="file" class="disabled" <?php Disabled(True) ?> ></p>

<h4><?php Echo $this->t('Install a template in PHP/CSS format') ?></h4>
<p><?php Echo $this->t('If you have a template in a .php (and .css format), you may install it by uploading it here.') ?></p>
<p><?php Echo $this->t('Templates PHP File') ?>: <input type="file" class="disabled" <?php Disabled(True) ?> ></p>
<p><?php Echo $this->t('Templates CSS File') ?> <small>(<?php Echo $this->t('not required') ?>)</small>: <input type="file" class="disabled" <?php Disabled(True) ?> ></p>

<p><input type="submit" value="<?php Echo $this->t('Install template and save all options') ?>" class="button-primary" <?php Disabled(True) ?> ></p>
<p class="pro-notice"><?php $this->Pro_Notice() ?></p>
<section class="tab-import" id="import">
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-wrapper">
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
            <h2><?php _e('Import Settings', SEOTM_PREFIX) ?></h2>
        </div>
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-main pt-0">
            <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
                <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
                    <input type="file" name="import_file" id="import_file" readonly="readonly" accept=".json">
                </div>
                <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-8 pl-2">
                    <?php _e('Import your saved settings', SEOTM_PREFIX) ?>
                </div>
            </div>
        </div>
    </div>
</section>
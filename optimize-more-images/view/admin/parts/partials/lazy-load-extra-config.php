<div style="border-top: 1px solid #f3f3f3;border-bottom: 1px solid #f3f3f3;margin:1.5em 0;padding:1.85em 0">
    <div class="opm_img-body-header pb-8" style="border-bottom:0">
         <h2><?php _e('Extra lazysizes config ', 'opm_img') ?></h2>
    </div>
    <div class="opm_img-help flex-full-width pl-2">
        <?php _e('Modify the default lazysizes configuration. Read the <a href="https://github.com/aFarkas/lazysizes/#js-api---options" target="_blank">docs</a>.', 'opm_img') ?>
    </div>
    <div class="flex flex-full-width pt-4">
        <div class="opm_img-input flex-full-width mb-15">
            <textarea placeholder="<?php _e( 'e.g.:&#13;&#10;window.lazySizesConfig = window.lazySizesConfig || {};&#13;&#10;lazySizesConfig.expand = 360;&#13;&#10;lazySizesConfig.preloadAfterLoad = true;' ); ?>" class="textarea-custom" rows="9" name="lazysizes_extra_config"><?php echo opm_img_field_setting('lazysizes_extra_config') ?></textarea>
        </div>
    </div>
</div>
<emb3d-viewer id="emv-viewer-woo" <?php if ($registration_key) echo 'key="' . esc_attr($registration_key) . '"' ?>></emb3d-viewer>
<?php if ($GLOBALS[Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE]) {
?>
    <script>
        (function() {
            let figure = jQuery('.woocommerce-product-gallery__wrapper');
            let viewer = jQuery('#emv-viewer-woo');
            viewer.css('width', figure.css('width'));
            viewer.css('height', figure.css('height'));
            <?php if ($background_color) { ?>
            viewer.css('backgroundColor', '<?php echo esc_js($background_color) ?>');
            <?php } ?>
            <?php if ($progress_color) { ?>
            viewer.css('--progress-color', '<?php echo esc_js($progress_color) ?>');
            <?php } ?>
            viewer.attr('src', '<?php echo esc_js($model_url) ?>');

            // remove zoom icon
            let gallery = jQuery('.woocommerce-product-gallery');
            gallery.on('wc-product-gallery-before-init', function(event, target, params) {
                params = params || {};
                params.zoom_enabled = false;
            });

            figure.hide();
            figure.parent().append(viewer);
        })();
    </script>
<?php } else { ?>
    <script>
        (function() {
            let figure = jQuery('.woocommerce-product-gallery__wrapper');
            let button = `<button class="emv-woo-view-3d-button"><?php esc_html_e('View in 3D', 'emb3d-model-viewer') ?></button>`;
            figure.append(button);
            figure.find('.emv-woo-view-3d-button').click(() => {
                let viewer = jQuery('#emv-viewer-woo');
                <?php if ($background_color) { ?>
                viewer.css('backgroundColor', '<?php echo esc_js($background_color) ?>');
                <?php } ?>
                <?php if ($progress_color) { ?>
                viewer.css('--progress-color', '<?php echo esc_js($progress_color) ?>');
                <?php } ?>
                viewer.attr('src', '<?php echo esc_js($model_url) ?>');

                jQuery('body').append('<div id="emv-woo-modal" class="modal"></div>');
                let modal = jQuery('#emv-woo-modal');

                viewer.parent().remove('#emv-viewer-woo');
                modal.append(viewer);

                modal.dialog({
                    modal: true,
                    width: 512,
                    height: 512
                });
            });
        })();
    </script>
<?php } ?>

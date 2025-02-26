<?php
$model_id = get_post_meta($post->ID, Emb3D::META_BOX_MODEL_ID, true);
$model_url = $model_id ? wp_get_attachment_url($model_id) : '';
$model_filename = get_post_meta($post->ID, Emb3D::META_BOX_MODEL_FILENAME, true);
$replace_product_image = intval(get_post_meta($post->ID, Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE, true));
$background_color = get_post_meta($post->ID, Emb3D::META_BOX_MODEL_BACKGROUND_COLOR, true);
if (empty($background_color)) $background_color = '#00346c';
$progress_color = get_post_meta($post->ID, Emb3D::META_BOX_MODEL_PROGRESS_COLOR, true);
if (empty($progress_color)) $progress_color = '#87cefa';
?>

<div id="emv-meta-box-output" class="emv-container">
    <div class="emv-col emv-wrap">
        <div>
            <input type="hidden" id="<?php echo Emb3D::META_BOX_MODEL_ID ?>" name="<?php echo Emb3D::META_BOX_MODEL_ID ?>" value="<?php echo esc_html($model_id) ?>">
            <input type="hidden" id="<?php echo Emb3D::META_BOX_MODEL_FILENAME ?>" name="<?php echo Emb3D::META_BOX_MODEL_FILENAME ?>" value="<?php esc_html($model_filename) ?>">
            <input type="hidden" name="<?php echo Emb3D::META_BOX_NONCE ?>" value="<?php echo wp_create_nonce(Emb3D::META_BOX_NONCE) ?>">
        </div>
        <div class="emv-row hide-if-no-js">
            <button id="emv-select-model" type="button" class="button emv"><?php esc_html_e('Select model', 'emb3d-model-viewer') ?></button>
        </div>
        <div id="emv-model" style="<?php if (!$model_id) echo 'display: none;' ?>">
            <div class="emv-row emv-py-1 emv-bold">
                <?php if (!empty($model_filename)) {
                    echo esc_html($model_filename);
                ?>
                    <a id="emv-remove-model" class="hide-if-no-js" title="<?php esc_html_e('Remove model', 'emb3d-model-viewer') ?>" href="#">
                        <span class="dashicons dashicons-remove"></span>
                    </a>
                <?php } ?>
            </div>
            <div class="emv-row">
                <label class="selectit"><?php esc_html_e('Replace product image', 'emb3d-model-viewer') ?></label>
                <input type="checkbox" name="<?php echo Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE ?>" <?php if ($replace_product_image) echo 'checked="checked"' ?>>
            </div>

            <div class="emv-row label">
                <label class="selectit"><?php esc_html_e('Background Color', 'emb3d-model-viewer') ?></label>
            </div>
            <div class="emv-row">
                <input type="text" class="color-picker" data-alpha-enabled="true" name="<?php echo Emb3D::META_BOX_MODEL_BACKGROUND_COLOR ?>" value="<?php echo esc_html($background_color) ?>">
            </div>

            <div class="emv-row label">
                <label class="selectit"><?php esc_html_e('Progress Bar', 'emb3d-model-viewer') ?></label>
            </div>
            <div class="emv-row">
                <input type="text" class="color-picker" data-alpha-enabled="true" name="<?php echo Emb3D::META_BOX_MODEL_PROGRESS_COLOR ?>" value="<?php echo esc_html($progress_color) ?>">
            </div>

        </div>
    </div>
</div>

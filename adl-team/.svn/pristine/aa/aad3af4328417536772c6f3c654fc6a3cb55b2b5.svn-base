<?php
$id = (array_key_exists('id', $args)) ? $args['id'] : array(); ?>


<div class="cmb-row cmb-type-text-medium adl_social_field_wrapper" id="socialID-<?= $id; ?>">
    <div class="cmb-th adl_team_meta_label">
        <select name="social[<?= $id; ?>][id]">
            <?php foreach ( $ADL_team->adl_social_links() as $nameID => $socialName ) { ?>
                <option value='<?= esc_attr($nameID); ?>'> <?= esc_html($socialName); ?></option>;
            <?php } ?>
        </select>
    </div>
    <div class="cmb-td">
        <input type="url" name="social[<?= $id; ?>][url]" class="cmb2-text-medium adl_social_input" value="" placeholder="eg. http://example.com" required><span data-id="<?= $id; ?>" class="removeSocialField dashicons dashicons-dismiss" title="Remove this item"></span> <span class="adl-move-icon dashicons dashicons-move"></span>
    </div>
</div>

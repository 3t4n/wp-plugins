<label>
    <?= esc_html__('Widget Type', 'revi-io-customer-and-product-reviews') ?>
    <span><?= esc_html($widget_type) ?></span>
</label>
<select id="<?= esc_attr($this->get_field_id('widget_type')) ?>"
    name="<?= esc_attr($this->get_field_name('widget_type')) ?>">
    <option value="vertical" <?= selected($widget_type, 'vertical', false) ?>>
        <?= esc_html__('Vertical', 'revi-io-customer-and-product-reviews') ?>
    </option>
    <option value="wide" <?= selected($widget_type, 'wide', false) ?>>
        <?= esc_html__('Wide', 'revi-io-customer-and-product-reviews') ?>
    </option>
</select>
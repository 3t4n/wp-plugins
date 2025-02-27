<?php
if (!defined('ABSPATH')) exit;

$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

$domain = $protocol . parse_url(home_url(), PHP_URL_HOST);

$randomString = wp_generate_password(5, false, false);

?>

<div class="revi__backofficePanel-container">
    <div class="row mb-4">
        <div class="col-12">
            <img src="<?= esc_url(plugins_url('../assets/img/logo-dark-pink-dot.png', dirname(__FILE__))) ?>" class="revi_backofficePanel-logo" alt="Revi logo" />
        </div>
    </div>

    <?php if (!empty($moduleAlert)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-<?= esc_attr($moduleAlert['label']) ?> mb-0" role="alert">
                    <span class="dashicons dashicons-info-outline"></span>
                    <?= esc_html($moduleAlert['message']) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($saveFormMessage)): ?>
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <div class="alert alert-<?= esc_attr($saveFormMessage['label']) ?> mb-0" role="alert">
                    <span class="dashicons dashicons-info-outline"></span>
                    <?= esc_html($saveFormMessage['message']) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="revi__backofficePanel-card">
                <div class="revi__backofficePanel-cardBody">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-auto">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('API KEY', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <input class="form-control" type="text" size="30" name="REVI_API_KEY" value="<?= esc_attr(get_option('REVI_API_KEY')) ?>" placeholder="API KEY" />
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('Order Status', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <select name="status[]" class="form-control" multiple>
                                                <?php foreach ($order_status as $key => $value) : ?>
                                                    <option value="<?= esc_attr($key) ?>" <?= !empty($status_selected[$key]) ? 'selected' : '' ?>>
                                                        <?= esc_html($value) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('Default Language', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <select class="form-control" name="REVI_SELECTED_LANGUAGE">
                                                <?php foreach ($REVI_ACTIVE_LANGUAGES as $revi_language) : ?>
                                                    <option value="<?= esc_attr($revi_language->iso_code) ?>" <?= ($revi_language->iso_code == $REVI_SELECTED_LANGUAGE) ? 'selected' : '' ?>>
                                                        <?= esc_html($revi_language->name) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('Display Floating widget', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <select class="form-control" name="REVI_DISPLAY_WIDGET_FLOATING">
                                                <option value="0" <?= ($REVI_DISPLAY_WIDGET_FLOATING == 0) ? 'selected' : '' ?>>
                                                    <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                </option>
                                                <option value="1" <?= ($REVI_DISPLAY_WIDGET_FLOATING) ? 'selected' : '' ?>>
                                                    <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('Display native WooCommerce reviews', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <select class="form-control" name="REVI_WOOCOMMERCE_REVIEWS">
                                                <option value="0" <?= ($REVI_WOOCOMMERCE_REVIEWS == 0) ? 'selected' : '' ?>>
                                                    <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                </option>
                                                <option value="1" <?= ($REVI_WOOCOMMERCE_REVIEWS) ? 'selected' : '' ?>>
                                                    <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="label-title">
                                                <?= esc_html__('Product List Settings', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <div class="card p-3">

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Align review stars', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_DISPLAY_PRODUCT_LIST_ALIGN">
                                                        <option value="center" <?= ($REVI_DISPLAY_PRODUCT_LIST_ALIGN == 'center') ? 'selected' : '' ?>>
                                                            <?= esc_html__('center', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="left" <?= ($REVI_DISPLAY_PRODUCT_LIST_ALIGN == 'left') ? 'selected' : '' ?>>
                                                            <?= esc_html__('left', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Display review stars when no reviews', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_DISPLAY_PRODUCT_LIST_EMPTY">
                                                        <option value="0" <?= ($REVI_DISPLAY_PRODUCT_LIST_EMPTY) ? 'selected' : '' ?>>
                                                            <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_DISPLAY_PRODUCT_LIST_EMPTY == 1) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('When no reviews, display blank space', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE">
                                                        <option value="0" <?= ($REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE) ? 'selected' : '' ?>>
                                                            <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE == 1) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Display number of reviews', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_DISPLAY_PRODUCT_LIST_TEXT">
                                                        <option value="0" <?= ($REVI_DISPLAY_PRODUCT_LIST_TEXT) ? 'selected' : '' ?>>
                                                            <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_DISPLAY_PRODUCT_LIST_TEXT == 1) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="label-title">
                                                <?= esc_html__('Product Page Settings', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <div class="card p-3">

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Product Extra Meta Data', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_PRODUCT_METADATA">
                                                        <option value="0" <?= ($REVI_PRODUCT_METADATA == 0) ? 'selected' : '' ?>>
                                                            <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_PRODUCT_METADATA) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Product reviews widget location', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_TAB_REVIEWS">
                                                        <option value="0" <?= ($REVI_TAB_REVIEWS == 0) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Footer Reviews', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_TAB_REVIEWS) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Tab Reviews', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Reviews stars widget location', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_TAB_PRODUCT_STARS">
                                                        <option value="0" <?= ($REVI_TAB_PRODUCT_STARS) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Single product summary', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_TAB_PRODUCT_STARS == 1) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Before add to cart', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <?= esc_html__('Display product reviews widget when no reviews', 'revi-io-customer-and-product-reviews') ?>
                                                    </label>
                                                    <select class="form-control" name="REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS">
                                                        <option value="0" <?= ($REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS) ? 'selected' : '' ?>>
                                                            <?= esc_html__('No', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                        <option value="1" <?= ($REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS == 1) ? 'selected' : '' ?>>
                                                            <?= esc_html__('Yes', 'revi-io-customer-and-product-reviews') ?>
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="submitConfiguration" class="btn btn-primary revi_button revi_button_small">
                                                <span class="dashicons dashicons-saved"></span>
                                                <?php esc_html_e('Save', 'revi-io-customer-and-product-reviews') ?>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-md-auto">
                                    <div class="row mb-4">
                                        <div class="col-12 text-center text-md-left">
                                            <?= esc_html__('Current subscription:', 'revi-io-customer-and-product-reviews') ?>
                                            <span class="badge badge-<?= esc_html($subscription) ?>">
                                                <?= esc_html(strtoupper($subscription))  ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-4 text-center text-md-left">
                                            <a href="<?= esc_url($REVI_UGC_URL) ?>" class="btn btn-primary w-100">
                                                <span class="dashicons dashicons-external"></span>
                                                <?= esc_html__('Go to Dashboard', 'revi-io-customer-and-product-reviews') ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-4 text-center text-md-left">
                                            <a href="<?= esc_url($REVI_SUPPORT_URL) ?>" class="btn btn-secondary w-100">
                                                <span class="dashicons dashicons-editor-help"></span>
                                                <?= esc_html__('Support Center', 'revi-io-customer-and-product-reviews') ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-8 text-center text-md-left">
                                            <p> <?= esc_html__('To keep your store information synchronized with Revi, set up the following cron tasks on your server to run every 12 or 24 hours.', 'revi-io-customer-and-product-reviews') ?> </p>
                                            <p><?= esc_html__('This will ensure that the data is updated automatically and without interruptions.', 'revi-io-customer-and-product-reviews') ?></p>
                                            <div class="widget-installation-code-container">
                                                <code>
                                                    <p><?= esc_html__('Orders', 'revi-io-customer-and-product-reviews') ?> <button id="orders-btn" onclick="copyToClipboard('orders-url', 'orders-btn')"><span class="dashicons dashicons-admin-page"></span></button></p>
                                                    <div>
                                                        <span id="orders-url"><?= $domain . '/index.php?revi_page=orders&v=' . $randomString ?></span>
                                                    </div>
                                                    <p><?= esc_html__('Products', 'revi-io-customer-and-product-reviews') ?> <button id="products-btn" onclick="copyToClipboard('products-url', 'products-btn')"><span class="dashicons dashicons-admin-page"></span></button></p>
                                                    <div>
                                                        <span id="products-url"><?= $domain . '/index.php?revi_page=products&v=' . $randomString ?></span>
                                                    </div>
                                                    <p><?= esc_html__('Module', 'revi-io-customer-and-product-reviews') ?> <button id="module-btn" onclick="copyToClipboard('module-url', 'module-btn')"><span class="dashicons dashicons-admin-page"></span></button></p>
                                                    <div>
                                                        <span id="module-url"><?= $domain . '/index.php?revi_page=sync&v=' . $randomString ?></span>
                                                    </div>
                                                </code>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function copyToClipboard(elementId, buttonId) {
        const text = document.getElementById(elementId).textContent;
        const button = document.getElementById(buttonId);

        navigator.clipboard.writeText(text)
            .then(() => {
                button.innerHTML = '<span class="dashicons dashicons-saved"></span>';
                setTimeout(() => {
                    button.innerHTML = '<span class="dashicons dashicons-admin-page"></span>';
                }, 2000);
            })
            .catch(err => console.error('Error al copiar:', err));
    }
</script>
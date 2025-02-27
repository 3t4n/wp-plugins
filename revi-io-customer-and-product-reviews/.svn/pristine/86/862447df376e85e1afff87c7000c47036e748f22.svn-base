<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<div class="revi__backofficePanel-container container">
    <div class="row mb-5">
        <div class="col-12">
            <img src="<?= esc_url(plugins_url('../assets/img/logo-dark-pink-dot.png', dirname(__FILE__))) ?>" class="revi_backofficePanel-logo" alt="Revi logo" />
        </div>
    </div>
    <?php if (!empty($saveFormMessage)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?= esc_attr($saveFormMessage['label']) ?>" role="alert">
                    <?= esc_html($saveFormMessage['message']) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 col-md-6 mb-5 mb-md-0">
            <div class="revi__backofficePanel-card">
                <div class="revi__backofficePanel-cardBody">
                    <div class="row no-gutters p-3 mb-5">
                        <div class="col-12 d-flex justify-content-center">
                            <form method="post">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h2>
                                            <?php esc_html_e('Do you have an account?', 'revi-io-customer-and-product-reviews') ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>
                                                <?= esc_html__('API KEY', 'revi-io-customer-and-product-reviews') ?>
                                            </label>
                                            <input class="form-control" type="text" size="30" name="REVI_API_KEY" value="" placeholder="API KEY" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" name="submitConfiguration">
                                            <span class="dashicons dashicons-admin-users"></span>
                                            <?php esc_html_e('Log in', 'revi-io-customer-and-product-reviews') ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="revi__backofficePanel-card">
                <div class="revi__backofficePanel-cardBody">
                    <div class="row p-3 mb-5">
                        <div class="col-12">
                            <div class="row mb-3">
                                <div class="col-12 d-flex text-center justify-content-center">
                                    <h2>
                                        <?php esc_html_e('Easy -> Professional -> Free', 'revi-io-customer-and-product-reviews') ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <p>
                                        <?php esc_html_e('Install & Configure Revi in 5 minutes', 'revi-io-customer-and-product-reviews') ?>.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <a class="btn btn-primary" target="_blank" href="https://revi.io/en" style="width: 25rem;">
                                        <span class="dashicons dashicons-edit-large"></span>
                                        <?php esc_html_e('Register for free', 'revi-io-customer-and-product-reviews') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
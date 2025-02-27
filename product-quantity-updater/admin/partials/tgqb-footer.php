<?php
    /**
     * The constants file.
     */
		require_once plugin_dir_path( __DIR__ ) . '../includes/tg-constants.php';
?>
<section>
    
    <h2>Our other useful addons for woocommerce </h2>
    <div class="tgqb-d-flex">
        <div class="tgqb-card">
            <h4>TG Product Quantity Plus Minus Button</h4>
            <p>
                This plugin will add quantity increment and decrement buttons with the product quantity input control.<br>
                <?php if ( function_exists('is_plugin_active') && is_plugin_active(TG_PLUGIN_PATH_PQB)) { ?>
                    <div class="tgqb-d-flex">
                        <p><em>Installed</em></p>
                        <p>
                            <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>
                            <a href="https://wordpress.org/plugins/product-quantity-updater/#reviews" target="_new">Rate this plugin </a>
                        </p>
                    </div>
                <?php } else { ?>
                    <a href="https://wordpress.org/plugins/product-quantity-updater/" target="_new">Install Free Version</a>
                <?php } ?>
            </p>
        </div>

        <div class="tgqb-card">
            <h4>TG Product Tab Manager Pro</h4>
            <p>
                Manage tabs on woocommerce single product page. Hide or rename default tabs. Create new tabs with custom content.
            </p>
            <?php if ( function_exists('is_plugin_active') && is_plugin_active(TG_PLUGIN_PATH_PTMPRO)) { ?>
                <div class="tgqb-d-flex">
                    <p><em>Installed</em></p>
                    <p>
                        <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>
                        <a href="https://wordpress.org/plugins/product-tab-manager/#reviews" target="_new">Rate this plugin </a>
                    </p>
                </div>
            <?php } else { ?>
                <div class="tgqb-d-flex">
                    <a href="https://wordpress.org/plugins/product-tab-manager/" target="_new">Install Free Version</a>
                    <a href="https://technifyguru.com/plugin/product-tab-manager-pro/" target="_new">Get Pro Version</a>
                </div>
            <?php } ?>
        </div>

        <div class="tgqb-card">
            <h4>TG Change Button Labels</h4>
            <p>
                A simple and easy to use plugin to change button texts of almost all woocommerce buttons. <br>
            </p>
            <?php if ( function_exists('is_plugin_active') && is_plugin_active(TG_PLUGIN_PATH_PLT)) { ?>
                <div class="tgqb-d-flex">
                    <p><em>Installed</em></p>
                    <p>
                        <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>
                        <a href="https://wordpress.org/plugins/product-label-text/#reviews" target="_new">Rate this plugin </a>
                    </p>
                </div>
            <?php } else { ?>
                <div class="tgqb-d-flex">
                    <em>Coming Soon</em>
                    <!-- <a href="https://wordpress.org/plugins/product-label-text/" target="_new">Install Free Version</a> -->
                </div>
            <?php } ?>
        </div>
    </div>
</section> 
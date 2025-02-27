<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wb_cptb_content">
    
<div class="wb-cptb-help-section">
    <h2><?php esc_html_e('Help & FAQs', 'wb-custom-product-tabs-for-woocommerce'); ?></h2>

    <div class="wb-cptb-accordion">
        <!-- Question 1 -->
        <div class="wb-cptb-accordion-item">
            <button class="wb-cptb-accordion-button">
                <?php esc_html_e('How to Add Product-Specific Tabs?', 'wb-custom-product-tabs-for-woocommerce'); ?>
            </button>
            <div class="wb-cptb-accordion-content">
                <p><?php esc_html_e('To add a custom tab for a specific product:', 'wb-custom-product-tabs-for-woocommerce'); ?></p>

                <ol>
                    <li>
                        <strong><?php esc_html_e('Navigate to the Product Editor:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Go to Products → Add New Product or Edit an existing product.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Access the Custom Tabs Section:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('In the Product Data section, click on the Custom Tabs tab.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('You will see a list of existing tabs, including Global Tabs.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Add a New Tab:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Click the "Add New Tab" button at the top.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('A popup will appear with the tab creation form.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Fill in the Tab Details:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <ul>
                            <li><?php esc_html_e('Title Field: Enter the tab title.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li>
                                <?php esc_html_e('Position Field: Enter a number to define the tab’s position.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                                <br>
                                <?php esc_html_e('For details on positioning,', 'wb-custom-product-tabs-for-woocommerce'); ?> <a href="https://webbuilder143.com/how-to-arrange-woocommerce-custom-product-tabs/?utm_source=plugin&utm_medium=help&utm_campaign=faq&utm_content=positioning" target="_blank"> <?php esc_html_e('refer to this guide.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                                </a>
                            </li>
                            <li><?php esc_html_e('Tab Content Field: Add content (supports HTML, Shortcodes, YouTube embeds, etc.).', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li><?php esc_html_e('Tab Nickname Field (Optional): Used only in the admin panel for easy identification if multiple tabs have the same title.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                        </ul>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Save the Tab:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Click the "Done" button. (Note: This does not save the tab permanently.)', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('To finalize, Save or Update the Product to apply the changes.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                </ol>

                <p><strong><?php esc_html_e("That’s it! Your product-specific tab is now added successfully. 🚀", 'wb-custom-product-tabs-for-woocommerce'); ?></strong></p>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="wb-cptb-accordion-item">
            <button class="wb-cptb-accordion-button">
                <?php esc_html_e('How to Add Global Tabs?', 'wb-custom-product-tabs-for-woocommerce'); ?>
            </button>
            <div class="wb-cptb-accordion-content">
                <p><?php esc_html_e('To create and manage global tabs, follow these steps:', 'wb-custom-product-tabs-for-woocommerce'); ?></p>

                <ol>
                    <li>
                        <strong><?php esc_html_e('Navigate to the Global Tabs Section:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Under the "Products" menu in the WordPress dashboard, find a submenu called "Tabs."', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Click on it to access the Global Tabs listing page.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Add or Edit Global Tabs:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <ul>
                            <li><?php esc_html_e('The Global Tabs listing page works like the Posts or Pages listing. You can edit existing tabs.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li><?php esc_html_e('To add a new tab, click on the "Add New Tab" button.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                        </ul>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Configure the Global Tab Details:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <ul>
                            <li><?php esc_html_e('Title Field: Enter the tab title.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li><?php esc_html_e('Tab Content Field: Add the content (supports HTML, Shortcodes, YouTube embeds, etc.).', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li><?php esc_html_e('Tab Position Field: Define the tab’s position using a number.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li><?php esc_html_e('Tab Nickname Field: (Optional) Helps identify tabs in the admin panel.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                        </ul>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Assign the Tab to Products:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('By default, new global tabs are not assigned to any products. However, you can change this behavior in the plugin settings.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <strong><?php esc_html_e('Settings Reference:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Go to "Settings" → "Product Tabs Settings" → "Default Behavior of Global Tabs".', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Disable this option if you want new global tabs to be visible on all products by default.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Brand Support:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <ul>
                            <li><?php esc_html_e('Our plugin supports WooCommerce default brands.', 'wb-custom-product-tabs-for-woocommerce'); ?></li>
                            <li>
                                <?php esc_html_e('It also supports the', 'wb-custom-product-tabs-for-woocommerce'); ?> 
                                <a href="https://wordpress.org/plugins/perfect-woocommerce-brands/" target="_blank">
                                    <?php esc_html_e('Perfect Brands for WooCommerce Plugin', 'wb-custom-product-tabs-for-woocommerce'); ?>
                                </a>.
                            </li>
                            <li>
                                <?php esc_html_e('If you are using another brands plugin, you can add support using this filter:', 'wb-custom-product-tabs-for-woocommerce'); ?>
                                <br>
                                <code>wb_cptb_thirdparty_brand_taxonamies</code>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Publish & Apply:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Once you assign a global tab to any category, tag, brand, or individual product, it will automatically appear on all products associated with those taxonomies or on the specific product page.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Access Global Tabs from Product Edit Screen:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Global tabs are also listed under the Custom Tabs section when editing a product.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                </ol>

                <p><strong><?php esc_html_e("That's it! Your global tabs are now set up and displayed in the assigned products. 🎉", 'wb-custom-product-tabs-for-woocommerce'); ?></strong></p>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="wb-cptb-accordion-item">
            <button class="wb-cptb-accordion-button">
                <?php esc_html_e('Global tabs not appearing on the front end?', 'wb-custom-product-tabs-for-woocommerce'); ?>
            </button>
            <div class="wb-cptb-accordion-content">
                <p><strong><?php esc_html_e('If your global tabs are not visible on the product pages, check the following:', 'wb-custom-product-tabs-for-woocommerce'); ?></strong></p>

                <ol>
                    <li>
                        <strong><?php esc_html_e('Is the tab assigned to any product, category, tag, or brand?', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('By default, global tabs are not assigned to any products. You need to assign them to a product, category, tag, or brand for them to appear.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Have you checked the "Default Behavior of Global Tabs" setting?', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('If you want new global tabs to be available on all products automatically, you need to disable this setting.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Go to "Settings" → "Product Tabs Settings" → Disable "Default Behavior of Global Tabs".', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Does your theme properly display WooCommerce tabs?', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Some themes modify or override WooCommerce’s tab structure, which may prevent global tabs from appearing.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Try switching to a default WooCommerce theme like Storefront to check if the issue is theme-related.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Are there any conflicting plugins?', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('Other WooCommerce tab-related plugins might override or disable global tabs.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Try deactivating other plugins one by one to check for conflicts.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>

                    <li>
                        <strong><?php esc_html_e('Have you cleared the cache?', 'wb-custom-product-tabs-for-woocommerce'); ?></strong>
                        <br>
                        <?php esc_html_e('If you are using a caching plugin, clear the cache and check again.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                        <br>
                        <?php esc_html_e('Also, clear your browser cache or try in an incognito window.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                </ol>

                <p><strong><?php esc_html_e("If you've checked everything and the issue persists, contact support for further assistance. 🚀", 'wb-custom-product-tabs-for-woocommerce'); ?></strong></p>
            </div>
        </div>

        <!-- Question: 4 -->
        <div class="wb-cptb-accordion-item">
            <button class="wb-cptb-accordion-button">
                <?php esc_html_e('How to hide the tab heading inside the tab?', 'wb-custom-product-tabs-for-woocommerce'); ?>
            </button>
            <div class="wb-cptb-accordion-content">
                <p><strong><?php esc_html_e('You can hide the tab heading inside the tab content by enabling an option in the settings.', 'wb-custom-product-tabs-for-woocommerce'); ?></strong></p>

                <p><?php esc_html_e('Follow these steps:', 'wb-custom-product-tabs-for-woocommerce'); ?></p>
                <ol>
                    <li>
                        <?php esc_html_e('Go to "Settings" → "Product Tabs Settings".', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                    <li>
                        <?php esc_html_e('Find the option "Hide Tab Heading Inside the Tab".', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                    <li>
                        <?php esc_html_e('Enable the checkbox and save the settings.', 'wb-custom-product-tabs-for-woocommerce'); ?>
                    </li>
                </ol>

                <p><?php esc_html_e("Once enabled, the tab title won't be displayed inside the tab content, but it will still be visible in the tab navigation.", 'wb-custom-product-tabs-for-woocommerce'); ?></p>

                <a href="<?php echo esc_url( $page_url . '&wb_cptb_tab=general' ); ?>">
                    <?php esc_html_e('Go to Settings', 'wb-custom-product-tabs-for-woocommerce'); ?>
                </a>
            </div>
        </div>

        <!-- Question: 5 -->
        <div class="wb-cptb-accordion-item">
            <button class="wb-cptb-accordion-button">
                <?php esc_html_e('How do I translate tabs using Polylang?', 'wb-custom-product-tabs-for-woocommerce'); ?>
            </button>
            <div class="wb-cptb-accordion-content">
                <p><?php esc_html_e('For a detailed guide on translating WooCommerce product tabs using Polylang, please visit this article:', 'wb-custom-product-tabs-for-woocommerce'); ?></p>
                <a href="<?php echo esc_url( 'https://webbuilder143.com/how-to-translate-woocommerce-product-tabs-with-polylang/?utm_source=plugin&utm_medium=help&utm_campaign=faq&utm_content=polylang' ); ?>">
                    <?php esc_html_e('How to translate tabs using Polylang', 'wb-custom-product-tabs-for-woocommerce'); ?>
                </a>
            </div>
        </div>

    </div>
</div>

</div>

<!-- Accordion Styles -->
<style>
    .wb-cptb-accordion-button {
        background: #fff;
        border: none;
        width: 100%;
        text-align: left;
        padding: 10px;
        font-size:14px;
        cursor: pointer;
        outline: none;
        transition: background 0.3s;
        position: relative; font-weight:600; color:#2c3338;
    }

    /* Arrow icon */
    .wb-cptb-accordion-button::after {
        content: "\25BC"; /* Downward arrow */
        font-size: 14px;
        display: inline-block;
        transition: transform 0.01s ease;
        transform-origin: center;
        position: absolute; right:20px;
    }

    /* Rotated arrow when active */
    .wb-cptb-accordion-item.active .wb-cptb-accordion-button::after {
        transform: rotate(180deg);
    }

    .wb-cptb-accordion-button:hover {
        background: #e0e0e0;
    }

    .wb-cptb-accordion-content {
        display: none;
        padding: 10px;
        border-top: none;
        background: #fff;
    }

    .wb-cptb-accordion-item {
        border:1px solid #e2e4e7;
    }
    .wb-cptb-accordion-item:not(:last-child){ border-bottom:0px solid transparent; }

    .wb-cptb-accordion-item.active .wb-cptb-accordion-content {
        display: block;
    }
</style>

<!-- Accordion Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var accButtons = document.querySelectorAll(".wb-cptb-accordion-button");

    accButtons.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var parent = this.parentElement;
            var content = parent.querySelector(".wb-cptb-accordion-content");

            // Close all other accordions
            document.querySelectorAll(".wb-cptb-accordion-item").forEach(function (item) {
                if (item !== parent) {
                    item.classList.remove("active");
                    item.querySelector(".wb-cptb-accordion-content").style.display = "none";
                }
            });

            // Toggle the clicked accordion
            parent.classList.toggle("active");
            content.style.display = parent.classList.contains("active") ? "block" : "none";
        });
    });
});
</script>
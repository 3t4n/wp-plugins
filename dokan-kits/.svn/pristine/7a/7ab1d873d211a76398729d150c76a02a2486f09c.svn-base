<?php
/**
 * Plugin Name: Dokan Kits
 * Plugin URI: https://wordpress.org/plugins/dokan-kits
 * Description: The Helper Toolkits plugin for Dokan is a feature-packed add-on designed to streamline and enhance the functionality of your Dokan-powered multi-vendor marketplace.
 * Version: 2.0.2
 * Author: Tanvir Hasan
 * Author URI: https://profiles.wordpress.org/tanvirh/
 * Dokan requires at least: 3.9.7
 * Dokan tested up to: 3.14.3
 * Text Domain: dokan-kits
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

function dokan_kits_initialize() {
    if (!is_plugin_active('dokan-lite/dokan.php')) {
        add_action('admin_notices', 'dokan_kits_warning_for_activation');
        deactivate_plugins(plugin_basename(__FILE__));
    } else {
        add_action('admin_menu', 'dokan_kits_add_menu_item');
        add_action('init', 'dokan_kits_remove_actions');
    }
}
add_action('admin_init', 'dokan_kits_initialize');

function dokan_kits_warning_for_activation() {
    ?>
    <div class="notice notice-error">
        <p><?php _e('Please activate Dokan Lite first to use Dokan Kits.', 'dokan-kits'); ?></p>
    </div>
    <?php
}

function dokan_kits_enqueue_styles() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '5.15.4');
}
add_action('admin_enqueue_scripts', 'dokan_kits_enqueue_styles');

function dokan_kits_enqueue_custom_css() {
    wp_enqueue_style('dokan-kits-interface-styles', plugin_dir_url(__FILE__) . 'assets/dokan-kits-interface.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'dokan_kits_enqueue_custom_css');

function dokan_kits_add_menu_item() {
    add_menu_page('Dokan Kits', 'Dokan Kits', 'manage_options', 'dokan-kits', 'dokan_kits_settings_page', 'dashicons-editor-unlink');
}
add_action('admin_menu', 'dokan_kits_add_menu_item');

function dokan_kits_settings_page() {
    ?>
    <div class="dokan-kits-wrap">
        <div class="dokan_kits_description-box">           
            <div class="dokan-kits-head-logo">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/dokan-kits-logo.png'; ?>" alt="Dokan Kits Logo" class="dokan-kits-logo">
            </div>
            <div class="description-box">
                <h1>Dokan Kits Settings</h1>
                <h3 class="additional-text">This plugin provides you with tools to enhance your Dokan experience. Use this plugin to remove or modify various elements and more.</h3>
            </div>
        </div>
        <form method="post" action="options.php">
            <?php settings_fields('dokan_kits_settings_group'); ?>
            <div id="dokan-kits-body-content">
                <div class="dokan_kits_style_box">
                    <i class="fa fa-users fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_vendor_checkbox" class="for_title_label">Remove Vendor Registration</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_vendor_checkbox" name="remove_vendor_checkbox" value="1" <?php checked(get_option('remove_vendor_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_vendor_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove "I am a vendor" option from the WooCommerce my account page.</p>
                </div>
                
                <div class="dokan_kits_style_box">
                    <i class="fa fa-user-check fa-3x"></i>
                    <div class="toggle-label">
                        <label for="set_default_seller_role_checkbox" class="for_title_label">Enable "I am a Vendor" by default</label>
                        <label class="switch">
                            <input type="checkbox" id="set_default_seller_role_checkbox" name="set_default_seller_role_checkbox" value="1" <?php checked(get_option('set_default_seller_role_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('set_default_seller_role_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">To enable the "I am a Vendor" option by default on the My Account page.</p>
                </div>
                
                <!-- New "Remove Become a Vendor Button" option -->
                <div class="dokan_kits_style_box">
                    <i class="fa fa-user-times fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_become_a_vendor_button_checkbox" class="for_title_label">Remove Become a Vendor Button</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_become_a_vendor_button_checkbox" name="remove_become_a_vendor_button_checkbox" value="1" <?php checked(get_option('remove_become_a_vendor_button_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_become_a_vendor_button_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove Become a Vendor button from the WooCommerce My Account page.</p>
                </div>

            
                <div class="dokan_kits_style_box">
                    <i class="fa fa-truck fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_split_shipping_checkbox" class="for_title_label">Remove Split Shipping Dokan Lite</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_split_shipping_checkbox" name="remove_split_shipping_checkbox" value="1" <?php checked(get_option('remove_split_shipping_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_split_shipping_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove split shipping from the WooCommerce cart and checkout page using the Dokan Lite plugin.</p>
                </div>

                <div class="dokan_kits_style_box">
                    <i class="fa fa-dolly fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_split_shipping_pro_checkbox" class="for_title_label">Remove Split Shipping Dokan Pro</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_split_shipping_pro_checkbox" name="remove_split_shipping_pro_checkbox" value="1" <?php checked(get_option('remove_split_shipping_pro_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_split_shipping_pro_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove Split Shipping from the WooCommerce Cart and Checkout page using the Dokan Pro plugin.</p>
                </div>

                <!-- New "Hide Add to Cart Button" option -->
                <div class="dokan_kits_style_box">
                    <i class="fa fa-shopping-cart fa-3x"></i>
                    <div class="toggle-label">
                        <label for="hide_add_to_cart_button_checkbox" class="for_title_label">Hide Add to Cart Button</label>
                        <label class="switch">
                            <input type="checkbox" id="hide_add_to_cart_button_checkbox" name="hide_add_to_cart_button_checkbox" value="1" <?php checked(get_option('hide_add_to_cart_button_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('hide_add_to_cart_button_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Hide Add to Cart Button From WooCommerce Product Page.</p>
                </div>              
                <div class="dokan_kits_style_box">
                    <i class="fa fa-cart-flatbed-suitcase fa-3x"></i>
                    <div class="toggle-label">
                        <label for="enable_own_product_purchase_checkbox" class="for_title_label">Enable Purchase of Own Products</label>
                        <label class="switch">
                            <input type="checkbox" id="enable_own_product_purchase_checkbox" name="enable_own_product_purchase_checkbox" value="1" <?php checked(get_option('enable_own_product_purchase_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('enable_own_product_purchase_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Allow admin and vendors to purchase their own products.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-tasks fa-3x"></i>
                    <div class="toggle-label">
                        <label for="auto_complete_order_checkbox" class="for_title_label">Manage Order Status</label>
                        <label class="switch">
                            <input type="checkbox" id="auto_complete_order_checkbox" name="auto_complete_order_checkbox" value="1" <?php checked(get_option('auto_complete_order_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('auto_complete_order_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Enable the button to auto-complete virtual and downloadable order statuses.</p>
                </div>
                 <!-- New "Remove Product Types" option -->
                <div class="seperate-style-for-box">
                    <i class="fa fa-tags fa-3x"></i>
                    <div class="toggle-label">
                        <label class="for_title_label">Remove Product Types</label>
                        <div class="additional-text">Remove product types from the Dokan single product page</div>
                        <div class="toggle-group re_product_toggle">
                            <div class="type-bu-si">
                                <label for="remove_variable_product_checkbox" class="for_title_label">Variable</label>
                                <label class="switch">
                                    <input type="checkbox" id="remove_variable_product_checkbox" name="remove_variable_product_checkbox" value="1" <?php checked(get_option('remove_variable_product_checkbox'), 1); ?>>
                                    <span class="slider"></span>
                                </label>
                                <span class="status-text"><?php echo get_option('remove_variable_product_checkbox') ? 'Active' : 'Inactive'; ?></span>
                            </div>
                            <div class="type-bu-si">
                                <label for="remove_external_product_checkbox" class="for_title_label">External</label>
                                <label class="switch">
                                    <input type="checkbox" id="remove_external_product_checkbox" name="remove_external_product_checkbox" value="1" <?php checked(get_option('remove_external_product_checkbox'), 1); ?>>
                                    <span class="slider"></span>
                                </label>
                                <span class="status-text"><?php echo get_option('remove_external_product_checkbox') ? 'Active' : 'Inactive'; ?></span>
                            </div>
                            <div class="type-bu-si">
                                <label for="remove_grouped_product_checkbox" class="for_title_label">Grouped</label>
                                <label class="switch">
                                    <input type="checkbox" id="remove_grouped_product_checkbox" name="remove_grouped_product_checkbox" value="1" <?php checked(get_option('remove_grouped_product_checkbox'), 1); ?>>
                                    <span class="slider"></span>
                                </label>
                                <span class="status-text"><?php echo get_option('remove_grouped_product_checkbox') ? 'Active' : 'Inactive'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-file-lines fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_short_description_checkbox" class="for_title_label">Remove Short Description</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_short_description_checkbox" name="remove_short_description_checkbox" value="1" <?php checked(get_option('remove_short_description_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_short_description_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove short description from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-file-text fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_long_description_checkbox" class="for_title_label">Remove Long Description</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_long_description_checkbox" name="remove_long_description_checkbox" value="1" <?php checked(get_option('remove_long_description_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_long_description_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove long description from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-warehouse fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_inventory_section_checkbox" class="for_title_label">Remove Inventory Section</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_inventory_section_checkbox" name="remove_inventory_section_checkbox" value="1" <?php checked(get_option('remove_inventory_section_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_inventory_section_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove inventory section from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-location-dot fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_geolocation_option_checkbox" class="for_title_label">Remove Geolocation Option</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_geolocation_option_checkbox" name="remove_geolocation_option_checkbox" value="1" <?php checked(get_option('remove_geolocation_option_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_geolocation_option_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove geolocation option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-truck-fast fa-3x"></i>
                    <div class="toggle-label">
                        <label for="remove_shipping_tax_option_checkbox" class="for_title_label">Remove Product Shipping Tax Option</label>
                        <label class="switch">
                            <input type="checkbox" id="remove_shipping_tax_option_checkbox" name="remove_shipping_tax_option_checkbox" value="1" <?php checked(get_option('remove_shipping_tax_option_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('remove_shipping_tax_option_checkbox') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <p class="additional-text">Remove product shipping tax option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-link fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_linked_product_checkbox" class="for_title_label">Remove Linked Product Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_linked_product_checkbox" name="remove_linked_product_checkbox" value="1" <?php checked(get_option('remove_linked_product_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_linked_product_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove linked product option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-sitemap fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_attribute_variation_checkbox" class="for_title_label">Remove Attribute and Variation Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_attribute_variation_checkbox" name="remove_attribute_variation_checkbox" value="1" <?php checked(get_option('remove_attribute_variation_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_attribute_variation_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove Attribute and Variation option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-percent fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_bulk_discount_checkbox" class="for_title_label">Remove Bulk Discount Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_bulk_discount_checkbox" name="remove_bulk_discount_checkbox" value="1" <?php checked(get_option('remove_bulk_discount_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_bulk_discount_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove bulk discount option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-rotate-left fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_rma_checkbox" class="for_title_label">Remove RMA Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_rma_checkbox" name="remove_rma_checkbox" value="1" <?php checked(get_option('remove_rma_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_rma_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove RMA option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-box fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_wholesale_checkbox" class="for_title_label">Remove Wholesale Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_wholesale_checkbox" name="remove_wholesale_checkbox" value="1" <?php checked(get_option('remove_wholesale_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_wholesale_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove wholesale option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-arrows-up-down fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_min_max_product_checkbox" class="for_title_label">Remove Min Max Product Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_min_max_product_checkbox" name="remove_min_max_product_checkbox" value="1" <?php checked(get_option('remove_min_max_product_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_min_max_product_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove min max product option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-gear fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_other_options_checkbox" class="for_title_label">Remove Other Options</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_other_options_checkbox" name="remove_other_options_checkbox" value="1" <?php checked(get_option('remove_other_options_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_other_options_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove other options from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-bullhorn fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_product_advertisement_checkbox" class="for_title_label">Remove Product Advertisement Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_product_advertisement_checkbox" name="remove_product_advertisement_checkbox" value="1" <?php checked(get_option('remove_product_advertisement_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_product_advertisement_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove product advertisement option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-store fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_catalog_mode_checkbox" class="for_title_label">Remove Catalog Mode Option</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_catalog_mode_checkbox" name="remove_catalog_mode_checkbox" value="1" <?php checked(get_option('remove_catalog_mode_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_catalog_mode_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove catalog mode option from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-download fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_downloadable_checkbox" class="for_title_label">Remove Downloadable Checkbox</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_downloadable_checkbox" name="remove_downloadable_checkbox" value="1" <?php checked(get_option('remove_downloadable_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_downloadable_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove downloadable checkbox from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                   <i class="fa fa-cloud fa-3x"></i>
                   <div class="toggle-label">
                       <label for="remove_virtual_checkbox" class="for_title_label">Remove Virtual Checkbox</label>
                       <label class="switch">
                           <input type="checkbox" id="remove_virtual_checkbox" name="remove_virtual_checkbox" value="1" <?php checked(get_option('remove_virtual_checkbox'), 1); if (!is_plugin_active('dokan-lite/dokan.php')) echo 'disabled'; ?>>
                           <span class="slider"></span>
                       </label>
                       <span class="status-text"><?php echo get_option('remove_virtual_checkbox') ? 'Active' : 'Inactive'; ?></span>
                   </div>
                   <p class="additional-text">Remove virtual checkbox from the edit product form.</p>
                </div>
                <div class="dokan_kits_style_box">
                    <i class="fa fa-crop fa-3x"></i>
                    <div class="toggle-label">
                        <label for="enable_dimension_restrictions" class="for_title_label">Product Image Dimension Restrictions</label>
                        <label class="switch">
                            <input type="checkbox" id="enable_dimension_restrictions" name="enable_dimension_restrictions" value="1" 
                                <?php checked(get_option('enable_dimension_restrictions'), 1); ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('enable_dimension_restrictions') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <div class="image-restrictions-settings" style="margin-top: 15px;">
                        <div class="restriction-input">
                            <label>Required Width (px):
                                <input type="number" name="image_max_width" value="<?php echo esc_attr(get_option('image_max_width', 800)); ?>" min="1">
                            </label>
                        </div>
                        <div class="restriction-input">
                            <label>Required Height (px):
                                <input type="number" name="image_max_height" value="<?php echo esc_attr(get_option('image_max_height', 800)); ?>" min="1">
                            </label>
                        </div>
                    </div>
                    <p class="additional-text add-extra-margin-bot">Set exact dimension requirements for vendor product images.</p>
                </div>

                <!-- Size Restriction Box -->
                <div class="dokan_kits_style_box">
                    <i class="fa fa-file-image fa-3x"></i>
                    <div class="toggle-label">
                        <label for="enable_size_restrictions" class="for_title_label">Product Image Size Restriction</label>
                        <label class="switch">
                            <input type="checkbox" id="enable_size_restrictions" name="enable_size_restrictions" value="1" 
                                <?php checked(get_option('enable_size_restrictions'), 1); ?>>
                            <span class="slider"></span>
                        </label>
                        <span class="status-text"><?php echo get_option('enable_size_restrictions') ? 'Active' : 'Inactive'; ?></span>
                    </div>
                    <div class="image-restrictions-settings" style="margin-top: 15px;">
                        <div class="restriction-input">
                            <label>Maximum File Size (MB):
                                <input type="number" name="image_max_size" value="<?php echo esc_attr(get_option('image_max_size', 2)); ?>" min="0.1" step="0.1">
                            </label>
                        </div>
                    </div>
                    <p class="additional-text">Set maximum file size limit for vendor product images.</p>
                </div>

            </div>
            <!-- Save Changes button -->
            <div id="dokan_kits_save_ch">           
            <?php submit_button('Save Changes', 'primary', 'save_changes_button'); ?>
            <div class="save-changes-message" style="display: none;">Changes saved successfully!</div>  
            </div>  
            <!-- Save Changes message -->
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Update status text color
                function updateStatusTextColor() {
                    var statusTexts = document.querySelectorAll('.status-text');
                    statusTexts.forEach(function(statusText) {
                        if (statusText.textContent === 'Active') {
                            statusText.style.color = 'green';
                        } else {
                            statusText.style.color = 'red';
                        }
                    });
                }

                // Initial color update
                updateStatusTextColor();

                // Update status text color when toggle buttons are changed
                var toggleButtons = document.querySelectorAll('.toggle-label input[type="checkbox"]');
                toggleButtons.forEach(function(button) {
                    button.addEventListener('change', function() {
                        updateStatusTextColor();
                        // Store the state of toggle button in local storage
                        localStorage.setItem(this.id, this.checked);
                    });
                });

                // Retrieve toggle button states from local storage on page load
                toggleButtons.forEach(function(button) {
                    var storedState = localStorage.getItem(button.id);
                    if (storedState === 'true') {
                        button.checked = true;
                    }
                });
            });
        </script>
    </div>
    <?php
}

function dokan_kits_register_settings() {
    register_setting('dokan_kits_settings_group', 'remove_vendor_checkbox');
    register_setting('dokan_kits_settings_group', 'set_default_seller_role_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_split_shipping_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_split_shipping_pro_checkbox');
    register_setting('dokan_kits_settings_group', 'hide_add_to_cart_button_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_variable_product_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_external_product_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_grouped_product_checkbox');
    register_setting('dokan_kits_settings_group', 'enable_own_product_purchase_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_become_a_vendor_button_checkbox');
    register_setting('dokan_kits_settings_group', 'auto_complete_order_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_short_description_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_long_description_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_inventory_section_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_geolocation_option_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_shipping_tax_option_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_linked_product_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_attribute_variation_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_bulk_discount_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_rma_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_wholesale_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_min_max_product_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_other_options_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_product_advertisement_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_catalog_mode_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_downloadable_checkbox');
    register_setting('dokan_kits_settings_group', 'remove_virtual_checkbox');
    register_setting('dokan_kits_settings_group', 'enable_dimension_restrictions');
    register_setting('dokan_kits_settings_group', 'enable_size_restrictions');
    register_setting('dokan_kits_settings_group', 'image_max_width');
    register_setting('dokan_kits_settings_group', 'image_max_height');
    register_setting('dokan_kits_settings_group', 'image_max_size');
}
add_action('admin_init', 'dokan_kits_register_settings');

function dokan_kits_remove_actions() {
    if (!function_exists('dokan_remove_hook_for_anonymous_class') || !class_exists('WeDevs\Dokan\Shipping\Hooks')) {
        return;
    }

    if (get_option('remove_vendor_checkbox') === '1') {
        add_action('init', 'remove_dokan_registration_hooks', 20);
    }
    
    if (get_option('set_default_seller_role_checkbox') === '1') {
        add_filter('dokan_seller_registration_default_role', 'set_dokan_seller_default_role');
    }

    if (get_option('remove_split_shipping_checkbox') === '1') {
        dokan_kits_lite_remove_split_shipping();
    }

    if (get_option('remove_split_shipping_pro_checkbox') === '1') {
        dokan_kits_pro_remove_split_shipping();
    }

    if (get_option('hide_add_to_cart_button_checkbox') === '1') {
        dokan_kits_hide_add_to_cart_button();
    }

    if (get_option('enable_own_product_purchase_checkbox') === '1') {
        remove_filter('woocommerce_is_purchasable', 'dokan_vendor_own_product_purchase_restriction', 10, 2);
        remove_filter('woocommerce_product_review_comment_form_args', 'dokan_vendor_product_review_restriction');
    }

    add_filter('dokan_product_types', 'dokan_kits_remove_product_types', 11);

    if (get_option('remove_become_a_vendor_button_checkbox') === '1') {
        remove_become_a_vendor_button();
    }
    if (get_option('auto_complete_order_checkbox') === '1') {
    add_filter('woocommerce_order_item_needs_processing', 'auto_complete_virtual_downloadable_orders', 10, 3);
    }
    if (get_option('remove_short_description_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_short_description');
    }
    if (get_option('remove_long_description_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_long_description');
    }
    if (get_option('remove_inventory_section_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_inventory_section');
    }
    if (get_option('remove_geolocation_option_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_geolocation_option');
    }
    if (get_option('remove_shipping_tax_option_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_shipping_tax_option');
    }
    if (get_option('remove_linked_product_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_linked_product');
    }
    if (get_option('remove_attribute_variation_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_attribute_variation');
    }
    if (get_option('remove_bulk_discount_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_bulk_discount');
    }
    if (get_option('remove_rma_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_rma');
    }
    if (get_option('remove_wholesale_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_wholesale');
    }
    if (get_option('remove_min_max_product_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_min_max_product');
    }
    if (get_option('remove_other_options_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_other_options');
    }
    if (get_option('remove_product_advertisement_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_product_advertisement');
    }
    if (get_option('remove_catalog_mode_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_catalog_mode');
    }
    if (get_option('remove_downloadable_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_downloadable');
    }
    if (get_option('remove_virtual_checkbox') === '1') {
    add_action('wp_head', 'dokan_kits_remove_virtual');
    }
}
add_action('init', 'dokan_kits_remove_actions'); // Hook into WooCommerce initialization

function dokan_kits_lite_remove_split_shipping() {
    dokan_remove_hook_for_anonymous_class('woocommerce_cart_shipping_packages', 'WeDevs\Dokan\Shipping\Hooks', 'split_shipping_packages', 10);
    dokan_remove_hook_for_anonymous_class('woocommerce_checkout_create_order_shipping_item', 'WeDevs\Dokan\Shipping\Hooks', 'add_shipping_pack_meta', 10);
    dokan_remove_hook_for_anonymous_class('woocommerce_shipping_package_name', 'WeDevs\Dokan\Shipping\Hooks', 'change_shipping_pack_name', 10);
}

function dokan_kits_pro_remove_split_shipping() {
    remove_filter('woocommerce_cart_shipping_packages', 'dokan_custom_split_shipping_packages');
    remove_filter('woocommerce_shipping_package_name', 'dokan_change_shipping_pack_name');
    remove_action('woocommerce_checkout_create_order_shipping_item', 'dokan_add_shipping_pack_meta');
}

// Function to hide the Add to Cart button
function dokan_kits_hide_add_to_cart_button() {
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

    // Ensure to hide add to cart buttons that are added differently
    add_action('wp_enqueue_scripts', 'dokan_kits_hide_add_to_cart_button_css');
}

// Add custom CSS to hide Add to Cart buttons
function dokan_kits_hide_add_to_cart_button_css() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .single-product .product-type-simple .single_add_to_cart_button,
        .single-product .product-type-variable .single_add_to_cart_button,
        .product .add_to_cart_button {
            display: none !important;
        }
    </style>
    <?php
}

// Function to set the default seller role
function set_dokan_seller_default_role() {
    return 'seller';
}

// Function to remove specified product types
function dokan_kits_remove_product_types($product_types) {
    if (get_option('remove_variable_product_checkbox') === '1') {
        unset($product_types['variable']);
    }
    if (get_option('remove_external_product_checkbox') === '1') {
        unset($product_types['external']);
    }
    if (get_option('remove_grouped_product_checkbox') === '1') {
        unset($product_types['grouped']);
    }
    return $product_types;
}

function remove_become_a_vendor_button() {
    remove_action('woocommerce_after_my_account', [ dokan()->frontend_manager->become_a_vendor, 'render_become_a_vendor_section' ]);
}

function remove_dokan_registration_hooks() {
    // Remove Dokan's custom registration form fields
    remove_action('woocommerce_register_form', 'dokan_seller_reg_form_fields', 10);

    // Remove Dokan's registration validation
    remove_filter('woocommerce_process_registration_errors', [dokan()->registration, 'validate_registration'], 10);
    remove_filter('woocommerce_registration_errors', [dokan()->registration, 'validate_registration'], 10);
}
// Function to auto-complete WooCommerce orders for virtual and downloadable products
function auto_complete_virtual_downloadable_orders($needs_processing, $product, $order_id) {
    if ($product->is_virtual() || $product->is_downloadable()) {
        return false; // Auto-complete order
    }
    return $needs_processing; // Keep default behavior for other products
}
function dokan_kits_remove_short_description() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .dokan-product-edit-form .dokan-product-short-description {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_long_description() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .dokan-product-edit-form .dokan-product-description {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_inventory_section() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .dokan-product-edit-form .dokan-product-inventory {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_geolocation_option() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .dokan-product-edit-form .dokan-geolocation-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_shipping_tax_option() {
    if (is_admin()) {
        return;
    }
    ?>
    <style>
        .dokan-product-edit-form .dokan-product-shipping-tax {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_linked_product() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-linked-product-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_attribute_variation() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-attribute-variation-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_bulk_discount() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-discount-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_rma() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-rma-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_wholesale() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-wholesale-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_min_max_product() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-order-min-max-product-metabox-wrapper {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_other_options() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-other-options {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_product_advertisement() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-proudct-advertisement {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_catalog_mode() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-edit-form .dokan-catalog-mode {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_downloadable() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-type-container .downloadable-checkbox {
            display: none !important;
        }
    </style>
    <?php
}
function dokan_kits_remove_virtual() {
    if (is_admin()) return;
    ?>
    <style>
        .dokan-product-type-container .virtual-checkbox {
            display: none !important;
        }
    </style>
    <?php
}

// Helper function to check if user is a vendor
function dokan_kits_is_vendor($user_id = null) {
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    
    $user = get_userdata($user_id);
    return $user && in_array('seller', (array) $user->roles); // Changed from 'vendor' to 'seller'
}

// 3. Updated validation function for vendors
function dokan_kits_validate_product_image($file) {
    // Debug log
    error_log('Validating image upload for user: ' . get_current_user_id());
    error_log('Is vendor: ' . (dokan_kits_is_vendor() ? 'yes' : 'no'));

    // Check if user is a vendor
    if (!dokan_kits_is_vendor()) {
        error_log('Not a vendor - skipping validation');
        return $file;
    }

    // Check file type first
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file['type'], $allowed_types)) {
        $file['error'] = __('Only JPG, PNG and GIF images are allowed.', 'dokan-kits');
        return $file;
    }

    // Size restriction check
    if (get_option('enable_size_restrictions')) {
        $max_size = floatval(get_option('image_max_size', 2)) * 1024 * 1024; // Convert MB to bytes
        if ($file['size'] > $max_size) {
            $file['error'] = sprintf(
                __('Image file size must be less than %s. Your file is %s.', 'dokan-kits'),
                size_format($max_size),
                size_format($file['size'])
            );
            return $file;
        }
    }

    // Dimension restriction check
    if (get_option('enable_dimension_restrictions')) {
        $required_width = absint(get_option('image_max_width', 800));
        $required_height = absint(get_option('image_max_height', 800));
        
        $image_size = getimagesize($file['tmp_name']);
        if (!$image_size) {
            $file['error'] = __('Unable to determine image dimensions.', 'dokan-kits');
            return $file;
        }

        list($width, $height) = $image_size;
        if ($width !== $required_width || $height !== $required_height) {
            $file['error'] = sprintf(
                __('Image dimensions must be exactly %dx%d pixels. Your image is %dx%d pixels.', 'dokan-kits'),
                $required_width,
                $required_height,
                $width,
                $height
            );
            return $file;
        }
    }

    return $file;
}

// 4. Updated JavaScript validation for vendors
function dokan_kits_image_validation_script() {
    // Check if user is a vendor
    if (!dokan_kits_is_vendor()) {
        return;
    }

    $has_dimension_restrictions = get_option('enable_dimension_restrictions');
    $has_size_restrictions = get_option('enable_size_restrictions');

    if (!$has_dimension_restrictions && !$has_size_restrictions) {
        return;
    }

    $required_width = $has_dimension_restrictions ? absint(get_option('image_max_width', 800)) : null;
    $required_height = $has_dimension_restrictions ? absint(get_option('image_max_height', 800)) : null;
    $max_size = $has_size_restrictions ? floatval(get_option('image_max_size', 2)) * 1024 * 1024 : null;
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        console.log('Vendor image validation script loaded');

        function validateImage(file) {
            return new Promise((resolve, reject) => {
                <?php if ($has_size_restrictions): ?>
                if (file.size > <?php echo $max_size; ?>) {
                    reject('File size must be less than <?php echo size_format($max_size); ?>');
                    return;
                }
                <?php endif; ?>

                <?php if ($has_dimension_restrictions): ?>
                const img = new Image();
                img.src = URL.createObjectURL(file);
                
                img.onload = function() {
                    URL.revokeObjectURL(this.src);
                    if (this.width !== <?php echo $required_width; ?> || this.height !== <?php echo $required_height; ?>) {
                        reject(`Image must be exactly <?php echo $required_width; ?>x<?php echo $required_height; ?> pixels. Your image is ${this.width}x${this.height} pixels.`);
                        return;
                    }
                    resolve(true);
                };

                img.onerror = function() {
                    URL.revokeObjectURL(this.src);
                    reject('Invalid image file');
                };
                <?php else: ?>
                resolve(true);
                <?php endif; ?>
            });
        }

        // Handle file input change for product gallery
        $('.dokan-product-gallery').on('change', 'input[type="file"]', function(e) {
            console.log('File input changed');
            const file = this.files[0];
            if (!file) return;

            validateImage(file).catch(error => {
                alert(error);
                this.value = '';
            });
        });

        // Handle file input change for featured image
        $('#_product_image').on('change', function(e) {
            console.log('Featured image input changed');
            const file = this.files[0];
            if (!file) return;

            validateImage(file).catch(error => {
                alert(error);
                this.value = '';
            });
        });
    });
    </script>
    <?php
}

// 5. Updated notice for vendors
function dokan_kits_image_restriction_notice() {
    // Check if user is a vendor
    if (!dokan_kits_is_vendor()) {
        return;
    }

    $has_dimension_restrictions = get_option('enable_dimension_restrictions');
    $has_size_restrictions = get_option('enable_size_restrictions');

    if (!$has_dimension_restrictions && !$has_size_restrictions) {
        return;
    }

    ?>
    <div class="dokan-alert dokan-alert-info">
        <strong><?php _e('Image Requirements:', 'dokan-kits'); ?></strong><br>
        <?php if ($has_dimension_restrictions): ?>
            <?php printf(
                __('• Dimensions must be exactly %dx%d pixels', 'dokan-kits'),
                get_option('image_max_width', 800),
                get_option('image_max_height', 800)
            ); ?><br>
        <?php endif; ?>
        <?php if ($has_size_restrictions): ?>
            <?php printf(
                __('• Maximum file size: %sMB', 'dokan-kits'),
                get_option('image_max_size', 2)
            ); ?>
        <?php endif; ?>
    </div>
    <?php
}

// 6. Setup hooks with priority
function dokan_kits_setup_image_restrictions() {
    // Debug log
    error_log('Setting up image restrictions');
    
    // Only setup hooks if restrictions are enabled
    if (get_option('enable_dimension_restrictions') || get_option('enable_size_restrictions')) {
        // Add validation filter with high priority to ensure it runs after other filters
        add_filter('wp_handle_upload_prefilter', 'dokan_kits_validate_product_image', 20);
        
        // Add scripts and notices
        add_action('dokan_dashboard_wrap_after', 'dokan_kits_image_validation_script', 20);
        add_action('dokan_product_gallery_image_count', 'dokan_kits_image_restriction_notice', 20);
        
        // Add validation for featured image
        add_action('dokan_product_featured_image', 'dokan_kits_image_validation_script', 20);
    }
}

// Initialize on plugins loaded to ensure Dokan is loaded first
add_action('plugins_loaded', function() {
    add_action('init', 'dokan_kits_setup_image_restrictions', 20);
});
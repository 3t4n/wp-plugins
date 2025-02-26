<?php

namespace HelloPrint\Inc\Base\Controllers\Admin;

use Exception;
use HelloPrint\Inc\Base\Controllers\BaseController;

class PricingTierController extends BaseController
{
    private $tierTableName = '', $scaledPricingTableName = '';
    private $wpdb;

    private function setTable()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tierTableName = $this->wpdb->prefix . 'helloprint_pricing_tiers';
        $this->scaledPricingTableName = $this->wpdb->prefix . 'helloprint_scaled_pricing';
    }

    public function helloprint_pricing_tiers()
    {
        $s = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : "";

        $post_per_page = 20;
        $pagenum = isset($_GET['paged']) ? (int)sanitize_text_field(wp_unslash($_GET['paged'])) : 1;

        $this->setTable();
        $query = "SELECT id, name, tier_type, default_markup, enable_scaling FROM {$this->tierTableName}";

        // Use a placeholder for the search term to prevent SQL injection
        if (!empty($s)) {
            $query .= $this->wpdb->prepare(" WHERE `name` LIKE %s", '%' . $s . '%');
        }

        // Get total number of results
        $results = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query);
        $totals = $this->wpdb->num_rows;

        // Pagination: Calculate the offset
        $page = ($pagenum - 1);

        // Append pagination to the query with safe limits
        $query .= $this->wpdb->prepare(" ORDER BY id DESC LIMIT %d OFFSET %d", $post_per_page, $page * $post_per_page);

        // Fetch the results
        $tiers = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query);

        $num_of_pages = ceil($totals / $post_per_page);
        $page_links = paginate_links(array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('&laquo;', 'helloprint'),
            'next_text' => __('&raquo;', 'helloprint'),
            'total' => $num_of_pages,
            'current' => $pagenum
        ));

        require_once "$this->plugin_path/templates/admin/pricing-tiers/lists.php";
    }

    public function new_helloprint_pricing_tier()
    {
        if (isset($_POST['action'])) {
            $this->setTable();
            $name = sanitize_text_field(wp_unslash($_POST['name']));
            $default_markup = sanitize_text_field(wp_unslash($_POST['default_markup']));
            $tier_type = sanitize_text_field(wp_unslash($_POST['tier_type']));
            $enable_scaling = sanitize_text_field(wp_unslash($_POST['enable_scaling']));
            if ($enable_scaling != 1) {
                $enable_scaling = 0;
            }

            // Prepare the query to insert the pricing tier data
            $this->wpdb->query(
                $this->wpdb->prepare(
                    "INSERT INTO $this->tierTableName(name,tier_type,default_markup,enable_scaling) VALUES(%s, %s, %f, %d)",
                    $name,
                    $tier_type,
                    $default_markup,
                    $enable_scaling
                )
            );

            // If scaling is enabled, insert scaled pricing data
            if ($enable_scaling == 1) {
                $tier_id = $this->wpdb->insert_id;
                $scaled_prices = array_map('sanitize_text_field', $_POST['scaled_price']);
                $scaled_margins = array_map('sanitize_text_field', $_POST['scaled_margin']);
                foreach ($scaled_prices as $k => $sp) {
                    $sp = !empty($sp) ? $sp : 0;
                    $sm = !empty($scaled_margins[$k]) ? $scaled_margins[$k] : 0;

                    // Prepare the query to insert scaled pricing data
                    $this->wpdb->query(
                        $this->wpdb->prepare(
                            "INSERT INTO $this->scaledPricingTableName(pricing_tier_id, price, margin) VALUES(%d, %f, %f)",
                            $tier_id,
                            $sp,
                            $sm
                        )
                    );
                }
            }

            add_helloprint_flash_notice(wp_kses(_translate_helloprint("New Pricing Tier Added Successfully", "helloprint"), false), "success");
            return wp_redirect('admin.php?page=helloprint-pricing-tiers');
        }

        // Scripts for price tier add/edit
        wp_enqueue_script('wphp-admin-price-tier', $this->plugin_url . 'assets/admin/js/price-tier.js', [], _get_helloprint_version());

        $currency_symbol = get_woocommerce_currency_symbol();
        $action = "add";
        $id = "";
        $name = '';
        $tier_type = "margin";
        $default_markup = '';
        $enable_scaling = "";
        $action_to_perform = "create";
        require_once "$this->plugin_path/templates/admin/pricing-tiers/add-edit.php";
    }

    public function edit_helloprint_pricing_tier()
    {
        $this->setTable();
        if (isset($_POST['action']) && isset($_POST['id'])) {
            $id = sanitize_text_field(wp_unslash($_POST['id']));
            $name = sanitize_text_field(wp_unslash($_POST['name']));
            $tier_type = sanitize_text_field(wp_unslash($_POST['tier_type']));
            $default_markup = sanitize_text_field(wp_unslash($_POST['default_markup']));
            $enable_scaling = sanitize_text_field(wp_unslash($_POST['enable_scaling']));
            if ($enable_scaling != 1) {
                $enable_scaling = 0;
            }

            // Delete existing scaled pricing records
            $this->wpdb->query(
                $this->wpdb->prepare(
                    "DELETE FROM $this->scaledPricingTableName WHERE pricing_tier_id = %d",
                    $id
                )
            );

            // Update pricing tier data
            $this->wpdb->query(
                $this->wpdb->prepare(
                    "UPDATE $this->tierTableName SET name = %s, tier_type = %s, default_markup = %f, enable_scaling = %d WHERE id = %d",
                    $name,
                    $tier_type,
                    $default_markup,
                    $enable_scaling,
                    $id
                )
            );

            // If scaling is enabled, insert new scaled pricing data
            if ($enable_scaling == 1) {
                $scaled_prices = array_map('sanitize_text_field', $_POST['scaled_price']);
                $scaled_margins = array_map('sanitize_text_field', $_POST['scaled_margin']);
                foreach ($scaled_prices as $k => $sp) {
                    $sp = !empty($sp) ? $sp : 0;
                    $sm = !empty($scaled_margins[$k]) ? $scaled_margins[$k] : 0;

                    // Insert scaled pricing
                    $this->wpdb->query(
                        $this->wpdb->prepare(
                            "INSERT INTO $this->scaledPricingTableName (pricing_tier_id, price, margin) VALUES (%d, %f, %f)",
                            $id,
                            $sp,
                            $sm
                        )
                    );
                }
            }

            add_helloprint_flash_notice(wp_kses(_translate_helloprint("Pricing Tier Updated Successfully", "helloprint"), false), "success");
            return wp_redirect('admin.php?page=helloprint-pricing-tiers');
        }

        $id = absint($_GET['id']);
        $name = '';
        $default_markup = '';
        $enable_scaling = "";
        $tier_type = "margin";
        $scalings = [];

        // Fetch pricing tier data
        $result = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM $this->tierTableName WHERE id = %d",
                $id
            )
        );
        foreach ($result as $pricing) {
            $id = $pricing->id;
            $name = $pricing->name;
            $default_markup = $pricing->default_markup;
            $enable_scaling = $pricing->enable_scaling;
            $tier_type = $pricing->tier_type;
        }

        // Fetch scaled pricing if scaling is enabled
        if ($enable_scaling == 1) {
            $scalings = $this->wpdb->get_results(
                $this->wpdb->prepare(
                    "SELECT * FROM $this->scaledPricingTableName WHERE pricing_tier_id = %d ORDER BY id ASC",
                    $id
                )
            );
        }

        // Scripts for price tier add/edit
        wp_enqueue_script('wphp-admin-price-tier', $this->plugin_url . 'assets/admin/js/price-tier.js', [], _get_helloprint_version());

        $currency_symbol = get_woocommerce_currency_symbol();
        $action = "edit";
        $action_to_perform = "update";
        require_once "$this->plugin_path/templates/admin/pricing-tiers/add-edit.php";
    }

    public function delete_helloprint_pricing_tier()
    {
        $this->setTable();
        $helloprintProductPricingTable = $this->wpdb->prefix . 'helloprint_product_pricing_tier';

        // Sanitize and prepare the ID from the GET request
        $del_id = (int) sanitize_text_field(wp_unslash($_GET['id']));

        // Use prepared statements for secure SQL queries
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM $this->tierTableName WHERE id = %d",
                $del_id
            )
        );
        
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM $this->scaledPricingTableName WHERE pricing_tier_id = %d",
                $del_id
            )
        );
        
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM $helloprintProductPricingTable WHERE pricing_tier_id = %d",
                $del_id
            )
        );

        add_helloprint_flash_notice(wp_kses(_translate_helloprint("Pricing Tier Deleted Successfully", "helloprint"), false), "success");

        return wp_redirect('admin.php?page=helloprint-pricing-tiers');
    }
}

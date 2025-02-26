<?php

namespace HelloPrint\Inc\Base\Controllers\Admin;

use Exception;
use HelloPrint\Inc\Base\Controllers\BaseController;

class PitchPrintController extends BaseController
{
    private $tableName = '';
    private $wpdb;

    private function setTable()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tableName = $this->wpdb->prefix . 'helloprint_pitch_prints';
    }

    public function all_pitch_print_links()
    {
        $s = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : "";

        $post_per_page = 20;
        $pagenum = isset($_GET['paged']) ? (int)sanitize_text_field(wp_unslash($_GET['paged'])) : 1;

        $this->setTable();
        // Prepare search query safely
        $query = "SELECT id, name, pitchprint_design_id, hp_variant_key FROM {$this->tableName}";

        if (!empty($s)) {
            // Use %s placeholder for the search string
            $query .= $this->wpdb->prepare(
                " WHERE (`name` LIKE %s OR `pitchprint_design_id` LIKE %s OR `hp_variant_key` LIKE %s)",
                '%' . $this->wpdb->esc_like($s) . '%', // Escape the search string for LIKE comparison
                '%' . $this->wpdb->esc_like($s) . '%', // Use same escaped string for all the columns
                '%' . $this->wpdb->esc_like($s) . '%'
            );
        }

        // Get total number of results
        $results = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query
        );
        $totals = $wpdb->num_rows;

        // Handle pagination securely
        $page = ($pagenum - 1);
        $query .= $this->wpdb->prepare(
            " ORDER BY id DESC LIMIT %d OFFSET %d",
            $post_per_page, // Sanitize for integer values
            $page * $post_per_page // Calculate offset
        );

        // Get paginated results
        $pitchprints = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query
        );

        $num_of_pages = ceil($totals / $post_per_page);
        $page_links = paginate_links(array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('&laquo;', 'helloprint'),
            'next_text' => __('&raquo;', 'helloprint'),
            'total' => $num_of_pages,
            'current' => $pagenum
        ));

        require_once "$this->plugin_path/templates/admin/pitch-print/all-pitch-prints.php";
    }

    public function new_pitch_print_form()
    {
        if (isset($_POST['action'])) {
            $this->setTable();
            $name = sanitize_text_field(wp_unslash($_POST['name']));
            $design_id = sanitize_text_field(wp_unslash($_POST['design_id']));
            $variant_key = sanitize_text_field(wp_unslash($_POST['variant_key']));
            $this->wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared	
                $this->wpdb->prepare(
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    "INSERT INTO $this->tableName (name, pitchprint_design_id, hp_variant_key) VALUES (%s, %d, %s)",
                    $name, $design_id, $variant_key
                )
            );
            add_helloprint_flash_notice(esc_attr(_translate_helloprint("New Pitchprint Added Successfully")), "success");
            return wp_redirect('admin.php?page=hp-pitch-print');
        }

        require_once "$this->plugin_path/templates/admin/pitch-print/new-pitch-print.php";
    }

    public function edit_pitch_print_form()
    {
        $this->setTable();
        if (isset($_POST['action']) && isset($_POST['id'])) {
            $id = sanitize_text_field(wp_unslash($_POST['id']));
            $name = sanitize_text_field(wp_unslash($_POST['name']));
            $design_id = sanitize_text_field(wp_unslash($_POST['design_id']));
            $variant_key = sanitize_text_field(wp_unslash($_POST['variant_key']));
            $this->wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $this->wpdb->prepare(
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    "UPDATE $this->tableName SET name = %s, pitchprint_design_id = %d, hp_variant_key = %s WHERE id = %d",
                    $name, $design_id, $variant_key, $id
                )
            );
            add_helloprint_flash_notice(esc_attr(_translate_helloprint("Pitchprint Updated Successfully")), "success");
            return wp_redirect('admin.php?page=hp-pitch-print');
        }

        $id = absint($_GET['id']);
        $name = '';
        $design_id = '';
        $variant_key = '';
        $result = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $this->wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                "SELECT * FROM $this->tableName WHERE id = %d",
                $id
            )
        );
        foreach ($result as $print) {
            $name = $print->name;
            $design_id = $print->pitchprint_design_id;
            $variant_key = $print->hp_variant_key;
        }

        require_once "$this->plugin_path/templates/admin/pitch-print/edit-pitch-print.php";
    }

    public function delete_pitch_print()
    {
        $this->setTable();
        $del_id = (int)sanitize_text_field(wp_unslash($_GET['id']));
        $this->wpdb->query(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $this->wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                "DELETE FROM $this->tableName WHERE id = %d",
                $del_id
            )
        );
        add_helloprint_flash_notice(esc_attr(_translate_helloprint("Pitchprint deleted Successfully")), "success");
        return wp_redirect('admin.php?page=hp-pitch-print');
    }

    public function is_plugin_activated()
    {
        require_once $this->plugin_path . "includes/Base/Functions.php";
        return \hp_is_pitchprint_plugin_active();
    }
}

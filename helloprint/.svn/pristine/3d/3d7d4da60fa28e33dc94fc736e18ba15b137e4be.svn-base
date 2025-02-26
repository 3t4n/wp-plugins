<?php

namespace HelloPrint\Inc\Base\Controllers\Admin;

use Exception;
use HelloPrint\Inc\Base\Controllers\BaseController;

class LanguageTranslatorController extends BaseController
{
    private $tableName = '';
    private $wpdb;

    private function setTable()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tableName = $this->wpdb->prefix . 'helloprint_translations';
    }

    public function helloprint_language_translator()
    {
        $s = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : "";

        $post_per_page = 20;
        $pagenum = isset($_GET['paged']) ? (int)sanitize_text_field(wp_unslash($_GET['paged'])) : 1;

        $this->setTable();
        $query = "SELECT id, string, translation FROM {$this->tableName}";

        // Use a placeholder for the search term to prevent SQL injection
        if (!empty($s)) {
            $query .= $this->wpdb->prepare(" WHERE (`string` LIKE %s OR `translation` LIKE %s)", '%' . $s . '%', '%' . $s . '%');
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
        $translations = $this->wpdb->get_results(
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

        require_once "$this->plugin_path/templates/admin/translator/lists.php";
    }

    public function new_helloprint_language_translator()
    {
        if (isset($_POST['action'])) {
            $this->setTable();
            $string = sanitize_text_field(wp_unslash($_POST['string']));
            $translation = implode( "\n", array_map( 'sanitize_textarea_field', explode( "\n", $_POST['translation'])));
            $translation = str_replace(array("\r\n", "\r", "\n", "\\n"), "<br/>", $translation);
            $this->wpdb->query(
                $this->wpdb->prepare(
                    "INSERT INTO $this->tableName (string, translation) VALUES (%s, %s)",
                    $string,
                    $translation
                )
            );
            return wp_redirect('admin.php?page=language-translate.php&success=added');
        }

        require_once "$this->plugin_path/templates/admin/translator/add.php";
    }

    public function edit_helloprint_language_translator()
    {
        $this->setTable();
        if (isset($_POST['action']) && isset($_POST['id'])) {
            $this->setTable();
            $id = sanitize_text_field(wp_unslash($_POST['id']));
            $string = sanitize_text_field(wp_unslash($_POST['string']));
            $translation = implode( "\n", array_map( 'sanitize_textarea_field', explode( "\n", $_POST['translation'])));
            $translation = str_replace(array("\r\n", "\r", "\n", "\\n"), "<br />", $translation);
            $this->wpdb->query(
                $this->wpdb->prepare(
                    "UPDATE $this->tableName SET string = %s, translation = %s WHERE id = %d",
                    $string,
                    $translation,
                    $id
                )
            );
            return wp_redirect('admin.php?page=language-translate.php&success=updated');
        }

        $id = absint($_GET['id']);
        $string = '';
        $translation = '';
        $result = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM $this->tableName WHERE id = %d",
                $id
            )
        );
        foreach ($result as $print) {
            $string = $print->string;
            $translation = $print->translation;
        }

        require_once "$this->plugin_path/templates/admin/translator/edit.php";
    }

    public function delete_helloprint_language_translator()
    {
        $this->setTable();
        $del_id = (int)sanitize_text_field(wp_unslash($_GET['id']));
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM $this->tableName WHERE id = %d",
                $del_id
            )
        );
        return wp_redirect('admin.php?page=language-translate.php&success=deleted');
    }
}

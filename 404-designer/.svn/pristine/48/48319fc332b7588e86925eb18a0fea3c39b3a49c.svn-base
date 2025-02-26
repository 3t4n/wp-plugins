<?php

if (!defined('ABSPATH'))
    exit;

?>
<div class="wrap">
    <h1>404 Designer</h1>
    <form method="post" action="options.php">
        <?php settings_fields('c404Designer_settings_group'); ?>
        <?php do_settings_sections('c404Designer_settings_group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Search for a Page to Use as 404 Template</th>
                <td>
                    <input type="text" id="c404_search_page" placeholder="Search for a page..." />
                    <select id="c404_selected_404_page" name="c404Designer_selected_404_page">
                        <option value="">Select a page...</option>
                        <?php
                        // If a page is already selected, show it
                        $selected_page = get_option('c404Designer_selected_404_page');
                        if ($selected_page) {
                            $page = get_post($selected_page);
                            echo '<option value="' . esc_attr($page->ID) . '" selected>' . esc_html($page->post_title) . '</option>';
                        }
                        ?>
                    </select>
                    <p class="description">Start typing to search for a page.</p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
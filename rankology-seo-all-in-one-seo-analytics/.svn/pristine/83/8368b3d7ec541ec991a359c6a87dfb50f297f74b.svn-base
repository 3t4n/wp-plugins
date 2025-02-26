<div class="wrap rkns-wrap">
    <div class="postbox">
        <form method="post">
            <input type="hidden" name="rkns_export" value="true">
            <?php wp_nonce_field('rankology_stats_export_nonce', 'rkns_export_file'); ?>
            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row" colspan="2"><h3><?php esc_html_e('Export', 'rankology-stats'); ?></h3></th>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="table-to-export"><?php esc_html_e('Export from:', 'rankology-stats'); ?></label>
                    </th>

                    <td>
                        <select dir="<?php echo(is_rtl() ? 'rtl' : 'ltr'); ?>" id="table-to-export" name="table-to-export" required>
                            <option value=""><?php esc_html_e('Please select', 'rankology-stats'); ?></option>
                            <?php
                            foreach (RANKOLOGY_STATS\DB::table('all', array('historical', 'visitor_relationships')) as $tbl_key => $tbl_name) {
                                echo '<option value="' . esc_attr($tbl_key) . '">' . esc_attr($tbl_name) . '</option>';
                            }
                            ?>
                        </select>

                        <p class="description"><?php esc_html_e('Select the table for the output file.', 'rankology-stats'); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="export-file-type"><?php esc_html_e('Export To:', 'rankology-stats'); ?></label>
                    </th>

                    <td>
                        <select dir="ltr" id="export-file-type" name="export-file-type" required>
                            <option value=""><?php esc_html_e('Please select', 'rankology-stats'); ?></option>
                            <option value="xml">XML</option>
                            <option value="csv">CSV</option>
                            <option value="tsv">TSV</option>
                        </select>

                        <p class="description"><?php esc_html_e('Select the output file type.', 'rankology-stats'); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="export-headers"><?php esc_html_e('Include Header Row:', 'rankology-stats'); ?></label>
                    </th>

                    <td>
                        <input id="export-headers" type="checkbox" value="1" name="export-headers">
                        <p class="description"><?php esc_html_e('Include a header row as the first line of the exported file.', 'rankology-stats'); ?></p>
                        <?php submit_button(__('Start Now!', 'rankology-stats'), 'primary', 'export-file-submit'); ?>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
</div>

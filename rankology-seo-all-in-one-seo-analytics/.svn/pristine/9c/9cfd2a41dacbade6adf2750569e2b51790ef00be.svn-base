<div class="wrap rkns-wrap">
    <div class="postbox">
        <form action="<?php echo admin_url('admin.php?page=rkns_optimization_page&tab=database') ?>" method="post">
            <?php wp_nonce_field('rkns_optimization_nonce'); ?>
            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row" colspan="2"><h3><?php esc_html_e('Database Setup', 'rankology-stats'); ?></h3></th>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="index-submit"><?php esc_html_e('Re-run Install:', 'rankology-stats'); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="submit" value="1"/>
                        <button id="install-submit" class="button button-primary" type="submit" value="1" name="install-submit"><?php esc_html_e('Install Now!', 'rankology-stats'); ?></button>
                        <p class="description"><?php esc_html_e('If for some reason your installation of Rankology Stats is missing the database tables or other core items, this will re-execute the install process.', 'rankology-stats'); ?></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="postbox">
        <form action="<?php echo admin_url('admin.php?page=rkns_optimization_page&tab=database') ?>" method="post" id="rkns-run-optimize-database-form">
            <?php wp_nonce_field('rkns_optimization_nonce'); ?>
            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row" colspan="2">
                        <h3><?php esc_html_e('Repair and Optimization Database Tables', 'rankology-stats'); ?></h3></th>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="index-submit"><?php esc_html_e('Optimize Table:', 'rankology-stats'); ?></label>
                    </th>
                    <td>
                        <select dir="<?php echo(is_rtl() ? 'rtl' : 'ltr'); ?>" id="optimize-table" name="optimize-table">
                            <option value="0"><?php esc_html_e('Please select', 'rankology-stats'); ?></option>
                            <?php
                            foreach (RANKOLOGY_STATS\DB::table('all') as $tbl_key => $tbl_name) {
                                echo '<option value="' . esc_attr($tbl_key) . '">' . esc_attr($tbl_name) . '</option>';
                            }
                            ?>
                            <option value="all"><?php echo __('All', 'rankology-stats'); ?></option>
                        </select>
                        <p class="description"><?php esc_html_e('Please select the table you would like to optimize and repair',
                                'rankology-stats'); ?></p>

                        <input type="hidden" name="submit" value="1"/>
                        <button class="button button-primary" type="submit" value="1" name="optimize-database-submit" style="margin-top:5px;"><?php esc_html_e('Run Now!', 'rankology-stats'); ?></button>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#rkns-run-optimize-database-form").submit(function (e) {
            var tbl = jQuery('#optimize-table').val();
            if (tbl == "0") {
                alert('<?php esc_html_e("Please select database table", "rankology-stats"); ?>');
                e.preventDefault();
            }
        });
    });
</script>
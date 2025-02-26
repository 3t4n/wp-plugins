<?php
// Get the historical number of visitors to the site
$historical_visitors = RANKOLOGY_STATS\Historical::get('visitors');

// Get the historical number of visits to the site
$historical_visits = RANKOLOGY_STATS\Historical::get('visits');

?>
<div class="wrap rkns-wrap">
    <div class="postbox">
        <form action="<?php echo admin_url('admin.php?page=rkns_optimization_page&tab=historical') ?>" id="rkns_historical_form" method="post">
            <?php wp_nonce_field('rkns_optimization_nonce'); ?>
            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row" colspan="2"><h3><?php esc_html_e('Historical Values', 'rankology-stats'); ?></h3></th>
                </tr>

                <tr valign="top" id="rkns_historical_purge" style="display: none">
                    <th scope="row" colspan=2>
                        <?php esc_html_e('Note: As you have just purged the database you must reload this page for these numbers to be correct.', 'rankology-stats'); ?>
                    </th>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Visitors', 'rankology-stats'); ?>:
                    </th>
                    <td>
                        <input type="text" size="10" value="<?php echo esc_attr($historical_visitors); ?>" id="rkns_historical_visitors" name="rkns_historical_visitors">
                        <p class="description"><?php echo sprintf(__('Number of historical number of visitors to the site (current value is %s).', 'rankology-stats'), number_format_i18n($historical_visitors)); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Visits', 'rankology-stats'); ?>:
                    </th>
                    <td>
                        <input type="text" size="10" value="<?php echo esc_attr($historical_visits); ?>" id="rkns_historical_visits" name="rkns_historical_visits">
                        <p class="description"><?php echo sprintf(__('Number of historical number of visits to the site (current value is %s).', 'rankology-stats'), number_format_i18n($historical_visits)); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <td colspan=2>
                        <input type="hidden" name="submit" value="1" />
                        <button id="historical-submit" class="button button-primary" type="submit" value="1" name="historical-submit"><?php esc_html_e('Update Now!', 'rankology-stats'); ?></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

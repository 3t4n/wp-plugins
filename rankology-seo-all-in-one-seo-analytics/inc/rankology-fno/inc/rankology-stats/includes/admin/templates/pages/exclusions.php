<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox" id="<?php echo \RANKOLOGY_STATS\Meta_Box::getMetaBoxKey('exclusions'); ?>">
                <div class="inside">
                    <!-- Do Js -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="postbox-container rkns-postbox-full">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="inside">
                    <table width="auto" class="widefat table-stats rkns-summary-stats" id="summary-stats" data-table="exclusions">
                        <tbody>
                        <tr>
                            <th></th>
                            <th class="th-center"><?php esc_html_e('Exclusions', 'rankology-stats'); ?></th>
                        </tr>

                        <tr>
                            <th><?php esc_html_e('Chart Total:', 'rankology-stats'); ?></th>
                            <th class="th-center"><span id="number-total-chart-exclusions"></span></th>
                        </tr>

                        <tr>
                            <th class="rkns-text-muted"><?php esc_html_e('All Time Total:', 'rankology-stats'); ?></th>
                            <th class="th-center"><span style="color: #DC3545 !important;"><?php echo number_format_i18n($total_exclusions); ?></span></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
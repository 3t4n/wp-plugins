<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox" id="<?php echo \RANKOLOGY_STATS\Meta_Box::getMetaBoxKey('hits'); ?>">
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
                    <table width="auto" class="widefat table-stats rkns-summary-stats" id="summary-stats">
                        <tbody>
                        <tr>
                            <th></th>
                            <?php if (\RANKOLOGY_STATS\Option::get('visits')) { ?>
                                <th class="th-center"><?php esc_html_e('Visits', 'rankology-stats'); ?></th> <?php } ?>
                            <?php if (\RANKOLOGY_STATS\Option::get('visitors')) { ?>
                                <th class="th-center"><?php esc_html_e('Visitors', 'rankology-stats'); ?></th> <?php } ?>
                        </tr>

                        <tr>
                            <th><?php esc_html_e('Chart Total:', 'rankology-stats'); ?></th>
                            <?php if (\RANKOLOGY_STATS\Option::get('visits')) { ?>
                                <th class="th-center"><span id="number-total-chart-visits"></span></th> <?php } ?>
                            <?php if (\RANKOLOGY_STATS\Option::get('visitors')) { ?>
                                <th class="th-center"><span id="number-total-chart-visitors"></span></th> <?php } ?>
                        </tr>

                        <tr>
                            <th><?php esc_html_e('All Time Total:', 'rankology-stats'); ?></th>
                            <?php if (\RANKOLOGY_STATS\Option::get('visits')) { ?>
                                <th class="th-center"><span><?php echo number_format_i18n($total_visits); ?></span></th> <?php } ?>
                            <?php if (\RANKOLOGY_STATS\Option::get('visitors')) { ?>
                                <th class="th-center"><span><?php echo number_format_i18n($total_visitors); ?></span></th> <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

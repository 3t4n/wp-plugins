<div id="poststuff">
    <div id="post-body" class="metabox-holder">
        <div class="wp-list-table widefat widefat">
            <form id="rankology-stats-settings-form" method="post">
                <?php wp_nonce_field('update-options', 'rankology-stats-nonce'); ?>

                <div class="rankology-stats-container">
                    <?php if ($rkns_admin) { ?>
                        <div id="general-settings" class="tab-content current">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/general.php'; ?>
                        </div>
                        <div id="ip-configuration-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/visitor-ip.php'; ?>
                        </div>
                        <div id="privacy-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/privacy.php'; ?>
                        </div>
                        <div id="notifications-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/notifications.php'; ?>
                        </div>
                        <div id="access-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/access-level.php'; ?>
                        </div>
                        <div id="exclusions-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/exclusions.php'; ?>
                        </div>
                        <div id="geoipsets-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/geoipsets.php'; ?>
                        </div>
                        <div id="maintenance-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/maintenance.php'; ?>
                        </div>
                        <div id="reset-settings" class="tab-content">
                            <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/settings/reset.php'; ?>
                        </div>
                    <?php } ?>
                    
                </div><!-- container -->

                <input type="hidden" name="tab" id="rkns_current_tab" value=""/>
            </form>
        </div>
        <?php include RANKOLOGY_STATS_DIR . 'includes/admin/templates/postbox.php'; ?>
    </div>
</div>

<div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
        <div class="wp-list-table widefat widefat">
            <div class="rankology-stats-container">
                <div id="resources" class="tab-content current">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/resources.php'); ?>
                </div>
                <div id="export" class="tab-content">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/export.php'); ?>
                </div>
                <div id="purging" class="tab-content">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/purging.php'); ?>
                </div>
                <div id="database" class="tab-content">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/database.php'); ?>
                </div>
                <div id="updates" class="tab-content">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/updates.php'); ?>
                </div>
                <div id="historical" class="tab-content">
                    <?php include(RANKOLOGY_STATS_DIR . 'includes/admin/templates/optimization/historical.php'); ?>
                </div>
            </div><!-- container -->
        </div>

        <?php include RANKOLOGY_STATS_DIR . "includes/admin/templates/postbox.php"; ?>
    </div>
</div>

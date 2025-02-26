<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox" id="<?php echo \RANKOLOGY_STATS\Meta_Box::getMetaBoxKey('pages-chart'); ?>">
                <div class="inside">
                    <!-- Do Js -->
                </div>
            </div>
        </div>
    </div>
</div>

<div id="rkns-postbox-container-1" style="float: right" class="postbox-container">
    <div id="side-sortables" class="meta-box-sortables ui-sortable">
        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Top Browsers', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Top Browsers', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($browsers); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Top Platforms', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Top Platforms', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($platforms); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Top Countries', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Top Countries', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($countries); ?>
            </div>
        </div>
    </div>
</div>

<div id="rkns-postbox-container-2" style="float: left; margin-left: 0" class="postbox-container">
    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Visitors Map', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Visitors Map', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($visitors_map); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Active Users', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Active Users', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($useronline); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Latest Visitors', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Latest Visitors', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($visitors); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Top Visitors', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Top Visitors', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($top_visitors); ?>
            </div>
        </div>

        <div class="postbox" id="rankology-stats-pages-widget">
            <div class="postbox-header postbox-toggle">
                <h2 class="hndle rkns-d-inline-block"><span><?php esc_html_e('Top Referring', 'rankology-stats'); ?></span></h2>
                <button class="handlediv" type="button" aria-expanded="true">
                    <span class="screen-reader-text"><?php esc_html_e('Toggle panel: Top Referring', 'rankology-stats'); ?></span>
                    <span class="toggle-indicator" aria-hidden="true"></span>
                </button>
            </div>
            <div class="inside rkns-wrap">
                <?php echo wp_kses_post($referring); ?>
            </div>
        </div>
    </div>
</div>
<ul class="subsubsub">
    <li class="all">
        <a href="<?php echo \RANKOLOGY_STATS\Menus::admin_url('referrers'); ?>"><?php esc_html_e('All', 'rankology-stats'); ?></a>
    </li>
    |
    <li>
        <a class="current" href="<?php echo esc_url(add_query_arg(array('referrer' => $args['domain']))); ?>">
            <?php echo esc_attr($args['domain']); ?>
            <span class="count">(<?php echo number_format_i18n($total); ?>)</span>
        </a>
    </li>
</ul>

<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="postbox-header postbox-toggle">
                    <h2 class="hndle rkns-d-inline-block"><span><?php echo esc_attr($title); ?></span></h2>
                    <button class="handlediv" type="button" aria-expanded="true">
                        <span class="screen-reader-text"><?php echo sprintf(__('Toggle panel: %s', 'rankology-stats'), esc_attr($title)); ?></span>
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="inside">
                    <?php if (count($list) < 1) { ?>
                        <div class='rkns-wrap--no-content rkns-center'><?php esc_html_e("No data to display", "rankology-stats"); ?></div>
                    <?php } else { ?>
                        <table width="100%" class="widefat table-stats" id="top-referring">
                            <tr>
                                <td><?php esc_html_e('Link', 'rankology-stats'); ?></td>
                                <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                                <td><?php esc_html_e('Browser', 'rankology-stats'); ?></td>
                                <?php if (\RANKOLOGY_STATS\GeoIP::active()) { ?>
                                    <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                                <?php } ?>
                                <td><?php esc_html_e('Date', 'rankology-stats'); ?></td>
                                <td></td>
                            </tr>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td style="text-align: left" class="rkns-admin-column__referred">
                                        <a href="<?php echo esc_url($item['refer']); ?>" target="_blank" title="<?php echo esc_attr($item['refer']); ?>"><?php echo preg_replace("(^https?://)", "", trim($item['refer'])); ?></a>
                                    </td>
                                    <td style='text-align: left;' class="rkns-admin-column__ip"><?php echo(isset($item['hash_ip']) ? $item['hash_ip'] : "<a href='" . esc_url($item['ip']['link']) . "' class='rkns-text-success'>" . esc_attr($item['ip']['value']) . "</a>"); ?></td>
                                    <td style="text-align: left">
                                        <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="log-tools rkns-flag" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                                    </td>
                                    <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                        <td style="text-align: left">
                                            <img src="<?php echo esc_url($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="log-tools rkns-flag"/>
                                        </td>
                                    <?php } ?>
                                    <td style="text-align: left"><?php echo esc_attr($item['date']); ?></td>
                                    <td style='text-align: center'><?php echo(isset($item['map']) ? "<a class='rkns-text-muted' href='" . esc_url($item['ip']['link']) . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-visibility') . "</a><a class='show-map rkns-text-muted' href='" . esc_url($item['map']) . "' target='_blank' title='" . __('Map', 'rankology-stats') . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-location-alt') . "</a>" : ""); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <?php echo isset($pagination) ? $pagination : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
    </div>
</div>
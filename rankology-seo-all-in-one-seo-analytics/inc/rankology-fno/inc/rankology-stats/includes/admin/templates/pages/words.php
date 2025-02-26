<ul class="subsubsub rankology-stats-sub-fullwidth">
    <?php
    foreach ($search_engine as $key => $item) {
        ?>
        <li class="all">
            <a <?php if ($item['active'] === true) { ?> class="current" <?php } ?> href="<?php echo esc_url($item['link']); ?>">
                <?php echo esc_attr($item['title']); ?>
                <span class='count'>(<?php echo number_format_i18n($item['count']); ?>)</span>
            </a>
        </li>
        <?php $search_engine_keys = array_keys($search_engine);
        if (end($search_engine_keys) != $key) { ?> | <?php } ?><?php } ?>
</ul>

<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="inside">
                    <?php if (count($list) < 1) { ?>
                        <div class='rkns-wrap--no-content rkns-center'><?php esc_html_e("No data to display", "rankology-stats"); ?></div>
                    <?php } else { ?>
                        <div class="o-table-wrapper">
                            <table width="100%" class="o-table">
                                <tr>
                                    <td><?php esc_html_e('Word', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Browser', 'rankology-stats'); ?></td>
                                    <?php if (\RANKOLOGY_STATS\GeoIP::active()) { ?>
                                        <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                                    <?php } ?>
                                    <?php if (\RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                        <td><?php esc_html_e('City', 'rankology-stats'); ?></td>
                                    <?php } ?>
                                    <td><?php esc_html_e('Date', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                                </tr>

                                <?php foreach ($list as $item) { ?>
                                    <tr>
                                        <td><?php echo esc_attr($item['word']); ?></td>
                                        <td>
                                            <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="log-tools rkns-flag" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                                        </td>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                            <td>
                                                <img src="<?php echo esc_attr($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="log-tools rkns-flag"/>
                                            </td>
                                        <?php } ?>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                            <td>
                                                <?php echo esc_attr($item['city']); ?>
                                            </td>
                                        <?php } ?>
                                        <td><?php echo esc_attr($item['date']); ?></td>
                                        <td class="rkns-admin-column__ip"><?php echo(isset($item['hash_ip']) ? esc_attr($item['hash_ip']) : "<a href='" . esc_url($item['ip']['link']) . "' class='rkns-text-success'>" . esc_attr($item['ip']['value']) . "</a>"); ?></td>
                                        <td class="rkns-admin-column__referred"><?php echo wp_kses_post($item['referred']); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php echo isset($pagination) ? $pagination : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
    </div>
</div>
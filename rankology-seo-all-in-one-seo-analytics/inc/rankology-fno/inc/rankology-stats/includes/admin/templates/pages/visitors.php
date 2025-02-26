<ul class="subsubsub rankology-stats-sub-fullwidth">
    <?php
    foreach ($sub as $key => $item) {
        ?>
        <li class="all">
            <a <?php if ($item['active'] === true) { ?> class="current" <?php } ?> href="<?php echo esc_url($item['link']); ?>">
                <?php echo esc_attr($item['title']); ?>
                <span class='count'>(<?php echo number_format_i18n($item['count']); ?>)</span>
            </a>
        </li>
        <?php $sub_keys = array_keys($sub);
        if (end($sub_keys) != $key) { ?> | <?php } ?><?php } ?>
</ul>

<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="inside">
                    <?php if (!is_array($list) || (is_array($list) and count($list) < 1)) { ?>
                        <div class='rkns-wrap--no-content rkns-center'><?php esc_html_e("No data to display", "rankology-stats"); ?></div>
                    <?php } else { ?>
                    <div class="o-table-wrapper">
                            <table width="100%" class="o-table">
                                <tr>
                                    <td><?php esc_html_e('Browser', 'rankology-stats'); ?></td>
                                    <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                        <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                                    <?php } ?>
                                    <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                        <td><?php esc_html_e('City', 'rankology-stats'); ?></td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?php echo esc_url( add_query_arg('order', ((isset($_GET['order']) and $_GET['order'] == "asc") ? 'desc' : 'asc'))); ?>">
                                            <?php esc_html_e('Date', 'rankology-stats'); ?>
                                            <span class="dashicons dashicons-arrow-<?php echo((isset($_GET['order']) and $_GET['order'] == "asc") ? 'up' : 'down'); ?>"></span>
                                        </a>
                                    </td>
                                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Platform', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Traffic', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('User', 'rankology-stats'); ?></td>
                                    <?php
                                    if (\RANKOLOGY_STATS\Option::get('visitors_log')) {
                                        ?>
                                        <td class="tbl-page-column"><?php esc_html_e('Page', 'rankology-stats'); ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                                </tr>

                                <?php foreach ($list as $item) { ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="rkns-flag log-tools" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                                        </td>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                            <td>
                                                <img src="<?php echo esc_attr($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="log-tools rkns-flag"/>
                                            </td>
                                        <?php } ?>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                            <td><?php echo esc_attr($item['city']); ?></td>
                                        <?php } ?>
                                        <td><span><?php echo esc_attr($item['date']); ?></span></td>
                                        <td class="rkns-admin-column__ip">
                                            <?php echo(isset($item['map']) ? "<a class='show-map' href='" . esc_url($item['map']) . "' target='_blank' title='" . __('Map', 'rankology-stats') . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-location-alt') . "</a>" : ""); ?>
                                            <?php echo(isset($item['hash_ip']) ? esc_attr($item['hash_ip']) : "<a href='" . esc_url($item['ip']['link']) . "'>" . esc_attr($item['ip']['value']) . "</a>"); ?>
                                        </td>
                                        <td><?php echo esc_attr($item['platform']); ?></td>
                                        <td><?php echo esc_attr($item['hits']); ?></td>
                                        <td>
                                            <?php if (isset($item['user']) and isset($item['user']['ID']) and $item['user']['ID'] > 0) { ?>
                                                <a href="<?php echo esc_url(\RANKOLOGY_STATS\Menus::admin_url('visitors', array('user_id' => $item['user']['ID']))); ?>"><?php echo esc_attr($item['user']['user_login']); ?></a>
                                            <?php } else { ?>
                                                <?php echo \RANKOLOGY_STATS\Admin_Template::UnknownColumn(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                            <?php } ?>
                                        </td>
                                        <?php
                                        if (\RANKOLOGY_STATS\Option::get('visitors_log')) {
                                            ?>
                                            <td style='text-align: left;' class="tbl-page-column">
                                                <span class="txt-overflow" title="<?php echo($item['page']['title'] != "" ? esc_attr($item['page']['title']) : ''); ?>"><?php echo ($item['page']['link'] != '' ? '<a href="' . esc_url($item['page']['link']) . '" target="_blank" class="rkns-text-muted">' : '') . ($item['page']['title'] != "" ? $item['page']['title'] : \RANKOLOGY_STATS\Admin_Template::UnknownColumn()) . ($item['page']['link'] != '' ? '</a>' : ''); ?></span>
                                            </td>
                                            <?php
                                        }
                                        ?>
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

<form class="rkns-search-date" method="get" style="margin-top: 15px;">
    <label for="search-date-input"><?php esc_html_e('Date', 'rankology-stats'); ?>:</label>
    <input type="hidden" name="page" value="<?php echo esc_attr($pageName); ?>">
    <input class="rkns-search-date__input rkns-js-calendar-field" id="search-date-input" type="text" size="18" name="day" data-rkns-date-picker="day" value="<?php echo esc_attr($day); ?>" autocomplete="off" placeholder="YYYY-MM-DD" required>
    <button type="submit" class="button-primary"><span class="dashicons dashicons-search"></span></button>
</form>
<div class="wp-clearfix"></div>
<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="inside">
                    <?php if (!is_array($list) || (is_array($list) and count($list) < 1)) { ?>
                        <div class='rkns-wrap--no-content rkns-center'><?php esc_html_e("No information is available for this day.", "rankology-stats"); ?></div>
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
                                    <td><?php esc_html_e('Date', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Platform', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('User', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Traffic', 'rankology-stats'); ?></td>
                                    <td></td>
                                </tr>

                                <?php foreach ($list as $item) { ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="rkns-flag log-tools" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                                        </td>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                            <td>
                                                <img src="<?php echo esc_url($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="log-tools rkns-flag"/>
                                            </td>
                                        <?php } ?>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                            <td><?php echo esc_attr($item['city']); ?></td>
                                        <?php } ?>
                                        <td><span><?php echo esc_attr($item['date']); ?></span></td>
                                        <td class="rkns-admin-column__ip"><?php echo(isset($item['hash_ip']) ? esc_attr($item['hash_ip']) : "<a href='" . esc_url($item['ip']['link']) . "' class='rkns-text-muted'>" . esc_attr($item['ip']['value']) . "</a>"); ?></td>
                                        <td><?php echo esc_attr($item['platform']); ?></td>
                                        <td>
                                            <?php if (isset($item['user']) and isset($item['user']['ID']) and $item['user']['ID'] > 0) { ?>
                                                <a href="<?php echo \RANKOLOGY_STATS\Menus::admin_url('visitors', array('user_id' => $item['user']['ID'])); ?>" class="rkns-text-success"><?php echo esc_attr($item['user']['user_login']); ?></a>
                                            <?php } else { ?>
                                                <?php echo \RANKOLOGY_STATS\Admin_Template::UnknownColumn(); ?>
                                            <?php } ?>
                                        </td>
                                        <td class="rkns-admin-column__referred"><?php echo wp_kses_post($item['referred']); ?></td>
                                        <td><?php echo esc_attr($item['hits']); ?></td>
                                        <td style='text-align: center'><?php echo(isset($item['map']) ? "<a class='table-icon-btn rkns-text-muted' href='" . esc_url($item['ip']['link']) . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-visibility') . "</a><a class='table-icon-btn show-map rkns-text-muted' href='" . esc_url($item['map']) . "' target='_blank' title='" . __('Map', 'rankology-stats') . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-location-alt') . "</a>" : ""); ?></td>
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

<div class="postbox-container" id="rkns-big-postbox">
    <div class="metabox-holder">
        <div class="meta-box-sortables">
            <div class="postbox">
                <div class="inside">
                    <?php if (!is_array($user_online_list)) { ?>
                        <div class='rkns-wrap--no-content rkns-center'><?php echo esc_attr($user_online_list); ?></div>
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
                                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Online For', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Page', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('User', 'rankology-stats'); ?></td>
                                    <td></td>
                                </tr>

                                <?php foreach ($user_online_list as $item) { ?>
                                    <tr>
                                        <td style="text-align: left">
                                            <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="rkns-flag log-tools" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                                        </td>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                                            <td style="text-align: left">
                                                <img src="<?php echo esc_url($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="log-tools rkns-flag"/>
                                            </td>
                                        <?php } ?>
                                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                                            <td><?php echo esc_attr($item['city']); ?></td>
                                        <?php } ?>
                                        <td style='text-align: left' class="rkns-admin-column__ip"><?php echo(isset($item['hash_ip']) ? esc_attr($item['hash_ip']) : "<a href='" . esc_url($item['ip']['link']) . "'>" . esc_attr($item['ip']['value']) . "</a>"); ?></td>
                                        <td style='text-align: left'><span><?php echo esc_attr($item['online_for']); ?></span></td>
                                        <td style='text-align: left'><?php echo ($item['page']['link'] != '' ? '<a href="' . esc_url($item['page']['link']) . '" target="_blank" class="rkns-text-muted">' : '') . esc_attr($item['page']['title']) . ($item['page']['link'] != '' ? '</a>' : ''); ?></td>
                                        <td style='text-align: left' class="rkns-admin-column__referred"><?php echo wp_kses_post($item['referred']); ?></td>
                                        <td style='text-align: left'>
                                            <?php if (isset($item['user']) and isset($item['user']['ID']) and $item['user']['ID'] > 0) { ?>
                                                <p><?php esc_html_e('ID', 'rankology-stats'); ?>: <a href="<?php echo get_edit_user_link($item['user']['ID']); ?>" target="_blank" class="rkns-text-success">#<?php echo esc_attr($item['user']['ID']); ?></a></p><p><?php esc_html_e('Email', 'rankology-stats'); ?>: <?php echo esc_attr($item['user']['user_email']); ?></p><p><?php echo sprintf('Role: %s', implode(',', get_userdata($item['user']['ID'])->roles)) ?></p>
                                            <?php } else { ?>
                                                <?php echo \RANKOLOGY_STATS\Admin_Template::UnknownColumn(); ?>
                                            <?php } ?>
                                        </td>
                                        <td style='text-align: center'><?php echo(isset($item['map']) ? "<a class='rkns-text-muted' href='" . esc_url($item['ip']['link']) . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-visibility') . "</a><a class='show-map rkns-text-muted' href='" . esc_url($item['map']) . "' target='_blank' title='" . __('Map', 'rankology-stats') . "'>" . RANKOLOGY_STATS\Admin_Template::icons('dashicons-location-alt') . "</a>" : ""); ?></td>
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

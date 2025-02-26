<ul class="subsubsub">
    <li class="all">
        <a class="current" href="<?php echo \RANKOLOGY_STATS\Menus::admin_url('referrers'); ?>">
            <?php esc_html_e('All', 'rankology-stats'); ?>
            <span class="count">(<?php echo number_format_i18n($total); ?>)</span>
        </a>
    </li>
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
                            <table class="o-table" id="top-referring">
                                <tr>
                                    <td><?php esc_html_e('Rating', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Site Url', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Site Title', 'rankology-stats'); ?></td>
                                    <td><?php esc_html_e('Server IP', 'rankology-stats'); ?></td>
			                        <?php if (\RANKOLOGY_STATS\GeoIP::active()) { ?>
                                        <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
			                        <?php } ?>
                                    <td><?php esc_html_e('References', 'rankology-stats'); ?></td>
                                </tr>
		                        <?php foreach ($list as $item) { ?>

                                    <tr>
                                        <td><?php echo number_format_i18n($item['rate']); ?></td>
                                        <td><?php echo RANKOLOGY_STATS\Helper::show_site_icon($item['domain']) . " " . \RANKOLOGY_STATS\Referred::get_referrer_link($item['domain'], $item['title']); ?>
                                        </td>
                                        <td><?php echo(trim($item['title']) == "" ? \RANKOLOGY_STATS\Admin_Template::UnknownColumn() : esc_attr($item['title'])); ?>
                                        </td>
                                        <td><?php echo(trim($item['ip']) == "" ? \RANKOLOGY_STATS\Admin_Template::UnknownColumn() : esc_attr($item['ip'])); ?></td>
				                        <?php if (\RANKOLOGY_STATS\GeoIP::active()) { ?>
                                            <td><?php echo(trim($item['country']) == "" ? \RANKOLOGY_STATS\Admin_Template::UnknownColumn() : "<img src='" . esc_url($item['flag']) . "' title='" . esc_attr($item['country']) . "' alt='" . esc_attr($item['country']) . "' class='log-tools rkns-flag'/>"); ?></td>
				                        <?php } ?>
                                        <td>
                                            <a class='rkns-text-success' href='<?php echo esc_url($item['page_link']); ?>'><?php echo esc_attr($item['number']); ?></a>
                                        </td>
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
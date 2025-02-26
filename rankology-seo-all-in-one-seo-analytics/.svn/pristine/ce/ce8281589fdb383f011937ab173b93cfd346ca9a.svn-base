<?php if (!defined('ABSPATH')) exit; ?>

<div id="rankology-stats-useronline-widget">
    <?php if (count($onlines)) : ?>
        <div class="o-table-wrapper">
            <table style="width:100%" class="o-table o-table--visitors">
                <tr>
                    <td><?php esc_html_e('Browser', 'rankology-stats'); ?></td>
                    <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                        <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                    <?php } ?>
                    <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                        <td><?php esc_html_e('City', 'rankology-stats'); ?></td>
                    <?php } ?>
                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                </tr>
                <?php foreach ($onlines as $item) : ?>
                    <tr>
                        <td style="text-align: left">
                            <a href="<?php echo esc_url($item['browser']['link']); ?>" title="<?php echo esc_attr($item['browser']['name']); ?>"><img src="<?php echo esc_url($item['browser']['logo']); ?>" alt="<?php echo esc_attr($item['browser']['name']); ?>" class="rkns-flag log-tools" title="<?php echo esc_attr($item['browser']['name']); ?>"/></a>
                        </td>
                        <?php if (RANKOLOGY_STATS\GeoIP::active()) { ?>
                            <td style="text-align: left">
                                <img src="<?php echo esc_url($item['country']['flag']); ?>" alt="<?php echo esc_attr($item['country']['name']); ?>" title="<?php echo esc_attr($item['country']['name']); ?>" class="rkns-flag rkns-flag--first"/> <?php echo $item['country']['name']; ?>
                            </td>
                        <?php } ?>
                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) { ?>
                            <td><?php echo esc_attr($item['city']); ?></td>
                        <?php } ?>
                        <td style='text-align: left'><?php echo(isset($item['hash_ip']) ? esc_attr($item['hash_ip']) : "<a href='" . esc_url($item['ip']['link']) . "'>" . esc_attr($item['ip']['value']) . "</a>"); ?></td>
                        <td style='text-align: left'><?php echo wp_kses_post($item['referred']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <div class="o-wrap o-wrap--no-data"><p><?php esc_html_e('No data to display', 'rankology-stats-detailed-data'); ?></p></div>
    <?php endif; ?>
</div>

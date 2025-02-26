<?php if (!defined('ABSPATH')) exit; ?>

<div id="rankology-stats-visitoes-widget">
    <?php if (count($visitors)) : ?>
        <div class="o-table-wrapper">
            <table style="width:100%" class="o-table o-table--visitors">
                <tr>
                    <td><?php esc_html_e('Browser', 'rankology-stats'); ?></td>
                    <?php if (RANKOLOGY_STATS\GeoIP::active()) : ?>
                        <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                    <?php endif; ?>
                    <?php if (RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                        <td><?php esc_html_e('City', 'rankology-stats'); ?></td>
                    <?php endif; ?>
                    <td><?php esc_html_e('Date', 'rankology-stats'); ?></td>
                    <td><?php esc_html_e('Visits', 'rankology-stats'); ?></td>
                    <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                    <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                </tr>
                <?php foreach ($visitors as $item) : ?>
                    <tr>
                        <td style="text-align: left">
                            <img src="<?php echo $item['browser']['logo']; ?>" alt="<?php echo $item['browser']['name']; ?>" class="log-tools rkns-flag" title="<?php echo $item['browser']['name']; ?>"/>
                        </td>
                        <?php if (RANKOLOGY_STATS\GeoIP::active()) : ?>
                            <td>
                                <img src="<?php echo $item['country']['flag']; ?>" alt="<?php echo $item['country']['name']; ?>" title="<?php echo $item['country']['name']; ?>" class="rkns-flag rkns-flag--first"/> <?php echo $item['country']['name']; ?>
                            </td>
                        <?php endif; ?>
                        <?php if (RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                            <td><?php echo $item['city']; ?></td>
                        <?php endif; ?>
                        <td><span><?php echo $item['date']; ?></span></td>
                        <td><?php echo $item['hits']; ?></td>
                        <td>
                            <?php echo(isset($item['hash_ip']) ? $item['hash_ip'] : "<a href='" . $item['ip']['link'] . "'>" . $item['ip']['value'] . "</a>"); ?>
                        </td>
                        <td><?php echo $item['referred']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <div class="o-wrap o-wrap--no-data"><p><?php esc_html_e('No data to display', 'rankology-stats-detailed-data'); ?></p></div>
    <?php endif; ?>
</div>

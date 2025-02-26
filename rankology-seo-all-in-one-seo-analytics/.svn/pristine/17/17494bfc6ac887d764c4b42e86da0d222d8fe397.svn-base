<?php if (!defined('ABSPATH')) exit; ?>

<div class="rkns-fade-effect">
    <?php if (count($visitors)) : ?>
        <table style="width:100%" class="widefat table-stats rkns-report-table rkns-table-auto">
            <tr>
                <?php if (RANKOLOGY_STATS\GeoIP::active() or RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                    <td><?php esc_html_e('Location', 'rankology-stats'); ?></td>
                <?php endif; ?>
                <td><?php esc_html_e('IP', 'rankology-stats'); ?></td>
                <td><?php esc_html_e('Traffic', 'rankology-stats'); ?></td>
                <td><?php esc_html_e('Referrer', 'rankology-stats'); ?></td>
                <td><?php esc_html_e('Platform', 'rankology-stats'); ?></td>
                <td><?php esc_html_e('Date', 'rankology-stats'); ?></td>
            </tr>
            <?php foreach ($visitors as $item) : ?>
                <tr>
                    <?php if (RANKOLOGY_STATS\GeoIP::active() or RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                        <td>
                            <?php if (RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                                <img src="<?php echo $item['country']['flag']; ?>" alt="<?php echo $item['country']['name']; ?>" title="<?php echo $item['country']['name']; ?>" class="log-tools rkns-flag"/>
                            <?php endif; ?>

                            <?php if (RANKOLOGY_STATS\GeoIP::active('city')) : ?>
                                <?php echo $item['city']; ?>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <td>
                        <?php echo(isset($item['hash_ip']) ? $item['hash_ip'] : "<a href='" . $item['ip']['link'] . "'>" . $item['ip']['value'] . "</a>"); ?>
                    </td>
                    <td><?php echo $item['hits']; ?></td>
                    <td><?php echo $item['referred']; ?></td>
                    <td>
                        <img src="<?php echo $item['browser']['logo']; ?>" alt="<?php echo $item['browser']['name']; ?>" class="log-tools rkns-flag" title="<?php echo $item['browser']['name']; ?>"/>
                        <?php echo $item['platform']; ?>
                    </td>
                    <td><span><?php echo $item['date']; ?></span></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="rkns-wrap rkns-load-more">
            <input type="button" value="<?php esc_html_e('Load More', 'rankology-stats'); ?>" class="button-primary">
        </div>
    <?php else : ?>
        <div class="o-wrap o-wrap--no-data"><p><?php esc_html_e('No data to display', 'rankology-stats-detailed-data'); ?></p></div>
    <?php endif; ?>
</div>
<script>
    jQuery('.rkns-load-more').on('click', '.button-primary', function () {
        jQuery('.rkns-load-more').closest('.rkns-fade-effect').removeClass('rkns-fade-effect');
    })
</script>
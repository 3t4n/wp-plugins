<?php if (!defined('ABSPATH')) exit; ?>

<div id="rankology-stats-countries-widget">
    <?php if (count($countries)) : ?>
        <div class="o-table-wrapper">
            <table style="width:100%" class="o-table o-table--layout-fixed o-table--link table-stats rkns-report-table">
                <tr>
                    <td></td>
                    <td><?php esc_html_e('Country', 'rankology-stats'); ?></td>
                    <td><?php esc_html_e('Visitors', 'rankology-stats'); ?></td>
                </tr>
                <?php $i = 0;
                foreach ($countries as $item) : $i++; ?>
                    <tr>
                        <td class="row-id"><?php echo $i ?></td>
                        <td><img src="<?php echo $item['flag']; ?>" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" class="rkns-flag rkns-flag--first"/> <?php echo $item['name']; ?></td>
                        <td class="rkns-middle-vertical">
                            <a href="<?php echo $item['link'] ?>" title="<?php echo $item['name'] ?>" target="_blank"><?php echo number_format($item['number']) ?>
                                <svg style="margin-top: 3px;" width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.82751 4.99993 2.62209 2.79451c-.0759-.07859-.1179-.18384-.11695-.29309.00095-.10924.04477-.21375.12203-.291.07725-.07726.18176-.12108.291-.12203.10925-.00094.2145.04105.29309.11695l2.5 2.5c.07811.07814.12199.1841.12199.29459 0 .11048-.04388.21644-.12199.29458l-2.5 2.5c-.07859.0759-.18384.1179-.29309.11695-.10924-.00095-.21375-.04477-.291-.12203-.07726-.07725-.12108-.18176-.12203-.291-.00095-.10925.04105-.2145.11695-.29309l2.20542-2.20541Z" fill="#bc690a" fill-opacity=".5"/>
                                    <path d="M7.87792 5.13371 5.67251 2.9283c-.0759-.07859-.1179-.18384-.11695-.29309.00095-.10924.04477-.21375.12202-.291.07726-.07726.18176-.12108.29101-.12203.10925-.00095.2145.04105.29308.11695l2.5 2.5c.07812.07814.122.1841.122.29458 0 .11049-.04388.21645-.122.29459l-2.5 2.5c-.07858.0759-.18383.11789-.29308.11695-.10925-.00095-.21375-.04477-.29101-.12203-.07725-.07725-.12107-.18176-.12202-.29101-.00095-.10924.04105-.2145.11695-.29308l2.20541-2.20542Z" fill="#bc690a"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <div class="o-wrap o-wrap--no-data"><p><?php esc_html_e('No data to display', 'rankology-stats-detailed-data'); ?></p></div>
    <?php endif; ?>
</div>

<?php  
/**
 * Acotrs Settings Info pages
 */
?>

<div id="acotrsSettingInfo">
    <div id="wrap">
        <div class="wrap-inner">
            <h2><?php esc_html_e('How to use ACOTRS Shipping?', 'aco-table-rate-shipping'); ?></h2>
            <ol>
                <li><?php echo sprintf('First go to <a target="_blank" href="%s">Shipping zones</a> and add your shipping area.', esc_url(admin_url( 'admin.php?page=wc-settings&tab=shipping&section' ))); ?></li>
                <li><?php esc_html_e('You can start the configuration by clicking the ACOTRS Shipping title link in the Shipping methods table.', 'aco-table-rate-shipping'); ?></li>
            </ol>

            <h3><?php esc_html_e('Quick Video Overview', 'aco-table-rate-shipping'); ?></h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/C0DPdy98e4c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <h4><?php esc_html_e('More Resources', 'aco-table-rate-shipping') ?></h4>
            <ul class="resorce">
                <li><a target="_blank" href="#"><?php esc_html_e('How to add a new shipping method handled by ACOTRS Shipping?', 'aco-table-rate-shipping'); ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('A complete guide to shipping methods', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('Currency Support', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('Weight Based Shipping', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('City Based Shipping', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('Default Method & Volumetric Settings', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('Additional Options for Shipping', 'aco-table-rate-shipping') ?></a></li>
                <li><a target="_blank" href="#"><?php esc_html_e('Conditional Cash on Delivery', 'aco-table-rate-shipping') ?></a></li>
            </ul>
        </div>
    </div>
</div>
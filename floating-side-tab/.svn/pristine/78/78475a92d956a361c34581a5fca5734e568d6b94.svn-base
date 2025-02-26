<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<div class="fsdt-html-wrap fsdt-html-template-2 fsdt-tab-data" data-tab-ref="<?php echo esc_attr($home_menu_key); ?>">
    <?php
    $heading_status = (!empty($home_menu_detail['tab_heading_enable'])) ? $home_menu_detail['tab_heading_enable'] : '';
    $tab_heading = (!empty($home_menu_detail['tab_heading'])) ? $home_menu_detail['tab_heading'] : '';
    if (!empty($tab_heading) && empty($heading_status)) {
    ?>
        <div class="fsdt-post-heading">

            <div class="fsdt-tab-heading">
                <?php echo esc_html($home_menu_detail['tab_heading']); ?>
            </div>
            <span class="fsdt-close-tab fas fa-times"></span>
        </div>
        <?php } else {
        if (empty($heading_status)) {
        ?>
            <div class="fsdt-post-heading">

                <div class="fsdt-tab-heading">
                    <?php echo esc_html($home_menu_detail['tab_name']); ?>
                </div>
                <span class="fsdt-close-tab fas fa-times"></span>
            </div>
    <?php }
    } ?>
    <div class="fsdt-inner-scroll">
        <div class="fsdt-html-content">
            <?php echo do_shortcode(wpautop(wp_kses_post($home_menu_detail['custom_html']))); ?>
        </div>
    </div>
</div>
<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>

<h2 class="nav-tab-wrapper wp-clearfix">
    <?php
    $fsdt_tabs = array(

        'general' => array('label' => __('General Settings', 'floating-side-tab'), 'icon' => __('dashicons dashicons-menu')),
        'layout' => array('label' => __('Layout Settings', 'floating-side-tab'), 'icon' => __('dashicons dashicons-layout')),
        'custom' => array('label' => __('Custom Settings', 'floating-side-tab'), 'icon' => __('dashicons dashicons-admin-customizer'), 'custom-class' => __('fsdt-custom-pro', 'floating-side-tab')),
        'upgrade' => array('label' => __('Upgrade To Pro', 'floating-side-tab'), 'icon' => __('dashicons dashicons-star-filled'))

    );


    $fsdt_tab_counter = 0;
    foreach ($fsdt_tabs as $fsdt_tab => $fsdt_tab_detail) {
        $fsdt_tab_counter++;
    ?>
    <a href="javascript:void(0);"
        class="nav-tab <?php echo ($fsdt_tab_counter == 1) ? 'nav-tab-active' : ''; ?> fsdt-tab-trigger <?php echo (!empty($fsdt_tab_detail['custom-class'])) ? esc_attr($fsdt_tab_detail['custom-class']) : ''; ?>"
        data-settings-ref="<?php echo esc_attr($fsdt_tab); ?>"><span
            class="<?php echo esc_attr($fsdt_tab_detail['icon']); ?>"></span>
        <?php echo esc_attr($fsdt_tab_detail['label']); ?>
    </a>

    <?php
    }
    ?>

</h2>
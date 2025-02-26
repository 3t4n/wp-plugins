<?php defined('ABSPATH') or die('No script kiddies please!!');
$artl_settings = get_option('artl_settings');

?>

<div class="wrap artl-wrap">

    <div class="wrap artl-wrap">
        <div class="artl-header">
            <h1 class="artl-floatLeft">
                <img src="<?php echo ARTL_IMG_DIR . '/artl-mains.png'; ?>" class="artl-plugin-logo">

            </h1>
            <div class="artl-sub-header"><?php esc_html_e('Article Read Time Lite Settings', 'article-read-time-lite'); ?>
            </div>

        </div>
    </div>
    <!-- End of header section -->
    <?php
    if (!empty($_GET['message']) && $_GET['message'] == 1) {
    ?>
    <div class="notice notice-info is-dismissible inline">
        <p>
            <?php esc_html_e('Settings saved successfully.', 'article-read-time-lite'); ?>
        </p>
    </div>
    <?php
    }
    ?>
    <h2 class="nav-tab-wrapper wp-clearfix">
        <?php
        $art_tabs = array(
            'basic' => array('label' => __('Basic Settings', 'article-read-time-lite'), 'icon' => __('dashicons dashicons-admin-generic')),
            'layout' => array('label' => __('Layout Settings', 'article-read-time-lite'), 'icon' => __('dashicons dashicons-layout', 'article-read-time-lite'))
        );


        $art_tab_counter = 0;
        foreach ($art_tabs as $art_tab => $art_tab_detail) {
            $art_tab_counter++;
        ?>
        <a href="javascript:void(0);"
            class="nav-tab <?php echo ($art_tab_counter == 1) ? 'nav-tab-active' : ''; ?> artl-tab-trigger"
            data-settings-ref="<?php echo esc_attr($art_tab); ?>"><span
                class="<?php echo esc_attr($art_tab_detail['icon']); ?>"></span><?php echo esc_attr($art_tab_detail['label']); ?></a>
        <?php
        }
        ?>
        
    </h2>

    <div class="artl-settings-wrap">

        <form method="post" class="artl-form" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php
            include(ARTL_PATH . 'includes/views/boxes/basic-settings.php');
            include(ARTL_PATH . 'includes/views/boxes/layout-settings.php');

            ?>
            <div class="artl-field-wrap">

                <div class="artl-field-wrap  artl-settings-action">

                    <label></label>
                    <div class="artl-field">
                        <input type="submit" class="button-primary"
                            value="<?php esc_html_e('Save Settings', 'article-read-time-lite'); ?>" />
                    </div>
                </div>


        </form>

    </div>
</div>
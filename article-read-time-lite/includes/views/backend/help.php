<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="wrap artl-wrap">

    <div class="wrap artl-wrap">
        <div class="artl-header">
            <h1 class="artl-floatLeft">
                <img src="<?php echo ARTL_IMG_DIR . '/artl-mains.png'; ?>" class="artl-plugin-logo">
            </h1>
            <div class="artl-sub-header"><?php esc_html_e('Help', 'article-read-time-lite'); ?></div>

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


    <div class="artl-settings-wrap">

        <form method="post" class="artl-form" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php
            include(ARTL_PATH . 'includes/views/boxes/help.php');

            ?>


        </form>

    </div>
</div>
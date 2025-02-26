<?php
if (!defined('ABSPATH')) {
    exit;
}
global $MB_AUTHOR_BOX_HELPER;
$datas = get_plugin_data(MB_AUTHOR_BOX_PATH . 'author-box-pro.php', $markup = true, $translate = true);
?>
<div class="wrap">
    <div class="st-wp-brand">
        <h1>
            <img src="<?php echo plugins_url("author-box-pro/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st-wp-logo"> 
            <?php echo $datas['Name']; ?>
            <span><?php _e('Professional Themes and Plugins for WordPress', 'author-box-pro'); ?></span>
        </h1>
    </div>
    <hr />
    <div class="st-wp-brand-box">
        <p>
            <?php _e('Version', 'author-box-pro'); ?>: <?php echo get_option('mb-author-box-pro-version'); ?> | DB <?php _e('Version', 'author-box-pro'); ?>: <?php echo get_option('mb-author-box-pro-db-version'); ?>
            <span class="st-right" style="text-align: right;">
                <span class="dashicons dashicons-star-filled"></span> <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>/reviews/" target="_blank">Rate</a> |
                <span class="dashicons dashicons-backup"></span> <a href="https://wordpress.org/plugins/<?php echo $datas['TextDomain']; ?>/changelog/" target="_blank">Changelog</a> | 
                <span class="dashicons dashicons-editor-help"></span> <a href="https://wordpress.org/plugins/<?php echo $datas['TextDomain']; ?>/faq/" target="_blank">FAQ</a> | 
                <span class="dashicons dashicons-sos"></span> <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>" target="_blank">Support</a>
            </span>
        </p>
    </div>
    <hr />
    <div class="mb-st-grid-9">
        <div class="st-melibuPlugin-area">
            <div class="welcome-panel">

                <div class="welcome-panel-column-container">
                    <p class="about-description">
                        <?php _e('This documentation should help you.', 'author-box-pro'); ?>
                    </p>
                    <br />

                    <div class="melibu-ab-docu">

                        <div class="left-side">
                            <ul>
                                <li class="start st-active">
                                    <div class="st-icon st-active">
                                        <span class="dashicons dashicons-dashboard"></span>
                                    </div>
                                    <?php _e('Start', 'author-box-pro'); ?>
                                </li>
                                <li class="part-1">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-appearance"></span>
                                    </div>
                                    <?php _e('Design', 'author-box-pro'); ?>
                                </li>
                                <li class="part-2">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-page"></span>
                                    </div>
                                    <?php _e('Tabs', 'author-box-pro'); ?>
                                </li>
                                <li class="part-3">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-share"></span>
                                    </div>
                                    <?php _e('Social', 'author-box-pro'); ?>
                                </li>
                                <li class="part-4">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-users"></span>
                                    </div>
                                    <?php _e('Author', 'author-box-pro'); ?>
                                </li>
                                <li class="part-5">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-generic"></span>
                                    </div>
                                    <?php _e('Settings', 'author-box-pro'); ?>
                                </li>
                                <li class="part-6">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-editor-code"></span>
                                    </div>
                                    <?php _e('Short code', 'author-box-pro'); ?>
                                </li>
                            </ul>
                        </div>

                        <div class="border">
                            <div class="line one"></div>
                        </div>

                        <div class="right-side">

                            <div class="first active">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-dashboard"></span>
                                </div>
                                <h1><?php _e('To use Melibu WP Author Box properly', 'author-box-pro'); ?></h1>
                                <h2><?php _e('Melibu WP Author Box', 'author-box-pro'); ?></h2>
                                <p><?php _e('Thank you that you use MeliBu WP Author Box', 'author-box-pro'); ?>.</p>
                                <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                            </div>

                            <div class="second">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-appearance"></span>
                                </div>
                                <h1><?php _e("Let's start now with the auhtor box designs", 'author-box-pro'); ?></h1>
                                <h2><?php _e('Layout with admin color shemes', 'author-box-pro'); ?></h2>
                                <p><?php _e('You can color the author box with the admin colors shemas', 'author-box-pro'); ?>.</p>
                                <p><?php _e('With the plugin from the WordPress Core Team - Admin Color Shemer you can create your own sheme', 'author-box-pro'); ?>.</p>
                                <a href="profile.php" class="mb-btn"><?php _e('Select your color sheme', 'author-box-pro'); ?>!</a>
                            </div>

                            <div class="third">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-page"></span>
                                </div>
                                <h1><?php _e('Tabs', 'author-box-pro'); ?></h1>
                                <h2><?php _e('Induviduell Tabs for more flexibility', 'author-box-pro'); ?></h2>
                                <p><?php _e('We offer you four tabs with plenty of space for all information about the author', 'author-box-pro'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-author-admin-control-menu-1" class="mb-btn"><?php _e('Set it', 'author-box-pro'); ?></a>
                            </div>

                            <div class="fourth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-share"></span>
                                </div>
                                <h1><?php _e('Social', 'author-box-pro'); ?></h1>
                                <h2><?php _e('MeliBu WP Sharing Social Safe', 'author-box-pro'); ?></h2>
                                <p><?php _e('An interface to the MeliBu WP Sharing Social Safe plugin, so you have full access to all the features', 'author-box-pro'); ?>.</p>
                                <?php
                                $plugininfo = $MB_AUTHOR_BOX_HELPER->check_plugin('sharing-social-safe/sharing-social-safe.php');
                                if ($plugininfo['plugin-installed'] == false) {
                                    ?><a href="plugin-install.php?s=melibu+wp+social+share+safe&tab=search&type=term" class="mb-btn"><?php _e('Install', 'author-box-pro'); ?></a><?php
                                } else {
                                    if ($plugininfo['plugin-active'] == false) {
                                        ?><a href="plugins.php" class="mb-btn"><?php _e('Activate', 'author-box-pro'); ?></a><?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="fifth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-users"></span>
                                </div>
                                <h1><?php _e('Author', 'author-box-pro'); ?></h1>
                                <h2><?php _e('Author and Author box setting', 'author-box-pro'); ?></h2>
                                <p><?php _e('You decide on which contribution the author is displayed', 'author-box-pro'); ?>.</p>
                                <img src="<?php echo plugins_url("img/public-author.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                                <a href="edit.php" class="mb-btn"><?php _e('Posts', 'author-box-pro'); ?></a>
                            </div>

                            <div class="sixth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-generic"></span>
                                </div>
                                <h1><?php _e('Settings', 'author-box-pro'); ?></h1>
                                <h2><?php _e('You have every set of settings', 'author-box-pro'); ?></h2>
                                <p><?php _e('Make sure you have everything you need to ensure that your author is fully satisfied', 'author-box-pro'); ?></p>
                                <a href="admin.php?page=melibu-plugin-author-admin-control-menu-1" class="mb-btn"><?php _e('Set it', 'author-box-pro'); ?></a>
                            </div>

                            <div class="seventh">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-editor-code"></span>
                                </div>
                                <h1><?php _e('Short code', 'author-box-pro'); ?></h1>
                                <h2><?php _e('Use the short code', 'author-box-pro'); ?></h2>
                                <p><?php _e('Use the short code to place the small box in the content', 'author-box-pro'); ?>.</p>
                                <div>
                                    <ul>
                                        <li>
                                            <strong>[wp-mb-author-box-pro]</strong>: <br />
                                            <?php _e('Without this shortcode does not author box in the content', 'author-box-pro'); ?>.
                                        </li>
                                    </ul>
                                    <div class='st-melibuPlugin-area'>
                                        <div class="st-present">
                                            <label for='melibu-plugin-author-shortcode'>
                                                <small>
                                                    <?php _e('That is the AUTHOR short code. You can copy a short code and place on a page, post or in a widget. Or use the short code has been integrated into your editor, a click is enough and the part buttons after save visible', 'author-box-pro'); ?>.
                                                </small>
                                                <input type="text" value="[wp-mb-author-box-pro]" readonly="readonly" class="regular-text" id="melibu-plugin-author-shortcode" ondblclick="this.setSelectionRange(0, this.value.length)" />
                                            </label><br />
                                            <small><?php _e('Please take the short code double click to copy', 'author-box-pro'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox  st-margin-top-15">
            <!--<img src="<?php // echo MELIBU_PLUGIN_URL_02; ?>screenshot-11.png" alt="screenshot-11" width="650">-->
            <h2><span><?php _e('Use Short code in WP Editor', 'author-box-pro'); ?></span></h2>
            <p><?php _e('Take your part to put the buttons shortcode in WP editor Melibu', 'author-box-pro'); ?>.</p>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox">
            <!--<img src="<?php // echo MELIBU_PLUGIN_URL_02; ?>screenshot-14.png" alt="screenshot-14" width="650">-->
            <h2><span><?php _e('Use Widget', 'author-box-pro'); ?></span></h2>
            <p><?php _e('Use the author box as a small widget if not the big one should be in use', 'author-box-pro'); ?></p>
        </div>
    </div>
</div>
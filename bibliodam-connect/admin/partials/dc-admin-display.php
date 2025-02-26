<?php
    /**
     * Provide an admin area view for the plugin.
     *
     * This file is used to markup the admin-facing aspects of the plugin.
     *
     * @package    BiblioDAM/
     * @subpackage BiblioDAM/admin/partials
     *
     * @since      1.0.0
     */
?>
<hr class="wp-header-end">
<section class="<?php echo $this->pluginName; ?>">
    <div class="header">
        <div class="grid">
            <div class="col-1-2">
                <a href="https://www.publisherstoolbox.com/bibliodam/" target="_blank">
                    <img src="<?php echo plugin_dir_url(__DIR__) . 'img/bibliodam.png'; ?>" alt="<?php echo esc_html(get_admin_page_title()); ?>" class="logo">
                </a>
            </div>
            <div class="col-1-2">
                <div class="is-right">
                    <p class="is-text-right">
                        <?php printf(esc_attr__('Version: ', $this->pluginName)); ?><?php echo $this->pluginVersion; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <section class="start-page">
            <div class="grid">
                <div class="col-2-12">
                    <div class="col-1-1 menu-block">
                        <ul>
                            <?php require_once 'settings/ptx-inc-menu-settings.php' ?>
                            <?php require_once 'addons/ptx-inc-menu-add-ons.php' ?>
                            <?php $this->pluginAddOns->ptxAddOnDisplayTemplate('menu'); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-10-12">
                    <div class="grid">
                        <div class="col-1-1 content-block">
                            <form class="plugin-options-form" id="plugin-options-form">
                                <input type="hidden" name="version" value="<?php echo $this->pluginVersion; ?>">
                                <?php echo $ptxFields->textField('', 'last_save', '', date('Y-m-d H:i:s'), ['type' => 'hidden']); ?>
                                <?php echo $ptxFields->textField('', 'site', '', get_bloginfo('url'), ['type' => 'hidden']); ?>
                                <button class="btn is-secondary save-top" id="options-admin-save" form="plugin-options-form" type="submit"><?php _e('Save All', $this->pluginName); ?></button>
                                <?php require_once 'settings/ptx-inc-tabs-settings.php' ?>
                                <?php require_once 'addons/ptx-inc-tabs-addons.php' ?>
                                <?php $this->pluginAddOns->ptxAddOnDisplayTemplate('admin'); ?>
                            </form>
                            <div class="grid">
                                <div class="col-1-1">
                                    <button class="btn is-secondary save-bottom" id="options-admin-save" form="plugin-options-form" type="submit"><?php _e('Save All', $this->pluginName); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

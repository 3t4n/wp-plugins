<?php
if (!defined('ABSPATH')) { exit; }
wp_enqueue_style(CHATBOTCOM_ASSETS_PREFIX.'style-panel-connected', plugin_dir_url(__FILE__) . 'connected.css');
?>

<div class="panel-connected">
    <?php CHATBOTCOM_Components::tplHeader(
        'Congratulations',
        'Your bot <span class="panel-connected-story-name" text-weight="bold" title="'.CHATBOTCOM_Admin::getInstance()->store->connection['storyName'].'">'.CHATBOTCOM_Admin::getInstance()->store->connection['storyName'].'</span> is connected with your wordpress website.'
    ); ?>

    <form
        method="post"
        action="<?= CHATBOTCOM_Utils::getUpdateActionUrl() ?>"
        class="panel-connected-content">

        <div class="panel-connected-switch-wrapper">
            <?php CHATBOTCOM_Components::tplSwitch('Hide chat on mobile', 'disable-mobile', CHATBOTCOM_Admin::getInstance()->store->options['disableMobile']); ?>
        </div>

        <div class="panel-connected-switch-wrapper second-switch">
            <?php CHATBOTCOM_Components::tplSwitch('Hide chat for Guest visitors', 'disable-guests', CHATBOTCOM_Admin::getInstance()->store->options['disableGuests']); ?>
        </div>

        <?php CHATBOTCOM_Components::tplButtonSubmit('Update settings', 'small', ''); ?>
    </form>

    <?php CHATBOTCOM_Components::tplDisconnectLink(); ?>
</div>

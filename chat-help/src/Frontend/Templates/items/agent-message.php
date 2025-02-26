<?php

/**
 * Chat Whatsapp Agent Message.
 *
 * @package    chat-help
 * @subpackage chat-help/src/Frontend
 */

use ThemeAtelier\ChatWhatsapp\Helpers\Helpers;

echo '<div class="wHelp__popup__content">';
if ($show_current_time) {
    echo '<div class="current-time"></div>';
}
if ($agent_message) : ?>
    <div class="sms">
        <?php include Helpers::chat_whatsapp_locate_template('items/thumbnail.php'); ?>
        <div class="sms__text">
            <p>
                <?php echo esc_html($agent_message); ?>
            </p>
        </div>
    </div>
<?php endif;
if ($gdpr_enable) : ?>
    <div class="wHelp--checkbox">
        <input id="gdpr-check" name="gdpr-check" type="checkbox" class="wHelp__checkbox" />
        <label for="gdpr-check"><?php echo wp_kses_post($gdpr_compliance_content); ?></label>
    </div>
<?php endif; ?>
<button
    class="wHelp__send-message <?php echo $gdpr_enable ? 'condition__checked' : ''; ?>"
    target="_blank"
    type="submit"
    style="--color-primary: <?php echo esc_attr($primary); ?>;--color-secondary: <?php echo esc_attr($secondary); ?>;">

    <?php
    if ($before_chat_icon === 'no_icon') {
        $open_icon = '';
    } elseif (!empty($before_chat_icon)) {
        $open_icon = '<i class="' . esc_attr($before_chat_icon) . '"></i>';
    } else {
        $open_icon = '<i class="icofont-brand-whatsapp"></i>';
    }
    ?>

    <?php echo wp_kses_post($open_icon) . ' ' . esc_html($chat_button_text); ?>
    <a href="https://wa.me/<?php echo esc_attr($options['opt-number']); ?>" target="_blank"></a>
</button>
</div>
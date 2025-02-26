<?php

/**
 * Chat Help Agent Message.
 *
 * @package    chat-help
 * @subpackage chat-help/src/Frontend
 */
$gdpr_enable = isset($options['gdpr-enable']) ? $options['gdpr-enable'] : '';
$agent_name_placeholder_text = isset($options['agent-name-placeholder-text']) ? $options['agent-name-placeholder-text'] : __('Your name?', 'text-domain');
$agent_message_placeholder_text = isset($options['agent-message-placeholder-text']) ? $options['agent-message-placeholder-text'] : __('Message', 'text-domain');
$before_chat_icon = isset($options['before-chat-icon']) ? $options['before-chat-icon'] : 'icofont-brand-whatsapp';
$chat_button_text = isset($options['chat-button-text']) ? $options['chat-button-text'] : __('Send a message', 'text-domain');
?>
<form
    class="wHelp__popup__content"
    data-template="<?php echo esc_attr($whatsapp_message_template); ?>"
    data-number="<?php echo esc_attr($whatsapp_number); ?>"
    style="--color-primary: <?php echo esc_attr($primary); ?>;--color-secondary: <?php echo esc_attr($secondary); ?>;">
    <div class="user-text">
        <input
            id="wHelp-name"
            type="text"
            placeholder="<?php echo esc_attr($agent_name_placeholder_text); ?>"
            required />
        <textarea
            id="wHelp-message"
            rows="5"
            placeholder="<?php echo esc_attr($agent_message_placeholder_text); ?>"
            required></textarea>
    </div>
    <?php if ($gdpr_enable) : ?>
        <div class="wHelp--checkbox">
            <input
                id="gdpr-check"
                name="gdpr-check"
                type="checkbox"
                class="wHelp__checkbox" />
            <label for="gdpr-check">
                <?php echo wp_kses_post($gdpr_compliance_content); ?>
            </label>
        </div>
    <?php endif; ?>
    <button
        type="submit"
        class="wHelp__send-message <?php echo $gdpr_enable ? 'condition__checked' : ''; ?>"
        target="_blank">
        <?php
        if ($before_chat_icon === 'no_icon') {
            $open_icon = '';
        } elseif (!empty($before_chat_icon)) {
            $open_icon = '<i class="' . esc_attr($before_chat_icon) . '"></i>';
        } else {
            $open_icon = '<i class="icofont-brand-whatsapp"></i>';
        }
        echo wp_kses_post($open_icon) . ' ' . esc_html($chat_button_text);
        ?>
    </button>
</form>
<?php

/**
 * Chat Help Agent Message.
 *
 * @package    chat-help
 * @subpackage chat-help/src/Frontend
 */

if ($agent_photo) {
    $agent_photo = (isset($agent_photo['url']) && !empty($agent_photo['url'])) ? $agent_photo['url'] : CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp';
} else {
    $agent_photo = CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp';
}
?>
<div class="image">
    <img src="<?php echo esc_attr($agent_photo); ?>" />
</div>
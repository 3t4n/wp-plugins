<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$layout_type = get_option('agent700_layout_type', 'popup');
$hide_overlay = get_option('agent700_hide_overlay', false);
$overlay_class = $hide_overlay ? '' : 'show';
?>

<div class="agent700-chat <?php echo esc_attr($layout_type); ?>">
  <div class="agent700-overlay <?php echo esc_attr($overlay_class); ?>"></div>
  <div class="agent700-container">
    <div id="agent-header">
      <span class="agent700-expand-contract"></span>
      <span class="agent700-close"></span>
      <span id="agent-header-avatar">
        <?php
        $avatar_url = get_option('agent700_chat_avatar');
        $avatar_url = $avatar_url ? esc_url($avatar_url) : esc_url(plugins_url('assets/header-avatar.png', __FILE__));
        ?>
        <img alt="Agent700 Avatar" src="<?php echo esc_url($avatar_url); ?>" />
      </span>
      <div id="agent-header-info">
        <h3 id="agent-header-title"><?php echo esc_html(get_option('agent700_chat_title', 'Expert')); ?></h3>
        <p id="agent-header-status">
          <span class="agent-header-status-indicator online"></span>
          <span class="agent-header-status-text">Online</span>
        </p>
      </div>
    </div>
    <div class="agent-chat-content">
      <!-- Chat dynamic content -->
    </div>
    <div id="agent-footer">
      <div id="chatBox">
        <div id="agentChatFields">
          <textarea id="chatInputMsg" rows="1" placeholder="Message"></textarea>
          <button id="agentSendBtn"></button>
        </div>
      </div>
    </div>
  </div>
</div>
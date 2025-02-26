<?php

$data = $this->db_obj->get_data();
$api_key = isset( $data['api_key'] ) && $data['api_key'] != '' ? esc_attr( $data['api_key'] ) : '';
if (isset($api_key) && $api_key != '') :
?>
<div class="ays-assistant-chatbox" style="display: none;">
    <div class="ays-assistant-chatbox-closed-view"> <!-- closed logo -->
        <div class="ays-assistant-closed-icon-container">
            <img class="ays-assistant-chatbox-logo-image" src="<?php echo esc_attr(CHATGPT_ASSISTANT_ADMIN_URL) ?>/images/icons/chatgpt-icon.png" alt="ChatGPT icon">
        </div>
    </div>
    <div class="ays-assistant-chatbox-main-container" style="display: none;">
        <div class="ays-assistant-chatbox-logo-box"> <!-- close icon -->
            <div class="ays-assistant-chatbox-logo">
                <img src="<?php echo esc_attr(CHATGPT_ASSISTANT_ADMIN_URL) ?>/images/icons/close-button.svg" alt="Close">
            </div>
        </div>
        <div class="ays-assistant-chatbox-main-chat-box">
            <div class="ays-assistant-chatbox-header-row"> <!-- header row -->
                <p class="ays-assistant-chatbox-header-text">ChatGPT Assistant</p>
            </div>
            <div class="ays-assistant-chatbox-messages-box"> <!-- messages container -->
                <div class="ays-assistant-chatbox-loading-box" style="display: none;"> <!-- loader -->
                    <div class="ays-assistant-chatbox-loader-ball-2">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="ays-assistant-chatbox-input-box"> <!-- prompt part -->
                <input type="hidden" class="ays-assistant-chatbox-apikey" name="ays_assistant_chatbox_apikey" value="<?php echo esc_attr($api_key); ?>">
                <input class="ays-assistant-chatbox-prompt-input" type="text" name="ays_assistant_chatbox_prompt" id="ays-assistant-chatbox-prompt" placeholder="Enter your message">
                <button class="ays-assistant-chatbox-send-button" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ffffff" width="18" height="18">
                        <path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<?php
endif;
?>
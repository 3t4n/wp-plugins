<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function rubik_chat_add_menu() {
    $iconUrl = plugins_url('assets/icon.svg', __FILE__);
    $iconResponse = wp_remote_get( $iconUrl );

    if ( is_wp_error( $iconResponse ) ) {
        return;
    }

    $menuIcon = wp_remote_retrieve_body( $iconResponse );

    add_menu_page(
        'RubikChat Plugin Settings',
        'RubikChat',
        'manage_options',
        'rubik-chat',
        'rubik_chat_settings',
        'data:image/svg+xml;base64,' . base64_encode($menuIcon),
        80
    );
}

function rubik_chat_admin_styles() {
    $style_path = plugin_dir_path( __FILE__ ) . 'assets/styles.css';
    if ( file_exists( $style_path ) ) {
        $version = filemtime( $style_path );
        wp_register_style(
            'rubik-chat-admin-styles',
            plugins_url( 'assets/styles.css', __FILE__ ),
            [],
            $version
        );
        wp_enqueue_style( 'rubik-chat-admin-styles' );
    }
}

function rubik_chat_settings() {
    if ( isset( $_POST['rubik_chat_nonce'] ) ) {
        $nonce = sanitize_text_field( wp_unslash( $_POST['rubik_chat_nonce'] ) );
        if ( wp_verify_nonce( $nonce, 'rubik_chat_settings_save' ) ) {
            if ( isset( $_POST['rubik_chat_id'] ) ) {
                $inputValue = sanitize_text_field( wp_unslash( $_POST['rubik_chat_id'] ) );
        
                update_option( 'rubik_chat_id', $inputValue );
        
                echo '<div class="updated"><p>Settings saved!</p></div>';
            }
        } else {
            echo '<div class="error"><p>Security check failed. Please try again.</p></div>';
        }
    }

    $rubikChatId = get_option( 'rubik_chat_id', '' );

    ?>
    <div class="rubik-chat-wrap">
        <h1>
            <?php echo esc_html(get_admin_page_title()); ?>
        </h1>
        <?php echo esc_html( rubik_chat_note() ); ?>
        <div class="rubik-chat-form">
            <div class="card">
                <div class="rubik-chat-logo">
                    <a href="https://rubikchat.com" target="_blank">
                        <img
                            alt="RubikChat"
                            src="<?php echo esc_html(plugins_url( 'assets/logo.svg', __FILE__ )); ?>"
                        />
                    </a>
                </div>

                <form method="post">
                    <?php wp_nonce_field( 'rubik_chat_settings_save', 'rubik_chat_nonce' ); ?>
                    <div>
                        <label for="rubik_chat_id" class="form-control-label">Chatbot ID</label>
                        <div class="form-control-input">
                            <input
                                required
                                type="text"
                                id="rubik_chat_id"
                                name="rubik_chat_id"
                                value="<?php echo esc_attr( $rubikChatId ); ?>"
                                class="regular-text"
                                placeholder="Chatbot ID"
                            />
                        </div>
                    </div>
                    <div class="form-control-submit">
                        <?php submit_button(); ?>
                    </div>
                </form>
            </div>
            <?php echo esc_html( rubik_chat_copyright() ); ?>
        </div>
    </div>
    <?php
}

function rubik_chat_note(){
    ?>
    <div class="rubik-chat-note">
        Locate your Chatbot ID in the RubikChat dashboard under the <a href="https://rubikchat.com" target="_blank">Settings</a> tab.
    </div>
    <?php
}

function rubik_chat_copyright(){
    ?>
    <div class="rubik-chat-copyright">
        Powered By <a href="https://rubikchat.com" target="_blank">RubikChat.com</a>
    </div>
    <?php
}

function rubik_chat_embed_chatbot_script() {
    $rubik_chat_id = get_option( 'rubik_chat_id' );

    if ( empty( $rubik_chat_id ) ) {
        return;
    }

    $script_handle = 'rubik-chatbot-script';
    $remote_script_url = 'https://api-proxy.rubikchat.com/embed.js';

    wp_register_script(
        $script_handle,
        $remote_script_url,
        [],
        '1.0.0',
        true
    );

    wp_enqueue_script( $script_handle );

    wp_add_inline_script(
        $script_handle,
        'window.embeddedChatbotConfig = ' . wp_json_encode( [
            'chatbotId' => esc_attr( $rubik_chat_id ),
            'domain' => 'rubikchat.com',
        ] ) . ';',
        'before'
    );
}

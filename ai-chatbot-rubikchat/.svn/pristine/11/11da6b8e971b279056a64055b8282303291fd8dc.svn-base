<?php

/*
 * Plugin Name:     AI Chatbot - RubikChat
 * Plugin URI:      https://www.rubikchat.com
 * Description:     Embed the RubikChat chatbot seamlessly into any WordPress site.
 * Version:         1.0.0
 * Author:          RubikChat
 * Author URI:      https://www.rubikchat.com/
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'functions.php';

class RubikChatPlugin {
    public function __construct() {
        add_action( 'admin_menu', 'rubik_chat_add_menu' );
        add_action( 'admin_enqueue_scripts', 'rubik_chat_admin_styles' );
        add_action( 'wp_enqueue_scripts', 'rubik_chat_embed_chatbot_script' );
    }
}

new RubikChatPlugin();

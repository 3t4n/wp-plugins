<?php
/**
 * Plugin Name: AI Story Generator Block
 * Description: AI Story Generator iframe
 * Version: 1.0.0
 * Author: Story321
 * License: GPL v2 or later
 */

// 退出如果直接访问
if (!defined('ABSPATH')) {
    exit;
}

// 注册区块
function story321_register_ai_story_generator_block() {
    register_block_type('story321/ai-story-generator-block', array(
        'title' => __('AI Story Generator','ai-story-generator-block'),
        'description' => __('AI Story Generator iframe','ai-story-generator-block'),
        'category' => 'common',
        'icon' => 'edit',
        'keywords' => array('story', 'ai', 'book'),
        'editor_script' => 'story321-ai-story-generator-block',
        'render_callback' => 'story321_render_ai_story_generator_block'
    ));
}
add_action('init', 'story321_register_ai_story_generator_block');

// 渲染区块
function story321_render_ai_story_generator_block($attributes) {
    ob_start(); ?>
    <div class="story321-ai-block">
        <iframe 
            src="https://story321.com/story/new-story/" 
            width="100%" 
            height="600px"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>
    <?php
    return ob_get_clean();
}

// 注册区块脚本
function story321_register_ai_story_generator_block_script() {
    wp_register_script(
        'story321-ai-story-generator-block',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor')
    );
}
add_action('init', 'story321_register_ai_story_generator_block_script');

<?php
namespace managerForIcomoon;

class Gutenberg {
    
    public function __construct() {
        add_action('init', array($this, 'register_block_types'),20);

        add_action('wp_ajax_nopriv_m4i_gutenberg_modal_insert_icon', array($this,'modal_insert_icon'));
        add_action('wp_ajax_m4i_gutenberg_modal_insert_icon', array($this,'modal_insert_icon'));
    }
 
    public function register_block_types() {
        if (Options::get('gutenberg_button_html') == "yes") {
            $this->register_icon_html_block();
        }
        if (Options::get('gutenberg_button_shortcode') == "yes") {
            $this->register_icon_shortcode_block();
        }
    }

    private function register_icon_html_block() {
        wp_register_script(
            'managerforicomoon-icon-html-editor-script',
            Core::getUrl('build/icon-html/index.js'),
            array('wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n'),
            filemtime(Core::getPath('build/icon-html/index.js')),
            true
        );
    
        wp_register_style(
            'managerforicomoon-icon-html-style',
            Core::getUrl('build/icon-html/style-index.css'),
            array(),
            filemtime(Core::getPath('build/icon-html/style-index.css'))
        );

        wp_set_script_translations('managerforicomoon-icon-html-editor-script', 'managerforicomoon', Core::getPath('languages/'));

        register_block_type('managerforicomoon/icon-html', array(
            'editor_script' => 'managerforicomoon-icon-html-editor-script',
            'style' => 'managerforicomoon-icon-html-style',
            'render_callback' => array($this, 'render_icon_html_block')
        ));
    }
    
    private function register_icon_shortcode_block() {
        wp_register_script(
            'managerforicomoon-icon-shortcode-editor-script',
            Core::getUrl('build/icon-shortcode/index.js'),
            array('wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n'),
            filemtime(Core::getPath('build/icon-shortcode/index.js')),
            true
        );
    
        wp_register_style(
            'managerforicomoon-icon-shortcode-style',
            Core::getUrl('build/icon-shortcode/style-index.css'),
            array(),
            filemtime(Core::getPath('build/icon-shortcode/style-index.css'))
        );

        wp_set_script_translations('managerforicomoon-icon-shortcode-editor-script', 'managerforicomoon', Core::getPath('languages/'));
    
        register_block_type('managerforicomoon/icon-shortcode', array(
            'editor_script' => 'managerforicomoon-icon-shortcode-editor-script',
            'style' => 'managerforicomoon-icon-shortcode-style',
            'render_callback' => array($this, 'render_icon_shortcode_block')
        ));
    }

    public function render_icon_html_block($attributes, $content) {
        return '<div>' . esc_html__('Icon HTML Block', 'managerforicomoon') . '</div>';
    }

    public function render_icon_shortcode_block($attributes, $content) {
        return '<div>' . esc_html__('Icon Shortcode Block', 'managerforicomoon') . '</div>';
    }

    public function modal_insert_icon(){
        load_plugin_textdomain('managerforicomoon', false, dirname(plugin_basename(__FILE__)) . '/languages');
        $icons = Core::getIcons();
        echo json_encode($icons);
        wp_die();
    }
}

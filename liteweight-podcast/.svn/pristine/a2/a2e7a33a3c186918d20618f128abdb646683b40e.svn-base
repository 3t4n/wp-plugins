<?php
namespace PDP\Block;
if(!defined('ABSPATH')) {
    return;
}
use PDP\Helper\DefaultArgs;
use PDP\Model\AdvanceSystem;
use PDP\Services\PodcastTemplate;


if(!class_exists('PDP_Block')){
    class PDP_Block{
        function __construct(){
            // add_action('init', [$this, 'enqueue_block_css_js']);
            add_action('init', [$this, 'enqueue_script']);
        }

        function enqueue_script(){
            wp_register_script( 'bplugins-plyrio', PDP_PLUGIN_DIR. 'assets/js/plyr.js' , array(), PDP_VER, false );
            wp_enqueue_script( 'pdp-social', PDP_PLUGIN_DIR. 'assets/js/jssocials.min.js',  array('jquery'), PDP_VER, false );

            wp_register_script(	'pdp-editor', PDP_PLUGIN_DIR.'dist/editor.js', array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'jquery', 'bplugins-plyrio', 'pdp-social'  ), PDP_PLUGIN_DIR, true );

            // wp_register_script( 'pdp-public', PDP_PLUGIN_DIR. 'dist/public.js' , array('jquery', 'bplugins-plyrio', 'pdp-social', 'bplugins-font-awesome'), PDP_VER, true );

            wp_enqueue_style( 'pdp-social', PDP_PLUGIN_DIR . 'assets/css/jssocials.css', array(), PDP_VER );            
            wp_register_style( 'bplugins-plyrio', PDP_PLUGIN_DIR . 'assets/css/player-style.css', array(), PDP_VER, 'all' );
            wp_register_style( 'pdp-admin', PDP_PLUGIN_DIR . 'dist/editor.css', array(), PDP_VER, 'all' );
            wp_register_style( 'pdp-font', PDP_PLUGIN_DIR . 'assets/font/flaticon.css', array(), PDP_VER );
            wp_register_style( 'pdp-editor', PDP_PLUGIN_DIR. 'dist/public.css' , array('bplugins-plyrio', 'pdp-social', 'pdp-admin', 'pdp-font'), PDP_VER );

            register_block_type('pdp/podcast', array(
                'editor_script' => 'pdp-editor',
                'editor_style' => 'pdp-editor',
                // 'script' => 'pdp-public',
                // 'style' => 'pdp-public',
                'render_callback' => [$this, 'render_callback_video']
            ));
        }

        public function render_callback_video($atts, $content){
            $data = DefaultArgs::parseArgs(AdvanceSystem::getData($atts));
            return PodcastTemplate::html($data);
        }

    }

    new PDP_Block();
}


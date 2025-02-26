<?php
/*
Plugin Name: Gutenberg Advance Video
Description: Add videos easily to your pages and posts
Author: RedNao
Version: 1.1
Author URI: http://rednao.com
*/


class GutenbergAdvanceVideo{
    public static $NAME;
    public static $DIR;
    public static $URL;
    public static $Version=1;
    public function __construct()
    {
        self::$NAME=dirname(plugin_basename(__FILE__));
        self::$DIR=WP_PLUGIN_DIR.'/'.self::$NAME.'/';
        self::$URL=plugin_dir_url(__FILE__);
        add_action('enqueue_block_editor_assets', array($this, 'EnqueueBlock'));
        add_action( 'enqueue_block_assets', array($this,'FrontEndEnqueue') );
    }

    public function EnqueueBlock(){
        wp_enqueue_script('rngtav-video-block',
            self::$URL.'js/dist/videoblock_bundle.js',
            array('wp-blocks','wp-i18n','wp-element'),
            self::$Version);

        wp_enqueue_style(
            'rngtav-video-editor-block-styles',
            self::$URL.'css/editorStyle.css'
        );

        wp_enqueue_style(
            'rngtav-fontawesome',
            self::$URL.'css/font-awesome/css/font-awesome.css'
        );
    }

    public function FrontEndEnqueue(){
        wp_enqueue_style(
            'rngtav-video-block-styles',
            self::$URL.'css/frontEndStyle.css'
        );
    }

}

new GutenbergAdvanceVideo();